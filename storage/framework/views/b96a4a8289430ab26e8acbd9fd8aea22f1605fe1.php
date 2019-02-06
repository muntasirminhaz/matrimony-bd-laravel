<?php $__env->startSection('content'); ?>
<div class="col-xs-1 hidden-sm">
</div>
<div class="col-xs-10 bg-warning margin-bottom-20 margin-top-10">

    <form novalidate class="padding-5" action="<?php echo e(route('users.advanceSearch.showResults')); ?>" method="get" class="form">
        <div class="form-group row">
            <h1 class="title text-center">Advance Search</h1>
            <hr>
        </div>



        <div class="form-group col-xs-12 padding-0">

            <label for="age" class="col-xs-12 control-label">Age</label>

            <div class="col-xs-6">
                <input value="<?php echo e(app('request')->input('agemin')); ?>" type="text" name="agemin" class="form-control" id="age"
                    placeholder="Minimum Age">
            </div>
            <div class="col-xs-6">
                <input value="<?php echo e(app('request')->input('agemax')); ?>" type="text" name="agemax" class="form-control" id="age"
                    placeholder="Maximum Age">
            </div>

        </div>

        <div class="form-group col-xs-3">

            <label for="height" class=" col-form-label">Height
            </label>

            <select name="height[]" id="height" class="form-control myDropDown" required="required" multiple>
                <?php $__currentLoopData = height(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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


        <div class="form-group col-sm-3 padding-0">
            <label for="religion" class="col-xs-3 control-label">Religion</label>
            <div class="col-xs-12">
                <select name="religion[]" id="religion" class="form-control" multiple>
                    <?php $__currentLoopData = religion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="form-group col-sm-3 padding-0">
            <label for="education" class="col-xs-12 control-label">Education</label>
            <div class="col-xs-12">
                <select name="education[]" id="education" class="form-control" multiple>
                    <?php $__currentLoopData = educationLevel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="form-group col-sm-3 padding-0">
            <label for="profession" class="col-xs-12 col-form-label">Profession</label>
            <div class="col-xs-12">
                <select name="profession[]" id="profession" class="form-control myDropDown" required="required" multiple>
                    <?php $__currentLoopData = profileProfession(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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


        <div class="form-group col-sm-3 padding-0">
            <label for="diet" class="col-xs-12 col-form-label">
                Diet Type
            </label>
            <div class="col-xs-12">
                <select name="diet[]" id="diet" class="form-control  myDropDown" required="required" multiple>
                    <?php $__currentLoopData = diet(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
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

        <div class="form-group col-sm-3 padding-0">
            <label for="skintone" class="col-xs-12 col-form-label">Skin Tone
            </label>
            <div class="col-xs-12">
                <select name="skintone[]" id="skintone" class="form-control myDropDown" required="required" multiple>
                    <?php $__currentLoopData = skintone(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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

        <div class="form-group col-sm-3 padding-0">
            <label for="bodytype" class="col-xs-12 col-form-label">Body Type
            </label>
            <div class="col-xs-12">
                <select name="bodytype[]" id="input" class="form-control myDropDown" required="required" multiple>
                    <?php $__currentLoopData = bodytype(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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

        <div class="form-group col-sm-3 padding-0">

            <label for="sunsign" class="col-xs-12 col-form-label">
                Sun Sign
            </label>
            <div class="col-xs-12">
                <select name="sunsign[]" id="sunsign" class="form-control myDropDown" required="required" multiple>
                    <?php $__currentLoopData = sunsign(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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




        <div class="form-group col-sm-3 padding-0"">
                <label for=" drinks" class="col-xs-12 col-form-label">Drinks?</label>
            <div class="col-xs-12">
                <div class="radio">
                    <label>
                        <input class="drickCla" required="required" type="radio" name="drinks" value="1">
                        No.
                    </label>
                    <label>
                        <input class="drickCla" required="required" type="radio" name="drinks" value="2">
                        Yes.
                    </label>
                    <label>
                        <input class="drickCla" required="required" type="radio" name="drinks" value="3">
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

        <div class="form-group col-sm-3 padding-0"">
                <label for=" smoke" class="col-xs-12 col-form-label">Smokes?</label>
            <div class="col-xs-12">
                <div class="radio">
                    <label>
                        <input class="claSmok" required="required" type="radio" name="smoke" value="1">
                        No.
                    </label>
                    <label>
                        <input class="claSmok" required="required" type="radio" name="smoke" value="2">
                        Yes.
                    </label>
                    <label>
                        <input class="claSmok" required="required" type="radio" name="smoke" value="3">
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

        <div class="form-group col-sm-3 padding-0">

            <label for="disability" class="col-xs-12 col-form-label">Has Disability?
            </label>
            <div class="col-xs-12">
                <div class="radio">
                    <label>
                        <input class="inputDisability" required="required" type="radio" name="disability" value="0">
                        No.
                    </label>
                    <label>
                        <input id="inputDisabilityYes" class="inputDisability" required="required" type="radio" name="disability"
                            value="1">
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
        <div class="form-group col-sm-3 padding-0">
            <label for="childallow" class="col-xs-12 col-form-label">Children Allow
            </label>
            <div class="col-xs-12">
                <div class="radio">
                    <label class="margin-right-10">
                        <input class="chilAlow" required="required" type="radio" name="childallow" value="1">
                        Yes
                    </label>
                    <label class="margin-right-10">
                        <input class="chilAlow" required="required" type="radio" name="childallow" value="2">
                        No
                    </label>
                </div>

            </div>
            <?php if($errors->has('childallow')): ?>
            <span class="text-danger" role="alert">
                <strong><?php echo e($errors->first('childallow')); ?></strong>
            </span>
            <?php endif; ?>
        </div>


        <div class="form-group col-sm-3 padding-0">
            <label for="language" class="col-xs-12 col-form-label">Mother Tongue
            </label>
            <div class="col-xs-12">
                <select name="language[]" id="language" class="myDropDown form-control" required="required" multiple>
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
        <div class="form-group col-sm-3 padding-0">
            <label for="mstatus" class="col-xs-12 col-form-label">Marital Status
            </label>
            <div class="col-xs-12">
                <select name="mstatus[]" id="mstatus" class="myDropDown form-control" required="required" multiple>
                    <?php $__currentLoopData = maritalstatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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



        <div class="form-group col-sm-3 padding-0">
            <label for="districts" class="col-xs-12 col-form-label">
                Expected home district
            </label>
            <div class="col-xs-12">
                <select name="districts[]" id="districts" class="form-control myDropDown" required="required" multiple>
                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item-> name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('districts')): ?>
                <span class="text-danger" role="alert">
                    <strong><?php echo e($errors->first('districts')); ?></strong>
                </span>
                <?php endif; ?>
                <span class="text-danger" role="alert">
                    <strong id="err_districts"></strong>
                </span>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-3 padding-0">
            <label for="living_country" class="col-sm-12 col-form-label">Living Country
            </label>
            <div class="col-sm-12 ">
                <select multiple required='required' name="living_country[]" id="living_country" class="myDropDown form-control">
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item-> name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('living_country')): ?>
                <span class="text-danger" role="alert">
                    <strong><?php echo e($errors->first('living_country')); ?></strong>
                </span>
                <?php endif; ?>
                <span class="text-danger" role="alert">
                    <strong id="err_living_country"></strong>
                </span>
            </div>
        </div>

        <div class="form-group col-sm-4">

            <label class="col-xm-12 control-label" for="familyresidentstatus">Family Resident Status</label>
            <div class="col-xm-12">
                <div class="radio">
                    <label>
                        <input class="familResid" type="radio" name="familyresidentstatus" value="1">
                        Owner
                    </label>
                    <label>
                        <input class="familResid" type="radio" name="familyresidentstatus" value="2">
                        Rental
                    </label>
                    <label>
                        <input class="familResid" type="radio" name="familyresidentstatus" value="3">
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

        <div class="form-group col-sm-4 padding-0">
            <label for="disability" class="col-xs-12 col-form-label">NRB/Immigrant Preferable
            </label>
            <div class="col-xs-12 radio">
                <label>
                    <input class="claNrb" required="required" type="radio" name="nrb" id="nrb1" value="1">
                    Yes
                </label>
                <label>
                    <input class="claNrb" required="required" type="radio" name="nrb" id="nrb2" value="2">
                    No
                </label>
                <label>
                    <input class="claNrb" required="required" type="radio" name="nrb" id="nrb3" value=3">
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
        <div class="form-group col-sm-4 padding-0">

            <label for="income" class="col-xs-12 col-form-label">Monthly Income
            </label>
            <div class="col-xs-12">
                <input value="" type="text" name="income" id="income" class="form-control">
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



        <?php if(Auth::user()->religion == 1): ?>
            
        <div class="form-group col-sm-5 padding-0">
            <label for="says_payer" class="col-xs-12 col-form-label">Say Payer
            </label>
            <div class="col-xs-12">
                <select name="says_payer" id="says_payer" class="form-control myDropDown" required="required">
                    <option value=''>Select ..</option>
                    <?php $__currentLoopData = sayPayer(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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
        <?php endif; ?>


        <?php if(Auth::user()->religion == 1 && Auth::user()->gender == 1): ?>
            
        <div class="form-group col-sm-5 padding-0">
            <label for="wear_hijab" class="col-xs-12 col-form-label">Bride must Wear Hijab
            </label>
            <div class="col-xs-12 radio">
                    <label>
                        <input class="wear_hijab" required="required" type="radio" name="wear_hijab" value="0">
                        No.
                    </label>
                    <label>
                        <input id="wear_hijab" class="wear_hijab" required="required" type="radio" name="wear_hijab" value="1">
                        Yes.
                    </label>               
            </div>
        </div>

        <div class="form-group col-sm-5 padding-0">
            <label for="wear_hijab_after_marriage" class="col-xs-12 col-form-label">Wear Hijab After Marriage
            </label>
            <div class="col-xs-12">
                <div class="radio">
                    <label>
                        <input class="wear_hijab_after_marriage" required="required"
                            <?php echo e(Auth::user()->wear_hijab_after_marriage == 0? 'checked' : ''); ?> type="radio" name="wear_hijab_after_marriage"
                            value="0">
                        No.
                    </label>
                    <label>
                        <input id="wear_hijab_after_marriage" class="wear_hijab_after_marriage" required="required"
                            <?php echo e(Auth::user()->wear_hijab_after_marriage == 1? 'checked' : ''); ?> type="radio" name="wear_hijab_after_marriage"
                            value="1">
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

        




        <div class="form-group col-xs-12 padding-0">
            <div class="form-group col-xs-12">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
    </form>

</div>
<div class="col-xs-1 hidden-sm">
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footerscript'); ?>
<?php echo $__env->make('sections.javascripts.signup_preference', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link href="<?php echo e(asset('assets/fselect/fselect.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('assets/fselect/fselect.js')); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#religion').fSelect();
        $('#education').fSelect();
        $('#gender').fSelect();
        $('.myDropDown').fSelect();

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>