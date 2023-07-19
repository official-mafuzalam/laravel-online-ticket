<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TripStatus;
use App\Models\MainRoute;
use App\Models\SellTicketHis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

    public function welcome()
    {
        // $main_route = session('user.main_route');

        // $tripStatus = new TripStatus();
        // $trips = $tripStatus->get();

        // $trips = TripStatus::where('main_route', $main_route)->get();

        $formattedDate = date('Y-m-d');

        $trips = DB::table('trip_statuses')
            ->where('date', $formattedDate)
            ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
            ->get();

        $data = compact('trips');

        return view('admin.welcome')->with($data);
    }


    public function seat_plan($trip_id)
    {

        $trip_data = TripStatus::where('trip_id', $trip_id)->first();

        $data = compact('trip_data');

        return view('seat_plan')->with($data);



    }



    public function show($id)
    {
        $trip_data = TripStatus::find($id);

        $html = view('seat', compact('trip_data'))->render();
        return response()->json(['html' => $html]);
    }





    public function sell_ticket(Request $request)
    {


        $validator = Validator::make($request->all(), [


            'trip_id' => ['required'],
            'coach_no' => ['required'],
            'station' => ['required'],
            'route' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'gender' => ['required'],
            'fare' => ['required'],
            'total_fare' => ['required'],
            'mobile' => ['required'],
            'name' => ['required'],
            'seat' => ['required'],


        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $ticket = new SellTicketHis;

            $ticket->trip_id = $request['trip_id'];
            $ticket->coach_no = $request['coach_no'];
            $ticket->ticket_id = uniqid();

            $ticket->route = $request['route'];
            $ticket->date = $request['date'];
            $ticket->time = $request['time'];
            $ticket->seat = $request['seat'];

            $fare = $request['fare'];
            $total_fare = $request['total_fare'];
            $discount_fare = $request['discount_fare'];

            $ticket->fare = $fare;
            $ticket->discount = $discount_fare;
            $ticket->discount_fare_per_seat = $fare - $discount_fare;
            $ticket->total_fare = $total_fare;

            $ticket->station = $request['station'];
            $ticket->mobile = $request['mobile'];
            $ticket->name = $request['name'];
            $ticket->gender = $request['gender'];

            $ticket->seller_name = 'Mafuz';
            $ticket->seller_id = '10000';
            $ticket->seller_counter = 'Gabtoli';

            $ticket->save();


            $seat = $request['seat'];
            $trip_id = $request['trip_id'];

            $seats = preg_split('/(?<=\d)(?=[A-Z])/', $seat); // split the string using a regular expression
            $updates = [];
            foreach ($seats as $seat) {
                $updates[$seat] = 1;
            }

            DB::table('trip_statuses')
                ->where('trip_id', $trip_id)
                ->update($updates);


        }
    }




}