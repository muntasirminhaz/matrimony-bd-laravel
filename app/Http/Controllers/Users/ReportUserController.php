<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportUserController extends Controller
{
    public function report(Request $request, $reportedUser)
    {
        $report = new UserReport();
        $report->reported_by = Auth::user()->id;
        $report->reported_user = $reportedUser;
        $report->report_message = $request->input('reportmessage');
        $report->save();
        return redirect()->back()->with('success', 'Thank you. We have received your report.');
    }
}
