<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center" id="msg">
            <p> <strong>Are you sure you want to delete?</strong></p>
        </div>
        <div class="modal-footer footer-center">
            <button type="button" class="btn btn-success" onclick="delete_device(<?php if(!empty($device_id)) { echo $device_id; }?>)" id="delete_perm"> Yes </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
        </div>
    </div>
</div>
