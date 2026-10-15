<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'company_time_book_id',
        'seat_number',
        'seat_type',
        'price',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
