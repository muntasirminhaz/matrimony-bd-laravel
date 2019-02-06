<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">

                <div class="box-title">
                    <span class="text-center h2"><?php echo e($title); ?>'s Details</span>
                </div>
                <div class="pull-right">
                    

                    <div class="box-tools">

                        <?php if($user['status'] == 3 ): ?>

                        <form class="inline" action="<?php echo e(route('admin.users.unblockUserProfile',$user['id'])); ?>" method="get">
                            <?php echo csrf_field(); ?>
                            <button onclick="return confirm('Are you sure?\nThis will unblock the user.')" type="submit"
                                class="btn btn-danger btn-xs">Unblock User</button>
                        </form>


                        <?php else: ?>

                        <form class="inline" action="<?php echo e(route('admin.users.blockUserProfile',$user['id'])); ?>" method="get">
                            <?php echo csrf_field(); ?>
                            <button onclick="return confirm('Are you sure?\nThis will block the user.')" type="submit"
                                class="btn btn-github btn-xs">Block User</button>
                        </form>

                        <?php endif; ?>




                        <?php if($agent == 0): ?>

                        <?php if(Auth::guard('admin')->user()->admin_type == 4): ?>

                        <?php if(\App\AdminCommon::AgentRequested($user['id'])): ?>
                        <span class="btn btn-tumblr btn-xs"><span class="fa fa-user-circle-o"></span>
                            You requested to be this user's agent received.
                        </span>
                        <?php else: ?>
                        <a href="<?php echo e(route('admin.requestUserAgent', $user['id'])); ?>" class="btn btn-tumblr btn-xs"><span
                                class="fa fa-user-circle-o"></span>
                            Become Agent for this User
                        </a>
                        <?php endif; ?>

                        <?php else: ?>
                        <a href="<?php echo e(route('admin.userAgent.setUserAgent', $user['id'])); ?>" class="btn btn-tumblr btn-xs"><span
                                class="fa fa-user-circle-o"></span>
                            Set Agent
                        </a>

                        <?php endif; ?>

                        <?php else: ?>
                        <span class="btn btn-xs btn-twitter ">
                            Current Agent : <?php echo e($currentAgent); ?>

                        </span>
                        <a href="<?php echo e(route('admin.userAgent.setUserAgent', $user['id'])); ?>" class="btn btn-tumblr btn-xs"><span
                                class="fa fa-user-circle-o"></span>
                            Change Agent
                        </a>
                        <?php endif; ?>



                        <a target="_blank" href="<?php echo e(route('admin.users.userPdf',$user['id'])); ?>" class="btn btn-pinterest btn-xs"><span
                                class="fa fa-file-pdf-o"></span> Download PDF</a>
                        <a href="<?php echo e(route('admin.users.messageInbox',$user['id'])); ?>" class="btn btn-dropbox btn-xs"><span
                                class="fa fa-envelope-o"></span> View Messages</a>
                        <a href="<?php echo e(route('admin.users.interest',$user['id'])); ?>" class="btn btn-facebook btn-xs"><span
                                class="fa fa-gift"></span> Interests</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <div class="col-xs-12 padding-0">
                    <div href="#">
                        <div class="col-sm-4 padding-0 thumbnail">
                            <a class="overflow-hidden display-block">
                                <?php echo $user['photo']; ?>

                            </a>
                        </div>
                        <div class="col-sm-8 padding-0">
                            <div class="product-shrot-description">
                                <p class="bold-text"><?php echo e($user['description']); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Marital Status</td>
                                            <td class="bold-text"><?php echo e($user['marital_status']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td class="bold-text"><?php echo e($user['age']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Education</td>
                                            <td class="bold-text"><?php echo e($user['education_level'] ?? ' - '); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Profession</td>
                                            <td class="bold-text"><?php echo e($user['user_profession_type']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td class="bold-text"><?php echo e($user['height']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Father's Profession</td>
                                            <td class="bold-text"><?php echo e($user['father_profession']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mother's Profession</td>
                                            <td class="bold-text"><?php echo e($user['mother_profession']); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Number of Brothers</td>
                                            <td class="bold-text"><?php echo e($user['number_of_brothers']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Number of Sisters</td>
                                            <td class="bold-text"><?php echo e($user['number_of_sisters']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Home District</td>
                                            <td class="bold-text"><?php echo e($user['location_district']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Upzilla / Thana</td>
                                            <td class="bold-text"><?php echo e($user['location_upzila']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Living Country</td>
                                            <td class="bold-text"><?php echo e($user['location_living_country']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Living City</td>
                                            <td class="bold-text"><?php echo e($user['location_living_city']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Living Area</td>
                                            <td class="bold-text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(isset($education)): ?>
                <div class="col-xs-12">
                    <p class="text-center h2">Education</p>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Educaiton Level</th>
                                <th>Educaiton Area</th>
                                <th>Degree</th>
                                <th>Institution</th>
                                <th>Status</th>
                            </tr>

                            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="">
                                <td>
                                    <p><?php echo $item->education_level; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $item->education_area; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $item->degree_name; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $item->institution_name; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $item->status; ?></p>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>

                <?php if(isset($family)): ?>
                <div class="col-sm-6">
                    <p class="text-center h2">Family Information</p>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                            <?php $__currentLoopData = $family; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 45%"><?php echo e(ucwords($key)); ?></td>
                                <td class="bold-text"><?php echo e($value); ?></td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                <?php if(isset($relatives)): ?>
                <div class="col-sm-6">
                    <p class="text-center h2">Relatives</p>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                            <?php $__currentLoopData = $relatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 45%"><?php echo e($key); ?></td>
                                <td class="bold-text"><?php echo $value; ?></td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($myRelatives)): ?>
                            <?php $__currentLoopData = $myRelatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 45%">
                                    <?php echo e($item->relative_side == 1 ? 'Paternal ' : 'Maternal '); ?>

                                    <?php echo $item->gender == 1 ? 'Uncle' : 'Aunty'; ?>

                                </td>
                                <td class="bold-text">
                                    <?php echo $item->living_status == 2 ? 'Passed Away. <br>' : ''; ?>

                                    <?php echo $item->relative_profession > 0 ? 'Profession : ' .
                                    professionType($item->relative_profession) . ($item->relative_profession_details >
                                    0 ?
                                    ' ' . \App\Common::professionDetails($item->relative_profession,
                                    $item->relative_profession_details) : '') .' <br>' : ''; ?>


                                    <?php if($item->relative_profession > 0): ?>
                                    <?php echo $item->relative_designation != '' ? 'Designation : ' .
                                    $item->relative_designation .
                                    ' <br>' : ''; ?>

                                    <?php echo $item->relative_organization != '' ? 'Organization : ' .
                                    $item->relative_organization . ' <br>' : ''; ?>

                                    <?php endif; ?>

                                    <?php echo $item->marital_status == 1 ? ' Married. <br>' : ''; ?>


                                    <?php if( $item->marital_status == 1): ?>

                                    <?php echo $item->relative_spouse_living_status == 2 ? 'Spouse Passed Away. <br>' : ''; ?>

                                    <?php echo $item->relative_spouse_profession > 0 ? 'Spouse Profession : ' .
                                    professionType($item->relative_spouse_profession) .
                                    ($item->relative_spouse_profession_details > 0 ? ' ' .
                                    \App\Common::professionDetails($item->relative_spouse_profession,
                                    $item->relative_spouse_profession_details) : '') .' <br>' : ''; ?>


                                    <?php if($item->relative_spouse_profession > 0): ?>
                                    <?php echo $item->relative_spouse_designation != '' ? 'Spouse Designation : ' .
                                    $item->relative_spouse_designation . ' <br>' : ''; ?>

                                    <?php echo $item->relative_spouse_organization != '' ? 'Spouse Organization : ' .
                                    $item->relative_spouse_organization . ' <br>' : ''; ?>

                                    <?php endif; ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>

                <p class="text-center h2">Profile Details</p>
                <hr>
                <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6">
                    <table class="table table-striped table-responsive">
                        <tbody>
                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key != 'photo'): ?>
                            <tr>
                                <td style="width: 33%" class=""><?php echo ucwords(str_ireplace('_', ' ', $key)) ?></td>
                                <td class="bold-text text-bold"><?php echo $value; ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(isset($partnerPreference)): ?>
                <p class="text-center h2">Partner Preference</p>
                <hr>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                            <?php $__currentLoopData = $partnerPreference1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 35%"><?php echo e($key); ?></td>
                                <td class="bold-text"><?php echo $value; ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                            <?php $__currentLoopData = $partnerPreference2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 35%"><?php echo e($key); ?></td>
                                <td class="bold-text"><?php echo $value; ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>

            </div>
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>