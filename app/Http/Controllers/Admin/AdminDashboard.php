<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;

class AdminDashboard extends Controller
{
    public function index()
    {
        $data['totalUsers'] = User::all()->count();
        $data['pendingUsers'] = User::where('status', 0)->where('completed', 100)->count();
        $data['maleUsers'] = User::where('status', 1)->where('gender', 1)->count();
        $data['femaleUsers'] = User::where('status', 1)->where('gender', 2)->count();
        $latestMembers = User::leftJoin('profilepic', 'users.id', '=', 'profilepic.picuserid')
        ->select(
            'users.*',

            'profilepic.id as picid',
            'profilepic.extention as picext'

        )
        ->where('status', 1)
        ->orderBy('created_at', 'DESC')
        ->paginate(8);

        $start = 1;
        foreach ($latestMembers as $item) {
            $user['id'] = $item->id;
            $user['photo'] = '<img src="' . url(($item->picid == '' ? ($item->gender == 1 ? '/assets/defaults/profilepic.png' : '/assets/defaults/profilepicfemale.png') : $this->userPhoto($item->id, $item->picid, $item->picext))) . '">';
            $user['name'] = $item->first_name . ' ' . ($item->middle_name != '' ? $item->middle_name . ' ' : '') . $item->last_name;
            $userData[$start] = $user;
            $start++;
        }
        $data['latestMembers'] = $userData;
        return view('admin.dashboard', $data);
    }
    private function userPhoto($userid, $id, $extention)
    {
        return "/profiles/pics/" .  $userid  . '/' . $id . '.' . $extention;
    }
}
