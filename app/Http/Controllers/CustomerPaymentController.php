<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rental;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerPaymentController extends Controller
{
    /**
     * =========================================================
     * CUSTOMER AKTIF
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
        | PELANGGAN LOGIN
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
     * HITUNG TOTAL TAGIHAN AKHIR
     * =========================================================
     *
     * TOTAL TAGIHAN:
     *
     * Harga Rental
     * + Denda Keterlambatan
     * + Denda Kerusakan
     */
    private function calculateBill(Rental $rental)
    {
        $dendaTelat = 0;
        $dendaRusak = 0;

        if ($rental->pengembalian) {

            $dendaTelat = (float) (
                $rental->pengembalian->denda_telat ?? 0
            );

            $dendaRusak = (float) (
                $rental->pengembalian->denda_rusak ?? 0
            );
        }

        $totalDenda =
            $dendaTelat +
            $dendaRusak;

        $totalTagihan =
            (float) ($rental->total_price ?? 0) +
            $totalDenda;

        /*
        |--------------------------------------------------------------------------
        | ATTRIBUTE SEMENTARA UNTUK BLADE
        |--------------------------------------------------------------------------
        */
        $rental->denda_telat_total = $dendaTelat;
        $rental->denda_rusak_total = $dendaRusak;
        $rental->total_denda = $totalDenda;
        $rental->total_tagihan = $totalTagihan;

        return $rental;
    }


    /**
     * =========================================================
     * CEK RENTAL SUDAH COMPLETED
     * =========================================================
     *
     * PEMBAYARAN TIDAK BOLEH DILAKUKAN SEBELUM:
     *
     * Rental → Completed
     */
    private function isRentalCompleted(Rental $rental)
    {
        return $this->normalizeStatus(
            $rental->status
        ) === 'completed';
    }


    /**
     * =========================================================
     * CEK PENGEMBALIAN SUDAH SELESAI
     * =========================================================
     */
    private function isReturnCompleted(Rental $rental)
    {
        if (!$rental->relationLoaded('pengembalian')) {
            $rental->load('pengembalian');
        }

        if (!$rental->pengembalian) {
            return false;
        }

        return $this->normalizeStatus(
            $rental->pengembalian->status
        ) === 'selesai';
    }


    /**
     * =========================================================
     * CEK PEMBAYARAN SUDAH LUNAS
     * =========================================================
     */
    private function hasPaidPayment($rentalId)
    {
        return Payment::where(
            'rental_id',
            $rentalId
        )
            ->whereRaw(
                'LOWER(TRIM(payment_status)) = ?',
                ['lunas']
            )
            ->exists();
    }


    /**
     * =========================================================
     * CEK PEMBAYARAN SEDANG MENUNGGU
     * =========================================================
     */
    private function hasPendingPayment($rentalId)
    {
        return Payment::where(
            'rental_id',
            $rentalId
        )
            ->whereRaw(
                'LOWER(TRIM(payment_status)) = ?',
                ['menunggu']
            )
            ->exists();
    }


    /**
     * =========================================================
     * NORMALISASI STATUS PAYMENT
     * =========================================================
     */
    private function normalizePaymentStatus($status)
    {
        return strtolower(
            trim(
                (string) $status
            )
        );
    }


    /**
     * =========================================================
     * AMBIL PAYMENT EFEKTIF
     * =========================================================
     *
     * PRIORITAS:
     *
     * 1. Lunas
     * 2. Menunggu
     * 3. Ditolak
     * 4. Terbaru
     */
    private function getEffectivePayment($payments)
    {
        if (!$payments || $payments->isEmpty()) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | PRIORITAS 1 → LUNAS
        |--------------------------------------------------------------------------
        */
        $lunas = $payments
            ->filter(function ($payment) {

                return $this->normalizePaymentStatus(
                    $payment->payment_status
                ) === 'lunas';

            })
            ->sortByDesc('created_at')
            ->first();

        if ($lunas) {
            return $lunas;
        }


        /*
        |--------------------------------------------------------------------------
        | PRIORITAS 2 → MENUNGGU
        |--------------------------------------------------------------------------
        */
        $menunggu = $payments
            ->filter(function ($payment) {

                return $this->normalizePaymentStatus(
                    $payment->payment_status
                ) === 'menunggu';

            })
            ->sortByDesc('created_at')
            ->first();

        if ($menunggu) {
            return $menunggu;
        }


        /*
        |--------------------------------------------------------------------------
        | PRIORITAS 3 → DITOLAK
        |--------------------------------------------------------------------------
        */
        $ditolak = $payments
            ->filter(function ($payment) {

                return $this->normalizePaymentStatus(
                    $payment->payment_status
                ) === 'ditolak';

            })
            ->sortByDesc('created_at')
            ->first();

        if ($ditolak) {
            return $ditolak;
        }


        /*
        |--------------------------------------------------------------------------
        | FALLBACK → TERBARU
        |--------------------------------------------------------------------------
        */
        return $payments
            ->sortByDesc('created_at')
            ->first();
    }


    /**
     * =========================================================
     * SINKRONISASI PAYMENT → RENTAL
     * =========================================================
     */
    private function syncRentalPayment(
        Rental $rental,
        Payment $payment
    ) {
        $paymentStatus = $this->normalizePaymentStatus(
            $payment->payment_status
        );

        $rentalPaymentStatus = match ($paymentStatus) {

            'menunggu' =>
                'Menunggu Verifikasi',

            'ditolak' =>
                'Belum Lunas',

            'lunas' =>
                'Lunas',

            default =>
                'Belum Lunas',
        };

        /*
        |--------------------------------------------------------------------------
        | SIMPAN KE RENTALS
        |--------------------------------------------------------------------------
        */
        $rental->payment_code =
            $payment->payment_code;

        $rental->payment_method =
            $payment->payment_method;

        $rental->payment_status =
            $rentalPaymentStatus;

        $rental->payment_date =
            $payment->payment_date;

        $rental->payment_proof =
            $payment->proof;

        $rental->save();

        return $rental;
    }


    /**
     * =========================================================
     * HALAMAN PEMBAYARAN PELANGGAN
     * =========================================================
     *
     * PEMBAYARAN HANYA MUNCUL:
     *
     * Rental
     *    ↓
     * Dikembalikan
     *    ↓
     * Pengembalian Selesai
     *    ↓
     * Rental Completed
     *    ↓
     * Pembayaran
     */
    public function index(Request $request)
    {
        $customer = $this->getCustomer();

        if (!$customer) {
            abort(
                403,
                'Data customer tidak ditemukan. Pastikan akun pelanggan sudah terhubung dengan data customer.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HANYA RENTAL COMPLETED + PENGEMBALIAN SELESAI
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
            ->whereRaw(
                'LOWER(TRIM(status)) = ?',
                ['completed']
            )
            ->whereHas(
                'pengembalian',
                function ($query) {

                    $query->whereRaw(
                        'LOWER(TRIM(status)) = ?',
                        ['selesai']
                    );
                }
            )
            ->latest('created_at')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | HITUNG TAGIHAN + PAYMENT
        |--------------------------------------------------------------------------
        */
        $rentals->each(function ($rental) {

            $this->calculateBill($rental);

            $payment = $this->getEffectivePayment(
                $rental->payments
            );


            if ($payment) {

                $rental->payment_code =
                    $payment->payment_code;

                $rental->payment_method =
                    $payment->payment_method;

                $rental->payment_status =
                    $payment->payment_status;

                $rental->payment_date =
                    $payment->payment_date;

                $rental->payment_proof =
                    $payment->proof;

            } else {

                $rental->payment_code = null;
                $rental->payment_method = null;
                $rental->payment_status = 'Belum Bayar';
                $rental->payment_date = null;
                $rental->payment_proof = null;
            }


            /*
            |--------------------------------------------------------------------------
            | FLAG
            |--------------------------------------------------------------------------
            */
            $rental->is_lunas =
                $this->hasPaidPayment(
                    $rental->id
                );

            $rental->is_menunggu =
                $this->hasPendingPayment(
                    $rental->id
                );
        });


        /*
        |--------------------------------------------------------------------------
        | PILIH RENTAL
        |--------------------------------------------------------------------------
        */
        if ($request->filled('rental')) {

            $rental = $rentals->firstWhere(
                'id',
                (int) $request->rental
            );

        } else {

            $rental = $rentals->first();
        }


        /*
        |--------------------------------------------------------------------------
        | JIKA ID TIDAK VALID
        |--------------------------------------------------------------------------
        */
        if (
            $request->filled('rental') &&
            !$rental
        ) {
            $rental = $rentals->first();
        }


        /*
        |--------------------------------------------------------------------------
        | RENTAL TERPILIH
        |--------------------------------------------------------------------------
        */
        if ($rental) {

            $rental->load([
                'customer',
                'details.product',
                'pengembalian',
                'payments' => function ($query) {
                    $query->latest('created_at');
                },
            ]);


            /*
            |--------------------------------------------------------------------------
            | DOUBLE CHECK
            |--------------------------------------------------------------------------
            */
            if (
                !$this->isRentalCompleted($rental) ||
                !$this->isReturnCompleted($rental)
            ) {

                $rental = null;

            } else {

                $this->calculateBill($rental);

                $payment = $this->getEffectivePayment(
                    $rental->payments
                );


                if ($payment) {

                    $rental->payment_code =
                        $payment->payment_code;

                    $rental->payment_method =
                        $payment->payment_method;

                    $rental->payment_status =
                        $payment->payment_status;

                    $rental->payment_date =
                        $payment->payment_date;

                    $rental->payment_proof =
                        $payment->proof;

                } else {

                    $rental->payment_code = null;
                    $rental->payment_method = null;
                    $rental->payment_status = 'Belum Bayar';
                    $rental->payment_date = null;
                    $rental->payment_proof = null;
                }


                $rental->is_lunas =
                    $this->hasPaidPayment(
                        $rental->id
                    );

                $rental->is_menunggu =
                    $this->hasPendingPayment(
                        $rental->id
                    );
            }
        }


        return view(
            'pelanggan.payment',
            compact(
                'rentals',
                'rental',
                'customer'
            )
        );
    }


    /**
     * =========================================================
     * SIMPAN PEMBAYARAN
     * =========================================================
     *
     * FLOW:
     *
     * Rental
     *    ↓
     * Pengembalian
     *    ↓
     * Selesai
     *    ↓
     * Completed
     *    ↓
     * Bayar
     *    ↓
     * Menunggu
     *    ↓
     * Admin Verifikasi
     *    ↓
     * Lunas
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI FORM
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

            'payment_date' => [
                'nullable',
                'date',
            ],

            'proof' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,pdf',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | CUSTOMER AKTIF
        |--------------------------------------------------------------------------
        */
        $customer = $this->getCustomer();

        if (!$customer) {
            abort(
                403,
                'Data customer tidak ditemukan. Pastikan akun pelanggan sudah terhubung dengan data customer.'
            );
        }


        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | LOCK RENTAL
            |--------------------------------------------------------------------------
            */
            $rental = Rental::with([
                'customer',
                'pengembalian',
                'details',
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
            | KEAMANAN CUSTOMER
            |--------------------------------------------------------------------------
            */
            if (
                (int) $rental->customer_id !==
                (int) $customer->id
            ) {

                DB::rollBack();

                abort(
                    403,
                    'Anda tidak memiliki akses ke transaksi ini.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | ==============================================================
            | PAYMENT HANYA SETELAH RENTAL COMPLETED
            | ==============================================================
            |
            | INI BAGIAN PENTING.
            |
            | Kalau rental masih:
            | - Pending
            | - Approved
            | - Ongoing
            | - Returned
            | - atau status lainnya
            |
            | maka pembayaran DITOLAK.
            |
            |--------------------------------------------------------------------------
            */
            if (
                !$this->isRentalCompleted($rental)
            ) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Pembayaran baru tersedia setelah rental selesai dan berstatus Completed.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | HARUS ADA PENGEMBALIAN SELESAI
            |--------------------------------------------------------------------------
            */
            if (
                !$this->isReturnCompleted($rental)
            ) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Pembayaran belum tersedia karena pengembalian belum selesai diproses.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | HITUNG TAGIHAN AKHIR
            |--------------------------------------------------------------------------
            */
            $this->calculateBill($rental);

            $totalTagihan =
                (float) $rental->total_tagihan;

            $amount =
                (float) $validated['amount'];


            /*
            |--------------------------------------------------------------------------
            | NOMINAL HARUS SESUAI TOTAL TAGIHAN
            |--------------------------------------------------------------------------
            */
            if (
                abs(
                    $amount -
                    $totalTagihan
                ) > 0.01
            ) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Nominal pembayaran harus sesuai total tagihan Rp ' .
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
            | CEK SUDAH LUNAS
            |--------------------------------------------------------------------------
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
                ->first();


            if ($paymentLunas) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Rental ini sudah Lunas dan tidak dapat melakukan pembayaran ulang.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | CEK MASIH MENUNGGU
            |--------------------------------------------------------------------------
            */
            $paymentMenunggu = Payment::where(
                'rental_id',
                $rental->id
            )
                ->whereRaw(
                    'LOWER(TRIM(payment_status)) = ?',
                    ['menunggu']
                )
                ->lockForUpdate()
                ->first();


            if ($paymentMenunggu) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Pembayaran untuk rental ini sedang menunggu verifikasi admin.'
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
            | UPLOAD BUKTI PEMBAYARAN
            |--------------------------------------------------------------------------
            */
            $proofPath = null;

            if ($request->hasFile('proof')) {

                $proofPath =
                    $request
                        ->file('proof')
                        ->store(
                            'payments',
                            'public'
                        );
            }


            /*
            |--------------------------------------------------------------------------
            | TANGGAL PEMBAYARAN
            |--------------------------------------------------------------------------
            */
            $paymentDate =
                $validated['payment_date']
                ?? now()->format('Y-m-d');


            /*
            |--------------------------------------------------------------------------
            | BUAT PAYMENT
            |--------------------------------------------------------------------------
            */
            $payment = Payment::create([

                'rental_id' =>
                    $rental->id,

                'payment_code' =>
                    $paymentCode,

                'payment_method' =>
                    $validated['payment_method'],

                /*
                |--------------------------------------------------------------------------
                | PAYMENT BARU = MENUNGGU
                |--------------------------------------------------------------------------
                */
                'payment_status' =>
                    'Menunggu',

                'amount' =>
                    $amount,

                'payment_date' =>
                    $paymentDate,

                'proof' =>
                    $proofPath,
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
                    'Data pembayaran gagal dibuat.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | SINKRONISASI PAYMENT → RENTAL
            |--------------------------------------------------------------------------
            |
            | Payment = Menunggu
            | Rental  = Menunggu Verifikasi
            |
            |--------------------------------------------------------------------------
            */
            $this->syncRentalPayment(
                $rental,
                $payment
            );


            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | REDIRECT
            |--------------------------------------------------------------------------
            */
            return redirect()
                ->route(
                    'pelanggan.payments',
                    [
                        'rental' =>
                            $rental->id,
                    ]
                )
                ->with(
                    'success',
                    'Pembayaran berhasil dikirim dan sedang menunggu verifikasi admin.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal mengirim pembayaran: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * DETAIL PEMBAYARAN
     * =========================================================
     */
    public function show(Payment $payment)
    {
        $customer = $this->getCustomer();

        if (!$customer) {
            abort(
                403,
                'Data customer tidak ditemukan.'
            );
        }


        $payment->load([
            'rental.customer',
            'rental.details.product',
            'rental.pengembalian',
        ]);


        /*
        |--------------------------------------------------------------------------
        | KEAMANAN CUSTOMER
        |--------------------------------------------------------------------------
        */
        if (
            !$payment->rental ||
            (int) $payment->rental->customer_id !==
            (int) $customer->id
        ) {

            abort(
                403,
                'Anda tidak memiliki akses ke pembayaran ini.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HARUS COMPLETED
        |--------------------------------------------------------------------------
        */
        if (
            !$this->isRentalCompleted(
                $payment->rental
            )
        ) {

            abort(
                403,
                'Pembayaran belum tersedia untuk transaksi ini.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HARUS ADA PENGEMBALIAN SELESAI
        |--------------------------------------------------------------------------
        */
        if (
            !$this->isReturnCompleted(
                $payment->rental
            )
        ) {

            abort(
                403,
                'Pembayaran belum tersedia karena pengembalian belum selesai diproses.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG TAGIHAN
        |--------------------------------------------------------------------------
        */
        $rental =
            $this->calculateBill(
                $payment->rental
            );


        $payment->total_denda =
            $rental->total_denda;

        $payment->total_tagihan =
            $rental->total_tagihan;


        return view(
            'pelanggan.payment_show',
            compact('payment')
        );
    }


    /**
     * =========================================================
     * CETAK / DOWNLOAD INVOICE
     * =========================================================
     */
    public function print($id)
    {
        $customer = $this->getCustomer();

        if (!$customer) {
            abort(
                403,
                'Data customer tidak ditemukan.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL RENTAL
        |--------------------------------------------------------------------------
        |
        | SYARAT:
        |
        | 1. Milik customer
        | 2. Completed
        | 3. Ada pengembalian
        | 4. Pengembalian Selesai
        |
        |--------------------------------------------------------------------------
        */
        $rental = Rental::with([
            'customer',
            'details.product',
            'pengembalian',
            'payments' => function ($query) {
                $query->latest('created_at');
            },
        ])
            ->where(
                'id',
                $id
            )
            ->where(
                'customer_id',
                $customer->id
            )
            ->whereRaw(
                'LOWER(TRIM(status)) = ?',
                ['completed']
            )
            ->whereHas(
                'pengembalian',
                function ($query) {

                    $query->whereRaw(
                        'LOWER(TRIM(status)) = ?',
                        ['selesai']
                    );
                }
            )
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | HITUNG TAGIHAN
        |--------------------------------------------------------------------------
        */
        $this->calculateBill($rental);


        /*
        |--------------------------------------------------------------------------
        | CARI PAYMENT LUNAS
        |--------------------------------------------------------------------------
        */
        $payment = $rental->payments
            ->filter(function ($payment) {

                return $this->normalizePaymentStatus(
                    $payment->payment_status
                ) === 'lunas';

            })
            ->sortByDesc('created_at')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | BELUM LUNAS
        |--------------------------------------------------------------------------
        */
        if (!$payment) {

            return redirect()
                ->route(
                    'pelanggan.payments',
                    [
                        'rental' =>
                            $rental->id,
                    ]
                )
                ->with(
                    'error',
                    'Invoice belum dapat dicetak karena pembayaran belum Lunas.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | BUAT PDF
        |--------------------------------------------------------------------------
        */
        $pdf = Pdf::loadView(
            'pelanggan.invoice',
            [
                'rental' =>
                    $rental,

                'payment' =>
                    $payment,

                'dendaTelat' =>
                    $rental->denda_telat_total,

                'dendaRusak' =>
                    $rental->denda_rusak_total,

                'totalDenda' =>
                    $rental->total_denda,

                'totalTagihan' =>
                    $rental->total_tagihan,
            ]
        );


        $pdf->setPaper(
            'A4',
            'portrait'
        );


        return $pdf->download(
            'Invoice-' .
            $rental->rental_code .
            '.pdf'
        );
    }
}