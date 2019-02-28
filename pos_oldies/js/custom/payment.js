$(document).ready(function() {
    
});

function mswipePopup(){
    $.ajax({
        type: "POST",
        url: "payment/payment_setup/manage_mswipe",
        data: $('form#mswipe_form').serialize(),
        dataType: "json",
        //data: {"id":"1","_token": "{{ csrf_token() }}"},
        success: function(data){
            if(data.errors.email){
                $("#email_error").html(data.errors.email);
                setInterval(function(){ $("#email_error").html(''); }, 3000);
            }
            else if(data.success){
                $("#set_email").val(data.success);
                $('#modal-otp').modal('show');
            }
            isClicked = false;
        },
        error: function(){
           alert("failure");
        }
    });
}