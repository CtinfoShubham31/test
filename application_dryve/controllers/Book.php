<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','common'));
        $this->load->model(array('web_models/common_model'));
        if(!isUserLogin()) { 
            redirect($this->config->base_url().'home/logout');
        }
    }
    
    
    public function space_details(){
        
        $this->layout->title('Space Deatils');
        
        
        $this->layout->css('css/jquery-ui.css');
        $this->layout->js('js/jquery-ui.js');
        
        $this->load->model(array('web_models/book_model'));
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $rent_space_id = base64_decode($this->uri->segment(3));
        
        $data['latitude']= $latitude = trim($this->input->post('slat'));
        $data['longitude'] = $longitude = trim($this->input->post('slong'));
        $data['fromdatetime'] = $fromdatetime = trim($this->input->post('from'));
        $data['todatetime'] = $todatetime = trim($this->input->post('to'));
        $data['search_address'] = $search_address = trim($this->input->post('search_address'));
        
        //print_r($_POST);die;
        
        $data['rent_space_details'] = $check_space_existance = $this->book_model->getSpaceDetailsForBookingPurpose($rent_space_id,$latitude,$longitude,$user_id,$fromdatetime,$todatetime);
       
        
        $this->layout->view("book/space_details",$data);
    }
    
    
    public function addvehicle_popup(){
        $user_id = $this->session->userdata('dways_user_id');
        
        if($this->input->post('rent_space_id')){
            $this->load->model(array('web_models/book_model'));
            
            $errors = array();
            $data = array();
            
            $rent_space_id = trim($this->input->post('rent_space_id'));
            
            if (empty($rent_space_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($rent_space_id)){
                $rentspace_data = $this->book_model->getParkingDetails($rent_space_id,$user_id);
                //print_r($rentspace_data);die('jkjkjk');
                if(empty($rentspace_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $data['rentspace_data'] = $this->book_model->getParkingDetails($rent_space_id);
                //print_r($data['rentspace_data']);die;
                $this->load->view('book/addvehicle_popup',$data);
            }
            
        }
        
        //$this->load->view('book/addvehicle_popup');
    }
    
    
    public function add_vehicle(){
        //if($this->input->post('vehicle_number')){
        $user_id = $this->session->userdata('dways_user_id');
        $this->load->model(array('web_models/book_model'));

        $errors = array();
        $data = array();

        $vehicle_number = trim($this->input->post('vehicle_number'));

        if (empty($vehicle_number)){
            $errors['valid_vehicle'] = 'Vehicle number is required';
        }else if(!empty($vehicle_number)){
            $vehicle_data = $this->book_model->checkVehicleExistance($user_id,$vehicle_number);
            if(!empty($vehicle_data)){
                $errors['valid_vehicle'] = 'This vehicle already added';
            }
        }

        if (!empty($errors)) { //echo 'ssss';
            $data['errors']  = $errors;
            echo json_encode($data);
        }else {

            $data['errors']  = '';

            $add_vehicle = array(
                'user_id'=>$user_id,
                'vehicle_number'=>$vehicle_number
            );

            $this->book_model->addVehicle($add_vehicle); //Update query to add giddh credential in company
            $data['success'] = 'done';
            echo json_encode($data);

        }
            
        //}
    }
    
    public function get_vehicle(){
        $user_id = $this->session->userdata('dways_user_id');
        
        $this->load->model(array('web_models/book_model'));
        $term = trim($this->input->post('data'));
        
        $vehicles = $this->book_model->vehicleSearch($term,$user_id);
        echo json_encode($vehicles);
    }
    
    /*Parking space booking*/
    public function book_space(){
        $user_id = $this->session->userdata('dways_user_id');
        
        $this->load->model(array('web_models/book_model'));
        
        $vehicle_number = trim($this->input->post('vehicle_no'));
        
        $rent_space_id = trim($this->input->post('rent_space_id'));

        $latitude = trim($this->input->post('latitude'));
        $longitude = trim($this->input->post('longitude'));
        $book_space_fromdatetime = trim($this->input->post('book_space_fromdatetime'));
        $book_space_todatetime = trim($this->input->post('book_space_todatetime'));
        
        
        //////////////////////////////////////////////////////////////////////////////////
        $fromdatetime = new DateTime($book_space_fromdatetime);
        $todatetime = new DateTime($book_space_todatetime);

        $daterange = new DatePeriod($fromdatetime, new DateInterval('P1D'), $todatetime);

        $dateday = array();
        foreach($daterange as $date){
            //echo $date->format("Y-m-d").' week day ' .date('w', strtotime($date->format("Y-m-d"))). "<br>";
            $dateday[] = date('w', strtotime($date->format("Y-m-d")));
        }

        //$daynumber = join("','",array_unique($dateday)); 
        $array_of_days_no = array_unique($dateday); 
        $parking_search = $this->book_model->searchParkingSpaceRecord($user_id,$book_space_fromdatetime,$book_space_todatetime,$array_of_days_no,$latitude,$longitude,$rent_space_id);
        //////////////////////////////////////////////////////////////////////////////////
        
        
        
        $errors = array();
        $data = array();
        
        if (empty($vehicle_number)){
            $errors['valid_vehicle'] = 'Vehicle number is required.';
        }else if(!empty($vehicle_number)){
            $vehicle_data = $this->book_model->checkVehicleExistance($user_id,$vehicle_number);
            if(empty($vehicle_data)){
                $errors['valid_vehicle'] = 'This vehicle number not exists.';
            }
        }
        
        if(empty($parking_search)){
            $errors['valid_vehicle'] = 'Sorry space not available.';
        }
        
        
        if (!empty($errors)) { //echo 'ssss';
            $data['errors']  = $errors;
            echo json_encode($data);
        }else {
            $data['errors']  = '';
            //Check rent space existance and authorized user open this page. 

            $data['rent_space_details'] = $getparking_data = $this->book_model->getSpaceDetailsForBookingPurpose($rent_space_id,$latitude,$longitude,$user_id,$book_space_fromdatetime,$book_space_todatetime);

            //$data['rent_space_details'] = $getparking_data = $this->book_model->getSpaceDetailsForBookingPurpose($rent_space_id,$latitude,$longitude,$user_id,$fromdatetime,$todatetime);

            //$getparking_data = $this->book_model->getParkingDetails($rent_space_id);
            if(!empty($getparking_data)){
                $rent_space_added_by = $getparking_data->rent_space_added_by;
            
            
                $booking_data = array(
                    'book_space_user_id'=> $user_id,
                    'book_space_vehicle_number'=> $vehicle_number,
                    'book_rent_space_id'=>$rent_space_id,
                    'book_rent_space_added_by'=>$rent_space_added_by,
                    'book_rent_user_fname'=>$getparking_data->rent_user_fname,
                    'book_rent_user_lname'=>$getparking_data->rent_user_lname,
                    'book_rent_user_phone'=>$getparking_data->rent_user_phone,
                    'book_rent_user_email'=>$getparking_data->rent_user_email,
                    'book_rent_user_postal_code'=>$getparking_data->rent_user_postal_code,
                    'book_rent_user_address1'=>$getparking_data->rent_user_address1,
                    'book_rent_space_type'=>$getparking_data->rent_space_type,
                    'book_rent_space_day'=>$getparking_data->rent_space_day,
                    'book_space_fromdatetime'=>trim($this->input->post('book_space_fromdatetime')),
                    'book_space_todatetime'=>trim($this->input->post('book_space_todatetime')),
                    'book_rent_space_rate'=>$getparking_data->rent_space_rate,
                    'book_space_paid_amt'=>trim($this->input->post('book_space_paid_amt')),
                    'booking_date'=>date("Y-m-d H:i:s")
                );


                $this->book_model->bookSpace($booking_data);  //Insert for booking space
            
                $data['success'] = 'done';
                echo json_encode($data);
                
            }else{
                $errors['valid_vehicle'] = 'This space not available at that time.';
                $data['errors']  = $errors;
                //$data['success'] = 'done';
                echo json_encode($data);
            }
        
        }
        
    }
    
    /*My booking spaces*/
    public function completed_booking(){
        $this->layout->title('Completed Booking');
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $this->load->model(array('web_models/book_model'));
        
        $data['get_my_booking'] = $this->book_model->getMyBookings($user_id);
        
        $this->layout->view("book/completed_booking",$data);
    }
    
    /*Lists of booked space from my parking space*/
    public function upcoming_booking(){
        $this->layout->title('Upcoming Booking');
        
        $user_id = $this->session->userdata('dways_user_id');
        
        $this->load->model(array('web_models/book_model'));
        
        $data['get_received_booking'] = $this->book_model->getMyRecievedBookings($user_id);
        
        $this->layout->view("book/upcoming_booking",$data);
    }
    
    
}