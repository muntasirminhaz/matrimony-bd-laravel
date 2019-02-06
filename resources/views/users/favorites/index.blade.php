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

            @forelse ($favorites as $favorite)
            @php
            $name = $favorite->first_name . ($favorite->middle_name == '' ? ' ' .
            $favorite->last_name : $favorite->middle_name . ' ' . $favorite->last_name );

            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $favorite->favorite_userid]);
            @endphp
            <div class="col-sm-3 col-xs-6 padding-5">
                <a href="{{ $url }}">
                    <table class="table table-condensed table-responsive">
                        <tbody>
                            <tr class="">
                                <td rowspan="3" style="width: 20%">
                                        <img style="max-width: 60px" class="img-responsive"
                                         src="{{ url(\App\Common::getUserProfilePic($favorite->favorite_userid)) }}" 
                                         alt="" srcset="">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="h4"><p>{{ $name }} <i>({{ religion2($favorite->religion) }})</p></i>
                                </td>
                            </tr>
                            <tr>
                                <td style="">
                                    {{ $favorite->description }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </a>
            </div>
            @empty

            @endforelse
        </div>

    </div>

</div>


@endsection
