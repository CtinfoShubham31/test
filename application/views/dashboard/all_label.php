<div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">All Labels</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
      <!-- Modal body -->
        <div class="modal-body label-body">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" class="label-form">
                        <input type="text" id="myInput" class="form-control search_box" autocomplete="off" placeholder="Search labels">
                    </form>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <?php echo nestedLablesPopup();?>
                </div>
            </div>
        </div>
      
      <!-- Modal footer --> 
    </div>
</div>

<script>
$(document).ready(function(){ //console.log('aa');
    $("#myInput").on("keyup", function() { console.log('www');
      var value = $(this).val().toLowerCase();
      $("#mylabel li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
});
</script>