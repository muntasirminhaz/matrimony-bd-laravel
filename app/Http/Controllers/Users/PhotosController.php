<?php

namespace App\Http\Controllers\Users;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\UserPhoto;
use App\UserLimiter;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class PhotosController extends Controller
{

    public function index()
    {

        $mypics = UserPhoto::where('userid', Auth::user()->id)->paginate(8);

        $data['myPics'] = $mypics;
        foreach ($mypics as $photo) {
            $filePath = "profiles/pics/" . Auth::user()->id .'/' . $photo->id . '.' . $photo->extention;
            $data['myPicUrl'][$photo->id] = $filePath;
        }

        $data['profilePicture'] = Common::userProfilePic();
        $data['photoLimit'] = UserLimiter::photo();

        return view('users.photos.index', $data);
    }

    public function uploadPhoto(Request $request)
    {

        $validateFormData = Validator::make($request->all(),
            ['mypic.*' => 'required |image|mimetypes:image/gif, image/png, image/jpeg, image/bmp |mimes:jpg,jpeg,png,gif']
        );

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        if (!$request->hasFile('mypic')) {
            return redirect()->back()->with('error', 'Unsupported file or No file.');
        }

        $photos = $request->file('mypic');
        $userID = Auth::user()->id;
        $allowedExtentions = ['jpg', 'jpeg', 'png'];

        $private = $request->input('private') ?? 0;

        foreach ($photos as $photo) {

            $extention = strtolower($photo->getClientOriginalExtension());

            if (!in_array($extention, $allowedExtentions)) {
                return redirect()->back()->with('error', 'Unsupported or Corrupted file.');
            }

            $tableData = [
                'userid' => $userID,
                'extention' => $extention,
                'private' => $private,
            ];

            $insertSuccess = DB::table('users_photos')->insertGetId($tableData);
            if ($insertSuccess) {
                $name = $insertSuccess . '.' . $extention;
                $destinationPath = public_path("/profiles/pics/" . $userID . '/');
                $photo->move($destinationPath, $name);
            }
        }
        $successMessage = 'Your Photo(s) are Succesfully Uploaded!';
        return redirect()
            ->route('users.photos.index')
            ->with('success', $successMessage);

    }

    public function setProfilePicture(Request $request, $pictureId)
    {
        $formPicId = $request->input('picid');
        $validateFormData = request()->validate(
            ['picid' => 'required']
        );

        if (!$validateFormData && $formPicId !== $pictureId) {
            return redirect()->back()->with('error', 'Profile picture is no changed for some reason, try again later');
        }

        $removeOld = UserPhoto::where('userid', Auth::user()->id)->update(['is_profilepic' => 0]);

        $setNewProfilePic = UserPhoto::find($formPicId);
        $setNewProfilePic->is_profilepic = 1;

        if (!$setNewProfilePic->save()) {
            return redirect()->back()->with('error', 'Profile picture is no changed for some reason, try again later');
        }

        return redirect()->route('users.photos.index')->with('success', 'Profile Picture is Saved.');

    }

    public function changeToPrivate(Request $request, $pictureId)
    {

        $formPicId = $request->input('privacypic');
        $validateFormData = request()->validate(
            ['privacypic' => 'required']);

        if (!$validateFormData && $formPicId !== $pictureId) {
            return redirect()->back()->with('error', 'Photo privacy not changed, try again later');
        }

        if (!UserPhoto::where('id', $formPicId)->update(['private' => 1])) {
            return redirect()->back()->with('error', 'Photo privacy not changed, try again later');
        }

        return redirect()->route('users.photos.index')->with('success', 'Photo is set to private.');

    }

    public function changeToPublic(Request $request, $pictureId)
    {
        $formPicId = $request->input('privacypicpublic');
        $validateFormData = request()->validate(
            ['privacypicpublic' => 'required']);

        if (!$validateFormData && $formPicId !== $pictureId) {
            return redirect()->back()->with('error', 'Photo privacy not changed, try again later');
        }

        if (!UserPhoto::where('id', $formPicId)->update(['private' => 0])) {
            return redirect()->back()->with('error', 'Photo privacy not changed, try again later');
        }

        return redirect()->route('users.photos.index')->with('success', 'Photo is set to public.');

    }

    public function deletePhoto(Request $request, $pictureId)
    {
        $formPicId = $request->input('deletepic');
        $validateFormData = request()->validate(
            ['deletepic' => 'required']);

        if (!$validateFormData && $formPicId !== $pictureId) {
            return redirect()->back()->with('error', 'Photo Not Deleted, try again later');
        }
        $userID = Auth::user()->id;

        $photoToDelete = DB::table('users_photos')
            ->select('extention')
            ->where('id', '=', $pictureId)
            ->first();

        $delete = DB::table('users_photos')
            ->where('id', '=', $pictureId)
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Photo Not Deleted, try again later');
        }

        $file_path = public_path("profiles/pics/" .  $userID  . '/' . $pictureId . '.' . $photoToDelete->extention);

        unlink($file_path);

        return redirect()->route('users.photos.index')->with('success', 'Your photo was deleted');
    }

}
