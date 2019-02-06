<?php $__env->startSection('title', 'Set User Agent'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Set User Agent</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('admin.userAgent.setUserAgentSubmit')); ?>" method="POST" role="form">
    <?php echo csrf_field(); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header h4">
                Set Agent
                <?php if($userid > 0): ?> 
                    For User <strong><?php echo e($userid); ?> (<?php echo e($userName); ?>)</strong> 
                <?php endif; ?>
            </div>
            <div class="box-body">
                    <div class="form-group">
                        <label for="userid">User ID</label>
                        <input value="<?php echo e($userid > 0 ? $userid : ''); ?>"
                        type="text" class="form-control" id="userid" name="userid" placeholder="userid">
                    </div>
                    <div class="form-group">
                        <label for="userid">Assign Agent</label>
                        <select name="agentid" id="agentid" class="form-control">
                            <option value="">Select Agent ...</option>
                            <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($agentid == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <a href='' class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Assign Agent</button>
                </div>
            </div>
            
            
            
        </div>
    </div>
    
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>