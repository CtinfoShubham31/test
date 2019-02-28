<section class="content-header" id="div1">
    <h1>Tax Setup</h1>
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
        <form method="post" id="tax_form">
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control sign-control" name="tax_name" id="tax_name" placeholder="Tax name">
                    <?php echo form_error('tax_name', '<span for="tax_name" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <input type="text" class="form-control sign-control" name="percentage" id="percentage" placeholder="Percentage">
                            <?php echo form_error('percentage', '<span for="percentage" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-3 left-none"> <span class="percent-icon">%</span> </div>
                    </div>
                </div>
            </div>
          
            <input type="hidden" name="id_tax" id="id_tax" value="<?php if(!empty($id_tax)){ echo $id_tax; }?>">
            
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <div class='input-group date'>
                        <input type="text" class="form-control sign-control" name="applicable_from" id="applicable_from" placeholder="Applicable from" />
                        <?php echo form_error('applicable_from', '<span for="applicable_from" generated="true" class="error_msg">', '</span>', '</span>'); ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 	 
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <button class="btn btn-success" type="submit"> Save </button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default" type="button" onclick="reset_form()">  Reset</button>
                </div>
            </div>
       
          <!------------------------------------------------>
        </form>
      </div> <!-----row------> 
  <div class="clearfix"> </div>  <hr>

  <!----------------------------------------------------------------------->
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
            <table class="table table-bg" id="tpost">
              <thead class="thead-inverse">
                  <tr>
                      <th> Tax name </th>
                      <!--      <th> Percentage of tax </th>-->
                      <th> Percentage Applicable From </th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody class="search_data_record"> 
        <?php
        if(!empty($tax_lists)){
            foreach ($tax_lists as $tlists) {
        ?>
        
            <tr id="tax_row<?php echo $tlists->tax_id;?>">
  
                <td id="edit_tax_name<?php echo $tlists->tax_id;?>"> <?php echo $tlists->tax_name;?>  </td>
                
                
                <td> 
                    <table id="subtable<?php echo $tlists->tax_id;?>" style="width:100%">
<!--                        <tr>
                            <th>Percentage</th>
                            <th>Applicable From</th>
                        </tr>-->
                        
                        <?php getPercentageApplicable($tlists->tax_id);?>
                    </table>
                    
                </td>
                
                <td id="save<?php echo $tlists->tax_id; ?>"> 
<!--                    <a id="edit_tax" onclick="edit_tax(<?php echo $tlists->tax_id; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;-->
                    <a data-toggle="modal" data-target="#delete-modal" id="edit_tax" onclick="edit_taxpopup(<?php echo $tlists->tax_id; ?>)"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
                    <a data-toggle="modal" data-target="#delete-modal" onclick="deletepopup_tax(<?php echo $tlists->tax_id; ?>)"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                </td>
  
            </tr>
        
        <?php
            }
        }
        ?>
    
    
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
     <div class="clearfix"> </div> 
     <div class="row">
          <div class="col-md-12 text-right">
            <a href="device/device_setup/manage_device"><button class="btn btn-success" type="button"> Next  </button></a>
          </div>
          </div>
     </div> <!-----row------> 
  </section> <!-----section ------>

<div class="modal fade" id="delete-modal" role="dialog">
    
</div>
