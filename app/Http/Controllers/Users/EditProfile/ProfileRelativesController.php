<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileRelativesController extends Controller
{
    public function view()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        $data['relatives'] = DB::table('users_relaives')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->get();

        return view('users.editprofile.relatives.index', $data);
    }

    public function create()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        return view('users.editprofile.relatives.create', $data);
    }

    public function insert(Request $request)
    {

        $validationRules = [
            'relativetype' => 'required|numeric',
            'relative_name' => 'required|max:100',
            'gender' => 'required|numeric',
            'relative_living' => 'required|numeric',
            'marital_status' => 'required|numeric',
        ];

        $customMessages = [
            'relativetype.required' => 'Relative must be selected',
            'relativetype.numeric' => 'Relative must be selected',
            'relative_name.required' => 'Relatives name is required',
            'relative_name.max' => 'Relatives name is too long (maximum 100 character)',
            'gender.required' => 'Gender must be selected',
            'gender.numeric' => 'Gender must be selected',
            'relative_living.required' => 'Living Status must be selected',
            'relative_living.numeric' => 'Living Status must be selected',
            'marital_status.required' => 'Marital Status must be selected',
            'marital_status.numeric' => 'Marital Status must be selected',
        ];

        $tableData = [
            'relative_side' => $request->input('relativetype'),
            'relative_name' => $request->input('relative_name'),
            'gender' => $request->input('gender'),
            'living_status' => $request->input('relative_living'),
            'marital_status' => $request->input('marital_status'),

        ];

        if ($request->input('relative_living') == 1) {
            $validationRules['relative_profession'] = 'required|numeric';
            $customMessages['relative_profession.required'] = 'Relatives Profession must be selected';
            $tableData['relative_profession'] = $request->input('relative_profession');

            if ($request->input('relative_profession') == 1 || $request->input('relative_profession') == 2 || $request->input('relative_profession') == 5 || $request->input('relative_profession') == 6 || $request->input('relative_profession') == 9 || $request->input('relative_profession') == 10) {
                $validationRules['relative_designation'] = 'required|max:50';
                $validationRules['relative_organization'] = 'required|max:50';
                $validationRules['profession_details'] = 'required|numeric';

                $customMessages['relative_designation.required'] = 'Relatives Designation is required';
                $customMessages['relative_designation.max'] = 'Relatives Designation is too long (maximum 50 character).';

                $customMessages['relative_organization.required'] = 'Relatives Organization Name is required';
                $customMessages['relative_organization.max'] = 'Relatives Organization Name is too long (maximum 100 character).';

                $customMessages['profession_details.required'] = 'Profession Details is required.';
                $customMessages['profession_details.numeric'] = 'Profession Details is required.';

                $tableData['relative_designation'] = $request->input('relative_designation');
                $tableData['relative_organization'] = $request->input('relative_organization');
                $tableData['relative_profession_details'] = $request->input('profession_details');
            }

            if ($request->input('relative_profession') == 3 ||
                $request->input('relative_profession') == 4 ||
                $request->input('relative_profession') == 7 ||
                $request->input('relative_profession') == 8) {

                $validationRules['relative_designation'] = 'required|max:50';
                $validationRules['relative_organization'] = 'required|max:50';

                $customMessages['relative_designation.required'] = 'Relatives Designation is required';
                $customMessages['relative_designation.max'] = 'Relatives Designation is too long (maximum 50 character).';

                $customMessages['relative_organization.required'] = 'Relatives Organization Name is required';
                $customMessages['relative_organization.max'] = 'Relatives Organization Name is too long (maximum 100 character).';

                $tableData['relative_designation'] = $request->input('relative_designation');
                $tableData['relative_organization'] = $request->input('relative_organization');
                $tableData['relative_profession_details'] = 0;
            }

            if ($request->input('relative_profession') == 0 || $request->input('relative_profession') == 11 || $request->input('relative_profession') == 12 || $request->input('relative_profession') == 14 || $request->input('relative_profession') == 15) {
                $tableData['relative_profession_details'] = 0;
                $tableData['relative_designation'] = 0;
                $tableData['relative_organization'] = 0;
            }

        } else {
            $tableData['relative_profession'] = 0;
            $tableData['relative_profession_details'] = 0;
            $tableData['relative_designation'] = 0;
            $tableData['relative_organization'] = 0;
        }

        if ($request->input('marital_status') == 1) {
            $validationRules['relative_spouse_living'] = 'required|numeric';
            $validationRules['relative_spouse_name'] = 'required|max:100';

            $customMessages['relative_spouse_living.required'] = 'Relative\'s Spouse Living Status must be selected';
            $customMessages['relative_spouse_living.numeric'] = 'Relative\'s Spouse Living Status must be selected';

            $customMessages['relative_spouse_name.max'] = 'Relatives Spouse Name is too long (maximum 100 character).';
            $customMessages['relative_spouse_name.required'] = 'Relatives Spouse Name is too long (maximum 100 character).';

            $tableData['relative_spouse_name'] = $request->input('relative_spouse_name');
            $tableData['relative_spouse_living_status'] = $request->input('relative_spouse_living');
            $tableData['marital_status'] = 1;

            
            if ($request->input('relative_spouse_living') == 1) {

                $validationRules['relative_spouse_profession'] = 'required|numeric';
                $customMessages['relative_spouse_profession.required'] = 'Relatives Spouse Profession must be selected';
                $customMessages['relative_spouse_profession.numeric'] = 'Relatives Spouse Profession must be selected';

                $tableData['relative_spouse_profession'] = $request->input('relative_spouse_profession');

                if ($request->input('relative_spouse_profession') == 1 ||
                    $request->input('relative_spouse_profession') == 2 ||
                    $request->input('relative_spouse_profession') == 5 ||
                    $request->input('relative_spouse_profession') == 6 ||
                    $request->input('relative_spouse_profession') == 9 ||
                    $request->input('relative_spouse_profession') == 10) {

                    $validationRules['relative_spouse_designation'] = 'required|max:50';
                    $validationRules['relative_spouse_organizaion'] = 'required|max:100';

                    $validationRules['spouse_profession_details'] = 'required|numeric';

                    $customMessages['spouse_profession_details.reqired'] = 'Spouse Profession details must be selected';
                    $customMessages['spouse_profession_details.numeric'] = 'Spouse Profession details must be selected';

                    $customMessages['relative_spouse_designation.required'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_designation.max'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_organizaion.max'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';
                    $customMessages['relative_spouse_organizaion.required'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['relative_spouse_designation'] = $request->input('relative_spouse_designation');
                    $tableData['relative_spouse_profession_details'] = $request->input('spouse_profession_details');
                    $tableData['relative_spouse_organization'] = $request->input('relative_spouse_organizaion');
                }

                if ($request->input('relative_spouse_profession') == 3 ||
                    $request->input('relative_spouse_profession') == 4 ||
                    $request->input('relative_spouse_profession') == 7 ||
                    $request->input('relative_spouse_profession') == 8) {

                    $validationRules['relative_spouse_designation'] = 'required|max:50';
                    $validationRules['relative_spouse_organizaion'] = 'required|max:100';

                    $customMessages['relative_spouse_designation.required'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_designation.max'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_organizaion.max'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';
                    $customMessages['relative_spouse_organizaion.required'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['relative_spouse_designation'] = $request->input('relative_spouse_designation');
                    $tableData['relative_spouse_organization'] = $request->input('relative_spouse_organizaion');
                    $tableData['spouse_profession_details'] = 0;

                }

                if ($request->input('relative_spouse_profession') == 0 ||
                    $request->input('relative_spouse_profession') == 11 ||
                    $request->input('relative_spouse_profession') == 12 ||
                    $request->input('relative_spouse_profession') == 14 ||
                    $request->input('relative_spouse_profession') == 15) {

                    $tableData['relative_spouse_designation'] = 0;
                    $tableData['spouse_profession_details'] = 0;
                    $tableData['relative_spouse_organization'] = 0;
                }
            } else {
                $tableData['relative_spouse_name'] = 0;
                $tableData['relative_spouse_living_status'] = 0;
                $tableData['relative_spouse_designation'] = 0;
                $tableData['spouse_profession_details'] = 0;
                $tableData['relative_spouse_organization'] = 0;
            }
        } else {
            $tableData['marital_status'] = 0;
            $tableData['relative_spouse_name'] = 0;
            $tableData['relative_spouse_living_status'] = 0;
            $tableData['relative_spouse_designation'] = 0;
            $tableData['relative_spouse_profession_details'] = 0;
            $tableData['relative_spouse_organization'] = 0;
        }

        $validateFormData = request()->validate($validationRules, $customMessages);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData['userid'] = Auth::user()->id;
        $insert = DB::table('users_relaives')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Relaive information not updated!! Please add valid information');
        }

        return redirect()->route('users.editprofile.relatives.view')->with('msg', 'Relatives Information for <em>' . $request->input('relative_name') . '</em> is Updated !!');

    }

    public function edit($id)
    {
        $data['relative'] = DB::table('users_relaives')
            ->select('*')
            ->where([
                ['userid', Auth::user()->id],
                ['id', $id],
            ])
            ->first();

        if (!$data['relative']) {
            redirect()->route('users.editprofile.relatives.view');
        }

        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        return view('users.editprofile.relatives.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validationRules = [
            'relativetype' => 'required|numeric',
            'relative_name' => 'required|max:100',
            'gender' => 'required|numeric',
            'relative_living' => 'required|numeric',
            'marital_status' => 'required|numeric',
        ];

        $customMessages = [
            'relativetype.required' => 'Relative must be selected',
            'relative_name.required|max' => 'Relatives name is too long (maximum 100 character)',
            'gender.required' => 'Gender must be selected',
            'relative_living.required' => 'Living Status must be selected',
            'marital_status.required' => 'Marital Status must be selected',
        ];

        $tableData = [
            'relative_side' => $request->input('relativetype'),
            'relative_name' => $request->input('relative_name'),
            'gender' => $request->input('gender'),
            'living_status' => $request->input('relative_living'),
            'marital_status' => $request->input('marital_status'),

        ];

        if ($request->input('relative_living') == 1) {
            $validationRules['relative_profession'] = 'required|numeric';
            $customMessages['relative_profession.required'] = 'Relatives Profession must be selected';
            $tableData['relative_profession'] = $request->input('relative_profession');

            if ($request->input('relative_profession') == 1 || $request->input('relative_profession') == 2 || $request->input('relative_profession') == 5 || $request->input('relative_profession') == 6 || $request->input('relative_profession') == 9 || $request->input('relative_profession') == 10) {
                $validationRules['relative_designation'] = 'required|max:50';
                $validationRules['relative_organization'] = 'required|max:50';
                $validationRules['profession_details'] = 'required|numeric';

                $customMessages['relative_designation.required'] = 'Relatives Designation is required';
                $customMessages['relative_designation.max'] = 'Relatives Designation is too long (maximum 50 character).';

                $customMessages['relative_organization.required'] = 'Relatives Organization Name is required';
                $customMessages['relative_organization.max'] = 'Relatives Organization Name is too long (maximum 100 character).';

                $customMessages['profession_details.required'] = 'Profession Details is required.';
                $customMessages['profession_details.numeric'] = 'Profession Details is required.';

                $tableData['relative_designation'] = $request->input('relative_designation');
                $tableData['relative_organization'] = $request->input('relative_organization');
                $tableData['relative_profession_details'] = $request->input('profession_details');
            }

            if ($request->input('relative_profession') == 3 ||
                $request->input('relative_profession') == 4 ||
                $request->input('relative_profession') == 7 ||
                $request->input('relative_profession') == 8) {

                $validationRules['relative_designation'] = 'required|max:50';
                $validationRules['relative_organization'] = 'required|max:50';

                $customMessages['relative_designation.required'] = 'Relatives Designation is required';
                $customMessages['relative_designation.max'] = 'Relatives Designation is too long (maximum 50 character).';

                $customMessages['relative_organization.required'] = 'Relatives Organization Name is required';
                $customMessages['relative_organization.max'] = 'Relatives Organization Name is too long (maximum 100 character).';

                $tableData['relative_designation'] = $request->input('relative_designation');
                $tableData['relative_organization'] = $request->input('relative_organization');
                $tableData['relative_profession_details'] = 0;
            }

            if ($request->input('relative_profession') == 0 || $request->input('relative_profession') == 11 || $request->input('relative_profession') == 12 || $request->input('relative_profession') == 14 || $request->input('relative_profession') == 15) {
                $tableData['relative_profession_details'] = 0;
                $tableData['relative_designation'] = 0;
                $tableData['relative_organization'] = 0;
            }

        } else {
            $tableData['relative_profession'] = 0;
            $tableData['relative_profession_details'] = 0;
            $tableData['relative_designation'] = 0;
            $tableData['relative_organization'] = 0;
        }

        if ($request->input('marital_status') == 1) {
            $validationRules['relative_spouse_living'] = 'required|numeric';
            $validationRules['relative_spouse_name'] = 'required|max:100';

            $customMessages['relative_spouse_living.required'] = 'Relative\'s Spouse Living Status must be selected';
            $customMessages['relative_spouse_living.numeric'] = 'Relative\'s Spouse Living Status must be selected';

            $customMessages['relative_spouse_name.max'] = 'Relatives Spouse Name is too long (maximum 100 character).';
            $customMessages['relative_spouse_name.required'] = 'Relatives Spouse Name is too long (maximum 100 character).';

            $tableData['relative_spouse_name'] = $request->input('relative_spouse_name');
            $tableData['relative_spouse_living_status'] = $request->input('relative_spouse_living');
            $tableData['marital_status'] = 1;
            if ($request->input('relative_spouse_living') == 1) {

                $validationRules['relative_spouse_profession'] = 'required|numeric';
                $customMessages['relative_spouse_profession.required'] = 'Relatives Spouse Profession must be selected';
                $customMessages['relative_spouse_profession.numeric'] = 'Relatives Spouse Profession must be selected';

                $tableData['relative_spouse_profession'] = $request->input('relative_spouse_profession');

                if ($request->input('relative_spouse_profession') == 1 ||
                    $request->input('relative_spouse_profession') == 2 ||
                    $request->input('relative_spouse_profession') == 5 ||
                    $request->input('relative_spouse_profession') == 6 ||
                    $request->input('relative_spouse_profession') == 9 ||
                    $request->input('relative_spouse_profession') == 10) {

                    $validationRules['relative_spouse_designation'] = 'required|max:50';
                    $validationRules['relative_spouse_organizaion'] = 'required|max:100';

                    $validationRules['spouse_profession_details'] = 'required|numeric';

                    $customMessages['spouse_profession_details.reqired'] = 'Spouse Profession details must be selected';
                    $customMessages['spouse_profession_details.numeric'] = 'Spouse Profession details must be selected';

                    $customMessages['relative_spouse_designation.required'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_designation.max'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_organizaion.max'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';
                    $customMessages['relative_spouse_organizaion.required'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['relative_spouse_designation'] = $request->input('relative_spouse_designation');
                    $tableData['relative_spouse_profession_details'] = $request->input('spouse_profession_details');
                    $tableData['relative_spouse_organization'] = $request->input('relative_spouse_organizaion');
                }

                if ($request->input('relative_spouse_profession') == 3 ||
                    $request->input('relative_spouse_profession') == 4 ||
                    $request->input('relative_spouse_profession') == 7 ||
                    $request->input('relative_spouse_profession') == 8) {

                    $validationRules['relative_spouse_designation'] = 'required|max:50';
                    $validationRules['relative_spouse_organizaion'] = 'required|max:100';

                    $customMessages['relative_spouse_designation.required'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_designation.max'] = 'Relatives Spouse Designation is too long (maximum 50 character).';
                    $customMessages['relative_spouse_organizaion.max'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';
                    $customMessages['relative_spouse_organizaion.required'] = 'Relatives Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['relative_spouse_designation'] = $request->input('relative_spouse_designation');
                    $tableData['relative_spouse_organization'] = $request->input('relative_spouse_organizaion');
                    $tableData['spouse_profession_details'] = 0;

                }

                if ($request->input('relative_spouse_profession') == 0 ||
                    $request->input('relative_spouse_profession') == 11 ||
                    $request->input('relative_spouse_profession') == 12 ||
                    $request->input('relative_spouse_profession') == 14 ||
                    $request->input('relative_spouse_profession') == 15) {

                    $tableData['relative_spouse_designation'] = 0;
                    $tableData['spouse_profession_details'] = 0;
                    $tableData['relative_spouse_organization'] = 0;
                }
            } else {
                $tableData['relative_spouse_name'] = 0;
                $tableData['relative_spouse_living_status'] = 0;
                $tableData['relative_spouse_designation'] = 0;
                $tableData['spouse_profession_details'] = 0;
                $tableData['relative_spouse_organization'] = 0;
            }
        } else {
            $tableData['marital_status'] = 0;
            $tableData['relative_spouse_name'] = 0;
            $tableData['relative_spouse_living_status'] = 0;
            $tableData['relative_spouse_designation'] = 0;
            $tableData['relative_spouse_profession_details'] = 0;
            $tableData['relative_spouse_organization'] = 0;
        }

        $validateFormData = request()->validate($validationRules, $customMessages);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('users_relaives')
            ->where('id', $id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Relaive information not updated!! Please add valid information');
        }

        return redirect()->route('users.editprofile.relatives.view')->with('success', 'Relatives Information for <em>' . $request->input('relative_name') . '</em> is Updated !!');

    }

    public function delete(Request $request, $id)
    {
        $validateFormData = request()->validate(
            [
                'relativeid' => 'required|numeric',
            ]
        );

        if (!$validateFormData && $request->input('relativeid') != $id) {
            return redirect()->back()->withErrors($request->all());
        }

        $delete = DB::table('users_relaives')
            ->where('id', $id)
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Relative information not deleted!!');
        }

        return redirect()->route('users.editprofile.relatives.view')->with('success', 'Relative information deleted!!');
    }
}
