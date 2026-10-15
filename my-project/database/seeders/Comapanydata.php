<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Comapanydata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companydatas')->insert([
            [
                'traveller_name' => 'Makruzz',
                'traveller_seats_count' => 150,
                'travellers_info' => json_encode([
                    'transport_type' => 'ferry',
                    'route' => 'Port Blair to Havelock',
                ]),
                'seat_price' => 1800.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'traveller_name' => 'Green Ocean',
                'traveller_seats_count' => 120,
                'travellers_info' => json_encode([
                    'transport_type' => 'ferry',
                    'route' => 'Port Blair to Havelock',
                ]),
                'seat_price' => 1600.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'traveller_name' => 'ITT Majestic',
                'traveller_seats_count' => 100,
                'travellers_info' => json_encode([
                    'transport_type' => 'ferry',
                    'route' => 'Port Blair to Havelock',
                ]),
                'seat_price' => 1500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
