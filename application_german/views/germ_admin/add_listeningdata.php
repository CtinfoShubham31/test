<?php include_once('admin_header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Listening</h1>
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
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Days</label>
                                        </div>

                                        <div class="col-lg-8">
                                            <select name="days" id="days" class="form-control">
                                                <option value="">Select Days</option>
                                            <?php 
                                            //echo form_error('first_name', '<p for="first_name" generated="true" class="error_msg_vaild">', '</p>', '</p>'); 
                                            for($i=1;$i<=31;$i++){
                                            ?>
                                                <option value="<?php echo $i; ?>" <?php echo set_select('days',$i); ?>><?php echo $i; ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <?php echo form_error('days', '<span for="days" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>  
                                
                                <div style="clear: both;"></div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                           <label>Parts</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="parts" id="parts" class="form-control">
                                                <option value="">Select Parts</option>
                                            <?php 
                                            //echo form_error('first_name', '<p for="first_name" generated="true" class="error_msg_vaild">', '</p>', '</p>'); 
                                            for($j=1;$j<=6;$j++){
                                            ?>
                                                <option value="<?php echo $j; ?>" <?php echo set_select('parts',$j); ?>><?php echo $j; ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <?php echo form_error('parts', '<span for="parts" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>German Text</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea class="tinyMCE" name="listening_text" id="listening_text"><?php echo set_value('listening_text'); ?></textarea> 
                                            <?php echo form_error('listening_text', '<span for="listening_text" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div> 
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>English Text</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea class="tinyMCE2" name="english_text" id="english_text"><?php echo set_value('english_text'); ?></textarea> 
                                            <?php echo form_error('english_text', '<span for="english_text" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Spanish Text</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea class="tinyMCE2" name="spanish_text" id="spanish_text"><?php echo set_value('spanish_text'); ?></textarea> 
                                            <?php echo form_error('spanish_text', '<span for="spanish_text" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Listening Voice</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="listening_voice" id="listening_voice" class="form-control">
                                                <option value="">Select Voice</option>
                                                <option value="1" <?php echo set_select('listening_voice',1); ?>>Boy</option>
                                                <option value="2" <?php echo set_select('listening_voice',2); ?>>Girl</option>
                                                <option value="3" <?php echo set_select('listening_voice',3); ?>>Both</option>
                                            </select> 
                                            <?php echo form_error('listening_voice', '<span for="listening_voice" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div> 
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Listening Audio</label>
                                        </div>

                                        <div class="col-lg-8">
                                            <input type="file" name="listening_video" id="listening_video">
                                            <?php echo form_error('listening_video', '<span for="listening_video" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div><br/>
                                
                                <div class="col-lg-8 col-lg-offset-4">  
                                    <p><input type="submit" value="Save" class="btn btn-success"></p>
                                </div>  
                            </div>
                            
<!--                            <div class="clearfix"></div>-->
                            
                                     
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
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/tiny_mce/tiny_mce.js" ></script>
<script>
    $(document).ready(function(){
        tinyMCE.init({
            
            mode : "specific_textareas",
            editor_selector: "tinyMCE",
//            height: "290",
//            theme : "advanced",
//            valid_elements: "p,br,b,i,strong,em",
//            theme_advanced_toolbar_location : "top",
//            theme_advanced_toolbar_align : "left",
//            theme_advanced_resizing : "false",
//            theme_advanced_resize_horizontal : "true",
//            theme_advanced_buttons1 : 
//            "bold, italic, underline, separator, " + 
//            "justifyleft, justifycenter, justifyright",
//            theme_advanced_buttons2 : "",
//            theme_advanced_buttons3 : ""
              // General options
        //mode : "textareas",
        theme : "advanced",
        //plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,|,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "forecolor,backcolor",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
//        skin : "o2k7",
//        skin_variant : "silver",

        
        });
        
        tinyMCE.init({
            
            mode : "specific_textareas",
            editor_selector: "tinyMCE2",          
            theme : "advanced",
            //plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            width: "320",
            // Theme options
            theme_advanced_buttons1 : "",
            theme_advanced_buttons2 : "",
            theme_advanced_buttons3 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
        });
        
        
    });
</script>
