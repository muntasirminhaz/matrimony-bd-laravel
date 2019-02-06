<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AdminCommon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserAgentContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setUserAgent($id = false)
    {
        $data['userid'] = $data['agentid'] = $data['agentName'] = 0;

        if ($id) {
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()->with('error', 'invalid user id');
            }
            $data['userid'] = $id;
            $data['userName'] = $user->first_name . ' ' . ($user->middle_name != '' ? $user->middle_name . ' ' : '') . $user->last_name;
            if ($user->agent > 0) {
                $data['agentid'] = $user->agent;
                $data['agentName'] = AdminCommon::whoIsAgent($user->agent);
            }
        }

        $data['agents'] = Admin::all();

        return view('admin.setUserAgent.setUserAgent', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setUserAgentSubmit(Request $request)
    {
        request()->validate(
            [
                'userid' => 'required|numeric',
                'agentid' => 'required|numeric',
            ]
        );

        $user = User::find($request->input('userid'));
        if (!$user) {
            return redirect()->back()->with('error', 'invalid user id');
        }
        $userName = $user->first_name . ' ' . ($user->middle_name != '' ? $user->middle_name . ' ' : '') . $user->last_name;

        $admin = Admin::find($request->input('agentid'));
        if (!$admin) {
            return redirect()->back()->with('error', 'invalid agent selected');
        }

        $user->agent = $request->input('agentid');
        if(!$user->save()){
            return redirect()->back()->with('error', 'Changes not saved. Please try again');
        }
        return redirect()->route('admin.users.show', $request->input('userid'))->with('success', $userName . ' is assignd to ' . $admin->name . '.');

    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
