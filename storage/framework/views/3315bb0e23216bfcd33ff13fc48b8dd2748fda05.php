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

            <?php if(Session('error')): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong> <?php echo e(Session('error')); ?></strong>
            </div>
            <hr>
            <?php endif; ?>
            <?php if(Session('success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong> <?php echo e(Session('success')); ?></strong>
            </div>
            <hr>
            <?php endif; ?>


            <form class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e(route('signup.storeRelativeInfo')); ?>"
                role="form">
                <?php echo csrf_field(); ?>


                <div class="form-group row">

                        <div class="col-md-6">
                                <label for="relative_side" class=" col-form-label">Relative from</label>
                                <div class="">
                                    <div class="radio">
                                        <label>
                                            <input class="relaFromCheck" <?php echo e(1 == old('relative_side') ? 'checked' : ''); ?> type="radio" name="relative_side"
                                                id="relative_side" value="1">
                                            Parternal Side
                                        </label>
                                        <label>
                                            <input class="relaFromCheck" <?php echo e(2 == old('relative_side') ? 'checked' : ''); ?> type="radio" name="relative_side"
                                                id="relativetype" value="2">
                                            Maternal Side
                                        </label>
                                    </div>
                                    <?php if($errors->has('relative_side')): ?>
                                    <span class="text-danger" role="alert">
                                        <strong><?php echo e($errors->first('relative_side')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <span class="text-danger" role="alert">
                                        <strong id="err_relative_side"></strong>
                                    </span>
                                </div>
                            </div>


                        <div class="col-md-6">
                            <label for="gender" class=" col-form-label">Relative is</label>
                            <div class="">
                                <div class="radio">
                                    <label>
                                        <input class="genderChek" <?php echo e(1 == old('gender') ? 'checked' : ''); ?> type="radio" name="gender" id="gender"
                                            value="1">
                                        Uncle
                                    </label>
                                    <label>
                                        <input class="genderChek" <?php echo e(2 == old('gender') ? 'checked' : ''); ?> type="radio" name="gender" id="gender"
                                            value="2">
                                        Aunty
                                    </label>
                                </div>
                                <?php if($errors->has('gender')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('gender')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert">
                                    <strong id="err_gender"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-6">
                            <label for="relative_living" class=" col-form-label">Living Status
                            </label>
                            <div class="">
                                <input <?php echo e(1 == old('relative_living') ? 'checked' : ''); ?> type="radio" name="relative_living"
                                    id="relative_living1" value="1" class="liveStatusClass reltvChecLiv" />
                                Alive
                                <input <?php echo e(2 == old('relative_living') ? 'checked' : ''); ?> type="radio" name="relative_living"
                                    id="relative_living" value="2" class="liveStatusClass reltvChecLiv" />
                                Passed
                                Away
                                <?php if($errors->has('relative_living')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('relative_living')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong id="err_relative_living"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="marital_status" class="col-form-label">Marital Status
                            </label>
                            <div class="">
                                <input <?php echo e(1 == old('marital_status') ? 'checked' : ''); ?> type="radio" name="marital_status"
                                    class="marital_status mariStatsChe" id="marital_status1" value="1" />
                                Married
                                <input <?php echo e(2 == old('marital_status') ? 'checked' : ''); ?> type="radio" name="marital_status"
                                    class="marital_status mariStatsChe" value="2" />
                                Not
                                Married
                                <?php if($errors->has('marital_status')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('marital_status')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong id="err_marital_status"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="liveStatusToLinkRelProfessionId" style="display:none">
                        <div class="form-group row">
                            <!---liveStatusToLinkRelProfessionId-->
                            <div class="col-md-6">
                                <label for="relative_profession" class="col-form-label">Relative's Profession
                                </label>
                                <div class="">
                                    <select name="relative_profession" id="relative_profession" class="form-control">
                                        <option value="0">Select One</option>
                                        <?php $__currentLoopData = professionType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old('relative_profession') == $key ?'selected': ''); ?>  value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('relative_profession')): ?>
                                    <br>
    
                                    <span class="text-danger" role="alert">
                                        <strong><?php echo e($errors->first('relative_profession')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!--------------------------------------------------->
                            <!--DivProfessionHide All Hide start for hide against of Selecter of Profession -->
                            <!--===BCS==--->
    
                            <div class="col-md-6">
                                <div id="professiondetails" class="allHideClass" style="display:none">
    
                                    <label for="profession_details" class="col-form-label">Relative's Profession Details</label>
                                    <div class="">
                                        <select  data-oldval="<?php echo e(old('profession_details') ?? 0); ?>"  name="profession_details" id="profession_details" class="form-control">
    
                                        </select>
                                        <?php if($errors->has('profession_details')): ?>
                                        <br>
    
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('profession_details')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <!---form-group row end--->
                        <div id="ProfDetailsIdHide" style="display:none">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="relative_designation" class=" col-form-label">Relative's Designation
                                    </label>
                                    <div class="">
                                        <input value="<?php echo e(old('relative_designation')); ?>" id="relative_designation" name="relative_designation" placeholder="Designation"
                                            class="form-control here" type="text">
                                        <?php if($errors->has('relative_designation')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('relative_designation')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="relative_organization" class="col-form-label">Relative's Organization Name
                                    </label>
                                    <div class="">
                                        <input value="<?php echo e(old('relative_organization')); ?>" id="relative_organization" name="relative_organization" placeholder="Organization Name"
                                            class="form-control here" type="text">
                                        <?php if($errors->has('relative_organization')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('relative_organization')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---liveStatusToLinkRelProfessionId-->
                    <div class="spouse-infos">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="relative_spouse_living" class=" col-form-label">Relative's Spouse Living Status*
                                </label>
                                <div class="">
                                    <input <?php echo e(1 == old('relative_spouse_living') ? 'checked' : ''); ?> type="radio" name="relative_spouse_living"
                                        id="relative_spouse_living1" value="1" class="liveStatusClassRS" />
                                    Alive
                                    <input <?php echo e(2 == old('relative_spouse_living') ? 'checked' : ''); ?> type="radio" name="relative_spouse_living"
                                        id="relative_spouse_living" value="2" class="liveStatusClassRS" />
                                    Passed Away
                                    <?php if($errors->has('relative_spouse_living')): ?>
                                    <br>
                                    <span class="text-danger" role="alert">
                                        <strong><?php echo e($errors->first('relative_spouse_living')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div id="liveStatusToLinkRelProfessionIdRS" style="display:none">
                            <!---liveStatusToLinkRelProfessionIdRS-->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="relative_spouse_profession" class=" col-form-label">Relative's Spouse Profession
                                    </label>
                                    <div class="">
                                        <select name="relative_spouse_profession" id="relative_spouse_profession" class="form-control"">
                                                  <option value="">Select One</option>
                                            <?php $__currentLoopData = professionType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('relative_spouse_profession') == $key ?'selected':''); ?>  value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('relative_spouse_profession')): ?>
                                        <br>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('relative_spouse_profession')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="professiondetails1" class="allHideClass2" style="display:none">
    
                                        <label for="spouse_profession_details" class="col-form-label">Relative's Spouse Profession Details</label>
                                        <div class="">
                                            <select data-oldval="<?php echo e(old('spouse_profession_details') ?? 0); ?>"  name="spouse_profession_details" id="spouse_profession_details" class="form-control">
    
                                            </select>
                                            <?php if($errors->has('profesion_details')): ?>
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('profesion_details')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="SpouseProfession" style="display: none">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="relative_spouse_designation" class=" col-form-label">Relative's Spouse Designation
                                        </label>
                                        <div class="">
                                            <input value="<?php echo e(old('relative_spouse_designation')); ?>" id="relative_spouse_designation" name="relative_spouse_designation"
                                                placeholder="Designation" class="form-control here" type="text">
                                            <?php if($errors->has('relative_spouse_designation')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('relative_spouse_designation')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="relative_spouse_organizaion" class="col-form-label">Relatives's Spouse Organization Name
                                        </label>
                                        <div class="">
                                            <input value="<?php echo e(old('relative_spouse_organizaion')); ?>" id="relative_spouse_organizaion" name="relative_spouse_organizaion"
                                                placeholder="Organization Name" class="form-control here" type="text">
                                            <?php if($errors->has('relative_spouse_organizaion')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('relative_spouse_organizaion')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--relativeSpouseProfession Div --->
                        </div>
                        <!---liveStatusToLinkRelProfessionIdRS-->
                    </div>
              
                <hr>
                <div class="form-group row">

                    <div class="col-xs-6">
                        <a href="<?php echo e($allowSkip); ?>" class="signupbutton btn btn-large btn-block btn-danger">Skip and
                            Continue</a>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save and Add New</button>
                    </div>

                </div>


            </form>

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footerscript'); ?>

<?php echo $__env->make('sections.javascripts.signup_relative', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>