<?php

namespace App\Http\Controllers\Users\EditProfile\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EditProfileAjax extends Controller
{
    public function district(int $divisionId)
    {

        if ($divisionId === 0) {
            echo 0;
            return;
        }

        return response()
            ->json(DB::table('districts')
                    ->select('id', 'name')
                    ->where('division_id', $divisionId)
                    ->orderby('id', 'ASC')
                    ->get());

    }

    public function upzila(int $districtId)
    {
        if ($districtId === 0) {
            echo 0;
            return;
        }
        return response()
            ->json(DB::table('upazilas')
                    ->select('id', 'name')
                    ->where('district_id', $districtId)
                    ->orderby('id', 'ASC')
                    ->get());

    }
}
