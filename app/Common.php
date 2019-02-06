<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Common
{
    public static function getAge($date)
    {

        return \Carbon\Carbon::parse($date)->age;

    }
    public static function userProfilePic()
    {

        /*
        - put profile pic on store
        -  user table picid  + pic ext
         */
        $profilePhoto = DB::table('users_photos')
            ->select('*')
            ->where([
                ['userid', Auth::user()->id],
                ['is_profilepic', 1],
            ])
            ->first();

        if (!$profilePhoto) {

            return "/assets/defaults/profilepic.png";
        }
        return "/profiles/pics/" . Auth::user()->id . '/' . $profilePhoto->id . '.' . $profilePhoto->extention;

    }

    public static function whoIsUserName($userid)
    {
        $user = User::find($userid);
        if($user){
            return $user->first_name . ' ' . ($user->middle_name != '' ? $user->middle_name . ' ' : '') . $user->last_name;
        }
return ' - ';

    }

    public static function getUserProfilePic($userId)
    {

        /*
        - put profile pic on store
        -  user table picid  + pic ext
         */
        $profilePhoto = DB::table('users_photos')
            ->select('*')
            ->where([
                ['userid', $userId],
                ['is_profilepic', 1],
            ])
            ->first();

        if (!$profilePhoto) {
            $user = User::find($userId);
            if ($user->gender == 2) {
                return "/assets/defaults/profilepicfemale.png";
            }
            return "/assets/defaults/profilepic.png";
        }

        return "/profiles/pics/" . $userId . '/' . $profilePhoto->id . '.' . $profilePhoto->extention;

    }

    public static function getUserUrl($userId)
    {
        $user = User::find($userId);
        if(!$user){
            return '#';
        }
        $name = strtolower(str_ireplace(' ', '-', $user->first_name . ' ' . ($user->middle_name != '' ? $user->middle_name . ' ' : '') . $user->last_name));
        return route('profile.index', [$name, $userId]);       

    }

    public static function profileEditSidebar()
    {

        $menus = [
            // url => [route => name]
            'account' => ['users.editprofile.account.view' => 'General Information'],
            'address' => ['users.editprofile.address.index' => 'Address Information'],
            'education' => ['users.editprofile.education.view' => 'Educational Information'],

            'personal' => ['users.editprofile.personal.view' => 'Personal Information'],
            'parents' => ['users.editprofile.parents.view' => 'Parents Information'],
            'siblings' => ['users.editprofile.siblings.view' => 'Siblings Information'],
            'relatives' => ['users.editprofile.relatives.view' => 'Relatives Information'],
            'profession' => ['users.editprofile.profession.view' => 'Profession Information'],

            'partner-preference' => ['users.editprofile.partner.index' => 'Partner Preference Information'],

        ];
        return $menus;

    }

    public static function divison($id = false)
    {

        if (!$id) {
            return DB::table('divisions')
                ->select('*')
                ->get();
        }
        return (DB::table('divisions')
                ->select('name')
                ->where('id', $id)
                ->first())->name;
    }

    public static function district($id = false)
    {
        if (!$id) {
            return DB::table('districts')
                ->select('*')
                ->get();
        }
        return (DB::table('districts')
                ->select('name')
                ->where('id', $id)
                ->first())->name;
    }

    public static function upzila($id = false)
    {
        if (!$id) {
            return DB::table('upazilas')
                ->select('*')
                ->get();
        }
        return (DB::table('upazilas')
                ->select('name')
                ->where('id', $id)
                ->first())->name;
    }

    public static function country($id = false)
    {
        if (!$id) {
            return DB::table('countries')
                ->select('*')
                ->get();
        }
        return (DB::table('countries')
                ->select('name')
                ->where('id', $id)
                ->first())->name;
    }

    public static function signupLevels($levelNumber = null, $levelName = null)
    {
        $arr = [
            20 => ['contact', route('signup.contact')], // js validation
            25 => ['location', route('signup.location')], // js validation
            35 => ['basic', route('signup.basic')], // js validation
            43 => ['education', route('signup.education')], // js validation
            49 => ['profession', route('signup.profession')], //
            55 => ['parents', route('signup.parents')], //
            65 => ['siblings', route('signup.siblings')],
            75 => ['relatives', route('signup.relatives')],
            85 => ['preference', route('signup.preference')],
            100 => ['completed', route('signup.profileComplete')],
        ];

        if ($levelNumber == null) {
            return $arr;
        }

        if (isset($levelName) && $levelName === $arr[$levelNumber][0]) {
            return $arr[$levelNumber][0];
        }
        return $arr[$levelNumber][1];

    }

    public static function updateSignupLevelAndRedirect($currentLevelName)
    {

        $array = self::signupLevels();
        $currentLevelIndex = self::getIndex($currentLevelName, $array);

        if ($currentLevelIndex === 100) {
            $nextLevel = $currentLevelIndex;
        } else {
            $nextLevel = self::getNextKey($currentLevelIndex, $array);
        }

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['completed' => $nextLevel]);

        return $array[$nextLevel][1];

    }

    private static function getIndex($name, $array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value) && $value[0] == $name) {
                return $key;
            }

        }
        return null;
    }

    private static function getNextKey($key, $array)
    {

        $keys = array_keys($array);
        $found_index = array_search($key, $keys);

        return $keys[$found_index + 1];
    }

    public static function UpdateUserTable($tableData, $successMessage = 'Changes are Saved Successfully.')
    {
        $update = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->withErrors($request->all());
        }

        return redirect()->route('users.myprofile')->with('success', $successMessage);
    }

    public static function professionDetails($professionType, $professionDetailsType)
    {

        if ($professionType == 0 && $professionDetailsType == 0) {
            return '';
        }

        // show details 1 2 5 6 9 10
        if ($professionType == 1) {
            // BCS
            return professionTypeBCS($professionDetailsType);
        }
        if ($professionType == 2) {
            // Govt
            return professionTypeGovGrade($professionDetailsType);

        }
        if ($professionType == 5) {
            // Bank
            return professionTypeBank($professionDetailsType);

        }
        if ($professionType == 6) {
            // teacher
            return professionTypeTeacher($professionDetailsType);

        }
        if ($professionType == 9) {
            // lawyer
            return professionTypeLawyer($professionDetailsType);

        }
        if ($professionType == 10) {
            // defence
            return professionTypeDefense($professionDetailsType);

        }
        // no details  3 4 7 8 11 12 13 14 15

        if ($professionType == 3) {
            return '';
        }
        if ($professionType == 4) {
            return '';
        }
        if ($professionType == 7) {
            return '';
        }
        if ($professionType == 8) {
            return '';
        }
        if ($professionType == 11) {
            return '';
        }
        if ($professionType == 12) {
            return '';
        }
        if ($professionType == 13) {
            return '';
        }
        if ($professionType == 14) {
            return '';
        }
        if ($professionType == 15) {
            return '';
        }
    }

    public static function UserReligion($userReligion)
    {
        // first get religion

        if ($userReligion == 0) {
            return '-';
        }

        $message = religion($userReligion);

        if ($userReligion == 1) {

        }

        return $message;

    }
    public static function UserReligionSect($userReligion, $userReligionSect)
    {
        // first get religion

        if ($userReligion == 0 && $userReligionSect == 0) {
            return '-';
        }

        if ($userReligion == 1) {
            return subIslam();
        }
        if ($userReligion == 2) {
            return subHindu();
        }
        if ($userReligion == 3) {
            return subBuddhism();
        }
        if ($userReligion == 4) {
            return subChrist();
        }

        return $message;

    }

    public static function getTableColumn($tableName, $unsetFileds = null)
    {
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing($tableName); // users table
        if ($unsetFileds) {
            $count = count($columns);
            $unsetFileds = str_ireplace(' ', '', $unsetFileds);
            $unset = explode(',', $unsetFileds);
            return array_diff($columns, $unset);
        }
        return $columns;
    }

    public static function routes($routePrefix)
    {
        $data['routeIndex'] = $routePrefix . 'index';
        $data['routeShow'] = $routePrefix . 'show';
        $data['routeEdit'] = $routePrefix . 'edit';
        $data['routeDestroy'] = $routePrefix . 'destroy';

        return $data;
    }

}
