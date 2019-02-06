<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserDirectContact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDirectContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contacts'] = UserDirectContact::join('users', 'users_contact.contact_id', '=', 'users.id')
            ->where('userid', Auth::user()->id)->get();
        $data['headline'] = 'My Contacts';
        $data['profilePicture'] = Common::userProfilePic();
        return view('users.contacts.index', $data);
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
    public function store(Request $request, $id)
    {
        $saveMessage = new UserDirectContact();
        $saveMessage->userid = Auth::user()->id;
        $saveMessage->contact_id = $id;
        $saveMessage->is_interest = 0;
        $saveMessage->is_direct = 1;
        $saveMessage->save();

        return redirect()->back()->with('success', 'The User\'s contact information added to your contact list.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['active'] = $id;
        $data['contacts'] = UserDirectContact::join('users', 'users_contact.contact_id', '=', 'users.id')
            ->where('userid', Auth::user()->id)->get();
        $data['headline'] = 'My Contacts';
        $data['profilePicture'] = Common::userProfilePic();
        $data['user'] = User::find($id);

        return view('users.contacts.index', $data);

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
