<section class="content-header">
    <h1>Vendor List</h1>
      
      <!---------------------------- menu path link for admin -------------------->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vendor List</li>
    </ol>
      <!---------------------------- menu path link for admin end -------------------->
</section>
<div class="clearfix"> </div>

<section class="content">
    <div class="row">
        
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8">
                    <div class="form-group text-right">   
                        <input class="form-control sign-control" onkeyup="searchDataRecord(this.value)"  placeholder="search" type="text">
                    </div> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bg">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Vendor Name </th>
                            <th>Amount Paid</th>
                            <th>Outstanding Amount </th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="search_data_record">
                        <?php
                        if(!empty($vend_lists)){
                            foreach($vend_lists AS $vlists){
                        ?>
                        <tr>
                            <td><?php if(!empty($vlists->vendor_name)){ echo $vlists->vendor_name; } ?></td>
                            <td><?php if(!empty($vlists->paid_amount)){ echo $vlists->paid_amount; } ?></td>
                            <td> 
<!--                                <i class="fa fa-inr" aria-hidden="true"></i>-->
                                <?php if(!empty($vlists->remaining_amount)){ echo $vlists->remaining_amount; } ?>
                                
                            </td>
                            <td><?php if(!empty($vlists->final_amount)){ echo $vlists->final_amount; } ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div> 
         
    
</section> <!-----section ------>


  <!-- /.content-wrapper --> 

  

