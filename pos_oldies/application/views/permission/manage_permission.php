<section class="content-header" id="div1">
    <h1>Permission Setup</h1>
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
        <form method="post" id="permission_form">
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control sign-control" name="permission_name" id="permission_name" placeholder="Name">
                    <?php echo form_error('permission_name', '<span for="permission_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <h4>Employee</h4>
                    <label for="employee_add" class="btn btn-success checkbox-btn"> Add<input type="checkbox" name="employee_add" id="employee_add" class="badgebox"><span class="badge">&check;</span></label> &nbsp; &nbsp;
                    <label for="employee_edit" class="btn btn-default checkbox-btn"> Edit<input type="checkbox" name="employee_edit" id="employee_edit" class="badgebox"><span class="badge">&check;</span></label> &nbsp; &nbsp;
                    <label for="employee_delete" class="btn btn-danger checkbox-btn"> Delete<input type="checkbox" name="employee_delete" id="employee_delete" class="badgebox"><span class="badge">&check;</span></label>
                </div>
            </div>

            <input type="hidden" name="id_permission" id="id_permission" value="<?php if(!empty($id_permission)){ echo $id_permission; }?>">
            
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <h4>Inventory</h4>
                    <label for="inventory_add" class="btn btn-success checkbox-btn"> Add<input type="checkbox" name="inventory_add" id="inventory_add" class="badgebox"><span class="badge">&check;</span></label> &nbsp; &nbsp;
                    <label for="inventory_edit" class="btn btn-default checkbox-btn"> Edit<input type="checkbox" name="inventory_edit" id="inventory_edit" class="badgebox"><span class="badge">&check;</span></label> &nbsp; &nbsp;
                    <label for="inventory_delete" class="btn btn-danger checkbox-btn"> Delete<input type="checkbox" name="inventory_delete" id="inventory_delete" class="badgebox"><span class="badge">&check;</span></label>
                </div>
            </div>

            <div class="clearfix"> </div>

            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                      <button class="btn btn-success" type="submit"> Save </button>&nbsp;&nbsp;&nbsp;
                      <button class="btn btn-default" type="button" onclick="reset_form()"> Reset </button>
                </div>
            </div>

        </form>
    </div> <!-----row------> 
    <div class="clearfix"> </div>  <hr>

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
                            <th> Name </th>
                            <th> Employee </th>
                            <th> Inventory  </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody class="search_data_record">
                        <?php
                        if(!empty($permission_lists)){
                            
                            foreach($permission_lists as $plist){ 
                                $empvalue = '';$invvalue = '';
                        ?>
                        <tr id="permission_row<?php echo $plist->permission_id;?>">
                            <td><?php echo $plist->permission_name;?></td>
                            <td>
                                <?php 
                                if($plist->emp_add)
                                { 
                                    $empvalue .= 'Add,'; 
                                    
                                } 
                                if($plist->emp_edit){ 
                                    $empvalue .= 'Edit,'; 
                                    
                                } 
                                if($plist->emp_delete){ 
                                    $empvalue .= 'Delete'; 
                                    
                                }
                                
                                echo rtrim($empvalue,',');
                                ?>
                            </td>
                            <td> 
                                <?php 
                                if($plist->inv_add)
                                { 
                                    $invvalue .= 'Add,'; 
                                    
                                } 
                                if($plist->inv_edit){ 
                                    $invvalue .= 'Edit,'; 
                                    
                                } 
                                if($plist->inv_delete){ 
                                    $invvalue .= 'Delete'; 
                                    
                                }
                                
                                echo rtrim($invvalue,',');
                                ?>
                                
                            </td>
                            <td> 
                                <a id="edit_perm" onclick="edit_perm(<?php echo $plist->permission_id; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                                <a id="delete_perm" data-toggle="modal" data-target="#delete-modal" onclick="deletepopup_perm(<?php echo $plist->permission_id; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
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
    </div>
    <div class="clearfix"> </div> 
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="employee/employee_setup/manage_employee"><button class="btn btn-success" type="button"> Next  </button></a>
        </div>
    </div>

</section> <!-----section ------>

<div class="modal fade" id="delete-modal" role="dialog">
    
</div>

<script type="text/javascript">
    function edit_perm(perm_id){
        $("span.error_msg").html('');
        $.ajax({
            type: "POST",
            url: "permission/permission_setup/edit_permission",
            data: {perm_id:perm_id},
            dataType: "json",
            success: function(data){
                if(data.permission_data){

                        $('html, body').animate({
                            scrollTop: $("#div1").offset().top
                        }, 1500);

                    
                    $("#permission_name").val(data.permission_data.permission_name);
                    $("#id_permission").val(data.permission_data.permission_id);
                    if(data.permission_data.emp_add == 1){ $('#employee_add').prop('checked', true);}else{ $('#employee_add').prop('checked', false); }
                    if(data.permission_data.emp_edit == 1){ $('#employee_edit').prop('checked', true);}else{ $('#employee_edit').prop('checked', false); }
                    if(data.permission_data.emp_delete == 1){ $('#employee_delete').prop('checked', true);}else{ $('#employee_delete').prop('checked', false); }
                    if(data.permission_data.inv_add == 1){ $('#inventory_add').prop('checked', true);}else{ $('#inventory_add').prop('checked', false); }
                    if(data.permission_data.inv_edit == 1){ $('#inventory_edit').prop('checked', true);}else{ $('#inventory_edit').prop('checked', false); }
                    if(data.permission_data.inv_delete == 1){ $('#inventory_delete').prop('checked', true);}else{ $('#inventory_delete').prop('checked', false); }
                }

            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    function deletepopup_perm(perm_id){
        $.ajax({
            type: "POST",
            url: "permission/permission_setup/deletepopup_permission",
            data: {perm_id:perm_id},
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
    
    function delete_perm(permission_id) {
        $.ajax({
            type: "POST",
            url: "permission/permission_setup/delete_permission",
            data: {permission_id:permission_id},
            dataType: "json",
            success: function(data){
                if(data.success){
                    //$('#delete-modal').modal('toggle');
                    $("#permission_row"+permission_id).hide();
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
