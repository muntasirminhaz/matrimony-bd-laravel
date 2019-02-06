<?php

namespace App;

use App\Models\CurrentPackage;
use App\Models\UserDirectContact;
use App\Models\UserFavorite;
use App\Models\UserInterest;
use App\Models\UserMessage;
use App\Models\UserMostFavorite;
//use App\Models\UserDirectContact;
use App\Models\UserPhoto;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserLimiter
{

    private static function package()
    {
        return CurrentPackage::where('userid', Auth::user()->id)->first();
    }
    private static function today()
    {
        return [Carbon::now()->startOfDay()->toDateTimeString(), Carbon::now()->endOfDay()->toDateTimeString()];
    }

    public static function messageTotal()
    {
        $limit = self::package()->send_message ?? 0;
        $soFar = UserMessage::where('sender_id', Auth::user()->id)->count() ?? 0;

        if ($soFar < $limit && $limit != 0) {
            return true;
        }
        return false;
    }

    public static function messageDaily()
    {
        if (!self::MessageTotal()) {
            return false;
        }

        $limit = self::package()->daily_message;

        $todaySoFar = UserMessage::where('sender_id', Auth::user()->id)
            ->whereBetween('created_at', self::today())
            ->count();

        if ($todaySoFar < $limit && $limit != 0) {
            return true;
        }
        return false;
    }

    public static function photo()
    {
        $userPhotos = UserPhoto::where('userid', Auth::user()->id)->count();
        if (self::package()->post_photo > $userPhotos) {
            return true;
        }
        return false;
    }

    public static function privacy()
    {
        if (isset(self::package()->privacy_set)) {
            return true;
        }
        return false;
    }

    public static function topInSearch()
    {
        if (isset(self::package()->top_in_search)) {
            return true;
        }
        return false;
    }

    public static function counselling()
    {
        if (isset(self::package()->counselling)) {
            return true;
        }
        return false;
    }

    public static function blockProfile()
    {
        if (isset(self::package()->block_profile)) {
            return true;
        }
        return false;
    }

    public static function interestApprove()
    {
        // BAKI
    }

    public static function interestExpressTotal()
    {
        $soFar = UserInterest::where('sender_id', Auth::user()->id)->count();
        if ($soFar <= self::package()->total_interest_express) {
            return true;
        }
        return false;
    }

    public static function interestExpressDaily()
    {
        if (!self::interestExpressTotal()) {
            return false;
        }
        $todaySoFar = UserInterest::where('sender_id', Auth::user()->id)
            ->whereBetween('created_at', self::today())
            ->count();
        if ($todaySoFar < self::package()->daily_interest_express) {
            return true;
        }
        return false;
    }

    public static function interestApproveTotal()
    {
        $soFar = UserInterest::where('receiver_id', Auth::user()->id)
            ->where('received_status', 1)
            ->count();
        if ($soFar < self::package()->total_interest_approve) {

            return true;
        }
        return false;
    }

    public static function interestApproveDaily()
    {
        if (!self::interestTotal()) {
            return false;
        }
        $todaySoFar = UserInterest::where('receiver_id', Auth::user()->id)
            ->where('received_status', 1)
            ->whereBetween('created_at', self::today())
            ->count();
        if ($todaySoFar < self::package()->daily_interest_approve) {
            return true;
        }
        return false;
    }

    public static function favorite()
    {
        $soFar = UserFavorite::where('userid', Auth::user()->id)->count();
        if ($soFar < self::package()->add_favorite) {

            return true;
        }
        return false;
    }

    public static function mostFavorite()
    {
        $soFar = UserMostFavorite::where('userid', Auth::user()->id)->count();
        if ($soFar < self::package()->most_favorite) {

            return true;
        }
        return false;
    }

    public static function directContactInformation()
    {
        $soFar = UserDirectContact::where('userid', Auth::user()->id)->where('is_direct', 1)->count();
        if ($soFar < self::package()->direct_contact_information) {
            return true;
        }
        return false;
    }

}
