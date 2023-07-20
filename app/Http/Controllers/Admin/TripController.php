<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TripStatus;
use App\Models\MainRoute;
use App\Models\SampleTrip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    //

    public function main_route()
    {

        $route = MainRoute::all();

        $data = compact('route');

        return view('admin.main_route')->with($data);
    }

    public function main_routeAdd(Request $request)
    {

        $route = new MainRoute;

        $route->route_no = $request['route_no'];
        $route->route_name = $request['route_name'];
        $route->save();

        // Show success notification
        session()->flash('success', 'Main route added successfully.');

        return redirect()->route('admin.main_route');

    }

    public function main_routeEdit($id)
    {

        $main_route = MainRoute::find($id);

        $data = compact('main_route');

        return view('admin.main_route_edit')->with($data);
    }

    public function main_routeUpdate(Request $request, $id)
    {

        $route = MainRoute::find($id);

        $route->route_no = $request['route_no'];
        $route->route_name = $request['route_name'];
        $route->save();

        // Show success notification
        session()->flash('success', 'Main route update successfully.');

        return redirect()->route('admin.main_route');

    }

    public function main_routeDelete($id)
    {

        $main_route = MainRoute::find($id);

        if (!is_null($main_route)) {

            $main_route->forceDelete();

            // Show success notification
            session()->flash('success-delete', 'Main route permanently deleted successfully.');
            return redirect()->back();
        }
    }

    public function add_trip()
    {
        $main_route = MainRoute::all();

        $sam_trip = SampleTrip::all();

        $formattedDate = date('Y-m-d');

        $trips = DB::table('trip_statuses')
            ->where('date', $formattedDate)
            ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
            ->get();


        $data = compact('main_route', 'sam_trip', 'trips');

        return view('admin.add_trip')->with($data);
    }

    public function add_trip_data(Request $request)
    {

        $random_num = null;
        do {
            $random_num = rand(10000, 99999);
        } while (DB::table('trip_statuses')->where('trip_id', $random_num)->exists());


        $trip = new TripStatus;

        $trip->main_route = $request['main_route'];
        $trip->trip_id = $random_num;
        $trip->coach_no = $request['coach_no'];
        $trip->date = $request['date'];
        $trip->time = $request['time'];
        $trip->route = $request['route'];
        $trip->stations = $request['station'];
        $trip->save();



        return redirect('/');

    }



    public function sample_trip()
    {

        $sam_trip = SampleTrip::all();

        $data = compact('sam_trip');

        return view('admin.sample_trip')->with($data);

    }

    public function sample_tripAdd(Request $request)
    {

        $trip = new SampleTrip;

        $trip->coach_no = $request['coach_no'];
        $trip->route = $request['route'];
        $trip->stations = $request['stations'];
        $trip->time = $request['time'];
        $trip->save();

        // Show success notification
        session()->flash('success', 'New sample trip added successfully.');

        return redirect()->route('admin.sample_trip');


    }

    public function sample_tripEdit($id)
    {

        $sample_trip = SampleTrip::find($id);

        $data = compact('sample_trip');

        return view('admin.sample_trip_edit')->with($data);


    }

    public function sample_tripUpdate(Request $request){

        p($request->toArray());
    }









}