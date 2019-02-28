<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="css/chosen.css"/>
<!--<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css"/>-->
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<!--<script type="text/javascript" src="js/jquery.multiselect.js"></script>-->

<div class="modal-dialog">
    <div class="modal-content"> 
      
        <!-- Modal Header -->
<!--        <div class="modal-header">
            <h4 class="modal-title">Advanced Search</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>-->
        <form id="advsh" action="dashboard/user_dashboard/advanced_search" method="post">
        <div class="modal-header custom-modal-head">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <h4 class="modal-title">Advanced Search</h4>
                </div>
                <div class="col-md-5 col-sm-5">
                    <input type="text" class="form-control" name="search_name" value="<?php if(!empty($get_save_search->search_keyword)){ echo $get_save_search->search_keyword; } ?>" id="search_name" placeholder="Name your search to save">
                    <span id="search_name_error" class="error_msg"></span>
                </div>
                <div class="col-md-2 col-sm-2">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>
            
        </div>
        
      <!-- Modal body -->
        <div class="modal-body">
<!--            <form id="advsh" action="dashboard/user_dashboard/advanced_search" method="post">-->
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Tab Type</label>
                        <select class="form-control" name="tab_type" id="tab_type">
                            <option <?php if(!empty($jdata->tab_type) && $jdata->tab_type==1){?>selected="selected"<?php }?> value="1">All Post</option>
                            <option <?php if(!empty($jdata->tab_type) && $jdata->tab_type==2){?>selected="selected"<?php }?> value="2">My Post</option>
                            <option <?php if(!empty($jdata->tab_type) && $jdata->tab_type==3){?>selected="selected"<?php }?> value="3">Followed Post</option>
                            <option <?php if(!empty($jdata->tab_type) && $jdata->tab_type==4){?>selected="selected"<?php }?> value="4">Recently Viewed</option>
                        </select>
                    </div>
                    
<!--                    <div class="col-md-6">
                        <label for="">Search Name</label>
                        <input type="text" class="form-control" name="search_name" value="<?php if(!empty($get_save_search->search_keyword)){ echo $get_save_search->search_keyword; } ?>" id="search_name" placeholder="Search Name">
                        <span id="search_name_error" class="error_msg"></span>
                    </div>-->
                    <div class="clearfix"></div>
                    
                    <hr class="mini-hr">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Primary or Co-Owner</label>
                            <select name="username[]" id="username" data-placeholder="Select users..." class="chosen-select form-elect edit-input" multiple style="width:100%;" tabindex="4">
                                <?php 
                                if(!empty($all_users)){
                                    foreach ($all_users as $ausers) {
                                ?>
                                <option <?php if(!empty($jdata->username[0]) && in_array($ausers->user_id,$jdata->username)) {?>selected="selected"<?php  } ?> value="<?php echo $ausers->user_id;?>"><?php echo $ausers->first_name.' '.$ausers->last_name;?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Post Type</label>
                            <select class="form-control" name="post_type" id="post_type">
                                <option value="">Select post type</option>
                                <option <?php if(!empty($jdata->post_type) && $jdata->post_type==1){?>selected="selected"<?php }?> value="1">List</option>
                                <option <?php if(!empty($jdata->post_type) && $jdata->post_type==2){?>selected="selected"<?php }?> value="2">Text</option>
                                <option <?php if(!empty($jdata->post_type) && $jdata->post_type==3){?>selected="selected"<?php }?> value="3">Graphic</option>
                                <option <?php if(!empty($jdata->post_type) && $jdata->post_type==4){?>selected="selected"<?php }?> value="4">Calendar</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Keyword</label>
                            <input type="text" class="form-control" name="title" value="<?php if(!empty($jdata->title)){ echo $jdata->title; } ?>" id="title" placeholder="Keyword">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <ul class="tag-cloud" id="append_label">
                            <!----Dynamically append tagged----->
                            <?php
                            if(!empty($jdata->labels)){
                                foreach($jdata->labels AS $tgresult){
                            ?>
                                    <li id="tglabel<?php echo $tgresult;?>">
                                        <input name="labels[]" id="tagged_labels<?php echo $tgresult;?>" value="<?php echo $tgresult;?>" type="hidden">
                                        <a href="javascript:;" style="pointer-events: none;"><?php taggedLabels($tgresult);?></a>
                                        <div class="close-label"><i class="fa fa-times-circle" onclick="removeTaggedLabel(<?php echo $tgresult;?>)"></i></div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Label</label>
                            <select name="labelss[]" id="labelss" onchange="select_lables(this.value)" data-placeholder="Select Labels..." class="chosen-select form-elect edit-input" style="width:100%;" tabindex="4">
                                <option value="">Select Labels</option>
                                <?php labelTree();?>
                            </select>
<!--                            <input type="text" class="form-control" name="label" id="labels" placeholder="Label">-->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6">
                        <label for="">Posts Created From</label>
                        <div class="form-group">
                            <input type="text" value="<?php if(!empty($jdata->posts_created_from)){ echo date('m/d/Y', strtotime($jdata->posts_created_from)); } ?>" name="posts_created_from" id="posts_created_from" class="form-control" placeholder="From" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Posts Created To</label>
                            <input type="text" value="<?php if(!empty($jdata->posts_created_to)){ echo date('m/d/Y', strtotime($jdata->posts_created_to)); } ?>" name="posts_created_to" id="posts_created_to" class="form-control" placeholder="To" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Posts Updated From</label>
                            <input type="text" value="<?php if(!empty($jdata->posts_updated_from)){ echo date('m/d/Y', strtotime($jdata->posts_updated_from)) ; } ?>" name="posts_updated_from" id="posts_updated_from" class="form-control" placeholder="From" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Posts Updated To</label>
                            <input type="text" value="<?php if(!empty($jdata->posts_updated_to)){ echo date('m/d/Y', strtotime($jdata->posts_updated_to)); } ?>" name="posts_updated_to" id="posts_updated_to" class="form-control" placeholder="To" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Serial Number From</label>
                            <input type="number" name="serial_from" id="serial_from" value="<?php if(!empty($jdata->serial_from)){ echo $jdata->serial_from; } ?>" class="form-control" placeholder="From" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Serial Number To</label>
                            <input type="number" name="serial_to" id="serial_to" value="<?php if(!empty($jdata->serial_to)){ echo $jdata->serial_to; } ?>" class="form-control" placeholder="To" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="checkbox">
                                <input <?php if(!empty($jdata->attachment) && $jdata->attachment == 'on'){ ?>checked="checked"<?php } ?> name="attachment" id="attachment" type="checkbox">
                                <label for="attachment"> <strong>Attachment </strong></label>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="advsearch" value="1">
                    <input type="hidden" name="save_search_id" value="<?php if(!empty($save_search_id)){?><?php echo $save_search_id; }?>">
                    <input type="hidden" name="save_and_search" id="save_and_search">

                    <div class="clearfix"></div>

                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" type="submit"> 
                            <i class="fa fa-search"></i> Search Now 
                        </button>
                        <button class="btn btn-primary search-btn btn-lg" type="button" onclick="go()"> 
                            <i class="fa fa-search"></i> Save & Search 
                        </button>
                    </div>
                </div>
<!--            </form>-->
        </div>
        </form>
      <!-- Modal footer --> 
      
    </div>
</div>
<script>
function go(){
    search_name = $("#search_name").val();
    if(!search_name){
        //alert('search_name_error');
        $("#search_name_error").fadeIn().html('Please add search name.');

        setTimeout(function() {
                $('#search_name_error').fadeOut("slow");
        }, 3000 );
    }else{
        $("#save_and_search").val(1);
        setTimeout(function() {
            $("#advsh").submit();
        }, 1500 );
    }
}
    
function select_lables(label_id){
    console.log(label_id);
    if(label_id == 'createlab'){
        addLabel();
    }else if(label_id == 'managelab'){
        
    }else{
    
        $.ajax({
            type: "GET",
            url:"post/manage_post/tagged_lables",
            data: {label_id:label_id},
            //dataType: "json",
            success: function(data){
                //console.log(data);
                if(typeof data == "string" && data != 'false'){
                //var str = "L1/L2/L51/";
                    if($("#tagged_labels"+label_id).val() != label_id){
                        str = data.slice('/', -1); // "12345.0"
                        //$("#append_label").append("<li id='tglabel"+label_id+"'><input type='hidden' name='tagged_labels[]' id='tagged_labels"+label_id+"' value='"+label_id+"'><a href='javascript:;' style='pointer-events: none;'>"+str+"</a><div class='close-label'><i class='fa fa-times-circle' onclick='removeTaggedLabel("+label_id+")'></i></div></li>")
                        //alert(str);
                        $("#append_label").append("<li id='tglabel"+label_id+"'><input type='hidden' name='labels[]' id='tagged_labels"+label_id+"' value='"+label_id+"'><a href='javascript:;' style='pointer-events: none;'>"+str+"</a><div class='close-label'><i class='fa fa-times-circle' onclick='removeTaggedLabel("+label_id+")'></i></div></li>")
                    }
                }
            },
            error: function(){
               alert("failure");
            }
        });
    
    }
}
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#posts_created_from').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    }); 
    $('#posts_created_to').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    });
    $('#posts_updated_from').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    });
    $('#posts_updated_to').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    });
    
    $('#labelss').chosen({ search_contains: true });
    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
    
//    $('select[multiple].active.3col').multiselect({
//        columns: 3,
//        placeholder: 'Select Co-Owner',
//        search: true,
//        searchOptions: {
//            'default': 'Search'
//        },
//        selectAll: true
//    });
    
});
</script>