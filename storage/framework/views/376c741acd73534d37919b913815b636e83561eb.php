<?php $__env->startSection('title', 'Packages'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Packages</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if(session('message')): ?>
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span><?php echo session('message'); ?></span>
</div>    
<?php endif; ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Current Packages</h3>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.packages.create')); ?>" class="btn btn-success btn-xs"><span class="fa fa-plus-square"></span>
                        &nbsp; Add a New Package</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:20%">Name</th>
                            <th style="width:20%">Price (Taka)</th>
                            <th></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            
                                
                            <td><?php echo e($item->package_name); ?></td>
                            <td><?php echo e($item->package_price); ?></td>
                            <td>
                                    
                                <a href="<?php echo e(route('admin.packages.show', $item->id)); ?>" class="btn btn-info btn-xs">Details</a>
                                <a href="<?php echo e(route('admin.packages.edit', $item->id)); ?>" class="btn btn-warning btn-xs">Edit</a>
                                <?php if($item->id == 1): ?>
                                    <em> &nbsp; You cannot delete the Free Package.</em>
                                    <?php else: ?>
                                <form  class="inline" action="<?php echo e(route($routeDestroy,$item->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="DELETE" name='_method'>
                                    <button  onclick="return confirm('Are you sure?\nThis will delte the user')" type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                                <?php endif; ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3">
                                <p class="text-bold text-center"> No Package have been added</p>
                            </td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <?php echo e($packages->links()); ?>

              </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>