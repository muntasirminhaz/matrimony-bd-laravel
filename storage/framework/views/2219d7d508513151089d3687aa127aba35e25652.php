

<?php $__env->startSection('content'); ?>
<div class="profileSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 hidden-xs"></div>
            <div class="col-sm-9">
                <div class="profileContent">
                    <div class="container-fluid">
                        <div class="titleHeader">
                            <h4>
                                Change Your Password
                            </h4>

                            <?php if(Session('msg')): ?>
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong> <?php echo e(Session('msg')); ?></strong>
                            </div>
                            <?php endif; ?>


                            <form action="<?php echo e(route('users.password.update')); ?>" method="post" class="form-horizontal">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($myAccount->id); ?>" name="userid">
                                    <div class="box-body">
                    
                                        <div class="form-group">
                                            <label for="oldpasssword" class="col-sm-3">
                                                Old Passsword </label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required type="text" class="form-control" id="oldpasssword" name="oldpasssword" placeholder="Enter old password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="passsword" class="col-sm-3">
                                                New Passsword </label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required type="text" class="form-control" id="passsword" name="passsword" placeholder="Add new password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation" class="col-sm-3">
                                                Confirm Passsword </label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="box-footer">
                                            <a href='' class="btn btn-default">Cancel Edit</a>
                                            <button type="submit" class="btn btn-success pull-right">Save Changes</button>
                                        </div>
                                </form>



                           


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs"></div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>