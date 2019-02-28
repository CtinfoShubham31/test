<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Add new custom field</h4>
        </div>
        <div class="modal-body">
            <form id="taxupdate_form">
                <div class="row">
                    <div class="col-md-12 ">
<!--                        <p> <button class="btn btn-default "> <i class="fa fa-plus"></i> Add More</button></p>-->

                        <div class="row input_fields_wrap">
                            <div class="form-group group-bottom">
                                <div class="col-md-10">
                                    <input type="text" value="<?php if(!empty($taxname)){ echo $taxname; }?>" class="form-control" id="taxname" name="taxname" placeholder="Tax Name"> 
                                    <span id="txname_error"></span>
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                            <input type="hidden" name="txid" id="txid" value="<?php if(!empty($tax_id)){ echo $tax_id; }?>">
                            <div class="clearfix"> </div> 
                            
                            <?php
                            if(!empty($tax_data)){
                                $i = 1;
                                foreach ($tax_data as $taxd) {
                            ?>
                            <div class="form-group group-bottom">
                                <div class="col-md-4">
                                    <input type="text" required="" class="form-control" value="<?php if(!empty($taxd->percentage)) { echo $taxd->percentage; }?>" id="percent" name="percent[]" placeholder="Percent%">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" required="" class="form-control datepick" value="<?php if(!empty($taxd->applicable_from)) { echo date("m/d/Y H:i:s",strtotime($taxd->applicable_from)); }?>" id="applicable" name="applicable[]" placeholder="Applicable From">
                                </div>
                                <?php 
                                if($i==1){
                                ?>
                                <div class="col-md-2 add_field_button">
                                    <i class="fa fa-plus plus-icon"></i>
                                </div>
                                <?php
                                }else{
                                ?>
                                <div class="col-md-2 remove_field">
                                    <i class="fa fa-minus minus-icon"></i>
                                </div>
                                <?php
                                }
                                ?>
                            </div> 
                            <?php
                                $i++;

                                }
                            }
                            ?>
                        
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            //$(wrapper).append('<div class="form-group"><input class="form-control control-left type="text" name="custom_fields[]" placeholder="Custom field"/><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>'); //add input box
            $(wrapper).append('<div class="form-group group-bottom"><div class="col-md-4"><input type="text" class="form-control" required="" id="percent[]" name="percent[]" placeholder="Percent%"></div><div class="col-md-6"><input type="text" required="" class="form-control datepick" id="applicable[]" name="applicable[]" placeholder="Applicable From"></div><div class="col-md-2 remove_field"><i class="fa fa-minus minus-icon"></i></div></div>'); //add input box
            $('.datepick').datetimepicker();
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
    $('#taxupdate_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'tax/tax_setup/update_tax',
            data: $('#taxupdate_form').serialize(),
            dataType: "json",
            success: function (data) {
                if(data.errors.taxname){
                    $("#txname_error").html(data.errors.taxname);
                    setInterval(function(){ $("#txname_error").html(''); }, 3000);
                }
                else if(data.success){
                    $(".modal-body").hide();
                    $(".modal-title").html('Tax updated successfully.');
                    //$(".modal-footer").hide();
                    setTimeout(function() {
                        $('#delete-modal').modal('hide');
                    }, 2000);
                    
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                }
                
                //$("#custom_records").html(data);
                //$('#custom-popup').modal('hide');
            }
        });

    });

    
    
    
});
</script>