<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TripStatus;
use App\Models\SellTicketHis;
use App\Models\Supervisor;
use App\Models\TripSheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class HomeController extends Controller
{
    //

    public function welcome(Request $request)
    {
        $coun_id = session('user.coun_id');

        // $tripStatus = new TripStatus();
        // $trips = $tripStatus->get();

        // $trips = TripStatus::where('main_route', $main_route)->get();


        $search_date = isset($request['date']) ? $request['date'] : "";

        if ($search_date != "") {

            $trips = DB::table('trip_statuses')
                ->where('date', $search_date)
                ->whereRaw("FIND_IN_SET($coun_id, counters)") // Search for $coun_id in counters
                ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
                ->get();


        } else {
            $formattedDate = date('Y-m-d');

            $trips = DB::table('trip_statuses')
                ->where('date', $formattedDate)
                ->whereRaw("FIND_IN_SET($coun_id, counters)") // Search for $coun_id in counters
                ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
                ->get();
        }


        $data = compact('trips');

        return view('admin.welcome')->with($data);
    }

    public function show_seat_plane($id)
    {
        $trip_data = TripStatus::find($id);

        $html = view('admin.seat', compact('trip_data'))->render();
        return response()->json(['html' => $html]);

        // return view('admin.seat', ['trip_data' => $trip_data]);
    }

    // public function get_name($mobile){

    // }

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

            // Sold Male = 1
            // Sold Female = 2
            // Booked Male = 3
            // Booked Female = 4
            // Sell = 5
            // Book = 6




            $ticket = new SellTicketHis;

            $ticket_id = uniqid();


            $ticket->trip_id = $request['trip_id'];
            $ticket->coach_no = $request['coach_no'];
            $ticket->ticket_id = $ticket_id;

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

            $seller_name = session('user.user_name', 'default');
            $seller_id = session('user.user_id', 'default');
            $seller_counter = session('user.coun_name', 'default');

            $ticket->seller_name = $seller_name;
            $ticket->seller_id = $seller_id;
            $ticket->seller_counter = $seller_counter;

            $ticket->save();


            $booking_type = $request['booking_type'];
            $gender = $request['gender'];

            // $update_value = 0;

            // if ($booking_type == 5) {
            //     if ($gender == 1) {
            //         $update_value = 1;
            //     } else {
            //         $update_value = 2;
            //     }
            // } else {
            //     if ($gender == 1) {
            //         $update_value = 5;
            //     } else {
            //         $update_value = 6;
            //     }
            // }




            $seat = $request['seat'];
            $trip_id = $request['trip_id'];

            $seats = preg_split('/(?<=\d)(?=[A-Z])/', $seat); // split the string using a regular expression
            $updates = [];
            foreach ($seats as $seat) {
                $updates[$seat] = $gender;
            }

            DB::table('trip_statuses')
                ->where('trip_id', $trip_id)
                ->update($updates);

            // return redirect()->route('admin.ticket_print');

            return redirect()->route('admin.ticket_print', ['id' => $ticket_id]);
        }
    }


    public function ticket_print($id)
    {

        $ticket = SellTicketHis::where('ticket_id', $id)->first();

        // p($ticket->toArray());

        $data = compact('ticket');

        return view('admin.ticket_print')->with($data);
    }

    public function trip_sheet($id)
    {
        $super_details = Supervisor::all();

        $trip_sheet = TripSheet::where('trip_id', $id)->first();

        // Inside your controller method
        $tripStatusId = $id; // Replace $id with the desired trip_status id

        $trip_details = DB::table('trip_statuses')
            ->where('trip_id', $id)
            ->get();

        // Create an array to store the column names A1 to J4
        $columns = [];
        for ($row = 'A'; $row <= 'J'; $row++) {
            for ($i = 1; $i <= 4; $i++) {
                $columns[] = $row . $i;
            }
        }

        // Use Laravel's query builder to build the query
        $tripStatus = TripStatus::where('trip_id', $tripStatusId)->where(function ($query) use ($columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, '=', 1)
                    ->orWhere($column, '=', 2);
            }
        })->first($columns); // Use first() instead of get() to get only one row

        // Check if $tripStatus is not null before accessing its properties
        if ($tripStatus) {
            // Filter the columns that have values 1 or 2
            $result = [];
            foreach ($columns as $column) {
                if ($tripStatus->$column == 1 || $tripStatus->$column == 2) {
                    $result[$column] = $tripStatus->$column;
                }
            }

            // Loop through each seat and fetch data from SellTicketHis table
            $sellTicketHisData = [];
            foreach ($result as $seat => $value) {
                $sellTicketHisData[$seat] = SellTicketHis::where('trip_id', $tripStatusId)
                    ->where('seat', 'LIKE', '%' . $seat . '%')
                    ->get();
            }
        } else {
            // Handle the case where $tripStatus is null (optional)
            // You can log an error or redirect to an error page, for example.
            // For now, I'll just set $sellTicketHisData to an empty array.
            $sellTicketHisData = [];
        }

        // Pass the data to the view
        $data = compact('sellTicketHisData', 'trip_details', 'super_details', 'trip_sheet');
        return view('admin.trip_sheet')->with($data);





        // dd($sellTicketHisData); // Add this debug statement

        // p($sellTicketHisData);

    }


    public function trip_sheetAdd(Request $request)
    {


        $random_num = null;
        do {
            $random_num = rand(10000, 99999);
        } while (DB::table('trip_sheets')->where('trip_sheet_id', $random_num)->exists());


        $trip = new TripSheet;

        $trip->trip_id = $request['trip_id'];
        $trip->trip_sheet_id = $random_num;
        $trip->super_name = $request['super_name'];
        $trip->super_mobile = $request['super_mobile'];
        $trip->driver_name = $request['driver_name'];
        $trip->reg_no = $request['reg_no'];

        $trip->save();


        return redirect()->back();



        // p($request->toArray());

    }

    public function trip_sheetEdit($id)
    {

        $super_details = Supervisor::all();

        $trip = TripSheet::where('trip_id', $id)->first();

        if (!$trip) {
            $trip = new TripSheet;
        }

        return view('admin.trip_sheet_update', compact('trip', 'super_details', 'id'));

        // p($trip);


    }

    public function trip_sheetUpdate(Request $request, $id)
    {
        $trip = TripSheet::where('trip_id', $id)->first();

        if ($trip) {
            $trip->update([
                'super_name' => $request['super_name'],
                'super_mobile' => $request['super_mobile'],
                'driver_name' => $request['driver_name'],
                'reg_no' => $request['reg_no'],
            ]);
        }

        return redirect()->back();
    }







    // public function pre_day($date)
    // {

    //     $formattedDate = date('Y-m-d');

    //     $trips = DB::table('trip_statuses')
    //         ->where('date', $date)
    //         ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
    //         ->get();

    //     $data = compact('trips');

    //     return view('admin.welcome')->with($data);

    // }

    public function date($date)
    {

        // $formattedDate = date('Y-m-d');

        $trips = DB::table('trip_statuses')
            ->where('date', $date)
            ->orderBy(DB::raw("STR_TO_DATE(time, '%h:%i %p')"))
            ->get();

        $data = compact('trips');

        return view('admin.welcome')->with($data);

    }

    public function sells_report(Request $request)
    {
        $seller_id = session('user.user_id', 'default');

        $date1 = isset($request['date1']) ? Carbon::parse($request['date1'])->startOfDay() : null;
        $date2 = isset($request['date2']) ? Carbon::parse($request['date2'])->endOfDay() : null;

        if ($date1 != "" && $date2 != "") {
            $sells = SellTicketHis::where('seller_id', $seller_id)
                ->whereBetween('created_at', [$date1, $date2])
                ->get();
        } else {
            $sells = SellTicketHis::where('seller_id', $seller_id)->get();
        }

        $data = compact('sells');
        return view('admin.sells_report')->with($data);

    }



}