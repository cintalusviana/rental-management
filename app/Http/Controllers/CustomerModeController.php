<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerModeController extends Controller
{
    /**
     * Menampilkan daftar pelanggan
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->get();

        return view('admin.customer-mode.index', compact('customers'));
    }

    /**
     * Admin memilih pelanggan
     */
    public function enter(Customer $customer)
    {
        // Simpan customer yang sedang dilihat
        session([
            'customer_mode' => true,
            'customer_mode_id' => $customer->id,
        ]);

        return redirect()->route('pelanggan.dashboard');
    }

    /**
     * Keluar dari mode pelanggan
     */
    public function exit()
    {
        session()->forget([
            'customer_mode',
            'customer_mode_id',
        ]);

        return redirect()->route('dashboard');
    }
}