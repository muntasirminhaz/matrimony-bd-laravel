<?php

namespace App\Http\Controllers\Users\EditProfile;

use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileAddressController extends Controller
{

    public function index()
    {

        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();

        return view('users.editprofile.address.index', $data);

    }

    public function createPersonal()
    {
        $data = $this->CommonData();
        $data['addressType'] = '1';
        $data['message'] = 'Add Personal Address';

        if (Auth::user()->countryid == 1) {
            return view('users.editprofile.address.insertDeshi', $data);
        }
        return view('users.editprofile.address.insertBideshi', $data);
    }

    public function createFamily()
    {

        $data = $this->CommonData();
        $data['addressType'] = '2';
        $data['message'] = 'Add Family Address';

        if (Auth::user()->familycountryid == 1) {
            return view('users.editprofile.address.insertDeshi', $data);
        }

        return view('users.editprofile.address.addBideshiFamily', $data);
    }

    public function storeDeshi(Request $request)
    {
        if ($request->input('addresslocation') !== 'deshi') {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        };

        $validateFormData = request()->validate(
            [
                'addresstype' => 'required',
                'addresslocation' => 'required',
                'resownership' => 'required|numeric',
                'streetaddress' => 'required',
                'divisions' => 'required|numeric',
                'districts' => 'required|numeric',
                'upzila' => 'required|numeric',
            ]
            , [
                'resownership.require' => 'Ownership status is required',
                'resownership.numeric' => 'Ownership status is required',
                'streetaddress.require' => 'Address is required',
                'divisions.require' => ' Division is required',
                'divisions.numeric' => ' Division is required',
                'districts.require' => 'District is required',
                'districts.numeric' => 'District is required',
                'upzila.require' => ' Upzilla is required',
                'upzila.numeric' => ' Upzilla is required',
            ]);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData = [
            'userid' => Auth::user()->id,
            'address_type' => $request->input('addresstype'),
            'residential_status' => $request->input('resownership'),
            'street_address' => $request->input('streetaddress'),
            'home_upzila' => $request->input('upzila'),
            'home_district' => $request->input('districts'),
            'home_division' => $request->input('divisions'),
            'nrb_birth_country' => 0,
            'nrb_growing_up_country' => 0,
            'nrb_living_city' => 0,
            'nrb_living_country' => 0,
            'nrb_immigration_status' => 0,
            'nrb_social_no' => 0,
        ];
        $insert = DB::table('users_address')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        }

        return redirect()->route('users.editprofile.address.index')->with('success', 'Address Information is saved!');

    }

    public function storeBideshi(Request $request)
    {
        if ($request->input('addresslocation') !== 'bideshi') {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        };

        $validateFormData = request()->validate(
            [
                'addresstype' => 'required',
                'addresslocation' => 'required',
                'resownership' => 'required|numeric',
                'streetaddress' => 'required',
                'birthcountry' => 'required|numeric',
                'growupcountry' => 'required|numeric',
                'livecity' => 'required',
                'livecountry' => 'required|numeric',
                'socialno' => 'required',
                'immigrationstatus' => 'required|numeric',
            ]
            , [
                'resownership.required' => 'Ownership status  is required',
                'resownership.numeric' => 'Ownership status  is required',
                'streetaddress.required' => 'Address is required',
                'birthcountry.required' => 'Birth country is required',
                'birthcountry.numeric' => 'Birth country is required',
                'growupcountry.required' => 'Growing up is required',
                'growupcountry.numeric' => 'Growing up is required',
                'livecity.required' => ' Living City is required',
                'livecountry.required' => 'Living Country is required',
                'livecountry.numeric' => 'Living Country is required',
                'socialno.required' => 'Social ID. No. is required',
                'immigrationstatus.required' => 'Immigration Status is required',
                'immigrationstatus.numeric' => 'Immigration Status is required',

            ]);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData = [
            'userid' => Auth::user()->id,
            'address_type' => $request->input('addresstype'),
            'residential_status' => $request->input('resownership'),
            'street_address' => $request->input('streetaddress'),
            'home_upzila' => 0,
            'home_district' => 0,
            'home_division' => 0,
            'nrb_birth_country' => $request->input('birthcountry'),
            'nrb_growing_up_country' => $request->input('growupcountry'),
            'nrb_living_city' => $request->input('livecity'),
            'nrb_living_country' => $request->input('livecountry'),
            'nrb_immigration_status' => $request->input('immigrationstatus'),
            'nrb_social_no' => $request->input('socialno'),
        ];

        $insert = DB::table('users_address')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        }

        return redirect()->route('users.editprofile.address.index')->with('success', 'Address Information is saved!');
    }

    public function storeBideshiFamily(Request $request)
    {
        if ($request->input('addresslocation') !== 'bideshiFamily') {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        };

        $validateFormData = request()->validate(
            [
                'addresstype' => 'required',
                'addresslocation' => 'required',
                'resownership' => 'required|numeric',
                'streetaddress' => 'required',

                'livecity' => 'required',
                'livecountry' => 'required|numeric',
            ]
            , [
                'resownership.required' => 'Ownership status  is required',
                'resownership.numeric' => 'Ownership status  is required',
                'streetaddress.required' => 'Address is required',
                'livecity.required' => ' Living City is required',
                'livecountry.required' => 'Living Country is required',
                'livecountry.numeric' => 'Living Country is required',

            ]);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData = [
            'userid' => Auth::user()->id,
            'address_type' => $request->input('addresstype'),
            'residential_status' => $request->input('resownership'),
            'street_address' => $request->input('streetaddress'),
            'home_upzila' => 0,
            'home_district' => 0,
            'home_division' => 0,
            'nrb_birth_country' => 0,
            'nrb_growing_up_country' => 0,
            'nrb_living_city' => $request->input('livecity'),
            'nrb_living_country' => $request->input('livecountry'),
            'nrb_immigration_status' => 0,
            'nrb_social_no' => 0,
        ];

        $insert = DB::table('users_address')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        }

        return redirect()->route('users.editprofile.address.index')->with('success', 'Address Information is saved!');
    }

    public function editDeshi($id)
    {
        $data = $this->CommonData();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();

        $data['address'] = DB::table('users_address')
            ->select('*')
            ->where([
                ['userid', Auth::user()->id],
                ['id', $id],
            ])
            ->first();

        if ($data['address']->address_type == 1) {
            $data['message'] = 'Edit Personal Address';
        }

        if ($data['address']->address_type == 2) {
            $data['message'] = 'Edit Family Address';
        }

        return view('users.editprofile.address.editDeshi', $data);

    }

    public function editBideshi($id)
    {
        $data = $this->CommonData();
        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();

        $address = DB::table('users_address')
            ->select('*')
            ->where([
                ['userid', Auth::user()->id],
                ['id', $id],
            ])
            ->first();

        if ($data['address']->address_type == 1) {
            $data['message'] = 'Edit Personal Address';
            return view('users.editprofile.address.editBideshi', $data);
        }

        if ($data['address']->address_type == 2) {
            $data['update'] = "users.editprofile.address.updateAbrodFamily";
            $data['message'] = 'Edit Family Address';
            return view('users.editprofile.address.editBideshiFamily', $data);
        }

    }

    public function updateDeshi(Request $request, $id)
    {
        if ($request->input('addresslocation') !== 'deshi') {
            return redirect()->back()->with('error', 'Addresses not updated; provide valid information.');
        };

        $validateFormData = request()->validate(
            [
                'addresstype' => 'required',
                'addresslocation' => 'required',
                'resownership' => 'required|numeric',
                'streetaddress' => 'required',
                'divisions' => 'required|numeric',
                'districts' => 'required|numeric',
                'upzila' => 'required|numeric',
            ]
            , [
                'resownership.require' => 'Ownership status is required',
                'resownership.numeric' => 'Ownership status is required',
                'streetaddress.require' => 'Address is required',
                'divisions.require' => ' Division is required',
                'divisions.numeric' => ' Division is required',
                'districts.require' => 'District is required',
                'districts.numeric' => 'District is required',
                'upzila.require' => ' Upzilla is required',
                'upzila.numeric' => ' Upzilla is required',
            ]);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData = [
            'address_type' => $request->input('addresstype'),
            'residential_status' => $request->input('resownership'),
            'street_address' => $request->input('streetaddress'),
            'home_upzila' => $request->input('upzila'),
            'home_district' => $request->input('districts'),
            'home_division' => $request->input('divisions'),
            'nrb_birth_country' => 0,
            'nrb_growing_up_country' => 0,
            'nrb_living_city' => 0,
            'nrb_living_country' => 0,
            'nrb_immigration_status' => 0,
            'nrb_social_no' => 0,
        ];
        $update = DB::table('users_address')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Addresses not updated; provide valid information.');
        }

        return redirect()->route('users.editprofile.address.index')->with('success', 'Address Information is updated!');

    }

    public function updateBideshi(Request $request, $id)
    {
        if ($request->input('addresslocation') !== 'bideshi') {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        };

        $validateFormData = request()->validate(
            [
                'addresstype' => 'required',
                'addresslocation' => 'required',
                'resownership' => 'required|numeric',
                'streetaddress' => 'required',
                'birthcountry' => 'required|numeric',
                'growupcountry' => 'required|numeric',
                'livecity' => 'required',
                'livecountry' => 'required|numeric',
                'socialno' => 'required',
                'immigrationstatus' => 'required|numeric',
            ]
            , [
                'resownership.required' => 'Ownership status  is required',
                'resownership.numeric' => 'Ownership status  is required',
                'streetaddress.required' => 'Address is required',
                'birthcountry.required' => 'Birth country is required',
                'birthcountry.numeric' => 'Birth country is required',
                'growupcountry.required' => 'Growing up is required',
                'growupcountry.numeric' => 'Growing up is required',
                'livecity.required' => ' Living City is required',
                'livecountry.required' => 'Living Country is required',
                'livecountry.numeric' => 'Living Country is required',
                'socialno.required' => 'Social ID. No. is required',
                'immigrationstatus.required' => 'Immigration Status is required',
                'immigrationstatus.numeric' => 'Immigration Status is required',

            ]);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData = [
            'address_type' => $request->input('addresstype'),
            'residential_status' => $request->input('resownership'),
            'street_address' => $request->input('streetaddress'),
            'home_upzila' => 0,
            'home_district' => 0,
            'home_division' => 0,
            'nrb_birth_country' => $request->input('birthcountry'),
            'nrb_growing_up_country' => $request->input('growupcountry'),
            'nrb_living_city' => $request->input('livecity'),
            'nrb_living_country' => $request->input('livecountry'),
            'nrb_immigration_status' => $request->input('immigrationstatus'),
            'nrb_social_no' => $request->input('socialno'),
        ];

        $update = DB::table('users_address')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Addresses not updated; provide valid information.');
        }

        return redirect()->route('users.editprofile.address.index')->with('success', 'Address Information is updated!');

    }

    public function updateBideshiFamily(Request $request, int $id)
    {
        if ($request->input('addresslocation') !== 'bideshiFamily') {
            return redirect()->back()->with('error', 'Addresses not saved; provide valid information.');
        };

        $validateFormData = request()->validate(
            [
                'addresstype' => 'required',
                'addresslocation' => 'required',
                'resownership' => 'required|numeric',
                'streetaddress' => 'required',
                'livecity' => 'required',
                'livecountry' => 'required|numeric',
            ]
            , [
                'resownership.required' => 'Ownership status  is required',
                'resownership.numeric' => 'Ownership status  is required',
                'streetaddress.required' => 'Address is required',
                'livecity.required' => ' Living City is required',
                'livecountry.required' => 'Living Country is required',
                'livecountry.numeric' => 'Living Country is required',

            ]);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $tableData = [
            'address_type' => $request->input('addresstype'),
            'residential_status' => $request->input('resownership'),
            'street_address' => $request->input('streetaddress'),
            'home_upzila' => 0,
            'home_district' => 0,
            'home_division' => 0,
            'nrb_birth_country' => 0,
            'nrb_growing_up_country' => 0,
            'nrb_living_city' => $request->input('livecity'),
            'nrb_living_country' => $request->input('livecountry'),
            'nrb_immigration_status' => 0,
            'nrb_social_no' => 0,
        ];

        $update = DB::table('users_address')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Addresses not updated; provide valid information.');
        }

        return redirect()->route('users.editprofile.address.index')->with('success', 'Address Information is updated!');

    }

    public function delete(Request $request, $id)
    {
        $validateFormData = request()->validate(
            [
                'delid' => 'required|numeric',
            ]
        );

        if (!$validateFormData && $id == $request->input('delid')) {
            return redirect()->back()->withErrors($request->all());
        }

        $delete = DB::table('users_address')
            ->where([
                ['id', $id],
                ['userid', Auth::user()->id],
            ])
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Address not Deleted!!');
        }

        return redirect()->route('users.editprofile.address.index')->with('msg', 'Address Deleted Successfully!');

    }

    private function CommonData()
    {
        $data['countries'] = Common::country();

        $data['divisions'] = Common::divison();
        $data['districts'] = Common::district();
        $data['upazilas'] = Common::upzila();

        $data['sidebarMenus'] = Common::profileEditSidebar();
        $data['profilePicture'] = Common::userProfilePic();

        return $data;
    }

}
