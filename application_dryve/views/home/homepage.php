<div class="dw-wrapper">
    <section class="dw-banner">
        <div class="container">
            <div class="BannerTitle">
                <h1 class="text-center">Find a Dryveways</h1>
            </div>
            <div class="searchBar">
                <form method="post" name="search_space" action="space/search_parking_space" onsubmit="return validateform()">
                    <input name="search_address" id="search_address" type="text" placeholder="Enter Destination" class="destination">
                    
                    <input name="latitude" id="latitude" type="hidden" placeholder="Enter Destination" class="destination">
                    <input name="longitude" id="longitude" type="hidden" placeholder="Enter Destination" class="destination">
                    <div class="DateTime">
                        <input name="fromdatetime" id="fromdatetime" type="text" class="new-control _date" id="fromdatetime" readonly="readonly"/>
                    </div>
                    <div class="DateTime">
                        <input name="todatetime" id="todatetime" type="text" id="todatetime" class="new-control _date">
                    </div>
                    <button type="submit" class="searchBttn bttn"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
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

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&region=uk&key=AIzaSyCZP7HE5z3JsTD1qAaLkIeG2y63_QogQEw"></script>
<script>
    initialize();
    
    var autocomplete;
    function initialize() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('search_address')),
            { types: ['geocode'] });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById("search_address").value;
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $("#latitude").val(latitude);
                    $("#longitude").val(longitude);
                    //alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                } else {
                    alert("Request failed.");
                }
            });
        });
    }
    
    function validateform(){  
        var search_address = document.search_space.search_address.value;  
        var fromdatetime = document.search_space.fromdatetime.value;  

        if(search_address == null || search_address == ""){  
            alert("Name can't be blank");  
            return false;  
        }else if(password.length<6){  
            alert("Password must be at least 6 characters long.");  
            return false;  
        }  
    }  
    
$(document).ready(function() {
    $('#fromdatetime').datetimepicker({  
        format: 'MM/DD/YYYY LT',
        minDate: 'now',
        ignoreReadonly: true
    });
    $('#todatetime').datetimepicker({  
        format: 'MM/DD/YYYY LT',
        minDate: 'now'
    });
});
    
</script>





