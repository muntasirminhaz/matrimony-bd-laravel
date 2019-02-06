<?php

namespace App\Http\Controllers\UserEditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EditParentController extends Controller
{
    private $successMessage = 'Parents Information is Updated Succesfully';
    private $editTitle = 'Edit Parents Information';

    public function edit()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['formAction'] = route('users.profile.parent.update');
        $data['editTitle'] = $this->editTitle;
        return view('UserEditProfile.parent', $data);

    }

    public function update(Request $request)
    {

        $validateFatherFormData = request()->validate(
            [
                'fname' => 'required',
                'flstatus' => 'required|numeric',
                'fsrvstatus' => 'required|numeric',
                'fprofession' => 'required|numeric',
                'father_profesion_details' => 'numeric',
                'fdesignation' => 'required',
                'forgname' => 'required',

                'mname' => 'required',
                'mlstatus' => 'required|numeric',
                'msrvstatus' => 'required|numeric',
                'mprofession' => 'required|numeric',
                'mother_profesion_details' => 'numeric',
                'mdesignation' => 'required',
                'morgname' => 'required',

                'landyeno' => 'required',
                'typeland' => 'required_if:landyeno,==,2',

            ]
            , [

                'fname.required' => 'Father\'s Name is required.',
                'fdesignation.required' => 'Father\'s Designation is required.',
                'forgname.required' => 'Father\'s Organizaiton Name is required.',
                'flstatus.required' => 'Father\'s Living Status* is required.',
                'flstatus.numeric' => 'Father\'s Living Status* is required.',
                'fsrvstatus.required' => 'Father\'s Service Status is required.',
                'fsrvstatus.numeric' => 'Father\'s Service Status is required.',
                'fprofession.required' => 'Father\'s Profession is required.',
                'fprofession.numeric' => 'Father\'s Profession is required.',

                'mname.required' => 'Mother\'s Name is required.',
                'mdesignation.required' => 'Mother\'s Designation is required.',
                'morgname.required' => 'Mother\'s Organizaiton Name is required.',
                'mlstatus.required' => 'Mother\'s Living Status* is required.',
                'mlstatus.numeric' => 'Mother\'s Living Status* is required.',
                'msrvstatus.required' => 'Mother\'s Service Status is required.',
                'msrvstatus.numeric' => 'Mother\'s Service Status is required.',
                'mprofession.required' => 'Mother\'s Profession is required.',
                'mprofession.numeric' => 'Mother\'s Profession is required.',

                'landyeno.required' => 'Have any land/flat in Dhaka/Nearby is required.',
                'typeland.required_if' => 'Types of Land/Flat required.',

            ]);

        $tableData = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'father_name' => $request->input('fname'),
            'father_living_status' => $request->input('flstatus'),
            'father_service_status' => $request->input('fsrvstatus'),
            'father_profession' => $request->input('fprofession'),
            'father_profession_details' => $request->input('father_profesion_details') ?? 0,
            'father_designation' => $request->input('fdesignation'),
            'father_organization_name' => $request->input('forgname'),

            'father_other_profession_details' => $request->input('father_other') ?? '',

            'mother_name' => $request->input('mname'),
            'mother_living_status' => $request->input('mlstatus'),
            'mother_service_status' => $request->input('msrvstatus'),
            'mother_profession' => $request->input('mprofession'),
            'mother_profession_details' => $request->input('mother_profesion_details') ?? 0,
            'mother_designation' => $request->input('mdesignation'),
            'mother_organization_name' => $request->input('morgname'),
            
            'mother_other_profession_details' => $request->input('mother_other') ?? '',


            'have_land' => $request->input('landyeno'),
            'land_type' => implode('|', (array) $request->get('typeland')) ?? 0,
            'family_background' => $request->input('familybackground'),

        ];
        
        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }



        return Common::UpdateUserTable($tableData, $this->successMessage);

    }

}
