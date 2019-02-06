<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserPrivacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivacyController extends Controller
{

    public function index()
    {
        $data['profilePicture'] = Common::userProfilePic();
        $privacySave = UserPrivacy::where('userid', Auth::user()->id)->first();
        if ($privacySave) {
            $data['current'] = $privacySave;
        } 
        return view('users.privacy', $data);
    }

    public function store(Request $request)
    {
        $privacySave = UserPrivacy::where('userid', Auth::user()->id)->first();
        if (!$privacySave) {
            $privacySave = new UserPrivacy;
            $privacySave->userid = Auth::user()->id;
        }

        $fields = \App\Common::getTableColumn('users_privacy', 'id,created_at,updated_at, userid');

        foreach ($fields as $value) {
            $rule[$value] = 'required|numeric';
            $message[$value . '.required'] = ucwords(str_ireplace('_', ' ', $value)) . ' is required';
            $message[$value . '.numeric'] = ucwords(str_ireplace('_', ' ', $value)) . ' is required';
            $privacySave->$value = $request->input($value);
        }
        request()->validate($rule, $message);

        $privacySave->save();

        return redirect()->route('users.privacy.index')->with('msg', 'Your privacy settings are saved!.');
    }

}
