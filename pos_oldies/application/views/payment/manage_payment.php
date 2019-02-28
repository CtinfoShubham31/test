<section class="content-header">
    <h1>Payment Setup</h1>
      
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Payment setup </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form>
            <div class="col-md-12">
                <div class="form-group">
                    <h4> Click on your payment type </h4>  <br/>
                    
                        <button type="button" class="btn btn-default btn_radius" id="employee-edit" data-toggle="modal" data-target="#mswipe-modal" onclick="mswipe_popup()">Mswipe</button>
                     
                </div>
            </div>
          
            <div class="col-md-12">
                <div class="form-group">
                    
                        <button type="button" class="btn btn-danger btn_radius" id="employee-delete" data-toggle="modal" data-target="#mswipe-modal" onclick="razorpay_popup()">Razor Pay</button>
                    
                </div>
            </div> 
            <div class="clearfix"> </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <hr>
<!--                    <button class="btn btn-success" type="button"> Submit </button>-->
                </div>
            </div>
       
          <!------------------------------------------------>
        </form>
    </div> <!-----row------> 
</section>
  <!----------------------------------------------------------------------->

<div class="modal fade" id="mswipe-modal" role="dialog"></div>     

<!--<div class="modal fade" id="paytm-modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Add new merchant id</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="merchant-id"> Merchant id:</label>
                        <input type="text" class="form-control" id="merchant-id">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->

<script>
    
//    $(function () {
//
//        $('form').on('submit', function (e) {
//
//            e.preventDefault();
//
//            $.ajax({
//                type: 'post',
//                url: 'post.php',
//                data: $('form').serialize(),
//                success: function () {
//                    alert('form was submitted');
//                }
//            });
//
//        });
//
//    });
    
    function mswipe_popup(){
        $.ajax({
            type: "POST",
            //url: "permission/permission_setup/deletepopup_permission",
            url:"payment/payment_setup/mswipe_popup",
            //data: {c_id:company_id},
            //dataType: "json",
            success: function(data){
                if(data == 'False'){
                    alert("failure");
                }else{
                    $("#mswipe-modal").html(data);
                }
            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    function razorpay_popup(){
        $.ajax({
            type: "POST",
            //url: "permission/permission_setup/deletepopup_permission",
            url:"payment/payment_setup/razorpay_popup",
            //data: {c_id:company_id},
            //dataType: "json",
            success: function(data){
                if(data == 'False'){
                    alert("failure");
                }else{
                    $("#mswipe-modal").html(data);
                }
            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    
</script>