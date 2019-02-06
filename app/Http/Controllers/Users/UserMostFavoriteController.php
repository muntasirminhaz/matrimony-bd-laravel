<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserMostFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMostFavoriteController extends Controller
{
    public function index()
    {
        $data['favorites'] = UserMostFavorite::join('users', 'users_most_favorite.favorite_userid', '=', 'users.id')
        ->where('users_most_favorite.userid', Auth::user()->id)
        ->get();
        $data['headline'] = 'My Most Favorites';
        $data['profilePicture'] = Common::userProfilePic();
        return view('users.favorites.index', $data);
    }

    public function store(Request $request, $id)
    {
        $addMostFavorite = new UserMostFavorite();
        $addMostFavorite->userid = Auth::user()->id;
        $addMostFavorite->favorite_userid = $id;
        $addMostFavorite->save();
        return redirect()->back()->with('success', 'You have succesfully Added user to Most Favorites List.');
    }
}
