<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_offline extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        //$this->load->model(array('user_model','learning_model','admin_model','common_model'));
        
    }
    
    /*Update user staus to make it yellow*/
    public function updateuser_listening_status(){
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
        //$user_existance = $this->common_model->getUserDetailsUsingId($user_id);
        $user_id = trim($data["user_id"]);
        $listening_id = trim($data["listening_id"]);
        $listening_status = trim($data["listening_status"]);
        
        $this->load->model('learning_model');
        /*Check user id and listening data is exists or not*/
        $check_listening_existance = $this->learning_model->getUserListeningUsingLid($listening_id,$user_id);
        if(empty($check_listening_existance)){
            $response['status'] = 0;
            $response['responce'] = 'Record not available.';
            echo json_encode($response);
            die;
        }else{
            $updatedata = array('status'=>$listening_status);
            
            $this->learning_model->updateListeningStatus($listening_id,$user_id,$updatedata);
            $response['status'] = 1;
            $response['responce'] = 'Status update successfully.';
            echo json_encode($response);
            die;
        }
        
    }
    
    /*Update user percentage daywise Table:germ_usertest_percentages */
    public function update_usertest_percentage(){
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
        
        $user_id = trim($data["user_id"]);
        $days = trim($data["days"]);
        $percentage = trim($data["percentage"]);
        
        $this->load->model('gcoursetest_model');
        $check_row_existance = $this->gcoursetest_model->getUserTestPercentageDetails($user_id,$days);
        
        /*Check user id and daya data is exists or not*/
        if(empty($check_row_existance)){
            $response['status'] = 0;
            $response['responce'] = 'Record not available.';
            echo json_encode($response);
            die;
        }else{
            $update_percentage = array('percentage'=>$percentage);
            
            $this->gcoursetest_model->updateUserTestPercentage($update_percentage,$days,$user_id);
            $response['status'] = 1;
            $response['responce'] = 'Percentage update successfully.';
            echo json_encode($response);
            die;
        }
    }
    
    /*Get question and answer using level wise*/
    public function quizans_levelwise(){
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
        
        $user_id = trim($data["user_id"]);
        //$test_level = trim($data["test_level"]);
        $result = array();
        $this->load->model(array('gcoursetest_model','common_model'));
        
        $isplan_purchased = $this->common_model->checkCourseIsBuy($user_id,1);
        if(!empty($isplan_purchased)){
            $check_dataexistance = $this->gcoursetest_model->getQuizAnsWithTestLevelsOfflineSync();
            if(!empty($check_dataexistance)){
                foreach($check_dataexistance as $cdata){
                    $maindata_array = array('test_level'=>$cdata->test_level,'data'=>$check_dataexistance);
                    array_push($result, $maindata_array);
                }
                
                $response['status'] = 1;
                $response['responce'] = $result;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['responce'] = 'Record not available.';
                echo json_encode($response);
                die;
            }
        }else{
            $check_data_existance = $this->gcoursetest_model->getQuizAnsWithDaysLevels('',1);
            //print_r($check_data_existance);

            /*Check user id and daya data is exists or not*/
            if(!empty($check_data_existance)){
                
                $maindata_array = array('test_level'=>1,'data'=>$check_data_existance);
                array_push($result, $maindata_array);
                $response['status'] = 1;
                $response['responce'] = $result;
                echo json_encode($response);
                die;

            }else{
                $response['status'] = 0;
                $response['responce'] = 'Record not available.';
                echo json_encode($response);
                die;
            }
        }
        
        
    }
    
}