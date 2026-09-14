<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Rental;
use App\Models\Payment;

use App\Exports\DashboardExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    /**
     * =====================================================
     * DASHBOARD
     * =====================================================
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        $startDate = $request->start_date;
        $endDate   = $request->end_date;


        /*
        |--------------------------------------------------------------------------
        | TOTAL BARANG
        |--------------------------------------------------------------------------
        */

        $totalProducts = Product::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL CUSTOMER
        |--------------------------------------------------------------------------
        */

        $totalCustomers = Customer::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL RENTAL
        |--------------------------------------------------------------------------
        */

        $totalRentals = Rental::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL KATEGORI
        |--------------------------------------------------------------------------
        */

        $totalCategories = Category::count();


        /*
        |--------------------------------------------------------------------------
        | BARANG TERSEDIA
        |--------------------------------------------------------------------------
        */

        $availableProducts = Product::where(
            'stock',
            '>',
            0
        )->count();


        /*
        |--------------------------------------------------------------------------
        | QUERY PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $paymentQuery = Payment::where(
            'payment_status',
            'Lunas'
        );


        if ($startDate && $endDate) {

            $paymentQuery->whereBetween(
                'payment_date',
                [
                    $startDate,
                    $endDate
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL PENDAPATAN
        |--------------------------------------------------------------------------
        */

        $totalIncome = (clone $paymentQuery)
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | PENDAPATAN BULANAN
        |--------------------------------------------------------------------------
        */

        $monthlyIncome = Payment::selectRaw("
                MONTH(payment_date) as month,
                SUM(amount) as total
            ")
            ->where(
                'payment_status',
                'Lunas'
            )
            ->whereYear(
                'payment_date',
                now()->year
            )
            ->groupByRaw(
                "MONTH(payment_date)"
            )
            ->orderByRaw(
                "MONTH(payment_date)"
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | VOLUME TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $transactionVolume = (clone $paymentQuery)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI BULANAN
        |--------------------------------------------------------------------------
        */

        $monthlyTransaction = Payment::selectRaw("
                MONTH(payment_date) as month,
                COUNT(id) as total
            ")
            ->where(
                'payment_status',
                'Lunas'
            )
            ->whereYear(
                'payment_date',
                now()->year
            )
            ->groupByRaw(
                "MONTH(payment_date)"
            )
            ->orderByRaw(
                "MONTH(payment_date)"
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RENTAL TERBARU
        |--------------------------------------------------------------------------
        */

        $recentRentalsQuery = Rental::with(
            'customer'
        );


        if ($startDate && $endDate) {

            $recentRentalsQuery->whereBetween(
                'rental_date',
                [
                    $startDate,
                    $endDate
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HANYA 5 RENTAL DI DASHBOARD
        |--------------------------------------------------------------------------
        */

        $recentRentals = $recentRentalsQuery
            ->latest('rental_date')
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STOK RENDAH
        |--------------------------------------------------------------------------
        */

        $lowStockData = Product::where(
            'stock',
            '<=',
            5
        )
            ->orderBy(
                'stock',
                'asc'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | JUMLAH STOK RENDAH
        |--------------------------------------------------------------------------
        */

        $lowStockCount = $lowStockData->count();


        /*
        |--------------------------------------------------------------------------
        | HANYA 5 DATA DI DASHBOARD
        |--------------------------------------------------------------------------
        */

        $lowStock = $lowStockData->take(5);


        /*
        |--------------------------------------------------------------------------
        | RETURN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'dashboard',
            compact(
                'totalProducts',
                'totalCustomers',
                'totalRentals',
                'totalCategories',
                'availableProducts',

                'totalIncome',
                'monthlyIncome',

                'transactionVolume',
                'monthlyTransaction',

                'recentRentals',

                'lowStock',
                'lowStockCount',

                'startDate',
                'endDate'
            )
        );
    }


    /**
     * =====================================================
     * EXPORT PDF DASHBOARD
     * =====================================================
     */
    public function exportPdf(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        $startDate = $request->start_date;
        $endDate   = $request->end_date;


        /*
        |--------------------------------------------------------------------------
        | TOTAL BARANG
        |--------------------------------------------------------------------------
        */

        $totalProducts = Product::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL CUSTOMER
        |--------------------------------------------------------------------------
        */

        $totalCustomers = Customer::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL RENTAL
        |--------------------------------------------------------------------------
        */

        $totalRentals = Rental::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL KATEGORI
        |--------------------------------------------------------------------------
        */

        $totalCategories = Category::count();


        /*
        |--------------------------------------------------------------------------
        | BARANG TERSEDIA
        |--------------------------------------------------------------------------
        */

        $availableProducts = Product::where(
            'stock',
            '>',
            0
        )->count();


        /*
        |--------------------------------------------------------------------------
        | QUERY PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $paymentQuery = Payment::where(
            'payment_status',
            'Lunas'
        );


        if ($startDate && $endDate) {

            $paymentQuery->whereBetween(
                'payment_date',
                [
                    $startDate,
                    $endDate
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL PENDAPATAN
        |--------------------------------------------------------------------------
        */

        $totalIncome = (clone $paymentQuery)
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | JUMLAH TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $transactionVolume = (clone $paymentQuery)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | RENTAL TERBARU
        |--------------------------------------------------------------------------
        */

        $recentRentalsQuery = Rental::with(
            'customer'
        );


        if ($startDate && $endDate) {

            $recentRentalsQuery->whereBetween(
                'rental_date',
                [
                    $startDate,
                    $endDate
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL 10 RENTAL UNTUK PDF
        |--------------------------------------------------------------------------
        */

        $recentRentals = $recentRentalsQuery
            ->latest('rental_date')
            ->take(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STOK HAMPIR HABIS
        |--------------------------------------------------------------------------
        */

        $lowStock = Product::where(
            'stock',
            '<=',
            5
        )
            ->orderBy(
                'stock',
                'asc'
            )
            ->take(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA YANG DIKIRIM KE VIEW PDF
        |--------------------------------------------------------------------------
        */

        $data = [

            'totalProducts' => $totalProducts,

            'totalCustomers' => $totalCustomers,

            'totalRentals' => $totalRentals,

            'totalCategories' => $totalCategories,

            'availableProducts' => $availableProducts,

            'totalIncome' => $totalIncome,

            'transactionVolume' => $transactionVolume,

            'recentRentals' => $recentRentals,

            'lowStock' => $lowStock,

            'startDate' => $startDate,

            'endDate' => $endDate,

        ];


        /*
        |--------------------------------------------------------------------------
        | LOAD VIEW PDF
        |--------------------------------------------------------------------------
        |
        | File:
        |
        | resources/views/dashboard-export.blade.php
        |
        */

        $pdf = Pdf::loadView(
            'dashboard-export',
            $data
        );


        /*
        |--------------------------------------------------------------------------
        | UKURAN KERTAS
        |--------------------------------------------------------------------------
        */

        $pdf->setPaper(
            'a4',
            'landscape'
        );


        /*
        |--------------------------------------------------------------------------
        | DOWNLOAD PDF
        |--------------------------------------------------------------------------
        */

        return $pdf->download(
            'dashboard-rental-' .
            now()->format('Y-m-d') .
            '.pdf'
        );
    }


    /**
     * =====================================================
     * EXPORT EXCEL DASHBOARD
     * =====================================================
     */
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new DashboardExport(
                $request->start_date,
                $request->end_date
            ),
            'dashboard-rental.xlsx'
        );
    }
}