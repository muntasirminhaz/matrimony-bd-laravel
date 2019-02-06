

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

                            <form class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e($formAction); ?>" role="form">
                                <?php echo csrf_field(); ?>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="siblingposition" class="col-form-label">Brother/Sister Position</label>
                                        <input class="form-control" type="number" name="siblingposition" id="siblingposition"
                                            value="<?php echo e(old('siblingposition')); ?>">
                                        <span class="text-danger" role="alert">
                                            <strong id="err_siblingposition"></strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class=" col-form-label">Brother / Sister</label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="gendercheck"
                                                        <?php echo e(1 == old('gender') ? 'checked' : ''); ?> type="radio" name="gender"
                                                        id="gender" value="1">
                                                    Male
                                                </label>
                                                <label>
                                                    <input class="gendercheck"
                                                        <?php echo e(2 == old('gender') ? 'checked' : ''); ?> type="radio" name="gender"
                                                        id="gender" value="2">
                                                    Female
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
                                        <label for="sibling_living" class=" col-form-label">Living Status
                                        </label>
                                        <div class="">
                                            <input <?php echo e(1 == old('sibling_living') ? 'checked' : ''); ?> type="radio" name="sibling_living"
                                                id="sibling_living1" value="1" class="liveStatusClass livCheck" />
                                            Alive
                                            <input <?php echo e(2 == old('sibling_living') ? 'checked' : ''); ?> type="radio" name="sibling_living"
                                                id="sibling_living" value="2" class="liveStatusClass livCheck" />
                                            Passed
                                            Away
                                            <?php if($errors->has('sibling_living')): ?>
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('sibling_living')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_sibling_living"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="marital_status" class="col-form-label">Marital Status
                                        </label>
                                        <div class="">
                                            <input <?php echo e(1 == old('marital_status') ? 'checked' : ''); ?> type="radio" name="marital_status"
                                                class="marital_status maritStaCheck" id="marital_status1" value="1" />
                                            Married
                                            <input <?php echo e(2 == old('marital_status') ? 'checked' : ''); ?> type="radio" name="marital_status"
                                                class="marital_status maritStaCheck" value="2" />
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
                                            <label for="sibling_profession" class="col-form-label">Brother's / Sister's
                                                Profession
                                            </label>
                                            <div class="">
                                                <select name="sibling_profession" id="sibling_profession" class="form-control">
                                                    <option value="0">Select One</option>
                                                    <?php $__currentLoopData = professionType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(old('sibling_profession') == $key ?'selected': ''); ?>

                                                        value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('sibling_profession')): ?>
                                                <br>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('sibling_profession')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                                <br>
                                                <span class="text-danger" role="alert">
                                                    <strong id="err_sibling_profession"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <!--------------------------------------------------->
                                        <!--DivProfessionHide All Hide start for hide against of Selecter of Profession -->
                                        <!--===BCS==--->

                                        <div class="col-md-6">
                                            <div id="professiondetails" class="allHideClass" style="display:none">

                                                <label for="profession_details" class="col-form-label">Profession
                                                    Details</label>
                                                <div class="">
                                                    <select data-oldval="<?php echo e(old('profession_details') ?? 0); ?>" name="profession_details"
                                                        id="profession_details" class="form-control">

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
                                                <label for="sibling_designation" class=" col-form-label">Brother's /
                                                    Sister
                                                    's Designation
                                                </label>
                                                <div class="">
                                                    <input value="<?php echo e(old('sibling_designation')); ?>" id="sibling_designation"
                                                        name="sibling_designation" placeholder="Designation" class="form-control here"
                                                        type="text">
                                                    <?php if($errors->has('sibling_designation')): ?>
                                                    <span class="text-danger" role="alert">
                                                        <strong><?php echo e($errors->first('sibling_designation')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="sibling_organization" class="col-form-label">Brother's /
                                                    Sister
                                                    's Organization Name
                                                </label>
                                                <div class="">
                                                    <input value="<?php echo e(old('sibling_organization')); ?>" id="sibling_organization"
                                                        name="sibling_organization" placeholder="Organization Name"
                                                        class="form-control here" type="text">
                                                    <?php if($errors->has('sibling_organization')): ?>
                                                    <span class="text-danger" role="alert">
                                                        <strong><?php echo e($errors->first('sibling_organization')); ?></strong>
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
                                            <label for="sibling_spouse_living" class=" col-form-label">Brother's /
                                                Sister
                                                's Spouse Living Status*
                                            </label>
                                            <div class="">
                                                <input <?php echo e(1 == old('sibling_spouse_living') ? 'checked' : ''); ?> type="radio"
                                                    name="sibling_spouse_living" id="sibling_spouse_living1" value="1"
                                                    class="liveStatusClassRS" />
                                                Alive
                                                <input <?php echo e(2 == old('sibling_spouse_living') ? 'checked' : ''); ?> type="radio"
                                                    name="sibling_spouse_living" id="sibling_spouse_living" value="2"
                                                    class="liveStatusClassRS" />
                                                Passed Away
                                                <?php if($errors->has('sibling_spouse_living')): ?>
                                                <br>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('sibling_spouse_living')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="liveStatusToLinkRelProfessionIdRS" style="display:none">
                                        <!---liveStatusToLinkRelProfessionIdRS-->
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="sibling_spouse_profession" class=" col-form-label">Brother's
                                                    / Sister
                                                    's Spouse Profession
                                                </label>
                                                <div class="">
                                                    <select name="sibling_spouse_profession" id="sibling_spouse_profession"
                                                        class="form-control"">
                                                  <option value="">Select One</option>
                                            <?php $__currentLoopData = professionType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('sibling_spouse_profession') == $key ?'selected':''); ?>  value="
                                                        <?php echo e($key); ?>"><?php echo e($item); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('sibling_spouse_profession')): ?>
                                        <br>
                                        <span class="
                                                        text-danger" role="alert">
                                                        <strong><?php echo e($errors->first('sibling_spouse_profession')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="professiondetails1" class="allHideClass2" style="display:none">

                                                    <label for="spouse_profession_details" class="col-form-label">Profession
                                                        Details</label>
                                                    <div class="">
                                                        <select data-oldval="<?php echo e(old('spouse_profession_details') ?? 0); ?>"
                                                            name="spouse_profession_details" id="spouse_profession_details"
                                                            class="form-control">

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
                                                    <label for="sibling_spouse_designation" class=" col-form-label">Brother's
                                                        / Sister
                                                        's Spouse Designation
                                                    </label>
                                                    <div class="">
                                                        <input value="<?php echo e(old('sibling_spouse_designation')); ?>" id="sibling_spouse_designation"
                                                            name="sibling_spouse_designation" placeholder="Designation"
                                                            class="form-control here" type="text">
                                                        <?php if($errors->has('sibling_spouse_designation')): ?>
                                                        <span class="text-danger" role="alert">
                                                            <strong><?php echo e($errors->first('sibling_spouse_designation')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="sibling_spouse_organizaion" class="col-form-label">Brother's
                                                        / Sister
                                                        's Spouse Organization Name
                                                    </label>
                                                    <div class="">
                                                        <input value="<?php echo e(old('sibling_spouse_organizaion')); ?>" id="sibling_spouse_organizaion"
                                                            name="sibling_spouse_organizaion" placeholder="Organization Name"
                                                            class="form-control here" type="text">
                                                        <?php if($errors->has('sibling_spouse_organizaion')): ?>
                                                        <span class="text-danger" role="alert">
                                                            <strong><?php echo e($errors->first('sibling_spouse_organizaion')); ?></strong>
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
                                    <div class="col-xs-12">
                                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save

                                        </button>
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
<?php echo $__env->make('sections.javascripts.signupsiblings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>