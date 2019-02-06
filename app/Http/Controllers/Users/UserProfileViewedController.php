<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserProfileView;
use Illuminate\Support\Facades\Auth;

class UserProfileViewedController extends Controller
{
    public function index()
    {
        $data['viewed'] = UserProfileView::where('viewed_user_id', Auth::user()->id)->paginate(24);
        $data['headline'] = 'People who viewed my profile';
        $data['profilePicture'] = Common::userProfilePic();
        return view('users.provideViewed.index', $data);
    }
}
