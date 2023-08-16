<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\Admin\HomeController;
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

        Route::get('/welcome', [HomeController::class, 'welcome'])->name('admin.welcome');

        Route::get('/counter', [HomeController::class, 'counterPage'])->name('admin.counter');

        Route::post('/counter', [CounterController::class, 'counterAdd'])->name('admin.counter.add');

        Route::get('/counter', [CounterController::class, 'counterPage'])->name('admin.counter');

        Route::get('/counter/{id}', [CounterController::class, 'counterEdit'])->name('admin.counter.edit');

        Route::post('/counter/{id}', [CounterController::class, 'counterUpdate'])->name('admin.counter.update');

        Route::get('/user', [CounterController::class, 'userPage'])->name('admin.user');

        Route::post('/user', [CounterController::class, 'userAdd'])->name('admin.user.add');

        Route::get('/user/{id}', [CounterController::class, 'userEdit'])->name('admin.user.edit');

        Route::post('/user/{id}', [CounterController::class, 'userUpdate'])->name('admin.user.update');

        Route::get('/supervisor', [CounterController::class, 'supervisorPage'])->name('admin.supervisor');

        Route::post('/supervisor', [CounterController::class, 'supervisorAdd'])->name('admin.supervisor.add');


        Route::get('/add_trip', [TripController::class, 'add_trip'])->name('add_trip');

        Route::post('/add_trip', [TripController::class, 'add_trip_data'])->name('add_trip_data');

        Route::get('/add_trip/{id}', [TripController::class, 'add_tripEdit'])->name('admin.main_trip.edit');

        Route::post('/add_trip/{id}', [TripController::class, 'add_tripUpdate'])->name('admin.main_trip.update');

        Route::get('/add_trip/status/{trip_id}/{id}', [TripController::class, 'add_tripStatus'])->name('admin.main_trip.status');



        Route::get('/sample_trip', [TripController::class, 'sample_trip'])->name('admin.sample_trip');

        Route::post('/sample_trip', [TripController::class, 'sample_tripAdd'])->name('admin.sample_trip.add');
        
        Route::get('/sample_trip/{id}', [TripController::class, 'sample_tripEdit'])->name('admin.sample_trip.edit');

        Route::post('/sample_trip/{id}', [TripController::class, 'sample_tripUpdate'])->name('admin.sample_trip.update');

        
        // Route::get('/pre_day/{date}', [HomeController::class, 'pre_day'])->name('admin.pre_day');

        Route::get('/date/{date}', [HomeController::class, 'date'])->name('admin.date');

       
        Route::post('/trip_sheet', [HomeController::class, 'trip_sheetAdd'])->name('admin.trip_sheet.add');

        Route::get('/trip_sheet/update/{id}', [HomeController::class, 'trip_sheetEdit'])->name('admin.trip_sheet.edit');

        Route::post('/trip_sheet/update/{id}', [HomeController::class, 'trip_sheetUpdate'])->name('admin.trip_sheet.update');

        // Route::get('/get_name/{mobile}', [HomeController::class, 'get_name'])->name('admin.get_name');
    });
});


// For all

Route::get('/trip/{id}', [AdminController::class, 'show'])->name('trip.show');

Route::post('/sell_ticket', [HomeController::class, 'sell_ticket'])->name('sell_ticket');

Route::get('/ticket_print/{id}', [HomeController::class, 'ticket_print'])->name('admin.ticket_print');

Route::get('/trip_sheet/{id}', [HomeController::class, 'trip_sheet'])->name('admin.trip_sheet');

Route::get('/sells_report', [HomeController::class, 'sells_report'])->name('admin.sells_report');
       


/*------------------------------------------
--------------------------------------------
All Agents Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::group(['prefix' => '/agents'], function () {

        Route::get('/welcome', [AgentController::class, 'welcome'])->name('agents.welcome');

        Route::get('/pre_day/{date}', [AgentController::class, 'pre_day'])->name('agents.pre_day');

        Route::get('/date/{date}', [AgentController::class, 'date'])->name('agents.date');

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

Route::get('/seat_plan', [AdminController::class, 'seat_plan'])->name('seat_plan');







Route::post('sell_ticket_demo', [AdminController::class, 'sell_ticket_demo'])->name('sell_ticket_demo');






Route::get('seat', function () {
    return view('seat');
});