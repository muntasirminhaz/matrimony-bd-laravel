<?php $__env->startSection('content'); ?>
<div class="container margin-50">
    <div class="row">
        <div class="col-xs-12">
                <?php if(session('danger')): ?>
                <div class="alert alert-danger text-center" role="alert">                   
                    <strong><?php echo session('danger'); ?></strong>
                </div>
                <?php endif; ?>
                <?php if(session('info')): ?>
                <div class="alert alert-info text-center" role="alert">                   
                    <strong><?php echo session('info'); ?></strong>
                </div>
                <?php endif; ?>
        </div>
    </div>
        
</div>

<div class="container margin-50">
    <div class="row padding-0">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
        <div class="col-md-8 col-sm-12 center-block bg-warning ">

            <h1 class="center-block margin-0-auto text-align-center padding-top-20"><?php echo e(__('Reset Password')); ?></h1>
            <hr>



                <form class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e(route('password.email')); ?>" aria-label="<?php echo e(__('Reset Password')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Send Password Reset Link')); ?>

                            </button>
                        </div>
                    </div>
                </form>


        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>