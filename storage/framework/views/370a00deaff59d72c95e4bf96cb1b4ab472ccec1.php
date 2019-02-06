



<?php $__env->startSection('content'); ?>

<div class="col-sm-6 card">
    <!------View Normally------>
    <div class="panel panel-default">
        <div class="panel-heading title">
            <!--Add Parents Information-->
            <?php if(isset($headline)): ?>
            <span class="h3"><?php echo e($headline); ?></span>
            <?php else: ?>
            <span class="">Add headline</span>
            <?php endif; ?>
        </div>
        <div class="panel-body">

            <?php $__empty_1 = true; $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            $name = $interest->first_name . ($interest->middle_name == '' ? ' ' .
            $interest->last_name : $interest->middle_name . ' ' . $interest->last_name );

            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $interest->receiver_id]);
            ?>
            <div class="col-xs-12 padding-5">

                <table class="table table-condensed table-responsive  bg-warning ">
                    <tbody>
                        <tr class="">
                            <td rowspan="3" style="width: 20%">
                                <a href="<?php echo e($url); ?>">
                                    <img style="max-width: 80px" class="img-responsive" src="<?php echo e(url(\App\Common::getUserProfilePic($interest->receiver_id))); ?>" alt="" srcset="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="h3">
                                <a href="<?php echo e($url); ?>">
                                    <?php echo e($name); ?> <i>(<?php echo e(religion2($interest->religion)); ?>)</i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="">
                                <?php echo e($interest->description); ?>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>
        </div>

    </div>

</div>


<div class="col-sm-6 card">
    <!------View Normally------>
    <div class="panel panel-default">
        <div class="panel-heading title">
            <!--Add Parents Information-->
            <?php if(isset($headline)): ?>
            <span class="h3">People expressed interested.</span>
            <?php endif; ?>
        </div>
        <div class="panel-body">

            <?php $__empty_1 = true; $__currentLoopData = $expressedInterests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            $name = $interest->first_name . ($interest->middle_name == '' ? ' ' .
            $interest->last_name : $interest->middle_name . ' ' . $interest->last_name );

            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $interest->sender_id]);
            ?>
            <div class="col-xs-12 padding-5">
                <table class="table table-condensed table-responsive  bg-warning ">
                    <tbody>
                        <tr class="">
                            <td rowspan="3" style="width: 20%">
                                <a href="<?php echo e($url); ?>">
                                        <img style="max-width: 80px" class="img-responsive" src="<?php echo e(url(\App\Common::getUserProfilePic($interest->receiver_id))); ?>" alt="" srcset="">
                                   
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="h3">
                                <a href="<?php echo e($url); ?>">
                                    <?php echo e($name); ?> <i>(<?php echo e(religion2($interest->religion)); ?>)</i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="">
                                <?php echo e($interest->description); ?>

                                <?php if($interest->received_status == 0): ?>
                               
                                <p class="text-center">Please accept or reject interest.
                                    <br>
                                    <br>
                                    <a href="<?php echo e(route('users.interest.delete', $interest->id)); ?>" type="button" class="btn btn-xs btn-danger pull-left" value="0">Decline</a>
                                    <a href="<?php echo e(route('users.interest.accept', $interest->id)); ?>" type="button" class="btn btn-xs btn-success pull-right" value="1">Accept</a>
                                    <br>
                                    <br>
                                </p>
                                
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>
        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.users', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>