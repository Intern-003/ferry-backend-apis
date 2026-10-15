<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ferrytour extends Model
{
    protected $table = 'company_travels';
    protected $fillable = [
        'company_id',
        'from_location',
        'to_location',
        'travel_date',
        'departure_time',
        'arrival_time',
        'available_seats',
        'status',
    ];
}
