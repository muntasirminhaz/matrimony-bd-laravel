<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EmailVerification;
use Illuminate\Support\Facades\Auth;

class LogUserOutAfterRegistration extends Controller
{
    public function index()
    {
        if (Auth::user()->completed == 0) {
            EmailVerification::sendEmailVerification();
        }
        return redirect()->route('signup.contact');
    }
}
