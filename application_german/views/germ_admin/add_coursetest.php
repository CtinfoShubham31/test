<?php include_once('admin_header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Test Question Answer</h1>
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
                                           <label>Test Level</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="test_level" id="test_level" class="form-control">
                                                <option value="">Select Test Level</option>
                                            <?php 
                                            //echo form_error('first_name', '<p for="first_name" generated="true" class="error_msg_vaild">', '</p>', '</p>'); 
                                            for($j=1;$j<=6;$j++){
                                            ?>
                                                <option value="<?php echo $j; ?>" <?php echo set_select('test_level',$j); ?>><?php echo $j; ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <?php echo form_error('test_level', '<span for="test_level" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Question</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea name="question" id="question"><?php echo set_value('question'); ?></textarea> 
                                            <?php echo form_error('question', '<span for="question" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div> 
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Answer</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea name="answer" id="answer"><?php echo set_value('answer'); ?></textarea> 
                                            <?php echo form_error('answer', '<span for="answer" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Question Audio</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="file" name="question_audio" id="question_audio">
                                            <?php echo form_error('question_audio', '<span for="question_audio" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Answer Audio</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="file" name="answer_audio" id="answer_audio"> 
                                            <?php echo form_error('answer_audio', '<span for="answer_audio" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="clearfix"> </div><br/>
                                
                                <div class="col-lg-8 col-lg-offset-4">  
                                    <p><input type="submit" value="Save" class="btn btn-success"></p>
                                </div>  
                                
                                
                            </div>
                            
<!--                            <div class="clearfix"></div>-->
                            
<!--                            <div class="col-lg-12">  
                                <input type="submit" value="Save" class="btn btn-default">
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
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>js/jquery.validate.js" ></script>
