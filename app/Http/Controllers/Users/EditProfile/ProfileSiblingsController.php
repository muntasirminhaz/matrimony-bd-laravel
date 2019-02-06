<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileSiblingsController extends Controller
{

    public function view()
    {
        $data['hasSiblings'] = Auth::user()->has_siblings;

        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        $data['siblings'] = DB::table('users_siblings')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->get();

        return view('users.editprofile.siblings.index', $data);
    }

    public function create()
    {
        $data['hasSiblings'] = Auth::user()->has_siblings;
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        if (Auth::user()->has_siblings !== 1) {
            return redirect()->route('users.editprofile.siblings.view')->with('error', 'You cannot adddsiblings.');
        }
        return view('users.editprofile.siblings.create', $data);

    }

    public function store(Request $request)
    {

        $validationRules = [
            'siblingposition' => 'required|numeric',
            'sibling_name' => 'required|max:100',
            'gender' => 'required|numeric',
            'sibling_living' => 'required|numeric',
            'marital_status' => 'required|numeric',
        ];

        $customMessage = [
            'sibling_position.required' => 'Position field must be selected',
            'sibling_name.required|max' => 'Name is too long (maximum 100 character)',
            'gender.required' => 'Gender field must be selected',
            'sibling_living.required' => 'Living Status field must be selected',
            'marital_status.required' => 'Marital Status field must be selected',
        ];

        $tableData = [
            'sibling_position' => $request->input('siblingposition'),
            'sibling_name' => $request->input('sibling_name'),
            'gender' => $request->input('gender'),
            'living_status' => $request->input('sibling_living'),
            'marital_status' => $request->input('marital_status'),

        ];

        if ($request->input('sibling_living') == 1) {
            $validationRules['sibling_profession'] = 'required|numeric';
            $customMessage['sibling_profession.required'] = 'Sibling Profession field must be selected';
            $tableData['sibling_profession'] = $request->input('sibling_profession');

            if ($request->input('sibling_profession') == 1 || $request->input('sibling_profession') == 2 || $request->input('sibling_profession') == 5 || $request->input('sibling_profession') == 6 || $request->input('sibling_profession') == 9 || $request->input('sibling_profession') == 10) {
                $validationRules['sibling_designation'] = 'required|max:50';
                $validationRules['sibling_organization'] = 'required|max:50';
                $validationRules['profession_details'] = 'required|numeric';

                $customMessage['sibling_designation.required'] = 'Sibling Designation is required';
                $customMessage['sibling_designation.max'] = 'Sibling Designation is too long (maximum 50 character).';

                $customMessage['sibling_organization.required'] = 'Sibling Organization Name is required';
                $customMessage['sibling_organization.max'] = 'Sibling Organization Name is too long (maximum 100 character).';

                $customMessage['profession_details.required'] = 'Profession Details is required.';
                $customMessage['profession_details.numeric'] = 'Profession Details is required.';

                $tableData['sibling_designation'] = $request->input('sibling_designation');
                $tableData['sibling_organization'] = $request->input('sibling_organization');
                $tableData['sibling_profession_details'] = $request->input('profession_details');
            }

            if ($request->input('sibling_profession') == 3 ||
                $request->input('sibling_profession') == 4 ||
                $request->input('sibling_profession') == 7 ||
                $request->input('sibling_profession') == 8) {

                $validationRules['sibling_designation'] = 'required|max:50';
                $validationRules['sibling_organization'] = 'required|max:50';

                $customMessage['sibling_designation.required'] = 'Sibling Designation is required';
                $customMessage['sibling_designation.max'] = 'Sibling Designation is too long (maximum 50 character).';

                $customMessage['sibling_organization.required'] = 'Sibling Organization Name is required';
                $customMessage['sibling_organization.max'] = 'Sibling Organization Name is too long (maximum 100 character).';

                $tableData['sibling_designation'] = $request->input('sibling_designation');
                $tableData['sibling_organization'] = $request->input('sibling_organization');
                $tableData['sibling_profession_details'] = 0;
            }

            if ($request->input('sibling_profession') == 0 || $request->input('sibling_profession') == 11 || $request->input('sibling_profession') == 12 || $request->input('sibling_profession') == 14 || $request->input('sibling_profession') == 15) {
                $tableData['sibling_profession_details'] = 0;
                $tableData['sibling_designation'] = 0;
                $tableData['sibling_organization'] = 0;
            }

        } else {
            $tableData['sibling_profession'] = 0;
            $tableData['sibling_profession_details'] = 0;
            $tableData['sibling_designation'] = 0;
            $tableData['sibling_organization'] = 0;
        }

        if ($request->input('marital_status') == 1) {
            $validationRules['sibling_spouse_living'] = 'required|numeric';
            $validationRules['sibling_spouse_name'] = 'required|max:100';

            $customMessage['sibling_spouse_living.required'] = 'Sibling\'s Spouse Living Status field must be selected';
            $customMessage['sibling_spouse_living.numeric'] = 'Sibling\'s Spouse Living Status field must be selected';

            $customMessage['sibling_spouse_name.max'] = 'Sibling Spouse Name is too long (maximum 100 character).';
            $customMessage['sibling_spouse_name.required'] = 'Sibling Spouse Name is too long (maximum 100 character).';

            $tableData['sibling_spouse_name'] = $request->input('sibling_spouse_name');
            $tableData['sibling_spouse_living_status'] = $request->input('sibling_spouse_living');
            $tableData['marital_status'] = 1;

            if ($request->input('sibling_spouse_living') == 1) {

                $validationRules['sibling_spouse_profession'] = 'required|numeric';
                $customMessage['sibling_spouse_profession.required'] = 'Sibling Spouse Profession field must be selected';
                $customMessage['sibling_spouse_profession.numeric'] = 'Sibling Spouse Profession field must be selected';

                $tableData['sibling_spouse_profession'] = $request->input('sibling_spouse_profession');

                if ($request->input('sibling_spouse_profession') == 1 ||
                    $request->input('sibling_spouse_profession') == 2 ||
                    $request->input('sibling_spouse_profession') == 5 ||
                    $request->input('sibling_spouse_profession') == 6 ||
                    $request->input('sibling_spouse_profession') == 9 ||
                    $request->input('sibling_spouse_profession') == 10) {

                    $validationRules['sibling_spouse_designation'] = 'required|max:50';
                    $validationRules['sibling_spouse_organizaion'] = 'required|max:100';

                    $validationRules['spouse_profession_details'] = 'required|numeric';

                    $customMessage['spouse_profession_details.reqired'] = 'Spouse Profession details must be selected';
                    $customMessage['spouse_profession_details.numeric'] = 'Spouse Profession details must be selected';

                    $customMessage['sibling_spouse_designation.required'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_designation.max'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_organizaion.max'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';
                    $customMessage['sibling_spouse_organizaion.required'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['sibling_spouse_designation'] = $request->input('sibling_spouse_designation');
                    $tableData['sibling_spouse_profession_details'] = $request->input('spouse_profession_details');
                    $tableData['sibling_spouse_organization'] = $request->input('sibling_spouse_organizaion');
                }

                if ($request->input('sibling_spouse_profession') == 3 ||
                    $request->input('sibling_spouse_profession') == 4 ||
                    $request->input('sibling_spouse_profession') == 7 ||
                    $request->input('sibling_spouse_profession') == 8 ||
                    $request->input('sibling_spouse_profession') == 13) {

                    $validationRules['sibling_spouse_designation'] = 'required|max:50';
                    $validationRules['sibling_spouse_organizaion'] = 'required|max:100';

                    $customMessage['sibling_spouse_designation.required'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_designation.max'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_organizaion.max'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';
                    $customMessage['sibling_spouse_organizaion.required'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['sibling_spouse_designation'] = $request->input('sibling_spouse_designation');
                    $tableData['sibling_spouse_organization'] = $request->input('sibling_spouse_organizaion');
                    $tableData['sibling_spouse_profession_details'] = 0;

                }

                if ($request->input('sibling_spouse_profession') == 0 ||
                    $request->input('sibling_spouse_profession') == 11 ||
                    $request->input('sibling_spouse_profession') == 12 ||
                    $request->input('sibling_spouse_profession') == 14 ||
                    $request->input('sibling_spouse_profession') == 15) {

                    $tableData['sibling_spouse_designation'] = 0;
                    $tableData['sibling_spouse_profession_details'] = 0;
                    $tableData['sibling_spouse_organization'] = 0;
                }
            } else {

                $tableData['sibling_spouse_living_status'] = 0;
                $tableData['sibling_spouse_designation'] = 0;
                $tableData['sibling_spouse_profession_details'] = 0;
                $tableData['sibling_spouse_organization'] = 0;
            }
        } else {
            $tableData['marital_status'] = 0;
            $tableData['sibling_spouse_name'] = $request->input('sibling_spouse_name');
            $tableData['sibling_spouse_living_status'] = 0;
            $tableData['sibling_spouse_designation'] = 0;
            $tableData['sibling_spouse_profession_details'] = 0;
            $tableData['sibling_spouse_organization'] = 0;
        }

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData['userid'] = Auth::user()->id;
        $insert = DB::table('users_siblings')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Siblings (Brother/Sister) information not Saved!! Please add valid information');
        }

        return redirect()->route('users.editprofile.siblings.view')->with('msg', 'Siblings (Brother/Sister) Information for' . $request->input('sibling_name') . ' is Saved !!');

    }

    public function edit($id)
    {
        $data['hasSiblings'] = Auth::user()->has_siblings;

        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        $data['sibling'] = DB::table('users_siblings')
            ->select('*')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->first();
        return view('users.editprofile.siblings.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->has_siblings !== 1) {
            return redirect()->route('users.editprofile.siblings.view')->with('error', 'You cannot add siblings.');
        }

        $validationRules = [
            'siblingposition' => 'required|numeric',
            'sibling_name' => 'required|max:100',
            'gender' => 'required|numeric',
            'sibling_living' => 'required|numeric',
            'marital_status' => 'required|numeric',
        ];

        $customMessage = [
            'sibling_position.required' => 'Position field must be selected',
            'sibling_name.required|max' => 'Sibling name is too long (maximum 100 character)',
            'gender.required' => 'Gender field must be selected',
            'sibling_living.required' => 'Living Status field must be selected',
            'marital_status.required' => 'Marital Status field must be selected',
        ];

        $tableData = [
            'sibling_position' => $request->input('siblingposition'),
            'sibling_name' => $request->input('sibling_name'),
            'gender' => $request->input('gender'),
            'living_status' => $request->input('sibling_living'),
            'marital_status' => $request->input('marital_status'),

        ];

        if ($request->input('sibling_living') == 1) {
            $validationRules['sibling_profession'] = 'required|numeric';
            $customMessage['sibling_profession.required'] = 'Sibling Profession field must be selected';
            $tableData['sibling_profession'] = $request->input('sibling_profession');

            if ($request->input('sibling_profession') == 1 || $request->input('sibling_profession') == 2 || $request->input('sibling_profession') == 5 || $request->input('sibling_profession') == 6 || $request->input('sibling_profession') == 9 || $request->input('sibling_profession') == 10) {
                $validationRules['sibling_designation'] = 'required|max:50';
                $validationRules['sibling_organization'] = 'required|max:50';
                $validationRules['profession_details'] = 'required|numeric';

                $customMessage['sibling_designation.required'] = 'Sibling Designation is required';
                $customMessage['sibling_designation.max'] = 'Sibling Designation is too long (maximum 50 character).';

                $customMessage['sibling_organization.required'] = 'Sibling Organization Name is required';
                $customMessage['sibling_organization.max'] = 'Sibling Organization Name is too long (maximum 100 character).';

                $customMessage['profession_details.required'] = 'Profession Details is required.';
                $customMessage['profession_details.numeric'] = 'Profession Details is required.';

                $tableData['sibling_designation'] = $request->input('sibling_designation');
                $tableData['sibling_organization'] = $request->input('sibling_organization');
                $tableData['sibling_profession_details'] = $request->input('profession_details');
            }

            if ($request->input('sibling_profession') == 3 ||
                $request->input('sibling_profession') == 4 ||
                $request->input('sibling_profession') == 7 ||
                $request->input('sibling_profession') == 8 ||
                $request->input('sibling_profession') == 13) {

                $validationRules['sibling_designation'] = 'required|max:50';
                $validationRules['sibling_organization'] = 'required|max:50';

                $customMessage['sibling_designation.required'] = 'Sibling Designation is required';
                $customMessage['sibling_designation.max'] = 'Sibling Designation is too long (maximum 50 character).';

                $customMessage['sibling_organization.required'] = 'Sibling Organization Name is required';
                $customMessage['sibling_organization.max'] = 'Sibling Organization Name is too long (maximum 100 character).';

                $tableData['sibling_designation'] = $request->input('sibling_designation');
                $tableData['sibling_organization'] = $request->input('sibling_organization');
                $tableData['sibling_profession_details'] = 0;
            }

            if ($request->input('sibling_profession') == 0 || $request->input('sibling_profession') == 11 || $request->input('sibling_profession') == 12 || $request->input('sibling_profession') == 14 || $request->input('sibling_profession') == 15) {
                $tableData['sibling_profession_details'] = 0;
                $tableData['sibling_designation'] = 0;
                $tableData['sibling_organization'] = 0;
            }

        } else {
            $tableData['sibling_profession'] = 0;
            $tableData['sibling_profession_details'] = 0;
            $tableData['sibling_designation'] = 0;
            $tableData['sibling_organization'] = 0;
        }

        if ($request->input('marital_status') == 1) {
            $validationRules['sibling_spouse_living'] = 'required|numeric';
            $validationRules['sibling_spouse_name'] = 'required|max:100';

            $customMessage['sibling_spouse_living.required'] = 'Relative\'s Spouse Living Status field must be selected';
            $customMessage['sibling_spouse_living.numeric'] = 'Relative\'s Spouse Living Status field must be selected';

            $customMessage['sibling_spouse_name.max'] = 'Sibling Spouse Name is too long (maximum 100 character).';
            $customMessage['sibling_spouse_name.required'] = 'Sibling Spouse Name is too long (maximum 100 character).';

            $tableData['sibling_spouse_name'] = $request->input('sibling_spouse_name');
            $tableData['sibling_spouse_living_status'] = $request->input('sibling_spouse_living');
            $tableData['marital_status'] = 1;
            if ($request->input('sibling_spouse_living') == 1) {

                $validationRules['sibling_spouse_profession'] = 'required|numeric';
                $customMessage['sibling_spouse_profession.required'] = 'Sibling Spouse Profession field must be selected';
                $customMessage['sibling_spouse_profession.numeric'] = 'Sibling Spouse Profession field must be selected';

                $tableData['sibling_spouse_profession'] = $request->input('sibling_spouse_profession');

                if ($request->input('sibling_spouse_profession') == 1 ||
                    $request->input('sibling_spouse_profession') == 2 ||
                    $request->input('sibling_spouse_profession') == 5 ||
                    $request->input('sibling_spouse_profession') == 6 ||
                    $request->input('sibling_spouse_profession') == 9 ||
                    $request->input('sibling_spouse_profession') == 10) {

                    $validationRules['sibling_spouse_designation'] = 'required|max:50';
                    $validationRules['sibling_spouse_organizaion'] = 'required|max:100';

                    $validationRules['spouse_profession_details'] = 'required|numeric';

                    $customMessage['spouse_profession_details.reqired'] = 'Spouse Profession details must be selected';
                    $customMessage['spouse_profession_details.numeric'] = 'Spouse Profession details must be selected';

                    $customMessage['sibling_spouse_designation.required'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_designation.max'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_organizaion.max'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';
                    $customMessage['sibling_spouse_organizaion.required'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['sibling_spouse_designation'] = $request->input('sibling_spouse_designation');
                    $tableData['sibling_spouse_profession_details'] = $request->input('spouse_profession_details');
                    $tableData['sibling_spouse_organization'] = $request->input('sibling_spouse_organizaion');
                }

                if ($request->input('sibling_spouse_profession') == 3 ||
                    $request->input('sibling_spouse_profession') == 4 ||
                    $request->input('sibling_spouse_profession') == 7 ||
                    $request->input('sibling_spouse_profession') == 8 ||
                    $request->input('sibling_spouse_profession') == 13) {

                    $validationRules['sibling_spouse_designation'] = 'required|max:50';
                    $validationRules['sibling_spouse_organizaion'] = 'required|max:100';

                    $customMessage['sibling_spouse_designation.required'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_designation.max'] = 'Sibling Spouse Designation is too long (maximum 50 character).';
                    $customMessage['sibling_spouse_organizaion.max'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';
                    $customMessage['sibling_spouse_organizaion.required'] = 'Sibling Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['sibling_spouse_designation'] = $request->input('sibling_spouse_designation');
                    $tableData['sibling_spouse_organization'] = $request->input('sibling_spouse_organizaion');
                    $tableData['sibling_spouse_profession_details'] = 0;

                }

                if ($request->input('sibling_spouse_profession') == 0 ||
                    $request->input('sibling_spouse_profession') == 11 ||
                    $request->input('sibling_spouse_profession') == 12 ||
                    $request->input('sibling_spouse_profession') == 14 ||
                    $request->input('sibling_spouse_profession') == 15) {

                    $tableData['sibling_spouse_designation'] = 0;
                    $tableData['sibling_spouse_profession_details'] = 0;
                    $tableData['sibling_spouse_organization'] = 0;
                }
            } else {
                $tableData['sibling_spouse_living_status'] = 0;
                $tableData['sibling_spouse_designation'] = 0;
                $tableData['sibling_spouse_profession_details'] = 0;
                $tableData['sibling_spouse_organization'] = 0;
            }
        } else {
            $tableData['marital_status'] = 0;
            $tableData['sibling_spouse_name'] = 0;
            $tableData['sibling_spouse_living_status'] = 0;
            $tableData['sibling_spouse_designation'] = 0;
            $tableData['sibling_spouse_profession_details'] = 0;
            $tableData['sibling_spouse_organization'] = 0;
        }

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('users_siblings')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('msg', 'Invalid information, Siblings Information Information Not Updated!!');
        }

        return redirect()->route('users.editprofile.siblings.view')->with('msg', 'Siblings Information is Updated Successfully!');

    }

    public function delete(Request $request, $id)
    {
        $validateFormData = request()->validate(
            [
                'delid' => 'required|numeric',
            ]
        );

        if (!$validateFormData && $request->input('delid') != $id) {
            return redirect()->back()->withErrors($request->all());
        }

        $delete = DB::table('users_siblings')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Sibling information not deleted!!');
        }

        return redirect()->route('users.editprofile.siblings.view')->with('success', 'Sibling information deleted!!');
    }
}
