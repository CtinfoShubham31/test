<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Company Setup</h1>

    <!---------------------------- menu path link for admin -------------------->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
  <!---------------------------- menu path link for admin end -------------------->
</section>
<section class="content">
    <div class="row">

        <form method="post" enctype="multipart/form-data">
            <div class="col-md-4 col-xs-12 text-center">
                <br/>
                <div class="droparea">
                    <h4> Upload Company Logo </h4>
                    <div class="droparea text-center" id="drop1"> 
                        <img src="img/upload-img.png" id="file_preview_1" > <br >
                    </div>
                    <p class="text-center">  PNG OR JPEG  </p>
                </div>
               <input type="file" name="image" id="file_1" accept="image/*" style="display: none;" >
               <?php echo form_error('image', '<span for="image" generated="true" class="error_msg">', '</span>', '</span>'); ?>
               <?php //echo form_error('image', '<span for="image" generated="true" class="error_msg">', '</span>', '</span>'); ?>
               
            </div>

            <div class="col-md-8">
                <div class="row"> 
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="company_name" id="company_name" class="form-control sign-control" placeholder="Name">
                            <?php echo form_error('company_name', '<span for="company_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
 

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="address" id="address" class="form-control sign-control" placeholder="Address">
                            <?php echo form_error('address', '<span for="address" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="email_address" id="email_address" class="form-control sign-control" placeholder="Email address">
                            
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="select_country" id="select_country" class="form-control sign-control" placeholder="Select Country">
                            <?php echo form_error('select_country', '<span for="select_country" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="contact_number" id="contact_number" class="form-control sign-control" placeholder="Contact number">
                            <?php echo form_error('contact_number', '<span for="contact_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="select_state" id="select_state" class="form-control sign-control" placeholder="Select State">
                            <?php echo form_error('select_state', '<span for="select_state" generated="true" class="error_msg">', '</span>', '</span>'); ?>

                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="tin_number" id="tin_number" class="form-control sign-control" placeholder="TIN">
                            <?php echo form_error('tin_number', '<span for="tin_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="select_city" id="select_city" class="form-control sign-control" placeholder="Select City">
                            <?php echo form_error('select_city', '<span for="select_city" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                          <input type="text" name="pan_number" id="pan_number" class="form-control sign-control" placeholder="PAN Number">
                          <?php echo form_error('pan_number', '<span for="pan_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                      </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="postal_code" id="postal_code" class="form-control sign-control" placeholder="Postal code">
                            <?php echo form_error('postal_code', '<span for="postal_code" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>

                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select name="select_currency" id="select_currency" class="form-control sign-control">
                                <option value=""> Select Currency </option>
                                <option value="1"> $ </option>
                                <option value="2"> &euro; </option>
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
                                    <option value="<?php echo $tzone->zone;?>"> <?php echo $tzone->zone;?> </option>
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
                    <input type="password" name="pin_number" class="form-control sign-control" id="pincode-input1"> 
                    &nbsp; <a href=""> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                </div>
            </div>

          <!------------------------------------------------>

            <div class="col-md-4">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <p> <strong>Enable booking</strong> </p>
                        </div>
                        <div class="col-md-6">
                            <input name="booking" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="on-btn" data-offstyle="off-btn" type="checkbox">
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
                            <input name="multiple_location" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="on-btn" data-offstyle="off-btn" type="checkbox">
                            <a style="font-size:18px;" href="#" data-toggle="tooltip" data-placement="right" title="Add more store in next step"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a> 
                        </div>
                    </div>
                </div>
            </div>
          <!------------------------------------------------>
            <div class="clearfix"> </div> <hr>
            <div class="col-md-12 text-right">
                <button class="btn btn-success" type="submit"> Next  </button>
            </div>
        </form>
    </div>
  <!-----row------> 
</section>