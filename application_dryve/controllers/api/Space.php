<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Space extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('apptoken', 'mail', 'notification'));
        $this->load->model(array('api_models/space_model'));
        $this->load->library('common');
    }

    /**
     * Parking space controller
     *
     */
    
    //-------------------------rent your space------------------------

    public function rent_your_space() {

        //$data = json_decode(file_get_contents("php://input"));
        $data = json_decode(json_encode($this->input->post()));

        if ($data->token !== APPLICATIONTOKEN) {
            echo json_encode(array("authenticated" => false));
            return;
        }

        $response = array();

        $upload_success = TRUE;
        $data->rent_space_picture = "";

        if (isset($_FILES['rent_space_picture']['name']) && $_FILES['rent_space_picture']['name'] != '') {

            $this->load->library('upload');
            $config['upload_path'] = 'uploads/space_pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = urlencode(preg_replace('/[\s\.]+/', '', microtime()) . '_' . preg_replace('/[\s,#\']+/', '', $_FILES['rent_space_picture']['name']));
            $data->rent_space_picture = base_url() . "uploads/space_pic/" . $config['file_name'];
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('rent_space_picture')) {
                $response = array("code" => 2, "status" => false, "message" => "Picture not uploaded!", "error" => $this->upload->display_errors('', ''));
                $upload_success = FALSE;
            }
        }


        if ($upload_success) {

            $data = array(
                "rent_space_added_by" => $data->user_id,
                "rent_user_fname" => $data->rent_user_fname,
                "rent_user_lname" => $data->rent_user_lname,
                "rent_user_phone" => $data->rent_user_phone,
                "rent_user_email" => $data->rent_user_email,
                "rent_user_postal_code" => $data->rent_user_postal_code,
                "rent_user_address1" => $data->rent_user_address1,
                "rent_user_address2" => $data->rent_user_address2,
                "rent_user_city" => $data->rent_user_city,
                "rent_space_picture" => $data->rent_space_picture,
                "rent_space_type" => $data->rent_space_type,
                "rent_space_number" => $data->rent_space_number,
                "rent_space_whoru" => $data->rent_space_whoru,
                "rent_space_feature" => $data->rent_space_feature,
                "rent_space_description" => $data->rent_space_description,
                "rent_space_access_instruction" => $data->rent_space_access_instruction,
                "rent_space_day" => $data->rent_space_day,
                "rent_space_fromdatetime" => $data->rent_space_fromdatetime,
                "rent_space_todatetime" => $data->rent_space_todatetime,
                "rent_space_duration" => $data->rent_space_duration,
                "rent_space_rate" => $data->rent_space_rate,
                "rent_space_latitude" => $data->latitude,
                "rent_space_longitude" => $data->longitude,
                "steps_flag" => 1,
                "availability_time"=> $data->availability_time
            );

            $res = $this->space_model->add_rent_space($data);

            if ($res) {

                $response = array("code" => 1, "status" => true, "message" => "Space added successfully.");
            } else {

                $response = array("code" => 0, "status" => false, "message" => "Please try again.");
            }
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //-------------------------------Search space-----------------------------------
//    public function search_parking_space() {
//        $data = json_decode(file_get_contents("php://input"));
//
//        if ($data->token !== APPLICATIONTOKEN) {
//            return;
//        }
//
//        $response = array();
//
//        $limit = 4;  // to change limit
//        if (isset($data->page) && $data->page > 1) {
//            $offset = ($data->page - 1) * $limit;
//        } else {
//            $offset = 0;
//        }
//
//        //$this->space_model->search_parking_space("22.7198649", "75.8829528", "2017-5-19", "2017-5-27");
//        $res = $this->space_model->search_parking_space($data->latitude, $data->longitude, $data->fromdatetime, $data->todatetime, $offset, $limit);
//        if (!empty($res)) {
//            
//            foreach($res as $resobj){
//                $resobj->estimate_time = $this->get_driving_distance($data->latitude, $data->longitude, $resobj->rent_space_latitude, $resobj->rent_space_longitude);
//            }
//            
//            $response = array("code" => 1, "status" => true, "list" => $res);
//        } else {
//            $response = array("code" => 0, "status" => false, "message" => "No space found.");
//        }
//
//        $this->output->set_header('Content-Type: application/json');
//        echo json_encode($response);
//    }

//    public function search_parking_space() {
//        $data = $this->common->validrawdata_parameter();
//        
//        $page = trim($data["page"]);
//        
//        $latitude = trim($data["latitude"]);
//        $longitude = trim($data["longitude"]);
//        
//        $fromdatetime = new DateTime(trim($data["fromdatetime"]));
//        $todatetime = new DateTime(trim($data["todatetime"]));
//        
//        $user_id = $data["user_id"];
//        
////        $fromtime = date("H:i:s",strtotime($data["fromdatetime"]));
////        $totime = date("H:i:s",strtotime($data["todatetime"]));
//        
//        $daterange = new DatePeriod($fromdatetime, new DateInterval('P1D'), $todatetime);
//
//        $dateday = array();
//        foreach($daterange as $date){
//            //echo $date->format("Y-m-d").' week day ' .date('w', strtotime($date->format("Y-m-d"))). "<br>";
//            $dateday[] = date('w', strtotime($date->format("Y-m-d")));
//        }
//        
//        //$daynumber = join("','",array_unique($dateday)); 
//        $array_of_days_no = array_unique($dateday); 
//        
//        $rent_space_ids = $this->space_model->getSpaceIds($user_id);
//        //print_r($rent_space_ids);
//        if(!empty($rent_space_ids)){
//            
//            $limit = 4;  // to change limit
//            if (isset($page) && $page > 1) {
//                $offset = ($page - 1) * $limit;
//            } else {
//                $offset = 0;
//            }
//            
//            $parking_search = $this->space_model->getParkingSpaceData($rent_space_ids,$array_of_days_no,$data["fromdatetime"],$data["todatetime"],$latitude,$longitude,$limit,$offset);
//            if(!empty($parking_search)){
//                foreach($parking_search as $resobj){
//                    $resobj->estimate_time = $this->get_driving_distance($latitude, $longitude, $resobj->rent_space_latitude, $resobj->rent_space_longitude);
//                }
//                
//                $response['status'] = 1;
//                $response['response'] = $parking_search;
//                $this->output->set_header('Content-Type: application/json');
//                echo json_encode($response);
//                die;
//            }else{
//                $response['status'] = 0;
//                $response['response'] = 'No parking space available.';
//                $this->output->set_header('Content-Type: application/json');
//                echo json_encode($response);
//                die;
//            }
//            
//            
//            
//            
//        }else{
//            $response['status'] = 0;
//            $response['response'] = 'No parking space available.';
//            $this->output->set_header('Content-Type: application/json');
//            echo json_encode($response);
//            die;
//        }
//    }
    
    
    public function search_parking_space() {
        $data = $this->common->validrawdata_parameter();
        
        $page = trim($data["page"]);
        
        $latitude = trim($data["latitude"]);
        $longitude = trim($data["longitude"]);
        
        
        $from_datetime = date("Y-m-d H:i:s", strtotime(trim($data["fromdatetime"])));
        $to_datetime = date("Y-m-d H:i:s", strtotime(trim($data["todatetime"])));
        
        $fromdatetime = new DateTime(trim($from_datetime));
        $todatetime = new DateTime(trim($to_datetime));
        
        $user_id = $data["user_id"];
        
//        $fromtime = date("H:i:s",strtotime($data["fromdatetime"]));
//        $totime = date("H:i:s",strtotime($data["todatetime"]));
        
        $daterange = new DatePeriod($fromdatetime, new DateInterval('P1D'), $todatetime);

        $dateday = array();
        foreach($daterange as $date){
            //echo $date->format("Y-m-d").' week day ' .date('w', strtotime($date->format("Y-m-d"))). "<br>";
            $dateday[] = date('w', strtotime($date->format("Y-m-d")));
        }
        
        //$daynumber = join("','",array_unique($dateday)); 
        $array_of_days_no = array_unique($dateday); 
        
        //$rent_space_ids = $this->space_model->getSpaceIds($user_id);
        //print_r($rent_space_ids);
         
            
            $limit = 4;  // to change limit
            if (isset($page) && $page > 1) {
                $offset = ($page - 1) * $limit;
            } else {
                $offset = 0;
            }
            
            //$parking_search = $this->space_model->getParkingSpaceData($rent_space_ids,$array_of_days_no,$data["fromdatetime"],$data["todatetime"],$latitude,$longitude,$limit,$offset);
        $parking_search = $this->space_model->searchParkingSpaceRecord($user_id,$from_datetime,$to_datetime,$array_of_days_no,$latitude,$longitude,$limit,$offset);
        //print_r($parking_search);die;
        if(!empty($parking_search)){
            foreach($parking_search as $resobj){
                //print_r($resobj);
                if(!empty($resobj)){
                    $resobj->estimate_time = $this->get_driving_distance($latitude, $longitude, $resobj->rent_space_latitude, $resobj->rent_space_longitude);
                }
                
            }

            $response['status'] = 1;
            $response['response'] = $parking_search;
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = 'No parking space available.';
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }
            
            
    }
    
    //---------------------------calculate time between two lat long-----------------------------
    
    public function get_driving_distance($lat1=null, $long1=null, $lat2=null, $long2=null) {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&mode=driving&language=pl-PL";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        //$dist = $response_a['rows'][0]['elements'][0]['distance']['text']; 
        if(isset($response_a['rows'][0]['elements'][0]['duration']['text'])){
            return $response_a['rows'][0]['elements'][0]['duration']['text'];  //time in minutes
        } else {
            return 0;
        }
    }
    
    //-------------------------------book space--------------------------------
    
    function book_space(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $res = $this->space_model->add_to_book_space(json_decode(json_encode($data),true));
        
        if($res){
            //print_r($res);
            $notifmessage = array("title" => "Space booked!", "message" => "Space booked by ".strtolower($res->book_by_name));
            $not_res = send_notification(array($res->device_token), $notifmessage);
            
            $response = array("code" => 1, "status" => true, "message" => "Booked successfully.");
            
        } else {
            $response = array("code" => 0, "status" => false, "message" => "Please try again.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    //-----------------------------My bookings------------------------------
    
    public function my_bookings(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $limit = 10;  // to change limit
        if (isset($data->page) && $data->page > 1) {
            $offset = ($data->page - 1) * $limit;
        } else {
            $offset = 0;
        }
        
        $month = $data->month;
        $res = $this->space_model->get_my_bookings($data->user_id, $offset, $limit, $month);
        
        if(!empty($res)){
            
            $response = array("code" => 1, "status" => true, "list" => $res);
        } else {
            
            $response = array("code" => 0, "status" => false, "message" => "No bookings.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    //-----------------------------My bookings------------------------------
    
    public function my_recieved_bookings(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $limit = 10;  // to change limit
        if (isset($data->page) && $data->page > 1) {
            $offset = ($data->page - 1) * $limit;
        } else {
            $offset = 0;
        }

        $month = $data->month;
        $res = $this->space_model->get_my_recieved_bookings($data->user_id, $offset, $limit, $month="");
        
        if(!empty($res)){
            
            $response = array("code" => 1, "status" => true, "list" => $res);
        } else {
            
            $response = array("code" => 0, "status" => false, "message" => "No bookings.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //------------------------Add ratings to booked spaces-----------------------------
    
    public function add_ratings(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $rent_space_id = $data->rent_space_id;
        $user_id = $data->user_id;
        
//        $rent_space_details = $this->space_model->getSingleRentSpaceDetails($rent_space_id);
//        
//        if(!empty($rent_space_details) && $rent_space_details->rent_space_added_by != $user_id){
//            $response = array("code" => 0, "status" => false, "message" => "You are not authorized user to see this.");
//        }
        
        $rate_data = array(
            "book_space_id"=>$data->book_space_id,
            "space_owner_userid"=>$data->space_owner_userid,
            "add_by_user_id" => $data->user_id,
            "rent_space_id" => $data->rent_space_id,
            "rating" => $data->rating,
            "review" => $data->review,
            "date" => date("Y-m-d H:i:s")
        );
        
        $check_rating_existance = $this->space_model->checkRatingOnParkingSpace($data->rent_space_id,$data->book_space_id);
        if(!empty($check_rating_existance)){
            $response = array("code" => 0, "status" => false, "message" => "You already had been given rating on the parking space.");
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
        }
        
        $res = $this->space_model->add_ratings($rate_data);
        
        if($res){
            $response = array("code" => 1, "status" => true, "message" => "Ratings added.");
        } else {
            $response = array("code" => 0, "status" => false, "message" => "Please try again.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    /*Get rating by booking user on parking(space) using booking user id(who take parking on rent) and parking space id*/
    public function getratingsby_bookinguser(){
        $data = $this->common->validrawdata_parameter();

        $parking_space_id = trim($data["parking_space_id"]);
        $booking_userid = trim($data["booking_userid"]);
        
        if(!empty($parking_space_id) && !empty($booking_userid)){
            $getreviews = $this->space_model->getRatingsByBookingUserId($booking_userid,$parking_space_id);

            if(!empty($getreviews)){
                $response['status'] = 1;
                $response['response'] = $getreviews;
            }else{
                $response['status'] = 0;
                $response['response'] = "No rating found.";
            }
        
        }else{
            $response['status'] = 0;
            $response['response'] = "Some required parameter is missing.";
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    //------------------------My spaces--------------------------
    
    public function my_spaces(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();
        
        $limit = 10;  // to change limit
        if (isset($data->page) && $data->page > 1) {
            $offset = ($data->page - 1) * $limit;
        } else {
            $offset = 0;
        }
        
        $month = $data->month;
        
        //$res = $this->space_model->get_my_spaces($data->user_id, $offset, $limit);
        $res = $this->space_model->get_my_spaces($data->user_id, 0, 2000, $month);
        
        if(!empty($res)){
            
            $response = array("code" => 1, "status" => true, "list" => $res );
            
        } else {
            
            $response = array("code" => 0, "status" => false, "message" => "Not found.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    //---------------------Set avaliability--------------------------
    
    public function set_activate(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();
        
        $res = $this->space_model->set_activate($data->user_id, $data->rent_space_id, $data->active);
        
        if($res){
            
            $response = array("code" => 1, "status" => true, "message" => "Updated successfully.." );
            
        } else {
            
            $response = array("code" => 0, "status" => false, "message" => "Try again.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    
    //-------------------------update your space------------------------

    public function update_your_space() {

        //$data = json_decode(file_get_contents("php://input"));
        $data = json_decode(json_encode($this->input->post()));

        if ($data->token !== APPLICATIONTOKEN) {
            echo json_encode(array("authenticated" => false));
            return;
        }

        $response = array();

        $upload_success = TRUE;
        $data->rent_space_picture = "";

        if (isset($_FILES['rent_space_picture']['name']) && $_FILES['rent_space_picture']['name'] != '') {

            $this->load->library('upload');
            $config['upload_path'] = 'uploads/space_pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = urlencode(preg_replace('/[\s\.]+/', '', microtime()) . '_' . preg_replace('/[\s,#\']+/', '', $_FILES['rent_space_picture']['name']));
            $data->rent_space_picture = base_url() . "uploads/space_pic/" . $config['file_name'];
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('rent_space_picture')) {
                $response = array("code" => 2, "status" => false, "message" => "Picture not uploaded!", "error" => $this->upload->display_errors('', ''));
                $upload_success = FALSE;
            }
        }


        if ($upload_success) {

            $data2 = array(
                "rent_user_fname" => $data->rent_user_fname,
                "rent_user_lname" => $data->rent_user_lname,
                "rent_user_phone" => $data->rent_user_phone,
                "rent_user_email" => $data->rent_user_email,
                "rent_user_postal_code" => $data->rent_user_postal_code,
                //"rent_user_country" => $data->rent_user_country,
                "rent_user_address1" => $data->rent_user_address1,
                "rent_user_address2" => $data->rent_user_address2,
                "rent_user_city" => $data->rent_user_city,
                "rent_space_picture" => $data->rent_space_picture,
                "rent_space_type" => $data->rent_space_type,
                "rent_space_number" => $data->rent_space_number,
                "rent_space_whoru" => $data->rent_space_whoru,
                "rent_space_feature" => $data->rent_space_feature,
                "rent_space_description" => $data->rent_space_description,
                "rent_space_access_instruction" => $data->rent_space_access_instruction,
                "rent_space_day" => $data->rent_space_day,
                "rent_space_fromdatetime" => $data->rent_space_fromdatetime,
                "rent_space_todatetime" => $data->rent_space_todatetime,
                "rent_space_duration" => $data->rent_space_duration,
                "rent_space_rate" => $data->rent_space_rate,
                "rent_space_latitude" => $data->latitude,
                "rent_space_longitude" => $data->longitude
            );

            $res = $this->space_model->update_rent_space($data2, $data->rent_space_id, $data->user_id);

            if ($res) {

                $response = array("code" => 1, "status" => true, "message" => "Space updated successfully.");
            } else {

                $response = array("code" => 0, "status" => false, "message" => "Please try again.");
            }
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    /*Check parking space availablity for that day*/
    public function parking_space_availability() {
        $data = $this->common->validrawdata_parameter();
        //print_r($data);die('jkjkj');
        $rent_space_id = $data['rent_space_id'];
        
        $fromdatetime = new DateTime(trim($data["fromdatetime"]));
        $todatetime = new DateTime(trim($data["todatetime"]));
        
        //$fromtime = date("H:i:s",strtotime($data["fromdatetime"]));
        //$totime = date("H:i:s",strtotime($data["todatetime"]));
        
        $daterange = new DatePeriod($fromdatetime, new DateInterval('P1D'), $todatetime);

        $dateday = array();
        foreach($daterange as $date){
            //echo $date->format("Y-m-d").' week day ' .date('w', strtotime($date->format("Y-m-d"))). "<br>";
            $dateday[] = date('w', strtotime($date->format("Y-m-d")));
        }
        
        $array_of_days_no = array_unique($dateday); 
        ///////////////////////rrrrrr///////////////////////////////////////////////////////////
        $latitude = trim($data['latitude']);
        $longitude = trim($data['longitude']);
        $user_id = trim($data['user_id']);
        
        $parking_search = $this->space_model->checkParkingSpace($user_id,$data["fromdatetime"],$data["todatetime"],$array_of_days_no,$latitude,$longitude,$rent_space_id);
        //////////////////////////////////////////////////////////////////////////////////
        
        
        //$array_of_days_no = array_unique($dateday); 
            
        //$parking_search = $this->space_model->checkParkingSpace($rent_space_id,$array_of_days_no,$fromtime,$totime);
        if(!empty($parking_search)){
//            $time1 = strtotime($totime);  // 2012-12-06 23:56
//            $time2 = strtotime($fromtime);  // 2012-12-06 00:21
//            $min = ($time1 - $time2)/60;
//            $h = $min/60;
//            
//            $rate_per_price = round($h * $parking_search->rent_space_rate,2);
            
            
            $response['status'] = 1;
            $response['response'] = 'Parking space available.';
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = 'Sorry, No parking space available.';
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }
            
         
    }
    
    /*Display all review to parking space owner for a particular space.*/
    public function view_all_review(){
        $data = $this->common->validrawdata_parameter();
        
        $page = trim($data["page"]);
        
        $limit = 6;  // to change limit
        if (isset($page) && $page > 1) {
            $offset = ($page - 1) * $limit;
        } else {
            $offset = 0;
        }
        
        $rent_space_id = $data['rent_space_id'];
        $user_id = $data['user_id']; //session
        
        $rent_space_details = $this->space_model->getSingleRentSpaceDetails($rent_space_id);
        
        if(!empty($rent_space_details) && $rent_space_details->rent_space_added_by != $user_id){
            $response['status'] = 0;
            $response['response'] = 'You are not authorized user to see this.';
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }
        
        $all_review_lists = $this->space_model->viewAllReviews($rent_space_id,$limit,$offset);
        if(!empty($all_review_lists)){
            $response['status'] = 1;
            $response['response'] = $all_review_lists;
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }
        else{
            $response['status'] = 0;
            $response['response'] = 'No review available.';
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }
        
    }
    
    
    

}
