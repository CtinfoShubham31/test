$(document).ready(function() {
    
    $("#device_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            device_name: {
                required: true,
                maxlength:50
            },
            device_type: {
                required: true
            },
            device_unique_id:{
                required: true
            },
            "select_location[]":{
                required: true,
            },
            
        },
        messages: {
            
        },
            
    });
    
    
        
});
