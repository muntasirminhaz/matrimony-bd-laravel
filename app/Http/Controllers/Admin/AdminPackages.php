<?php

namespace App\Http\Controllers\Admin;

use App\AdminCommon;
use App\Admin\Package;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPackages extends Controller
{

    private $routePrefix = 'admin.packages.';

    public function index()
    {
        $data = AdminCommon::allRoutes($this->routePrefix);
        $data['packages'] = Package::paginate(20);
        return view('admin.packages.index', $data);
    }

    public function create()
    {
        $data['fileds'] = \App\Common::getTableColumn('packages', 'id ,created_at,updated_at,package_image');
        return view('admin.packages.create', $data);
    }

    public function store(Request $request)
    {

        $fileds = \App\Common::getTableColumn('packages', 'id ,created_at,updated_at');
        $now = Carbon::now()->toDateTimeString();
        $tableData = ['created_at' => $now, 'updated_at' => $now];

        $rules['package_image'] = 'required|image|mimetypes:image/gif,image/png,image/jpeg,image/bmp|mimes:jpg,jpeg,png,gif';
        $message['package_image.required'] = 'Image is required';
        $message['package_image.mimetypes'] = 'Unsuppored format. Please add valid image';
        $message['package_image.mimes'] = 'Unsuppored format. Please add valid image';
        $photo = $request->file('package_image') ?? null;

        $extention = $photo == null ? 0 : strtolower($photo->getClientOriginalExtension());

        foreach ($fileds as $key => $value) {
            $rules[$value] = 'required';
            $message[$value . '.required'] = ucwords(str_ireplace('_', ' ', $value)) . ' is required.';
            $tableData[$value] = $request->input($value);
        }

        // file upload

        request()->validate($rules, $message);

        $insert = Package::create($tableData)->id;
        if (!$insert) {
            return redirect()->back()->withInput();
        }

        if ($photo) {
            $photoName = $insert . '.' . $extention;
            $destinationPath = public_path('packages/');
            $photo->move($destinationPath, $photoName);
        }

        $imageSave = Package::find($insert);
        $imageSave->package_image($photoName);
        $imageSave->save();

        return redirect()->route('admin.packages.index')->with('message', 'Successfully added the <strong>' . $imageSave->package_name . '</strong> package.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['fields'] = \App\Common::getTableColumn('packages', 'id, created_at, updated_at, package_image');
        $package = Package::find($id);
        $data['package'] = $package;
        $data['packageName'] = 'Package : ' . $package->package_name;

        return view('admin.packages.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['packages'] = Package::where('id', $id)->first();

        $data['fileds'] = \App\Common::getTableColumn('packages', 'id, created_at, updated_at, package_image');
        return view('admin.packages.edit', $data);
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

        $fileds = \App\Common::getTableColumn('packages', 'id, created_at, updated_at, package_image');
        $now = Carbon::now()->toDateTimeString();
        $tableData = ['created_at' => $now, 'updated_at' => $now];

        $rules['package_image'] = 'required|image|mimetypes:image/gif,image/png,image/jpeg,image/bmp|mimes:jpg,jpeg,png,gif';
        $message['package_image.required'] = 'Image is required';
        $message['package_image.mimetypes'] = 'Unsuppored format. Please add valid image';
        $message['package_image.mimes'] = 'Unsuppored format. Please add valid image';

        $photo = $request->file('package_image');
        $extention = strtolower($photo->getClientOriginalExtension());

        $package = Package::find($id);

        foreach ($fileds as $key => $value) {
            $rules[$value] = 'required';
            $message[$value . '.required'] = ucwords(str_ireplace('_', ' ', $value)) . ' is required.';
            $tableData[$value] = $request->input($value);
            $package->$value = $request->input($value);
        }

        // file upload

        request()->validate($rules, $message);

        $package->save();

        if ($photo) {
            $photoName = $id . '.' . $extention;
            $destinationPath = public_path('packages/');
            $photo->move($destinationPath, $photoName);
        }
        $imageSave = Package::find($id);
        $imageSave->package_image = $photoName;
        $imageSave->save();
        return redirect()->route('admin.packages.index')->with('message', 'Successfully updated the <strong>' . $imageSave->package_name . '</strong> package.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $name = $package->package_name;
        $package->delete();
        return redirect()->route('admin.packages.index')->with('message', 'Successfully deleted the <em>' . $name . '</em> package');
    }

}
