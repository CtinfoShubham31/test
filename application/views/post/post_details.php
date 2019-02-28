<section id="blog" class="container">
    <div class="widget search">
        <?php echo commonSearchForm();?>
    </div>
  <!--/.search-->
    <div class="blog">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($postdetail_tabs)){ echo $postdetail_tabs; } ?>
                
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="content">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="blog-content relative">
                                        
                                        
                                        <?php
                                            if (preg_match('/\b' . $this->session->userdata('kaseidon_user_id') . '\b/', $uposts->post_creator_id.','.$uposts->co_owners)) { 
                                            ?>
<!--                                            <a href="post/manage_post/edit_post/<?php echo base64_encode($uposts->post_id);?>">-->
                                            <a href="javascript:;" data-toggle="modal" data-target="#editpost_restrict" onclick="authEditPost('<?php echo base64_encode($uposts->post_id);?>')">
                                                <div class="edit-icon">
                                                    <i class="fa fa-pencil" title="Edit Post"></i> 
                                                </div>
                                            </a> 
                                            
                                            <?php
                                            }
                                            ?>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9">
                                                <h3><a href="javascript:;" style="pointer-events: none;"><?php echo $uposts->post_id.'. '.$uposts->title?></a></h3>
                                            </div>
                                            <div id="followun">
                                            <?php
                                            $co_ow_arr = explode(',', $uposts->co_owners);
                                            array_push($co_ow_arr,$uposts->post_creator_id);
                                            //print_r($co_ow_arr);die;
                                            //if($uposts->post_creator_id != $this->session->userdata('kaseidon_user_id')){
                                            if(!in_array($this->session->userdata('kaseidon_user_id'),$co_ow_arr)){
                                                if(!empty($already_followed)){
                                            ?>
                                                <div class="col-md-3 pull-right">
                                                    <button type="button" id="isunfollow" title="UnFollow Post" class="btn btn-primary pull-right" onclick="unfollow_posts(<?php echo $uposts->post_id;?>,<?php echo $uposts->post_creator_id;?>)">Unfollow</button>
                                                </div>
                                            <?php
                                                }else{
                                            ?>
                                                <div class="col-md-3 pull-right">
                                                    <button type="button" class="btn btn-primary pull-right" title="Follow Post" id="isfollow" onclick="follow_posts(<?php echo $uposts->post_id;?>,<?php echo $uposts->post_creator_id;?>)">Follow</button>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="post-user"> 
                                            <p>
                                                <span><i class="fa fa-user"></i> <a href="javascript:;" prim_id="<?php echo $uposts->post_creator_id;?>"><?php if(!empty($uposts->first_name)){ echo $uposts->first_name.' '.$uposts->last_name;}?></a></span> &nbsp; 
                                                <span><i class="fa fa-calendar"></i>&nbsp;<?php echo date("d F, Y", strtotime($uposts->created_date));?></span>
                                            </p>
                                            <span> Co-Owners: 
                                                <a href="javascript:;" style="pointer-events: none;"> 
                                                    <?php coOwners($uposts->co_owners);?>
                                                </a>  
                                            </span>
                                        </div>
                                        <p><?php echo $uposts->short_description; ?></p>
                                        <div class="tag-list">
                                            <ul>
                                                <?php
                                                if(!empty($uposts->tagged_labels)){

                                                    if( strpos($uposts->tagged_labels, ',') !== false ) {
                                                        $tagg_results = explode(',', $uposts->tagged_labels);
                                                        foreach($tagg_results AS $tgresult){
                                                ?>
                                                            <li><a href="javascript:;"><?php taggedLabels($tgresult);?></a></li>
                                                <?php
                                                        }
                                                    }
                                                    else{ $uposts->tagged_labels;
                                                ?>
                                                        <li><a href="javascript:;"><?php taggedLabels($uposts->tagged_labels);?></a></li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <hr>
                                        
                                        <?php
                                        if($uposts->post_type == 4){
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group" id="calendar"></div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <?php
                                        if($uposts->post_type == 5){
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group" id="timeplanner">
                                                <div class="dx-viewport demo-container">
                                                    <div id="scheduler"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <?php
                                        if(!empty($uposts->detail_description) && $uposts->post_type == 2){
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="editor-img">
                                                <?php if(!empty($uposts->detail_description)){ echo $uposts->detail_description; }?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <?php
                                        if(!empty($graphics_data) && $uposts->post_type == 3){
                                        ?> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Graphic</h4>
                                            </div>
                                            
                                            <?php
                                            foreach($graphics_data AS $gdata){
                                            ?>
                                            <div class="col-sm-3">
                                                <div class="img-sec">
                                                    <center><img src="upload/graphics/<?php echo $gdata->graphic;?>" class="img-responsive"/></center>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            
                                            ?>
                                            
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="clearfix"></div>
                                        
                                        <div class="row">
                                            <?php
                                            if(!empty($attachm_data)){
                                            ?>
                                            <div class="col-md-12">
                                                <h3>Attachment</h3>
                                            </div>
                                            <?php
                                                foreach($attachm_data AS $atthdata){
                                                    
                                            ?>
                                            <div class="col-sm-2" onclick="downloadAttachment('<?php echo $atthdata->attachment;?>')">
                                                <div class="attach-file">
                                                    <center><i class="fa fa-paperclip "></i> 
                                                        <p><a href="post/individual_post/download_attachm?file=<?php echo $atthdata->attachment;?>" ><?php echo $atthdata->attachment;?></a></p>
                                                    </center>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                        <?php
                                        if($uposts->post_type == 1){
                                        ?> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="top-30">
                                                    <input type="hidden" id="list_count" value="<?php if(!empty($lists_data)){ echo COUNT($lists_data);}?>">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr id="theadrow">
<!--                                                                    <th>#</th>-->
                                                                    <?php 
                                                                    $alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                                                                    if(!empty($lists_data[0])){
                                                                        //echo COUNT($lists_data[0]);die('QQ');
                                                                        for($p = 0;$p <= COUNT($lists_data[0])-1;$p++){
                                                                    ?>
                                                                        <?php //if(!empty($lists_data[0][$p])){?> <th id="sheet<?php echo $alpha_arr[$p].'1';?>" ><?php echo $lists_data[0][$p];?></th><?php  //}?>
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
<!--                                                                        <td><i class="fa fa-trash" data-original-title="Delete" style="cursor:pointer"></i></td>-->
                                                                <?php
                                                                        for($s = 0; $s <= COUNT($lists_data[$m])-1; $s++){
                                                                ?>
                                                                        <?php if(!empty($lists_data[$m][$s])){?> <td id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>" ><?php echo $lists_data[$m][$s];?></td><?php  }else{?><td cell="<?php echo $alpha_arr[$s].''.($m+1);?>" id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>"></td><?php }?>
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
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <div class="bottom-box">
                                            <span class="help-pop">
                                                <button type='button' class="tab-btn like-btn" id="like-btn"> 
                                                    <i class='fa fa-thumbs-up'></i> Helpful
                                                </button>
                                                <span class="span-pop">
                                                    <div class="pop1" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','1')" id="help<?php echo $uposts->post_id.'_1';?>"><i class="em em-slightly_smiling_face"></i> (<?php echo helpfulCount($uposts->post_id,1);?>)
                                                        <div class="pop1-hover">Thank You</div>
                                                    </div>
                                                    <div class="pop1" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','2')" id="help<?php echo $uposts->post_id.'_2';?>"><i class="em em---1"></i> (<?php echo helpfulCount($uposts->post_id,2);?>)
                                                        <div class="pop1-hover">Made My Day</div>
                                                    </div>
                                                    <div class="pop1" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','3')" id="help<?php echo $uposts->post_id.'_3';?>"><i class="em em-ok_hand"></i> (<?php echo helpfulCount($uposts->post_id,3);?>)
                                                        <div class="pop1-hover">Life Saving</div>
                                                    </div>
                                                </span>
                                            </span>
                                            <button class="tab-btn"><a href=""><span class="fa fa-user-plus"></span> Followers (<?php echo followedCount($uposts->post_id);?>)</a></button>
                                            <button class="tab-btn"><a href=""><span class="fa fa-eye"></span> Views (<?php echo viwedCount($uposts->post_id);?>)</a></button>
                                            <button class="tab-btn pull-right"><a href=""><span class="fa fa-comment"></span> Comments (<?php echo commentCount($post_id)?>)</a></button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
            <!--/.blog-item-->
                        <div class="comment-box">
                            <h2> Leave a Comment</h2>
                            <form id="post_comment" class="contact-form" method="post" role="form">
                                <div class="row">
                                    <div class="col-md-12">  
                                        <input type="hidden" id="post_id" name="post_id" value="<?php echo $post_id;?>">
                                        <div class="form-group">
                                            <textarea name="comment" id="comment" class="form-control" rows="6" placeholder="Type comment here.."></textarea>
                                            <span id="comment_error" class="error_msg"></span>
                                        </div>                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" required="required">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>    
                            
                            <input type="hidden" id="tot_comment" value="<?php echo commentCount($post_id)?>">
<!--                            <h2 id="comment_id">View Comments(3)</h2>-->
                            <h2 id="comment_id">View Comments(<?php echo commentCount($post_id)?>)</h2>
                            <img src="images/ajax-loader.gif" id="loading" style="left: 35%;position: fixed;top:50%; z-index: 9999; display: none;">
                            <div class="comment-show" id="comment-show">
                                 
                                <?php
                                if(!empty($comment_data)){
                                    foreach($comment_data AS $comm){
                                ?>
                                <div class="post_reply wow flipInX" id="rmv<?php echo $comm->comment_id?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3><?php echo $comm->first_name;?></h3>
                                            <small><?php echo $comm->created_date;?></small>
                                            <p id="commtext<?php echo $comm->comment_id;?>"><?php echo $comm->comment;?></p>

                                        </div>
                                    </div>
                                    
                                    <div class="reply-icon" id="reply-com<?php echo $comm->comment_id?>" >
                                        <a href="javascript:void(0)">
                                            
                                            <?php
                                            if($comm->commented_by == $this->session->userdata('kaseidon_user_id')){
                                            ?>
                                            <i onclick="updateCommentOn(<?php echo $comm->comment_id;?>)" class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>&nbsp;
                                            <i onclick="deleteComment(<?php echo $comm->comment_id;?>)" class="fa fa-trash" data-placement="top" title="Delete"></i>&nbsp;
                                            <?php
                                            }else{
                                            ?>
                                            <i onclick="repCommentOn(<?php echo $comm->comment_id;?>)" class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i>&nbsp;
                                            <?php
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    
                                    <!----------------->
                                    <?php
                                    if($comm->commented_by == $this->session->userdata('kaseidon_user_id')){
                                    ?>
                                    <div class="comment-toggle" id="comment_toggle<?php echo $comm->comment_id?>">
                                        <div class="form-group">
                                            <label for="">Comment</label>
                                            <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc<?php echo $comm->comment_id?>" placeholder="Description"><?php echo $comm->comment;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" onclick="upComment('<?php echo $comm->comment_id?>','<?php echo $comm->post_id ?>','<?php echo $comm->post_creator_id ?>')">Update</button>
                                            <a href="javascript:;" class="btn newpost_btn" onclick="updateCommentOn(<?php echo $comm->comment_id;?>)">Cancel</a>
                                        </div>
                                    </div>
                                    <?php
                                    } 
                                    else{
                                    ?>
                                    <div class="comment-toggle" id="comment_toggle<?php echo $comm->comment_id?>">
                                        <div class="form-group">
                                            <label for="">Comment</label>
                                            <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc<?php echo $comm->comment_id?>" placeholder="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" onclick="reComment('<?php echo $comm->comment_id?>','<?php echo $comm->post_id ?>','<?php echo $comm->post_creator_id ?>')">Submit</button>
                                            <a href="javascript:;" class="btn newpost_btn" onclick="repCommentOn(<?php echo $comm->comment_id;?>)">Cancel</a>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!----------------->
                                    <?php 
                                    echo replayComment($comm->comment_id,$comm->post_id);
                                    ?>
                                    
                                </div>
                                <?php
                                    }
                                ?>
                                <input type="hidden" class="nextpage" value="<?php echo $page+1;?>">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>

<script type="text/javascript" src="js/custom_lazy_load.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#example').DataTable({
        /* Disable initial sort */
        "aaSorting": []
    });

    $("#comment_id").click(function(){
        $(".comment-show").slideToggle();
    });
    
    $("#post_comment").on("submit", function(event) {
        //console.log('asasa');
        /* stop form from submitting normally or prevent default action */
        event.preventDefault();
        var form_data = $(this).serialize(); //Encode form elements for submit;
        console.log(form_data);
        $.ajax({
            type: "POST",
            url: "post/individual_post/add_comment",
            data: form_data,
           // contentType: "application/json;charset=utf-8",
            dataType: "json",
            success: function(response){
            //alert(response);
                if(response.errors.valid_comment){
                    $("#comment_error").fadeIn().html(response.errors.valid_comment);
                    setTimeout(function() {
                        $('#comment_error').fadeOut("slow");
                    }, 3000 );
                }
                else if(response.success == 'true'){
                    tot_comment = response.tot_comment;
                    $.ajax({
                        type: "POST",
                        url: "post/individual_post/comment_load",
                        data: {post_id:<?php echo base64_decode($this->uri->segment(4))?>,page:1},
                        success: function(res){
                            console.log('Success');
                            $('#comment').val('');
                            $('#comment-show').html(res);
                            $('#comment_id').html('View Comments('+tot_comment+')');
                            
                        },
                        error: function(ts){
                            console.log(ts.responseText);
                        }
                    });
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
    
    
////////////////////CALENDAR START/////////////////////////////////////////////
    var calendar = $('#calendar').fullCalendar({
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
        displayEventTime: false
    });
////////////////////CALENDAR END/////////////////////////////////////////////
    
    $(window).scroll(function(){
        //var lastID = $('.load-more').attr('lastID');
        var page = $('#comment-show').find('.nextpage').val();
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (page != 0)){
            $.ajax({
                type:'POST',
                url:"post/individual_post/comment_load",
                data:{page:page,post_id:<?php echo base64_decode($this->uri->segment(4))?>},
                beforeSend:function(){
                    $('#loading').show();
                },
                success:function(response){
                    $('#comment-show').find('.nextpage').remove();
                    $('#loading').remove();
                    $('#comment-show').append(response);
                }
            });
        }
    });
    

    
} );

function repCommentOn(comment_id){
    $("#comment_toggle"+comment_id).slideToggle();
}

function updateCommentOn(comment_id){
    $("#comment_toggle"+comment_id).slideToggle();
}

function reComment(comment_id,post_id,post_creator_id){
    re_comment = $("#shot_desc"+comment_id).val();
    if(re_comment){
    
        $.ajax({
            type: "POST",
            url: "post/individual_post/replay_comment",
            data: {comment:re_comment,post_id:post_id,comment_id:comment_id,post_creator_id:post_creator_id},
            success: function(res){
                console.log('Success');
                $("#shot_desc"+comment_id).val('');
                $("#comment_toggle"+comment_id).slideToggle();
                $(res).insertAfter("#comment_toggle"+comment_id);
                comm_count = $("#tot_comment").val();
                cmm = parseInt(comm_count)+parseInt(1);
                //console.log(cmm);
                $("#tot_comment").val(cmm);
                $('#comment_id').html('View Comments('+cmm+')');
            },
            error: function(ts){
                console.log(ts.responseText);
            }
        });
    }else{
        $("<span class='error_msg' id='cmntrm'>Please add comment.</span>").insertAfter("#shot_desc"+comment_id).fadeIn();
        setTimeout(function() {
            $("#cmntrm").fadeOut("slow");
        }, 3000 );
    }
}

function upComment(comment_id,post_id,post_creator_id){
    up_comment = $("#shot_desc"+comment_id).val();
    if(up_comment){
    
        $.ajax({
            type: "POST",
            url: "post/individual_post/update_comment",
            data: {comment:up_comment,post_id:post_id,comment_id:comment_id,post_creator_id:post_creator_id},
            success: function(res){
                console.log('Success');
                $("#commtext"+comment_id).html(up_comment);
                $("#comment_toggle"+comment_id).slideToggle();
            },
            error: function(ts){
                console.log(ts.responseText);
            }
        });
    }else{
        $("<span class='error_msg' id='cmntrm'>Please add comment.</span>").insertAfter("#shot_desc"+comment_id).fadeIn();
        setTimeout(function() {
            $("#cmntrm").fadeOut("slow");
        }, 3000 );
    }
}

function deleteComment(comment_id){
    //console.log(comment_id);
    var r = confirm("Are you sure want to delete this comment?");
    if (r == true) {
        $.ajax({
            type: "POST",
            url: "post/individual_post/delete_comment",
            data: {comment_id:comment_id},
            success: function(res){
                console.log('Success');
                if(res == 'associate'){
                    alert("Can't delete, this comment is associated with other comment.");
                    return false;
                }
                else if(res == 'true'){
                    $("#rmv"+comment_id).remove();
                    comm_count = $("#tot_comment").val();
                    cmm = parseInt(comm_count)-parseInt(1);
                    //console.log(cmm);
                    $("#tot_comment").val(cmm);
                    $('#comment_id').html('View Comments('+cmm+')');
                    
                }else{
                    alert('failure');
                }
            },
            error: function(ts){
                console.log(ts.responseText);
            }
        });
    }
}

function follow_posts(post_id,pcreator){
    $.ajax({
        type: "POST",
        url:"post/individual_post/follow_posts",
        data: {post_id:post_id,pcreator:pcreator},
        success: function(data){
            if(data=='true'){
                //$('#isfollow').css('pointer-events','none');
                $("#isfollow").html("UnFollow");
                $("#followun").html('<div class="col-md-3 pull-right"><button type="button" id="isunfollow" class="btn btn-primary pull-right" title="UnFollow Post" onclick="unfollow_posts('+post_id+','+pcreator+')">Unfollow</button></div>');
            }
        },
        error: function(){
           alert("failure");
        }
    });
}

function unfollow_posts(post_id,pcreator){
    var r = confirm("Are you sure want to unfollow the posts?");
    if (r == true) {
        $.ajax({
            type: "POST",
            url:"post/individual_post/unfollow_posts",
            data: {post_id:post_id},
            success: function(data){
                if(data=='true'){
                    //$('#isfollow').css('pointer-events','none');
                    //$("#isunfollow").html("Followed");
                    $("#followun").html('<div class="col-md-3 pull-right"><button type="button" id="isfollow" class="btn btn-primary pull-right" title="Follow Post" onclick="follow_posts('+post_id+','+pcreator+')">Follow</button></div>');

                }
            },
            error: function(){
               alert("failure");
            }
        });
    }
}

function helpful_mark(post_id,pcreator,htype){
    $.ajax({
        type: "POST",
        url:"dashboard/user_dashboard/mark_helpful",
        data: {post_id:post_id,pcreator:pcreator,htype:htype},
        success: function(data){
            if(data){
                if(htype == '1'){
                    result = "<i class='em em-slightly_smiling_face'></i> ("+data+")<div class='pop1-hover'>Thank You</div>";
                }else if(htype == '2'){
                    result = "<i class='em em---1'></i>("+data+")<div class='pop1-hover'>Made My Day</div>";
                }
                else if(htype == '3'){
                    result = "<i class='em em-ok_hand'></i>("+data+")<div class='pop1-hover'>Life Saving</div>";
                }
                $("#help"+post_id+"_"+htype).html(result);
            }
        },
        error: function(){
           alert("failure");
        }
    });
}

function downloadAttachment(attachment){
    location.href = "post/individual_post/download_attachm?file="+attachment;
}

function updateSheet(sheet_cell){
    //$("td #sheet"+sheet_cell).removeAttr("onclick");
    tdval = $("#sheet"+sheet_cell).html();
    $("#sheet"+sheet_cell).removeAttr("onclick");
    //$("#sheet"+sheet_cell).html('<input type="text" id="sheet'+sheet_cell+'" value="" onkeydown="saveSheet(this)">');
    $("#sheet"+sheet_cell).html('<input type="text" cell="'+sheet_cell+'" id="sheet'+sheet_cell+'" value="'+tdval+'">');
}

function appendColumn(){
    $('#theadrow').append('<th><input type="text" id="new_col" col="new_col" value=""></th>');
}

function appendRow(){
    var alpha_arr = ['A','B','C','D','E','F','G','H','I','J'];
    thcount = $('th').length;
    list_tot = parseInt($('#list_count').val())+parseInt("1");
    console.log(thcount);
    td_result='';
//    for(j=1;j<=thcount;j++){
//        td_result += '<td id="sheet"'+alpha_arr[j-1]+''+thcount+'><input cell="'+alpha_arr[j-1]+''+thcount+'" id="sheet"'+alpha_arr[j-1]+''+thcount+' value="" type="text">';
//    }
    for(j=1;j<=thcount;j++){
        td_result += '<td id="sheet'+alpha_arr[j-1]+list_tot+'"><input cell="'+alpha_arr[j-1]+''+list_tot+'" id="sheet'+alpha_arr[j-1]+list_tot+'" value="" type="text">';
    }
    console.log(td_result);
    $('#tbodyrow').append('<tr>'+td_result+'</tr>');
}

</script>

<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script>
   var jq3 = jQuery.noConflict();
   //alert("Version: "+jq3.fn.jquery);
</script>
<script type="text/javascript" src="js/dx.all.js"></script>
<script>
    $(document).ready(function(){
    var schedulerDataSource = new DevExpress.data.DataSource({

                        paginate: false,
                        load: function(loadOptions) {
                            var d = $.Deferred(),
                            params = {};
                            if("filter" in loadOptions && isNotEmpty(loadOptions["filter"])) 
                                params[i] = JSON.stringify(loadOptions[i]);       
                            return data;
                        },
                        
                    });
                    
                    
                
                    jq3("#scheduler").dxScheduler({         
                        views: ["timelineDay", "timelineWeek", "timelineMonth"],
                        //views: ["timelineWeek"],
                        currentView: "timelineDay",
                        currentDate: new Date(),
                        firstDayOfWeek: 0,
                        startDayHour: 8,
                        endDayHour: 20,
                        cellDuration: 60,
                        width: "100%",
                        height: 580,
                        onAppointmentAdding: function () {
    		alert("onAppointmentAdding")
    }
                    });

                    setTimeout(function() {
                        // Computing start and end hour
                        var startDayHour = 24,
                        endDayHour = 0;
                        data.forEach(function(item) {
                            // Start
                            //console.log(item);
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

                        //console.log(startDayHour, endDayHour);
                        var scheduler = jq3("#scheduler").dxScheduler("instance").option({
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
                          //console.log("Repainting");
                          jq3("#scheduler").dxScheduler("instance").repaint();
                        }, 500);
                    }, 500);
                  
               
                    var priorityData = <?php echo $item;?>;
                    var data = <?php echo $data;?>;
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
                    
                    });
//                     jq3(jq3("#scheduler").find('.dx-tooltip')[0]).dxTooltip('instance');
//                    tooltipInstance.hide();
//                    onAppointmentClick: function (e) {
//    e.cancel = true;
//}
</script>