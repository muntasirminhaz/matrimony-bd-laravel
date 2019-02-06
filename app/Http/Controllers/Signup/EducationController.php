<?php

namespace App\Http\Controllers\Signup;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    private $page = 'education';

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (($match = Common::signupLevels(Auth::user()->completed, $this->page)) != $this->page) {
                return redirect($match);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $data['completed'] = Auth::user()->completed;
        $data['educationLevel'] = educationLevel();
        $data['profilePicture'] = Common::userProfilePic();
        $data['title'] = 'Education';
        $data['description'] = 'Add educational qualifications.';

        $data['prevPageLink'] = 1;
        $data['nextPageLink'] = 1;
        $data['selected'] = 0;
        $data['studying'] = 2;

        $allReadySaved = $this->checkIfSavedBefore();
        if (count($allReadySaved) > 0) {

            foreach ($allReadySaved as $item) {
                unset($data['educationLevel'][$item->education_level]);
                $data['selected'] = $item->education_level;

                if ($item->status == 1) {
                    $data['studying'] = 1;
                }
            }
            $data['allowSkip'] = route('signup.educationSkip');

            $data['education'] = $allReadySaved;
        };



        if ($data['selected'] == 1 || $data['selected'] == 2) {
            $data['selected'] = $data['selected'] + 1;
        } else if ($data['selected'] == 3 || $data['selected'] == 4 || $data['selected'] == 5 || $data['selected'] == 6) {
            $data['selected'] = 8;
        } else if ($data['selected'] == 7 || $data['selected'] == 8) {
            $data['selected'] = 9;
        }

        return view('signup.education', $data);
    }

    public function skip()
    {
        if (count($this->checkIfSavedBefore()) > 0) {
            // update completed
            return redirect(Common::updateSignupLevelAndRedirect($this->page));
        };
        return redirect()->route('signup.education');
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
            'education_level' => $request->input('elevel'),
            'education_area' => $request->input('earea'),
            'degree_name' => $request->input('dname'),
            'institution_name' => $request->input('iname'),
            'status' => $request->input('statusstudent'),
            'semester' => $request->input('semester') ?? null,
        ];

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('users_education')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Not saved!! Please provide valid information');
        }

        return redirect()->route('signup.education')->with('success', 'Education information added.');
    }

    private function checkIfSavedBefore()
    {
        return DB::table('users_education')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->orderby('education_level', 'ASC')
            ->get();

    }

}
