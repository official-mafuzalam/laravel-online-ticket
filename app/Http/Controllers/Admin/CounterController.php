<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\CounterList;
use App\Models\CounterMaster;
use App\Models\MainRoute;
use App\Models\User;

class CounterController extends Controller
{
    //

    public function counterPage()
    {
        $main_route = MainRoute::all();

        $counter = CounterList::all();

        $data = compact('counter', 'main_route');

        return view('admin.counter')->with($data);
    }


    public function counterAdd(Request $request)
    {

        $counter = new CounterList;

        $counter->counter_id = $request['counter_id'];
        $counter->main_route = $request['main_route'];
        $counter->coun_name = $request['coun_name'];
        $counter->coun_add = $request['coun_add'];
        $counter->time_deff = $request['time_deff'];

        $counter->save();

        return redirect()->route('admin.counter');


    }

    public function userPage()
    {

        $counter = CounterList::all();

        $master = CounterMaster::all();


        $coun = CounterMaster::latest()->first();
        // $lastUserId = $coun->user_id;
        $newUserId = 1000;



        $data = compact('master', 'counter', 'newUserId');

        return view('admin.user')->with($data);
    }

    public function userAdd(Request $request)
    {

        $coun_master = new CounterMaster;

        $coun_master->coun_name = $request['coun_name'];
        $coun_master->coun_id = $request['coun_id'];
        $coun_master->main_route = $request['main_route'];
        $coun_master->user_type = $request['type'];
        $coun_master->user_id = $request['user_id'];
        $coun_master->user_name = $request['user_name'];
        $coun_master->user_mobile = $request['user_mobile'];
        $coun_master->email = $request['user_email'];
        $coun_master->password = $request['password'];

        $coun_master->save();

        User::create([
            'name' => $request['user_name'],
            'email' => $request['user_email'],
            'type' => $request['type'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.user');
    }







}