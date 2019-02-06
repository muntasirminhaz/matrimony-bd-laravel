<?php $__env->startSection('title', 'Edit Package'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Edit Package</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo e(route('admin.packages.update', $packages->id)); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="PUT" name='_method'>

                <div class="box-body">

                    <?php $__currentLoopData = $fileds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label for="<?php echo e($item); ?>" class="col-sm-2 control-label">
                                <?php echo ucwords(str_ireplace('_', ' ', $item)); ?>
                        </label>
                        <div class="col-sm-10">
                            <input 
                            value="<?php echo e($packages->$item); ?>" 
                            type="text" class="form-control" id="<?php echo e($item); ?>" 
                            name='<?php echo e($item); ?>'
                            placeholder="<?php echo 'Add ' , ucwords(str_ireplace('_', ' ', $item)); ?>">
                        
                        <?php if($errors->has($item)): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first($item)); ?></strong>
                            </span>
                        <?php endif; ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div class="form-group">
                        <label for="package_image" class="col-sm-2 control-label">Package Image</label>
                        <div class="col-sm-10">
                            <input type="file" name='package_image' id="package_image">
                            <p class="help-block">Image for the Offer.</p>
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href='' class="btn btn-default">Cancel Saving Package</a>
                    <button type="submit" class="btn btn-success pull-right">Save Package Now</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>