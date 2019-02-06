<?php $__env->startSection('home'); ?>





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
            <?php $num = 1 ?>
            <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item<?php echo e(($num == 1)?" active":''); ?>"><img src="<?php echo e(asset('images/slide/slide-')); ?><?php echo e($item->id); ?>.<?php echo e($item->image); ?>"
                    alt=" ">
                <div class="carousel-caption">
                    <h1>Changes to the Grid</h1>
                    <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely
                        changed.</p>
                    <p><a class="btn btn-large btn-primary" href="#">Learn more</a>
                    </p>
                </div>

            </div>

            <?php $num++ ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
                    <form action="<?php echo e(route('search')); ?>" method="GET" role="form" class="myfontcolor">
                        <label>I am a</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="gender">
                            <option value=''>Select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        <br />

                        <label>Seeking a</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="gender">
                            <option value=''>Select</option>

                            <option value="2">Female</option>
                            <option value="1">Male</option>
                        </select>

                        <label>Who is from age </label>
                        <select name="agemin">
                            <option value=''>Select</option>
                            <?php for($i = 18; $i < 101; $i++): ?> <option value='<?php echo e($i); ?>'><?php echo e($i); ?></option>
                                <?php endfor; ?>
                        </select>

                        <label>to </label>
                        <select name="agemax">
                            <option value=''>Select</option>
                            <?php for($i = 18; $i < 101; $i++): ?> <option value='<?php echo e($i); ?>'><?php echo e($i); ?></option>
                                <?php endfor; ?>
                        </select><br />

                        <label>Religion </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="religion">
                            <option value=''>Select</option>
                            <?php $__currentLoopData = religion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <label>Maritial status</label><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                            type="checkbox" name="marital_status" value="1">Doesn't matter<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                            type="checkbox" name="marital_status" value="2">Divorced<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                            type="checkbox" name="marital_status" value="3">Never Married<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                            type="checkbox" name="marital_status" value="4">Widowed<br /><br />
                        <label>Who has a photo</label>

                        <input type="checkbox" name="hasprofilepic" value="1"><br /><br />

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
        <a href="javascript:void(0);" class="interact" onclick="return show_layer(&#39;registration&#39;, this);" type="registration"><span></span></a>
        <div class="special_someone_wrap">
            <a href="javascript:void(0);" onclick="return show_layer(&#39;registration&#39;, this);" type="registration">
                <h3>Connect</h3>
            </a>
            <div>Select &amp; Connect with Matches you like</div>
        </div>
    </div>
    <div class="col-sm-4 text-center">
        <a href="javascript:void(0);" class="connect" onclick="return show_layer(&#39;registration&#39;, this);" type="registration"><span></span></a>
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
                            <?php $__currentLoopData = $featuedProfilesFemale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a>
                                <div class="content">

                                    <figure class="myimg">
                                        <?php if($item->picid != ''): ?>
                                        <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext); ?>"
                                                class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                        <?php else: ?>
                                        <?php if($item->gender == 1): ?>
                                        <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepic.png')); ?>"
                                                class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepicfemale.png')); ?>"
                                                class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                        <?php endif; ?>

                                        <?php endif; ?>
                                    </figure>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><span style="font-size: 13px;"><b><?php echo e($item->first_name . ' ' . $item->last_name); ?></b></span><br /></a>
                                    <span><?php echo e(religion2($item->religion)); ?>

                                        <br> Age: <?php echo e(\App\Common::getAge($item->date_of_birth)); ?></h6></span><br />
                                    <span>&nbsp;</span><br />
                                    <span>&nbsp;</span><br />
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-sm-6 mbride_pad">
                            <h4 align="center">MUSLIM Groom</h4>
                            <p>-----------------------------</p>
                            <?php $__currentLoopData = $featuedProfilesMale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a>
                                <div class="content">
                                    <figure class="myimg">
                                        <?php if($item->picid != ''): ?>
                                        <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext); ?>"
                                                class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                        <?php else: ?>
                                        <?php if($item->gender == 1): ?>
                                        <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepic.png')); ?>"
                                                class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepicfemale.png')); ?>"
                                                class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </figure>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><span style="font-size: 13px;"><b><?php echo e($item->first_name . ' ' . $item->last_name); ?></b></span><br /></a>
                                    <span><?php echo e(religion2($item->religion)); ?>

                                        <br> Age: <?php echo e(\App\Common::getAge($item->date_of_birth)); ?></h6></span><br />
                                    <span>&nbsp;</span><br />
                                    <span>&nbsp;</span><br />
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 anothercont_second">
                    <div class="col-sm-12">
                        <div class="col-sm-6 mbride_pad">
                            <h4 align="center">MUSLIM Brides</h4>
                            <p>-----------------------------</p>
                            <?php $__currentLoopData = $latestProfilesFemale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="content">
                                <figure class="myimg">
                                    <?php if($item->picid != ''): ?>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext); ?>"
                                            class="img-thumbnail" alt="a" height="70" width="70" />
                                    </a>
                                    <?php else: ?>
                                    <?php if($item->gender == 1): ?>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepic.png')); ?>"
                                            class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepicfemale.png')); ?>"
                                            class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </figure>
                                <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><span style="font-size: 13px;"><b><?php echo e($item->first_name . ' ' . $item->last_name); ?></b></span><br /></a>
                                <span><?php echo e(religion2($item->religion)); ?>

                                    <br> Age: <?php echo e(\App\Common::getAge($item->date_of_birth)); ?></h6></span><br />
                                <span>&nbsp;</span><br />
                                <span>&nbsp;</span><br />
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-sm-6 mbride_pad">
                            <h4 align="center">MUSLIM Groom</h4>
                            <p>-----------------------------</p>

                            <?php $__currentLoopData = $latestProfilesMale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="content">
                                <figure class="myimg">
                                    <?php if($item->picid != ''): ?>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('profiles/pics/' . $item->id ) . '/' . $item->picid . '.' . $item->picext); ?>"
                                            class="img-thumbnail" alt="a" height="70" width="70" />
                                    </a>
                                    <?php else: ?>
                                    <?php if($item->gender == 1): ?>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepic.png')); ?>"
                                            class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><img src="<?php echo e(url('assets/defaults/profilepicfemale.png')); ?>"
                                            class="img-thumbnail" alt="a" height="70" width="70" /></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </figure>
                                <a href="<?php echo e(\App\Common::getUserUrl($item->id)); ?>"><span style="font-size: 13px;"><b><?php echo e($item->first_name . ' ' . $item->last_name); ?></b></span><br /></a>
                                <span><?php echo e(religion2($item->religion)); ?>

                                    <br> Age: <?php echo e(\App\Common::getAge($item->date_of_birth)); ?></h6></span><br />
                                <span>&nbsp;</span><br />
                                <span>&nbsp;</span><br />
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="box my_custombox">
                    <div class="content" style="cursor: pointer" data-packageid="<?php echo e($item->id); ?>">
                        <figure class="myimg">
                            <img src="<?php echo e(asset('packages/' . $item->package_image)); ?>" alt="image" class="img-thumbnail"
                                height="60" width="60">
                        </figure>
                        <span style="color: green;"><b><?php echo e($item->package_name); ?></b></span><br />
                        <span><b>Duration:</b> 180 Days</span><br />
                        <span><b style="color: green;">Contact</b>: 35 <b>Fee:</b> 8855 BDT</span>
                        <span><b>For NRB:</b>115$</span><br />
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $num = 1 ?>
                <?php $__currentLoopData = $story; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($num%6 == 1): ?>
                <div class="item<?php echo e(($num == 1)?" active":''); ?>">
                    <?php endif; ?>
                    <?php if($num%3 == 1): ?>
                    <div class="story_row">
                        <?php endif; ?>
                        <div class="success_story col-sm-4">
                            <div class="story_item">
                                <img src="<?php echo e(asset('images/stories/stories-')); ?><?php echo e($item->id); ?>.<?php echo e($item->image); ?>" alt=" ">
                                <div class="story_detail">
                                    <div class="person_name"><?php echo e($item->title); ?></div>
                                    <p class="person_info"><?php echo e($item->description); ?>

                                        <!-- <a href="#" target="_blank">Read more<span class="ico_arrow"></span></a> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php if($num%3 == 0): ?>
                    </div>
                    <?php endif; ?>
                    <?php if($num%6 == 0): ?>
                </div>
                <?php endif; ?>
                <?php $num++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <p class="person_info"><?php echo e($item->description); ?><a href="https://www.shaadi.com/shaadi-info/matrimonial-success-stories/wedding?id=21624"
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>