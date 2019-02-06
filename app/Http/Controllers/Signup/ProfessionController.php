<?php

namespace App\Http\Controllers\Signup;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfessionController extends Controller
{
    private $page = 'profession';

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

        $data['profilePicture'] = Common::userProfilePic();
        $data['title'] = 'Professional Information';

        return view('signup.profession', $data);
    }

    public function store(Request $request)
    {

        $validationRules = [
            'profession' => 'required|numeric',
        ];
        $customMessage = [
            'profession.required' => 'Profession is required',
            'profession.numeric' => 'Profession is required',
        ];

        $tableData = [
            'user_profession_type' => $request->input('profession'),
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

                $tableData['user_profession_details'] = 0;
                $tableData['user_designation'] = $request->input('designation');
                $tableData['user_org_name'] = $request->input('orgName');
            }

            if ($request->input('profession') == 11
                || $request->input('profession') == 12
                || $request->input('profession') == 14
                || $request->input('profession') == 15) {

                $tableData['user_profession_details'] = 0;
                $tableData['user_designation'] = 0;
                $tableData['user_org_name'] = 0;
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

                    $tableData['user_profession_details'] = $request->input('profession_details');
                    $tableData['user_designation'] = $request->input('designation');
                    $tableData['user_org_name'] = $request->input('orgName');
                } else {
                    return redirect()->back()->withErrors($request->all());

                }
            }
        } else {
            return redirect()->back()->withErrors($request->all());

        }

        $tableData['created_at'] = Carbon::now();
        $tableData['updated_at'] = Carbon::now();
        $tableData['user_other_profession_details'] = $request->input('otherdetails') ?? '';

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->withErrors($request->all());
        }

        return redirect(Common::updateSignupLevelAndRedirect($this->page));
    }

}
