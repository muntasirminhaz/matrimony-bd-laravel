<?php

namespace App\Http\Controllers\UserEditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EditContactController extends Controller
{

    private $successMessage = 'Contact Information is Updated Succesfully';
    private $editTitle = 'Edit Contact Information';

    public function edit()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['formAction'] = route('users.profile.contact.update');
        $data['editTitle'] = $this->editTitle;
        return view('UserEditProfile.contact', $data);

    }

    public function update(Request $request)
    {

        $validateFormData = request()->validate(
            [
                'fullname' => 'required',
                'email' => 'required|string|email|max:255',
                'relation' => 'required|numeric',
                'mobile' => 'required',
                'timeform' => 'required',
                'timeto' => 'required',
                'presentaddress' => 'required',
                'permanentaddress' => 'required',

            ]
            , [
                'fullname.required' => 'Name of Contact Person is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is required',
                'email.string' => 'Email must be valid',
                'email.max' => 'Email must be valid',
                //'email.unique' => 'Email must be valid',
                'relation.required' => 'Relation is required',
                'relation.numeric' => 'Relation is required',
                'mobile.required' => 'Mobile No. is required',
                'mobile.numeric' => 'Mobile No. must be valid',

                'timeform.required' => 'Please provide valid information on Convinient time to call',
                'timeto.required' => 'Please provide valid information on Convinient time to call',
                'presentaddress.required' => 'Present address is required',
                'permanentaddress.required' => 'Permanent address is required',
            ]);

        $tableData = [
            'updated_at' => Carbon::now(),
            'contact_name' => $request->input('fullname'),
            'contact_email' => $request->input('email'),
            'contact_relation' => $request->input('relation'),
            'contact_timetocall' => $request->input('timeform') . ' - ' . $request->input('timeto'),
            'contact_mobile' => $request->input('mobile'),
            'contact_present_address' => $request->input('presentaddress'),
            'contact_permanent_address' => $request->input('permanentaddress'),
        ];

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        return Common::UpdateUserTable($tableData, $this->successMessage);

    }

}
