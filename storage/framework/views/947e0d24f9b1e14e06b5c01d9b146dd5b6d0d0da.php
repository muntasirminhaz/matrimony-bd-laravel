<?php $__env->startSection('content'); ?>
<div class="col-sm-12 card">
    <div class="panel panel-default">
        <div class="panel-heading title " style="display: inline-block;width: 100%;">
            <div class="col-sm-3 inline mobile-text-center">
                <span class="h3 "> <?php echo e($user->name); ?></span>
            </div>
            <span>
                <div class="col-sm-8  padding-0-5 pull-right ">

                    

                    <?php if($limitMostFavorite): ?>
                    <?php if($alreadyMostFavorite): ?>
                    <a data-toggle="popover" data-trigger="hover" data-content="You have added this user to most favorites."
                        data-placement="top" class="btn btn-default btn-xs pull-right mobile-send-button-fix"><span
                            class="fa fa-bookmark-o"></span>
                        Add to Most Favorite</a>
                    <?php else: ?>
                    <a class="btn btn-primary btn-xs pull-right mobile-send-button-fix" data-toggle="modal" href='#mostfavorite'><span
                            class="fa fa-plus-square-o"></span>
                        Add to Most Favorite</a>
                    <div class="modal fade" id="mostfavorite">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <form action="<?php echo e(route('users.sendMostFavorite', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add <?php echo e($user->name); ?> <br>to Most Favorite?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success pull-right  btn-xs">Add to
                                            Most Favorite</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php else: ?>
                    <a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Profiles to Most Favorite."
                        data-placement="top" class="btn btn-default btn-xs pull-right mobile-send-button-fix"><span
                            class="fa fa-gift"></span> Add to
                        Most Favorite</a>
                    <?php endif; ?>
                    


                    

                    <?php if($limitFavorite): ?>

                    <?php if($alreadyFavorite): ?>
                    <a data-toggle="popover" data-trigger="hover" data-content="You have added this user to favorites."
                        data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span
                            class="fa fa-bookmark-o"></span>
                        Add to Favorite</a>
                    <?php else: ?>
                    <a class="btn btn-info btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal"
                        href='#favorite'><span class="fa fa-bookmark-o"></span>
                        Add to Favorite</a>
                    <div class="modal fade" id="favorite">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <form action="<?php echo e(route('users.sendFavorite', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add <?php echo e($user->name); ?> to Favorite</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure?</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success pull-right btn-xs">Add to
                                            Favorites</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php else: ?>
                    <a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Profiles to Favorite"
                        data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span
                            class="fa fa-gift"></span>
                        Express Interest</a>
                    <?php endif; ?>
                    


                    

                    <?php if($limitInterest): ?>

                    <?php if($alreadyInterestExpressed): ?>
                    <a data-toggle="popover" data-trigger="hover" data-content="You have expressd interest to this user."
                        data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span
                            class="fa fa-gift"></span>
                        Expressed Interest</a>
                    <?php else: ?>
                    <a class="btn btn-warning btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal"
                        href='#interest'><span class="fa fa-gift"></span>
                        Express Interst</a>
                    <div class="modal fade" id="interest">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?php echo e(route('users.sendInterest', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Express Interest to <?php echo e($user->name); ?></h4>
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
                        data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span
                            class="fa fa-gift"></span>
                        Express Interest</a>
                    <?php endif; ?>
                    


                    
                    <?php if($limitMessage): ?>

                    <a class="btn btn-success btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal"
                        href='#message'><span class="fa fa-envelope-o"></span>
                        Message</a>
                    <div class="modal fade" id="message">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form action="<?php echo e(route('users.sendMessage', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Send Message to <?php echo e($user->name); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input required type="text" name="title" class="form-control" placeholder="Enter Message Title">
                                        <br>
                                        <textarea required name="message" placeholder="Enter Your Message" class="form-control"
                                            cols="30" rows="3"></textarea>

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
                    <a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to send messages."
                        data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span
                            class="fa fa-envelope-o"></span>
                        Message</a>
                    <?php endif; ?>

                    

                    

                    <?php if($limitContact): ?>
                    <?php if($alreadyContactAdded): ?>
                    <a data-toggle="popover" data-trigger="hover" data-content="You have added this user to most favorites."
                        data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span
                            class="fa fa-user-plus"></span>
                        Add to Contacts</a>
                    <?php else: ?>
                    <a class="btn btn-pinterest btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal"
                        href='#contact'><span class="fa fa-user-plus"></span>
                        Add to Contacts</a>
                    <div class="modal fade" id="contact">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <form action="<?php echo e(route('users.sendContact', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add Contact info of <?php echo e($user->name); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success pull-right  btn-xs">Add to
                                            Contacts</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php else: ?>
                    <a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Contact."
                        data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span
                            class="fa fa-user-plus"></span>
                        Add to Contacts</a>
                    <?php endif; ?>
                    

                </div>
            </span>
        </div>
        <div class="panel-body">
            <div class="col-xs-12">
                <div class="col-xs-12 padding-0">
                    <div href="#">
                        <div class="col-sm-4 padding-0 thumbnail">
                            <a class="overflow-hidden display-block">
                                <?php if(isset($user->photoSlider)): ?>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php $__currentLoopData = $user->photoSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li data-target="#myCarousel" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($key == 0 ? 'active' : ''); ?>"></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <?php $__currentLoopData = $user->photoSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item <?php echo e($key == 0 ? 'active' : ''); ?>">
                                            <img src='<?php echo e(url($item)); ?>' alt="Los Angeles" style="width:100%;">
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="z-index: 9"><span
                                            class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="z-index: 9"><span
                                            class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <?php else: ?>
                                <img class="img-responsive" src="<?php echo e(url($user->photo)); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="col-sm-8 padding-0">
                            <div class="product-shrot-description">
                                <p class="bold-text"><?php echo e($user->description); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                       
                                        <tr>
                                            <td>Age</td>
                                            <td class="bold-text"><?php echo e($user->age); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Education</td>
                                            <td class="bold-text"><?php echo e($user->education_level ?? ' - '); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Profession</td>
                                            <td class="bold-text"><?php echo e($user->user_profession_type); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td class="bold-text"><?php echo e(height($user->height)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td class="bold-text"><?php echo e($user->weight); ?> Kg.</td>
                                        </tr>
                                        <tr>
                                            <td>Father's Profession</td>
                                            <td class="bold-text"><?php echo e($user->father_profession); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mother's Profession</td>
                                            <td class="bold-text"><?php echo e($user->mother_profession); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                            <tr>
                                                    <td>Marital Status</td>
                                                    <td class="bold-text"><?php echo e($user->marital_status); ?></td>
                                                </tr>
                                        <tr>
                                            <td>Number of Brothers</td>
                                            <td class="bold-text"><?php echo e($user->number_of_brothers); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Number of Sisters</td>
                                            <td class="bold-text"><?php echo e($user->number_of_sisters); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Home District</td>
                                            <td class="bold-text"><?php echo e($user->location_district); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Upzilla / Thana</td>
                                            <td class="bold-text"><?php echo e($user->location_upzila); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Living Country</td>
                                            <td class="bold-text"><?php echo e($user->location_living_country); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Living City</td>
                                            <td class="bold-text"><?php echo e($user->location_living_city); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(isset($user->profession)): ?>
            <div class="col-xs-12">
                <p class="text-center h2">Profession</p>
                <hr>
                <table class="table table-striped">
                    <tbody>
                            <tr>
                                    <th>Profession Type</th>
                                    <th>Profession Details</th>
                                    <th>Designation</th>
                                    <th>Organization Name</th>
                                </tr>
                                <tr class="">
                            <?php $__currentLoopData = $user->profession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                    <p><?php echo $item; ?></p>
                                </td>                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
            
            <?php if(isset($user->education)): ?>
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

                            <?php $__currentLoopData = $user->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            

            <?php if(isset($user->family)): ?>
            <div class="col-sm-6">
                <p class="text-center h2">Family Information</p>
                <hr>
                <table class="table table-striped">
                    <tbody>
                        <?php $__currentLoopData = $user->family; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="width: 45%"><?php echo e(ucwords($key)); ?></td>
                            <td class="bold-text"><?php echo e($value); ?></td>
                        </tr>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
            <?php if(isset($user->relatives)): ?>
            <div class="col-sm-6">
                <p class="text-center h2">Relatives</p>
                <hr>
                <table class="table table-striped">
                    <tbody>
                        <?php $__currentLoopData = $user->relatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="width: 45%"><?php echo e($key); ?></td>
                            <td class="bold-text"><?php echo $value; ?></td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($user->myRelatives)): ?>
                        <?php $__currentLoopData = $user->myRelatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="width: 45%">
                                <?php echo e($item->relative_side == 1 ? 'Paternal ' : 'Maternal '); ?>

                                <?php echo $item->gender == 1 ? 'Uncle' : 'Aunty'; ?>

                            </td>
                            <td class="bold-text">
                                <?php echo $item->living_status == 2 ? 'Passed Away. <br>' : ''; ?>

                                <?php echo $item->relative_profession > 0 ? 'Profession : ' .
                                professionType($item->relative_profession) . ($item->relative_profession_details > 0 ?
                                ' ' . \App\Common::professionDetails($item->relative_profession,
                                $item->relative_profession_details) : '') .' <br>' : ''; ?>


                                <?php if($item->relative_profession > 0): ?>
                                <?php echo $item->relative_designation != '' ? 'Designation : '  . $item->relative_designation .
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


            <?php if(isset($user->partnerPreference)): ?>
            <div class="col-xs-12">
                <p class="text-center h2">Partner Preference</p>
                <hr>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                            <?php $__currentLoopData = $user->partnerPreference1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $user->partnerPreference2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 35%"><?php echo e($key); ?></td>
                                <td class="bold-text"><?php echo $value; ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>












            </div>
            <div class="pull-right">
                <a class="text-sm text-muted" data-toggle="modal" href='#reportUser'><small>Report User</small></a>
                <div class="modal fade" id="reportUser">

                    <div class="modal-dialog">

                        <form action="<?php echo e(route('users.reportUser', $user->id)); ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <?php echo csrf_field(); ?>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Report <?php echo e($user->name); ?></h4>
                                </div>
                                <div class="modal-body">
                                    <textarea placeholder="Tell us why you want to report <?php echo e($user->name); ?>. Please provide details."
                                        name="reportmessage" id="reportmessage" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left btn-sm" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Submit Report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>