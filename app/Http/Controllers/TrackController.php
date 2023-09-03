<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'TRiP PATRiA | Track'
        ];
        return view('track.index')->with('data', $data);
    }
}
