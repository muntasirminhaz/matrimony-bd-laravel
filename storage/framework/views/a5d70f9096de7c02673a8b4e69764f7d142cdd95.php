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
                        <h4>Package : Diamond</h4>
                    </div>
                </div>
                <div class="coler">
                    <div class="container-fluid bg-warning">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/img/img.jpg" alt="image" class="img-responseive" height="70" width="100">
                            </div>
                            <div class="col-md-9">
                                <div class="tablediv">
                                    <table class="table table-bordered table-condensed">
                                        <tr>
                                            <th class="tbTdFirst"> Packages Name </th>
                                            <td class="middle">:</td>
                                            <td class="tbTdLast"> Diamond</td>
                                        </tr>
                                        <tr>
                                            <th class="tbTdFirst"> Duration </th>
                                            <td class="middle">:</td>
                                            <td class="tbTdLast"> 360 Days</td>
                                        </tr>
                                        <tr>
                                            <th class="tbTdFirst"> Fee for NRB </th>
                                            <td class="middle">:</td>
                                            <td class="tbTdLast"> 180 $</td>
                                        </tr>
                                        <tr>
                                            <th class="tbTdFirst"> Fee for Local </th>
                                            <td class="middle">:</td>
                                            <td class="tbTdLast"> 13775 Tk</td>
                                        </tr>
                                        <tr>
                                            <th class="tbTdFirst"> Profile View </th>
                                            <td class="middle">:</td>
                                            <td class="tbTdLast"> Unlimited</td>
                                        </tr>
                                        <tr>
                                            <th class="tbTdFirst">Contact Details </th>
                                            <td class="middle">:</td>
                                            <td class="tbTdLast"> 55</td>
                                        </tr>
                                        <tr>
                                            <th class="tbTdFirst"> Packages Name </th>
                                            <td class="middle">:</td>
                                            <td class="tbTdLast"> Diamond</td>
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
                                                <th class="tbTdFirst"></th>
                                                <th class="middle">Free</th>
                                                <th class="tbTdLast">Diamond Membership</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst"> Display Profile </th>
                                                <th class="middle">&#8730;</th>
                                                <th class="tbTdLast"> &#8730;</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst"> Priority Display </th>
                                                <th class="middle">&#10005;</th>
                                                <th class="tbTdLast"> &#8730;</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst">Post Photo </th>
                                                <th class="middle">03</th>
                                                <th class="tbTdLast"> 10</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst"> Contact Details </th>
                                                <th class="middle">&#10005;</th>
                                                <th class="tbTdLast">55</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst">Privacy </th>
                                                <th class="middle">&#10005;</th>
                                                <th class="tbTdLast"> &#8730;</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst">Send Message </th>
                                                <th class="middle">&#10005;</th>
                                                <th class="tbTdLast"> 300</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst">Daily Message</th>
                                                <th class="middle">&#10005;</th>
                                                <th class="tbTdLast"> 20</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst">Proposal Total</th>
                                                <th class="middle">10</th>
                                                <th class="tbTdLast"> 350</th>
                                            </tr>
                                            <tr>
                                                <th class="tbTdFirst"> Packages Name </th>
                                                <th class="middle">&#10005;</th>
                                                <th class="tbTdLast"> Diamond</th>
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
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="sideimg">
                                    <img src="assets/img/img.jpg" alt="image" class="img-responseive" height="60" width="60">
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>