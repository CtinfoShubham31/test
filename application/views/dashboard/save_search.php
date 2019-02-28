<div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Save Search</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
      <!-- Modal body -->
        <div class="modal-body">
            <form id="save_search_info" method="post">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Search Name </label>
                            <input class="form-control" id="search_keyword" name="search_keyword" placeholder="Search Name" type="text">
                            <span id="search_name_error" class="error_msg"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" name="add" value="1">
<!--                    <input type="hidden" name="jdata" value="1">-->
                    
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" type="submit"> Save </button>
                    </div>
                </div>
            </form>
        </div>
      
      <!-- Modal footer --> 
    </div>
</div>

<script>
$(document).ready(function() {

$("#save_search_info").on("submit", function(event) {
    //console.log('asasa');
    /* stop form from submitting normally or prevent default action */
    event.preventDefault();
    //var form_data = $(this).serialize(); //Encode form elements for submit;
    //console.log(form_data);
    
    jsondata = $("#jsondata").val();
    search_keyword = $("#search_keyword").val();
    //alert(jsondata);
    //return false;
    $.ajax({
        type: "POST",
        url: "dashboard/user_dashboard/save_search",
        data: {jsondata:jsondata,search_keyword:search_keyword},
       // contentType: "application/json;charset=utf-8",
        dataType: "json",
        success: function(response){
        //alert(response);
            if(response.errors.valid_search_keyword){
                $("#search_name_error").fadeIn().html(response.errors.valid_search_keyword);

                setTimeout(function() {
                        $('#search_name_error').fadeOut("slow");
                }, 3000 );

            }
            else if(response.success == 'true'){
                //window.location.href = "http://stackoverflow.com";
                $('#add_search').modal('hide');
            }
            else if(response.success == 'false'){
                alert("failure");
            }
        },
        error: function(ts){
           alert(ts.responseText);
        }
    });
   // event.unbind(); //unbind. to stop multiple form submit.
});

});
</script>