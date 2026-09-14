<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



class AuthenticatedSessionController extends Controller
{


    /**
     * Menampilkan halaman login
     */
    public function create(): View
    {
        return view('auth.login');
    }




    /**
     * Proses login
     */
    public function store(LoginRequest $request): RedirectResponse
    {


        // validasi email dan password
        $request->authenticate();



        // membuat session baru
        $request->session()->regenerate();



        // mengambil user yang login
        $user = Auth::user();



        // cek role user

        if($user->role === 'admin'){

            return redirect()
                ->route('dashboard');

        }




        if($user->role === 'customer'){

            return redirect()
                ->route('pelanggan.dashboard');

        }





        // jika role kosong / tidak sesuai

        Auth::logout();


        return redirect()
            ->route('login')
            ->with(
                'error',
                'Role user belum diatur.'
            );

    }





    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {


        Auth::guard('web')->logout();



        $request->session()->invalidate();



        $request->session()->regenerateToken();



        return redirect('/');

    }


}