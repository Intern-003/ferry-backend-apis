<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seat;

class Seats extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $seats = [];

        // Replace 1 with an existing company_travel_id.
        $companyTravelId = 1;

        foreach (range(1, 40) as $number) {
            $seats[] = [
                'company_time_book_id' => $companyTravelId,
                'seat_number' => 'A' . $number,
                'seat_type' => $number <= 10 ? 'premium' : 'standard',
                'price' => $number <= 10 ? 800.00 : 650.00,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Seat::insert($seats);
    }
}
