<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel payments.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();

            // Relasi ke tabel rentals
            $table->foreignId('rental_id')
                ->constrained('rentals')
                ->cascadeOnDelete();

            // Data pembayaran
            $table->string('payment_code')->nullable();

            $table->enum('payment_method', [
                'Transfer BCA',
                'Transfer BNI',
                'Transfer Mandiri',
                'QRIS',
                'Cash'
            ])->nullable();

            $table->enum('payment_status', [
                'Belum Lunas',
                'Menunggu Verifikasi',
                'Lunas'
            ])->default('Belum Lunas');

            $table->decimal('amount', 15, 2)
                ->default(0);

            $table->date('payment_date')
                ->nullable();

            $table->string('proof')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel payments.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};