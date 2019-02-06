<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AdminCommon;
use App\Admin\Diary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class AdminDiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $routePrefix = 'admin.diary.';

    public function index()
    {
        $data = AdminCommon::allRoutes($this->routePrefix);
        $data['myDiary'] = Diary::where('adminid', Auth::guard('admin')->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.diary.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fileds'] = \App\Common::getTableColumn('admin_diary', 'id ,created_at,updated_at,adminid');
        return view('admin.diary.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'userid' => 'required|numeric',
            'diary_text' => 'required',
        ]);

        if (!$validate) {
            return redirect()->back()->with('error', 'Diary not sved, please provide vaild user id and text.');
        }
        if (!User::find($request->input('userid'))) {
            return redirect()->back()->with('error', 'Invalid user id. Please try again.');
        }

        $diary = new Diary();
        $diary->adminid = Auth::guard('admin')->user()->id;
        $diary->userid = $request->input('userid');
        $diary->diary_text = $request->input('diary_text');
        $diary->save();

        return redirect()->route('admin.diary.index')->with('message', 'Successfully saved diary');

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
        $delete = Diary::find($id);
        $delete->delete();
        return redirect()->back()->with('message', 'Diary successfully deleted.');

    }
}
