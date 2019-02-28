<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Elements
                </div>
                
                <div class="row">
                    <form role="form" name="userform" id="userform" method="post">
                        <div class="panel-body">
                            
                            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>First Name</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>">
                                            <?php echo form_error('first_name', '<span for="first_name" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="clearfix"></div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Last Name</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>">
                                            <?php echo form_error('last_name', '<span for="last_name" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                                            <?php echo form_error('email', '<span for="email" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="password" name="password" class="form-control">
                                            <?php echo form_error('password', '<span for="password" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="clearfix"></div>
                                
                                <div class="row label_boxtext">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="password" name="cpassword" class="form-control">
                                            <?php echo form_error('cpassword', '<span for="cpassword" generated="true" class="error_msg">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                
                                
                                <div id="fields_content"></div> <!---Ajax content come here--->
                                    
                                        
                                    
                                <div class="clearfix"> </div><br/>
                                
                                <div class="col-lg-8 col-lg-offset-4">  
                                    <p><input type="submit" value="Save" class="btn btn-success"></p>
                                </div>  
                                
                            </div>
                            
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


<script>
$(document).ready(function() {
    
});


</script>
