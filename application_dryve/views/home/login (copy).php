<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Dryveways</title>
<base href="<?php echo base_url(); ?>" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/Menu.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/pe-icon-7-stroke.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,800" rel="stylesheet">
</head>

<body>

    <?php include_once 'includes/header.php'; ?>
    
<div class="dw-wrapper">
  <div class="topHeading inner-form text-center">
    <div class="container">
      <h2>Login</h2>
    </div>
  </div>
  <div class="col-md-12 dw-register padd50">
    <div class="row">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 dw-inner-form">
            
            <form class="" method="post">
            <div class="_logo"> <img src="images/logo.png" class="img-responsive"> </div>
            
            <?php if($this->session->flashdata('account_verify_success')){ ?>
                <div class="form-group text-center success show">Your account has been verified successfully.</div>
            <?php } ?>
            
            <?php if(isset($login_error) && $login_error==1){ ?>
                <div class="form-group text-center error show">Invalid email or password</div>
            <?php } ?>
            
            <?php if(isset($login_error) && $login_error==2){ ?>
                <div class="form-group text-center error show">Your account is not verified</div>
            <?php } ?>
            
            <div class="form-group">
              <input autocomplete="off" type="text" placeholder="Email address" name="email" value="<?php echo set_value('email'); ?>">
                <?php echo form_error('email', '<p class="error">', '</p>'); ?>
            </div>
                
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" autocomplete="off">
                <?php echo form_error('password', '<p class="error">', '</p>'); ?>
                
            </div>
                
            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <input type="checkbox">
                  <label>Remember me</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <p class="pull-right">Forgot Password?</p>
                </div>
              </div>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="form-submit">Login</button>
            </div>
            <div class="form-group seperator text-center">
              <p>OR</p>
            </div>
            <div class="form-group social-login text-center">
              <a href="#" class="pull-left facebook"><span class="typcn typcn-social-facebook"></span>Facebook</a>
              <a href="#" class="pull-right google "><span class="typcn typcn-social-google-plus"></span>Google</a>
            </div>
            <h4 class="">Not a member ? <a href="signup">Sign Up</a></h4>
          </form>
            
        </div>
      </div>
    </div>
  </div>
</div>
    
    <?php include_once 'includes/footer.php'; ?>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/custom.js"></script> 
<script src="js/jquery-ui.js"></script>
</body>
</html>
