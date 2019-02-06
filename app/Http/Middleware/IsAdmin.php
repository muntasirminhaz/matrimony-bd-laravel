<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

       /*
        if (Auth::guard('web')->check()) {
            return redirect()->back();
        }
        */
        if (Auth::guard('admin')->check()) {
            /**
             * Remaining
             * Check status
             * if status is 0 logout and show reason
             */
            if (Admin::all()->pluck('status')->toArray()[0] != 1) {
                Auth::logout();
                return redirect()->route('admin.login')->with('danger', 'We found no account active with your email!');
            }
            return $next($request);

        }

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('danger', 'Your Login Credentials are invalid!   dsadsa das');

    }
}
