<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AgentController;

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

    if (Auth::check()) {
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.welcome');
        } else if (auth()->user()->type == 'manager') {
            return redirect()->route('manager.welcome');
        } else {
            return redirect()->route('agents.welcome');
        }
    }
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Agents Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::group(['prefix' => '/agents'], function () {

        Route::get('/welcome', [AgentController::class, 'welcome'])->name('agents.welcome');

    });
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::group(['prefix' => '/admin'], function () {

        Route::get('/welcome', [AdminController::class, 'welcome'])->name('admin.welcome');

    });
});

/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::group(['prefix' => '/manager'], function () {

        Route::get('/welcome', [ManagerController::class, 'welcome'])->name('manager.welcome');

    });
});







// Route::get('/', [HomeController::class, 'welcome']);

// Route::get('/add_trip', [HomeController::class, 'add_trip'])->name('add_trip');

// Route::post('/add_trip', [HomeController::class, 'add_trip_data'])->name('add_trip_data');

// Route::get('/getTripData', [HomeController::class, 'getTripData'])->name('getTripData');

// Route::get('/seat_plan/{trip_id}', [HomeController::class, 'seat_plan'])->name('seat_plan');

// Route::post('sell_ticket', [HomeController::class, 'sell_ticket'])->name('sell_ticket');