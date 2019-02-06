<?php

namespace App\Http\Controllers\UserEditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EditBasicController extends Controller
{

    private $successMessage = 'Basic Information is Updated Succesfully';
    private $editTitle = 'Edit Basic Information';

    public function edit()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['formAction'] = route('users.profile.basic.update');
        $data['editTitle'] = $this->editTitle;
        return view('UserEditProfile.basic', $data);

    }

    public function update(Request $request)
    {

        $validateFormData = request()->validate(
            [
                'height' => 'required|numeric',
                'weight' => 'required|numeric',
                'bodytype' => 'required|numeric',
                'blood_group' => 'required|numeric',
                'skintone' => 'required|numeric',

                'diet' => 'required|numeric',
                'sunsign' => 'required|numeric',

                'drinks' => 'required|numeric',
                'smoke' => 'required|numeric',
                'mstatus' => 'required|numeric',
                'howmanychild' => 'required_if:mstatus,==,2|required_if:mstatus,==,3|numeric',
                'income' => 'required',
                'hobbies' => 'required',
            ],
            [
                'height.required' => 'Height is required.',
                'height.numeric' => 'Height is required.',
                'weight.required' => 'Weight is required.',
                'weight.numeric' => 'Weight is required.',
                'bodytype.required' => 'body type is required.',
                'bodytype.numeric' => 'body type is required.',
                'blood_group.required' => 'Blood group is required.',
                'blood_group.numeric' => 'Blood group is required.',
                'skintone.required' => 'Skin tone is required.',
                'skintone.numeric' => 'Skin tone is required.',
                'diet.required' => 'Diet type is required.',
                'diet.numeric' => 'Diet type is required.',
                'sunsign.required' => 'Sun Sign is required.',
                'sunsign.required' => 'Sun Sign is required.',
                'drinks.required' => 'Do you Drink? is required.',
                'drinks.numeric' => 'Do you Drink? is required.',
                'smoke.required' => 'Do you Smoke? is required.',
                'smoke.numeric' => 'Do you Smoke? is required.',
                'mstatus.required' => 'Marital status is required.',
                'mstatus.numeric' => 'Marital status is required.',
                'howmanychild.required_if' => 'How many childrend is required.',
                'howmanychild.numeric' => 'How many childrend is required.',
                'income' => 'Income is required.',
                'hobbies' => 'Interests and Hobbies is required',
            ]

        );

        $tableData = [
            'updated_at' => Carbon::now(),

            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'body_type' => $request->input('bodytype'),
            'blood_group' => $request->input('blood_group'),
            'skin_tone' => $request->input('skintone'),

            'drink' => $request->input('diet'),
            'sun_sign' => $request->input('sunsign'),

            'diet_type' => $request->input('drinks'),
            'smoke' => $request->input('smoke'),
            'marital_status' => $request->input('mstatus'),
            'how_many_children' => $request->input('howmanychild') ?? 0,

            'annual_income' => $request->input('income'),
            'hobby' => $request->input('hobbies'),

            'disability' => $request->input('disability') ?? 0,
            'explain_disability' => $request->input('explain_disability') ?? '',
            'language' => $request->input('language') ?? 1,
        ];

        if (Auth::user()->religion == 1) {
            $tableData['says_payer'] = $request->input('says_payer') ?? 0;
            if (Auth::user()->gender == 2) {
                $tableData['wear_hijab'] = $request->input('wear_hijab') ?? 0;
                $tableData['wear_hijab_after_marriage'] = $request->input('wear_hijab_after_marriage') ?? 0;
            }
        }

        return Common::UpdateUserTable($tableData, $this->successMessage);

    }

}
