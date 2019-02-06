<?php $__env->startSection('content'); ?>


<div class="container-fluid bg-warning">
    <div class="row margin-20">
        <div class="col-xs-12">
            <h1 class="text-align-center">Upgrade Your Membership Package</h1>
        </div>
        <div class="col-sm-2 hidden-xs"></div>
        <div class="col-sm-8">
            <form action="" method="post" class="">
                    <div class="form-group row">
                            <label for="input-id" class="col-sm-4">Payment Method</label>

                            <div class="col-sm-8">
                                <select name="paymentment" id="inputpaymentment" class="form-control" required="required">
                                    <option value=""></option>
                                </select>
                            </div>
                    </div>
            </form>
        </div>
        <div class="col-sm-2 hidden-xs"></div>

    </div>
</div>





 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>