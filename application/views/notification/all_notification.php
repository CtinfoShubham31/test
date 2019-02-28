<section id="post" class="post-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="add-post">
                    <h3 class="h3-heading">Notification</h3>
                    <img src="images/ajax-loader.gif" id="loading" style="left: 35%;position: fixed;top:50%; z-index: 9999; display: none;">
                    <ul class="drop-notif notif-page" id="list_notif">
                        <?php
                        if(!empty($all_notif)){
                            foreach($all_notif AS $notif){
                        ?>
                        <li class="notif-comment">
                            <?php
                            if(!empty($notif->post_id)){
                            ?>
                            <a href="post/individual_post/post_details/<?php echo base64_encode($notif->post_id)?>">
                            <?php
                            }
                            else if($notif->label_id){
                            ?>
                            <a href="dashboard/user_dashboard/manage_label">
                            <?php
                            }
                            else{
                            ?>
                            <a href="javascript:void(0)">
                            <?php
                            }
                            ?>
                                <img src="img/avatar3.png" class="notif-box">
                                <div class="comment">
                                    <span class="name">
                                        <?php 
                                        if(checkIsUserSuper($notif->notify_by)){
                                            echo 'Super user';
                                        }else{
                                            echo $notif->first_name.' '.$notif->last_name;
                                        }
                                        ?>
                                    </span> 
                                        <?php 
                                        echo $notif->notification_msg;
//                                        if($notif->label_id){
//                                            echo $notif->notification_msg.' - '.$notif->label_name;
//                                        }else{
//                                            echo $notif->notification_msg.' - '.$notif->title;
//                                        }
                                        ?>
                                </div>
                                <?php 
                                //if($notif->notification_msg_id == 4 && $notif->label_btn_status != 1){
                                ?>
<!--                                <p class="request-btn" id="btnhide<?php //echo $notif->notification_id; ?>">
                                    <button class="btn btn-success" type="button" onclick="merge_status('<?php //echo $notif->label_id; ?>','2','<?php //echo $notif->notification_id; ?>')">  Accept </button>
                                    <button class="btn btn-danger" type="button" onclick="merge_status('<?php //echo $notif->label_id; ?>','3''<?php //echo $notif->notification_id; ?>')"> Decline </button>
                                </p>-->
                                <?php
                                //}
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
                    </ul>
                </div>
            </div>
        </div>
    </div>   
</section>

<script type="text/javascript">
    
    function merge_status(label_id,status,notification_id){
        $.ajax({
            type: "POST",
            url:"dashboard/user_dashboard/merge_status",
            data: {label_id:label_id,status:status,notification_id:notification_id},
            success: function(data){
                $("#btnhide"+notification_id).remove();
            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    $(window).scroll(function(){
        //var lastID = $('.load-more').attr('lastID');
        var page = $('#list_notif').find('.nextpage').val();
        //var orderbydata = $('#list_notif').find('.orderbydata').val();
       // var searchpost = $('#searchpost').val();
        //console.log(searchpost);
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (page != 0)){
            $.ajax({
                type:'POST',
                url:"notification/user_notification/ajax_all_notification",
                data:{page:page},
                beforeSend:function(){
                    $('#loading').show();
                },
                success:function(response){
                    if(response){
                        $('#list_notif').find('.nextpage').remove();
                        $('#loading').remove();
                        $('#list_notif').append(response);
                    }
                }
            });
        }
    });
    
    
</script>
