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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_time_book_id')
                ->constrained('company_travels')
                ->cascadeOnDelete();
            $table->string('seat_number', 20);
            $table->string('seat_type', 30)->default('standard');
            $table->decimal('price', 12, 2)->default(0);
            $table->string('status', 20)->default('available');
            $table->timestamps();
            $table->unique([
                'company_time_book_id ',
                'seat_number',
            ]);

            $table->index('status');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
