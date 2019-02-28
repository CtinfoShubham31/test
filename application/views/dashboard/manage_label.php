<section id="post" class="post-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="add-post">
                    <h3 class="h3-heading">Manage Labels</h3>
                    <div class="row">
                        <?php echo manageLables($this->session->userdata('kaseidon_user_id'));?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="edit_label">
    
</div>

<script type="text/javascript">
    function editManageLabel(label_id){
        $.ajax({
            type: "POST",
            url:"dashboard/user_dashboard/edit_managelabel",
            data: {popup:1,label_id:label_id},
            success: function(data){
                $("#edit_label").html(data);
            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    function delete_label(label_id){
        var r = confirm("Are you sure want to delete this label?");
        if (r == true) {
            //txt = "You pressed OK!";
            $.ajax({
                type: "POST",
                url:"dashboard/user_dashboard/delete_label",
                data: {label_id:label_id},
                //data: {cell_val:cell_val},
                success: function(data){
                    if(data == 'true'){
                        console.log("delt"+label_id);
                        $("#delt"+label_id).remove();
                    }else{
                        alert("This label or it's child is associated with some posts.");
                    }
                    console.log(data);
                },
                error: function(){
                   alert("failure");
                }
            });
            
        } else {
            txt = "You pressed Cancel!";
        }
    }
    
    function mergeLabel(label_id){
        $.ajax({
            type: "POST",
            url:"dashboard/user_dashboard/labelfor_merge",
            data: {popup:1,label_id:label_id},
            success: function(data){
                $("#edit_label").html(data);
            },
            error: function(){
               alert("failure");
            }
        });
    }
</script>
           