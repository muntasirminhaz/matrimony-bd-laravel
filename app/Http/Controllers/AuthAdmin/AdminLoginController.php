<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('web');        
    }

    public function showLoginForm()
    {
        return view('authadmin.adminlogin');
    }
    
    public function authenticated(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::guard('admin')->attempt($credentials, $remember = false)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('danger', 'Your Login Credentials are invalid.');

    }
}
