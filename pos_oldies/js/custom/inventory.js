$(document).ready(function() {
    $('.chosen-select').chosen({ });
    $("#inventory_category").focus();
    //$("#category_name").focus();
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
    
    $("#invstock_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            inventory_category: {
                required: true,
            },
            stock_name: {
                required: true,
                maxlength:80
            },
            product_code:{
                required: true,
                remote: {
                    url: "inventory/stock_setup/productcode_existance",
                    type: "post",
                    data: {
                        inventory_stock_id: function() {
                          return $("#id_inventory_stock" ).val();
                        }
                    }
                }
            },
//            barcode:{
//                required: true,
//            },
            stock_type:{
                required: true,
            },
            "location_id[]":{
                required: true,
            },
            tax_name:{
                required: true,
            },
//            description:{
//                required: true,
//            },
            cost_price:{
                required: true,
            },
            sell_price:{
                required: true,
            },
//            opening_quantity:{
//                required: true,
//            },

        },
        messages: {
            product_code:{
                remote:"Product code already exists."
            },
        },
            
    });


});


function customfields_popup(){
    $.ajax({
        type: "POST",
        url: "inventory/stock_setup/customfields_popup",
        //data: {device_id:device_id},
        //dataType: "json",
        success: function(data){
            $("#custom-popup").html(data);
        },
        error: function(){
           alert("failure");
        }
    });
}


function edit_inventory_stock(inventory_stock_id){
    $("span.error_msg").html('');
    $.ajax({
        type: "POST",
        url: "inventory/stock_setup/edit_inventory_stock",
        data: {inventory_stock_id:inventory_stock_id},
        dataType: "json",
        success: function(data){ 
            if(data.inventory_stock_data){ 

                $('html, body').animate({
                    scrollTop: $("#div1").offset().top
                }, 1500);

                if(data.inventory_stock_data.is_inclusive == 1){
                    //$("#inclusive_tax").val(data.inventory_stock_data.is_inclusive);
                    $('#inclusive_tax').prop('checked', true);
                }else{
                    $('#inclusive_tax').prop('checked', false);
                }

                $("#update_stock").html('Update');

                $("#id_inventory_stock").val(data.inventory_stock_data.inventory_stock_id);
                $("#inventory_category").val(data.inventory_stock_data.inventory_category_id);
                $("#stock_name").val(data.inventory_stock_data.product_name);
                $("#product_code").val(data.inventory_stock_data.product_code);
                $("#barcode").val(data.inventory_stock_data.barcode_no);
                $("#stock_type").val(data.inventory_stock_data.stock_type);
                $("#location_id").val(data.inventory_stock_data.loc_ids).trigger("chosen:updated");
                $("#tax_name").val(data.inventory_stock_data.tx_ids).trigger("chosen:updated");
                $("#discount_name").val(data.inventory_stock_data.disc_ids).trigger("chosen:updated");
                $("#description").val(data.inventory_stock_data.description);
                $("#unit").val(data.inventory_stock_data.unit_id);
                $("#cost_price").val(data.inventory_stock_data.cost_price);
                $("#sell_price").val(data.inventory_stock_data.sell_price);
                $("#opening_quantity").val(data.inventory_stock_data.opening_quantity);
                $("#current_quantity").val(data.inventory_stock_data.current_quantity);
                if(data.inventory_stock_data.product_pic){
                    $('#file_preview_1').attr("src","upload/stock_pics/"+data.inventory_stock_data.product_pic);
                }else{
                    $('#file_preview_1').attr("src","img/employee-img.png");
                }
                
                if(data.inventory_stock_data.customfield_data){
                    $.each(data.inventory_stock_data.customfield_data,function(i,obj)
                    {
                        //alert(obj.custom_name+":"+obj.value);
                        $("#"+obj.custom_name).val(obj.value);
                    });
                }else if(data.inventory_stock_data.customfield_blank){
                    $.each(data.inventory_stock_data.customfield_blank,function(i,obj)
                    {
                        //alert(obj.custom_name+":"+obj.value);
                        $("#"+obj.custom_name).val('');
                    });
                }
                

            }

        },
        error: function(){
           alert("failure");
        }
    });
}

/*On select of category*/
function setcategory_taxdiscount(cate_id){
    $.ajax({
        type: "POST",
        url: "inventory/stock_setup/setcategory_taxdiscount",
        data: {inventory_category_id:cate_id},
        dataType: "json",
        success: function(data){
            $('html, body').animate({
                scrollTop: $("#div1").offset().top
            }, 1500);
            if(data.tx_ids){ 
                $("#tax_name").val(data.tx_ids).trigger("chosen:updated");
            }
            if(data.disc_ids){ 
                $("#discount_name").val(data.disc_ids).trigger("chosen:updated");
            }
            if(data.product_code){ 
                $("#product_code").val(data.product_code);
            }

        },
        error: function(){
           alert("failure");
        }
    });
}


function deletepopup_stock(stock_id){
    $.ajax({
        type: "POST",
        //url: "permission/permission_setup/deletepopup_permission",
        url:"inventory/stock_setup/deletepopup_stock",
        data: {stock_id:stock_id},
        //dataType: "json",
        success: function(data){
            if(data == 'False'){
                alert("failure");
            }else{
                $("#custom-popup").html(data);
            }
        },
        error: function(){
           alert("failure");
        }
    });
}

function delete_stock(stock_id){
    $.ajax({
        type: "POST",
        url:"inventory/stock_setup/delete_stock",
        //url: "permission/permission_setup/delete_permission",
        data: {stock_id:stock_id},
        dataType: "json",
        success: function(data){
            if(data.success){
                //$('#delete-modal').modal('toggle');
                $("#stock_row"+stock_id).hide();
                $("#msg").html(data.success);
                $(".modal-footer").hide();
                setTimeout(function() {
                    $('#custom-popup').modal('hide');
                }, 2000);
            }

        },
        error: function(){
           alert("failure");
        }
    });
}
