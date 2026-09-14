<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {

            if (!Schema::hasColumn('rentals', 'payment_code')) {
                $table->string('payment_code')->nullable()->after('rental_code');
            }

            if (!Schema::hasColumn('rentals', 'payment_method')) {
                $table->enum('payment_method', [
                    'Transfer BCA',
                    'Transfer BNI',
                    'Transfer Mandiri',
                    'QRIS',
                    'Cash'
                ])->nullable()->after('total_price');
            }

            if (!Schema::hasColumn('rentals', 'payment_status')) {
                $table->enum('payment_status', [
                    'Belum Lunas',
                    'Menunggu Verifikasi',
                    'Lunas'
                ])->default('Belum Lunas')->after('payment_method');
            }

            if (!Schema::hasColumn('rentals', 'payment_date')) {
                $table->date('payment_date')->nullable()->after('payment_status');
            }

            if (!Schema::hasColumn('rentals', 'payment_proof')) {
                $table->string('payment_proof')->nullable()->after('payment_date');
            }

        });
    }

    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {

            $columns = [
                'payment_code',
                'payment_method',
                'payment_status',
                'payment_date',
                'payment_proof'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('rentals', $column)) {
                    $table->dropColumn($column);
                }
            }

        });
    }
};