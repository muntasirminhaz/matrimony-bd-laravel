

<?php $__env->startSection('content'); ?>

<div class="container margin-50">
    <div class="row padding-0">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
        <div class="col-md-8 col-sm-12 center-block bg-warning ">
         
           
            <form class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e(route('signup.parentsStore')); ?>" role="form">
                <?php echo csrf_field(); ?>

                <div class="col-sm-6">
                    <h4 class="bold-text">Father's Information</h4>
                    <hr>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="fname" class=" col-form-label">Father's Name*
                            </label>
                            <div class="">
                                <input required="required" value="<?php echo e(old('fname')); ?>" id="fname" name="fname"
                                    placeholder="Name" class="form-control here" type="text">
                                <?php if($errors->has('fname')): ?>

                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('fname')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert">
                                    <strong id="err_fname"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="flstatus" class=" col-form-label">Father's Living Status*
                            </label>
                            <div class="">
                                <input required="required" <?php echo e(old('flstatus') == 1 ? 'checked':''); ?> type="radio" name="flstatus"
                                    id="flstatus1" value="1" class="fatherLiveStatusRadio flstat1" />
                                Alive
                                <input required="required" <?php echo e(old('flstatus') == 2 ? 'checked':''); ?> type="radio" name="flstatus"
                                    id="flstatus" value="2" class="fatherLiveStatusRadio flstat1" />
                                Passed Away
                                <?php if($errors->has('flstatus')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('flstatus')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert">
                                    <strong id="err_flstatus"></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="fsrvstatus" class=" col-form-label">Father's Service Status*
                            </label>
                            <div class="">
                                <input required="required" <?php echo e(old('fsrvstatus') == 1 ?'checked' : ''); ?> type="radio" id="fsrvstatus1"
                                    class="fsrvstatus serv" name="fsrvstatus" value="1" />In Service
                                <input required="required" <?php echo e(old('fsrvstatus') == 2 ?'checked' : ''); ?> type="radio" id="fsrvstatus2"
                                    class="fsrvstatus serv" name="fsrvstatus" value="2" />Retired
                                <input required="required" <?php echo e(old('fsrvstatus') == 3 ?'checked' : ''); ?> type="radio"
                                    class="fsrvstatus serv" name="fsrvstatus" value="3" /> Others
                                <?php if($errors->has('fsrvstatus')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('fsrvstatus')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert">
                                    <strong id="err_fsrvstatus"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!---liveStausLinkToServiceDivId--->
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="fprofession" class=" col-form-label">Father's Profession*
                            </label>
                            <div class="">
                                <select name="fprofession" id="fprofession" class="form-control"">
                                            <option value="">Select ...</option>
                                    <?php $__currentLoopData = professionType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('fprofession') == $key ?'selected':''); ?> value="
                                    <?php echo e($key); ?>"><?php echo e($item); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('fprofession')): ?>
                                <br>
                                <span class="
                                    text-danger" role="alert">
                                    <strong><?php echo e($errors->first('fprofession')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <span class="text-danger" role="alert">
                                        <strong id="err_fprofession"></strong>
                                    </span>
                            </div>
                        </div>

                        <!----col-xs-12---->
                    </div>

                    <div class="form-group row fatherother" style="display:none">
                        <div class="col-xs-12">
                            <label for="father_other" class=" col-form-label">Other Profession Details
                            </label>
                            <div class="">
                                <input value="<?php echo e(old('father_other')); ?>" id="father_other" name="father_other"
                                    placeholder="Other Profession Details" class="form-control here" type="text">
                                <?php if($errors->has('father_other')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('father_other')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>


                    <div class="form-group row father_profesion_details" style="display: none">
                        <div class="col-xs-12">
                            <label for="father_profesion_details" class="col-form-label">Father's Profession Details</label>
                            <div class="">
                                <select data-oldval="<?php echo e(old('profesion_details') ?? 0); ?>" name="father_profesion_details"
                                    id="father_profesion_details" class="form-control">
                                </select>
                                <?php if($errors->has('father_profesion_details')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('father_profesion_details')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="fdesignation" class=" col-form-label">Father's Designation*
                            </label>
                            <div class="">
                                <input required="required" value="<?php echo e(old('fdesignation')); ?>" id="fdesignation" name="fdesignation"
                                    placeholder="Designation" class="form-control here" type="text">
                                <?php if($errors->has('fdesignation')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('fdesignation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label for="forgname" class="col-form-label">Father's Organization / Business Name*
                            </label>
                            <div class="">
                                <input required="required" value="<?php echo e(old('forgname')); ?>" id="forgname" name="forgname"
                                    placeholder="Organization Name" class="form-control here" type="text">
                                <?php if($errors->has('forgname')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('forgname')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="bold-text">
                        Mother's Information
                    </h4>
                    <hr>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="mname" class=" col-form-label">Mother's Name*
                            </label>
                            <div class="">
                                <input required="required" value="<?php echo e(old('mname')); ?>" id="mname" name="mname"
                                    placeholder="Mother's Name" class="form-control here" type="text">
                                <?php if($errors->has('mname')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('mname')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert">
                                    <strong id="err_mname"></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="mlstatus" class=" col-form-label">Mother's Living Status*
                            </label>
                            <div class="">
                                <input required="required" <?php echo e(old('mlstatus') == 1 ? 'checked':''); ?> type="radio" name="mlstatus"
                                    id="mlstatus1" value="1" class="motherLiveStatusRadio mls" />
                                Alive
                                <input required="required" <?php echo e(old('mlstatus') == 2 ? 'checked':''); ?> type="radio" name="mlstatus"
                                    id="mlstatus" value="2" class="motherLiveStatusRadio mls" />
                                Passed Away
                                <?php if($errors->has('mlstatus')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('mlstatus')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert">
                                    <strong id="err_mlstatus"></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="msrvstatus" class=" col-form-label">Mother's Service Status*
                            </label>
                            <div class="">
                                <input required="required" <?php echo e(old('msrvstatus') == 1 ?'checked' : ''); ?> type="radio" id="msrvstatus1"
                                    class="msrvstatus mss" name="msrvstatus" value="1" />In Service
                                <input required="required" <?php echo e(old('msrvstatus') == 2 ?'checked' : ''); ?> type="radio" id="msrvstatus2"
                                    class="msrvstatus mss" name="msrvstatus" value="2" />Retired
                                <input required="required" <?php echo e(old('msrvstatus') == 3 ?'checked' : ''); ?> type="radio"
                                    class="msrvstatus mss" name="msrvstatus" value="3" /> Others
                                <?php if($errors->has('msrvstatus')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('msrvstatus')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert">
                                    <strong id="err_msrvstatus"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="mprofession" class=" col-form-label">Mother's Profession*
                            </label>
                            <div class="">
                                <select name="mprofession" id="mprofession" class="form-control"">
                                                    <option value="">Select ...</option>
                                    <?php $__currentLoopData = professionType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('mprofession') == $key ?'selected':''); ?> value="
                                    <?php echo e($key); ?>"><?php echo e($item); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('mprofession')): ?>
                                <br>
                                <span class="
                                    text-danger" role="alert">
                                    <strong><?php echo e($errors->first('mprofession')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <span class="text-danger" role="alert">
                                        <strong id="err_mprofession"></strong>
                                    </span>
                            </div>
                        </div>

                        <!----col-xs-12---->
                    </div>

                    <div class="form-group row motherother" style="display:none">
                        <div class="col-xs-12">
                            <label for="mother_other" class=" col-form-label">Other Profession Details
                            </label>
                            <div class="">
                                <input value="<?php echo e(old('mother_other')); ?>" id="mother_other" name="mother_other"
                                    placeholder="Other Profession Details" class="form-control here" type="text">
                                <?php if($errors->has('mother_other')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('mother_other')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>


                    <div class="form-group row mother_profesion_details" style="display: none">
                        <div class="col-xs-12">
                            <label for="mother_profesion_details" class="col-form-label">Mother's Profession Details</label>
                            <div class="">
                                <select data-oldval="<?php echo e(old('mother_profesion_details') ?? 0); ?>" name="mother_profesion_details"
                                    id="mother_profesion_details" class="form-control">
                                </select>
                                <?php if($errors->has('mother_profesion_details')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('mother_profesion_details')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="mdesignation" class=" col-form-label">Designation*
                            </label>
                            <div class="">
                                <input required="required" value="<?php echo e(old('mdesignation')); ?>" id="mdesignation" name="mdesignation"
                                    placeholder="Designation" class="form-control here" type="text">
                                <?php if($errors->has('mdesignation')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('mdesignation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="morgname" class="col-form-label">Mother's Organization / Business Name*
                            </label>
                            <div class="">
                                <input required="required" value="<?php echo e(old('morgname')); ?>" id="morgname" name="morgname"
                                    placeholder="Organization Name" class="form-control here" type="text">
                                <?php if($errors->has('morgname')): ?>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('morgname')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="col-sm-12">

                    <div class="form-group row">
                        <div class="col-xs-5">
                            <label for="landyeno" class=" col-form-label">Have any land/flat in Dhaka/Nearby
                            </label>
                            <div class="">
                                <input required="required" <?php echo e(old('landyeno') == 1 ? 'checked':''); ?> type="radio" name="landyeno"
                                    id="landyeno1" value="1" class="landyesno hanflat" />
                                No
                                <input required="required" <?php echo e(old('landyeno') == 2 ? 'checked':''); ?> type="radio" name="landyeno"
                                    id="landyeno" value="2" class="landyesno hanflat" />
                                Yes
                                <?php if($errors->has('landyeno')): ?>
                                <br>
                                <span class="text-danger" role="alert">
                                    <strong><?php echo e($errors->first('landyeno')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <span class="text-danger" role="alert"><br>
                                    <strong id="err_landyeno"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-7">
                            <div id="landDivHide" style="display:none">
                                <label for="landyeno" class=" col-form-label">Types of Land/Flat
                                </label>
                                <div class="">
                                    <?php $__currentLoopData = landType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label for="<?php echo e($key); ?>" class="margin-right-10">
                                        <input <?php echo e(old($key) == $key ? 'checked':''); ?> type="checkbox" name="typeland[]"
                                            id="<?php echo e($key); ?>" value="<?php echo e($key); ?>" class="<?php echo e($key); ?> tofland" /> <?php echo e($value); ?>

                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <span class="text-danger" role="alert">
                                        <br>
                                        <strong id="err_typeland"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="familybackground" class="col-form-label">Family Backgroud*
                            </label>
                            <textarea class="form-control" name="familybackground" id="familybackground" rows="5"><?php echo e(old('familybackground')); ?></textarea>
                            <span class="text-danger" role="alert">
                                <strong id="err_familybackground"></strong>
                            </span>
                        </div>
                    </div>

                </div>


                <hr>

                <div class="col-xs-12">
                    <div class="form-group row">
                        <!--

                        <div class="col-xs-6">
                            <button type="button" class="signupbutton btn btn-large btn-block btn-danger">Skip Now and
                                Continue</button>
                            
                        </div>
                     -->
                        <div class="col-xs-12">
                            <button id="submit" type="submit" class="signupbutton btn btn-large btn-block btn-success">Save
                                and
                                Continue</button>

                        </div>

                    </div>
                </div>


            </form>

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerscript'); ?>
<?php echo $__env->make('sections.javascripts.signup_parents', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('sections.javascripts.signup_parents2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>