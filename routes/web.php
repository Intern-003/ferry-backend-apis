<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/enquiry', function () {
    return view('simple', [
        'data' => [
            'name' => 'Test User',
            'mobile' => '9876543210',
            'email' => 'test@example.com',
            'enquiry' => 'Booking enquiry',
            'message' => 'Testing the enquiry template',
        ],
    ]);
});
