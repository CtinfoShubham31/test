<div class="dw-wrapper">    
    <div class="dw-dashboard _3dwht">
        <div class="topHeading">
            <div class="container">
                <div class="col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4 dw-dashboard-profile"> 
                            <img src="images/ceo.jpg" class="img-circle"> 
                        </div>
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
                    <li><a href="javascript:;"><span class="fa fa-long-arrow-right"></span>Dashboard</a></li>
                    <li class="active"><a href="space/myspacing_lists"><span class="fa fa-long-arrow-right"></span>My Dryveways</a></li>
                    <li><a href="javascript:;"><span class="fa fa-long-arrow-right"></span>Completed Bookings</a></li>
                    <li><a href="javascript:;"><span class="fa fa-long-arrow-right"></span>Upcoming Bookings</a></li>
                    <li><a href="javascript:;"><span class="fa fa-long-arrow-right"></span>Payment</a></li>
                    <li ><a href="javascript:;"><span class="fa fa-long-arrow-right"></span>Update Your Profile</a></li>
                </ul>
            </div>
            
            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <div class="_3wtable">
                            <h3>My Dryveways</h3>
                            <?php
                            if(!empty($get_myspaces)){
                                foreach ($get_myspaces as $myspace) {
                            ?>
                            <div class="_3wtableMain">
                                <div class="row">
                                    <div class="col-md-12 _3wtableMainInner">
                                        <div class="col-md-3 _3wtableMainProfile">
                                            <?php 
                                            if(!empty($myspace->rent_space_picture)){
                                            ?>
                                            <img src="uploads/space_pic/<?php echo $myspace->rent_space_picture;?>" class="img-responsive">
                                            <?php
                                            }else{ 
                                            ?>
                                            <img src="images/car.jpg" class="img-responsive">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-9 _3wtableMainTitle">
                                            <h4><?php echo $myspace->rent_user_fname.' '.$myspace->rent_user_lname;?></h4>
<!--                                            <ul>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>-->
                                            <div class="rating_stars">
                                                <span style="width: <?php echo $myspace->avg_rating*16;?>px;"></span>
                                            </div>
                                            <div class="clearfix"></div> 
                                            
                                            <p><i class="fa fa-map-marker"></i> &nbsp;<?php if(!empty($myspace->rent_space_type)){ echo $myspace->rent_space_type; } ?></p>
                                            <p><i class="fa fa-credit-card"></i>Price: <span><?php if(!empty($myspace->rent_space_rate)){ echo $myspace->rent_space_rate; } ;?><sub>Per day</sub></span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 col-sm-12 _3wtableMainInner _3wtableMainBttn">
                                        <div id="spstatus" class="col-md-3 col-xs-6 col-sm-6" >
                                            <?php 
                                            if(!empty($myspace->active == 1)){
                                            ?>
                                            <button class="btn-success space_status" onclick="activeDeactiveSpace(<?php if(!empty($myspace->rent_space_id)){ echo $myspace->rent_space_id; } ?>,'<?php if(!empty($myspace->active)){ echo $myspace->active; } ?>')">Activate</button>  
                                            <?php
                                            }else{ 
                                            ?>
                                            <button class="btn-success space_status" onclick="activeDeactiveSpace(<?php if(!empty($myspace->rent_space_id)){ echo $myspace->rent_space_id; } ?>,'<?php if(!empty($myspace->active)){ echo $myspace->active; } ?>')">Deactivate</button> 
                                            <?php
                                            }
                                            ?>
                                               
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="space/addspace_profile/<?php if(!empty($myspace->rent_space_id)){ echo base64_encode($myspace->rent_space_id); } ?>"><button class="btn-danger">Edit</button></a>
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="availability.html"><button class="btn-warning">Availability</button></a>
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="location-detail.html"><button class="btn-default">Photos</button></a>
                                        </div>

                                    </div>
                                    <div class="col-md-12 col-xs-12 clearfix _3wtableMainReview">
                                        <p>View All Reviews (15)<i class="fa fa-angle-right pull-right"></i></p>
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
                                        <div class="col-md-3 _3wtableMainProfile">
                                            <img src="images/car.jpg" class="img-responsive">
                                        </div>
                                        <div class="col-md-9 _3wtableMainTitle">
                                            <h4>Parking Space on E Indiantown</h4>
                                            <ul>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <p><i class="fa fa-map-marker"></i> &nbsp;Private Parking lot: 1</p>
                                            <p><i class="fa fa-credit-card"></i>Price: <span>1.20<sub>Per day</sub></span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 col-sm-12 _3wtableMainInner _3wtableMainBttn">
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <button class="btn-success space_status">Activate</button>    
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="create-profile.html"><button class="btn-danger">Edit</button></a>
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="availability.html"><button class="btn-warning">Availability</button></a>
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="location-detail.html"><button class="btn-default">Photos</button></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 clearfix _3wtableMainReview">
                                        <p>View All Reviews (15)<i class="fa fa-angle-right pull-right"></i></p>
                                    </div>
                                </div>
                            </div>-->
                            
                                    
<!--                            <div class="_3wtableMain">
                                <div class="row">
                                    <div class="col-md-12 _3wtableMainInner">
                                        <div class="col-md-3 _3wtableMainProfile">
                                            <img src="images/car.jpg" class="img-responsive">
                                        </div>
                                        <div class="col-md-9 _3wtableMainTitle">
                                            <h4>Parking Space on E Indiantown</h4>
                                            <ul>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <p><i class="fa fa-map-marker"></i> &nbsp;Private Parking lot: 1</p>
                                            <p><i class="fa fa-credit-card"></i>Price: <span>1.20<sub>Per day</sub></span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 col-sm-12 _3wtableMainInner _3wtableMainBttn">
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <button class="btn-success space_status">Activate</button>    
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="create-profile.html"><button class="btn-danger">Edit</button></a>
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="availability.html"><button class="btn-warning">Availability</button></a>
                                        </div>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                            <a href="location-detail.html"><button class="btn-default">Photos</button></a>
                                        </div>

                                    </div>
                                    <div class="col-md-12 col-xs-12 clearfix _3wtableMainReview">
                                        <p>View All Reviews (15)<i class="fa fa-angle-right pull-right"></i></p>
                                    </div>
                                </div>
                            </div>-->

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
  
<script type="text/javascript">
var type = window.location.hash.substr(1);
if(type!="" && type=="#vtab3"){
$("#vtab3").trigger("click");
}

  </script> 
<script>

  $(document).ready(function(){
        $('.ViewAllDone').click(function(e){
        e.preventDefault();
                $('html, body').animate({scrollTop: $("body").offset().top}, 400);
        $('#nav-tabs-wrapper a[href="#vtab3"]').tab('show');
    })

        $('.ViewAllRecieved').click(function(e){
        e.preventDefault();
                $('html, body').animate({scrollTop: $("body").offset().top}, 400);
        $('#nav-tabs-wrapper a[href="#vtab4"]').tab('show');
    })
});

  </script>
 
<script>
    function activeDeactiveSpace(rent_space_id,status){
        $.ajax({
            type: "POST",
            url:"space/actvinactv_myspace",
            data: {rent_space_id:rent_space_id,status:status},
            success: function(data){
                if(data == 0){
                    alert("failure");
                }else{
                    if(status == 1){
                        $("#spstatus").html("<button class='btn-success space_status' onclick='activeDeactiveSpace("+rent_space_id+",0)'>Deactivate</button>");  
                    }else{
                        $("#spstatus").html("<button class='btn-success space_status' onclick='activeDeactiveSpace("+rent_space_id+",1)'>Activate</button>");
                    }
                }
            },
            error: function(){
               alert("failure");
            }
        });
    }
//$(".space_status").click(function () {
//    $(this).text(function(i, v){
//       return v === 'Activate' ? 'Deactivate' : 'Activate'
//    })
//});
</script>

