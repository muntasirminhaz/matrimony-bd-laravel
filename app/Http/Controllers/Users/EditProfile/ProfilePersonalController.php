<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilePersonalController extends Controller
{

    public function view()
    {

        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();
        return view('users.editprofile.personal.index', $data);
    
    }

    public function save(Request $request)
    {

        $validationRules = [
            'height' => 'required',

            'mothertongue' => 'required|numeric',
            'monthlyincome' => 'required|numeric',
            'siblings' => 'required|numeric',
            'wantchild' => 'required|numeric',
            'mstatus' => 'required|numeric',
            'religious' => 'required|numeric',

            'diet' => 'required|numeric',
            'smoke' => 'required|numeric',
            'drinks' => 'required|numeric',

            'weight' => 'required|numeric',
            'bggroup' => 'required|numeric',
            'complexion' => 'required|numeric',
            'bodytype' => 'required|numeric',
            'disablity' => 'required|numeric',
            'livingcountry' => 'required|numeric',
            'familylivingcountry' => 'required|numeric',

        ];

        $tableData = [
            'language' => $request->input('mothertongue'),
            'monthly_income' => $request->input('monthlyincome'),
            'has_siblings' => $request->input('siblings'),
            'want_children' => $request->input('wantchild'),
            'marital_status' => $request->input('mstatus'),
            'is_religious' => $request->input('religious'),
            'disability' => $request->input('disablity'),
            'body_type' => $request->input('bodytype'),
            'complexion' => $request->input('complexion'),
            'blood_group' => $request->input('bggroup'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'diet_type' => $request->input('diet'),
            'smoke' => $request->input('smoke'),
            'drink' => $request->input('drinks'),
            'countryid' => $request->input('livingcountry'),
            'familycountryid' => $request->input('familylivingcountry'),
        ];

        if (Auth::user()->religion === 1) {
            $validationRules['saypayers'] = 'required|numeric';
            $tableData['says_payer'] = $request->input('saypayers');

            if (Auth::user()->gender === 2) {
                $validationRules['wearhijab'] = 'required|numeric';
                $validationRules['willwearhijab'] = 'required|numeric';

                $tableData['wear_hijab'] = $request->input('wearhijab');
                $tableData['wear_hijab_after_marriage'] = $request->input('willwearhijab');
            }

        }

        if ($request->input('marital_status') != 1) {
            $validationRules['haschildren'] = 'required';
            $tableData['has_children'] = $request->input('haschildren');
            if ($request->input('haschildren') == 2) {
                $validationRules['howmanychild'] = 'required';
                $tableData['how_many_children'] = $request->input('howmanychild');
            }
        }
        if ($request->input('disablity') == 2) {
            $validationRules['whatdisability'] = 'required';
            $tableData['explain_disability'] = $request->input('whatdisability');
        }

        foreach ($validationRules as $key => $value) {
            $explode = explode('|', $value);
            foreach ($explode as $value1) {
                $customMessages["{$key}.{$value1}"] = $this->message($value1, $key);
            }
        }

        $validateFormData = request()->validate($validationRules, $customMessages);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData['provided_personal_info'] = 1;
        $save = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$save) {
            return redirect()->back()->with('error', 'Personal Information is Not Saved!');
        }

        return redirect()->route('users.editprofile.personal.view')->with('success', 'Personal Information is Saved Successfully!');

    }

    public function edit(Request $request)
    {
        $data['userinfo'] = DB::table('users')
            ->select(
                $this->fields()
            )
            ->where('id', Auth::user()->id)
            ->first();
        $data['countries'] = Common::country();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();

        return view('users.editprofile.personal.edit', $data);
    }

    public function update(Request $request)
    {

        $validationRules = [
            'height' => 'required',

            'mothertongue' => 'required|numeric',
            'monthlyincome' => 'required|numeric',
            'siblings' => 'required|numeric',
            'wantchild' => 'required|numeric',
            'mstatus' => 'required|numeric',
            'religious' => 'required|numeric',

            'diet' => 'required|numeric',
            'smoke' => 'required|numeric',
            'drinks' => 'required|numeric',

            'weight' => 'required|numeric',
            'bggroup' => 'required|numeric',
            'complexion' => 'required|numeric',
            'bodytype' => 'required|numeric',
            'disablity' => 'required|numeric',
            'livingcountry' => 'required|numeric',
            'familylivingcountry' => 'required|numeric',

        ];

        $tableData = [
            'language' => $request->input('mothertongue'),
            'monthly_income' => $request->input('monthlyincome'),
            'has_siblings' => $request->input('siblings'),
            'want_children' => $request->input('wantchild'),
            'marital_status' => $request->input('mstatus'),
            'is_religious' => $request->input('religious'),
            'disability' => $request->input('disablity'),
            'body_type' => $request->input('bodytype'),
            'complexion' => $request->input('complexion'),
            'blood_group' => $request->input('bggroup'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'diet_type' => $request->input('diet'),
            'smoke' => $request->input('smoke'),
            'drink' => $request->input('drinks'),
            'countryid' => $request->input('livingcountry'),
            'familycountryid' => $request->input('familylivingcountry'),
        ];

        if (Auth::user()->religion === 1) {
            $validationRules['saypayers'] = 'required|numeric';
            $tableData['says_payer'] = $request->input('saypayers');

            if (Auth::user()->gender === 2) {
                $validationRules['wearhijab'] = 'required|numeric';
                $validationRules['willwearhijab'] = 'required|numeric';

                $tableData['wear_hijab'] = $request->input('wearhijab');
                $tableData['wear_hijab_after_marriage'] = $request->input('willwearhijab');
            }

        }

        if ($request->input('marital_status') != 1) {
            $validationRules['haschildren'] = 'required';
            $tableData['has_children'] = $request->input('haschildren');
            if ($request->input('haschildren') == 2) {
                $validationRules['howmanychild'] = 'required';
                $tableData['how_many_children'] = $request->input('howmanychild');
            }
        }
        if ($request->input('disablity') == 2) {
            $validationRules['whatdisability'] = 'required';
            $tableData['explain_disability'] = $request->input('whatdisability');
        }

        foreach ($validationRules as $key => $value) {
            $explode = explode('|', $value);
            foreach ($explode as $value1) {
                $customMessages["{$key}.{$value1}"] = $this->message($value1, $key);
            }
        }

        $validateFormData = request()->validate($validationRules, $customMessages);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData['provided_personal_info'] = 1;
        $save = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$save) {
            return redirect()->back()->with('error', 'Personal Information is Not Saved!');
        }

        return redirect()->route('users.editprofile.personal.view')->with('success', 'Personal Information is Saved Successfully!');
    }

    private function fields()
    {
        $fields = [

            'language',
            'monthly_income',

            'has_siblings',

            'want_children',
            'marital_status',
            'has_children',
            'how_many_children',

            'is_religious',

            'disability',
            'explain_disability',
            'body_type',
            'complexion',
            'blood_group',
            'weight',
            'height',
            'diet_type',
            'smoke',
            'drink',
            'countryid',
            'familycountryid',
        ];

        if (Auth::user()->religion === 1) {
            array_push($fields, 'says_payer');
            if (Auth::user()->gender === 2) {
                array_push($fields, ['wear_hijab', 'wear_hijab_after_marriage']);
            }
        }
        return $fields;

    }

    private function message($validationRule, $fieldName)
    {

        $rules = [
            'required' => ' is required.',
            'numeric' => ' is required.',
        ];
        $fields = [

            'livingcountry' => 'Living country is required',
            'familylivingcountry' => 'Family living country is required',

            'height' => 'Height',

            'mothertongue' => 'Language',
            'monthlyincome' => 'Monthly Income',

            'siblings' => 'Do you have siblings?',

            'wantchild' => 'Want Children',
            'mstatus' => 'Marital Status',

            'saypayers' => 'How offen you Say Prayer',
            'haschildren' => 'Do you have Children?',
            'howmanychild' => 'How many Children do you have?',

            'religious' => 'Are you Religious?',

            'disablity' => 'Disability Option',
            'whatdisability' => 'Describe Your Disability',

            'bggroup' => 'Body Type',
            'complexion' => 'Complexion',
            'bodytype' => 'Blood Group',

            'weight' => 'Weight',

            'diet' => 'Diet Type',
            'smoke' => 'Do you Smoke?',
            'drinks' => 'Do you Drink?',

            'wearhijab' => 'DO you wear hijab',
            'willwearhijab' => 'Wear hijab after marriage',

        ];

        return $fields[$fieldName] . $rules[$validationRule];

    }
}
