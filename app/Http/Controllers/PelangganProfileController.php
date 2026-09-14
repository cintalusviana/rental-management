<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganProfileController extends Controller
{
    /**
     * =========================================================
     * AMBIL CUSTOMER AKTIF
     * =========================================================
     */
    private function getCustomer()
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN SEDANG MELIHAT AKUN PELANGGAN
        |--------------------------------------------------------------------------
        */

        if (
            session('customer_mode') === true &&
            session()->has('customer_mode_id')
        ) {
            return Customer::with('user')->find(
                session('customer_mode_id')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PELANGGAN LOGIN SENDIRI
        |--------------------------------------------------------------------------
        */

        return Customer::with('user')
            ->where('user_id', Auth::id())
            ->first();
    }


    /**
     * =========================================================
     * HALAMAN PROFILE
     * =========================================================
     */
    public function index()
    {
        $customer = $this->getCustomer();

        if (!$customer) {
            abort(
                403,
                'Data customer tidak ditemukan.'
            );
        }

        return view(
            'pelanggan.profile',
            compact('customer')
        );
    }


    /**
     * =========================================================
     * UPDATE PROFILE
     * =========================================================
     */
    public function update(Request $request)
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
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'name' => 'required|string|max:255',

            'phone' => 'nullable|string|max:20',

            'address' => 'nullable|string',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'old_password' => 'nullable|string',

            'password' => 'nullable|string|min:6|confirmed',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;


        /*
        |--------------------------------------------------------------------------
        | FOTO PROFILE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('photo')) {

            /*
            | Folder:
            | public/uploads/customers
            */

            $uploadPath = public_path('uploads/customers');


            /*
            | Buat folder jika belum ada
            */

            if (!file_exists($uploadPath)) {
                mkdir(
                    $uploadPath,
                    0755,
                    true
                );
            }


            /*
            | Hapus foto lama
            */

            if (
                $customer->photo &&
                file_exists(
                    $uploadPath . '/' . $customer->photo
                )
            ) {
                unlink(
                    $uploadPath . '/' . $customer->photo
                );
            }


            /*
            | Ambil file baru
            */

            $file = $request->file('photo');


            /*
            | Nama file unik
            */

            $filename =
                time()
                . '_'
                . uniqid()
                . '.'
                . $file->getClientOriginalExtension();


            /*
            | Simpan ke:
            | public/uploads/customers
            */

            $file->move(
                $uploadPath,
                $filename
            );


            /*
            | Simpan nama file ke database
            */

            $customer->photo = $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer->save();


        /*
        |--------------------------------------------------------------------------
        | UPDATE NAMA USER
        |--------------------------------------------------------------------------
        |
        | Jangan update email di sini.
        | Email berasal dari tabel users.
        |
        */

        $user = $customer->user;

        if ($user) {

            $user->name = $customer->name;

            /*
            | Email TIDAK diubah
            */

            /*
            |--------------------------------------------------------------------------
            | UPDATE PASSWORD
            |--------------------------------------------------------------------------
            */

            if (
                $request->filled('password')
            ) {

                if (
                    !$request->filled('old_password')
                ) {

                    return back()
                        ->withInput()
                        ->with(
                            'error',
                            'Password lama wajib diisi.'
                        );
                }


                if (
                    !Hash::check(
                        $request->old_password,
                        $user->password
                    )
                ) {

                    return back()
                        ->withInput()
                        ->with(
                            'error',
                            'Password lama tidak sesuai.'
                        );
                }


                $user->password =
                    Hash::make(
                        $request->password
                    );
            }


            $user->save();
        }


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('pelanggan.profile')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }
}