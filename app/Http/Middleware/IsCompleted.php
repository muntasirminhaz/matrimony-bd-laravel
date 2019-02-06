<?php

namespace App\Http\Middleware;

use App\Common;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isset(Auth::user()->id)) {

            if (Auth::user()->status == 3) {
                Auth::logout();
                return redirect()->route('login')->with('msg', 'Your profile is blocked.');
            }
            if (Auth::user()->status == 2) {
                Auth::logout();
                return redirect()->route('login')->with('msg', 'Your profile is disapproved.');
            }

            if (Auth::user()->completed < 100) {
                return redirect(Common::signupLevels(Auth::user()->completed))->with('msg', 'You need to complete your profile before you can browse the website.');
            }

            if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect()->route('login')->with('msg', 'Your profile is completed and our team is reviewing it. Once approved; we will email you.');
            }

            if (Auth::user()->email_verified != 1) {
                return redirect()->route('emailNotVerified')->with('msg', 'Your email is not verified, please check your inbox and verify your account now.');
            }

        }
        return $next($request);
    }
}
