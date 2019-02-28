<div class="form-group">
    <select class="form-control sign-control" name="device_usage" id="device_usage">
        <option selected disabled> Usage </option>
        <?php
        if(!empty($device_usage)){
            foreach ($device_usage as $dusage) {
        ?>
            <option value="<?php echo $dusage->device_usage_id;?>"><?php echo $dusage->device_usage;?></option>
        <?php
            }
        }
        ?>
    </select>
    <?php echo form_error('device_usage', '<span for="device_usage" generated="true" class="error_msg">', '</span>', '</span>'); ?>
</div>