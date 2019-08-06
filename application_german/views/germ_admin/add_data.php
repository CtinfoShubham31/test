<?php include_once('admin_header.php'); ?>
<style> 
    .right-none {
    padding-right: 0px!important;
    }
    .droparea {
	cursor: pointer;
	color: #aaa;
}
.droparea h4 {
	font-size: 13px;
}
.droparea > img {
	margin-bottom: 5px;
	width: 70px;
}
.droparea .upload-pic {
    width: 120px !important;
	height: 80px !important;
	cursor: pointer !important;
	position: relative !important;
	/*! border-radius: 50% !important; */ 
	object-fit:cover;

}
.droparea-dragging {
	border: thin dashed orange;
	background-color: #FEFBED;
	color: orange;
}

.imagePreview {
    width: 100px;
    height:80px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
.lable-new {
    font-size: 12px;
    font-weight: 600;
}
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add data</h1>
        </div>
    </div>

    <?php 
        if($this->session->flashdata('error_msg')){ 
    ?> 
        <div class="alert alert-danger">  
        <?php echo $this->session->flashdata('error_msg'); ?>  
        </div>
    <?php       
        }
    ?>
    
    <?php /*Success message*/ 
    if($this->session->flashdata('success_msg')){                       
    ?>            
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert"></a>
        <?php echo $this->session->flashdata('success_msg'); ?>
    </div>
    <?php       
    }
    ?>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Elements
                </div>
                
                <div class="row">
                    <form role="form" name="listenform" id="listenform" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            
                            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Listening Audio</label>
                                        </div>

                                        <div class="col-lg-8">
                                            <?php  if(!empty($get_audio_data->audio)){ echo $get_audio_data->audio; }?>
                                            <input type="file" name="listening_audio" id="listening_audio">
                                            <?php 
//                                            if(empty($get_audio_data->audio)){
//                                                echo form_error('listening_audio', '<span for="listening_audio" generated="true" class="error_msg">', '</span>'); 
//                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                  
                            </div>
                            <div class="clearfix"> </div>
                            
                            <div class="input_fields_wrap">
                                <button style="margin:15px;" class="add_field_button">Add More Fields</button>
                                
                                <div class="col-md-12">
                                    
                                    
                                    <?php
                                    if(!empty($get_listening_data)){ $k = 1;
                                        foreach ($get_listening_data as $glist) {
                                    ?>
                                    <div class="row" id="record<?php echo $glist->listening_data_id;?>" style="margin-bottom:20px;">
                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">Gender</label>
                                            <select name="voice_type[]" id="listening_voice" class="form-control">
                                                <option value="">Gender</option>
                                                <option value="Boy" <?php if($glist->voice_type == 'Boy'){?>selected="selected"<?php } ?>>Boy</option>
                                                <option value="Girl" <?php if($glist->voice_type == 'Girl'){?>selected="selected"<?php } ?>>Girl</option>
                                             </select> 
                                        </div>
                                        
                                        <input type="hidden" name="listening_data_id[]" value="<?php echo $glist->listening_data_id; ?>">
                                        
                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">From</label>
                                            <input onkeydown="isValidTime(this.value)" type="text" value="<?php echo $glist->from_time;?>" name="from_time[]" style="padding: 6px 6px;" id="from_time" placeholder="hh:mm:ss" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">Milli Sec</label>
                                            <input type="text" value="<?php echo $glist->from_millisecond;?>" name="from_millisecond[]" style="padding: 6px 6px;" id="from_millisecond" placeholder="From Ms" class="form-control">
                                        </div>

                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">To</label>
                                            <input type="text" value="<?php echo $glist->to_time;?>" name="to_time[]" id="to_time" style="padding: 6px 6px;" placeholder="hh:mm:ss" class="form-control">
                                        </div>

                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">Milli Sec</label>
                                            <input type="text" value="<?php echo $glist->to_millisecond;?>" name="to_millisecond[]" style="padding: 6px 6px;" id="to_millisecond" placeholder="To Ms" class="form-control">
                                        </div>

                                        <div class="col-md-3 right-none">
                                            <label class="lable-new">Text Msg</label>
                                            <textarea class="form-control" name="text_data[]" style="padding: 6px 6px;" id="text_data" placeholder="Text" rows="1"><?php echo $glist->text_data;?></textarea>
                                        </div>

                                        
                                        <div class="col-md-2 right-none">
                                            <label class="lable-new">Upload Pic</label>
<!--                                            <div id="imagePreview"></div>
                                            <input class="uploadFile" id="1" type="file" name="text_img[]" class="img" />-->
                                            <div class="imagePreview" id="imagePreview<?php echo $k;?>">
                                                <img style="width: 50px;" src="upload/test/<?php echo $glist->text_img;?>">
                                            </div>
                                            <input onchange="readURL(this);" name="text_img[]" type="file" id="<?php echo $k;?>" />
                                        </div>
                                        <?php
                                        if($k!=1){
                                        ?>
                                        <a href="javascript:;" onclick="deleteList(<?php echo $glist->listening_data_id;?>)">Delete</a>
                                        <?php
                                        }
                                        ?>
                                    </div>    
                                    <?php $k++;
                                        }
                                    }else{
                                    ?>
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">Gender</label>
                                            <select name="voice_type[]" id="listening_voice" class="form-control">
                                                <option value="">Gender</option>
                                                <option value="Boy" <?php echo set_select('voice_type','Boy'); ?>>Boy</option>
                                                <option value="Girl" <?php echo set_select('voice_type','Girl'); ?>>Girl</option>
                                             </select> 
                                        </div>

                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">From</label>
                                            <input onkeydown="isValidTime(this.value)" type="text" name="from_time[]" style="padding: 6px 6px;" id="from_time" placeholder="hh:mm:ss" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">Milli Sec</label>
                                            <input type="text" name="from_millisecond[]" style="padding: 6px 6px;" id="from_millisecond" placeholder="From Ms" class="form-control">
                                        </div>

                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">To</label>
                                            <input type="text" name="to_time[]" id="to_time" style="padding: 6px 6px;" placeholder="hh:mm:ss" class="form-control">
                                        </div>

                                        <div class="col-md-1 right-none">
                                            <label class="lable-new">Milli Sec</label>
                                            <input type="text" name="to_millisecond[]" style="padding: 6px 6px;" id="to_millisecond" placeholder="To Ms" class="form-control">
                                        </div>

                                        <div class="col-md-3 right-none">
                                            <label class="lable-new">Text Msg</label>
                                            <textarea class="form-control" name="text_data[]" style="padding: 6px 6px;" id="text_data" placeholder="Text" rows="1"></textarea>
                                        </div>
                                        
                                        <div class="col-md-2 right-none">
                                            <label class="lable-new">Upload Pic</label>
<!--                                            <div id="imagePreview"></div>
                                            <input class="uploadFile" id="1" type="file" name="text_img[]" class="img" />-->
                                            <div class="imagePreview" id="imagePreview1"></div>
                                            <input onchange="readURL(this);" name="text_img[]" type="file" id="1" />
                                        </div>
                                    </div>    
                                    <?php
                                    }
                                    ?>   
                                    </div>
                                    
                                    

                                </div>
<!--                            <div class="clearfix"></div>-->
                                
                            </div> 
                            
                            <div class="clearfix"> </div><br/>
                                
                                <div class="col-lg-8 col-lg-offset-4">  
                                    <p><input type="submit" value="Save" class="btn btn-success"></p>
                                </div>
                        </div>
                    </form>
<!--                    <video width="100" height="100" controls>
                        <source src="upload/learning/1475561164_listen.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>-->
                        
                </div>
                    <!-- /.row (nested) -->
            </div>
                <!-- /.panel-body -->
        </div>
            <!-- /.panel -->
    </div>
        <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->

<?php include_once('admin_footer.php'); ?>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.validate.js" ></script>

<script type="text/javascript" src="http://creativethoughtsinfo.com/ct100/optioncab/front_design/js/droparea.js"></script> 
<script type="text/javascript">
    
    
//    $('#from_time').blur(function(){ 
//        var value = $(this).val();
//        if (isValidTime(value))
//           $(this).css('background','green');
//        else
//           $(this).css('background','red');
//    }) 

    function isValidTime(text) {
       var regexp = new RegExp(/^([0-2][0-3]):([0-5][0-9]):([0-5][0-9])$/)
       if(regexp.test(text)){
           
       }else{
           
       }
        //return regexp.test(text);
    }
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               //$('#imagePreview'+input.id).attr('src', e.target.result);
               $("#imagePreview"+input.id).css("background-image", "url("+e.target.result+")");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

  $(document).ready(function() {
      
      
//        $(".uploadFile").on("change", function()
//        { alert('ss');
//            var files = !!this.files ? this.files : [];
//            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
//            alert(this.id);
//            if (/^image/.test( files[0].type)){ // only image file
//                var reader = new FileReader(); // instance of the FileReader
//                reader.readAsDataURL(files[0]); // read the local file
//
//                reader.onloadend = function(){ // set image data as background of div
//                    $("#imagePreview").css("background-image", "url("+this.result+")");
//                }
//            }
//        });
      
      

      var options1 = {
        url: 'home/homepage/test',
        file_holder: '#file_1',
        file_preview: '#file_preview_1',
        file_preview_default_src: $('#file_preview_1').attr("src"),
        success: function( server_return, name, uploaded_file )
        {
            console.log("Success called.");
          var oFReader = new FileReader();
          var _drop = $('#drop1');

          _drop.after( $('<p />').html( 'File sent: <b>' + name + '</b>' ) );
          
          oFReader.readAsDataURL( uploaded_file );
          console.log("File read.");
          oFReader.onload = function (oFREvent)
          {
              console.log("oFReader load.");
            $( '#file_preview_1' ).animate({opacity: 0}, 'slow', function(){
              // change the image source
              $(this)
                .attr('src', oFREvent.target.result).animate({opacity: 1}, 'fast')
                .on('load', function()
                {
                    console.log("Image loaded.");
                  _drop.find('.statusbar').css({
                    width: _drop.outerWidth(),
                    height: _drop.outerHeight()
                  });
                });

              // remove the alert block whenever it exists.
              _drop.find('.statusbar.alert-block').fadeOut('slow', function(){ $(this).remove(); console.log(".statusbar.alert-block called."); });
            });
          };
        }
      };
      
      // Exemples
      $('#drop1').droparea(options1);
   

    });
    
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    //var x = 1; //initlal text box count
    var x = <?php echo $count;?>; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-12" style="margin-bottom:20px;"><div class=row><div class="right-none col-md-1"><select class=form-control id=listening_voice name=voice_type[]><option value="">Gender<option value="Boy" <?php echo set_select('voice_type','Boy'); ?>>Boy<option value="Girl"<?php echo set_select('voice_type','Girl'); ?>>Girl</select></div><div class="right-none col-md-1"><input id=from_time name=from_time[] style="padding: 6px 6px;" class=form-control placeholder="From Time"></div><div class="right-none col-md-1"><input id=from_millisecond name=from_millisecond[] style="padding: 6px 6px;" class=form-control placeholder="From millinsec"></div><div class="right-none col-md-1"><input id=to_time name=to_time[] style="padding: 6px 6px;" class=form-control placeholder="To Time"></div><div class="right-none col-md-1"><input id=to_millisecond name=to_millisecond[] style="padding: 6px 6px;" class="form-control" placeholder="To Millisec"></div><div class="right-none col-md-3"><textarea class=form-control id="text_data" name="text_data[]" placeholder="Text" rows="1"></textarea></div><div class="col-md-2 right-none"><div class="imagePreview" id="imagePreview'+x+'"></div><input onchange="readURL(this);" name="text_img[]" type="file" id="'+x+'" /></div><input id=file_1 name=text_img[] style=display:none type=file><a href="#" class="remove_field">Remove</a></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
    function deleteList(listening_data_id){
        if (confirm('Are you sure you want to remove?')) {
            $.ajax({
                type: "POST",
                url: "germ_admin/demo/delete_listen_info",      
                data:{listening_data_id:listening_data_id},
                success: function(data){
                    if(data == 'true'){ alert('ko');
                        $("#record"+listening_data_id).hide();
                    }else{
                        alert('failure');
                    }
                    
                }
            });
        } else { 
            // Do nothing!
        }
    }
</script>
