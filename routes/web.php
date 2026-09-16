<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ReportController;


/*
|--------------------------------------------------------------------------
| PELANGGAN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\CustomerRentalController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\CustomerPengembalianController;
use App\Http\Controllers\PelangganProfileController;
use App\Http\Controllers\CustomerModeController;


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');


/*
|--------------------------------------------------------------------------
| PRODUK PUBLIK
|--------------------------------------------------------------------------
|
| Digunakan oleh kategori pada landing page.
| Contoh:
| /produk?category=1
|
|--------------------------------------------------------------------------
*/

Route::get(
    '/produk',
    [CustomerProductController::class, 'index']
)->name('produk');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
| Semua route admin membutuhkan login.
|
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [HomeController::class, 'index']
    )->name('dashboard');

    Route::get(
        '/dashboard/export-pdf',
        [HomeController::class, 'exportPdf']
    )->name('dashboard.exportPdf');

    Route::get(
        '/dashboard/export-excel',
        [HomeController::class, 'exportExcel']
    )->name('dashboard.exportExcel');


    /*
    |--------------------------------------------------------------------------
    | KATEGORI
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'categories',
        CategoryController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PRODUK ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'products',
        ProductController::class
    );


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'customers',
        CustomerController::class
    );


    /*
    |--------------------------------------------------------------------------
    | RENTAL ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/rentals',
        [RentalController::class, 'index']
    )->name('rentals.index');

    Route::post(
        '/rentals',
        [RentalController::class, 'store']
    )->name('rentals.store');

    Route::get(
        '/rentals/{rental}/edit',
        [RentalController::class, 'edit']
    )->name('rentals.edit');

    Route::put(
        '/rentals/{rental}',
        [RentalController::class, 'update']
    )->name('rentals.update');

    Route::patch(
        '/rentals/{rental}',
        [RentalController::class, 'update']
    )->name('rentals.update.patch');

    Route::delete(
        '/rentals/{rental}',
        [RentalController::class, 'destroy']
    )->name('rentals.destroy');


    /*
    |--------------------------------------------------------------------------
    | PENGEMBALIAN ADMIN
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/pengembalians',
        [PengembalianController::class, 'store']
    )->name('pengembalians.store');

    Route::delete(
        '/pengembalians/{pengembalian}',
        [PengembalianController::class, 'destroy']
    )->name('pengembalians.destroy');


    /*
    |--------------------------------------------------------------------------
    | PEMBAYARAN ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/payments',
        [PaymentController::class, 'index']
    )->name('payments.index');

    Route::post(
        '/payments',
        [PaymentController::class, 'store']
    )->name('payments.store');

    Route::put(
        '/payments/{payment}/update-status',
        [PaymentController::class, 'updateStatus']
    )->name('payments.updateStatus');


    /*
    |--------------------------------------------------------------------------
    | PRINT PAYMENT ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/payments/{payment}/print',
        [PaymentController::class, 'print']
    )->name('payments.print');


    /*
    |--------------------------------------------------------------------------
    | HAPUS PAYMENT ADMIN
    |--------------------------------------------------------------------------
    */

    Route::delete(
        '/payments/{payment}',
        [PaymentController::class, 'destroy']
    )->name('payments.destroy');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports/export-pdf',
        [ReportController::class, 'exportPdf']
    )->name('reports.exportPdf');

    Route::get(
        '/reports/export-excel',
        [ReportController::class, 'exportExcel']
    )->name('reports.exportExcel');

    Route::resource(
        'reports',
        ReportController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PROFILE ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | MODE ADMIN → PELANGGAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/mode-pelanggan',
        [CustomerModeController::class, 'index']
    )->name('admin.customer-mode.index');

    Route::get(
        '/admin/mode-pelanggan/{customer}',
        [CustomerModeController::class, 'enter']
    )->name('admin.customer-mode.enter');

    Route::get(
        '/admin/keluar-mode-pelanggan',
        [CustomerModeController::class, 'exit']
    )->name('admin.customer-mode.exit');

});


/*
|--------------------------------------------------------------------------
| PELANGGAN
|--------------------------------------------------------------------------
|
| Semua route pelanggan membutuhkan login.
|
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('pelanggan')
    ->name('pelanggan.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD PELANGGAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [CustomerDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | PRODUK
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/products',
            [CustomerProductController::class, 'index']
        )->name('products');

        Route::get(
            '/products/{product}',
            [CustomerProductController::class, 'show']
        )->name('products.show');


        /*
        |--------------------------------------------------------------------------
        | RENTAL PELANGGAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/rentals',
            [CustomerRentalController::class, 'index']
        )->name('rentals');

        Route::get(
            '/rentals/create/{product}',
            [CustomerRentalController::class, 'create']
        )->name('rentals.create');

        Route::post(
            '/rentals',
            [CustomerRentalController::class, 'store']
        )->name('rentals.store');


        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pengembalian',
            [CustomerPengembalianController::class, 'index']
        )->name('pengembalian');

        Route::post(
            '/pengembalian',
            [CustomerPengembalianController::class, 'store']
        )->name('pengembalian.store');

        Route::post(
            '/rentals/return',
            [CustomerPengembalianController::class, 'store']
        )->name('return');


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN PELANGGAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/payments',
            [CustomerPaymentController::class, 'index']
        )->name('payments');

        Route::post(
            '/payments',
            [CustomerPaymentController::class, 'store']
        )->name('payments.store');

        Route::get(
            '/payments/print/{rental}',
            [CustomerPaymentController::class, 'print']
        )->name('payments.print');

        Route::get(
            '/payments/{payment}',
            [CustomerPaymentController::class, 'show']
        )->name('payments.show');


        /*
        |--------------------------------------------------------------------------
        | PROFILE PELANGGAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/profile',
            [PelangganProfileController::class, 'index']
        )->name('profile');

        Route::put(
            '/profile',
            [PelangganProfileController::class, 'update']
        )->name('profile.update');

    });


/*
|--------------------------------------------------------------------------
| TEST
|--------------------------------------------------------------------------
*/

Route::get(
    '/tes',
    function () {
        return 'Laravel masuk';
    }
)->name('tes');


/*
|--------------------------------------------------------------------------
| BUKTI PEMBAYARAN
|--------------------------------------------------------------------------
*/

Route::get(
    '/payment-proof/{filename}',
    function ($filename) {

        $filename = basename($filename);

        $path = storage_path(
            'app/public/payments/' . $filename
        );

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);

    }
)->name('payment.proof');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';