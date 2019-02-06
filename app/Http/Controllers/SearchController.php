<?php
namespace App\Http\Controllers;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserDirectContact;
use App\Models\UserEducation;
use App\Models\UserFavorite;
use App\Models\UserInterest;
use App\Models\UserMostFavorite;
use App\UserLimiter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request)
    {

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

        if (isset(Auth::user()->id)) {
            return view('users.search.index', $data);
        }
        return view('users.search.public', $data);
    }

    private function getData($urlQueryParam = null)
    {

        $search = DB::table('profile_search')->select('*');

        if (isset(Auth::user()->gender)) {
            $search->where('gender', $this->getBrideOrGroom(Auth::user()->gender));
        } else {
            if (isset($urlQueryParam['gender']) && $urlQueryParam['gender'] > 0 && $urlQueryParam['gender'] != '') {
                $search->where('gender', $urlQueryParam['gender']);
            } else {
                $search->whereIn('gender', [1, 2]);
            }
        }

        $fromDate = Carbon::today()->subYears(118)->toDateString();
        $toDate = Carbon::today()->subYears(18)->toDateString();

        if (isset($urlQueryParam['agemax']) && $urlQueryParam['agemax'] > 0 && $urlQueryParam['agemax'] != '') {
            $fromDate = Carbon::today()->subYears($urlQueryParam['agemax'])->toDateString();
        }
        if (isset($urlQueryParam['agemin']) && $urlQueryParam['agemin'] > 0 && $urlQueryParam['agemin'] != '') {
            $toDate = Carbon::today()->subYears($urlQueryParam['agemin'])->toDateString();
        }

        $search->whereBetween('date_of_birth', [$fromDate, $toDate]);

        if (isset($urlQueryParam['religion']) && $urlQueryParam['religion'] > 0 && $urlQueryParam['religion'] !== '') {
            if (is_array($urlQueryParam['religion'])) {
                $search->whereIn('religion', $urlQueryParam['religion']);
            }
        }

        if (isset($urlQueryParam['marital_status']) && $urlQueryParam['marital_status'] > 0 && $urlQueryParam['marital_status'] !== '') {
            if (is_array($urlQueryParam['marital_status'])) {
                $search->whereIn('marital_status', $urlQueryParam['marital_status']);
            } 
        }

        if (isset($urlQueryParam['marital_status']) && $urlQueryParam['marital_status'] > 0 && $urlQueryParam['marital_status'] !== '') {
            if (is_array($urlQueryParam['marital_status'])) {
                $search->whereIn('marital_status', $urlQueryParam['marital_status']);
            } 
        }
        if (isset($urlQueryParam['hasprofilepic']) && $urlQueryParam['hasprofilepic'] == 1 && $urlQueryParam['hasprofilepic'] !== '') {
            if (is_array($urlQueryParam['hasprofilepic'])) {
                $search->whereIn('hasprofilepic', $urlQueryParam['pic_is_profilepic']);
            } 
        }

        /*
        if (isset($urlQueryParam['education']) && $urlQueryParam['education'] > 0 && $urlQueryParam['education'] !== '') {
        $search->whereIn('education', $urlQueryParam['education']);
        // echo implode(',', $urlQueryParam['education']);
        //die();
        // $search->where('ed_level', $urlQueryParam['education']);
        }
         */

        $data = $search->paginate(10)->appends(request()->except('page'));

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
        if ($currentUserGender === 1) {
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
