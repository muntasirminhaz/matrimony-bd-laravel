@extends('new.master')



@section('content')

<div class="col-sm-12 card">
    <!------View Normally------>
    <div class="panel panel-default">
        <div class="panel-heading title">
            <!--Add Parents Information-->
            @isset($headline)
            <span class="h3">{{ $headline }}</span>
            @else
            <span class="">Add headline</span>
            @endisset
        </div>
        <div class="panel-body">
            <div class="col-sm-3">
                <ul class="list-group">
                    <a href="{{ route('users.myMessagesInbox') }}" class="">
                        <li class="list-group-item  {{ $page == 'inbox' ? 'active' : '' }}">Inbox</li>
                    </a>
                    <a href="{{ route('users.myMessagesOutbox') }}">
                        <li class="list-group-item  {{ $page == 'outbox' ? 'active' : '' }}">Outbox</li>
                    </a>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="panel-group" id="accordion">

                    @forelse ($messages as $item)
                    @php
                    $name = $item->first_name . ($item->middle_name == '' ? ' ' .
                    $item->last_name : $item->middle_name . ' ' . $item->last_name );
                    $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)),
                    $item->receiver_id]);
                    @endphp
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $item->id }}"
                                    class=" isread" data-read='{{ $item->mail_read == 0 ? $item->id : 0 }}'>
                                    {{ $item->title }}
                                    @if ($page == 'inbox' && $item->mail_read == 0)
                                    <button type="button" class="btn btn-xs pull-right btn-instagram unread}">Unread</button>
                                    @endif
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{ $item->id }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><small> {{ $fromOrTo }} : <a href="{{ $url }}"><strong>{{ $name }}</strong></a> ; At
                                        <strong>{{
                                            $item->created_at }}</strong> </small> </p>
                                <p>{{ $item->message }}</p>

                                <a class="btn btn-success btn-xs pull-right margin-right-7 mobile-send-button-fix"
                                    data-toggle="modal" href='#message{{ $item->id }}'>
                                    <span class="fa fa-reply"></span> Reply</a>
                                <div class="modal fade" id="message{{ $item->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            @if ($islimited)
                                            <form action="{{ route('users.sendMessage', $item->receiver_id)  }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Reply to {{ $name }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input required type="text" name="title" class="form-control"
                                                        placeholder="Enter Message Title">
                                                    <br>
                                                    <textarea required name="message" placeholder="Enter Your Message"
                                                        class="form-control" cols="30" rows="3"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning btn-xs pull-left"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success pull-right btn-xs">Send
                                                        Message</button>
                                                </div>
                                            </form>


                                            @else

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">You cannot message to {{ $name }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><a href="{{route('packages')}}">Upgrade you package now to available
                                                        this feature.</a></p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <a class="btn btn-danger btn-xs pull-right margin-right-7 mobile-send-button-fix"
                                    data-toggle="modal" href='#delete{{ $item->id }}'>
                                    <span class="fa fa-remove"></span> Delete</a>
                                <div class="modal fade" id="delete{{ $item->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                          
                                            <form action="{{ route('users.deleteMessage', $item->id)  }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Reply to {{ $name }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning btn-xs pull-left"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success pull-right btn-xs">Delete
                                                        Message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    @empty

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    No messages.</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">You have no messages</div>
                        </div>
                    </div>

                    @endforelse

                </div>

                {!! $messages->render() !!}
            </div>
        </div>

    </div>

</div>



@endsection
@if ($page == 'inbox')
@section('footerscript')
<script>
    $(function () {
        $('.isread').on('click', function () {
            if ($(this).attr('data-read') > 0) {
                $(this).children().hide(100).remove();
                idOfMessage = $(this).attr('data-read');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: "{{ route('users.messsage.setread') }}",
                    type: 'GET',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: CSRF_TOKEN,
                        read: idOfMessage
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        console.log(data);
                    }
                });

            }
        });
    });

</script>
@endsection
@endif
