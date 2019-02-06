<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAccountController extends Controller
{
    public function index()
    {

        $data['myAccount'] = Admin::find(Auth::guard('admin')->user()->id);
        return view('admin.myAccount.index', $data);
    }

    public function edit()
    {
        $data['myAccount'] = Admin::find(Auth::guard('admin')->user()->id);
        return view('admin.myAccount.edit', $data);
    }

    public function update(Request $request)
    {

        //print_r($request->all());

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

        $admin = Admin::find(Auth::guard('admin')->user()->id);
        if (!Hash::check($request->input('oldpasssword'), $admin->password)) {
            echo 'not matched';
            return redirect()->back()->with('error', 'Old password did not match.');
        }

        $admin->password = bcrypt($request->input('passsword'));

        if (!$admin->save()) {
            return redirect()->back()->with('error', 'Changes not saved. Please provide valid information.');
        }
        return redirect()->route('admin.adminAccount.index')->with('success', 'Your Password Changed!');
    }

}
