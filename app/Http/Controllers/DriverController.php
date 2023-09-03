<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Drivers::all();
        $data = [
            'title' => 'TRiP PATRiA | Driver',
            'driver' => $driver
        ];
        return view('driver.index')->with('data', $data);
    }

    public function InsertDriver(Request $request)
    {
        $cek = Drivers::where('driver', $request->driverInput)->first();

        if(!$cek){
            Drivers::create([
                'driver' => $request->driverInput,
                'plat_no' => $request->platInput,
                'created_by' => Auth::user()->id
            ]);
                
            return redirect()->back()->with('suc_message', 'Data berhasil ditambahkan!');
        }else{
            return redirect()->back()->with('err_message', 'Data gagal ditambahkan! Nama driver sudah ada.');
        }
    }
}
