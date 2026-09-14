<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | HALAMAN PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {

        // Semua pembayaran
        $payments = Payment::with([
            'rental.customer',
            'details.product'
        ])
        ->latest()
        ->get();

        // Detail pembayaran yang dipilih
        $selected = null;

        if ($request->filled('payment')) {

            $selected = Payment::with([
                'rental.customer',
                'details.product'
            ])->find($request->payment);

        }

        if (!$selected) {

            $selected = $payments->first();

        }

        // Data rental untuk dropdown pembayaran
        // Hanya rental yang belum memiliki pembayaran
        $rentals = Rental::with([
                'customer',
                'details.product'
            ])
            ->whereDoesntHave('payment')
            ->latest()
            ->get();

        return view(
            'payments.index',
            compact(
                'payments',
                'rentals',
                'selected'
            )
        );

    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN PEMBAYARAN
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
{
    $request->validate([
        'rental_id'        => 'required|exists:rentals,id',
        'payment_method'   => 'required',
        'payment_status'   => 'required',
        'proof'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA RENTAL
        |--------------------------------------------------------------------------
        */

        $rental = Rental::with([
            'customer',
            'details.product'
        ])->findOrFail($request->rental_id);

        /*
        |--------------------------------------------------------------------------
        | CEK PEMBAYARAN GANDA
        |--------------------------------------------------------------------------
        */

        if (Payment::where('rental_id', $rental->id)->exists()) {

            return back()->with(
                'error',
                'Rental ini sudah memiliki pembayaran.'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | UPLOAD BUKTI PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $proof = null;

        if ($request->hasFile('proof')) {

            $folder = public_path('uploads/payment');

            if (!file_exists($folder)) {

                mkdir($folder, 0777, true);

            }

            $file = $request->file('proof');

            $proof = time().'_'.$file->getClientOriginalName();

            $file->move($folder, $proof);

        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $payment = Payment::create([

            'rental_id'      => $rental->id,
            'payment_code'   => 'PAY-'.strtoupper(Str::random(8)),
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'amount'         => $rental->total_price,
            'payment_date'   => now(),
            'proof'          => $proof,

        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DETAIL PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        foreach ($rental->details as $detail) {

            PaymentDetail::create([

                'payment_id' => $payment->id,

                'product_id' => $detail->product_id,

                // SESUAI DENGAN MIGRATION
                'qty' => $detail->quantity,

                'price' => $detail->price,

            ]);

        }

        DB::commit();

        return redirect()
            ->route('payments.index', [
                'payment' => $payment->id
            ])
            ->with(
                'success',
                'Pembayaran berhasil ditambahkan.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with(
                'error',
                'Terjadi kesalahan: '.$e->getMessage()
            );

    }
}

/*
|--------------------------------------------------------------------------
| UPDATE STATUS PEMBAYARAN
|--------------------------------------------------------------------------
*/

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required'
    ]);

    DB::beginTransaction();

    try {

        $payment = Payment::with('rental')->findOrFail($id);

        $payment->update([
            'payment_status' => $request->status
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS RENTAL
        |--------------------------------------------------------------------------
        */

        if ($request->status == 'Lunas') {

            $payment->rental->update([
                'status' => 'completed'
            ]);

        } else {

            $payment->rental->update([
                'status' => 'approved'
            ]);

        }

        DB::commit();

        return back()->with(
            'success',
            'Status pembayaran berhasil diperbarui.'
        );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            'Terjadi kesalahan: '.$e->getMessage()
        );

    }
}

/*
|--------------------------------------------------------------------------
| HAPUS PEMBAYARAN
|--------------------------------------------------------------------------
*/

public function destroy($id)
{
    DB::beginTransaction();

    try {

        $payment = Payment::with('rental')->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | HAPUS DETAIL PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        PaymentDetail::where(
            'payment_id',
            $payment->id
        )->delete();

        /*
        |--------------------------------------------------------------------------
        | HAPUS FILE BUKTI
        |--------------------------------------------------------------------------
        */

        if (
            $payment->proof &&
            file_exists(
                public_path('uploads/payment/' . $payment->proof)
            )
        ) {

            unlink(
                public_path('uploads/payment/' . $payment->proof)
            );

        }

        /*
        |--------------------------------------------------------------------------
        | KEMBALIKAN STATUS RENTAL
        |--------------------------------------------------------------------------
        */

        if ($payment->rental) {

            $payment->rental->update([
                'status' => 'approved'
            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $payment->delete();

        DB::commit();

        return redirect()
            ->route('payments.index')
            ->with(
                'success',
                'Pembayaran berhasil dihapus.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            'Terjadi kesalahan: ' . $e->getMessage()
        );

    }
}

}