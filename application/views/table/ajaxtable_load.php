<thead>
        <tr id="theadrow">
            <th>#</th>
            <?php 
            $alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
            if(!empty($lists_data[0])){
                //echo COUNT($lists_data[0]);die('QQ');
                for($p = 0;$p <= COUNT($lists_data[0])-1;$p++){
                    echo $p.'xxx';
            ?>
                <?php //if(!empty($lists_data[0][$p])){?> <th id="sheet<?php echo $alpha_arr[$p].'1';?>" onclick="updateSheet('<?php echo $alpha_arr[$p].'1';?>')"><?php echo $lists_data[0][$p];?></th><?php  //}?>
            <?php
                }
            }
            ?>
        </tr>
    </thead>
    <tbody id="tbodyrow">
        <?php
        if(!empty($lists_data)){
            //print_r($lists_data);die;

            for($m = 1;$m <= COUNT($lists_data)-1;$m++){
        ?>
            <tr>
                <td onclick="removeTableRow('<?php echo $pstid= base64_decode($this->uri->segment(4));?>','<?php echo $m+1;?>')"><i class="fa fa-trash" data-original-title="Delete" style="cursor:pointer"></i></td>
        <?php
                for($s = 0; $s <= COUNT($lists_data[$m])-1; $s++){
        ?>
                <?php if(!empty($lists_data[$m][$s])){?> <td id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>" onclick="updateSheet('<?php echo $alpha_arr[$s].''.($m+1);?>')"><?php echo $lists_data[$m][$s];?></td><?php  }else{?><td onclick="updateSheet('<?php echo $alpha_arr[$s].''.($m+1);?>')" cell="<?php echo $alpha_arr[$s].''.($m+1);?>" id="sheet<?php echo $alpha_arr[$s].''.($m+1);?>"></td><?php }?>
        <?php
                }
        ?> 
            </tr>
        <?php
            }
        }
        ?>
    </tbody>