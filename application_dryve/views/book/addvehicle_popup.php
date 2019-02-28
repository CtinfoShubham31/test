<div class="modal-dialog"> 

    <!-- Modal content-->
    <div class="modal-content"> 
        <div class="modal-header modal-header-bg">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="alert alert-success" id="fadeout" style="display:none;">
            <a href="#" class="close" data-dismiss="alert"></a>
            Vehicle added successfully.
        </div>
        <div class="modal-body user-form">
            
            <div class="model-head text-center"> 
                <?php
                if(!empty($rentspace_data->rent_space_picture)){
                ?>
                <img src="uploads/space_pic/<?php echo $rentspace_data->rent_space_picture;?>" class="img-responsive">
                <?php
                }else{
                ?>
                <img src="images/car_img.png" class="img-responsive">
                <?php
                }
                ?>
                <h3>Add your vehicle</h3>
                <p>Enter your vehicle details so our space owner<br>
                know it's your parking.</p>
            </div>
            <form id="add_vehicle" method="post">
                <div class="add-vehicle">
                    <div class="col-md-2">
                        <div class="row"> 
                            <img src="images/car_icon.png" class="img-responsive"> 
                        </div>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="vehicle_number" class="form-control" placeholder="Enter your license plate number">
                        <span id="vehicle_error" class="error show"></span>
                    </div>
                </div>
                <button type="submit" class="form-submit book-btn add-vehicle-btn">Add Vehicle</button>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#add_vehicle").submit(function(event) {
            /* stop form from submitting normally or prevent default action */
            event.preventDefault();
            var form_data = $(this).serialize(); //Encode form elements for submit
            
            $.ajax({
                type: "POST",
                url: "book/add_vehicle",
                data : form_data,
                dataType: "json",
                success: function(response){
                //alert(response);
                    if(response.errors.valid_vehicle){
                        $("#vehicle_error").html(response.errors.valid_vehicle);
                        setInterval(function(){ $("#vehicle_error").html(''); }, 3000);
                    }
                    else if(response.success){
                        //location.reload();
                        $("#fadeout").show();
                        setInterval(function(){ $('#addVehicle').modal('hide'); }, 3000);
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
           // event.unbind(); //unbind. to stop multiple form submit.
        });
    });
</script>