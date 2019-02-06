

<?php if($limitMostFavorite): ?>
<?php if($alreadyMostFavorite): ?>
<a data-toggle="popover" data-trigger="hover" data-content="You have added this user to most favorites." data-placement="top"
    class="btn btn-default btn-xs pull-right mobile-send-button-fix"><span class="fa fa-bookmark-o"></span></a>
<?php else: ?>
<a class="btn btn-primary btn-xs pull-right mobile-send-button-fix" data-toggle="modal" href='#mostfavorite<?php echo e($user->id); ?>'><span
        class="fa fa-plus-square-o"></span></a>
<div class="modal fade" id="mostfavorite<?php echo e($user->id); ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="<?php echo e(route('users.sendMostFavorite', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add <?php echo e($user->first_name); ?> <br>to Most Favorite?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right  btn-xs">Add to Most Favorite</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php else: ?>
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Profiles to Most Favorite."
    data-placement="top" class="btn btn-default btn-xs pull-right mobile-send-button-fix"><span class="fa fa-gift"></span></a>
<?php endif; ?>





<?php if($limitFavorite): ?>

<?php if($alreadyFavorite): ?>
<a data-toggle="popover" data-trigger="hover" data-content="You have added this user to favorites." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-bookmark-o"></span></a>
<?php else: ?>
<a class="btn btn-info btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#favorite<?php echo e($user->id); ?>'><span
        class="fa fa-bookmark-o"></span></a>
<div class="modal fade" id="favorite<?php echo e($user->id); ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="<?php echo e(route('users.sendFavorite', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add <?php echo e($user->first_name); ?> to Favorite</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right  btn-xs">Add to Most Favorite</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php else: ?>
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Profiles to Favorite"
    data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-gift"></span></a>
<?php endif; ?>





<?php if($limitInterest): ?>

<?php if($alreadyInterestExpressed): ?>
<a data-toggle="popover" data-trigger="hover" data-content="You have expressd interest to this user." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-gift"></span></a>
<?php else: ?>
<a class="btn btn-warning btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#interest<?php echo e($user->id); ?>'><span
        class="fa fa-gift"></span></a>
<div class="modal fade" id="interest<?php echo e($user->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('users.sendInterest', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Express Interest to <?php echo e($user->first_name); ?></h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                    <?php $__currentLoopData = interestMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label for="messageid<?php echo e($key); ?>" data-megval='<?php echo e($key); ?>'>
                            <input type="radio" value="<?php echo e($key); ?>" name="messageid" id="messageid<?php echo e($key); ?>">
                            <?php echo e($value); ?>

                        </label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right btn-xs">Express
                        Interest</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php else: ?>
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Express Interest."
    data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-gift"></span></a>
<?php endif; ?>




<?php if($limitMessage): ?>

<a class="btn btn-success btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#message<?php echo e($user->id); ?>'><span
        class="fa fa-envelope-o"></span></a>
<div class="modal fade" id="message<?php echo e($user->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?php echo e(route('users.sendMessage', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Send Message to <?php echo e($user->first_name); ?></h4>
                </div>
                <div class="modal-body">
                    <input required type="text" name="title" class="form-control" placeholder="Enter Message Title">
                    <br>
                    <textarea required name="message" placeholder="Enter Your Message" class="form-control" cols="30"
                        rows="3"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right btn-xs">Send
                        Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php else: ?>
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to send messages." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-envelope-o"></span></a>
<?php endif; ?>





<?php if($limitContact): ?>
<?php if($alreadyContactAdded): ?>
<a data-toggle="popover" data-trigger="hover" data-content="You have added this user to most favorites." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-user-plus"></span></a>
<?php else: ?>
<a class="btn btn-pinterest btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#contact<?php echo e($user->id); ?>'><span
        class="fa fa-user-plus"></span></a>
<div class="modal fade" id="contact<?php echo e($user->id); ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="<?php echo e(route('users.sendContact', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Contact info of <?php echo e($user->first_name); ?></h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right  btn-xs">Add to Contacts</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php else: ?>
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Contact." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-user-plus"></span></a>
<?php endif; ?>

