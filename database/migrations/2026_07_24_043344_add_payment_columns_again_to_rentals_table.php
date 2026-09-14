<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {


            $table->string('payment_code')
                ->nullable();


            $table->enum('payment_method', [
                'Transfer BCA',
                'Transfer BNI',
                'Transfer Mandiri',
                'QRIS',
                'Cash'
            ])
            ->nullable();


            $table->enum('payment_status', [
                'Belum Lunas',
                'Menunggu Verifikasi',
                'Lunas'
            ])
            ->default('Belum Lunas');


            $table->date('payment_date')
                ->nullable();


            $table->string('payment_proof')
                ->nullable();


        });
    }



    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {

            $table->dropColumn([
                'payment_code',
                'payment_method',
                'payment_status',
                'payment_date',
                'payment_proof'
            ]);

        });
    }

};