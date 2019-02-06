<?php $__env->startSection('content'); ?>


<div class=" col-xs-12">
    <h1 class="title">My Photos
        <?php if($photoLimit): ?>
        <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#uploadphotos">
            Upload Photos
        </button>
        <?php else: ?>
        <a href="<?php echo e(route('packages')); ?>" type="button" class="btn btn-danger  pull-right">
            Upgrade your membership to upload more photos.
        </a>
        <?php endif; ?>
        <!-- Button trigger modal -->

    </h1>


    <!-- Uplaod Modal -->
    <?php if($photoLimit): ?>
    <div class="modal fade" id="uploadphotos" tabindex="-1" role="dialog" aria-labelledby="uploadphotostitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="uploadphotostitle">Upload Photos</h4>
                </div>
                <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('users.photos.upload')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Make sure you photo is</h4>
                            <ul>
                                <li>Front face, close short or formal photo (Passport size allow) </li>
                                <li>Without sunglass and cap, No side face photo allow </li>
                                <li>Good resolution photo required </li>
                                <li>Photo properties not more than 10 MB</li>
                                <li>File Must be in PNG/JPG/JPEG format</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label class="custom-file">
                                <input type="file" name="mypic[]" multiple id="" placeholder="" class="custom-file-input"
                                    aria-describedby="fileHelpId">
                                <span class="custom-file-control"></span>
                            </label>
                            <label class="">Set Photos Private <input name="private" class="btn btn-sm btn-success"
                                    type="checkbox" value="1"></label>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-sm btn-success c" type="submit" value="Upload Photos">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>


</div>


<div class="col-xs-12 padding-0 margin-20">


    <?php if(isset($myPics)): ?>


    <?php $__empty_1 = true; $__currentLoopData = $myPics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


    <div class="col-md-3 col-xs-6">

        <div class="media photoslist">

            <div class="img-box">
                <div class="img-box-grid">
                    <img src="<?php echo e(url($myPicUrl[$item->id])); ?>" class="img-responsive">
                </div>
            </div>

            <div class="modal fade" id="profilepic-<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="profilepic-<?php echo e($item->id); ?>"
                aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <form action="<?php echo e(route('users.photos.setprofilepicture',$item->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="profilepic-<?php echo e($item->id); ?>">Change Profile
                                    Picture</h4>
                                <input type="hidden" name="picid" value="<?php echo e($item->id); ?>">
                            </div>
                            <div class="modal-body">
                                Are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Change Profile Picture</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="photolistbutons">


                <!-- Button trigger modal -->

                <?php if($item->is_profilepic == 1): ?>


                <span id="" class="btn btn-default btn-xs btn-block" role="button">Current Profile Picture</span>

                <?php else: ?>
                <button type="button" class="btn btn-primary btn-xs btn-block" data-toggle="modal" data-target="#profilepic-<?php echo e($item->id); ?>">
                    Set Profile Picture
                </button>
                <?php endif; ?>


                <?php if($item->private == 1): ?>

                <p>
                    <form action="<?php echo e(route('users.photos.setPublic',$item->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="privacypicpublic" value="<?php echo e($item->id); ?>">

                        <input type="submit" name="submit" class="btn btn-info btn-xs btn-block" role="button" value="Make Photo Public">

                    </form>
                </p>
                <?php else: ?>
                <p>
                    <form action="<?php echo e(route('users.photos.setPrivate',$item->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="privacypic" value="<?php echo e($item->id); ?>">

                        <input type="submit" name="submit" class="btn btn-warning btn-xs btn-block" role="button" value="Make Photo Private">

                    </form>
                </p>
                <?php endif; ?>

                <p>
                    <form action="<?php echo e(route('users.photos.delete',$item->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="deletepic" value="<?php echo e($item->id); ?>">

                        <input type="submit" name="submit" class="btn btn-danger btn-xs btn-block" role="button" value="Delete Photo">

                    </form>
                </p>

                <!-- Modal -->

            </div>

        </div>


    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-xs-12">
        <div class="alert alert-danger" role="alert">
            <strong>You have not uploaded any image</strong>
        </div>
    </div>

    <?php endif; ?>
    <?php else: ?>
    <div class="col-xs-12">
        <div class="alert alert-danger" role="alert">
            <strong>You have not uploaded any image</strong>
        </div>
    </div>

    <?php endif; ?>
    <div class="col-xs-12">
        <?php echo $myPics->render(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.users', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>