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

    public function welcome(){

        $main_route = session('user.main_route');

        // $tripStatus = new TripStatus();
        // $trips = $tripStatus->get();

        $trips = TripStatus::where('main_route', $main_route)->get();

        $data = compact('trips');
        return view('agents.welcome')->with($data);
    }
}
