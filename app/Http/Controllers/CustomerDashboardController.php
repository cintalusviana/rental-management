<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    /**
     * Dashboard Pelanggan
     *
     * Bisa digunakan untuk:
     * 1. Pelanggan login normal
     * 2. Admin melihat dashboard pelanggan tertentu
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TENTUKAN CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer = null;

        /*
        |--------------------------------------------------------------------------
        | MODE ADMIN MELIHAT PELANGGAN
        |--------------------------------------------------------------------------
        |
        | Jika admin sudah memilih pelanggan melalui menu
        | "Lihat sebagai Pelanggan", customer diambil dari session.
        |
        */

        if (
            session('customer_mode') === true &&
            session()->has('customer_mode_id')
        ) {

            $customer = Customer::find(
                session('customer_mode_id')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN NORMAL PELANGGAN
        |--------------------------------------------------------------------------
        |
        | Jika tidak sedang dalam mode admin,
        | ambil customer berdasarkan user yang sedang login.
        |
        */

        else {

            $user = Auth::user();

            if ($user) {

                $customer = $user->customer;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | CUSTOMER TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$customer) {

            return redirect()
                ->route('dashboard')
                ->with(
                    'error',
                    'Silakan pilih pelanggan terlebih dahulu untuk masuk ke mode pelanggan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA RENTAL CUSTOMER
        |--------------------------------------------------------------------------
        */

        $rentals = Rental::with([
            'details.product',
            'customer'
        ])
        ->where('customer_id', $customer->id)
        ->latest()
        ->get();

        /*
        |--------------------------------------------------------------------------
        | PRODUK YANG PERNAH DISEWA
        |--------------------------------------------------------------------------
        */

        $products = $rentals
            ->flatMap(function ($rental) {

                return $rental->details->map(function ($detail) {

                    return $detail->product;
                });
            })
            ->filter()
            ->unique('id')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalRentals = $rentals->count();

        $activeRentals = $rentals
            ->whereIn('status', [
                'pending',
                'approved'
            ])
            ->count();

        $totalPayment = $rentals->sum('total_price');

        /*
        |--------------------------------------------------------------------------
        | CUSTOMER MODE
        |--------------------------------------------------------------------------
        */

        $customerMode = session('customer_mode') === true;

        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view('pelanggan.dashboard', compact(
            'customer',
            'rentals',
            'products',
            'totalRentals',
            'activeRentals',
            'totalPayment',
            'customerMode'
        ));
    }
}