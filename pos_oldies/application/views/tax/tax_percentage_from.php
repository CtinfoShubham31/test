<!--<tr>
    <th>Percentage</th>
    <th>Applicable From</th>
</tr>-->
<?php
if(!empty($tax_percentage)){
    $count = COUNT($tax_percentage);
    $i=1;
    foreach($tax_percentage as $taxp){
?>
                        
<tr>
    <td>
        <input type="text" name="txper" id="taxper" value="<?php echo $taxp->percentage;?>">
        
    </td>
    <td>
        <input class="datepick" type="text" name="txappcab" id="txappcab" value="<?php echo date("m/d/Y H:i:s",strtotime($taxp->applicable_from));?>">
        <?php if($i==$count){ ?><a id="gone" onclick="addTextBox(<?php echo $taxp->tax_id;?>)">plus</a><?php } ?>
    </td>
</tr>
<?php
    $i++;
    }
}
?>
                
            