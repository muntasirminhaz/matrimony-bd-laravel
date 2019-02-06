

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
                                        <div class="alert alert-info">
                                            Put 0 (Zero) if there are no Paternal?maternal Uncle/Aunty

                                        </div>
                                    </div>
                                </div>




                                <div class="col-sm-6">
                                    <div class="form-group row col-xs-12">
                                        <h3>Parental Relatives </h3>
                                        <hr>
                                    </div>
                                    <div class="form-group row col-xs-12">
                                        <label for="paternal_uncle" class="col-form-label">Number of
                                            Paternal Uncle
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_paternal_uncle"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <div class="">
                                                <input min="0" value="<?php echo e(Auth::user()->paternal_uncle); ?>" id="paternal_uncle"
                                                    name="paternal_uncle" class="form-control addrequired" type="number"
                                                    max="20">
                                                <?php if($errors->has('paternal_uncle')): ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('paternal_uncle')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row col-xs-12">
                                        <label for="paternal_uncle_married" class="col-form-label">Number of
                                            Paternal Uncle Married
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_paternal_uncle_married"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <input min="0" value="<?php echo e(Auth::user()->paternal_uncle_married); ?>" id="paternal_uncle_married"
                                                name="paternal_uncle_married" class="form-control addrequired" type="number"
                                                max="20">
                                            <?php if($errors->has('paternal_uncle_married')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('paternal_uncle_married')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-xs-12 ">
                                        <label for="paternal_aunt" class="col-form-label">Number of
                                            Paternal Aunty
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_paternal_aunt"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <input min="0" value="<?php echo e(Auth::user()->paternal_aunt); ?>" id="paternal_aunt" name="paternal_aunt"
                                                class="form-control addrequired" type="number" max="20">
                                            <?php if($errors->has('paternal_aunt')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('paternal_aunt')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-xs-12">
                                        <label for="paternal_aunt_married" class="col-form-label">Number of
                                            Paternal Aunty Married
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_paternal_aunt_married"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <input min="0" value="<?php echo e(Auth::user()->paternal_aunt_married); ?>" id="paternal_aunt_married"
                                                name="paternal_aunt_married" class="form-control addrequired" type="number"
                                                max="20">
                                            <?php if($errors->has('paternal_aunt_married')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('paternal_aunt_married')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row col-xs-12">
                                        <h3>Maternals Relatives</h3>
                                        <hr>
                                    </div>
                                    <div class="form-group row col-xs-12">
                                        <label for="maternal_uncle" class="col-form-label">Number of
                                            Maternal Uncle
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_maternal_uncle"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <input min="0" value="<?php echo e(Auth::user()->maternal_uncle); ?>" id="maternal_uncle" name="maternal_uncle"
                                                class="form-control addrequired" type="number" max="20">
                                            <?php if($errors->has('maternal_uncle')): ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($errors->first('maternal_uncle')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12">
                                        <label for="maternal_uncle_married" class="col-form-label">Number of
                                            Maternal Uncle Married
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_maternal_uncle_married"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <div class="">
                                                <input min="0" value="<?php echo e(Auth::user()->maternal_uncle_married); ?>" id="maternal_uncle_married"
                                                    name="maternal_uncle_married" class="form-control addrequired" type="number"
                                                    max="20">
                                                <?php if($errors->has('maternal_uncle_married')): ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('maternal_uncle_married')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12">
                                        <label for="maternal_aunt" class="col-form-label">Number of
                                            Maternal Aunty
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_maternal_aunt"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <div class="">
                                                <input min="0" value="<?php echo e(Auth::user()->maternal_aunt); ?>" id="maternal_aunt"
                                                    name="maternal_aunt" class="form-control addrequired" type="number"
                                                    max="20">
                                                <?php if($errors->has('maternal_aunt')): ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('maternal_aunt')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12">
                                        <label for="maternal_aunt_married" class="col-form-label">Number of
                                            Maternal Aunty Married
                                            <br>
                                            <span class="text-danger" role="alert">
                                                <strong id="err_maternal_aunt_married"></strong>
                                            </span>
                                        </label>
                                        <div class="">
                                            <div class="">
                                                <input min="0" value="<?php echo e(Auth::user()->maternal_aunt_married); ?>" id="maternal_aunt_married"
                                                    name="maternal_aunt_married" class="form-control addrequired" type="number"
                                                    max="20">
                                                <?php if($errors->has('maternal_aunt_married')): ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($errors->first('maternal_aunt_married')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group row col-xs-12">
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
    $(document).ready(function () {

        //===========================================================
        $("body").on("click", "#submit", function () {
            var err = 0;
            $(
                "#err_paternal_uncle, #err_paternal_uncle_married , #err_paternal_aunt , #err_paternal_aunt_married  , #err_maternal_uncle,#err_maternal_uncle_married,#err_maternal_aunt,#err_maternal_aunt_married"
            ).text("");

            var paternal_uncle = $("input[name='paternal_uncle']").val();
            var paternal_uncle_married = $("input[name='paternal_uncle_married']").val();
            var paternal_aunt = $("input[name='paternal_aunt']").val();
            var paternal_aunt_married = $("input[name='paternal_aunt_married']").val();
            var maternal_uncle = $("input[name='maternal_uncle']").val();
            var maternal_uncle_married = $("input[name='maternal_uncle_married']").val();
            var maternal_aunt = $("input[name='maternal_aunt']").val();
            var maternal_aunt_married = $("input[name='maternal_aunt_married']").val();
            //var permanentaddress = $("textarea[name='permanentaddress']").val();


            if (paternal_uncle == "") {
                $("#err_paternal_uncle").text("Number of Paternal Uncle Required");
                err++;
            }
            if (paternal_uncle_married == "") {
                $("#err_paternal_uncle_married").text("Number of Paternal Uncle Married  Required");
                err++;
            }
            if (paternal_aunt == "") {
                $("#err_paternal_aunt").text("Number of Paternal Aunty  Required");
                err++;
            }
            if (paternal_aunt_married == "") {
                $("#err_paternal_aunt_married").text("Number of Paternal Aunty Married Required");
                err++;
            }
            if (maternal_uncle == "") {
                $("#err_maternal_uncle").text("Number of Maternal Uncle Required");
                err++;
            }
            if (maternal_uncle_married == "") {
                $("#err_maternal_uncle_married").text("Number of Maternal Uncle Married Required");
                err++;
            }
            if (maternal_aunt == "") {
                $("#err_maternal_aunt").text("Number of Maternal Aunty Required");
                err++;
            }
            if (maternal_aunt_married == "") {
                $("#err_maternal_aunt_married").text("Number of Maternal Aunty Married Required");
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
            return true;
        });
        //===========================================================

    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>