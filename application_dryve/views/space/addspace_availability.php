<style>
    .ck-box {
    color: #202020 !important;
    display: inline-block;
    font-weight: bold;
    height: auto !important;
    margin-top: 1px !important;
    vertical-align: middle !important;
    width: auto !important;
        
    }
    </style>
<div class="dw-wrapper">
    <div class="topHeading text-center">
        <div class="container">
            <h2>Rent Your Dryveways</h2>
            <div class="topTabs">
                <ul>
                    <div class="liner"></div>
                    <li><center><a href="javascript:;">1</a></center><br><span>Create your profile</span></li>
                    <li><center><a href="javascript:;" >2</a></center><br><span>Your Parking Location</span></li>
                    <li><center><a href="javascript:;">3</a></center><br><span>Your Space Detail</span></li>
                    <li><center><a href="javascript:;" class="active">4</a></center><br><span>Set Availability</span></li>
                </ul>
            </div>
        </div>
    </div>
  
 
    <div class="col-md-12 user-form padd50">
  	<div class="row">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <form method="post">
                        <h3 class="TabTitle">Set Availability</h3>
            	
                        <div class="form-group col-md-12">
                            <div>
                                
                                <div class="checkbox">
                                    <label style="font-weight:bold"><input type="checkbox" <?php if($rent_space_details->availability_time == 1){?>checked="checked"<?php  }?> value="1" name="availability_time" id="availability_time" class="ck-box" value="">&nbsp; Availability All Time </label>
                                </div>
                                
                            </div>
                        </div>
                        
                        
                        <div id="whentoshow">
                        <div class="form-group col-md-12">
                            <div>
                                <div class="side-by-side clearfix">

                                    <div>

                                        <select name="rent_space_day[]" id="rent_space_day" data-placeholder="Select day" multiple class="chosen-select">
                                            
                                            <?php
                                            $rent_spday_from_table = explode(",",$rent_space_details->rent_space_day);
                                            if(!empty($space_days)){
                                                foreach($space_days as $spday){
                                            ?>
                                            <option value="<?php echo $spday->days_number;?>" <?php if(isset($_POST['rent_space_day'])) {echo set_select('rent_space_day', $spday->days_number);}else if(!empty($rent_space_details->rent_space_day) && in_array($spday->days_number, $rent_spday_from_table)){?>selected="selected"<?php  } ?>> <?php echo $spday->space_days;?> </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('rent_space_day', '<p class="error show">', '</p>'); ?>
                                        <i class="fa fa-sort-desc DropdownIcon" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div>
                                <label> Time from </label>
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input name="rent_space_fromdatetime" value="<?php if(isset($_POST['rent_space_fromdatetime'])){ echo $_POST['rent_space_fromdatetime']; }else if($rent_space_details->rent_space_fromdatetime && $rent_space_details->rent_space_fromdatetime!='00:00:00'){ echo date('h:i:s a', strtotime($rent_space_details->rent_space_fromdatetime)); } ?>" readonly id="timefrom" type="text" class="form-control input-small">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                                 <?php echo form_error('rent_space_fromdatetime', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div>
                                <label> To </label>
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input name="rent_space_todatetime" value="<?php if(isset($_POST['rent_space_todatetime'])){ echo $_POST['rent_space_todatetime']; }else if($rent_space_details->rent_space_todatetime && $rent_space_details->rent_space_todatetime!='00:00:00'){ echo date('h:i:s a', strtotime($rent_space_details->rent_space_todatetime)); } ?>" readonly id="timeto" type="text" class="form-control input-small">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                                <?php echo form_error('rent_space_todatetime', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                        </div>
                
                        <div class="form-group col-md-4">
                            <div>
                                <label> Your Rate</label>
                                <input name="rent_space_rate" value="<?php if(isset($_POST['rent_space_rate'])){ echo $_POST['rent_space_rate']; }else if($rent_space_details->rent_space_rate){ echo $rent_space_details->rent_space_rate; } ?>" type="text" placeholder="Set your rate">
                                <?php echo form_error('rent_space_rate', '<p class="error show">', '</p>'); ?>
                            </div>
                        </div>
                
                        <div class="form-group col-md-12">
                            <div>
                                <button type="submit" class="submitBttn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
  
</div>

<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="js/custom.js"></script> 

<script type="text/javascript">
    
    $(document).ready(function() {
        if ($("#availability_time").is(':checked')){
            $("#whentoshow").hide();
        }else{
            $("#whentoshow").show();
        }
        
        
        $('#availability_time').change(function() {
            if(this.checked) {
                $("#whentoshow").hide();
            }else{
                $("#whentoshow").show();
            }
                   
        });
        
        $('#timefrom').timepicker({
            defaultTime: false
        });
        $('#timeto').timepicker({
            defaultTime: false
        });
    });
</script>

