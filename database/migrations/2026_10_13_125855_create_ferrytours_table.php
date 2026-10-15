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
       Schema::create('company_travels', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->string('from_location');
                $table->string('to_location');
                $table->date('travel_date');
                $table->time('departure_time');
                $table->time('arrival_time');
                $table->unsignedInteger('available_seats')->default(0);
                $table->string('status')->default('available');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferrytours');
    }
};
