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
            
            
            <form id="contact-form" method="post" role="form"> 
              
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
                <?php echo form_error('g-recaptcha-response', '<p class="error show">', '</p>'); ?>
                <div class="g-recaptcha" data-sitekey="6LcAMSQUAAAAACt59P47zgHBy_DikA5waJzb83So"></div> 
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
<script src='https://www.google.com/recaptcha/api.js'></script>