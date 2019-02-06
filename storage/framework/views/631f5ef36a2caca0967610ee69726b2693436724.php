<?php $__env->startSection('content'); ?>

<div class="col-xs-12">
    <div class="col-xs-12 padding-0">
        <div href="#">

            <div class="col-sm-4 col-xs-12 padding-0 thumbnail">
                <a class="overflow-hidden display-block">

                    <?php if(isset($user->photoSlider)): ?>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->

                        <ol class="carousel-indicators">
                            <?php $__currentLoopData = $user->photoSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($key == 0 ? 'active' : ''); ?>"></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <?php $__currentLoopData = $user->photoSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="item <?php echo e($key == 0 ? 'active' : ''); ?>">
                                <img src='<?php echo e(url($item)); ?>' alt="Los Angeles" style="width:100%;">
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>



                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="z-index: 9"><span
                                class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next" style="z-index: 9"><span
                                class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    <?php else: ?>
                    <img class="img-responsive" src="<?php echo e(url($user->photo)); ?>">

                    <?php endif; ?>






                </a>
            </div>
            <div class="col-sm-8 col-xs-12 padding-0-5">
                <div class="pull-right margin-top-5 hidden-xs">
                    <?php if(isset($userLoggedIn)): ?>
                    <?php if($limitMessage): ?>
                    <a class="btn btn-sm btn-info" href="#">
                        <span class="fa fa-bookmark-o"></span> Message
                    </a>
                        
                    <?php endif; ?>
                    <?php else: ?>
                    <a class="btn btn-sm btn-info" href="<?php echo e(route('register')); ?>">
                        <span class="fa fa-bookmark-o"></span> Message
                    </a>

                    <?php endif; ?>

                    <?php if(isset($userLoggedIn)): ?>
                    <a class="btn btn-sm btn-info" href="#">
                        <span class="fa fa-bookmark-o"></span> Add to Shortlist
                    </a>
                    <?php else: ?>
                    <a class="btn btn-sm btn-info" href="<?php echo e(route('register')); ?>">
                        <span class="fa fa-bookmark-o"></span> Add to Shortlist
                    </a>

                    <?php endif; ?>

                </div>

                <div class="profile-title margin-bottom-5">
                    <?php echo e($user->name); ?>

                </div>
                <p class="product-price">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lorem ipsum, cursus et lacus ac,
                    ultrices faucibus arcu.
                </p>
                <div class="product-shrot-description">

                    <span class="list-group-item col-sm-2 col-xs-12 border-0">
                        <span class="badge"> <?php echo e($user->age); ?></span>
                        Age
                    </span>

                    <span class="list-group-item col-sm-3 col-xs-12 border-0">
                        <span class="badge"> <?php echo e($user->religion); ?></span>
                        Religion
                    </span>
                    <span class="list-group-item col-sm-3 col-xs-12 border-0">
                        <span class="badge"> <?php echo e($user->height); ?> Feet</span>
                        Height
                    </span>
                    <span class="list-group-item col-sm-3 col-xs-12 border-0">
                        <span class="badge"> <?php echo e($user->weight); ?> Kg</span>
                        Weight
                    </span>
                    <span class="list-group-item col-sm-4 col-xs-12 border-0">
                        <span class="badge"> <?php echo e($user->language); ?></span>
                        Mother Tougne
                    </span>
                    <span class="list-group-item col-sm-5 col-xs-12 border-0">
                        <span class="badge"> <?php echo e($user->marital_status); ?></span>
                        Marital Status
                    </span>
                    <?php if(isset($user->disability)): ?>

                    <span class="list-group-item col-sm-3 col-xs-12 border-0">
                        <span class="badge"> <?php echo e($user->disability); ?></span>
                        Disability
                    </span>
                    <?php endif; ?>
                </div>




            </div>
            <a class="btn btn-lg btn-default col-xs-12 margin-top-5 visible-xs"><span class="fa fa-user-circle-o"></span>
                View Profile
            </a>

        </div>



    </div>
</div>

<?php if(isset($userLoggedIn)): ?>

<div class="col-md-4 col-sm-6 col-xs-12 ">
    <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-dark text-white">
                    <th colspan="2">Profession</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($user->profession)): ?>
                <?php $__currentLoopData = $user->profession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td width='120'><?php echo e($key); ?></td>
                    <td class="bold-text"><?php echo e($value); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-4 col-sm-6 col-xs-12 ">
    <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-dark text-white">
                    <th colspan="2">Physique</th>
                </tr>
            </thead>
            <tbody>

                <?php if(isset($user->physique)): ?>

                <?php $__currentLoopData = $user->physique; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td width='120'><?php echo e($key); ?></td>
                    <td class="bold-text"><?php echo e($value); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>

<?php if(isset($user->education)): ?>
<div class="col-md-4 col-sm-6 col-xs-12 ">
    <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-dark text-white">
                    <th colspan="2">Education</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $user->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($key); ?> : <span class="bold-text"><?php echo e($value); ?></span><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>

<div class="col-xs-12">
    <p class="text-center h2">Partner Preference</p>
    <hr>

    <div class="col-xs-12 ">

        <?php if(isset($user->partnerPreference)): ?>

        <?php $__currentLoopData = $user->partnerPreference; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-sm-3 col-xs-12 ">
            <p><?php echo e($key); ?> : <span class="bold-text"><?php echo e($value); ?></span></p>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>



</div>


<?php else: ?>

<br>
<br>
<br>
<div class="col-sm-12  bg-warning">
    <p class="padding-0-30">
        <h2 class="h1">Join Us Now!</h2>
        <p class="h3">To view this profile you need to Register now.</p>
        <p><a href="<?php echo e(route('register')); ?>" class="btn btn-warning btn-lg">Register Now</a></p>
    </p>
    <br>


</div>




<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>