<div class="tabbed round">
    <ul>
       <li> <a href="post/individual_post/post_details/<?php echo $seg = $this->uri->segment(4)?>" class="<?php if(!empty($post_detail)){ echo 'active'; } ?>" >Post</a></li>
       <li> <a href="post/individual_post/posts_history/<?php echo $seg = $this->uri->segment(4)?>" class="<?php if(!empty($post_history)){ echo 'active'; } ?>">History</a></li>
       <li> <a href="post/analytics/postview_analytics/<?php echo $seg = $this->uri->segment(4)?>" class="<?php if(!empty($analytic_view)){ echo 'active'; } ?>">Analytics</a></li>
    </ul>
</div>