<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Admin Kaseidon</title>
    <base href="<?php echo base_url(); ?>" />
    <link rel="icon" href="images/favicon.ico" type="x-icon">
    <link href="admin_design/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_design/css/metisMenu.min.css" rel="stylesheet">
    <link href="admin_design/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin_design/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php echo $css_for_layout; ?>	<!-- css -->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="admin_design/js/jquery.min.js"></script>
    <script src="admin_design/js/bootstrap.min.js"></script>
    <script src="admin_design/js/metisMenu.min.js"></script>
    <script src="admin_design/js/sb-admin-2.js"></script>
    <?php  echo $js_for_layout; ?>

</head>

<body id="Main">
    <!-- Navigation -->
    <nav class="navbar AdminHeader navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:;"><img src="images/logo.png" class="img-responsive"></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
<!--                    <li><a href="admin/admin_users/change_password"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a></li>-->
                    <li><a href="ks_admin/admin_home/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;User <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="ks_admin/admin_user/user_lists">User Lists</a>
                            </li>
                            <li>
                                <a href="ks_admin/admin_user/add_user">Add User</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-newspaper-o"></i> &nbsp;Post <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="ks_admin/admin_post/post_lists">Post Lists</a>
                            </li>
                        </ul>
                    </li>
                    
<!--                    <li>
                        <a href="#"><i class="fa fa-user" style="font-size: 15px;" aria-hidden="true"></i> &nbsp;User <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/admin_users/user_lists">User Lists</a>
                            </li>
                        </ul>
                    </li>-->
                    
<!--                    <li>
                        <a href="#"><i class="fa fa-car" style="font-size: 15px;" aria-hidden="true"></i> &nbsp;Dryveways <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/admin_dryveways/alldryveways_lists">Dryveways Lists</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-money" style="font-size: 15px;" aria-hidden="true"></i> &nbsp;Booked Dryveways <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/admin_dryveways/allbookdryveways_lists">Booked Dryveways Lists</a>
                            </li>
                        </ul>
                    </li>-->
                    
                </ul>
            </div>
        </div>
    </nav>
        
    <?php  echo $content_for_layout;?>
        
    

</body>

</html>


    
    
