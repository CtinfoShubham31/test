<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->library('form_validation');
        //$this->load->helper(array('form'));
        $this->config->load('rest');
        //$this->load->model(array('common_model','user_model'));
    }
    
    /*Get all inventory categories companywise*/
    public function add_customer(){
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
        $cust_name = $data["cust_name"];
        $cust_email = $data["cust_email"];
        $phone_no = $data["phone_no"];
        $comment = $data["comment"];
        
        $this->load->model('customer_model');
        
        $customer_data = array(
            'company_id'=>$company_id,
            'cust_name'=>$cust_name,
            'cust_email'=>$cust_email,
            'phone_no'=>$phone_no,
            'comment'=>$comment,
            'added_date'=>date("Y-m-d H:i:s")
        );
        
        
//        if(!empty($cust_email)){
//            $customer_email_check = $this->customer_model->getUniqueCustomer($company_id,$cust_email);
//            if(!empty($customer_email_check) ){
//                $error = array('error'=>'This email id customer already exists.');
//
//                $response['status'] = 0;
//                $response['response'] = $error;
//                echo json_encode($response);
//                die;
//            }
//        }
        
        if(!empty($phone_no)){
            $customer_contactno_check = $this->customer_model->checkCutomerContactExistance($company_id,$phone_no);
            if(!empty($customer_contactno_check) ){
                
                
                //$customer_details = $this->customer_model->getSingleCustomerData($company_id,$cutomer_id);
                
                //$error = array('error'=>'This customer contact no already exists.');
                $result_array = array('error'=>'This customer contact no already exists.','customer_details'=>$customer_contactno_check);
                $response['status'] = 0;
                $response['response'] = $result_array;
                echo json_encode($response);
                die;
            }
        }
        
        $customer_id = $this->customer_model->addCustomer($customer_data);
        
        $customer_details = $this->customer_model->getSingleCustomerData($company_id,$customer_id);
        
        //$cust_array = array('customer_id'=>$customer_id);
        
        if(!empty($customer_details)){
            $response['status'] = 1;
            $response['response'] = $customer_details;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    
    public function customer_lists(){
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
        
        $this->load->model('customer_model');
        
        $customer_data = $this->customer_model->getCustomerLists($company_id);
        
        if(!empty($customer_data)){
            $response['status'] = 1;
            $response['response'] = $customer_data;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    
    
}