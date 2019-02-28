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
}else{
?>
<input type="hidden" class="nextpage" value="<?php echo '0';?>">
<?php
}
?>