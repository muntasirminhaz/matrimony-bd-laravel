@extends('adminlte::page')
@section('title', 'Users')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')
<div class="row">

    <div class="col-sm-12">
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
                        <a href="{{ route('admin.users.messageInbox', $userid) }}" class="">
                            <li class="list-group-item  {{ $page == 'inbox' ? 'active' : '' }}">Inbox</li>
                        </a>
                        <a href="{{ route('admin.users.messageOutbox', $userid) }}">
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
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $item->id }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p><small> {{ $fromOrTo }} : <a href="{{ $url }}"><strong>{{ $name }}</strong></a>
                                            ; At
                                            <strong>{{
                                                $item->created_at }}</strong> </small> </p>
                                    <p>{{ $item->message }}</p>





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

</div>


@endsection
