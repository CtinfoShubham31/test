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
            <div class="blog-content">
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
                            <div class="pop1" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','1')" id="help<?php echo $uposts->post_id.'_1';?>"><i class="em em---1"></i> (<?php echo helpfulCount($uposts->post_id,1);?>)
                                <div class="pop1-hover">Thank You</div>
                            </div>
                            <div class="pop1 pop2x" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','2')" id="help<?php echo $uposts->post_id.'_2';?>"><i class="em em---1"></i> (<?php echo helpfulCount($uposts->post_id,2);?>)
                                <div class="pop1-hover">Made My Day</div>
                            </div>
                            <div class="pop1 pop3x" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','3')" id="help<?php echo $uposts->post_id.'_3';?>"><i class="em em---1"></i> (<?php echo helpfulCount($uposts->post_id,3);?>)
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
                </div>
<!--                <a href="post/manage_post/edit_post/<?php echo base64_encode($uposts->post_id);?>">
                    <div class="edit-icon"><i class="fa fa-pencil" title="Edit Post"></i> </div>
                </a> -->
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
<!--                                        <div class="update-circle"></div>-->
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
<input type="hidden" class="nextpage" value="<?php echo '0';?>">
<p style="text-align:center;font-weight:bold;font-size:20px;">Finished</p>
<?php
}
?>