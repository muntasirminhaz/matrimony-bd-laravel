

<?php $__env->startSection('content'); ?>
<div class="profileSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 hidden-xs"></div>
            <div class="col-sm-10">
                <div class="profileContent">
                    <div class="container-fluid">
                        <div class="titleHeader">
                            <h4>
                                <?php echo e($editTitle); ?>

                            </h4>
                            <form class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e($formAction); ?>"
                role="form">
                <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label for="profession" class="col-sm-3 col-form-label">Profession*
                    </label>
                    <div class="col-sm-9">
                        <select name="profession" id="profession" class="form-control" required="required">
                            <option value="">Select ...</option>
                            <?php $__currentLoopData = profileProfession(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(Auth::user()->user_profession_type == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('profession')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->first('profession')); ?></strong>
                        </span>
                        <?php endif; ?>
                        <span class="text-danger" role="alert">
                            <strong id="err_profession"></strong>
                        </span>
                    </div>

                </div>


                <div id="professiondetails" class="form-group row" style="display: none">
                    <label for="profession_details" class="col-sm-3 col-form-label">Profession Details
                    </label>

                    <div class="col-sm-9">
                        <select data-oldval="<?php echo e(Auth::user()->user_profession_details ?? 0); ?>" name="profession_details" id="profession_details"
                            class="form-control">
                        </select>
                        <?php if($errors->has('profession_details')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->first('profession_details')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row extrainfo">
                    <div class="col-sm-6">
                        <label for="designation" class="designation-level col-form-label">Job / Designation*</label>
                        <div class="">
                            <input required="required" value="<?php echo e(Auth::user()->user_designation); ?>" type="text" name="designation"
                                id="designation"  class="form-control">
                            <?php if($errors->has('designation')): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first('designation')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="orgName" class=" col-form-label">Business / Organization Name</label>
                        <div class="">
                            <input required="required" value="<?php echo e(Auth::user()->user_org_name); ?>" type="text" name="orgName" id="orgName"
                                placeholder="Organization" class="form-control">
                            <?php if($errors->has('orgName')): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first('orgName')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row other_details">
                    <div class="">
                        <label for="otherdetails" class="col-sm-3 col-form-label">Other job Details*</label>
                        <div class="col-sm-9">
                            <input value="<?php echo e(Auth::user()->user_other_profession_details); ?>" type="text" name="otherdetails"
                                id="otherdetails"  class="form-control">
                            <?php if($errors->has('otherdetails')): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first('otherdetails')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                   
                </div>


                <div class="form-group row">
                    <div class="col-xs-12">
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save
                            and Continue</button>
                    </div>

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
<?php $__env->startSection('footerscript'); ?>
<?php echo $__env->make('sections.javascripts.signup_profession', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>