<?php

namespace App\Http\Controllers\Signup;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelativesController extends Controller
{

    private $page = 'relatives';

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

        if (Auth::user()->relative_provided == 0) {
            $data['title'] = 'Insert Relatives Information';
            return view('signup.relativeNumber', $data);
        }

        $data['allowSkip'] = route('signup.relativeSkip');

        $data['title'] = 'Add Details About Relatives';
        return view('signup.relativeInsert', $data);

    }

    public function skip()
    {
        if (Auth::user()->relative_provided == 0) {
            return redirect()->back()->with('error', 'Please provide the information below;');
        }
        return redirect(Common::updateSignupLevelAndRedirect($this->page));
    }

    public function storeNumber(Request $request)
    {

        $validateFormData = request()->validate(
            [
                'paternal_uncle' => 'required|numeric',
                'paternal_aunt' => 'required|numeric',
                'maternal_uncle' => 'required|numeric',
                'maternal_aunt' => 'required|numeric',
                'paternal_uncle_married' => 'required|numeric',
                'paternal_aunt_married' => 'required|numeric',
                'maternal_uncle_married' => 'required|numeric',
                'maternal_aunt_married' => 'required|numeric',
            ]
            , [

                'paternal_uncle.required' => 'Number of Paternal Uncle is required.',
                'paternal_uncle.numeric' => 'Number of Paternal Uncle is required.',

                'paternal_aunt.required' => 'Number of Paternal Aunty is required.',
                'paternal_aunt.numeric' => 'Number of Paternal Aunty is required.',

                'maternal_uncle.numeric' => 'Number of Maternal Uncle is required.',
                'maternal_uncle.required' => 'Number of Maternal Uncle is required.',

                'maternal_aunt.required' => 'Number of Maternal Aunty is required.',
                'maternal_aunt.numeric' => 'Number of Maternal Aunty is required.',

                'paternal_uncle_married.required' => 'Number of Paternal Uncle Married is required.',
                'paternal_uncle_married.numeric' => 'Number of Paternal Uncle Married is required.',

                'paternal_aunt_married.required' => 'Number of Paternal Aunty Married is required.',
                'paternal_aunt_married.numeric' => 'Number of Paternal Aunty Married is required.',

                'maternal_uncle_married.required' => 'Number of Maternal Uncle Married is required.',
                'maternal_uncle_married.numeric' => 'Number of Maternal Uncle Married is required.',

                'maternal_aunt_married.required' => 'Number of Maternal Aunty Married is required.',
                'maternal_aunt_married.numeric' => 'Number of Maternal Aunty Married is required.',

            ]);

        $tableData = [
            'updated_at' => Carbon::now(),
            'relative_provided' => 1,
            'paternal_uncle' => $request->input('paternal_uncle'),
            'paternal_aunt' => $request->input('paternal_aunt'),
            'maternal_uncle' => $request->input('maternal_uncle'),
            'maternal_aunt' => $request->input('maternal_aunt'),
            'paternal_uncle_married' => $request->input('paternal_uncle_married'),
            'paternal_aunt_married' => $request->input('paternal_aunt_married'),
            'maternal_uncle_married' => $request->input('maternal_uncle_married'),
            'maternal_aunt_married' => $request->input('maternal_aunt_married'),
        ];

        $update = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->withErrors($request->all());
        }

        return redirect()->route('signup.relatives')->with('success', 'Information Saved.');

    }

    public function storeRelative(Request $request)
    {

        $validationRules = [
            'relative_side' => 'required|numeric',
            'gender' => 'required|numeric',
            'relative_living' => 'required|numeric',
            'marital_status' => 'required|numeric',
        ];

        $customMessage = [
            'relative_side.required' => 'Relative side must be selected',
            'gender.required' => 'Gender field must be selected',
            'relative_living.required' => 'Living Status field must be selected',
            'marital_status.required' => 'Marital Status field must be selected',
        ];

        $tableData = [
            'userid' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'relative_side' => $request->input('relative_side'),
            'gender' => $request->input('gender'),
            'living_status' => $request->input('relative_living'),
            'marital_status' => $request->input('marital_status'),

        ];

        if ($request->input('relative_living') == 1) {
            $validationRules['relative_profession'] = 'required|numeric';
            $customMessage['relative_profession.required'] = 'Relative Profession field must be selected';
            $tableData['relative_profession'] = $request->input('relative_profession');

            if ($request->input('relative_profession') == 1 || $request->input('relative_profession') == 2 || $request->input('relative_profession') == 5 || $request->input('relative_profession') == 6 || $request->input('relative_profession') == 9 || $request->input('relative_profession') == 10) {
                $validationRules['relative_designation'] = 'required|max:50';
                $validationRules['relative_organization'] = 'required|max:50';
                $validationRules['profession_details'] = 'required|numeric';

                $customMessage['relative_designation.required'] = 'Relative Designation is required';
                $customMessage['relative_designation.max'] = 'Relative Designation is too long (maximum 50 character).';

                $customMessage['relative_organization.required'] = 'Relative Organization Name is required';
                $customMessage['relative_organization.max'] = 'Relative Organization Name is too long (maximum 100 character).';

                $customMessage['profession_details.required'] = 'Profession Details is required.';
                $customMessage['profession_details.numeric'] = 'Profession Details is required.';

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

                $customMessage['relative_designation.required'] = 'Relative Designation is required';
                $customMessage['relative_designation.max'] = 'Relative Designation is too long (maximum 50 character).';

                $customMessage['relative_organization.required'] = 'Relative Organization Name is required';
                $customMessage['relative_organization.max'] = 'Relative Organization Name is too long (maximum 100 character).';

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

            $customMessage['relative_spouse_living.required'] = 'Relative\'s Spouse Living Status field must be selected';
            $customMessage['relative_spouse_living.numeric'] = 'Relative\'s Spouse Living Status field must be selected';

            $tableData['relative_spouse_living_status'] = $request->input('relative_spouse_living');

            if ($request->input('relative_spouse_living') == 1) {

                $validationRules['relative_spouse_profession'] = 'required|numeric';
                $customMessage['relative_spouse_profession.required'] = 'Relative Spouse Profession field must be selected';
                $customMessage['relative_spouse_profession.numeric'] = 'Relative Spouse Profession field must be selected';

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

                    $customMessage['spouse_profession_details.reqired'] = 'Spouse Profession details must be selected';
                    $customMessage['spouse_profession_details.numeric'] = 'Spouse Profession details must be selected';

                    $customMessage['relative_spouse_designation.required'] = 'Relative Spouse Designation is too long (maximum 50 character).';
                    $customMessage['relative_spouse_designation.max'] = 'Relative Spouse Designation is too long (maximum 50 character).';
                    $customMessage['relative_spouse_organizaion.max'] = 'Relative Spouse Organization Name is too long (maximum 100 character).';
                    $customMessage['relative_spouse_organizaion.required'] = 'Relative Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['relative_spouse_designation'] = $request->input('relative_spouse_designation');
                    $tableData['relative_spouse_profession_details'] = $request->input('spouse_profession_details');
                    $tableData['relative_spouse_organization'] = $request->input('relative_spouse_organizaion');
                }

                if ($request->input('relative_spouse_profession') == 3 ||
                    $request->input('relative_spouse_profession') == 4 ||
                    $request->input('relative_spouse_profession') == 7 ||
                    $request->input('relative_spouse_profession') == 8 ||
                    $request->input('relative_spouse_profession') == 13) {

                    $validationRules['relative_spouse_designation'] = 'required|max:50';
                    $validationRules['relative_spouse_organizaion'] = 'required|max:100';

                    $customMessage['relative_spouse_designation.required'] = 'Relative Spouse Designation is too long (maximum 50 character).';
                    $customMessage['relative_spouse_designation.max'] = 'Relative Spouse Designation is too long (maximum 50 character).';
                    $customMessage['relative_spouse_organizaion.max'] = 'Relative Spouse Organization Name is too long (maximum 100 character).';
                    $customMessage['relative_spouse_organizaion.required'] = 'Relative Spouse Organization Name is too long (maximum 100 character).';

                    $tableData['relative_spouse_designation'] = $request->input('relative_spouse_designation');
                    $tableData['relative_spouse_organization'] = $request->input('relative_spouse_organizaion');
                    $tableData['relative_spouse_profession_details'] = 0;

                }

                if ($request->input('relative_spouse_profession') == 0 ||
                    $request->input('relative_spouse_profession') == 11 ||
                    $request->input('relative_spouse_profession') == 12 ||
                    $request->input('relative_spouse_profession') == 14 ||
                    $request->input('relative_spouse_profession') == 15) {

                    $tableData['relative_spouse_designation'] = 0;
                    $tableData['relative_spouse_profession_details'] = 0;
                    $tableData['relative_spouse_organization'] = 0;
                }
            } else {

                $tableData['relative_spouse_living_status'] = 0;
                $tableData['relative_spouse_designation'] = 0;
                $tableData['relative_spouse_profession_details'] = 0;
                $tableData['relative_spouse_organization'] = 0;
            }
        } else {

            $tableData['relative_spouse_living_status'] = 0;
            $tableData['relative_spouse_designation'] = 0;
            $tableData['relative_spouse_profession_details'] = 0;
            $tableData['relative_spouse_organization'] = 0;
        }

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('users_relaives')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->withErrors($request->all());
        }

        return redirect()->route('signup.relatives')->with('success', 'Information Saved! Add New now or you can skip');

    }

}
