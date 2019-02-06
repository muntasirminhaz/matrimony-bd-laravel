<?php

namespace App\Http\Controllers\Users\Profile;

use App\Common;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\UserLimiter;

class SingleProfileController extends Controller
{
    public function index($name, int $id)
    {
        
        $data['user'] = $this->getUserData($name, $id);
        if (!$data['user']) {
            echo '404';
            return;
        }
        if (isset(Auth::user()->id)) {
            $data['userLoggedIn'] = true;
            $data['limitMessage'] = UserLimiter::messageDaily();
            $data['profilePicture'] = Common::userProfilePic();
        }
        

        return view('profile.index', $data);

    }

    private function getUserData($nameSlug, int $idSlug)
    {
        $userData = DB::Table('users')
            ->leftJoin('profilepic', 'users.id', '=', 'profilepic.picuserid')
            ->select(
                'users.*',

                'profilepic.id as picid',
                'profilepic.extention as picext'

            )
            ->where('users.id', $idSlug)
            ->first();

        $matchWith = strtolower(str_ireplace(' ', '-', $userData->first_name . ' ' . ($userData->middle_name != '' ? $userData->middle_name . ' ' : '') . $userData->last_name));

        if ($nameSlug !== $matchWith) {
            return false;
        };

        $user['id'] = $userData->id;
        $user['name'] = $userData->first_name . ' ' . ($userData->middle_name != '' ? $userData->middle_name . ' ' : '') . $userData->last_name;
        $user['photo'] = ($userData->picid == '' ? ($userData->gender == 1 ? '/assets/defaults/profilepic.png' : '/assets/defaults/profilepicfemale.png') : $this->userPhoto($userData->id, $userData->picid, $userData->picext));
        $user['age'] = Carbon::parse($userData->date_of_birth)->age;

        $user['height'] = $userData->height;
        $user['weight'] = $userData->weight;
        $user['language'] = motherTongue($userData->language);
        $user['religion'] = religion($userData->religion);
        $user['marital_status'] = maritalStatus($userData->marital_status);

        if ($userData->disability > 0) {
            $user['disability'] = 'Yes';
        }

        $userPhysique['Height'] = $userData->height . ' Feet';
        $userPhysique['Weight'] = $userData->weight . ' kg';
        //$userPhysique['Complexion'] = complexion($userData->complexion);
        $userPhysique['Blood Group'] = bloodGroups($userData->blood_group);
        $userPhysique['Body Type'] = bodytype($userData->body_type);
        $userPhysique['Diet'] = diet($userData->diet_type);
        $userPhysique['Smoker'] = ($userData->smoke == 1 ? 'No' : 'Yes');
        $userPhysique['Drinks'] = ($userData->drink == 1 ? 'No' : 'Yes');
        if ($userData->disability == 2) {
            $userPhysique['disability'] = $userData->disability;
            $userPhysique['explain_disability'] = $userData->explain_disability;
        }

        /**
        if ($userData->profession != '') {
        $userProfession['Profession'] = professionType($userData->profession);
        if ($userData->professionDetail != 0) {
        $userProfession['Profession Details'] = 'details';
        }
        if ($userData->designation != '') {
        $userProfession['Designation'] = $userData->designation;
        }
        if ($userData->organization != '') {
        $userProfession['Organization'] = $userData->organization;
        }
        }


        $userProfession['Monthly Income'] = $userData->monthly_income . ' Taka';

        $user['profession'] = $userProfession;
        $user['physique'] = $userPhysique;
        $userEducation = $this->getUserEducation($userData->id);
        if ($userEducation !== false) {
        $user['education'] = $userEducation;
        }

        $partnerPreference = (array) $this->getPartnerPrefernceData($userData->id, $userData->gender, $userData->religion);
        if ($partnerPreference !== false) {
        $user['partnerPreference'] = $partnerPreference;
        }
        $photoSlider = $this->userPhotos($userData->id);
        if ($photoSlider !== false) {
        $user['photoSlider'] = $photoSlider;
        }
         */
        return (object) $user;
    }

    private function getPartnerPrefernceData(int $userid, int $gender, int $religion)
    {
        $preferenceData = DB::table('user_partner_preference')
            ->select(
                $this->partnerPreferenceFields($gender, $religion)
            )
            ->where('userid', $userid)
            ->first();

        $row = (array) $preferenceData;

        $row = $this->renderPartnerPreferenceData($row, $gender, $religion);

        return $row;
    }

    private function renderPartnerPreferenceData($row, $gender, $religion)
    {

        $messageValue['sometext'] = $row['sometext'];
        $messageValue['Montly Income'] = $row['Montly Income'] ?? ' - ';
        $messageValue['Mother Tougne'] = '1';
        $messageValue['Minimum Age'] = $row['Minimum Age'] . ' Years';
        $messageValue['Maximum Age'] = $row['Maximum Age'] . ' Years';
        $messageValue['Height'] = $row['Height'] . ' Feet';
        $messageValue['Weight'] = $row['Weight'] . ' Weight';
        $messageValue['Blood Groop'] = $row['Blood Groop'] > 0 ? bloodGroups($row['Blood Groop']) : ' - ';
        $messageValue['Complexion'] = $row['Complexion'];
        $messageValue['Body Type'] = $row['Body Type'];
        $messageValue['Smoker'] = $row['Smoker'];
        $messageValue['Drinks'] = $row['Drinks'];
        $messageValue['Diet Type'] = $row['Diet Type'];
        $messageValue['Want Children'] = $row['Want Children'];
        $messageValue['Marital Status'] = $row['Marital Status'];
        $messageValue['Education Level'] = $row['Education Level'];
        $messageValue['Education Area'] = $row['Education Area'];
        $messageValue['Profession'] = $row['Profession'];
        $messageValue['Religion'] = $row['Religion'];
        $messageValue['Must be Religious'] = $row['Must be Religious'];
        $messageValue['Can have disability?'] = $row['Can have disability?'];
        $messageValue['Expected Home District'] = $row['Expected Home District'];
        $messageValue['Expected Family District'] = $row['Expected Family District'];
        $messageValue['Expected Living Area'] = $row['Expected Living Area'];
        $messageValue['Expected Residential Status'] = $row['Expected Residential Status'];
        $messageValue['Living Country'] = $row['Living Country'];
        $messageValue['Family Values'] = $row['Family Values'];
        $messageValue['Personal Values'] = $row['Personal Values'];

        if ($gender === 1) {
            $messageValue['Bride Allowed to Work After Marriage'] = $row['Bride Allowed to Work After Marriage'];

        }

        if ($religion === 1) {
            $messageValue['Says Payer'] = $row['Says Payer'];

            if ($gender === 1) {
                $messageValue['Wear HijabPersonal'] = $row['Wear Hijab'];
                $messageValue['Hijab after Marriage'] = $row['Hijab after Marriag'];
            }
        }

        return $messageValue;

    }

    private function partnerPreferenceFields(int $gender, int $religion)
    {

        $fields = [
            'sometext',
            'montly_income as Montly Income',
            'mother_tongue as Mother Tougne',
            'age_minimun as Minimum Age',
            'age_maximum as Maximum Age',
            'height as Height',
            'weight as Weight',
            'blood_group as Blood Groop',
            'complexion as Complexion',
            'body_type as Body Type',
            'smoking as Smoker',
            'drink as Drinks',
            'diet as Diet Type',
            'children_allow as Want Children',
            'marital_status as Marital Status',
            'education_level as Education Level',
            'education_area as Education Area',
            'profession as Profession',
            'religion as Religion',
            'is_religious as Must be Religious',
            'disability_allow as Can have disability?',
            'expected_district_home as Expected Home District',
            'expected_district_familty as Expected Family District',
            'expected_living_area as Expected Living Area',
            'expected_residential_status as Expected Residential Status',
            'living_country as Living Country',
            'personal_values as Personal Values',
            'partner_family_values as Family Values',
        ];

        if ($gender === 1) {
            array_push($fields, 'job_allow_for_bride as Bride Allowed to Work After Marriage');
        }

        if ($religion === 1) {
            array_push($fields, 'saying_prayer as Says Payer');
            if ($gender === 1) {
                array_push($fields, 'hijab as Must Wear Hijab');
                array_push($fields, 'hijab_after_marriage as Must Wear Hijab after Marriage');
            }
        }

        return $fields;

    }

    private function getUserEducation($userid)
    {
        $educationData = DB::table('users_education')
            ->select(
                'education_level',
                'education_area',
                'degree_name',
                'institution_name',
                'semester',
                'result',
                'year_completed'
            )
            ->where('userid', $userid)
            ->orderby('education_level', 'ASC')
            ->get();
        if (count($educationData) === 0) {
            return false;
        }

        $row = $educationData;

        $row = $this->renderEducationData($row);

        return $row;

    }

    private function renderEducationData($eduData)
    {
        foreach ($eduData as $item) {

            $messageValue['Education Level'] = educationLevel($item->education_level);

            $messageValue['Education Area'] = $item->education_area;

            $messageValue['Degree'] = $item->degree_name;
            $messageValue['Institution'] = $item->institution_name;

            if ($item->semester != 0) {
                $messageValue['Semester'] = $item->semester;
            } else {
                $messageValue['Result'] = $item->result;
                $messageValue['Year Completed'] = $item->year_completed;
            }

            $renderedData[] = $messageValue;
        }
        return $renderedData;
    }

    private function userPhotos($userid)
    {
        $photos = DB::table('users_photos')
            ->select(
                '*'
            )
            ->where([
                ['userid', $userid],
                ['private', 1],
            ])
            ->orderby('updated_at', 'DESC')
            ->get();
        if (count($photos) === 0) {
            return false;
        }

        foreach ($photos as $photo) {
            $allPhotos[] = "/profiles/pics/" . $userid  . '/' . $photo->id . '.' . $photo->extention;
        }

        return $allPhotos;
    }

    private function userPhoto($userid, $id, $extention)
    {
        return "/profiles/pics/" .  $userid  . '/' . $id . '.' . $extention;
    }
}
