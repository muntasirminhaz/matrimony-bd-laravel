<?php $__env->startSection('content'); ?>
<div class="profileSection">
    <div class="container">
        <div class="row ">
            <div class="col-sm-1 hidden-xs"></div>
            <div class="col-sm-10">
                <br />

                <div class="profileContent">
                    <div class="pCont">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="myPimg margin-bottom-20 media photoslist">
                                        <img src="<?php echo e(url($profilePicture)); ?>" alt="" class="">
                                        <div class="photolistbutons">
                                            <a class="btn btn-primary btn-xs btn-block" href="<?php echo e(route('users.photos.index')); ?>">Change Profile Picture</a>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-9">
                                    <div class="basic-information">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="pConLeft">
                                                    <table class="table tbl-1">
                                                        <tr>
                                                            <td colspan="4">
                                                                Description : <?php echo e(Auth::user()->description); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Name :
                                                            </td>
                                                            <td>
                                                                <?php echo e(Auth::user()->first_name .
                                                                (Auth::user()->middle_name != '' ? ' ' .
                                                                Auth::user()->middle_name :'') . ' ' .
                                                                Auth::user()->last_name); ?>

                                                            </td>
                                                            <td>
                                                                Religion :
                                                            </td>
                                                            <td>
                                                                <?php echo e(religion(Auth::user()->religion)); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Marital Status :
                                                            </td>
                                                            <td>
                                                                <?php echo e(maritalstatus(Auth::user()->marital_status)); ?>

                                                            </td>
                                                            <td>
                                                                Location
                                                            </td>
                                                            <td>
                                                                : ---
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Posted by :
                                                            </td>
                                                            <td>
                                                                <?php echo e(relation(Auth::user()->regisration_as)); ?>

                                                            </td>
                                                            <td>
                                                                Mother Tongue :
                                                            </td>
                                                            <td>
                                                                <?php echo e(motherTongue(Auth::user()->language)); ?>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="col-sm-6">
                                                <div class="pConRight">
                                                    dsfadsas
                                                </div>
                                            </div>-->
                                        </div>

                                        <div class="preVieProfile">
                                            <a href="">Preview your profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-space"></div>

                        <div class="aboutMysefl">
                            <div class="profile_sel_tab">
                                About Myself
                            </div>
                            <div class="profile_sel_tab2">
                                <a href="#PartnerPreference">
                                    Partner Preference
                                </a>
                                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                            </div>
                            <div class="space-10"></div>
                        </div>




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Basic Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($editBasic); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $basic1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $basic2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Educational Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($addEducation ?? '#'); ?>">Add Education</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($education != NULL ): ?>                            
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-bordered text-small margin-top-10">
                                        <tbody>
                                            <tr>
                                                <th>Educaiton Level</th>
                                                <th>Educaiton Area</th>
                                                <th>Degree</th>
                                                <th>Institution</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="basTab">
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
                                                <td>
                                                    <p><?php echo $item->edit; ?></p>
                                                </td>
                                            </tr>



                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Profession Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($editProfession); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $profession1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $profession2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Father and Mother Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($editParent); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $father; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $mother; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <tr class="basTab">
                                                <?php $__currentLoopData = $land; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value != ''): ?>

                                                <td class="">
                                                    <p><?php echo e($key); ?> :<?php echo e($value); ?></p>
                                                </td>
                                                <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Location and Address Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($editLocation); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $location1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $location2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Siblings Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($editSiblings); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                                <a href="<?php echo e($addSiblings); ?>">Add New</a><span class="glyphicon glyphicon-play"
                                                    aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $siblings1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $siblings2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($siblings != ''): ?>
                                    
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-bordered margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $siblings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="basTab">
                                                <td class="">
                                                    <p>
                                                        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($siblingFields[$key] != 'delete' &&
                                                        $siblingFields[$key] != 'id' &&
                                                        $siblingFields[$key] != 'edit'): ?>
                                                        <?php if($value != ''): ?>
                                                        <span><?php echo e($siblingFields[$key]); ?> : <span class="bold-text"><?php echo e($value); ?></span></span>,
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo $item->edit; ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>


                        <div class="heading-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="head">
                                            <h5>Relatives Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($editRelatives); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                                <a href="<?php echo e($addRelatives); ?>">Add New</a><span class="glyphicon glyphicon-play"
                                                    aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $relatives1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $relatives2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php if($relatives != ''): ?>
                                    
                                <div class="col-sm-12 margin-top-10 margin-bottom-15">
                                    <table class="table table-bordered margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $relatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="basTab">
                                                <td class="">
                                                    <p>
                                                        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($relativeFields[$key] != 'delete' &&
                                                        $relativeFields[$key] != 'edit' &&
                                                        $relativeFields[$key] != 'id' &&
                                                        $relativeFields[$key] != 'relative_side'): ?>
                                                        <?php if($value != ''): ?>
                                                        <span><?php echo e($relativeFields[$key]); ?> : <span class="bold-text"><?php echo e($value); ?></span></span>,
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo $item->edit; ?>

                                                    </p>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php endif; ?>

                            </div>

                        </div>





                        <!----- --------------------------->
                        <div class="Partpre" id="PartnerPreference">
                            <span class="PartpreSpan">
                                <h4> Partner Preference </h4>
                            </span>

                        </div>
                        <!----- --------------------------->


                        <div class="container-fluid">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 margin-top-10">
                                        <div class="editRig pull-right">
                                            <a href="<?php echo e($editPreference); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                                aria-hidden="true">
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="heading-bottom"> </div>
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $preference1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $preference2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>

                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="Partpre">
                            <span class="PartpreSpan">
                                <h4> My Contact detail </h4>
                            </span>

                        </div>
                        <br>
                        <!----- --------------------------->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 margin-top-10">
                                    <div class="editRig pull-right">
                                        <a href="<?php echo e($editContact); ?>">Edit</a><span class="glyphicon glyphicon-play"
                                            aria-hidden="true">
                                        </span></div>
                                </div>
                            </div>
                        </div>
                        <div class="heading-bottom"> </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 margin-top-10 margin-bottom-15">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $contact1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>
                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 margin-top-10 margin-bottom-15" style="border-left: 1px solid #D9D9D9;">
                                    <table class="table table-borderless margin-top-10">
                                        <tbody>
                                            <?php $__currentLoopData = $contact2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value != ''): ?>
                                            <tr class="basTab">
                                                <td class="col-sm-5 padding-0">
                                                    <p><?php echo e($key); ?></p>
                                                </td>
                                                <td class="col-sm-1 padding-0">
                                                    <p>:</p>
                                                </td>
                                                <td class="col-sm-6 padding-0">
                                                    <p><?php echo e($value); ?></p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--peFdetailsCarPer-->
                </div>
            </div>
        </div>
        <div class="col-sm-1 hidden-xs"></div>
    </div>
</div>
</div>

<?php if($education != ''): ?>
    
<?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="modal fade" id="educationDelete<?php echo e($item->id); ?>" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h5">Are you sure you want to delete?</h4>
            </div>
            <form action="<?php echo e($item->delete); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-danger btn-xs btn-block" data-dismiss="modal">Cancel
                            Delete</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-xs btn-block">Confirm Delete </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php if($siblings != ''): ?>

<?php $__currentLoopData = $siblings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="siblingDelete<?php echo e($item->id); ?>" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h5">Are you sure you want to delete?</h4>
            </div>
            <form action="<?php echo e($item->delete); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-danger btn-xs btn-block" data-dismiss="modal">Cancel
                            Delete</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-xs btn-block">Confirm Delete </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php if($relatives != ''): ?>
<?php $__currentLoopData = $relatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="relativeDelete<?php echo e($item->id); ?>" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h5">Are you sure you want to delete?</h4>
            </div>
            <form action="<?php echo e($item->delete); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-danger btn-xs btn-block" data-dismiss="modal">Cancel
                            Delete</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-xs btn-block">Confirm Delete </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>