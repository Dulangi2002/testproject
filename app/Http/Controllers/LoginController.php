<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Laravel\Fortify\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');


        //ensure you are logged in. close the browser and visit the url again 
        //on another broswer , you should be logged in to the dashboard if you
        if (Auth::attempt($credentials, $remember)) {
            Log::debug('User authenticated:', ['user' => Auth::user()]);
            return redirect()->intended('dashboard');
        }



        return redirect()->route('login')->withErrors(['email' => trans('auth.failed')])->withInput();


        //added a log check to see if the checkbox value is being properly sent 
        // Log::debug('Remember Me:', ['remember' => $request->has('remember')]);
        // Auth::login($user, $request->has('remember'));

    }
}
