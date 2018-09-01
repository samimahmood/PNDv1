<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('vendor.adminlte.auth.login-admin');
    }

    public function login(Request $request)
    {
        // Validate the form Data
        $this->validate($request,[

            'email' => 'required',
            'password' => 'required'
        ]);

        //Attempt to log User In
        if ( Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password ], $request->remember ))
        {
            //if Successful , then redirect to intended location

            return redirect()->intended(route('admin.dashboard'));
        }

        // if unsuccessful , then redirect to login

        return redirect()->back()->withInput($request->only('email' , 'remember'));


    }
}
