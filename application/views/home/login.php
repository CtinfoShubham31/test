<!DOCTYPE>
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kaseidon</title>
<base href="<?php echo base_url(); ?>" />
<!-- css -->
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<!-- css end -->
</head>

<body id="page-top">
    <div class="bg-grey">
        <div class="container text-center">
  
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-form">
                        <h1> <center><img src="img/logo.png" class="img-responsive"/></center> </h1>
                        <form method="post" autocomplete="off">
                              
                            <?php if(isset($login_error) && $login_error==1){ ?>
                                <div class="form-group text-center error_msg">Invalid email or password.</div>
                            <?php } 
                            else if(isset($login_error) && $login_error==2){ 
                            ?>
                                <div class="form-group text-center error_msg">Your account is disabled by admin.</div>
                            <?php } ?>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" name="email" class="input email" placeholder="Email" autocomplete="off">
                                    <?php echo form_error('email', '<p class="error_msg">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="password" name="password" class="input password" placeholder="Password" autocomplete="off">
                                    <?php echo form_error('password', '<p class="error_msg">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="col-md-12">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="index.html">
                                            <button type="submit" class="login-btn">LOGIN</button>
                                        </a>         
                                    </div>
                                </div>
                            </div>
                      </form>
                  </div>            
              </div>
          </div>
      </div>
  </div>
<!--login page-->


<!-- js start -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"/></script>
<!-- js end -->

<script type="text/javascript">

</script>
</body>

</html>
