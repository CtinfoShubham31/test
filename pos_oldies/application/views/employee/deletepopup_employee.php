<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center" id="msg">
            <p> <strong>Are you sure you want to delete?</strong></p>
        </div>
        <div class="modal-footer footer-center">
            <button type="button" class="btn btn-success" onclick="delete_emp(<?php if(!empty($emp_id)) { echo $emp_id; }?>)" id="delete_emp"> Yes </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
        </div>
    </div>
</div>
