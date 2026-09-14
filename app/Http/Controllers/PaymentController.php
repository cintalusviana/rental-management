<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    /**
     * =========================================================
     * HALAMAN PEMBAYARAN ADMIN
     * =========================================================
     *
     * ALUR:
     *
     * Rental
     *    ↓
     * Pengembalian
     *    ↓
     * Rental = completed
     *    ↓
     * Tagihan Akhir
     *    ↓
     * Catat Pembayaran
     *    ↓
     * Lunas
     *    ↓
     * Masuk Riwayat Pembayaran
     *
     * TIDAK ADA BUKTI PEMBAYARAN.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | SEMUA RENTAL
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
            ->latest('created_at')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | AMBIL RENTAL YANG SUDAH LUNAS
        |--------------------------------------------------------------------------
        |
        | Penting:
        | Jangan hanya mengambil payment terbaru.
        |
        | Kalau sebuah rental pernah memiliki payment Lunas,
        | rental tersebut dianggap sudah lunas.
        |
        */
        $paidRentalIds = Payment::whereRaw(
            'LOWER(TRIM(payment_status)) = ?',
            ['lunas']
        )
            ->pluck('rental_id')
            ->unique()
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | RENTAL BELUM DIBAYAR
        |--------------------------------------------------------------------------
        |
        | Syarat:
        |
        | 1. Rental sudah completed
        | 2. Belum mempunyai payment Lunas
        |
        */
        $unpaidRentals = $rentals
            ->filter(function ($rental) use ($paidRentalIds) {

                $status = strtolower(
                    trim(
                        (string) $rental->status
                    )
                );

                return $status === 'completed'
                    &&
                    !in_array(
                        $rental->id,
                        $paidRentalIds
                    );
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | HITUNG TAGIHAN AKHIR
        |--------------------------------------------------------------------------
        |
        | Harga Sewa
        | + Denda Telat
        | + Denda Rusak
        | = Total Tagihan
        |
        */
        $unpaidRentals->each(function ($rental) {

            $dendaTelat = $rental->pengembalian
                ? (float) (
                    $rental->pengembalian->denda_telat ?? 0
                )
                : 0;

            $dendaRusak = $rental->pengembalian
                ? (float) (
                    $rental->pengembalian->denda_rusak ?? 0
                )
                : 0;

            $totalDenda =
                $dendaTelat +
                $dendaRusak;

            $totalTagihan =
                (float) (
                    $rental->total_price ?? 0
                )
                +
                $totalDenda;


            $rental->denda_telat_total =
                $dendaTelat;

            $rental->denda_rusak_total =
                $dendaRusak;

            $rental->total_denda =
                $totalDenda;

            $rental->total_tagihan =
                $totalTagihan;
        });


        /*
        |--------------------------------------------------------------------------
        | SEMUA PAYMENT / RIWAYAT PEMBAYARAN
        |--------------------------------------------------------------------------
        |
        | Semua payment yang pernah dibuat tetap tersedia di sini.
        |
        */
        $payments = Payment::with([
            'rental.customer',
            'rental.details.product',
            'rental.pengembalian',
            'details.product',
        ])
            ->latest('created_at')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | PAYMENT TERPILIH
        |--------------------------------------------------------------------------
        */
        $selected = null;

        if ($request->filled('payment')) {

            $selected = Payment::with([
                'rental.customer',
                'rental.details.product',
                'rental.pengembalian',
                'details.product',
            ])
                ->find(
                    $request->payment
                );
        }


        /*
        |--------------------------------------------------------------------------
        | DEFAULT PAYMENT
        |--------------------------------------------------------------------------
        */
        if (!$selected) {
            $selected = $payments->first();
        }


        return view(
            'payments.index',
            compact(
                'rentals',
                'payments',
                'unpaidRentals',
                'selected'
            )
        );
    }


    /**
     * =========================================================
     * SIMPAN PEMBAYARAN ADMIN
     * =========================================================
     *
     * ADMIN BOLEH MENCATAT PEMBAYARAN.
     *
     * Tidak ada:
     *
     * - upload bukti
     * - proof
     *
     * Status bisa:
     *
     * Menunggu
     * Lunas
     * Ditolak
     *
     * Jika Lunas:
     *
     * Rental otomatis hilang dari
     * Tagihan Belum Dibayar
     *
     * dan payment masuk Riwayat.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([

            'rental_id' => [
                'required',
                'integer',
                'exists:rentals,id',
            ],

            'payment_method' => [
                'required',
                'in:Cash,Transfer BCA,Transfer BNI,Transfer Mandiri,QRIS',
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'payment_status' => [
                'required',
                'in:Menunggu,Lunas,Ditolak',
            ],

            'payment_date' => [
                'required',
                'date',
            ],
        ]);


        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | LOCK RENTAL
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
                ->lockForUpdate()
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | RENTAL HARUS SUDAH COMPLETED
            |--------------------------------------------------------------------------
            */
            $rentalStatus = strtolower(
                trim(
                    (string) $rental->status
                )
            );

            if (
                $rentalStatus !== 'completed'
            ) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Pembayaran hanya dapat dicatat setelah rental selesai dikembalikan.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | HITUNG DENDA
            |--------------------------------------------------------------------------
            */
            $dendaTelat = $rental->pengembalian
                ? (float) (
                    $rental->pengembalian->denda_telat ?? 0
                )
                : 0;

            $dendaRusak = $rental->pengembalian
                ? (float) (
                    $rental->pengembalian->denda_rusak ?? 0
                )
                : 0;


            $totalDenda =
                $dendaTelat +
                $dendaRusak;


            /*
            |--------------------------------------------------------------------------
            | TOTAL TAGIHAN AKHIR
            |--------------------------------------------------------------------------
            */
            $totalTagihan =
                (float) (
                    $rental->total_price ?? 0
                )
                +
                $totalDenda;


            /*
            |--------------------------------------------------------------------------
            | VALIDASI NOMINAL
            |--------------------------------------------------------------------------
            */
            if (
                abs(
                    (float) $validated['amount']
                    -
                    $totalTagihan
                ) > 0.01
            ) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Nominal pembayaran tidak sesuai total tagihan Rp ' .
                        number_format(
                            $totalTagihan,
                            0,
                            ',',
                            '.'
                        ) .
                        '.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | CEK APAKAH SUDAH PERNAH LUNAS
            |--------------------------------------------------------------------------
            |
            | Kalau pernah Lunas, jangan membuat payment baru.
            |
            */
            $paymentLunas = Payment::where(
                'rental_id',
                $rental->id
            )
                ->whereRaw(
                    'LOWER(TRIM(payment_status)) = ?',
                    ['lunas']
                )
                ->lockForUpdate()
                ->exists();


            if ($paymentLunas) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Rental ini sudah memiliki pembayaran Lunas dan tidak dapat dicatat kembali.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | CEK PAYMENT MENUNGGU
            |--------------------------------------------------------------------------
            |
            | Tidak boleh membuat pembayaran kedua ketika
            | pembayaran sebelumnya masih menunggu.
            |
            */
            $paymentMenunggu = Payment::where(
                'rental_id',
                $rental->id
            )
                ->whereRaw(
                    'LOWER(TRIM(payment_status)) = ?',
                    ['menunggu']
                )
                ->exists();


            if (
                $paymentMenunggu
                &&
                $validated['payment_status'] !== 'Ditolak'
            ) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Rental ini masih memiliki pembayaran yang menunggu verifikasi.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | GENERATE PAYMENT CODE
            |--------------------------------------------------------------------------
            */
            $lastPayment =
                Payment::latest('id')->first();

            $number =
                $lastPayment
                    ? $lastPayment->id + 1
                    : 1;

            $paymentCode =
                'PAY-' .
                str_pad(
                    $number,
                    4,
                    '0',
                    STR_PAD_LEFT
                );


            /*
            |--------------------------------------------------------------------------
            | SIMPAN PAYMENT
            |--------------------------------------------------------------------------
            |
            | TIDAK ADA PROOF.
            |
            */
            $payment = Payment::create([

                'rental_id' =>
                    $rental->id,

                'payment_code' =>
                    $paymentCode,

                'payment_method' =>
                    $validated['payment_method'],

                'payment_status' =>
                    $validated['payment_status'],

                'amount' =>
                    $validated['amount'],

                'payment_date' =>
                    $validated['payment_date'],

                /*
                |--------------------------------------------------------------------------
                | TIDAK MENGGUNAKAN BUKTI PEMBAYARAN
                |--------------------------------------------------------------------------
                */
                'proof' =>
                    null,
            ]);


            /*
            |--------------------------------------------------------------------------
            | PASTIKAN PAYMENT TERSIMPAN
            |--------------------------------------------------------------------------
            */
            if (
                !$payment ||
                !$payment->id
            ) {

                throw new \Exception(
                    'Data pembayaran gagal disimpan.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | SINKRONKAN STATUS PAYMENT KE RENTAL
            |--------------------------------------------------------------------------
            */
            $rental->payment_code =
                $payment->payment_code;

            $rental->payment_method =
                $payment->payment_method;

            $rental->payment_status =
                $payment->payment_status;

            $rental->payment_date =
                $payment->payment_date;

            /*
            |--------------------------------------------------------------------------
            | JANGAN SIMPAN PAYMENT_PROOF
            |--------------------------------------------------------------------------
            */
            $rental->save();


            /*
            |--------------------------------------------------------------------------
            | JIKA LUNAS
            |--------------------------------------------------------------------------
            |
            | Pengembalian dianggap selesai.
            |
            */
            if (
                strtolower(
                    trim(
                        (string) $payment->payment_status
                    )
                ) === 'lunas'
                &&
                $rental->pengembalian
            ) {

                $pengembalian =
                    $rental->pengembalian;

                if (
                    strtolower(
                        trim(
                            (string) $pengembalian->status
                        )
                    ) === 'menunggu pembayaran'
                ) {

                    $pengembalian->update([
                        'status' => 'Selesai',
                    ]);
                }
            }


            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | PESAN
            |--------------------------------------------------------------------------
            */
            if (
                strtolower(
                    trim(
                        (string) $payment->payment_status
                    )
                ) === 'lunas'
            ) {

                return redirect()
                    ->route(
                        'payments.index',
                        [
                            'payment' =>
                                $payment->id,
                        ]
                    )
                    ->with(
                        'success',
                        'Pembayaran berhasil disimpan dan dinyatakan Lunas. Rental otomatis masuk ke Riwayat Pembayaran.'
                    );
            }


            return redirect()
                ->route(
                    'payments.index',
                    [
                        'payment' =>
                            $payment->id,
                    ]
                )
                ->with(
                    'success',
                    'Pembayaran berhasil dicatat.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal menyimpan pembayaran: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * UPDATE STATUS PEMBAYARAN
     * =========================================================
     *
     * Menunggu
     *      ↓
     * Lunas
     *
     * atau
     *
     * Menunggu
     *      ↓
     * Ditolak
     */
    public function updateStatus(
        Request $request,
        Payment $payment
    ) {

        $validated = $request->validate([
            'payment_status' => [
                'required',
                'in:Menunggu,Lunas,Ditolak',
            ],
        ]);


        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | LOAD RELASI
            |--------------------------------------------------------------------------
            */
            $payment->load([
                'rental.pengembalian',
            ]);


            /*
            |--------------------------------------------------------------------------
            | PAYMENT HARUS MEMILIKI RENTAL
            |--------------------------------------------------------------------------
            */
            if (!$payment->rental) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Rental dari pembayaran tidak ditemukan.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | RENTAL HARUS COMPLETED
            |--------------------------------------------------------------------------
            */
            if (
                strtolower(
                    trim(
                        (string) $payment->rental->status
                    )
                ) !== 'completed'
            ) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Pembayaran tidak dapat diverifikasi karena rental belum selesai.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | PAYMENT YANG SUDAH LUNAS TIDAK BOLEH DIUBAH
            |--------------------------------------------------------------------------
            */
            $currentStatus = strtolower(
                trim(
                    (string) $payment->payment_status
                )
            );

            $newStatus = strtolower(
                trim(
                    (string) $validated['payment_status']
                )
            );


            if (
                $currentStatus === 'lunas'
                &&
                $newStatus !== 'lunas'
            ) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Pembayaran yang sudah Lunas tidak dapat diubah kembali.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | JIKA AKAN LUNAS, CEK PAYMENT LAIN
            |--------------------------------------------------------------------------
            */
            if (
                $newStatus === 'lunas'
            ) {

                $paymentLain = Payment::where(
                    'rental_id',
                    $payment->rental_id
                )
                    ->where(
                        'id',
                        '!=',
                        $payment->id
                    )
                    ->whereRaw(
                        'LOWER(TRIM(payment_status)) = ?',
                        ['lunas']
                    )
                    ->exists();


                if ($paymentLain) {

                    DB::rollBack();

                    return back()
                        ->with(
                            'error',
                            'Rental ini sudah memiliki pembayaran Lunas.'
                        );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | HITUNG TAGIHAN
            |--------------------------------------------------------------------------
            */
            $dendaTelat =
                $payment->rental->pengembalian
                    ? (float) (
                        $payment
                            ->rental
                            ->pengembalian
                            ->denda_telat ?? 0
                    )
                    : 0;


            $dendaRusak =
                $payment->rental->pengembalian
                    ? (float) (
                        $payment
                            ->rental
                            ->pengembalian
                            ->denda_rusak ?? 0
                    )
                    : 0;


            $totalDenda =
                $dendaTelat +
                $dendaRusak;


            $totalTagihan =
                (float) (
                    $payment->rental->total_price ?? 0
                )
                +
                $totalDenda;


            /*
            |--------------------------------------------------------------------------
            | NOMINAL HARUS SESUAI
            |--------------------------------------------------------------------------
            */
            if (
                abs(
                    (float) $payment->amount
                    -
                    $totalTagihan
                ) > 0.01
            ) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Nominal pembayaran tidak sesuai total tagihan Rp ' .
                        number_format(
                            $totalTagihan,
                            0,
                            ',',
                            '.'
                        ) .
                        '.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE STATUS
            |--------------------------------------------------------------------------
            */
            $payment->update([
                'payment_status' =>
                    $validated['payment_status'],
            ]);


            /*
            |--------------------------------------------------------------------------
            | SINKRONKAN RENTAL
            |--------------------------------------------------------------------------
            */
            $rental =
                $payment->rental;

            $rental->payment_code =
                $payment->payment_code;

            $rental->payment_method =
                $payment->payment_method;

            $rental->payment_status =
                $payment->payment_status;

            $rental->payment_date =
                $payment->payment_date;

            $rental->save();


            /*
            |--------------------------------------------------------------------------
            | JIKA LUNAS
            |--------------------------------------------------------------------------
            */
            if (
                $newStatus === 'lunas'
                &&
                $rental->pengembalian
            ) {

                $pengembalian =
                    $rental->pengembalian;

                if (
                    strtolower(
                        trim(
                            (string) $pengembalian->status
                        )
                    ) === 'menunggu pembayaran'
                ) {

                    $pengembalian->update([
                        'status' => 'Selesai',
                    ]);
                }
            }


            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | PESAN
            |--------------------------------------------------------------------------
            */
            $message = match (
                $validated['payment_status']
            ) {

                'Lunas' =>
                    'Pembayaran berhasil diverifikasi dan masuk ke Riwayat Pembayaran.',

                'Ditolak' =>
                    'Pembayaran ditolak. Pembayaran baru dapat dicatat kembali.',

                default =>
                    'Status pembayaran berhasil diperbarui.',
            };


            return redirect()
                ->route(
                    'payments.index',
                    [
                        'payment' =>
                            $payment->id,
                    ]
                )
                ->with(
                    'success',
                    $message
                );


        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->with(
                    'error',
                    'Gagal memperbarui status pembayaran: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * HAPUS PEMBAYARAN
     * =========================================================
     *
     * Jika payment dihapus:
     *
     * Rental tetap completed.
     *
     * Rental kembali dapat muncul sebagai
     * Tagihan Belum Dibayar.
     */
    public function destroy(
        Payment $payment
    ) {

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | LOAD RENTAL
            |--------------------------------------------------------------------------
            */
            $payment->load([
                'rental',
            ]);


            /*
            |--------------------------------------------------------------------------
            | HAPUS PAYMENT DETAIL
            |--------------------------------------------------------------------------
            */
            PaymentDetail::where(
                'payment_id',
                $payment->id
            )->delete();


            /*
            |--------------------------------------------------------------------------
            | HAPUS PAYMENT
            |--------------------------------------------------------------------------
            */
            $payment->delete();


            /*
            |--------------------------------------------------------------------------
            | RENTAL TETAP COMPLETED
            |--------------------------------------------------------------------------
            */
            DB::commit();


            return redirect()
                ->route(
                    'payments.index'
                )
                ->with(
                    'success',
                    'Pembayaran berhasil dihapus. Rental kembali masuk ke Tagihan Belum Dibayar.'
                );


        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->with(
                    'error',
                    'Gagal menghapus pembayaran: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * CETAK / DOWNLOAD INVOICE
     * =========================================================
     *
     * Hanya payment Lunas.
     *
     * Tidak menggunakan bukti pembayaran.
     */
    public function print(
        int $id
    ) {

        /*
        |--------------------------------------------------------------------------
        | LOAD PAYMENT
        |--------------------------------------------------------------------------
        */
        $payment = Payment::with([
            'rental.customer',
            'rental.details.product',
            'rental.pengembalian',
            'details.product',
        ])
            ->findOrFail(
                $id
            );


        /*
        |--------------------------------------------------------------------------
        | PAYMENT HARUS LUNAS
        |--------------------------------------------------------------------------
        */
        if (
            strtolower(
                trim(
                    (string) $payment->payment_status
                )
            ) !== 'lunas'
        ) {

            return redirect()
                ->route(
                    'payments.index',
                    [
                        'payment' =>
                            $payment->id,
                    ]
                )
                ->with(
                    'error',
                    'Invoice belum dapat dicetak karena pembayaran belum Lunas.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | RENTAL HARUS COMPLETED
        |--------------------------------------------------------------------------
        */
        if (
            !$payment->rental ||
            strtolower(
                trim(
                    (string) $payment->rental->status
                )
            ) !== 'completed'
        ) {

            return redirect()
                ->route(
                    'payments.index',
                    [
                        'payment' =>
                            $payment->id,
                    ]
                )
                ->with(
                    'error',
                    'Invoice hanya dapat dicetak setelah rental selesai.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG DENDA
        |--------------------------------------------------------------------------
        */
        $dendaTelat =
            $payment->rental->pengembalian
                ? (float) (
                    $payment
                        ->rental
                        ->pengembalian
                        ->denda_telat ?? 0
                )
                : 0;


        $dendaRusak =
            $payment->rental->pengembalian
                ? (float) (
                    $payment
                        ->rental
                        ->pengembalian
                        ->denda_rusak ?? 0
                )
                : 0;


        $totalDenda =
            $dendaTelat +
            $dendaRusak;


        $totalTagihan =
            (float) (
                $payment->rental->total_price ?? 0
            )
            +
            $totalDenda;


        /*
        |--------------------------------------------------------------------------
        | GENERATE PDF
        |--------------------------------------------------------------------------
        */
        $pdf = Pdf::loadView(
            'payments.invoice',
            [
                'payment' =>
                    $payment,

                'rental' =>
                    $payment->rental,

                'dendaTelat' =>
                    $dendaTelat,

                'dendaRusak' =>
                    $dendaRusak,

                'totalDenda' =>
                    $totalDenda,

                'totalTagihan' =>
                    $totalTagihan,
            ]
        );


        $pdf->setPaper(
            'A4',
            'portrait'
        );


        return $pdf->download(
            'bukti-pembayaran-' .
            $payment->payment_code .
            '.pdf'
        );
    }
}