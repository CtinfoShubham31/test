<div class="modal-dialog">
    <div class="modal-content"> 
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">User Viewed Post</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
      <!-- Modal body -->
        <div class="modal-body label-body">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if(!empty($user_lists)){
                        foreach($user_lists AS $ulists){
                    ?>
                    <h5 class="user-h5">
                        <i class="fa fa-user text-right"></i>  <?php echo $ulists->first_name.' '.$ulists->last_name;?>
                    </h5>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>