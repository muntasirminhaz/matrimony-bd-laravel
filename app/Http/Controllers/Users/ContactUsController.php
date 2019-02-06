<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Common;

class ContactUsController extends Controller
{

    public function index()
    {
        $data = [];
        if(isset(Auth::user()->id)){
        $data['profilePicture'] = Common::userProfilePic();
        }
        return view('users.contactus.index', $data);

    }

    public function store(Request $request)
    {
        $store = new ContactUs();
        $store->name = $request->input('myname');
        $store->email = $request->input('myemail');
        $store->message = $request->input('mymessage');
        $store->save();

        return redirect()->back()->with('success', 'We received you message. Our team will reply to your message soon. Thank you.');
    }

}
