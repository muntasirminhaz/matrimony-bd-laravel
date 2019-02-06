<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(asset('new/template/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/template/css/owl.carousel.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/template/css/owl.theme.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/template/css/owl.transitions.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/template/css/responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/template/css/new-home-page-vs-71.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/template/css/mystyle.css')); ?>" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo e(url('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo e(asset('new/template/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('new/template/js/owl.carousel.min.js')); ?>"></script>


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
                    <img src="<?php echo e(asset('new/template/img/borbodhu.jpg')); ?>" class="img-responsive" alt="Cinque Terre"
                        width="300">
                </div>

                <?php if(auth()->guard()->guest()): ?>
                <div class="col-sm-8 mycolsix">
                        <form method="POST" action="<?php echo e(route('login')); ?>"
                        role="form">
                    <?php echo csrf_field(); ?>
                    <span class="myspanstyle">Member Login</span>
                    <span>|</span>
                    <label for="email" class="emlab">Email :</label>
                    <input type="text" name="email" class="eminput" placeholder="E-mail address" />
                    <label for="password" class="passlab">Password :</label>
                    <input class="inptopmargin" type="password" name="password" placeholder="Password" />
                    <div class="toplogin">
                        <input type="image" name="Submit" src="<?php echo e(asset('new/template/img/login.gif')); ?>" border="0"
                            class="text-right">
                    </div><br /><br />
                    </form>
                    <a class="manage_table_hlink5" href="">
                        <img src="<?php echo e(asset('new/template/img/freeregistrationnew.gif')); ?>" border="0" class="freereg"
                            align="middle"> </a>
                    <a href="" class="forgotpasstop" style="">Forgot password</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;
                    <img name="Reg" src="<?php echo e(asset('new/template/img/help24.gif')); ?>" align="middle">
                    <span class="helpcalltop" style="">Call: 01912131377, 01716208791</span>
                </div>
                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                <div class="col-sm-8 mycolsix">
                    I am logged in
                </div>

                <?php endif; ?>
                
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
                            <li class="active"><a href="<?php echo e(route('home')); ?>">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="<?php echo e(route('search')); ?>">Search</a></li>
                            <li><a href="<?php echo e(route('users.myprofile')); ?>">My Profile</a></li>
                            <li><a href="<?php echo e(route('users.photos.index')); ?>">My Photos</a></li>
                            <li><a href="<?php echo e(route('packages')); ?>">Our Packages</a></li>
                            <li><a href="#">Other Services</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>


    <?php if (! empty(trim($__env->yieldContent('content')))): ?>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
        <?php else: ?>
            You forget to yield
        </div>
        <?php endif; ?>
    <?php if (! empty(trim($__env->yieldContent('home')))): ?>
        <?php echo $__env->yieldContent('home'); ?>      
        <?php endif; ?>
        


    <!-- end for carousel -->


    <!-- Footer -->
    <footer>

        <div class="row">
            <div class="col-sm-4">
                <div class="footet-logo"><a href="https://www.ourkalendar.com/"><img src="<?php echo e(asset('new/template/img/footer-logo.png')); ?>" height="62"></a></div>
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



    <?php if (! empty(trim($__env->yieldContent('js')))): ?>
        <?php echo $__env->yieldContent('js'); ?>
        
    <?php else: ?>
        
    <?php endif; ?>
    <?php if (! empty(trim($__env->yieldContent('footerscript')))): ?>
        <?php echo $__env->yieldContent('footerscript'); ?>
        
    <?php else: ?>
        
    <?php endif; ?>


    
    
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
