<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TripStatus;
use App\Models\SellTicketHis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    //

    // public function welcome(){

    //     $main_route = session('user.main_route');

    //     // $tripStatus = new TripStatus();
    //     // $trips = $tripStatus->get();

    //     $trips = TripStatus::where('main_route', $main_route)->get();

    //     $data = compact('trips');
    //     return view('agents.welcome')->with($data);
    // }


    public function welcome(Request $request)
    {
        // $main_route = session('user.main_route');

        // $tripStatus = new TripStatus();
        // $trips = $tripStatus->get();

        // $trips = TripStatus::where('main_route', $main_route)->get();


        $search_date = isset($request['date']) ? $request['date'] : "";

        if ($search_date != "") {

            $trips = DB::table('trip_statuses')
                ->where('date', $search_date)
                ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
                ->get();

        } else {
            $formattedDate = date('Y-m-d');

            $trips = DB::table('trip_statuses')
                ->where('date', $formattedDate)
                ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
                ->get();
        }


        $data = compact('trips');

        return view('agents.welcome')->with($data);

    }


    
    public function pre_day($date)
    {

        $formattedDate = date('Y-m-d');

        $trips = DB::table('trip_statuses')
            ->where('date', $date)
            ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
            ->get();

        $data = compact('trips');

        return view('agents.welcome')->with($data);

    }

    public function date($date)
    {

        // $formattedDate = date('Y-m-d');

        $trips = DB::table('trip_statuses')
            ->where('date', $date)
            ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
            ->get();

        $data = compact('trips');

        return view('agents.welcome')->with($data);

    }

}
