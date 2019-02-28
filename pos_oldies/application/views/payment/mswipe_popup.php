<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Manage Payment Info</h4>
        </div>
        <div class="modal-body mini-modal-body">
            <div class="box_alert-new" id="msgg" onclick="removeOtpMessage()" style="display: none;">
                <i class="fa fa-check right_sign" aria-hidden="true"></i>&nbsp;
                <span id="msgdata"></span>
            </div>
            <form method="post" id="mswipe_form">
                <div class="form-group">
                    <label for="merchant-id"> Merchant id:</label>
                    <input type="text" value="<?php if(!empty($get_credential->key_id)){ echo base64_decode($get_credential->key_id); }?>" class="form-control" name="mswipe_id" id="mswipe_id">
                    <span id="msid_error" class="error_msg"></span>
                </div>
                <div class="form-group">
                    <label for="merchant-id"> Password:</label>
                    <input type="password" value="<?php if(!empty($get_credential->key_pass)){ echo base64_decode($get_credential->key_pass); }?>" class="form-control" name="mswipe_pass" id="mswipe_pass">
                    <span id="msid_pass" class="error_msg"></span>
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
    
    var isR = false;
    
    $('#mswipe_form').on('submit', function (e) {
        
        e.preventDefault();
        if (!isR) {
            isR = true;
        
        $.ajax({
            type: 'post',
            url: 'payment/payment_setup/manage_mswipe',
            data: $('#mswipe_form').serialize(),
            dataType: "json",
            success: function (data) {
                if(data.errors.mswipeid){
                    $("#msid_error").html(data.errors.mswipeid);
                    setInterval(function(){ $("#msid_error").html(''); }, 3000);
                }
                else if(data.errors.mswipepass){
                    $("#msid_pass").html(data.errors.mswipepass);
                    setInterval(function(){ $("#msid_pass").html(''); }, 3000);
                }
                else if(data.update_success){
                    $("#msgdata").html('Mswipe data updated successfully.');
                    $("#msgg").show();
                    setTimeout(function(){  $("#msgg").fadeOut(5000); $("#mswipe-modal").modal('hide'); }, 3000);
                    
                }
                else if(data.add_success){
                    $("#msgdata").html('Mswipe data added successfully.');
                    $("#msgg").show();
                    setTimeout(function(){  $("#msgg").fadeOut(5000); $("#mswipe-modal").modal('hide'); }, 3000);
                }
                
                isR = false;
            }
        });
        
        }

    });
});

</script>