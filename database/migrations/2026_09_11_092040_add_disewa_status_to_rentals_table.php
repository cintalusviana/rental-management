<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan status "disewa" pada tabel rentals.
     */
    public function up(): void
    {
        DB::statement("
            ALTER TABLE rentals
            MODIFY status ENUM(
                'pending',
                'approved',
                'disewa',
                'completed',
                'cancelled'
            )
            NOT NULL DEFAULT 'pending'
        ");
    }

    /**
     * Kembalikan status ke struktur sebelumnya.
     */
    public function down(): void
    {
        // Jika masih ada rental dengan status disewa,
        // ubah kembali menjadi approved terlebih dahulu.
        DB::table('rentals')
            ->where('status', 'disewa')
            ->update([
                'status' => 'approved'
            ]);

        DB::statement("
            ALTER TABLE rentals
            MODIFY status ENUM(
                'pending',
                'approved',
                'completed',
                'cancelled'
            )
            NOT NULL DEFAULT 'pending'
        ");
    }
};