<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="{{ asset('new/template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/template/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('new/template/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('new/template/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('new/template/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('new/template/css/new-home-page-vs-71.css') }}" rel="stylesheet">
    <link href="{{ asset('new/template/css/mystyle.css') }}" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('new/template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('new/template/js/owl.carousel.min.js') }}"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container mycontainfluid">
        <div class="row">
            <div class="col-sm-12 mycoltwelve">
                <div class="col-sm-4">
                    <img src="{{ asset('new/template/img/borbodhu.jpg') }}" class="img-responsive" alt="Cinque Terre"
                        width="300">
                </div>

                <div class="col-sm-8 mycolsix">
                    <span class="myspanstyle">Member Login</span>
                    <span>|</span>
                    <label for="email" class="emlab">Email :</label>
                    <input type="text" name="email" class="eminput" placeholder="E-mail address" />
                    <label for="password" class="passlab">Password :</label>
                    <input class="inptopmargin" type="password" name="password" placeholder="Password" />
                    <div class="toplogin">
                        <input type="image" name="Submit" src="{{ asset('new/template/img/login.gif') }}" border="0"
                            class="text-right">
                    </div><br /><br />
                    <a class="manage_table_hlink5" href="">
                        <img src="{{ asset('new/template/img/freeregistrationnew.gif') }}" border="0" class="freereg"
                            align="middle"> </a>
                    <a href="" class="forgotpasstop" style="">Forgot password</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;
                    <img name="Reg" src="{{ asset('new/template/img/help24.gif') }}" align="middle">
                    <span class="helpcalltop" style="">Call: 01912131377, 01716208791</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container navnopad" style="">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                            aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Search</a></li>
                            <li><a href="#">Online Matrimony</a></li>
                            <li><a href="#">Assisted Matrimony</a></li>
                            <li><a href="#">Upgrade/Payment</a></li>
                            <li><a href="#">Other Services</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>

    <!--
    

    <div id="owl-demo" class="owl-carousel owl-theme">
      
      <div class="item"><img src="1.jpg" alt="The Last of us"></div>
      <div class="item"><img src="2.jpg" alt="GTA V"></div>
      <div class="item"><img src="3.jpg" alt="Mirror Edge"></div>
     
    </div>

    !-->


    <div class="slide-wrapper">

        <div id="homepage-feature" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#homepage-feature" data-slide-to="0" class="active"></li>
                <li data-target="#homepage-feature" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="margin-top: -18px;">
                @php $num = 1 @endphp
                @foreach ($slide as $item)
                <div class="item{{ ($num == 1)?" active":'' }}"><img src="{{ asset('images/slide/slide-') }}{{ $item->id }}.{{ $item->image }}"
                        alt=" ">
                    <div class="carousel-caption">
                        <h1>Changes to the Grid</h1>
                        <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely
                            changed.</p>
                        <p><a class="btn btn-large btn-primary" href="#">Learn more</a>
                        </p>
                    </div>

                </div>

                @php $num++ @endphp
                @endforeach



            </div>
            <!-- /.carousel-inner -->
            <!-- Controls -->
            <a class="left carousel-control" href="#homepage-feature" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#homepage-feature" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>
        </div>
        <!-- /#homepage-feature.carousel -->
        <!--carousel of carousel -->
        <div class="container">
            <div class="row">
                <div class="red">
                    <div class="red-content" style="padding: 10px; background-color: #E49514; color: black; margin-right:108px; margin-top: -8px;">
                        <form class="myfontcolor">
                            <label>I am a</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select>
                                <option>Male</option>
                                <option>Female</option>
                            </select><br />
                            <label>Seeking a</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <label>Who is from age </label>
                            <select>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                            </select>
                            <label>to </label>
                            <select>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                            </select><br />
                            <label>Religion </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select>
                                <option>All</option>
                                <option>Muslim</option>
                                <option>Hindu</option>
                                <option>Christian</option>
                                <option>Buddhist</option>
                                <option>Other</option>
                            </select>
                            <label>Maritial status</label><br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                type="checkbox" name="vehicle" value="Bike">Doesn't matter<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                type="checkbox" name="vehicle" value="Bike">Divorced<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                type="checkbox" name="vehicle" value="Bike">Never Married<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                type="checkbox" name="vehicle" value="Bike">Widowed<br /><br />
                            <label>Who has a photo</label>
                            <input type="checkbox" name="vehicle" value="Bike"><br /><br />
                            <input type="submit" name="" class="btn btn-success center-block" value="Submit">
                        </form>

                    </div>


                </div>
            </div>
        </div><br />






        <!--end of carousel -->

    </div>
    <!--End Slide wrapper -->

    <div class="container">
        <div class="find_someone_head margin_60">Find your Special Someone</div>
    </div><br />

    <div class="container">
        <div class="col-sm-4 text-center">
            <a href="javascript:void(0);" class="sign_up waves-light" onclick="return show_layer(&#39;registration&#39;, this);"
                type="registration"><span></span></a>
            <div class="special_someone_wrap">
                <a href="javascript:void(0);" onclick="return show_layer(&#39;registration&#39;, this);" type="registration">
                    <h3>Sign up</h3>
                </a>
                <div>Register for free &amp; put up your Profile</div>
            </div>
        </div>
        <div class="col-sm-4 text-center">
            <a href="javascript:void(0);" class="interact" onclick="return show_layer(&#39;registration&#39;, this);"
                type="registration"><span></span></a>
            <div class="special_someone_wrap">
                <a href="javascript:void(0);" onclick="return show_layer(&#39;registration&#39;, this);" type="registration">
                    <h3>Connect</h3>
                </a>
                <div>Select &amp; Connect with Matches you like</div>
            </div>
        </div>
        <div class="col-sm-4 text-center">
            <a href="javascript:void(0);" class="connect" onclick="return show_layer(&#39;registration&#39;, this);"
                type="registration"><span></span></a>
            <div class="special_someone_wrap">
                <a href="javascript:void(0);" onclick="return show_layer(&#39;registration&#39;, this);" type="registration">
                    <h3>Interact</h3>
                </a>
                <div>Become a Premium Member &amp; Start a Conversation</div>
            </div>
        </div>

    </div><br />


    <!--another container start -->
    <div class="jumbotron margin_0 anothercont" id="jumbocont">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 anothercont_first">
                    <div class="col-sm-6">
                        <h4 class="find_someone_head anothercont_txt">Feature Profile</h4>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="find_someone_head anothercont_txt">Latest Profile</h4>
                    </div><br />
                    <div class="col-sm-6 anothercont_second">
                        <div class="col-sm-12">
                            <div class="col-sm-6 mbride_pad">
                                <h4 align="center">MUSLIM Brides</h4>
                                <p>-----------------------------</p>
                                @foreach ($featuedProfilesFemale as $item)                                
                                <a><div class="content">
                                    
                                    <figure class="myimg">
                                        @if($item->picid != '')
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext  }}"
                                            class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                        @else
                                        @if ($item->gender == 1)
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepic.png') }}" class="img-thumbnail"
                                            alt="a" height="70" width="70" /></a>
                                        @else
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepicfemale.png') }}" class="img-thumbnail"
                                            alt="a" height="70" width="70" /></a>
                                        @endif
                                        
                                        @endif
                                    </figure>
                                    <a href="{{ \App\Common::getUserUrl($item->id) }}"><span style="font-size: 13px;"><b>{{ $item->first_name . ' ' . $item->last_name }}</b></span><br /></a>
                                    <span>{{ religion2($item->religion) }}
                                        <br> Age: {{ \App\Common::getAge($item->date_of_birth) }}</h6></span><br />
                                    <span>&nbsp;</span><br />
                                    <span>&nbsp;</span><br />
                                </div></a>
                                @endforeach
                            </div>
                            <div class="col-sm-6 mbride_pad">
                                <h4 align="center">MUSLIM Groom</h4>
                                <p>-----------------------------</p>                                
                                @foreach ($featuedProfilesMale as $item)
                                <a><div class="content">
                                        <figure class="myimg">
                                            @if($item->picid != '')
                                            <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext  }}"
                                                class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                            @else
                                            @if ($item->gender == 1)
                                            <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepic.png') }}" class="img-thumbnail"
                                                alt="a" height="70" width="70" /></a>
                                            @else
                                            <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepicfemale.png') }}" class="img-thumbnail"
                                                alt="a" height="70" width="70" /></a>
                                            @endif
                                            @endif
                                        </figure>
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><span style="font-size: 13px;"><b>{{ $item->first_name . ' ' . $item->last_name }}</b></span><br /></a>
                                        <span>{{ religion2($item->religion) }}
                                            <br> Age: {{ \App\Common::getAge($item->date_of_birth) }}</h6></span><br />
                                        <span>&nbsp;</span><br />
                                        <span>&nbsp;</span><br />
                                    </div></a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 anothercont_second">
                        <div class="col-sm-12">
                            <div class="col-sm-6 mbride_pad">
                                <h4 align="center">MUSLIM Brides</h4>
                                <p>-----------------------------</p>
                                @foreach ($latestProfilesFemale as $item)
                                <div class="content">
                                    <figure class="myimg">
                                        @if($item->picid != '')
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext  }}"
                                            class="img-thumbnail" alt="a" height="70" width="70" />
                                        </a>
                                        @else
                                        @if ($item->gender == 1)
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepic.png') }}" class="img-thumbnail"
                                            alt="a" height="70" width="70" /></a>
                                        @else
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepicfemale.png') }}" class="img-thumbnail"
                                            alt="a" height="70" width="70" /></a>
                                        @endif
                                        @endif
                                    </figure>
                                    <a href="{{ \App\Common::getUserUrl($item->id) }}"><span style="font-size: 13px;"><b>{{ $item->first_name . ' ' . $item->last_name }}</b></span><br /></a>
                                    <span>{{ religion2($item->religion) }}
                                        <br> Age: {{ \App\Common::getAge($item->date_of_birth) }}</h6></span><br />
                                    <span>&nbsp;</span><br />
                                    <span>&nbsp;</span><br />
                                </div>
                                @endforeach
                            </div>
                            <div class="col-sm-6 mbride_pad">
                                <h4 align="center">MUSLIM Groom</h4>
                                <p>-----------------------------</p>

                                @foreach ($latestProfilesMale as $item)
                                <div class="content">
                                    <figure class="myimg">
                                        @if($item->picid != '')                                        
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext  }}"
                                            class="img-thumbnail" alt="a" height="70" width="70" />
                                        </a>
                                        @else
                                        @if ($item->gender == 1)
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepic.png') }}" class="img-thumbnail"
                                            alt="a" height="70" width="70" /></a>
                                        @else
                                        <a href="{{ \App\Common::getUserUrl($item->id) }}"><img src="{{ url('assets/defaults/profilepicfemale.png') }}" class="img-thumbnail"
                                            alt="a" height="70" width="70" /></a>
                                        @endif
                                        @endif
                                    </figure>
                                    <a href="{{ \App\Common::getUserUrl($item->id) }}"><span style="font-size: 13px;"><b>{{ $item->first_name . ' ' . $item->last_name }}</b></span><br /></a>
                                    <span>{{ religion2($item->religion) }}
                                        <br> Age: {{ \App\Common::getAge($item->date_of_birth) }}</h6></span><br />
                                    <span>&nbsp;</span><br />
                                    <span>&nbsp;</span><br />
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>



    <!--end background color -->
    </div><br />
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h6 class="find_someone_head our_pack_custom" style="">Our Packages</h6>
                <div class="clearfix my_customclear">
                    @foreach ($package as $item)
                    <div class="box my_custombox">
                        <div class="content" style="cursor: pointer" data-packageid="{{ $item->id }}">
                            <figure class="myimg">
                                <img src="{{ asset('packages/' . $item->package_image) }}" alt="image" class="img-thumbnail"
                                    height="60" width="60">
                            </figure>
                            <span style="color: green;"><b>{{ $item->package_name }}</b></span><br />
                            <span><b>Duration:</b> 180 Days</span><br />
                            <span><b style="color: green;">Contact</b>: 35 <b>Fee:</b> 8855 BDT</span>
                            <span><b>For NRB:</b>115$</span><br />
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>



    <!-- try for carousel -->
    <div class="jumbotron margin_0 mycust_car" id="jumbocont">
        <div class="container">
            <!-- Carousel desktop -->

            <div class="find_someone_head mycast_someone" style="">Over 5 Million Happy Stories</div>
            <div id="myCarousel" class="carousel story_carousel slide hidden-xs">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    @php $num = 1 @endphp
                    @foreach ($story as $item)
                    @if($num%6 == 1)
                    <div class="item{{ ($num == 1)?" active":'' }}">
                        @endif
                        @if($num%3 == 1)
                        <div class="story_row">
                            @endif
                            <div class="success_story col-sm-4">
                                <div class="story_item">
                                    <img src="{{ asset('images/stories/stories-') }}{{ $item->id }}.{{ $item->image }}"
                                        alt=" ">
                                    <div class="story_detail">
                                        <div class="person_name">{{ $item->title }}</div>
                                        <p class="person_info">{{ $item->description }}
                                            <!-- <a href="#" target="_blank">Read more<span class="ico_arrow"></span></a> -->
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if($num%3 == 0)
                        </div>
                        @endif
                        @if($num%6 == 0)
                    </div>
                    @endif
                    @php $num++ @endphp
                    @endforeach
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="https://www.shaadi.com/#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="https://www.shaadi.com/#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>
            <!-- /.carousel desktop -->
            <!-- Carousel mobile -->
            <div id="myCarousel-mobile" class="carousel story_carousel slide visible-xs">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="success_story col-sm-4">
                            <div class="story_item"><img src="PSH36189286-dSH14082042-big.jpg" alt=" ">
                                <div class="story_detail">
                                    <div class="person_name">Narender &amp; Ramanpreet</div>
                                    <p class="person_info">Ours is an arranged marriage but I would not agree because I
                                        fell in love with her with every day passing. Since the day(i.e. 4th March
                                        2015) Raman accepted my interest on Shaadi.com my life changed. ...<a href="https://www.shaadi.com/shaadi-info/matrimonial-success-stories/wedding?id=14547"
                                            target="_blank">Read more<span class="ico_arrow"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="success_story col-sm-4">
                            <div class="story_item"><img data-src="https://img.shaadi.com/success-story/4SH45705343-dSH40725559-big.jpg"
                                    alt=" ">
                                <div class="story_detail">
                                    <div class="person_name">Nikhil &amp; Shital</div>
                                    <p class="person_info">{{ $item->description }}<a href="https://www.shaadi.com/shaadi-info/matrimonial-success-stories/wedding?id=21624"
                                            target="_blank">Read more<span class="ico_arrow"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="success_story col-sm-4">
                            <div class="story_item"><img data-src="https://img.shaadi.com/success-story/6SH65545563-SSH11670087-big.jpg"
                                    alt=" ">
                                <div class="story_detail">
                                    <div class="person_name">Aaradhana &amp; Chetan</div>
                                    <p class="person_info">We connected on Shaadi.com in later 2015 and started
                                        communicating on Whatsapp from there.
                                        We started talking as strangers and became friends. Whatsapp calls then
                                        converted into video calls and we ma...<a href="https://www.shaadi.com/shaadi-info/matrimonial-success-stories/wedding?id=18016"
                                            target="_blank">Read more<span class="ico_arrow"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="success_story col-sm-4">
                            <div class="story_item"><img data-src="BSH22689673-pSH11508313-big.jpg" alt=" ">
                                <div class="story_detail">
                                    <div class="person_name">Vikas &amp; Anshima</div>
                                    <p class="person_info">"Just another day, we were looking at your recommendation
                                        and suddenly her profile come across.
                                        As it is very well said, It all starts with a humble 'Hi'..
                                        So it all started and rest is a lovely sto...<a href="https://www.shaadi.com/shaadi-info/matrimonial-success-stories/wedding?id=18556"
                                            target="_blank">Read more<span class="ico_arrow"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="success_story col-sm-4">
                            <div class="story_item"><img data-src="https://img.shaadi.com/success-story/lSH62007627-3SH86532006-big.jpg"
                                    alt=" ">
                                <div class="story_detail">
                                    <div class="person_name">Deepak Pandey &amp; Smrati Awasthi</div>
                                    <p class="person_info">I got an interest in my Shadi.com profile from her. Then I
                                        got called by her family. Later on we noticed that we are from same hometown.
                                        Its love marriage arranged by Shadi.com. Thanks Shadi.com. Warm...<a href="https://www.shaadi.com/shaadi-info/matrimonial-success-stories/wedding?id=11203"
                                            target="_blank">Read more<span class="ico_arrow"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="success_story col-sm-4">
                            <div class="story_item"><img data-src="4SH32105062-rSH84423896-big.jpg" alt=" ">
                                <div class="story_detail">
                                    <div class="person_name">Prince &amp; Shiksha</div>
                                    <p class="person_info">Its the destiny or we can say by the grace of god we met on
                                        Shaadi.com. In may 2017 when I saw Shiksha's (My wife) request I immediately
                                        accepted it. As we get hold on to conversation between us on Sh...<a href="https://www.shaadi.com/shaadi-info/matrimonial-success-stories/wedding?id=21504"
                                            target="_blank">Read more<span class="ico_arrow"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="https://www.shaadi.com/#myCarousel-mobile" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="https://www.shaadi.com/#myCarousel-mobile" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>
            <!-- /.carousel mobile -->
        </div>
    </div>

    <!-- end for carousel -->


    <!-- Footer -->
    <footer>

        <div class="row">
            <div class="col-sm-4">
                <div class="footet-logo"><a href="https://www.ourkalendar.com/"><img src="{{ asset('new/template/img/footer-logo.png') }}" height="62"></a></div>
                <div class="footer-copyright">© 2018 Ourkalender. All Rights Reserved.</div>
            </div>
            <div class="col-md-4">
                <div class="footer-menu">
                    <a href="https://www.ourkalendar.com/about-us">About</a>
                    <a href="https://www.ourkalendar.com/#">Blog</a>
                    <a href="https://www.ourkalendar.com/help">Help</a>
                    <a href="https://www.ourkalendar.com/press">Press</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-menu-vertical">
                    <a href="https://www.ourkalendar.com/cookie-policy">Cookie policy</a>
                    <a href="https://www.ourkalendar.com/terms-conditions">Terms &amp; Conditions</a>
                    <a href="https://www.ourkalendar.com/security">Security</a>
                </div>
            </div>
        </div>

    </footer>


    <script type="text/javascript">
        var FROM_PAGE = "homepage";
        var PLATFORM = "desktop";

        $(document).ready(function (e) {
            var classFound = $(e.target).parents('.hide');

            if (classFound.length == 0 && !$(e.target).hasClass('member_login_arrow') && !$(e.target).hasClass(
                    'community_member_login_arrow')) {
                $('#help_box').hide();
                $('.help_top_arrow').hide();
            }
        });
        $(document).ready(function () {
            $('.search_pannel_lets').click(function () {
                show_layer('registration', $('#sign_up_btn').get(0));
                //$('.search_pannel_lets').parents('form')[0].submit();
            });

            jq1_11(function () {
                return jq1_11("#myCarousel, #myCarousel-mobile").on("slide.bs.carousel", function (ev) {
                    var lazy;
                    lazy = jq1_11(ev.relatedTarget).find("img[data-src]");
                    jq1_11.each(lazy, function (i, img) {
                        jq1_11(img).attr("src", jq1_11(img).attr('data-src'));
                        jq1_11(img).removeAttr("data-src");
                    })
                });
            }).on('mousedown touchstart', '.touch-feedback', function (event) {
                if (!$(event.srcElement).hasClass('no-touch-feedback')) {
                    $(this).addClass('tap');
                }
            }).on('mouseup touchend', '.touch-feedback', function (event) {
                if (!$(event.srcElement).hasClass('no-touch-feedback')) {
                    $(this).removeClass('tap');
                }
            })
        });

        $(document).scroll(function () {
            var pos1 = $("#jumbocont").offset().top + $("#jumbocont").outerHeight();
            scroll_pos = $(document).scrollTop();
            if (scroll_pos < pos1) {
                $("#get_started").removeClass('fix fadeInDown');
                if (typeof (PLATFORM) === 'undefined' || PLATFORM != 'mobile') {
                    $("#jumbocont").css('marginBottom', '0');
                }
            } else {
                $("#get_started").addClass('fix fadeInDown');
                if (typeof (PLATFORM) === 'undefined' || PLATFORM != 'mobile') {
                    $("#jumbocont").css('marginBottom', '80px');
                }
            }
            Waves.init();
        });

        function hlp_section_reset() {
            $('#help_box').toggle();
            $('.help_top_arrow').toggle();
        }

        function toggleAgeByGender(obj) {
            var gender = $.trim($(obj).val());
            var arrGenderOptions = [20, 19, 18];
            if (gender.toLowerCase() == 'male') {
                $.each(arrGenderOptions, function (e, d) {
                    $("#agefrom").children("option[value=" + d + "]").remove();
                    $("#ageto").children("option[value=" + d + "]").remove();
                });

                if (typeof jq1_11 == 'undefined') {
                    $("#agefrom").val('24');
                    $("#ageto").val('29');
                } else {
                    jq1_11("#agefrom").select2('val', '24');
                    jq1_11("#ageto").select2('val', '29');
                }
            } else {
                $.each(arrGenderOptions, function (e, d) {
                    $("#agefrom").prepend('<option value="' + d + '" label="' + d + '">' + d + "</option>");
                    $("#ageto").prepend('<option value="' + d + '" label="' + d + '">' + d + "</option>");
                });

                if (typeof jq1_11 == 'undefined') {
                    $("#agefrom").val('20');
                    $("#ageto").val('25');
                } else {
                    jq1_11("#agefrom").select2('val', '20');
                    jq1_11("#ageto").select2('val', '25');
                }
            }
        }

    </script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c23a4d9c565326a"></script>

</body>

</html>