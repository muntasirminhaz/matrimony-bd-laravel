<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Admin Edit : <?php echo e($admin->name); ?></h1>
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
            <form novalidate enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo e(route('admin.adminMgt.update', $admin->id)); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" value="PUT" name='_method'>

                <div class="box-body">



                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">
                            Name </label>
                        <div class="col-sm-10">
                            <input required="" type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">
                            Email </label>
                        <div class="col-sm-10">
                            <input required="" type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">
                            Password </label>
                        <div class="col-sm-10">
                            <input required="" type="text" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admin_type" class="col-sm-2 control-label">
                            Admin Type </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="admin_type" id="admin_type">
                                <option value="">Select Admin Type ...</option>
                                <?php $__currentLoopData = adminType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">
                            Status </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Admin status ...</option>
                                <?php $__currentLoopData = adminStatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <a href='<?php echo e(route('admin.adminMgt.index')); ?>' class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Upate Admin</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>