<!-- Modal -->
<div class="modal ReviewModal fade" id="review_modal" role="dialog">
    <div class="modal-dialog" style="z-index: 11111;"> 
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><strong>Review & Rating</strong></h4>
            </div>
            <div class="modal-body">
                <div class="rateSpace text-center">
                    <h3>Rate the parking space</h3>
                    <ul>
                        <li><a href="#" class="fa fa-star"></a></li>
                        <li><a href="#" class="fa fa-star"></a></li>
                        <li><a href="#" class="fa fa-star"></a></li>
                        <li><a href="#" class="fa fa-star-o"></a></li>
                        <li><a href="#" class="fa fa-star-o"></a></li>
                    </ul>
                </div>
                <div class="WriteReview">
                  <form>
                    <p>Please write a review</p>
                    <textarea>

                    </textarea>
                    <button type="button" class="reviewBttn bttn-gr ">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------review modal ------->
<!-- Modal -->
<div class="modal ReviewModal fade" id="view-review" role="dialog">
    <div class="modal-dialog" style="z-index: 11111;"> 
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><strong> User Review </strong></h4>
            </div>
            <div class="modal-body">
                <div class="rateSpace text-center">
                    <h3>  Your parking rate</h3>
                    <ul>
                        <li><a href="#" class="fa fa-star"></a></li>
                        <li><a href="#" class="fa fa-star"></a></li>
                        <li><a href="#" class="fa fa-star"></a></li>
                        <li><a href="#" class="fa fa-star-o"></a></li>
                        <li><a href="#" class="fa fa-star-o"></a></li>
                    </ul>
                </div>
                <div class="WriteReview">
                    <form>
                        <h4> Review </h4>
                        <p> Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet. </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   <!-- view review Modal --> 


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
                    <li><a href="complete-bookings.html"><span class="fa fa-long-arrow-right"></span>Completed Bookings</a></li>
                    <li class="active"><a href="upcoming-bookings.html"><span class="fa fa-long-arrow-right"></span>Upcoming Bookings</a></li>
                    <li><a href="payment.html"><span class="fa fa-long-arrow-right"></span>Payment</a></li>
                    <li><a href="edit-profile.html"><span class="fa fa-long-arrow-right"></span>Update Your Profile</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <div class="_3wtable">
                            <h3> Upcoming Bookings </h3>
                            <?php
                            if(!empty($get_received_booking)){
                                foreach ($get_received_booking as $recevbooking) {
                            ?>
                            <div class="_3wtableMain">
                                <div class="row">
                                    <div class="col-md-12 _3wtableMainInner">
                                        <div class="col-md-3 _3wtableMainProfile"> 
                                            <?php 
                                            if(!empty($recevbooking->rent_space_picture)){
                                            ?>
                                            <img src="uploads/space_pic/<?php echo $recevbooking->rent_space_picture;?>" class="img-responsive">
                                            <?php
                                            }else{ 
                                            ?>
                                            <img src="images/car.jpg" class="img-responsive">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-9 _3wtableMainTitle">
                                            <h4><?php if(!empty($recevbooking->book_rent_user_fname) && !empty($recevbooking->book_rent_user_lname)){ echo $recevbooking->book_rent_user_fname.' '.$recevbooking->book_rent_user_lname;}?></h4>
<!--                                            <ul>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>-->
                                            <div class="rating_stars"><span style="width: 16px;"></span></div>
                                            <div class="clearfix"></div>
                                            <p><i class="fa fa-user-o" aria-hidden="true"></i> <?php if(!empty($recevbooking->first_name) && !empty($recevbooking->last_name)){ echo $recevbooking->first_name.' '.$recevbooking->last_name;}?> </p>
                                            <p><i class="fa fa-phone" aria-hidden="true"></i> <?php if(!empty($recevbooking->contact_no)){ echo $recevbooking->contact_no;}?> </p>
                                            <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php if(!empty($recevbooking->email)){ echo $recevbooking->email;}?> </p>
                                            <p><i class="fa fa-calendar"></i> <strong> Start Date:</strong> <?php if(!empty($recevbooking->book_space_fromdatetime)){ echo date("m/d/Y H:i A", strtotime(trim($recevbooking->book_space_fromdatetime)));} ?> </p>
                                            <p><i class="fa fa-calendar"></i> <strong> End Date:</strong> <?php if(!empty($recevbooking->book_space_todatetime)){ echo date("m/d/Y H:i A", strtotime(trim($recevbooking->book_space_todatetime)));} ?> </p>
                                            <p><i class="fa fa-credit-card"></i> <strong> Price: </strong> <span><?php if(!empty($recevbooking->book_rent_space_rate)){ echo $recevbooking->book_rent_space_rate;} ?><sub>Per hour</sub></span></p>
                                            <div class="_3wtableMainBttn">
                                                <button class="btn-success space_status" data-toggle="modal" data-target="#review_modal"> Write a Review </button>
                                                <button class="btn-danger" data-toggle="modal" data-target="#view-review"> View Reviews </button>
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
                                            <p><i class="fa fa-user-o" aria-hidden="true"></i> John carry </p>
                                            <p><i class="fa fa-phone" aria-hidden="true"></i> +91-1234567890 </p>
                                            <p><i class="fa fa-envelope-o" aria-hidden="true"></i> abcddemo@gmail.com </p>
                                            <p><i class="fa fa-calendar"></i> <strong> Start Date:</strong> 24/06/2017 11:30 AM </p>
                                            <p><i class="fa fa-calendar"></i> <strong> End Date:</strong> 26/06/2017 4:00 AM </p>
                                            <p><i class="fa fa-credit-card"></i> <strong> Price: </strong> <span>1.20<sub>Per day</sub></span></p>
                                            <div class="_3wtableMainBttn">
                                                <button class="btn-success space_status" data-toggle="modal" data-target="#review_modal"> Write a Review </button>
                                                <button class="btn-danger" data-toggle="modal" data-target="#view-review"> View Reviews </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="_3wtableMain">
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
                                            <p><i class="fa fa-user-o" aria-hidden="true"></i> John carry </p>
                                            <p><i class="fa fa-phone" aria-hidden="true"></i> +91-1234567890 </p>
                                            <p><i class="fa fa-envelope-o" aria-hidden="true"></i> abcddemo@gmail.com </p>
                                            <p><i class="fa fa-calendar"></i> <strong> Start Date:</strong> 24/06/2017 11:30 AM </p>
                                            <p><i class="fa fa-calendar"></i> <strong> End Date:</strong> 26/06/2017 4:00 AM </p>
                                            <p><i class="fa fa-credit-card"></i> <strong> Price: </strong> <span>1.20<sub>Per day</sub></span></p>
                                            <div class="_3wtableMainBttn">
                                                <button class="btn-success space_status" data-toggle="modal" data-target="#review_modal"> Write a Review </button>
                                                <button class="btn-danger" data-toggle="modal" data-target="#view-review"> View Reviews </button>
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

