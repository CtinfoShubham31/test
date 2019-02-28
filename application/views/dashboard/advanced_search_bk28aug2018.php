<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css"/>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<div class="modal-dialog">
    <div class="modal-content"> 
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Advanced Search</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
      <!-- Modal body -->
        <div class="modal-body">
            <form action="dashboard/user_dashboard/advanced_search" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="First Name Or Last Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Post Type</label>
                            <select class="form-control" name="post_type" id="post_type">
                                <option value="">Select post type</option>
                                <option value="1">List</option>
                                <option value="2">Text</option>
                                <option value="3">Graphic</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Label</label>
                            <input type="text" class="form-control" name="label" id="labels" placeholder="Label">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6">
                        <label for="">Posts Created From</label>
                        <div class="form-group">
                            <input type="text" name="posts_created_from" id="posts_created_from" class="form-control" placeholder="From" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Posts Created To</label>
                            <input type="text" name="posts_created_to" id="posts_created_to" class="form-control" placeholder="To" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Posts Updated From</label>
                            <input type="text" name="posts_updated_from" id="posts_updated_from" class="form-control" placeholder="From" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Posts Updated To</label>
                            <input type="text" name="posts_updated_to" id="posts_updated_to" class="form-control" placeholder="To" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Serial Number From</label>
                            <input type="number" name="serial_from" id="serial_from" class="form-control" placeholder="From" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Serial Number To</label>
                            <input type="number" name="serial_to" id="serial_to" class="form-control" placeholder="To" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="checkbox">
                                <input name="attachment" id="attachment" type="checkbox">
                              <label for="attachment"> <strong>Attachment </strong></label>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="advsearch" value="1">

                    <div class="clearfix"></div>
                    <br/>
                    
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" type="submit"> 
                            <i class="fa fa-search"></i> Search Now 
                        </button>
                    </div>
                </div>
            </form>
        </div>
      
      <!-- Modal footer --> 
      
    </div>
</div>
<script>
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#posts_created_from').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    }); 
    $('#posts_created_to').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    });
    $('#posts_updated_from').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    });
    $('#posts_updated_to').datepicker({
        autoclose: true,  
        //format: "dd/mm/yyyy"
    });
    
    
    
});
</script>