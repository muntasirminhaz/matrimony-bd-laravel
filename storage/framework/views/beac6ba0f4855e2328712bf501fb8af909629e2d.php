<?php $__env->startSection('title', 'Contact us messages'); ?>

<?php $__env->startSection('content_header'); ?>
<a href="<?php echo e(route('admin.diary.create')); ?>" class="btn btn-success btn-xs pull-right"><span class="fa fa-plus-square"></span>
    &nbsp; Add New</a>
    <h1>Contact us messages</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">My Diary</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:15%">Date</th>
                            <th style="width:10%">Name</th>
                            <th style="width:10%">Email</th>
                            <th style="">message</th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->created_at); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->email); ?></td>
                            <td><?php echo e($item->message); ?></td>                            
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">
                                <p class="text-bold text-center">You have no diary entries.</p>
                            </td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
                
            </div>
            <div class="box-footer clearfix">
                <?php echo e($messages->links()); ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>