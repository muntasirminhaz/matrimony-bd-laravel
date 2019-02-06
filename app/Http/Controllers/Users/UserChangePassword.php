<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserChangePassword extends Controller
{

    public function index()
    {

        $data['profilePicture'] = Common::userProfilePic();
        $data['myAccount'] = User::find(Auth::user()->id);
        return view('users.changepassword.index', $data);

    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'userid' => 'required|numeric',
                'oldpasssword' => 'required|min:6',
                'password' => 'required|min:6|confirmed:password_confirmation',
            ]
        );

        if (!$validator) {
            return redirect()->back()->with('error', 'Changes not saved. Please provide valid information.');
        }

        $user = user::find(Auth::user()->id);
        if (!Hash::check($request->input('oldpasssword'), $user->password)) {
            return redirect()->back()->with('error', 'Old password did not match.');
        }

        $user->password = bcrypt($request->input('passsword'));

        if (!$user->save()) {
            return redirect()->back()->with('error', 'Changes not saved. Please provide valid information.');
        }

        return redirect()->back()->with('success', 'Your Password Changed!');

    }

}
