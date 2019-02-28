$(document).ready(function() {
    $('#employee_name').focus();
    
    $("#employee_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            employee_name: {
                required: true,
                maxlength:50
            },
            emp_email: {
                required: false,
                email: true,
                remote: {
                    url: "employee/employee_setup/emailexist_ajax",
                    type: "post",
                    data: {
                        id_employee: function() {
                          return $("#id_employee" ).val();
                        }
                    }
                }
            },
            contact_number:{
                required: true,
                minlength:10,
                maxlength:10,
                digits: true
            },
            permission:{
                required: true,
            },
            emp_password:{
                required: true,
                minlength:4,
                maxlength:4,
                digits: true
            },
            emp_address:{
                required: true,
            },
            location_id:{
                required: true,
            },
            

        },
        messages: {
            emp_email: {
                required: "Please enter your email address.",
                email: "Please enter valid email address.",
                remote: "Email address already exists."
            },
        },
            
    });
    
    var options1 = {
        //url: 'server.php',
        file_holder: '#file_1',
        file_preview: '#file_preview_1',
        success: function( server_return, name, uploaded_file )
        {
            var oFReader = new FileReader();
            var _drop = $('#drop1');

            _drop.after( $('<p />').html( 'File sent: <b>' + name + '</b>' ) );

            oFReader.readAsDataURL( uploaded_file );
            oFReader.onload = function (oFREvent)
            {
                $('#file_preview_1' ).animate({opacity: 0}, 'slow', function(){
                        // change the image source
                    $(this)
                    .attr('src', oFREvent.target.result).animate({opacity: 1}, 'fast')
                    .on('load', function()
                    {
                        _drop.find('.statusbar').css({
                                width: _drop.outerWidth(),
                                height: _drop.outerHeight()
                        });
                    });

                        // remove the alert block whenever it exists.
                    _drop.find('.statusbar.alert-block').fadeOut('slow', function(){ $(this).remove(); });
                });
            };
        }
    };

    // Exemples
    $('#drop1').droparea(options1);
        
});
