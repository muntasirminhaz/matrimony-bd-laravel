<?php $__env->startSection('title', 'My Diary'); ?>

<?php $__env->startSection('content_header'); ?>
<a href="<?php echo e(route('admin.diary.create')); ?>" class="btn btn-success btn-xs pull-right"><span class="fa fa-plus-square"></span>
    &nbsp; Add New</a>
<h1>My Diary</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">My Diary</h3>

                <div class="pull-right">

                    <div class="box-tools">



                        <?php if(isset($reset)): ?>

                        <a href='<?php echo e(route('admin.diary.index')); ?>' class="btn btn-sm btn-warning pull-left" style="margin-right: 10px">Reset
                            Search</a>
                        <?php endif; ?>

                        <form class="input-group input-group-sm" style="width: 150px;" action="<?php echo e(route('admin.diary.index')); ?>"
                            method="get">
                            <input placeholder="search dairy" type="text" name="table_search" class="form-control pull-right"
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
                            <th style="width:15%">Date</th>
                            <th style="width:10%">User Name & Id</th>
                            <th style="width:55%">Diary Text</th>
                            <th style="width:20%"></th>
                            <th></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $myDiary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->created_at); ?></td>

                            <td>
                                <a href="<?php echo e(route('admin.users.show', $item->userid)); ?>" class="">
                                    <?php echo e(\App\AdminCommon::whoIsUserName($item->userid)); ?> -<?php echo e($item->userid); ?>

                                </a>
                            </td>
                            <td><?php echo e($item->diary_text); ?></td>
                            <td>
                                <a href="<?php echo e(route($routeShow, $item->id)); ?>" class="btn btn-info btn-xs">Details</a>

                                <form class="inline" action="<?php echo e(route('admin.diary.destroy',$item->id)); ?>" method="post">
                                    <input type="hidden" value="DELETE" name='_method'>
                                    <?php echo csrf_field(); ?>
                                    <button onclick="return confirm('Are you sure?\nThis will delete diary entry.')"
                                        type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>





                            </td>
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
                <?php echo e($myDiary->links()); ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>