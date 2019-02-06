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
    <div class="blog-title text-align-center">Advance Search Sidebar</div>
    <hr>



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