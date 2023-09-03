<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('trip.index');
    return redirect(url('trip'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('trip', [App\Http\Controllers\TripController::class, 'index']);

    Route::get('driver', [App\Http\Controllers\DriverController::class, 'index']);
    Route::post('insert-driver', [App\Http\Controllers\DriverController::class, 'InsertDriver']);

    Route::get('track', [App\Http\Controllers\TrackController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
