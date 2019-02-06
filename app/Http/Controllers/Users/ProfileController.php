<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserDirectContact;
use App\Models\UserFavorite;
use App\Models\UserInterest;
use App\Models\UserMostFavorite;
use App\Models\UserProfileView;
use App\PrivacyChecker;
use App\UserLimiter;
use Illuminate\Foundation\Auth\User;

class ProfileController extends Controller
{
    public function index()
    {

        // Data to show

        /**
         * User's Data Containing
         * Basic Info
         * NRB
         * religion and others
         * religious activies of Muslims
         * parents information
         * Location
         * Brother and Sister
         * Family Background
         * More About Family
         */
        $id = Auth::user()->id;
        $user = User::find($id);
        $data['user'] = $user;

        if (!$data['user']) {
            echo '404';
            return;
        }

        // User's Ptoto
        $profilePic = DB::Table('users_photos')
            ->select(
                'id as picid',
                'extention as picext'
            )
            ->where('userid', $id)
            ->where('is_profilepic', 2)
            ->first();

        $data['photo'] = ($profilePic == '' ? ($user->gender == 1 ? '/assets/defaults/profilepic.png' : '/assets/defaults/profilepicfemale.png') : $this->userPhoto($profilePic->id, $profilePic->picid, $profilePic->picext));

        // User's Education
        $data['education'] = DB::Table('users_education')
            ->select('*')
            ->where('userid', $id)
            ->orderBy('education_level', 'ASC')
            ->first();

        // User's rother and Sister
        if ($user->number_of_sisters > 0 || $user->number_of_brothers > 0) {
            $data['siblings'] = DB::Table('users_siblings')
                ->select('*')
                ->where('userid', $id)
                ->orderBy('sibling_profession', 'ASC')
                ->get();
        }

        if (isset(Auth::user()->id)) {
            // For Limiting features -start
            $data['limitMessage'] = UserLimiter::messageDaily();
            $data['limitInterest'] = UserLimiter::interestExpressDaily();
            $data['alreadyInterestExpressed'] = UserInterest::where('receiver_id', $data['user']->id)->where('sender_id', Auth::user()->id)->count();
            $data['limitFavorite'] = UserLimiter::favorite();
            $data['alreadyFavorite'] = UserFavorite::where('favorite_userid', $data['user']->id)->where('userid', Auth::user()->id)->count();
            $data['limitMostFavorite'] = UserLimiter::mostFavorite();
            $data['alreadyMostFavorite'] = UserMostFavorite::where('favorite_userid', $data['user']->id)->where('userid', Auth::user()->id)->count();
            $data['limitContact'] = UserLimiter::directContactInformation();
            $data['alreadyContactAdded'] = UserDirectContact::where('contact_id', $data['user']->id)->where('userid', Auth::user()->id)->count();
            $data['profilePicture'] = Common::userProfilePic();
            // For Limiting features -end

            // user Profile viewed, update number
            if (PrivacyChecker::visitors_settings()) {
                $arr = ['userid' => Auth::user()->id, 'viewed_user_id' => $id];
                UserProfileView::updateOrCreate($arr, $arr);
            }

            // private view
            return view('profilePage.private', $data);

        } else {
            // public view
            return view('profilePage.public', $data);
        }

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
            $allPhotos[] = "/profiles/pics/" . $userid . '/' . $photo->id . '.' . $photo->extention;
        }

        return $allPhotos;
    }

}
