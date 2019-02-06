<?php

namespace App\Http\Controllers\UserEditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditEducationController extends Controller
{

    private $successMessage = 'Education Information is Updated Succesfully';
    private $editTitle = 'Edit Education Information';

    public function create()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['educationLevel'] = educationLevel();
        $data['formAction'] = route('users.profile.education.store');
        $data['editTitle'] = 'Add Education Information';

        $allReadySaved = DB::table('users_education')
            ->select('education_level', 'status')
            ->where('userid', Auth::user()->id)
            ->orderby('education_level', 'ASC')
            ->get();

        $data['selected'] = 0;
        if (count($allReadySaved) > 0) {
            foreach ($allReadySaved as $item) {
                unset($data['educationLevel'][$item->education_level]);
                $data['selected'] = $item->education_level;

                if ($item->status == 1) {
                    $data['studying'] = 1;
                }
            }
            $data['allowSkip'] = route('signup.educationSkip');
        };

        if ($data['selected'] == 1 || $data['selected'] == 2) {
            $data['selected'] = $data['selected'] + 1;
        } else if ($data['selected'] == 3 || $data['selected'] == 4 || $data['selected'] == 5 || $data['selected'] == 6) {
            $data['selected'] = 8;
        } else if ($data['selected'] == 7 || $data['selected'] == 8) {
            $data['selected'] = 9;
        }

        return view('UserEditProfile.educationinsert', $data);

    }

    public function store(Request $request)
    {

        $validateFormData = request()->validate(
            [
                'elevel' => 'required',
                'earea' => 'required|string',
                'dname' => 'required|string',
                'iname' => 'required|string',
                'statusstudent' => 'required|numeric',
                //'semester' => 'required'
            ]
            , [
                'elevel.required' => 'Educational Level is required.',
                'earea.required' => 'Education Area is required.',
                'earea.string' => 'Education Area is required.',
                'dname.required' => 'Degree Name is required.',
                'dname.string' => 'Degree Name is required.',
                'iname.required' => 'Institution Name is required.',
                'iname.string' => 'Institution Name is required.',
                'statusstudent.required' => 'Completion Status is required.',
                'statusstudent.numeric' => 'Completion Status is required.',

            ]);

        $tableData = [
            'userid' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'education_level' => $request->input('elevel'),
            'education_area' => $request->input('earea'),
            'degree_name' => $request->input('dname'),
            'institution_name' => $request->input('iname'),
            'status' => $request->input('statusstudent') ?? 0,
            'semester' => $request->input('semester') ?? null,
        ];

        $insert = DB::table('users_education')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Invalid information, Education Information Not Inserted!!');
        }

        return redirect()->route('users.myprofile')->with('success', 'New Education Information is Saved');

    }

    public function edit($id)
    {
        $data['old'] = DB::table('users_education')
            ->select('*')
            ->where([
                ['userid', Auth::user()->id],
                ['id', $id],
            ])
            ->first();
        $data['profilePicture'] = Common::userProfilePic();
        $data['educationLevel'] = educationLevel();
        $data['formAction'] = route('users.profile.education.update', $id);
        $data['editTitle'] = $this->editTitle;

        $allReadySaved = DB::table('users_education')
            ->select('education_level', 'status')
            ->where('userid', Auth::user()->id)
            ->orderby('education_level', 'ASC')
            ->get();
        if (count($allReadySaved) > 0) {
            foreach ($allReadySaved as $item) {
                unset($data['educationLevel'][$item->education_level]);
                $data['selected'] = $item->education_level;

                if ($item->status == 1) {
                    $data['studying'] = 1;
                }
            }
            $data['allowSkip'] = route('signup.educationSkip');
        };

        if ($data['selected'] == 1 || $data['selected'] == 2) {
            $data['selected'] = $data['selected'] + 1;
        } else if ($data['selected'] == 3 || $data['selected'] == 4 || $data['selected'] == 5 || $data['selected'] == 6) {
            $data['selected'] = 8;
        } else if ($data['selected'] == 7 || $data['selected'] == 8) {
            $data['selected'] = 9;
        }

        return view('UserEditProfile.education', $data);
    }

    public function update(Request $request, $id)
    {
        $validateFormData = request()->validate(
            [
                'elevel' => 'required',
                'earea' => 'required|string',
                'dname' => 'required|string',
                'iname' => 'required|string',
                'statusstudent' => 'required|numeric',
                //'semester' => 'required'
            ]
            , [
                'elevel.required' => 'Educational Level is required.',
                'earea.required' => 'Education Area is required.',
                'earea.string' => 'Education Area is required.',
                'dname.required' => 'Degree Name is required.',
                'dname.string' => 'Degree Name is required.',
                'iname.required' => 'Institution Name is required.',
                'iname.string' => 'Institution Name is required.',
                'statusstudent.required' => 'Completion Status is required.',
                'statusstudent.numeric' => 'Completion Status is required.',

            ]);

        $tableData = [
            'updated_at' => Carbon::now(),
            'education_level' => $request->input('elevel'),
            'education_area' => $request->input('earea'),
            'degree_name' => $request->input('dname'),
            'institution_name' => $request->input('iname'),
            'status' => $request->input('statusstudent') ?? 0,
            'semester' => $request->input('semester') ?? null,
        ];

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('users_education')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Not saved!! Please provide valid information');
        }

        return redirect()->route('users.myprofile')->with('success', $this->successMessage);

    }

    public function destroy($id)
    {
        $delete = DB::table('users_education')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Not deleted. Please try again');
        }

        return redirect()->route('users.myprofile')->with('success', 'Education Info Deleted!');
    }
}
