<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Jangan membuat ulang jika tabel sudah ada
        if (!Schema::hasTable('payment_details')) {
            Schema::create('payment_details', function (Blueprint $table) {
                $table->id();

                $table->foreignId('payment_id')
                    ->constrained('payments')
                    ->onDelete('cascade');

                $table->foreignId('product_id')
                    ->constrained('products')
                    ->onDelete('cascade');

                $table->integer('qty');
                $table->decimal('price', 15, 2);

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};