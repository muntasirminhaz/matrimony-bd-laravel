<nav class="navbar navbar-inverse padding-0 margin-0 border-radius-0 overflow-hidden-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Nav Header start -->

                <div class="navbar-header brandmobilecenter ">
                    <!-- Logo Start -->
                    <a href="<?php echo e(url('/')); ?>" class="navbar-brand padding-0 margin-0 border-0 border-radius-0 logo-fix">
                        <!--<img class="img-responsive logo" src="img/logo.png"/>              -->
                        <img class="img-responsive logo " src="<?php echo e(asset('assets/img/home-logo.png')); ?>" />
                    </a>
                    <!-- Logo End -->

                    <!-- Menu Responive Toggle Start -->
                    <button type="button" class="navbar-toggle pull-left collapsed mobile-nav-toggle-extra" data-toggle="collapse"
                        data-target="#dropnav" aria-expanded="false" aria-controls="dropnav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Menu Responive Toggle End -->
                </div>
                <!-- Nav Header end -->
                <!-- Desktop Profile Menu : Start -->

                <div class="collapse navbar-collapse pull-right visible-only-desktop" id="myProfileNav">

                    <ul class="nav navbar-nav navbar-right ">
                        <?php if(auth()->guard()->guest()): ?>

                        <li>
                            <!-- sign up modal trigger -->
                            <a href="<?php echo e(url('register')); ?>">
                                <span class="glyphicon glyphicon-user"></span> Sign Up
                            </a>

                        </li>

                        <li>
                            <!-- login modal trigger -->
                            <a class="outline-0" href="<?php echo e(route('login')); ?>">
                                <span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>

                        <?php else: ?>

                        <li class="dropdown">
                            <a class="dropdown-toggle padding-0-10" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="inset">
                                    <img src="<?php echo e(url($profilePicture)); ?>">
                                </span>
                            </a>
                            <ul class="dropdown-menu">

                                <li><a href="<?php echo e(route('users.myprofile')); ?>"><span class="fa fa-user-o"></span> My
                                        Profile</a></li>
                                <li><a href="<?php echo e(route('users.photos.index')); ?>"><span class="fa fa-file-photo-o"></span>
                                        My Photos</a></li>
                                <li><a href="<?php echo e(route('users.myContacts')); ?>"><span class="fa fa-user-plus"></span>
                                        Contacts</a></li>
                                <li><a href="<?php echo e(route('users.myMessagesInbox')); ?>"><span class="fa fa-envelope-o"></span>
                                        Messages</a></li>
                                <li><a href="<?php echo e(route('users.myInterests')); ?>"><span class="fa fa-life-saver"></span>
                                        Interests</a></li>
                                <li><a href="<?php echo e(route('users.myFavorites')); ?>"><span class="fa fa-bookmark-o"></span>
                                        Favorties</a></li>
                                <li><a href="<?php echo e(route('users.myMostFavorites')); ?>"><span class="fa fa-gift"></span>
                                        Most Favorties</a></li>
                                        <li>
                                                <a href="<?php echo e(route('users.profiledViewedBy')); ?>"><span class="fa fa-folder"></span>
                                                    People Viewed My Profile</a>
                                            </li>

                                <li role="separator" class="divider"></li>

                                <li><a href="<?php echo e(route('users.currentPackage')); ?>"><span class="fa fa-shopping-bag"></span>
                                        My Membership Package</a></li>
                                <li><a href="<?php echo e(route('users.privacy.index')); ?>"><span class="fa fa-lock"></span>
                                        Privacy Settings</a></li>
                                <li><a href="<?php echo e(route('users.password.edit')); ?>"><span class="fa fa-user-secret"></span>
                                        Change Password</a></li>

                                <li role="separator" class="divider"></li>

                                <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                        <span class="fa fa-sign-out"></span> <?php echo e(__('Logout')); ?>

                                    </a>
                                </li>


                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>


                            </ul>
                        </li>
                        <?php endif; ?>

                    </ul>
                </div>
                <!-- Desktop Profile Menu : End -->



                <!-- Mobile Profile Menu : Start -->

                <div class="collapse navbar-collapse pull-right visible-only-mobile" id="myProfileNavMobile">

                    <ul class="nav navbar-nav navbar-right ">
                        <?php if(auth()->guard()->guest()): ?>

                        <li>
                            <!-- sign up modal trigger -->
                            <a href="<?php echo e(url('register')); ?>">
                                <span class="glyphicon glyphicon-user"></span> Sign Up
                            </a>

                        </li>

                        <li>
                            <!-- login modal trigger -->
                            <a class="outline-0" href="<?php echo e(route('login')); ?>">
                                <span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>

                        <?php else: ?>

                        <li class="dropdown">
                            <a class="dropdown-toggle padding-0-10" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="inset">
                                    <img src="<?php echo e(url($profilePicture)); ?>">
                                </span>
                            </a>
                            <ul class="dropdown-menu">

                                <li><a href="<?php echo e(route('users.myprofile')); ?>"><span class="fa fa-user-o"></span> My
                                        Profile</a></li>
                                <li><a href="<?php echo e(route('users.photos.index')); ?>"><span class="fa fa-file-photo-o"></span>
                                        My Photos</a></li>
                                <li><a href="#"><span class="fa fa-bookmark-o"></span> Shortlist</a></li>
                                <li><a href="#"><span class="fa fa-envelope-o"></span> Messages</a></li>


                                <li role="separator" class="divider"></li>

                                <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                        <span class="fa fa-sign-out"></span> <?php echo e(__('Logout')); ?>

                                    </a>
                                </li>


                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>


                            </ul>
                        </li>
                        <?php endif; ?>

                    </ul>
                </div>

                <!-- Mobile Profile Menu : End -->



                <!-- Meun Start (that will Mobile toggle) -->
                <div id="dropnav" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

                    <!-- Links in Menu Start -->
                    <ul class="nav navbar-nav mobile-margin-top-60">

                        <?php if(auth()->guard()->guest()): ?>
                        <li>
                            <a href="<?php echo e(route('search')); ?>"><span class="fa fa-search"></span> Search Profiles</a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('packages')); ?>"><span class="fa fa-suitcase"></span> Packages</a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="<?php echo e(route('users.myprofile')); ?>"><span class="fa fa-user"></span> My
                                Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('users.photos.index')); ?>"><span class="fa fa-photo"></span>
                                My Photos</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('search')); ?>"><span class="fa fa-search"></span> Search Profiles</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('users.advanceSearch.showForm')); ?>"><span class="fa fa-search-plus"></span>
                                Advance Search</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('packages')); ?>"><span class="fa fa-suitcase"></span> Packages</a>
                        </li>
                    

                        <?php endif; ?>





                    </ul>
                    <!-- Links in Menu End -->



                </div>



                <!-- Meun Start (that will Mobile toggle) -->


            </div>
        </div>
    </div>
</nav>
