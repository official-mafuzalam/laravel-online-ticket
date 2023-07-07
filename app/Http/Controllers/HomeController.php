<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TripStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{





    public function welcome()
    {

        $tripStatus = new TripStatus();
        $trips = $tripStatus->get();

        $data = compact('trips');
        return view('welcome')->with($data);




    }



    public function add_trip(){

        return view('add_trip');
    }

    public function add_trip_data(Request $request){

        $random_num = null;
        do {
            $random_num = rand(10000, 99999);
        } while (DB::table('trip_statuses')->where('trip_id', $random_num)->exists());


        $trip = new TripStatus;

        $trip->trip_id = $random_num;
        $trip->coach_no = $request['coach_no'];
        $trip->date = $request['date'];
        $trip->time = $request['time'];
        $trip->route = $request['route'];
        $trip->stations = $request['station'];
        $trip->save();



        return redirect('/');

        // echo 'pre';
        // print_r($request->toArray());
    }






}