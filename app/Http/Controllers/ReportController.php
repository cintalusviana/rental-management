<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Payment;
use App\Exports\ReportsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * =====================================================
     * EXPORT LAPORAN KE EXCEL
     * =====================================================
     */
    public function exportExcel(Request $request)
    {
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
        ]);

        return Excel::download(
            new ReportsExport(
                $request->start_date,
                $request->end_date
            ),
            'laporan-rental.xlsx'
        );
    }


    /**
     * =====================================================
     * EXPORT LAPORAN KE PDF
     * =====================================================
     */
    public function exportPdf(Request $request)
    {
        // =================================================
        // VALIDASI TANGGAL
        // =================================================

        $request->validate([
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
        ]);


        // =================================================
        // TANGGAL FILTER
        // =================================================

        $startDate = $request->start_date;
        $endDate   = $request->end_date;


        // =================================================
        // QUERY RENTAL
        //
        // PERIODE LAPORAN MENGIKUTI rental_date
        // =================================================

        $rentalQuery = Rental::query();

        if ($startDate) {
            $rentalQuery->whereDate(
                'rental_date',
                '>=',
                $startDate
            );
        }

        if ($endDate) {
            $rentalQuery->whereDate(
                'rental_date',
                '<=',
                $endDate
            );
        }


        // =================================================
        // QUERY PAYMENT LUNAS
        //
        // PENTING:
        // Pendapatan mengikuti rental_date,
        // bukan payment_date.
        //
        // Jadi kalau memilih:
        // 01/08/2026 - 31/08/2026
        //
        // maka pendapatan yang ditampilkan adalah
        // pembayaran LUNAS dari rental bulan Agustus.
        // =================================================

        $paymentQuery = Payment::query()
            ->where('payments.payment_status', 'Lunas')
            ->whereHas('rental', function ($query) use (
                $startDate,
                $endDate
            ) {

                if ($startDate) {
                    $query->whereDate(
                        'rental_date',
                        '>=',
                        $startDate
                    );
                }

                if ($endDate) {
                    $query->whereDate(
                        'rental_date',
                        '<=',
                        $endDate
                    );
                }
            });


        // =================================================
        // TOTAL LAPORAN
        // =================================================

        $totalRental = (clone $rentalQuery)
            ->count();


        $totalIncome = (clone $paymentQuery)
            ->sum('payments.amount');


        // =================================================
        // BARANG & PELANGGAN
        //
        // Tetap keseluruhan karena Product dan Customer
        // tidak mempunyai tanggal laporan.
        // =================================================

        $totalProduct = Product::count();

        $totalCustomer = Customer::count();


        // =================================================
        // DATA RENTAL UNTUK PDF
        // =================================================

        $rentals = (clone $rentalQuery)
            ->with([
                'customer',
                'details.product'
            ])
            ->latest('rental_date')
            ->get();


        // =================================================
        // DATA PEMBAYARAN UNTUK PDF
        // =================================================

        $payments = (clone $paymentQuery)
            ->with([
                'rental.customer'
            ])
            ->latest('payment_date')
            ->get();


        // =================================================
        // GENERATE PDF
        // =================================================

        $pdf = Pdf::loadView(
            'reports.pdf',
            compact(
                'totalRental',
                'totalIncome',
                'totalProduct',
                'totalCustomer',
                'rentals',
                'payments',
                'startDate',
                'endDate'
            )
        );

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream(
            'laporan-rental.pdf'
        );
    }


    /**
     * =====================================================
     * HALAMAN LAPORAN
     * =====================================================
     */
    public function index(Request $request)
    {
        // =================================================
        // VALIDASI TANGGAL
        // =================================================

        $request->validate([
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
        ]);


        // =================================================
        // TANGGAL FILTER
        // =================================================

        $startDate = $request->start_date;
        $endDate   = $request->end_date;


        // =================================================
        // QUERY RENTAL
        //
        // SEMUA LAPORAN UTAMA MENGIKUTI rental_date
        // =================================================

        $rentalQuery = Rental::query();


        // Mulai
        if ($startDate) {
            $rentalQuery->whereDate(
                'rental_date',
                '>=',
                $startDate
            );
        }


        // Sampai
        if ($endDate) {
            $rentalQuery->whereDate(
                'rental_date',
                '<=',
                $endDate
            );
        }


        // =================================================
        // QUERY PAYMENT
        //
        // HANYA PEMBAYARAN LUNAS
        //
        // FILTER MENGIKUTI rental_date
        // =================================================

        $paymentQuery = Payment::query()
            ->where('payments.payment_status', 'Lunas')
            ->whereHas('rental', function ($query) use (
                $startDate,
                $endDate
            ) {

                if ($startDate) {
                    $query->whereDate(
                        'rental_date',
                        '>=',
                        $startDate
                    );
                }

                if ($endDate) {
                    $query->whereDate(
                        'rental_date',
                        '<=',
                        $endDate
                    );
                }
            });


        // =================================================
        // CARD PENYEWAAN
        // =================================================

        $totalRental = (clone $rentalQuery)
            ->count();


        // =================================================
        // CARD PENDAPATAN
        // =================================================

        $totalIncome = (clone $paymentQuery)
            ->sum('payments.amount');


        // =================================================
        // CARD BARANG
        // =================================================

        $totalProduct = Product::count();


        // =================================================
        // CARD PELANGGAN
        // =================================================

        $totalCustomer = Customer::count();


        // =================================================
        // DATA GRAFIK
        //
        // PENTING:
        //
        // payments JOIN rentals
        //
        // Filter tanggal menggunakan:
        // rentals.rental_date
        //
        // payment_status WAJIB:
        // payments.payment_status
        //
        // supaya tidak ambiguous.
        // =================================================

        $chartQuery = Payment::query()
            ->join(
                'rentals',
                'payments.rental_id',
                '=',
                'rentals.id'
            )
            ->where(
                'payments.payment_status',
                'Lunas'
            );


        // =================================================
        // FILTER MULAI
        // =================================================

        if ($startDate) {

            $chartQuery->whereDate(
                'rentals.rental_date',
                '>=',
                $startDate
            );
        }


        // =================================================
        // FILTER SAMPAI
        // =================================================

        if ($endDate) {

            $chartQuery->whereDate(
                'rentals.rental_date',
                '<=',
                $endDate
            );
        }


        // =================================================
        // QUERY CHART
        //
        // Tahun + bulan rental
        // =================================================

        $chart = $chartQuery
            ->selectRaw("
                YEAR(rentals.rental_date) as tahun,
                MONTH(rentals.rental_date) as bulan,
                SUM(payments.amount) as pendapatan,
                COUNT(payments.id) as transaksi
            ")
            ->groupByRaw("
                YEAR(rentals.rental_date),
                MONTH(rentals.rental_date)
            ")
            ->orderByRaw("
                YEAR(rentals.rental_date),
                MONTH(rentals.rental_date)
            ")
            ->get();


        // =================================================
        // DATA UNTUK CHART.JS
        // =================================================

        $months = [];

        $incomeData = [];

        $transactionData = [];


        foreach ($chart as $item) {

            // =============================================
            // NAMA BULAN
            // =============================================

            $monthName = date(
                'M',
                mktime(
                    0,
                    0,
                    0,
                    $item->bulan,
                    1
                )
            );


            // =============================================
            // JIKA ADA DATA LEBIH DARI 1 TAHUN
            // tampilkan tahun juga
            // =============================================

            $months[] =
                $monthName . ' ' . $item->tahun;


            // =============================================
            // PENDAPATAN
            // =============================================

            $incomeData[] =
                (int) $item->pendapatan;


            // =============================================
            // TRANSAKSI
            // =============================================

            $transactionData[] =
                (int) $item->transaksi;
        }


        // =================================================
        // VIEW
        // =================================================

        return view(
            'reports.index',
            compact(
                'totalRental',
                'totalIncome',
                'totalProduct',
                'totalCustomer',
                'months',
                'incomeData',
                'transactionData',
                'startDate',
                'endDate'
            )
        );
    }
}