<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Post Lists</h1>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table style="max-width: 99%;" class="table table-bordered" id="post_grid">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Title</th>
                                            <th>Post Type</th>
                                            <th>Short Description</th>
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


<script type="text/javascript">
$(document ).ready(function() {
    oTable = $('#post_grid').DataTable({
        
        "aoColumnDefs" : [{
            orderable : false, aTargets : [3,4],//disable sorting for the 1st column
        }],
        "bProcessing": true,
        "serverSide": true,
        "ajax":{
            url :"ks_admin/admin_post/ajax_postlists", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            "data": function (data){ 
                //data.supu = $('#supuser').val(); //data.search
                //alert(search);
            },
            error: function(){
                $("#post_grid_processing").css("display","none");
            }
        }
    });
    
//    $('#supuser').change(function(){ //button filter event click
//        oTable.ajax.reload();  //just reload table
//    });

});


function disablePost(t,post_id){
    if (confirm('Are you sure you want to delete post?')) {
        $.ajax({
            type: "POST",     
            url:"ks_admin/admin_post/disable_post",
            data:{post_id:post_id},
            success: function(data){
                if(data == 'true'){
                    $(t).closest('tr').remove();
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