<section id="blog" class="container">
    <div class="widget search">
        <div class="row">
            <form role="form" class="search-form">
                <div class="col-md-10 col-sm-9 left-search">
                    <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search by usernames, keywords &amp; labels">
                </div>
                <div class="col-md-2 col-sm-3 right-search">
                    <button class="btn btn-primary search-btn pull-right" type="button"> <i class="fa fa-search"></i> Search </button>
                </div>
            </form>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12">
                <div class="advanc-search"> <a href="" data-toggle="modal" data-target="#search_modal"> <i class="fa fa-search"></i> Advanced Search</a> &nbsp; &nbsp; <a href=""> <i class="fa fa-save"></i> Save Search</a></div>
            </div>
        </div>
    </div>
  <!--/.search-->
  
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <?php if(!empty($post_tabs)){ echo $post_tabs; } ?>
                <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade active in" id="profile">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-md-6 pull-right">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Sort by:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option>Created: New to Old</option>
                                                    <option>Created: Old to New</option>
                                                    <option>Updated: New to Old</option>
                                                    <option>Updated: Old to New</option>
                                                    <option>Viewed: Most to Least</option>
                                                    <option>Viewed: Least to Most</option>
                                                    <option>Commented: Most to Least</option>
                                                    <option>Commented: Least to Most</option>
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
                            ?>
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="blog-content">
                                            <h3><a href="post/individual_post/post_details/<?php echo base64_encode($uposts->post_id);?>"> <?php echo $uposts->post_id.'. '.$uposts->title?></a></h3>
                                            <div class="post-user"> 
                                                <p>
                                                    <span><i class="fa fa-user"></i> <a href="javascript:;"><?php echo $uposts->first_name.' '.$uposts->last_name;?></a></span>&nbsp; 
                                                    <span><i class="fa fa-calendar"></i>&nbsp;<?php echo date("d F, Y", strtotime($uposts->created_date)); // date("d F, Y", $uposts->created_date); ?></span> 
                                                </p>
                                                <span> Co-Owners:  
                                                    <a href="javascript:;"> 
                            <!--                                                    <span class="co-owner-box"> Mike Doe </span> 
                                                        <span class="co-owner-box"> Jenny </span> -->
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
                                                    <a href="javascript:;" style="pointer-events: none;"><span class="fa fa-comment"></span> Comments (31)</a>
                                                </button>
                                            </div>
                                            <?php
                                            if (preg_match('/\b' . $this->session->userdata('kaseidon_user_id') . '\b/', $uposts->post_creator_id.','.$uposts->co_owners)) { 
                                            ?>
                                            <a href="javascript:;">
                                                <div class="edit-icon"><i class="fa fa-pencil"></i> </div>
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
                <div class="widget count-post">
                    <div class="col-xs-4 padding-none">
                        <div class="box-circle" align="center"> <span> 120 </span> 
                            <p> Posts</p>
                        </div>
                    </div>

                    <div class="col-xs-4 padding-none">
                        <div class="box-circle" align="center"> <span> 60 </span> 
                            <p> Views</p>
                        </div>
                    </div>

                    <div class="col-xs-4 padding-none">
                        <div class="box-circle" align="center"> <span> 80 </span> 
                            <p> Helpful</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

       
                <div class="widget tags">
                    <div class="row">
                        <div class="col-xs-9">
                            <h3>Labels</h3>
                        </div>
                        <div class="col-xs-3 pull-right">
                            <div class="add-label"><a href="" style="width:80px" data-toggle="modal" data-target="#add_label" onclick="addLabel()" title="Add Label"><i class="fa fa-plus"></i></a></div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="col-md-12">
<!--                            <ul class="cd-accordion-menu animated">
                                <li class="has-children">
                                    <input type="checkbox" name="group-1" id="group-1">
                                    <label for="group-1" class="label-title">
                                        <span href="" data-toggle="tooltip" data-placement="top" title="Mike Chain"> Group 1</span> 
                                        <span class="badge">1</span>
                                    </label>
                                    <ul>
                                        <li class="has-children">
                                            <input type="checkbox" name="sub-group-1" id="sub-group-1">
                                            <label for="sub-group-1" class="label-title">
                                                <span href="" data-toggle="tooltip" data-placement="top" title="Mike Chain"> G10</span> 
                                                <span class="badge">2</span> 
                                            </label>
                                            <ul>
                                                <li><a href="javascript:void(0)">G10 A</a></li>
                                                <li><a href="javascript:void(0)">G10 B</a></li>
                                                <li><a href="javascript:void(0)">G10 C</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-children">
                                            <input type="checkbox" name="sub-group-2" id="sub-group-2">
                                            <label for="sub-group-2" class="label-title">
                                                <span href="" data-toggle="tooltip" data-placement="top" title="Mike Chain"> G100</span> 
                                                <span class="badge">3</span>
                                            </label>
                                            <ul>
                                                <li class="has-children">
                                                    <input type="checkbox" name="sub-group-level-3" id="sub-group-level-3">
                                                    <label for="sub-group-level-3" class="label-title">
                                                        <span href="" data-toggle="tooltip" data-placement="top" title="Mike Chain"> G100 A</span> 
                                                        <span class="badge">2</span>
                                                    </label>
                                                    <ul>
                                                        <li><a href="javascript:void(0)">G100 a</a></li>
                                                        <li class="has-children">
                                                            <input type="checkbox" name="sub-group-level-100" id="sub-group-level-100">
                                                            <label for="sub-group-level-100" class="label-title">
                                                                <span href="" data-toggle="tooltip" data-placement="top" title="Mike Chain"> G100 b</span> 
                                                                <span class="badge">3</span>
                                                            </label>
                                                            <ul>
                                                                <li><a href="javascript:void(0)">G100 B a</a></li>
                                                                <li><a href="javascript:void(0)">G100 B b</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                    <li><a href="javascript:void(0)">G100 B</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">G1000</a></li>
                                        <li><a href="javascript:void(0)">G10000</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <input type="checkbox" name="group-2" id="group-2">
                                    <label for="group-2">Group 2</label>
                                    <ul>
                                        <li><a href="javascript:void(0)">Image</a></li>
                                        <li><a href="javascript:void(0)">Image</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <input type="checkbox" name="group-3" id="group-3">
                                    <label for="group-3">Group 3</label>
                                    <ul>
                                        <li><a href="javascript:void(0)">Image</a></li>
                                        <li><a href="javascript:void(0)">Image</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <input type="checkbox" name="group-4" id="group-4">
                                    <label for="group-4">Group 4</label>
                                    <ul>
                                        <li class="has-children">
                                            <input type="checkbox" name="sub-group-3" id="sub-group-3">
                                            <label for="sub-group-3">Sub Group 3</label>
                                            <ul>
                                                <li><a href="javascript:void(0)">Image</a></li>
                                                <li><a href="javascript:void(0)">Image</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Image</a></li>
                                        <li><a href="javascript:void(0)">Image</a></li>
                                    </ul>
                                </li>
                            </ul>-->
                            
                            <ul class="cd-accordion-menu animated"><?php echo isTo();?> 
                                <?php 
                                if(!empty($tree_label)){
                                    foreach($tree_label AS $tlab){
                                ?>
                                <li class="has-children">
                                    <input type="checkbox" name="group-<?php echo $tlab->label_id;?>" id="group-<?php echo $tlab->label_id;?>">
                                    <label for="group-<?php echo $tlab->label_id;?>" class="label-title">
                                        <?php echo $tlab->label_name;?>
                                    </label>
                                    <?php
                                    if(!empty($tlab->label_id)){
                                    ?>
                                    <ul>
                                        <?php echo treeLabels($tlab->label_id);?>
                                    </ul>
                                    <?php
                                    }
                                    ?>
                                </li>
                                <?php
                                    }
                                }
                                ?>
                                
                            </ul>
                        </div> <!-- //col-md-12 -->
                    </div>
                    <div class="clearfix"></div>
                    

                    <h6><a href="" class="pull-right" data-toggle="modal" data-target="#label_modal"> View all </a></h6><br/>
                </div>
        <!--/.tags-->
        
                <div class="widget categories">
                  <h3>Most Viewed</h3>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="single_comments">
                        <a href="">
                        <p>Lorem ipsum dolor sit amet, consectetur </p>
                        <div class="entry-meta small muted"> <span><i class="fa fa-user"></i> Alex &nbsp; <i class="fa fa-calendar"></i> 3 feb, 2018 </span> </div>
                       </a>
                      </div>
                      <div class="single_comments">
                        <a href="">
                        <p>Lorem ipsum dolor sit amet </p>
                        <div class="entry-meta small muted"> <span><i class="fa fa-user"></i> Alex &nbsp; <i class="fa fa-calendar"></i> 3 feb, 2018 </span> </div>
                       </a>
                      </div>
                      <div class="single_comments">
                        <a href="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing </p>
                        <div class="entry-meta small muted"> <span><i class="fa fa-user"></i> Alex &nbsp; <i class="fa fa-calendar"></i> 3 feb, 2018 </span> </div>
                      </a>
                      </div>
                    </div>
                  </div>
                </div>
        
            </aside>
        </div>
    <!--/.row--> 
    </div>

</section>


<div class="modal fade" id="add_label">
    
</div>

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


$(document).ready(function () {

//    $(window).scroll(function(){
//        //var lastID = $('.load-more').attr('lastID');
//        var page = $('#add_post').find('.nextpage').val();
//        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (page != 0)){
//            $.ajax({
//                type:'POST',
//                url:"dashboard/user_dashboard/ajaxall_posts",
//                data:{page:page},
//                beforeSend:function(){
//                    $('#loading').show();
//                },
//                success:function(response){
//                    $('#add_post').find('.nextpage').remove();
//                    $('#loading').remove();
//                    $('#add_post').append(response);
//                }
//            });
//        }
//    });


//    $('#loading').show();
//    $.ajax({
//        url:"dashboard/user_dashboard/ajaxall_posts",
//        type:"POST",
//        data:{page:1},
//        cache: false,
//        success: function(response){
//            $('#loading').hide();
//            $('#add_post').html(response);
//        }
//    });
//    
//    $(window).scroll(function(){
//        var height = $('#add_post').height();
//        var scroll_top = $(this).scrollTop(); //console.log(height); console.log(scroll_top);
//        
//        if(ajax_arry.length>0){
//            $('#loading').hide();
//            for(var i=0;i<ajax_arry.length;i++){
//                ajax_arry[i].abort();
//            }
//        }
//
//        var page = $('#add_post').find('.nextpage').val();
//        var isload = $('#add_post').find('.isload').val();
//        
//       //console.log($(window).height());
//       console.log($(document).height());
//        if ($(window).scrollTop() == $(document).height() - $(window).height()){
//            $('#loading').show();
//            var ajaxreq = $.ajax({
//                url:"dashboard/user_dashboard/ajaxall_posts",
//                type:"POST",
//                data:{page:page},
//                cache: false,
//                success: function(response){
//                    $('#add_post').find('.nextpage').remove();
//                    $('#add_post').find('.isload').remove();
//                    $('#loading').hide();
//                    $('#add_post').append(response);
//                }
//            });
//            ajax_arry[ajax_index++]= ajaxreq;
//        }
        
    //});
    
    
    //$('.chosen-select').chosen();
});

</script>