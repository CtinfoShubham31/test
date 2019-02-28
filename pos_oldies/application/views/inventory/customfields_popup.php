<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Add new custom field</h4>
        </div>
        <div class="modal-body">
            <form id="custom_form">
<!--                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <input type="text" class="form-control" id="custom-field" placeholder="Custom field" >
                        </div>
                    </div>

                    <div class="clearfix"> </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="custom-field" placeholder="Custom field" >
                        </div>
                    </div>
                    <div class="col-md-12 text-right"> 
                        <div class="form-group">
                            <button class="btn btn-default btn-circle" type="button"> <i class="fa fa-plus"> </i> </button>
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-md-12 input_fields_wrap">
                        <p> <button class="btn btn-default add_field_button"> <i class="fa fa-plus"></i> Add More</button></p>
                        <div class="form-group">
                            <input type="text" class="form-control control-left" name="custom_fields[]" placeholder="Custom field">
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
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
            $(wrapper).append('<div class="form-group"><input class="form-control control-left type="text" name="custom_fields[]" placeholder="Custom field"/><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
    $('#custom_form').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: 'inventory/stock_setup/addcustom_fields',
            data: $('#custom_form').serialize(),
            success: function (data) {
//                if(data == 'True'){
//                    alert('form was submitted');
//                }else{
//                    alert('Already have');
//                }
                
                $("#custom_records").html(data);
                $('#custom-popup').modal('hide');
            }
        });

    });

    
    
    
});
</script>