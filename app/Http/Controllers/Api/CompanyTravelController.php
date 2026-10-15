<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ferrytour;
use App\Models\Seat;
use App\Models\Companydata;
use App\Models\Bookings;
use App\Models\Passenger;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;

class CompanyTravelController extends Controller
{
    public function companyTravels(Request $request)
    {
        $validatedData = $request->validate([
            'travel_date'   => 'required|date',
            'from_location' => 'required|string|max:255',
            'to_location'   => 'required|string|max:255',
        ]);

        $travels = Ferrytour::where([
            ['travel_date', '=', $validatedData['travel_date']],
            ['from_location', '=', $validatedData['from_location']],
            ['to_location', '=', $validatedData['to_location']],
        ])->get();

        return response()->json([
            'success' => true,
            'message' => 'Company travels fetched successfully',
            'data' => $travels,
        ], 200);
    }
    public function bookSeatsData(Request $request){

        $validatedData = $request->validate([
            'time_id'   => 'required',
            'company_id'   => 'required',
        ]);

        $seatsData = Seat::where('company_time_book_id', $validatedData['time_id'])->get();
        $travelData = Ferrytour::where('company_id', $validatedData['company_id'])
            ->where('id', $validatedData['time_id'])
            ->get();
        $companyData = Companydata::where('id', $validatedData['company_id'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Book data fetched successfully',
            'seatdata' => $seatsData,
            'traveldata' => $travelData,
            'companydata' => $companyData,
        ], 200);
    }
    public function booking(request $request){

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_no' => 'required|string|regex:/^[0-9]{10,15}$/',
            'company_id' => 'required|integer',
            'time_id' => 'required|integer',
            'seats' => 'required|array|min:1',
            'seats.*.seat_id' => 'required|integer|distinct',
            'price' => 'required|numeric|min:0',
        ]);

        $seatIds = collect($validatedData['seats'])
            ->pluck('seat_id')
            ->toArray();

        $bookingSeat = Bookings::create([
            'seat_id' => implode(',', $seatIds),
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'mobile_no' => $validatedData['mobile_no'],
            'user_id' => $request->user_id,
            'price'=> $request->price,
        ]);

        return response()->json([
            'message' => 'Booking details inserted successfully.',
            'data' => $bookingSeat,
        ], 201);
    }
    public function companyData(){

        $companyData = Companydata::all();
        return response()->json([
            'message' => 'All Travellers Details.',
            'data' => $companyData,
        ], 200);
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_no' => [
                'required',
                'string',
                'regex:/^[0-9]{10,15}$/',
                'unique:passengers,mobile_no',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:passengers,email',
            ],
            'address' => 'nullable|string|max:2000',
            'dob' => 'nullable|date|before:today',
            'gender' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $passenger = Passenger::create([
            'full_name' => $validated['full_name'],
            'mobile_no' => $validated['mobile_no'],
            'email' => $validated['email'],
            'address' => $validated['address'] ?? null,
            'dob' => $validated['dob'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'password' => $validated['password'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Passenger registered successfully.',
            'data' => [
                'id' => $passenger->id,
                'full_name' => $passenger->full_name,
                'mobile_no' => $passenger->mobile_no,
                'email' => $passenger->email,
            ],
        ], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $passenger = Passenger::where(
            'email',
            $validated['email']
        )->first();

        if (!$passenger || ($validated['password'] != $passenger->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.',
            ], 401);
        }

        $token = $passenger->createToken('passenger-api')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful.',
            'data' => [
                'id' => $passenger->id,
                'full_name' => $passenger->full_name,
                'email' => $passenger->email,
                'mobile_no' => $passenger->mobile_no,
            ],
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
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
     public function contactSubmit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'mobile'  => 'required|string|max:20',
            'email'   => 'nullable|email|max:255',
            'enquiry' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        try {
          /*  Mail::to('seematadakhe01@gmail.com')
                ->send(new EnquiryMail($data));*/

            $html = view('simple', compact('data'))->render();

            Mail::html($html, function ($message) {
                $message->to('seematadakhe01@gmail.com')
                        ->subject('Customer Enquiry');
            });

            return response()->json([
                'status' => true,
                'message' => 'Enquiry submitted successfully. Email sent.'
            ], 200);

        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'status' => false,
                'message' => 'Unable to send enquiry email. Please try again.'
            ], 500);
        }
    }
}
