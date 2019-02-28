<div class="dw-wrapper">
    <div class="dw-dashboard _3dwht">
        <div class="topHeading">
            <div class="container">
                <div class="col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4 dw-dashboard-profile">
                            <?php 
                            if(!empty($user_info->profile_pic)){ 
                            ?>
                            <img src="uploads/profile_pic/<?php echo $user_info->profile_pic;?>" class="img-circle">
                            <?php
                            }else{ 
                            ?>
                            <img src="images/ceo.jpg" class="img-circle">
                            <?php
                            }
                            ?>
                             
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 dw-dashboard-title">
                            <h3><?php if(!empty($user_info->first_name)){ echo $user_info->first_name.' '.$user_info->last_name; } ?></h3>
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
                    <li class="active"><a href="dashboard.html"><span class="fa fa-long-arrow-right"></span>Dashboard</a></li>
                    <li><a href="my-spaces.html"><span class="fa fa-long-arrow-right"></span>My Dryveways</a></li>
                    <li><a href="complete-bookings"><span class="fa fa-long-arrow-right"></span>Completed Bookings</a></li>
                    <li><a href="upcoming-bookings"><span class="fa fa-long-arrow-right"></span>Upcoming Bookings</a></li>
                    <li><a href="payment.html"><span class="fa fa-long-arrow-right"></span>Payment</a></li>
                    <li ><a href="edit-profile"><span class="fa fa-long-arrow-right"></span>Update Your Profile</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <div class="_3wtable">
                            <h3>Completed Bookings</h3>
                            <div class="table-responsive">
                              <table width="100%" class="dashboardtable">
                                    <thead>
                                      <tr>
                                        <th>Booking Location</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Amount</th>
                                        <th>Reviews /<br>
                                          ratings</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Wembley stadium, United state</td>
                                        <td>4/20/2017  11:30 AM</td>
                                        <td>4/21/2017  4:00 AM</td>
                                        <td>$20.00</td>
                                        <td><img src="images/16385-200.png" class="img-responsive TabIcon"><a data-toggle="modal" data-target="#myModal">Write a Review</a></td>
                                      </tr>
                                      <tr>
                                        <td>Wembley stadium, United state</td>
                                        <td>4/20/2017  11:30 AM</td>
                                        <td>4/21/2017  4:00 AM</td>
                                        <td>$20.00</td>
                                        <td><img src="images/Done.png" class="img-responsive _done"></td>
                                      </tr>
                                      <tr>
                                        <td>Wembley stadium, United state</td>
                                        <td>4/20/2017  11:30 AM</td>
                                        <td>4/21/2017  4:00 AM</td>
                                        <td>$20.00</td>
                                        <td><img src="images/16385-200.png" class="img-responsive TabIcon">Write a Review</td>
                                      </tr>
                                      <tr>
                                        <td>Wembley stadium, United state</td>
                                        <td>4/20/2017  11:30 AM</td>
                                        <td>4/21/2017  4:00 AM</td>
                                        <td>$20.00</td>
                                        <td><img src="images/16385-200.png" class="img-responsive TabIcon">Write a Review</td>
                                      </tr>
                                      <tr>
                                        <td>Wembley stadium, United state</td>
                                        <td>4/20/2017  11:30 AM</td>
                                        <td>4/21/2017  4:00 AM</td>
                                        <td>$20.00</td>
                                        <td><img src="images/Done.png" class="img-responsive _done"></td>
                                      </tr>
                                    </tbody>
                              </table>
                            </div>
                            <div class="col-md-12 allbookings">
                                <div class="row"> <a href="" class="ViewAllDone">View all Bookings</a> </div>
                            </div>
                        </div>
                        <div class="_3wtable">
                            <h3>Upcoming Bookings</h3>
                            <div class="table-responsive">
                                <table width="100%" class="dashboardtable">
                                  <thead>
                                    <tr>
                                      <th width="30%">Driver Details</th>
                                      <th width="20%">Booking Location </th>
                                      <th width="10%">From</th>
                                      <th width="10%">To</th>
                                      <th width="10%">Amount</th>
                                      <th width="20%">Reviews /<br>
                                        ratings</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                        <tr>
                                          <td>
                                            <div class="DriverDetails">
                                              <h4>Mike Johnson</h4>
                                              <span><i class="pe-7s-call"></i>+44-1234567890</span> <span><i class="pe-7s-mail"></i>abcddemo@gmail.com</span> </div>
                                          </td>
                                          <td>Wimbley Satdium,
                                            United state</td>
                                          <td>4/20/2017  11:30 AM</td>
                                          <td>4/21/2017  4:00 AM</td>
                                          <td>$20.00</td>
                                          <td>
                                            <p><img src="images/view-icon.png" class="img-responsive TabIcon">Veiw Review</p>
                                            <p><img src="images/16385-200.png" class="img-responsive TabIcon">Write a Review</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="DriverDetails">
                                              <h4>Mike Johnson</h4>
                                              <span><i class="pe-7s-call"></i>+44-1234567890</span> <span><i class="pe-7s-mail"></i>abcddemo@gmail.com</span> </div>
                                          </td>
                                          <td>Wembley stadium, United state</td>
                                          <td>4/20/2017  11:30 AM</td>
                                          <td>4/21/2017  4:00 AM</td>
                                          <td>$20.00</td>
                                          <td>
                                            <p><img src="images/view-icon.png" class="img-responsive TabIcon">Veiw Review</p>
                                            <p><img src="images/16385-200.png" class="img-responsive TabIcon">Write a Review</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="DriverDetails">
                                              <h4>Mike Johnson</h4>
                                              <span><i class="pe-7s-call"></i>+44-1234567890</span> <span><i class="pe-7s-mail"></i>abcddemo@gmail.com</span> </div>
                                          </td>
                                          <td>Wembley stadium, United state</td>
                                          <td>4/20/2017  11:30 AM</td>
                                          <td>4/21/2017  4:00 AM</td>
                                          <td>$20.00</td>
                                          <td>
                                            <p><img src="images/view-icon.png" class="img-responsive TabIcon">Veiw Review</p>
                                            <p><img src="images/Done.png" class="img-responsive _done"></p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="DriverDetails">
                                              <h4>Mike Johnson</h4>
                                              <span><i class="pe-7s-call"></i>+44-1234567890</span> <span><i class="pe-7s-mail"></i>abcddemo@gmail.com</span> </div>
                                          </td>
                                          <td>Wembley stadium, United state</td>
                                          <td>4/20/2017  11:30 AM</td>
                                          <td>4/21/2017  4:00 AM</td>
                                          <td>$20.00</td>
                                          <td>
                                            <p><img src="images/view-icon.png" class="img-responsive TabIcon">Veiw Review</p>
                                            <p><img src="images/16385-200.png" class="img-responsive TabIcon">Write a Review</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="DriverDetails">
                                              <h4>Mike Johnson</h4>
                                              <span><i class="pe-7s-call"></i>+44-1234567890</span> <span><i class="pe-7s-mail"></i>abcddemo@gmail.com</span> </div>
                                          </td>
                                          <td>Wembley stadium, United state</td>
                                          <td>4/20/2017  11:30 AM</td>
                                          <td>4/21/2017  4:00 AM</td>
                                          <td>$20.00</td>
                                          <td>
                                            <p><img src="images/view-icon.png" class="img-responsive TabIcon">Veiw Review</p>
                                            <p><img src="images/Done.png" class="img-responsive _done"></p>
                                          </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 allbookings">
                                <div class="row"> <a href="#" class="ViewAllRecieved">View all Bookings</a> </div>
                            </div>
                        </div>
                    </div>
                </div>

              <!-- Modal -->
                <div class="modal ReviewModal fade" id="myModal" role="dialog">
                    <div class="modal-dialog" style="z-index: 11111;"> 

                      <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4>Review & Rating</h4>
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
            </div>
        </div>
    </div>
</div>