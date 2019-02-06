<?php $__env->startSection('title', 'Edit My Account'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Edit My Account Details</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Info boxes -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Profile </h3>
                <a class="btn- btn-sm btn-linkedin pull-right" href="<?php echo e(route('admin.adminAccount.index')); ?>">
                    <span class="fa fa-user-circle-o"></span>
                    View Your Profile
                </a>
            </div>
            <form action="<?php echo e(route('admin.adminAccount.update')); ?>" method="post" class="form-horizontal">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($myAccount->id); ?>" name="userid">
                <div class="box-body">

                    <div class="form-group">
                        <label for="oldpasssword" class="col-sm-2 control-label">
                            Old Passsword </label>
                        <div class="col-sm-10">
                            <input autocomplete="off" required type="text" class="form-control" id="oldpasssword" name="oldpasssword" placeholder="Enter old password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passsword" class="col-sm-2 control-label">
                            New Passsword </label>
                        <div class="col-sm-10">
                            <input autocomplete="off" required type="text" class="form-control" id="passsword" name="passsword" placeholder="Add new password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-2 control-label">
                            Confirm Passsword </label>
                        <div class="col-sm-10">
                            <input autocomplete="off" required type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                        <a href='' class="btn btn-default">Cancel Edit</a>
                        <button type="submit" class="btn btn-success pull-right">Save Changes</button>
                    </div>
            </form>

        </div>
    </div>


    <!-- /.row -->

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>