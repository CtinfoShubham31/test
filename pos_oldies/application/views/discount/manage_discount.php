<section class="content-header" id="div1">
  <h1>Discount Setup</h1>
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
       <form method="post" id="discount_form">
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control sign-control" value="<?php  echo set_value('discount_name'); ?>" name="discount_name" id="discount_name" placeholder="Name of discount">
                    <?php echo form_error('discount_name', '<span for="discount_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <input type="text" class="form-control sign-control" value="<?php  echo set_value('percentage'); ?>" name="percentage" id="percentage" placeholder="Percentage">
                            <?php echo form_error('percentage', '<span for="percentage" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-3 left-none"> <span class="percent-icon">%</span> </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class='input-group date'>
                        <input type='text' class="form-control sign-control" value="<?php  echo set_value('applicable_from'); ?>" name="applicable_from" id="applicable_from" placeholder="Applicable from" />
                        <?php echo form_error('applicable_from', '<span for="applicable_from" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class='input-group date'>
                        <input type='text' class="form-control sign-control" value="<?php  echo set_value('applicable_to'); ?>" name="applicable_to" id="applicable_to" placeholder="Applicable To" />
                        <?php echo form_error('applicable_to', '<span for="applicable_to" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
           
            <input type="hidden" name="id_discount" id="id_discount" value="<?php if(!empty($id_discount)){ echo $id_discount; }?>">
            
           <?php
           if(empty($location_lists)){
           ?>
           <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class="side-by-side clearfix">
                        <div>
                            <label for="location"> Company Name</label> <br/>
                            <input type='text' readonly="" class="form-control sign-control" value="<?php if(!empty($company_details)){ echo $company_details->name; }?>" />
                        </div>     
                    </div> 
                </div> 
           </div>
           <div class="clearfix"> </div>
           <?php
           }else{
           ?>
           
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <div class="side-by-side clearfix">
                        <div>
                            <label for="location"> Select Location </label> <br/>
                            <select id="location" name="location[]" data-placeholder="Choose location..." class="chosen-select" multiple style="width:100%;">
                                
                                <?php
                                if(!empty($location_lists)){
                                    foreach($location_lists as $loc_list){
                                ?>
                                <option value="<?php echo $loc_list->location_id;?>" <?php echo  set_select('location', $loc_list->location_id); ?>><?php echo $loc_list->location_name;?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('location', '<span for="location" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>     
                    </div> 
                </div> 
           </div>
           <div class="clearfix"> </div>
           
           <?php
           }
           ?>
           
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success" type="submit"> Save </button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default" type="button" onclick="reset_form()"> Reset </button>
                </div>
            </div>
         
          
          <!------------------------------------------------>
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
                          <th> Name of discount </th>
                          <th> Percentage of tax </th>
                          <th> Applicable from </th>
                          <th> To </th>
                          <th> Location </th>
                          <th> Action </th>
                        </tr>
                    </thead>
                    <tbody class="search_data_record">
                        <?php
                        if(!empty($discount_lists)){
                            foreach ($discount_lists as $dslist) {
                        ?>
                        <tr id="discount_row<?php echo $dslist->discount_id;?>">
                            <td><?php if(!empty($dslist->discount_name)) { echo $dslist->discount_name; }?></td>
                            <td><?php if(!empty($dslist->percentage)) { echo $dslist->percentage; }?>%</td>
                            <td><?php if(!empty($dslist->applicable_from)) { echo date('m/d/Y H:i:s',strtotime($dslist->applicable_from)); }?></td>
                            <td><?php if(!empty($dslist->applicable_to)) { echo date('m/d/Y H:i:s',strtotime($dslist->applicable_to)); }?></td>
                            <td><?php if(!empty($dslist->locname)) { echo $dslist->locname; }?></td>
                            <td> <a onclick="edit_discount(<?php echo $dslist->discount_id; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                                 <a id="delete_disc" data-toggle="modal" data-target="#delete-modal" onclick="deletepopup_discount(<?php echo $dslist->discount_id; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
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
            <a href="tax/tax_setup/manage_tax/"><button class="btn btn-success" type="button"> Next  </button></a>
        </div>
    </div>
    
</section> <!-----section ------>

<div class="modal fade" id="delete-modal" role="dialog">
    
</div>

<script type="text/javascript">
//    $(document).ready(function() {
//        $('.chosen-select').chosen({ });
//        $('#applicable_from').datetimepicker();
//        $('#applicable_to').datetimepicker();
//    });
    
    function edit_discount(discount_id){
        $("span.error_msg").html('');
        $.ajax({
            type: "POST",
            url: "discount/discount_setup/edit_discount",
            data: {discount_id:discount_id},
            dataType: "json",
            success: function(data){
                if(data.discount_data){

                    $('html, body').animate({
                        scrollTop: $("#div1").offset().top
                    }, 1500);

                    $("#id_discount").val(data.discount_data.discount_id);
                    $("#discount_name").val(data.discount_data.discount_name);
                    $("#percentage").val(data.discount_data.percentage);
                    $("#applicable_from").val(data.discount_data.applicable_from);
                    $("#applicable_to").val(data.discount_data.applicable_to);
                    $("#location").val(data.discount_data.loc_id).trigger("chosen:updated");
                   
                }

            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    
    function deletepopup_discount(discount_id){
        $.ajax({
            type: "POST",
            url: "discount/discount_setup/deletepopup_discount",
            data: {discount_id:discount_id},
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
    
    function delete_discount(discount_id){
        $.ajax({
            type: "POST",
            url: "discount/discount_setup/delete_discount",
            data: {discount_id:discount_id},
            dataType: "json",
            success: function(data){
                if(data.success){
                    //$('#delete-modal').modal('toggle');
                    $("#discount_row"+discount_id).hide();
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
