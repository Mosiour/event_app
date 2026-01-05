<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function GetAllEvents(){
        $events = Event::all();
        return response()->json(['message'=>'Data Found', 'data'=>$events]);
    }
}
