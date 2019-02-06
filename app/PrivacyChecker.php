<?php

namespace App;

use App\Models\UserPrivacy;
use Illuminate\Support\Facades\Auth;

class PrivacyChecker
{
    private static function hasPrivacy()
    {
        if (isset(Auth::user()->id) && UserPrivacy::where('userid', Auth::user()->id)->count() == 1) {
            return UserPrivacy::where('userid', Auth::user()->id)->first();
        }
        return false;
    }

    public static function display_name()
    {

        return true;
        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        $privacy = self::hasPrivacy();

    }

    public static function phone()
    {

        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        if ($privacy->phone == 0) {
            return false;
        }
        return true;
    }

    public static function income()
    {
        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        if ($privacy->income == 0) {
            return false;
        }
        return true;
    }

    public static function visitors_settings()
    {
        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        if ($privacy->visitors_settings == 1) {
            return false;
        }
        return true;
    }

    public static function short_list()
    {

        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        if ($privacy->short_list == 0) {
            return false;
        }
        return true;

    }

    public static function dont_distrub()
    {

        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        if ($privacy->dont_distrub == 0) {
            return false;
        }
        return true;

    }

    public static function profile_privacy()
    {

        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        if ($privacy->profile_privacy == 0) {
            return false;
        }
        return true;

    }

    public static function web_notifications()
    {

        $privacy = self::hasPrivacy();
        if (!$privacy) {
            return false;
        }
        if ($privacy->web_notifications == 0) {
            return false;
        }
        return true;
    }

}
