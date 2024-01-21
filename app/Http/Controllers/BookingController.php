<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::where('user_id' , Auth::user()->id)
            ->with('service')
            ->paginate(10);  //Auth::id()

        return response()->json($bookings);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'service_id' => 'required',
            'time'       => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $booking = new  Booking();
        $booking->user_id = Auth::id();
        $booking->service_id = $request->service_id;
        $booking->time = $request->time;
        $booking->save();

        return response()->json('Booking is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking  = Booking::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking  = Booking::findOrFail($id);
        $booking->delete();

        return response()->json('Booking is deleted');
    }
}
