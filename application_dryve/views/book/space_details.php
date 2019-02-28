<div class="dw-wrapper">
    <div class="dw-dashboard _3dwht">
        <div class="topHeading">
            <div class="container">
                <div class="col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4 dw-dashboard-profile"> 
                            <img src="images/ceo2.jpg" class="img-circle"> 
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 dw-dashboard-title">
                            <h3> John Carter</h3>
                            <p> <i class="fa fa-user-circle" aria-hidden="true"></i> Member Since: 12, April 2017</p>
                            <p> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Total Bookings: 12</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="searchBar search-book date-pick">
                        <div class="DateTime location-date">
                            <input type="text" class="new-control _date" id="starttime" placeholder="Start date" value="<?php if(!empty($fromdatetime)){ echo date("m/d/Y H:i A", strtotime(trim($fromdatetime))); } ?>">
                        </div>
                        <div class="DateTime location-date">
                            <input type="text" id="endtime" class="new-control _date" placeholder="End date" value="<?php if(!empty($todatetime)){ echo date("m/d/Y H:i A", strtotime(trim($todatetime))); } ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container padd50">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="h3-heading"> <strong><?php if(!empty($rent_space_details->rent_user_fname)){ $rent_space_details->rent_user_fname.' '.$rent_space_details->rent_user_lname; } ?></strong></h3>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-8">
                    <div class="content-bg mini-padding"> 
                        <div class="row" id="map" style="width: 748px; height: 376px;">
                    
                        </div>
                    </div>
                  <!---------content-bg---------->

                    <div class="content-bg">
                        <h4 class="h4-heading"> Description</h4>
                        <p> <?php if(!empty($rent_space_details->rent_space_description)){ echo $rent_space_details->rent_space_description; } ?></p>
<!--                        <h4 class="h4-heading"> Facilities </h4>
                        <ul class="ul-list">
                            <li> CCTV </li>
                            <li> Onsite Staff </li>
                            <li> Multiple entry/exit </li>
                            <li> has_keyfob </li>
                        </ul>-->
                    </div>
                  <!---------content-bg---------->

<!--                    <div class="content-bg">
                        <h4 class="h4-heading"> Street view </h4>
                        <div class='list-group gallery'>
                            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3 padd-left0'> <a class="" href="#"> <img class="img-responsive street-view" alt="" src="images/street.jpg" /> </a> </div>
                        </div>
                    </div>-->
                  <!---------content-bg---------->

                    <div class="content-bg">
                        <h4 class="h4-heading"> Reviews(3) </h4>
                        <div class="review-profile">
                            <img src="images/ceo2.jpg" class="img-circle">
                        </div>
                        <h5 class="h5-heading"> John Doe </h5>
                        <div class="rating rating-mini"> 
                            <span>☆</span>
                            <span class="active">☆</span>
                            <span>☆</span>
                            <span>☆</span>
                            <span>☆</span> 
                        </div>
                        <div class="clearfix"> </div>
                        <p> Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit </p>
                        <p> <small> 30, October 2016</small> </p>
                        <hr>
                        
                        <div class="review-profile">
                            <img src="images/ceo2.jpg" class="img-circle">
                        </div>
                        <h5 class="h5-heading"> John Doe </h5>
                        <div class="rating rating-mini"> 
                            <span>☆</span>
                            <span class="active">☆</span>
                            <span>☆</span>
                            <span>☆</span>
                            <span>☆</span> 
                        </div>
                        <div class="clearfix"> </div>
                      
                        <p> Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit </p>
                        <p> <small> 30, October 2016</small> </p>
                        <div class="reply-box">
                            <div class="review-profile">
                                <img src="images/ceo2.jpg" class="img-circle">
                            </div>
                            <h5 class="h5-heading"> John Doe </h5>
                            <div class="rating rating-mini"> <span>☆</span><span class="active">☆</span><span>☆</span><span>☆</span><span>☆</span> </div>
                            <div class="clearfix"> </div>
                            <p> Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit </p>
                            <p> <small> 30, October 2016</small> </p>
                        </div>
                        <div class="clearfix"> </div>
                        <hr>
                      <div class="review-profile"><img src="images/ceo2.jpg" class="img-circle"></div>
                      <h5 class="h5-heading"> John Doe </h5>
                      <div class="rating rating-mini"> <span>☆</span><span class="active">☆</span><span>☆</span><span>☆</span><span>☆</span> </div>
                      <div class="clearfix"> </div>
                      <p> Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit Lorem ipsum dolor sit amit </p>
                      <p> <small> 30, October 2016</small> </p>
                      <br/>
                      <p class="text-right"> <a href=""><strong>View All Reviews</strong></a> </p>
                    </div>
                  <!---------content-bg----------> 

                </div>
                
                <div class="col-md-4">
                    <div class="content-bg mini-padding text-center">
                        <div class="parking-img"> 
                            <?php 
                            if(!empty($rent_space_details->rent_space_picture)){ 
                            ?>
                            <img src="uploads/space_pic/<?php echo $rent_space_details->rent_space_picture;  ?>" class="img-responsive">
                            <?php
                            }else{ 
                            ?>
                            <img src="images/car.jpg" class="img-responsive">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="distance-txt">
                            <p><img src="images/walking--icon.png" width="15" class="img-responsive"><?php if(!empty($rent_space_details->distance)){ echo round($rent_space_details->distance,2).' miles';}?> </p>
                            <p><img src="images/parking.png" width="30" class="img-responsive">Available</p>
                        </div>
                        <div class="rating"> 
                            <span>☆</span>
                            <span class="active">☆</span>
                            <span>☆</span>
                            <span>☆</span>
                            <span>☆</span> 
                        </div>
                        <h2 class="h2-total"> Total: <span><?php if(!empty($rent_space_details->rent_space_rate) && !empty($rent_space_details->total_hours)){ echo round($rent_space_details->rent_space_rate*$rent_space_details->total_hours/60,2);}?> </span></h2>
                        
                        <form name="book_space" id="book_space" method="post">
                            <div class="add-vehicle">           
                                <div class="col-md-10">
                                    <div class="user-form">
                                        <input type="text" name="vehicle_no" id="vehicle_no" class="form-control" placeholder="Select your vehicle">
                                        <span id="vehicle_error" class="error show"></span>
                                        <input type="hidden" name="vehicle_id" id="vehicle_id">
                                        
                                        <input type="hidden" name="latitude" id="latitude" value="<?php echo $latitude ;?>">
                                        <input type="hidden" name="longitude" id="longitude" value="<?php echo $longitude; ?>">
                                        
                                        <input type="hidden" name="rent_space_id" id="rent_space_id" value="<?php echo $nt = base64_decode($this->uri->segment(3)); ?>">
                                        <input type="hidden" name="book_space_fromdatetime" id="book_space_fromdatetime" value="<?php if(!empty($fromdatetime)){ echo trim(($fromdatetime)); } ?>">
                                        <input type="hidden" name="book_space_todatetime" id="book_space_todatetime" value="<?php if(!empty($todatetime)){ echo trim($todatetime); } ?>">
                                        <input type="hidden" name="book_space_paid_amt" id="book_space_paid_amt" value="<?php echo round($rent_space_details->rent_space_rate*$rent_space_details->total_hours/60,2);?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row"> <a data-toggle="modal" data-target="#addVehicle" onclick="addVehiclePopup(<?php echo $rent_space_details->rent_space_id; ?>)"><img src="images/add_car_icon.png" class="img-responsive"></a> </div>
                                </div>
                            </div>
                            <button type="submit" class="form-submit book-btn"> Book Now </button>
                        </form>
                        
                        
                    </div>
                  <!---------content-bg----------> 
                </div>
            </div>
        </div>

      <!------ add vehicle popup ------> 

      <!-- Modal -->
        <div id="addVehicle" class="modal fade" role="dialog">
            
        </div>
    </div>
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&region=uk&key=AIzaSyCZP7HE5z3JsTD1qAaLkIeG2y63_QogQEw"></script>

<script> 
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(<?php echo $latitude ;?>, <?php echo $longitude; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

marker = new google.maps.Marker({
    position: new google.maps.LatLng(<?php echo $rent_space_details->rent_space_latitude ;?>, <?php echo $rent_space_details->rent_space_longitude; ?>),
    map: map,
    html: '<?php echo $rent_space_details->rent_user_address1;?>',
    //html:'<div id="content" style="width:400px; background-color:red;">My Text comes here</div>',
});

google.maps.event.addListener(marker, 'mouseover', (function(marker) {
    return function() {
        //alert(result['rent_user_address1']);
        infowindow.setContent(this.html);
        infowindow.open(map, marker);
      //alert(locations[i][0]);
    }
})(marker));


function addVehiclePopup(rent_space_id){
    $.ajax({
        type: "POST",
        //url: "permission/permission_setup/deletepopup_permission",
        url:"book/addvehicle_popup",
        data: {rent_space_id:rent_space_id},
        //dataType: "json",
        success: function(data){
            if(data == 'False'){
                alert("failure");
            }else{
                $("#addVehicle").html(data);
            }
        },
        error: function(){
           alert("failure");
        }
    });
}


        $("#vehicle_no").autocomplete({
            source: function(request, response) {
            var url = 'book/get_vehicle';
            $.post(url, {data: request.term}, 
            function(data) {
                
                if(data.length > 0) {
                    response($.map(data, function(vehicle){ //alert(vehicle.vehicle_number);
                        return {
                            value: vehicle.vehicle_number,
                            id: vehicle.user_vehicle_id
                        };

                    }));
                } else {
                    response([{ value: 'No results found.', id: ''}]);
                }

            },"json");
        },
        minLength: 0,
        select:
            function(event, ui) {
                var aid = ui.item.id;
                $("#vehicle_id").val(aid);
                //alert(aid);
                if(aid == ''){
                    return false;
                }
                var aname = ui.item.value;
                //alert(aname);

            },
            autofocus: true

        });
        
        
        $("#book_space").submit(function(event) {
            /* stop form from submitting normally or prevent default action */
            event.preventDefault();
            var form_data = $(this).serialize(); //Encode form elements for submit
            
            $.ajax({
                type: "POST",
                url: "book/book_space",
                data : form_data,
                dataType: "json",
                success: function(response){
                //alert(response);
                    if(response.errors.valid_vehicle){
                        $("#vehicle_error").html(response.errors.valid_vehicle);
                        setInterval(function(){ $("#vehicle_error").html(''); }, 3000);
                    }
                    else if(response.success){
                        //location.reload();
                        $("#fadeout").show();
                        alert('yahoo');
                        //setInterval(function(){ $('#addVehicle').modal('hide'); }, 3000);
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
           // event.unbind(); //unbind. to stop multiple form submit.
        });


//$("#vehicle_name").autocomplete({
//    source: function(request, response) {
//        $.getJSON(
//            "book/get_vehicle",
//            { term:request.term }, 
//            response
//        );
//    },
//    //source: "get_city",
//    minLength: 1,
//    select: function( event, ui ) {
//        $('#response').val(ui.item.id);
//    }
//});
</script>
