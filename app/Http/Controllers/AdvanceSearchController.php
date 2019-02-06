<?php

namespace App\Http\Controllers;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserDirectContact;
use App\Models\UserFavorite;
use App\Models\UserInterest;
use App\Models\UserMostFavorite;
use App\UserLimiter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\UserEducation;

class AdvanceSearchController extends Controller
{

    public function showForm()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $data['countries'] = Common::country();
        $data['districts'] = Common::district();

        return view('users.advanceSearch.searchForm', $data);
    }

    public function showResults(Request $request)
    {

       /*  echo '<pre>';

        foreach ($request->query() as $key => $value) {

            echo '<br>';
            echo 'if (isset($urlQueryParam[\'' . $key . '\']) && $urlQueryParam[\'' . $key . '\'] > 0 && $urlQueryParam[\'' . $key . '\'] !== \'\') {';
            echo '<br>';
            echo '$search->whereIn(\'' . $key . '\', $urlQueryParam[\'' . $key . '\']);';
            echo '<br>';
            echo '}';
            echo '<br>';
            echo '<br>';

        }
        die();
        */
        if (!empty($request->query())) {
            $data['rawData'] = $this->getData($request->query());
            $data['allowRest'] = true;
        } else {
            $data['rawData'] = $this->getData();
        }

        if (!isset(Auth::user()->gender)) {
            $data['showGender'] = true;
        } else {
            $data['profilePicture'] = Common::userProfilePic();
        }

        $users = $this->userData($data['rawData']);
        if ($users !== false) {
            $data['users'] = $users;
        }

        return view('users.advanceSearch.searchResult', $data);

    }

    private function getData($urlQueryParam = null)
    {

        $search = DB::table('profile_search')->select('*');

        // Default
        $search->where('gender', $this->getBrideOrGroom(Auth::user()->gender));

        // Age between

        $fromDate = Carbon::today()->subYears(118)->toDateString();
        $toDate = Carbon::today()->subYears(18)->toDateString();

        if (isset($urlQueryParam['agemax']) && $urlQueryParam['agemax'] > 0 && $urlQueryParam['agemax'] != '') {
            $fromDate = Carbon::today()->subYears($urlQueryParam['agemax'])->toDateString();
        }
        if (isset($urlQueryParam['agemin']) && $urlQueryParam['agemin'] > 0 && $urlQueryParam['agemin'] != '') {
            $toDate = Carbon::today()->subYears($urlQueryParam['agemin'])->toDateString();
        }

        $search->whereBetween('date_of_birth', [$fromDate, $toDate]);

        // Profile created from/after/before(time range)

        // Religion

        if (isset($urlQueryParam['religion']) && $urlQueryParam['religion'] > 0 && $urlQueryParam['religion'] !== '') {
            $search->whereIn('religion', $urlQueryParam['religion']);
        }

        // Marital Status

        if (isset($urlQueryParam['mstatus']) && $urlQueryParam['mstatus'] > 0 && $urlQueryParam['mstatus'] !== '') {
            $search->whereIn('marital_status', $urlQueryParam['mstatus']);
        }

        // Children allow

        if (isset($urlQueryParam['childallow']) && $urlQueryParam['childallow'] > 0 && $urlQueryParam['childallow'] !== '') {
            $search->where('preference_children_allow', $urlQueryParam['childallow']);
        }

        // Height

        if (isset($urlQueryParam['height']) && $urlQueryParam['height'] > 0 && $urlQueryParam['height'] !== '') {
            $search->whereIn('height', $urlQueryParam['height']);
        }

        // Education

        if (isset($urlQueryParam['education']) && $urlQueryParam['education'] > 0 && $urlQueryParam['education'] !== '') {
            $search->whereIn('ed_level', $urlQueryParam['education']);
        }

        // Education Area

        // Profession

        if (isset($urlQueryParam['profession']) && $urlQueryParam['profession'] > 0 && $urlQueryParam['profession'] !== '') {
            $search->whereIn('profession', $urlQueryParam['profession']);
        }

        // Body Type

        if (isset($urlQueryParam['bodytype']) && $urlQueryParam['bodytype'] > 0 && $urlQueryParam['bodytype'] !== '') {
            $search->whereIn('body_type', $urlQueryParam['bodytype']);
        }

        // Complexion

        if (isset($urlQueryParam['skintone']) && $urlQueryParam['skintone'] > 0 && $urlQueryParam['skintone'] !== '') {
            $search->whereIn('skin_tone', $urlQueryParam['skintone']);
        }

        // Diet

        if (isset($urlQueryParam['diet']) && $urlQueryParam['diet'] > 0 && $urlQueryParam['diet'] !== '') {
            $search->whereIn('diet', $urlQueryParam['diet']);
        }

        // Drink

        if (isset($urlQueryParam['drinks']) && $urlQueryParam['drinks'] > 0 && $urlQueryParam['drinks'] !== '') {
            $search->where('drinks', $urlQueryParam['drinks']);
        }

        // Smoke

        if (isset($urlQueryParam['smoke']) && $urlQueryParam['smoke'] > 0 && $urlQueryParam['smoke'] !== '') {
            $search->where('smoke', $urlQueryParam['smoke']);
        }

        // Sunsign

        if (isset($urlQueryParam['sunsign']) && $urlQueryParam['sunsign'] > 0 && $urlQueryParam['sunsign'] !== '') {
            $search->whereIn('sunsign', $urlQueryParam['sunsign']);
        }

        // Expected home district

        if (isset($urlQueryParam['districts']) && $urlQueryParam['districts'] > 0 && $urlQueryParam['districts'] !== '') {
            $search->whereIn('location_district', $urlQueryParam['districts']);
        }

        // Expected Family residence

        // Expected Living city/area

        // Expected Residential status

        if (isset($urlQueryParam['familyresidentstatus']) && $urlQueryParam['familyresidentstatus'] > 0 && $urlQueryParam['familyresidentstatus'] !== '') {
            $search->whereIn('location_family_residential_status', $urlQueryParam['familyresidentstatus']);
        }

        // NRB/Migrant  acceptable from (country name)

        if (isset($urlQueryParam['nrb']) && $urlQueryParam['nrb'] > 0 && $urlQueryParam['nrb'] !== '') {
            $search->where('preference_nrb', $urlQueryParam['nrb']);
        }

        // Living country

        if (isset($urlQueryParam['living_country']) && $urlQueryParam['living_country'] > 0 && $urlQueryParam['living_country'] !== '') {
            $search->whereIn('location_living_country', $urlQueryParam['living_country']);
        }

        // Not willing to marry from(district name)

        // Personal Values

        // Family Values

        // Monthly income

        if (isset($urlQueryParam['income']) && $urlQueryParam['income'] > 0 && $urlQueryParam['income'] !== '') {
            $search->where('income', $urlQueryParam['income']);
        }

        // Disability allow

        if (isset($urlQueryParam['disability']) && $urlQueryParam['disability'] > 0 && $urlQueryParam['disability'] !== '') {
            $search->where('disability', $urlQueryParam['disability']);
        }

        // Mother Tongue

        if (isset($urlQueryParam['language']) && $urlQueryParam['language'] > 0 && $urlQueryParam['language'] !== '') {
            $search->whereIn('language', $urlQueryParam['language']);
        }

        if (Auth::user()->gender == 1) {
            if (isset($urlQueryParam['says_payer']) && $urlQueryParam['says_payer'] > 0 && $urlQueryParam['says_payer'] !== '') {
                $search->where('says_payer', $urlQueryParam['says_payer']);
            }
            if (Auth::user()->religion == 1) {
                if (isset($urlQueryParam['wear_hijab']) && $urlQueryParam['wear_hijab'] > 0 && $urlQueryParam['wear_hijab'] !== '') {
                    $search->where('wear_hijab', $urlQueryParam['wear_hijab']);
                }
                if (isset($urlQueryParam['wear_hijab_after_marriage']) && $urlQueryParam['wear_hijab_after_marriage'] > 0 && $urlQueryParam['wear_hijab_after_marriage'] !== '') {
                    $search->where('wear_hijab_after_marriage', $urlQueryParam['wear_hijab_after_marriage']);
                }
            }
        }


        $data = $search->paginate(5)->appends(request()->except('page'));

        return $data;
    }

    private function userData($userData)
    {

        foreach ($userData as $item) {
            /**
             * if ($item->pic_is_profilepic == 1) {
             * $photo = $this->userPhoto($item->id, $item->pic_id, $item->pic_ext);
             * } else {
             * $photo = ($item->gender == 1 ? '/assets/defaults/profilepic.png' : '/assets/defaults/profilepicfemale.png');
             * }
             */
            $temp['id'] = $item->id;
            $temp['name'] = $item->first_name . ' ' . ($item->middle_name != '' ? $item->middle_name . ' ' : '') . $item->last_name;
            $temp['age'] = Carbon::parse($item->date_of_birth)->age . ' yrs. ';
            $temp['religion'] = religion($item->religion) . '.';
            $temp['language'] = $item->language . '.';
            $temp['marital_status'] = $item->marital_status . '.';
            $temp['gender'] = gender($item->gender) . '.';
            $temp['photo'] = Common::getUserProfilePic($item->id);
            $temp['height'] = height($item->height) . ' Feet.';

            $edu = UserEducation::where('userid', $item->id)->orderBy('education_level', 'ASC');
            if ($edu->count() == 0) {
                $temp['education'] = ' N/A';
            } else {
                $edu = $edu->first();
                $temp['education'] = educationLevel(($edu->education_level)) . '.'; //  .' - ' . educationArea($edu->education_area);
            }

            if (isset($item->user_profession_type) && $item->user_profession_type > 0) {
                $temp['profession'] = professionType($item->user_profession_type) . '.';
            } else {
                $temp['profession'] = ' N/A .';
            }

            if ($item->location_living_country > 0) {
                if ($item->location_living_country == 1) {
                    $temp['city'] = $item->location_living_city;

                    if ($item->location_upzila > 0) {
                        $temp['city'] .= ', ' . Common::upzila($item->location_upzila);

                    }
                    if ($item->location_district > 0) {
                        $temp['city'] .= ', ' . Common::district($item->location_district);
                    }
                    $temp['city'] .= '.';
                } else {
                    $temp['city'] = $item->location_living_city . ', ' . Common::country($item->location_living_country) . '.';
                }

            } else {
                $temp['city'] = '  N/A ';

            }

            $temp['profileSlug'] = route('profile.index', [strtolower(str_ireplace(' ', '-', $temp['name'])), $item->id]);
            if (isset(Auth::user()->id)) {
                $temp['button'] = $this->buttons($item, $item->id);
            }

            $getUsers[$item->id] = (object) $temp;

        }

        if (isset($getUsers)) {
            return (object) $getUsers;
        }
        return false;
    }

    private function userPhoto($userid, $id, $extention)
    {
        return "/profiles/pics/" . $userid . '/' . $id . '.' . $extention;
    }

    private function getBrideOrGroom(int $currentUserGender)
    {
        if ($currentUserGender == 1) {
            return 2;
        }
        return 1;
    }

    private function buttons($user, $userIdOfGuy)
    {

        $data['user'] = $user;
        $data['limitMessage'] = UserLimiter::messageDaily();
        $data['limitInterest'] = UserLimiter::interestExpressDaily();
        $data['alreadyInterestExpressed'] = UserInterest::where('receiver_id', $userIdOfGuy)->where('sender_id', Auth::user()->id)->count();
        $data['limitFavorite'] = UserLimiter::favorite();
        $data['alreadyFavorite'] = UserFavorite::where('favorite_userid', $userIdOfGuy)->where('userid', Auth::user()->id)->count();
        $data['limitMostFavorite'] = UserLimiter::mostFavorite();
        $data['alreadyMostFavorite'] = UserMostFavorite::where('favorite_userid', $userIdOfGuy)->where('userid', Auth::user()->id)->count();
        $data['limitContact'] = UserLimiter::directContactInformation();
        $data['alreadyContactAdded'] = UserDirectContact::where('contact_id', $userIdOfGuy)->where('userid', Auth::user()->id)->count();

        $view = view('users.search.button', $data);

        return $view;

    }

}
