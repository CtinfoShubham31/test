<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Lists</h1>
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
                                <table style="max-width: 99%;" class="table table-bordered" id="user_grid">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>
                                                <select name="supuser" id="supuser" class="form-control">
                                                    <option value="">Superuser</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </th>
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
    oTable = $('#user_grid').DataTable({
        
        "aoColumnDefs" : [{
            orderable : false, aTargets : [3,4],//disable sorting for the 1st column
        }],
        "bProcessing": true,
        "serverSide": true,
        "ajax":{
            url :"ks_admin/admin_user/ajax_userlists", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            "data": function (data){ 
                data.supu = $('#supuser').val(); //data.search
                //alert(search);
            },
            error: function(){
                $("#user_grid_processing").css("display","none");
            }
        }
    });
    
    $('#supuser').change(function(){ //button filter event click
        oTable.ajax.reload();  //just reload table
    });

});

function makeSup(user_id){
    $.ajax({
        url:"ks_admin/admin_user/deletecalendar_event",
        type:"POST",
        data:{user_id:user_id},
        success:function()
        {
            $("#sup"+user_id).html();
        }
    })
}

function superUserStatus(user_id){
    status = $("#sup"+user_id).html();
    //alert(status);
    if(status == 'Yes'){
        if(confirm("Are you sure you want to remove from super user position?"))
        {
            $.ajax({
                url:"ks_admin/admin_user/remove_superuser",
                type:"POST",
                data:{user_id:user_id},
                success:function(data)
                {
                    if(data == 'true'){
                        $("#sup"+user_id).html('No');
                        $("#sup"+user_id).attr('class', 'btn btn-danger admin-btn');
                    }else{
                        alert('Something went wrong please try again.');
                    }
                }
            })
        }
    
    }
    else if(status == 'No'){
        if(confirm("Are you sure you want to add user as a super user?"))
        {
            $.ajax({
                url:"ks_admin/admin_user/add_superuser",
                type:"POST",
                data:{user_id:user_id},
                success:function(data)
                {
                    if(data == 'true'){
                        $("#sup"+user_id).html('Yes');
                        $("#sup"+user_id).attr('class', 'btn btn-success admin-btn');
                    }else{
                        alert('Something went wrong please try again.');
                    }
                }
            })
        }
    }
}

function deleteUser(t,user_id){
    if (confirm('Are you sure you want to delete user?')) {
        $.ajax({
            type: "POST",     
            url:"ks_admin/admin_user/disable_user",
            data:{user_id:user_id},
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