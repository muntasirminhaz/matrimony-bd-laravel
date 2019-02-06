



<?php $__env->startSection('content'); ?>

<div class="col-sm-12 card">
    <!------View Normally------>
    <div class="panel panel-default">
        <div class="panel-heading title">
            <!--Add Parents Information-->
            <?php if(isset($headline)): ?>
            <span class="h3"><?php echo e($headline); ?></span>
            <?php else: ?>
            <span class="">Add headline</span>
            <?php endif; ?>
        </div>
        <div class="panel-body">
            <div class="col-sm-3">
                <ul class="list-group">
                    <a href="<?php echo e(route('users.myMessagesInbox')); ?>" class="">
                        <li class="list-group-item  <?php echo e($page == 'inbox' ? 'active' : ''); ?>">Inbox</li>
                    </a>
                    <a href="<?php echo e(route('users.myMessagesOutbox')); ?>">
                        <li class="list-group-item  <?php echo e($page == 'outbox' ? 'active' : ''); ?>">Outbox</li>
                    </a>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="panel-group" id="accordion">

                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                    $name = $item->first_name . ($item->middle_name == '' ? ' ' .
                    $item->last_name : $item->middle_name . ' ' . $item->last_name );
                    $url = route('profile.index', [strtolower(str_ireplace(' ', '-', $name)),
                    $item->receiver_id]);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($item->id); ?>"
                                    class=" isread" data-read='<?php echo e($item->mail_read == 0 ? $item->id : 0); ?>'>
                                    <?php echo e($item->title); ?>

                                    <?php if($page == 'inbox' && $item->mail_read == 0): ?>
                                    <button type="button" class="btn btn-xs pull-right btn-instagram unread}">Unread</button>
                                    <?php endif; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo e($item->id); ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><small> <?php echo e($fromOrTo); ?> : <a href="<?php echo e($url); ?>"><strong><?php echo e($name); ?></strong></a> ; At
                                        <strong><?php echo e($item->created_at); ?></strong> </small> </p>
                                <p><?php echo e($item->message); ?></p>

                                <a class="btn btn-success btn-xs pull-right margin-right-7 mobile-send-button-fix"
                                    data-toggle="modal" href='#message<?php echo e($item->id); ?>'>
                                    <span class="fa fa-reply"></span> Reply</a>
                                <div class="modal fade" id="message<?php echo e($item->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <?php if($islimited): ?>
                                            <form action="<?php echo e(route('users.sendMessage', $item->receiver_id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Reply to <?php echo e($name); ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input required type="text" name="title" class="form-control"
                                                        placeholder="Enter Message Title">
                                                    <br>
                                                    <textarea required name="message" placeholder="Enter Your Message"
                                                        class="form-control" cols="30" rows="3"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning btn-xs pull-left"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success pull-right btn-xs">Send
                                                        Message</button>
                                                </div>
                                            </form>


                                            <?php else: ?>

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">You cannot message to <?php echo e($name); ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><a href="<?php echo e(route('packages')); ?>">Upgrade you package now to available
                                                        this feature.</a></p>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>


                                <a class="btn btn-danger btn-xs pull-right margin-right-7 mobile-send-button-fix"
                                    data-toggle="modal" href='#delete<?php echo e($item->id); ?>'>
                                    <span class="fa fa-remove"></span> Delete</a>
                                <div class="modal fade" id="delete<?php echo e($item->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                          
                                            <form action="<?php echo e(route('users.deleteMessage', $item->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Reply to <?php echo e($name); ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning btn-xs pull-left"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success pull-right btn-xs">Delete
                                                        Message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    No messages.</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">You have no messages</div>
                        </div>
                    </div>

                    <?php endif; ?>

                </div>

                <?php echo $messages->render(); ?>

            </div>
        </div>

    </div>

</div>



<?php $__env->stopSection(); ?>
<?php if($page == 'inbox'): ?>
<?php $__env->startSection('footerscript'); ?>
<script>
    $(function () {
        $('.isread').on('click', function () {
            if ($(this).attr('data-read') > 0) {
                $(this).children().hide(100).remove();
                idOfMessage = $(this).attr('data-read');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: "<?php echo e(route('users.messsage.setread')); ?>",
                    type: 'GET',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: CSRF_TOKEN,
                        read: idOfMessage
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        console.log(data);
                    }
                });

            }
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>