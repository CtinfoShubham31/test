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
<!--                <div class="tabbed round">
                    <ul>
                        <li href="#analytics" data-toggle="tab" aria-expanded="false" class="">Analytics</li>
                        <li href="#history" data-toggle="tab" aria-expanded="false" class="">History</li>
                        <li href="#content" data-toggle="tab" aria-expanded="true" class="active">Post</li>
                    </ul>
                </div>-->
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
                                            //print_r($this->session->all_userdata());
                                            //echo $uposts->post_creator_id;die;
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
                                            <div class="col-md-12">
                                                <h3>Attachment</h3>
                                            </div>
                                            <?php
                                            if(!empty($attachm_data)){
                                                foreach($attachm_data AS $atthdata){
                                                    
                                            ?>
                                            <div class="col-sm-3">
                                                <div class="attach-file">
                                                    <center><i class="fa fa-paperclip "></i> 
                                                        <p><a href="post/individual_post/download_attachm?file=<?php echo $atthdata->attachment;?>" target="_new"><?php echo $atthdata->attachment;?></a></p>
                                                    </center>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Graphic</h4>
                                            </div>
                                            
                                            <?php
                                            if(!empty($graphics_data)){
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
                                            
                                            <div class="top-30">
                                                <div class="col-md-12">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <p class="small"> <i class="fa fa-calendar"></i> <span>Last Updated:</span> 3 may, 2018</p>
                                            </div>
                                        </div>
                    
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
                                            <button class="tab-btn pull-right"><a href=""><span class="fa fa-comment"></span> Comments (31)</a></button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
            <!--/.blog-item-->
                        <div class="comment-box">
                            <h2> Leave a Comment</h2>
                            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Type comment here.."></textarea>
                                        </div>                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" required="required">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>    
                            <h2 id="comment_id">View Comments(3)</h2>
                            <div class="comment-show">
                                
                                <div class="post_reply wow flipInX">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Jenny</h3>
                                            <small>May 9, 2016 at 9:15 pm</small>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                        </div>
                                    </div>
                                    <div class="reply-icon">
                                        <a href=""><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                    </div>
                                </div> 
                                
                                <div class="post_reply wow flipInX">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Marsh</h3>
                                            <small>May 12, 2016 at 9:15 pm</small>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                        </div>
                                    </div>
                                    
                                    <div class="reply-icon">
                                        <a href=""><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                    </div>
                                    <div class="post_reply_inner wow flipInX">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Jenny</h3>
                                                <small>May 12, 2016 at 9:15 pm</small>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                                <div class="reply-icon">
                                                   <a href=""><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post_reply_inner wow flipInX">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Menny</h3>
                                                    <small>May 12, 2016 at 9:15 pm</small>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                                    <div class="reply-icon">
                                                        <a href=""><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="post_reply_inner wow flipInX">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Jenny</h3>
                                                        <small>May 12, 2016 at 9:15 pm</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                                        <div class="reply-icon">
                                                           <a href=""><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post_reply_inner wow flipInX">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h3>Jenny</h3>
                                                            <small>May 12, 2016 at 9:15 pm</small>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                                            <div class="reply-icon">
                                                               <a href=""><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div> 
                                        
                                        
                                        
                                    </div> 
                                </div> 
                                
                                <div class="post_reply wow flipInX">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Michael</h3>
                                            <small>May 15, 2016 at 9:15 pm</small>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                        </div>
                                    </div>
                                    <div class="reply-icon">
                                        <a href=""><i class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i></a>
                                    </div>
                                </div> 
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
    $('#example').DataTable();
    
    $("#comment_id").click(function(){
        $ (".comment-show").slideToggle();
    });
} );

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
</script>

