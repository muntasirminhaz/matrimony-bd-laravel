



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

            <div class="row">
                <div class="col-sm-4">

                    <ul class="list-group">
                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $name = $contact->first_name . ($contact->middle_name == '' ? ' ' .
                        $contact->last_name : $contact->middle_name . ' ' . $contact->last_name );
                        ?>
                        <a href="<?php echo e(route('users.viewContact', $contact->contact_id)); ?>">
                            <li class="list-group-item
                        <?php if(isset($active)): ?>
                            <?php if($active == $contact->contact_id): ?>
                                active
                            <?php endif; ?>                            
                        <?php endif; ?>
                        ">
                       <div class="row">
                            <div class="col-xs-2">
                                    <img style="max-width: 40px" class="img-responsive"
                                    src="<?php echo e(url(\App\Common::getUserProfilePic($contact->contact_id))); ?>" 
                                    alt="" srcset="">
                            </div>
    
                            <div class="col-xs-10">
    
                                <span class="text-left" style="min-height: 70px"> <?php echo e($name); ?></span>
                            </div>
                       </div>
                        
                    </li>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </ul>


                </div>
                <div class="col-sm-8">
                    <?php if(isset($active)): ?>

                    <?php
                    $username = $user->first_name . ($user->middle_name == '' ? ' ' .
                        $user->last_name : $user->middle_name . ' ' . $user->last_name );
                        
                    ?>

                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 20%" class="bg-warning">Name</td>
                                <td style="width: 80%" class="bg-yellow-active"><?php echo e($username); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="bg-warning">Mobile</td>
                                <td style="width: 80%" class="bg-yellow-active"><?php echo e($user->mobile); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="bg-warning">Email</td>
                                <td style="width: 80%" class="bg-yellow-active"><?php echo e($user->email); ?></td>
                            </tr>                            
                        </tbody>
                    </table>

                    <?php else: ?>
                    <p class="h2 text-center text-warning"> Click on any contact to view it's details.</p>

                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>