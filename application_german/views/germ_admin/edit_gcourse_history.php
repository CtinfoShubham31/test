<?php include_once('admin_header.php'); ?>
<style>
#imagePreview {
    width: 200px;
    height: 200px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit German History</h1>
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
                    <form role="form" name="ghistoryform" id="ghistoryform" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            
                            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                                <div id="imagePreview" <?php if(!empty($edit_data->gpic)){?>style="background-image: url(upload/ghistory/<?php echo $edit_data->gpic; ?>);" <?php }else{?>style="background-image: url(images/default.png);"<?php  } ?>></div>
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>History Pic</label>
                                        </div>

                                        <div class="col-lg-8">
                                            <input type="file" name="ghistory_img" id="ghistory_img">
                                            <?php echo form_error('ghistory_img', '<span for="ghistory_img" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clearfix"> </div><br/>
                                <div class="col-lg-8 col-lg-offset-4">  
                                    <p><input type="submit" value="Update" class="btn btn-success"></p>
                                </div>
                                
                            </div>
                            
                            
<!--                            <div class="col-lg-12">  
                                <input type="submit" value="Update" class="btn btn-default">
                            </div>          -->
                        </div>
                    </form>
                        
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
<script>
    $(document).ready(function(){
        $("#ghistory_img").on("change", function()
        {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function(){ // set image data as background of div
                    $("#imagePreview").css("background-image", "url("+this.result+")");
                }
            }
        });
    });
</script>
