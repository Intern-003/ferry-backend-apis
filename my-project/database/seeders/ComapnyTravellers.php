<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComapnyTravellers extends Seeder
{
    public function run(): void
    {
        DB::table('company_travels')->insert([
            [
                'company_id' => 1,
                'from_location' => 'Mumbai',
                'to_location' => 'Pune',
                'travel_date' => '2026-10-15',
                'departure_time' => '09:00:00',
                'arrival_time' => '12:00:00',
                'available_seats' => 20,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 1,
                'from_location' => 'Mumbai',
                'to_location' => 'Nashik',
                'travel_date' => '2026-10-16',
                'departure_time' => '10:00:00',
                'arrival_time' => '13:00:00',
                'available_seats' => 15,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
?>
