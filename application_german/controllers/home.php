<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        //$this->load->model(array('user_model','learning_model'));
        
    }
    
    /*User Signup*/
    public function signup(){
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
        
        $this->load->model(array('user_model','learning_model'));
        
        if ($this->user_model->checkEmailExistance(trim($_POST['email']))) {
            $response['status'] = 0;
            $response['responce'] = 'Email already exist.';
            echo json_encode($response);
            die;
        }
        
        
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

        $add_data = array(
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim(md5($_POST['password'])),
            'profile_pic' => $config['file_name'],
            'created_date' => date('Y-m-d H:i:s'),
            'username' => trim($_POST['username'])
        );

        $user_id = $this->user_model->addUser($add_data);
        
        //$listening_records = $this->admin_model->getListening(1);
        $array_days = array('1','2','3','4','5');
        $listening_records = $this->learning_model->fetchCourseUsingDays($array_days);
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

                $this->learning_model->addListeningByUser($add_listening);
                
            }
            
            foreach($array_days as $d){
                $addtest_percentage = array(
                    'days'=>$d,
                    'percentage'=>0,
                    'user_id'=>$user_id
                );
                
                $this->learning_model->addUserTestPercentage($addtest_percentage);  //Add 0 percent by defalult
            }
            
        }

        $response['status'] = 1;
        $response['responce'] = $user_id;
        echo json_encode($response);
        die;
    }
    
    /*Check email existance*/
    public function email_existance(){
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
        
        $this->load->model(array('user_model'));
        
        if($this->user_model->checkEmailExistance(trim($data['email']))) {
            $response['status'] = 0;
            $response['responce'] = 'Email already exists.';
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 1;
            $response['responce'] = 'Go ahead.';
            echo json_encode($response);
            die;
        }
    }
    
    
    /*Check username existance*/
    public function username_existance(){
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
        
        $this->load->model(array('user_model'));
        
        if($this->user_model->checkUsernameExistance(trim($data['username']))) {
            $response['status'] = 0;
            $response['responce'] = 'Username already exists.';
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 1;
            $response['responce'] = 'Go ahead.';
            echo json_encode($response);
            die;
        }
    }


    /*User Login*/
    public function login(){
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
        
        $email = trim($data["email"]);
        $password = trim($data["password"]);
        
        $this->load->model(array('user_model'));
        
        $result = $this->user_model->checkLogin($email,$password);
        if(!empty($result))
        {
            //$user_listeningdata = $this->learning_model->getListeningUserData($result->user_id);
            $response['status'] = 1;
            $response['responce'] = $result;
            //$response['playdata'] = $user_listeningdata;
        }
        else{
            $response['status'] = 0;
            $response['responce'] = 'Invalid email id or password.';
        }
        echo json_encode($response);
        die;
    }
    
    
    public function forget_password(){
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
        
        $toemail = trim($data["email"]);
        $this->load->model('user_model');
        $check_email_existance = $this->user_model->checkEmailExistance($toemail);
        
        if(empty($check_email_existance)){
            $response['status'] = 0;
            $response['responce'] = 'This email is not registered with us.';
        }else{
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            $base_url = $this->config->item('base_url');
            
            $get_user_details = $this->user_model->getUserDetails($toemail);
            //print_r($get_user_details);die('zzzz');
            $name = $get_user_details->name;
            
            
            $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string_shuffled = str_shuffle($string);
            $otp = substr($string_shuffled, 1, 5);
            
            $update = array('otp'=>$otp);
            $this->user_model->updateUserDetailsUsingEmail($toemail,$update);   //Update otp
            
            $subject = 'Forgot password';
            
            $filename = 'forgotpassword.php';
            
            $this->load->library('email');
            $this->email->from('info@creativethoughtsinfo.com');
            $this->email->to($toemail);
            $this->email->subject($subject);
            $emali_filename = $this->config->item('base_url') . "mailer/" . $filename;
            $data = file_get_contents($emali_filename);

            $replace = array("[%PASS%]","[%BASE_PATH%]", "[%NAME%]");
            $replace_with = array($otp, $base_url, $name);
            
            $sentdata = str_replace($replace, $replace_with, $data);
            //echo $sentdata;die;
            $this->email->set_mailtype("html");
            $this->email->message($sentdata);
            $this->email->send();
            
            $response['status'] = 1;
            $response['responce'] = 'Email send successfully with otp.';
            
        }
        
        echo json_encode($response);
        die;
        
        
    }
    
    
    public function check_otp(){
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
        
        $toemail = trim($data["email"]);
        $otp = trim($data["otp"]);
        
        $this->load->model('user_model');
        
        $check_otp = $this->user_model->checkopt_iscorrect($toemail,$otp);
        //print_r($check_otp);
        if(!empty($check_otp)){
            $response['status'] = 1;
            $response['responce'] = 'Otp correct';
        }else{
            $response['status'] = 0;
            $response['responce'] = 'Incorrect otp';
        }
        echo json_encode($response);
        die;
    }
    
    
    public function update_password(){
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
        
        $toemail = trim($data["email"]);
        $otp = trim($data["otp"]);
        $newpass = trim($data["newpass"]);
        
        $this->load->model('user_model');
        
        $update = array('password'=> md5($newpass));
        $this->user_model->updateUserpassword($toemail,$otp,$update);   //Update password
        
        $response['status'] = 1;
        $response['responce'] = 'Password change successfully.';
        echo json_encode($response);
        die;
    }
    
    
    public function test_srt(){
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
        
        
        $this->load->model('user_model');
        $response['srt'] = 'sub.srt';
        $response['audio'] = '1476784831_01-3.mp3';
        $result = $this->user_model->test();   //Update password
        
        $response['status'] = 1;
        $response['responce'] = $result;
        echo json_encode($response);
        die;
    }
    
    public function listening_info(){
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
        
        $this->load->model('demo_model');
        $response['srt'] = 'listening.srt';
        
        $get_audio_data = $this->demo_model->getLatestAudio();
        if(!empty($get_audio_data)){
            $response['audio'] = $get_audio_data->audio;
        }else{
            $response['audio'] = '';
        }
        
        
        
        $result = $this->demo_model->getCustomListeningData();   //Update password
        if(!empty($result)){
            $response['status'] = 1;
            $response['responce'] = $result;
            echo json_encode($response);
            die;
        
        }else{
            $result = array();
            $response['status'] = 0;
            $response['responce'] = $result;
            echo json_encode($response);
            die;
        }
    }
    
    
    
}




