$(document).ready(function() {
    
    $('#location_name').focus();
    
    $("#location_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            address: {
                required: true,
            },
            location_name: {
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
            },
            timezone:{
                required: true,
            },
            select_currency:{
                required: true,
            },

        },
        messages: {

        },
            
    });
    
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
            $("span.error_msg").html('');
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


function reset_location(){
    location.reload(true);
}