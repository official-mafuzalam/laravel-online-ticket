<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {


            $user = auth()->user();

            $userDetails = DB::table('counter_masters')
                ->where('email', $user->email)
                ->first();


            if ($userDetails) {
                // If the user details were found, proceed to retrieve the corresponding counDetails
                $counDetails = DB::table('counter_lists')
                    ->where('counter_id', $userDetails->coun_id)
                    ->first();
            } else {
                // Handle the case where user details were not found (optional)
                $counDetails = null;
            }

            // Store the user's full details in the session
            $request->session()->put('user', array_merge($user->toArray(), (array) $userDetails, (array) $counDetails));


            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.welcome');
            } else if (auth()->user()->type == 'manager') {
                return redirect()->route('manager.welcome');
            } else {
                return redirect()->route('agents.welcome');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }

    }
}