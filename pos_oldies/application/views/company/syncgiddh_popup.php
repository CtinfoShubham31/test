<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Sync with giddh</h4>
        </div>
        <div class="modal-body">
            <form id="giddh_sync" method="post">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 input_fields_wrap">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" id="giddh_comp_unique_name" name="giddh_comp_unique_name" placeholder="Company Unique Name">
                            <span id="cunique_error" class="error_msg"></span>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" id="giddh_auth_key" name="giddh_auth_key" placeholder="Authkey">
                            <span id="gauth_error" class="error_msg"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#giddh_sync").submit(function(event) {
            /* stop form from submitting normally or prevent default action */
            event.preventDefault();
            var form_data = $(this).serialize(); //Encode form elements for submit
            
            $.ajax({
                type: "POST",
                url: "company/companypage/syncgiddh",
                data : form_data,
                dataType: "json",
                success: function(response){
                //alert(response);
                    if(response.errors.cunique_name){
                        $("#cunique_error").html(response.errors.cunique_name);
                        setInterval(function(){ $("#cunique_error").html(''); }, 3000);
                    }
                    else if(response.errors.authk){
                        $("#gauth_error").html(response.errors.authk);
                        setInterval(function(){ $("#gauth_error").html(''); }, 3000);
                    }
                    else if(response.success){
                        //location.reload();
                        $('#giddh-popup').modal('hide');
                        $("section.content > .row").prepend("<div class='box_alert' id='fadeout' onclick='removeMessage()'><i class='fa fa-check right_sign' aria-hidden='true'></i>&nbsp;Sync with giddh successfully.</div>");
                        
                        setInterval(function(){ location.reload(true); }, 3000);
                        
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
           // event.unbind(); //unbind. to stop multiple form submit.
        });
    });
</script>
