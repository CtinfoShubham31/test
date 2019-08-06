<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: application/json');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        //$this->load->model(array('learning_model','common_model'));
        
    }
    
    
    /*User listening data*/
    public function getlistening_userdata(){
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"progress_icon" => '',"responce" => array());
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
        $myday='';
        $limit_array = trim($data["limit"]);
        $result = array();
        
        $this->load->model(array('gcoursetest_model','learning_model'));
        
        $getdays = $this->learning_model->getDaysOfUser($user_id);
        
        if(!empty($getdays)){
            $mytest='';$mydata='';$i=0;
            foreach($getdays as $days){
                $myday = $days->days;
                $mydata = $this->learning_model->getListeningUserData($user_id,$days->days);  //Get Listening data
                //$mydata =  array('0','2','34'); 
                if($days->days%5==0)
                {
                    $i++;
                    $mytest = 'tests';  
                }
                $maindata_array = array('days'=>$myday,'data'=>$mydata,'test_percentage'=>$days->percentage);
                array_push($result, $maindata_array);

                if(!empty($mytest)){
                    $getusertest_level_percentage = $this->gcoursetest_model->getTestLevelPercentage($i,$user_id);
                    if(!empty($getusertest_level_percentage->percentage_of_testlevel)){
                        $test_level_percentage = $getusertest_level_percentage->percentage_of_testlevel;
                    }else{
                        $test_level_percentage = 0;
                    }
                    
                    $test_level_array = array('test'=>'test begin','test_level_percentage'=>$test_level_percentage);
                    array_push($result, $test_level_array);
                    $mytest = '';
                }
            }
        }
        
        $usertest_percentage_details = $this->gcoursetest_model->getUserTestPercentage($user_id,80);
        
        
        if(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 1){
            $progress_pic = '01Fire.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 2) {
            $progress_pic = '02Wheel.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 3) {
            $progress_pic = '03Writing.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 4) {
            $progress_pic = '04Engine.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) ==5) {
            $progress_pic = '05Electricity.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 6) {
            $progress_pic = '06Computer.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 7) {
            $progress_pic = '07Internet.png';
        }
        else{
            $progress_pic = '00Start.png';
        }
        
        if(!empty($getdays) && !empty($limit_array))
        {
            $response['status'] = 1;
            $response['progress_icon'] = $progress_pic;
           // $response['progress_icon'] = $progress_pic;
            $response['responce'] = array_slice($result, 0, $limit_array);
            
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
        
        $this->load->model(array('learning_model','gcoursetest_model'));
        
        $check_existance = $this->learning_model->getUserListeningUsingLid($listening_id,$user_id);
        
        if(!empty($listening_id) && !empty($user_id) && !empty($check_existance)){
            
            
            $updatedata = array('status'=>1);
            $this->learning_model->updateListeningStatus($listening_id,$user_id,$updatedata);
            
            $learning_dataid = $check_existance->learning_dataid;
            if($learning_dataid){        
                $get_learningdata = $this->learning_model->getLearningData($learning_dataid);
                if($get_learningdata->days == 31){
                    $update_percentage = array('percentage'=>100);
                    $this->gcoursetest_model->updateUserTestPercentage($update_percentage,$get_learningdata->days,$user_id);
                    
                    $adddata = array('user_id'=>$user_id,'test_level'=>7,'percentage_of_testlevel'=>100);
                    $this->gcoursetest_model->addUserTestResultLevelWise($adddata);
                    
                }
            }
            
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
        
        $this->load->model('learning_model');
        
        $get_listen = $this->learning_model->getListeningUsingDaysParts($days,$parts);   /*Table:germ_learning_data*/
        $learning_dataid = $get_listen->learning_dataid;
        if($days <= '31' && $parts <= '6' && !empty($get_listen)){
            $userlistening_data = $this->learning_model->getUserListeningUsingLid('',$user_id,$learning_dataid); /*Table:germ_user_listening*/
            if(!empty($userlistening_data)){
                //Update status of learning by user.
                $listening_id = $userlistening_data->listening_id;
                if($userlistening_data->status != 1){
                    $updatedata = array('status'=>1);
                    $this->learning_model->updateListeningStatus($listening_id,$user_id,$updatedata); /*Update of user listen status*/
                }
            }else{
                /*Add new days data for user which is not available in table*/
                $this->load->model('admin_model');
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
        
        $this->load->model('common_model');
        
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
    
    
    public function update_nameofuser(){
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
        $uname = trim($data["uname"]);
        
        $this->load->model('common_model');
        
        if(!empty($user_id) && !empty($uname)){
            $update = array('name'=>$uname);
            $this->common_model->updateUser($user_id,$update);
            $udetails = $this->common_model->getUserDetailsUsingId($user_id);
            $response['status'] = 1;
            $response['responce'] = $udetails;
            echo json_encode($response);
            die;
        }
    }
    
    public function getuser_details(){
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
        if($user_id){
            
            $this->load->model('common_model');
            
            $udetails = $this->common_model->getUserDetailsUsingId($user_id);
            $response['status'] = 1;
            $response['responce'] = $udetails;
            echo json_encode($response);
            die;
        }
    }
    
    //Update count of listening for a particular user.
    public function updatecount_ofListening(){
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
        $listening_id = trim($data["listening_id"]);
        $listening_count = trim($data["listening_count"]);
        
        if(!empty($user_id) && !empty($listening_id)){
            
            $this->load->model('learning_model');
            
            $ulistening = $this->learning_model->getUserListeningUsingLid($listening_id,$user_id,'');
            if(!empty($ulistening)){
                //$listening_time = gmdate("i:s", $listening_count);
                $updatedata = array('listening_count'=>$listening_count);
                $this->learning_model->updateListeningStatus($listening_id,$user_id,$updatedata);
                $response['status'] = 1;
                $response['responce'] = $listening_count;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['responce'] = "Records not exists.";
                echo json_encode($response);
                die;
            }
        }else{
            $response['status'] = 0;
            $response['responce'] = "";
            echo json_encode($response);
            die;
        }
    }


    /*Get talking(test quiz answer) part for stored locally in app for a particular user*/
    public function gettestquiz_answer(){
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
        $test_level = trim($data["test_level"]);
	$myday='';
	$result = array();
        
        $this->load->model(array('learning_model','gcoursetest_model'));
        
        $getdays = $this->learning_model->getDaysOfUser($user_id);
        if(!empty($test_level) && !empty($user_id)){
            //$this->load->model('gcoursetest_model');
            if(!empty($getdays)){
                $mytest='';$mydata='';
                foreach($getdays as $days){
                    $myday = $days->days;
                    // Checked test already given by user.
                    $checkuser_already_test_that_level = $this->gcoursetest_model->getUsertestRecords($test_level,$user_id);
                    if(!empty($checkuser_already_test_that_level)){ //If given by user then delete it for that level
                        $this->gcoursetest_model->deleteUserTestLevels($test_level,$user_id);
                        //echo $days->days;die('WWWWWWW');
                        $get_testlevel_quiz = $this->gcoursetest_model->getQuizAnsWithDaysLevels($days->days,$test_level);
                    }else{
                        //echo $days->days;die('RRRRRR');
                        $get_testlevel_quiz = $this->gcoursetest_model->getQuizAnsWithDaysLevels($days->days,$test_level);
                    }
                    
                    $maindata_array = array('days'=>$myday,'data'=>$get_testlevel_quiz);
                    array_push($result, $maindata_array);
                }
                
                $response['status'] = 0;
                $response['responce'] = $result;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['responce'] = 'Not Exists.';
                echo json_encode($response);
                die;
            }
        }
        else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    /*User purchase plan then add remaining days listening course as well as add dayswise test with 0% coloumn value row */
    public function purchased_plan(){
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
	
        $string_of_days = '';
	$user_id = trim($data["user_id"]);
        
        $this->load->model(array('learning_model','common_model'));
        
        $course_purchase_or_not = $this->common_model->checkCourseIsBuy($user_id,1);
        if(!empty($course_purchase_or_not)){
            $response['status'] = 0;
            $response['responce'] = 'Already purchased plan';
            echo json_encode($response);
            die;
        }else{
        
            $update = array('purchase_status'=>1);
            $this->common_model->updateUser($user_id,$update);  //Update 

            for($i=6;$i<=31;$i++){
                $string_of_days .= $i.',';
            }
            $array_of_days = rtrim($string_of_days,',');
            $array_of_days = explode(',',$array_of_days);
            $listening_records = $this->learning_model->fetchCourseUsingDays($array_of_days);
            //print_r($listening_records);die('SSSSS');
            if(!empty($listening_records)){
                foreach($listening_records as $records){
                    if($records->days == 1 && $records->parts == 1){
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

                    $this->learning_model->addListeningByUser($add_listening); //Add listing data for user next 6 to 31

                }

                foreach($array_of_days as $d){
                    $addtest_percentage = array(
                        'days'=>$d,
                        'percentage'=>0,
                        'user_id'=>$user_id
                    );

                    $this->learning_model->addUserTestPercentage($addtest_percentage);  //Add 0 percent by defalult next 6 to 31
                }

            }

            $response['status'] = 1;
            $response['responce'] = 'New record added.';
            echo json_encode($response);
            die;
        }
        
    }
    
    /*Change user profile pic*/
    public function change_profilepic(){
        if(empty($_POST)){
            $response = array("status" => array(),"responce" => array());
            $response['status'] = 0;
            $response['responce'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        if(empty($_POST['authkey']) || $_POST['authkey'] != "jumanji"){
            $response['status'] = 0;
            $response['responce'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }
        
        $user_id = trim($_POST["user_id"]);
        
        $this->load->model(array('common_model'));
        
        $config['file_name'] = "";
        if(!empty($_FILES["profile_pic"]["name"])){
            $config['upload_path'] = 'upload/profile_pic';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['overwrite'] = TRUE;
            $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["profile_pic"]["name"]);
            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('profile_pic'))
            {
                $response['status'] = 0;
                $response['responce'] = $this->upload->display_errors();
                echo json_encode($response);
                die;
            }
        }
        
        $get_userdata = $this->common_model->getUserDetailsUsingId($user_id);
        $profile_pic = $get_userdata->profile_pic;
        if(!empty($profile_pic) && file_exists('upload/profile_pic/'.$profile_pic)){
            unlink('upload/profile_pic/'.$profile_pic);
        }
        
        $update_data = array(
            'profile_pic' => $config['file_name']
        );
        
        $this->common_model->updateUser($user_id,$update_data); //Update Profile Pic
        
        $response['status'] = 1;
        $response['responce'] = $config['file_name'];
        echo json_encode($response);
        die;
        
    }

    /*Lists of language iso code*/
    public function isocode_lists(){
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
        ini_set('display_errors', 1);
        $this->load->model('common_model');
       
        $iso_array = array();
        
        $iso_code = $this->common_model->isocodeLists();
        
        //print_r($iso_code);die('ZOOO');
        if(!empty($iso_code)){
            foreach($iso_code as $key => $value){
                $iso_array[] = array('code' => $key, 'name' => $value);
            }
            $response['status'] = 1;
            $response['responce'] = $iso_array;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
        
    }


    public function test(){
        $abc = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
        $my_arraychunk = array_chunk($abc, 2);
        //print_r($my_arraychunk);die('ZZZ');
        foreach($my_arraychunk as $mychunk)
        {
            array_push($mychunk, "apple");
            $myfinalarray[]= implode(',',$mychunk);
        }
        //print_r($myfinalarray);die('ZZZZ');
        $arraya = implode(',',$myfinalarray);

        //print_r($arraya);die('dfdf');
        print_r(explode(',',$arraya));
    }
    
    
    
}