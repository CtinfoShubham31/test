<div id="page-wrapper">
    <div class="row">
       
        <div class="col-lg-12">
            <h1 class="page-header"> </h1>
            <div class="blog-content relative">
                                       
                                        
                                        
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <h3><a href="javascript:;" style="pointer-events: none;"><?php echo $uposts->post_id.'. '.$uposts->title?></a></h3>
                    </div>
                    
                </div>
                <div class="post-user"> 
                    <p>
                        <span><i class="fa fa-user"></i> <a href="javascript:;" style="pointer-events: none;"><?php if(!empty($uposts->first_name)){ echo $uposts->first_name.' '.$uposts->last_name;}?></a></span> &nbsp; 
                        <span><i class="fa fa-calendar"></i>&nbsp;<?php echo date("d F, Y", strtotime($uposts->created_date));?></span>
                    </p>
                    <span> Co-Owners: 
                        <a href="javascript:;" style="pointer-events: none;"> 
                            <?php coOwners($uposts->co_owners);?>
                        </a>  
                    </span>
                </div>
                <p><?php echo $uposts->short_description; ?></p>
                <div class="tag-list">
                    <ul>
                        <?php
                        if(!empty($uposts->tagged_labels)){

                            if(strpos($uposts->tagged_labels, ',') !== false ) {
                                $tagg_results = explode(',', $uposts->tagged_labels);
                               // print_r($tagg_results);die;
                                foreach($tagg_results AS $tgresult){
                        ?>
                                    <li><a href="javascript:;"><?php taggedLabels($tgresult);?></a></li>
                        <?php
                                }
                            }
                            else{
                        ?>
                                <li><a href="javascript:;"><?php taggedLabels($uposts->tagged_labels);?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <hr>

                <?php
                if($uposts->post_type == 4){
                ?>
                <div class="col-md-12">
                    <div class="form-group" id="calendar"></div>
                </div>
                <?php
                }
                ?>
                                        
                <?php
                if($uposts->post_type == 5){
                ?>
                <div class="col-md-12">
                    <div class="form-group" id="timeplanner">
                        <div class="dx-viewport demo-container">
                            <div id="scheduler"></div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                                        
                <?php
                if(!empty($uposts->detail_description) && $uposts->post_type == 2){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="editor-img">
                        <?php if(!empty($uposts->detail_description)){ echo $uposts->detail_description; }?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

                <?php
                if(!empty($graphics_data) && $uposts->post_type == 3){
                ?> 
                <div class="row">
                    <div class="col-md-12">
                        <h4>Graphic</h4>
                    </div>

                    <?php
                    foreach($graphics_data AS $gdata){
                    ?>
                    <div class="col-sm-3">
                        <div class="img-sec">
                            <center><img src="upload/graphics/<?php echo $gdata->graphic;?>" class="img-responsive"/></center>
                        </div>
                    </div>
                    <?php
                    }

                    ?>

                </div>
                <?php
                }
                ?>
                <div class="clearfix"></div>
                                        
                <div class="row">
                    <?php
                    if(!empty($attachm_data)){
                    ?>
                    <div class="col-md-12">
                        <h3>Attachment</h3>
                    </div>
                    <?php
                        foreach($attachm_data AS $atthdata){

                    ?>
                    <div class="col-sm-2" onclick="downloadAttachment('<?php echo $atthdata->attachment;?>')">
                        <div class="attach-file">
                            <center><i class="fa fa-paperclip "></i> 
                                <p><a href="post/individual_post/download_attachm?file=<?php echo $atthdata->attachment;?>" ><?php echo $atthdata->attachment;?></a></p>
                            </center>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>

                </div>
                <div class="clearfix"></div>
                                        
                <?php
                if($uposts->post_type == 1){
                ?> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-30">
                            <input type="hidden" id="list_count" value="<?php if(!empty($lists_data)){ echo COUNT($lists_data);}?>">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr id="theadrow">
<!--                                                                    <th>#</th>-->
                                            <?php 
                                            $alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                                            if(!empty($lists_data[0])){
                                                //echo COUNT($lists_data[0]);die('QQ');
                                                for($p = 0;$p <= COUNT($lists_data[0])-1;$p++){
                                            ?>
                                                <?php //if(!empty($lists_data[0][$p])){?> <th id="sheet<?php echo $alpha_arr[$p].'1';?>" ><?php echo $lists_data[0][$p];?></th><?php  //}?>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyrow">
                                        <?php
                                        if(!empty($lists_data)){
                                            //print_r($lists_data);die;

                                            for($m = 1;$m <= COUNT($lists_data)-1;$m++){
                                        ?>
                                            <tr>
<!--                                                                        <td><i class="fa fa-trash" data-original-title="Delete" style="cursor:pointer"></i></td>-->
                                        <?php
                                                for($s = 0; $s <= COUNT($lists_data[$m])-1; $s++){
                                        ?>
                                                <?php if(!empty($lists_data[$m][$s])){?> <td id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>" ><?php echo $lists_data[$m][$s];?></td><?php  }else{?><td cell="<?php echo $alpha_arr[$s].''.($m+1);?>" id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>"></td><?php }?>
                                        <?php
                                                }
                                        ?> 
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

<!--                <div class="bottom-box">
                    <span class="help-pop">
                        <button type='button' class="tab-btn like-btn" id="like-btn"> 
                            <i class='fa fa-thumbs-up'></i> Helpful
                        </button>
                        <span class="span-pop">
                            <div class="pop1" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','1')" id="help<?php echo $uposts->post_id.'_1';?>"><i class="em em-slightly_smiling_face"></i> (<?php echo helpfulCount($uposts->post_id,1);?>)
                                <div class="pop1-hover">Thank You</div>
                            </div>
                            <div class="pop1" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','2')" id="help<?php echo $uposts->post_id.'_2';?>"><i class="em em---1"></i> (<?php echo helpfulCount($uposts->post_id,2);?>)
                                <div class="pop1-hover">Made My Day</div>
                            </div>
                            <div class="pop1" onclick="helpful_mark('<?php echo $uposts->post_id;?>','<?php echo $uposts->post_creator_id;?>','3')" id="help<?php echo $uposts->post_id.'_3';?>"><i class="em em-ok_hand"></i> (<?php echo helpfulCount($uposts->post_id,3);?>)
                                <div class="pop1-hover">Life Saving</div>
                            </div>
                        </span>
                    </span>
                    <button class="tab-btn"><a href=""><span class="fa fa-user-plus"></span> Followers (<?php echo followedCount($uposts->post_id);?>)</a></button>
                    <button class="tab-btn"><a href=""><span class="fa fa-eye"></span> Views (<?php echo viwedCount($uposts->post_id);?>)</a></button>
                    <button class="tab-btn pull-right"><a href=""><span class="fa fa-comment"></span> Comments (<?php echo commentCount($post_id)?>)</a></button>
                </div> -->
            </div>
        </div>
        <!-- /.col-lg-12 -->
        
    </div>

</div>


<script type="text/javascript" src="js/custom_lazy_load.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#example').DataTable({
        /* Disable initial sort */
        "aaSorting": []
    });

    ////////////////////CALENDAR START/////////////////////////////////////////////
    var calendar = $('#calendar').fullCalendar({
        header:{
            left:'prev,next today',
            center:'title',
            right:'listYear,month,agendaWeek,agendaDay'
        },
        //events: 'post/manage_post/getcalendar_post',        //LOAD
        events: {
            url: 'post/manage_post/getcalendar_post',
            data: function () { // a function that returns an object
                return {
                    post_id: <?php echo $pstid = base64_decode($this->uri->segment(4));?>,
                    ctype:1,
                };

            }
        },
        titleRangeSeparator:'-',
        displayEventTime: false
    });
////////////////////CALENDAR END/////////////////////////////////////////////
    
} );



function downloadAttachment(attachment){
    location.href = "post/individual_post/download_attachm?file="+attachment;
}


</script>
<?php
if(!empty($uposts->post_type) && $uposts->post_type == 5){
?> 
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script>
   var jq3 = jQuery.noConflict();
   //alert("Version: "+jq3.fn.jquery);
</script>
<script type="text/javascript" src="js/dx.all.js"></script>

<script>
    $(document).ready(function(){
        var schedulerDataSource = new DevExpress.data.DataSource({

            paginate: false,
            load: function(loadOptions) {
                var d = $.Deferred(),
                params = {};
                if("filter" in loadOptions && isNotEmpty(loadOptions["filter"])) 
                    params[i] = JSON.stringify(loadOptions[i]);       
                return data;
            },
                        
        });
                    
                
        jq3("#scheduler").dxScheduler({         
            views: ["timelineDay", "timelineWeek"],
            //views: ["timelineWeek"],
            currentView: "timelineDay",
            currentDate: new Date(),
            firstDayOfWeek: 0,
            startDayHour: 8,
            endDayHour: 20,
            cellDuration: 60,
            width: "100%",
            height: 580
        });

        setTimeout(function() {
            // Computing start and end hour
            var startDayHour = 24,
            endDayHour = 0;
            data.forEach(function(item) {
                // Start
                //console.log(item);
                if (item.startDate.getHours() < startDayHour) {
                  startDayHour = item.startDate.getHours();
                }
                // End
                if (item.endDate.getHours() >= endDayHour) {
                  endDayHour = item.endDate.getMinutes() > 0
                    ? item.endDate.getHours() + 1
                    : item.endDate.getHours();
                }
            });

            //console.log(startDayHour, endDayHour);
            var scheduler = jq3("#scheduler").dxScheduler("instance").option({
                dataSource: schedulerDataSource,
                startDayHour: startDayHour,
                /*  remoteFiltering: true,*/
                endDayHour: endDayHour,
                groups: ["priority"],
                resources: [       
                    {
                      fieldExpr: "priority",
                      allowMultiple: false,
                      dataSource: priorityData,
                      label: "Module name"
                    }
                ]
            });

            setTimeout(function() {
              //console.log("Repainting");
              jq3("#scheduler").dxScheduler("instance").repaint();
            }, 500);
        }, 500);
                  
               
        var priorityData = <?php echo $item;?>;
        var data = <?php echo $data;?>;
        var da = [];
        var myarray=[];
        $.each(data, function(key, val) {
          var arr = {   
              'id': val.id, 
              'text' : val.text,
              'startDate' :new Date(val.startDate),
              'endDate' : new Date(val.endDate),
              'priority' : parseInt(val.priority) ,
              'description' : val.description,

            }      
              myarray.push(arr);                
        });   
        data = myarray;
                    
    });
</script>
<?php 
}
?>