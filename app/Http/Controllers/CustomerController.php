<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * =========================================================
     * DATA PELANGGAN
     * =========================================================
     */
    public function index()
    {
        $customers = Customer::withCount('rentals')
            ->latest()
            ->get();

        return view('customers.index', compact('customers'));
    }


    /**
     * =========================================================
     * TAMBAH PELANGGAN
     * =========================================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:100',
            'phone'   => 'required|max:20',
            'email'   => 'nullable|email|unique:users,email',
            'address' => 'nullable',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'  => 'required'
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        $photo = null;

        if ($request->hasFile('photo')) {

            $photo = time() . '.' . $request->photo->extension();

            $request->photo->move(
                public_path('uploads/customers'),
                $photo
            );
        }


        /*
        |--------------------------------------------------------------------------
        | BUAT AKUN USER PELANGGAN
        |--------------------------------------------------------------------------
        |
        | Jika email diisi, otomatis dibuatkan akun user.
        |
        */

        $user = null;

        if ($request->filled('email')) {

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make('12345678'),
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA CUSTOMER
        |--------------------------------------------------------------------------
        */

        Customer::create([
            'user_id' => $user?->id,
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'address' => $request->address,
            'photo'   => $photo,
            'status'  => $request->status,
        ]);


        return back()->with(
            'success',
            'Data pelanggan berhasil ditambahkan.'
        );
    }


    /**
     * =========================================================
     * UPDATE PELANGGAN
     * =========================================================
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'    => 'required|max:100',
            'phone'   => 'required|max:20',
            'email'   => 'nullable|email|unique:users,email,' . ($customer->user_id ?? 'NULL'),
            'address' => 'nullable',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'  => 'required'
        ]);


        /*
        |--------------------------------------------------------------------------
        | FOTO LAMA
        |--------------------------------------------------------------------------
        */

        $photo = $customer->photo;


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('photo')) {

            if (
                $customer->photo &&
                File::exists(
                    public_path(
                        'uploads/customers/' . $customer->photo
                    )
                )
            ) {

                File::delete(
                    public_path(
                        'uploads/customers/' . $customer->photo
                    )
                );
            }


            $photo = time() . '.' . $request->photo->extension();

            $request->photo->move(
                public_path('uploads/customers'),
                $photo
            );
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE AKUN USER
        |--------------------------------------------------------------------------
        */

        if ($customer->user_id) {

            $user = User::find($customer->user_id);

            if ($user) {

                $user->update([
                    'name'  => $request->name,
                    'email' => $request->email,
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer->update([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'address' => $request->address,
            'photo'   => $photo,
            'status'  => $request->status,
        ]);


        return back()->with(
            'success',
            'Data pelanggan berhasil diubah.'
        );
    }


    /**
     * =========================================================
     * HAPUS PELANGGAN
     * =========================================================
     */
    public function destroy(Customer $customer)
    {
        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO
        |--------------------------------------------------------------------------
        */

        if (
            $customer->photo &&
            File::exists(
                public_path(
                    'uploads/customers/' . $customer->photo
                )
            )
        ) {

            File::delete(
                public_path(
                    'uploads/customers/' . $customer->photo
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS USER
        |--------------------------------------------------------------------------
        */

        if ($customer->user_id) {

            $user = User::find($customer->user_id);

            if ($user) {
                $user->delete();
            }
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer->delete();


        return back()->with(
            'success',
            'Data pelanggan berhasil dihapus.'
        );
    }


    /**
     * =========================================================
     * MASUK SEBAGAI PELANGGAN
     * =========================================================
     *
     * Admin memilih pelanggan kemudian masuk ke dashboard
     * pelanggan tersebut.
     *
     */
    public function loginAs(Customer $customer)
    {
        /*
        |--------------------------------------------------------------------------
        | CEK AKUN USER
        |--------------------------------------------------------------------------
        */

        if (!$customer->user_id) {

            return back()->with(
                'error',
                'Pelanggan ini belum memiliki akun user.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CARI USER
        |--------------------------------------------------------------------------
        */

        $user = User::find($customer->user_id);


        if (!$user) {

            return back()->with(
                'error',
                'Akun user pelanggan tidak ditemukan.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN ID ADMIN
        |--------------------------------------------------------------------------
        |
        | Supaya nanti admin bisa kembali ke akun admin.
        |
        */

        $adminId = Auth::id();

        session([
            'admin_impersonating' => true,
            'admin_id'            => $adminId,
        ]);


        /*
        |--------------------------------------------------------------------------
        | LOGIN SEBAGAI PELANGGAN
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        request()->session()->regenerate();


        return redirect()
            ->route('pelanggan.dashboard')
            ->with(
                'success',
                'Anda sekarang masuk sebagai ' . $customer->name
            );
    }


    /**
     * =========================================================
     * KEMBALI KE AKUN ADMIN
     * =========================================================
     */

    public function backToAdmin()
    {
        /*
        |--------------------------------------------------------------------------
        | CEK SESSION ADMIN
        |--------------------------------------------------------------------------
        */

        if (!session()->has('admin_id')) {

            return redirect()
                ->route('pelanggan.dashboard')
                ->with(
                    'error',
                    'Session admin tidak ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL ID ADMIN
        |--------------------------------------------------------------------------
        */

        $adminId = session('admin_id');


        /*
        |--------------------------------------------------------------------------
        | CARI ADMIN
        |--------------------------------------------------------------------------
        */

        $admin = User::find($adminId);


        if (!$admin) {

            session()->forget([
                'admin_impersonating',
                'admin_id'
            ]);

            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Akun admin tidak ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN KEMBALI SEBAGAI ADMIN
        |--------------------------------------------------------------------------
        */

        Auth::login($admin);

        request()->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION IMPERSONATE
        |--------------------------------------------------------------------------
        */

        session()->forget([
            'admin_impersonating',
            'admin_id'
        ]);


        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Berhasil kembali ke akun admin.'
            );
    }
}