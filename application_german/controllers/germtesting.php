<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Germtesting extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        //$this->load->model(array('user_model','learning_model','admin_model','common_model'));
    }
    
    /*Get all quiz for a user who is request to give test level wise*/
    public function getusertesting_records(){
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
        
        if(!empty($test_level) && !empty($user_id)){
            
            $this->load->model('gcoursetest_model');
            
            // Checked test already given by user.
            $checkuser_already_test_that_level = $this->gcoursetest_model->getUsertestRecords($test_level,$user_id);
            if(!empty($checkuser_already_test_that_level)){ //If given by user then delete it for that level
                $this->gcoursetest_model->deleteUserTestLevels($test_level,$user_id);
                $get_testlevel_quiz = $this->gcoursetest_model->checkCountOfQuizAns('',$test_level);
            }else{
                $get_testlevel_quiz = $this->gcoursetest_model->checkCountOfQuizAns('',$test_level);
            }
            $response['status'] = 1;
            $response['responce'] = $get_testlevel_quiz;
            echo json_encode($response);
            die;
        }
        else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
        
        
    }
    
    /*Add test status which is done by user and based on test levelwise*/
    public function addtestrecords_donebyuser(){
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
        $testquiz_id = trim($data["testquiz_id"]);
        //$days = trim($data["days"]);
        $ans_status = trim($data["ans_status"]);
        $tstatus = array();
        $tstatus = new stdClass;
        $tstatus->test_status = '';
        $tstatus->percentage = '';
        if(!empty($test_level) && !empty($user_id) && !empty($testquiz_id)){
            $this->load->model('gcoursetest_model');
            $count_of_usertest_records = $this->gcoursetest_model->getUsertestRecords($test_level,$user_id);
            $count_of_testquiz = $this->gcoursetest_model->checkCountOfQuizAns('',$test_level); //Total of question
            
            //echo COUNT($count_of_usertest_records) .'=='. COUNT($count_of_testquiz); die('EEE');
            
            if(!empty($count_of_usertest_records) && !empty($count_of_testquiz) && (COUNT($count_of_usertest_records) == COUNT($count_of_testquiz))){
                //$test_status = 'Complete'; 
                $tstatus->test_status = 'Complete'; 
                
                $total_attempt_quiz_levelwise = COUNT($count_of_usertest_records);
                
                $totquiz_ofday_levelwise = COUNT($count_of_testquiz); 
                $get_records_of_correct_ans_levelwise = $this->gcoursetest_model->getUsertestRecords($test_level,$user_id,'',1);
                //Calculate percentage
                if(!empty($get_records_of_correct_ans_levelwise)){    //Calculate percentage for a user for that day 
                    $totcorrect_quiz_oflevel = COUNT($get_records_of_correct_ans_levelwise);
                    $calculate_percentage = $totcorrect_quiz_oflevel/$totquiz_ofday_levelwise*100;
                    
                    $this->gcoursetest_model->deleteUserTestLevels($test_level,$user_id); //roka
                    ///////////////////////////////////////////////////////////////////////////////////////////
                    $getlevel_percentage = $this->gcoursetest_model->fetchTestLevelPercentage($test_level,$user_id);
                    
                    if(!empty($getlevel_percentage) && $getlevel_percentage->percentage_of_testlevel>=80){
                        
                        if($calculate_percentage>$getlevel_percentage->percentage_of_testlevel){
                            $add_percentage = array(
                                'user_id'=>$user_id,
                                'test_level'=>$test_level,
                                'percentage_of_testlevel'=>$calculate_percentage
                            );
                            $this->gcoursetest_model->addUserTestResultLevelWise($add_percentage); //Add test percentage of users
                            
                        }
                    }else{  
                        $add_percentage = array(
                            'user_id'=>$user_id,
                            'test_level'=>$test_level,
                            'percentage_of_testlevel'=>$calculate_percentage
                        );
                        $this->gcoursetest_model->addUserTestResultLevelWise($add_percentage); //Add test percentage of users
                        //$tstatus->percentage = round($calculate_percentage);
                    }
                    
                    $tstatus->percentage = round($calculate_percentage);
                    ////////////////////////////////////////////////////////////////////////////////////////////
//                    $add_percentage = array(
//                        'user_id'=>$user_id,
//                        'test_level'=>$test_level,
//                        'percentage_of_testlevel'=>$calculate_percentage
//                    );
//                    $this->gcoursetest_model->addUserTestResultLevelWise($add_percentage); //Add test percentage of users
//                    $tstatus->percentage = round($calculate_percentage);
                }else{
                    $response['status'] = 0;
                    $response['responce'] = 'No test records available';
                    echo json_encode($response);
                    die;
                }
                
            }else{
                $check_existance_test = $this->gcoursetest_model->getUsertestRecords($test_level,$user_id,'','',$testquiz_id);
                //die('Continue');
                if(empty($check_existance_test)){
                    $add_data = array(
                        'user_id'=>$user_id,
                        'test_level'=>$test_level,
                        'testquiz_id'=>$testquiz_id,
                        'ans_status'=>$ans_status
                    );
                    $this->gcoursetest_model->addUserTestResult($add_data);
                }
                //$test_status = 'Continue';
                $tstatus->test_status = 'Continue'; 
                   
                
                $count_of_usertest_records = $this->gcoursetest_model->getUsertestRecords($test_level,$user_id);
                $count_of_testquiz = $this->gcoursetest_model->checkCountOfQuizAns('',$test_level); //Total of question

                if(!empty($count_of_usertest_records) && !empty($count_of_testquiz) && (COUNT($count_of_usertest_records) == COUNT($count_of_testquiz))){
                    //$test_status = 'Complete'; 
                    $tstatus->test_status = 'Complete'; 

                    $total_attempt_quiz_levelwise = COUNT($count_of_usertest_records);
                    $totquiz_ofday_levelwise = COUNT($count_of_testquiz);
                    $get_records_of_correct_ans_levelwise = $this->gcoursetest_model->getUsertestRecords($test_level,$user_id,'',1);
                    //Calculate percentage
                    if(!empty($get_records_of_correct_ans_levelwise)){    //Calculate percentage for a user for that day 
                        $totcorrect_quiz_oflevel = COUNT($get_records_of_correct_ans_levelwise);
                        $calculate_percentage = $totcorrect_quiz_oflevel/$totquiz_ofday_levelwise*100;

                        $this->gcoursetest_model->deleteUserTestLevels($test_level,$user_id); //roka

                        //////////////////////////////////////////////////////////////////
                        $getlevel_percentage = $this->gcoursetest_model->fetchTestLevelPercentage($test_level,$user_id);
                    
                        if(!empty($getlevel_percentage) && $getlevel_percentage->percentage_of_testlevel>=80){
                            //echo $calculate_percentage;die('ccc');
                            
                            if($calculate_percentage>$getlevel_percentage->percentage_of_testlevel){
                                
                                /*Delete percentage for that level.*/
                                $getusertest_level_percentage = $this->gcoursetest_model->getTestLevelPercentage($test_level,$user_id);
                                if(!empty($getusertest_level_percentage)){
                                    $this->gcoursetest_model->deleteUserTestLevelsPercentage($test_level,$user_id);
                                }
                                
                                
                                $add_percentage = array(
                                    'user_id'=>$user_id,
                                    'test_level'=>$test_level,
                                    'percentage_of_testlevel'=>$calculate_percentage
                                );
                                $this->gcoursetest_model->addUserTestResultLevelWise($add_percentage); //Add test percentage of users
                                
                            }
                        }else{ //echo $calculate_percentage;die('ddd');
                            
                            /*Delete percentage for that level.*/
                            $getusertest_level_percentage = $this->gcoursetest_model->getTestLevelPercentage($test_level,$user_id);
                            if(!empty($getusertest_level_percentage)){
                                $this->gcoursetest_model->deleteUserTestLevelsPercentage($test_level,$user_id);
                            }
                            
                            $add_percentage = array(
                                'user_id'=>$user_id,
                                'test_level'=>$test_level,
                                'percentage_of_testlevel'=>$calculate_percentage
                            );
                            $this->gcoursetest_model->addUserTestResultLevelWise($add_percentage); //Add test percentage of users
                           // $tstatus->percentage = round($calculate_percentage);
                        }
                        
                        $tstatus->percentage = round($calculate_percentage);
                        //////////////////////////////////////////////////////////////////////
                        
//                        $add_percentage = array(
//                            'user_id'=>$user_id,
//                            'test_level'=>$test_level,
//                            'percentage_of_testlevel'=>$calculate_percentage
//                        );
//                        $this->gcoursetest_model->addUserTestResultLevelWise($add_percentage); //Add test percentage of users
//                        $tstatus->percentage = round($calculate_percentage);
                    }else{
                        $response['status'] = 0;
                        $response['responce'] = 'No test records available';
                        echo json_encode($response);
                        die;
                    }

                }
                
                
            }
            $response['status'] = 1;
            $response['responce'] = $tstatus;
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
    
    }
    
    
    



    /*Submit test answer, and return response that answer is wrong or right*/
    public function answer_status(){
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
        //$days = trim($data["days"]);
        //$question = trim($data["question"]);
        $answer = trim($data["answer"]);
        //$test_level = trim($data["test_level"]);
        $testquiz_id = trim($data["testquiz_id"]);
        
        //if(!empty($test_level) && !empty($user_id) && !empty($testquiz_id) && !empty($days) && !empty($answer)){
        if(!empty($user_id) && !empty($testquiz_id) && !empty($answer)){
            $this->load->model('gcoursetest_model');
            $get_quizans_records = $this->gcoursetest_model->getDetailsTestQuizAns($testquiz_id);
            //print_r($get_quizans_records);die('sss');
            if(!empty($get_quizans_records)){
                if($answer == $get_quizans_records->answer){
                    $response['status'] = 1;
                    $response['responce'] = 'Right';
                    echo json_encode($response);
                    die;
                }else{
                    $response['status'] = 1;
                    $response['responce'] = 'Wrong';
                    echo json_encode($response);
                    die;
                }
                
            }else{
                $response['status'] = 0;
                $response['responce'] = 'No records found';
                echo json_encode($response);
                die;
            }
        }
    }
    
    /*Reset user tests for particular test level*/
    public function reset_usertest(){
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
        
        if(!empty($user_id) && !empty($test_level)){    //Delete all tests of user
            $this->load->model('gcoursetest_model');
            $this->gcoursetest_model->deleteUserTestLevels($test_level,$user_id);
            $response['status'] = 1;
            $response['responce'] = 'Reset Successfully.';
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
        
        
    }
    
    //Get german course all histories
    public function germ_course_history(){
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
        $this->load->model('gcoursetest_model');
        $getallgc_history = $this->gcoursetest_model->checkCountOfGhistory();
        if(!empty($user_id) && !empty($getallgc_history)){
            $response['status'] = 1;
            $response['responce'] = $getallgc_history;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    /*When user click on part six of any days then check he/she get 80 percent or not*/
    public function checkdaywise_testpercentage(){
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
        
        if(!empty($user_id) && !empty($days)){
            $this->load->model('gcoursetest_model');
            $get_details = $this->gcoursetest_model->getUserTestPercentageDetails($user_id,$days);
            if(!empty($get_details)){
                $user_days_percentage = $get_details->percentage;
                $response['status'] = 1;
                $response['responce'] = $user_days_percentage;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['responce'] = 'No records found.';
                echo json_encode($response);
                die;
            }
        }else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    /*Get day wise test question and answer details*/
    public function getdaywise_quizans(){
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
        
        if(!empty($days) && !empty($user_id)){
            
            $this->load->model('gcoursetest_model');
            
            // Checked test already given by user.
            $checkuser_already_test_that_level = $this->gcoursetest_model->getUsertestRecords('',$user_id,$days);
            if(!empty($checkuser_already_test_that_level)){ 
                //die('IF');
                $this->gcoursetest_model->deleteUserDayWiseTests($days,$user_id);//If user already took test then delete previous test and send new quiz for that day
                $get_daywise_quiz = $this->gcoursetest_model->checkCountOfQuizAns($days);
            }else{
                //die('ELSE');
                $get_daywise_quiz = $this->gcoursetest_model->checkCountOfQuizAns($days);
            }
            $response['status'] = 1;
            $response['responce'] = $get_daywise_quiz;
            echo json_encode($response);
            die;
        }
        else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    /*Start test day wise and add test records in to database*/
    public function starttest_daywise(){
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
        $testquiz_id = trim($data["testquiz_id"]);
        $days = trim($data["days"]);
        $ans_status = trim($data["ans_status"]);
        
        $test_status = array();
        $test_status = new stdClass;
        $test_status->test_status = '';
        $test_status->percentage = '';
        
        if(!empty($user_id) && !empty($testquiz_id) && !empty($days)){
            $this->load->model('gcoursetest_model');
            $count_of_usertest_records = $this->gcoursetest_model->getUsertestRecords('',$user_id,$days); //Total quiz answer attempt by user for particular days
            $count_of_testquiz = $this->gcoursetest_model->checkCountOfQuizAns($days); //Total question exists in database for particular days
            
            $add_data = array(
                'user_id'=>$user_id,
                'testquiz_id'=>$testquiz_id,
                'days'=>$days,
                'ans_status'=>$ans_status
            );
            

            if(!empty($count_of_usertest_records) && !empty($count_of_testquiz) && (COUNT($count_of_usertest_records) == COUNT($count_of_testquiz))){
                //$test_status = 'Complete';   //Total quiz of a day attempted by user means test is completed now
                
                $test_status->test_status = 'Complete'; 
                
                //Calculate percentage
                $total_attempt_quiz = COUNT($count_of_usertest_records);
                $totquiz_ofday = COUNT($count_of_testquiz);
                $get_records_of_correct_ans = $this->gcoursetest_model->getUsertestRecords('',$user_id,$days,1);

                if(!empty($get_records_of_correct_ans)){    //Calculate percentage for a user for that day 
                    $totcorrect_quiz_ofday = COUNT($get_records_of_correct_ans);
                    $calculate_percentage = $totcorrect_quiz_ofday/$totquiz_ofday*100;
                    
                    $check_alreadytest = $this->gcoursetest_model->getUserTestPercentageDetails($user_id,$days); //Check user already did test and get more than 80 percentage
                    if(!empty($check_alreadytest) && $check_alreadytest->percentage>=80){
                        if($calculate_percentage>$check_alreadytest->percentage){
                            $update_percentage = array(
                                'percentage'=>$calculate_percentage
                            );
                            $this->gcoursetest_model->updateUserTestPercentage($update_percentage,$days,$user_id); //Add test percentage of users
                        }
                    }else{
                        $update_percentage = array(
                            'percentage'=>$calculate_percentage
                        );
                        $this->gcoursetest_model->updateUserTestPercentage($update_percentage,$days,$user_id); //Add test percentage of users
                    }
                    
                    
                    
                    
                    $this->gcoursetest_model->deleteUserDayWiseTests($days,$user_id);
                    
                    $test_status->percentage = round($calculate_percentage);
                    
                }else{
                    $response['status'] = 0;
                    $response['responce'] = 'No test records available';
                    echo json_encode($response);
                    die;
                }
            }else{
                
                $test_status->test_status = 'Continue';
                $check_attempt_test = $this->gcoursetest_model->getUsertestRecords('',$user_id,$days,'',$testquiz_id);
                if(empty($check_attempt_test)){
                    $this->gcoursetest_model->addUserTestResult($add_data);     //Add user test answered from test.
                }
                $count_of_usertest_records = $this->gcoursetest_model->getUsertestRecords('',$user_id,$days);
                $count_of_testquiz = $this->gcoursetest_model->checkCountOfQuizAns($days); //Total of question
            
                //echo COUNT($count_of_usertest_records).' == '.COUNT($count_of_testquiz);
                
                /*After add test answer check again is completed for that particular day*/
                if(!empty($count_of_usertest_records) && !empty($count_of_testquiz) && (COUNT($count_of_usertest_records) == COUNT($count_of_testquiz))){
                    $test_status->test_status = 'Complete';  
                    //Calculate percentage
                    $total_attempt_quiz = COUNT($count_of_usertest_records);
                    $totquiz_ofday = COUNT($count_of_testquiz);
                    $get_records_of_correct_ans = $this->gcoursetest_model->getUsertestRecords('',$user_id,$days,1);

                    //$daysof_level = $this->gcoursetest_model->getUniqueDaysUsingTestlevel($test_level,$user_id);
                    if(!empty($get_records_of_correct_ans)){
                        $totcorrect_quiz_ofday = COUNT($get_records_of_correct_ans);
                        $calculate_percentage = $totcorrect_quiz_ofday/$totquiz_ofday*100;
                        
                        
                        $check_alreadytest = $this->gcoursetest_model->getUserTestPercentageDetails($user_id,$days); //Check user already did test and get more than 80 percentage
                        if(!empty($check_alreadytest) && $check_alreadytest->percentage>=80){
                            if($calculate_percentage>$check_alreadytest->percentage){
                                $update_percentage = array(
                                    'percentage'=>$calculate_percentage
                                );
                                $this->gcoursetest_model->updateUserTestPercentage($update_percentage,$days,$user_id); //Add test percentage of users
                            }
                        }else{
                            $update_percentage = array(
                                'percentage'=>$calculate_percentage
                            );
                            $this->gcoursetest_model->updateUserTestPercentage($update_percentage,$days,$user_id); //Add test percentage of users
                        }
                        
                        
                        $this->gcoursetest_model->deleteUserDayWiseTests($days,$user_id);
                        
                        $test_status->percentage = round($calculate_percentage);
                    }else{
                        $response['status'] = 0;
                        $response['responce'] = 'No data available';
                        echo json_encode($response);
                        die;
                    }
                }
                
            }
            //}
            $response['status'] = 1;
            $response['responce'] = $test_status;
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['responce'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    /*Display progress icon based on level test*/
    public function usertest_progress(){
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
        $test_progress = array();
        $test_progress = new stdClass;
        $test_progress->progress_pic = '';
        
        $this->load->model('gcoursetest_model');
        
        $usertest_percentage_details = $this->gcoursetest_model->getUserTestPercentage($user_id,80);
        
        if(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 1){
            $test_progress->progress_pic = '01Fire.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 2) {
            $test_progress->progress_pic = '02Wheel.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 3) {
            $test_progress->progress_pic = '03Writing.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 4) {
            $test_progress->progress_pic = '04Engine.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) ==5) {
            $test_progress->progress_pic = '05Electricity.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 6) {
            $test_progress->progress_pic = '06Computer.png';
        }
        elseif(!empty($usertest_percentage_details) && COUNT($usertest_percentage_details) == 7) {
            $test_progress->progress_pic = '07Internet.png';
        }
        else{
            $test_progress->progress_pic = '00Start.png';
        }
        
        $response['status'] = 1;
        $response['responce'] = $test_progress;
        echo json_encode($response);
        die;
        
    }
    
    
    
    
}