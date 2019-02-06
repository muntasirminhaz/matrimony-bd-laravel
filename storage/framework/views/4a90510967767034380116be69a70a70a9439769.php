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
                                Set Privacy Options
                            </h4>

                           
                            <form action="<?php echo e(route('users.privacy.store')); ?>" method="post">

                                <?php echo csrf_field(); ?>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="display_name" class=" col-form-label"> Display Name </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="display_name1">
                                            <input
                                                <?php echo e(isset($current) && $current->display_name == 1 ? 'checked' : ''); ?>

                                                class="display_name" id="display_name1" required="required" type="radio"
                                                name="display_name" value="1">
                                            &nbsp;&nbsp;
                                            Hide Last Name
                                        </label>
                                        <label class="col-xs-12" for="display_name2">
                                            <input
                                                <?php echo e(isset($current) && $current->display_name == 2 ? 'checked' : ''); ?>

                                                class="display_name" id="display_name2" required="required" type="radio"
                                                name="display_name" value="2">
                                            &nbsp;&nbsp;
                                            Hide First Name
                                        </label>
                                        <label class="col-xs-12" for="display_name3">
                                            <input
                                                <?php echo e(isset($current) && $current->display_name == 3 ? 'checked' : ''); ?>

                                                class="display_name" id="display_name3" required="required" type="radio"
                                                name="display_name" value="3">
                                            &nbsp;&nbsp;
                                            Hide Full Name
                                        </label>

                                        <?php if($errors->has('display_name')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('display_name')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="phone" class=" col-form-label"> Phone </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="phone1">
                                            <input
                                                <?php echo e(isset($current) && $current->phone == 0 ? 'checked' : ''); ?>

                                                class="phone" id="phone1" required="required" type="radio" name="phone"
                                                value="0">
                                            &nbsp;&nbsp;
                                            VIsible to Premium Members Only
                                        </label>
                                        <label class="col-xs-12" for="phone2">
                                            <input
                                                <?php echo e(isset($current) && $current->phone == 1 ? 'checked' : ''); ?>

                                                class="phone" id="phone2" required="required" type="radio" name="phone"
                                                value="1">
                                            &nbsp;&nbsp;
                                            Visible to Premium Members that want to connected with you
                                        </label>


                                        <?php if($errors->has('phone')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('phone')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="income" class=" col-form-label"> Income </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="income1">
                                            <input
                                                <?php echo e(isset($current) && $current->income == 0 ? 'checked' : ''); ?>

                                                class="income" id="income1" required="required" type="radio" name="income"
                                                value="0">
                                            &nbsp;&nbsp;
                                            Show to Premium Members
                                        </label>
                                        <label class="col-xs-12" for="income2">
                                            <input
                                                <?php echo e(isset($current) && $current->income == 1 ? 'checked' : ''); ?>

                                                class="income" id="income2" required="required" type="radio" name="income"
                                                value="1">
                                            &nbsp;&nbsp;
                                            Keep Private
                                        </label>


                                        <?php if($errors->has('income')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('income')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="visitors_settings" class=" col-form-label"> Visitors Settings
                                        </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="visitors_settings1">
                                            <input
                                                <?php echo e(isset($current) && $current->visitors_settings == 0 ? 'checked' : ''); ?>

                                                class="visitors_settings" id="visitors_settings1" required="required"
                                                type="radio" name="visitors_settings" value="0">
                                            &nbsp;&nbsp;
                                            Let other members know if visited their profile.
                                        </label>
                                        <label class="col-xs-12" for="visitors_settings2">
                                            <input
                                                <?php echo e(isset($current) && $current->visitors_settings == 1 ? 'checked' : ''); ?>

                                                class="visitors_settings" id="visitors_settings2" required="required"
                                                type="radio" name="visitors_settings" value="1">
                                            &nbsp;&nbsp;
                                            Do not let other members know if visited their profile.
                                        </label>

                                        <?php if($errors->has('visitors_settings')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('visitors_settings')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="short_list" class=" col-form-label"> Short list Settings </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="short_list1">
                                            <input
                                                <?php echo e(isset($current) && $current->short_list == 0 ? 'checked' : ''); ?>

                                                class="short_list" id="short_list1" required="required" type="radio"
                                                name="short_list" value="0">
                                            &nbsp;&nbsp;
                                            Let Memebers know that I have shortlisted their profile.
                                        </label>
                                        <label class="col-xs-12" for="short_list2">
                                            <input
                                                <?php echo e(isset($current) && $current->short_list == 1 ? 'checked' : ''); ?>

                                                class="short_list" id="short_list2" required="required" type="radio"
                                                name="short_list" value="1">
                                            &nbsp;&nbsp;
                                            Do not let Memebers know that I have shortlisted their profile.
                                        </label>

                                        <?php if($errors->has('short_list')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('short_list')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="dont_distrub" class=" col-form-label"> Dont Distrub </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="dont_distrub1">
                                            <input
                                                <?php echo e(isset($current) && $current->dont_distrub == 0 ? 'checked' : ''); ?>

                                                class="dont_distrub" id="dont_distrub1" required="required" type="radio"
                                                name="dont_distrub" value="0">
                                            &nbsp;&nbsp;
                                            Send me Offers related emails and calls.
                                        </label>
                                        <label class="col-xs-12" for="dont_distrub2">
                                            <input
                                                <?php echo e(isset($current) && $current->dont_distrub == 1 ? 'checked' : ''); ?>

                                                class="dont_distrub" id="dont_distrub2" required="required" type="radio"
                                                name="dont_distrub" value="1">
                                            &nbsp;&nbsp;
                                            Don't send me Offers related emails and calls.
                                        </label>

                                        <?php if($errors->has('dont_distrub')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('dont_distrub')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="profile_privacy" class=" col-form-label"> Profile Privacy </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="profile_privacy1">
                                            <input
                                                <?php echo e(isset($current) && $current->profile_privacy == 0 ? 'checked' : ''); ?>

                                                class="profile_privacy" id="profile_privacy1" required="required" type="radio"
                                                name="profile_privacy" value="0">
                                            &nbsp;&nbsp;
                                            Visible to all, including unregisted visitors.
                                        </label>
                                        <label class="col-xs-12" for="profile_privacy2">
                                            <input
                                                <?php echo e(isset($current) && $current->profile_privacy == 1 ? 'checked' : ''); ?>

                                                class="profile_privacy" id="profile_privacy2" required="required" type="radio"
                                                name="profile_privacy" value="1">
                                            &nbsp;&nbsp;
                                            Ony visible to registered memebers
                                        </label>

                                        <?php if($errors->has('profile_privacy')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('profile_privacy')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="web_notifications" class=" col-form-label"> Web Notifications
                                        </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="col-xs-12" for="web_notifications1">
                                            <input
                                                <?php echo e(isset($current) && $current->web_notifications == 0 ? 'checked' : ''); ?>

                                                class="web_notifications" id="web_notifications1" required="required"
                                                type="radio" name="web_notifications" value="0">
                                            &nbsp;&nbsp;
                                            Send me email notifications.
                                        </label>
                                        <label class="col-xs-12" for="web_notifications2">
                                            <input
                                                <?php echo e(isset($current) && $current->web_notifications == 1 ? 'checked' : ''); ?>

                                                class="web_notifications" id="web_notifications2" required="required"
                                                type="radio" name="web_notifications" value="1">
                                            &nbsp;&nbsp;
                                            Don't Send me email notifications.
                                        </label>


                                        <?php if($errors->has('web_notifications')): ?>
                                        <p class="text-danger" role="alert">
                                            <strong> <?php echo e($errors->first('web_notifications')); ?></strong>
                                        </p>
                                        <?php endif; ?>

                                    </div>

                                </div>

                                <hr>
                                <div class="row form-group">
                                    <div class="col-xs-12">
                                        <input type="submit" class="btn btn-lg btn-block btn-success" value="Save Privacy Settings">

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