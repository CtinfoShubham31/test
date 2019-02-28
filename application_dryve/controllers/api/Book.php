<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('apptoken', 'mail', 'notification'));
    }
 
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
    
    /*Get review given by space owner to booking user*/
    public function getreview_onbooking(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();
        
        $this->load->model(array('api_models/book_model'));
        
        $book_space_id = $data->book_space_id;
        
        $getreview = $this->book_model->getRatingReviewOnBooking($book_space_id);
        
        if(!empty($getreview)){
            $response = array("code" => 1, "status" => true, "bookreview_list" => $getreview);
        } else {
            $response = array("code" => 0, "status" => false, "message" => "No record found.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    
}