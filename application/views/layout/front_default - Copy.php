<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title><?php echo $title_for_layout; ?></title>
<base href="<?php echo base_url(); ?>" />
<link rel="icon" href="images/favicon.ico" type="x-icon">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/Menu.css">

<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/pe-icon-7-stroke.css">
<?php echo $css_for_layout; ?>
<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,800" rel="stylesheet">-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<?php  echo $js_for_layout; ?>
</head>

<body>
    <header class="inner-page-header">
        <div class="container">
          <div class="col-md-3">
              <div class="logo"><a href="<?php echo base_url(); ?>"><img src="images/logo.png" class="img-responsive"></a></div>
          </div>
          <div class="col-md-9">
              <nav id='cssmenu'>
                  <div id="head-mobile"></div>
                  <div class="button"></div>
                  <ul class="pull-right">
                      <li class='active'><a href='home/howit_work'>How it works</a></li>
                      <?php
                      if(!$this->session->userdata('dways_user_id')){
                      ?>
                      <li><a href='home/workwith_us'>Work with us</a></li>
                      <?php
                      }
                      ?>
                      <li>
                          <a href='javascript:;'>Support</a>
                          <ul>
                            <li><a href='home/customer_support'>Customer Support</a></li>
                            <li><a href='home/faq'>FAQ</a></li>
                          </ul>
                      </li>
                      <?php
                      if($this->session->userdata('dways_user_id')){
                          $getuser_details = $this->common_model->getIndividualUserDetails($this->session->userdata('dways_user_id'));
                      ?>
                      <li><a href='user/dashboard'><i class="fa fa-user" aria-hidden="true"></i><?php echo $getuser_details->first_name.' '.$getuser_details->last_name;?></a></li>
                      <li><a href='home/logout'><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                      <?php
                      }else{
                      ?>
                      <li><a href='home/login'><img src="images/login.png" width="13">Login</a></li>
                      <li><a href='home/sign_up'><i class="fa fa-user" aria-hidden="true"></i>Signup</a></li>
                      <?php
                      }
                      ?>

                      <li class="Rentbttn"><a href='space/addspace_profile'>Rent Your Dryveways</a></li>
                  </ul>
              </nav>
          </div>
        </div>
    </header>
    <div class="mywrapper">
    <?php  echo $content_for_layout;?>
    </div>
    <footer class="">
	<div class="footer-links">
            <div class="container">
            <div class="col-md-3 title">
                    <img src="images/logo.png" class="img-responsive">
            </div>
            <div class="col-md-3 col-md-offset-1">
                    <h4>Company</h4>
                    <ul>
                    <li><a href="home/about_us">About Us</a></li>
                    <li><a href="home/workwith_us">Work with us</a></li>
                    <li><a href="home/contact_us">Contact Us</a></li>
                    <li><a href="home/career">Careers</a></li>
                </ul>
            </div>
           <div class="col-md-2">
                    <h4>Help</h4>
                    <ul>

                    <li><a href="home/howit_work">How it Works</a></li>
                    <li><a href="home/faq">FAQ</a></li>
                    <li><a href="home/customer_support">Customer Support</a></li>

                </ul>
            </div>
           <div class="col-md-3">
                    <h4>Legal</h4>
                    <ul>
                    <li><a href="home/term_condition">Terms and Conditions</a></li>
                    <li><a href="home/privacy_policy">Privacy Policy</a></li>

                </ul>
            </div>
        </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>Copyright <span class="fa fa-copyright"></span> dryveways 2017. All Right Reserved</p>
            </div>
        </div>
    </footer>


</body>
</html>
