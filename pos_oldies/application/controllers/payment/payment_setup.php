<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_setup extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','checklogin'));
        $this->output->nocache();
        if(isCompanySetupLogin() == 1) { 
            redirect($this->config->base_url().'home/homepage/logout');
        }
        elseif (isCompanySetupLogin() == 2) {
            redirect($this->config->base_url().'company/companypage/add_company');
        }
        
    }
    
    
    public function manage_payment(){
        $this->layout->title('Payment Method');  /*----Tab Title------*/
        
        $this->load->model('payment_model');
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->layout->view('payment/manage_payment');
    }
    
    
    public function mswipe_popup(){
        $this->load->model(array('payment_model','common_model'));
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $company_existance = $this->common_model->getCompany($company_id);
        //print_r($company_existance);
        if(!empty($company_existance)){
           
            $data['get_credential'] = $this->payment_model->getPaymentCredential($company_id,1);
            //print_r($data['get_credential']);die;
            $this->load->view('payment/mswipe_popup',$data);
        }else{
            echo 'False';
        }
    }
    
    public function manage_mswipe(){
        $errors = array();
        $data = array();
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $mswipe_id = trim($_POST['mswipe_id']);
        $mswipe_pass = trim($_POST['mswipe_pass']);
        
        if (empty($mswipe_id)){
            $errors['mswipeid'] = 'Mswipe id is required.';
        }else if(empty($mswipe_pass)){
            $errors['mswipepass'] = 'Mswipe password is required.';
        }
        
        if (!empty($errors)) {
            $data['errors']  = $errors;
            echo json_encode($data);
        } else { 
            
            $data['errors']  = '';
            
            $this->load->model(array('payment_model','common_model'));
            
            $get_credential = $this->payment_model->getPaymentCredential($company_id,1);
            
            $mswipe_data = array(
                'company_id'=> $company_id,
                'payment_method_type'=>1,
                'key_id'=> base64_encode($mswipe_id),
                'key_pass'=>base64_encode($mswipe_pass)
            );
            
            if(!empty($get_credential)){
                $credential_id = $get_credential->credential_id;
                $this->payment_model->updatePaymentCredential($mswipe_data,$credential_id,$company_id);
                $data['update_success'] = 'success';
                
            }else{
                $this->payment_model->addPaymentCredential($mswipe_data);
                $data['add_success'] = 'success';
            }
            
            //$this->session->set_userdata($session_data);
//            if($this->session->userdata('pos_companyid')){
//                $data['comp_success'] = 'success';
//            }else{
//                $data['success'] = 'success';
//            }
            
            
            echo json_encode($data);
        }
    }
    
    
    public function razorpay_popup(){
        $this->load->model(array('payment_model','common_model'));
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $company_existance = $this->common_model->getCompany($company_id);
        //print_r($company_existance);
        if(!empty($company_existance)){
           
            $data['get_credential'] = $this->payment_model->getPaymentCredential($company_id,2);
            //print_r($data['get_credential']);die;
            $this->load->view('payment/razorpay_popup',$data);
        }else{
            echo 'False';
        }
    }
    
    
    public function manage_razorpay(){
        $errors = array();
        $data = array();
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $razorpay_keyid = trim($_POST['razorpay_keyid']);
        $razorpay_secretkey = trim($_POST['razorpay_secretkey']);
        
        if (empty($razorpay_keyid)){
            $errors['rzkeyid'] = 'Razorpay key id is required.';
        }else if(empty($razorpay_secretkey)){
            $errors['rzsecret_key'] = 'Razorpay secret key is required.';
        }
        
        if (!empty($errors)) {
            $data['errors']  = $errors;
            echo json_encode($data);
        } else { 
            
            $data['errors']  = '';
            
            $this->load->model(array('payment_model','common_model'));
            
            $get_credential = $this->payment_model->getPaymentCredential($company_id,2);
            
            $razorpay_data = array(
                'company_id'=> $company_id,
                'payment_method_type'=>2,
                'key_id'=> base64_encode($razorpay_keyid),
                'key_pass'=>base64_encode($razorpay_secretkey)
            );
            //////sssssssssssss//////////////
            if(!empty($get_credential)){
                $credential_id = $get_credential->credential_id;
                $this->payment_model->updatePaymentCredential($razorpay_data,$credential_id,$company_id);
                $data['update_success'] = 'success';
                
            }else{
                $this->payment_model->addPaymentCredential($razorpay_data);
                $data['add_success'] = 'success';
            }
            
            
            echo json_encode($data);
        }
    }
    
    
}    