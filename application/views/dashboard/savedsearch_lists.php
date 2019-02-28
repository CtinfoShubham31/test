<div class="modal-dialog">
    <div class="modal-content"> 
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Saved Search</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
      <!-- Modal body -->
        <div class="modal-body label-body">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if(!empty($saved_search_lists)){
                        foreach($saved_search_lists AS $saved_search){
                    ?>
                    <div class="relative" id="delsaved<?php echo $saved_search->save_search_id;?>">
<!--                    <a href="javascript:;" onclick="search_saved('<?php //echo $saved_search->search_keyword;?>')">-->
                        <a href="javascript:;" onclick="search_saved('<?php echo $saved_search->save_search_id;?>')">
                            <h5 class="search-title">
                                <i class="fa fa-search text-right"></i>  <?php echo $saved_search->search_keyword;?>
                            </h5>
                        </a>
                        <i class="fa fa-pencil delete-icon edit-search-icon" onclick="advEditSearchPopup(<?php echo $saved_search->save_search_id;?>)" data-toggle="modal" data-target="#edit_search"> </i>
                        <i class="fa fa-trash delete-icon" onclick="deleteSavedSearch(<?php echo $saved_search->save_search_id;?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
