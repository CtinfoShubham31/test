<div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Choose Labels</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
      <!-- Modal body -->
        <div class="modal-body">
            <form id="create_intst" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="tag-cloud" id="append_label">
                            <?php
                                if(!empty($user_interests->interests)){

                                    if( strpos($user_interests->interests, ',') !== false ) {
                                        $tagg_results = explode(',', $user_interests->interests);
                                        foreach($tagg_results AS $tgresult){
                                ?>
                                            <li id="tglabel<?php echo $tgresult;?>">
                                                <input name="tagged_labels[]" id="tagged_labels<?php echo $tgresult;?>" value="<?php echo $tgresult;?>" type="hidden">
                                                <a href="javascript:;" style="pointer-events: none;"><?php taggedLabels($tgresult);?></a>
                                                <div class="close-label"><i class="fa fa-times-circle" onclick="removeTaggedLabel(<?php echo $tgresult;?>)"></i></div>
                                            </li>
                                <?php
                                        }
                                    }
                                    else{ 
                                ?>
                                        <li id="tglabel<?php echo $user_interests->interests;?>">
                                            <input name="tagged_labels[]" id="tagged_labels<?php echo $user_interests->interests;?>" value="<?php echo $user_interests->interests;?>" type="hidden">
                                            <a href="javascript:;" style="pointer-events: none;"><?php taggedLabels($user_interests->interests);?></a>
                                            <div class="close-label"><i class="fa fa-times-circle" onclick="removeTaggedLabel(<?php echo $user_interests->interests;?>)"></i></div>
                                        </li>
                                <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Configure the contents </label>
                            <select onchange="select_interests(this.value)" id="tgid" class="chosen-select form-elect edit-input" style="width:100%;" tabindex="4">
                                <option value="">Select Lables</option>
                                <?php labelTree();?>
                            </select>
                            <span id="label_name_error" class="error_msg"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" name="add" value="1">
                    
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" type="submit"> Submit </button>
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


$("#create_intst").on("submit", function(event) {
    //console.log('asasa');
    /* stop form from submitting normally or prevent default action */
    event.preventDefault();
    var form_data = $(this).serialize(); //Encode form elements for submit;
    console.log(form_data);
    $.ajax({
        type: "POST",
        url: "dashboard/user_dashboard/add_interest",
        data: form_data,
       // contentType: "application/json;charset=utf-8",
        dataType: "json",
        success: function(response){
        //alert(response);
            if(response.errors.valid_interest){
                $("#label_name_error").fadeIn().html(response.errors.valid_interest);

                setTimeout(function() {
                        $('#label_name_error').fadeOut("slow");
                }, 3000 );

            }
            else if(response.success == 'true'){

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