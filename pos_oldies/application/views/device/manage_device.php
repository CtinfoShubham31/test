<section class="content-header" id="div1">
    <h1>Device Setup</h1>
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
        <form method="post" id="device_form">
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
         
            <div class="col-md-4 col-sm-6" id="dynamic_usg" style="display: none;">
                <div class="form-group">
                    <select class="form-control sign-control" name="device_usage" id="device_usage">
                        
                    </select>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6" id="dynamic_div" style="display: none;">
                <div class="form-group" id="commdata">
<!--                    <select multiple style="width:100%;" class="chosen-select form-control sign-control" name="device_communicatewith[]" id="device_communicatewith">
                        
                    </select>-->
                </div>
            </div>
            
            <input type="hidden" name="id_device" id="id_device" value="<?php if(!empty($id_device)){ echo $id_device; }?>">
           
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
          
            <div class="clearfix"> </div> 
            <div class="col-md-12">
                <a href="permission/permission_setup/manage_permission"> <button class="btn btn-success" type="submit"> Submit  </button></a>
                &nbsp;&nbsp;&nbsp;
                <button class="btn btn-default" type="button" onclick="reset_form()"> Reset </button>
            </div>
        </form>
    </div>
    
    <div class="clearfix"> </div> <hr>
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8">
                    <div class="form-group text-right">   
                        <input class="form-control sign-control" onkeyup="searchDataRecord(this.value)"  placeholder="search" type="text">
                    </div> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bg">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Device Name</th>
                            <th>Device Id</th>
                            <th>Device Type</th>
                            <th>Device Usage</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="search_data_record">
                        <?php
                        if(!empty($display_device)){
                            foreach ($display_device as $devs) {
                        ?>
                        <tr id="device_row<?php echo $devs->device_id;?>">
                            <td><?php if(!empty($devs->device_name)){ echo $devs->device_name; }?></td>
                            <td><?php if(!empty($devs->device_unique_id)){ echo $devs->device_unique_id; }?></td>
                            <td><?php if(!empty($devs->device_type)){ echo $devs->device_type; }?></td>
                            <td>
                                <?php if(!empty($devs->device_usage)){ echo $devs->device_usage; }?>
                                <?php 
                                $devcomm = $this->device_model->getDeviceCommunicateWith($devs->company_id,$devs->device_id);
                                if(!empty($devcomm)){
                                    echo $devcomm->device_name;
                                }
                                ?>
                            </td>
                            <td>
                                <?php 
                                $locdata = $this->device_model->getDeviceLocation($devs->device_id);
                                //print_r($locdata);
                                echo $locdata->locnames;
                                ?>
                            </td>
                            <td> 
                                <a onclick="edit_device(<?php echo $devs->device_id; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                                <a id="delete_dev" data-toggle="modal" data-target="#delete-modal" onclick="deletepopup_device(<?php echo $devs->device_id; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
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
            <a href="permission/permission_setup/manage_permission"> <button class="btn btn-success" type="button"> Next  </button></a>
        </div>
    </div> <!-------row------>
    
    
      <!-----row------> 
</section>

<div class="modal fade" id="delete-modal" role="dialog">
    
</div>
  
<script type="text/javascript">
    $(document).ready(function() {
        $('#device_name').focus();
        $('.chosen-select').chosen({ });
    });
    
    
    function edit_device(device_id){
        $("span.error_msg").html('');
        $.ajax({
            type: "POST",
            url: "device/device_setup/edit_device",
            data: {device_id:device_id},
            dataType: "json",
            success: function(data){
                if(data.device_data){

                    $('html, body').animate({
                        scrollTop: $("#div1").offset().top
                    }, 1500);

                    $("#id_device").val(data.device_data.device_id);
                    $("#select_location").val(data.device_data.loc_id).trigger("chosen:updated");
                    $("#device_name").val(data.device_data.device_name);
                    $("#device_unique_id").val(data.device_data.device_unique_id);
                    $("#device_type").val(data.device_data.device_type_id);
                    
                    var dataType = [];
                    if(data.device_data.device_type_id == 3){ //alert('usage');
                        $("#dynamic_div").hide();
                        $("#dynamic_usg").show();
                        $.each(data.device_data.device_usage,function(i,obj)
                        {
                            //alert(obj.device_usage+":"+obj.device_usage_id);
                            var div_data = "<option value="+obj.device_usage_id+">"+obj.device_usage+"</option>";
    //                        alert(div_data);
                            //$(div_data).appendTo('#device_usage'); 
                            dataType.push(div_data);    
                        });  
                        $("#device_usage").html('<option value=""> Usage </option>'+dataType);
                        $("#device_usage").val(data.device_data.device_usage_id);
                    }
                    
                    if(data.device_data.device_type_id != 3){ //alert('comm');
                        $("#dynamic_usg").hide();
                        $("#dynamic_div").show();
                        //$("#select_location").val(data.device_data.loc_id).trigger("chosen:updated");
                        $.each(data.device_data.device_usage,function(i,obj)
                        {
                            //alert(obj.device_id+":"+obj.device_name);
                            var div_data="<option value="+obj.device_id+">"+obj.device_name+"</option>";
                         
                            dataType.push(div_data); 
                        });
                        $("#commdata").html('<select multiple style="width:100%;" class="chosen-select form-control sign-control" name="device_communicatewith[]" id="device_communicatewith"><option value="">Communicate With</option>'+dataType+'</select>');
                        $("#device_communicatewith").val(data.device_data.device_set).trigger("chosen:updated");
                    }
                    
                    
                    
                    //alert(div_data);
                    
                   // location.reload();
                }

            },
            error: function(){
               alert("failure");
            }
        }).done(function() {//success function now you can initialize datepicker
//          $('.datetimepickerbutton').datetimepicker({
//            format: 'DD.MM.YYYY'
//          });
            $('.chosen-select').chosen({ });
        });
    }
    
    function device_cat(dev_type){
        $.ajax({
           url: "device/device_setup/get_device_usage",
            type: "post",
            data: {dev_type:dev_type},
            success: function(result){ //alert(result);
                $("#device_communicatewith").hide();
                $("#dynamic_usg").show();
                $("#dynamic_usg").html(result);
                //$("#dynamic_div").show();
                //$("#dynamic_div").html(result);
            },
           error:function(){
               //alert('e');
           }
        }).done(function() {//success function now you can initialize datepicker
//          $('.datetimepickerbutton').datetimepicker({
//            format: 'DD.MM.YYYY'
//          });
            $('.chosen-select').chosen({ });
        });
    }
    
    
    function deletepopup_device(device_id){
        $.ajax({
            type: "POST",
            url: "device/device_setup/deletepopup_device",
            data: {device_id:device_id},
            //dataType: "json",
            success: function(data){
                if(data == 'False'){
                    alert("failure");
                }else{
                    $("#delete-modal").html(data);
                }
            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    function delete_device(device_id){
        $.ajax({
            type: "POST",
            url: "device/device_setup/delete_device",
            data: {device_id:device_id},
            dataType: "json",
            success: function(data){
                if(data.success){
                    //$('#delete-modal').modal('toggle');
                    $("#device_row"+device_id).hide();
                    $("#msg").html(data.success);
                    $(".modal-footer").hide();
                    setTimeout(function() {
                        $('#delete-modal').modal('hide');
                    }, 2000);
                }

            },
            error: function(){
               alert("failure");
            }
        });
    }

</script>

