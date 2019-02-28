<thead>
<th>#</th>
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
</thead>
<tbody id="tbodyrow">
    <?php 
    for($j=1;$j<=$row_no;$j++){
    ?>
    <tr id="delsheet<?php echo $j;?>">
        <td onclick="removeTableRow(<?php echo $j;?>)"><i class="fa fa-trash" data-original-title="Delete" style="cursor:pointer"></i></td>
        <?php
        for($k=1;$k<=$col_no;$k++){
        ?>
            <td id="sheet<?php echo $alpha_arr[$k-1].($j+1);?>"><input cell="<?php echo $alpha_arr[$k-1].($j+1);?>" id="sheet<?php echo $alpha_arr[$k-1].($j+1);?>" value="" type="text"></td>
        <?php 
        }
        ?>
    </tr>
    <?php
    }
    ?>
</tbody>