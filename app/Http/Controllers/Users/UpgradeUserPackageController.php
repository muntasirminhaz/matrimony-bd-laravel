<?php

namespace App\Http\Controllers\Users;

use App\AdminCommon;
use App\Http\Controllers\Controller;
use App\Mail\DefaultMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UpgradeUserPackageController extends Controller
{
    public function upgradeMembership(Request $request)
    {
        $validateFormData = Validator::make($request->all(),
            [
                'paymentment' => 'required|numeric',
                'transcationid' => 'required',
                'mobnum' => 'required',
            ]
        );

        if (!$validateFormData) {
            return redirect()->back()->with('msg', 'Something  went wrong, Please provide your purchase information again.');
        }

        $tableData = [
            'package_name' => $request->input('package_name'),
            'package_id' => $request->input('package_id'),
            'package_price' => $request->input('package_price'),
            'userid' => Auth::user()->id,
            'paymentmethid' => $request->input('paymentment'),
            'transactionid' => $request->input('transcationid'),
            'mobaccno' => $request->input('mobnum'),
        ];

        $insertSuccess = DB::table('purchases')->insertGetId($tableData);

        if (!$insertSuccess) {
            return redirect()->back()->with('msg', 'Something  went wrong, Please provide your purchase information again.');
        }

        $name = AdminCommon::whoIsUserName(Auth::user()->id);

        Mail::to(Auth::user()->email)->send(new DefaultMail(
            'Package purchase received ,Waiting confirmation by our team',
            'Package purchase received ,Waiting confirmation by our team',
            'Hello ' . $name . ';<br>We received your purchase information. Our team will review it shortly. Once approved; you will receive an email. Your purchase information are<br><br>' .
            'Package Name : ' . $request->input('package_name') . '<br>' .
            'Package Price : ' . $request->input('package_price') . '<br>' .
            'Payment by : ' . paymentMethods($request->input('paymentment')) . '<br>' .
            'Account / Mobile No  : ' . $request->input('mobnum') . '<br>' .
            'transaction Id : ' . $request->input('transcationid') . '<br><br>' .
            'Best Regards<br>Matrimony'
        ));

        return redirect()->route('users.myprofile')->with('msg', 'Thank you for upgrading to ' . $request->input('package_name') . ' package. It will takes one business day to confirm your upgrade. Please be patinent');

    }

}
