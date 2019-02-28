<div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add Rows and column</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <!-- Modal body -->
        <div class="modal-body">
<!--            <form action="/action_page.php" class="form-horizontal">-->
                <div class="row">
                    <div class="form-group new-group">
                        <label class="control-label col-sm-6" for="email">No. of Column:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="col_no" name="col_no">
                        </div>
                    </div>
                    
                    <div class="form-group new-group">
                        <label class="control-label col-sm-6" for="email">No. of Rows:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="row_no" name="row_no">
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <br/>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary search-btn btn-lg" onclick="loadTableContent()"> Create Table </button>
                    </div>
                </div>
<!--            </form>-->
        </div>
    </div>
</div>