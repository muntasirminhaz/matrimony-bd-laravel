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
            @forelse ($viewed as $item)
            @php
            $name =  \App\Common::whoIsUserName($item->userid);
            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $item->userid]);
            @endphp
                <div class="col-sm-2">
                    <a href="{{ $url }}" class="img-thumbnail text-center">
                        <img src="{{ url(\App\Common::getUserProfilePic($item->userid)) }}" alt="" class="img-responsive">
                        <span class="text-center text-align-center">{{ $name }}</span>
                    </a>
                </div>
            @empty
                
            @endforelse
            <div class="col-xs-12">
                    {{ $viewed->links() }}
    
            </div>
           
        </div>

    </div>

</div>



@endsection
