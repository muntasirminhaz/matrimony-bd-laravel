<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\CurrentPackage;
use Illuminate\Support\Facades\Auth;

class UserCurrentPackage extends Controller
{
    public function index()
    {
        $data['profilePicture'] = Common::userProfilePic();

        $data['package'] = CurrentPackage::where('userid', Auth::user()->id)->first();

        $data['table'] = Common::getTableColumn('current_package', 'packageid, userid,id, created_at, updated_at');

        return view('users.currentpackage', $data);

    }
}
