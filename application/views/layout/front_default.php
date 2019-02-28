<!DOCTYPE html>
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kaseidon</title>
<base href="<?php echo base_url(); ?>" />
<!-- css -->
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link href="css/emoji.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<!-- css end -->
<!--<link rel='stylesheet prefetch' href="css/bootstrap-datetimepicker.min.css">-->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">-->
<?php echo $css_for_layout; ?>

<!-- js start --> 
<!--<script type="text/javascript" src="js/jquery.min.js"></script> -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.min.js"/></script> 
<!--<script src="js/moment-with-locales.min.js"></script> 
<script src="js/bootstrap-datetimepicker.min.js"></script> -->
<!-- data table js -->
<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->

<?php  echo $js_for_layout; ?>

</head>
<!--search modal -->
<body>



<!-- //label modal -->
<header id="header">
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="<?php echo base_url();?>"><img src="img/logo.png" alt="logo"></a> 
            </div>
            <div class="collapse navbar-collapse navbar-right">
                <?php 
                $user_deatils = $this->common_model->getIndividualUserDetails($this->session->userdata('kaseidon_user_id'));
                ?>
                <ul class="nav navbar-nav">
                    <li><a href="dashboard/user_dashboard/all_posts"><i class="fa fa-home"></i> Home</a></li>
<!--                    <li><a href="javascript:;"><i class="fa fa-bell"></i> Notifications</a></li>-->
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="updateReadStatus(<?php echo $usrid = $this->session->userdata('kaseidon_user_id');?>)"> 
                             <?php $notif_no = notificationCount(); ?>
                            <span class="relative"> 
                                <i class="fa fa-bell"></i>
                                <div class="bell-circle" id="bell_notif"> <?php if(!empty($notif_no)){ echo $notif_no; }else{ echo $notif_no; }?></div>
                            </span>
                            Notifications 
                            <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu drop-mini drop-notif">
                                <?php echo getUserNotification();?>
                            </ul>
                    </li>
                    <li class="dropdown" title="<?php if(!empty($user_deatils)){ echo $user_deatils->first_name.' '.$user_deatils->last_name; }?>"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="fa fa-user"></i>
                            <?php 
                            if(!empty($user_deatils)){ echo shortText($user_deatils->first_name.' '.$user_deatils->last_name,14); }
                            ?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu drop-mini">
<!--                          <li><a href="javascript:;">My Posts</a></li>-->
                          <li><a href="home/logout">Logout</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="post/manage_post/add_post">
                            <button class="btn btn-primary search-btn pull-right" type="button"> Add Post </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <!--/.container--> 
  </nav>
  <!--/nav-->  
</header>
<!--/header-->

<script>
    
  
    function updateReadStatus(usrid){
        $.ajax({
            type: "POST",
            url:"notification/user_notification/update_readstatus",
            data: {user_id:usrid},
            success: function(data){
                if(data=='true'){
                    $("#bell_notif").html('0');
                }
            },
            error: function(){
               alert("failure");
            }
        });
    }
</script>

<?php  echo $content_for_layout;?>





</body>

</html>
