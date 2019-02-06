@extends('new.master')

@section('content')

<div class="col-sm-8">


    <!-- Profile block : Start -->

    @isset($users)


    @forelse ($users as $item)
    <div class="col-xs-12 text-center margin-bottom-15 padding-0">
            <div href="#" class="profile-single">
                <div class="col-sm-2 col-xs-12 padding-0">
                    <a class="overflow-hidden display-block" href="{{ url($item->profileSlug) }}">
                        <img class="img-responsive" src="{{ url($item->photo) }}">
                    </a>
                </div>
                <div class="col-sm-10 col-xs-12 padding-0-5">
    
                    <div class="pull-right text-left margin-top-5">
                        {!! $item->button !!}
                    </div>
                    <div class="profile-title margin-bottom-5">
                        <a href="{{ url($item->profileSlug) }}">{{ $item->name }}</a>
                    </div>
                    <p class="product-price" style="display: block;width: 100%;float: left">
                        Gender: <span style="font-weight: 700">&nbsp;{{ $item->gender }}&nbsp;&nbsp;</span>
                        Age: <span style="font-weight: 700">&nbsp;{{ $item->age }}&nbsp;&nbsp;</span>
                        Height: <span style="font-weight: 700">&nbsp;{{ $item->height }}&nbsp;&nbsp;</span><br>
                        Religion: <span style="font-weight: 700">&nbsp;{{ $item->religion }}&nbsp;&nbsp;</span>
                        Education: <span style="font-weight: 700">&nbsp;{{ $item->education }}&nbsp;&nbsp;</span><br>
                        Profession: <span style="font-weight: 700">&nbsp;{{ $item->profession }}&nbsp;&nbsp;</span>
                        City: <span style="font-weight: 700">&nbsp;{{ $item->city }}&nbsp;&nbsp;</span>
                    </p>
                </div>
    
    
            </div>
    
        </div>
    @empty

    no data
    @endforelse

    @else
    no data
    @endisset

    <div class="col-xs-12">
        {!! $rawData->render() !!}
    </div>

</div>
<div class="col-sm-4" id="search-profile">
    <div class="blog-title text-align-center">Advance Search Sidebar</div>
    <hr>



</div>

@endsection


@section('footerscript')
@include('sections.javascripts.signup_preference')
<link href="{{ asset('assets/fselect/fselect.css') }}" rel="stylesheet">
<script src="{{ asset('assets/fselect/fselect.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#religion').fSelect();
        $('#education').fSelect();
        $('#gender').fSelect();

    });

</script>

@endsection
