<link rel="stylesheet" type="text/css"  href="css/bootstrap-datetimepicker.min.css" />	<!-- css -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.min.js"></script> 
<script type="text/javascript" src="js/moment-with-locales.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepick').each(function(){
            $(this).datetimepicker();
        });
    });
</script>
<tr id="tax_row10">
  
    <td id="edit_tax_name10"> <input type="text" name="txname" id="txname" value="<?php if(!empty($tax_name)){ echo $tax_name; }?>">  </td>
    <td> 
        
        <table style="width:100%" id="subtable">
            <tbody>
                <tr>
                    <th>Percentage</th>
                    <th>Applicable From</th>
                </tr>
                <?php
                if(!empty($tax_percentage)){
                    
                    foreach($tax_percentage as $taxp){
                ?>
            
                <tr>
                    <td><input type="text" name="txper" id="taxper" value="<?php echo $taxp->percentage;?>">% </td>
                    <td> <input class="datepick" type="text" name="txappcab" id="txappcab" value="<?php echo date("m/d/Y H:i:s",strtotime($taxp->applicable_from));?>"></td>
                </tr>
                <?php
                       
                    }
                }
                ?>
                
            </tbody>
        </table>
    
    </td>

    <td> 
        <a onclick="edit_tax(10)" id="edit_tax"> <i aria-hidden="true" class="fa fa-pencil"></i> </a> &nbsp; &nbsp;
        <a onclick="deletepopup_tax(10)" data-target="#delete-modal" data-toggle="modal"> <i aria-hidden="true" class="fa fa-times"></i> </a>
    </td>

</tr>