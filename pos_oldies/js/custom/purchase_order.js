$(document).ready(function() {
    
    $('#vendor').focus();
    //$('.chosen-select').chosen({ });
    $("#divtotal").hide();
    $('#order_date').datetimepicker();
    
    $("button#addmore").click(function(){
        stock_id = $("#stock_id").val();
        qty = $("#qty").val();
        rate = $("#rate").val();
        unit = $("#unit").val();
        total = $("#total").val();
        //alert(qty);
        //alert(stock_id);
        $.ajax({
            type: "POST",
            url: "purchase_order/purchase_order_setup/addmore_tablerow",
            dataType: "json",
            data: {stock_id:stock_id,qty:qty,rate:rate,unit:unit,total:total},
            success: function(data){
                
                if(data.errors.wrong){
                    $("#stock_error").html(data.errors.wrong);
                    setInterval(function(){ $("#stock_error").html(''); }, 3000);
                }
                else if(data.errors.stock){
                    $("#stock_error").html(data.errors.stock);
                    setInterval(function(){ $("#stock_error").html(''); }, 3000);
                }
                else if(data.errors.qty){
                    $("#qty_error").html(data.errors.qty);
                    setInterval(function(){ $("#qty_error").html(''); }, 3000);
                }
                else if(data.errors.rate){
                    $("#rate_error").html(data.errors.rate);
                    setInterval(function(){ $("#rate_error").html(''); }, 3000);
                }
                else if(data.errors.unit){
                    $("#unit_error").html(data.errors.unit);
                    setInterval(function(){ $("#unit_error").html(''); }, 3000);
                }
                else if(data.errors.total){
                    $("#total_error").html(data.errors.total);
                    setInterval(function(){ $("#total_error").html(''); }, 3000);
                }else{
                    $("#stock_name").val('');
                    $("#stock_id").val('');
                    $("#qty").val('');
                    $("#rate").val('');
                    $("#unit").val('');
                    $("#total").val('');
                    $("#addmore_p").append('<tr><td> '+data.success.stock_name+' </td><input type="hidden" name="stk_id[]" value="'+data.success.stock_id+'"><td>'+data.success.qty+'</td><input type="hidden" name="qty[]" value="'+qty+'"><td>'+data.success.rate+'</td><input type="hidden" name="rate[]" value="'+data.success.rate+'"><td>'+data.success.unit_name+'</td><input type="hidden" name="unit[]" value="'+data.success.unit_id+'"><td>'+data.success.total+' /-</td><input type="hidden" class="tot" name="total[]" value="'+data.success.total+'"></tr>');
                    $("#stock_name").focus();
                    var sum = 0.0;
                    $('.tot').each(function()
                    {
                        sum += parseFloat(this.value);
                    });
                    //alert(sum);
                    $("#divtotal").show();
                    
                    $("#subtot").val(sum);
                    $("#show_subtot").html(sum);
                }
            },
            error: function(){
               alert("failure");
            }
        });
    });
    
    $('#qty, #rate').on('input',function() {
        var qty = parseInt($('#qty').val());
        var rate = parseFloat($('#rate').val());
        $('#total').val((qty * rate ? qty * rate : 0).toFixed(2));
    });
    
    $("#qty").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#qty_error").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
    });
    
    $("#rate").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#rate_error").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
    });
    
    $("#stock_name").autocomplete({
        source: function(request, response) {
            var url = 'purchase_order/purchase_order_setup/get_stock';
            $.post(url, {data: request.term}, 
            function(data) {
                if (data == "") {
                    $("#err_actv").show();
                } else {
                    $("#err_actv").hide();
                }
                if(data.length > 0) {
                    response($.map(data, function(stk){
                        return {
                            value: stk.product_name,
                            id: stk.inventory_stock_id,
                            cost:stk.cost_price
                        };

                    }));
                } else {
                    response([{ value: 'No results found.', id: ''}]);
                }

            },"json");
        },
        minLength: 1,
        select:
            function(event, ui) {
                var aid = ui.item.id;
                if(aid == ''){
                    return false;
                }
                $("#stock_id").val(ui.item.id);
                $("#rate").val(ui.item.cost);
            },
            autofocus: true
    });
    
    
    $("#vendor").autocomplete({
        source: function(request, response) {
            var url = 'purchase_order/purchase_order_setup/get_vendor';
            $.post(url, {data: request.term}, 
            function(data) {
                if (data == "") {
                    $("#err_actv").show();
                } else {
                    $("#err_actv").hide();
                }
                if(data.length > 0) {
                    response($.map(data, function(vnd){
                        return {
                            value: vnd.vendor_name,
                            id: vnd.vendor_id
                        };

                    }));
                } else {
                    response([{ value: 'No results found.', id: ''}]);
                }

            },"json");
        },
        minLength: 1,
        select:
            function(event, ui) {
                var aid = ui.item.id;
                if(aid == ''){
                    return false;
                }
                $("#vid").val(ui.item.id);
            },
            autofocus: true
    });
    
    $("#purchase_order_form").validate({
        ignore: "",
        errorElement: "span",
        errorClass: "error_msg",
        rules: {
            vendor: {
                required: true,
                maxlength:80
            },
            order_date: {
                required: true,
            },
            
        },
        messages: {
            
        },
            
    });
    
    
    
});