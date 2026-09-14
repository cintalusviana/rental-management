<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {

            $table->id();

            $table->string('rental_code')->unique();

            $table->foreignId('customer_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('rental_date');

            $table->date('return_date');

            $table->decimal('total_price',12,2)->default(0);

            $table->enum('status',[
                'pending',
                'approved',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};