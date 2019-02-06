<?php $__env->startSection('title', 'Agent Requests'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Agent Requests</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users</h3>
                <div class="pull-right">
                    
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th style="width:20%">Agent</th>
                                <th style="width:20%">User</th>
                                <th></th>
                            </tr>
                            <?php $__empty_1 = true; $__currentLoopData = $agentRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.users.show', $item->adminid)); ?>" class="">
                                        <?php echo e(\App\AdminCommon::whoIsAgent($item->adminid)); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.users.show', $item->userid)); ?>" class="">
                                        <?php echo e(\App\AdminCommon::whoIsUserName($item->userid)); ?>

                                    </a>
                                </td>
                                <td>

                                    <a href="<?php echo e(route('admin.requestUserAgent.approve', $item->id)); ?>" onclick="return confirm('Are you sure?\nThis will approved the request.')"
                                        type="submit" class="btn btn-success btn-xs">Approve</a>
                                    <a href="<?php echo e(route('admin.requestUserAgent.disapprove', $item->id)); ?>" onclick="return confirm('Are you sure?\nThis will approved the request.')"
                                        type="submit" class="btn btn-danger btn-xs">Disapprove</a>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3">
                                    <p class="text-bold text-center"> No Requests by an agent found.</p>
                                </td>
                            </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <?php echo e($agentRequests->links()); ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>