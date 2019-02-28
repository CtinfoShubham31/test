<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->model(array('common_model'));
        $this->output->nocache();
    }
    
    public function index()
    {
        if($this->session->userdata('pos_adminid')){
            
            redirect($this->config->base_url('company/companypage/add_company'), 'refresh');
        }
        else{
            $this->load->view('home/homepage');
        }
    }

    public function isValidEmail($email){ 
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function sendmail_withotp(){
        $errors = array();
        $data = array();
        
        $email = trim($_POST['email']);
        
        if (empty($email)){
            $errors['email'] = 'Email is required.';
        }else if(!empty($email)){
            $email_format = $this->isValidEmail($email);
            if(isset($_POST['registration_email'])) {       
                $email_existance = $this->common_model->checkEmailExistance($email);
                if(!empty($email_existance)){
                    $errors['email'] = 'This email already registered.';
                }
            }
            if(!$email_format){
                $errors['email'] = 'Please enter valid email address.';
            }
        }
        
        
        if (!empty($errors)) {
            $data['errors']  = $errors;
            echo json_encode($data);
        } else { 
            $data['errors']  = '';
            
            $this->load->model('company_model');
            
            $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string_shuffled = str_shuffle($string);
            $otp = substr($string_shuffled, 1, 7);

            $email_data = array("email" => $email,"otp"=>$otp); 

//            $ch1 = curl_init();
//            $headers = array(
//                'Accept: application/json',
//                'Content-Type: application/json',
//            );
//            $url = "http://creativethoughtsinfo.com/ct100/email.php";
//            curl_setopt($ch1, CURLOPT_URL,  $url);
//            curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($ch1, CURLOPT_HEADER, 0);
//            $body = json_encode($email_data);
//
//            curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET"); 
//            curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
//            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
//
//            $result_push = curl_exec($ch1);  
//            curl_close ($ch1);
            
            //$toemail = $data['email'];
            $to      = $email_data['email'];
            $subject = 'Email confirmation with otp';
            $message = 'Your otp: '.$email_data['otp'];
            $headers = 'From: info@creativethoughtsinfo.com' . "\r\n" .
                'Reply-To: info@creativethoughtsinfo.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

//            if(mail($to, $subject, $message, $headers)){
//            echo 'Yahoo';
//            }else{
//            echo 'opps';
//            }
            //mail($to, $subject, $message, $headers);
            
            $email_existance = $this->common_model->checkEmailExistance($email);
            if(!empty($email_existance)){
                $update_data = array(
                    'otp'=>$otp
                );
                $this->company_model->updateOtp($update_data,$email);
                
            }else{
                $add_data = array(
                    'email'=>$email,
                    'otp'=>$otp
                );
                $this->company_model->addAdmin($add_data);
            }
            
            //$data['success'] = 'You are registered successfully. Please check email to activate your account.';
            $data['success'] = $email;
            echo json_encode($data);
            die();
        }
        
         

    }
    
    
    public function login(){
        $errors = array();
        $data = array();
        
        $email = trim($_POST['set_email']);
        $otpcode = trim($_POST['otpcode']);
        
        if (empty($email)){
            $errors['email'] = 'Email is required.';
        }else if(!empty($email)){
            $email_format = $this->isValidEmail($email);
            if(!$email_format){
                $errors['email'] = 'Please enter valid email address.';
            }
        }
        
        if (empty($otpcode)){
            $errors['otp'] = 'Otp is required.';
        }else if(!empty($otpcode)){
            $otp_exists = $this->common_model->getAdminData($email,$otpcode);
            if(empty($otp_exists)){
                $errors['otp'] = 'Wrong Otp.';
            }
        }
        
        if (!empty($errors)) {
            $data['errors']  = $errors;
            echo json_encode($data);
        } else { 
            
            $data['errors']  = '';
            $otp_exists = $this->common_model->getAdminData($email,$otpcode);
            
            $get_companydata = $this->common_model->getCompany('',$otp_exists->admin_id); 
            if(!empty($get_companydata->company_id)){
                $session_data = array(
                    'pos_companyid' => $get_companydata->company_id,
                    'pos_adminid' => $otp_exists->admin_id,
                );
            }else{
            
                $session_data = array(
                    'pos_adminid' => $otp_exists->admin_id,
                );
            }
            $this->session->set_userdata($session_data);
            if($this->session->userdata('pos_companyid')){
                $data['comp_success'] = 'success';
            }else{
                $data['success'] = 'success';
            }
            
            
            echo json_encode($data);
        }
    }
    
    
    
    public function logout(){
        $this->session->sess_destroy();
        redirect($this->config->item('base_url'));
    }
    
    
    public function resendmail_withotp(){
        $errors = array();
        $data = array();
        
        $email = trim($_POST['email']);
        
        if (empty($email)){
            $errors['email'] = 'False';
        }else if(!empty($email)){
            $email_format = $this->isValidEmail($email);
            if(isset($_POST['email'])) {       
                $email_existance = $this->common_model->checkEmailExistance($email);
                if(empty($email_existance)){
                    $errors['email'] = 'False';
                }
            }
            if(!$email_format){
                $errors['email'] = 'False';
            }
        }
        
        
        if (!empty($errors)) {
            $data['errors']  = $errors;
            echo json_encode($data);
        } else { 
            $data['errors']  = '';
            
            $this->load->model('company_model');
            
            $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string_shuffled = str_shuffle($string);
            $otp = substr($string_shuffled, 1, 7);

            $email_data = array("email" => $email,"otp"=>$otp); 

            $ch1 = curl_init();
            $headers = array(
                'Accept: application/json',
                'Content-Type: application/json',
            );
            $url = "http://creativethoughtsinfo.com/ct100/email.php";
            curl_setopt($ch1, CURLOPT_URL,  $url);
            curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch1, CURLOPT_HEADER, 0);
            $body = json_encode($email_data);

            curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET"); 
            curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

            $result_push = curl_exec($ch1);  
            curl_close ($ch1);
            
            $email_existance = $this->common_model->checkEmailExistance($email);
            if(!empty($email_existance)){
                $update_data = array(
                    'otp'=>$otp
                );
                $this->company_model->updateOtp($update_data,$email);
                
            }else{
                $add_data = array(
                    'email'=>$email,
                    'otp'=>$otp
                );
                $this->company_model->addAdmin($add_data);
            }
            
            //$data['success'] = 'You are registered successfully. Please check email to activate your account.';
            $data['success'] = $email;
            echo json_encode($data);
        }
        
         

    }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */