<?php include_once('admin_header.php'); ?>

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
        <div class="col-lg-12 text-center">
            <a href="germ_admin/demo/add_data"><button class="btn btn-success" style="margin: 20px;padding: 8px 42px;">Go</button></a>
                <!-- /.panel-body -->
        </div>
            <!-- /.panel -->
    </div>
        <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->

<?php include_once('admin_footer.php'); ?>

