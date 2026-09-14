<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use App\Models\Product;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $table = 'payment_details';

    protected $fillable = [
        'payment_id',
        'product_id',
        'qty',
        'price',
    ];

    protected $casts = [
        'qty' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * =========================================================
     * RELASI KE PAYMENT
     * =========================================================
     */
    public function payment()
    {
        return $this->belongsTo(
            Payment::class,
            'payment_id'
        );
    }

    /**
     * =========================================================
     * RELASI KE PRODUCT
     * =========================================================
     */
    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id'
        );
    }
}