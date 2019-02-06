<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileProfessionController extends Controller
{
    public function view()
    {
        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();

        $userId = DB::table('users_profession')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->first();

        if (!$userId) {
            return view('users.editprofile.profession.create', $data);
        }
        $data['userinfo'] = $userId;
        return view('users.editprofile.profession.index', $data);

    }

    public function insert(Request $request)
    {

        $userId = (DB::table('users_profession')
                ->select('userid')
                ->where('userid', Auth::user()->id)
                ->first());

        if ($userId) {
            return redirect()->route('users.editprofile.profession.view')->with('msg', 'You have been added profession information before !!');
        }

        $validationRules = [
            'profession' => 'required|numeric',
        ];
        $customMessage = [
            'profession.required' => 'Profession is required',
            'profession.numeric' => 'Profession is required',
        ];

        $tableData = [
            'userid' => Auth::user()->id,
            'profession_type' => $request->input('profession'),
        ];

        if ($request->input('profession') != 0) {

            if ($request->input('profession') == 13
                || $request->input('profession') == 3
                || $request->input('profession') == 4
                || $request->input('profession') == 7
                || $request->input('profession') == 8) {

                $validationRules['designation'] = 'required';
                $validationRules['orgName'] = 'required';

                $customMessage['designation.requires'] = 'Designation is required.';
                $customMessage['orgName.requires'] = 'Organization name is required.';

                $tableData['profession_type_details'] = 0;
                $tableData['designation'] = $request->input('designation');
                $tableData['org_name'] = $request->input('orgName');
            }

            if ($request->input('profession') == 11
                || $request->input('profession') == 12
                || $request->input('profession') == 14
                || $request->input('profession') == 15) {

                $tableData['profession_type_details'] = 0;
                $tableData['designation'] = 0;
                $tableData['org_name'] = 0;
            }

            if (
                $request->input('profession') == 1
                || $request->input('profession') == 2
                || $request->input('profession') == 5
                || $request->input('profession') == 6
                || $request->input('profession') == 9
                || $request->input('profession') == 10
            ) {
                if ($request->input('profession_details') > 0) {
                    $validationRules['designation'] = 'required|string';
                    $validationRules['orgName'] = 'required|string';

                    $customMessage['designation.required'] = 'Designation is required.';
                    $customMessage['designation.string'] = 'Designation is required.';
                    $customMessage['orgName.required'] = 'Organization name is required.';
                    $customMessage['orgName.string'] = 'Organization name is required.';

                    $tableData['profession_type_details'] = $request->input('profession_details');
                    $tableData['designation'] = $request->input('designation');
                    $tableData['org_name'] = $request->input('orgName');
                } else {
                    return redirect()->route('users.editprofile.profession.view')->with('msg', 'Please provide profession information properly !!');
                }
            }
        } else {
            return redirect()->route('users.editprofile.profession.view')->with('msg', 'Please provide profession information properly !!');
        }

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('users_profession')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('msg', 'Invalid information, Profession  Information Not Inserted!!');
        }

        return redirect()->route('users.editprofile.profession.view')->with('msg', 'Profession Information is Inserted Successfully!');

    }

    public function edit()
    {
        $data['userProfession'] = DB::table('users_profession')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->first();

        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();

        return view('users.editprofile.profession.edit', $data);

    }

    public function update(Request $request)
    {
        $validationRules = [
            'profession' => 'required',
        ];
        $customMessage = [
            'profession.required' => 'Profession  is required',
        ];

        $tableData = [
            'profession_type' => $request->input('profession'),
        ];

        if ($request->input('profession') != 0) {

            if ($request->input('profession') == 13
                || $request->input('profession') == 3
                || $request->input('profession') == 4
                || $request->input('profession') == 7
                || $request->input('profession') == 8) {

                $validationRules['designation'] = 'required';
                $validationRules['orgName'] = 'required';

                $customMessage['designation.requires'] = 'Designation is required.';
                $customMessage['orgName.requires'] = 'Organization name is required.';

                $tableData['profession_type_details'] = 0;
                $tableData['designation'] = $request->input('designation');
                $tableData['org_name'] = $request->input('orgName');
            }

            if ($request->input('profession') == 11
                || $request->input('profession') == 12
                || $request->input('profession') == 14
                || $request->input('profession') == 15) {

                $tableData['profession_type_details'] = 0;
                $tableData['designation'] = 0;
                $tableData['org_name'] = 0;
            }

            if (
                $request->input('profession') == 1
                || $request->input('profession') == 2
                || $request->input('profession') == 5
                || $request->input('profession') == 6
                || $request->input('profession') == 9
                || $request->input('profession') == 10
            ) {
                if ($request->input('profession_details') > 0) {
                    $validationRules['designation'] = 'required|string';
                    $validationRules['orgName'] = 'required|string';

                    $customMessage['designation.required'] = 'Designation is required.';
                    $customMessage['designation.string'] = 'Designation is required.';
                    $customMessage['orgName.required'] = 'Organization name is required.';
                    $customMessage['orgName.string'] = 'Organization name is required.';

                    $tableData['profession_type_details'] = $request->input('profession_details');
                    $tableData['designation'] = $request->input('designation');
                    $tableData['org_name'] = $request->input('orgName');
                } else {
                    return redirect()->route('users.editprofile.profession.view')->with('msg', 'Please provide profession information properly !!');
                }
            }
        } else {
            return redirect()->route('users.editprofile.profession.view')->with('msg', 'Please provide profession information properly !!');
        }

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('users_profession')
            ->where([
                ['userid', Auth::user()->id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Invalid information, Profession Updated Not Inserted!!');
        }

        return redirect()->route('users.editprofile.profession.view')->with('success', 'Profession Updated is Inserted Successfully!');

    }

    public function delete(Request $request, $id)
    {
        $validateFormData = request()->validate(
            [
                'professionid' => 'required|numeric',
            ]
        );

        if (!$validateFormData && $id == $request->input('professionid')) {
            return redirect()->back()->withErrors($request->all());
        }

        $delete = DB::table('users_profession')
            ->where([
                ['userid', Auth::user()->id],
                ['id', $id],
            ])
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Profession Information not Deleted!!');
        }

        return redirect()->route('users.editprofile.profession.view')->with('msg', 'Profession Information Deleted Successfully!');

    }

}
