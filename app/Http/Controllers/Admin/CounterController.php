<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CounterList;
use App\Models\CounterMaster;

class CounterController extends Controller
{
    //

    public function counterPage()
    {
        $counter = CounterList::all();

        $data = compact('counter');

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
        $lastUserId = $coun->user_id;
        $newUserId = $lastUserId + 1;


        $data = compact('master', 'counter', 'newUserId');

        return view('admin.user')->with($data);
    }

    public function userAdd(Request $request)
    {


        $user = new CounterMaster;

        $user->coun_name = $request['coun_name'];
        $user->user_id = $request['user_id'];
        $user->user_name = $request['user_name'];
        $user->user_mobile = $request['user_mobile'];
        $user->password = $request['password'];

        $user->save();

        return redirect()->route('admin.user');
    }







}