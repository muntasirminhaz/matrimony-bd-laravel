<?php $__env->startSection('title', 'Canceled Package Purchase Management'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Canceled Package Purchase Management</h1>
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
                <h3 class="box-title">Pending Approval for Package Purchases</h3>
                <div class="box-tools">
                        
                        <?php if(isset($reset)): ?>
                            
                        <a href='<?php echo e(route($routeIndex)); ?>' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset Search</a>
                        <?php endif; ?>

                        <form class="input-group input-group-sm" style="width: 150px;" action="<?php echo e(route('admin.users.index')); ?>" method="get">
                            <input placeholder="search user by id / name" type="text" name="userid" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="width:3%">User ID</th>
                            <th style="width:12%">User Name</th>
                            <th style="width:12%">Date</th>
                            <th style="width:10%">Package Name & Price</th>
                            <th style="width:6%">Package Price (Taka) </th>
                            <th style="width:12%">Payment Method </th>
                            <th style="width:12%">Payment Account / Mobile No</th>
                            <th style="width:12%">Payment Transaction ID</th>
                            <th></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->userid); ?></td>
                            <a href="<?php echo e(route('admin.users.show',$item->userid)); ?>">

                                    <?php echo e($item->first_name . ' '); ?>

                                    <?php echo e($item->middle_name ?? ' '); ?>

                                    <?php echo e(' ' . $item->last_name); ?>

                                </a>
                            <td><?php echo e($item->purchase_date); ?></td>
                            <td><?php echo e($item->package_name); ?> (<?php echo e($item->package_id); ?>)</td>
                            <td><?php echo e($item->package_price); ?></td>
                            <td><?php echo e(paymentMethods($item->paymentmethid)); ?></td>
                            <td><?php echo e($item->mobaccno); ?></td>
                            <td><?php echo e($item->transactionid); ?></td>
                            <td>

                                <form class="inline" action="<?php echo e(route($routeUpdate, $item->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input required type="hidden" value="PUT" name='_method'>
                                    <input required type="hidden" value="1" name='status'>
                                    <button onclick="return confirm('Are you sure?\nThis will re-approve the user\'s purchase.')"
                                        type="submit" class="btn btn-xs btn-warning">Re-Approve</button>
                                </form> &nbsp; &nbsp;
                                <form class="inline" action="<?php echo e(route($routeDestroy, $item->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input required type="hidden" value="DELETE" name='_method'>
                                    <input required type="hidden" value="2" name='status'>
                                    <button onclick="return confirm('Are you sure?\nThis will disapprove the user\'s purchase.')"
                                        type="submit" class="btn btn-xs btn-danger">Delete </button>
                                </form>


                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                       
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <?php echo e($purchases->links()); ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>