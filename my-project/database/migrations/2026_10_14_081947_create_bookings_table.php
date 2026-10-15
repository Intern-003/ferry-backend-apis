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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seat_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->dateTime('in_time')->nullable();
            $table->dateTime('out_time')->nullable();
            $table->string('status', 20)->default('pending');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->index('seat_id');
            $table->index('user_id');
            $table->index('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
