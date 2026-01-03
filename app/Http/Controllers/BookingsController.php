<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Get all bookings with related user and event data.
     */
    public function GetAllBookings(){
        $bookings = Booking::with('user', 'event')->get();
        return response()->json(['message'=>'Data Found', 'data'=>$bookings]);
    }

    /**
     * Get a single booking by ID with related user and event data.
     */
    public function GetBookingById($id){
        $booking = Booking::with('user', 'event')->find($id);
        if($booking){
            return response()->json(['message'=>'Data Found', 'data'=>$booking]);
        }else{
            return response()->json(['message'=>'Booking Not Found'],404);
        }
    }
}
