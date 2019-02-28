<?php

    if(!empty($jdata->username)){
        foreach ($jdata->username as $uids) {
    ?>
        <input type="hidden" name="username[]" id="username" value="<?php echo $uids;?>">
    <?php
        }
    }else{
    ?>
        <input type="hidden" name="username[]" id="username" value="">
    <?php
    }
    ?>
    
    <?php
    if(!empty($jdata->labels)){
        foreach ($jdata->labels as $labids) {
    ?>
    <input type="hidden" name="labels[]" id="labels" value="<?php echo $labids;?>">
    <?php
        }
    }else{
    ?>
    <input type="hidden" name="labels[]" id="labels" value="">
    <?php
    }
    ?>

    <input type="hidden" name="post_type" id="post_type" value="<?php if(!empty($jdata->post_type)){ echo $jdata->post_type; } ?>">
    <input type="hidden" name="title" id="title" value="<?php if(!empty($jdata->title)){ echo $jdata->title; } ?>">
    <input type="hidden" name="posts_created_from" id="posts_created_from" value="<?php if(!empty($jdata->posts_created_from)){ echo $jdata->posts_created_from; } ?>">
    <input type="hidden" name="posts_created_to" id="posts_created_to" value="<?php if(!empty($jdata->posts_created_to)){ echo $jdata->posts_created_to; } ?>">
    <input type="hidden" name="posts_updated_from" id="posts_updated_from" value="<?php if(!empty($jdata->posts_updated_from)){ echo $jdata->posts_updated_from; } ?>">
    <input type="hidden" name="posts_updated_to" id="posts_updated_to" value="<?php if(!empty($jdata->posts_updated_to)){ echo $jdata->posts_updated_to; } ?>">
    <input type="hidden" name="serial_from" id="serial_from" value="<?php if(!empty($jdata->serial_from)){ echo $jdata->serial_from; } ?>">
    <input type="hidden" name="serial_to" id="serial_to" value="<?php if(!empty($jdata->serial_to)){ echo $jdata->serial_to; } ?>">
    <input type="hidden" name="attachment" id="attachment" value="<?php if(!empty($jdata->attachment)){ echo $jdata->attachment; } ?>">
    <input type="hidden" name="tab_type" id="tab_type" value="<?php if(!empty($jdata->tab_type)){ echo $jdata->tab_type; } ?>">
    <input type="hidden" name="advsearch" value="1">
