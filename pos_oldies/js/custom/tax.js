$(document).ready(function() {
    $('#tax_name').focus();
        $('#applicable_from').datetimepicker();
//        $('.datepick').each(function(){
//            $(this).datetimepicker();
//        });
        //$('#txappcab1').datetimepicker();
        
        
        
    $("#tax_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            tax_name: {
                required: true,
            },
            percentage: {
                required: true,
                maxlength:2,
                digits: true
            },
            applicable_from:{
                required: true,
            },

        },
        messages: {

        },
            
    });
        
});
    
    function tax_percenatgefrom(tax_id){
        //$("#edit_percentage").html("<input type='text'>");
        //$("#edit_applicable_from").html("<input type='text'>");
        //var rowCount = $("#subtable"+tax_id+" tr").length;
        //alert(rowCount);
        
        
        $.ajax({
            type: "POST",
            url: "tax/tax_setup/tax_percenatgefrom",
            data: {tax_id:tax_id},
            //dataType: "json",
            success: function(data){
                if(data){
                    
                    $("#tax_row"+tax_id).html(data);
                    var params = $("#subtable :input").serialize();
                    alert(params);
                    
                }

            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    function edit_tax_old(tax_id){
        $.ajax({
            type: "POST",
            url: "tax/tax_setup/edit_tax",
            data: {tax_id:tax_id},
            dataType: "json",
            success: function(data){
                if(data.tax_data){

                        $('html, body').animate({
                            scrollTop: $("#div1").offset().top
                        }, 1500);

                    
                    $("#tax_name").val(data.tax_data.tax_name);
                    $("#id_tax").val(data.tax_data.tax_id);
                    $("#percentage").val(data.tax_data.percentage);
                    $("#applicable_from").val(data.tax_data.applicable_from);
                }

            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    function edit_tax(tax_id){
        $.ajax({
            type: "POST",
            url: "tax/tax_setup/nested_tr",
            data: {tax_id:tax_id},
            //dataType: "json",
            success: function(data){
                if(data){
                    $("#subtable"+tax_id).html(data);
                    var val = $("#edit_tax_name"+tax_id).html();
                    //alert(val);
                    $("#edit_tax_name"+tax_id).html('<input type="text" value="'+val+'" id="txname" name="txname">');
                    $("#save"+tax_id).html('<a onclick="update_tax(this,'+tax_id+')" id="update_tax"><i aria-hidden="true" class="fa fa-pencil"></i> </a> &nbsp; &nbsp;<a onclick="deletepopup_tax('+tax_id+')" data-target="#delete-modal" data-toggle="modal"> <i aria-hidden="true" class="fa fa-times"></i> </a>');
                }
            },
            error: function(){
               alert("failure");
            }
        }).done(function() {//success function now you can initialize datepicker
//          $('.datetimepickerbutton').datetimepicker({
//            format: 'DD.MM.YYYY'
//          });
            $('.datepick').each(function(){
                 $(this).datetimepicker();
             });
        });
    }
    
    function update_tax(r,tax_id){
        var val = $(this).closest('td').find('#txappcab').val();
        
    }
    
    function edit_taxpopup(tax_id){
        $("span.error_msg").html('');
        $.ajax({
            type: "POST",
            url: "tax/tax_setup/edit_taxpopup",
            data: {tax_id:tax_id},
            //dataType: "json",
            success: function(data){
                $("#delete-modal").html(data);
            },
            error: function(){
               alert("failure");
            }
        }).done(function() {//success function now you can initialize datepicker
//          $('.datetimepickerbutton').datetimepicker({
//            format: 'DD.MM.YYYY'
//          });
            $('.datepick').each(function(){
                 $(this).datetimepicker();
            });
            //$('.datepick').datetimepicker();
        });
    }
    
    function addTextBox(tax_id){
        $.ajax({
           type: "POST",
           url: "tax/tax_setup/plus_tr",
           data: {tax_id:tax_id},
           //dataType: "json",
           success: function(data){
               if(data){
                   //$('#gone').remove();
                   //$("#subtable"+tax_id).append(data);

                   $("#subtable"+tax_id).append('<tr><td><input type="text" id="taxper" name="txper"></td><td><input type="text" id="txappcab" name="txappcab" class="datepick"><a id="gone" onclick="addTextBox('+tax_id+')">plus</a>&nbsp;<a id="move" onclick="removeTextBox(this)">minus</a></td></tr>');
               }
           },
           error: function(){
              alert("failure");
           }
       }).done(function() {//success function now you can initialize datepicker
//          $('.datetimepickerbutton').datetimepicker({
//            format: 'DD.MM.YYYY'
//          });
           $('.datepick').each(function(){
                $(this).datetimepicker();
            });
       });
        
       
        //$("#subtable"+tax_id).append('');
    }
    
    function removeTextBox(el){ 
        //r = $('#move').parent().parent();
        //r = $('#move').parent().parent().find('tr').html();
        //r = $('#move').parent().parent().find('tr').html();
        //alert(r);
        //$('#move').parent().parent().remove();
        //$(el).parents("tr").remove()
        $(el).closest('tr').remove()
        //$('#move').remove();
//        $.ajax({
//            type: "POST",
//            url: "tax/tax_setup/minus_tr",
//            data: {tax_id:tax_id},
//            //dataType: "json",
//            success: function(data){
//                if(data){
//                    //$('a').remove();
//                    $("#subtable"+tax_id).append(data);
//                }
//            },
//            error: function(){
//               alert("failure");
//            }
//        });
    }
    
    function deletepopup_tax(tax_id){
        $.ajax({
            type: "POST",
            url: "tax/tax_setup/deletepopup_tax",
            data: {tax_id:tax_id},
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
    }
    
    function delete_tax(tax_id){
        $.ajax({
            type: "POST",
            url: "tax/tax_setup/delete_tax",
            data: {tax_id:tax_id},
            dataType: "json",
            success: function(data){
                if(data.success){
                    //$('#delete-modal').modal('toggle');
                    $("#tax_row"+tax_id).hide();
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