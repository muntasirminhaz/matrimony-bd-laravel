<?php $__env->startSection('title', 'Approved Package Purchase Management'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Approved Package Purchase Management</h1>
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
        <form class="" style="" action="<?php echo e(route('admin.purchaseMgt.approved')); ?>" method="get">

            <div class="form-group col-sm-2">
                <input placeholder="search by user id" type="text" name="userid" class=" form-control"
                    placeholder="Search">
            </div>
            <div class="form-group col-sm-2">
                <input autocomplete="off" placeholder="From Date" type="text" id="datepicker" name="from_date" class=" datepicker form-control"
                    placeholder="Search">
            </div>
            <div class="form-group col-sm-2">
                <input autocomplete="off" placeholder="To Date" type="text" id="datepicker" name="to_date" class=" datepicker  form-control"
                    placeholder="Search">
            </div>
            <div class="form-group col-sm-2">
                <select name="package_id" id="package_id" class=" form-control">
                    <option value="">Select Package</option>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->package_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-defaultt"><i class="fa fa-search"></i></button>
            </div>

        </form>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">

            <div class="box-header">
                <h3 class="box-title">Pending Approval for Package Purchases</h3>
                <div class="box-tools">

                    <?php if(isset($reset)): ?>

                    <a href='<?php echo e(route('admin.purchaseMgt.approved')); ?>' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset
                        Search</a>
                    <?php endif; ?>



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
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->userid); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.users.show',$item->userid)); ?>">

                                    <?php echo e($item->first_name . ' '); ?>

                                    <?php echo e($item->middle_name ?? ' '); ?>

                                    <?php echo e(' ' . $item->last_name); ?>

                                </a>
                            </td>
                            <td><?php echo e($item->purchase_date); ?></td>
                            <td><?php echo e($item->package_name); ?> (<?php echo e($item->package_id); ?>)</td>
                            <td><?php echo e($item->package_price); ?></td>
                            <td><?php echo e(paymentMethods($item->paymentmethid)); ?></td>
                            <td><?php echo e($item->mobaccno); ?></td>
                            <td><?php echo e($item->transactionid); ?></td>
                            
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


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(asset('datepicker/bootstrap-datepicker.min.js')); ?>"></script>
  <script>
      $(function () {
          //Date picker
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
    })

      });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>