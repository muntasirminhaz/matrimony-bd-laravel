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
                            <form novalidate class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e($formAction); ?>"
                                role="form">
                                <?php echo csrf_field(); ?>

                                <div class="form-group row">
                                    <h3>Basic Information</h3>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 padding-0">
                                        <label for="minage" class="col-form-label col-xs-12">
                                            Age Between
                                            <span></span></label>
                                        <div class="col-sm-6  padding-">
                                            <input value="<?php echo e(Auth::user()->preference_min_age); ?>" id="minage" name="minage"
                                                class="form-control here" type="text">
                                            <?php if($errors->has('minage')): ?>
                                            <p class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('minage')); ?></strong>
                                            </p>
                                            <?php endif; ?>
                                            <p class="text-danger" role="alert">
                                                <strong id="err_minage"></strong>
                                            </p>
                                        </div>
                                        <div class="col-sm-6 padding-">
                                            <input value="<?php echo e(Auth::user()->preference_max_age); ?>" id="maxage" name="maxage" placeholder="Max Age"
                                                class="form-control here" type="text">
                                            <?php if($errors->has('maxage')): ?>
                                            <p class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('maxage')); ?></strong>
                                            </p>
                                            <?php endif; ?>
                                            <p class="text-danger" role="alert">
                                                <strong id="err_maxage"></strong>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="mstatus" class=" col-form-label">Marital Status
                                        </label>
                                        <div class="">
                                            <select name="mstatus" id="mstatus" class="classMarital form-control"
                                                required="required">
                                                <option value="">Select... </option>
                                                <?php $__currentLoopData = maritalstatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->preference_marital_status == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('mstatus')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('mstatus')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_mstatus"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="childallow" class=" col-form-label">Children Allow
                                        </label>
                                        <div class="">
                                            <div class="radio">
                                                <label class="margin-right-10">
                                                    <input class="chilAlow" required="required"
                                                        <?php echo e(Auth::user()->preference_children_allow == 1? 'checked' : ''); ?> type="radio" name="childallow"
                                                        value="1">
                                                    Yes
                                                </label>
                                                <label class="margin-right-10">
                                                    <input class="chilAlow" required="required"
                                                        <?php echo e(Auth::user()->preference_children_allow == 2? 'checked' : ''); ?> type="radio" name="childallow"
                                                        value="2">
                                                    No
                                                </label>
                                            </div>

                                        </div>
                                        <?php if($errors->has('childallow')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('childallow')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <span class="text-danger" role="alert">
                                            <strong id="err_childallow"></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="height" class=" col-form-label">Height
                                        </label>
                                        <select name="height" id="input" class="form-control" required="required">
                                            <option value="">Select Height ... </option>
                                            <?php $__currentLoopData = height(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(Auth::user()->preference_height == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('height')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('height')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <span class="text-danger" role="alert">
                                            <strong id="err_height"></strong>
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="religion" class="col-form-label">Religion
                                        </label>
                                        <div class="">
                                            <select required='required' name="religion" id="religion" class="form-control">
                                                <option value="">Select Religion ...</option>
                                                <?php $__currentLoopData = religion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->preference_religion == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('religion')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('religion')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_religion"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <h3>Education and Career</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="profession">Profession Level</label>
                                        <div class="">
                                            <select name="profession[]" class="form-control" id="profession" multiple="multiple">
                                                <?php $__currentLoopData = professionType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->preference_profession == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('professionType')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('professionType')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_profession"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label" for="education">Education Level</label>
                                        <div class="">
                                            <select name="education[]" class="form-control" id="education" multiple="multiple">
                                                <?php $__currentLoopData = educationLevel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->preference_education == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('education')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('education')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_education"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <h3>Location</h3>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="familydistrict">Prefered Home District</label>
                                        <select name="familydistrict[]" class="form-control" id="familydistrict"
                                            multiple>
                                            <option value="">Select one district</option>
                                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(Auth::user()->preference_home_district == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <!---No select 0 value option, from value started 1--->
                                        <?php if($errors->has('familydistrict')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('familydistrict')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <span class="text-danger" role="alert">
                                            <strong id="err_familydistrict"></strong>
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label" for="country">Living Country</label>
                                        <div class="">
                                            <select name="country[]" class="form-control" id="country" multiple="multiple">
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->preference_living_country == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('country')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('country')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_country"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="familycity">Family Resident City</label>
                                        <input value="<?php echo e(Auth::user()->preference_family_resident_city); ?>" id="familycity" name="familycity"
                                            class="form-control" type="text">
                                        <?php if($errors->has('familycity')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('familycity')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <span class="text-danger" role="alert">
                                            <strong id="err_familycity"></strong>
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label" for="familyresidentstatus">Family Resident Status</label>
                                        <div class="radio">
                                            <label>
                                                <input class="familResid"
                                                    <?php echo e(Auth::user()->preference_family_residential_status  == 1 ? 'checked' : ''); ?> required="required"
                                                    type="radio" name="familyresidentstatus" value="1">
                                                Owner
                                            </label>
                                            <label>
                                                <input class="familResid"
                                                    <?php echo e(Auth::user()->preference_family_residential_status  == 2 ? 'checked' : ''); ?> required="required"
                                                    type="radio" name="familyresidentstatus" value="2">
                                                Rental
                                            </label>
                                            <label>
                                                <input class="familResid"
                                                    <?php echo e(Auth::user()->preference_family_residential_status == 3 ? 'checked' : ''); ?> required="required"
                                                    type="radio" name="familyresidentstatus" value="3">
                                                No Preference
                                            </label>
                                            <?php if($errors->has('familyresidentstatus')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('familyresidentstatus')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_familyresidentstatus"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <h3>Additional Information</h3>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label for="income" class=" col-form-label">Monthly Income
                                        </label>
                                        <div class="">
                                            <input value="<?php echo e(Auth::user()->preference_monthly_income); ?> Taka" required="required" type="text" name="income"
                                                id="income" class="form-control">
                                            <?php if($errors->has('income')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('income')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_income"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="bodytype" class=" col-form-label">Body Type
                                        </label>
                                        <div class="">
                                            <select name="bodytype" id="input" class="form-control" required="required">
                                                <option value="">Select...</option>
                                                <?php $__currentLoopData = bodytype(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->preference_body_type == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('bodytype')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('bodytype')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_bodytype"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="skintone" class=" col-form-label">Skin Tone
                                        </label>
                                        <div class="">
                                            <select name="skintone" id="input" class="form-control" required="required">
                                                <option value="">Select...</option>
                                                <?php $__currentLoopData = skintone(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->preference_skintone == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('skintone')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('skintone')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_skintone"></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="disability" class="col-form-label">Disability
                                        </label>
                                        <div class="padding-10-0">
                                            <label>
                                                <input class="Disabl" required="required"
                                                    <?php echo e(Auth::user()->preference_disability == 1 ? 'checked' :''); ?> type="radio" name="disablity"
                                                    id="nodisability" value="1">
                                                No.
                                            </label>
                                            <label>
                                                <input class="Disabl" required="required"
                                                    <?php echo e(Auth::user()->preference_disability == 2 ? 'checked' :''); ?> type="radio" name="disablity"
                                                    id="yesdisability" value="2">
                                                Yes.
                                            </label>
                                            <?php if($errors->has('disability')): ?>
                                            <p class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('disability')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                                <span class="text-danger" role="alert">
                                                    <strong id="err_disablity"></strong>
                                                </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="disability" class="col-form-label">NRB/Immigrant Preferable
                                        </label>
                                        <div class="padding-10-0">
                                            <label>
                                                <input class="claNrb" required="required"
                                                    <?php echo e(Auth::user()->preference_nrb == 1 ? 'checked' :''); ?> type="radio" name="nrb" id="nrb1"
                                                    value="1">
                                                Yes
                                            </label>
                                            <label>
                                                <input class="claNrb" required="required"
                                                    <?php echo e(Auth::user()->preference_nrb == 2 ? 'checked' :''); ?> type="radio" name="nrb" id="nrb2"
                                                    value="2">
                                                No
                                            </label>
                                            <label>
                                                <input class="claNrb" required="required"
                                                    <?php echo e(Auth::user()->preference_nrb == 3 ? 'checked' :''); ?> type="radio" name="nrb" id="nrb3"
                                                    value="3">
                                                Doesn't Matter
                                            </label>
                                            <?php if($errors->has('disability')): ?>
                                            <p class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('disability')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                                <span class="text-danger" role="alert">
                                                    <strong id="err_nrb"></strong>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label for="describe" class=" col-form-label">More Information
                                        </label>
                                        <div class="">
                                            <textarea placeholder="Provide some additional preference about partner."
                                                class="form-control" name="describe" id="describe" cols="30" rows="4"><?php echo e(Auth::user()->preference_moreinfo); ?></textarea>
                                            <?php if($errors->has('describe')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('describe')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_describe"></strong>
                                            </span>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_describe"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save
                                            and
                                            Continue</button>

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
<?php echo $__env->make('sections.javascripts.signup_preference', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link href="<?php echo e(asset('assets/fselect/fselect.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('assets/fselect/fselect.js')); ?>"></script>

<style>
    .fs-wrap {
    display: inline-block !important;
    cursor: pointer  !important;
    width: 100%  !important;
}
.fs-label-wrap {
    border-radius: 5px  !important;
    border-radius: 4px  !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)  !important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)  !important;
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s  !important;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s  !important;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s  !important;
    display: block  !important;
    width: 100%  !important;
    height: 34px  !important;
    text-indent: 7px  !important;
    padding-top: 3px  !important;
}
</style>
<script type="text/javascript">
    $(document).ready(function () {

        $('#profession').fSelect();
        $('#education').fSelect();
        $('#country').fSelect();
        $('#familydistrict').fSelect();
        //===========================================================
        $("body").on("click", "#submit", function () {
            var err = 0;
            $(
                "#err_minage, #err_maxage , #err_mstatus , #err_childallow  , #err_height, #err_religion, #err_,#err_, #err_familydistrict,#err_country,#err_familycity,#err_familyresidentstatus,#err_income,#err_bodytype,#err_skintone,#err_disablity,#err_nrb,#err_describe"
            ).text("");

            var minage = $("input[name='minage']").val();
            var maxage = $("input[name='maxage']").val();
            var mstatus = $("select[name='mstatus']").val();
            var height = $("select[name='height']").val();
            var religion = $("select[name='religion']").val();
            //var profession = $("select[name='profession']").val();
            var familydistrict = $("select[name='familydistrict']").val();
            var country = $("select[name='country']").val();
            var familycity = $("input[name='familycity']").val();
            var income = $("input[name='income']").val();
            var bodytype = $("select[name='bodytype']").val();
            var skintone = $("select[name='skintone']").val();
            var describe = $("textarea[name='describe']").val();

            if (minage == "") {
                $("#err_minage").text("Age Between Required");
                err++;
            }
            if (maxage == "") {
                $("#err_maxage").text("Max age  Required");
                err++;
            }
            if (mstatus == "") {
                $("#err_mstatus").text("Marital Status  Required");
                err++;
            }
            if (!$(".chilAlow").is(":checked")) {
                $("#err_childallow").text("Children Allow Required");
                err++;
            }
            if (height == "") {
                $("#err_height").text("Height Required");
                err++;
            }
            if (religion == "") {
                $("#err_religion").text("Religion Required");
                err++;
            }
            /* baki ase 2 ta*/

            if (familydistrict == "") {
                $("#err_familydistrict").text("Prefered Home District Required");
                err++;
            }
            if (country == "") {
                $("#err_country").text("Living Country Required");
                err++;
            }
            if (familycity == "") {
                $("#err_familycity").text("Family Resident City Required");
                err++;
            }

            if (!$(".familResid").is(":checked")) {
                $("#err_familyresidentstatus").text("Family Resident Status Required");
                err++;
            }
            if (income == "") {
                $("#err_income").text("Monthly Income Required");
                err++;
            }
            if (bodytype == "") {
                $("#err_bodytype").text("Body Type Required");
                err++;
            }
            if (skintone == "") {
                $("#err_skintone").text("Skin Tone Required");
                err++;
            }
            if (!$(".Disabl").is(":checked")) {
                $("#err_disablity").text("Disability Required");
                err++;
            }
            if (!$(".claNrb").is(":checked")) {
                $("#err_nrb").text("NRB/Immigrant Preferable Required");
                err++;
            }
            if (describe == "") {
                $("#err_describe").text("More Information Required");
                err++;
            }
            /*
            else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                err++;
            }*/

            if (err > 0) {
                return false;
            }
            return false;
        });
        //===========================================================
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>