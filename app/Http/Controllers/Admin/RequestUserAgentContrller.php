<?php

namespace App\Http\Controllers\Admin;

use App\Admin\RequestUserAgent;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class RequestUserAgentContrller extends Controller
{

    public function index()
    {
        $data['agentRequests'] = RequestUserAgent::where('status', 0)->paginate(10);
        return view('admin.RequestUserAgent.index', $data);
    }

    public function requestUserAgent($userid)
    {
        $store = new RequestUserAgent();
        $store->userid = $userid;
        $store->adminid = Auth::guard('admin')->user()->id;
        $store->status = 0;
        $store->save();
        return redirect()->back()->with('success', 'Your request has been received and pending admin verification.');
    }

    public function approve($id)
    {
        $approve = RequestUserAgent::find($id);
        $updateAgent = User::find($approve->userid);
        $updateAgent->agent = $approve->adminid;

        $approve->status = 1;

        $approve->save();
        $updateAgent->save();

        return redirect()->back()->with('message', 'The agent request was Approved.');

    }
    public function disapprove($id)
    {
        $disapprove = RequestUserAgent::find($id);
        $disapprove->delete();
        return redirect()->back()->with('message', 'The agent request was disapproved.');
    }
}
