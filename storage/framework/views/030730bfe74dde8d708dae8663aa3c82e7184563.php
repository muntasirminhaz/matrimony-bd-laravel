<?php $__env->startSection('content'); ?>

<div class="col-sm-12 card">
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
            <?php $__empty_1 = true; $__currentLoopData = $viewed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            $name =  \App\Common::whoIsUserName($item->userid);
            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $item->userid]);
            ?>
                <div class="col-sm-2">
                    <a href="<?php echo e($url); ?>" class="img-thumbnail text-center">
                        <img src="<?php echo e(url(\App\Common::getUserProfilePic($item->userid))); ?>" alt="" class="img-responsive">
                        <span class="text-center text-align-center"><?php echo e($name); ?></span>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                
            <?php endif; ?>
            <div class="col-xs-12">
                    <?php echo e($viewed->links()); ?>

    
            </div>
           
        </div>

    </div>

</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.users', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>