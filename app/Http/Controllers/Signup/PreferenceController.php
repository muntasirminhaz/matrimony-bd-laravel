<?php

namespace App\Http\Controllers\Signup;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreferenceController extends Controller
{

    private $page = 'preference';

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
        $data['title'] = 'Partner Preference';
        $data['countries'] = Common::country();
        $data['districts'] = Common::district();

        return view('signup.preference', $data);
    }

    public function store(Request $request)
    {
        $runValidation = request()->validate(
            [
                'minage' => 'required|numeric',
                'maxage' => 'required|numeric|gt:minage',
                'mstatus' => 'required|numeric',
                'childallow' => 'required|numeric',
                'height' => 'required|numeric',
                'religion' => 'required|numeric',

                'profession' => 'required|array',
                'education' => 'required|array',

                'familydistrict' => 'required|array',

                'country' => 'required|array',

                'familycity' => 'required',
                'familyresidentstatus' => 'required|numeric',
                'income' => 'required|numeric',
                'bodytype' => 'required|numeric',
                'skintone' => 'required|numeric',
                'disablity' => 'required|numeric',
                'nrb' => 'required|numeric',

                'describe' => 'required',

            ],
            [
                'minage.required' => 'Min Age is required',
                'minage.numeric' => 'Min Age is required',
                'maxage.required' => 'Max Age is required',
                'maxage.numeric' => 'Max Age is required',
                'mstatus.required' => 'Marital Status is required',
                'mstatus.numeric' => 'Marital Status is required',
                'childallow.required' => 'Children Allow is required',
                'childallow.numeric' => 'Children Allow is required',
                'height.required' => 'Height is required',
                'height.numeric' => 'Height is required',
                'religion.required' => 'Religion is required',
                'religion.numeric' => 'Religion is required',

                'education.required' => 'Education Level is required',
                'education.array' => 'Education Level is required',

                'profession.required' => 'Profession Level is required',
                'profession.array' => 'Profession Level is required',

                'familydistrict.required' => 'Prefered Home District is required',
                'familydistrict.array' => 'Prefered Home District is required',

                'country.required' => 'Living Country is required',
                'country.numeric' => 'Living Country is required',

                'familycity.required' => 'Family Resident City is required',

                'familyresidentstatus.required' => 'Family Resident Status is required',
                'familyresidentstatus.numeric' => 'Family Resident Status is required',
                'income.required' => 'Monthly Income is required',
                'income.numeric' => 'Monthly Income is required',
                'bodytype.required' => 'Body Type is required',
                'bodytype.numeric' => 'Body Type is required',
                'skintone.required' => 'Skin Tone is required',
                'skintone.numeric' => 'Skin Tone is required',
                'disablity.required' => 'Disability option is required',
                'disablity.numeric' => 'Disability option is required',
                'nrb.required' => 'NRB/Immigrant Preferable is required',
                'nrb.numeric' => 'NRB/Immigrant Preferable is required',

                'describe.required' => 'More Information is required',
            ]
        );

        $tableData = [
            'updated_at' => Carbon::now(),
            'preference_provided' => 1,
            'preference_min_age' => $request->input('minage'),
            'preference_max_age' => $request->input('maxage'),
            'preference_marital_status' => $request->input('mstatus'),
            'preference_children_allow' => $request->input('childallow'),
            'preference_height' => $request->input('height'),
            'preference_religion' => $request->input('religion'),

            'preference_education' => implode('|', $request->input('education')),
            'preference_profession' => implode('|', $request->input('profession')),

            'preference_home_district' =>  implode('|', $request->input('familydistrict')),

            'preference_living_country' => implode('|', $request->input('country')),

            'preference_family_resident_city' => $request->input('familycity'),
            'preference_family_residential_status' => $request->input('familyresidentstatus'),

            'preference_monthly_income' => $request->input('income'),
            'preference_body_type' => $request->input('bodytype'),
            'preference_skintone' => $request->input('skintone'),
            'preference_disability' => $request->input('disablity'),
            'preference_nrb' => $request->input('nrb'),
            'preference_moreinfo' => $request->input('describe'),
        ];

        $update = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->withErrors($request->all());
        }

        return redirect(Common::updateSignupLevelAndRedirect($this->page))->with('success', 'You profile is complete');
    }
}
