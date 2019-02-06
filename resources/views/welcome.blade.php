@extends('layouts.app')




@section('content')


<!-- Large Banner Start -->
<div class="container-fluid">
    <div class="row padding-0">
        <div class="col-xs-12 padding-0">
            <span class="homebanner">
                <img src="{{ asset('assets/img/homepage.jpg') }}" />
                <div class="slogantext">
                    <p style="text-align: center;font-size: 75px;color: #E91E63;text-shadow: 2px 2px 2px #EC407A;margin: 0;padding: 0;">Our
                        Slogan</p>
                    <small style="    text-align: center;    font-size: 30px;    color: #000000;    display: block;">Our
                        Moto</small>
                </div>
                <div class="homebannerbox">

                    <div class="bannertext">
                        <form action="{{ route('search') }}" method="GET" role="form" class="form-inline">

                            @isset(Auth::user()->id)

                            <div class="form-group">
                                <label class="homepageformlabel text-left" for="exampleInputEmail3">Looking For</label>
                                <select class="form-control">
                                    <option>Women</option>
                                    <option>Men</option>
                                </select>
                            </div>
                            @else
                            @endisset

                            <div class="form-group">
                                <label class="homepageformlabel text-left" for="exampleInputEmail3">Age</label>
                                <select name="agemin" class="form-control">
                                    <option value=''>Age From ..</option>

                                    @for ($i = 18; $i < 101; $i++) <option value='{{ $i }}'>{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="homepageformlabel text-left" for="exampleInputEmail3">To</label>
                                <select name="agemax" class="form-control">
                                    <option value=''>Age To ..</option>


                                    @for ($i = 18; $i < 101; $i++) <option value='{{ $i }}'>{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="homepageformlabel text-left" for="exampleInputEmail3">Religion</label>
                                <select name="religion" class="form-control">
                                    <option value=''>Religion ..</option>

                                    @foreach (religion() as $key=>$value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group homepage search">
                                <label class="homepageformlabel text-left" for="exampleInputEmail3">&nbsp;</label>
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>

                        </form>

                    </div>


                </div>

            </span>
        </div>

    </div>
</div>
<!-- Large Banner End -->






<div class="container ">
    <div class="row display-inline">

        <div class="col-xs-12 col-md-8">
            <div class="row padding-0-15">

                <div class="row">
                    <div class="col-md-9">
                        <h3>Featured Profiles</h3>
                    </div>
                    <div class="col-md-3">
                        <!-- Controls -->
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left btn btn-danger" href="#carousel-example" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right btn  btn-danger" href="#carousel-example" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="carousel-example" class="carousel profilecarousel slide hidden-xs" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner overflow-show">
                            {{-- Featured profile Start --}}
                            @isset($featuedProfiles)


                            @php $showActive = 1; $count=1 @endphp
                            @foreach ($featuedProfiles as $item)

                            @if ($count == 1)
                            <div class="item   @if ($showActive == 1) active @endif">
                                <div class="row">
                                    @endif
                                    <a href="{{ \App\Common::getUserUrl($item->id) }}" class="col-sm-3">
                                        <div class="col-item profilebox">
                                            <div class="photo">
                                                @if($item->picid != '')
                                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext  }}"
                                                    class="img-responsive" alt="a" />
                                                @else
                                                <img src="{{ url('assets/defaults/profilepic.png') }}" class="img-responsive"
                                                    alt="a" />
                                                @endif
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>{{ $item->first_name . ' ' . $item->last_name }} </h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">

                                                        <h6 class="">
                                                            {{ religion2($item->religion) }}
                                                            <br> Age: {{ \App\Common::getAge($item->date_of_birth) }}</h6>

                                                    </div>
                                                </div>
                                                {{--
                                                <div class="row profilehiddeninfo">
                                                    <div class="separator clear-left">
                                                        <ul>
                                                            <li>Item 1</li>
                                                            <li>Item 2</li>
                                                            <li>Item 3</li>
                                                        </ul>
                                                    </div>
                                                </div> --}}

                                            </div>
                                        </div>
                                    </a>
                                    @if (($count % 4) == 0)
                                </div>
                            </div>
                            @endif

                            @php $showActive = 0; $count == 4 ? $count = 1 : $count++;
                            if( ($count % 4) > 0 && end($featuedProfiles) == false){
                            echo '</div>
                    </div>';
                    }@endphp
                    @endforeach
                    @if (count($featuedProfiles) % 4 != 0)
                </div>
            </div>
            @endif
            @endisset
            {{-- Featured profile End --}}

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-9">
        <h3>New Profiles</h3>
    </div>
    <div class="col-md-3">
        <!-- Controls -->
        <div class="controls pull-right hidden-xs">
            <a class="left fa fa-chevron-left btn  btn-danger" href="#carousel-example2" data-slide="prev"></a>
            <a class="right fa fa-chevron-right btn  btn-danger" href="#carousel-example2" data-slide="next"></a>
        </div>
    </div>
</div>
<div class="row">
    <div id="carousel-example2" class="carousel  profilecarousel slide hidden-xs" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner overflow-show">

            {{-- latestProfiles start --}}

            @isset($latestProfiles)



            @php $showActive = 1; $count=1 @endphp
            @foreach ($latestProfiles as $item)

            @if ($count == 1)
            <div class="item   @if ($showActive == 1) active @endif">
                <div class="row">
                    @endif
                    <a href="{{ \App\Common::getUserUrl($item->id) }}" class="col-sm-3">
                        <div class="col-item profilebox">
                            <div class="photo">
                                @if($item->picid != '')
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext  }}"
                                    class="img-responsive" alt="a" />
                                @else
                                <img src="{{ url('assets/defaults/profilepic.png') }}" class="img-responsive" alt="a" />
                                @endif
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-6">
                                        <h5>{{ $item->first_name . ' ' . $item->last_name }} </h5>
                                    </div>
                                    <div class="rating hidden-sm col-md-6">
                                        <h6 class="">
                                            {{ religion2($item->religion) }}
                                            <br> Age: {{ \App\Common::getAge($item->date_of_birth) }}</h6>

                                    </div>
                                </div>
                                {{-- <div class="row profilehiddeninfo">
                                    <div class="separator clear-left">
                                        <ul>
                                            <li>Item 1</li>
                                            <li>Item 2</li>
                                            <li>Item 3</li>
                                        </ul>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </a>
                    @if (($count % 4) == 0)
                </div>
            </div>
            @endif

            @php $showActive = 0; $count == 4 ? $count = 1 : $count++;
            if( ($count % 4) > 0 && end($latestProfiles) == false){
            echo '</div>
    </div>';
    }@endphp
    @endforeach
    @if (count($latestProfiles) % 4 != 0)
</div>
</div>
@endif
@endisset

{{-- latestProfiles end --}}


</div>


</div>


</div>
</div>




</div>



<div class="col-xs-12 col-md-4">
    <div class="row">
        <div class="col-xs-12">
            <h2>Packages</h2>
        </div>


        <div class="col-xs-12">
            <img src="{{ asset('assets/img/add.gif')}}" class="img-responsive">
            <p>Congratulations to you both on your very special day! May your wedding be filled with
                special memories you can treasure forever. Sending you the warmest wishes as you build your
                new lives together. May the light of your love always glow upon your
                marriage!Congratulations to you both on your very special day! May your wedding be filled</p>
        </div>

    </div>
</div>
</div>
</div>
</div>



<!-- home block 1 Start -->







<!--

    <div class="container">
        <div class="row">

            <ul class="share-buttons col-xs-12 pull-left">
                <li>
                    <a href="#" title="Share">
                        <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#" title="Share">
                        <i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#" title="Share">
                        <i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#" title="Share">
                        <i class="fa fa-share-square fa-3x" aria-hidden="true"></i>
                    </a>
                </li>


            </ul>

        </div>
    </div>
    -->


@endsection
