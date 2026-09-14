<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerRentalController extends Controller
{
    /**
     * =========================================================
     * AMBIL CUSTOMER AKTIF
     * =========================================================
     *
     * Bisa digunakan untuk:
     *
     * 1. Pelanggan login sendiri
     * 2. Admin sedang masuk mode pelanggan
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
            return Customer::find(
                session('customer_mode_id')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PELANGGAN LOGIN SENDIRI
        |--------------------------------------------------------------------------
        */

        return Customer::where(
            'user_id',
            Auth::id()
        )->first();
    }


    /**
     * =========================================================
     * DATA PENYEWAAN PELANGGAN
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
                404,
                'Data customer tidak ditemukan.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA RENTAL
        |--------------------------------------------------------------------------
        */

        $rentals = Rental::with([
            'details.product',
            'customer',
            'pengembalian',
        ])
        ->where(
            'customer_id',
            $customer->id
        )
        ->latest('created_at')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'pelanggan.rentals',
            compact(
                'rentals',
                'customer'
            )
        );
    }


    /**
     * =========================================================
     * FORM BUAT PENYEWAAN
     * =========================================================
     */
    public function create(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | CEK CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer = $this->getCustomer();

        if (!$customer) {
            abort(
                404,
                'Data customer tidak ditemukan.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK STOK
        |--------------------------------------------------------------------------
        |
        | Stok hanya dicek di tahap pengajuan.
        |
        | STOK BELUM DIKURANGI.
        |
        | Pengurangan stok dilakukan ketika admin menyetujui
        | rental pada RentalController.
        |
        */

        if ($product->stock <= 0) {
            return redirect()
                ->route('pelanggan.products')
                ->with(
                    'error',
                    'Barang sedang tidak tersedia.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'pelanggan.rentals.create',
            compact(
                'product',
                'customer'
            )
        );
    }


    /**
     * =========================================================
     * SIMPAN PENYEWAAN
     * =========================================================
     *
     * ALUR:
     *
     * Pelanggan
     *     ↓
     * Ajukan rental
     *     ↓
     * status = pending
     *     ↓
     * Menunggu persetujuan admin
     *
     * PENTING:
     *
     * Stok TIDAK dikurangi di sini.
     *
     * Stok baru dikurangi ketika admin melakukan approve.
     *
     * Pembayaran juga TIDAK dilakukan di sini.
     * Pembayaran dilakukan pada tahap akhir transaksi.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        |
        | Tidak ada payment_method.
        | Tidak ada proses pembayaran.
        |
        */

        $validated = $request->validate([
            'product_id' => [
                'required',
                'exists:products,id',
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

            'qty' => [
                'required',
                'integer',
                'min:1',
            ],

            'note' => [
                'nullable',
                'string',
            ],
        ]);


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
        | AMBIL PRODUK
        |--------------------------------------------------------------------------
        */

        $product = Product::findOrFail(
            $validated['product_id']
        );


        /*
        |--------------------------------------------------------------------------
        | CEK STOK
        |--------------------------------------------------------------------------
        |
        | Kita tetap mengecek stok supaya pelanggan tidak dapat
        | mengajukan jumlah barang melebihi stok yang tersedia.
        |
        | Tetapi stok TIDAK dikurangi di sini.
        |
        */

        if (
            $product->stock <
            $validated['qty']
        ) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Stok barang tidak mencukupi.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG LAMA SEWA
        |--------------------------------------------------------------------------
        */

        $rentalTimestamp = strtotime(
            $validated['rental_date']
        );

        $returnTimestamp = strtotime(
            $validated['return_date']
        );

        $days = max(
            1,
            ceil(
                (
                    $returnTimestamp -
                    $rentalTimestamp
                ) / 86400
            )
        );


        /*
        |--------------------------------------------------------------------------
        | HITUNG TOTAL SEWA
        |--------------------------------------------------------------------------
        */

        $subtotal =
            $product->price_per_day
            *
            $validated['qty']
            *
            $days;


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI DATABASE
        |--------------------------------------------------------------------------
        */

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | BUAT KODE RENTAL
            |--------------------------------------------------------------------------
            */

            do {

                $rentalCode =
                    'RNT-' .
                    strtoupper(
                        substr(
                            md5(
                                uniqid(
                                    mt_rand(),
                                    true
                                )
                            ),
                            0,
                            6
                        )
                    );

            } while (
                Rental::where(
                    'rental_code',
                    $rentalCode
                )->exists()
            );


            /*
            |--------------------------------------------------------------------------
            | BUAT RENTAL
            |--------------------------------------------------------------------------
            |
            | Status awal:
            |
            | pending
            |
            | Artinya:
            |
            | Pelanggan sudah mengajukan penyewaan,
            | tetapi admin belum menyetujuinya.
            |
            */

            $rental = Rental::create([

                'rental_code' =>
                    $rentalCode,

                'customer_id' =>
                    $customer->id,

                'rental_date' =>
                    $validated['rental_date'],

                'return_date' =>
                    $validated['return_date'],

                'total_price' =>
                    $subtotal,

                'status' =>
                    'pending',
            ]);


            /*
            |--------------------------------------------------------------------------
            | DETAIL RENTAL
            |--------------------------------------------------------------------------
            */

            $rental->details()->create([

                'product_id' =>
                    $product->id,

                'quantity' =>
                    $validated['qty'],

                'price' =>
                    $product->price_per_day,

                'subtotal' =>
                    $subtotal,
            ]);


            /*
            |--------------------------------------------------------------------------
            | STOK TIDAK DIKURANGI DI SINI
            |--------------------------------------------------------------------------
            |
            | PENTING:
            |
            | Sebelumnya terdapat:
            |
            | $product->decrement('stock', $validated['qty']);
            |
            | Baris tersebut DIHAPUS.
            |
            | Karena rental masih pending.
            |
            | Stok baru akan dikurangi ketika ADMIN menyetujui
            | rental melalui RentalController.
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
                    'pelanggan.rentals'
                )
                ->with(
                    'success',
                    'Pengajuan penyewaan berhasil dibuat. Silakan menunggu persetujuan admin.'
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
                    'Penyewaan gagal dibuat: ' .
                    $e->getMessage()
                );
        }
    }
}