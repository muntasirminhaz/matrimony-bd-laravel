<div class="list-group">

    <?php $__currentLoopData = $sidebarMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route($route)); ?>" class="list-group-item list-group-item-action <?php echo e(collect(request()->segments())->last() === $url ? 'active' : ''); ?>

        ">
            <?php echo e($name); ?>

        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    





</div>
