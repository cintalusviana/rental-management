<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Rental;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    /**
     * =========================================================
     * PROSES PENGEMBALIAN OLEH ADMIN
     * =========================================================
     *
     * ALUR FINAL:
     *
     * pending
     *     ↓
     * approved
     *     ↓
     * sedang disewa
     *     ↓
     * pelanggan mengajukan pengembalian
     *     ↓
     * Pengembalian = Menunggu
     *     ↓
     * admin proses
     *     ↓
     * hitung denda
     *     ↓
     * stok dikembalikan
     *     ↓
     * Rental = completed
     *     ↓
     * pembayaran akhir
     *     ↓
     * Lunas
     *
     * CATATAN:
     * Controller ini TIDAK membuat Payment.
     *
     * Jika ada denda, denda hanya dicatat di tabel
     * pengembalians dan akan ikut dibayar melalui
     * pembayaran akhir rental.
     */
    public function store(Request $request)
    {
        /**
         * =====================================================
         * VALIDASI
         * =====================================================
         */
        $validated = $request->validate([
            'rental_id' => [
                'required',
                'exists:rentals,id',
            ],

            'tanggal_kembali' => [
                'required',
                'date',
            ],

            'kondisi' => [
                'required',
                'in:Baik,Rusak Ringan,Rusak Berat',
            ],
        ]);


        DB::beginTransaction();

        try {

            /**
             * =================================================
             * AMBIL RENTAL + LOCK
             * =================================================
             */
            $rental = Rental::with([
                'details.product',
                'pengembalian',
            ])
                ->lockForUpdate()
                ->findOrFail(
                    $validated['rental_id']
                );


            /**
             * =================================================
             * NORMALISASI STATUS RENTAL
             * =================================================
             */
            $statusRental = strtolower(
                trim(
                    (string) $rental->status
                )
            );


            /**
             * =================================================
             * CANCELLED
             * =================================================
             */
            if ($statusRental === 'cancelled') {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Rental yang dibatalkan tidak dapat diproses sebagai pengembalian.'
                    );
            }


            /**
             * =================================================
             * COMPLETED
             * =================================================
             */
            if ($statusRental === 'completed') {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Rental ini sudah selesai dan tidak dapat diproses kembali.'
                    );
            }


            /**
             * =================================================
             * HARUS APPROVED
             * =================================================
             *
             * approved = barang sedang disewa.
             */
            if ($statusRental !== 'approved') {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Rental belum berstatus sedang disewa.'
                    );
            }


            /**
             * =================================================
             * CEK PENGEMBALIAN LAMA
             * =================================================
             */
            $pengembalianLama = $rental->pengembalian;


            $statusPengembalianLama = $pengembalianLama
                ? strtolower(
                    trim(
                        (string) $pengembalianLama->status
                    )
                )
                : null;


            /**
             * =================================================
             * SUDAH SELESAI
             * =================================================
             */
            if (
                in_array(
                    $statusPengembalianLama,
                    [
                        'selesai',
                        'menunggu pembayaran',
                    ],
                    true
                )
            ) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Pengembalian ini sudah diproses sebelumnya.'
                    );
            }


            /**
             * =================================================
             * TANGGAL KEMBALI
             * =================================================
             */
            $tanggalKembali = Carbon::parse(
                $validated['tanggal_kembali']
            );


            /**
             * =================================================
             * TANGGAL BATAS KEMBALI
             * =================================================
             */
            $tanggalBatas = null;

            if ($rental->return_date) {

                $tanggalBatas = Carbon::parse(
                    $rental->return_date
                );
            }


            /**
             * =================================================
             * DENDA KETERLAMBATAN
             * =================================================
             *
             * Rp25.000 / hari.
             */
            $dendaTelat = 0;
            $hariTerlambat = 0;

            if (
                $tanggalBatas &&
                $tanggalKembali->greaterThan(
                    $tanggalBatas
                )
            ) {

                $hariTerlambat = $tanggalBatas->diffInDays(
                    $tanggalKembali
                );

                $dendaTelat =
                    $hariTerlambat * 25000;
            }


            /**
             * =================================================
             * DENDA KERUSAKAN
             * =================================================
             *
             * Baik         = Rp0
             * Rusak Ringan = Rp0
             * Rusak Berat  = Rp100.000
             */
            $dendaRusak = 0;

            if (
                $validated['kondisi'] === 'Rusak Berat'
            ) {

                $dendaRusak = 100000;
            }


            /**
             * =================================================
             * TOTAL DENDA
             * =================================================
             */
            $totalDenda =
                $dendaTelat +
                $dendaRusak;


            /**
             * =================================================
             * STATUS PENGEMBALIAN
             * =================================================
             *
             * Tanpa denda:
             * Selesai
             *
             * Dengan denda:
             * Menunggu Pembayaran
             *
             * Pembayaran denda tidak dilakukan di sini.
             * Denda akan masuk ke pembayaran akhir rental.
             */
            $statusPengembalian =
                $totalDenda > 0
                    ? 'Menunggu Pembayaran'
                    : 'Selesai';


            /**
             * =================================================
             * STATUS PEMBAYARAN DENDA
             * =================================================
             *
             * Ini hanya sebagai penanda kewajiban denda.
             *
             * Belum Lunas
             *     ↓
             * dibayar melalui pembayaran akhir
             *     ↓
             * Lunas
             *
             * Kalau tidak ada denda:
             * Tidak Ada Denda
             */
            $statusPembayaranDenda =
                $totalDenda > 0
                    ? 'Belum Lunas'
                    : 'Tidak Ada Denda';


            /**
             * =================================================
             * DATA PENGEMBALIAN
             * =================================================
             */
            $dataPengembalian = [

                'rental_id' =>
                    $rental->id,

                'tanggal_kembali' =>
                    $validated['tanggal_kembali'],

                'kondisi' =>
                    $validated['kondisi'],

                'denda_telat' =>
                    $dendaTelat,

                'denda_rusak' =>
                    $dendaRusak,

                'status' =>
                    $statusPengembalian,

                'status_pembayaran_denda' =>
                    $statusPembayaranDenda,

                /**
                 * Belum ada pembayaran denda
                 * karena pembayaran dilakukan
                 * melalui pembayaran akhir.
                 */
                'metode_pembayaran_denda' =>
                    null,

                'bukti_pembayaran_denda' =>
                    null,

                'tanggal_pembayaran_denda' =>
                    null,
            ];


            /**
             * =================================================
             * CREATE / UPDATE PENGEMBALIAN
             * =================================================
             *
             * Jika pelanggan sudah mengajukan pengembalian
             * dengan status Menunggu, admin cukup UPDATE.
             */
            if ($pengembalianLama) {

                $pengembalianLama->update(
                    $dataPengembalian
                );

                $pengembalian =
                    $pengembalianLama;

            } else {

                $pengembalian =
                    Pengembalian::create(
                        $dataPengembalian
                    );
            }


            /**
             * =================================================
             * KEMBALIKAN STOK
             * =================================================
             *
             * Rental sebelumnya approved,
             * berarti stok sedang digunakan.
             *
             * Setelah barang diterima admin,
             * stok dikembalikan.
             */
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


                $product->increment(
                    'stock',
                    $detail->quantity
                );
            }


            /**
             * =================================================
             * RENTAL → COMPLETED
             * =================================================
             *
             * Setelah barang dikembalikan,
             * rental selesai.
             *
             * Payment BELUM dibuat.
             */
            $rental->update([
                'status' => 'completed',
            ]);


            /**
             * =================================================
             * COMMIT
             * =================================================
             */
            DB::commit();


            /**
             * =================================================
             * PESAN HASIL
             * =================================================
             */
            if ($totalDenda > 0) {

                return redirect()
                    ->route('rentals.index')
                    ->with(
                        'success',
                        'Pengembalian berhasil diproses. Rental telah selesai dengan total denda Rp ' .
                        number_format(
                            $totalDenda,
                            0,
                            ',',
                            '.'
                        ) .
                        '. Denda akan digabungkan ke pembayaran akhir.'
                    );
            }


            return redirect()
                ->route('rentals.index')
                ->with(
                    'success',
                    'Pengembalian berhasil diproses. Rental telah selesai dan dapat dilanjutkan ke pembayaran akhir.'
                );


        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal memproses pengembalian: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * HAPUS PENGEMBALIAN
     * =========================================================
     *
     * Jika pengembalian dihapus:
     *
     * completed
     *     ↓
     * approved
     *
     * stok dikurangi kembali karena barang dianggap
     * sedang disewa lagi.
     */
    public function destroy(
        Pengembalian $pengembalian
    ) {

        DB::beginTransaction();

        try {

            /**
             * =================================================
             * AMBIL RENTAL
             * =================================================
             */
            $rental = $pengembalian
                ->rental()
                ->with('details')
                ->lockForUpdate()
                ->first();


            /**
             * =================================================
             * JIKA RENTAL TIDAK ADA
             * =================================================
             */
            if (!$rental) {

                throw new \Exception(
                    'Rental terkait pengembalian tidak ditemukan.'
                );
            }


            /**
             * =================================================
             * STATUS PENGEMBALIAN
             * =================================================
             */
            $statusPengembalian = strtolower(
                trim(
                    (string) $pengembalian->status
                )
            );


            /**
             * =================================================
             * CEK APAKAH STOK SUDAH DIKEMBALIKAN
             * =================================================
             */
            $sudahMengembalikanStok =
                in_array(
                    $statusPengembalian,
                    [
                        'selesai',
                        'menunggu pembayaran',
                    ],
                    true
                );


            /**
             * =================================================
             * KEMBALIKAN STATUS PEMBAYARAN
             * =================================================
             *
             * Jika pembayaran denda sudah Lunas,
             * sebaiknya pengembalian tidak boleh dihapus
             * karena transaksi pembayaran sudah terkait.
             */
            $statusPembayaranDenda = strtolower(
                trim(
                    (string)
                    $pengembalian->status_pembayaran_denda
                )
            );


            if (
                in_array(
                    $statusPembayaranDenda,
                    [
                        'lunas',
                        'paid',
                        'dibayar',
                    ],
                    true
                )
            ) {

                DB::rollBack();

                return back()
                    ->with(
                        'error',
                        'Pengembalian tidak dapat dihapus karena pembayaran denda sudah lunas.'
                    );
            }


            /**
             * =================================================
             * KURANGI STOK KEMBALI
             * =================================================
             *
             * Barang sebelumnya sudah dikembalikan.
             *
             * Jika pengembalian dibatalkan,
             * barang dianggap kembali sedang disewa.
             */
            if (
                $sudahMengembalikanStok
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

                        throw new \Exception(
                            'Stok produk tidak mencukupi untuk membatalkan proses pengembalian.'
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
             * HAPUS PENGEMBALIAN
             * =================================================
             */
            $pengembalian->delete();


            /**
             * =================================================
             * RENTAL → APPROVED
             * =================================================
             */
            $rental->update([
                'status' => 'approved',
            ]);


            /**
             * =================================================
             * COMMIT
             * =================================================
             */
            DB::commit();


            return redirect()
                ->route('rentals.index')
                ->with(
                    'success',
                    'Data pengembalian berhasil dihapus dan rental kembali berstatus sedang disewa.'
                );


        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->with(
                    'error',
                    'Gagal menghapus data pengembalian: ' .
                    $e->getMessage()
                );
        }
    }
}