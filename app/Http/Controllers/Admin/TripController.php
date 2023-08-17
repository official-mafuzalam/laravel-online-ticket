<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CounterList;
use App\Models\SampleTrip;
use App\Models\TripStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    //


    public function add_trip(Request $request)
    {

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


        $sam_trip = SampleTrip::all();

        $data = compact('sam_trip', 'trips');

        return view('admin.add_trip')->with($data);
    }

    public function add_trip_data(Request $request)
    {

        $random_num = null;
        do {
            $random_num = rand(10000, 99999);
        } while (DB::table('trip_statuses')->where('trip_id', $random_num)->exists());


        $trip = new TripStatus;

        $trip->trip_id = $random_num;
        $trip->coach_no = $request['coach_no'];
        $trip->counters = $request['counters'];
        $trip->date = $request['date'];
        $trip->time = $request['time'];
        $trip->route = $request['route'];
        $trip->stations = $request['station'];
        $trip->save();

        // Show success notification
        session()->flash('success', 'New trip added successfully.');

        return redirect()->route('admin.add_trip');

    }

    public function add_tripEdit($id)
    {

        $trip_data = TripStatus::find($id);

        $counters = CounterList::all();

        return view('admin.add_trip_edit', ['trip_data' => $trip_data, 'counters' => $counters]);
        // p($trip_data);

    }

    public function add_tripUpdate(Request $request, $id)
    {

        $trip = TripStatus::find($id);

        $trip->time = $request['time'];
        $trip->route = $request['route'];
        $trip->stations = $request['stations'];

        // Convert the array to a comma-separated string
        $countersArray = $request['counters'];
        $countersString = implode(',', $countersArray);

        $trip->counters = $countersString; // Assign the serialized string

        $trip->save();

        // Show success notification
        session()->flash('success', 'Trip data updated successfully.');

        return redirect()->route('admin.add_trip');


        // p($request->toArray());

    }

    public function add_tripStatus($trip_id, $id)
    {

        $trip = TripStatus::find($trip_id);

        if ($trip) {
            $trip->status = $id;
            $trip->save();
            // Show success notification
            session()->flash('success', 'Trip data updated successfully.');
            return redirect()->back();
        } else {
            // Show success notification
            session()->flash('success-delete', 'Trip data not found.');
            return redirect()->back();
        }




        // p($trip);
        // echo $trip_id, $id;
    }

    public function sample_trip()
    {

        $sam_trip = SampleTrip::all();

        $counters = CounterList::all();

        $data = compact('sam_trip', 'counters');

        return view('admin.sample_trip')->with($data);

    }

    public function sample_tripAdd(Request $request)
    {

        $trip = new SampleTrip;

        $trip->coach_no = $request['coach_no'];
        $trip->route = $request['route'];
        $trip->stations = $request['stations'];
        $trip->time = $request['time'];

        // Convert the array to a comma-separated string
        $countersArray = $request['counters'];
        $countersString = implode(',', $countersArray);

        $trip->counters = $countersString; // Assign the serialized string

        $trip->save();

        // Show success notification
        session()->flash('success', 'New sample trip added successfully.');

        return redirect()->route('admin.sample_trip');

        // p($request->toArray());


    }

    public function sample_tripEdit($id)
    {

        $sample_trip = SampleTrip::find($id);

        $counters = CounterList::all();

        $data = compact('sample_trip', 'counters');

        return view('admin.sample_trip_edit')->with($data);


    }

    public function sample_tripUpdate(Request $request, $id)
    {

        $trip = SampleTrip::find($id);

        $trip->coach_no = $request['coach_no'];
        $trip->route = $request['route'];
        $trip->stations = $request['stations'];
        $trip->time = $request['time'];

        // Convert the array to a comma-separated string
        $countersArray = $request['counters'];
        $countersString = implode(',', $countersArray);

        $trip->counters = $countersString; // Assign the serialized string

        $trip->save();

        // Show success notification
        session()->flash('success', 'Sample trip updated successfully.');

        return redirect()->route('admin.sample_trip');


    }









}