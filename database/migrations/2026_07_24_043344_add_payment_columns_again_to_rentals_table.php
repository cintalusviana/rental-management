<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = [
            'payment_code',
            'payment_method',
            'payment_status',
            'payment_date',
            'payment_proof',
        ];

        foreach ($columns as $column) {
            if (!Schema::hasColumn('rentals', $column)) {
                Schema::table('rentals', function (Blueprint $table) use ($column) {
                    if ($column === 'payment_code') {
                        $table->string('payment_code')->nullable();
                    }

                    if ($column === 'payment_method') {
                        $table->enum('payment_method', [
                            'Transfer BCA',
                            'Transfer BNI',
                            'Transfer Mandiri',
                            'QRIS',
                            'Cash'
                        ])->nullable();
                    }

                    if ($column === 'payment_status') {
                        $table->enum('payment_status', [
                            'Belum Lunas',
                            'Menunggu Verifikasi',
                            'Lunas'
                        ])->default('Belum Lunas');
                    }

                    if ($column === 'payment_date') {
                        $table->date('payment_date')->nullable();
                    }

                    if ($column === 'payment_proof') {
                        $table->string('payment_proof')->nullable();
                    }
                });
            }
        }
    }

    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $columns = [
                'payment_code',
                'payment_method',
                'payment_status',
                'payment_date',
                'payment_proof',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('rentals', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};