<?php

namespace App\Http\Controllers\Auth;

use App\Events\Status;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function logout(Request $request)
    {
        event(new Status($request->user(), false)); // Fire the Status event with the user and their online status (false, since they are logging out)

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        event(new Status($user, true)); // Fire the Status event with the user and their online status (true, since they are logging in)
    }
}
