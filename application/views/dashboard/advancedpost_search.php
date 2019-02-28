<section id="blog" class="container">
    <div class="widget search">
        <?php echo commonSearchForm();?>
    </div>
  <!--/.search-->
  
  <?php //print_r($data);?>
  <!-----ADVANCED SEARCH HIDDEN VALUE(START)----------------->
    <?php
    if(!empty($username)){
        foreach ($username as $uids) {
    ?>
    <input type="hidden" name="username[]" id="username" value="<?php echo $uids;?>">
    <?php
        }
    }else{
    ?>
    <input type="hidden" name="username[]" id="username" value="">
    <?php
    }
    ?>
    
    <?php
    if(!empty($labels)){
        foreach ($labels as $labids) {
    ?>
    <input type="hidden" name="labels[]" id="labels" value="<?php echo $labids;?>">
    <?php
        }
    }else{
    ?>
    <input type="hidden" name="labels[]" id="labels" value="">
    <?php
    }
    ?>
    
  <input type="hidden" name="jsondata" id="jsondata" value='<?php if(!empty($jsondata)){ echo $jsondata; }?>'>  
  <input type="hidden" name="post_type" id="post_type" value="<?php if(!empty($post_type)){ echo $post_type; } ?>">
  <input type="hidden" name="title" id="title" value="<?php if(!empty($title)){ echo $title; } ?>">
  <input type="hidden" name="posts_created_from" id="posts_created_from" value="<?php if(!empty($posts_created_from)){ echo $posts_created_from; } ?>">
  <input type="hidden" name="posts_created_to" id="posts_created_to" value="<?php if(!empty($posts_created_to)){ echo $posts_created_to; } ?>">
  <input type="hidden" name="posts_updated_from" id="posts_updated_from" value="<?php if(!empty($posts_updated_from)){ echo $posts_updated_from; } ?>">
  <input type="hidden" name="posts_updated_to" id="posts_updated_to" value="<?php if(!empty($posts_updated_to)){ echo $posts_updated_to; } ?>">
  <input type="hidden" name="serial_from" id="serial_from" value="<?php if(!empty($serial_from)){ echo $serial_from; } ?>">
  <input type="hidden" name="serial_to" id="serial_to" value="<?php if(!empty($serial_to)){ echo $serial_to; } ?>">
  <input type="hidden" name="attachment" id="attachment" value="<?php if(!empty($attachment)){ echo $attachment; } ?>">
  <input type="hidden" name="tab_type" id="tab_type" value="<?php if(!empty($tab_type)){ echo $tab_type; } ?>">
  <!-----ADVANCED SEARCH HIDDEN VALUE(END)----------------->
  
  
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <?php if(!empty($post_tabs)){ echo $post_tabs; } ?>
                <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade active in" id="profile">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-md-6 pull-right">
                                    <form class="form-horizontal" id="sorting" action="<?php echo base_url(uri_string());?>" method="post">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Sort by:</label>
                                            <div class="col-sm-9">
                                                <select name="sort_posts" class="form-control" onchange="this.form.submit()">
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==1){?>selected="selected"<?php }?> value="1">Created: New to Old</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==2){?>selected="selected"<?php }?> value="2">Created: Old to New</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==3){?>selected="selected"<?php }?> value="3">Updated: New to Old</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==4){?>selected="selected"<?php }?> value="4">Updated: Old to New</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==5){?>selected="selected"<?php }?> value="5">Viewed: Most to Least</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==6){?>selected="selected"<?php }?> value="6">Viewed: Least to Most</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==7){?>selected="selected"<?php }?> value="7">Commented: Most to Least</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==8){?>selected="selected"<?php }?> value="8">Commented: Least to Most</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==9){?>selected="selected"<?php }?> value="9">Helpful: Most to Least</option>
                                                    <option <?php if(!empty($sort_posts) && $sort_posts==10){?>selected="selected"<?php }?> value="10">Helpful: Least to Most</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <img src="images/ajax-loader.gif" id="loading" style="left: 35%;position: fixed;top:50%; z-index: 9999; display: none;">
                        <div id="add_post">
                            <?php
                            if(!empty($userposts)){
                                foreach($userposts AS $uposts){
                                    if(!empty(checkPostVisibility($uposts->post_id)) && in_array($this->session->userdata('kaseidon_user_id'), checkPostVisibility($uposts->post_id))){
                                        $style_css = '';
                                    }else if(empty(checkPostVisibility($uposts->post_id))){
                                        $style_css = '';
                                    }else{
                                        $style_css = 'style="pointer-events: none;opacity: 0.5;background: #DDD;"';
                                    }
                            ?>
                            <div class="blog-item" <?php echo $style_css;?>>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <?php
                                        $post_class = '';
                                        if(strtotime($uposts->updated_date)!=FALSE && !in_array($this->session->userdata('kaseidon_user_id'),explode(",",$uposts->updated_views))  && $uposts->updated_date!='0000-00-00 00:00:00'){
                                            $post_class= 'update';
                                        }else if(commentCount($uposts->post_id) && !in_array($this->session->userdata('kaseidon_user_id'),explode(",",$uposts->commented_views))){
                                            $post_class= 'notify';
                                        }
                                        ?>
                                        <div class="blog-content <?php echo $post_class;?>">
                                            <h3>
                                                <a href="post/individual_post/post_details/<?php echo base64_encode($uposts->post_id);?>"> <?php echo $uposts->post_id.'. '.$uposts->title?></a>
                                                
                                            </h3>
                                            <div class="post-user"> 
                                                <p>
                                                    <span><i class="fa fa-user"></i> <a href="javascript:;"><?php echo $uposts->first_name.' '.$uposts->last_name;?></a></span>&nbsp; 
                                                    <span><i class="fa fa-calendar"></i>&nbsp;<?php echo date("d F, Y", strtotime($uposts->created_date)); // date("d F, Y", $uposts->created_date); ?></span> 
                                                </p>
                                                <span> Co-Owners:  
                                                    <a href="javascript:;"> 
                                                        <?php coOwners($uposts->co_owners);?>
                                                    </a>
                                                </span>
                                            </div>
                                            <p><?php echo $uposts->short_description; ?></p>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
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
                                                </div>
                                                <?php
                                                $update = strtotime($uposts->updated_date);
                                                if($update != 0){
                                                ?>
                                                <div class="col-md-4 col-sm-4">
                                                    <p class="small text-right"> 
                                                        <i class="fa fa-calendar"></i> 
                                                        <span>Last Updated:</span><?php echo date("d F, Y", strtotime($uposts->updated_date)); ?>
                                                    </p>
                                                </div>
                                                <?php 
                                                }
                                                ?>
                                            </div>
                                            <div class="bottom-box">
                                                <span class="help-pop">
                                                    <button type='button' class="tab-btn like-btn" id="like-btn"> <i class='fa fa-thumbs-up'></i> Helpful
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
                                                <button class="tab-btn">
                                                    <a href="javascript:;" style="pointer-events: none;"><span class="fa fa-user-plus"></span> Followers (<?php echo followedCount($uposts->post_id);?>)</a>
                                                </button>
                                                <button class="tab-btn">
                                                    <a href="javascript:;" style="pointer-events: none;"><span class="fa fa-eye"></span> Views (<?php echo viwedCount($uposts->post_id);?>)</a>
                                                </button>
                                                <button class="tab-btn pull-right">
                                                    <a href="javascript:;" style="pointer-events: none;"><span class="fa fa-comment"></span> Comments (<?php echo commentCount($uposts->post_id);?>)</a>
                                                </button>
                                                <span id="post_fwunf">
                                                    <?php
                                                    $co_ow_arr = explode(',', $uposts->co_owners);
                                                    array_push($co_ow_arr,$uposts->post_creator_id);
                                                    if(!in_array($this->session->userdata('kaseidon_user_id'),$co_ow_arr)){
                                                        if(!empty($already_followed)){
                                                    ?>

                                                    <button type="button" class="tab-btn" id="unfw_post" title="Unfollow Post" onclick="unfollowPosts('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>')">
                                                        <i class="fa fa-minus-circle"></i> Unfollow
                                                    </button>
                                                    <?php
                                                        }else{
                                                    ?>
                                                    <button type="button" class="tab-btn" id="fw_post" title="Follow Post" onclick="followPosts('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>')">
                                                        <i class="fa fa-plus-circle"></i> Follow
                                                    </button>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <?php
                                            if (preg_match('/\b' . $this->session->userdata('kaseidon_user_id') . '\b/', $uposts->post_creator_id.','.$uposts->co_owners)) { 
                                            ?>
                                            <a href="post/manage_post/edit_post/<?php echo base64_encode($uposts->post_id);?>">
                                                <div class="edit-icon"><i class="fa fa-pencil" title="Edit Post"></i> </div>
                                            </a> 
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <input type="hidden" class="nextpage" value="<?php echo $page+1;?>">
                            <input type="hidden" class="orderbydata" value="<?php if(!empty($sort_posts)){ echo $sort_posts;}?>">
                            
                            <?php
                            }else{
                            ?>
                            <div class="col-xs-12 col-sm-12">
                                <div class="not-found">
                                    <center><img src="img/found.png" class="img-responsive"></center>
                                    <h2> No Records Found. </h2> 
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            
                        </div>    
                    </div>
                </div>
            </div>
      
      
            <aside class="col-md-4">
                <?php echo getPvhScore();?>

       
                <div class="widget tags">
                    <div class="row">
                        
                        <div class="col-xs-7">
                            <h3>Labels</h3>
                        </div>
                        <div class="col-xs-5 pull-right">
                            <div class="add-label">
                                <span id="expand-toggle">
                                    <i id="setclasses" class="fa fa-expand" title="Full Screen"></i>
                                </span>
                            </div>
                            <div class="add-label" title="Manage Label">
                                <a href="dashboard/user_dashboard/manage_label"><i class="glyphicon glyphicon-tags"></i></a>
                            </div>
                            <div class="add-label"><a href="" style="width:80px" data-toggle="modal" data-target="#add_label" onclick="addLabel()" title="Add Label"><i class="fa fa-plus"></i></a></div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="label-header-fix" id="change-height">
                        <?php echo nestedLables();?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
        
                <?php 
                //------------CONTENT REQUEST-------------------
                echo getContentRequest();
                ?>

            </aside>
        </div>
    <!--/.row--> 
    </div>

</section>
<div class="modal fade" id="editpost_restrict">
    
</div>

<!--<div class="modal fade" id="add_label">
    
</div>-->

<script type="text/javascript" src="js/custom_lazy_load.js"></script>

<script type="text/javascript">
function addLabel(){
    $.ajax({
        type: "POST",
        url:"post/manage_post/addlabel",
        data: {popup:1},
        success: function(data){
            $("#add_label").html(data);
        },
        error: function(){
           alert("failure");
        }
    });
}

function allLabel(){
    $.ajax({
        type: "POST",
        url:"dashboard/user_dashboard/all_label",
        data: {popup:1},
        success: function(data){
            $("#add_label").html(data);
        },
        error: function(){
           alert("failure");
        }
    });
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

//function saveSearch(){
//    search_val = $("#searchpost").val();
//    console.log('before');
//    if(search_val){
//        console.log('end');
//        $.ajax({
//            type: "POST",
//            url:"dashboard/user_dashboard/save_search",
//            data: {search_val:search_val},
//            success: function(data){
//                $("#add_label").html(data);
//            },
//            error: function(){
//               alert("failure");
//            }
//        });
//    }
//}

//function saveSearchLists(){
//    $.ajax({
//        type: "POST",
//        url:"dashboard/user_dashboard/savedsearch_lists",
//        //data: {search_val:search_val},
//        success: function(data){
//            $("#add_label").html(data);
//        },
//        error: function(){
//           alert("failure");
//        }
//    });
//}

//function search_saved(search_saved){
//    $("#searchpost").val(search_saved);
//    $("#search_form").submit();
//}


$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

</script>