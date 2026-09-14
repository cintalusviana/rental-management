<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\RentalDetail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    /**
     * =========================================================
     * DAFTAR TRANSAKSI RENTAL
     * =========================================================
     *
     * ALUR:
     *
     * pending
     *    ↓
     * approved
     *    ↓
     * sedang disewa
     *    ↓
     * pengembalian
     *    ↓
     * completed
     *    ↓
     * pembayaran terakhir
     *    ↓
     * lunas
     *
     * CATATAN:
     * - Tidak ada pembayaran ketika rental dibuat.
     * - Tidak ada pembayaran ketika rental disetujui.
     * - Pembayaran hanya dilakukan setelah pengembalian selesai.
     */
    public function index()
    {
        $rentals = Rental::with([
            'customer',
            'details.product',
            'pengembalian',
            'payments',
        ])
            ->latest('created_at')
            ->get();

        $customers = Customer::where('status', 'aktif')
            ->orderBy('name')
            ->get();

        $products = Product::where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        return view(
            'rentals.index',
            compact(
                'rentals',
                'customers',
                'products'
            )
        );
    }


    /**
     * =========================================================
     * FORM TAMBAH RENTAL
     * =========================================================
     */
    public function create()
    {
        $customers = Customer::where('status', 'aktif')
            ->orderBy('name')
            ->get();

        $products = Product::where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        return view(
            'rentals.create',
            compact(
                'customers',
                'products'
            )
        );
    }


    /**
     * =========================================================
     * SIMPAN RENTAL
     * =========================================================
     *
     * Rental baru:
     *
     * pending
     *    ↓
     * belum ada pembayaran
     *
     * Jika dibuat langsung approved:
     * stok langsung dikurangi.
     *
     * PAYMENT TIDAK DIBUAT DI SINI.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => [
                'required',
                'exists:customers,id',
            ],

            'product_id' => [
                'required',
                'exists:products,id',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'rental_date' => [
                'required',
                'date',
            ],

            'return_date' => [
                'required',
                'date',
                'after_or_equal:rental_date',
            ],

            'status' => [
                'required',
                'in:pending,approved',
            ],
        ]);

        DB::beginTransaction();

        try {

            /**
             * =================================================
             * LOCK PRODUCT
             * =================================================
             */
            $product = Product::where(
                'id',
                $validated['product_id']
            )
                ->lockForUpdate()
                ->firstOrFail();


            /**
             * =================================================
             * CEK STOK
             * =================================================
             *
             * Hanya rental approved yang langsung memakai stok.
             */
            if (
                $validated['status'] === 'approved' &&
                $product->stock < $validated['quantity']
            ) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Stok barang tidak cukup.'
                    );
            }


            /**
             * =================================================
             * HITUNG LAMA SEWA
             * =================================================
             */
            $start = strtotime(
                $validated['rental_date']
            );

            $end = strtotime(
                $validated['return_date']
            );

            $days = max(
                1,
                (int) ceil(
                    ($end - $start) / 86400
                )
            );


            /**
             * =================================================
             * HITUNG SUBTOTAL
             * =================================================
             */
            $subtotal =
                (float) $product->price_per_day
                *
                (int) $validated['quantity']
                *
                $days;


            /**
             * =================================================
             * GENERATE KODE RENTAL
             * =================================================
             */
            $lastRental = Rental::latest('id')->first();

            $number = $lastRental
                ? $lastRental->id + 1
                : 1;

            $rentalCode =
                'SW-' .
                str_pad(
                    $number,
                    4,
                    '0',
                    STR_PAD_LEFT
                );


            /**
             * =================================================
             * SIMPAN RENTAL
             * =================================================
             *
             * PENTING:
             *
             * Tidak membuat Payment.
             * Tidak membuat PaymentDetail.
             */
            $rental = Rental::create([
                'rental_code' =>
                    $rentalCode,

                'customer_id' =>
                    $validated['customer_id'],

                'rental_date' =>
                    $validated['rental_date'],

                'return_date' =>
                    $validated['return_date'],

                'total_price' =>
                    $subtotal,

                'status' =>
                    $validated['status'],
            ]);


            /**
             * =================================================
             * DETAIL RENTAL
             * =================================================
             */
            RentalDetail::create([
                'rental_id' =>
                    $rental->id,

                'product_id' =>
                    $product->id,

                'quantity' =>
                    $validated['quantity'],

                'price' =>
                    $product->price_per_day,

                'subtotal' =>
                    $subtotal,
            ]);


            /**
             * =================================================
             * KURANGI STOK JIKA APPROVED
             * =================================================
             */
            if (
                $validated['status'] === 'approved'
            ) {

                $product->decrement(
                    'stock',
                    $validated['quantity']
                );
            }


            DB::commit();

            return redirect()
                ->route('rentals.index')
                ->with(
                    'success',
                    'Transaksi rental berhasil ditambahkan. Pembayaran dilakukan setelah pengembalian selesai.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal menambahkan transaksi rental: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * DETAIL RENTAL
     * =========================================================
     */
    public function show(Rental $rental)
    {
        $rental->load([
            'customer',
            'details.product',
            'pengembalian',
            'payments',
        ]);

        return view(
            'rentals.show',
            compact('rental')
        );
    }


    /**
     * =========================================================
     * DETAIL RENTAL TAMBAHAN
     * =========================================================
     */
    public function detail(Rental $rental)
    {
        $rental->load([
            'customer',
            'details.product',
            'pengembalian',
            'payments',
        ]);

        return view(
            'rentals.detail',
            compact('rental')
        );
    }


    /**
     * =========================================================
     * FORM EDIT
     * =========================================================
     */
    public function edit(Rental $rental)
    {
        /**
         * Rental yang sudah selesai tidak boleh diedit.
         */
        if (
            strtolower(
                trim(
                    (string) $rental->status
                )
            ) === 'completed'
        ) {

            return redirect()
                ->route('rentals.index')
                ->with(
                    'error',
                    'Rental sudah selesai karena barang telah dikembalikan. Silakan lanjutkan ke pembayaran terakhir.'
                );
        }


        /**
         * Rental yang sudah dibatalkan tidak boleh diedit.
         */
        if (
            strtolower(
                trim(
                    (string) $rental->status
                )
            ) === 'cancelled'
        ) {

            return redirect()
                ->route('rentals.index')
                ->with(
                    'error',
                    'Rental yang sudah dibatalkan tidak dapat diedit.'
                );
        }


        $rental->load([
            'customer',
            'details.product',
            'pengembalian',
            'payments',
        ]);

        $customers = Customer::where(
            'status',
            'aktif'
        )
            ->orderBy('name')
            ->get();

        $products = Product::orderBy('name')
            ->get();

        return view(
            'rentals.edit',
            compact(
                'rental',
                'customers',
                'products'
            )
        );
    }


    /**
     * =========================================================
     * UPDATE RENTAL / APPROVE RENTAL
     * =========================================================
     *
     * STATUS YANG BOLEH:
     *
     * pending   → approved
     * pending   → cancelled
     * approved  → cancelled
     *
     * STATUS SELESAI:
     *
     * completed
     *
     * completed TIDAK BOLEH diubah lagi.
     *
     * Pembayaran dilakukan melalui halaman pembayaran.
     */
    public function update(
        Request $request,
        Rental $rental
    ) {
        $validated = $request->validate([
            'customer_id' => [
                'required',
                'exists:customers,id',
            ],

            'status' => [
                'required',
                'in:pending,approved,cancelled',
            ],
        ]);


        /**
         * =====================================================
         * NORMALISASI STATUS
         * =====================================================
         */
        $currentStatus = strtolower(
            trim(
                (string) $rental->status
            )
        );

        $newStatus = strtolower(
            trim(
                (string) $validated['status']
            )
        );


        /**
         * =====================================================
         * COMPLETED TIDAK BOLEH DIUBAH
         * =====================================================
         *
         * completed berarti:
         *
         * barang sudah kembali
         * pengembalian sudah selesai
         * stok sudah dikembalikan
         *
         * Selanjutnya hanya pembayaran.
         */
        if ($currentStatus === 'completed') {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Rental sudah selesai karena barang telah dikembalikan. Status tidak dapat diubah lagi. Silakan lanjutkan pembayaran terakhir.'
                );
        }


        /**
         * =====================================================
         * CANCELLED TIDAK BOLEH DIUBAH
         * =====================================================
         */
        if ($currentStatus === 'cancelled') {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Rental yang sudah dibatalkan tidak dapat diubah kembali.'
                );
        }


        /**
         * =====================================================
         * CEK PENGEMBALIAN
         * =====================================================
         *
         * Jika pengembalian sudah dibuat,
         * perubahan status tidak dilakukan dari halaman Rental.
         */
        $rental->load('pengembalian');

        if ($rental->pengembalian) {

            $statusPengembalian = strtolower(
                trim(
                    (string) $rental
                        ->pengembalian
                        ->status
                )
            );


            if (
                in_array(
                    $statusPengembalian,
                    [
                        'menunggu',
                        'selesai',
                        'menunggu pembayaran',
                        'completed',
                    ],
                    true
                )
            ) {

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Rental sudah memiliki proses pengembalian dan tidak dapat diubah dari halaman Rental.'
                    );
            }
        }


        /**
         * =====================================================
         * TRANSACTION
         * =====================================================
         */
        DB::beginTransaction();

        try {

            /**
             * =================================================
             * LOCK RENTAL
             * =================================================
             */
            $rental = Rental::with([
                'details',
                'pengembalian',
            ])
                ->lockForUpdate()
                ->findOrFail(
                    $rental->id
                );


            $oldStatus = strtolower(
                trim(
                    (string) $rental->status
                )
            );


            /**
             * =================================================
             * PENDING → APPROVED
             * =================================================
             *
             * Saat rental disetujui:
             *
             * - cek stok
             * - kurangi stok
             * - TIDAK ADA PAYMENT
             */
            if (
                $oldStatus === 'pending' &&
                $newStatus === 'approved'
            ) {

                foreach (
                    $rental->details as $detail
                ) {

                    $product =
                        Product::lockForUpdate()
                            ->find(
                                $detail->product_id
                            );


                    if (!$product) {

                        throw new \Exception(
                            'Produk rental tidak ditemukan.'
                        );
                    }


                    if (
                        $product->stock <
                        $detail->quantity
                    ) {

                        DB::rollBack();

                        return back()
                            ->withInput()
                            ->with(
                                'error',
                                'Stok ' .
                                $product->name .
                                ' tidak mencukupi untuk menyetujui rental.'
                            );
                    }


                    $product->decrement(
                        'stock',
                        $detail->quantity
                    );
                }
            }


            /**
             * =================================================
             * APPROVED → CANCELLED
             * =================================================
             *
             * Karena stok sedang digunakan,
             * stok harus dikembalikan.
             */
            if (
                $oldStatus === 'approved' &&
                $newStatus === 'cancelled'
            ) {

                foreach (
                    $rental->details as $detail
                ) {

                    $product =
                        Product::lockForUpdate()
                            ->find(
                                $detail->product_id
                            );


                    if ($product) {

                        $product->increment(
                            'stock',
                            $detail->quantity
                        );
                    }
                }
            }


            /**
             * =================================================
             * PENDING → CANCELLED
             * =================================================
             *
             * Tidak ada perubahan stok.
             */


            /**
             * =================================================
             * UPDATE RENTAL
             * =================================================
             */
            $rental->update([
                'customer_id' =>
                    $validated['customer_id'],

                'status' =>
                    $newStatus,
            ]);


            DB::commit();

            return redirect()
                ->route('rentals.index')
                ->with(
                    'success',
                    'Data transaksi rental berhasil diperbarui.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal memperbarui rental: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * PROSES RETURN LAMA
     * =========================================================
     *
     * Route lama tetap dipertahankan agar tidak error.
     *
     * Pengembalian sebenarnya diproses melalui:
     *
     * PengembalianController
     */
    public function processReturn(Rental $rental)
    {
        $status = strtolower(
            trim(
                (string) $rental->status
            )
        );


        /**
         * =====================================================
         * COMPLETED
         * =====================================================
         */
        if ($status === 'completed') {

            return back()
                ->with(
                    'error',
                    'Rental ini sudah selesai dan siap untuk pembayaran terakhir.'
                );
        }


        /**
         * =====================================================
         * CANCELLED
         * =====================================================
         */
        if ($status === 'cancelled') {

            return back()
                ->with(
                    'error',
                    'Rental yang dibatalkan tidak dapat diproses sebagai pengembalian.'
                );
        }


        /**
         * =====================================================
         * BELUM ADA PENGEMBALIAN
         * =====================================================
         */
        if (!$rental->pengembalian) {

            return back()
                ->with(
                    'error',
                    'Pelanggan belum mengajukan pengembalian.'
                );
        }


        /**
         * =====================================================
         * PENGEMBALIAN SUDAH ADA
         * =====================================================
         */
        return back()
            ->with(
                'error',
                'Silakan proses pengembalian melalui halaman Pengembalian Admin.'
            );
    }


    /**
     * =========================================================
     * HAPUS RENTAL
     * =========================================================
     */
    public function destroy(Rental $rental)
    {
        DB::beginTransaction();

        try {

            $rental->load([
                'details',
                'pengembalian',
                'payments',
            ]);


            /**
             * =================================================
             * HAPUS PAYMENT
             * =================================================
             *
             * Payment hanya mungkin ada pada tahap
             * pembayaran akhir.
             */
            foreach (
                $rental->payments as $payment
            ) {

                PaymentDetail::where(
                    'payment_id',
                    $payment->id
                )->delete();

                $payment->delete();
            }


            /**
             * =================================================
             * CEK STATUS STOK
             * =================================================
             *
             * approved:
             * stok sedang dipakai.
             *
             * pending:
             * stok belum digunakan.
             *
             * cancelled:
             * stok sudah dikembalikan.
             *
             * completed:
             * stok seharusnya sudah dikembalikan
             * melalui proses pengembalian.
             */
            $stokSedangDipakai =
                strtolower(
                    trim(
                        (string) $rental->status
                    )
                ) === 'approved';


            /**
             * =================================================
             * KEMBALIKAN STOK JIKA MASIH DIPAKAI
             * =================================================
             */
            if ($stokSedangDipakai) {

                foreach (
                    $rental->details as $detail
                ) {

                    $product =
                        Product::lockForUpdate()
                            ->find(
                                $detail->product_id
                            );


                    if ($product) {

                        $product->increment(
                            'stock',
                            $detail->quantity
                        );
                    }
                }
            }


            /**
             * =================================================
             * HAPUS PENGEMBALIAN
             * =================================================
             */
            if ($rental->pengembalian) {

                $rental
                    ->pengembalian()
                    ->delete();
            }


            /**
             * =================================================
             * HAPUS DETAIL RENTAL
             * =================================================
             */
            RentalDetail::where(
                'rental_id',
                $rental->id
            )->delete();


            /**
             * =================================================
             * HAPUS RENTAL
             * =================================================
             */
            $rental->delete();


            DB::commit();

            return redirect()
                ->route('rentals.index')
                ->with(
                    'success',
                    'Data transaksi rental berhasil dihapus.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->with(
                    'error',
                    'Gagal menghapus transaksi rental: ' .
                    $e->getMessage()
                );
        }
    }
}