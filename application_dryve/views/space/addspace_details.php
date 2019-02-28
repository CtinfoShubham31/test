<div class="dw-wrapper">
    <div class="topHeading text-center">
        <div class="container">
            <h2>Rent Your Dryveways</h2>
            <div class="topTabs">
                <ul>
                    <div class="liner"></div>
                    <li><center><a href="space/addspace_profile">1</a></center><br><span>Create your profile</span></li>
                    <li><center><a href="space/addspace_location" >2</a></center><br><span>Your Parking Location</span></li>
                    <li><center><a href="space/addspace_details" class="active">3</a></center><br><span>Your Space Detail</span></li>
                    <li><center><a href="space/addspace_availability">4</a></center><br><span>Set Availability</span></li>
                </ul>
            </div>
        </div>
    </div>
  
 
    <div class="col-md-12 user-form padd50">
  	<div class="row">
            <div class="container">
                <div  class="col-md-8 col-md-offset-2">
                    <form method="post" enctype="multipart/form-data">
                        <h3 class="TabTitle">Your Space Detail</h3>
                        <div class="form-group col-md-12 text-center">
                            <div class="droparea">                
                                <div class="droparea text-center" id="drop1"> 
                                    <?php
                                    if(!empty($rent_space_details->rent_space_picture)){
                                    ?>
                                    <img src="uploads/space_pic/<?php echo $rent_space_details->rent_space_picture;?>" class="upload-pic" id="file_preview_1" > <br >
                                    <?php
                                    }else{
                                    ?>
                                    <img src="images/fileupload.jpg" class="upload-pic" id="file_preview_1" > <br >
                                    <?php
                                    }
                                    ?>
                                    <p>Upload Parking Photo</p>
                                </div>
                            </div>
                            <input type="file" name="rent_space_picture" id="file_1" accept="image/*" style="display: none;" >
                            <?php if(!empty($error_image)) {?> <p class='error show'><?php print_r(strip_tags($error_image));?></p><?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <div>
                                <select name="rent_space_type">
                                    <option value="">Type of spaces</option>
                                    <?php
                                    if(!empty($space_type_data)){
                                        foreach($space_type_data AS $stype){
                                    ?>
                                        <option value="<?php echo $stype->space_type_name;?>" <?php if(isset($_POST['rent_space_type']) && $_POST['rent_space_type'] == $stype->space_type_name){?>selected="selected"<?php }else if(!empty($rent_space_details->rent_space_type) && $rent_space_details->rent_space_type == $stype->space_type_name){?>selected="selected"<?php  } ?> ><?php echo $stype->space_type_name;?></option>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('rent_space_type', '<p class="error show">', '</p>'); ?>
                                <i class="fa fa-sort-desc DropdownIcon" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div>
                                <input type="text" name="rent_space_number" value="<?php if(isset($_POST['rent_space_number'])){ echo $_POST['rent_space_number']; } else if(!empty($rent_space_details->rent_space_number)){ echo $rent_space_details->rent_space_number; } ?>" placeholder="Number of spaces (e.g. 1)" >
                                <?php echo form_error('rent_space_number', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div>
                                <select name="rent_space_whoru">
                                    <option value="">Who are you?</option>
                                    <?php
                                    if(!empty($whoru_data)){
                                        foreach($whoru_data AS $wrdata){
                                    ?>
                                    <option value="<?php echo $wrdata->whoru_name;?>" <?php if(isset($_POST['rent_space_whoru']) && $_POST['rent_space_whoru'] == $wrdata->whoru_name){?>selected="selected"<?php }else if(!empty($rent_space_details->rent_space_whoru) && $rent_space_details->rent_space_whoru == $wrdata->whoru_name){?>selected="selected"<?php  } ?>><?php echo $wrdata->whoru_name;?></option>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('rent_space_whoru', '<p class="error show">', '</p>'); ?>
                                <i class="fa fa-sort-desc DropdownIcon" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>


                        <div class="form-group col-md-6">
                            <div>
                                <textarea name="rent_space_description" placeholder="Description of space"><?php if(isset($_POST['rent_space_description'])){ echo $_POST['rent_space_description']; } else if(!empty($rent_space_details->rent_space_description)){ echo $rent_space_details->rent_space_description; } ?></textarea>
                                <?php echo form_error('rent_space_description', '<p class="error show">', '</p>'); ?>
                                <p class="bottomTitle">(any other selling points? e.g. local knowledge, transport links)</p>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div>
                                <textarea name="rent_space_access_instruction" placeholder="Access instructions (Optional)"></textarea>
                                <p class="bottomTitle">(These details are only sent to drivers after they have booked your space)</p>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div>
                                <button type="submit" class="submitBttn">Continue</button>
                                <?php
                                $segment = $this->uri->segment(3);
                                if($segment){
                                ?>
                                <a href="space/addspace_location/<?php echo $segment;?>" class="backBttn">Back</a>
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

<script type="text/javascript" src="js/droparea.js"></script> 
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" >

$(document).ready(function() {
    var options1 = {

        url: 'server.php',
        file_holder: '#file_1',
        file_preview: '#file_preview_1',

        success: function( server_return, name, uploaded_file )

        {
            var oFReader = new FileReader();
            var _drop = $('#drop1');
            _drop.after( $('<p />').html( 'File sent: <b>' + name + '</b>' ) );

            oFReader.readAsDataURL( uploaded_file );

            oFReader.onload = function (oFREvent)
            {

                $( '#file_preview_1' ).animate({opacity: 0}, 'slow', function(){
                        // change the image source
                    $(this)
                    .attr('src', oFREvent.target.result).animate({opacity: 1}, 'fast')
                    .on('load', function()
                    {
                        _drop.find('.statusbar').css({
                            width: _drop.outerWidth(),
                            height: _drop.outerHeight()
                        });

                    });

                    // remove the alert block whenever it exists.
                    _drop.find('.statusbar.alert-block').fadeOut('slow', function(){ $(this).remove(); });

                });

            };

        }

    };

    $('#drop1').droparea(options1);

});



</script>
