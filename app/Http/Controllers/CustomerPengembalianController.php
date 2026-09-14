<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rental;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerPengembalianController extends Controller
{
    /**
     * =========================================================
     * AMBIL CUSTOMER AKTIF
     * =========================================================
     *
     * Mendukung:
     * 1. Pelanggan login sendiri
     * 2. Admin masuk sebagai pelanggan
     *
     * =========================================================
     */
    private function getCustomer()
    {
        /*
        |--------------------------------------------------------------------------
        | MODE ADMIN → PELANGGAN
        |--------------------------------------------------------------------------
        */
        if (
            session('customer_mode') === true &&
            session()->has('customer_mode_id')
        ) {
            $customer = Customer::find(
                session('customer_mode_id')
            );

            if ($customer) {
                return $customer;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | PELANGGAN LOGIN SENDIRI
        |--------------------------------------------------------------------------
        */
        if (Auth::check()) {
            return Customer::where(
                'user_id',
                Auth::id()
            )->first();
        }

        return null;
    }


    /**
     * =========================================================
     * NORMALISASI STATUS
     * =========================================================
     */
    private function normalizeStatus($status)
    {
        return strtolower(
            trim(
                (string) $status
            )
        );
    }


    /**
     * =========================================================
     * HALAMAN PENGEMBALIAN PELANGGAN
     * =========================================================
     *
     * Semua rental milik customer ditampilkan.
     *
     * STATUS RENTAL:
     *
     * pending
     * approved
     * completed
     * cancelled
     *
     * STATUS PENGEMBALIAN:
     *
     * Menunggu
     * Selesai
     *
     * Pengajuan hanya boleh dilakukan ketika:
     *
     * rental = approved
     * dan belum memiliki pengembalian aktif.
     *
     * =========================================================
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | CUSTOMER AKTIF
        |--------------------------------------------------------------------------
        */
        $customer = $this->getCustomer();

        if (!$customer) {
            abort(
                403,
                'Data customer tidak ditemukan.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | RENTAL CUSTOMER
        |--------------------------------------------------------------------------
        */
        $rentals = Rental::with([
            'customer',
            'details.product',
            'pengembalian',
            'payments' => function ($query) {
                $query->latest('created_at');
            },
        ])
            ->where(
                'customer_id',
                $customer->id
            )
            ->latest('created_at')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TAMBAHKAN FLAG UNTUK BLADE
        |--------------------------------------------------------------------------
        |
        | Supaya Blade tidak perlu melakukan logika status yang
        | terlalu banyak.
        |
        */
        $rentals->each(function ($rental) {

            $rentalStatus = $this->normalizeStatus(
                $rental->status
            );

            $returnStatus = $rental->pengembalian
                ? $this->normalizeStatus(
                    $rental->pengembalian->status
                )
                : null;

            /*
            |--------------------------------------------------------------------------
            | FLAG RENTAL
            |--------------------------------------------------------------------------
            */
            $rental->is_pending =
                $rentalStatus === 'pending';

            $rental->is_approved =
                $rentalStatus === 'approved';

            $rental->is_completed =
                $rentalStatus === 'completed';

            $rental->is_cancelled =
                $rentalStatus === 'cancelled';


            /*
            |--------------------------------------------------------------------------
            | FLAG PENGEMBALIAN
            |--------------------------------------------------------------------------
            */
            $rental->is_return_pending =
                $returnStatus === 'menunggu';

            $rental->is_return_completed =
                $returnStatus === 'selesai';

            $rental->can_request_return =
                $rentalStatus === 'approved' &&
                !$rental->pengembalian;
        });


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN VIEW
        |--------------------------------------------------------------------------
        */
        return view(
            'pelanggan.pengembalian',
            compact(
                'rentals',
                'customer'
            )
        );
    }


    /**
     * =========================================================
     * AJUKAN PENGEMBALIAN
     * =========================================================
     *
     * ALUR FINAL:
     *
     * RENTAL
     *    ↓
     * approved
     *    ↓
     * customer ajukan pengembalian
     *    ↓
     * pengembalian = Menunggu
     *    ↓
     * admin proses
     *    ↓
     * hitung denda
     *    ↓
     * stok dikembalikan
     *    ↓
     * pengembalian = Selesai
     *    ↓
     * rental = completed
     *    ↓
     * customer bayar
     *    ↓
     * payment = Menunggu
     *    ↓
     * admin verifikasi
     *    ↓
     * payment = Lunas
     *
     * =========================================================
     *
     * CONTROLLER INI TIDAK:
     *
     * - menghitung denda final
     * - mengubah rental menjadi completed
     * - mengubah stok
     * - membuat payment
     *
     * Semua dilakukan oleh proses ADMIN.
     *
     * =========================================================
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | CUSTOMER AKTIF
        |--------------------------------------------------------------------------
        */
        $customer = $this->getCustomer();

        if (!$customer) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Data customer tidak ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        |
        | Customer hanya menentukan kondisi barang.
        |
        | Customer TIDAK menentukan:
        |
        | - tanggal kembali final
        | - denda telat
        | - denda rusak
        | - status selesai
        | - pembayaran
        |
        */
        $validated = $request->validate([

            'rental_id' => [
                'required',
                'integer',
                'exists:rentals,id',
            ],

            'kondisi' => [
                'required',
                'in:Baik,Rusak Ringan,Rusak Berat',
            ],

            'catatan' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI DATABASE
        |--------------------------------------------------------------------------
        */
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | AMBIL RENTAL CUSTOMER + LOCK
            |--------------------------------------------------------------------------
            */
            $rental = Rental::with([
                'customer',
                'details.product',
                'pengembalian',
                'payments',
            ])
                ->where(
                    'id',
                    $validated['rental_id']
                )
                ->where(
                    'customer_id',
                    $customer->id
                )
                ->lockForUpdate()
                ->first();


            /*
            |--------------------------------------------------------------------------
            | RENTAL TIDAK DITEMUKAN
            |--------------------------------------------------------------------------
            */
            if (!$rental) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Data penyewaan tidak ditemukan.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | NORMALISASI STATUS RENTAL
            |--------------------------------------------------------------------------
            */
            $rentalStatus = $this->normalizeStatus(
                $rental->status
            );


            /*
            |--------------------------------------------------------------------------
            | HARUS APPROVED
            |--------------------------------------------------------------------------
            |
            | Hanya rental yang sudah disetujui admin yang boleh
            | diajukan untuk pengembalian.
            |
            */
            if ($rentalStatus !== 'approved') {

                DB::rollBack();

                switch ($rentalStatus) {

                    /*
                    |--------------------------------------------------------------------------
                    | PENDING
                    |--------------------------------------------------------------------------
                    */
                    case 'pending':

                        return back()
                            ->withInput()
                            ->with(
                                'error',
                                'Penyewaan belum disetujui oleh admin.'
                            );


                    /*
                    |--------------------------------------------------------------------------
                    | COMPLETED
                    |--------------------------------------------------------------------------
                    */
                    case 'completed':

                        return back()
                            ->withInput()
                            ->with(
                                'error',
                                'Penyewaan ini sudah selesai dan pengembalian telah diproses.'
                            );


                    /*
                    |--------------------------------------------------------------------------
                    | CANCELLED
                    |--------------------------------------------------------------------------
                    */
                    case 'cancelled':

                        return back()
                            ->withInput()
                            ->with(
                                'error',
                                'Penyewaan yang dibatalkan tidak dapat diajukan untuk pengembalian.'
                            );


                    /*
                    |--------------------------------------------------------------------------
                    | STATUS LAIN
                    |--------------------------------------------------------------------------
                    */
                    default:

                        return back()
                            ->withInput()
                            ->with(
                                'error',
                                'Penyewaan ini belum dapat diajukan untuk pengembalian.'
                            );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | CEK PENGEMBALIAN SEBELUMNYA
            |--------------------------------------------------------------------------
            */
            if ($rental->pengembalian) {

                $returnStatus = $this->normalizeStatus(
                    $rental->pengembalian->status
                );


                /*
                |--------------------------------------------------------------------------
                | MENUNGGU ADMIN
                |--------------------------------------------------------------------------
                */
                if ($returnStatus === 'menunggu') {

                    DB::rollBack();

                    return back()
                        ->withInput()
                        ->with(
                            'error',
                            'Pengajuan pengembalian sudah dikirim dan sedang menunggu pemeriksaan admin.'
                        );
                }


                /*
                |--------------------------------------------------------------------------
                | SUDAH SELESAI
                |--------------------------------------------------------------------------
                */
                if ($returnStatus === 'selesai') {

                    DB::rollBack();

                    return back()
                        ->withInput()
                        ->with(
                            'error',
                            'Pengembalian transaksi ini sudah selesai diproses.'
                        );
                }


                /*
                |--------------------------------------------------------------------------
                | STATUS PENGEMBALIAN LAIN
                |--------------------------------------------------------------------------
                */
                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Pengembalian untuk transaksi ini sudah pernah diajukan.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | CEK PAYMENT AKTIF
            |--------------------------------------------------------------------------
            |
            | Pada alur normal seharusnya belum ada payment.
            |
            | Payment hanya boleh dibuat setelah:
            |
            | pengembalian selesai
            | +
            | rental completed
            |
            */
            $paymentAktif = $rental->payments
                ->first(function ($payment) {

                    $status = $this->normalizeStatus(
                        $payment->payment_status
                    );

                    return in_array(
                        $status,
                        [
                            'menunggu',
                            'lunas',
                        ],
                        true
                    );
                });


            if ($paymentAktif) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Transaksi ini sudah memiliki pembayaran aktif.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | SIMPAN PENGAJUAN PENGEMBALIAN
            |--------------------------------------------------------------------------
            |
            | Denda awal = 0.
            |
            | Denda final akan dihitung oleh admin ketika barang
            | benar-benar diperiksa.
            |
            */
            $pengembalian = Pengembalian::create([

                'rental_id' =>
                    $rental->id,

                /*
                |--------------------------------------------------------------------------
                | TANGGAL PENGAJUAN
                |--------------------------------------------------------------------------
                |
                | Ini bukan tanggal kembali final.
                |
                | Admin akan menentukan tanggal kembali sebenarnya
                | ketika proses pengembalian.
                |
                */
                'tanggal_kembali' =>
                    now()->format('Y-m-d'),

                'kondisi' =>
                    $validated['kondisi'],

                'denda_telat' =>
                    0,

                'denda_rusak' =>
                    0,

                'status' =>
                    'Menunggu',
            ]);


            /*
            |--------------------------------------------------------------------------
            | PASTIKAN PENGEMBALIAN TERSIMPAN
            |--------------------------------------------------------------------------
            */
            if (
                !$pengembalian ||
                !$pengembalian->id
            ) {

                throw new \Exception(
                    'Data pengembalian gagal disimpan.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | JANGAN UBAH RENTAL
            |--------------------------------------------------------------------------
            |
            | Tetap:
            |
            | approved
            |
            | Karena admin belum memeriksa barang.
            |
            */
            $rental->status = 'approved';
            $rental->save();


            /*
            |--------------------------------------------------------------------------
            | JANGAN UBAH STOK
            |--------------------------------------------------------------------------
            |
            | Stok masih dianggap sedang disewa.
            |
            | Stok baru dikembalikan ketika admin memproses
            | pengembalian.
            |
            */


            /*
            |--------------------------------------------------------------------------
            | JANGAN BUAT PAYMENT
            |--------------------------------------------------------------------------
            |
            | Payment BELUM dibuat di sini.
            |
            | Payment baru dibuat oleh pelanggan setelah:
            |
            | pengembalian = Selesai
            | +
            | rental = completed
            |
            */


            /*
            |--------------------------------------------------------------------------
            | COMMIT
            |--------------------------------------------------------------------------
            */
            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | REDIRECT
            |--------------------------------------------------------------------------
            */
            return redirect()
                ->route(
                    'pelanggan.pengembalian'
                )
                ->with(
                    'success',
                    'Pengajuan pengembalian berhasil dikirim. Silakan tunggu pemeriksaan admin.'
                );


        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | ROLLBACK
            |--------------------------------------------------------------------------
            */
            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Pengajuan pengembalian gagal: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * ALIAS returnRequest()
     * =========================================================
     *
     * Dipertahankan agar route lama tetap kompatibel.
     * =========================================================
     */
    public function returnRequest(
        Request $request,
        Rental $rental
    ) {

        /*
        |--------------------------------------------------------------------------
        | CUSTOMER AKTIF
        |--------------------------------------------------------------------------
        */
        $customer = $this->getCustomer();

        if (!$customer) {

            return back()
                ->with(
                    'error',
                    'Data customer tidak ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK KEPEMILIKAN RENTAL
        |--------------------------------------------------------------------------
        */
        if (
            (int) $rental->customer_id !==
            (int) $customer->id
        ) {

            abort(
                403,
                'Anda tidak memiliki akses ke transaksi ini.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | MASUKKAN RENTAL ID
        |--------------------------------------------------------------------------
        */
        $request->merge([
            'rental_id' =>
                $rental->id,
        ]);


        /*
        |--------------------------------------------------------------------------
        | GUNAKAN STORE()
        |--------------------------------------------------------------------------
        */
        return $this->store($request);
    }
}