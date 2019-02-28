<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('apptoken', 'mail'));
        $this->load->model(array('api_models/user_model'));
        $this->load->library('common');
    }

    /**
     * User controller
     *
     */
    //---------------------Signup----------------

    public function signup() {

        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $signupdata = array(
            "first_name" => ucwords($data->first_name),
            "last_name" => ucwords($data->last_name),
            "email" => strtolower($data->email),
            "password" => MD5($data->password),
            "verify_token" => hash('sha256', microtime() . "&#3Gq"),
            "verify_status" => 0
        );

        $emailres = $this->user_model->check_user_email($data->email);
        if (empty($emailres)) {

            $res = $this->user_model->user_signup($signupdata);
            if (!empty($res)) {

                $verify_url = base_url() . "user/verify/" . base64_encode($res->email) . '/' . $res->verify_token;
                user_verify_account_mail($res->email, "Verify your account | Dryveways", $res->first_name . " " . $res->last_name, $verify_url);
                $response = array("code" => 1, "status" => true, "message" => "Signup successful. Check your mailbox to verify your account.");
            } else {
                $response = array("code" => 0, "status" => false, "message" => "Signup failed. Please try again.");
            }
        } else {
            $response = array("code" => 2, "status" => false, "message" => "Email already exists!");
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //--------------Check user email---------------------

    public function check_user_email() {
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $res = $this->user_model->check_user_email($data->email);
        if (empty($res)) {
            $response = array("code" => 1, "status" => true, "message" => "Email not exists!");
        } else {
            $response = array("code" => 0, "status" => false, "message" => "Email already exists!");
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //--------------------------Login---------------------------

    public function login() {
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $logindata = array(
            "email" => $data->email,
            "password" => MD5($data->password)
        );

        $res = $this->user_model->check_user_login($logindata);
        if (!empty($res)) {
            if ($res->verify_status != 1) {
                $response = array("code" => 2, "status" => false, "message" => "Your account is not verified.");
            } else {
                $this->user_model->update_fcm_token($res->user_id, $data->device_token);
                $response = array("code" => 1, "status" => true, "message" => "User info", "info" => $res);
            }
        } else {
            $response = array("code" => 0, "status" => false, "message" => "Invalid email or password!");
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //-------------------------signup with google or facebook-----------------

    public function social_signup() {

        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $data->facebook_id = isset($data->facebook_id) ? $data->facebook_id : "";
        $data->google_id = isset($data->google_id) ? $data->google_id : "";

        if ($data->facebook_id != "" || $data->google_id != "") {

            $signupdata = array(
                "first_name" => ucwords($data->first_name),
                "last_name" => ucwords($data->last_name),
                "email" => strtolower($data->email),
                "password" => "",
                "verify_status" => 1,
                "facebook_id" => $data->facebook_id,
                "google_id" => $data->google_id
            );

            $emailres = $this->user_model->check_user_email($data->email);
            if (empty($emailres)) {

                $res = $this->user_model->user_signup($signupdata);
                if (!empty($res)) {

                    $this->user_model->update_user($res->user_id, array("device_token" => $data->device_token));

                    $response = array("code" => 1, "status" => true, "message" => "Login successful.", "info" => $res);
                } else {
                    $response = array("code" => 0, "status" => false, "message" => "Login failed. Please try again.");
                }
            } else {

                if ($emailres->verify_status == 0) {
                    $this->user_model->update_user($emailres->user_id, array("device_token" => $data->device_token, "password" => "", "verify_status" => 1));
                } else {
                    $this->user_model->update_user($emailres->user_id, array("device_token" => $data->device_token));
                }

                $response = array("code" => 1, "status" => true, "message" => "Login successful.", "info" => $emailres);
            }
        } else {
            $response = array("code" => 0, "status" => false, "message" => "Login failed. Please try again.");
        }


        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    //--------------------------Forgot password----------------------------

    public function forgot_password() {
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }
        $response = array();

        $email = $data->email;

        $pass_otp = mt_rand(100000, 999999);
        $res = $this->user_model->add_to_forgot_pwd($email, $pass_otp);

        if (empty($res)) {
            $response = array("code" => 2, "status" => false, "message" => "Email not registered!");
        } else {
            if ($res->verify_status == 1) {
                $to = $res->email;
                $subject = "Reset Password | Dryveways";
                $mail_res = forgot_password_otp_mail($to, $subject, ucwords($res->first_name), $pass_otp);

                if ($mail_res) {
                    $response = array("code" => 1, "status" => true, "message" => "Please check your Email for OTP.");
                } else {
                    $response = array("code" => 0, "status" => false, "message" => "Please try again..");
                }
            } else {
                $response = array("code" => 3, "status" => false, "message" => "Your account is not verified. Please verify your account first.");
            }
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //----------------------Reset password API------------------

    public function reset_password() {
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $newpassword = MD5($data->newpassword);

        $res = $this->user_model->check_otp_update_pwd($data->email, $data->otp, $newpassword);
        if (!$res) {
            $response = array("code" => 0, "status" => false, "message" => "OTP invalid or expired!");
        } else {
            $response = array("code" => 1, "status" => true, "message" => "Password reset successfully.");
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //-------------------------------Search space-----------------------------------

    public function search_parking_space() {
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $limit = 4;  // to change limit
        if (isset($data->page) && $data->page > 1) {
            $offset = ($data->page - 1) * $limit;
        } else {
            $offset = 0;
        }

        //$this->user_model->search_parking_space("22.7198649", "75.8829528", "2017-5-19", "2017-5-27");
        $res = $this->user_model->search_parking_space($data->latitude, $data->longitude, $data->fromdatetime, $data->todatetime, $offset, $limit);
        if (!empty($res)) {
            
            foreach($res as $resobj){
                $resobj->estimate_time = $this->get_driving_distance($data->latitude, $data->longitude, $resobj->rent_space_latitude, $resobj->rent_space_longitude);
            }
            
            $response = array("code" => 1, "status" => true, "list" => $res);
        } else {
            $response = array("code" => 0, "status" => false, "message" => "No space found.");
        }

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    
    //---------------------------GetDrivingDistance-------------------------------------
    
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
    
    //-----------------------Add vehicle----------------------------
    
    function add_user_vehicle(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $vehicle_data['vehicle_number'] = $data->vehicle_number;
        $vehicle_data['user_id'] = $data->user_id;
        
        $res = $this->user_model->add_user_vehicle($vehicle_data);
        if($res){
            $response = array("code" => 1, "status" => true, "message" => "Vehicle added.");
        } else {
            $response = array("code" => 0, "status" => false, "message" => "Please try again.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    //-----------------------Add vehicle----------------------------
    
    function get_user_vehicle(){
        $data = json_decode(file_get_contents("php://input"));

        if ($data->token !== APPLICATIONTOKEN) {
            return;
        }

        $response = array();

        $res = $this->user_model->get_user_vehicle($data->user_id);
        if(!empty($res)){
            $response = array("code" => 1, "status" => true, "list" => $res);
        } else {
            $response = array("code" => 0, "status" => false, "message" => "No vehicle found.");
        }
        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($response);
    }

    
    /*Change user profile pic*/
    public function change_profilepic(){
        $this->common->validformdata_parameter();
        
        $user_id = trim($_POST["user_id"]);
        
        $config['file_name'] = "";
        if(!empty($_FILES["profile_pic"]["name"])){
            
            //print_r($_FILES["profile_pic"]);die('jjjjjjjjj');
            
            $config['upload_path'] = 'uploads/profile_pic';
            $config['allowed_types'] = 'jpeg|jpg|png|octet-stream';
            //$config['allowed_types'] = '*';
            //$config['max_size'] = '5120';
            //$config['max_width'] = '1025'; 
            //$config['max_height'] = '1025';
            $config['overwrite'] = TRUE;
            //$config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["profile_pic"]["name"]);
            
            $filename = $_FILES['profile_pic']['name'];
                    
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $config['file_name'] = time().'_profile.'.$ext;
            
            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('profile_pic'))
            {
                $response['status'] = 0;
                $response['response'] = strip_tags($this->upload->display_errors());
                echo json_encode($response);
                die;
            }
        }
        
        $get_userdata = $this->user_model->getUserDetailsUsingId($user_id);
        //print_r($get_userdata);die('ss');
        //$profile_pic = $get_userdata->profile_pic;
        if(!empty($get_userdata->profile_pic) && file_exists('uploads/profile_pic/'.$get_userdata->profile_pic)){
            unlink('uploads/profile_pic/'.$get_userdata->profile_pic);
        }
        
        $update_data = array(
            'profile_pic' => $config['file_name']
        );
        
        //$this->common_model->updateUser($user_id,$update_data); //Update Profile Pic
        $this->user_model->update_user($user_id, array("profile_pic" => $config['file_name']));
        
        $response['status'] = 1;
        $response['response'] = $config['file_name'];
        echo json_encode($response);
        die;
        
    }
    
    /*Add user contact number.*/
    public function add_contact(){
        $data = $this->common->validrawdata_parameter();
        
        $user_id = trim($data["user_id"]);
        $contact_no = trim($data["contact_no"]);
        
        $check_contact_no_existance = $this->user_model->getUserDetailsUsingId($user_id,$contact_no);
        if(!empty($check_contact_no_existance)){
            $response['status'] = 0;
            $response['response'] = 'This contact number already in use.';
            echo json_encode($response);
            die;
        }
        
        $update_data = array('contact_no'=>$contact_no);
        $this->user_model->update_user($user_id, $update_data);
        
        $response['status'] = 1;
        $response['response'] = 'Contact added successfully.';
        echo json_encode($response);
        die;
    }
    
    
}
