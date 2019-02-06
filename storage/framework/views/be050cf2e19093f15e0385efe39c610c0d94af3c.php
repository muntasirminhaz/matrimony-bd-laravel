<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>User Interests</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
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
    
                $url = route('admin.users.show',$interest->receiver_id);
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
    
                $url = route('admin.users.show',$interest->sender_id);
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
                                   
                                    <p class="text-center">pending by user.</p>
                                    
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>