<?php

namespace App\Http\Controllers\Signup;

use App\AdminCommon;
use App\Common;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\DefaultMail;

class SignupCompleteController extends Controller
{
    private $page = 'completed';

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (($match = Common::signupLevels(Auth::user()->completed, $this->page)) != $this->page) {
                return redirect($match);
            }
            return $next($request);
        });
    }
    public function index()
    {

        $alreadySaved = DB::table('current_package')->select('id')->where('userid', Auth::user()->id)->first();
        if ($alreadySaved) {
            return redirect()->route('users.myprofile');
        }

        // $fields = \App\Common::getTableColumn('current_package');

        $tableData = [
            'created_at' => Carbon::now()->toDateTimeString(), // Created At
            'updated_at' => Carbon::now()->toDateTimeString(), // Updated At
            'userid' => Auth::user()->id, // Userid
            'packageid' => 1, // Packageid
            'package_start_date' => Carbon::now()->toDateTimeString(), // Package Start Date
            'package_end_date' => Carbon::now()->addDays(15)->toDateTimeString(), // Package End Date

            //'package_name' => '', // Package Name - DELETE
            //'package_price' => '', // Package Price - DELETE
            //'package_nrb_price' => '', // Package Nrb Price - DELETE
            //'package_image' => '', // Package Image - DELETE

            'package_active_days' => 15, // Package Active Days
            'top_in_search' => 0, // Top In Search
            'post_photo' => 1, // Post Photo
            'direct_contact_information' => 0, // Direct Contact Information
            'privacy_set' => 0, // Privacy Set
            'send_message' => 0, // Send Message
            'daily_message' => 0, // Daily Message
            'total_interest_express' => 30, // Total Interest Express
            'daily_interest_express' => 5, // Daily Interest Express
            'interest_approve' => 15, // Interest Approve
            'total_interest_approve' => 15, // Total Interest Approve
            'daily_interest_approve' => 2, // Daily Interest Approve
            'send_profile' => 1, // Send Profile
            'add_favorite' => 10, // Add Favorite
            'most_favorite' => 0, // Most Favorite
            'block_profile' => 0, // Block Profile
            'counselling' => 0, // Counselling
        ];

        $setFreeProfile = DB::table('current_package')->insert($tableData);

        $user = User::find(Auth::user()->id);
        $user->status = 0;

        $nameOfUser = AdminCommon::whoIsUserName(Auth::user()->id);
        
        Mail::to($user->email)->send(new DefaultMail(
            'Your Profile is pending confirmation by the team.',
            'You profile is complete. Our team will review it shortly.',
            'Thank you ' . $nameOfUser . ' for completing your profile. Please be patient as our team reviews your profile. We will email you once review process is complete.<br>Thank You and Regard<br>Matrimony.'
        ));
        
        $user->save();

        Auth::logout();

        return redirect()->route('login')->with('msg', 'Your profile is completed. We are reviewing it. Once approved; we will email you.');

    }
}
