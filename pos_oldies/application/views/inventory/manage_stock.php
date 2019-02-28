<section class="content-header" id="div1">
    <h1>Inventory setup > Stock</h1>
    <ol class="breadcrumb">
        <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Inventory setup > Stock </li>
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
        <form method="post" id="invstock_form" enctype="multipart/form-data">
            <div class="col-md-4 col-xs-12 text-center">
               <br/>
                <div class="droparea">
                    <h4> Upload Image </h4>
                    <div class="droparea text-center" id="drop1"> 
                        <img src="img/employee-img.png" id="file_preview_1" > <br >
                    </div>
                    <p class="text-center bottom-space">  PNG OR JPEG  </p>
                    <p class="text-center small line-space"> Image size should not be more than 1 MB and Image dimension should not exceed 1024*1024.</p>
                </div>
                <input type="file" name="image" id="file_1" accept="image/*" style="display: none;" >
                <?php echo form_error('image', '<span for="image" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                <?php if(!empty($error_image)) { print_r($error_image); }?>
            </div>
            <div class="col-md-8">
                <div class="row"> 
        
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select onchange="setcategory_taxdiscount(this.value)" class="form-control sign-control" name="inventory_category" id="inventory_category">
                                <option value="">Select Category</option>
                                <?php
                                if(!empty($category_lists)){
                                    foreach($category_lists as $clist){
                                ?>
                                <option value="<?php echo $clist->inventory_category_id;?>" <?php echo set_select('inventory_category', $clist->inventory_category_id); ?>> <?php echo $clist->category_name;?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('inventory_category', '<span for="inventory_category" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    
                    <input type="hidden" name="id_inventory_stock" id="id_inventory_stock" value="<?php if(!empty($id_inventory_stock)){ echo $id_inventory_stock; }?>">
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('stock_name'); ?>" name="stock_name" id="stock_name" placeholder="Stock Name">
                            <?php echo form_error('stock_name', '<span for="stock_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php if(!empty($product_code)){ echo $product_code; }else { echo set_value('product_code');} ?>" name="product_code" id="product_code" placeholder="Product Code">
                            <?php echo form_error('product_code', '<span for="product_code" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('barcode'); ?>" name="barcode" id="barcode" placeholder="Barcode">
                            <?php echo form_error('barcode', '<span for="barcode" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control sign-control" name="stock_type" id="stock_type">
                                <option value=""> Stock Type </option>
                                <option value="1" <?php echo set_select('stock_type', 1); ?>> Product</option>
                                <option value="2" <?php echo set_select('stock_type', 2); ?>> Service </option>
                            </select>
                            <?php echo form_error('stock_type', '<span for="stock_type" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select data-placeholder="Location" name="location_id[]" id="location_id" class="chosen-select" multiple style="width:100%;">
                                        <?php
                                        if(!empty($location_lists)){
                                            foreach($location_lists as $loc){
                                        ?>
                                        <option value="<?php echo $loc->location_id;?>" <?php echo set_select('location_id', $loc->location_id); ?>> <?php echo $loc->location_name;?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('location_id', '<span for="location_id" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                                </div>     
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
          <!------------------------------------------------>
          
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select data-placeholder="Tax" name="tax_name[]" id="tax_name" class="chosen-select" multiple style="width:100%;">
                                        <?php
                                        if(!empty($tax_lists)){
                                            foreach($tax_lists as $tlists){
                                        ?>
                                        <option value="<?php echo $tlists->tax_id;?>" <?php echo set_select('tax_name', $tlists->tax_id); ?>> <?php echo $tlists->tax_name;?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('tax_name', '<span for="tax_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                                 </div>     
                            </div>
                        </div>
                    </div>
          
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select data-placeholder="Discount" name="discount_name[]" id="discount_name" class="chosen-select" multiple style="width:100%;">
                                      <?php
                                        if(!empty($discount_lists)){
                                            foreach($discount_lists as $dlists){
                                        ?>
                                        <option value="<?php echo $dlists->discount_id;?>" <?php echo set_select('discount_name', $dlists->discount_id); ?>> <?php echo $dlists->discount_name;?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('discount_name', '<span for="discount_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                                </div>     
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
           <!------------------------------------------------>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <textarea placeholder="Description" name="description" id="description" class="form-control sign-control textarea-control" rows="5" ><?php echo set_value('description'); ?></textarea>
                            <?php echo form_error('description', '<span for="description" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select class="form-control sign-control" data-placeholder="Unit" name="unit" id="unit">
                                        <option value=""> Unit</option>
                                        <?php 
                                        if(!empty($unit_lists)){
                                            foreach ($unit_lists as $ulists) {
                                        ?>
                                        <option value="<?php echo $ulists->unit_id;?>" <?php echo set_select('unit', $ulists->unit_id); ?>> <?php echo $ulists->unit;?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php //echo form_error('unit', '<span for="unit" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                                </div>     
                            </div>
                        </div>
                    </div>
          <!------------------------------------------------>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('cost_price'); ?>" name="cost_price" id="cost_price" placeholder="Cost Price">
                            <?php echo form_error('cost_price', '<span for="cost_price" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('sell_price'); ?>" name="sell_price" id="sell_price" placeholder="Sell Price">
                            <br/>
<!--                            <p>
                                <label for="inclusive_tax" class="btn btn-success checkbox-btn"> Add<input type="checkbox" name="inclusive_tax" value="1" id="inclusive_tax" class="badgebox tick_ckbox">
                                <span class="badge">✓</span></label> Is Inclusive Tax  
                            </p>-->
                            <p>
                                <label for="inclusive_tax" class="btn btn-success checkbox-btn simple-check"> 
                                    <input type="checkbox" name="inclusive_tax" value="1" id="inclusive_tax" class="badgebox simple-badgebox">
                                    <span class="badge simple-badge">✓</span>
                                </label> Is Inclusive tax 
                            </p>
                            <?php echo form_error('sell_price', '<span for="sell_price" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
                    <!------------------------------------------------>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('opening_quantity'); ?>" name="opening_quantity" id="opening_quantity" placeholder="Opening Quantity">
                            <?php echo form_error('opening_quantity', '<span for="opening_quantity" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" value="<?php echo set_value('current_quantity'); ?>" name="current_quantity" id="current_quantity" placeholder="Current Quantity">
                            <?php echo form_error('current_quantity', '<span for="current_quantity" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                    </div>
          
                    <div class="clearfix"> </div>
                    <div class="col-md-12"> 
                        <h4>Would you like to add custom fields? 
                        <button onclick="customfields_popup()" type="button" class="btn btn-success" data-toggle="modal" data-target="#custom-popup">Yes</button></h4>
                    </div>
          
                    <div class="col-md-6 col-sm-6" id="custom_records">
                        <?php 
                        if(!empty($get_field_lists)){
                            foreach ($get_field_lists as $field_data) {
                        ?>
                            <div class="form-group">
                                <input type="text" class="form-control sign-control" value="<?php //echo $field_data->value;?>" name="<?php echo $field_data->custom_name;?>" id="<?php echo $field_data->custom_name;?>" placeholder="<?php echo $field_data->custom_name;?>">
                            </div>
                        <?php
                            }
                        }
                        ?>
                        
                    </div>
                    <div class="clearfix"></div>

          <!------------------------------------------------>
          
          
                </div>
                <div class="form-group">
                    <button class="btn btn-success" id="update_stock" type="submit"> Save </button>&nbsp;&nbsp;&nbsp;
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
                                    <th> Stock Name </th>
                                    <th> Product Code </th>
                                    <th> Stock Category </th>
                                    <th> Type </th>
<!--                                    <th> Location </th>-->
                                    <th> Current Quantity </th>
                                    <th> Tax </th>
                                    <th> Discount </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody class="search_data_record">
                                <?php
                                if(!empty($stock_lists)){
                                    foreach ($stock_lists as $slist){
                                ?>
                                <tr id="stock_row<?php echo $slist->inventory_stock_id;?>">
                                    <td><?php if(!empty($slist->product_name)){ echo $slist->product_name; }?></td>
                                    <td><?php if(!empty($slist->product_code)){ echo $slist->product_code; }?></td>
                                    <td><?php if(!empty($slist->category_name)){ echo $slist->category_name; }?></td>
                                    <td><?php if(!empty($slist->stock_type)){ echo ($slist->stock_type)==1?'Product':'Service';}?></td>
                                    <td>
                                        <?php 
                                        //$location_details = $this->inventory_stock_model->getInventoryStockLocation($slist->company_id,$slist->inventory_stock_id);
                                        
//                                        if(!empty($location_details)){
//                                            echo $location_details->location_name;
//                                        }
                                        if(!empty($slist->current_quantity)){ echo $slist->current_quantity;}
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $tax_details = $this->inventory_stock_model->getInventoryStockTax($slist->company_id,$slist->inventory_stock_id);
                                        //print_r($tax_details);
                                        if(!empty($tax_details)){
                                            echo $tax_details->tax_name;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $discount_details = $this->inventory_stock_model->getInventoryStockDiscount($slist->company_id,$slist->inventory_stock_id); 
                                        if(!empty($discount_details)){
                                            echo $discount_details->discount_name;
                                        }
                                        ?> 
                                    </td>
                                    <td> <a onclick="edit_inventory_stock(<?php echo $slist->inventory_stock_id; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                                         <a id="delete_stock" data-toggle="modal" data-target="#custom-popup" onclick="deletepopup_stock(<?php echo $slist->inventory_stock_id; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
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
          
            
<!--            <div class="col-md-12 text-right">
                <a href="javascript:;"> <button class="btn btn-success" type="button"> Finish  </button></a>
            </div>-->
          
        
    </div>
      <!-----row------> 
</section>
 

<div class="modal fade" id="custom-popup" role="dialog">
    
</div>