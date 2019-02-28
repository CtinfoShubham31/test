<section class="content-header">
    <h1>Customer List</h1>
      
    <!---------------------------- menu path link for admin -------------------->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer List</li>
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
                            <th> Customer Name </th>
                            <th> Contact Information </th>
                            <th> Invoice Amount Generated </th>
                        </tr>
                    </thead>
                    <tbody class="search_data_record">
                        <?php
                        if(!empty($cust_lists)){
                            foreach($cust_lists AS $clists){
                        ?>
                        <tr>
                            <td><?php if(!empty($clists->cust_name)){ echo $clists->cust_name; } ?></td>
                            <td><?php if(!empty($clists->phone_no)){ echo $clists->phone_no; } ?></td>
                            <td> 
<!--                                <i class="fa fa-inr" aria-hidden="true"></i>-->
                                <?php if(!empty($clists->sum_amount)){ echo $clists->sum_amount; } ?>
                            </td>
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

