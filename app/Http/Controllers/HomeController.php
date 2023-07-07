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



    public function add_trip()
    {

        return view('add_trip');
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
        $trip->date = $request['date'];
        $trip->time = $request['time'];
        $trip->route = $request['route'];
        $trip->stations = $request['station'];
        $trip->save();



        return redirect('/');

        // echo 'pre';
        // print_r($request->toArray());
    }



    public function getTripData(Request $request)
    {


        $tripId = $request->input('tripId');

        // Fetch the trip data based on the tripId
        // $trip = TripStatus::where('trip_id', $tripId)->get();

        $trip = TripStatus::where('trip_id', $tripId)->first();

        // You can process the retrieved data and return it as a response
        // Here, we'll return an HTML fragment as an example


        $html = '<p>Trip ID: ' . $trip->A1 . '</p>';
        $html .= '<p>Trip Name: ' . $trip->route . '</p>';

        // Update the code below this line
        $html .= '<div class="container text-center">';
        $html .= '<div class="row">';
        $html .= '<div class="col">';
        $html .= '<div class="form-check form-check-inline">';

        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="a1" autocomplete="on" ' . ($trip->A1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="a1">A1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="a2" autocomplete="on" ' . ($trip->A2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="a2">A2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="a3" autocomplete="on" ' . ($trip->A3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="a3">A3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="a4" autocomplete="on" ' . ($trip->A4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="a4">A4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="b1" autocomplete="on" ' . ($trip->B1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="b1">B1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="b2" autocomplete="on" ' . ($trip->B2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="b2">B2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="b3" autocomplete="on" ' . ($trip->B3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="b3">B3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="b4" autocomplete="on" ' . ($trip->B4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="b4">B4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="c1" autocomplete="on" ' . ($trip->C1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="c1">C1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="c2" autocomplete="on" ' . ($trip->C2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="c2">C2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="c3" autocomplete="on" ' . ($trip->C3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="c3">C3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="c4" autocomplete="on" ' . ($trip->C4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="c4">C4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="d1" autocomplete="on" ' . ($trip->D1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="d1">D1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="d2" autocomplete="on" ' . ($trip->D2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="d2">D2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="d3" autocomplete="on" ' . ($trip->D3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="d3">D3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="d4" autocomplete="on" ' . ($trip->D4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="d4">D4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="e1" autocomplete="on" ' . ($trip->E1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="e1">E1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="e2" autocomplete="on" ' . ($trip->E2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="e2">E2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="e3" autocomplete="on" ' . ($trip->E3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="e3">E3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="e4" autocomplete="on" ' . ($trip->E4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="e4">E4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="f1" autocomplete="on" ' . ($trip->F1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="f1">F1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="f2" autocomplete="on" ' . ($trip->F2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="f2">F2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="f3" autocomplete="on" ' . ($trip->F3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="f3">F3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="f4" autocomplete="on" ' . ($trip->F4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="f4">F4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="g1" autocomplete="on" ' . ($trip->G1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="g1">G1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="g2" autocomplete="on" ' . ($trip->G2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="g2">G2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="g3" autocomplete="on" ' . ($trip->G3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="g3">G3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="g4" autocomplete="on" ' . ($trip->G4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="g4">G4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="h1" autocomplete="on" ' . ($trip->H1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="h1">H1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="h2" autocomplete="on" ' . ($trip->H2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="h2">H2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="h3" autocomplete="on" ' . ($trip->H3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="h3">H3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="h4" autocomplete="on" ' . ($trip->H4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="h4">H4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col gap">';
        $html .= '<input type="checkbox" class="btn-check" id="i1" autocomplete="on" ' . ($trip->I1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="i1">I1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="i2" autocomplete="on" ' . ($trip->I2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="i2">I2</label>';
        $html .= '</div>';
        $html .= '<div class="col">';

        $html .= '<input type="checkbox" class="btn-check" id="i3" autocomplete="on" ' . ($trip->I3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="i3">I3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="i4" autocomplete="on" ' . ($trip->I4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="i4">I4</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row seat">';
        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="j1" autocomplete="on" ' . ($trip->J1 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="j1">J1</label>';
        $html .= '<input type="checkbox" class="btn-check" id="j2" autocomplete="on" ' . ($trip->J2 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="j2">J2</label>';
        $html .= '</div>';

        $html .= '<input type="checkbox" class="btn-check" id="j5" autocomplete="on" ' . ($trip->J5 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="j5">J5</label>';

        $html .= '<div class="col">';
        $html .= '<input type="checkbox" class="btn-check" id="j3" autocomplete="on" ' . ($trip->J3 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="j3">J3</label>';
        $html .= '<input type="checkbox" class="btn-check" id="j4" autocomplete="on" ' . ($trip->J4 == 1 ? 'checked disabled' : '') . '>';
        $html .= '<label class="btn btn-outline-primary" for="j4">J4</label>';
        $html .= '</div>';
        $html .= '</div>';


        // Add more HTML or process the data as needed

        return response()->json(['html' => $html]);


    }





}