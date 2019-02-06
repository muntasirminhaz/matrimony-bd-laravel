




<?php $__env->startSection('content'); ?>


<!-- Large Banner Start -->
<div class="container-fluid">
    <div class="row padding-0">
    </div>
</div>
<!-- Large Banner End -->

<div class="container ">
    <div class="row display-inline">
        <div class="col-xs-12 col-md-8 tableload">

            <div class="newhom">
                <div class="container-fluid">
                    <div class="package">
                        <h4>Package : <?php echo e($package->package_name); ?></h4>
                    </div>
                </div>
                <div class="coler">
                    <div class="container-fluid bg-warning">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo e(asset('packages/' . $package->package_image)); ?>" alt="image" class="img-responseive"
                                    height="70" width="100">
                            </div>
                            <div class="col-md-9">
                                <div class="tablediv">
                                    <table class="table table-bordered table-condensed">
                                        <tr>
                                            <th style="width:30%"> Package Name </th>
                                            <th style="width:30%">:</th>
                                            <th style="width:40%"> <?php echo e($package->package_name); ?></th>
                                        </tr>

                                        <tr>
                                            <td style="width:30%"> Duration </td>
                                            <td style="width:30%">:</td>
                                            <td style="width:40%"> <?php echo e($package->package_active_days); ?></td>
                                        </tr>

                                        <tr>
                                            <td style="width:30%"> Fee for NRB </td>
                                            <td style="width:30%">:</td>
                                            <td style="width:40%"> <?php echo e($package->package_nrb_price); ?> $</td>
                                        </tr>

                                        <tr>
                                            <td style="width:30%"> Fee for Local </td>
                                            <td style="width:30%">:</td>
                                            <td style="width:40%"> <?php echo e($package->package_price); ?> Tk</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row padding-0-15">
                            <div class="col-xs-12 col-md-12">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="package">
                        <h4>Benefits of membership</h4>
                    </div>
                    <div class="coler benif">
                        <div class="container-fluid bg-warning">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-md-10">
                                    <div class="tablediv">
                                        <table class="table table-bordered table-condensed">


                                            <tr>
                                                <th style="width:30%"></th>
                                                <th style="width:30%" class='text-align-center'>Free</th>
                                                <th style="width:40%" class='text-align-center'><?php echo e($package->package_name); ?>

                                                    Membership</th>
                                            </tr>


                                            <tr>
                                                <td style="width:30%"> Profile Active Days</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->package_active_days); ?> days</td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->package_active_days); ?>

                                                    days</td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%"> Top in search</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->top_in_search == 0
                                                    ? 'X' : '√'); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->top_in_search == 0 ?
                                                    'X' : '√'); ?></td>

                                            </tr>

                                            <tr>
                                                <td style="width:30%"> Post Photo</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->post_photo); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->post_photo); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%"> Direct Contact Info</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->direct_contact_information); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->direct_contact_information); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Privacy</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->privacy_set); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->privacy_set); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Send Message</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->send_message); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->send_message); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Daily Message</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->daily_message); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->daily_message); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Total Interest Express</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->total_interest_express); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->total_interest_express); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Daily Interest Express</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->daily_interest_express); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->daily_interest_express); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Interest Approve</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->interest_approve); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->interest_approve); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Total Interest Approve</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->total_interest_approve); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->total_interest_approve); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Daily Interest Approve</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->daily_interest_approve); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->daily_interest_approve); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Send Profle</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->send_profile); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->send_profile); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Add Favorite</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->add_favorite); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->add_favorite); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Most Favorite</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->most_favorite); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->most_favorite); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%">Block Profile</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->block_profile == 0
                                                    ? 'X' : '√'); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->block_profile == 0 ?
                                                    'X' : '√'); ?></td>

                                            </tr>

                                            <tr>
                                                <td style="width:30%">Counselling</td>
                                                <td style="width:30%" class='text-align-center'><?php echo e($freePackage->counselling == 0 ?
                                                    'X' : '√'); ?></td>
                                                <td style="width:40%" class='text-align-center'><?php echo e($package->counselling == 0 ? 'X'
                                                    : '√'); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <?php if(auth()->guard()->guest()): ?>
                                                    <a href="<?php echo e(route('register')); ?>" type="button" class="btn btn-large btn-block btn-primary ">Signup
                                                        up and Become a <?php echo e($package->package_name); ?> Member</a>
                                                    <?php else: ?>

                                                    <a class="btn btn-primary btn-block" data-toggle="modal" href='#modal-id'>Upgrade
                                                        Memebership Now</a>
                                                    <div class="modal fade" id="modal-id">
                                                        <form action="<?php echo e(route('users.upgradePackage')); ?>" method="POST"
                                                            role="form">
                                                            <?php echo csrf_field(); ?>

                                                            <input type="hidden" name="package_name" value="<?php echo e($package->package_name); ?>">
                                                            <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>">
                                                            <input type="hidden" name="package_price" value="<?php echo e($package->package_price); ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h3 class="modal-title text-center">
                                                                            Buy <?php echo e($package->package_name); ?> Memebrship
                                                                            Package
                                                                        </h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <label for="input-id" class="col-sm-4">Payment
                                                                                Method</label>
                                                                            <div class="col-sm-8">
                                                                                <select required name="paymentment" id="inputpaymentment"
                                                                                    class="form-control" required="required">
                                                                                    <option value="">Select Payment
                                                                                        Method</option>
                                                                                    <?php $__currentLoopData = paymentMethods(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key
                                                                                    => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="input-id" class="col-sm-4">Transaction
                                                                                ID</label>
                                                                            <div class="col-sm-8">
                                                                                <input required placeholder="Add transection id of your Bkash/Rocket"
                                                                                    type="text" name="transcationid" id="transcationid"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="input-id" class="col-sm-4">Mobile
                                                                                / Account
                                                                                Number </label>
                                                                            <div class="col-sm-8">
                                                                                <input required placeholder="Add Bkash/Rocket Mobile No/Account No"
                                                                                    type="text" name="mobnum" id="mobnum"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-block btn-primary">Confirm
                                                                            Your Purchase Now.</button>
                                                                    </div>
                                                                </div>
                                                        </form>

                                                    </div>
                                    </div>

                                    <?php endif; ?>
                                    </td>
                                    </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="col-xs-12 col-md-4">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="ourPack">Our Packages</h2>
            </div>
            <div class="righsideco">
                <div class="container-fluid">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row getpackageid" style="cursor: pointer" data-packageid="<?php echo e($item->id); ?>">
                        <div class="col-sm-3">
                            <div class="sideimg">
                                <img src="<?php echo e(asset('packages/' . $item->package_image)); ?>" alt="image" class="img-responseive"
                                    height="60" width="60">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="sidecont">
                                <p> <span class="diamn"><a href="#"><?php echo e($item->package_name); ?></a> </span> <br>
                                    Duration : 360 Days <span class="diamn"> Contact</span> : 55
                                    Fee : 13775 BDT For NRB : 180$</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerscript'); ?>
<script>
    $(function () {

        $('.getpackageid').on('click', function () {
            $('.newhom').hide(50);
            getPackageData($(this).attr('data-packageid'));
        });

        function getPackageData(package_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('package-details/')); ?>" + '/' + package_id,
                method: 'get',
                data: {
                    packageid: package_id,
                },
                success: function (result) {
                    $('.tableload').children().empty();
                    $('.tableload').children().remove();
                    $('.tableload').html(result);
                    $('.newhom').show(50);

                }
            });
        }



    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>