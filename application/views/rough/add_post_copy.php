<section id="post" class="post-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="add-post">
                    <h3 class="h3-heading"> Add Post</h3>
                    <form method="post" enctype="multipart/form-data">    
                        <div class="row">
                            
                            <?php 
                                if($this->session->flashdata('success_msg')){ 
                            ?>            
                                <div class="alert alert-success" id="fadeout">
                                    <a href="#" class="close" data-dismiss="alert"></a>
                                    <?php echo $this->session->flashdata('success_msg'); ?>
                                </div>
                            <?php       
                                }
                                else if($this->session->flashdata('error_msg')){
                                ?>
                                    <div class="alert alert-danger" id="fadeout">
                                        <a href="#" class="close" data-dismiss="alert"></a>
                                        <?php echo $this->session->flashdata('error_msg'); ?>
                                    </div>
                            <?php            
                                }
                            ?>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Post Type</label>
                                    <select id="post_type" name="post_type" class="form-control">
                                        <option value="">Select Post Type</option>
                                        <option ptype = "list" value="1" <?php echo set_select('post_type',1); ?>>List</option>
                                        <option ptype = "text" value="2" <?php echo set_select('post_type',2); ?>>Text</option>
                                        <option ptype = "graphic" value="3" <?php echo set_select('post_type',3); ?>>Graphic</option>
                                        <option ptype = "calendar" value="4" <?php echo set_select('post_type',4); ?>>Calendar</option>
                                        <!--<option ptype = "timeline" value="5" <?php //echo set_select('post_type',5); ?>>Timeline Planner</option>-->
                                    </select>
                                    <?php echo form_error('post_type', '<span class="error_msg">', '</span>'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="type" name="title" id="title" class="form-control" placeholder="Title">
                                    <?php //echo form_error('title', '<p class="error_msg">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="content_request_status" name="content_request_status" type="checkbox" value="1">
                                        <label for="content_request_status"> 
                                            <strong>Content Request </strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Co-owner</label>
<!--                                    <select name="co_owner[]" id="co_owner" data-placeholder="Select Co-owner..." class="chosen-select form-elect edit-input" multiple style="width:100%;" tabindex="4">-->
                                    <select name="co_owner[]" id="co_owner" data-placeholder="Select Co-owner..." class="3col active form-elect edit-input" multiple style="width:100%;" tabindex="4">
                                        <?php 
                                        if(!empty($select_co_owners)){
                                            foreach ($select_co_owners as $codata) {
                                        ?>
                                        <option value="<?php echo $codata->user_id;?>"><?php echo $codata->first_name.' '.$codata->last_name;?></option>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <ul class="tag-cloud" id="append_label">
                                    <!----Dynamically append tagged----->
                                </ul>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tag Labels</label>
                                    <select onchange="tagged_lables(this.value)" id="tgid" class="chosen-select form-elect edit-input" style="width:100%;" tabindex="4">
                                        <option value="">Select Lables</option>
                                        <option style="color:#222;font-weight: 600" value="createlab">Create Labels</option>
                                        <option style="color:#222;font-weight: 600" value="managelab">Manage Lables</option>
                                        <?php labelTree();?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Visibilty</label>
<!--                                    <select name="co_owner[]" id="co_owner" data-placeholder="Select Co-owner..." class="chosen-select form-elect edit-input" multiple style="width:100%;" tabindex="4">-->
                                    <select name="visibility[]" id="visibility" data-placeholder="Select Visibility..." class="3col active form-elect edit-input" multiple style="width:100%;" tabindex="4">
                                        <?php 
                                        if(!empty($visibility_setting)){
                                            foreach ($visibility_setting as $visible) {
                                        ?>
                                        <option value="<?php echo $visible->user_id;?>"><?php echo $visible->first_name.' '.$visible->last_name;?></option>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea class="form-control" rows="5" name="short_description" id="short_description" placeholder="Description"></textarea>
                                    <?php //echo form_error('short_description', '<p class="error_msg">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="col-md-6" id="post_list_type" style="display:none;">
                                <div class="form-group">
                                    <label for="">Lists Type</label>
                                    <select id="list_type" name="list_type" class="form-control" onchange="listTypeMethod(this.value)">
                                        <option value="">Select List Type</option>
                                        <option value="1" <?php echo set_select('list_type',1); ?>>Make Table By File</option>
                                        <option value="2" <?php echo set_select('list_type',2); ?>>Make Table Manually</option>
                                    </select>
                                    <?php //echo form_error('list_type', '<span class="error_msg">', '</span>'); ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="col-md-12" id="post_list_file" style="display:none;">
                                <div class="form-group">
                                    <input class="browse-btn" type="file" name="list" id="list">
                                    <?php echo form_error('list','<span class="error_msg">','</span>'); ?>
                                    <p class="xls-txt small"> (Allow only xls, xlsx & csv file.)</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="box" id="table_list">
                                <div class="clearfix"></div> <hr>
                                <div class="col-md-12">
                                    <div class="item-inline">
                                    <input class="newpost_btn" type="button" onclick="appendColumn()" value="Add Column">
                                    <input class="newpost_btn" type="button" value="Add Row" onclick="appendRow()">
                                    <input class="newpost_btn" type="button" value="Delete Rows" onclick="removeTableMultipleRow()">
<!--                                    <input class="newpost_btn" type="button" onclick="addTableContentPopup()" value="Add Column & Row">-->
                                
                                    <input type="hidden" id="list_count" value="1<?php //if(!empty($lists_data)){ echo COUNT($lists_data);}?>">
                                    <span class="small">(First row here considered as column header)</span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">

                                        </table>
                                    </div>
                                </div>
                                
                                
                                <div class="clearfix"></div>


                            </div>

                            <div class="text box">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="20" name="detail_description" id="detail_description" placeholder="Text Editor"></textarea>
                                        <?php //echo form_error('detail_description', '<p class="error_msg">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>


                            </div> <!-- text box -->


                            <div class="graphic box">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Upload Image<span class="instruction">(Use CTRL key for multiple selections)</span></label>
<!--                                        <form enctype="multipart/form-data">
                                            <input id="file-fr" name="file-fr[]" type="file" multiple>
                                        </form>-->
                                            <input id="file-fr" name="graphics[]" class="file" type="file" multiple>
                                    </div>
                                </div>
                                <?php echo form_error('graphics[]','<span class="error_msg">','</span>'); ?>
                                <div class="clearfix"></div>


                            </div> <!-- graphic box -->
                            <div class="clearfix"></div>

                            <div class="calendar box">


                                <div class="col-md-12">
                                    <div class="form-group" id="calendar">

                                    </div>
                                </div>

<!--                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div id="calendar" class="has-toolbar"></div>
                                    </div>
                                </div>-->
                                <div class="clearfix"></div>

                            </div> <!-- calendar box -->


                            <div class="timeline box">
                                <div class="col-md-12"></div>
                                <div class="clearfix"></div>
                            </div>
                            <br>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Attachment <span class="instruction">(Use CTRL key for multiple selections)</span></label>
<!--                                    <form enctype="multipart/form-data">-->
                                    <div class="form-group">
                                        <input id="file-5" name="attachment[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
                                    </div>
<!--                                    </form>-->
                                </div>
                            </div>
                            <?php echo form_error('attachment[]','<span class="error_msg">','</span>'); ?>
                        </div> 
                        <div class="clearfix"></div> 

                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary search-btn btn-lg" type="submit"> Submit </button>
                            <a href="dashboard/user_dashboard/all_posts" class="btn newpost_btn btn-lg">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
                
        </div>
    </div>
</section>

<div class="modal fade" id="add_label">
    
</div>


<script type="text/javascript" src="js/fileinput.js"></script>

<!-- img upload -->
<script type="text/javascript">
    
function tagged_lables(label_id){
    console.log(label_id);
    if(label_id == 'createlab'){
        addLabel();
    }else if(label_id == 'managelab'){
        
    }else{
    
        $.ajax({
            type: "GET",
            url:"post/manage_post/tagged_lables",
            data: {label_id:label_id},
            //dataType: "json",
            success: function(data){
                //console.log(data);
                if(typeof data == "string" && data != 'false'){
                //var str = "L1/L2/L51/";
                    if($("#tagged_labels"+label_id).val() != label_id){
                        str = data.slice('/', -1); // "12345.0"
                        $("#append_label").append("<li id='tglabel"+label_id+"'><input type='hidden' name='tagged_labels[]' id='tagged_labels"+label_id+"' value='"+label_id+"'><a href='javascript:;' style='pointer-events: none;'>"+str+"</a><div class='close-label'><i class='fa fa-times-circle' onclick='removeTaggedLabel("+label_id+")'></i></div></li>")
                        //alert(str);
                    }
                }
            },
            error: function(){
               alert("failure");
            }
        });
    
    }
}

function removeTaggedLabel(label_id){
    $("#tglabel"+label_id).remove();
}

function addLabel(){
    $.ajax({
        type: "POST",
        url:"post/manage_post/addlabel",
        data: {popup:1},
        success: function(data){
            $("#add_label").html(data);
            $("#add_label").modal('show');
        },
        error: function(){
           alert("failure");
        }
    });
}

function listTypeMethod(list_type){
    if(list_type == 1){
        $("#post_list_file").show();
        $("#table_list").hide();
    }
    else if(list_type == 2){
        $("#post_list_file").show();
        $("#table_list").hide();
        $("#post_list_file").hide();
        $("#table_list").show();  
        
        $("#example").html('<thead><tr id="theadrow"></tr></thead><tbody id="tbodyrow"></tbody>'); 
    }
    else{
        $("#post_list_file").hide();
        $("#table_list").hide();
    }
    
}

function addTableContentPopup(){
    $.ajax({
        //type: "POST",
        url:"post/manage_post/addtable_colrow",
        //data: {col_no:col_no,row_no:row_no},
        success: function(response){
            $("#add_label").html(response);
            $("#add_label").modal('show');
            $("#table_list").show();
        },
        error: function(){
           alert("failure");
        }
    });
}

function loadTableContent(){
    col_no = $("#col_no").val();
    row_no = $("#row_no").val();
    
    $.ajax({
        type: "POST",
        url:"post/manage_post/loadtable_content",
        data: {col_no:col_no,row_no:row_no},
        success: function(data){
            $("#example").html(data);
            $("#add_label").modal('hide');
            $("#table_list").show();
        },
        error: function(){
           alert("failure");
        }
    });
}

function removeTableRow(trow){
//    if(confirm("Are you sure you want to remove it?")){}
    $("#delsheet"+trow).remove();
}


    
    $('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        //allowedFileExtensions : ['jpg', 'png','gif'],
    });
    $("#file-5").fileinput({
        //'allowedFileExtensions' : ['jpg', 'png','gif'],
    });
//    $('#file-es').fileinput({
//        language: 'es',
//        uploadUrl: '#',
//        allowedFileExtensions : ['jpg', 'png','gif'],
//    });
    
//    $("#file-1").fileinput({
//        uploadUrl: '#', // you must set a valid URL here else you will get an error
//        allowedFileExtensions : ['jpg', 'png','gif'],
//        overwriteInitial: false,
//        maxFileSize: 1000,
//        maxFilesNum: 10,
//        //allowedFileTypes: ['image', 'video', 'flash'],
//        slugCallback: function(filename) {
//            return filename.replace('(', '_').replace(']', '_');
//        }
//    });

  </script>
<!-- img upload end -->


<!-- select funct -->
<script type="text/javascript">
$(document).ready(function(){
    
//    $('input[type="checkbox"]').click(function(){
//        if($(this).prop("checked") == true){
//            $("#content_quiz").slideToggle();
//        }
//        else if($(this).prop("checked") == false){
//            $("#content_quiz").slideToggle();
//        }
//    });
    
    $('select[multiple].active.3col').multiselect({
        columns: 3,
        placeholder: 'Select Co-Owner',
        search: true,
        searchOptions: {
            'default': 'Search'
        },
        selectAll: true
    });
    
    $(document).on("keypress", "input", function(e){
        if(e.which == 13){
            var cell_val = $(this).val();
            var sheet_cell = $(this).attr("cell");
            var cell_id = $(this).attr("id");
            var file_xlsx = $("#file_xlsx").val();
            
            console.log(file_xlsx);
            
            $.ajax({
                type: "POST",
                url:"post/manage_post/save_sheet",
                data: {cell_val:cell_val,sheet_cell:sheet_cell,file_xlsx:file_xlsx},
                //data: {cell_val:cell_val},
                success: function(data){
                    if(data){
                        if(file_xlsx){
                            $("#example").html(data);
                        }else{
                            //$("#sheet"+sheet_cell).attr("onclick","updateSheet('"+sheet_cell+"')");
                            //$("#sheet"+sheet_cell).html(cell_val);
                            $("#example").html(data);
                        }
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
            return false;
            //}
            
        }
    });
    
    $("#post_type").change(function(){
        $(this).find("option:selected").each(function(){
            //var optionValue = $(this).attr("value");
            var optionValue = $(this).attr("ptype");
            //alert(optionValue);
            console.log(optionValue);
            if(optionValue){
                if(optionValue == 'list'){
                    $("#post_list_type").show();
                }else{
                    $("#post_list_type").hide();
                }
                
//                if(optionValue == 'calendar'){
//                    console.log('ZZZZZ');
//                    $('#calendar').fullCalendar('render');
//                }
                
                
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
    
//////////////////////Ckeditor Start///////////////////////////////////////////////////////////////
    var myToolbar = [
        ['Bold'],
        ['Styles'],
        ['Table']
    ];                                    

    // 2. Create a config var to hold your toolbar
    var config =
    {
//        toolbar_mySimpleToolbar: myToolbar,
//        toolbar: 'mySimpleToolbar'     
        //filebrowserUploadUrl: "upload/upload.php" 
    };

    //config.removePlugins = 'link,about';
    
    config.removePlugins = 'about';
    config.linkShowAdvancedTab = false;
  config.linkShowTargetTab = false;

    // 3. change the textarea into an editor using your config and toolbar
    $('#detail_description').ckeditor(config);
//    CKEDITOR.replace( 'editor1', {
//    filebrowserUploadUrl: "upload/upload.php" 
//} );
    
///////////////////////Ckeditor End///////////////////////////////////////////////////////////////////   
    
////////////////////CALENDAR START/////////////////////////////////////////////
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        //events: 'post/manage_post/getcalendar_post',        //LOAD
        events: {
            url: 'post/manage_post/getcalendar_post',
            data: function () { // a function that returns an object
                return {
                    post_id: '',
                    ctype:'',
                };

            }
        },
        titleRangeSeparator:'-',
        displayEventTime: false,
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay)            //INSERT
        {
            var title = prompt("Enter Event Title");
            if(title)
            {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url:"post/manage_post/addcalendar_event",
                    type:"POST",
                    data:{title:title, start:start, end:end, },
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Added Successfully");
                    }
                })
            }
        },
        editable:true,
        eventResize:function(event)         //UPDATE
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"post/manage_post/updatecalendar_event",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function(){
                    calendar.fullCalendar('refetchEvents');
                    alert('Event Update');
                }
            })
        },

        eventDrop:function(event)       //UPDATE
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"post/manage_post/updatecalendar_event",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                }
            });
        },

        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"post/manage_post/deletecalendar_event",
                    type:"POST",
                    data:{id:id},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Removed");
                    }
                })
            }
        },

   });
    $('#post_type').change(function(){
       
        $('#calendar').fullCalendar("render");
    });
    
    
////////////////////CALENDAR END/////////////////////////////////////////////
    
    $('[data-toggle="tooltip"]').tooltip();  
    
     var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    
    $("#tgid").chosen().keyup(function(){
        console.log(this.val+'ss');
    });
    
    /*Show table after upload xls sheet*/
    $('#list').change(function(){
        var file_data = $('#list').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.ajax({
            url: "post/manage_post/upload_xlsx",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                if(data){
                    $("#example").html(data);
                    $("#table_list").show();
                    
                }
                //console.log(data);
            }
        });
    });
    
    
    
});

function updateSheet(sheet_cell){
    //$("td #sheet"+sheet_cell).removeAttr("onclick");
    tdval = $("#sheet"+sheet_cell).html();
    $("#sheet"+sheet_cell).removeAttr("onclick");
    //$("#sheet"+sheet_cell).html('<input type="text" id="sheet'+sheet_cell+'" value="" onkeydown="saveSheet(this)">');
    $("#sheet"+sheet_cell).html('<input type="text" cell="'+sheet_cell+'" id="sheet'+sheet_cell+'" value="'+tdval+'">');
}

x = 0;
function appendColumn(){
    var alpha_arr = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    //x++;
    //g = parseInt(x)+parseInt(1);
    k = $('th').length;
    if(k){
        x = k-1;
    }
    console.log(x);
    upsheet_id = '\''+alpha_arr[x]+'1\''; 
    //onclick="updateSheet('+upsheet_id+')"
    console.log(upsheet_id);
    $('#theadrow').append('<th id="sheet'+alpha_arr[x]+'1"><input type="text" cell="'+alpha_arr[x]+'1" id="sheet'+alpha_arr[x]+'1" value=""></th>');
    //$('#theadrow').append('<th id="sheet'+alpha_arr[x]+'"><input type="text" cell="'+alpha_arr[x]+'" id="sheet'+alpha_arr[x]+'" value=""></th>');
    x++;
}

function appendRow(){
    var alpha_arr = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    thcount = $('th').length;
    //list_tot = parseInt($('#list_count').val())+parseInt("1");
    //tbrow = $('#tbodyrow tr').length;
    list_tot = parseInt($('#tbodyrow tr').length)+parseInt("1");
    console.log(thcount);
    td_result='';
    
    for(j=1;j<=thcount;j++){
        if(j==1){
            k = j+1;
            //td_result += '<td><i class="fa fa-trash" data-original-title="Delete" style="cursor:pointer"></i></td>';
            td_result += '<td><input type="checkbox" value="'+k+'" class="cked" name="allchk" id="allchk"></td>';
        }else{
            td_result += '<td id="sheet'+alpha_arr[j-2]+(list_tot+1)+'"><input cell="'+alpha_arr[j-2]+''+(list_tot+1)+'" id="sheet'+alpha_arr[j-2]+(list_tot+1)+'" value="" type="text">';
        }
    }
    console.log(td_result);
    $('#tbodyrow').append('<tr>'+td_result+'</tr>');
//    for(j=1;j<=thcount;j++){
//        td_result += '<td id="sheet'+alpha_arr[j-1]+(list_tot+1)+'"><input class="postrow" cell="'+alpha_arr[j-1]+''+(list_tot+1)+'" id="sheet'+alpha_arr[j-1]+(list_tot+1)+'" value="" type="text">';
//    }
//    console.log(td_result);
//    $('#tbodyrow').append('<tr>'+td_result+'</tr>');
}

function updateSheetCol(sheet_cell,val){
    $("#sheet"+sheet_cell).html('<input type="text" cell="'+sheet_cell+'" id="sheet'+sheet_cell+'" value="'+val+'">');
}

function deleteTableCol(col_name){
    var file_xlsx = $("#file_xlsx").val();
    var check = confirm("Are you sure you want to delete this table column?");
    if (check == true) {
        $.ajax({
            type: "POST",
            url:"post/manage_post/addpostremove_tablecol",
            data: {col_name:col_name,file_xlsx:file_xlsx},
            success: function(response){
                if(response){
                    $("#example").html(response);
                }
            },
            error: function(){
               alert("failure");
            }
        });
        return true;
    }
    else {
        return false;
    }
}

function checkedAll(ele){
    var checkboxes = document.getElementsByClassName('cked');
    //console.log(checkboxes);
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
}

function removeTableMultipleRow(){
    
    var atLeastOneIsChecked = ('input[name="allchk"]:checked').length;
    //alert(atLeastOneIsChecked);
    console.log($('input[name="allchk"]:checked').length);
    var checked = $('input[name="allchk"]:checked').serialize();
    //console.log($('input[name="allchk"]:checked').serialize());
    var p=[];
    $('input[name="allchk"]:checked').each(function() {
        //console.log(this.value);
        p.push(this.value);
    });
    
    //if(atLeastOneIsChecked!=0){
    if($("#allchk").prop('checked') == true){
        var check = confirm("Are you sure you want to delete this table rows?");
        if (check == true) {
            $.ajax({
                type: "POST",
                url:"post/manage_post/remove_multitrow_addposttime",
                data: {checked:p},
                success: function(response){
                    if(response){
                        $("#example").html(response);
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
            return true;
        }
        else {
            return false;
        }
    }else{
        alert('Please tick on row to delete any row');
        return false;
    }
}

</script>