<section id="blog" class="container">
    <div class="widget search">
        <div class="row">
            <form role="form" class="search-form">
                <div class="col-md-10 col-sm-9 left-search">
                    <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search by usernames, keywords &amp; labels">
                    <div class="advanc-search">
                        <div class="row">
                            <div class="col-md-7 col-sm-7"> 
                              <a href="" data-toggle="modal" data-target="#search_modal"> <i class="fa fa-search"></i> Advanced Search</a> &nbsp; &nbsp; <a href=""> <i class="fa fa-save"></i> Save Search</a>
                            </div>
                            <div class="col-md-5 col-sm-5 text-right pull-right">
                                <a href="" data-toggle="modal" data-target="#save_search"> <i class="fa fa-list"></i> Saved Search</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 right-search">
                    <button class="btn btn-primary search-btn pull-right" type="button"> <i class="fa fa-search"></i> Search </button>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
  <!--/.search-->
    <div class="blog">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbed round">
                   <ul>
                       <li> <a href="post/individual_post/post_details/<?php echo $seg = $this->uri->segment(4)?>" class="active" >Post</a></li>
                       <li> <a href="javascript:;" style="pointer-events: none;" class="<?php if(!empty($my_posts)){ echo 'active'; } ?>" >History</a></li>
                       <li> <a href="javascript:;" style="pointer-events: none;" class="<?php if(!empty($all_posts)){ echo 'active'; } ?>">Analytics</a></li>
                   </ul>
               </div>    
                
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="content">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="blog-content">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9">
                                                <h3><a href="javascript:;" style="pointer-events: none;"><?php echo $uposts->post_id.'. '.$uposts->title?></a></h3>
                                            </div>
                                            <?php 
                                            if($uposts->post_creator_id != $this->session->userdata('kaseidon_user_id')){ //die('sss');
                                                if(!empty($already_followed)){
                                            ?>
                                                <div class="col-md-3 pull-right">
                                                    <button type="button" class="btn btn-primary pull-right" style="pointer-events: none;">Followed</button>
                                                </div>
                                            <?php
                                                }else{
                                            ?>
                                                <div class="col-md-3 pull-right">
                                                    <button type="button" class="btn btn-primary pull-right" id="isfollow" onclick="follow_posts(<?php echo $uposts->post_id;?>,<?php echo $uposts->post_creator_id;?>)">Follow</button>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="post-user"> 
                                            <p>
                                                <span><i class="fa fa-user"></i> <a href="javascript:;" style="pointer-events: none;"><?php if(!empty($uposts->first_name)){ echo $uposts->first_name.' '.$uposts->last_name;}?></a></span> &nbsp; 
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
                                        
                                        
                                        
                                        <div class="row">
                                            <?php
                                            if(!empty($graphics_data)){
                                            ?>   
                                            
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
                                            }
                                            ?>
                                            
                                        </div>
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
                                        
                                        <input type="button" onclick="appendColumn()" value="Add Column">
                                        <input type="button" value="Add Row" onclick="appendRow()">
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="top-30">
                                                    <input type="hidden" id="list_count" value="<?php if(!empty($lists_data)){ echo COUNT($lists_data);}?>">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr id="theadrow">
                                                                    <?php 
                                                                    $alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K');
                                                                    if(!empty($lists_data)){
                                                                        //echo COUNT($lists_data);die('QQ');
                                                                        for($p = 0;$p <= COUNT($lists_data);$p++){
                                                                    ?>
                                                                        <?php if(!empty($lists_data[0][$p])){?> <th id="sheet<?php echo $alpha_arr[$p].'1';?>" onclick="updateSheet('<?php echo $alpha_arr[$p].'1';?>')"><?php echo $lists_data[0][$p];?></th><?php  }?>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyrow">
                                                                <?php
                                                                if(!empty($lists_data)){

                                                                    for($m = 1;$m <= COUNT($lists_data)-1;$m++){
                                                                ?>
                                                                    <tr>
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
                                            </div>
                                        </div>

<!--                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <p class="small"> <i class="fa fa-calendar"></i> <span>Last Updated:</span> 3 may, 2018</p>
                                            </div>
                                        </div>-->
                    
                    <!--<a class="btn btn-primary readmore" href="blog-item.html">Read More <i class="fa fa-long-arrow-right"></i></a>-->
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
                                <div class="post_reply wow flipInX">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3><?php echo $comm->first_name;?></h3>
                                            <small><?php echo $comm->created_date;?></small>
                                            <p><?php echo $comm->comment;?></p>

                                        </div>
                                    </div>
                                    
                                    <div class="reply-icon" id="reply-com<?php echo $comm->comment_id?>" onclick="repCommentOn(<?php echo $comm->comment_id;?>)">
                                        <a href="javascript:void(0)"><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                    </div>
                                    
                                    
                                    <!----------------->
                                    <div class="comment-toggle" id="comment_toggle<?php echo $comm->comment_id?>">
                                        <div class="form-group">
                                            <label for="">Comment</label>
                                            <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc<?php echo $comm->comment_id?>" placeholder="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" onclick="reComment('<?php echo $comm->comment_id?>','<?php echo $comm->post_id ?>','<?php echo $comm->post_creator_id ?>')">Submit</button>
                                        </div>
                                    </div>
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
                    
                    
                    
          <!-- tab 1 end here -->

                    <div class="tab-pane fade" id="history">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="blog-content">
                                        <h3><a href="detail.html">1. Consequat bibendum quam</a></h3><br/>
                                        <div class="post-history">
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <p> <i class="fa fa-user"></i> <strong><a href=""> John Doe </a></strong> created the post   
                                                    <strong> 11:30AM, January 23th, 2018 </strong> </p>

                                                    <p> <i class="fa fa-user-plus"></i> <strong><a href=""> John Doe </a></strong> invited Amy Wang, Tom Cruise to be co-owners  
                                                    <strong> 11:30AM, January 23th, 2018 </strong> </p>

                                                     <p> <i class="fa fa-user"></i> <strong><a href=""> Tom Cruise </a></strong> became a co-owner of the post at  
                                                    <strong> 1:30PM, January 23th, 2018  </strong> </p>

                                                    <p> <i class="fa fa-calendar"></i> <strong><a href=""> John Doe </a></strong> updated the post,   
                                                    <strong> 10:30AM, January 24th, 2018 </strong> </p>

                                                    <p> <i class="fa fa-calendar"></i> <strong><a href=""> Tom Cruise </a></strong> updated the post,    
                                                    <strong> 10:30AM, January 26th, 2018 </strong> </p>


                                                    <p> <i class="fa fa-exchange"></i> Post ownership transfered to <strong> <a href=""> Jenny </a></strong> on  
                                                    <strong> 6 January, 2018 11:30am </strong> </p>

                                                    <p> <i class="fa fa-exchange"></i> John Doe transferred the ownership to <strong><a href=""> Jenny Shen </a></strong> 
                                                    <strong> 11:30AM, January 28th, 2018 </strong> </p>

                                                    <p> <i class="fa fa-user-plus"></i> <strong><a href=""> John Doe </a></strong> invited Amy Wang, Tom Cruise to be co-owners  
                                                    <strong> 11:30AM, January 23th, 2018 </strong> </p>

                                                    <p> <i class="fa fa-user"></i> <strong><a href=""> Tom Cruise </a></strong> became a co-owner of the post at  
                                                    <strong> 1:30PM, January 23th, 2018  </strong> </p>

                                                    <p> <i class="fa fa-calendar"></i> <strong><a href=""> John Doe </a></strong> updated the post,   
                                                    <strong> 10:30AM, January 24th, 2018 </strong> </p>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                    <!-- tab 2 end -->

                    <div class="tab-pane fade" id="analytics">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab">
                                        <nav class="tab-nav mini-tab no-collapse">
                                          <ul class="dragscroll">
                                            <li class="active"><a href="#analytic_tab1">Views</a></li>  
                                            <li><a href="#analytic_tab2">Followers</a></li>  
                                            <li><a href="#analytic_tab3">Helpful</a></li>  
                                          </ul>
                                        </nav>
                                        <div class="tab-pane active" id="analytic_tab1">
                                          <div class="blog-content">
                                              <h3 class="h3-heading"> Views</h3>
                                               <div id="container-dash" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                                          </div>
                                        </div>
                                        <div class="tab-pane" id="analytic_tab2">
                                            <div class="blog-content">
                                                <h3 class="h3-heading"> Followers</h3>
                                                <div id="container-dash2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="analytic_tab3">
                                            <div class="blog-content">
                                                <h3 class="h3-heading"> Helpful</h3>
                                                <div id="container-dash3" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- sub-tab func -->
<script type="text/javascript">
  $(function() {
  
  //show new panel function
  function ShowNewPanel(theLink, theTab, thePane) {
    //activate new pane
    theTab.find('.tab-pane.active').fadeOut(200, function() {
      $(this).removeClass('active');
      $(thePane).fadeIn(200, function() {
        $(this).addClass('active');
      });
    });
    
    //activate new link
    theTab.find('.tab-nav li').removeClass('active');
    theTab.find('.tab-nav a[href="'+thePane+'"]').parent('li').addClass('active');
  }
  
  //Using Tab Links
  $('.tab .tab-nav ul li a, a.tab-anchor').on('click', function() {
    var $theLink = $(this);
    var $theTab = $theLink.closest('.tab');
    var $thePane = $theLink.attr('href');
    ShowNewPanel($theLink, $theTab, $thePane)
  });
  
  
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#example').DataTable();
//    $('#reset').click(function(){ //button filter event click
//        $("#myInputTextField").val('');
//        oTable.ajax.reload();  //just reload table
//    });
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
    
    $(document).on("keypress", "input", function(e){
        if(e.which == 13){
            //console.log("You've entered: ");
            //return false;
            var cell_val = $(this).val();
            var sheet_cell = $(this).attr("cell");
            
            var new_cell = $(this).attr("col");
            
            if(new_cell == 'new_col' && typeof sheet_cell === 'undefined'){
                console.log(new_cell);
                console.log(sheet_cell);
                console.log('WW');
                //return false;
                $.ajax({
                    type: "POST",
                    url:"post/individual_post/addsheet_column",
                    data: {cell_val:cell_val},
                    //data: {cell_val:cell_val},
                    success: function(data){
                        if(data){
                            
                            $("#new_col").after(cell_val);
                            $("#new_col").remove();
                            //$("#sheet"+sheet_cell).html(cell_val);
                        }
                    },
                    error: function(){
                       alert("failure");
                    }
                });
                return false;
            }else{
                console.log(new_cell);
                console.log(sheet_cell);
                console.log('WW11');
                $.ajax({
                    type: "POST",
                    url:"post/individual_post/save_sheet",
                    data: {cell_val:cell_val,sheet_cell:sheet_cell},
                    //data: {cell_val:cell_val},
                    success: function(data){
                        if(data){
                            $("#sheet"+sheet_cell).html(cell_val);
                            //oTable.reload();
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
    
} );

function repCommentOn(comment_id){
    $("#comment_toggle"+comment_id).slideToggle();
}

function reComment(comment_id,post_id,post_creator_id){
    re_comment = $("#shot_desc"+comment_id).val();
    
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
    
    //console.log(re_comment);
}

function follow_posts(post_id,pcreator){
    $.ajax({
        type: "POST",
        url:"post/individual_post/follow_posts",
        data: {post_id:post_id,pcreator:pcreator},
        success: function(data){
            if(data=='true'){
                $('#isfollow').css('pointer-events','none');
                $("#isfollow").html("Followed");
            }
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

//function saveSheet(ele){
//    console.log('ss');
//    if(ele.key === 'Enter') {
//        //alert(ele.value);    
//        cell_val = ele.value;
//        console.log(cell_val);
//        $.ajax({
//            type: "POST",
//            url:"post/individual_post/save_sheet",
//            //data: {cell_val:cell_val,sheet_cell:sheet_cell},
//            data: {cell_val:cell_val},
//            success: function(data){
//                if(data){
//                    $("#sheet"+sheet_cell).html(cell_val);
//                }
//            },
//            error: function(){
//               alert("failure");
//            }
//        });
//    }
//}
</script>

