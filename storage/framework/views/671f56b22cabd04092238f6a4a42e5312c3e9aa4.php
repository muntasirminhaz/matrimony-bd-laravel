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
            <p class="text-align-center bold-text padding-0-30 margin-bottom-20">
                <?php if(isset($description)): ?>
                <?php echo e($description); ?>

                <?php else: ?>
                a large description about the page
                <?php endif; ?>
            </p>
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



           

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('footerscript'); ?>
<script>
    $(function () {

        $('.showsemester').hide(100);

            
        if ($('.statusstudent:checked').val() == 1) {
            $('.showsemester').show(300);
        }
        if ($('.statusstudent:checked').val() == 2) {
            $('.showsemester').hide(100);
        }

        $('.statusstudent').change(function (e) {

        if ($(this).is(':checked')) {
            if ($(this).val() == 1) {
            $('.showsemester').show(300);
            }
            if ($(this).val() == 2) {
            $('.showsemester').hide(100);
            }
        }

});

  //==================================================================  
    $("body").on("click", "#submit", function () {
            var err = 0;                                             // check box
            $("#err_elevel, #err_earea  , #err_dname , #err_iname, #err_statusstudent ,#err_diet  ").text("");


            var elevel = $("select[name='elevel']").val(); 
            var earea = $("input[name='earea']").val();     
            var dname = $("input[name='dname']").val();     
            var iname = $("input[name='iname']").val();     
            var statusstudent = $("input[name='statusstudent']").val();     
            var hobbies = $("input[name='hobbies']").val();     
    


            if (elevel == "") {
                $("#err_elevel").text("Educational Level Required");
                err++;
            }
            if (earea == "") {
                $("#err_earea").text("Education Area Required");
                err++;
            }

            if (dname == "") {
                $("#err_dname").text("Degree Name Required");
                err++;
            }
            if (iname == "") {
                $("#err_iname").text("Institution Name Required");
                err++;
            }
            /* check box
            if (statusstudent == "") {
                $('#err_statusstudent').text("Completion Status  Required");
                err++;
            } */
            if (diet == "") {
                $("#err_diet").text("Diet Type Required");
                err++;
            }

            if (err > 0) {
                return false;
            }
            return true;
        });

  //==================================================================



     
    });
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('noinuse'); ?>

<div class="form-group row completed">
    <div class="col-sm-6">
        <label for="result" class="col-form-label">Results*

        </label>
        <input id="result" name="result" placeholder="Result" class="form-control here" required="required" type="text">
        <?php if($errors->has('result')): ?>
        <span class="text-danger" role="alert">
            <strong><?php echo e($errors->dname('result')); ?></strong>
        </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <label for="ycom" class="col-form-label">Year Completed*

        </label>
        <input id="ycom" name="ycom" placeholder="Year Complete" class="form-control here" required="required" type="text">
        <?php if($errors->has('ycom')): ?>
        <span class="text-danger" role="alert">
            <strong><?php echo e($errors->first('ycom')); ?></strong>
        </span>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>