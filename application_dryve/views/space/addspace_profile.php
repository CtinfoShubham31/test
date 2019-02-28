<div class="dw-wrapper">
    <div class="topHeading text-center">
        <div class="container">
            <h2>Rent Your Dryveways</h2>
            <div class="topTabs">
                <ul>
                    <div class="liner"></div>
                    <li><center><a href="space/addspace_profile" class="active">1</a></center><br><span>Create your profile</span></li>
                    <li><center><a href="space/addspace_location" >2</a></center><br><span>Your Parking Location</span></li>
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
                        <h3 class="TabTitle">Create Your Profile</h3>
                        <div class="form-group col-md-6">
                            <div>
                                <input type="text" value="<?php if(isset($_POST['rent_user_fname'])){ echo $_POST['rent_user_fname']; } else if(!empty($rent_space_details->rent_user_fname)){ echo $rent_space_details->rent_user_fname; } ?>" name="rent_user_fname" placeholder="First name">
                                <?php echo form_error('rent_user_fname', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div>
                                <input type="text" value="<?php if(isset($_POST['rent_user_lname'])){ echo $_POST['rent_user_lname']; } else if(!empty($rent_space_details->rent_user_lname)){ echo $rent_space_details->rent_user_lname; } ?>" name="rent_user_lname" placeholder="Last name">
                                <?php echo form_error('rent_user_lname', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6 padd">
                            <div>
                                <input type="text" value="<?php if(isset($_POST['rent_user_phone'])){ echo $_POST['rent_user_phone']; } else if(!empty($rent_space_details->rent_user_phone)){ echo $rent_space_details->rent_user_phone; } ?>" name="rent_user_phone" placeholder="Phone number">
                                <?php echo form_error('rent_user_phone', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div>
                                <input type="text" value="<?php if(isset($_POST['rent_user_email'])){ echo $_POST['rent_user_email']; } else if(!empty($rent_space_details->rent_user_email)){ echo $rent_space_details->rent_user_email; } ?>" name="rent_user_email" placeholder="Email address">
                                <?php echo form_error('rent_user_email', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <div>
                                <button type="submit" class="submitBttn">Continue</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
  
  
</div>
