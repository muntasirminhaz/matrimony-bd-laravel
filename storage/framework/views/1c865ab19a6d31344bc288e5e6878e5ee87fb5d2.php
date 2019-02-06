<?php $__env->startSection('content'); ?>

<div class="container margin-50">


    <div class="row">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>

        <div class="col-md-8 col-sm-12 padding-0 margin-0">
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo e($completed); ?>"
                    aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($completed); ?>%">
                    <?php echo e($completed); ?>% Completed
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>

    <div class="row padding-0">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
        <div class="col-md-8 col-sm-12 center-block bg-warning ">
            <div class="center- margin-bottom-20 padding-10-0">


                <?php if(isset($allowGoback)): ?>
                <a href="<?php echo e($allowGoback); ?>" class="signupbutton padding-0-30 margin-bottom-15 btn btn-info pull-left">
                    <span class="fa fa-caret-left"></span> Back
                </a>
                <?php endif; ?>

                <?php if(isset($allowSkip)): ?>
                <a href="<?php echo e($allowSkip); ?>" class="signupbutton padding-0-30 margin-bottom-15 btn btn-danger pull-right">
                    Skip <span class="fa fa-caret-right"></span>
                </a>
                <?php endif; ?>

            </div>
            <h1 class="center-block margin-0-auto margin-bottom-15 text-align-center padding-top-20">
                <?php if(isset($title)): ?>
                <?php echo e($title); ?>

                <?php else: ?>
                Title of the form
                <?php endif; ?>
            </h1>
            <?php if(isset($description)): ?>
            <p class="text-align-center bold-text padding-0-30 margin-bottom-20">

                <?php echo e($description); ?>



            </p>
            <?php endif; ?>
            <hr>



            <form class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e(route('signup.prefessionStore')); ?>"
                role="form">
                <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label for="profession" class="col-sm-3 col-form-label">Profession*
                    </label>
                    <div class="col-sm-9">
                        <select name="profession" id="profession" class="form-control" required="required">
                            <option value="">Select ...</option>
                            <?php $__currentLoopData = profileProfession(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(old('profession') == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?>

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
                        <select data-oldval="<?php echo e(old('profession_details') ?? 0); ?>" name="profession_details" id="profession_details"
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
                        <label for="designation"  class="designation-level col-form-label">Job / Designation*</label>
                        <div class="">
                            <input required="required" value="<?php echo e(old('designation')); ?>" type="text" name="designation"
                                id="designation" placeholder="Designation" class="form-control">
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
                            <input required="required" value="<?php echo e(old('orgName')); ?>" type="text" name="orgName" id="orgName"
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
                            <input value="<?php echo e(old('otherdetails')); ?>" type="text" name="otherdetails"
                                id="otherdetails" placeholder="Provide Details" class="form-control">
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
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footerscript'); ?>
<?php echo $__env->make('sections.javascripts.signup_profession', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>