



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

            <?php $__empty_1 = true; $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            $name = $favorite->first_name . ($favorite->middle_name == '' ? ' ' .
            $favorite->last_name : $favorite->middle_name . ' ' . $favorite->last_name );

            $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)), $favorite->favorite_userid]);
            ?>
            <div class="col-sm-3 col-xs-6 padding-5">
                <a href="<?php echo e($url); ?>">
                    <table class="table table-condensed table-responsive">
                        <tbody>
                            <tr class="">
                                <td rowspan="3" style="width: 20%">
                                        <img style="max-width: 60px" class="img-responsive"
                                         src="<?php echo e(url(\App\Common::getUserProfilePic($favorite->favorite_userid))); ?>" 
                                         alt="" srcset="">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="h4"><p><?php echo e($name); ?> <i>(<?php echo e(religion2($favorite->religion)); ?>)</p></i>
                                </td>
                            </tr>
                            <tr>
                                <td style="">
                                    <?php echo e($favorite->description); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>
        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.users', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>