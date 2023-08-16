<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\CounterList;
use App\Models\CounterMaster;
use App\Models\Supervisor;
use App\Models\User;

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
        $counter->coun_name = $request['coun_name'];
        $counter->coun_add = $request['coun_add'];
        $counter->time_deff = $request['time_deff'];

        $counter->save();

        // Show success notification
        session()->flash('success', 'New Counter added successfully.');

        return redirect()->route('admin.counter');

    }

    public function counterEdit($id)
    {

        $counter = CounterList::find($id);

        $data = compact('counter');

        return view('admin.counter_edit')->with($data);

    }

    public function counterUpdate(Request $request, $id)
    {

        $counter = CounterList::find($id);

        $counter->counter_id = $request['counter_id'];
        $counter->coun_name = $request['coun_name'];
        $counter->coun_add = $request['coun_add'];
        $counter->time_deff = $request['time_deff'];

        $counter->save();

        // Show success notification
        session()->flash('success', 'Counter details updated successfully.');

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

        $coun_master = new CounterMaster;

        $coun_master->coun_name = $request['coun_name'];
        $coun_master->coun_id = $request['coun_id'];
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

        // Show success notification
        session()->flash('success', 'Counter master added successfully.');

        return redirect()->route('admin.user');
    }

    public function userEdit($id)
    {

        $coun_master = CounterMaster::find($id);

        $data = compact('coun_master');

        return view('admin.user_edit')->with($data);

    }

    public function userUpdate(Request $request, $id)
    {

        $coun_master = CounterMaster::find($id);

        $coun_master->coun_name = $request['coun_name'];
        $coun_master->coun_id = $request['coun_id'];
        $coun_master->user_type = $request['type'];
        $coun_master->user_id = $request['user_id'];
        $coun_master->user_name = $request['user_name'];
        $coun_master->user_mobile = $request['user_mobile'];
        $coun_master->email = $request['user_email'];
        $coun_master->password = $request['password'];

        $coun_master->save();

        $user = User::where('email', $coun_master->email)->first(); // Use first() to get the model instance

        if ($user) {
            $user->type = $request['type'];
            $user->name = $request['user_name'];
            $user->email = $request['user_email'];
            $user->password = Hash::make($request['password']);
            $user->save();
        } else {
            // Handle the case when the user with the given email is not found
        }


        // Show success notification
        session()->flash('success', 'Counter master details updated successfully.');

        return redirect()->route('admin.user');


    }


    public function supervisorPage()
    {

        $sup_details = Supervisor::all();


        $super = Supervisor::latest()->first();
        $lastUserId = $super->user_id;
        $newUserId = $lastUserId + 1;

        $data = compact('newUserId', 'sup_details');

        return view('admin.supervisor')->with($data);

    }

    public function supervisorAdd(Request $request)
    {

        $super = new Supervisor;

        $super->user_id = $request['user_id'];
        $super->user_name = $request['user_name'];
        $super->mobile = $request['mobile'];
        $super->save();

        // Show success notification
        session()->flash('success', 'New Supervisor added successfully.');

        return redirect()->route('admin.supervisor');

        // p($request->toArray());
    }

    public function supervisorEdit($id)
    {

        $super = Supervisor::find($id);

        return view('admin.supervisor_edit', ['super' => $super]);

        // p($super);

    }

    public function supervisorUpdate(Request $request, $id)
    {

        $super = Supervisor::find($id);

        $super->user_name = $request['user_name'];
        $super->mobile = $request['mobile'];
        $super->save();

        // Show success notification
        session()->flash('success', 'Supervisor data updated successfully.');

        return redirect()->route('admin.supervisor');


        // p($request->toArray());

    }





}