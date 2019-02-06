<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileParentsController extends Controller
{
    public function view()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        $data['parents'] = DB::table('users_parents')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->orderBy('type', 'ASC')
            ->get();

        $data['father'] = DB::table('users_parents')
            ->select('*')
            ->where([
                ['userid', Auth::user()->id],
                ['type', 1],
            ])
            ->first();
        $data['mother'] = DB::table('users_parents')
            ->select('*')
            ->where([
                ['userid', Auth::user()->id],
                ['type', 2],
            ])
            ->first();

        return view('users.editprofile.parents.index', $data);
    }

    public function create()
    {
        $data['message'] = 'Insert Parents';
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        return view('users.editprofile.parents.create', $data);
    }

    public function store()
    {

    }

    public function createFather()
    {
        $data['message'] = 'Insert Father';
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        return view('users.editprofile.parents.insertFather', $data);
    }
    public function createMother()
    {
        $data['message'] = 'Insert Mother';
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        return view('users.editprofile.parents.insertMother', $data);
    }

    public function storeFather(Request $request)
    {

        $validationRules = [
            'fname' => 'required|max:100',
            'flstatus' => 'required|numeric',
        ];

        $customMessages = [
            'fname.max' => 'Name is too long (maximum 100 characters).',
            'fname.required' => 'Name  is required.',
            'flstatus.required' => 'Living Status is required.',
            'flstatus.numeric' => 'Living Status is required.',
        ];

        $tableData = [
            'userid' => Auth::user()->id,
            'type' => 1,
            'parent_name' => $request->input('fname'),
            'living_status' => $request->input('flstatus'),

            'more_info' => $request->input('fmoreinfo') ?? '',
        ];

        if ($request->input('flstatus') == 1) {
            $validationRules['fsrvstatus'] = 'required|numeric';
            $customMessages['fsrvstatus.numeric'] = 'Service Status is required.';
            $customMessages['fsrvstatus.required'] = 'Service Status is required.';
            $tableData['service_status'] = $request->input('fsrvstatus');
            if ($request->input('fsrvstatus') != 3) {
                $validationRules['fprofession'] = 'required|numeric';
                $customMessages['fprofession.numeric'] = 'Profession is required';
                $customMessages['fprofession.required'] = 'Profession is required';
                $tableData['profession'] = $request->input('fprofession');

                if ($request->input('fprofession') == 1 ||
                    $request->input('fprofession') == 2 ||
                    $request->input('fprofession') == 5 ||
                    $request->input('fprofession') == 6 ||
                    $request->input('fprofession') == 9 ||
                    $request->input('fprofession') == 10) {

                    $validationRules['fdesignation'] = 'required|max:100';
                    $validationRules['forgname'] = 'required|max:100';

                    $validationRules['profesion_details'] = 'required|numeric';

                    $customMessages['fdesignation.required'] = 'Designation is required';
                    $customMessages['forgname.required'] = 'Organization Name is required';
                    $customMessages['fdesignation.max'] = 'Designation is too long (maximum 100 characters)';
                    $customMessages['forgname.max'] = 'Organization Name is too long (maximum 100 characters)';
                    $customMessages['profesion_details.required'] = 'Profession detials is required';
                    $customMessages['profesion_details.numeric'] = 'Profession detials is required';

                    $tableData['designation'] = $request->input('fdesignation');
                    $tableData['organization_name'] = $request->input('forgname');
                    $tableData['profession_details'] = $request->input('profesion_details');
                }

                if ($request->input('fprofession') == 3 ||
                    $request->input('fprofession') == 4 ||
                    $request->input('fprofession') == 7 ||
                    $request->input('fprofession') == 8) {

                    $validationRules['fdesignation'] = 'required|max:100';
                    $validationRules['forgname'] = 'required|max:100';

                    $customMessages['fdesignation.required'] = 'Designation is required';
                    $customMessages['forgname.required'] = 'Organization Name is required';
                    $customMessages['fdesignation.max'] = 'Designation is too long (maximum 100 characters)';
                    $customMessages['forgname.max'] = 'Organization Name is too long (maximum 100 characters)';

                    $tableData['designation'] = $request->input('fdesignation');
                    $tableData['organization_name'] = $request->input('forgname');
                    $tableData['profession_details'] = 0;
                }

                if ($request->input('fprofession') == 0 ||
                    $request->input('fprofession') == 11 ||
                    $request->input('fprofession') == 12 ||
                    $request->input('fprofession') == 14 ||
                    $request->input('fprofession') == 15) {
                    $tableData['designation'] = 0;
                    $tableData['organization_name'] = 0;
                    $tableData['profession_details'] = 0;
                }
            } else {
                $tableData['profession'] = 0;
                $tableData['designation'] = 0;
                $tableData['organization_name'] = 0;
                $tableData['profession_details'] = 0;

            }
        } else {
            $tableData['service_status'] = 0;
            $tableData['profession'] = 0;
            $tableData['designation'] = 0;
            $tableData['organization_name'] = 0;
            $tableData['profession_details'] = 0;
        }

        $validateFormData = request()->validate($validationRules, $customMessages);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('users_parents')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Invalid information, Father\'s Information Not Inserted!!');
        }

        return redirect()->route('users.editprofile.parents.view')->with('success', 'Father\'s Information is Inserted Successfully!');

    }

    public function storeMother(Request $request)
    {

        $validationRules = [
            'fname' => 'required|max:100',
            'flstatus' => 'required|numeric',
        ];

        $customMessages = [
            'fname.max' => 'Name is too long (maximum 100 characters).',
            'fname.required' => 'Name  is required.',
            'flstatus.required' => 'Living Status is required.',
            'flstatus.numeric' => 'Living Status is required.',
        ];

        $tableData = [
            'userid' => Auth::user()->id,
            'type' => 2,
            'parent_name' => $request->input('fname'),
            'living_status' => $request->input('flstatus'),

            'more_info' => $request->input('fmoreinfo') ?? '',
        ];

        if ($request->input('flstatus') == 1) {
            $validationRules['fsrvstatus'] = 'required|numeric';
            $customMessages['fsrvstatus.numeric'] = 'Service Status is required.';
            $customMessages['fsrvstatus.required'] = 'Service Status is required.';
            $tableData['service_status'] = $request->input('fsrvstatus');
            if ($request->input('fsrvstatus') != 3) {
                $validationRules['fprofession'] = 'required|numeric';
                $customMessages['fprofession.numeric'] = 'Profession is required';
                $customMessages['fprofession.required'] = 'Profession is required';
                $tableData['profession'] = $request->input('fprofession');

                if ($request->input('fprofession') == 1 ||
                    $request->input('fprofession') == 2 ||
                    $request->input('fprofession') == 5 ||
                    $request->input('fprofession') == 6 ||
                    $request->input('fprofession') == 9 ||
                    $request->input('fprofession') == 10) {

                    $validationRules['fdesignation'] = 'required|max:100';
                    $validationRules['forgname'] = 'required|max:100';

                    $validationRules['profesion_details'] = 'required|numeric';

                    $customMessages['fdesignation.required'] = 'Designation is required';
                    $customMessages['forgname.required'] = 'Organization Name is required';
                    $customMessages['fdesignation.max'] = 'Designation is too long (maximum 100 characters)';
                    $customMessages['forgname.max'] = 'Organization Name is too long (maximum 100 characters)';
                    $customMessages['profesion_details.required'] = 'Profession detials is required';
                    $customMessages['profesion_details.numeric'] = 'Profession detials is required';

                    $tableData['designation'] = $request->input('fdesignation');
                    $tableData['organization_name'] = $request->input('forgname');
                    $tableData['profession_details'] = $request->input('profesion_details');
                }

                if ($request->input('fprofession') == 3 ||
                    $request->input('fprofession') == 4 ||
                    $request->input('fprofession') == 7 ||
                    $request->input('fprofession') == 8) {

                    $validationRules['fdesignation'] = 'required|max:100';
                    $validationRules['forgname'] = 'required|max:100';

                    $customMessages['fdesignation.required'] = 'Designation is required';
                    $customMessages['forgname.required'] = 'Organization Name is required';
                    $customMessages['fdesignation.max'] = 'Designation is too long (maximum 100 characters)';
                    $customMessages['forgname.max'] = 'Organization Name is too long (maximum 100 characters)';

                    $tableData['designation'] = $request->input('fdesignation');
                    $tableData['organization_name'] = $request->input('forgname');
                    $tableData['profession_details'] = 0;
                }

                if ($request->input('fprofession') == 0 ||
                    $request->input('fprofession') == 11 ||
                    $request->input('fprofession') == 12 ||
                    $request->input('fprofession') == 14 ||
                    $request->input('fprofession') == 15) {
                    $tableData['designation'] = 0;
                    $tableData['organization_name'] = 0;
                    $tableData['profession_details'] = 0;
                }
            } else {
                $tableData['profession'] = 0;
                $tableData['designation'] = 0;
                $tableData['organization_name'] = 0;
                $tableData['profession_details'] = 0;

            }
        } else {
            $tableData['service_status'] = 0;
            $tableData['profession'] = 0;
            $tableData['designation'] = 0;
            $tableData['organization_name'] = 0;
            $tableData['profession_details'] = 0;

        }

        $validateFormData = request()->validate($validationRules, $customMessages);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('users_parents')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Invalid information, Mother\'s Information Not Inserted!!');
        }

        return redirect()->route('users.editprofile.parents.view')->with('success', 'Mother\'s Information is Inserted Successfully!');

    }

    public function edit($id)
    {
        $data['parent'] = DB::table('users_parents')
            ->select('*')
            ->where('id', $id)
            ->first();

        if (!$data['parent']) {
            return redirect()->route('users.editprofile.parents.view')->with('error', 'Parent Information not added');
        }

        if ($data['parent']->type == 1) {
            $data['message'] = 'Edit Father\'s Information';
        }

        if ($data['parent']->type == 2) {
            $data['message'] = 'Edit Mother\'s Information';
        }

        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        return view('users.editprofile.parents.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validationRules = [
            'fname' => 'required|max:100',
            'flstatus' => 'required|numeric',
        ];

        $customMessages = [
            'fname.max' => 'Name is too long (maximum 100 characters).',
            'fname.required' => 'Name  is required.',
            'flstatus.required' => 'Living Status is required.',
            'flstatus.numeric' => 'Living Status is required.',
        ];

        $tableData = [
            'parent_name' => $request->input('fname'),
            'living_status' => $request->input('flstatus'),

            'more_info' => $request->input('fmoreinfo') ?? 0,
        ];

        if ($request->input('flstatus') == 1) {
            $validationRules['fsrvstatus'] = 'required|numeric';
            $customMessages['fsrvstatus.numeric'] = 'Service Status is required.';
            $customMessages['fsrvstatus.required'] = 'Service Status is required.';
            $tableData['service_status'] = $request->input('fsrvstatus');
            if ($request->input('fsrvstatus') != 3) {
                $validationRules['fprofession'] = 'required|numeric';
                $customMessages['fprofession.numeric'] = 'Profession is required';
                $customMessages['fprofession.required'] = 'Profession is required';
                $tableData['profession'] = $request->input('fprofession');

                if ($request->input('fprofession') == 1 ||
                    $request->input('fprofession') == 2 ||
                    $request->input('fprofession') == 5 ||
                    $request->input('fprofession') == 6 ||
                    $request->input('fprofession') == 9 ||
                    $request->input('fprofession') == 10) {

                    $validationRules['fdesignation'] = 'required|max:100';
                    $validationRules['forgname'] = 'required|max:100';

                    $validationRules['profesion_details'] = 'required|numeric';

                    $customMessages['fdesignation.required'] = 'Designation is required';
                    $customMessages['forgname.required'] = 'Organization Name is required';
                    $customMessages['fdesignation.max'] = 'Designation is too long (maximum 100 characters)';
                    $customMessages['forgname.max'] = 'Organization Name is too long (maximum 100 characters)';
                    $customMessages['profesion_details.required'] = 'Profession detials is required';
                    $customMessages['profesion_details.numeric'] = 'Profession detials is required';

                    $tableData['designation'] = $request->input('fdesignation');
                    $tableData['organization_name'] = $request->input('forgname');
                    $tableData['profession_details'] = $request->input('profesion_details');
                }

                if ($request->input('fprofession') == 3 ||
                    $request->input('fprofession') == 4 ||
                    $request->input('fprofession') == 7 ||
                    $request->input('fprofession') == 8) {

                    $validationRules['fdesignation'] = 'required|max:100';
                    $validationRules['forgname'] = 'required|max:100';

                    $customMessages['fdesignation.required'] = 'Designation is required';
                    $customMessages['forgname.required'] = 'Organization Name is required';
                    $customMessages['fdesignation.max'] = 'Designation is too long (maximum 100 characters)';
                    $customMessages['forgname.max'] = 'Organization Name is too long (maximum 100 characters)';

                    $tableData['designation'] = $request->input('fdesignation');
                    $tableData['organization_name'] = $request->input('forgname');
                    $tableData['profession_details'] = 0;
                }

                if ($request->input('fprofession') == 0 ||
                    $request->input('fprofession') == 11 ||
                    $request->input('fprofession') == 12 ||
                    $request->input('fprofession') == 14 ||
                    $request->input('fprofession') == 15) {
                    $tableData['designation'] = 0;
                    $tableData['organization_name'] = 0;
                    $tableData['profession_details'] = 0;
                }
            } else {
                $tableData['profession'] = 0;
                $tableData['designation'] = 0;
                $tableData['organization_name'] = 0;
                $tableData['profession_details'] = 0;

            }
        } else {
            $tableData['service_status'] = 0;
            $tableData['profession'] = 0;
            $tableData['designation'] = 0;
            $tableData['organization_name'] = 0;
            $tableData['profession_details'] = 0;

        }

        $validateFormData = request()->validate($validationRules, $customMessages);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('users_parents')
            ->where([
                ['userid', Auth::user()->id],
                ['id', $id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Information Not Updated!!');
        }

        return redirect()->route('users.editprofile.parents.view')->with('success', 'Information is Updated Successfully!');

    }

    public function delete(Request $request, $id)
    {

        $validateFormData = request()->validate(
            [
                'delid' => 'required|numeric',
            ]
        );

        if (!$validateFormData && $id == $request->input('delid')) {
            return redirect()->back()->withErrors($request->all());
        }

        $delete = DB::table('users_parents')
            ->where([
                ['userid', Auth::user()->id],
                ['id', $id],
            ])
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Parent Information not Deleted!!');
        }

        return redirect()->route('users.editprofile.parents.view')->with('msg', 'Parent Information Deleted Successfully!');

    }

}
