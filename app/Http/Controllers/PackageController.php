<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        if (!isset(Auth::user()->id)) {

        } else {
            $data['profilePicture'] = \App\Common::userProfilePic();
        }

        $data['packages'] = DB::table('packages')
            ->select('*')
            ->where('id','<>', 1)
            ->get();

        $data['package'] = DB::table('packages')
            ->select('*')
            ->where('package_name', 'elite')
            ->first();

        $data['freePackage'] = DB::table('packages')
            ->select('*')
            ->where('id', 1)
            ->first();

            $data['firstPackage'] = (DB::table('packages')
            ->select('*')
            ->where('package_name', 'elite')
            ->first())->id;

        return view('packages.index', $data);
    }

    public function showPackage(Request $request, $packageId)
    {

        $data['package'] = DB::table('packages')
            ->select('*')
            ->where('id', $packageId)
            ->first();
        $data['freePackage'] = DB::table('packages')
            ->select('*')
            ->where('id', 1)
            ->first();

        $packageInfo = view('packages.infoTable', $data)->render();
        return $packageInfo;
    }

}
