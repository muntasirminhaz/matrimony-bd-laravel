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
               
                <div class="profile-title margin-bottom-5"><?php echo e($item->name); ?>


                </div>
                <p class="product-price">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lorem ipsum, cursus et lacus ac,
                    ultrices faucibus arcu.
                </p>
                <div class="product-shrot-description">
                    <?php if(isset($showGender)): ?>
                    <span class="list-group-item col-sm-3 col-xs-12 border-0">
                        <span class="badge"><?php echo e($item->gender); ?></span>
                        Gender
                    </span>
                    <?php endif; ?>
                    <span class="list-group-item col-sm-2 col-xs-12 border-0">
                        <span class="badge"><?php echo e($item->age); ?></span>
                        Age
                    </span>

                    <span class="list-group-item col-sm-4 col-xs-12 border-0">
                        <span class="badge"><?php echo e(religion($item->religion)); ?></span>
                        Religion
                    </span>

                    <?php if($item->profession > 0 ): ?>
                    <span class="list-group-item col-sm-3 col-xs-12 border-0">
                        <span class="badge"><?php echo e(profileProfession($item->profession)); ?></span>
                        Profession
                    </span>
                    <?php endif; ?>


                </div>
                <a href="<?php echo e(url($item->profileSlug)); ?>" class="btn btn-sm btn-default pull-right margin-top-5 hidden-xs"><span
                    class="fa fa-user-circle-o"></span>
                View Profile
            </a>




            </div>
            <a class="btn btn-lg btn-default col-xs-12 margin-top-5 visible-xs"><span class="fa fa-user-circle-o"></span>
                View Profile
            </a>

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
                <input value="<?php echo e(app('request')->input('agemin')); ?>" type="text" name="agemin" class="form-control" id="age"
                    placeholder="Minimum Age">
            </div>
            <div class="col-xs-6">
                <input value="<?php echo e(app('request')->input('agemax')); ?>" type="text" name="agemax" class="form-control" id="age"
                    placeholder="Maximum Age">
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