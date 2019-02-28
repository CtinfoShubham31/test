<thead>
<!--    <tr id="theadrow">-->
    <tr id="theadrow">
        <th><input type="checkbox" value="all" onclick="checkedAll(this)"></th>
        <?php 
        $alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        for($i=1;$i<=$col_no;$i++){
        ?>
        <th id="sheet<?php echo $alpha_arr[$i-1].'1';?>">
            <input cell="<?php echo $alpha_arr[$i-1].'1';?>" id="sheet<?php echo $alpha_arr[$i-1].'1';?>" value="" type="text">
        </th>
        <?php 
        }
        ?>
    </tr>
</thead>
<tbody id="tbodyrow">
    <?php 
    for($j=1;$j<=$row_no;$j++){
    ?>
        <tr>
            <td><input type="checkbox" value="<?php echo $j+1;?>" class="cked" name="allchk" id="allchk"></td>
    <?php
            for($k=1;$k<=$col_no;$k++){
    ?>
            <td id="sheet<?php echo $alpha_arr[$k-1].($j+1);?>"><input cell="<?php echo $alpha_arr[$k-1].($j+1);?>" id="sheet<?php echo $alpha_arr[$k-1].($j+1);?>" value="" type="text"></td><?php
            }
    ?> 
        </tr>
    <?php
    }
    //}
    ?>
</tbody>
<input type="hidden" name="file_xlsx" id="file_xlsx" value="<?php if(!empty($file_xlsx)){ echo $file_xlsx; }?>"
