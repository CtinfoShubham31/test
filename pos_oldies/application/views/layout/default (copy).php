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

</head>

<body class="hold-transition skin-blue sidebar-mini admin-bg">
<div class="wrapper">
    <header class="main-header"> 
        <!-- Logo -->
        <div align="center"> <a href="index.html" class="logo"> 
            <!-- mini logo for sidebar mini 50x50 pixels --> 
            <span class="logo-mini"><img src="img/logo-mini.png" class="img-responsive"> </span> 
            <!-- logo for regular state and mobile devices --> 
            <span class="logo-lg"><img src="img/logo.png" class="img-responsive"></span> </a> 
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top"> </nav>
    </header>
  
    <!-- Content Header (Page header) -->
    <div class="content-wrapper remove-wrapper">
        <?php  echo $content_for_layout;?>
    </div> 
</div>
<!-- ./wrapper --> 

<script src="js/jquery.js"></script> 
<!-- Bootstrap --> 
<script src="js/bootstrap.min.js"></script>

<!-- AdminLTE App --> 
<script src="js/app.min.js"></script> 
<?php  echo $js_for_layout; ?>
<!------------ upload img script start---------> 

</body>
</html>





    
    
