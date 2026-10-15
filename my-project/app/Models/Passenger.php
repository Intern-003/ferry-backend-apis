<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Passenger extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'full_name',
        'mobile_no',
        'email',
        'address',
        'dob',
        'gender',
        'password',
    ];
}
