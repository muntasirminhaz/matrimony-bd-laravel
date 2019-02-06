<?php $__env->startSection('title', 'My Account'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>My Account Details</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Info boxes -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a class="btn- btn-sm btn-linkedin pull-right" href="<?php echo e(route('admin.adminAccount.edit')); ?>">
                    <span class="fa fa-edit"></span>
                    Edit Your Profile
                </a>
            </div>
            <div class="box-body">

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td><?php echo e($myAccount->name); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e($myAccount->email); ?></td>
                        </tr>
                        <tr>
                            <td>Admin Level</td>
                            <td><?php echo e(adminType($myAccount->admin_type)); ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>


    <!-- /.row -->

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>