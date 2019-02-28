$(document).ready(function() {
    
    $('#permission_name').focus();
    $("#permission_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            permission_name: {
                required: true,
                maxlength:50
            },
            
        },
        messages: {

        },
            
    });
});