<div class="form-group">
    <select multiple style="width:100%;" class="chosen-select form-control sign-control" name="device_communicatewith[]" id="device_communicatewith">
<!--        <option > Communicate With </option>-->
        <?php
        //if(!empty($device_communicate)){
         //   foreach ($device_communicate as $dcomm) {
        ?>
<!--            <option value="<?php //echo $dcomm->device_usage_id;?>"><?php //echo $dcomm->device_usage;?></option>-->
        <?php
        //    }
        //}
        
        ?>
        <?php
        if(!empty($device_communicate)){
            foreach ($device_communicate as $dcomm) {
        ?>
            <option value="<?php echo $dcomm->device_id;?>"><?php echo $dcomm->device_name;?></option>
        <?php
            }
        }
        ?>
    </select>
    <?php echo form_error('device_communicatewith', '<span for="device_communicatewith" generated="true" class="error_msg">', '</span>', '</span>'); ?>
</div>