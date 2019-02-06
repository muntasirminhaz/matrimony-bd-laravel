<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\Http\Controllers\Controller;
use App\Models\CurrentPackage;
use App\Models\UserMessage;
use App\UserLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {

        $data['page'] = request()->segment(count(request()->segments()));
        $data['userid'] = $id;

        if ($data['page'] == 'inbox') {
            $messages = UserMessage::join('users', 'users_messages.receiver_id', '=', 'users.id')
                ->select(
                    'users.*',
                    'users_messages.*'
                );
            $messages->where('users_messages.sender_id', $id);
            $data['fromOrTo'] = 'From';

        } elseif ($data['page'] == 'outbox') {
            $messages = UserMessage::join('users', 'users_messages.sender_id', '=', 'users.id')
                ->select(
                    'users.*',
                    'users_messages.*'
                );
            $messages->where('users_messages.receiver_id', $id);
            $data['fromOrTo'] = 'To';

        } else {
            $data['page'] == 'inbox';
            $messages = UserMessage::join('users', 'users_messages.receiver_id', '=', 'users.id')
                ->select(
                    'users.*',
                    'users_messages.*'
                );
            $messages->where('users_messages.sender_id', $id);
            $data['fromOrTo'] = 'From';
        }

        $data['headline'] = 'My Messages';

        $data['messages'] = $messages->orderBy('users_messages.created_at', 'DESC')->paginate(5);

        return view('admin.usermessage.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        request()->validate(
            [
                'title' => 'required',
                'message' => 'required',
            ]
        );

        $saveMessage = new UserMessage();
        $saveMessage->sender_id = $id;
        $saveMessage->receiver_id = $id;
        $saveMessage->title = $request->input('title');
        $saveMessage->message = $request->input('message');
        $saveMessage->save();

        return redirect()->back()->with('success', 'Your Message is sent.');
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
        $delete = UserMessage::find($id);
        $delete->delete();

        $CurrentPackage = CurrentPackage::where('userid', $id)->first();
        $CurrentPackage->send_message = $CurrentPackage->send_message - 1;
        $CurrentPackage->save();

        return redirect()->back()->with('success', 'Message was deleted.');

    }
    public function setRead(Request $request)
    {

        $mail_read = UserMessage::find($request->read);
        $mail_read->mail_read = 1;
        $mail_read->save();

    }
}
