
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Company Setup</h1>
</section>


<section class="content">
    <div class="row">
        <?php /*Success message of challenge*/ 
        if($this->session->flashdata('success_msg')){                       
        ?> 
        <div class="box_alert" id="fadeout" onclick="removeMessage()">
            <i class="fa fa-check right_sign" aria-hidden="true"></i>&nbsp;
            <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
        <?php       
        }
        ?>
        
        <form method="post" id="company_form" enctype="multipart/form-data">
            <div class="col-md-4 col-xs-12 text-center">
                <br/>
                <div class="droparea">
                    <h4> Upload Company Logo </h4>
                    <div class="droparea text-center" id="drop1"> 
                        <?php
                        if(!empty($company_data->image_logo)){
                        ?>
                        <img src="upload/company_logos/<?php echo $company_data->image_logo;?>" id="file_preview_1" > <br >
                        <?php
                        }else{
                        ?>
                        <img src="img/upload-img.png" id="file_preview_1" > <br >
                        <?php
                        }
                        ?>
                    </div>
                    <p class="text-center bottom-space">  PNG OR JPEG  </p>
                    <p class="text-center small line-space"> Image size should not be more than 1 MB and Image dimension should not exceed 1024*1024.</p>
                </div>
                <input type="file" name="image" id="file_1" accept="image/*" style="display: none;" >
                <?php echo form_error('image', '<span for="image" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                <?php if(!empty($error_image)) { print_r($error_image); }?>
               
            </div>

            <div class="col-md-8">
                <div class="row"> 
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="company_name" id="company_name" value="<?php if(!empty($company_data->name)){ echo $company_data->name; }else{  echo set_value('company_name'); } ?>" class="form-control sign-control" placeholder="Name">
                            <?php echo form_error('company_name', '<span for="company_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
 

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="address" id="address" value="<?php if(!empty($company_data->address)){ echo $company_data->address; } else{ echo set_value('address');} ?>" class="form-control sign-control" placeholder="Address">
                            <?php echo form_error('address', '<span for="address" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="email_address" id="email_address" readonly="" class="form-control sign-control" value="<?php if(!empty($email)){ echo $email; }?>" placeholder="Email address">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="select_country" id="select_country" value="<?php if(!empty($company_data->country)){ echo $company_data->country; } else{ echo set_value('select_country');} ?>" class="form-control sign-control" placeholder="Select Country">
                            <?php echo form_error('select_country', '<span for="select_country" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="contact_number" id="contact_number" value="<?php if(!empty($company_data->contact_number)){ echo $company_data->contact_number; } else{ echo set_value('contact_number');} ?>" class="form-control sign-control" placeholder="Contact number">
                            <?php echo form_error('contact_number', '<span for="contact_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="select_state" id="select_state" value="<?php if(!empty($company_data->state)){ echo $company_data->state; } else{ echo set_value('select_state'); } ?>" class="form-control sign-control" placeholder="Select State">
                            <?php echo form_error('select_state', '<span for="select_state" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="tin_number" id="tin_number" value="<?php if(!empty($company_data->tin_no)){ echo $company_data->tin_no; } else{ echo set_value('tin_number');} ?>" class="form-control sign-control" placeholder="TIN">
                            <?php echo form_error('tin_number', '<span for="tin_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="select_city" id="select_city" value="<?php if(!empty($company_data->city)){ echo $company_data->city; } else{ echo set_value('select_city');} ?>" class="form-control sign-control" placeholder="Select City">
                            <?php echo form_error('select_city', '<span for="select_city" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                          <input type="text" name="pan_number" id="pan_number" value="<?php if(!empty($company_data->pan_no)){ echo $company_data->pan_no; } else{ echo set_value('pan_number');} ?>" class="form-control sign-control" placeholder="PAN Number">
                          <?php echo form_error('pan_number', '<span for="pan_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                      </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="postal_code" id="postal_code" value="<?php if(!empty($company_data->postal_code)){ echo $company_data->postal_code; } else{ echo set_value('postal_code');} ?>" class="form-control sign-control" placeholder="Postal code">
                            <?php echo form_error('postal_code', '<span for="postal_code" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
<!--                    <p>&#x20B9;</p>-->
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select name="select_currency" id="select_currency" class="form-control sign-control">
                                <option value=""> Select Currency </option>
                                <option value="1" <?php if(!empty($company_data->currency) && $company_data->currency == 1){ echo 'selected="selected"'; } else{ echo  set_select('select_currency', 1);} ?>> $ </option>
<!--                                <option value="2" <?php //if(!empty($company_data->currency) && $company_data->currency == 2){ echo 'selected="selected"'; } else{echo  set_select('select_currency', 2);} ?>> &euro; </option>-->
                            </select>
                            <?php echo form_error('select_currency', '<span for="select_currency" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control sign-control" name="timezone" id="timezone">
                                <option value=""> Select time zone (Country wise) </option>
                                <?php
                                if(!empty($timezones)){
                                    foreach ($timezones as $tzone) {
                                ?>
                                    <option value="<?php echo $tzone->zone;?>" <?php if(!empty($company_data->timezone) && $company_data->timezone == $tzone->zone){ echo 'selected="selected"'; } else{ echo  set_select('timezone', $tzone->zone);} ?>> <?php echo $tzone->zone;?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('timezone', '<span for="timezone" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>

          <!------------------------------------------------>
                    <div class="clearfix"> </div>


                </div>
            </div>


            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label for="usr"> Set Your Pin </label> <br/>
                    <input type="password" value="<?php if(!empty($company_data->pin_no)){ echo $company_data->pin_no; } else{ echo set_value('pin_number');} ?>" name="pin_number" class="form-control sign-control" id="pincode-input1"> 
                    
<!--                    &nbsp; <a href=""> <i class="fa fa-eye" aria-hidden="true"></i> </a>-->
                </div>
                <?php echo form_error('pin_number', '<span for="pin_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
            </div>

          <!------------------------------------------------>

            <div class="col-md-4">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <p> <strong>Enable booking</strong> </p>
                        </div>
                        <div class="col-md-6">
                            <input name="booking" <?php if(!empty($company_data->booking)){ ?>checked=""<?php } else{ echo set_checkbox('booking','on',FALSE); } ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="on-btn" data-offstyle="off-btn" type="checkbox">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-7">
                            <p> <strong> Manage multiple location </strong> </p>
                        </div>
                        <div class="col-md-5">
                            <input name="multiple_location" <?php if(!empty($company_data->multiple_location)){ ?>checked=""<?php }else{ echo set_checkbox('multiple_location','on',FALSE); }?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="on-btn" data-offstyle="off-btn" type="checkbox">
                            <a style="font-size:18px;" href="#" data-toggle="tooltip" data-placement="right" title="Add more store in next step"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a> 
                        </div>
                    </div>
                </div>
            </div>
          <!------------------------------------------------>
            <div class="clearfix"> </div> <hr>
            <?php
            if($this->session->userdata('pos_companyid')){
            ?>
            <div class="col-md-12 text-right">
                <button class="btn btn-success" type="submit"> Update  </button>
            </div>
            <?php
            }else{
            ?>
            <div class="col-md-12 text-right">
                <button class="btn btn-success" type="submit"> Next  </button>
            </div>
            <?php
            }
            ?>
        </form>
    </div>
  <!-----row------> 
</section>

<script>
//    $(document).ready(function() {
//        $('#pincode-input1').pincodeInput({hidedigits:false,complete:function(value, e, errorElement){
//            $("#pincode-callback").html("This is the 'complete' callback firing. Current value: " + value);
//        }});
//    });
</script>