<div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Merge Labels</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
      <!-- Modal body -->
        <div class="modal-body">
            <form id="merge_lab" method="post">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
<!--                            <label for="">Configure the contents </label>-->
                            <select id="tgid" name="tgid" class="chosen-select form-elect edit-input" style="width:100%;" tabindex="4">
                                <option value="">Select Lables</option>
                                <?php labelTree();?>
                            </select>
                            <span id="label_name_error" class="error_msg"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" name="add" value="1">
                    <input type="hidden" name="label_id" value="<?php echo $label_id;?>"><!----Label id which is going to merge-->
                    
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" type="submit"> Merge </button>
                    </div>
                </div>
            </form>
        </div>
      
      <!-- Modal footer --> 
    </div>
</div>

<script>
$(document).ready(function() {
var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
    $(selector).chosen(config[selector]);
};


$("#merge_lab").on("submit", function(event) {
    //console.log('asasa');
    /* stop form from submitting normally or prevent default action */
    event.preventDefault();
    var form_data = $(this).serialize(); //Encode form elements for submit;
    console.log(form_data);
    $.ajax({
        type: "POST",
        url: "dashboard/user_dashboard/labelfor_merge",
        data: form_data,
       // contentType: "application/json;charset=utf-8",
        dataType: "json",
        success: function(response){
        //alert(response);
            if(response.errors.valid_merge){
                $("#label_name_error").fadeIn().html(response.errors.valid_merge);

                setTimeout(function() {
                        $('#label_name_error').fadeOut("slow");
                }, 3000 );

            }
            else if(response.success == 'true'){
                location.reload();
            }
            else if(response.success == 'false'){
                alert("failure");
            }
        },
        error: function(ts){
           alert(ts.responseText);
        }
    });
   // event.unbind(); //unbind. to stop multiple form submit.
});

});
</script>