<section class="content-header">
    <h1>Purchase order</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Purchase order </li>
    </ol>
</section>
<section class="content">
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
    <form id="purchase_order_form" method="post">
        <div class="row">

                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control sign-control" name="vendor" id="vendor" placeholder="Vendor name">
                        <?php echo form_error('vendor', '<span for="vendor" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        <span id="vendor_error"></span>
                        <input type="hidden" name="vid" id="vid">
                    </div>
                </div>     
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <div class='input-group date'>
                            <input type='text' class="form-control sign-control" name="order_date" id='order_date' placeholder="Date" />
                            <?php echo form_error('order_date', '<span for="order_date" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <span id="date_error"></span>
                        </div> 	 
                    </div>		
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <select class="form-control sign-control" name="payment_status" id="payment_status">
                            <option value=""> Payment Status </option>
                            <option value="2"> Unpaid </option>
                            <option value="1"> Paid </option>
                        </select> 
                        <span id="unit_error"></span>
                    </div>
                </div>
                <div class="clearfix"> </div>

                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control sign-control" name="stock_name" id="stock_name" placeholder="Stock name">
                        <input type="hidden" name="stock_id" id="stock_id">
                        <span id="stock_error"></span>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control sign-control" name="qty" id="qty" placeholder="Quantity">
                        <span id="qty_error"></span>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control sign-control" name="rate" id="rate" placeholder="Rate">
                        <span id="rate_error"></span>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <select class="form-control sign-control" name="unit" id="unit">
                            <option value=""> Unit </option>
                            <?php
                            if(!empty($unit_lists)){
                                foreach($unit_lists as $unit){
                            ?>
                                <option value="<?php if(!empty($unit->unit_id)){ echo $unit->unit_id; }?>"><?php if(!empty($unit->unit)){ echo $unit->unit; }?></option>
                            <?php
                                }
                            }
                            ?>
                        </select> 
                        <span id="unit_error"></span>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control sign-control" name="total" id="total" placeholder="Total" readonly="">
                        <span id="total_error"></span>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <button class="btn btn-default" id="addmore" type="button"> Add more </button>
                    </div>
                </div>

                <div class="clearfix"> </div> 


              <!------------------------------------------------>

        </div> <!-------row -------->
  <!----------------------------------------------------------------------->
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="table-responsive">
                    <table class="table table-bg">
                        <thead class="thead-inverse">
                            <tr>
                                <th> Stock name</th>
                                <th> Quantity </th>
                                <th> Rate </th>
                                <th> Unit </th>
                                <th> Total </th>
                            </tr>
                        </thead>
                        <tbody id="addmore_p">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    
        <div class="row">
            <div class="col-md-12 text-right" id="divtotal">
                <p class="total-txt"> <span> Total: <i id="show_subtot"></span></p>  <br/>            
            </div>
            <div class="clearfix"> </div>
            <div class="col-md-12">  
                <p><a href="javascript:;">
                    <button class="btn btn-success" type="submit"> Save </button>
                    </a>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default" type="button" onclick="reset_form()">  Reset</button>
                        
                </p> 
            </div>
        </div>
        
        <input type="hidden" name="subtot" id="subtot">
    
    </form>
    
    <div class="row">
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
                            <th> Vendor name</th>
                            <th> Order Date </th>
                            <th> Total Amount </th>
                            <th> Payment Status </th>
                            <th> Order Status </th>
                        </tr>
                    </thead>
                    <tbody id="addmore_p" class="search_data_record">
                        <?php
                        if(!empty($purchase_lists)){
                            foreach($purchase_lists AS $plists){
                        ?>
                        <tr>
                            <td><?php if(!empty($plists->vendor_name)){ echo $plists->vendor_name; }?></td>
                            <td><?php if(!empty($plists->purchase_order_date)){ echo date("m-d-Y",strtotime(trim($plists->purchase_order_date))); }?></td>
                            <td><?php if(!empty($plists->final_amount)){ echo $plists->final_amount; }?></td>
                            <td><?php if(!empty($plists->payment_status)){ echo $plists->payment_status; }?></td>
                            <td><?php if(!empty($plists->order_status)){ echo $plists->order_status; }?></td>
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
</section>   <!-- /.content-wrapper -->
 
