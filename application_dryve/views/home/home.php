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

<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,800" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/moment-with-locales.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
</head>

<body>

    <?php include_once 'includes/header.php'; ?>
    
<div class="dw-wrapper">
  <section class="dw-banner">
    <div class="container">
      <div class="BannerTitle">
        <h1 class="text-center">Find a Dryveways</h1>
      </div>
      <div class="searchBar">
        <input type="text" placeholder="Enter Destination" class="destination">
        <div class="DateTime">
         <input type="text" class="new-control _date" id="starttime" placeholder="Start date"/>
        </div>
        <div class="DateTime">
          <input type="text" id="endtime" class="new-control _date" placeholder="End date">
        </div>
        <button type="submit" class="searchBttn bttn"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
    </div>
  </section>
  <section class="dw-about padd50 text-center">
    <div class="container">
      <h3 class="MainTitle text-center">About dryveways</h3>
      <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat erat ac ultrices mollis. Proin facilisis ex nisi, nec laoreet <br>
        lacus sollicitudin sit amet. Aenean et mi posuere, pellentesque ipsum in, posuere tellus.Lorem ipsum dolor sit amet, <br>
        consectetur adipiscing elit. Maecenas volutpat erat ac ultrices mollis. Proin facilisis ex nisi.</p>
      <button class="readmore bttn">Read More</button>
    </div>
  </section>
  <section class="dw-HowItWork padd50">
    <div class="container">
      <h3 class="MainTitle text-center">How It Work</h3>
      <div class="col-md-12 dw-process">
        <div class="row">
          <div class="col-md-4 text-center"> <img src="images/search-512.jpg" class="img-responsive" />
            <h4>Search for location</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat erat ac ultrices mollis consectetur adipiscing.</p>
          </div>
          <div class="col-md-4 text-center"> <img src="images/booking.jpg" class="img-responsive" />
            <h4>Book Parking</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat erat ac ultrices mollis consectetur adipiscing.</p>
          </div>
          <div class="col-md-4 text-center"> <img src="images/credit-card.jpg" class="img-responsive" />
            <h4>Save on parking fees</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat erat ac ultrices mollis consectetur adipiscing.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="dw-contact">
    <div class="col-md-6 dw-contact-house">
      <div class="row"> <img src="images/house-dryve.jpg" class="img-responsive"> </div>
    </div>
    <div class="col-md-6 dw-contact-content">
      <div class="row">
        <h3>Contact us</h3>
        <div class="contact-list">
          <ul>
            <li><span class="pe-7s-mail"></span>abcdemo@gmail.com</li>
            <li><span class="pe-7s-call"></span>+91- 123456789</li>
            <li><span class="pe-7s-map-marker"></span>505, Lorem ipsum dolor, sit amet</li>
          </ul>
        </div>
        <div class="social-list">
          <ul>
            <li><a href="#" class="typcn typcn-social-facebook"></a></li>
            <li><a href="#" class="typcn typcn-social-twitter"></a></li>
            <li><a href="#" class="typcn typcn-social-google-plus"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="dw-store padd50">
    <div class="container">
      <div class="col-md-7 StoreContent">
        <h2>Get the app for<br>
          <span>Android and iPhone</span></h2>
        <div class="Playstore"> <img src="images/GooglePlay.jpg" class="img-responsive googleplay"> <img src="images/appstore.jpg" class="img-responsive appstore"> </div>
        <div class="Playstore-icon"> <img src="images/Android_robot.jpg" class="img-responsive"> <img src="images/ios.jpg" class="img-responsive"> </div>
      </div>
      <div class="dw-store-mobile"> <img src="images/dd.png" class="img-responsive"> </div>
    </div>
  </section>
</div>
    
    <?php include_once 'includes/footer.php'; ?>
    
<script type="text/javascript" src="js/custom.js"></script> 


<script>

$(document).ready(function() {
 
   $(function () {
                $('#starttime').datetimepicker();
    });
 
  
  $(function () {
                $('#endtime').datetimepicker();
    });
	
   });
  
</script>

</body>
</html>
