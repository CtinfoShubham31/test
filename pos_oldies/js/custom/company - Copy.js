$(document).ready(function() {
    
    var url = window.location.href;
    var result= url.split('/');
    var splits = result[result.length-2];      /*-------Add 2Team--------*/
    //alert(splits);

    if(splits == 'companypage' || splits == 'employee_setup'){
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


//        $('#pincode-input1').pincodeInput({hidedigits:false,complete:function(value, e, errorElement){
//            $("#pincode-callback").html("This is the 'complete' callback firing. Current value: " + value);
//        }});

    }

    if(splits == 'locationpage' || splits == 'companypage'){
        
        
        
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
        
        
        $("button#edit_loc").click(function(){
            location_id = $(this).attr("value");
            //alert(id);
            $.ajax({
                type: "POST",
                //url: "company/locationpage/setlocation_data",
                url: "location/locationpage/setlocation_data",
                data: {location_id:location_id},
                dataType: "json",
                success: function(data){
                    if(data.location_data){
                        
                            $('html, body').animate({
                                scrollTop: $("#div1").offset().top
                            }, 1500);
                        
                        //alert('yahoo');
                        $("#location_name").val(data.location_data.location_name);
                        $("#id_location").val(data.location_data.location_id);
                        $("#address").val(data.location_data.address);
                        $("#select_country").val(data.location_data.country);
                        $("#select_state").val(data.location_data.state);
                        $("#select_city").val(data.location_data.city);
                        //$("#timezone option:selected").val(data.location_data.timezone);
                        $("#timezone").val(data.location_data.timezone);
                        $("#postal_code").val(data.location_data.postal_code);
                        $("#contact_number").val(data.location_data.contact_number);
                        //alert(data.location_data.location_id);
                    }

                },
                error: function(){
                   alert("failure");
                }
            });
        });
        
        $("button#delete_locpopup").click(function(){
            location_id = $(this).attr("value");
            //alert(id);
            $.ajax({
                type: "POST",
                //url: "company/locationpage/setlocation_data",
                url: "location/locationpage/deletepopup_location",
                data: {location_id:location_id},
                //dataType: "json",
                success: function(data){
                    if(data == 'False'){
                        alert("failure");
                    }else{
                        $("#delete-modal").html(data);
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
        });
        
        
        
        
    }

});


function delete_loc(location_id) {
    $.ajax({
        type: "POST",
        //url: "company/locationpage/setlocation_data",
        url: "location/locationpage/delete_location",
        data: {location_id:location_id},
        dataType: "json",
        success: function(data){
            if(data.success){
                //$('#delete-modal').modal('toggle');
                $("#location_block"+location_id).hide();
                $("#msg").html(data.success);
                $(".modal-footer").hide();
                setTimeout(function() {
                    $('#delete-modal').modal('hide');
                }, 2000);
            }

        },
        error: function(){
           alert("failure");
        }
    });
    
}