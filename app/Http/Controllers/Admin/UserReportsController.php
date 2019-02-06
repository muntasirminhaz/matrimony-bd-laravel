<?php

namespace App\Http\Controllers\Admin;

use App\AdminCommon;
use App\Admin\AdminUserReport;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserReportsController extends Controller
{

    public function index()
    {
        $check = AdminUserReport::where('status', 0)->count();

        if ($check > 0) {
            $data['tableData'] = AdminUserReport::where('status', 0)->paginate(10);

            foreach ($data['tableData'] as $item) {
                $arr['id'] = $item->id;
                $arr['reported_by'] = $item->reported_by;
                $arr['reported_user'] = $item->reported_user;
                $arr['reported_by_name'] = AdminCommon::whoIsUserName($item->reported_by);
                $arr['reported_user_name'] = AdminCommon::whoIsUserName($item->reported_user);
                $arr['report_message'] = $item->report_message;
                $reports[] = $arr;
            }
            $data['reports'] = $reports;
            return view('admin.userReports.index', $data);

        } else {
            $data['tableData'] = AdminUserReport::where('status', 0)->paginate(10);
            return view('admin.userReports.index', $data);
        }

    }

    public function checked($id)
    {
        $status = AdminUserReport::find($id);
        $status->status = 1;
        $status->checked_by_admin = Auth::guard('admin')->user()->id;
        $status->save();
        return redirect()->route('admin.userReports.index')->with('success', 'reported is marked as checked and done.');

    }
}
