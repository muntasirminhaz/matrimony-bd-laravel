<?php
namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoriteController extends Controller
{
    public function index()
    {
        $data['favorites'] = UserFavorite::join('users', 'users_favorite.favorite_userid', '=', 'users.id')
        ->where('users_favorite.userid', Auth::user()->id)
        ->get();
        $data['headline'] = 'My Favorites';
        $data['profilePicture'] = Common::userProfilePic();
        return view('users.favorites.index', $data);
    }

    public function store(Request $request, $id)
    {
        $addFavorite = new UserFavorite();
        $addFavorite->userid = Auth::user()->id;
        $addFavorite->favorite_userid = $id;
        $addFavorite->save();
        return redirect()->back()->with('success', 'You have succesfully Added user to Favorites List.');
    }
}
