<?php
if(!empty($all_notif)){
    foreach($all_notif AS $notif){
?>
<li class="notif-comment">
    <a href="javascript:void(0)">
        <img src="img/avatar3.png" class="notif-box">
        <div class="comment">
            <span class="name"><?php echo $notif->first_name.' '.$notif->last_name;?></span> 
                <?php 
                if($notif->label_id){
                    echo $notif->notification_msg.' - '.$notif->label_name;
                }else{
                    echo $notif->notification_msg.' - '.$notif->title;
                }
                ?>
        </div>
        <?php 
        if($notif->notification_msg_id == 4 && $notif->label_btn_status != 1){
        ?>
        <p class="request-btn" id="btnhide<?php echo $notif->notification_id; ?>">
            <button class="btn btn-success" type="button" onclick="merge_status('<?php echo $notif->label_id; ?>','2','<?php echo $notif->notification_id; ?>')">  Accept </button>
            <button class="btn btn-danger" type="button" onclick="merge_status('<?php echo $notif->label_id; ?>','3''<?php echo $notif->notification_id; ?>')"> Decline </button>
        </p>
        <?php
        }
        ?>
        <span class="pull-right text-right time"><?php echo $notif->created_date;?></span>

    </a>
</li>
<?php
    }
?>
<input type="hidden" class="nextpage" value="<?php echo $page+1;?>">
<?php

}
?>