<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Users</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
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
                <div class="col-sm-3 padding-0">
                    <ul class="list-group">
                        <a href="<?php echo e(route('admin.users.messageInbox', $userid)); ?>" class="">
                            <li class="list-group-item  <?php echo e($page == 'inbox' ? 'active' : ''); ?>">Inbox</li>
                        </a>
                        <a href="<?php echo e(route('admin.users.messageOutbox', $userid)); ?>">
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

                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo e($item->id); ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p><small> <?php echo e($fromOrTo); ?> : <a href="<?php echo e($url); ?>"><strong><?php echo e($name); ?></strong></a>
                                            ; At
                                            <strong><?php echo e($item->created_at); ?></strong> </small> </p>
                                    <p><?php echo e($item->message); ?></p>





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

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>