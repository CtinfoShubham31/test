<link href="css/jquery.multiselect.css" rel="stylesheet" />
<script src="js/jquery.multiselect.js"></script>
<div class="modal-dialog">
    <div class="modal-content"> 
      
        <!-- Modal Header -->
        <div class="modal-header">
              <h4 class="modal-title">Create Labels</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
      <!-- Modal body -->
        <div class="modal-body label-body">
            <form method="post" id="new_label">
                <div class="row">
                    <div class="col-md-12">
                        <div class="create-bg">
                            <div class="form-group">
                                <label for="">Create label</label>
                                <input type="text" class="form-control" id="label_name" name="label_name" placeholder="New label name">
                                <span id="label_name_error" class="error_msg"></span>
                                <div class="checkbox">
                                    <input id="nest_check" type="checkbox">
                                    <label for="nest_check"> <strong>Nest Label Under </strong></label>
                                </div>
                            </div>
                            <div class="nest-box">
                                <div class="form-group">
                                    <select class="form-control" id="label_parent_id" name="label_parent_id">
                                        <option value="">Choose label</option>
                                        <?php labelTree();?>
                                   </select>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <input type="hidden" name="add" value="1">

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="checkbox">
                                <input id="inherit_visibility" name="inherit_visibility" type="checkbox" value="1">
                                <label for="inherit_visibility"> 
                                    <strong>Inherit the visibility list from parent to override the current list (optional) </strong>
                                </label>
                            </div>
                         </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Visible to (optional)</label>
                            <select name="visible_to[]" id="visible_to" multiple="multiple" class="3col active">
                                <?php
                                if(!empty($get_userinfo)){
                                    foreach ($get_userinfo as $userdata) {
                                ?>
                                    <option value="<?php echo $userdata->user_id;?>"><?php echo $userdata->first_name.' '.$userdata->last_name;?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" type="submit" id="submitForm"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
      
      <!-- Modal footer --> 
    </div>
</div>


<script>
$(document).ready(function() {
    $('select[multiple].active.3col').multiselect({
        columns: 3,
        placeholder: 'Select Visible To',
        search: true,
        searchOptions: {
            'default': 'Search'
        },
        selectAll: true
    });
    
    $("#new_label").on("submit", function(event) {
        //console.log('asasa');
        /* stop form from submitting normally or prevent default action */
        event.preventDefault();
        var form_data = $(this).serialize(); //Encode form elements for submit;
        $.ajax({
            type: "POST",
            url: "post/manage_post/addlabel",
            data: form_data,
           // contentType: "application/json;charset=utf-8",
            dataType: "json",
            success: function(response){
            //alert(response);
                if(response.errors.valid_label_name){
                    $("#label_name_error").fadeIn().html(response.errors.valid_label_name);
                    
                    setTimeout(function() {
                            $('#label_name_error').fadeOut("slow");
                    }, 3000 );
                    
                    //setTimeout(resetAll,3000);
                    //setInterval(function(){ $("#vehicle_error").html(''); }, 3000);
                    //setTimeout(resetAll,3000);
//                    $('#divErrorMsg').html("Something is going wrong...").hide()
//            .fadeIn(1500, function() { $('#divErrorMsg'); });
                }
                else if(response.success == 'true'){
                    
                    $.ajax({
                        type: "POST",
                        url: "post/manage_post/getlatest_label",
                        success: function(response){
                        
                            if(response){
                                $("#tgid").html(response);
                                $("#tgid").trigger("chosen:updated");
                                $("#tgid").trigger("liszt:updated");
                                //$("#change-height").html('<?php //echo nestedLables();?>');
                                
                                
                                ////////////////////////////////////////////////////
                                $.ajax({
                                    type: "POST",
                                    url: "post/manage_post/refresh_label",
                                    success: function(response){

                                        if(response){
                                            $("#change-height").html(response);

                                        }
                                        else{
                                            alert("failure");
                                        }
                                    },
                                    error: function(ts){
                                       alert(ts.responseText);
                                    }
                                });
                                
                                /////////////////////////////////////////////////
                                
                            }
                            else{
                                alert("failure");
                            }
                        },
                        error: function(ts){
                           alert(ts.responseText);
                        }
                    });
                    
                    
                    $("#add_label").trigger("click");
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
    
    
    
    $("#nest_check").click(function(){
        $(".nest-box").slideToggle();
    });
    
    
});


</script>