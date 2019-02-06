<?php $__env->startSection('mailbody'); ?>
    <?php if(isset($title)): ?>
        <h2><?php echo e($title); ?></h2>
        <?php else: ?>
        header
    <?php endif; ?>
    <?php if(isset($bodyText)): ?>
        <p><?php echo $bodyText; ?></p>
        <?php else: ?>
        message
    <?php endif; ?>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.layouts.mail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>