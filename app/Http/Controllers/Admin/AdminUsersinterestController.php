<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserInterest;
use Illuminate\Support\Facades\Auth;
use App\Common;

class AdminUsersinterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $data['interests'] = UserInterest::join('users', 'users_interests.receiver_id', '=', 'users.id')        
        ->select('users.*', 'users_interests.*')
        ->where('users_interests.sender_id',$id)
        ->get();

        $data['expressedInterests'] = UserInterest::join('users', 'users_interests.sender_id', '=', 'users.id')        
        ->select('users.*', 'users_interests.*')
        ->where('users_interests.receiver_id',$id)
        ->get();
             
        $data['headline'] = 'My Interests';

        return view('admin.userinterests.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function accepted($id)
    {
        $accept = UserInterest::find($id);
        $accept->received_status = 1;
        $accept->save();
        return redirect()->back()->with('success', 'Interest is accepted.');
    }
    public function rejected($id)
    {
        UserInterest::find($id)->delete();
        return redirect()->back()->with('success', 'Interest is rejected.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        request()->validate(
            [
                'messageid' => 'required',
            ]
        );

        $expressInterest = new UserInterest();
        $expressInterest->sender_id = Auth::user()->id;
        $expressInterest->receiver_id = $id;
        $expressInterest->received_status = 0;
        $expressInterest->save();

        return redirect()->back()->with('success', 'You have succesfully Expressed Interest.');
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
