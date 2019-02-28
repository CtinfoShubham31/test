<?php

/****Giddh integration create stock****/
$get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){

    $inv_cateid = trim($this->input->post('inventory_category'));

    $getcategory_unique_name = $this->inventory_model->getCategoryUniqueName($inv_cateid,$company_id);
    $catUniqueName = $getcategory_unique_name->category_unique_name;

    $opening_quantity = trim($this->input->post('opening_quantity'));

    $stock_name = trim($this->input->post('stock_name'));

    $cost_price = trim($this->input->post('cost_price'));
    if($cost_price>0){
        $purchaseAccountUniqueName = "purchases";
    }else{
        $purchaseAccountUniqueName = "";
    }

    $sell_price = trim($this->input->post('sell_price'));
    if($sell_price>0){
        $salesAccountUniqueName = "sales";
    }else{
        $salesAccountUniqueName = "";
    }

    $unit_id = trim($this->input->post('unit'));
    if($unit_id){
        $get_unit_details = $this->inventory_stock_model->unitInfo($unit_id);
        $unit_name = $get_unit_details->unit;
    }else{
        $unit_name = '';
    }


    $post_data = array(
        "name" => "$stock_name",
        "openingQuantity" =>"$opening_quantity",
        "openingAmount"=>"",
        "openingStockUnitName"=>"$unit_name",
        "purchaseAccountUniqueName"=>"$purchaseAccountUniqueName",
        "salesAccountUniqueName"=>"$salesAccountUniqueName",
        "purchaseRate"=>"$cost_price",
        "salesRate"=>"$sell_price"
    ); 
    print_r($post_data);

    $ch1 = curl_init();
    $headers = array(
        "cache-control: no-cache",
        "content-type: application/json",
        "auth-key:".$get_giddh_data->giddh_auth_key.""
    );

    $url = "url: 'http://api.giddh.com/company/".$get_giddh_data->giddh_comp_unique_name."/stock-group/penstock123/stock'"
    echo $url = "http://api.giddh.com/company/".$get_giddh_data->giddh_comp_unique_name."/stock-group/".$catUniqueName."/stock";
    curl_setopt($ch1, CURLOPT_URL,  $url);
    curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch1, CURLOPT_HEADER, 0);
    $body = json_encode($post_data);

    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST"); 
    curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

    $result_push = curl_exec($ch1);  
    curl_close ($ch1);

    $jsonObj = json_decode($result_push);
    $status = $jsonObj->status;
    if($status == 'success'){
        echo $uniqueName = $jsonObj->uniqueName;
        //$stockupdate_data = array('stock_unique_name'=>$uniqueName);
        //$this->inventory_stock_model->updateInventoryStock($stockupdate_data,$inventory_stock_id,$company_id); //Update unique name
    }
    print_r($result_push);die('ssss');
}
/*****Giddh integration create stock*******/


//
//$location = "St. Josed father's institute";
//$location = mysql_real_escape_string($location);
//echo $location;
//$str = "Is your name O'reilly?";
//// Outputs: Is your name O\'reilly?
//echo addslashes($str);
//
//die('zzz');
//
//echo date_default_timezone_get();
//
//echo $date = date('Y-m-d H:i:s');
//
//echo '<br/>';
////date_default_timezone_set('Asia/Calcutta');
//date_default_timezone_set('Africa/Nairobi');
//echo $date = date('Y-m-d H:i:s');



/****Giddh integration create discount****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $inv_cateid = trim($this->input->post('inventory_category'));
                        
                        $getcategory_unique_name = $this->inventory_model->getCategoryUniqueName($inv_cateid,$company_id);
                        $catUniqueName = $getcategory_unique_name->category_unique_name;
                        
                        
                        
                        $stock_name = trim($this->input->post('stock_name'));
                        
                        $cost_price = trim($this->input->post('cost_price'));
                        if($cost_price>0){
                            $purchaseAccountUniqueName = "purchases";
                        }else{
                            $purchaseAccountUniqueName = "";
                        }
                        
                        $opening_quantity = trim($this->input->post('opening_quantity'));
                        if(empty($opening_quantity)){
                            $opening_quantity = 0;
                        }
                        
                        $opening_amount = $opening_quantity * $cost_price;
                        
                        $sell_price = trim($this->input->post('sell_price'));
                        if($sell_price>0){
                            $salesAccountUniqueName = "sales";
                        }else{
                            $salesAccountUniqueName = "";
                        }
                        
                        $unit_id = trim($this->input->post('unit'));
                        if($unit_id){
                            $get_unit_details = $this->inventory_stock_model->unitInfo($unit_id);
                            $unit_name = $get_unit_details->short_codes;
                        }else{
                            $unit_name = 'nos';
                        }
                        
                            
                        $post_data = array(
                            "name" => $stock_name,
                            "openingQuantity" =>$opening_quantity,
                            "openingAmount"=>$opening_amount,
                            "openingStockUnitName"=>$unit_name,
                            "purchaseAccountUniqueName"=>$purchaseAccountUniqueName,
                            "salesAccountUniqueName"=>$salesAccountUniqueName,
                            "purchaseRate"=>$cost_price,
                            "salesRate"=>$sell_price
                        ); 
                        print_r($post_data);

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );

                        echo $url = "http://api.giddh.com/company/".$get_giddh_data->giddh_comp_unique_name."/stock-group/".$catUniqueName."/stock";
                        curl_setopt($ch1, CURLOPT_URL,  $url);
                        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch1, CURLOPT_HEADER, 0);
                        $body = json_encode($post_data);

                        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST"); 
                        curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

                        $result_push = curl_exec($ch1);  
                        curl_close ($ch1);
                        
                        $jsonObj = json_decode($result_push);
                        $status = $jsonObj->status;
                        if($status == 'success'){
                            echo $uniqueName = $jsonObj->uniqueName;
                            //$stockupdate_data = array('stock_unique_name'=>$uniqueName);
                            //$this->inventory_stock_model->updateInventoryStock($stockupdate_data,$inventory_stock_id,$company_id); //Update unique name
                        }
                        print_r($result_push);die('ssss');
                    }
                    /*****Giddh integration create discount*******/












?>
<!doctyp html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Get Latitude and Longitude</title>
	<script src="http://maps.google.com/maps/api/js?libraries=places&region=ind&language=en&sensor=true"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>

Address:
<input id="searchTextField" type="text" size="50" style="text-align: left;width:357px;direction: ltr;">
<br>
            latitude:<input name="latitude" class="MapLat" value="" type="text" placeholder="Latitude" style="width: 161px;" disabled>
            longitude:<input name="longitude" class="MapLon" value="" type="text" placeholder="Longitude" style="width: 161px;" disabled>

    <div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>




<script>
     $(function () {
         var lat = 44.88623409320778,
             lng = -87.86480712897173,
             latlng = new google.maps.LatLng(lat, lng),
             image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
         //zoomControl: true,
         //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
         var mapOptions = {
             center: new google.maps.LatLng(lat, lng),
             zoom: 13,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             panControl: true,
             panControlOptions: {
                 position: google.maps.ControlPosition.TOP_RIGHT
             },
             zoomControl: true,
             zoomControlOptions: {
                 style: google.maps.ZoomControlStyle.LARGE,
                 position: google.maps.ControlPosition.TOP_left
             }
         },
         map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
             marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon: image
             });
         var input = document.getElementById('searchTextField');
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });
         autocomplete.bindTo('bounds', map);
         var infowindow = new google.maps.InfoWindow();
         google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
             infowindow.close();
             var place = autocomplete.getPlace();
             if (place.geometry.viewport) {
                 map.fitBounds(place.geometry.viewport);
             } else {
                 map.setCenter(place.geometry.location);
                 map.setZoom(17);
             }
             moveMarker(place.name, place.geometry.location);
             $('.MapLat').val(place.geometry.location.lat());
             $('.MapLon').val(place.geometry.location.lng());
         });
         google.maps.event.addListener(map, 'click', function (event) {
             $('.MapLat').val(event.latLng.lat());
             $('.MapLon').val(event.latLng.lng());
             infowindow.close();
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "latLng":event.latLng
                     }, function (results, status) {
                         console.log(results, status);
                         if (status == google.maps.GeocoderStatus.OK) {
                             console.log(results);
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].address_components[0].long_name,
                                 latlng = new google.maps.LatLng(lat, lng);
                             moveMarker(placeName, latlng);
                             $("#searchTextField").val(results[0].formatted_address);
                         }
                     });
         });
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
             //infowindow.open(map, marker);
         }
     });
</script>
</body>
</html>