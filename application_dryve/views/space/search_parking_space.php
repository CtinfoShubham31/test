<div class="dw-wrapper">
    <section class="search-filter">
        <div class="container">
            <div class="search-parking">
                <div class="col-md-10">
                    <div class="row">
<!--                        <form method="post">
                            <div class="searchBar">
                                <input name="search_user" type="text" placeholder="Enter Destination" class="destination">
                                <div class="DateTime">
                                    <input type="text" class="new-control _date" name="starttime" id="starttime" placeholder="Start date"/>
                                </div>
                                <div class="DateTime">
                                    <input type="text" name="endtime" id="endtime" class="new-control _date" placeholder="End date">
                                </div>
                                <button type="submit" class="searchBttn bttn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>-->
                        <form method="post" action="space/search_parking_space">
                            <div class="searchBar">
                                <input name="search_address" value="<?php if(!empty($search_address)) { echo $search_address;} ?>" id="search_address" type="text" placeholder="Enter Destination" class="destination">

                                <input name="latitude" value="<?php if(!empty($slat)) { echo $slat;} ?>" id="latitude" type="hidden" placeholder="Enter Destination" class="destination">
                                <input name="longitude" value="<?php if(!empty($slong)) { echo $slong;} ?>" id="longitude" type="hidden" placeholder="Enter Destination" class="destination">
                                <div class="DateTime">
                                    <input value="<?php echo date("m/d/Y H:i A", strtotime(trim($from))); ?>" name="fromdatetime" id="fromdatetime" type="text" class="new-control _date" id="fromdatetime"/>
                                </div>
                                <div class="DateTime">
                                    <input value="<?php echo date("m/d/Y H:i A", strtotime(trim($to))); ?>" name="todatetime" id="todatetime" type="text" id="todatetime" class="new-control _date">
                                </div>
                                <button type="submit" class="searchBttn bttn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
<!--                <div class="col-md-2 filter text-center"> 
                    <a href="#"><i class="fa fa-filter" aria-hidden="true"></i>Filter</a> 
                </div>-->
            </div>
            
<!--            <div class="filter-list col-md-12">
                <div class="container">
                    <form>
                        <div class="col-md-3">
                            <h4>Type</h4>
                            <label><input type="checkbox">House</label>
                            <label><input type="checkbox">Apartment/Condo</label>
                            <label><input type="checkbox">Commercial Space</label>
                            <label><input type="checkbox">Parking lot</label>
                            <label><input type="checkbox">Garage</label>
                        </div>
                        <div class="col-md-3">
                            <h4>Features</h4>

                            <label><input type="checkbox">Electric charging </label>

                        </div>
                    </form>
                </div>
            </div>-->

        </div>
    </section>
  
    <div class="search-location ">
        <div class="">
            <div class="col-md-4 leftbar">
                <div class="row">
                    <h4><span class="pe-7s-map-marker"></span><?php if(!empty($search_address)){ echo $search_address; }?></h4>
                    <div class="target-date">
                        <div class="col-md-6 target-date-inner start-date">
                            <div class="">
                                <p>Start date</p>
                                <p><b><span class="fa fa-calendar"></span><?php echo date("M d, Y h:i A", strtotime($from));?></b></p>
                            </div>
                        </div>
                        <div class="col-md-6 target-date-inner end-date">
                            <div class="">
                                <p>End date</p>
                                <p><b><span class="fa fa-calendar"></span><?php echo date("M d, Y h:i A", strtotime($to));?></b></p>
                            </div>
                        </div>
                    </div>
<!--                    <div class="sort-by">
                        <form>
                            <div class="form-group">
                                <label>Sort by</label>
                                <select>
                                    <option selected disabled>Distance (Closer first)</option>
                                    <option>Distance (Closer first)</option>
                                    <option>Distance (Closer first)</option>
                                </select>
                                <i class="fa fa-sort-desc" aria-hidden="true"></i> 
                            </div>
                        </form>
                    </div>-->
                    
                    <div class="search-listing" id="markers"></div>
                </div>
            </div>
            <div class="col-md-8 rightbar">
                <div class="row" id="map" style="width: 860px; height: 670px;">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&region=uk&key=AIzaSyCZP7HE5z3JsTD1qAaLkIeG2y63_QogQEw"></script>
<script>
    initialize();
    
    
    var markers = new Array();
    var marker, i;
    
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(<?php echo $slat;?>, <?php echo $slong; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var infowindow = new google.maps.InfoWindow();
    
    var data = '<?php echo $json_data;?>';
    var search_lat = '<?php echo $slat; ?>';
    var search_long = '<?php echo $slong; ?>';
    var search_address = '<?php echo $search_address; ?>';
    var from = '<?php echo $from;?>';
    var to = '<?php echo $to;?>';
    
    pkspace = JSON.parse(data); 
    if(pkspace.length>0){
        for (var i = 0; i < pkspace.length; i++) {
            //setMarker(pkspace[i]);
            result = pkspace[i];

            //alert(result['rent_user_fname']);
            $('#markers').append('<div class="listing-item marker-link" data-markerid="' + i + '"> <div class="col-md-3 col-xs-12"> <img src="images/car.jpg" class="img-responsive"> </div> <div class="col-md-7 col-xs-9"> <div class="_3wtableMainTitle"> <h5>'+result["rent_user_fname"]+'</h5> <ul> <div class="rating_stars"><span style="width: 16px;"></span></div> </ul> <div class="titleTag"> <p><span><img src="images/walking--icon.png" width="10" class="img-responsive"></span>'+result["distance"].+'</p> <p><span><img src="images/parking.png" width="20" class="img-responsive"></span>Available</p> <div class="booknow-bttn"> <form method="post" action="book/space_details/'+btoa(result["rent_space_id"])+'"><input type="hidden" name="from" value="'+from+'"><input type="hidden" name="to" value="'+to+'"><input type="hidden" name="search_address" value="'+search_address+'"><input type="hidden" name="slat" value="'+search_lat+'"><input type="hidden" name="slong" value="'+search_long+'"><button type="submit" class="booknow">Book Now</button></from> </div> </div> </div> </div> <div class="col-md-2 col-xs-3"> <span class="rate">Rate<br> <b>'+result["rent_space_rate"]+'</b></span> </div></div> ');

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(result['rent_space_latitude'], result['rent_space_longitude']),
                map: map,
                html: '<p style="color:#424242; font-size:14px; width:200px;font-weight:500">'+result['rent_user_address1']+'</p><p style="color:#424242; font-size:14px; width:200px;font-weight:400">Rate:<span style="color:#00a22f;font-weight:bold">&nbsp;' +result['rent_space_rate']+'</span></p>',
                //html:'<div id="content" style="width:400px; background-color:red;">My Text comes here</div>',
            });


            google.maps.event.addListener(marker, 'mouseover', (function(marker) {
                return function() {
                    //alert(result['rent_user_address1']);
                    infowindow.setContent(this.html);
                    infowindow.open(map, marker);
                  //alert(locations[i][0]);
                }
            })(marker, i));

            markers.push(marker);
        }

        // Trigger a click event on each marker when the corresponding marker link is clicked
        //$('.marker-link').on('click', function () {
        $('.marker-link').on('mouseover', function () {
            google.maps.event.trigger(markers[$(this).data('markerid')], 'mouseover');
        });
    }else{
        
    }
    
    
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
    
$(document).ready(function() {
    $('#fromdatetime').datetimepicker({  
        format: 'MM/DD/YYYY LT',
        minDate: 'now'
    });
    $('#todatetime').datetimepicker({  
        format: 'MM/DD/YYYY LT',
        minDate: 'now'
    });
});
    
</script>
