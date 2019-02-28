$(document).ready(function() {
    $('#discount_name').focus();
    $('.chosen-select').chosen({ });
    $('#applicable_from').datetimepicker();
    $('#applicable_to').datetimepicker();
    
    $("#discount_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            discount_name: {
                required: true,
                maxlength:80
            },
            applicable_from:{
                required: true,
            },
            applicable_to:{
                required: true,
            },
            percentage:{
                required: true,
                rangelength: [1, 2],
                digits: true
            },
            "location[]":{
                required:true
            }
            
        },
        messages: {

        },
            
    });
});