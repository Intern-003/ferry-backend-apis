<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyTravelController;
use App\Http\Controllers\Api\admin\TravellersAdminController;
use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Testing Laravel email from localhost.', function ($message) {
        $message->to('seematadakhe01@gmail.com')
                ->subject('Laravel SMTP Test');
    });

    return response()->json([
        'status' => true,
        'message' => 'Mail sent successfully'
    ]);
});


Route::get('/hello', function () {
    return response()->json([
        'status' => true,
        'message' => 'Hello, Laravel API!'
    ]);
});

//api for all travels comapny search result
Route::post('/searched-travels', [CompanyTravelController::class, 'companyTravels']);
Route::post('/booking-data', [CompanyTravelController::class, 'bookSeatsData']);
Route::post('/booking-send', [CompanyTravelController::class, 'booking']);
Route::get('/travellers-data', [CompanyTravelController::class, 'companyData']);
Route::post('/register', [CompanyTravelController::class, 'register']);
Route::post('/login', [CompanyTravelController::class, 'login']);
Route::get('/register-list', [TravellersAdminController::class, 'registerList']);
Route::get('/booking-list', [TravellersAdminController::class, 'bookingList']);
Route::get('/travellers-details-list', [TravellersAdminController::class, 'travellersList']);
Route::post('/travellers-data-insert', [TravellersAdminController::class, 'insertData']);
Route::get('/travellers-time-list', [TravellersAdminController::class, 'travellersTimeList']);
Route::post('/filter-time-list', [CompanyTravelController::class, 'filterByCompanies']);
Route::post('/contact-submit', [CompanyTravelController::class, 'contactSubmit']);



?>


