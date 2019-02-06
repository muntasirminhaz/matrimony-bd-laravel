<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileEducationController extends Controller
{
    public function view()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        $data['userinfo'] = DB::table('users_education')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->orderby('ID', 'ASC')
            ->get();

        return view('users.editprofile.education.index', $data);
    }

    public function create()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        return view('users.editprofile.education.create', $data);
    }

    public function store(Request $request)
    {
        $validationRules =
            [
            'elevel' => 'required',
            'earea' => 'required',
            'dname' => 'required',
            'iname' => 'required',
            'statusstudent' => 'required|numeric',

        ];

        $customMessage = [
            'elevel.required' => 'Educational Level  is required.',
            'earea.required' => 'Education Area  is required.',
            'dname.required' => 'Degree Name  is required.',
            'iname.required' => 'Institution Name is required.',
            'statusstudent.required' => 'Completion Status is required.',
            'statusstudent.required' => 'Completion Status is required.',
        ];

        $tableData = [
            'userid' => Auth::user()->id,
            'education_level' => $request->input('elevel'),
            'education_area' => $request->input('earea'),
            'degree_name' => $request->input('dname'),
            'institution_name' => $request->input('iname'),
        ];

        if ($request->input('statusstudent') == 1) {
            $validationRules['semester'] = 'required';
            $customMessage['semester.required'] = 'Result is required';
            $tableData['semester'] = $request->input('ycom');
        }
        if ($request->input('statusstudent') == 2) {
            $validationRules['result'] = 'required';
            $validationRules['ycom'] = 'required|numeric';
            $customMessage['result.required'] = 'Result is required';
            $customMessage['result.numeric'] = 'Result is required';
            $customMessage['ycom.required'] = 'Year Completed is required';
            $customMessage['ycom.numeric'] = 'Year Completed is required';

            $tableData['year_completed'] = $request->input('ycom');
            $tableData['result'] = $request->input('result');
        }
        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('users_education')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Invalid information, Education Information Not Inserted!!');
        }

        return redirect()->route('users.editprofile.education.view')->with('msg', 'Education Information is Inserted Successfully!');

    }

    public function edit($id)
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['sidebarMenus'] = Common::profileEditSidebar();

        $data['userEdu'] = DB::table('users_education')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->orderby('ID', 'ASC')
            ->first();

        return view('users.editprofile.education.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validationRules =
            [
            'elevel' => 'required',
            'earea' => 'required',
            'dname' => 'required',
            'iname' => 'required',
            'statusstudent' => 'required|numeric',

        ];

        $customMessage = [
            'elevel.required' => 'Educational Level  is required.',
            'earea.required' => 'Education Area  is required.',
            'dname.required' => 'Degree Name  is required.',
            'iname.required' => 'Institution Name is required.',
            'statusstudent.required' => 'Completion Status is required.',
            'statusstudent.required' => 'Completion Status is required.',
        ];

        $tableData = [
            'education_level' => $request->input('elevel'),
            'education_area' => $request->input('earea'),
            'degree_name' => $request->input('dname'),
            'institution_name' => $request->input('iname'),
        ];

        if ($request->input('statusstudent') == 1) {
            $validationRules['semester'] = 'required';
            $customMessage['semester.required'] = 'Result is required';
            $tableData['semester'] = $request->input('ycom');
            $tableData['year_completed'] = 0;
            $tableData['result'] = 0;
        }
        if ($request->input('statusstudent') == 2) {
            $validationRules['result'] = 'required';
            $validationRules['ycom'] = 'required|numeric';
            $customMessage['result.required'] = 'Result is required';
            $customMessage['result.numeric'] = 'Result is required';
            $customMessage['ycom.required'] = 'Year Completed is required';
            $customMessage['ycom.numeric'] = 'Year Completed is required';

            $tableData['semester'] = 0;
            $tableData['year_completed'] = $request->input('ycom');
            $tableData['result'] = $request->input('result');
        }
        $validateFormData = request()->validate($validationRules, $customMessage);

        $update = DB::table('users_education')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Invalid information, Education Information Not Updated!!');
        }

        return redirect()->route('users.editprofile.education.view')->with('success', 'Education Information is Updated Successfully!');

    }

    public function delete(Request $request, $id)
    {

        $validateFormData = request()->validate(
            [
                'edudeleteid' => 'required',
            ]
        );

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $delete = DB::table('users_education')
            ->where('id', $id)
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', ' Not Deleted!!');
        }

        return redirect()->route('users.editprofile.education.view')->with('success', 'Deleted Successfully!');

    }

}
