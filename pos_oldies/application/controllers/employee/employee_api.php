<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employee_api extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
       // $this->load->library('form_validation');
       // $this->load->helper(array('form'));
        $this->config->load('rest');
        //$this->load->model(array('common_model','user_model'));
    }
    
    public function employee_lists(){
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
        
        $company_id = $data['company_id'];
        $this->load->model('employee_model');
        
        $employee_lists = $this->employee_model->getEmployeeUsingCompanyId($company_id);
        if(!empty($employee_lists)){
            $response['status'] = 1;
            $response['response'] = $employee_lists;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    public function login(){
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
        
        $employee_id = trim($data["employee_id"]);
        $company_id = trim($data["company_id"]);
        $emp_email = trim($data["emp_email"]);
        $emp_password = trim($data["emp_password"]);
        
        $this->load->model(array('employee_model','permission_model'));
        
//        if(empty($emp_email) && empty($emp_password)){
//            $response['status'] = 0;
//            $response['response'] = 'please enter email id and password.';
//            echo json_encode($response);
//            die;
//        }else if(empty($emp_email)) {
//            $response['status'] = 0;
//            $response['response'] = 'please enter email.';
//            echo json_encode($response);
//            die;
//        }else if(empty($emp_password)){
//            $response['status'] = 0;
//            $response['response'] = 'please enter password.';
//            echo json_encode($response);
//            die;
//        }
        if(empty($emp_password)){
            $response['status'] = 0;
            $response['response'] = 'please enter password.';
            echo json_encode($response);
            die;
        }
        
        $employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($employee_id,$company_id, $emp_email, $emp_password);
        
        if(!empty($employee_data)){
            $permission_id = $employee_data->permission;
            $employee_permission = $this->permission_model->getPermissionUsingPermissionIdCompanyId($permission_id,$company_id);
            //print_r($employee_permission);die('ZZZ');
            if(!empty($employee_permission)){
                $employee_data->permission = 
                    array(
                        'emp_add'=>$employee_permission->emp_add,
                        'emp_edit'=>$employee_permission->emp_edit,
                        'emp_delete'=>$employee_permission->emp_delete,
                        'inv_add'=>$employee_permission->inv_add,
                        'inv_edit'=>$employee_permission->inv_edit,
                        'inv_delete'=>$employee_permission->inv_delete,
                    );
            }else{
                $employee_data->permission = 
                    array(
                        'emp_add'=>'',
                        'emp_edit'=>'',
                        'emp_delete'=>'',
                        'inv_add'=>'',
                        'inv_edit'=>'',
                        'inv_delete'=>'',
                    );
            }
            
            $login_date = date("Y-m-d");
            $check_employee_login_status = $this->employee_model->getCashCounterByDate($company_id,$employee_id,$login_date);
            if(!empty($check_employee_login_status)){
                $employee_data->login_status = "1"; //Already same employee logged in
            }else{
                $employee_data->login_status = "0"; 
            }
            
            $employee_data->payment_method = $this->employee_model->getPaymentMethod();
            
            $response['status'] = 1;
            $response['response'] = $employee_data;
            echo json_encode($response);
            die;
            
        }
        else{
            $response['status'] = 0;
            $response['response'] = 'Invalid email id or password.';
            echo json_encode($response);
            die;
        }
        
    }
    
    
    public function add_opening_amount(){
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
        
        $employee_id = trim($data["employee_id"]);
        $company_id = trim($data["company_id"]);
        $login_date = trim($data["login_date"]);
        $opening_amt = trim($data["opening_amt"]);
        
        $this->load->model(array('employee_model'));
        
        $check_employee_existance = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($employee_id,$company_id,'','');
        
        if(!empty($employee_id) && !empty($company_id) && !empty($check_employee_existance)){
        
            $opamt_data = array(
                'company_id'=>$company_id,
                'employee_id'=>$employee_id,
                'login_date'=>$login_date,
                'opening_amt'=>$opening_amt,
                'closing_amt'=>$opening_amt
            );

            $this->employee_model->addOpeningAmount($opamt_data);   //Add opening amount
            
            $response['status'] = 1;
            $response['response'] = 'Opening amount added successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Something went wrong.';
            echo json_encode($response);
            die;
        }
        
        
    }
    
    
    public function getcash_counter_bydate(){
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
        
        $employee_id = trim($data["employee_id"]);
        $company_id = trim($data["company_id"]);
        $login_date = trim($data["login_date"]);
        
        $this->load->model(array('employee_model'));
        
        $check_employee_existance = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($employee_id,$company_id,'','');
        
        if(!empty($employee_id) && !empty($company_id) && !empty($login_date) && !empty($check_employee_existance)){
            $cash_counter_data = $this->employee_model->getCashCounterByDate($company_id,$employee_id,$login_date);
            if(!empty($cash_counter_data)){
                $response['status'] = 1;
                $response['response'] = $cash_counter_data;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['response'] = 'No records found.';
                echo json_encode($response);
                die;
            }
        }else{
            $response['status'] = 0;
            $response['response'] = 'Something went wrong.';
            echo json_encode($response);
            die;
        }
    }
    
    
}