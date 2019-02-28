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
                    <div class="tab-pane fade active in" id="history">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="blog-content">
                                        <h3><a href="detail.html"><?php if(!empty($uposts->post_id) && $uposts->title){ echo $uposts->post_id.'. '.$uposts->title;  } ?></a></h3><br/>
                                        <div class="post-history">
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <?php 
                                                    if(!empty($post_hist)){
                                                        foreach($post_hist AS $phist){
                                                            
                                                            switch ($phist->history_type) {
                                                                case 1:
                                                                    echo '<p> <i class="fa fa-user"></i> <strong><a href=""> '.getCommaSepUser($phist->user_id).' </a></strong> created the post   
                                                                    <strong> '.$phist->date.'</strong> </p>';
                                                                    break;
                                                                case 2:
                                                                    echo '<p> <i class="fa fa-user-plus"></i> <strong><a href=""> '.getCommaSepUser($phist->user_id).' </a></strong> invited '.getCommaSepUser($phist->multi_user_ids).' to be co-owners 
                                                                    <strong> '.$phist->date.'</strong> </p>';
                                                                    break;
                                                                case 3:
                                                                    echo '<p> <i class="fa fa-user"></i>  '.getCommaSepUser($phist->user_id).' became a co-owner of the post at   
                                                                    <strong> '.$phist->date.'</strong> </p>';
                                                                    break;
                                                                case 4:
                                                                    echo '<p> <i class="fa fa-calendar"></i> <strong><a href=""> '.getCommaSepUser($phist->user_id).' </a></strong>updated the post,   
                                                                    <strong> '.$phist->date.'</strong> </p>';
                                                                    break;
                                                                case 5:
                                                                    echo '<p> <i class="fa fa-exchange"></i> Post ownership transferred to	
                                                                    <strong> <a href=""> '.getCommaSepUser($phist->multi_user_ids).'  </a></strong> on  
                                                                    <strong> '.$phist->date.'</strong> </p>';
                                                                    break;
                                                                case 6:
                                                                    echo '<p> <i class="fa fa-exchange"></i> '.getCommaSepUser($phist->user_id).' transferred the ownership to <strong><a href=""> '.getCommaSepUser($phist->multi_user_ids).' </a></strong>
                                                                    <strong> '.$phist->date.' </strong> </p>';
                                                                    break;
                                                                case 7:
                                                                    echo '<p> <i class="fa fa-exchange"></i> Post ownership transferred to	
                                                                    <strong> <a href=""> '.getCommaSepUser($phist->multi_user_ids).'  </a></strong> on  
                                                                    <strong> '.$phist->date.'</strong> </p>';
                                                                    break;
                                                                case 8:
                                                                    echo '<p> <i class="fa fa-exchange"></i> Super user transferred the ownership to <strong><a href=""> '.getCommaSepUser($phist->multi_user_ids).' </a></strong>
                                                                    <strong> '.$phist->date.' </strong> </p>';
                                                                    break;
                                                                
                                                            }
                                                    ?>
                                                    
                                                    <?php
                                                        }
                                                    }
                                                    ?>

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
    </div>

</section>    
<script type="text/javascript" src="js/custom_lazy_load.js"></script>