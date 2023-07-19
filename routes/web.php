<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\TripController;
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
    } else {
        return redirect()->route('login')
            ->with('error', 'Email-Address And Password Are Wrong.');
    }
});

Route::get('/home', function () {

    if (Auth::check()) {
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.welcome');
        } else if (auth()->user()->type == 'manager') {
            return redirect()->route('manager.welcome');
        } else {
            return redirect()->route('agents.welcome');
        }
    } else {
        return redirect()->route('login')
            ->with('error', 'Email-Address And Password Are Wrong.');
    }
});

Auth::routes();

Route::get('/session', function () {

    $session = session()->all();
    p($session);

});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::group(['prefix' => '/admin'], function () {

        Route::get('/welcome', [AdminController::class, 'welcome'])->name('admin.welcome');

        Route::get('/counter', [CounterController::class, 'counterPage'])->name('admin.counter');

        Route::post('/counter', [CounterController::class, 'counterAdd'])->name('admin.counter.add');

        Route::get('/user', [CounterController::class, 'userPage'])->name('admin.user');

        Route::post('/user', [CounterController::class, 'userAdd'])->name('admin.user.add');

        Route::get('/main_route', [TripController::class, 'main_route'])->name('admin.main_route');

        Route::post('/main_route', [TripController::class, 'main_routeAdd'])->name('admin.main_route.add');

        Route::get('/add_trip', [TripController::class, 'add_trip'])->name('add_trip');

        Route::post('/add_trip', [TripController::class, 'add_trip_data'])->name('add_trip_data');

        Route::get('/sample_trip', [TripController::class, 'sample_trip'])->name('admin.sample_trip');

        Route::post('/sample_trip', [TripController::class, 'sample_tripAdd'])->name('admin.sample_trip.add');

        



    });
});





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
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::group(['prefix' => '/manager'], function () {

        Route::get('/welcome', [ManagerController::class, 'welcome'])->name('manager.welcome');

    });
});







// Route::get('/', [HomeController::class, 'welcome']);


Route::get('/getTripData', [AdminController::class, 'getTripData'])->name('getTripData');

Route::get('/seat_plan/{trip_id}', [AdminController::class, 'seat_plan'])->name('seat_plan');

Route::post('sell_ticket', [AdminController::class, 'sell_ticket'])->name('sell_ticket');

Route::get('/trip/{id}', [AdminController::class, 'show'])->name('trip.show');




Route::get('seat', function () {
    return view('seat');
});