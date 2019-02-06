<?php

namespace App\Http\Controllers\UserEditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EditLocationController extends Controller
{

    private $successMessage = 'Location Information is Updated Succesfully';
    private $editTitle = 'Edit Location Information';

    public function edit()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['formAction'] = route('users.profile.location.update');
        $data['editTitle'] = $this->editTitle;
        $data['countries'] = Common::country();
        $data['districts'] = Common::district();

        return view('UserEditProfile.location', $data);

    }

    public function update(Request $request)
    {

        $validationRule =
            [
            'living_country' => 'required|numeric',
            'living_city' => 'required',
            'districts' => 'required|numeric',
            'upzila' => 'required|numeric',
        ];
        $customMessage = [
            'living_city.required' => 'Current living city is required.',
            'districts.required' => 'District is required',
            'districts.numeric' => 'District is required',
            'upzila.required' => 'Upzila is required',
            'upzila.numeric' => 'Upzila is required',

            'family_living_country.required_if' => 'Family Living country is required is required.',
            'family_living_country.numeric' => 'Family Living country is required is required.',

            'family_districts.required_if' => 'Family district is required.',

            'family_living_area.required_if' => 'Family living area is required.',
            'family_living_area.string' => 'Family living area is required.',

            'family_zip_code.required_if' => 'Zip code is required.',

            'family_residential_status.required_if' => 'Residential status is required.',
            'family_residential_status.numeric' => 'Residential status is required.',

        ];

        if ($request->input('living_country') == 1) {

            array_push($customMessage, ['family_living_country' => 'required_if:living_country,==,1|numeric',

                'family_districts' => 'required_if:family_living_country,==,1|numeric',
                'family_living_area' => 'required_if:family_living_country,==,1',
                'family_zip_code' => 'required_if:family_living_country,==,1',
                'family_residential_status' => 'required_if:family_living_country,==,1|numeric']);

            array_push($validationRule, ['family_living_country.required_if' => 'Family Living country is required is required.',
                'family_living_country.numeric' => 'Family Living country is required is required.',

                'family_districts.required_if' => 'Family district is required.',

                'family_living_area.required_if' => 'Family living area is required.',
                'family_living_area.string' => 'Family living area is required.',

                'family_zip_code.required_if' => 'Zip code is required.',

                'family_residential_status.required_if' => 'Residential status is required.',
                'family_residential_status.numeric' => 'Residential status is required.']);
        }
        if ($request->input('living_country') > 1) {
            $validationRule['immigrationstatus'] = 'required|numeric';
            $validationRule['growing_country'] = 'required|numeric';

            $customMessage['growing_country.required'] = 'Growing up country is required';
            $customMessage['growing_country.numeric'] = 'Growing up country is required';
            $customMessage['immigrationstatus.required'] = 'Immigration status is required';
            $customMessage['immigrationstatus.numeric'] = 'Immigration status is required';
        }
        $tableData = [
            'updated_at' => Carbon::now(),
            'location_living_city' => $request->input('living_city') ?? 0,
            'location_living_country' => $request->input('living_country') ?? 0,
            'location_growing_up_country' => $request->input('growing_country') ?? 0,
            'location_immigration_status' => $request->input('immigrationstatus') ?? 0,
            'location_district' => $request->input('districts') ?? 0,
            'location_upzila' => $request->input('upzila') ?? 0,
            'location_family_living_country' => $request->input('family_living_country') ?? 0,
            'location_family_district' => $request->input('family_districts') ?? 0,
            'location_family_living_area' => $request->input('family_living_area') ?? 0,
            'location_family_zip' => $request->input('family_zip_code') ?? 0,
            'location_family_residential_status' => $request->input('family_residential_status') ?? 0,
        ];

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        return Common::UpdateUserTable($tableData, $this->successMessage);

    }

}
