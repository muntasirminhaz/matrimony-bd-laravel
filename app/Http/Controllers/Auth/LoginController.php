<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

//use App\User;

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
    protected $redirectTo = 'users/myprofile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request)
    {

        if (\Auth::user()->completed == 0) {
            // email not verified
            $resendCode = '<a href="' . route('resendCode', [$request->email, \Auth::user()->id]) . '">click here</a>';
            return redirect()->route('login')
                ->with('danger',
                    'You need to confirm your account. We have sent you an activation code, <br>Please check your email inbox(and spam folder).'
                    . '<br>If you did not received any email for activation code, please ' .
                    $resendCode
                );
        }
        if (\Auth::user()->completed < 100) {
            // profile not completed
            return redirect(\App\Common::signupLevels(\Auth::user()->completed));
        }
        return redirect()->intended($this->redirectPath());

    }
}
