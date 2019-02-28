<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Space extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','common'));
        $this->load->model(array('web_models/common_model'));
        if(!isUserLogin()) { 
            redirect($this->config->base_url().'home/logout');
        }
    }
    
    
    public function addspace_profile(){
        $this->layout->title('Step1');
        
        $this->load->model(array('web_models/space_model'));
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $data = array();
        
        $rt_spaceid = base64_decode($this->uri->segment(3));
        if($rt_spaceid){
            $check_space_existance = $this->space_model->getParkingSpaceDetails($rt_spaceid,$user_id);
            
            if(!empty($check_space_existance)){
                $data['rent_space_details'] = $check_space_existance;
            }
        }
        
        if($this->input->post()) { 
            $this->form_validation->set_rules('rent_user_fname','First Name','required|max_length[20]|trim');
            $this->form_validation->set_rules('rent_user_lname','Last Name', 'required|max_length[20]|trim');
            $this->form_validation->set_rules('rent_user_email','Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('rent_user_phone','Phone Number', 'required|min_length[10]|max_length[10]|trim|callback_numeric_wcomma');
        
            if ($this->form_validation->run() == FALSE) {
                $this->layout->view('space/addspace_profile');
            }
            else{
                $addspace_data1 = array(
                    'rent_space_added_by' => $user_id,
                    'rent_user_fname' => trim($this->input->post('rent_user_fname')),
                    'rent_user_lname' => trim($this->input->post('rent_user_lname')),
                    'rent_user_email' => trim($this->input->post('rent_user_email')),
                    'rent_user_phone' => trim($this->input->post('rent_user_phone'))
                );

                
                if(!empty($data['rent_space_details'])){
                    $update_status = $this->space_model->updateRentSpace($addspace_data1, $rt_spaceid, $user_id);
                    if($update_status){
                        redirect('space/addspace_location/'.base64_encode($rt_spaceid));
                    }else{
                        redirect('space/addspace_profile');     //Wrong
                    }
                    
                }else{
                    $rent_space_id = $this->space_model->addSpaceProfile($addspace_data1);
                    
                    if(!empty($rent_space_id)){
                        redirect('space/addspace_location/'. base64_encode($rent_space_id));
                    }else{
                        redirect('space/addspace_profile');     //Wrong
                    }
                
                }
            }
            
        }else{ 
            $this->layout->view("space/addspace_profile",$data);
        }
    }
    
    public function numeric_wcomma ($str)
    {
        if (preg_match('/[^0-9]/', $str))
        {
            $this->form_validation->set_message('numeric_wcomma', 'Please enter only digit.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
        //return preg_match('/^[0-9]+$/', $str);
    }
    
    public function addspace_location(){
        
        $this->layout->title('Step2');
        
        $this->load->model(array('web_models/space_model'));
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $rent_space_id = base64_decode($this->uri->segment(3));
        
        $data['rent_space_details'] = $check_space_existance = $this->space_model->getParkingSpaceDetails($rent_space_id,$user_id);
        if(empty($check_space_existance)){
            redirect('space/addspace_profile');     //Wrong
        }
        
        if($this->input->post()) { 
            $this->form_validation->set_rules('rent_user_postal_code','Postal Code','required|trim');
            $this->form_validation->set_rules('rent_user_address1','Address', 'required|trim');
            $this->form_validation->set_rules('rent_user_city','City/Town', 'required|trim');
        
            if ($this->form_validation->run() == FALSE) {
                $this->layout->view('space/addspace_location');
            }
            else{
                $addspace_data2 = array(
                    'rent_user_postal_code' => trim($this->input->post('rent_user_postal_code')),
                    'rent_user_address1' => trim($this->input->post('rent_user_address1')),
                    'rent_user_city' => trim($this->input->post('rent_user_city')),
                    'rent_space_latitude' => trim($this->input->post('rent_space_latitude')),
                    'rent_space_longitude' => trim($this->input->post('rent_space_longitude')),
                );

                $update_status = $this->space_model->updateRentSpace($addspace_data2, $rent_space_id, $user_id);
                
                if($update_status){
                    redirect('space/addspace_details/'.base64_encode($rent_space_id));
                }else{
                    redirect('space/addspace_profile'); //Wrong
                }
            }
            
        }else{ 
            $this->layout->view("space/addspace_location",$data);
        }
        
    }
    
    public function addspace_details(){
        $this->layout->title('Step3');
        
        $this->load->model(array('web_models/space_model'));
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $rent_space_id = base64_decode($this->uri->segment(3));
        
        $data['whoru_data'] = $this->space_model->getAllWhoruData();
        
        $data['space_type_data'] = $this->space_model->getAllSpaceType();
        
        $data['rent_space_details'] = $check_space_existance = $this->space_model->getParkingSpaceDetails($rent_space_id,$user_id);
        if(empty($check_space_existance)){
            redirect('space/addspace_profile');     //Wrong
        }
        
        if($this->input->post()) { 
            $this->form_validation->set_rules('rent_space_type','Space Type','required|trim');
            $this->form_validation->set_rules('rent_space_number','Space Number', 'required|min_length[1]|max_length[2]|trim|callback_numeric_wcomma');
            $this->form_validation->set_rules('rent_space_whoru','Who are you', 'required|trim');
            $this->form_validation->set_rules('rent_space_description','Description', 'required|trim');
        
            if ($this->form_validation->run() == FALSE) {
                $this->layout->view('space/addspace_details',$data);
            }
            else{
                
                $this->load->library('upload');
                if (!empty($_FILES['rent_space_picture']['name'])){
                    $config['upload_path'] = 'uploads/space_pic'; // check path is correct
                    $config['max_size'] = '5120';
                    //$config['max_width'] = '1025'; 
                    //$config['max_height'] = '1025';
                    $config['allowed_types'] = 'jpg|png|jpeg'; // add video extenstion on here
                    //$config['overwrite'] = FALSE;
                    $config['remove_spaces'] = TRUE;
                    
                    $filename = $_FILES['rent_space_picture']['name'];
                    
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $space_picname = $config['file_name'] = time().'space.'.$ext;
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('rent_space_picture')) // form input field attribute
                    {                        
                        $data['error_image'] = $this->upload->display_errors();
                        $this->layout->view('space/addspace_details',$data);
                        return FALSE;
                    }
                }else{
                    $space_picname = $check_space_existance->rent_space_picture;
                }
                
                $addspace_data3 = array(
                    'rent_space_type' => trim($this->input->post('rent_space_type')),
                    'rent_space_number' => trim($this->input->post('rent_space_number')),
                    'rent_space_whoru' => trim($this->input->post('rent_space_whoru')),
                    'rent_space_description' => trim($this->input->post('rent_space_description')),
                    'rent_space_access_instruction' => trim($this->input->post('rent_space_access_instruction')),
                    'rent_space_picture' => $space_picname
                );

                $update_status = $this->space_model->updateRentSpace($addspace_data3, $rent_space_id, $user_id);
                
                if($update_status){
                    redirect('space/addspace_availability/'.base64_encode($rent_space_id));
                }else{
                    redirect('space/addspace_profile'); //Wrong
                }
            }
            
        }else{ 
            $this->layout->view("space/addspace_details",$data);
        }
    }
    
    public function addspace_availability(){
        $this->layout->css('css/bootstrap-timepicker.min.css');
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/bootstrap-timepicker.min.js');
//        $this->layout->js('js/chosen.jquery.js');
//        $this->layout->js('js/custom.js');
        
        $this->layout->title('Step4');
        
        $this->load->model(array('web_models/space_model'));
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $rent_space_id = base64_decode($this->uri->segment(3));
        
        $data['space_days'] = $this->space_model->getAllSpaceDays();
        
        $data['rent_space_details'] = $check_space_existance = $this->space_model->getParkingSpaceDetails($rent_space_id,$user_id);
        if(empty($check_space_existance)){
            redirect('space/addspace_profile');     //Wrong
        }
        
        if($this->input->post()) { //print_r($_POST);die('zzz');
            
            if($this->input->post('availability_time') != 1){
                $rent_space_day = $this->input->post('rent_space_day');
                if(empty($rent_space_day)){
                    $this->form_validation->set_rules('rent_space_day','Space Day','required');
                }
                $this->form_validation->set_rules('rent_space_fromdatetime','From Time', 'required');
                $this->form_validation->set_rules('rent_space_todatetime','To Time', 'required');
            }
            $this->form_validation->set_rules('rent_space_rate','Space Rate', 'required|min_length[1]|max_length[5]|trim|callback_numeric_wcomma');
        
            if ($this->form_validation->run() == FALSE) {
                $this->layout->view('space/addspace_availability',$data);
            }
            else{
                
                if($this->input->post('availability_time') == 1){
                    $rent_space_fromdatetime = '00:00:00';
                    $rent_space_todatetime = '00:00:00';
                    
                    $rentsday = '0,1,2,3,4,5,6';
                    
                    $availability_time = 1;
                    
                }else{
                    $rent_space_fromdatetime = date("H:i:s", strtotime(trim($this->input->post('rent_space_fromdatetime'))));
                    $rent_space_todatetime = date("H:i:s", strtotime(trim($this->input->post('rent_space_todatetime'))));

                    $rday = '';
                    if(!empty($rent_space_day)){
                        foreach ($rent_space_day as $rentday) {
                            $rday .= $rentday.',';
                        }
                    }
                    $rentsday = rtrim($rday,',');
                    
                    $availability_time = 0;
                }
                
                $addspace_data4 = array(
                    'rent_space_day' => $rentsday,
                    'rent_space_fromdatetime' => $rent_space_fromdatetime,
                    'rent_space_todatetime' => $rent_space_todatetime,
                    'rent_space_rate' => trim($this->input->post('rent_space_rate')),
                    'availability_time' =>$availability_time,
                    'steps_flag' => 1
                );

                $update_status = $this->space_model->updateRentSpace($addspace_data4, $rent_space_id, $user_id);
                
                if($update_status){
                    redirect('user/dashboard');     //success
                }else{
                    redirect('space/addspace_profile'); //Wrong
                }
            }
            
        }else{ 
            $this->layout->view("space/addspace_availability",$data);
        }
        
        
        
    }
    
    /*Lists of my parking spaces*/
    public function myspacing_lists(){
        $this->layout->title('My Space');
        
        $this->load->model(array('web_models/space_model'));
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $data['get_myspaces'] = $this->space_model->getMySpaces($user_id);
        //print_r($data['get_myspaces']);die('k');
        
        $this->layout->view("space/myspacing_lists",$data);
        
    }
    
    public function actvinactv_myspace(){
        $rent_space_id = $this->input->post('rent_space_id');
        $status = $this->input->post('status');
        
        $this->load->model(array('web_models/space_model'));
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $check_space_existance = $this->space_model->getParkingSpaceDetails($rent_space_id,$user_id);
        if(!empty($check_space_existance)){
            if($status == 1){
                $st = 0;
            }else{
                $st = 1;
            }
            $updatespace_data = array('active'=>$st);
            //print_r($updatespace_data);die('kl');
            $update_status = $this->space_model->updateRentSpace($updatespace_data, $rent_space_id, $user_id);
            
            if($update_status){
                echo '1';
            }else{
                echo '0';
            }
        }else{
            echo '0';
        }
        
    }
    
    
    public function search() {
        $this->layout->css('css/bootstrap-datetimepicker.min.css');
        $this->layout->js('js/moment-with-locales.js');
        $this->layout->js('js/bootstrap-datetimepicker.min.js');
        
        $this->layout->view("space/search_parking_space");
    }
    
    public function search_parking_space_old() {
        $this->layout->css('css/bootstrap-datetimepicker.min.css');
        $this->layout->js('js/moment-with-locales.js');
        $this->layout->js('js/bootstrap-datetimepicker.min.js');
        
        $this->load->model(array('web_models/space_model'));
        
        //$page = trim($data["page"]);
        if($this->input->post()){
        
        $latitude = trim($this->input->post("latitude"));
        $longitude = trim($this->input->post("longitude"));
        
        $fromdatetime = date("Y-m-d H:i:s", strtotime(trim($this->input->post("fromdatetime"))));
        $todatetime = date("Y-m-d H:i:s", strtotime(trim($this->input->post("todatetime"))));
        
        //echo $fromdatetime;die('zzz');
        $fromdatetime = new DateTime($fromdatetime);
        $todatetime = new DateTime($todatetime);
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $daterange = new DatePeriod($fromdatetime, new DateInterval('P1D'), $todatetime);

        $dateday = array();
        foreach($daterange as $date){
            //echo $date->format("Y-m-d").' week day ' .date('w', strtotime($date->format("Y-m-d"))). "<br>";
            $dateday[] = date('w', strtotime($date->format("Y-m-d")));
        }
        
        //$daynumber = join("','",array_unique($dateday)); 
        $array_of_days_no = array_unique($dateday); 
        
        $rent_space_ids = $this->space_model->getSpaceIds($user_id);
        //print_r($rent_space_ids);die('z');
        if(!empty($rent_space_ids)){
            
//            $limit = 4;  // to change limit
//            if (isset($page) && $page > 1) {
//                $offset = ($page - 1) * $limit;
//            } else {
//                $offset = 0;
//            }
            
            //$parking_search = $this->space_model->getParkingSpaceData($rent_space_ids,$array_of_days_no,$_POST["fromdatetime"],$_POST["todatetime"],$latitude,$longitude,$limit,$offset);
            $parking_search = $this->space_model->getParkingSpaceData($rent_space_ids,$array_of_days_no,$_POST["fromdatetime"],$_POST["todatetime"],$latitude,$longitude);
            if(!empty($parking_search)){
                foreach($parking_search as $resobj){
                    $resobj->estimate_time = $this->get_driving_distance($latitude, $longitude, $resobj->rent_space_latitude, $resobj->rent_space_longitude);
                }
                print_r($parking_search);die('iff');    
                $response['status'] = 1;
                $response['response'] = $parking_search;
                $this->output->set_header('Content-Type: application/json');
                echo json_encode($response);
                die;
            }else{ die('else'); 
                $response['status'] = 0;
                $response['response'] = 'No parking space available.';
                $this->output->set_header('Content-Type: application/json');
                echo json_encode($response);
                die;
            }
            
            
            
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'No parking space available.';
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
            die;
        }
        
        
        }else{
            redirect('home');
        }
    }
    
    public function search_parking_space() {
        
        $this->layout->title('Search Parking');
        
        $this->layout->css('css/bootstrap-datetimepicker.min.css');
        $this->layout->js('js/moment-with-locales.js');
        $this->layout->js('js/bootstrap-datetimepicker.min.js');
        
        $this->load->model(array('web_models/space_model'));
        
        //$page = trim($data["page"]);
        if($this->input->post()){
        
            $data ['slat'] = $latitude = trim($this->input->post("latitude"));
            $data ['slong'] = $longitude = trim($this->input->post("longitude"));

            $data['from'] = $from_datetime = date("Y-m-d H:i:s", strtotime(trim($this->input->post("fromdatetime"))));
            $data['to'] = $to_datetime = date("Y-m-d H:i:s", strtotime(trim($this->input->post("todatetime"))));
            
           $hourdiff = round((strtotime($to_datetime) - strtotime($from_datetime))/3600, 1);
            //die('sss');
            $data['search_address'] = trim($this->input->post('search_address'));

    //        $fromt = date("H:i:s", strtotime(trim($this->input->post("fromdatetime"))));
    //        $tot = date("H:i:s", strtotime(trim($this->input->post("todatetime"))));

            //echo $fromdatetime;die('zzz');
            $fromdatetime = new DateTime($from_datetime);
            $todatetime = new DateTime($to_datetime);

            $user_id = $this->session->userdata('dways_user_id');

            $daterange = new DatePeriod($fromdatetime, new DateInterval('P1D'), $todatetime);

            $dateday = array();
            foreach($daterange as $date){
                //echo $date->format("Y-m-d").' week day ' .date('w', strtotime($date->format("Y-m-d"))). "<br>";
                $dateday[] = date('w', strtotime($date->format("Y-m-d")));
            }

            //$daynumber = join("','",array_unique($dateday)); 
            $array_of_days_no = array_unique($dateday); 

            //$rent_space_ids = $this->space_model->getSpaceIds($user_id);
            //print_r($rent_space_ids);die('z');

                //$parking_search = $this->space_model->getParkingSpaceData($rent_space_ids,$array_of_days_no,$_POST["fromdatetime"],$_POST["todatetime"],$latitude,$longitude,$limit,$offset);
                //$parking_search = $this->space_model->getParkingSpaceData($rent_space_ids,$array_of_days_no,$_POST["fromdatetime"],$_POST["todatetime"],$latitude,$longitude);
            $parking_search = $this->space_model->searchParkingSpaceRecord($user_id,$from_datetime,$to_datetime,$array_of_days_no,$latitude,$longitude);
            if(!empty($parking_search)){
                foreach($parking_search as $resobj){
                    $resobj->estimate_time = $this->get_driving_distance($latitude, $longitude, $resobj->rent_space_latitude, $resobj->rent_space_longitude);
                }
                //print_r($parking_search);die('iff');    
//                $response['status'] = 1;
//                $response['response'] = $parking_search;
//                $this->output->set_header('Content-Type: application/json');
//                echo json_encode($response);
//                die;

                $data['parking_space'] = $parking_search;
                $data['json_data'] = json_encode($parking_search);

            }else{ //print_r($parking_search);die('elsee');   
                //die('ssss');
                $data['parking_space'] = '';
//                die('elsesss'); 
//                $response['status'] = 0;
//                $response['response'] = 'No parking space available.';
//                $this->output->set_header('Content-Type: application/json');
//                echo json_encode($response);
//                die;
            }
            
            
            
            $this->layout->view("space/search_parking_space",$data);
        
        
        
        }else{
            redirect('home');
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
    
    
    public function add_ratings(){
        $user_id = $this->session->userdata('dways_user_id');
        
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
    
    //# Add rating by space(parking) owner to who booked space

    
    /*Add rating by space owner to who booked space*/
    public function addbooking_ratings(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();
        
        $this->load->model(array('api_models/book_model'));
        
        $ratebook_data = array(
            "space_owner_userid" => $data->user_id,
            "rent_space_id" => $data->rent_space_id,
            "book_space_userid"=> $data->book_space_userid,
            "book_space_id"=> $data->book_space_id,
            "rating" => $data->rating,
            "review" => $data->review,
            "datetime" => date("Y-m-d H:i:s")
        );
        
        $check_rating_existance = $this->book_model->checkRatingOnBookingUser($data->rent_space_id,$data->book_space_id);
        if(!empty($check_rating_existance)){
            $response = array("code" => 0, "status" => false, "message" => "You already had been given rating.");
            $this->output->set_header('Content-Type: application/json');
            echo json_encode($response);
        }
        
        $res = $this->book_model->addRatingOnBooking($ratebook_data);
        
        if($res){
            $response = array("code" => 1, "status" => true, "message" => "Ratings added successfully.");
        } else {
            $response = array("code" => 0, "status" => false, "message" => "Please try again.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
        
    }
        
}