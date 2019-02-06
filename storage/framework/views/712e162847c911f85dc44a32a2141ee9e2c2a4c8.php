<?php $__env->startSection('content'); ?>
<div class="col-sm-12 card">
    <div class="panel panel-default">
        <div class="panel-heading title " style="display: inline-block;width: 100%;">
            <div class="col-sm-3 inline mobile-text-center">
                <span class="h3 "> <?php echo e($user->name); ?></span>
            </div>
            <span>


            </span>
        </div>
        <div class="panel-body">
            <div class="col-xs-12">
                <div class="col-xs-12 padding-0">
                    <div href="#">
                        <div class="col-sm-4 padding-0 thumbnail">
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
                        <div class="col-sm-8 padding-0">
                            <div class="product-shrot-description">
                                <p class="bold-text"><?php echo e($user->description); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%">Marital Status</td>
                                            <td class="bold-text"><?php echo e($user->marital_status); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Age</td>
                                            <td class="bold-text"><?php echo e($user->age); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Education</td>
                                            <td class="bold-text"><?php echo e($user->education_level ?? ' - '); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Profession</td>
                                            <td class="bold-text"><?php echo e($user->user_profession_type); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Height</td>
                                            <td class="bold-text"><?php echo e(height($user->height)); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Father's Profession</td>
                                            <td class="bold-text"><?php echo e($user->father_profession); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Mother's Profession</td>
                                            <td class="bold-text"><?php echo e($user->mother_profession); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%">Number of Brothers</td>
                                            <td class="bold-text"><?php echo e($user->number_of_brothers); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Number of Sisters</td>
                                            <td class="bold-text"><?php echo e($user->number_of_sisters); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Home District</td>
                                            <td class="bold-text"><?php echo e($user->location_district); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Upzilla / Thana</td>
                                            <td class="bold-text"><?php echo e($user->location_upzila); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Living Country</td>
                                            <td class="bold-text"><?php echo e($user->location_living_country); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Living City</td>
                                            <td class="bold-text"><?php echo e($user->location_living_city); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">

                <div class="jumbotron padding-0">
                    <div class="container">
                        <h2>Join Matrimony</h2>
                        <p>To view this profile fully, register now</p>
                        <p>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-info btn-lg">Register Now</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>