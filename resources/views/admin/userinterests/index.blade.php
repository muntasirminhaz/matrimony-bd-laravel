@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>User Interests</h1>
@stop

@section('content')
<div class="row">
    <div class="col-sm-6 card">
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
    
                @forelse ($interests as $interest)
                @php
                $name = $interest->first_name . ($interest->middle_name == '' ? ' ' .
                $interest->last_name : $interest->middle_name . ' ' . $interest->last_name );
    
                $url = route('admin.users.show',$interest->receiver_id);
                @endphp
                <div class="col-xs-12 padding-5">
    
                    <table class="table table-condensed table-responsive  bg-warning ">
                        <tbody>
                            <tr class="">
                                <td rowspan="3" style="width: 20%">
                                    <a href="{{ $url }}">
                                        <img style="max-width: 80px" class="img-responsive" src="{{ url(\App\Common::getUserProfilePic($interest->receiver_id)) }}" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="h3">
                                    <a href="{{ $url }}">
                                        {{ $name }} <i>({{ religion2($interest->religion) }})</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="">
                                    {{ $interest->description }}
                                </td>
                            </tr>
    
                        </tbody>
                    </table>
                </div>
                @empty
    
                @endforelse
            </div>
    
        </div>
    
    </div>
    
    
    <div class="col-sm-6 card">
        <!------View Normally------>
        <div class="panel panel-default">
            <div class="panel-heading title">
                <!--Add Parents Information-->
                @isset($headline)
                <span class="h3">People expressed interested.</span>
                @endisset
            </div>
            <div class="panel-body">
    
                @forelse ($expressedInterests as $interest)
                @php
                $name = $interest->first_name . ($interest->middle_name == '' ? ' ' .
                $interest->last_name : $interest->middle_name . ' ' . $interest->last_name );
    
                $url = route('admin.users.show',$interest->sender_id);
                @endphp
                <div class="col-xs-12 padding-5">
                    <table class="table table-condensed table-responsive  bg-warning ">
                        <tbody>
                            <tr class="">
                                <td rowspan="3" style="width: 20%">
                                    <a href="{{ $url }}">
                                            <img style="max-width: 80px" class="img-responsive" src="{{ url(\App\Common::getUserProfilePic($interest->receiver_id)) }}" alt="" srcset="">
                                       
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="h3">
                                    <a href="{{ $url }}">
                                        {{ $name }} <i>({{ religion2($interest->religion) }})</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="">
                                    {{ $interest->description }}
                                    @if ($interest->received_status == 0)
                                   
                                    <p class="text-center">pending by user.</p>
                                    
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @empty
    
                @endforelse
            </div>
    
        </div>
    
    </div>
</div>
@stop