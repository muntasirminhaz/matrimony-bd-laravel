<?php

namespace App\Http\Controllers\Signup;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiblingsController extends Controller
{

    private $page = 'siblings';

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

        if (!$this->alreadySaved()) {
            $data['title'] = 'How many brother and sisters you have?';
            return view('signup.siblingsNumber', $data);
        }

        $data['allowSkip'] = route('signup.siblingsSkip');

        $data['title'] = 'Add Details About Brothers / Sisters';
        return view('signup.siblingsInsert', $data);

    }

    private function alreadySaved()
    {
        if (Auth::user()->has_siblings == 0) {
            return false;
        }
        if (Auth::user()->has_siblings == 1) {
            return redirect(Common::updateSignupLevelAndRedirect($this->page));
        }
        if (Auth::user()->has_siblings == 2) {
            return true;
        }

        return false;
    }

    public function skip()
    {
        if (!$this->alreadySaved()) {
            return redirect()->back()->with('error', 'Please provide the information below;');
        }
        return redirect(Common::updateSignupLevelAndRedirect($this->page));
    }

    public function storeNumber(Request $request)
    {

        $validateFormData = request()->validate(
            [
                'havesiblings' => 'required|numeric',
                'sistersnumber' => 'required_if:havesiblings,==,2',
                'sistersmarriednumber' => 'required_if:havesiblings,==,2',
                'brothersnumber' => 'required_if:havesiblings,==,2',
                'brothersmarriednumber' => 'required_if:havesiblings,==,2',
            ]
            , [

                'havesiblings.required' => 'Do you have brothers and sisters? is required.',
                'havesiblings.numeric' => 'Do you have brothers and sisters? is required.',
                'sistersnumber.required_if' => 'Number of Sisters is required.',
                'sistersmarriednumber.required_if' => 'Number of Sisters Married is required.',
                'brothersnumber.required_if' => 'Number of Brothers is required.',
                'brothersmarriednumber.required_if' => 'Number of Brothers Married is required.',

            ]);

        $tableData = [
            'updated_at' => Carbon::now(),
            'has_siblings' => $request->input('havesiblings'),
            'number_of_sisters' => $request->input('sistersnumber') ?? 0,
            'number_of_sisters_married' => $request->input('sistersmarriednumber') ?? 0,
            'number_of_brothers' => $request->input('brothersnumber') ?? 0,
            'number_of_brother_married' => $request->input('brothersmarriednumber') ?? 0,
        ];

        $update = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->withErrors($request->all());
        }

        if ($request->input('havesiblings') == 1) {
            return redirect(Common::updateSignupLevelAndRedirect($this->page));
        }

        return redirect()->route('signup.siblings')->with('success', 'Siblings information added.');

    }

    public function storeSibling(Request $request)
    {

        //print_r($request->all()); die();
        $validationRules = [
            'siblingposition' => 'required|numeric|max:99',
            'gender' => 'required|numeric',
            'sibling_living' => 'required|numeric',
            'marital_status' => 'required|numeric',
        ];

        $customMessage = [
            'sibling_position.required' => 'Position field must be selected',
            'sibling_position.max' => 'We don\'t believe you have 99+ brother and sister',
            'gender.required' => 'Gender field must be selected',
            'sibling_living.required' => 'Living Status field must be selected',
            'marital_status.required' => 'Marital Status field must be selected',
            'marital_status.numeric' => 'Marital Status field must be selected',
        ];

        $tableData = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sibling_position' => $request->input('siblingposition'),
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

            $customMessage['sibling_spouse_living.required'] = 'Sibling\'s Spouse Living Status field must be selected';
            $customMessage['sibling_spouse_living.numeric'] = 'Sibling\'s Spouse Living Status field must be selected';

            $tableData['sibling_spouse_living_status'] = $request->input('sibling_spouse_living');

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
            return redirect()->back()->withErrors($request->all());
        }

        return redirect()->route('signup.siblings')->with('success', 'Information Saved! Add New now or you can skip');

    }

}
