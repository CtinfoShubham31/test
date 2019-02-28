<div class="dw-wrapper">
    <div class="dw-dashboard _3dwht">
        <div class="topHeading">
            <div class="container">
                <div class="col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4 dw-dashboard-profile"> <img src="images/ceo.jpg" class="img-circle"> </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 dw-dashboard-title">
                            <h3>Mike Johnson</h3>
                            <p><img src="images/bookingIcon.png" width="15" class="img-responsive">My Bookings: 12</p>
                            <p><img src="images/recieved_icons.png" width="12" class="img-responsive" style="margin-right:11px;">My Received Bookings: 08</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-2 col-sm-12">
                    <div class="searchBar search-book">
                        <input placeholder="Search bookings" class="destination" type="text">
                        <a href="search-parking.html">
                            <button type="submit" class="searchBttn booking-btn bttn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </a> 
                    </div>
                </div>
            </div>
        </div>
        <div class="container padd50">
            <div class="col-md-3 col-sm-4">
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked">
                  <li><a href="dashboard.html"><span class="fa fa-long-arrow-right"></span>Dashboard</a></li>
                  <li><a href="my-spaces.html"><span class="fa fa-long-arrow-right"></span>My Dryveways</a></li>
                  <li class="active"><a href="complete-bookings.html"><span class="fa fa-long-arrow-right"></span>Completed Bookings</a></li>
                  <li><a href="upcoming-bookings.html"><span class="fa fa-long-arrow-right"></span>Upcoming Bookings</a></li>
                  <li><a href="payment.html"><span class="fa fa-long-arrow-right"></span>Payment</a></li>
                  <li><a href="edit-profile.html"><span class="fa fa-long-arrow-right"></span>Update Your Profile</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <div class="_3wtable">
                            <h3> Completed Bookings </h3>
                            <?php
                            if(!empty($get_my_booking)){
                                foreach ($get_my_booking as $mybooked) {
                            ?>
                            <div class="_3wtableMain">
                                <div class="row">
                                    <div class="col-md-12 _3wtableMainInner">
                                        <div class="col-md-3 _3wtableMainProfile"> 
                                            <?php 
                                            if(!empty($mybooked->rent_space_picture)){
                                            ?>
                                            <img src="uploads/space_pic/<?php echo $mybooked->rent_space_picture;?>" class="img-responsive">
                                            <?php
                                            }else{ 
                                            ?>
                                            <img src="images/car.jpg" class="img-responsive">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-9 _3wtableMainTitle">
                                            <h4><?php if(!empty($mybooked->book_rent_user_fname) && !empty($mybooked->book_rent_user_lname)){ echo $mybooked->book_rent_user_fname.' '.$mybooked->book_rent_user_lname;}?></h4>
<!--                                            <ul>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>-->
                                            <div class="rating_stars"><span style="width: 16px;"></span></div>
                                            <div class="clearfix"></div>
                                            <p><i class="fa fa-calendar"></i> <strong> Start Date:</strong> <?php if(!empty($mybooked->book_space_fromdatetime)){ echo date("m/d/Y H:i A", strtotime(trim($mybooked->book_space_fromdatetime)));} ?> </p>
                                            <p><i class="fa fa-calendar"></i> <strong> End Date:</strong> <?php if(!empty($mybooked->book_space_todatetime)){ echo date("m/d/Y H:i A", strtotime(trim($mybooked->book_space_todatetime)));} ?> </p>
                                            <p><i class="fa fa-credit-card"></i> <strong> Price: </strong> <span><?php if(!empty($mybooked->book_rent_space_rate)){ echo $mybooked->book_rent_space_rate;} ?><sub>Per hour</sub></span></p>
                                            <div class="_3wtableMainBttn">
                                                <button class="btn-success space_status" data-toggle="modal" data-target="#review_modal"> Write a Review </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                          
                            
                          
<!--                            <div class="_3wtableMain">
                                <div class="row">
                                    <div class="col-md-12 _3wtableMainInner">
                                        <div class="col-md-3 _3wtableMainProfile"> <img src="images/car.jpg" class="img-responsive"> </div>
                                        <div class="col-md-9 _3wtableMainTitle">
                                            <h4>Parking Space on E Indiantown</h4>
                                            <ul>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <p><i class="fa fa-calendar"></i> <strong> Start Date:</strong> 24/06/2017 11:30 AM </p>
                                            <p><i class="fa fa-calendar"></i> <strong> End Date:</strong> 26/06/2017 4:00 AM </p>
                                            <p><i class="fa fa-credit-card"></i> <strong> Price: </strong> <span>1.20<sub>Per day</sub></span></p>
                                            <div class="_3wtableMainBttn">
                                                <button class="btn-success space_status" data-toggle="modal" data-target="#review_modal"> Write a Review </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

<!--                            <div class="_3wtableMain">
                                <div class="row">
                                    <div class="col-md-12 _3wtableMainInner">
                                      <div class="col-md-3 _3wtableMainProfile"> <img src="images/car.jpg" class="img-responsive"> </div>
                                        <div class="col-md-9 _3wtableMainTitle">
                                            <h4>Parking Space on E Indiantown</h4>
                                            <ul>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <p><i class="fa fa-calendar"></i> <strong> Start Date:</strong> 24/06/2017 11:30 AM </p>
                                            <p><i class="fa fa-calendar"></i> <strong> End Date:</strong> 26/06/2017 4:00 AM </p>
                                            <p><i class="fa fa-credit-card"></i> <strong> Price: </strong> <span>1.20<sub>Per day</sub></span></p>
                                            <div class="_3wtableMainBttn">
                                                <button class="btn-success space_status" data-toggle="modal" data-target="#review_modal"> Write a Review </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    

