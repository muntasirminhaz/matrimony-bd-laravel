<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AdminCommon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminMgtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $routePrefix = 'admin.adminMgt.';
    public function index()
    {
        $data = AdminCommon::allRoutes($this->routePrefix);
        $data['admins'] = Admin::where('admin_type', '<>', 1)->paginate(10);
        return view('admin.admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fileds'] = \App\Common::getTableColumn('admins', 'remember_token,id ,created_at,updated_at,package_image');
        return view('admin.admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());

        $validate = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
            'admin_type' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        if (!$validate) {
            return redirect()->back()->with('error', 'Admin not added, please provide valid information.');
        }

        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->admin_type = $request->input('admin_type');
        $admin->status = $request->input('status');

        if (!$admin->save()) {
            return redirect()->back()->with('error', 'Admin not saved, please try again.');
        }

        return redirect()->route('admin.adminMgt.index')->with('message', '<strong>' . $request->input('name') . '</strong> added as ' . adminType($request->input('admin_type')) . ' successfully.');

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
        $data = AdminCommon::allRoutes($this->routePrefix);
        $data['admin'] = Admin::find($id);
        return view('admin.admin.edit', $data);
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
            'admin_type' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        if (!$validate) {
            return redirect()->back()->with('error', 'Admin not updated, please provide valid information.');
        }

        $admin = Admin::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->admin_type = $request->input('admin_type');
        $admin->status = $request->input('status');

        if (!$admin->save()) {
            return redirect()->back()->with('error', 'Admin not updated, please try again.');
        }

        return redirect()->route('admin.adminMgt.index')->with('message', '<strong>' . $request->input('name') . '</strong> updated as ' . adminType($request->input('admin_type')) . ' successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Admin::find($id);
        $name = $delete->name;
        $delete->delete();
        return redirect()->route('admin.adminMgt.index')->with('message', 'Successfully deleted <em>' . $name . '</em> from admins');
   
    }
}
