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
        Schema::create('companydatas', function (Blueprint $table) {
            $table->id();
            $table->string('traveller_name')->nullable();
            $table->unsignedInteger('traveller_seats_count')
                ->default(1);
            $table->json('travellers_info')->nullable();
            $table->decimal('seat_price', 12, 2)
                ->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companydatas');
    }
};
