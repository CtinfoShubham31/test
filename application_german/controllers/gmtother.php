<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gmtother extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        //$this->load->model(array('user_model','learning_model','admin_model','common_model'));
    }
    
    public function puzzle_level_video(){
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"responce" => array());
        if(!isset($data) || count($data) == 0) {
            $response['status'] = 0;
            $response['responce'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        
        if(empty($data['authkey']) || $data['authkey'] != "jumanji"){
            $response['status'] = 0;
            $response['responce'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }
        
        
        $level = trim($data["level"]);
        
        if($level == 1){
            $path = '6Puzzle-Test1-5.mp4';
        }
        elseif ($level == 2) {
            $path = '12Puzzle-Test6-10.mp4';
        }
        elseif ($level == 3) {
            $path = '18Puzzle-Test11-15.mp4';
        }
        elseif ($level == 4) {
            $path = '24Puzzle-Test16-20.mp4';
        }
        elseif ($level == 5) {
            $path = '30Puzzle-Test21-25.mp4';
        }
        elseif ($level == 6) {
            $path = '36Puzzle-Test26-30.mp4';
        }
        
        if($path){
            $response['status'] = 1;
            $response['responce'] = $path;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['responce'] = 'No records found';
            echo json_encode($response);
            die;
        }
        
    }
    
    
    public function puzzle_day_video(){
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"responce" => array());
        if(!isset($data) || count($data) == 0) {
            $response['status'] = 0;
            $response['responce'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        
        if(empty($data['authkey']) || $data['authkey'] != "jumanji"){
            $response['status'] = 0;
            $response['responce'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }
        
        
        $day = trim($data["day"]);
        
        if($day){
            $path = $day.'Puzzle-Day'.$day.'.mp4';
        }
        else{
            $path = '';
        }
        
        if($path){
            $response['status'] = 1;
            $response['responce'] = $path;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['responce'] = 'No records found';
            echo json_encode($response);
            die;
        }
        
    }
    
    
}