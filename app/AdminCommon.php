<?php

namespace App;

use App\Admin\Admin;
use App\User;
use App\Admin\RequestUserAgent;

class AdminCommon
{

    public static function allRoutes($routePrefix)
    {
        $data['routeIndex'] = $routePrefix . 'index';
        $data['routeCreate'] = $routePrefix . 'create';
        $data['routeShow'] = $routePrefix . 'show';
        $data['routeEdit'] = $routePrefix . 'edit';
        $data['routeDestroy'] = $routePrefix . 'destroy';
        $data['routeUpdate'] = $routePrefix . 'update';

        return $data;
    }
    public static function whoIsAgent($agentId)
    {
        if ($agentId == 0) {
            return ' - ';
        }

        $agent = Admin::find($agentId);
        return $agent->name;
    }

    public static function whoIsUserName($userid)
    {
        $user = User::find($userid);

        return $user->first_name . ' ' . ($user->middle_name != '' ? $user->middle_name . ' ' : '') . $user->last_name;

    }
    public static function whoIsUserId($userid)
    {
        $user = User::find($userid);
        return $user->id;
    }
    public static function AgentRequested($userid)
    {
        $count = RequestUserAgent::where('userid', $userid)->count();
        if($count == 0){
            return false;
        }
        return true;
    }

}
