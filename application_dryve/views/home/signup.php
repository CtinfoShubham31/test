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
      <h2>SIgn Up</h2>
    </div>
  </div>
  <div class="col-md-12 dw-register padd50">
    <div class="row">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 dw-inner-form">
            
            
            <form class="" id="contact-form" method="post"  role="form" onsubmit="return CheckCaptcha();"> 
              
            <div class="_logo"> <img src="images/logo.png" class="img-responsive"> </div>
            <div class="form-group">
              <input autocomplete="off" type="text" placeholder="First name" name="first_name" value="<?php echo set_value('first_name'); ?>">
              <?php echo form_error('first_name', '<p class="error show">', '</p>'); ?>
            </div>
            <div class="form-group">
              <input autocomplete="off" type="text" placeholder="Last name" name="last_name" value="<?php echo set_value('last_name'); ?>">
              <?php echo form_error('last_name', '<p class="error show">', '</p>'); ?>
            </div>
            <div class="form-group">
              <input autocomplete="off" type="text" placeholder="Email address"  name="email" value="<?php echo set_value('email'); ?>">
              <?php echo form_error('email', '<p class="error show">', '</p>'); ?>
            </div>
            <div class="form-group">
              <input autocomplete="off" type="password" placeholder="Create password" name="password" >
              <?php echo form_error('password', '<p class="error show">', '</p>'); ?>
            </div>
            <div class="form-group">
              <input autocomplete="off" type="password" placeholder="Confirm password" name="cpassword" >
              <?php echo form_error('cpassword', '<p class="error show">', '</p>'); ?>
            </div>
            <div class="form-group">
              <fieldset>
                <?php /*<span id="SuccessMessage" class="success">Your have successfully entered the captcha.</span>*/ ?>
                <input autocomplete="off" type="text" id="UserCaptchaCode" class="CaptchaTxtField" placeholder='Enter Captcha - Case Sensitive'>
                <span id="WrongCaptchaError" class="error"></span>
                <div class='CaptchaWrap'>
                  <div id="CaptchaImageCode" class="CaptchaTxtField">
                    <canvas id="CapCode" class="capcode" width="300" height="80"></canvas>
                  </div>
                  <input type="button" class="ReloadBtn" onclick='CreateCaptcha();'>
                </div>
              </fieldset>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="form-submit">Sign Up</button>
            </div>
            
          </form>
            
        </div>
      </div>
    </div>
  </div>
       
    
</div>
    
    <?php include_once 'includes/footer.php'; ?>
    
<script src='https://www.google.com/recaptcha/api.js'></script> 
<script src="js/validator.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/custom.js"></script> 
<script src="js/jquery-ui.js"></script>
<script>
var cd;

$(function(){
  CreateCaptcha();
});

// Create Captcha
function CreateCaptcha() {
  //$('#InvalidCapthcaError').hide();
  var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                    
  var i;
  for (i = 0; i < 6; i++) {
    var a = alpha[Math.floor(Math.random() * alpha.length)];
    var b = alpha[Math.floor(Math.random() * alpha.length)];
    var c = alpha[Math.floor(Math.random() * alpha.length)];
    var d = alpha[Math.floor(Math.random() * alpha.length)];
    var e = alpha[Math.floor(Math.random() * alpha.length)];
    var f = alpha[Math.floor(Math.random() * alpha.length)];
  }
  cd = a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f;
  $('#CaptchaImageCode').empty().append('<canvas id="CapCode" class="capcode" width="300" height="80"></canvas>')
  
  var c = document.getElementById("CapCode"),
      ctx=c.getContext("2d"),
      x = c.width / 2,
      img = new Image();

  img.src = "images/banner.jpg";
  img.onload = function () {
      var pattern = ctx.createPattern(img, "repeat");
      ctx.fillStyle = pattern;
      ctx.fillRect(0, 0, c.width, c.height);
      ctx.font="46px Roboto Slab";
      ctx.fillStyle = '#ccc';
      ctx.textAlign = 'center';
      ctx.setTransform (1, -0.12, 0, 1, 0, 15);
      ctx.fillText(cd,x,55);
  };
  
  
}

// Validate Captcha
function ValidateCaptcha() {
  var string1 = removeSpaces(cd);
  var string2 = removeSpaces($('#UserCaptchaCode').val());
  if (string1 == string2) {
    return true;
  }
  else {
    return false;
  }
}

// Remove Spaces
function removeSpaces(string) {
  return string.split(' ').join('');
}

// Check Captcha
function CheckCaptcha() {
  var result = ValidateCaptcha();
  if( $("#UserCaptchaCode").val() == "" || $("#UserCaptchaCode").val() == null || $("#UserCaptchaCode").val() == "undefined") {
    $('#WrongCaptchaError').text('Please enter code given below in a picture.').show();
    $('#UserCaptchaCode').focus();
    return false;
  } else {
    if(result == false) { 
      $('#WrongCaptchaError').text('Invalid Captcha! Please try again.').show();
      CreateCaptcha();
      $('#UserCaptchaCode').focus().select();
      return false;
    }
    else { 
      $('#UserCaptchaCode').val('').attr('place-holder','Enter Captcha - Case Sensitive');
      //CreateCaptcha();
      $('#WrongCaptchaError').fadeOut(100);
      //$('#SuccessMessage').fadeIn(500).css('display','block').delay(5000).fadeOut(250);
      return true;
    }
  }  
}
</script>
</body>
</html>
