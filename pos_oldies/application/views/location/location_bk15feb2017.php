<section class="content-header">
    <h1>Add Location</h1>
</section>
<section class="content">
    <div class="row">
        <form method="post">
        
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" value="<?php  echo set_value('location_name'); ?>" class="form-control sign-control" name="location_name" id="location_name" placeholder="Name">
                    <?php echo form_error('location_name', '<span for="location_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" value="<?php  echo set_value('address'); ?>" class="form-control sign-control" name="address" id="address" placeholder="Address">
                    <?php echo form_error('address', '<span for="address" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" value="<?php  echo set_value('select_country'); ?>" name="select_country" id="select_country" class="form-control sign-control" placeholder="Select Country">
                    <?php echo form_error('select_country', '<span for="select_country" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
          
          <!------------------------------------------------>
          
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" value="<?php  echo set_value('select_state'); ?>" name="select_state" id="select_state" class="form-control sign-control" placeholder="Select State">
                    <?php echo form_error('select_state', '<span for="select_state" generated="true" class="error_msg">', '</span>', '</span>'); ?>

                </div>
            </div>
          
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" value="<?php  echo set_value('select_city'); ?>" name="select_city" id="select_city" class="form-control sign-control" placeholder="Select City">
                    <?php echo form_error('select_city', '<span for="select_city" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
          
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control sign-control" name="timezone" id="timezone">
                        <option value=""> Select time zone (Country wise) </option>
                        <?php
                        if(!empty($timezones)){
                            foreach ($timezones as $tzone) {
                        ?>
                            <option value="<?php echo $tzone->zone;?>" <?php echo  set_select('timezone', $tzone->zone); ?>> <?php echo $tzone->zone;?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <?php echo form_error('timezone', '<span for="timezone" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
          
            <input type="hidden" name="id_location" id="id_location" value="<?php if(!empty($id_location)){ echo $id_location; }?>">
          
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" value="<?php  echo set_value('postal_code'); ?>" name="postal_code" id="postal_code" class="form-control sign-control" placeholder="Postal code">
                    <?php echo form_error('postal_code', '<span for="postal_code" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" value="<?php  echo set_value('contact_number'); ?>" name="contact_number" id="contact_number" class="form-control sign-control" placeholder="Contact number">
                    <?php echo form_error('contact_number', '<span for="contact_number" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
         

            <div class="clearfix"> </div> 
            
            <div class="col-md-6 col-sm-6 col-xs-4 text-left">
                <button class="btn btn-default" type="submit"> Save </button>
            </div>
            
            <div class="col-md-6 col-sm-6 col-xs-8 text-right">
                <a href="discount-setup.html"><button class="btn btn-success" type="button"> Next </button></a>
            </div>
        </form>
    </div>
    
    <div class="clearfix"> </div> <hr>
    
    
    <div class="address-sec">
        <div class="row">
            
            <?php
            if(!empty($location_lists)){
                foreach($location_lists as $loclist){
            ?>
            
            <div class="col-md-4">
                <div class="address-area">
                    <address>
                        <h5> <?php if(!empty($loclist->location_name)){ echo $loclist->location_name; } ?> </h5> 
                        <p> <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php if(!empty($loclist->location_name)){ echo $loclist->location_name; } ?></p>
                        <p> <?php if(!empty($loclist->city)){ echo $loclist->city .' - '.$loclist->postal_code ; } ?></p>
                        <p> <?php if(!empty($loclist->state)){ echo $loclist->state; } ?> </p>
                        <p> <?php if(!empty($loclist->country)){ echo $loclist->country; } ?> </p>
                        <p> <i class="fa fa-phone" aria-hidden="true"></i> <?php if(!empty($loclist->contact_number)){ echo $loclist->contact_number; } ?> </p>
                        <div class="row">
                            <div class="col-md-6 text-center"> 
                                <div class="edit-area">  
                                    <button class="btn address-btn" type="button" id="edit_loc" value="<?php if(!empty($loclist->location_id)){ echo $loclist->location_id; } ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </button>
                                </div>
                            </div>
                            <div class="col-md-6 text-center"> 
                                <div class="edit-area"> 
                                    <button class="btn address-btn" type="button" data-toggle="modal" data-target="#delete-modal"> 
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete </button>
                                </div>
                            </div>
                        </div> <!------row------>
                    </address>
                </div>
            </div> <!------- col-md-4----------->
        
            <?php
                }
            }
            ?>
        
        
        </div>
    </div>      <!-----address-sec------> 
    
    
</section> <!-----section ------>

  
  
  
<div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <p> <strong>Are you sure you want to delete?</strong></p>
            </div>
            <div class="modal-footer footer-center">
                <button type="button" class="btn btn-success" data-dismiss="modal"> Yes </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
            </div>
        </div>
    </div>
</div>