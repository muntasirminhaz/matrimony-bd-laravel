<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileAccountController extends Controller
{
    public function view()
    {
        $data['sidebarMenus'] = Common::profileEditSidebar();    
        $data['profilePicture'] = Common::userProfilePic();
        return view('users.editprofile.basic.index', $data);

    }

    public function update(Request $request)
    {
        $validateFormData = request()->validate(
            [
                'fname' => 'required|alpha',
                'mname' => 'string|nullable',
                'lname' => 'required|alpha',
                'dob' => 'required|date|before:' . date('Y-m-d') . '|date_format:Y-m-d',
                'nid' => 'numeric|nullable',
                'passport' => 'numeric|nullable',
            ], [
                'fname.required' => 'First name is required.',
                'lname.required' => 'Last name is required.',
                'fname.alpha' => 'First name may only contain letters.',
                'mname.string' => 'Middle name may only contain letters.',
                'lname.alpha' => 'Last name may only contain letters.',
                'dob.date' => 'Date of Birth must be a Date.',
                'dob.required' => 'Date of Birth is required.',
                'dob.before' => 'Must Atleast 18 Years Old.',
                'dob.date_format' => 'Must be a valid date.',
                'nid.required' => 'National ID Card Number is required.',
                'nid.numeric' => 'Invalide National ID Card Number.',
                'passport.numeric' => 'Invalide passport Number.',
            ]
        );

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData = [
            'first_name' => $request->input('fname'),
            'middle_name' => $request->input('mname') ?? '',
            'last_name' => $request->input('lname'),
            'date_of_birth' => $request->input('dob'),
            'national_id' => $request->input('nid') ?? '',
            'passport_no' => $request->input('passport') ?? '',
        ];

        $update = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Invalid information, General Information Not Updated!!');
        }
        return redirect()->route('users.editprofile.account.view')->with('success', 'General Information is succesfully updated');
    }
}
