<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo $title_for_layout; ?></title> 
<base href="<?php echo base_url(); ?>" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="fonts/roboto/stylesheet.css"/>
<link href="css/bootstrap-toggle.min.css" rel="stylesheet">
<?php echo $css_for_layout; ?>	<!-- css -->
<!---member chart js--->

<script src="js/jquery.js"></script> 
<!-- Bootstrap --> 
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function(){ $("#fadeout").fadeOut(12000); }, 4000);
    });
    
   
    
    function searchDataRecord(element){
       var value = element.toLowerCase();
        
        var $tr = $(".search_data_record > tr");
        
        $tr.hide();
        $tr.filter(function() {
            return $(this).text().toLowerCase().indexOf(value) > -1;
        }).show();
    }
    
    function reset_form(){
        location.reload(true);
    }
    
    function removeMessage(){
        $('.box_alert').remove();
    }
    
    function syncgiddh_popup(){
        $.ajax({
            type: "POST",
            url: "company/companypage/syncgiddh_popup",
            success: function(data){
                $("#giddh-popup").html(data);
            },
            error: function(){
               alert("failure");
            }
        });
    }
    
    
    
    
    
</script>
</head>

<div class="modal fade" id="giddh-popup" role="dialog">
    
</div>

<!--<body class="hold-transition skin-blue sidebar-mini admin-bg">-->
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse admin-bg">
    <div class="wrapper">
        <header class="main-header"> 
            <!-- Logo -->
            <div align="center"> <a href="#" class="logo"> 
                <!-- mini logo for sidebar mini 50x50 pixels --> 
                <span class="logo-mini"><img src="img/logo-mini.png" class="img-responsive"> </span> 
                <!-- logo for regular state and mobile devices --> 
                <span class="logo-lg"><img src="img/logo.png" class="img-responsive"></span> </a> 
            </div>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top"> 
            
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                        <?php
                        $company_id = $this->session->userdata('pos_companyid');
                        $giddh_info = $this->common_model->getGiddhCompanyInfo($this->session->userdata('pos_companyid'));
                        if(!empty($company_id) && empty($giddh_info->giddh_auth_key) && empty($giddh_info->giddh_comp_unique_name)){
                        ?>
                        <li class="dropdown user user-menu">
                            <a href="javascript:;" data-toggle="modal" data-target="#giddh-popup" onclick="syncgiddh_popup()" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="img/giddh-icon.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"> Sync with Giddh</span>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                        
                        
                        <li class="dropdown user user-menu">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hidden-xs"> Admin </span>
                            </a>
                            <ul class="dropdown-menu">
                                
                                <li class="user-header">
                                    <?php
                                    if($this->session->userdata('pos_companyid')){
                                        $company_details = $this->common_model->getCompany($this->session->userdata('pos_companyid'));
                                    ?>
                                    <img src="upload/company_logos/<?php echo $file_name = (!empty($company_details->image_logo))?$company_details->image_logo:'user.png';?>" class="img-circle">
                                    <p>
                                      <?php echo $comp_name = (!empty($company_details->name))?$company_details->name:'';?>
<!--                                      <small> Web Developer </small>-->
                                    </p>
                                     <?php
                                    }else{
                                    ?>
                                    <img src="upload/company_logos/user.png" class="img-circle">
                                    <?php
                                    }
                                    ?>
                                </li>
                               
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="company/companypage/add_company" class="btn btn-default"> Setting </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="home/homepage/logout" class="btn btn-default">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            
            </nav>
        </header>
  
        <!-- Content Header (Page header) -->
        <?php
        if($this->session->userdata('pos_companyid')){
        ?>
        <aside class="main-sidebar">
            <div class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <a href="company/companypage/add_company">
                            <div align="center"> 
                                <img src="img/giddh-icon.png" class="img-responsive img-circle" alt="User Image"> 
                            </div>
                        </a>
                    </div>
                    <div class="pull-left info">
                        <p> <?php if(!empty($company_details->name)){ echo $company_details->name; } ?> </p>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="active treeview">
                        <a href="dashboard/dashboard_setup/manage_dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="location/locationpage/manage_location">
                            <i class="fa fa-map-marker location-maker"></i>
                            <span> Location Management </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="employee/employee_setup/manage_employee">
                            <i class="fa fa-users"></i>
                            <span> Employee Management </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="device/device_setup/manage_device">
                            <i class="fa fa-desktop"></i>
                            <span> Device Management </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="javascript:;">
                            <i class="fa fa-cubes"></i> <span> Inventory Management </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="inventory/category_setup/manage_category"><i class="fa fa-circle-o"></i> Category list </a></li>
                            <li><a href="inventory/stock_setup/manage_stock"><i class="fa fa-circle-o"></i> Stock list  </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="payment/payment_setup/manage_payment">
                            <i class="fa fa-credit-card"></i> <span> Payment  </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="discount/discount_setup/manage_discount">
                            <i class="fa fa-tag"></i> <span> Discount  </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="permission/permission_setup/manage_permission">
                            <i class="fa fa-unlock-alt"></i> <span> Permission </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="tax/tax_setup/manage_tax">
                            <i class="fa fa fa-percent"></i> <span> Tax </span>
                        </a>          
                    </li>
                    <li class="treeview">
                        <a href="purchase_order/purchase_order_setup/manage_purchase_order">
                            <i class="fa fa-shopping-cart"></i> <span> Purchase Order </span>
                        </a>          
                    </li>
<!--                    <li class="treeview">
                        <a href="javascript:;">
                            <i class="fa fa-fw fa-bar-chart-o"></i> <span> Analytics </span>
                        </a>
                     </li>-->
                    <li class="treeview">
                        <a href="javascript:;">
                          <i class="fa fa-cubes"></i> <span> Analytics </span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="analytics/analytics_setup/manage_sales_report"><i class="fa fa-circle-o"></i> Sales report </a>
                            <li><a href="analytics/analytics_setup/payment_received_report"><i class="fa fa-circle-o"></i> Payment Received <br/> &nbsp; &nbsp; &nbsp; &nbsp; Report  </a>
                            <li><a href="analytics/analytics_setup/expense_report"><i class="fa fa-circle-o"></i> Expense Report </a>
                            <li><a href="analytics/analytics_setup/customer_lists"><i class="fa fa-circle-o"></i> Customers List  </a>
                            <li><a href="analytics/analytics_setup/vendor_lists"><i class="fa fa-circle-o"></i> Vendor List </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
    
        <div class="content-wrapper">
            <?php  echo $content_for_layout;?>
        </div>
        <?php
        }else{
        ?>
        <div class="content-wrapper remove-wrapper">
            <?php  echo $content_for_layout;?>
        </div>
        <?php
        }
        ?>
     
    </div>
<!-- ./wrapper --> 



<!-- AdminLTE App --> 
<script src="js/app.min.js"></script> 
<?php  echo $js_for_layout; ?>
<!------------ upload img script start---------> 

</body>
</html>





    
    
