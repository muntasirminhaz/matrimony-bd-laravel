@extends('new.master')



@section('content')

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

            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $interest->receiver_id]);
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

            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $interest->sender_id]);
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
                               
                                <p class="text-center">Please accept or reject interest.
                                    <br>
                                    <br>
                                    <a href="{{ route('users.interest.delete', $interest->id)}}" type="button" class="btn btn-xs btn-danger pull-left" value="0">Decline</a>
                                    <a href="{{ route('users.interest.accept', $interest->id)}}" type="button" class="btn btn-xs btn-success pull-right" value="1">Accept</a>
                                    <br>
                                    <br>
                                </p>
                                
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


@endsection
