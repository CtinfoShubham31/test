<div class="dw-wrapper">
    <div class="topHeading text-center">
        <div class="container">
            <h2>Rent Your Dryveways</h2>
            <div class="topTabs">
                <ul>
                    <div class="liner"></div>
                    <li><center><a href="space/addspace_profile">1</a></center><br><span>Create your profile</span></li>
                    <li><center><a href="space/addspace_location" class="active">2</a></center><br><span>Your Parking Location</span></li>
                    <li><center><a href="space/addspace_details">3</a></center><br><span>Your Space Detail</span></li>
                    <li><center><a href="space/addspace_availability">4</a></center><br><span>Set Availability</span></li>
                </ul>
            </div>
        </div>
    </div>
  
 
    <div class="col-md-12 user-form padd50">
  	<div class="row">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <form method="post">
                        <h3 class="TabTitle">Your Parking Location</h3>
                        
                        <div class="form-group col-md-12">
                            <div>
                                <input type="text" id="rent_user_address1" name="rent_user_address1" value="<?php if(isset($_POST['rent_user_address1'])){ echo $_POST['rent_user_address1']; } else if(!empty($rent_space_details->rent_user_address1)){ echo $rent_space_details->rent_user_address1; } ?>" placeholder="Address / Number / Street">
                                <?php echo form_error('rent_user_address1', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        
                        <input type="hidden" name="rent_space_latitude" id="rent_space_latitude" value="<?php if(isset($_POST['rent_space_latitude'])){ echo $_POST['rent_space_latitude']; } else if(!empty($rent_space_details->rent_space_latitude)){ echo $rent_space_details->rent_space_latitude; } ?>">
                        <input type="hidden" name="rent_space_longitude" id="rent_space_longitude" value="<?php if(isset($_POST['rent_space_longitude'])){ echo $_POST['rent_space_longitude']; } else if(!empty($rent_space_details->rent_space_longitude)){ echo $rent_space_details->rent_space_longitude; } ?>">
                        
                        <div class="form-group col-md-6">
                            <div>
                                <input type="text" name="rent_user_city" value="<?php if(isset($_POST['rent_user_city'])){ echo $_POST['rent_user_city']; } else if(!empty($rent_space_details->rent_user_city)){ echo $rent_space_details->rent_user_city; }; ?>" placeholder="Your town / city">
                                <?php echo form_error('rent_user_city', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div>
                                <input type="text" name="rent_user_postal_code" value="<?php if(isset($_POST['rent_user_postal_code'])){ echo $_POST['rent_user_postal_code']; } else if(!empty($rent_space_details->rent_user_postal_code)){ echo $rent_space_details->rent_user_postal_code; }; ?>" placeholder="Postal code" >
                                <?php echo form_error('rent_user_postal_code', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <p class="bottomTitle">Lorem ispum dolor sit ametLorem ispum dolor sit amet Lorem ispum dolor sit amet Lorem ispum dolor sit amet</p>
                        
                        <div class="form-group col-md-12">
                            <div class="row">
                                <button type="submit" class="submitBttn">Continue</button>
<!--                                <button type="submit" class="backBttn">Back</button>-->
                                    <?php
                                    $segment = $this->uri->segment(3);
                                    if($segment){
                                    ?>
                                    <a href="space/addspace_profile/<?php echo $segment;?>" class="backBttn">Back</a>
                                    <?php
                                    }else{
                                    ?>
                                    <a href="javascript:;" class="backBttn">Back</a>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
  
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&region=uk&key=AIzaSyCZP7HE5z3JsTD1qAaLkIeG2y63_QogQEw"></script>
<script>
    initialize();
    
    var autocomplete;
    function initialize() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('rent_user_address1')),
            { types: ['geocode'] });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById("rent_user_address1").value;
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $("#rent_space_latitude").val(latitude);
                    $("#rent_space_longitude").val(longitude);
                    //alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                } else {
                    alert("Request failed.");
                }
            });
        });
    }
</script>