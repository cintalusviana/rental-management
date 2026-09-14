<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalians';

    protected $fillable = [
        'rental_id',
        'tanggal_kembali',
        'kondisi',
        'denda_telat',
        'denda_rusak',
        'status',

        // PEMBAYARAN DENDA
        'status_pembayaran_denda',
        'metode_pembayaran_denda',
        'bukti_pembayaran_denda',
        'tanggal_pembayaran_denda',
    ];

    protected $casts = [
        'tanggal_kembali' => 'date',
        'tanggal_pembayaran_denda' => 'date',

        'denda_telat' => 'decimal:2',
        'denda_rusak' => 'decimal:2',
    ];

    /**
     * =========================================================
     * RENTAL
     * =========================================================
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
     * TOTAL DENDA
     * =========================================================
     */
    public function getTotalDendaAttribute()
    {
        return (float) ($this->denda_telat ?? 0)
             + (float) ($this->denda_rusak ?? 0);
    }

    /**
     * =========================================================
     * CEK SUDAH DIKEMBALIKAN
     * =========================================================
     */
    public function getSudahDikembalikanAttribute()
    {
        return !empty($this->tanggal_kembali)
            && $this->status !== 'Menunggu';
    }

    /**
     * =========================================================
     * CEK ADA DENDA
     * =========================================================
     */
    public function getAdaDendaAttribute()
    {
        return $this->total_denda > 0;
    }

    /**
     * =========================================================
     * CEK DENDA SUDAH DIBAYAR
     * =========================================================
     */
    public function getDendaSudahDibayarAttribute()
    {
        return in_array(
            strtolower((string) $this->status_pembayaran_denda),
            [
                'lunas',
                'paid',
                'dibayar',
                'sudah dibayar',
            ],
            true
        );
    }
}