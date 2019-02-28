<section class="content-header" id="div1">
    <h1>Inventory setup > Category</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Inventory setup > Category </li>
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
        <form method="post" id="invcategory_form" enctype="multipart/form-data">
            <div class="col-md-4 col-xs-12 text-center"><br/>
                <div class="droparea">
                    <h4> Upload Image </h4>
                    <div class="droparea text-center" id="drop1"> 
                        <img src="img/employee-img.png" id="file_preview_1" > <br >
                    </div>
                    <p class="text-center bottom-space">  PNG OR JPEG  </p>
                    <p class="text-center small line-space"> Image size should not be more than 1 MB and Image dimension should not exceed 1024*1024.</p>
                </div>
                <input type="file" name="image" id="file_1" accept="image/*" style="display: none;" >
                <?php if(!empty($error_image)) { print_r($error_image); }?>
            </div>
            
            <div class="col-md-8">
                <div class="row"> 

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select onchange="setparcategory_taxdiscount(this.value)" class="form-control sign-control" name="parent_category_id" id="parent_category_id">
                                <option value=""> Parent Category </option>
                                <?php
                                if(!empty($parent_category)){
                                    foreach ($parent_category as $pcat) {
                                ?>
                                <option value="<?php echo $pcat->inventory_category_id;?>" <?php echo set_select('parent_category_id', $pcat->inventory_category_id); ?>><?php echo $pcat->category_name;?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('category_name'); ?>" name="category_name" id="category_name" placeholder="Category Name">
                            <?php echo form_error('category_name', '<span for="category_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>

      
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php if(!empty($category_code)){ echo $category_code; }else{ echo set_value('category_code'); } ?>" name="category_code" id="category_code" placeholder="Category Code">
                            <?php echo form_error('category_code', '<span for="category_code" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>

                    <input type="hidden" name="id_inventory_category" id="id_inventory_category" value="<?php if(!empty($id_inventory_category)){ echo $id_inventory_category; }?>">
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side ">
                                <div>
                                    <select name="tax_id[]" id="tax_id" data-placeholder="Tax" class="chosen-select" multiple style="width:100%;">
                                        <?php
                                        if(!empty($tax_lists)){
                                            foreach ($tax_lists as $tlists) {
                                        ?>
                                            <option value="<?php if(!empty($tlists->tax_id)){ echo $tlists->tax_id; }?>" <?php echo set_select('tax_id', $tlists->tax_id); ?>><?php if(!empty($tlists->tax_name)){ echo $tlists->tax_name; }?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('tax_id', '<span for="tax_id" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                                </div>     
                            </div>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
      <!------------------------------------------------>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select name="discount_id[]" id="discount_id" data-placeholder="Discount" class="chosen-select" multiple style="width:100%;">
                                        <option value=""> </option>
                                        <?php
                                        if(!empty($discount_lists)){
                                            foreach ($discount_lists as $dlists) {
                                        ?>
                                            <option value="<?php if(!empty($dlists->discount_id)){ echo $dlists->discount_id; }?>" <?php echo set_select('discount_id', $dlists->discount_id); ?>><?php if(!empty($dlists->discount_name)){ echo $dlists->discount_name; }?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('discount_id', '<span for="discount_id" generated="true" class="error_msg">', '</span>', '</span>'); ?>

                                </div>     
                            </div>
                        </div>
                    </div>
      
                    <div class="col-md-6 col-sm-6">
                        
                    </div>

                </div>
                
                <div class="form-group">
                    <button class="btn btn-success" type="submit"> Save </button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default" type="button" onclick="reset_form()"> Reset </button>
                </div>
            </div>
        </form>
        <div class="clearfix"> </div> 
 
            <div class="col-md-12">
                <hr>
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
                                    <th> Category Name </th>
                                    <th> Parent Category </th>
                                    <th> Tax </th>
                                    <th> Discount </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody class="search_data_record">
                                <?php
                                if(!empty($invcategory_lists)){
                                    foreach ($invcategory_lists as $invcatlist){
                                ?>
                                    <tr id="cat_row<?php echo $invcatlist->inventory_category_id;?>">
                                        <td><?php if(!empty($invcatlist->category_name)){ echo $invcatlist->category_name; }?></td>
                                        <td> <?php if(!empty($invcatlist->catname)){ echo $invcatlist->catname; }?></td>
                                        <td> 
                                            <?php 
                                            $tax_details = $this->inventory_model->getInventoryTax($invcatlist->company_id,$invcatlist->inventory_category_id);
                                            //print_r($tax_details);
                                            if(!empty($tax_details)){
                                                echo $tax_details->tax_name;
                                            }
                                            ?>
                                        </td>
                                        <td> 
                                            <?php 
                                            $discount_details = $this->inventory_model->getInventoryDiscount($invcatlist->company_id,$invcatlist->inventory_category_id); 
                                            if(!empty($discount_details)){
                                                echo $discount_details->discount_name;
                                            }
                                            ?> 
                                        </td>
                                        <td> 
                                            <a onclick="edit_inventory_category(<?php echo $invcatlist->inventory_category_id; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                                            <a id="delete_cat" data-toggle="modal" data-target="#delete-modal" onclick="deletepopup_category(<?php echo $invcatlist->inventory_category_id; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
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
     
        <div class="col-md-12 text-right">
            <a href="inventory/stock_setup/manage_stock"> <button class="btn btn-success" type="button"> Next  </button></a>
        </div>

    
    </div>
  <!-----row------> 
</section>

<div class="modal fade" id="delete-modal" role="dialog">
    
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#parent_category_id').focus();
        $('.chosen-select').chosen({ });
        
        var options1 = {
            //url: 'server.php',
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
                    
                    $('#file_preview_1' ).animate({opacity: 0}, 'slow', function(){
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

        // Exemples
        $('#drop1').droparea(options1);
        
        $("#invcategory_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            category_name: {
                required: true,
                maxlength:30
            },
            category_code: {
                required: true,
                remote: {
                    url: "inventory/category_setup/categorycode_existance",
                    type: "post",
                    data: {
                        category_id: function() {
                          return $("#id_inventory_category" ).val();
                        }
                    }
                }
            },
            tax_id:{
                required: true,
            },
            

        },
        messages: {
            category_code:{
                remote:"Category code already exists."
            },
        },
            
    });
        
    });
    
    function edit_inventory_category(inventory_category_id){
        $("span.error_msg").html('');   
        $.ajax({
            type: "POST",
            url: "inventory/category_setup/edit_inventory_category",
            data: {inventory_category_id:inventory_category_id},
            dataType: "json",
            success: function(data){ 
                if(data.inventory_cat_data){ 

                    $('html, body').animate({
                        scrollTop: $("#div1").offset().top
                    }, 1500);
                        
                    $("#id_inventory_category").val(data.inventory_cat_data.inventory_category_id);
                    $("#category_name").val(data.inventory_cat_data.category_name);
                    $("#category_code").val(data.inventory_cat_data.category_code);
                    $("#parent_category_id").val(data.inventory_cat_data.inv_cat_id);
                    $("#tax_id").val(data.inventory_cat_data.tx_ids).trigger("chosen:updated");
                    $("#discount_id").val(data.inventory_cat_data.disc_ids).trigger("chosen:updated");
                    if(data.inventory_cat_data.category_pic){
                        $('#file_preview_1').attr("src","upload/category_pics/"+data.inventory_cat_data.category_pic);
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
    
    function deletepopup_category(cat_id){
        $.ajax({
            type: "POST",
            //url: "permission/permission_setup/deletepopup_permission",
            url:"inventory/category_setup/deletepopup_category",
            data: {cat_id:cat_id},
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
    
    function delete_category(cat_id) {
        $.ajax({
            type: "POST",
            url:"inventory/category_setup/delete_category",
            //url: "permission/permission_setup/delete_permission",
            data: {cat_id:cat_id},
            dataType: "json",
            success: function(data){
                if(data.success){
                    //$('#delete-modal').modal('toggle');
                    $("#cat_row"+cat_id).hide();
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
    
    function setparcategory_taxdiscount(cate_id){
    $.ajax({
        type: "POST",
        url: "inventory/stock_setup/setcategory_taxdiscount",
        data: {inventory_category_id:cate_id},
        dataType: "json",
        success: function(data){
            $('html, body').animate({
                scrollTop: $("#div1").offset().top
            }, 1500);
            if(data.tx_ids){ 
                $("#tax_id").val(data.tx_ids).trigger("chosen:updated");
            }
            if(data.disc_ids){ 
                $("#discount_id").val(data.disc_ids).trigger("chosen:updated");
            }

        },
        error: function(){
           alert("failure");
        }
    });
}
</script>