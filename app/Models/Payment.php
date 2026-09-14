<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'payment_code',
        'payment_method',
        'payment_status',
        'amount',
        'payment_date',
        'proof',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount'       => 'decimal:2',
    ];

    /**
     * =========================================================
     * RENTAL
     * =========================================================
     *
     * Setiap payment milik satu rental.
     */
    public function rental()
    {
        return $this->belongsTo(
            Rental::class,
            'rental_id'
        );
    }

    /**
     * =========================================================
     * PAYMENT DETAIL
     * =========================================================
     *
     * Detail tambahan pembayaran jika digunakan.
     */
    public function details()
    {
        return $this->hasMany(
            PaymentDetail::class,
            'payment_id'
        );
    }

    /**
     * =========================================================
     * CUSTOMER
     * =========================================================
     *
     * Customer didapat melalui rental.
     */
    public function customer()
    {
        return $this->hasOneThrough(
            Customer::class,
            Rental::class,
            'id',
            'id',
            'rental_id',
            'customer_id'
        );
    }

    /**
     * =========================================================
     * STATUS HELPER
     * =========================================================
     */

    public function isPending(): bool
    {
        return strtolower(
            trim(
                (string) $this->payment_status
            )
        ) === 'menunggu';
    }

    public function isPaid(): bool
    {
        return strtolower(
            trim(
                (string) $this->payment_status
            )
        ) === 'lunas';
    }

    public function isRejected(): bool
    {
        return strtolower(
            trim(
                (string) $this->payment_status
            )
        ) === 'ditolak';
    }

    /**
     * =========================================================
     * FORMAT JUMLAH
     * =========================================================
     */
    public function getFormattedAmountAttribute()
    {
        return number_format(
            (float) $this->amount,
            0,
            ',',
            '.'
        );
    }
}