<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['story'] = DB::table('stories')
            ->select('*')
            ->paginate(12);

        $data['slide'] = DB::table('slide')
            ->select('*')
            ->paginate(12);

        // male featured
        $data['featuedProfilesMale'] = User::leftJoin('profilepic', 'profilepic.picuserid', '=', 'users.id')
            ->select('users.*', 'profilepic.id as picid', 'profilepic.extention as picext')
            ->where('users.featured', '=', '1')
            ->where('users.gender', '=', '1')
            ->orderBy('created_at', 'DESC')->paginate(6);

        // female featured
        $data['featuedProfilesFemale'] = User::leftJoin('profilepic', 'profilepic.picuserid', '=', 'users.id')
            ->select('users.*', 'profilepic.id as picid', 'profilepic.extention as picext')
            ->where('users.featured', '=', '0')
            ->where('users.gender', '=', '2')

            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        // female latest
        $data['latestProfilesFemale'] = User::leftJoin('profilepic', 'profilepic.picuserid', '=', 'users.id')
            ->select('users.*', 'profilepic.id as picid', 'profilepic.extention as picext')
            ->where('users.featured', '=', '0')
            ->where('users.gender', '=', '2')
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        // male latest
        $data['latestProfilesMale'] = User::leftJoin('profilepic', 'profilepic.picuserid', '=', 'users.id')
            ->select('users.*', 'profilepic.id as picid', 'profilepic.extention as picext')
            ->where('users.featured', '=', '0')
            ->where('users.gender', '=', '1')
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        $data['package'] = DB::table('packages')
            ->select('*')
            ->paginate(4);

        // $data['title'] = "Active Bank Acc" ;
        return view('newhome' , $data);
        //echo "OK";
    }
}
