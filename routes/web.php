<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'welcome']);

Route::get('/add_trip', [HomeController::class, 'add_trip'])->name('add_trip');

Route::post('/add_trip', [HomeController::class, 'add_trip_data'])->name('add_trip_data');

Route::get('/getTripData', [HomeController::class, 'getTripData'])->name('getTripData');

Route::get('/seat_plan/{trip_id}', [HomeController::class, 'seat_plan'])->name('seat_plan');

Route::post('sell_ticket', [HomeController::class, 'sell_ticket'])->name('sell_ticket');