

<?php $__env->startSection('content'); ?>


    <div class="col-xm-12">

        <div class="row">



            <?php if(isset($users)): ?>


            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="col-sm-6">

                <div class="row xyz">
                    <div class="col-sm-4 myleftstyle-dem">
                        <span style="color: green;"><?php echo e($item->name); ?></span><br />
                        <a href="<?php echo e(url($item->profileSlug)); ?>">
                            <img src="<?php echo e(url($item->photo)); ?>" width="85" height="150">
                        </a>
                    </div>
                    <div class="col-sm-8 myrightstyle-dem" style="">
                        <span><b>Age:</b> <?php echo e($item->age); ?></span>
                        <span><b>Height:</b> 5ft 2 in - 157 cm</span>
                        <span><b>Religion:</b> <?php echo e($item->religion); ?></span>
                        <span><b>Sect:</b> Sunni</span><br />
                        <span><b>Education:</b> <?php echo e($item->education); ?></span><br />
                        <span><b>Occupation:</b> <?php echo e($item->profession); ?></span>
                        <span><b>Residing in:</b> <?php echo e($item->city); ?></span>
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

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>