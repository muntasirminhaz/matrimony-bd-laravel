<?php $__env->startSection('content'); ?>

<div class="col-sm-8">


    <!-- Profile block : Start -->

    <?php if(isset($users)): ?>


    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-xs-12 text-center margin-bottom-15 padding-0">
        <div href="#" class="profile-single">
            <div class="col-sm-2 col-xs-12 padding-0">
                <a class="overflow-hidden display-block" href="<?php echo e(url($item->profileSlug)); ?>">
                    <img class="img-responsive" src="<?php echo e(url($item->photo)); ?>">
                </a>
            </div>
            <div class="col-sm-10 col-xs-12 padding-0-5">

                <div class="pull-right text-left margin-top-5">
                    <?php echo $item->button; ?>

                </div>
                <div class="profile-title margin-bottom-5">
                    <a href="<?php echo e(url($item->profileSlug)); ?>"><?php echo e($item->name); ?></a>
                </div>
                <p class="product-price" style="display: block;width: 100%;float: left">
                    Gender: <span style="font-weight: 700">&nbsp;<?php echo e($item->gender); ?>&nbsp;&nbsp;</span>
                    Age: <span style="font-weight: 700">&nbsp;<?php echo e($item->age); ?>&nbsp;&nbsp;</span>
                    Height: <span style="font-weight: 700">&nbsp;<?php echo e($item->height); ?>&nbsp;&nbsp;</span><br>
                    Religion: <span style="font-weight: 700">&nbsp;<?php echo e($item->religion); ?>&nbsp;&nbsp;</span>
                    Education: <span style="font-weight: 700">&nbsp;<?php echo e($item->education); ?>&nbsp;&nbsp;</span><br>
                    Profession: <span style="font-weight: 700">&nbsp;<?php echo e($item->profession); ?>&nbsp;&nbsp;</span>
                    City: <span style="font-weight: 700">&nbsp;<?php echo e($item->city); ?>&nbsp;&nbsp;</span>
                </p>
            </div>


        </div>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    no data
    <?php endif; ?>

    <?php else: ?>
    no data
    <?php endif; ?>

    <div class="col-xs-12">
        <?php echo $rawData->render(); ?>

    </div>

</div>
<div class="col-sm-4" id="search-profile">
    <div class="blog-title text-align-center">Search Profiles</div>
    <hr>

    <form action="<?php echo e(route('search')); ?>" method="GET" role="form" class="form padding-0-10">

        <div class="form-group row">

            <label for=" age" class="col-xs-12 control-label">Age</label>

            <div class="col-xs-6">
                <select name="agemin" class="form-control">
                    <option value=''>Minimum Age ..</option>

                    <?php for($i = 18; $i < 101; $i++): ?> <option value='<?php echo e($i); ?>'><?php echo e($i); ?></option>
                        <?php endfor; ?>
                </select>
            </div>
            <div class="col-xs-6">
                <select name="agemax" class="form-control">
                    <option value=''>Maximum Age ..</option>


                    <?php for($i = 18; $i < 101; $i++): ?> <option value='<?php echo e($i); ?>'><?php echo e($i); ?></option>
                        <?php endfor; ?>
                </select>
            </div>

        </div>

        <?php if(isset($showGender)): ?>

        <div class="form-group row">
            <label for="gender" class="col-xs-12 control-label">gender</label>
            <div class="col-xs-12">
                <select name="gender[]" id="gender" class="form-control" multiple>
                    <option value="">Select gender</option>
                    <?php $__currentLoopData = gender(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e(app('request')->input('gender')  == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <?php endif; ?>
        <div class="form-group row">
            <label for="religion" class="col-xs-12 control-label">Religion</label>
            <div class="col-xs-12">
                <select name="religion[]" id="religion" class="form-control" multiple>
                    <option value="">Select Religion</option>
                    <?php $__currentLoopData = religion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e(app('request')->input('religion')  == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="education" class="col-xs-12 control-label">Education</label>
            <div class="col-xs-12">
                <select name="education[]" id="education" class="form-control" multiple>
                    <option value="">Select education</option>
                    <?php $__currentLoopData = educationLevel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e(app('request')->input('education')  == $key ? 'selected' : ''); ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <?php if(isset($allowRest)): ?>
            <div class="col-xs-12 margin-bottom-15">
                <a href="<?php echo e(route('search')); ?>" class="btn btn-default btn-block">Reset</a>
            </div>
            <?php endif; ?>
            <div class="col-xs-12">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
    </form>

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

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>