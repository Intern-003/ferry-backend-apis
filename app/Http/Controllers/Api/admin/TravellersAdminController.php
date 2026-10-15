<?php

namespace App\Http\Controllers\Api\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\Bookings;
use App\Models\Companydata;
use App\Models\Ferrytour;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TravellersAdminController extends Controller
{
    public function registerList(){

        $dataOfRegistration = Passenger::all();

        if($dataOfRegistration){
            return response()->json([
                'success' => true,
                'message' => 'Registration all fetched successfully',
                'data' => $dataOfRegistration,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something wen wrong',
            ], 401);
        }
    }
    public function bookingList(){

        $bookingData = Bookings::all();

        if($bookingData){
            return response()->json([
                'success' => true,
                'message' => "Booking fetched successfully!",
                'data' => $bookingData,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something wen wrong',
            ], 401);
        }
    }
    public function travellersList(){

        $companyData = Companydata::all();

        if($companyData){
            return response()->json([
                'success' => true,
                'message' => 'Registration all fetched successfully',
                'data' => $companyData
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ], 401);
        }
    }
    public function insertData(request $request){

        $validator = Validator::make($request->all(), [
            'traveller_name' => 'required|string|max:255',
            'traveller_seats_count' => 'required|integer|min:1',
            'travellers_info' => 'nullable|array',
            'seat_price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $traveller = Companydata::create([
            'traveller_name' => $request->traveller_name,
            'traveller_seats_count' => $request->traveller_seats_count,
            'travellers_info' => $request->travellers_info,
            'seat_price' => $request->seat_price,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Traveller data inserted successfully',
            'data' => $traveller,
        ], 201);
    }
    public function travellersTimeList(){

        $dataFerry = Ferrytour::all();

        if($dataFerry){
            return response()->json([
                'success' => true,
                'message' => 'Tour Time list fetched successfully',
                'data' => $dataFerry
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ], 401);
        }
    }

    public function filterByCompanies(Request $request)
    {
        $request->validate([
            'company_ids' => 'required|array|min:1',
            'company_ids.*' => 'required|integer',
        ]);

        $travellers = Ferrytour::whereIn(
            'company_id',
            $request->company_ids
        )
        ->orderBy('arrival_time')
        ->get();

        return response()->json([
            'status' => true,
            'data' => $travellers
        ]);
    }
}
