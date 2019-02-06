@extends('new.master')

@section('content')


    <div class="col-xm-12">

        <div class="row">



            @isset($users)


            @forelse ($users as $item)

            <div class="col-sm-6">

                <div class="row xyz">
                    <div class="col-sm-4 myleftstyle-dem">
                        <span style="color: green;">{{ $item->name }}</span><br />
                        <a href="{{ url($item->profileSlug) }}">
                            <img src="{{ url($item->photo) }}" width="85" height="150">
                        </a>
                    </div>
                    <div class="col-sm-8 myrightstyle-dem" style="">
                        <span><b>Age:</b> {{ $item->age }}</span>
                        <span><b>Height:</b> 5ft 2 in - 157 cm</span>
                        <span><b>Religion:</b> {{ $item->religion }}</span>
                        <span><b>Sect:</b> Sunni</span><br />
                        <span><b>Education:</b> {{ $item->education }}</span><br />
                        <span><b>Occupation:</b> {{ $item->profession }}</span>
                        <span><b>Residing in:</b> {{ $item->city }}</span>
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
