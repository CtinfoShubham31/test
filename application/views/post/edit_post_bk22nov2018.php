<section id="post" class="post-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form id="advsh" method="post" enctype="multipart/form-data">   
                    <div class="add-post">
                        <div class="h3-heading">

                        <div class="row">
                            <div class="col-md-8 col-sm-6">
                                <h3>Edit Post</h3>
                            </div>
                            
                            
                            
                            <div class="col-md-4 col-sm-6 pull-right">
                                <span id="ms_timer"></span>
                                <div class="checkbox">
                                     <input id="content_request_status" <?php if(!empty($edit_posts->content_request_status) && $edit_posts->content_request_status == 1){?>checked="checked"<?php  }?> name="content_request_status" type="checkbox" value="1">
                                     <label for="content_request_status"> 
                                         <strong>Content Request </strong>
                                     </label>
                                 </div>
                            </div>
                        </div>

                       </div>

                            <div class="row">

                                <?php 
                                    if($this->session->flashdata('success_msg')){ 
                                ?>            
                                    <div class="alert alert-success" id="fadeout">
                                        <a href="#" class="close" data-dismiss="alert"></a>
                                        <?php echo $this->session->flashdata('success_msg'); ?>
                                    </div>
                                <?php       
                                    }
                                    else if($this->session->flashdata('error_msg')){
                                    ?>
                                        <div class="alert alert-danger" id="fadeout">
                                            <a href="#" class="close" data-dismiss="alert"></a>
                                            <?php echo $this->session->flashdata('error_msg'); ?>
                                        </div>
                                <?php            
                                    }
                                ?>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Post Type</label>
                                        <select id="post_type" name="post_type" class="form-control">
                                            <option value="">Select Post Type</option>
                                            <?php
                                            if(!empty($post_type)){
                                                foreach($post_type AS $ptype){
                                            ?>
                                            <option value="<?php echo $ptype->post_type_id;?>" <?php if(!empty($edit_posts->post_type) && ($edit_posts->post_type == $ptype->post_type_id)){?> selected="selected"<?php }?> <?php echo set_select('post_type',$ptype->post_type_id); ?>><?php echo $ptype->post_type;?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('post_type', '<span class="error_msg">', '</span>'); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="type" name="title" id="title" value="<?php if(!empty($edit_posts->title)){ echo $edit_posts->title; } ?>" class="form-control" placeholder="Title">
                                        <?php //echo form_error('title', '<p class="error_msg">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12">
                                    <ul class="tag-cloud" id="append_label">
                                        <!----Dynamically append tagged----->
                                        <?php
                                        if(!empty($edit_posts->tagged_labels)){

                                            if( strpos($edit_posts->tagged_labels, ',') !== false ) {
                                                $tagg_results = explode(',', $edit_posts->tagged_labels);
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
                                                <li id="tglabel<?php echo $edit_posts->tagged_labels;?>">
                                                    <input name="tagged_labels[]" id="tagged_labels<?php echo $edit_posts->tagged_labels;?>" value="<?php echo $edit_posts->tagged_labels;?>" type="hidden">
                                                    <a href="javascript:;" style="pointer-events: none;"><?php taggedLabels($edit_posts->tagged_labels);?></a>
                                                    <div class="close-label"><i class="fa fa-times-circle" onclick="removeTaggedLabel(<?php echo $edit_posts->tagged_labels;?>)"></i></div>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tag Labels</label>
                                        <select onchange="tagged_lables(this.value)" id="tgid" class="chosen-select form-elect edit-input" style="width:100%;" tabindex="4">
                                            <option value="">Select Lables</option>
                                            <option style="color:#222;font-weight: 600" value="createlab">Create Labels</option>
<!--                                            <option style="color:#222;font-weight: 600" value="managelab">Manage Lables</option>-->
                                            <?php labelTree();?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Short Description</label>
                                        <textarea class="form-control" rows="5" name="short_description" id="short_description" placeholder="Description"><?php if(!empty($edit_posts->short_description)){ echo $edit_posts->short_description; } ?></textarea>
                                        <?php //echo form_error('short_description', '<p class="error_msg">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-md-6" id="post_list_type" style="display:none;">
                                    <div class="form-group">
                                        <label for="">Lists Type</label>
    <!--                                    <select id="list_type" name="list_type" class="form-control" onchange="listTypeMethod(this.value)">-->
                                        <select id="list_type" name="list_type" class="form-control">
                                            <option value="">Select List Type</option>
                                            <option <?php if(!empty($edit_posts->list_type) && ($edit_posts->list_type == 1)){ ?>selected="selected"<?php } ?> value="1" <?php echo set_select('list_type',1); ?>>Make Table By File</option>
                                            <option <?php if(!empty($edit_posts->list_type) && ($edit_posts->list_type == 2)){ ?>selected="selected"<?php } ?> value="2" <?php echo set_select('list_type',2); ?>>Make Table Manually</option>
                                        </select>
                                        <?php //echo form_error('list_type', '<span class="error_msg">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>


                                <div class="col-md-6" id="post_list_file" style="display:none;">
                                    <div class="form-group">
                                        <input class="browse-btn" type="file" name="list" id="list">
                                        <?php echo form_error('list','<span class="error_msg">','</span>'); ?>
                                        <p class="xls-txt small"> Allow only xls, xlsx & csv file.</p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="box" id="table_list">
                                    <div class="clearfix"></div> <hr>

                                    <div class="col-md-12">
                                        <input class="newpost_btn" type="button" onclick="appendColumn()" value="Add Column">
                                        <input class="newpost_btn" type="button" value="Add Row" onclick="appendRow()">
                                        <input class="newpost_btn" type="button" value="Delete Rows" onclick="removeTableMultipleRow(<?php echo $pstid= base64_decode($this->uri->segment(4));?>)">

                                        <input type="hidden" id="list_count" value="1<?php //if(!empty($lists_data)){ echo COUNT($lists_data);}?>">
                                    </div>

                                    <input type="hidden" id="list_count" value="1<?php //if(!empty($lists_data)){ echo COUNT($lists_data);}?>">

                                    <div class="col-md-12">
                                        <div class="table-responsive table-scroll">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
    <!--                                                <tr id="theadrow">-->
                                                    <tr id="theadrow">
                                                        <th><input type="checkbox" value="all" onclick="checkedAll(this)">&nbsp;&nbsp;Remove(#)</th>
                                                        <?php 
                                                        $alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                                                        if(!empty($lists_data[0])){
                                                            //echo COUNT($lists_data[0]);die('QQ');
                                                            for($p = 0;$p <= COUNT($lists_data[0])-1;$p++){
                                                        ?>
                                                        <?php //if(!empty($lists_data[0][$p])){?> <th id="sheet<?php echo $alpha_arr[$p].'1';?>"><?php echo $lists_data[0][$p];?><span onclick="deleteTableCol('<?php echo $alpha_arr[$p];?>','<?php echo $pstid= base64_decode($this->uri->segment(4));?>')"><i class="fa fa-trash table_del" data-original-title="Delete" style="cursor:pointer"></i></span>&nbsp;&nbsp;<span onclick="updateSheetCol('<?php echo $alpha_arr[$p].'1';?>','<?php echo $lists_data[0][$p];?>')"><i class="fa fa-pencil table_edit" data-original-title="Delete" style="cursor:pointer"></i></span></th><?php  //}?>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyrow">
                                                    <?php
                                                    if(!empty($lists_data)){
                                                        //print_r($lists_data);die;

                                                        for($m = 1;$m <= COUNT($lists_data)-1;$m++){
                                                    ?>
                                                        <tr>
                                                            <td><input type="checkbox" value="<?php echo $m+1;?>" class="cked" name="allchk" id="allchk"></td>
                                                    <?php
                                                            for($s = 0; $s <= COUNT($lists_data[$m])-1; $s++){
                                                    ?>
                                                            <?php if(!empty($lists_data[$m][$s])){?> <td id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>" onclick="updateSheet('<?php echo $alpha_arr[$s].''.($m+1);?>')"><?php echo $lists_data[$m][$s];?></td><?php  }else{?><td onclick="updateSheet('<?php echo $alpha_arr[$s].''.($m+1);?>')" cell="<?php echo $alpha_arr[$s].''.($m+1);?>" id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>"></td><?php }?>
                                                    <?php
                                                            }
                                                    ?> 
                                                        </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                                <div class="text box" id="text_box_info">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="20" name="detail_description" id="detail_description" placeholder="Text Editor"><?php if(!empty($edit_posts->detail_description)){ echo $edit_posts->detail_description; } ?></textarea>
                                            <?php //echo form_error('detail_description', '<p class="error_msg">', '</p>'); ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div> <!-- text box -->

                                <div class="graphic box">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Upload Image<span class="instruction">(Use CTRL key for multiple selections)</span></label>
    <!--                                        <form enctype="multipart/form-data">
                                                <input id="file-fr" name="file-fr[]" type="file" multiple>
                                            </form>-->
                                                <input id="file-fr" name="graphics[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
                                        </div>
                                    </div>
                                    <?php echo form_error('graphics[]','<span class="error_msg">','</span>'); ?>
                                    <div class="clearfix"></div>


                                </div> <!-- graphic box -->


                                <div class="calendar box">


                                    <div class="col-md-12">
                                      <div class="form-group" id="calendar">
    <!--                                          <h4 class="drg-event-title"> Draggable Events</h4>
                                              <div id='external-events'>
                                                  <div class='external-event label label-primary'>My Event 1</div>
                                                  <div class='external-event label label-success'>My Event 2</div>
                                                  <div class='external-event label label-info'>My Event 3</div>
                                                  <div class='external-event label label-inverse'>My Event 4</div>
                                                  <div class='external-event label label-warning'>My Event 5</div>
                                                  <div class='external-event label label-danger'>My Event 6</div>
                                                  <div class='external-event label label-default'>My Event 7</div>
                                                  <div class='external-event label label-primary'>My Event 8</div>
                                                  <div class='external-event label label-info'>My Event 9</div>
                                                  <div class='external-event label label-success'>My Event 10</div>
                                              </div>-->

                                      </div>
                                    </div>

    <!--                                <div class="col-md-12">
                                        <div class="form-group">
                                            <div id="calendar" class="has-toolbar"></div>
                                        </div>
                                    </div>-->
                                    <div class="clearfix"></div>

                                </div> <!-- calendar box -->


                                <div class="timeline box">
                                    <div class="col-md-12"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Attachment <span class="instruction">(Use CTRL key for multiple selections)</span></label>
    <!--                                    <form enctype="multipart/form-data">-->
                                            <div class="form-group">
                                                <input id="file-5" name="attachment[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
                                            </div>
    <!--                                    </form>-->
                                    </div>
                                </div>
                                <?php echo form_error('attachment[]','<span class="error_msg">','</span>'); ?>
                            </div> 
                            <div class="clearfix"></div> 

                    </div>                

                    
                    <?php
            /*************This section, Only can access by post creator (START)*******************/
                        if(!empty($edit_posts->post_creator_id) && $edit_posts->post_creator_id == $this->session->userdata('kaseidon_user_id')){ 
                    ?>
                    <div class="add-post">  
                        <div class="col-md-12">
                            <ul class="tag-cloud" id="append_cown">
                                <!----Dynamically append tagged----->
                                <?php 
                                if(!empty($select_co_owners)){
                                    $commaseparated_visibility = explode(',',$edit_posts->co_owners);
                                    foreach ($select_co_owners as $codata) {
                                        if(!empty($commaseparated_visibility) && in_array($codata->user_id,$commaseparated_visibility)) { ?>
                                        <li id="cowner<?php echo $codata->user_id;?>"><a href="javascript:;" style="pointer-events: none;"><?php echo $codata->first_name.' '.$codata->last_name;?></a></li>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group" id="cown_data">
                                <label for="">Co-owner</label>
<!--                                    <select name="co_owner[]" id="co_owner" data-placeholder="Select Co-owner..." class="chosen-select form-elect edit-input" multiple style="width:100%;" tabindex="4">-->
                                <select name="co_owner[]" id="co_owner" data-placeholder="Select Co-owner..." class="3col active cow form-elect edit-input" multiple style="width:100%;" tabindex="4">
                                <?php 
                                if(!empty($select_co_owners)){
                                    foreach ($select_co_owners as $codata) {
                                        $commaseparated_co_owner = explode(',',$edit_posts->co_owners);
                                ?>
                                    <option <?php if(!empty($commaseparated_co_owner) && in_array($codata->user_id,$commaseparated_co_owner)) {?>selected="selected"<?php  } ?> value="<?php echo $codata->user_id;?>"><?php echo $codata->first_name.' '.$codata->last_name;?></option>
                                <?php
                                    }
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        
                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Transfer the ownership of the post to</label>
                                <select id="transfer_post" name="transfer_post" class="form-control">
                                    <option value="">Select User</option>
                                    <?php 
                                    if(!empty($user_tranfer_posts)){
                                        foreach($user_tranfer_posts As $utp){
                                    ?>
                                    <option value="<?php echo $utp->user_id?>"><?php echo $utp->first_name.' '.$utp->last_name;?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <?php //echo form_error('list_type', '<span class="error_msg">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                    </div>

                    <div class="add-post">   
                        <div class="col-md-12">
                            <ul class="tag-cloud" id="append_visib">
                            <!----Dynamically append tagged----->
                            <?php 
                            if(!empty($visibility_setting)){
                                $commaseparated_visibility = explode(',',$edit_posts->visibility);
                                foreach ($visibility_setting as $visible) {
                                    if(!empty($commaseparated_visibility) && in_array($visible->user_id,$commaseparated_visibility)) { ?>
                                    <li id="visib<?php echo $visible->user_id;?>"><a href="javascript:;" style="pointer-events: none;"><?php echo $visible->first_name.' '.$visible->last_name;?></a></li>
                            <?php
                                    }
                                }
                            }
                            ?>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group" id="visib_data">
                               <label for="">Visibilty</label>
                                
<!--                                    <select name="co_owner[]" id="co_owner" data-placeholder="Select Co-owner..." class="chosen-select form-elect edit-input" multiple style="width:100%;" tabindex="4">-->
                                <select name="visibility[]" id="visibility" data-placeholder="Select users who can view the post" class="3col active visb form-elect edit-input" multiple style="width:100%;" tabindex="4">
                                   <?php 
                                   if(!empty($visibility_setting)){
                                       $commaseparated_visibility = explode(',',$edit_posts->visibility);
                                       foreach ($visibility_setting as $visible) {
                                   ?>
                                   <option <?php if(!empty($commaseparated_visibility) && in_array($visible->user_id,$commaseparated_visibility)) {?>selected="selected"<?php  } ?> value="<?php echo $visible->user_id;?>"><?php echo $visible->first_name.' '.$visible->last_name;?></option>
                                   <?php
                                       }
                                   }
                                   ?>

                                </select>
                            </div>   
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="col-md-6"> 
                            <div class="checkbox">
                                <input id="publish_post" <?php if(!empty($edit_posts->publish) && ($edit_posts->publish == 1)){ ?>checked="checked"<?php } ?> name="publish_post" value="1" type="checkbox">
                                <label for="publish_post"> 
                                   Only visible to myself
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    
                    <?php
                    }
                    /*************This section, Only can access by post creator (END)*******************/
                    ?>
                    
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" type="submit"> Submit </button>
                        <a href="dashboard/user_dashboard/all_posts" class="btn newpost_btn btn-lg">Cancel</a>
                    </div>
                </form>
            </div>
                
        </div>
    </div>
</section>

<div class="modal fade" id="add_label">
    
</div>

<!-- Modal -->
<div class="modal fade" id="getCodeModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content mini-modal">
            <div class="modal-header">
                <h4 class="modal-title">Post Status</h4>
<!--                <button type="button" class="close" data-dismiss="modal">×</button>-->
            </div>
            <div class="modal-body">
                <div class="col-md-6 text-center">
                    <button class="btn btn-primary search-btn btn-lg" type="button" onclick="saveAndQuit()"> 
                        Save & Quit
                    </button>
                </div>
                <div class="col-md-6 text-center">
                    <button class="btn btn-primary search-btn btn-lg" type="button" onclick="resetTimer()"> 
                        Reset the timer 
                    </button>
                 </div>       
            </div>
        </div>
    
    </div>
      
</div>




<!--<div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content"> 
      
       Modal Header 
        <div class="modal-header">
            <h4 class="modal-title">Choose Labels</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
       Modal body 
        <div class="modal-body">
            <form id="create_intst" method="post">
                <div class="row">
                    
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
      
       Modal footer  
    </div>
</div>-->




<!--<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>-->
<script type="text/javascript" src="js/fileinput.js"></script>




<!-- img upload -->
<script type="text/javascript">
    loadtime(20);
    function loadtime(mintime){
        $('#ms_timer').countdowntimer({
            minutes :mintime,
            seconds : 2,
            size : "lg",
            timeUp : timeisUp
        });
    }
    
    
    function timeisUp() {
        $("#getCodeModal").modal('show');
    }
    
    function resetTimer(){
        loadtime(20);
        $('#getCodeModal').modal('hide');
    }
    
    function saveAndQuit(){
        $("#advsh").submit();
    }
        // Jquery draggable
//        $('.modal-dialog').draggable({
//            handle: ".modal-header"
//        });
    
function tagged_lables(label_id){
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
                if(typeof data == "string" && data != 'false'){
                //var str = "L1/L2/L51/";
                    if($("#tagged_labels"+label_id).val() != label_id){
                        str = data.slice('/', -1); // "12345.0"
                        $("#append_label").append("<li id='tglabel"+label_id+"'><input type='hidden' name='tagged_labels[]' id='tagged_labels"+label_id+"' value='"+label_id+"'><a href='javascript:;' style='pointer-events: none;'>"+str+"</a><div class='close-label'><i class='fa fa-times-circle' onclick='removeTaggedLabel("+label_id+")'></i></div></li>")
                        //alert(str);
                    }
                }
            },
            error: function(){
               alert("failure");
            }
        });
    
    }
}

function removeTaggedLabel(label_id){
    $("#tglabel"+label_id).remove();
}

function removeCowner(u_id){
    $("#cowner"+u_id).remove();
    $("#cown_data #ms-opt-"+u_id).prop("checked", false);
}

function removeVisib(u_id){
    $("#visib"+u_id).remove();
    $("#visib_data #ms-opt-"+u_id).prop("checked", false);
}

function addLabel(){
    $.ajax({
        type: "POST",
        url:"post/manage_post/addlabel",
        data: {popup:1},
        success: function(data){
            $("#add_label").html(data);
            $("#add_label").modal('show');
        },
        error: function(){
           alert("failure");
        }
    });
}

    function deleteGraphics(post_graphic_id,post_id){
        var check = confirm("Are you sure you want to delete your added graphics?");
        if (check == true) {
            $.ajax({
                type: "POST",
                url:"post/manage_post/delete_graphics",
                data: {post_graphic_id:post_graphic_id,post_id:post_id},
                success: function(response){
                    if(response == 'true'){
                        $("#graphid"+post_graphic_id).parents('.file-preview-frame').remove();
                    }else{
                        alert("Something went wrong, please try again.");
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
            return true;
        }
        else {
            return false;
        }
    }
    //Graphics
    var json_data_graphics = JSON.parse('<?php echo json_encode($post_graphic) ?>');
    console.log(json_data_graphics.length+'qq');
    console.log(JSON.stringify(json_data_graphics)+'ss');
    var atth_graph = new Array();
    var atth_filename_graph = new Array();
    var atth_url_graph = new Array();
    for(b = 0; b<=json_data_graphics.length-1; b++){
        atth_graph[b] = '<img src="upload/graphics/'+json_data_graphics[b].graphic+'" id="graphid'+json_data_graphics[b].post_graphic_id+'" class="file-preview-image-new"><div><div class="file-actions-new"><div><button type="button" onclick="deleteGraphics(\''+json_data_graphics[b].post_graphic_id+'\',\''+json_data_graphics[b].post_id+'\')" class=" btn btn-xs bttn-delete" title="Remove file"><i class="glyphicon glyphicon-trash text-danger"></i></button></div><div class="clearfix"></div></div></div>';
        atth_filename_graph[b] = ''+json_data_graphics[b].graphic+'';
        console.log(json_data_graphics[b].graphic);
        //atth_url['url'] = ''+json_data[a].post_attachment_id+'';
        atth_url_graph.push({ url: 'post/manage_post/delete_graphics',key: ''+json_data_graphics[b].post_graphic_id+''});

    }
    $('#file-fr').fileinput({
        initialPreview: atth_graph,
        //initialPreviewAsData: true,
        deleteUrl: "/site/file-delete",
        //initialPreviewConfig: atth_url,
        overwriteInitial: false,
        allowedFileExtensions: ["jpg", "jpeg", "png"],
    });
    
    
    function deleteAttachment(post_attachment_id,post_id){
        var check = confirm("Are you sure you want to delete your added attachment?");
        if (check == true) {
            $.ajax({
                type: "POST",
                url:"post/manage_post/delete_attachment",
                data: {post_attachment_id:post_attachment_id,post_id:post_id},
                success: function(response){
                    if(response == 'true'){
                        $("#atthmid"+post_attachment_id).parents('.file-preview-frame').remove();
                    }else{
                        alert("Something went wrong, please try again.");
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
            return true;
        }
        else {
            return false;
        }
    }
    
    //Attachment
    var json_data = JSON.parse('<?php echo json_encode($post_attach) ?>');
    console.log(json_data.length+'pp');
    console.log(JSON.stringify(json_data)+'rr');
    var atth = new Array();
    var atth_filename = new Array();
    var atth_url = new Array();
    for(a = 0; a<=json_data.length-1; a++){
        atth[a] = '<img src="upload/attachment/'+json_data[a].attachment+'" id="atthmid'+json_data[a].post_attachment_id+'" class="file-preview-image-new"><div><div class="file-actions-new"><div><button type="button" onclick="deleteAttachment(\''+json_data[a].post_attachment_id+'\',\''+json_data[a].post_id+'\')" class=" btn btn-xs bttn-delete" title="Remove file"><i class="glyphicon glyphicon-trash text-danger"></i></button></div><div class="clearfix"></div></div></div>';
        atth_filename[a] = ''+json_data[a].attachment+'';
        console.log(json_data[a].attachment);
        //atth_url['url'] = ''+json_data[a].post_attachment_id+'';
        atth_url.push({ url: 'post/manage_post/delete_attachment',key: ''+json_data[a].post_attachment_id+''});

    }
    
    $("#file-5").fileinput({
        //initialPreview: ['<img src="upload/attachment/nodejs_concepts.jpg" class="file-preview-image">','<img src="upload/attachment/NODEJS_ASYNC_(1).png" class="file-preview-image">','<img src="upload/attachment/nodejs-new-pantone-black.png" class="file-preview-image">'],
        initialPreview: atth,
        initialPreviewAsData: true,
        deleteUrl: "/site/file-delete",
        //initialPreviewConfig: atth_url,
        overwriteInitial: false,

//            initialPreviewConfig: [
//            {
//                caption: 'desert.jpg',
//                width: '120px',
//                url: '/localhost/avatar/delete',
//                key: 100,
//                extra: {id: 100}
//            },
//            {
//                caption: 'jellyfish.jpg', 
//                width: '120px', 
//                url: '/localhost/avatar/delete', 
//                key: 101, 
//                frameClass: 'my-custom-frame-css',
//                frameAttr: {
//                    style: 'height:80px',
//                    title: 'My Custom Title',
//                },
//                extra: function() { 
//                    return {id: $("#id").val()};
//                },
//            }
//        ]
        //allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
    });

</script>

<script type="text/javascript">
$(document).ready(function(){
    
    setInterval(function() {
        $.ajax({
            type: "POST",
            url:"post/manage_post/addtimestatus_editpost",
            data: {post_id:<?php echo $pid = base64_decode($this->uri->segment(4))?>},
            success: function(data){
            },
            error: function(){
               //alert("failure");
            }
        });
    }, 5000); // milliseconds
    
    $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){ console.log('ttttt');
            $("#content_quiz").slideToggle();
        }
        else if($(this).prop("checked") == false){   console.log('fffff');
            $("#content_quiz").slideToggle();
        }
    });
    
    $('select[multiple].active.3col.cow').multiselect({
        columns: 3,
        placeholder: 'Select Co-Owner',
        search: true,
        searchOptions: {
            'default': 'Search'
        },
        selectAll: true
    });
    
    $('select[multiple].active.3col.visb').multiselect({
        columns: 3,
        placeholder: 'Select users who can view the post',
        search: true,
        searchOptions: {
            'default': 'Search'
        },
        selectAll: true
    });
    
    /**********CO-OWNER SELECTION(START)**************/
    $('#cown_data .ms-options li input').on("click",function(e){
        if ($(this).is(':checked')) {
            console.log("is checked"+this.title);
            $("#append_cown").append("<li id='cowner"+this.value+"'><a href='javascript:;' style='pointer-events: none;'>"+this.title+"</a></li>")
            $("#cown_data div button span").html(this.title+',');            
        }else if (!$(this).is(':checked')) {
            removeCowner(this.value);
        }
        
    });
    
    $('#cown_data .ms-options .ms-selectall').on("click",function(e){
        click_type = $(this).html();
        //console.log(click_type);
        if(click_type == "Select all"){
            $.ajax({
                type: "POST",
                url:"post/manage_post/get_userscown",
                success: function(data){
                    if(data){
                        $("#append_cown").html(data);
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
        }
        else if(click_type == "Unselect all"){
            $("#append_cown").html('');
        }
    });
    /**********CO-OWNER SELECTION(END)**************/
    
    /**********VISIBILTY SELECTION(START)**************/
    $('#visib_data .ms-options li input').on("click",function(e){
        if ($(this).is(':checked')) {
            console.log("is checked"+this.title);
            $("#append_visib").append("<li id='visib"+this.value+"'><a href='javascript:;' style='pointer-events: none;'>"+this.title+"</a></li>")
            $("#visib_data div button span").html(this.title+',');            
        }else if (!$(this).is(':checked')) {
            removeVisib(this.value);
        }
        
    });
    
    $('#visib_data .ms-options .ms-selectall').on("click",function(e){
        click_type = $(this).html();
        //console.log(click_type);
        if(click_type == "Select all"){
            $.ajax({
                type: "POST",
                url:"post/manage_post/get_usersvisib",
                success: function(data){
                    if(data){
                        $("#append_visib").html(data);
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
        }
        else if(click_type == "Unselect all"){
            $("#append_visib").html('');
        }
    });
    /**********VISIBILTY SELECTION(END)**************/
    
    
////////////////////CALENDAR START/////////////////////////////////////////////
    
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'listYear,month,agendaWeek,agendaDay'
        },
        //events: 'post/manage_post/getcalendar_post',        //LOAD
        events: {
            url: 'post/manage_post/getcalendar_post',
            data: function () { // a function that returns an object
                return {
                    post_id: <?php echo $pstid = base64_decode($this->uri->segment(4));?>,
                    ctype:1,
                };

            }
        },
        titleRangeSeparator:'-',
        displayEventTime: false,
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay)            //INSERT
        {
            var title = prompt("Enter Event Title");
            //$("#event_add").modal('show');
            if(title)
            {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url:"post/manage_post/addcalendar_event",
                    type:"POST",
                    data:{title:title, start:start, end:end, post_id:<?php echo $pstid = base64_decode($this->uri->segment(4));?>},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        //$("#getCode").html('Added Successfully');
                        //$("#getCodeModal").modal('show');
                        //alert("Added Successfully");
                    }
                })
            }
        },
        editable:true,
        eventResize:function(event)         //UPDATE
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"post/manage_post/updatecalendar_event",
                type:"POST",
                data:{title:title, start:start, end:end, id:id, post_id:<?php echo $pstid = base64_decode($this->uri->segment(4));?>},
                success:function(){
                    calendar.fullCalendar('refetchEvents');
                    //$("#getCode").html('Event Update');
                    //$("#getCodeModal").modal('show');
                    //alert('Event Update');
                }
            })
        },

        eventDrop:function(event)       //UPDATE
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"post/manage_post/updatecalendar_event",
                type:"POST",
                data:{title:title, start:start, end:end, id:id, post_id:<?php echo $pstid = base64_decode($this->uri->segment(4));?>},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    //$("#getCode").html('Event Updated');
                    //$("#getCodeModal").modal('show');
                    //alert("Event Updated");
                }
            });
        },

        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"post/manage_post/deletecalendar_event",
                    type:"POST",
                    data:{id:id},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        //$("#getCode").html('Event Removed');
                        //$("#getCodeModal").modal('show');
                        //alert("Event Removed");
                    }
                })
            }
        },

   });
   
    $(window).on('load', function() {
        $('#calendar').fullCalendar('render');
    });
    $('#post_type').change(function(){
       
        $('#calendar').fullCalendar("render");
    });
   
//   $("body").delegate(".fc-month-button", "click", function() {
//    // ...
//});
////////////////////CALENDAR END/////////////////////////////////////////////
    
    $(document).on("keypress", "input", function(e){
    //$(document).on("blur", "input", function(e){
        if(e.which == 13){
            //console.log("You've entered: ");
            //return false;
            var cell_val = $(this).val();
            var sheet_cell = $(this).attr("cell");
            var cell_id = $(this).attr("id");
            if(sheet_cell){
                $.ajax({
                    type: "POST",
                    url:"post/manage_post/update_sheet",
                    data: {cell_val:cell_val,sheet_cell:sheet_cell,post_id:<?php echo $pid = base64_decode($this->uri->segment(4))?>},
                    //data: {cell_val:cell_val},
                    success: function(response){
                        if(response){
                            $("#example").html(response);
                        }
                    },
                    error: function(){
                       alert("failure");
                    }
                });
                return false;
            }
        }
    });
    
    $("#post_type").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            //var optionValue = $(this).attr("ptype");
            console.log(optionValue);
            if(optionValue){
                if(optionValue == 1){
                    $("#post_list_type").show();
                }else{
                    $("#post_list_type").hide();
                }
                if(optionValue == 2){
                    $("#text_box_info").show();
                }else{
                    $("#text_box_info").hide();
                }
                if(optionValue == 3){
                    $(".graphic").show();
                }else{
                    $(".graphic").hide();
                }
                if(optionValue == 4){
                    $(".calendar").show();
                }else{
                    $(".calendar").hide();
                }
                
                if(optionValue == 5){
                    
                    /////////////////////////////////////////////////////////////////////
                    var schedulerDataSource = new DevExpress.data.DataSource({

                        paginate: false,
                        load: function(loadOptions) {
                            var d = $.Deferred(),
                            params = {};
                            if("filter" in loadOptions && isNotEmpty(loadOptions["filter"])) 
                                params[i] = JSON.stringify(loadOptions[i]);       
                            return data;
                        },
                        insert: function(values) {
                            console.log(values);
                            return  $.ajax({
                                url: "post/manage_post/add_timeplanner/<?php echo $pstid= base64_decode($this->uri->segment(4));?>",
                                method: "POST",
                                data: values,
                                success: function(result) {         
                                    console.log(result);                
                                    var startDayHour = 24,
                                    endDayHour = 0;
                                    data.forEach(function(item) {
                                      // Start
                                        console.log(item);
                                        if (item.startDate.getHours() < startDayHour) {
                                          startDayHour = item.startDate.getHours();
                                        }
                                        // End
                                        if (item.endDate.getHours() >= endDayHour) {
                                          endDayHour = item.endDate.getMinutes() > 0
                                            ? item.endDate.getHours() + 1
                                            : item.endDate.getHours();
                                        }
                                    });
                                    console.log(startDayHour, endDayHour);
                                    
                                    var scheduler = $("#scheduler").dxScheduler("instance").option({
                                        dataSource: schedulerDataSource,
                                        startDayHour: startDayHour,
                                      /*  remoteFiltering: true,*/
                                        endDayHour: endDayHour,
                                        groups: ["priority"],
                                        resources: [       
                                            {
                                              fieldExpr: "priority",
                                              allowMultiple: false,
                                              dataSource: priorityData,
                                              label: "Module name"
                                            }
                                        ]
                                    });  
                                    
                                    var my=[];
                                    var da = [];
                                    var result =  $.parseJSON(result); 
                                    //alert(result);
                                    $.each(result, function(key, val) {
                                      var arr = {   
                                          'id': val.id, 
                                          'text' : val.text,
                                          'startDate' :new Date(val.startDate),
                                          'endDate' : new Date(val.endDate),
                                          'priority' : parseInt(val.priority) ,
                                          'description' : val.description,

                                        }      
                                        my.push(arr);                
                                    }); 
                                    data = my;  
                                    console.log(data);  
                                },                    
                            })

                        },
                        remove: function(key) {        
                            console.log(key);
                            return $.ajax({
                                url: "post/manage_post/delete_timeplanner",
                                method: "POST",
                                data:key,
                                success: function( result) {               
                                    console.log(result); 
                                    var startDayHour = 24,
                                    endDayHour = 0;
                                    data.forEach(function(item) {
                                      // Start
                                        console.log(item);
                                        if (item.startDate.getHours() < startDayHour) {
                                          startDayHour = item.startDate.getHours();
                                        }
                                        // End
                                        if (item.endDate.getHours() >= endDayHour) {
                                          endDayHour = item.endDate.getMinutes() > 0
                                            ? item.endDate.getHours() + 1
                                            : item.endDate.getHours();
                                        }
                                    });
                                    console.log(startDayHour, endDayHour);
                                    var scheduler = $("#scheduler").dxScheduler("instance").option({
                                        dataSource: schedulerDataSource,
                                        startDayHour: startDayHour,
                                        /*  remoteFiltering: true,*/
                                        endDayHour: endDayHour,
                                        groups: ["priority"],
                                        resources: [       
                                          {
                                            fieldExpr: "priority",
                                            allowMultiple: false,
                                            dataSource: priorityData,
                                            label: "Module name"
                                          }
                                        ]
                                    });          
                                    var my=[];
                                    var da = [];
                                    var result =  $.parseJSON(result); 
                                    $.each(result, function(key, val) {
                                        var arr = {   
                                            'id': val.id, 
                                            'text' : val.text,
                                            'startDate' :new Date(val.startDate),
                                            'endDate' : new Date(val.endDate),
                                            'priority' : parseInt(val.priority) ,
                                            'description' : val.description,

                                        }      
                                        my.push(arr);                
                                    }); 
                                    console.log(my);                  
                                    data = my;             
                                },                    
                            })
                        },
                        
                        update: function(key, values) { 
                            return $.ajax({
                                url: "post/manage_post/update_timeplanner",
                                method: "POST",
                                data: values,
                                success: function( result) {             
                                    console.log(result); 
                                    var startDayHour = 24,
                                    endDayHour = 0;
                                    data.forEach(function(item) {
                                      // Start
                                        console.log(item);
                                        if (item.startDate.getHours() < startDayHour) {
                                          startDayHour = item.startDate.getHours();
                                        }
                                        // End
                                        if (item.endDate.getHours() >= endDayHour) {
                                          endDayHour = item.endDate.getMinutes() > 0
                                            ? item.endDate.getHours() + 1
                                            : item.endDate.getHours();
                                        }
                                    });
                                    console.log(startDayHour, endDayHour);
                                    var scheduler = $("#scheduler").dxScheduler("instance").option({
                                        dataSource: schedulerDataSource,
                                        startDayHour: startDayHour,
                                      /*  remoteFiltering: true,*/
                                        endDayHour: endDayHour,
                                        groups: ["priority"],
                                        resources: [       
                                            {
                                                fieldExpr: "priority",
                                                allowMultiple: false,
                                                dataSource: priorityData,
                                                label: "Module name"
                                            }
                                        ]
                                    });            
                                    var my=[];
                                    var da = [];
                                    var result =  $.parseJSON(result); 
                                    $.each(result, function(key, val) {
                                      var arr = {   
                                          'id': val.id, 
                                          'text' : val.text,
                                          'startDate' :new Date(val.startDate),
                                          'endDate' : new Date(val.endDate),
                                          'priority' : parseInt(val.priority) ,
                                          'description' : val.description,

                                        }      
                                          my.push(arr);                
                                    }); 
                                    console.log(my);               
                                    data = my;             
                                },            
                            })
                        }
                    });
                    
                    
                
                    $("#scheduler").dxScheduler({         
                        //views: ["timelineDay", "timelineWeek", "timelineMonth"],
                        views: ["timelineWeek"],
                        currentView: "timelineWeek",
                        currentDate: new Date(),
                        firstDayOfWeek: 0,
                        startDayHour: 8,
                        endDayHour: 20,
                        cellDuration: 60,
                        width: "100%",
                        height: 580
                    });

                    setTimeout(function() {
                        // Computing start and end hour
                        var startDayHour = 24,
                        endDayHour = 0;
                        data.forEach(function(item) {
                            // Start
                            console.log(item);
                            if (item.startDate.getHours() < startDayHour) {
                              startDayHour = item.startDate.getHours();
                            }
                            // End
                            if (item.endDate.getHours() >= endDayHour) {
                              endDayHour = item.endDate.getMinutes() > 0
                                ? item.endDate.getHours() + 1
                                : item.endDate.getHours();
                            }
                        });

                        console.log(startDayHour, endDayHour);
                        var scheduler = $("#scheduler").dxScheduler("instance").option({
                            dataSource: schedulerDataSource,
                            startDayHour: startDayHour,
                          /*  remoteFiltering: true,*/
                            endDayHour: endDayHour,
                            groups: ["priority"],
                            resources: [       
                                {
                                  fieldExpr: "priority",
                                  allowMultiple: false,
                                  dataSource: priorityData,
                                  label: "Module name"
                                }
                            ]
                        });
                        
                        setTimeout(function() {
                          console.log("Repainting");
                          $("#scheduler").dxScheduler("instance").repaint();
                        }, 500);
                  }, 500);
                  
               
                    var priorityData = <?php
                    echo $item;
                    ?>;
                    var data = <?php
                    echo $data;
                    ?>;
                    var da = [];
                    var myarray=[];
                    $.each(data, function(key, val) {
                      var arr = {   
                          'id': val.id, 
                          'text' : val.text,
                          'startDate' :new Date(val.startDate),
                          'endDate' : new Date(val.endDate),
                          'priority' : parseInt(val.priority) ,
                          'description' : val.description,

                        }      
                          myarray.push(arr);                
                    });   
                    data = myarray;
                    console.log(data);  
                    
                    
                    /////////////////////////////////////////////////////////////////////
                    $("#scheduler").show();
                }
                else{
                    $("#scheduler").hide();
                }
                
                //$(".box").not("." + optionValue).hide();
                //$("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
    
    $("#list_type").change(function(){
        $(this).find("option:selected").each(function(){
            var opValue = $(this).attr("value");
            //var optionValue = $(this).attr("ptype");
            //alert(optionValue);
            console.log(opValue);
            if(opValue){
                if(opValue == 1){
                    $("#post_list_file").show();
                    //$("#table_list").hide();
                    $("#table_list").show();  
                }else if(opValue == 2){
                    $("#post_list_file").show();
                    $("#table_list").hide();
                    $("#post_list_file").hide();
                    $("#table_list").show();  
                }
                
            }
            else{
                $("#post_list_file").hide();
                $("#table_list").hide();
            }
        });
    }).change();

//////////////////////Ckeditor Start///////////////////////////////////////////////////////////////
    var myToolbar = [
        ['Bold'],
        ['Styles'],
        ['Table']
    ];                                    

    // 2. Create a config var to hold your toolbar
    var config =
    {
//        toolbar_mySimpleToolbar: myToolbar,
//        toolbar: 'mySimpleToolbar'       
        filebrowserUploadUrl: "<?php echo base_url();?>post/manage_post/uploadimg_fromtext" 
    };
    config.removeDialogTabs = 'image:advanced;image:Link';
    config.removePlugins = 'about';
    config.linkShowAdvancedTab = false;
    config.linkShowTargetTab = false;

    // 3. change the textarea into an editor using your config and toolbar
    $('#detail_description').ckeditor(config);
    
///////////////////////Ckeditor End///////////////////////////////////////////////////////////////////    
    $("#nest_check").click(function(){
        $(".nest-box").slideToggle();
    });
    
    //$('#example').DataTable();
    
    $('[data-toggle="tooltip"]').tooltip();  
    $('#tgid').chosen({ search_contains: true });
    
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
    
    /*Show table after upload xls sheet*/
    $('#list').change(function(){
        var file_data = $('#list').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.ajax({
            url: "post/manage_post/upload_xlsx",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                if(data){
                    $("#example").html(data);
                    $("#table_list").show();
                    
                }
                //console.log(data);
            }
        });
    });
    
});


function updateSheetCol(sheet_cell,val){
    $("#sheet"+sheet_cell).html('<input type="text" cell="'+sheet_cell+'" id="sheet'+sheet_cell+'" value="'+val+'">');
    $("#sheet"+sheet_cell+" > input").focus();
}

function updateSheet(sheet_cell){
    tdval = $("#sheet"+sheet_cell).html();
    $("#sheet"+sheet_cell).removeAttr("onclick");
    $("#sheet"+sheet_cell).html('<input type="text" cell="'+sheet_cell+'" id="sheet'+sheet_cell+'" value="'+tdval+'">');
    $("#sheet"+sheet_cell+" > input").focus();
}

x = 0;
function appendColumn(){
    var alpha_arr = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    //x++;
    //g = parseInt(x)+parseInt(1);
    k = $('th').length;
    if(k){
        x = k-1;
    }
    console.log(x);
    upsheet_id = '\''+alpha_arr[x]+'1\''; 
    //onclick="updateSheet('+upsheet_id+')"
    console.log(upsheet_id);
    $('#theadrow').append('<th id="sheet'+alpha_arr[x]+'1"><input type="text" cell="'+alpha_arr[x]+'1" id="sheet'+alpha_arr[x]+'1" value=""></th>');
    //$('#theadrow').append('<th id="sheet'+alpha_arr[x]+'"><input type="text" cell="'+alpha_arr[x]+'" id="sheet'+alpha_arr[x]+'" value=""></th>');
    x++;
}

function appendRow(){
    var alpha_arr = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    thcount = $('th').length;
    list_tot = parseInt($('#tbodyrow tr').length)+parseInt("1");
    console.log(thcount);
    td_result='';
    
    for(j=1;j<=thcount;j++){
        if(j==1){
            k = j+1;
            //td_result += '<td><i class="fa fa-trash" data-original-title="Delete" style="cursor:pointer"></i></td>';
            td_result += '<td><input type="checkbox" value="'+k+'" class="cked" name="allchk" id="allchk"></td>';
        }else{
            td_result += '<td id="sheet'+alpha_arr[j-2]+(list_tot+1)+'"><input cell="'+alpha_arr[j-2]+''+(list_tot+1)+'" id="sheet'+alpha_arr[j-2]+(list_tot+1)+'" value="" type="text">';
        }
    }
    console.log(td_result);
    $('#tbodyrow').append('<tr>'+td_result+'</tr>');
}


//function removeTableRow(post_id,tr_id){
//    var check = confirm("Are you sure you want to delete this table row?");
//    if (check == true) {
//        $.ajax({
//            type: "POST",
//            url:"post/manage_post/remove_trow",
//            data: {post_id:post_id,tr_id:tr_id},
//            success: function(response){
//                if(response){
//                    $("#example").html(response);
//                }
//            },
//            error: function(){
//               alert("failure");
//            }
//        });
//        return true;
//    }
//    else {
//        return false;
//    }
//}

function removeTableMultipleRow(post_id){
    
    var atLeastOneIsChecked = ('input[name="allchk"]:checked').length;
    //alert(atLeastOneIsChecked);
    console.log($('input[name="allchk"]:checked').length);
    var checked = $('input[name="allchk"]:checked').serialize();
    //console.log($('input[name="allchk"]:checked').serialize());
    var p=[];
    $('input[name="allchk"]:checked').each(function() {
        //console.log(this.value);
        p.push(this.value);
    });
    
    //if(atLeastOneIsChecked!=0){
    //if($("#allchk").prop('checked') == true){
    if($('input[name="allchk"]:checked').length){
        var check = confirm("Are you sure you want to delete this table rows?");
        if (check == true) {
            $.ajax({
                type: "POST",
                url:"post/manage_post/remove_multitrow",
                data: {post_id:post_id,checked:p},
                success: function(response){
                    if(response){
                        $("#example").html(response);
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
            return true;
        }
        else {
            return false;
        }
    }else{
        alert('Please tick on row to delete any row');
        return false;
    }
}

function checkedAll(ele){
    var checkboxes = document.getElementsByClassName('cked');
    //console.log(checkboxes);
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
}

function deleteTableCol(col_name,post_id){
    var check = confirm("Are you sure you want to delete this table column?");
    if (check == true) {
        $.ajax({
            type: "POST",
            url:"post/manage_post/remove_tablecol",
            data: {post_id:post_id,col_name:col_name},
            success: function(response){
                if(response){
                    $("#example").html(response);
                }
            },
            error: function(){
               alert("failure");
            }
        });
        return true;
    }
    else {
        return false;
    }
}

</script>