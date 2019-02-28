<section class="content-header">
    <h1>Device Setup</h1>
</section>

<section class="content">
    <div class="row">
        <form method="post">
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control sign-control" name="device_name" id="device_name" placeholder="Device name">
                    <?php echo form_error('device_name', '<span for="device_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
          
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <select class="form-control sign-control" name="device_type" id="device_type" onchange="device_cat(this.value)">
                        <option value=""> Device type </option>
                        <?php
                        if(!empty($device_type)){
                            foreach ($device_type as $dtype) {
                        ?>
                            <option value="<?php echo $dtype->device_type_id;?>"><?php echo $dtype->device_type;?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <?php echo form_error('device_type', '<span for="device_type" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
         
            <div class="col-md-4 col-sm-6" id="dynamic_div" style="display: none;">
                
            </div>
           
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control sign-control" name="device_unique_id" id="device_unique_id" placeholder="Device Id">
                    <?php echo form_error('device_unique_id', '<span for="device_unique_id" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
            <div class="clearfix"> </div>
            
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <div class="side-by-side clearfix">
                        <div>
                            <label for="location"> Select location </label> <br/>
                            <select name="select_location[]" id="select_location" data-placeholder="Choose location..." class="chosen-select" multiple style="width:100%;">
                                <option value=""> </option>
                                <?php
                                if(!empty($get_location)){
                                    foreach ($get_location as $loc) {
                                ?>
                                    <option value="<?php echo $loc->location_id;?>"> <?php echo $loc->location_name;?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('select_location', '<span for="select_location" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>     
                    </div>
                </div>
            </div>
          
<!--            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <div class="side-by-side clearfix">
                        <div>
                            <label for="location"> Communicate with </label> <br/>
                            <select id="communicate_with" name="communicate_with" data-placeholder="Choose location..." class="chosen-select" multiple style="width:100%;">
                              <option value=""> </option>
                              <option> Android tablet </option>
                              <option> Printer </option>
                              <option> Barcode scanner </option>
                              <option> Payment POS </option>
                            </select>

                        </div>     
                    </div>
                </div>
            </div>-->
          
            <div class="clearfix"> </div> <hr>
            <div class="col-md-12 text-right">
                <a href="permission/permission_setup/manage_permission"> <button class="btn btn-success" type="submit"> Submit  </button></a>
            </div>
        </form>
    </div>
    
    <div class="clearfix"> </div> <hr>
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bg">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Device Name</th>
                            <th>Device Id</th>
                            <th>Device Type</th>
                            <th>Device Usage</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($display_device)){
                            foreach ($display_device as $devs) {
                        ?>
                        <tr id="device_row<?php echo $devs->device_id;?>">
                            <td><?php if(!empty($devs->device_name)){ echo $devs->device_name; }?></td>
                            <td><?php if(!empty($devs->device_unique_id)){ echo $devs->device_unique_id; }?></td>
                            <td><?php if(!empty($devs->device_type)){ echo $devs->device_type; }?></td>
                            <td><?php if(!empty($devs->device_usage)){ echo $devs->device_usage; }?></td>
                            <td> 
                                <a onclick="edit_employee(<?php //echo $emp_record->pempid; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                                <a id="delete_emp" data-toggle="modal" data-target="#delete-modal" onclick="deletepopup_emp(<?php //echo $emp_record->pempid; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"> </div>
        
        <div class="col-md-12 text-right">
            <a href="employee/employee_setup/manage_employee"> <button class="btn btn-success" type="button"> Next  </button></a>
        </div>
    </div> <!-------row------>
    
    
      <!-----row------> 
</section>
  
<script type="text/javascript">
    $(document).ready(function() {
        $('.chosen-select').chosen({ });
        
    });
    
    function device_cat(dev_type){
        $.ajax({
           url: "device/device_setup/get_device_usage",
            type: "post",
            data: {dev_type:dev_type},
            success: function(result){ //alert(result);
                $("#dynamic_div").show();
                $("#dynamic_div").html(result);
            },
           error:function(){
               //alert('e');
           }
        });
    }

</script>

