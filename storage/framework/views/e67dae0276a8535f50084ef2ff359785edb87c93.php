<?php $__env->startSection('title', 'All admins'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>All admins</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>




<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin Management</h3>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.adminMgt.create')); ?>" class="btn btn-success btn-xs"><span class="fa fa-plus-square"></span>
                        &nbsp; Add New Admin</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:20%">Name</th>
                            <th style="width:20%">Email</th>
                            <th style="width:20%">Admin Type</th>                            
                            <th style="width:20%">Admin Type</th>                            
                            <th></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($admin->name); ?></td>
                            <td><?php echo e($admin->email); ?></td>
                            <td><?php echo e(adminType($admin->admin_type)); ?></td>
                            <td><?php echo e(adminStatus($admin->status)); ?></td>
                            <td>
                                <a href="<?php echo e(route($routeEdit, $admin->id)); ?>" class="btn btn-warning btn-xs">Edit</a>
                                <form  class="inline" action="<?php echo e(route($routeDestroy,$admin->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="DELETE" name='_method'>
                                    <button  onclick="return confirm('Are you sure?\nThis will delete the admin.')" type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4">
                                <p class="text-bold text-center"> No Admins have been added</p>
                            </td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <?php echo e($admins->links()); ?>

              </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>