<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Homepage_api extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->config->load('rest');
        //$this->load->model(array('common_model','user_model'));
    }
    
    
    public function sendmail_withotp(){
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"response" => array());
        if(!isset($data) || count($data) == 0) {
            $response['status'] = 0;
            $response['response'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        
        if(empty($data['authkey']) || $data['authkey'] != $this->config->item('authkey')){
            $response['status'] = 0;
            $response['response'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }
        
        
        $this->load->model(array('common_model','company_model'));

        $email = $data['email'];
        $email_existance = $this->common_model->checkEmailExistance($email);
        
        if(!empty($email_existance)){
            //$admin_id = $email_existance->admin_id;
            
            //$company_details = $this->common_model->getCompanySmallInfo('',$admin_id);
            
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
            mail($to, $subject, $message, $headers);
            
            $array_data = array('otp'=>$otp);
            
            $update_data = array(
                'otp'=>$otp
            );
            $this->company_model->updateOtp($update_data,$email);   //Update otp
            
            $response['status'] = 1;
            $response['response'] = 'Otp send to your mail id successfully.';
            echo json_encode($response);
            die;
            

        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    
    public function complogin(){
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"response" => array());
        if(!isset($data) || count($data) == 0) {
            $response['status'] = 0;
            $response['response'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        
        if(empty($data['authkey']) || $data['authkey'] != $this->config->item('authkey')){
            $response['status'] = 0;
            $response['response'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }
        
        
        $this->load->model('common_model');

        $otpcode = $data['otpcode'];
        $email = $data['email'];
        
        $otp_exists = $this->common_model->getAdminData($email,$otpcode);
        
        if(!empty($otpcode) && !empty($email) && !empty($otp_exists)){
            
            $get_companydata = $this->common_model->getCompany('',$otp_exists->admin_id); 
            if(!empty($get_companydata->company_id)){
                
                $company_data = array(
                    'company_id'=>$get_companydata->company_id,
                    'company_name'=>$get_companydata->name,
                    'address'=>$get_companydata->address,
                    'company_logo'=>$get_companydata->image_logo
                );
                
                $response['status'] = 1;
                $response['response'] = $company_data;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['response'] = '';
                echo json_encode($response);
                die;
            }
            
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Wrong otp.';
            echo json_encode($response);
            die;
        }
        
    }
    
}