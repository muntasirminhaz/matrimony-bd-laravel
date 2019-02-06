<?php

namespace App\Http\Controllers\Admin;

use App\AdminCommon;
use App\Admin\Users;
use App\Common;
use App\Http\Controllers\Controller;
use App\Mail\DefaultMail;
use App\Models\UserEducation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Models\UserRelative;

class AdminUsersController extends Controller
{

    private $routePrefix = 'admin.users.';

    public function index(Request $request)
    {
        $data = AdminCommon::allRoutes($this->routePrefix);

        if ($request->get('table_search')) {
            $data['reset'] = true;
            $users = User::Where('id', '=', $request->get('table_search'));
            $users->where('status','1');
            $users->orWhere('first_name', 'like', '%' . $request->get('table_search') . '%');
            $users->orWhere('middle_name', 'like', '%' . $request->get('table_search') . '%');
            $users->orWhere('last_name', 'like', '%' . $request->get('table_search') . '%');
            $users->orWhere('email', 'like', '%' . $request->get('table_search') . '%');
            $data['users'] = $users->paginate(10)->appends(request()->except('page'));
        } else {
            $users = Users::where('status','1')->paginate(10)->appends(request()->except('page'));
            $data['users'] = $users;
        }

        return view('admin.users.index', $data);
    }

    public function indexPendingApproval(Request $request)
    {
        $data = AdminCommon::allRoutes($this->routePrefix);

        if ($request->get('table_search')) {
            $data['reset'] = true;
            $users = User::Where('id', '=', $request->get('table_search'));
            $users->orWhere('first_name', 'like', '%' . $request->get('table_search') . '%');
            $users->orWhere('middle_name', 'like', '%' . $request->get('table_search') . '%');
            $users->orWhere('last_name', 'like', '%' . $request->get('table_search') . '%');
            $users->orWhere('email', 'like', '%' . $request->get('table_search') . '%');
            $users->where('status', 0);
            $users->where('completed', 100);
            $data['users'] = $users->paginate(10)->appends(request()->except('page'));
        } else {
            $users = Users::where('status', 0)->where('completed', 100)->paginate(10)->appends(request()->except('page'));
            $data['users'] = $users;
        }

        return view('admin.users.pendingApproval', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userData = User::leftJoin('profilepic', 'users.id', '=', 'profilepic.picuserid')
            ->select(
                'users.*',

                'profilepic.id as picid',
                'profilepic.extention as picext'

            )
            ->where('users.id', $id)
            ->first();

        $data['agent'] = $userData->agent;
        $data['currentAgent'] = AdminCommon::whoIsAgent($userData->agent);
        $user['id'] = $userData->id;
        $user['photo'] = '<img src="' . url(($userData->picid == '' ? ($userData->gender == 1 ? '/assets/defaults/profilepic.png' : '/assets/defaults/profilepicfemale.png') : $this->userPhoto($userData->id, $userData->picid, $userData->picext))) . '" class="image-responsive" style="max-width:300px">';
        
        $user['name'] = $userData->first_name . ' ' . ($userData->middle_name != '' ? $userData->middle_name . ' ' : '') . $userData->last_name;
        $user['description'] = $userData->description;

        /* short bio */
        $user['status'] = $userData->status;
        $user['age'] = Carbon::parse($userData->date_of_birth)->age;
        $user['marital_status'] = maritalStatus($userData->marital_status);
        $user['height'] = $userData->height . ' Feet';
        $userEducation = UserEducation::where('userid', $id)->orderBy('education_level', 'ASC')->first();

        if (isset($userEducation->education_level) && $userEducation->education_level > 0) {
            $user['education_level'] = educationLevel($userEducation->education_level);
        }

        $user['user_profession_type'] = ' - ';
        if ($userData->user_profession_type > 0) {
            $user['user_profession_type'] = professionType($userData->user_profession_type);
        }
        $user['father_profession'] = ' - ';
        if ($userData->father_profession > 0) {
            $user['father_profession'] = professionType($userData->father_profession);
        }
        $user['mother_profession'] = ' - ';
        if ($userData->mother_profession > 0) {
            $user['mother_profession'] = professionType($userData->mother_profession);
        }

        $user['number_of_brothers'] = $userData->number_of_brothers;
        $user['number_of_sisters'] = $userData->number_of_sisters;
        $user['location_district'] = $userData->location_district > 0 ? Common::district($userData->location_district) : ' - ';
        $user['location_upzila'] = $userData->location_upzila > 0 ? Common::upzila($userData->location_upzila) : ' - ';

        $user['location_living_country'] = $userData->location_living_country > 0 ? Common::country($userData->location_living_country) : ' - ';
        $user['location_living_city'] = $userData->location_living_city;

        $user['weight'] = $userData->weight . ' kg';
        $user['language'] = motherTongue($userData->language);
        $user['religion'] = religion($userData->religion);

        if ($userData->disability > 0) {
            $user['disability'] = 'Yes';
        }

        $user['Blood Group'] = bloodGroups($userData->blood_group);
        $user['Body Type'] = bodytype($userData->body_type);
        $user['Diet'] = diet($userData->diet_type);
        $user['Smoker'] = ($userData->smoke == 1 ? 'No' : 'Yes');
        $user['Drinks'] = ($userData->drink == 1 ? 'No' : 'Yes');
        if ($userData->disability == 2) {
            $user['disability'] = $userData->disability;
            $user['explain_disability'] = $userData->explain_disability;
        }

        if ($userData->preference_provided == 1) {
            $data['partnerPreference'] = true;
            $data['partnerPreference1'] = $this->partnerPrefernce($userData, 1);
            $data['partnerPreference2'] = $this->partnerPrefernce($userData, 2);
        }
        $data['user'] = $user;

        $data['userData'][1] = array_slice($user, 1, count($user) / 2);
        $data['userData'][2] = array_slice($user, (count($user) / 2) + 1);
        $data['title'] = $user['name'];


        
        if ($userData->relative_provided == 1) {
            $data['relatives'] = $this->relatives($userData);
            $rels = $this->usersRelatives($userData->id);
            if ($rels) {
                $data['myRelatives'] = $rels;
            }
        }

        $edu = $this->usersEducation($userData->id);
        if ($edu) {
            $data['education'] = $edu;
        }
        $data['family'] = $this->userFamily($userData);

        if ($userData->preference_provided == 1) {
            $data['partnerPreference'] = true;
            $data['partnerPreference1'] = $this->partnerPrefernce($userData, 1);
            $data['partnerPreference2'] = $this->partnerPrefernce($userData, 2);
        }


        return view('admin.users.show', $data);

    }

    public function userPdf($id)
    {
        $userData = User::leftJoin('profilepic', 'users.id', '=', 'profilepic.picuserid')
            ->select(
                'users.*',

                'profilepic.id as picid',
                'profilepic.extention as picext'

            )
            ->where('users.id', $id)
            ->first();

        $data['agent'] = $userData->agent;
        $data['currentAgent'] = AdminCommon::whoIsAgent($userData->agent);
        $user['id'] = $userData->id;
        $user['photo'] = '<img src="' . url(($userData->picid == '' ? ($userData->gender == 1 ? '/assets/defaults/profilepic.png' : '/assets/defaults/profilepicfemale.png') : $this->userPhoto($userData->id, $userData->picid, $userData->picext))) . '" class="image-responsive" style="max-width:160px">';

        $user['name'] = $userData->first_name . ' ' . ($userData->middle_name != '' ? $userData->middle_name . ' ' : '') . $userData->last_name;
        $user['description'] = $userData->description;

        /* short bio */
        $user['status'] = $userData->status;
        $user['age'] = Carbon::parse($userData->date_of_birth)->age;
        $user['marital_status'] = maritalStatus($userData->marital_status);
        $user['height'] = $userData->height . ' Feet';
        $userEducation = UserEducation::where('userid', $id)->orderBy('education_level', 'ASC')->first();

        if (isset($userEducation->education_level) && $userEducation->education_level > 0) {
            $user['education_level'] = educationLevel($userEducation->education_level);
        }

        $user['user_profession_type'] = ' - ';
        if ($userData->user_profession_type > 0) {
            $user['user_profession_type'] = professionType($userData->user_profession_type);
        }
        $user['father_profession'] = ' - ';
        if ($userData->father_profession > 0) {
            $user['father_profession'] = professionType($userData->father_profession);
        }
        $user['mother_profession'] = ' - ';
        if ($userData->mother_profession > 0) {
            $user['mother_profession'] = professionType($userData->mother_profession);
        }

        $user['number_of_brothers'] = $userData->number_of_brothers;
        $user['number_of_sisters'] = $userData->number_of_sisters;
        $user['location_district'] = $userData->location_district > 0 ? Common::district($userData->location_district) : ' - ';
        $user['location_upzila'] = $userData->location_upzila > 0 ? Common::upzila($userData->location_upzila) : ' - ';

        $user['location_living_country'] = $userData->location_living_country > 0 ? Common::country($userData->location_living_country) : ' - ';
        $user['location_living_city'] = $userData->location_living_city;

        $user['weight'] = $userData->weight . ' kg';
        $user['language'] = motherTongue($userData->language);
        $user['religion'] = religion($userData->religion);

        if ($userData->disability > 0) {
            $user['disability'] = 'Yes';
        }

        $user['Blood Group'] = bloodGroups($userData->blood_group);
        $user['Body Type'] = bodytype($userData->body_type);
        $user['Diet'] = diet($userData->diet_type);
        $user['Smoker'] = ($userData->smoke == 1 ? 'No' : 'Yes');
        $user['Drinks'] = ($userData->drink == 1 ? 'No' : 'Yes');
        if ($userData->disability == 2) {
            $user['disability'] = $userData->disability;
            $user['explain_disability'] = $userData->explain_disability;
        }

        if ($userData->preference_provided == 1) {
            $data['partnerPreference'] = true;
            $data['partnerPreference1'] = $this->partnerPrefernce($userData, 1);
            $data['partnerPreference2'] = $this->partnerPrefernce($userData, 2);
        }
        $data['user'] = $user;

        $data['userData'][1] = array_slice($user, 1, count($user) / 2);
        $data['userData'][2] = array_slice($user, (count($user) / 2) + 1);
        $data['title'] = $user['name'];

        $fileName = $user['name'] . '.pdf';

     
        
        
        if ($userData->relative_provided == 1) {
            $data['relatives'] = $this->relatives($userData);
            $rels = $this->usersRelatives($userData->id);
            if ($rels) {
                $data['myRelatives'] = $rels;
            }
        }

        $edu = $this->usersEducation($userData->id);
        if ($edu) {
            $data['education'] = $edu;
        }
        $data['family'] = $this->userFamily($userData);

        if ($userData->preference_provided == 1) {
            $data['partnerPreference'] = true;
            $data['partnerPreference1'] = $this->partnerPrefernce($userData, 1);
            $data['partnerPreference2'] = $this->partnerPrefernce($userData, 2);
        }
        

        $pdf = PDF::loadView('admin.users.pdf', $data);
        return $pdf->stream($fileName);
    }

  

    public function edit($id)
    {
        echo 'edit', $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Users::find($id);
        $name = $delete->first_name . ' ' . $delete->last_name;
        $delete->delete();

        return redirect()->route('admin.users.index')->with('message', 'Successfully deleted the <em>' . $name . '</em> package');
    }

    public function deactiveUserProfile(Request $request, $id)
    {
        $user = Users::find($id);
        $name = $user->first_name . ' ' . $user->last_name;
        $user->status = 2;
        $usrr->save();

        return redirect()->route('admin.users.index')->with('message', '<em>' . $name . '</em> user is Deactivated');
    }

    public function approveUserProfile(Request $request, $id)
    {
        $user = Users::find($id);
        $name = $user->first_name . ' ' . $user->last_name;
        $user->status = 1;

        $nameOfUser = AdminCommon::whoIsUserName($id);

        Mail::to($user->email)->send(new DefaultMail(
            'Your Profile Approved.',
            'You profile is Approved. Enjoy our services.',
            'Hi ' . $nameOfUser . ',<br> Your profile is aproved. <a href="' . route('users.myprofile') . '">See your profile</a> now and enjoy out services.<br>Best Regards,<br>Matrimony.'
        ));
        $user->save();

        return redirect()->route('admin.users.pendingApproval')->with('message', '<em>' . $name . '</em> user is Approved');

    }
    public function disapproveUserProfile($id)
    {
        $user = Users::find($id);
        $name = $user->first_name . ' ' . $user->last_name;
        $user->status = 2;

        $nameOfUser = AdminCommon::whoIsUserName($id);

        Mail::to($user->email)->send(new DefaultMail(
            'Your Profile is disapproved..',
            'Sorry; your profile is disapproved.',
            'Hello' . $nameOfUser . ';<br>We regret to inform you that you profile is not accepted.<br>Best Regards<br>Matrimony.'
        ));

        $user->save();
        return redirect()->route('admin.users.pendingApproval')->with('message', '<em>' . $name . '</em> user is dispproved');

    }
    public function blockUserProfile($id)
    {
        $user = Users::find($id);
        $name = $user->first_name . ' ' . $user->last_name;
        $user->status = 3;
        $user->featured = 0;

        $nameOfUser = AdminCommon::whoIsUserName($id);

        Mail::to($user->email)->send(new DefaultMail(
            'Your Profile is blocked..',
            'Sorry; your profile is blocked.',
            'Hello ' . $nameOfUser . ';<br>We regret to inform you that you profile is block.<br>Best Regards<br>Matrimony.'
        ));

        $user->save();
        return redirect()->back()->with('message', '<em>' . $name . '</em> user is dispproved');

    }
    public function unblockUserProfile($id)
    {
        $user = Users::find($id);
        $name = $user->first_name . ' ' . $user->last_name;
        $user->status = 1;

        $nameOfUser = AdminCommon::whoIsUserName($id);

        Mail::to($user->email)->send(new DefaultMail(
            'Your Profile is unblocked..',
            'your profile is unblocked.',
            'Hello ' . $nameOfUser . ';<br>We are glad to inform you that you profile is unblocked.<br>Best Regards<br>Matrimony.'
        ));

        $user->save();
        return redirect()->back()->with('message', '<em>' . $name . '</em> user is dispproved');

    }

    public function makeFeatured($id)
    {
        $makeFeatured = Users::find($id);
        $makeFeatured->featured = 1;

        $name = $makeFeatured->first_name . ' ' . $makeFeatured->last_name;
        if ($makeFeatured->status == 1) {
            $makeFeatured->save();
            return redirect()->back()->with('message', '<em>' . $name . '</em> User is now a featured profile.');
        }
        return redirect()->back()->with('error', '<em>' . $name . '</em>User is not approved yet.');

    }
    public function removeFeatured($id)
    {
        $makeFeatured = Users::find($id);
        $makeFeatured->featured = 0;
        $name = $makeFeatured->first_name . ' ' . $makeFeatured->last_name;
        $makeFeatured->save();
        return redirect()->back()->with('message', '<em>' . $name . '</em> User is now removed from featured profiles.');

    }

    private function userPhoto($userid, $id, $extention)
    {
        return "/profiles/pics/" .  $userid . '/' . $id . '.' . $extention;
    }

    private function partnerPrefernce($userData, $table)
    {

        $preferenceData[1]['Min Age'] = $userData->preference_min_age . ' Years';
        $preferenceData[1]['Max Age'] = $userData->preference_max_age . ' Years';
        $preferenceData[1]['Marital Status'] = maritalstatus($userData->preference_marital_status);
        $preferenceData[1]['Children Allow'] = $userData->preference_children_allow == 1 ? 'Yes' : 'No';
        $preferenceData[1]['Height'] = height($userData->preference_height);
        $preferenceData[1]['Religion'] = religion($userData->preference_religion);

        $eduLevels = explode('|', $userData->preference_education);
        $preferenceData[1]['Education'] = '';

        foreach ($eduLevels as $key => $value) {
            $tempEdu[] = educationLevel($value);
        };
        $preferenceData[1]['Education'] = implode(', ', $tempEdu) . '.';

        $proLevels = explode('|', $userData->preference_profession);
        foreach ($proLevels as $key => $value) {
            $tempProfession[] = professionType($value);
        };
        $preferenceData[1]['Profession'] = implode(', ', $tempProfession) . '.';

        $preferenceData[1]['Disability'] = $userData->preference_disability == 1 ? 'No' : 'Yes';

        $preferenceData[2]['Home District'] = $userData->preference_home_district > 0 ? Common::district($userData->preference_home_district) : ' - ';
        $preferenceData[2]['Living Country'] = $userData->preference_living_country > 0 ? Common::country($userData->preference_living_country) : ' - ';
        $preferenceData[2]['Family Resident City'] = $userData->preference_family_resident_city;
        $preferenceData[2]['Family Residential Status'] = $userData->preference_family_residential_status > 0 ? residentialStatus($userData->preference_family_residential_status) : ' - ';
        $preferenceData[2]['Monthly Income'] = $userData->preference_monthly_income . ' Taka(Aprox)';
        $preferenceData[2]['Body Type'] = bodytype($userData->preference_body_type);
        $preferenceData[2]['Skintone'] = skintone($userData->preference_skintone);
        $preferenceData[2]['NRB'] = nrb($userData->preference_nrb);
        $preferenceData[2]['More Info'] = $userData->preference_moreinfo;

        return $preferenceData[$table];

    }

    private function relatives($userData)
    {

        $relatives['Number of paternal uncle'] = $userData->paternal_uncle ?? ' - ';
        $relatives['Number of paternal uncle married'] = $userData->paternal_uncle_married ?? ' - ';
        $relatives['Number of paternal aunt'] = $userData->paternal_aunt ?? ' - ';
        $relatives['Number of maternal uncle married'] = $userData->maternal_uncle_married ?? ' - ';
        $relatives['Number of maternal uncle'] = $userData->maternal_uncle ?? ' - ';
        $relatives['Number of maternal uncle married'] = $userData->maternal_uncle_married ?? ' - ';
        $relatives['Number of maternal aunt'] = $userData->maternal_aunt ?? ' - ';
        $relatives['Number of maternal aunt married'] = $userData->maternal_aunt_married ?? ' - ';

        return $relatives;

    }
    private function usersRelatives($userid)
    {
        $myRelatives = UserRelative::where('userid', $userid);
        if ($myRelatives->count() == 0) {
            return false;
        }
        return $myRelatives->get();
    }

    private function usersEducation($userid)
    {
        $education = UserEducation::where('userid', $userid)->orderBy('education_level', 'ASC');

        if ($education->count() == 0) {
            return false;
        }

        $fieldNames = [
            'id' => 'id',
            'education_level' => 'Educaiton Level',
            'education_area' => 'Educaiton Area',
            'degree_name' => 'Degree',
            'institution_name' => 'Institution',
            'status' => 'Status',
        ];
        $get = $education->get();
        foreach ($get as $itemkey => $item) {

            (object) $educationArray[$itemkey] = (object) [
                'id' => $item->id,
                'delete' => route('users.profile.education.delete', $item->id),
                'education_level' => educationLevel($item->education_level),
                'education_area' => educationArea($item->education_area),
                'degree_name' => $item->degree_name,
                'institution_name' => $item->institution_name,
                'status' => $item->status == 1 ? 'Currently Studing' : 'Completed',
                'edit' => '<a href="' . route('users.profile.education.edit', $item->id) . '">Edit' .
                '</a> / <a href="#educationDelete" type="button" data-toggle="modal" data-target="#educationDelete' .
                $item->id . '">Delete' . '</a>',
            ];

        }

        if (isset($educationArray)) {
            return (object) $educationArray;
        }
        return false;

    }

    private function userFamily($userData)
    {

        $family['family background'] = $userData->family_background;

        $family['father name'] = $userData->father_name;
        $family['father living status'] = $userData->father_living_status == 1 ? 'Yes' : 'Passed Away';
        $family['father service status'] = serviceStatus($userData->father_service_status);

        if ($userData->father_profession > 0) {
            $family['father profession'] = professionType($userData->father_profession);
            if ($userData->father_profession_details > 0) {
                $family['father profession'] .= ' (' . Common::professionDetails($userData->father_profession, $userData->father_profession_details) . ')';
            }
            $family['father designation'] = $userData->father_designation;
            $family['father organization name'] = $userData->father_organization_name;
            if ($userData->father_other_profession_details != '') {
                $family['father other profession details'] = $userData->father_other_profession_details;
            }

        }

        $family['mother name'] = $userData->mother_name;
        $family['mother living status'] = $userData->mother_living_status == 1 ? 'Yes' : 'Passed Away';
        $family['mother service status'] = serviceStatus($userData->mother_service_status);

        if ($userData->mother_profession > 0) {
            $family['mother profession'] = professionType($userData->mother_profession);
            if ($userData->mother_profession_details > 0) {
                $family['mother profession'] .= ' (' . Common::professionDetails($userData->mother_profession, $userData->mother_profession_details) . ')';
            }
            $family['mother designation'] = $userData->mother_designation;
            $family['mother organization name'] = $userData->mother_organization_name;
            if ($userData->mother_other_profession_details != '') {
                $family['mother other profession details'] = $userData->mother_other_profession_details;
            }
        }

        if ($userData->have_land == 2) {
            $family['Land'] = 'Yes (' . str_ireplace('|', ', ', $userData->land_type) . ')';
        }

        return (object) $family;

    }


}
