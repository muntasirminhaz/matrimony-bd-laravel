<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row">
        <div class="col-xs-12 margin-top-10">

            <div class="jumbotron">
                <div class="container">
                    <h1>Your Email is Not Verified !!</h1>
                    <p>Your email is not verified, please check your inbox and verify your account now.</p>
                    <p>
                        <a href="<?php echo e(route('sendMailAgain')); ?>?sendmail=1" class="btn btn-primary btn-lg"
                            <?php if(isset($mailJustSend)): ?><?php echo 'id="mailJustSend"'; ?><?php endif; ?>>
                        I did not received my verification email yet.    
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php if(isset($mailJustSend)): ?>
<?php $__env->startSection('footerscript'); ?>
<script>
    $(document).ready(function () {
        $('#mailJustSend').hide();
    });
    setTimeout(function () {
        $(function () {
            $('#mailJustSend').show(300)
        });
    }, 60000);
</script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>