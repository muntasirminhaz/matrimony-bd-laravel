<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @hasSection ('pageTitle')
        @yield('pageTitle')
        @else
        Matrimony
        @endif
    </title>
    <link href='favicon.ico' rel='icon' type='image/x-icon'>
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.css') }} for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.css') }} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
              <script src="js/html5shiv.min.js"></script>
              <script src="'js/respond.min.js"></script>
            <![endif]-->
</head>


<body>
    <a href="javascript:" id="return-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>



    <header class="">

        @include('sections.nav')
    </header>



    <div class="container margin-20">

        <div class="row">

            @hasSection ('title')
            <div class="col-xs-12 margin-bottom-20">
                @yield('title')
            </div>
            @endif



            @if(session('error'))
            <div class="col-xs-12">

                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>{{ session('error') }}</strong> Please try again with valid information.
                </div>
            </div>

            @endif

            @if(Session('msg'))
            <div class="col-xs-12">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong> {{ Session('msg') }}</strong>
                </div>
            </div>

            @endif
            @if(Session('success'))
            <div class="col-xs-12">

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong> {{ Session('success') }}</strong>
                </div>
            </div>

            @endif


            @yield('content')

        </div>


    </div>



    <footer class="bg-dark text-white padding-top-20 padding-bottom-20">
        <div class="container">

            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="h2">Help /</div>
                    <ul class="margin-0 padding-0 list-style-none margin-bottom-20">
                        <li>
                            <a href="#">First item</a>
                        </li>
                        <li>Second item</li>
                        <li>Third item</li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-6 margin-bottom-20">
                    <div class="h2">Links /</div>
                    <ul class="margin-0 padding-0 list-style-none">
                        <li>First item</li>
                        <li>Second item</li>
                        <li>Third item</li>
                    </ul>
                </div>
                <div class="col-md-6 col-xs-12  margin-bottom-20">
                    <div class="h2">Follow us /</div>

                    <a href="">
                        <i class="fa fa-facebook-square fa-3x"></i>
                    </a> &nbsp;
                    <a href="">
                        <i class="fa fa-twitter-square fa-3x"></i>
                    </a> &nbsp;
                    <a href="">
                        <i class="fa fa-youtube-square fa-3x"></i>
                    </a> &nbsp;
                    <a href="">
                        <i class="fa fa-pinterest-square fa-3x"></i>
                    </a>

                </div>

            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 text-left small color-light">
                    Powered by

                </div>
                <div class="col-xs-6 text-right small color-light">&copy; 2018
                </div>
            </div>
        </div>


    </footer>



    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed-->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/multiform.js') }}"></script>


    @hasSection ('footerscript')

    @yield('footerscript')

    @endif


    <script>
        // ===== Scroll to Top ==== 
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 1000) { // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(700); // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(700); // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function () { // When arrow is clicked
            $('body,html').animate({
                scrollTop: 0 // Scroll to top of body
            }, 300);
        });

    </script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });

    </script>
</body>
