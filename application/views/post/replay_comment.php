<div class="post_reply_inner wow flipInX" id="rmv<?php echo $reply_comm[0]->comment_id;?>">
    <div class="row">
        <div class="col-md-12">
            <h3><?php if(!empty($reply_comm[0]->first_name)){ echo $reply_comm[0]->first_name; }?></h3>
            <small><?php if(!empty($reply_comm[0]->created_date)){ echo $reply_comm[0]->created_date; }?></small>
            <p id="commtext<?php echo $reply_comm[0]->comment_id;?>"><?php if(!empty($reply_comm[0]->comment)){ echo $reply_comm[0]->comment; }?></p>
            
            <div class="reply-icon">
                <a href="javascript:void(0)">
                    <?php
                    if($reply_comm[0]->commented_by == $this->session->userdata('kaseidon_user_id')){
                    ?>
                    <i onclick="updateCommentOn(<?php echo $reply_comm[0]->comment_id;?>)" class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>&nbsp;
                    <i onclick="deleteComment(<?php echo $reply_comm[0]->comment_id;?>)" class="fa fa-trash" data-placement="top" title="Delete"></i>&nbsp;
                    <?php
                    }else{
                    ?>
                    <i onclick="repCommentOn(<?php echo $reply_comm[0]->comment_id;?>)" class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i>&nbsp;
                    <?php
                    }
                    ?>
                </a>
            </div>

            
            <?php
                if($reply_comm[0]->commented_by == $this->session->userdata('kaseidon_user_id')){
                ?>
                <div class="comment-toggle" id="comment_toggle<?php echo $reply_comm[0]->comment_id?>">
                    <div class="form-group">
                        <label for="">Comment</label>
                        <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc<?php echo $reply_comm[0]->comment_id?>" placeholder="Description"><?php echo $reply_comm[0]->comment;?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" onclick="upComment('<?php echo $reply_comm[0]->comment_id?>','<?php echo $reply_comm[0]->post_id ?>','<?php echo $reply_comm[0]->post_creator_id ?>')">Update</button>
                        <a href="javascript:;" class="btn newpost_btn" onclick="updateCommentOn(<?php echo $reply_comm[0]->comment_id;?>)">Cancel</a>
                    </div>
                </div>
                <?php
                } 
                else{
                ?>
                <div class="comment-toggle" id="comment_toggle<?php echo $reply_comm[0]->comment_id?>">
                    <div class="form-group">
                        <label for="">Comment</label>
                        <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc<?php echo $reply_comm[0]->comment_id?>" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" onclick="reComment('<?php echo $reply_comm[0]->comment_id?>','<?php echo $reply_comm[0]->post_id ?>','<?php echo $reply_comm[0]->post_creator_id ?>')">Submit</button>
                        <a href="javascript:;" class="btn newpost_btn" onclick="repCommentOn(<?php echo $reply_comm[0]->comment_id;?>)">Cancel</a>
                    </div>
                </div>
                <?php
                }
                ?>
            
            
            <div class="comment-toggle" id="comment_toggle<?php if(!empty($reply_comm[0]->comment_id)){ echo $reply_comm[0]->comment_id; }?>">
                <div class="form-group">
                    <label for="">Comment</label>
                    <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc<?php if(!empty($reply_comm[0]->comment_id)){ echo $reply_comm[0]->comment_id; }?>" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <button onclick="reComment('<?php echo $reply_comm[0]->comment_id?>','<?php echo $reply_comm[0]->post_id ?>','<?php echo $reply_comm[0]->post_creator_id ?>')" class="btn btn-primary" required="required">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>