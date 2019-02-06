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
                                        <label for="elevel" class="col-form-label">Educational Level*

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
                                        <input value="<?php echo e(old('earea')); ?>" id="earea" name="earea" placeholder="Education Area"
                                            class="form-control here" required="required" type="text">
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
                                        <input value="<?php echo e(old('dname')); ?>" id="dname" name="dname" placeholder="Degree Name"
                                            class="form-control here" required="required" type="text">
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
                                        <input value="<?php echo e(old('iname')); ?>" id="iname" name="iname" placeholder="Institution Name"
                                            class="form-control here" required="required" type="text">
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



                                
                                <?php if(isset($studying)): ?>
                                <?php if($studying == 2): ?>
                                
                                <div class="row form-group completed">
                                    <div class="col-sm-6">
                                        <label for="statusstudent" class="col-form-label">Completion Status
                                        </label>
                                        <div class="radio statusstudent">
                                            <label>
                                                <input <?php echo e(old('statusstudent') == 1 ?"checked" : ''); ?> checked type="radio"
                                                    class="statusstudent" name="statusstudent" value="1">
                                                Currently Studying
                                            </label>
                                            <label>
                                                <input <?php echo e(old('statusstudent') == 2 ?"checked" : ''); ?> type="radio"
                                                    class="statusstudent" name="statusstudent" value="2">
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
                                        <input id="result" name="semester" placeholder="semester" class="form-control here"
                                            type="text" value="<?php echo e(old('semester')); ?>">
                                        <?php if($errors->has('semester')): ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($errors->dname('semester')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php else: ?>
                                
                                
                                <input type="hidden" value="2" name="statusstudent">
                                <?php endif; ?>

                                <div class="form-group row">


                                    <div class="col-xs-12">
                                        <button type="submit" id="submit" class="signupbutton btn btn-large btn-block btn-success">
                                            Save</button>
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>