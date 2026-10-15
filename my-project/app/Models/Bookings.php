<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'mobile_no',
        'company_id',
        'time_id',
        'seat_id',
        'price',
        'status',
    ];
}
