<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    //

    public function welcome(){
        return view('agents.welcome');
    }
}
