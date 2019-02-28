<div class="tabbed round">
    <ul>
        <li> <a href="dashboard/user_dashboard/all_posts" class="<?php if(!empty($all_posts)){ echo 'active'; } ?>">All Posts</a>
            <div class="add-interest">
                <span data-toggle="modal" data-target="#add_interest" onclick="addInterest()"> 
                    <i title="Choose Labels" class="fa fa-cog"></i>  
                </span>
            </div>
        </li>
        <li> <a id="mypst" href="dashboard/user_dashboard/my_posts" class="<?php if(!empty($my_posts)){ echo 'active'; } ?>" >My Posts</a></li>
        <li> <a id="followp" href="dashboard/user_dashboard/followed_posts" class="<?php if(!empty($followed_posts)){ echo 'active'; } ?>" >Followed Posts</a></li>
        <li> <a id="recentp" href="dashboard/user_dashboard/recentviewed_posts" class="<?php if(!empty($recentviewed_posts)){ echo 'active'; } ?>" >Recently Viewed</a></li>
        
    </ul>
</div>

<div class="modal fade" id="add_interest">
  
</div>