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
            <form method="post" id="razorpay_form">
                <div class="form-group">
                    <label for="merchant-id"> Razorpay key id:</label>
                    <input type="text" value="<?php if(!empty($get_credential->key_id)){ echo base64_decode($get_credential->key_id); }?>" class="form-control" name="razorpay_keyid" id="razorpay_keyid">
                    <span id="rzkeyid_error" class="error_msg"></span>
                </div>
                <div class="form-group">
                    <label for="merchant-id"> Razorpay secret key:</label>
                    <input type="password" value="<?php if(!empty($get_credential->key_pass)){ echo base64_decode($get_credential->key_pass); }?>" class="form-control" name="razorpay_secretkey" id="razorpay_secretkey">
                    <span id="rzsecret_key_error" class="error_msg"></span>
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
    
    var isRZ = false;
    
    $('#razorpay_form').on('submit', function (e) {
        
        e.preventDefault();
        if (!isRZ) {
            isRZ = true;
        
        $.ajax({
            type: 'post',
            url: 'payment/payment_setup/manage_razorpay',
            data: $('#razorpay_form').serialize(),
            dataType: "json",
            success: function (data) {
                if(data.errors.rzkeyid){
                    $("#rzkeyid_error").html(data.errors.rzkeyid);
                    setInterval(function(){ $("#rzkeyid_error").html(''); }, 3000);
                }
                else if(data.errors.rzsecret_key){
                    $("#rzsecret_key_error").html(data.errors.rzsecret_key);
                    setInterval(function(){ $("#rzsecret_key_error").html(''); }, 3000);
                }
                else if(data.update_success){
                    $("#msgdata").html('Razorpay data updated successfully.');
                    $("#msgg").show();
                    setTimeout(function(){  $("#msgg").fadeOut(5000); $("#mswipe-modal").modal('hide'); }, 3000);
                    
                }
                else if(data.add_success){
                    $("#msgdata").html('Razorpay data added successfully.');
                    $("#msgg").show();
                    setTimeout(function(){  $("#msgg").fadeOut(5000); $("#mswipe-modal").modal('hide'); }, 3000);
                }
                
                isRZ = false;
            }
        });
        
        }

    });
});

</script>