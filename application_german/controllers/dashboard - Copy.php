<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->load->model(array('user_model','learning_model','admin_model','common_model'));
        
    }
    
    
    /*User listening data*/
    public function getlistening_userdata(){
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
        
        $getdays = $this->learning_model->getDaysOfUser($user_id);
//        if(!empty($getdays)){
//            foreach($getdays as $days){
//                
//            }
//        }
        
        
        if(!empty($getdays)){
            foreach($getdays as $days){
                $z = array('Test'=>'Level 1');
                $days->data = $this->learning_model->getListeningUserData($user_id,$days->days);  //Get Listening data
                if($days->days == 5){
                    array_push($days->data,$z);
                    //$days->data= 
                }
                
            }
        }
       
        if(!empty($getdays))
        {
            $response['status'] = 1;
            $response['responce'] = $getdays;
        }
        else{
            $response['status'] = 0;
            $response['responce'] = 'Not exists.';
        }
        echo json_encode($response);
        die;
    }
    
    /*Update status for listening*/
    public function update_listeningstatus(){
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
        $listening_id = trim($data["listening_id"]);
        
        $check_existance = $this->learning_model->getUserListeningUsingLid($listening_id,$user_id);
        
        if(!empty($listening_id) && !empty($user_id) && !empty($check_existance)){
            $updatedata = array('status'=>1);
            $this->learning_model->updateListeningStatus($listening_id,$user_id,$updatedata);
            $response['status'] = 1;
            $response['responce'] = 'Update status successfully.';
        }
        else{
            $response['status'] = 0;
            $response['responce'] = '';
        }
        echo json_encode($response);
        die;
        
    }
    
    /*Get next listening records which is need to be run*/
    public function getnext_listening(){       
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
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
        $parts = trim($data["parts"]);
        
        $get_listen = $this->learning_model->getListeningUsingDaysParts($days,$parts);   /*Table:germ_learning_data*/
        $learning_dataid = $get_listen->learning_dataid;
        if($days <= '31' && $parts <= '6' && !empty($get_listen)){
            $userlistening_data = $this->learning_model->getUserListeningUsingLid('',$user_id,$learning_dataid); /*Table:germ_user_listening*/
            if(!empty($userlistening_data)){
                
                $listening_id = $userlistening_data->listening_id;
                if($userlistening_data->status != 1){
                    $updatedata = array('status'=>1);
                    $this->learning_model->updateListeningStatus($listening_id,$user_id,$updatedata); /*Update of user listen status*/
                }
            }else{
                /*Add new days data for user which is not available in table*/
                $listening_records = $this->admin_model->getListening($days);   
                if(!empty($listening_records)){
                    foreach($listening_records as $records){
                        if($records->days == $days && $records->parts == 1){
                            $status = 1;
                        }else{
                            $status = 0;
                        }

                        $add_listening = array(
                            'learning_dataid' => $records->learning_dataid,
                            'user_id' => $user_id,
                            'status' => $status,
                            'created_date' => date('Y-m-d H:i:s')
                        );

                        $this->learning_model->addListeningByUser($add_listening);
                    }
                }else{
                    $response['status'] = 0;
                    $response['responce'] = 'No more days course available.';
                    echo json_encode($response);
                    die;
                }
                //$playcourse = $this->learning_model->getListeningUserData($user_id,$days,$parts);
                //getListening($days);
            }
            $playcourse = $this->learning_model->getListeningUserData($user_id,$days,$parts);
            
            $response['status'] = 1;
            $response['responce'] = $playcourse;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    /*Check user purchased the plan or not using*/
    public function course_buyornot(){
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
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
        $isplan_purchased = $this->common_model->checkCourseIsBuy($user_id,1);
        if(!empty($isplan_purchased)){
            $response['status'] = 1;
            $response['responce'] = "Plan is already purchased by you for german course.";
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['responce'] = "You don't purchased plan for german course.";
            echo json_encode($response);
            die;
        }
        
    }
    
    
    
    
    
    
}