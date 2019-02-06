

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
                <div class="col-xs-12">
                    <label for="havesiblings" class=" col-form-label">Do you have brothers and sisters?
                    </label>
                    <div class="">
                        <input required="required" <?php echo e(Auth::user()->has_siblings == 1 ? 'checked':''); ?> type="radio" name="havesiblings"
                            class="havesiblings chekhavesiblings" value="1" />
                        No
                        <input required="required" <?php echo e(Auth::user()->has_siblings == 2 ? 'checked':''); ?> type="radio" name="havesiblings"
                            class="havesiblings chekhavesiblings" value="2" id="havesiblingsId" />
                        yes
                        <?php if($errors->has('havesiblings')): ?>
                        <br>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->first('havesiblings')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <span class="text-danger" role="alert">
                        <strong id="err_havesiblings"></strong>
                    </span>
                </div>

            </div>
            <div class="col-xs-12 moreinfo">
                <div class="form-group row">
                    <label for="brothersnumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                        Brothers
                        <br>
                        <span class="text-danger" role="alert">
                            <strong id="err_brothersnumber"></strong>
                        </span>
                    </label>
                    <div class="col-sm-2 ">
                        <div class="">
                            <input min="0" value="<?php echo e(Auth::user()->number_of_brothers); ?>" id="brothersnumber" name="brothersnumber"
                                class="form-control addrequired" type="number" max="20">
                            <?php if($errors->has('brothersnumber')): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first('brothersnumber')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <label for="brothersmarriednumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                        Brothers Married
                        <br/>
                        <span class="text-danger" role="alert">
                            <strong id="err_brothersmarriednumber"></strong>
                        </span>
                    </label>
                    <div class="col-sm-2 ">
                        <div class="">
                            <input min="0" value="<?php echo e(Auth::user()->number_of_brother_married); ?>" id="brothersmarriednumber"
                                name="brothersmarriednumber" class="form-control addrequired" type="number" max="20">
                            <?php if($errors->has('brothersmarriednumber')): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first('brothersmarriednumber')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <span class="text-danger" role="alert">
                                <strong id="err_brothersmarriednumber"></strong>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="sistersnumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                        Sisters
                        <br/>
                        <span class="text-danger" role="alert">
                            <strong id="err_sistersnumber"></strong>
                        </span>
                    </label>
                    <div class="col-sm-2 ">
                        <div class="">
                            <input min="0" value="<?php echo e(Auth::user()->number_of_sisters); ?>" id="sistersnumber" name="sistersnumber"
                                class="form-control addrequired" type="number" max="20">
                            <?php if($errors->has('sistersnumber')): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first('sistersnumber')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <label for="sistersmarriednumber" class="col-sm-4 col-form-label padding-10-0 ">Number of
                        Sisters Married
                        <br>
                        <span class="text-danger" role="alert">
                            <strong id="err_sistersmarriednumber"></strong>
                        </span>
                    </label>
                    <div class="col-sm-2 ">
                        <div class="">
                            <input min="0" value="<?php echo e(Auth::user()->number_of_sisters_married); ?>" id="sistersmarriednumber" name="sistersmarriednumber"
                                class="form-control addrequired" type="number" max="20">
                            <?php if($errors->has('sistersmarriednumber')): ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($errors->first('sistersmarriednumber')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group row">

            </div>

            <hr>
            <div class="form-group row">
                <div class="col-xs-12">
                    <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">Save and
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

//==========================================
        $('.moreinfo').hide();    
    if($("#havesiblingsId").val() == 2){
        changeRequired(2);
    }    
//==========================================        
        


        $('.havesiblings').on('click', function () {
            changeRequired($(this).val());
        });

        function changeRequired(currentvalue) {
            if (currentvalue == 2) {
                $('.addrequired').attr('required', 'required');
                $('.moreinfo').show(300);
            } else if (currentvalue == 1) {
                $('.moreinfo').hide(300);
                $('.addrequired').removeAttr('required');
            } else {
                $('.moreinfo').hide(300);
            }
        }

//===========================================================
    $("body").on("click", "#submit", function () {
            var err = 0;
            $("#err_havesiblings, #err_brothersnumber , #err_brothersmarriednumber , #err_sistersnumber  , #err_sistersmarriednumber" ).text("");

            var brothersnumber = $("input[name='brothersnumber']").val();
            var brothersmarriednumber = $("input[name='brothersmarriednumber']").val();
            var sistersnumber = $("input[name='sistersnumber']").val();
            var sistersmarriednumber = $("input[name='sistersmarriednumber']").val();
            //var permanentaddress = $("textarea[name='permanentaddress']").val();


            if (!$(".chekhavesiblings").is(":checked")) {
                    $("#err_havesiblings").text("Do you have brothers and sisters Required");
                     err++;
                }

                    if($("#havesiblingsId").is(":checked")){

                            if (brothersnumber == "") {
                                $("#err_brothersnumber").text("Number of Brothers Required");
                                err++;
                            }
                            if (brothersmarriednumber == "") {
                                $("#err_brothersmarriednumber").text("Number of Brothers Married Required");
                                err++;
                            }
                            if (sistersnumber == "") {
                                $("#err_sistersnumber").text("Number of Sisters Required");
                                err++;
                            }
                            if (sistersmarriednumber == "") {
                                $("#err_sistersmarriednumber").text("Number of Sisters Married Required");
                                err++;
                            }
                    }  

            /*
            else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                err++;
            }*/

            if (err > 0) {
                return false;
            }
            return true;
        });
//===========================================================

    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>