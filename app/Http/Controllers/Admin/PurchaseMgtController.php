<?php

namespace App\Http\Controllers\Admin;

use App\AdminCommon;
use App\Admin\Package;
use App\Admin\Purchase;
use App\Http\Controllers\Controller;
use App\Mail\DefaultMail;
use App\Models\CurrentPackage;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PurchaseMgtController extends Controller
{

    private $routePrefix = 'admin.purchaseMgt.';

    public function index(Request $request)
    {
        $data = AdminCommon::allRoutes($this->routePrefix);

        $purchases = Purchase::select('purchases.*', 'users.first_name', 'users.middle_name', 'users.last_name')
            ->join('users', 'purchases.userid', '=', 'users.id')
            ->where('purchases.status', 0);

        if ($request->get('from_date') && $request->get('to_date')) {
            $data['reset'] = true;
            $purchases->where('package_start_date', '>=', $request->get('from_date'));
            $purchases->where('package_start_date', '<=', $request->get('to_date'));
        } elseif ($request->get('from_date')) {
            $data['reset'] = true;
            $purchases->where('package_start_date', '=', $request->get('from_date'));
        } elseif ($request->get('to_date')) {
            $data['reset'] = true;
            $purchases->where('package_start_date', '=', $request->get('to_date'));
        }

        if ($request->get('package_id')) {
            $data['reset'] = true;
            $purchases->where('packageid', '=', $request->get('package_id'));
        }
        if ($request->get('userid')) {
            $data['reset'] = true;
            $purchases->where('userid', '=', $request->get('userid'));
        }

        $data['purchases'] = $purchases->paginate(20);

        return view('admin.purchaseMgt.index', $data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'status' => 'required|numeric|min:1|max:2',
        ]);

        $update = Purchase::find($id);

        $update->status = $request->input('status');
        $update->status_updated_at = Carbon::Now();

        if ($request->input('status') == 1) {
            $this->updateFreeToNewPackage($update);
        }

        $user = User::find($update->userid);
        $sender = AdminCommon::whoIsUserName($update->userid);

        if ($request->input('status') == 1) {

            $this->updateFreeToNewPackage($update);

            $withMessage = 'User\'s purchase was Approved';

            Mail::to($user->email)->send(new DefaultMail(
                'Your Purchase is Approved!.',
                'Your Purchase is Approved!.',
                'Hello ' . $sender . '<br> We are glad to inform you that your purchase was approved by our team. Enjoy our services.
                Thank you for your purchase.<br>Best Regards,<br>Matrimony'
            ));

        } else {

            $withMessage = 'User\'s purchase was disapproved';
            Mail::to($user->email)->send(new DefaultMail(
                'Your Purchase is not approved.',
                'Your Purchase is not approved.',
                'Hello ' . $sender . '<br> We regret to inform you that your purchase was not approved. Please <a href="' . route('contactus') . '">contact us</a> for more information.<br>Thank you,<br>Matrimony'
            ));
        }

        $update->save();

        return redirect()->route($this->routePrefix . 'index')->with('success', $withMessage);
    }

    public function updateFreeToNewPackage($purchaseData)
    {

        $userid = $purchaseData->userid;
        $purchsedPackageId = $purchaseData->package_id;

        $package = Package::find($purchsedPackageId);
        $addDays = $package->package_active_days;
        $update = CurrentPackage::where('userid', $userid)->first();

        $update->package_start_date = Carbon::now()->toDateTimeString();
        $update->package_end_date = Carbon::now()->addDays($addDays)->toDateTimeString();
        $update->userid = $userid;
        $update->packageid = $purchsedPackageId;

        $update->package_active_days = $package->package_active_days + $update->package_active_days;

        $update->top_in_search = 1;
        $update->post_photo = $package->post_photo + $update->post_photo;
        $update->direct_contact_information = $package->direct_contact_information + $update->direct_contact_information;
        $update->privacy_set = 1;
        $update->send_message = $package->send_message + $update->send_message;
        $update->daily_message = $package->daily_message + $update->daily_message;
        $update->total_interest_express = $package->total_interest_express + $update->total_interest_express;
        $update->daily_interest_express = $package->daily_interest_express + $update->daily_interest_express;
        $update->interest_approve = $package->interest_approve + $update->interest_approve;
        $update->total_interest_approve = $package->total_interest_approve + $update->total_interest_approve;
        $update->daily_interest_approve = $package->daily_interest_approve + $update->daily_interest_approve;
        $update->send_profile = 1;
        $update->add_favorite = $package->add_favorite + $update->add_favorite;
        $update->most_favorite = $package->most_favorite + $update->most_favorite;
        $update->block_profile = 1;
        $update->counselling = 1;

        $update->save();
        return true;
    }

    public function indexApproved(Request $request)
    {

        $data = AdminCommon::allRoutes($this->routePrefix);
        $data['packages'] = Package::where('id', '<>', 1)->get();

        $purchases = Purchase::select('purchases.*', 'users.first_name', 'users.middle_name', 'users.last_name')
            ->join('users', 'purchases.userid', '=', 'users.id')
            ->where('purchases.status', 1);

        if ($request->get('from_date') && $request->get('to_date')) {
            $data['reset'] = true;
            $purchases->where('purchase_date', '>=', $request->get('from_date') . ' 00:00:00');
            $purchases->where('purchase_date', '<=', $request->get('to_date') . ' 23:23:23');
        } elseif ($request->get('from_date')) {
            $data['reset'] = true;
            $purchases->where('purchase_date', '>=', $request->get('from_date') . ' 00:00:00');
        } elseif ($request->get('to_date')) {
            $data['reset'] = true;
            $purchases->where('purchase_date', '<=', $request->get('to_date') . '23:23:23');

        }
        if ($request->get('package_id') && $request->get('package_id') != '') {
            $data['reset'] = true;
            $purchases->where('packageid', '=', $request->get('package_id'));
        }
        if ($request->get('userid')) {
            $data['reset'] = true;
            $purchases->where('userid', '=', $request->get('userid'));
        }

        $data['purchases'] = $purchases->paginate(20);

        return view('admin.purchaseMgt.approved', $data);

    }
    public function indexCanceled(Request $request)
    {

        $data = AdminCommon::allRoutes($this->routePrefix);

        $purchases = Purchase::select('purchases.*', 'users.first_name', 'users.middle_name', 'users.last_name')
            ->join('users', 'purchases.userid', '=', 'users.id')
            ->where('purchases.status', 2);

        $data['purchases'] = $purchases->paginate(20);

        return view('admin.purchaseMgt.canceled', $data);

    }

    public function destroy($id)
    {
        $delete = Purchase::find($id);
        $delete->delete();    

        return redirect()->back()->with('success', 'Purchase data was deleted.');
    }
}
