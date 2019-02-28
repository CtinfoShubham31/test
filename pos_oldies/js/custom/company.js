$(document).ready(function() {
    $('#company_name').focus();
    
    var url = window.location.href;
    var result= url.split('/');
    var splits = result[result.length-2];      /*-------Add 2Team--------*/
    //alert(splits);

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


    $('#pincode-input1').pincodeInput({hidedigits:false,complete:function(value, e, errorElement){
        $("#pincode-callback").html("This is the 'complete' callback firing. Current value: " + value);
    }});
//    $('#pincode-input1').pincodeInput({hideDigits:false,inputs:4,complete:function(value, e, errorElement){
//        $("#pincode-callback").html("Complete callback from 4-digit test: Current value: " + value);
//    }});

        
    $("#select_country").autocomplete({
        source: "company/companypage/get_country",
        minLength: 1,
        select: function( event, ui ) {
            $('#response').val(ui.item.id);
        }
    });

    $("#select_state").autocomplete({
        //source: "get_state?test=",
        source: function(request, response) {
            $.getJSON(
                "company/companypage/get_state",
                { term:request.term, country:$('#select_country').val() }, 
                response
            );
        },
        minLength: 1,
        select: function( event, ui ) {
            $('#response').val(ui.item.id);
        }
    });

    $("#select_city").autocomplete({
        source: function(request, response) {
            $.getJSON(
                "company/companypage/get_city",
                { term:request.term, country:$('#select_country').val(),state:$('#select_state').val() }, 
                response
            );
        },
        //source: "get_city",
        minLength: 2,
        select: function( event, ui ) {
            $('#response').val(ui.item.id);
        }
    });
        
//    jQuery.validator.addMethod("specialChrs", function (element, value) {
//            return new RegExp('^[a-zA-Z0-9]+$').test(value)
//        }, "Special Characters not permitted");    
        
    jQuery.validator.addMethod("specialChrs", function(value, element) {
        if (!/^[a-zA-Z0-9]+$/.test(value)){ return false;}else{ return true; }
    }, "Special Characters not permitted.");
        
    $("#company_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            address: {
                required: true,
            },
            company_name: {
                required: true,
                maxlength:80
            },
            select_country:{
                required: true,
            },
            select_state:{
                required: true,
            },
            select_city:{
                required: true,
            },
            contact_number:{
                required: true,
                minlength:10,
                maxlength:10,
                digits: true
            },
            postal_code:{
                required: true,
                specialChrs: true
            },
            timezone:{
                required: true,
            },
            select_currency:{
                required: true,
            },
//            pan_number:{
//                required: true,
//            },
//            tin_number:{
//                required: true,
//            },
            pin_number:{
                required: true,
                minlength:4,
                maxlength:4,
                digits: true
            },
//            image:{
//                required:true
//            }

        },
        messages: {

        },
            
    });

});

