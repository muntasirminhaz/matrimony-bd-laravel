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

                                    <div class="col-sm-6">
                                        <label for="fullname" class=" col-form-label">Name of the Contact Person 
                                        </label>
                                        <div class="">
                                            <input required='required' value="<?php echo e(Auth::user()->contact_name); ?>" id="fullname" name="fullname"
                                               class="form-control here" type="text">
                                            <?php if($errors->has('fullname')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('fullname')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_fullname"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="relation" class="col-form-label">Relativeship
                                        </label>
                                        <div class="">
                                            <select required='required' name="relation" id="relation" class="form-control">
                                                <option value="">Select ...</option>
                                                <?php $__currentLoopData = relation(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(Auth::user()->contact_relation == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('relation')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('relation')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_relation"></strong>
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="mobile" class=" col-form-label">Mobile No.
                                        </label>
                                        <div class="">
                                            <input required='required' value="<?php echo e(Auth::user()->contact_mobile); ?>" id="mobile" name="mobile"
                                              class="form-control here" type="text">
                                            <?php if($errors->has('mobile')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('mobile')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_mobile"></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="email" class=" col-form-label">Alternative Email
                                        </label>
                                        <div class="">
                                            <input required='required' value="<?php echo e(Auth::user()->contact_email); ?>" id="email" name="email"
                                                 class="form-control here" type="email">
                                            <?php if($errors->has('email')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_email"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="timeform" class="col-form-label col-xs-12">Convinient time to call
                                    </label>
                                    <label for="timeform" class="col-form-label col-xs-2 h4">From ... </label>
                                    <div class="col-xs-4">
                                        <select required='required' name="timeform" id="timeform" class="form-control">
                                            <option value="">From ...</option>
                                            <?php for($i = 1; $i < 13; $i++): ?> <option
                                                <?php echo e(Auth::user()->contact_timetocall == $i.' AM'? 'selected' : ''); ?> value="<?php echo e($i.' AM'); ?>"><?php echo e($i.' AM'); ?></option>
                                                <?php endfor; ?>
                                                <?php for($i = 1; $i < 13; $i++): ?> <option
                                                    <?php echo e(Auth::user()->contact_timetocall == $i.' PM'? 'selected' : ''); ?> value="<?php echo e($i.' PM'); ?>"><?php echo e($i.' PM'); ?></option>
                                                    <?php endfor; ?>
                                        </select>
                                        <?php if($errors->has('timeform')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('timeform')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <span class="text-danger" role="alert">
                                            <strong id="err_timeform"></strong>
                                        </span>
                                    </div>
                                    <label for="timeto" class="col-form-label col-xs-2 h4"> To ...</label>
                                    <div class="col-xs-4">
                                        <select required='required' name="timeto" id="timeto" class="form-control">
                                            <option value="">To ...</option>
                                            <?php for($i = 1; $i < 13; $i++): ?> <option
                                                <?php echo e(old('timeto') == $i.' AM'? 'selected' : ''); ?> value="<?php echo e($i.' AM'); ?>"><?php echo e($i.' AM'); ?></option>
                                                <?php endfor; ?>
                                                <?php for($i = 1; $i < 13; $i++): ?> <option
                                                    <?php echo e(old('timeto') == $i.' PM'? 'selected' : ''); ?> value="<?php echo e($i.' PM'); ?>"><?php echo e($i.' PM'); ?></option>
                                                    <?php endfor; ?>
                                        </select>
                                        <?php if($errors->has('timeto')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->first('timeto')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <span class="text-danger" role="alert">
                                            <strong id="err_timeto"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="presentaddress" class=" col-form-label">Present Address
                                        </label>
                                        <div class="">
                                            <textarea class="form-control" name="presentaddress" id="" cols="30" rows="5"><?php echo e(Auth::user()->contact_present_address); ?></textarea>
                                            <?php if($errors->has('presentaddress')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('presentaddress')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_presentaddress"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="permanentaddress" class=" col-form-label">Permanent Address
                                        </label>
                                        <div class="">
                                            <textarea class="form-control" name="permanentaddress" id="" cols="30" rows="5"><?php echo e(Auth::user()->contact_permanent_address); ?></textarea>
                                            <?php if($errors->has('permanentaddress')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('permanentaddress')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_permanentaddress"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>


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

<?php $__env->startSection("footerscript"); ?>
<script>
    $(document).ready(function () {
        $("body").on("click", "#submit", function () {
            var err = 0;
            $("#err_fullname, #err_relation , #err_mobile , #err_email  , #err_timeform ,#err_timeto ,#err_presentaddress ,#err_permanentaddress").text("");

            var fullname = $("input[name='fullname']").val();
            var relation = $("select[name='relation']").val();
            var mobile = $("input[name='mobile']").val();
            var email = $("input[name='email']").val();
            var timeform = $("select[name='timeform']").val();
            var timeto = $("select[name='timeto']").val();
            var presentaddress = $("textarea[name='presentaddress']").val(); //
            var permanentaddress = $("textarea[name='permanentaddress']").val();


            if (fullname == "") {
                $("#err_fullname").text("Name of the Contact Person Required");
                err++;
            }
            if (relation == "") {
                $("#err_relation").text("Relativeship Required");
                err++;
            }

            if (mobile == "") {
                $("#err_mobile").text("Mobile No Required");
                err++;
            }
            /*
            else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                err++;
            }*/
            if (email == "") {
                $("#err_email").text("Alternative Email Required");
                err++;
            }

            if (timeform == "") {
                $('#err_timeform').text("Convinient time to call  Required");
                err++;
            }
            if (timeto == "") {
                $("#err_timeto").text("Convinient time to call To Required");
                err++;
            }
            if (presentaddress == "") {
                $("#err_presentaddress").text("Present Address Required");
                err++;
            }
            if (permanentaddress == "") {
                $("#err_permanentaddress").text("Permanent Address is Required");
                err++;
            }

            if (err > 0) {
                return false;
            }
            return true;
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>