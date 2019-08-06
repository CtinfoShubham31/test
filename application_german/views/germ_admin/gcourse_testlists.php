<?php include_once('admin_header.php'); ?>
<link href="css/dataTables.min.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Test Quiz Answer Lists</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tables View
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table style="max-width: 99%;" class="table table-striped table-bordered table-hover" id="coursetest_grid">
                                            <thead>
                                                <tr>
                                                    <th>Days</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include_once('admin_footer.php'); ?>
<style>
    .dataTables_info{
        padding-left: 15px;
    }
    .toolbar {
        float:left;
        margin-left: 20px;
    }
</style>
<script src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $('#coursetest_grid').DataTable({
        dom: 'l<"toolbar">frtip',
        initComplete: function(){
           $("div.toolbar").html('<button onclick="addGTestQuizAns()" type="button" class="btn btn-outline btn-primary btn-xs">Add Quiz</button>');           
        },

        "aoColumnDefs" : [{
            orderable : false, aTargets : [3],//disable sorting for the 1st column
        }],
        "bProcessing": true,
        "serverSide": true,
        "ajax":{
            url :"germ_admin/gcourse_test/ajax_gcoursetestlists", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
                $("#coursetest_grid_processing").css("display","none");
            }
        }
    });  
    //$("div.toolbar").html('<div class="dt-buttons"><a class="dt-button" tabindex="0" aria-controls="example" href="#"><span>Add new button</span></a></div>');
});

function addGTestQuizAns(){
    window.location.href = "germ_admin/gcourse_test/add_coursetest";
}
</script>