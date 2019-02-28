<section class="content-header" id="div1">
    <h1>Employee Setup</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Employee Management</li>
    </ol>
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
        <form method="post" id="employee_form" enctype="multipart/form-data">
            <div class="col-md-4 col-xs-12 text-center">
               <br/>
                <div class="droparea">
                    <h4> Upload Your Image </h4>
                    <div class="droparea text-center" id="drop1"> 
                        <img src="img/employee-img.png" id="file_preview_1" > <br >
                    </div>
                    <p class="text-center bottom-space">  PNG OR JPEG  </p>
                    <p class="text-center small line-space"> Image size should not be more than 1 MB and Image dimension should not exceed 1024*1024.</p>

                </div>
               <input type="file" name="image" id="file_1" accept="image/*" style="display: none;" >
                <?php //echo form_error('image', '<span for="image" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                <?php if(!empty($error_image)) { print_r($error_image); }?>
            </div>
            
            <div class="col-md-8">
                <div class="row"> 
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('employee_name'); ?>" name="employee_name" id="employee_name" placeholder="Name">
                            <?php echo form_error('employee_name', '<span for="employee_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('emp_contact'); ?>" name="emp_contact" id="emp_contact" placeholder="Contact no.">
                            <?php echo form_error('emp_contact', '<span for="emp_contact" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('emp_email'); ?>" name="emp_email" id="emp_email" placeholder="Email id">
                            <?php echo form_error('emp_email', '<span for="emp_email" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control sign-control" id="permission" name="permission">
                                <option value=""> Select Permission </option>
                                <?php
                                if(!empty($permission_lists)){
                                    foreach ($permission_lists as $perm_list) {
                                ?>
                                    <option value="<?php echo $perm_list->permission_id;?>" <?php echo set_select('permission', $perm_list->permission_id); ?>><?php echo $perm_list->permission_name;?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('permission', '<span for="permission" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control sign-control" name="employee_under" id="employee_under">
                                <option value=""> Under </option>
                                <?php
                                if(!empty($employee_lists)){
                                    foreach ($employee_lists as $emplist) {
                                ?>
                                <option value="<?php echo $emplist->employee_id;?>" <?php echo set_select('employee_under', $emplist->employee_id); ?>> <?php echo $emplist->employee_name;?> </option>
                                <?php
                                    }
                                }
                                ?>
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="password" class="form-control sign-control" value="<?php echo set_value('emp_password'); ?>" name="emp_password" id="emp_password" placeholder="Pin">
                            <?php echo form_error('emp_password', '<span for="emp_password" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('emp_address'); ?>" name="emp_address" id="emp_address" placeholder="Address">
                            <?php echo form_error('emp_address', '<span for="emp_address" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    
                    <input type="hidden" name="id_employee" id="id_employee" value="<?php if(!empty($id_employee)){ echo $id_employee; }?>">
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control sign-control" name="location_id" id="location_id">
                                <option value=""> Location from store</option>
                                <?php
                                if(!empty($location_lists)){
                                    foreach($location_lists as $loc_list){
                                ?>
                                <option value="<?php echo $loc_list->location_id;?>" <?php echo set_select('location_id', $loc_list->location_id); ?>><?php echo $loc_list->location_name;?></option>
                                <?php
                                    }
                                }
                                ?>
                                <?php echo form_error('location_id', '<span for="location_id" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                            </select>
                        </div>
                    </div> 

                    <div class="clearfix"> </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit"> Save </button>&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-default" type="button" onclick="reset_form()"> Reset </button>
                        </div>
                    </div>
                     
                </div>
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
                            <th> Name of Employee </th>
                            <th> Contact no. </th>
                            <th> Email id</th>
                            <th> Permission  </th>
                            <th> Under </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody class="search_data_record">
                        <?php
                        if(!empty($employee_allrecords)){
                            foreach ($employee_allrecords as $emp_record) {
                        ?>
                        <tr id="employee_row<?php echo $emp_record->pempid;?>">
                            <td><?php if(!empty($emp_record->emp_name)){ echo $emp_record->emp_name; }?></td>
                            <td><?php if(!empty($emp_record->emp_contact)){ echo $emp_record->emp_contact; }?></td>
                            <td><?php if(!empty($emp_record->emp_email)){ echo $emp_record->emp_email; }?></td>
                            <td><?php if(!empty($emp_record->permission_name)){ echo $emp_record->permission_name; }?></td>
                            <td><?php if(!empty($emp_record->employee_name)){ echo $emp_record->employee_name; }?></td>
                            <td> 
                                <a onclick="edit_employee(<?php echo $emp_record->pempid; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                                <a id="delete_emp" data-toggle="modal" data-target="#delete-modal" onclick="deletepopup_emp(<?php echo $emp_record->pempid; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
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
            <a href="inventory/category_setup/manage_category"> <button class="btn btn-success" type="button"> Next  </button></a>
        </div>
    </div> <!-------row------>

</section>


<div class="modal fade" id="delete-modal" role="dialog">
    
</div>

<script type="text/javascript">
    function edit_employee(employee_id){
        $("span.error_msg").html('');
        $.ajax({
            type: "POST",
            url: "employee/employee_setup/edit_employee",
            data: {employee_id:employee_id},
            dataType: "json",
            success: function(data){ 
                if(data.employee_data){ 

                    $('html, body').animate({
                        scrollTop: $("#div1").offset().top
                    }, 1500);
                        
                    var pic = 'upload/employee_pics/'+data.employee_data.emp_pic;
                    //alert(pic);
                    
                    $("#employee_name").val(data.employee_data.employee_name);
                    $("#id_employee").val(data.employee_data.employee_id);
                    $("#emp_contact").val(data.employee_data.emp_contact);
                    $("#emp_email").val(data.employee_data.emp_email);
                    $("#permission").val(data.employee_data.permission);
                    $("#employee_under").val(data.employee_data.employee_under);
                    $("#emp_password").val(data.employee_data.emp_password);
                    $("#emp_address").val(data.employee_data.emp_address);
                    $("#location_id").val(data.employee_data.location_id);
                    $("#emp_email").val(data.employee_data.emp_email);
                    if(data.employee_data.emp_pic){
                        $('#file_preview_1').attr("src","upload/employee_pics/"+data.employee_data.emp_pic);
                    }else{
                        $('#file_preview_1').attr("src","img/employee-img.png");
                    }
                    
                }

            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    function deletepopup_emp(emp_id){
        $.ajax({
            type: "POST",
            //url: "permission/permission_setup/deletepopup_permission",
            url:"employee/employee_setup/deletepopup_employee",
            data: {emp_id:emp_id},
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
    
    function delete_emp(employee_id) {
        $.ajax({
            type: "POST",
            url:"employee/employee_setup/delete_employee",
            //url: "permission/permission_setup/delete_permission",
            data: {employee_id:employee_id},
            dataType: "json",
            success: function(data){
                if(data.success){
                    //$('#delete-modal').modal('toggle');
                    $("#employee_row"+employee_id).hide();
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