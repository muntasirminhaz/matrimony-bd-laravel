<?php $__env->startSection('title', 'User Profile Reports'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>User Profile Reports</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users</h3>
             </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width: 10%">Report No.</th>
                            <th style="width: 10%">Reported By</th>
                            <th style="width: 10%">Reported User</th>
                            <th style="">report Message</th>
                            <th style="width: 10%"></th>
                        </tr>
                        <?php if(isset($reports)): ?>
                            
                        <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item['id']); ?></td>
                            <td><a href="<?php echo e(route('admin.users.show',$item['reported_by'])); ?>">
                                <?php echo e($item['reported_by_name']); ?></a></td>
                                <td><a href="<?php echo e(route('admin.users.show',$item['reported_user'])); ?>">                            
                                <?php echo e($item['reported_user_name']); ?></a></td>
                            <td><?php echo e($item['report_message']); ?></td>
                            <td>
                                <a onclick="return confirm('Are you sure?\nThe report will be marked as done.')" href="<?php echo e(route('admin.userReports.checked',$item['id'])); ?>" class="btn btn-xs btn-dropbox"> Mark as Checked</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="5">
                                <p class="text-bold text-center"> No User Reports.</p>
                            </td>
                        </tr>
                      
                        <?php endif; ?>


                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <?php echo e($tableData->links()); ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>