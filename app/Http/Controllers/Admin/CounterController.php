<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CounterList;

class CounterController extends Controller
{
    //

    public function counterPage()
    {
        $counter = CounterList::all();

        $data = compact('counter');

        return view('admin.counter')->with($data);
    }


    public function counterAdd(Request $request){

        $counter = new CounterList;

        $counter->counter_id = $request['counter_id'];
        $counter->main_route = $request['main_route'];
        $counter->coun_name = $request['coun_name'];
        $counter->coun_add = $request['coun_add'];
        $counter->time_deff = $request['time_deff'];

        $counter->save();

        return redirect()->route('admin.counter');


    }








}