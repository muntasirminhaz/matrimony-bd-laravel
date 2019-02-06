<?php

namespace App\Http\Controllers;

use App\AdminCommon;
use App\Mail\DefaultMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailVerification extends Controller
{

    public function index()
    {

        if (Auth::user()->email_verified == 1) {
            return redirect()->route('users.myprofile');
        }
        if (request()->query('sendmailagain') == 1) {
            $data['mailJustSend'] = true;
        }

        $data['profilePicture'] = \App\Common::userProfilePic();

        return view('emailNotVerifed', $data);
    }

    public function sendMailAgain()
    {

        if (Auth::user()->email_verified == 1) {
            return redirect()->route('users.myprofile');
        }

        Self::sendEmailVerification();

        return redirect(route('emailNotVerified') . '?sendmailagain=1')->with('success', 'Check your inbox, a new verification email has been send. Please verify your email now.');
    }

    public static function sendEmailVerification()
    {

        if (Auth::user()->email_verified == 1) {
            return redirect()->route('users.myprofile');
        }

        $user = User::find(Auth::user()->id);
        $token = str_random(16);
        $user->email_verified = $token;

        $name = AdminCommon::whoIsUserName(Auth::user()->id);

        Mail::to($user->email)->send(new DefaultMail(
            'Please Verify Your Email Address Now.',
            'Please Verify Your Email Address Now.',
            'Hi ' . $name . ';<br>
            Click the link below or copy it to the browser to verify your account now.<br><br>' .
            '<a href="' . route('checkEmailVerification', [$token, $user->id, $user->email]) . '">' .
            route('checkEmailVerification', [$token, $user->id, $user->email]) . '</a>'
            . '<br><br>Thank you <br>Matrimony'
        ));
        $user->save();
        return true;

    }

    public function check($verificationCode = null, $userid = null, $userEmail = null)
    {
        if (isset(Auth::user()->email_verified)) {
            if (Auth::user()->email_verified == 1) {
                return redirect()->route('users.myprofile');
            }
        }

        if ($verificationCode == null && $userid == null && $userEmail == null) {
            return 404;
        }

        $user = User::find($userid);

        if ($verificationCode == $user->email_verified && $userEmail == $user->email) {
            $user->email_verified = 1;
            $user->save();

            if (isset(Auth::user()->id)) {
                return redirect()->route('users.myprofile')->with('success', 'Your email is verified. Thank you for joining Matrimony');

            } else {
                return redirect()->route('login')->with('success', 'Your email is verified. Thank you for joining Matrimony');
            }

        }

        if (isset(Auth::user()->id)) {
            return redirect()->route('users.myprofile')->with('error', 'Your email is verification code is incorrect.');

        } else {
            return redirect()->route('emailNotVerified')->with('error', 'Your email is verification code is incorrect.');
        }

    }

}
