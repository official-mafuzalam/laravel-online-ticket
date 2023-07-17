<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //


    public function welcome(){
        return view('manager.welcome');
    }
}
