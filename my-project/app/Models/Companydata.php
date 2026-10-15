<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companydata extends Model
{
      protected $fillable = [
        'traveller_name',
        'traveller_seats_count',
        'travellers_info',
        'seat_price',
    ];

    protected $casts = [
        'travellers_info' => 'array',
    ];
}
