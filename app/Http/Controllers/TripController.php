<?php

namespace App\Http\Controllers;

use App\Models\Trips;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trip = Trips::join('driver', 'driver.id_driver', '=', 'trip.id_driver')->join('track', 'track.id_track', '=', 'trip.id_track')->get();
        // dd($trip);
        $data = [
            'title' => 'TRiP PATRiA | Trip Tracking',
            'trip' => $trip
        ];
        return view('trip.index')->with('data', $data);
    }
}
