<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BookingsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/healthcheck', function(){
    return response()->json([['message' => 'API is healthy']]);
});

/*
* User Routes
*/
Route::get('/alluser',[UsersController::class,'getUser']);

Route::get('/alluser/{id}',[UsersController::class,'getUserById']);

Route::post('/createuser',[UsersController::class,'createUser']);

Route::put('/updateuser/{id}',[UsersController::class,'updateUser']);

Route::delete('/deleteuser/{id}',[UsersController::class,'deleteUser']);

/*
* Booking Routes
*/
Route::get('/allbookings',[BookingsController::class,'GetAllBookings']);

Route::get('/booking/{id}',[BookingsController::class,'GetBookingById']);