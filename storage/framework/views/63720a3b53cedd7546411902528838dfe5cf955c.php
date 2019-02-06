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
            <?php if($completed > 0 ): ?>
            <table class="table table-bordered table-hover  margin-bottom-40">
                <thead>
                    <tr>
                            <th>Educaiton Level</th>
                            <th>Educaiton Area</th>
                            <th>Degree</th>
                            <th>Institution</th>
                            <th>Status</th>
                    </tr>
                </thead>
                <tbody> 

                    <?php if(isset($education)): ?>
                        
                    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <p><?php echo educationLevel($item->education_level); ?></p>
                        </td>
                        <td>
                            <p><?php echo $item->education_area; ?></p>
                        </td>
                        <td>
                            <p><?php echo $item->degree_name; ?></p>
                        </td>
                        <td>
                            <p><?php echo $item->institution_name; ?></p>
                        </td>
                        <td>
                            <p><?php echo $item->status == 1 ?'Currently Studying' : 'Completed'; ?></p>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php endif; ?>

            <form class="padding-0-30 margin-bottom-20" method="POST" action="<?php echo e(route('signup.educationStore')); ?>"
                role="form">
                <?php echo csrf_field(); ?>

                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="elevel" class="col-form-label">
                            <?php if($selected > 0 ): ?>
                                Educational Level*
                            <?php else: ?>
                                Highest Educational Level*
                            <?php endif; ?>

                        </label>
                        <select name="elevel" id="elevel" class="form-control" required="required">
                            <option value="0">Select Educational Level</option>
                            <?php $__currentLoopData = $educationLevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(($key == $selected) ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('elevel')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->elevel('elevel')); ?></strong>
                        </span>
                        <?php endif; ?>
                        <span class="text-danger" role="alert">
                            <strong id="err_elevel"></strong>
                        </span>
                    </div>

                    <div class="col-sm-6">
                        <label for="earea" class="col-form-label">Education Area*

                        </label>
                        <input id="earea" name="earea" placeholder="Education Area" class="form-control here" required="required"
                            type="text">
                        <?php if($errors->has('earea')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->earea('earea')); ?></strong>
                        </span>
                        <?php endif; ?>
                        <span class="text-danger" role="alert">
                            <strong id="err_earea"></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="dname" class="col-form-label">Degree Name*

                        </label>
                        <input id="dname" name="dname" placeholder="Degree Name" class="form-control here" required="required"
                            type="text">
                        <?php if($errors->has('dname')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->dname('dname')); ?></strong>
                        </span>
                        <?php endif; ?>
                        <span class="text-danger" role="alert">
                            <strong id="err_dname"></strong>
                        </span>
                    </div>

                    <div class="col-sm-6">
                        <label for="iname" class="col-form-label">Institution Name*

                        </label>
                        <input id="iname" name="iname" placeholder="Institution Name" class="form-control here"
                            required="required" type="text">
                        <?php if($errors->has('iname')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->first('iname')); ?></strong>
                        </span>
                        <?php endif; ?>
                        <span class="text-danger" role="alert">
                            <strong id="err_iname"></strong>
                        </span>
                    </div>
                </div>


                <?php if($studying == 2): ?>


                <div class="row form-group completed">
                    <div class="col-sm-6">
                        <label for="statusstudent" class="col-form-label">Completion Status
                        </label>
                        <div class="radio statusstudent">
                            <label>
                                <input checked type="radio" class="statusstudent" name="statusstudent" value="1">
                                Currently Studying
                            </label>
                            <label>
                                <input type="radio" class="statusstudent" name="statusstudent" value="2">
                                Completed
                            </label>
                        </div>
                        <?php if($errors->has('statusstudent')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->first('statusstudent')); ?></strong>
                        </span>
                        <?php endif; ?>
                        <span class="text-danger" role="alert">
                            <strong id="err_statusstudent"></strong>
                        </span>
                    </div>

                    <div class="col-sm-6 showsemester" style="display: none">
                        <label for="semester" class="col-form-label">Current Year / Semester*

                        </label>
                        <input id="result" name="semester" placeholder="semester" class="form-control here" type="text">
                        <?php if($errors->has('semester')): ?>
                        <span class="text-danger" role="alert">
                            <strong><?php echo e($errors->dname('semester')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php else: ?>

                <input type="hidden" value="2" name="statusstudent">
                <?php endif; ?>
                <div class="form-group row">

                    <?php if(isset($allowSkip)): ?>
                    <div class="col-xs-6">
                        <a href="<?php echo e($allowSkip); ?>" type="button" class="signupbutton btn btn-large btn-block btn-danger">Skip</a>

                    </div>
                    <?php endif; ?>

                    <div class="col-xs-6 pull-right">
                        <?php if($selected > 0): ?>
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">
                            Add More</button>

                        <?php else: ?>
                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">
                            Save</button>
                        <?php endif; ?>


                    </div>

                </div>


            </form>

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