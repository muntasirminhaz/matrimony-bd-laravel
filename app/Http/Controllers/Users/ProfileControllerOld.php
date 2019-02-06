<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileControllerOld extends Controller
{
    public function index()
    {
        $data = $this->fieldsName($this->userData());
        $data['education'] = $this->education();
        $data['siblings'] = $this->siblings();
        $data['relatives'] = $this->relatives();

        $data['siblingFields'] = [
            'id' => 'id',
            'sibling_position' => 'Sibling Position',
            'gender' => 'Gender',
            'living_status' => 'Living Status',
            'marital_status' => 'Marrial Status',
            'sibling_profession' => 'Profession',
            'sibling_profession_details' => 'Profession Details',
            'sibling_designation' => 'Designation',
            'sibling_organization' => 'Organization',
            'sibling_spouse_living_status' => 'Spouse Living Status',
            'sibling_spouse_profession' => 'Spouse Profession',
            'sibling_spouse_profession_details' => 'Spouse Profession Details',
            'sibling_spouse_designation' => 'Spouse Designation',
            'sibling_spouse_organization' => 'Spouse Organization',
            'edit' => 'edit',
            'delete' => 'delete',
        ];

        $data['relativeFields'] = [
            'id' => 'id',
            'relative_side' => 'relative_side',
            'gender' => 'Gender',
            'living_status' => 'Living Status',
            'marital_status' => 'Marital Status',
            'relative_profession' => 'Profession',
            'relative_profession_details' => 'Profession Details',
            'relative_designation' => 'Designation',
            'relative_organization' => 'Organization',
            'relative_spouse_living_status' => 'Spouse Living Status',
            'relative_spouse_profession' => 'Spouse Profession',
            'relative_spouse_profession_details' => 'Spouse Profession Details',
            'relative_spouse_designation' => 'Spouse Designation',
            'relative_spouse_organization' => 'Spouse Organization',
            'edit' => 'edit',
            'delete' => 'delete',
        ];

        $data['profilePicture'] = Common::userProfilePic();

        return view('users.myprofile', $data);
    }

    private function userData()
    {

        $preferenceEducationArray = explode('|', Auth::user()->preference_education);

        foreach ($preferenceEducationArray as $value) {
            $preferenceEducation[] = educationLevel($value);
        }
        $preferenceProfessionArray = explode('|', Auth::user()->preference_profession);

        foreach ($preferenceProfessionArray as $value) {
            $preferenceProfession[] = professionType($value);
        }

        

        $userData = [
            'regisration_as' => profileMadeBy(Auth::user()->regisration_as) ?? '-',
            'first_name' => Auth::user()->first_name,
            'middle_name' => Auth::user()->middle_name,
            'last_name' => Auth::user()->last_name,
            'description' => Auth::user()->description,
            'mobile' => Auth::user()->mobile,
            'national_id' => Auth::user()->national_id,
            'passport_no' => Auth::user()->passport_no,
            'gender' => gender(Auth::user()->gender),
            'date_of_birth' => Auth::user()->date_of_birth,

            'religion' => religion(Auth::user()->religion), //Common::UserReligion(Auth::user()->religion), // depends on religion
            'is_religious' => Auth::user()->is_religious == 1 ? 'Yes.' : 'No.', // depents on religion

            'says_payer' => Auth::user()->says_payer > 0 ? sayPayer(Auth::user()->says_payer) : '', // depends on religion
            'wear_hijab' => Auth::user()->wear_hijab == 1 ? 'Yes.' : 'No.', // depends on religion + gender

            'wear_hijab_after_marriage' => Auth::user()->wear_hijab_after_marriage == 1 ? 'Yes.' : 'No.', // depends on religion + gender
            'disability' => Auth::user()->disability == 1 ? 'Yes' : 'No' ,
            'explain_disability' => Auth::user()->explain_disability,
            'body_type' => bodytype(Auth::user()->body_type),
            'skin_tone' => skintone(Auth::user()->skin_tone),
            'blood_group' => bloodGroups(Auth::user()->blood_group),
            'weight' => Auth::user()->weight . ' KG',
            'height' => height(Auth::user()->height) . ' Feet',
            'diet_type' => diet(Auth::user()->diet_type),
            'smoke' => smoke(Auth::user()->smoke),
            'drink' => drink(Auth::user()->drink),
            'marital_status' => maritalstatus(Auth::user()->marital_status),
            'how_many_children' => Auth::user()->how_many_children,
            'children_living_with_me' => Auth::user()->children_living_with_me == 1 ? 'Yes.' : 'No.',
            'sun_sign' => sunsign(Auth::user()->sun_sign),
            'hobby' => Auth::user()->hobby,
            'language' => motherTongue(Auth::user()->language),
            'annual_income' => Auth::user()->annual_income . ' Taka',

            'father_name' => Auth::user()->father_name,
            'father_living_status' => deadOrAlive(Auth::user()->father_living_status),
            'father_service_status' => serviceStatus(Auth::user()->father_service_status),
            'father_profession' => professionType2(Auth::user()->father_profession),
            'father_profession_details' => Common::professionDetails(Auth::user()->father_profession, Auth::user()->father_profession_details),
            'father_designation' => Auth::user()->father_designation,
            'father_organization_name' => Auth::user()->father_organization_name,
            'father_other_profession_details' => Auth::user()->father_other_profession_details,
            'mother_name' => Auth::user()->mother_name,
            'mother_living_status' => deadOrAlive(Auth::user()->mother_living_status),
            'mother_service_status' => serviceStatus(Auth::user()->mother_service_status),
            'mother_profession' => professionType2(Auth::user()->mother_profession),
            'mother_profession_details' => Common::professionDetails(Auth::user()->mother_profession, Auth::user()->mother_profession_details),
            'mother_designation' => Auth::user()->mother_designation,
            'mother_organization_name' => Auth::user()->mother_organization_name,
            'mother_other_profession_details' => Auth::user()->mother_other_profession_details,
            'have_land' => Auth::user()->have_land == 1 ? 'No' : 'Yes',
            'land_type' => str_ireplace('|', ', ', Auth::user()->land_type),
            'family_background' => Auth::user()->family_background,
            'has_siblings' => Auth::user()->has_siblings, // depends

            'number_of_brothers' => Auth::user()->number_of_brothers,
            'number_of_brother_married' => Auth::user()->number_of_brother_married,
            'number_of_sisters' => Auth::user()->number_of_sisters,
            'number_of_sisters_married' => Auth::user()->number_of_sisters_married,

            'paternal_uncle' => Auth::user()->paternal_uncle,
            'paternal_uncle_married' => Auth::user()->paternal_uncle_married,
            'paternal_aunt' => Auth::user()->paternal_aunt,
            'paternal_aunt_married' => Auth::user()->paternal_aunt_married,
            'maternal_uncle' => Auth::user()->maternal_uncle,
            'maternal_uncle_married' => Auth::user()->maternal_uncle_married,
            'maternal_aunt' => Auth::user()->maternal_aunt,
            'maternal_aunt_married' => Auth::user()->maternal_aunt_married,

            'user_profession_type' => professionType(Auth::user()->user_profession_type),
            'user_profession_details' => Common::professionDetails(Auth::user()->user_profession_type, Auth::user()->user_profession_details),
            'user_designation' => Auth::user()->user_designation,
            'user_org_name' => Auth::user()->user_org_name,
            'user_other_profession_details' => Auth::user()->user_other_profession_details,

            'preference_min_age' => Auth::user()->preference_min_age . ' Years',
            'preference_max_age' => Auth::user()->preference_max_age . ' Years',
            'preference_marital_status' => maritalstatus(Auth::user()->preference_marital_status),
            'preference_children_allow' => Auth::user()->preference_children_allow == 1 ? 'Yes' : 'No', // baki
            'preference_height' => height(Auth::user()->preference_height),
            'preference_religion' => religion(Auth::user()->preference_religion),
            'preference_education' => implode(', ', $preferenceEducation),
            'preference_profession' => implode(', ', $preferenceProfession),
            'preference_home_district' => Common::district(Auth::user()->preference_home_district),
            'preference_living_country' => Common::country(Auth::user()->preference_living_country),
            'preference_family_resident_city' => Auth::user()->preference_family_resident_city,
            'preference_family_residential_status' => residentialStatus(Auth::user()->preference_family_residential_status),
            'preference_monthly_income' => Auth::user()->preference_monthly_income . ' Taka',
            'preference_body_type' => bodytype(Auth::user()->preference_body_type),
            'preference_skintone' => skintone(Auth::user()->preference_skintone),
            'preference_disability' => Auth::user()->preference_disability == 1 ? 'No.' : 'Yes.',
            'preference_nrb' => nrb(Auth::user()->preference_nrb),
            'preference_moreinfo' => Auth::user()->preference_moreinfo,

            'contact_name' => Auth::user()->contact_name,
            'contact_email' => Auth::user()->contact_email,
            'contact_relation' => relation(Auth::user()->contact_relation),
            'contact_timetocall' => Auth::user()->contact_timetocall,
            'contact_mobile' => Auth::user()->contact_mobile,
            'contact_present_address' => Auth::user()->contact_present_address,
            'contact_permanent_address' => Auth::user()->contact_permanent_address,

            'location_living_city' => Auth::user()->location_living_city,
            'location_living_country' => Common::country(Auth::user()->location_living_country),
            'location_growing_up_country' => Common::country(Auth::user()->location_growing_up_country),
            'location_immigration_status' => Auth::user()->location_immigration_status,
            'location_district' => Auth::user()->location_family_district > 0 ? Common::district(Auth::user()->location_district) : '',
            'location_upzila' => Common::upzila(Auth::user()->location_upzila),
            'location_family_living_country' => Auth::user()->location_family_living_country > 0 ? Common::country(Auth::user()->location_family_living_country) : '',
            'location_family_district' => Auth::user()->location_family_district > 0 ? Common::district(Auth::user()->location_family_district) : '',
            'location_family_living_area' => Auth::user()->location_family_living_area > 0 ? Auth::user()->location_family_living_area : ' - ',
            'location_family_zip' => Auth::user()->location_family_zip > 0 ? Auth::user()->location_family_zip : ' - ',
            'location_family_residential_status' => Auth::user()->location_family_residential_status > 0 ? Auth::user()->location_family_residential_status : ' - '
        ];

        return $userData;
    }

    private function fieldsName($userData)
    {
        $basicArray = [
            'regisration_as' => 'Regisration As',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Names',
            'description' => 'Description',
            'mobile' => 'Mobile No',
            'national_id' => 'national Id',
            'passport_no' => 'Passport No',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of Birth',
            'disability' => 'Disability',
            'explain_disability' => 'Explain Disability',
            'body_type' => 'Body Type',
            'skin_tone' => 'Skinb Tone',
            'blood_group' => 'Blood Group',
            'weight' => 'Weight',
            'height' => 'Height',
            'diet_type' => 'Diet Type',
            'smoke' => 'Smoke',
            'drink' => 'Drink',
            'marital_status' => 'Marital Status',
            'how_many_children' => 'How Many Children',
            'children_living_with_me' => 'Children Are Living with me',
            'sun_sign' => 'Sun Sign',
            'hobby' => 'Hobby',
            'language' => 'Mother Tougnes',
            'annual_income' => 'Annual Income',
            'religion' => 'Religion',
        ];

        $basicArray['religion'] = 'Religion';
        if (Auth::user()->religion > 0) {
            $basicArray['is_religious'] = 'Is Religious';
            if (Auth::user()->religion == 1) {
                $basicArray['says_payer'] = 'Says Payer';
            }
        }

        if (Auth::user()->gender == 2) {
            $basicArray['wear_hijab'] = 'Wear Hijab';
            $basicArray['wear_hijab_after_marriage'] = 'Wear Hijab After Marriage';
        }

        foreach ($basicArray as $key => $value) {
            $basic[$value] = $userData[$key];
        }

        $len = count($basic);

        $data['basic1'] = array_slice($basic, 0, $len / 2);
        $data['basic2'] = array_slice($basic, $len / 2);

        $fatherArray = [
            'father_name' => 'Father\'s Name',
            'father_living_status' => 'Father\'s Living Status',
            'father_service_status' => 'Father\'s Service Status',
            'father_profession' => 'Father\'s Profession',
            'father_profession_details' => 'Father\'s Profession Details',
            'father_designation' => 'Father\'s Designation',
            'father_organization_name' => 'Father\'s Organization Name',
            'father_other_profession_details' => 'Father\'s Other Profession Details',
        ];

        foreach ($fatherArray as $key => $value) {
            $father[$value] = $userData[$key];
        }
        $data['father'] = $father;

        $motherArray = [
            'mother_name' => 'Mother\'s Name',
            'mother_living_status' => 'Mother\'s Living Status',
            'mother_service_status' => 'Mother\'s Service Status',
            'mother_profession' => 'Mother\'s Profession',
            'mother_profession_details' => 'Mother\'s Profession Details',
            'mother_designation' => 'Mother\'s Designation',
            'mother_organization_name' => 'Mother\'s Organization Name',
            'mother_other_profession_details' => 'Mother\'s Other Profession Details',
        ];

        foreach ($motherArray as $key => $value) {
            $mother[$value] = $userData[$key];
        }
        $data['mother'] = $mother;

        $landArray = [
            'have_land' => 'Land',
            'land_type' => 'Land Type',
            'family_background' => 'Family Background',
        ];

        foreach ($landArray as $key => $value) {
            $land[$value] = $userData[$key];
        }
        $data['land'] = $land;

        $siblingsArray = [
            'number_of_brothers' => 'Number Of Brothers',
            'number_of_brother_married' => 'Number Of Brother Married',
            'number_of_sisters' => 'Number Of Sisters',
            'number_of_sisters_married' => 'Number Of Sisters Married',
        ];

        foreach ($siblingsArray as $key => $value) {
            $siblings[$value] = $userData[$key];
        }

        $len = count($siblings);

        $data['siblings1'] = array_slice($siblings, 0, $len / 2);
        $data['siblings2'] = array_slice($siblings, $len / 2);

        $relativesArray = [
            'paternal_uncle' => 'Number Of Paternal Uncle',
            'paternal_uncle_married' => 'Number Of Paternal Uncle Married',

            'paternal_aunt' => 'Number Of Paternal Aunt',
            'paternal_aunt_married' => 'Number Of Paternal Aunt Married',

            'maternal_uncle' => 'Number Of Maternal Uncle',
            'maternal_uncle_married' => 'Number Of Maternal Uncle Married',

            'maternal_aunt' => 'Number Of Maternal Aunt',
            'maternal_aunt_married' => 'Number Of Maternal Aunt Married',
        ];

        foreach ($relativesArray as $key => $value) {
            $relatives[$value] = $userData[$key];
        }

        $len = count($relatives);

        $data['relatives1'] = array_slice($relatives, 0, $len / 2);
        $data['relatives2'] = array_slice($relatives, $len / 2);

        $professionArray = [
            'user_profession_type' => 'Profession Type',
            'user_profession_details' => 'Profession Details',
            'user_designation' => 'Designation',
            'user_org_name' => 'Organization Name',
            'user_other_profession_details' => 'Other Profession Details',
        ];

        foreach ($professionArray as $key => $value) {
            $profession[$value] = $userData[$key];
        }

        $len = count($profession);

        $data['profession1'] = array_slice($profession, 0, $len / 2);
        $data['profession2'] = array_slice($profession, $len / 2);

        $preferenceArray = [
            'preference_min_age' => 'Minimun Age',
            'preference_max_age' => 'Maximum Age',
            'preference_marital_status' => 'Marital Status',
            'preference_children_allow' => 'Children Allow',
            'preference_height' => 'Height',
            'preference_religion' => 'Religion',
            'preference_education' => 'Education',
            'preference_profession' => 'Profession',
            'preference_home_district' => 'Home District',
            'preference_living_country' => 'Living Country',
            'preference_family_resident_city' => 'Family Resident City',
            'preference_family_residential_status' => 'Family Residential Status',
            'preference_monthly_income' => 'Monthly Income',
            'preference_body_type' => 'Body Type',
            'preference_skintone' => 'Skintone',
            'preference_disability' => 'Disability',
            'preference_nrb' => 'NRB Prefered',
            'preference_moreinfo' => 'More information',
        ];

        foreach ($preferenceArray as $key => $value) {
            $preference[$value] = $userData[$key];
        }

        $len = count($preference);

        $data['preference1'] = array_slice($preference, 0, $len / 2);
        $data['preference2'] = array_slice($preference, $len / 2);

        $contactArray = [
            'contact_name' => 'Contact Person Name',
            'contact_email' => 'Contact Person Email',
            'contact_relation' => 'Contact Person Relation',
            'contact_mobile' => 'Contact Person Mobile',
            'contact_timetocall' => 'Best Time to Call',
            'contact_present_address' => 'Contact Person Present Address',
            'contact_permanent_address' => 'Contact Person Permanent Address',
        ];

        foreach ($contactArray as $key => $value) {
            $contact[$value] = $userData[$key];
        }

        $len = count($contact);

        $data['contact1'] = array_slice($contact, 0, $len / 2);
        $data['contact2'] = array_slice($contact, $len / 2);

        $locationArray = [
            'location_growing_up_country' => 'Growing up Country',
            'location_immigration_status' => 'Immigration Status',
            'location_district' => 'District',
            'location_upzila' => 'Upzilla',
            'location_living_city' => 'City',
            'location_living_country' => 'Country',
            'location_family_residential_status' => 'Family Residential Status',
            'location_family_living_area' => 'Family Living Area',
            'location_family_district' => 'Family District',
            'location_family_zip' => 'Family Area Zip COde',
            'location_family_living_country' => 'Family Living Country',
        ];

        foreach ($locationArray as $key => $value) {
            $location[$value] = $userData[$key];
        }

        $len = count($location);

        $data['location1'] = array_slice($location, 0, $len / 2);
        $data['location2'] = array_slice($location, $len / 2);

        $data['editBasic'] = route('users.profile.basic.edit');
        $data['editParent'] = route('users.profile.parent.edit');
        $data['editProfession'] = route('users.profile.profession.edit');
        $data['editLocation'] = route('users.profile.location.edit');
        $data['editPreference'] = route('users.profile.preference.edit');
        $data['editContact'] = route('users.profile.contact.edit');

        $data['editSiblings'] = route('users.profile.siblings.edit');
        $data['addSiblings'] = route('users.profile.siblings.create');

        $data['editRelatives'] = '#'; //route('users.profile.relatives.edit');

        $data['editRelatives'] = route('users.profile.relatives.edit');
        $data['addRelatives'] = route('users.profile.relatives.create');

        $data['addEducation'] = route('users.profile.education.create');

        return $data;

    }

    private function education()
    {
        $education = DB::table('users_education')
            ->select(
                'id',
                'education_level',
                'education_area',
                'degree_name',
                'institution_name',
                'status'
            )
            ->where('userid', Auth::user()->id)
            ->orderby('education_level', 'ASC')
            ->get();

        $fieldNames = [
            'id' => 'id',
            'education_level' => 'Educaiton Level',
            'education_area' => 'Educaiton Area',
            'degree_name' => 'Degree',
            'institution_name' => 'Institution',
            'status' => 'Status',
        ];

        foreach ($education as $itemkey => $item) {

            (object) $educationArray[$itemkey] = (object) [
                'id' => $item->id,
                'delete' => route('users.profile.education.delete', $item->id),
                'education_level' => educationLevel($item->education_level),
                'education_area' => $item->education_area,
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

    private function siblings()
    {

        $siblings = DB::table('users_siblings')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->orderby('sibling_position', 'ASC')
            ->get();

        $fieldNames = [
            'id' => 'id',
            'sibling_position' => 'sibling_position',
            'gender' => 'gender',
            'living_status' => 'Living Status',
            'marital_status' => 'Marrial Status',
            'sibling_profession' => 'Profession',
            'sibling_profession_details' => 'Profession Details',
            'sibling_designation' => 'Designation',
            'sibling_organization' => 'Organization',
            'sibling_spouse_living_status' => 'Spouse Living Status',
            'sibling_spouse_profession' => 'Spouse Profession',
            'sibling_spouse_profession_details' => 'Spouse Profession Details',
            'sibling_spouse_designation' => 'Spouse Designation',
            'sibling_spouse_organization' => 'Spouse Organization',
        ];

        foreach ($siblings as $itemkey => $item) {

            (object) $siblingsArray[$itemkey] = (object) [

                'id' => $item->id,
                'delete' => route('users.profile.siblings.deleteSibling', $item->id),

                'sibling_position' => $item->sibling_position,
                'gender' => gender($item->gender),
                'living_status' => deadOrAlive($item->living_status),
                'marital_status' => $item->marital_status > 0 ? maritalstatus($item->marital_status) : '',
                'sibling_profession' => $item->sibling_profession > 0 ? professionType($item->sibling_profession) : '',
                'sibling_profession_details' => $item->sibling_profession_details > 0 ? Common::professionDetails($item->sibling_profession, $item->sibling_profession_details) : '',
                'sibling_designation' => $item->sibling_designation,
                'sibling_organization' => $item->sibling_organization,
                'sibling_spouse_living_status' => $item->sibling_spouse_living_status > 0 ? deadOrAlive($item->sibling_spouse_living_status) : '',
                'sibling_spouse_profession' => $item->sibling_spouse_profession > 0 ? professionType($item->sibling_spouse_profession) : '',
                'sibling_spouse_profession_details' => $item->sibling_spouse_profession_details > 0 ? Common::professionDetails($item->sibling_spouse_profession, $item->sibling_spouse_profession_details) : '',
                'sibling_spouse_designation' => $item->sibling_spouse_designation,
                'sibling_spouse_organization' => $item->sibling_spouse_organization,

                'edit' => '<a href="' . route('users.profile.siblings.editSibling', $item->id) . '">Edit' .
                '</a> / <a href="#siblingsDelete" type="button" data-toggle="modal" data-target="#siblingDelete' .
                $item->id . '">Delete' . '</a>',
            ];

        }

        if (isset($siblingsArray)) {
            return (object) $siblingsArray;
        }
        return false;


    }

    private function relatives()
    {
        $relatives = DB::table('users_relaives')
            ->select('*')
            ->where('userid', Auth::user()->id)
            ->get();

        $fieldNames = [
            'id' => 'id',
            'relative_side' => 'relative_side',
            'gender' => 'gender',
            'living_status' => '',
            'marital_status' => '',
            'relative_profession' => '',
            'relative_profession_details' => '',
            'relative_designation' => '',
            'relative_organization' => '',
            'relative_spouse_living_status' => '',
            'relative_spouse_profession' => '',
            'relative_spouse_profession_details' => '',
            'relative_spouse_designation' => '',
            'relative_spouse_organization' => '',
        ];

        foreach ($relatives as $itemkey => $item) {

            (object) $relativesArray[$itemkey] = (object) [

                'id' => $item->id,
                'delete' => route('users.profile.relatives.deleteRelatives', $item->id),

                'relative_side' => $item->relative_side == 1,
                'gender' => gender($item->gender),
                'living_status' => deadOrAlive($item->living_status),
                'marital_status' => $item->marital_status,
                'relative_profession' => $item->relative_profession > 0 ? professionType($item->relative_profession) : '',
                'relative_profession_details' => $item->relative_profession_details > 0 ? Common::professionDetails($item->relative_profession, $item->relative_profession_details) : '',
                'relative_designation' => $item->relative_designation,
                'relative_organization' => $item->relative_organization,
                'relative_spouse_living_status' => $item->relative_spouse_living_status > 0 ? deadOrAlive($item->relative_spouse_living_status) : '',
                'relative_spouse_profession' => $item->relative_spouse_profession > 0 ? professionType($item->relative_spouse_profession) : '',
                'relative_spouse_profession_details' => $item->relative_spouse_profession_details > 0 ? Common::professionDetails($item->relative_spouse_profession, $item->relative_spouse_profession_details) : '',
                'relative_spouse_designation' => $item->relative_spouse_designation,
                'relative_spouse_organization' => $item->relative_spouse_organization,

                'edit' => '<a href="' . route('users.profile.relatives.editRelatives', $item->id) . '">Edit' .
                '</a> / <a href="#relativeDelete" type="button" data-toggle="modal" data-target="#relativeDelete' .
                $item->id . '">Delete' . '</a>',
            ];

        }


        
        if (isset($relativesArray)) {
            return (object) $relativesArray;
        }
        return false;

    }

}
