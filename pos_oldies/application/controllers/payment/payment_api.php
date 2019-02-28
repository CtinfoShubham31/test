<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: application/json');
class Payment_api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->library('form_validation');
        //$this->load->helper(array('form'));
        $this->config->load('rest');
        //$this->load->model(array('common_model','user_model'));
        
    }
    
    
    public function getpayment_details(){
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
        
        $company_id = $data["company_id"];
        $payment_method_type = $data["payment_method_type"];
        
        $this->load->model('payment_model');
        
        if(!empty($payment_method_type)){
            $get_payment_data = $this->payment_model->getPaymentCredential($company_id,$payment_method_type);
        }else{
            $get_payment_data = $this->payment_model->getAllPaymentCredential($company_id);
        }
        
        if(!empty($get_payment_data)){
            $response['status'] = 1;
            $response['response'] = $get_payment_data;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
        
    }
    
    
//    public function addpayment_response(){
//        $data = json_decode(file_get_contents('php://input'), true);
//        $response = array("status" => array(),"response" => array());
//        if(!isset($data) || count($data) == 0) {
//            $response['status'] = 0;
//            $response['response'] = 'Invalid request';
//            echo json_encode($response);
//            die;
//        }
//        
//        if(empty($data['authkey']) || $data['authkey'] != $this->config->item('authkey')){
//            $response['status'] = 0;
//            $response['response'] = 'Not Authorized';
//            echo json_encode($response);
//            die;
//        }
//        
//        $company_id = $data["company_id"];
//        $sales_order_id = $data["sales_order_id"];
//        $payment_method_id = $data["payment_method_id"];
//        
//        $is_payment_split = $data['is_payment_split'];
//        $json_data = json_encode($data['json_data']);
//        
//        $this->load->model('payment_model');
//        
//        if($is_payment_split == 1){
//        
//            $add_response = array(
//                'split_payment_response'=>$json_data
//            );
//            
//            $this->payment_model->putJsonInSplitSalesOrder($company_id,$sales_order_id,$payment_method_id,$add_response);
//        
//        }else{
//            $add_response = array(
//                'payment_response'=>$json_data
//            );
//            $this->payment_model->putJsonInSalesOrder($company_id,$sales_order_id,$payment_method_id,$add_response);
//        }
//        
//        $response['status'] = 1;
//        $response['response'] = $json_data;
//        echo json_encode($response);
//        die;
//        
//        
//    }
    
    
    public function  razorpay_invoice(){
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
        
        $company_id = $data["company_id"];
        $json_data = json_encode($data["json_data"]);
        
        $this->load->model(array('common_model','payment_model'));
        
        $company_existance = $this->common_model->getCompany($company_id);
        //print_r($company_existance);
        if(!empty($company_existance) && !empty($data["json_data"])){
            
            
            $razorpay_details = $this->payment_model->getPaymentCredential($company_id,2);
            
            if(!empty($razorpay_details)){
            
//                $razorpay_keyid = base64_decode($razorpay_details->razorpay_keyid);
//                $razorpay_secretkey = base64_decode($razorpay_details->razorpay_secretkey);
                $razorpay_keyid = base64_decode($razorpay_details->key_id);
                $razorpay_secretkey = base64_decode($razorpay_details->key_pass);
            
            }else{
                $response['status'] = 0;
                $response['response'] = 'Not authirized to proceed.';
                echo json_encode($response);
                die;
            }
            
            //$url = 'https://rzp_test_U6aiBEAfWyjq4p:l3h8Olxu8JH2xBRcGDNXVimU@api.razorpay.com/v1/invoices';
            $url = 'https://'.$razorpay_keyid.':'.$razorpay_secretkey.'@api.razorpay.com/v1/invoices';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result  = curl_exec($ch);
            curl_close($ch);
            //print_r($response);
            // Will dump a beauty json :3
            //echo json_decode($result, true);
            
            $jdata = json_decode($result, true);
            
            if(!empty($jdata['id'])){
                $id = $jdata['id'];
                $array = array('invoice'=>$id);
                $response['status'] = 1;
                $response['response'] = $array;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['response'] = 'Invoice not able to get.';
                echo json_encode($response);
                die;
            }
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Some parameter is missing.';
            echo json_encode($response);
            die;
        }
        
    }
    
    /*Get total amount of different payment methods using date parameter*/
    public function getamount_ofpayment(){
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
        
        $company_id = $data["company_id"];
        
        $today_date = date('Y-m-d');
        //$today_date = '2017-03-31';
        
        $this->load->model(array('dashboard_model','payment_model'));
        
        $payment_methods = $this->dashboard_model->getPaymentMethodAmounts($company_id,$today_date);
        
        if(!empty($payment_methods)){
            $pmid = array();
            $pmsum = array();
            foreach($payment_methods as $key => $paym){
                $pmid[] = $paym->payment_method_id;
                $pmsum[$paym->payment_method_id] = $paym->sum_amount;
            }
            $pmid = $pmid;
            $pmsum = $pmsum;
        }
        
        if(!empty($pmid) && in_array(1, $pmid)){ 
            $cash = $pmsum[1]; 
        }
        else{ 
            $cash = 0; 
        }  
        if(!empty($pmid) && in_array(2, $pmid)){ 
            $mswipe = $pmsum[2]; 
        }else{ 
            $mswipe = 0; 
        } 
        if(!empty($pmid) && in_array(3, $pmid)){ 
            $razorpay = $pmsum[3]; 
        }
        else{ 
            $razorpay = 0; 
        } 
        
        $payment_amounts = array('cash'=>$cash);
        
        $mswipe_existance = $this->payment_model->getPaymentCredential($company_id,1); 
        if(!empty($mswipe_existance)){
            $payment_amounts['mswipe'] = $mswipe;
        }
        
        $razorpay_existance = $this->payment_model->getPaymentCredential($company_id,2); 
        if(!empty($razorpay_existance)){
            $payment_amounts['razorpay'] = $razorpay;
        }
        
        
        $response['status'] = 1;
        $response['response'] = $payment_amounts;
        echo json_encode($response);
        die;
        
        
        
    }
    
    
    
}    