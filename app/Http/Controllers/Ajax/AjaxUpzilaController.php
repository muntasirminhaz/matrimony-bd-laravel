<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxUpzilaController extends Controller
{
    public function index(Request $request)
    {
        return response()
            ->json(DB::table('upazilas')
                    ->select('id', 'name')
                    ->where('district_id', $request->districtid)
                    ->orderby('id', 'ASC')
                    ->get());
    }
}
