<?php $__env->startSection('title', 'Pending Users'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Pending Users</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users</h3>
                <div class="pull-right">
                    

                    <div class="box-tools">

                        <?php if(isset($reset)): ?>

                        <a href='<?php echo e(route('admin.users.index')); ?>' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset
                            Search</a>
                        <?php endif; ?>

                        <form class="input-group input-group-sm" style="width: 150px;" action="<?php echo e(route('admin.users.index')); ?>"
                            method="get">
                            <input placeholder="search user by id / name" type="text" name="table_search" class="form-control pull-right"
                                placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                    </div>



                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:8%">User ID</th>
                            <th style="width:25%">Full Name</th>
                            <th></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->first_name); ?> <?php echo e($item->middle_name == '' ? ' ' : $item->middle_name . ' '); ?>

                                <?php echo e($item->last_name); ?></td>
                            <td>

                                <?php if($item->status == 0): ?>
                                <form class="inline" action="<?php echo e(route('admin.users.approveUserProfile',$item->id)); ?>"
                                    method="get">
                                    <?php echo csrf_field(); ?>
                                    <button onclick="return confirm('Are you sure?\nThis will approve the user.')" type="submit"
                                        class="btn btn-success btn-xs">Approve</button>
                                </form>
                                <form class="inline" action="<?php echo e(route('admin.users.disapproveUserProfile',$item->id)); ?>"
                                    method="get">
                                    <?php echo csrf_field(); ?>
                                    <button onclick="return confirm('Are you sure?\nThis will disapprove the user.')" type="submit"
                                        class="btn btn-danger btn-xs">Disapprove</button>
                                </form>
                                <?php endif; ?>

                                <a href="<?php echo e(route($routeShow, $item->id)); ?>" class="btn btn-info btn-xs">Details</a> 

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3">
                                <p class="text-bold text-center"> No User Found</p>
                            </td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <?php echo e($users->links()); ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>