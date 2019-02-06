<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilePartnerPreferenceController extends Controller
{
    public function index()
    {
        $data['userPreferences'] = DB::table('user_partner_preference')
            ->select(
                $this->fields()
            )
            ->where('userid', Auth::user()->id)
            ->first();

        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['professionType'] = professionType();
        $data['profilePicture'] = Common::userProfilePic();

        if (!$data['userPreferences']) {
            $data['partnerCountry'] = DB::table('countries')
                ->select('*')
                ->orderby('id', 'ASC')
                ->get();
            $data['partnetDistricts'] = DB::table('districts')
                ->select('*')
                ->orderby('name', 'ASC')
                ->get();

            return view('users.editprofile.partnerPreference.insert', $data);
        } else {
            $data['partnerCountry'] = (DB::table('countries')
                    ->select('name')
                    ->where('id', $data['userPreferences']->living_country)
                    ->first())->name;
            $data['familyDistricts'] = (DB::table('districts')
                    ->select('name')
                    ->where('id', $data['userPreferences']->expected_district_familty)
                    ->first())->name;
            $data['partnetDistricts'] = (DB::table('districts')
                    ->select('name')
                    ->where('id', $data['userPreferences']->expected_district_home)
                    ->first())->name;
            //print_r($data['partnetDistricts']);

            return view('users.editprofile.partnerPreference.index', $data);
        }
    }

    public function store(Request $request)
    {
        $validationRules = [
            'mothertongue' => 'required|numeric|max:15',
            'monthlyincome' => 'required|numeric',
            'height' => 'required|max:6|string',
            'weight' => 'required|numeric',
            'bggroup' => 'required|numeric',
            'complexion' => 'required|numeric',
            'bodytype' => 'required|numeric',
            'diet' => 'required|numeric',
            'smoke' => 'required|numeric',
            'drinks' => 'required|numeric',
            'wantchild' => 'required|numeric',
            'mstatus' => 'required|numeric',
            'disablity' => 'required|numeric',
            'religion' => 'required|numeric',
            'religious' => 'required|numeric',
            'livingcountry' => 'required|numeric',
            'resstatus' => 'required|numeric',
            'partnerdistrict' => 'required|numeric',
            'familydistrict' => 'required|numeric',
            'livingarea' => 'required',
            'profession' => 'required|numeric',
            'mineducation' => 'required|numeric',
            'educationarea' => 'required|numeric',
            'personalvalues' => 'required',
            'minage' => 'required|numeric',
            'maxage' => 'required|numeric',
            'familyvalues' => 'required',
        ];

        $tableData = [
            'mother_tongue' => $request->input('mothertongue'),
            'montly_income' => $request->input('monthlyincome'),
            'age_minimun' => $request->input('minage'),
            'age_maximum' => $request->input('maxage'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'blood_group' => $request->input('bggroup'),
            'complexion' => $request->input('complexion'),
            'body_type' => $request->input('bodytype'),
            'diet' => $request->input('diet'),
            'smoking' => $request->input('smoke'),
            'drink' => $request->input('drinks'),

            'children_allow' => $request->input('wantchild'),
            'marital_status' => $request->input('mstatus'),

            'profession' => $request->input('profession'),
            'education_level' => $request->input('mineducation'),
            'education_area' => $request->input('educationarea'),

            'religion' => $request->input('religion'),
            'is_religious' => $request->input('religious'),

            'disability_allow' => $request->input('disablity'),

            'expected_residential_status' => $request->input('resstatus'),
            'expected_district_home' => $request->input('partnerdistrict'),
            'living_country' => $request->input('livingcountry'),

            'expected_district_familty' => $request->input('familydistrict'),
            'expected_living_area' => $request->input('livingarea'),

            'personal_values' => $request->input('personalvalues'),
            'partner_family_values' => $request->input('familyvalues'),
        ];

        if (Auth::user()->gender === 1) {
            $validationRules['bridejoballow'] = 'required|numeric';
            $tableData['job_allow_for_bride'] = $request->input('bridejoballow');
        } else {
            $tableData['job_allow_for_bride'] = '-1';
        }

        if (Auth::user()->religion === 1) {
            $validationRules['saypayers'] = 'required|numeric';
            $tableData['saying_prayer'] = $request->input('saypayers');
            if (Auth::user()->gender === 1) {
                $validationRules['wearhijab'] = 'required|numeric';
                $validationRules['willwearhijab'] = 'required|numeric';
                $tableData['hijab'] = $request->input('wearhijab');
                $tableData['hijab_after_marriage'] = $request->input('willwearhijab');
            } else {
                $tableData['hijab'] = '-1';
                $tableData['hijab_after_marriage'] = '-1';
            }
        } else {
            $tableData['saying_prayer'] = '-1';
        }

        foreach ($validationRules as $key => $value) {

            if (!strpos($value, '|')) {
                $customMessages["{$key}.{$value}"] = $this->message($value, $key);
                continue;
            }
            $explode = explode('|', $value);
            foreach ($explode as $value1) {
                $customMessages["{$key}.{$value1}"] = $this->message($value1, $key);
            }

        }

        $tableData['userid'] = Auth::user()->id;

        $validateFormData = request()->validate($validationRules, $customMessages);
        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('user_partner_preference')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Personal Information is Not Saved!');
        }

        return redirect()->route('users.editprofile.partner.index')->with('success', 'Personal Information is Saved Successfully!');

    }

    public function edit()
    {
        $data['userPreferences'] = DB::table('user_partner_preference')
            ->select(
                $this->fields()
            )
            ->where('userid', Auth::user()->id)
            ->first();
        if (!$data['userPreferences']) {
            return redirect()->route('home');
        }

        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['professionType'] = professionType();
        $data['profilePicture'] = Common::userProfilePic();
        $data['partnerCountry'] = DB::table('countries')
            ->select('*')
            ->orderby('id', 'ASC')
            ->get();
        $data['partnetDistricts'] = DB::table('districts')
            ->select('*')
            ->orderby('name', 'ASC')
            ->get();
        $data['userPreferences'] = DB::table('user_partner_preference')
            ->select(
                $this->fields()
            )
            ->where('userid', Auth::user()->id)
            ->first();
        //print_r($data['userPreferences']);
        return view('users.editprofile.partnerPreference.edit', $data);
    }

    public function update(Request $request)
    {
        $validationRules = [
            'mothertongue' => 'required|numeric|max:15',
            'monthlyincome' => 'required|numeric',
            'height' => 'required|max:6',
            'weight' => 'required|numeric',
            'bggroup' => 'required|numeric',
            'complexion' => 'required|numeric',
            'bodytype' => 'required|numeric',
            'diet' => 'required|numeric',
            'smoke' => 'required|numeric',
            'drinks' => 'required|numeric',
            'wantchild' => 'required|numeric',
            'mstatus' => 'required|numeric',
            'disablity' => 'required|numeric',
            'religion' => 'required|numeric',
            'religious' => 'required|numeric',
            'livingcountry' => 'required|numeric',
            'resstatus' => 'required|numeric',
            'partnerdistrict' => 'required|numeric',
            'familydistrict' => 'required|numeric',
            'livingarea' => 'required',
            'profession' => 'required|numeric',
            'mineducation' => 'required|numeric',
            'educationarea' => 'required|numeric',
            'personalvalues' => 'required',
            'familyvalues' => 'required',
            'minage' => 'required|numeric',
            'maxage' => 'required|numeric',
        ];

        $fields = ["
            'mothertongue'
            'monthlyincome'
            'height'
            'weight'
            'bggroup'
            'complexion'
            'bodytype'
            'diet'
            'smoke'
            'drinks'
            'wantchild'
            'mstatus'
            'disablity'
            'religion'
            'religious'
            'livingcountry'
            'resstatus'
            'partnerdistrict'
            'familydistrict'
            'livingarea'
            'minage'
            'maxage'
            "];

        $tableData = [
            'mother_tongue' => $request->input('mothertongue'),
            'montly_income' => $request->input('monthlyincome'),
            'age_minimun' => $request->input('minage'),
            'age_maximum' => $request->input('maxage'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'blood_group' => $request->input('bggroup'),
            'complexion' => $request->input('complexion'),
            'body_type' => $request->input('bodytype'),
            'diet' => $request->input('diet'),
            'smoking' => $request->input('smoke'),
            'drink' => $request->input('drinks'),

            'children_allow' => $request->input('wantchild'),
            'marital_status' => $request->input('mstatus'),

            'profession' => $request->input('profession'),
            'education_level' => $request->input('mineducation'),
            'education_area' => $request->input('educationarea'),

            'religion' => $request->input('religion'),
            'is_religious' => $request->input('religious'),

            'disability_allow' => $request->input('disablity'),

            'expected_residential_status' => $request->input('resstatus'),
            'expected_district_home' => $request->input('partnerdistrict'),
            'living_country' => $request->input('livingcountry'),

            'expected_district_familty' => $request->input('familydistrict'),
            'expected_living_area' => $request->input('livingarea'),

            'personal_values' => $request->input('personalvalues'),
            'partner_family_values' => $request->input('familyvalues'),
        ];

        if (Auth::user()->gender === 1) {
            $validationRules['bridejoballow'] = 'required|numeric';
            $tableData['job_allow_for_bride'] = $request->input('bridejoballow');
        } else {
            $tableData['job_allow_for_bride'] = '-1';
        }

        if (Auth::user()->religion === 1) {
            $validationRules['saypayers'] = 'required|numeric';
            $tableData['saying_prayer'] = $request->input('saypayers');
            if (Auth::user()->gender === 1) {
                $validationRules['wearhijab'] = 'required|numeric';
                $validationRules['willwearhijab'] = 'required|numeric';
                $tableData['hijab'] = $request->input('wearhijab');
                $tableData['hijab_after_marriage'] = $request->input('willwearhijab');
            } else {
                $tableData['hijab'] = '-1';
                $tableData['hijab_after_marriage'] = '-1';
            }
        } else {
            $tableData['saying_prayer'] = '-1';
        }

        foreach ($validationRules as $key => $value) {

            if (!strpos($value, '|')) {
                $customMessages["{$key}.{$value}"] = $this->message($value, $key);
                continue;
            }
            $explode = explode('|', $value);
            foreach ($explode as $value1) {
                $customMessages["{$key}.{$value1}"] = $this->message($value1, $key);
            }

        }

        $validateFormData = request()->validate($validationRules, $customMessages);
        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('user_partner_preference')
            ->where('userid', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Personal Information is Not Updated!');
        }

        return redirect()->route('users.editprofile.partner.index')->with('success', 'Personal Information is Updated Successfully!');

    }

    private function message($validationRule, $fieldName)
    {
        $rules = [
            'required' => ' is required.',
            'numeric' => ' is required.',
            'max:191' => ' is required.',
            'max:6' => ' is required.',
            'max:15' => ' is required.',
            'string' => ' is required.',
        ];

        $fields = [
            'mothertongue' => 'Mother Tongue',
            'monthlyincome' => 'Monthly Income',
            'minage' => 'Minimum Age',
            'maxage' => 'Maximum Age',
            'height' => 'Height',
            'weight' => 'Weight',
            'bggroup' => 'Blood Group',
            'complexion' => 'Complexion',
            'bodytype' => 'Body Type',
            'diet' => 'Diet Type',
            'smoke' => 'Smoker',
            'drinks' => 'Drinks',
            'wantchild' => 'Parnter Must Want Children',
            'mstatus' => 'Marital Status',
            'disablity' => 'Disability',
            'religion' => 'Religion',
            'religious' => 'Partner should be Religious',
            'saypayers' => 'How offen Says Prayer',
            'wearhijab' => 'Wear Hijab/Borka',
            'willwearhijab' => 'Wear Hijab/Borka after marrige',
            'livingcountry' => 'Partner Living Country',
            'resstatus' => 'Residential Status',
            'partnerdistrict' => 'Partner Living District / Area',
            'familydistrict' => 'Home / Family District',
            'livingarea' => 'Living In',
            'bridejoballow' => 'Bride Allowed to Job',
            'willwearhijab' => 'Field',
            'profession' => 'Profession Type',
            'mineducation' => 'Min Education level',
            'educationarea' => 'Field /Area of Education',
            'personalvalues' => 'Partner Personal Values ',
            'familyvalues' => 'Family Personal Values',
        ];
        return $fields[$fieldName] . $rules[$validationRule];
    }

    private function fields()
    {

        $fields = [
            'montly_income',
            'mother_tongue',
            'age_maximum',
            'age_minimun',
            'height',
            'weight',
            'blood_group',
            'complexion',
            'body_type',
            'smoking',
            'drink',
            'diet',
            'children_allow',
            'marital_status',
            'education_level',
            'education_area',
            'profession',
            'religion',
            'is_religious',
            'disability_allow',
            'expected_district_home',
            'expected_district_familty',
            'expected_living_area',
            'expected_residential_status',
            'living_country',
            'personal_values',
            'partner_family_values',
        ];
        if (Auth::user()->gender === 1) {
            array_push($fields, 'job_allow_for_bride');
        }

        if (Auth::user()->religion === 1) {
            array_push($fields, 'saying_prayer');
            if (Auth::user()->gender === 1) {
                array_push($fields, 'hijab');
                array_push($fields, 'hijab_after_marriage');
            }
        }

        return $fields;

        $selectFields = '';
        foreach ($fields as $value) {
            $selectFields .= "'{$value}' , ";
        }

        return $selectFields;

    }
    
    private function name()
    {

        $name = [
            'montly_income' => 'Monthly Income',
            'mother_tongue' => 'Mother Tongue',
            'age_maximum' => 'Maximum Age',
            'age_minimun' => 'Minium Age',
            'height' => 'Height',
            'weight' => 'Weight',
            'blood_group' => 'Blood Group',
            'complexion' => 'Complexion',
            'body_type' => 'Body Type',
            'smoking' => 'Somkes',
            'drink' => 'Drinks',
            'diet' => 'Diet Type',
            'children_allow' => 'Want Children',
            'marital_status' => 'Marital Status',
            'education_level' => 'Education Level',
            'education_area' => 'Education Area',
            'profession' => 'Rrofession',
            'religion' => 'Religion',
            'is_religious' => 'Is partner religious?',
            'disability_allow' => 'Allow Parter Disability',
            'expected_district_home' => 'Current Home District',
            'expected_district_familty' => 'Family District',
            'expected_living_area' => 'Living Area',
            'expected_residential_status' => 'Residential Status',
            'living_country' => 'Country of Living',
            'personal_values' => 'Personal Values',
            'partner_family_values' => 'Family Values',
            'job_allow_for_bride' => 'Job Allow for Bride',
            'saying_prayer' => 'Says payer',
            'hijab' => 'Wears Hijab',
            'hijab_after_marriage' => 'Wears Hijab After Marriage',
        ];

        return $name;

    }
}
