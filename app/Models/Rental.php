<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_code',
        'customer_id',
        'rental_date',
        'return_date',
        'total_price',
        'status',
    ];

    /**
     * =========================================================
     * DURASI SEWA
     * =========================================================
     *
     * Perhitungan inklusif:
     *
     * 21 Aug → 21 Aug = 1 Hari
     * 21 Aug → 22 Aug = 2 Hari
     * 21 Aug → 23 Aug = 3 Hari
     */
    public function getDurationDaysAttribute()
    {
        if (!$this->rental_date || !$this->return_date) {
            return 1;
        }

        return \Carbon\Carbon::parse($this->rental_date)
            ->startOfDay()
            ->diffInDays(
                \Carbon\Carbon::parse($this->return_date)
                    ->startOfDay()
            ) + 1;
    }

    /**
     * =========================================================
     * CUSTOMER
     * =========================================================
     */
    public function customer()
    {
        return $this->belongsTo(
            Customer::class,
            'customer_id'
        );
    }

    /**
     * =========================================================
     * DETAIL RENTAL
     * =========================================================
     */
    public function details()
    {
        return $this->hasMany(
            RentalDetail::class,
            'rental_id'
        );
    }

    /**
     * =========================================================
     * PEMBAYARAN UTAMA
     * =========================================================
     */
    public function payment()
    {
        return $this->hasOne(
            Payment::class,
            'rental_id'
        );
    }

    /**
     * =========================================================
     * SEMUA PAYMENT
     * =========================================================
     */
    public function payments()
    {
        return $this->hasMany(
            Payment::class,
            'rental_id'
        );
    }

    /**
     * =========================================================
     * PENGEMBALIAN
     * =========================================================
     */
    public function pengembalian()
    {
        return $this->hasOne(
            Pengembalian::class,
            'rental_id'
        );
    }
}