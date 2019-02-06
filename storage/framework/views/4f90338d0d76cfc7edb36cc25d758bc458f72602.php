

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
                                    <div class="col-sm-4">
                                        <label for="height" class=" col-form-label">Height
                                        </label>
                                        <select name="height" id="input" class="form-control" required="required">
                                            <option value="">Select Height ... </option>
                                            <?php $__currentLoopData = height(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(Auth::user()->height == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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

                                    <div class="col-sm-4">
                                        <label for="weight" class=" col-form-label">Weight
                                        </label>
                                        <div class="">

                                            <select name="weight" id="input" class="form-control" required="required">
                                                <option value="">Select Weight ....</option>
                                                <?php for($i = 30; $i < 121; $i++): ?> <option
                                                    <?php echo e(Auth::user()->weight == $i ? 'selected' : ''); ?> value="<?php echo e($i); ?>"><?php echo e($i); ?> kg</option>
                                                    <?php endfor; ?>
                                            </select>
                                            <?php if($errors->has('weight')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('weight')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_weight"></strong>
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="bodytype" class=" col-form-label">Body Type
                                        </label>
                                        <div class="">
                                            <select name="bodytype" id="input" class="form-control" required="required">
                                                <option value="">Select Body Type</option>
                                                <?php $__currentLoopData = bodytype(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->body_type == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-4">
                                        <label for="blood_group" class=" col-form-label">Blood Group
                                        </label>
                                        <div class="">
                                            <select name="blood_group" id="input" class="form-control" required="required">
                                                <option value="">Select Blood Group</option>
                                                <?php $__currentLoopData = bloodGroups(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->blood_group == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('blood_group')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('blood_group')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_blood_group"></strong>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <label for="skintone" class=" col-form-label">Skin Tone
                                        </label>
                                        <div class="">
                                            <select name="skintone" id="input" class="form-control" required="required">
                                                <option value="">Select Skin Tone</option>
                                                <?php $__currentLoopData = skintone(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->skin_tone == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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
                                    <div class="col-sm-4">
                                        <label for="diet" class=" col-form-label">
                                            Diet Type
                                        </label>
                                        <div class="">
                                            <select name="diet" id="diet" class="form-control" required="required">
                                                <option value="">Select Diet ... </option>
                                                <?php $__currentLoopData = diet(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->diet_type == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('diet')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('diet')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_diet"></strong>
                                            </span>
                                        </div>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="sunsign" class=" col-form-label">
                                            Sun Sign
                                        </label>
                                        <div class="">
                                            <select name="sunsign" id="sunsign" class="form-control" required="required">
                                                <option value="">Select sunsign ... </option>
                                                <?php $__currentLoopData = sunsign(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->sun_sign == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('sunsign')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('sunsign')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_sunsign"></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="drinks" class=" col-form-label">Do you Drink?
                                        </label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="drickCla" required="required"
                                                        <?php echo e(Auth::user()->drink == 1? 'checked' : ''); ?> type="radio"
                                                        name="drinks" value="1">
                                                    No.
                                                </label>
                                                <label>
                                                    <input class="drickCla" required="required"
                                                        <?php echo e(Auth::user()->drink == 2? 'checked' : ''); ?> type="radio"
                                                        name="drinks" value="2">
                                                    Yes.
                                                </label>
                                                <label>
                                                    <input class="drickCla" required="required"
                                                        <?php echo e(Auth::user()->drink == 3? 'checked' : ''); ?> type="radio"
                                                        name="drinks" value="3">
                                                    Occasionally.
                                                </label>
                                            </div>
                                            <?php if($errors->has('drinks')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('drinks')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_drinks"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="smoke" class=" col-form-label">Do you Smoke?
                                        </label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="claSmok" required="required"
                                                        <?php echo e(Auth::user()->smoke == 1? 'checked' : ''); ?> type="radio"
                                                        name="smoke" value="1">
                                                    No.
                                                </label>
                                                <label>
                                                    <input class="claSmok" required="required"
                                                        <?php echo e(Auth::user()->smoke == 2? 'checked' : ''); ?> type="radio"
                                                        name="smoke" value="2">
                                                    Yes.
                                                </label>
                                                <label>
                                                    <input class="claSmok" required="required"
                                                        <?php echo e(Auth::user()->smoke == 3? 'checked' : ''); ?> type="radio"
                                                        name="smoke" value="3">
                                                    Occasionally.
                                                </label>
                                            </div>
                                            <?php if($errors->has('smoke')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('smoke')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_smoke"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="income" class=" col-form-label">Annual Income
                                        </label>
                                        <div class="">
                                            <input required="required" type="text" name="income" id="income" class="form-control"
                                                value="<?php echo e(Auth::user()->annual_income); ?> Taka">
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
                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="hobbies" class=" col-form-label">Interests and Hobbies</label>
                                            <div class="">
                                                <input required="required" value="<?php echo e(Auth::user()->hobby); ?>" class="form-control"
                                                    placeholder="Interests and hobbies" type="text" name="hobbies">
                                                <?php if($errors->has('hobbies')): ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('hobbies')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                                <span class="text-danger" role="alert">
                                                    <strong id="err_hobbies"></strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="mstatus" class=" col-form-label">Marital Status
                                        </label>
                                        <div class="">
                                            <select name="mstatus" id="mstatus" class="classMarital form-control"
                                                required="required">
                                                <option value="">Select... </option>
                                                <?php $__currentLoopData = maritalstatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->marital_status == $key ? 'selected' : ''); ?>

                                                    value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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
                                    <div class="col-sm-6 howmanychildform" style="display: none">
                                        <div class="">
                                            <label for="howmanychild" class=" col-form-label">How many Children do you
                                                have?</label>
                                            <div class="">
                                                <input id="howmanychild" value="<?php echo e(Auth::user()->how_many_children); ?>"
                                                    class="form-control" placeholder="Number of Children" type="text"
                                                    name="howmanychild">
                                                <?php if($errors->has('howmanychild')): ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('howmanychild')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-3">
                                        <label for="language" class=" col-form-label">Mother Tongue
                                        </label>
                                        <div class="">
                                            <select name="language" id="language" class="classMarital form-control"
                                                required="required">
                                                <option value="">Select... </option>
                                                <?php $__currentLoopData = motherTongue(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('language') == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('language')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('language')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="language"></strong>
                                            </span>
                                        </div>

                                    </div>

                                    <div class="col-sm-4">
                                        <label for="disability" class=" col-form-label">Do you have disability?
                                        </label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="inputDisability" required="required"
                                                        <?php echo e(Auth::user()->disability == 0? 'checked' : ''); ?> type="radio"
                                                        name="disability" value="0">
                                                    No.
                                                </label>
                                                <label>
                                                    <input id="inputDisabilityYes" class="inputDisability" required="required"
                                                        <?php echo e(Auth::user()->disability == 1? 'checked' : ''); ?> type="radio"
                                                        name="disability" value="1">
                                                    Yes.
                                                </label>
                                            </div>
                                            <?php if($errors->has('disability')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('disability')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 explain_disability">
                                        <label for="explain_disability" class=" col-form-label">Please provide details
                                            about your disability.
                                        </label>
                                        <textarea name="explain_disability" id="explain_disability" class="form-control"
                                            rows="3"><?php echo e(Auth::user()->explain_disability); ?></textarea>
                                    </div>
                                </div>

                                

                                <?php if(Auth::user()->religion == 1): ?>                                    

                                <div class="form-group row">

                                    <div class="col-sm-3">
                                        <label for="says_payer" class=" col-form-label">Say Payer
                                        </label>
                                        <div class="">
                                            <select name="says_payer" id="says_payer" class="form-control"
                                                required="required">
                                                <option value="">Select... </option>
                                                <?php $__currentLoopData = sayPayer(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('says_payer') == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('says_payer')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('says_payer')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="says_payer"></strong>
                                            </span>
                                        </div>

                                    </div>
                                    <?php if(Auth::user()->gender == 2): ?>

                                    <div class="col-sm-4">
                                        <label for="wear_hijab" class=" col-form-label">Wear Hijab
                                        </label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="wear_hijab" required="required"
                                                        <?php echo e(Auth::user()->wear_hijab == 0? 'checked' : ''); ?> type="radio"
                                                        name="wear_hijab" value="0">
                                                    No.
                                                </label>
                                                <label>
                                                    <input id="wear_hijab" class="wear_hijab" required="required"
                                                        <?php echo e(Auth::user()->wear_hijab == 1? 'checked' : ''); ?> type="radio"
                                                        name="wear_hijab" value="1">
                                                    Yes.
                                                </label>
                                            </div>
                                            <?php if($errors->has('wear_hijab')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('wear_hijab')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="wear_hijab_after_marriage" class=" col-form-label">Wear Hijab After Marriage
                                        </label>
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    <input class="wear_hijab_after_marriage" required="required"
                                                        <?php echo e(Auth::user()->wear_hijab_after_marriage == 0? 'checked' : ''); ?> type="radio"
                                                        name="wear_hijab_after_marriage" value="0">
                                                    No.
                                                </label>
                                                <label>
                                                    <input id="wear_hijab_after_marriage" class="wear_hijab_after_marriage" required="required"
                                                        <?php echo e(Auth::user()->wear_hijab_after_marriage == 1? 'checked' : ''); ?> type="radio"
                                                        name="wear_hijab_after_marriage" value="1">
                                                    Yes.
                                                </label>
                                            </div>
                                            <?php if($errors->has('wear_hijab_after_marriage')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('wear_hijab_after_marriage')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                   
                                </div>

                                <?php endif; ?>


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
<script>
    $(function () {
        //==================================================================  
        $("body").on("click", "#submit", function () {
            var err = 0; // check box
            $(
                "#err_height, #err_weight  , #err_bodytype , #err_blood_group, #err_skintone ,#err_diet , #err_sunsign, #err_drinks, #err_smoke ,#err_income , #err_hobbies ,#err_mstatus "
            ).text("");

            var height = $("select[name='height']").val();
            var weight = $("select[name='weight']").val();
            var bodytype = $("select[name='bodytype']").val();
            var blood_group = $("select[name='blood_group']").val();
            var skintone = $("select[name='skintone']").val();
            var diet = $("select[name='diet']").val();
            var sunsign = $("select[name='sunsign']").val();
            //var drinks = $("input[name='drinks']").val();          
            //var smoke = $("input[name='smoke']").val();
            var income = $("input[name='income']").val();
            var hobbies = $("input[name='hobbies']").val();
            var mstatus = $("select[name='mstatus']").val();


            if (height == "") {
                $("#err_height").text("Height Required");
                err++;
            }
            if (weight == "") {
                $("#err_weight").text("Weight Required");
                err++;
            }

            if (bodytype == "") {
                $("#err_bodytype").text("Body Type Required");
                err++;
            }
            /*           
                       else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                           $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                           err++;
                       }*/
            if (blood_group == "") {
                $("#err_blood_group").text("Blood Group Required");
                err++;
            }
            if (skintone == "") {
                $('#err_skintone').text("Skin Tone  Required");
                err++;
            }
            if (diet == "") {
                $("#err_diet").text("Diet Type Required");
                err++;
            }
            if (sunsign == "") {
                $("#err_sunsign").text("Sun Sign Required");
                err++;
            }
            if (!$(".drickCla").is(":checked")) {
                $("#err_drinks").text("Do you Drink Required");
                err++;
            }
            if (!$(".claSmok").is(":checked")) {
                $("#err_smoke").text("Do you Smoke Required");
                err++;
            }
            if (income == "") {
                $("#err_income").text("Annual Income Required");
                err++;
            }

            if (hobbies == "") {
                $("#err_hobbies").text("Interests and Hobbies Required");
                err++;
            }
            if (mstatus == "") {
                $("#err_mstatus").text("Marital Status Required");
                err++;
            }

            if (err > 0) {
                return false;
            }
            return true;
        });

        //==================================================================      
        howmanychild();

        function howmanychild(mstatus_value) {
            if ($('#mstatus').val() > 1) {
                $('.howmanychildform').show(100);
                $('#howmanychild').attr('required', 'required');

            } else {
                $('.howmanychildform').hide(100);
                $('#howmanychild').val('');
                $('#howmanychild').removeAttr('required');
            }
        }
        $('#mstatus').change(function (e) {
            howmanychild();
        });


        $('.explain_disability').hide();


        if ($('#inputDisabilityYes').is(':checked')) {
            $('.explain_disability').show(100);
            $('#explain_disability').attr('required', 'required');
        } else {
            $('.explain_disability').hide(50);
            $('#explain_disability').removeAttr('required');
        }
        $('.inputDisability').on('click', function () {
            if ($(this).val() == 1) {
                $('.explain_disability').show(100);
                $('#explain_disability').attr('required', 'required');
            } else {
                $('.explain_disability').hide(50);
                $('#explain_disability').removeAttr('required');

            }
        });



    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>