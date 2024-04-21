<?php

namespace App\Http\Controllers\Auth;
use App\Events\Status;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    
public function logout(Request $request)
{
    // Fire the Status event with the user and their online status (false, since they are logging out)
    event(new Status($request->user(), false));

    // Log the user out
    $this->guard()->logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Redirect to the login page
    return $this->loggedOut($request) ?: redirect('/');
}


    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        event(new Status($user, true)); // User is now online
    }
}

