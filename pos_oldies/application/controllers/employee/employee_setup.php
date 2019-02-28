<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee_setup extends MY_Controller {
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
    
    public function manage_employee(){
        $this->layout->title('Employee');  /*----Tab Title------*/
        
        $this->layout->css('css/droparea.css');
        
        $this->layout->js('js/droparea.js');
        //$this->layout->js('js/custom/company.js');
        $this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/custom/employee.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('company_model','permission_model','employee_model'));
        
        $data['id_employee'] = $this->input->post('id_employee');
        
        $get_emp_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($data['id_employee'],$company_id);
        
        $data['location_lists'] = $this->company_model->getLocationUsingCompanyId($company_id);
        
        $data['permission_lists'] = $this->permission_model->getPermissionUsingCompanyId($company_id);
        
        $data['employee_lists'] = $this->employee_model->getEmployeeUsingCompanyId($company_id);
        
        $data['employee_allrecords'] = $this->employee_model->getEmployeeDetailsRecords($company_id);
        
        if($this->input->post()){
            $this->form_validation->set_rules('employee_name','Employee name','required|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('emp_contact','Contact number','required|min_length[10]|max_length[10]|xss_clean|trim|callback_numeric_wcomma');
            if(!empty($_POST['emp_email'])){
                $this->form_validation->set_rules('emp_email','Email','valid_email|xss_clean|trim|callback_email_existance');
            }
            $this->form_validation->set_rules('permission','Permission', 'required|trim');
            $this->form_validation->set_rules('emp_password','Employee password','required|min_length[4]|max_length[4]|xss_clean|trim');
            $this->form_validation->set_rules('emp_address','Employee address', 'required|trim');
            $this->form_validation->set_rules('location_id','Location','required|trim');
            $this->form_validation->set_rules('employee_under','Under','xss_clean|trim');

            
            if($this->form_validation->run() == FALSE){
                $this->layout->view('employee/manage_employee',$data);
            }
            else{ 
                
                $file_name = (!empty($get_emp_data->emp_pic))?$get_emp_data->emp_pic:'';
                if($_FILES['image']['size']!=0){
                    $config['upload_path'] = './upload/employee_pics/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '1025'; 
                    $config['max_width'] = '1025'; 
                    $config['max_height'] = '1025';
                    $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["image"]["name"]);

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image'))
                    {
                        $data['error_image'] = $this->upload->display_errors();
                        $this->layout->view('employee/manage_employee',$data);
                        return FALSE;
                    }
                    else
                    {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                        $file_name = $config['file_name'];
                    }
                }
                
                //$email_address = (!empty(trim($data['id_employee']))?$getemail->email:'';
                
                $employee_data = array(
                    'company_id'=>$company_id,
                    'employee_name'=>trim($this->input->post('employee_name')),
                    'emp_contact'=>trim($this->input->post('emp_contact')),
                    'emp_email'=>trim($this->input->post('emp_email')),
                    'permission'=>trim($this->input->post('permission')),
                    'emp_password'=>trim($this->input->post('emp_password')),
                    'emp_address'=>trim($this->input->post('emp_address')),
                    'location_id'=>trim($this->input->post('location_id')),
                    'employee_under'=>trim($this->input->post('employee_under')),
                    'emp_pic'=>$file_name,
                    
                );
                
                
                $emp_record = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($this->input->post('id_employee'),$company_id);
                
                if(!empty($data['id_employee']) && !empty($emp_record)){
                    $this->session->set_flashdata('success_msg', 'Employee updated successfully.');
                    $this->employee_model->updateEmployee($employee_data,$this->input->post('id_employee'),$company_id);
                    
                    
                    /****Giddh integration update employee****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $post_data = array(
                            "name" => trim($this->input->post('employee_name')),
                            "email" =>trim($this->input->post('emp_email')),
                            "mobileNo"=>trim($this->input->post('emp_contact')),
                            "uniqueName" =>trim($this->input->post('emp_contact'))
                        ); 
                        //print_r($post_data);

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();

                        $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/groups/employees/accounts/".trim($this->input->post('emp_contact'));
                        curl_setopt($ch1, CURLOPT_URL,  $url);
                        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch1, CURLOPT_HEADER, 0);
                        $body = json_encode($post_data);

                        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "PUT"); 
                        curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

                        $result_push = curl_exec($ch1);  
                        curl_close ($ch1);
                        
                        $jsonObj = json_decode($result_push);
                        //print_r($jsonObj);
                        $status = $jsonObj->status;
                        if($status == 'success'){
                            
                        }
                          //print_r($result_push);die('ssss');
                        
                    }
                    /*****Giddh integration update employee*******/
                    
                }
                else{
                    $this->session->set_flashdata('success_msg', 'Employee added successfully.');
                    $this->employee_model->addEmployee($employee_data);
                    
                    /****Giddh integration create employee****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $post_data = array(
                            "name" => trim($this->input->post('employee_name')),
                            "email" =>trim($this->input->post('emp_email')),
                            "mobileNo"=>trim($this->input->post('emp_contact')),
                            "uniqueName" =>trim($this->input->post('emp_contact'))
                        ); 
                        //print_r($post_data);

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();

                        $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/groups/employees/accounts";
                        curl_setopt($ch1, CURLOPT_URL,  $url);
                        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch1, CURLOPT_HEADER, 0);
                        $body = json_encode($post_data);

                        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST"); 
                        curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

                        $result_push = curl_exec($ch1);  
                        curl_close ($ch1);
                        
                        $jsonObj = json_decode($result_push);
                        //print_r($jsonObj);
                        $status = $jsonObj->status;
                        if($status == 'success'){
                            
                        }
                        //print_r($result_push);die('ssss');
                        
                    }
                    /*****Giddh integration create employee*******/
                    
                    
                }
                
                
                redirect($this->config->base_url().'employee/employee_setup/manage_employee');
            }
            
            
        }else{
            $this->layout->view('employee/manage_employee',$data);
        }
            
    }
    
    public function numeric_wcomma ($str)
    {
        if (preg_match('/[^0-9]/', $str))
        {
            $this->form_validation->set_message('numeric_wcomma', 'Please enter only digit.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
        //return preg_match('/^[0-9]+$/', $str);
    }
    
    public function email_existance($email){        //print_r($_POST);die('S');
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('employee_model'));
        $id_employee = $this->input->post('id_employee');
        
        if(!empty($id_employee)){
            $exists_email_id = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($id_employee,$company_id);
        }
        //print_r($exists_email_id);echo $email.' ---- '.$exists_email_id->emp_email; die('s');
        if($email){
            if(!empty($exists_email_id) && $exists_email_id->emp_email == $email){
                return TRUE;
            }else{
                $email_data = $this->employee_model->checkEmailExistance($email,$company_id);
                if(!empty($email_data)){
                    $this->form_validation->set_message('email_existance', 'Email address already exists.');
                    return FALSE;
                }else{
                    return TRUE;
                }
            }
        }
    }

    public function emailexist_ajax(){
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('employee_model'));
        
        $email = trim($this->input->post('emp_email'));
        $id_employee = $this->input->post('id_employee');
        $exists_email_id = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($id_employee,$company_id);
        //print_r($exists_email_id);echo $email.' ---- '.$exists_email_id->emp_email; die('s');
        if($email){
            if(!empty($exists_email_id) && $exists_email_id->emp_email == $email){
                echo 'true';
            }else{
                $email_data = $this->employee_model->checkEmailExistance($email,$company_id);
                if(!empty($email_data)){
                    $this->form_validation->set_message('email_existance', 'Email address already exists.');
                    echo 'false';
                }else{
                    echo 'true';
                }
            }
        }
        
    }


    public function edit_employee(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('employee_id') && $company_id){
            
            $this->load->model('employee_model');
            
            $errors = array();
            $data = array();
            $employee_id = trim($this->input->post('employee_id'));

            if (empty($employee_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($employee_id)){
                $employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($employee_id,$company_id);
                if(empty($employee_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['employee_data'] = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($employee_id,$company_id);  //Get single employee data
                echo json_encode($data);
            }
            
        }
    }
    
    
    public function deletepopup_employee(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('emp_id') && $company_id){
            
            $this->load->model('employee_model');
            
            $errors = array();
            $data = array();
            $emp_id = $data['emp_id'] = trim($this->input->post('emp_id'));

            if (empty($emp_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($emp_id)){
                $employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($emp_id,$company_id);
                if(empty($employee_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $this->load->view('employee/deletepopup_employee',$data);
                
            }
            
            
        }
    }
    
    
    public function delete_employee(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('employee_id') && $company_id){
            
            $this->load->model('employee_model');
            
            $errors = array();
            $data = array();
            $employee_id = $data['employee_id'] = trim($this->input->post('employee_id'));

            if (empty($employee_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($employee_id)){
                $employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($employee_id,$company_id);
                if(empty($employee_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else {
                $data['error']='';
                $data['success']='';
                $this->employee_model->deleteEmployee($employee_id,$company_id);
                $data['success']='<p> <strong>Delete employee successfully.</p> </strong>';
                echo json_encode($data);
            }
            
            
        }
    }
            
    function _do_upload() {        //print_r($_POST);die('QQQ');
        if($_FILES['image']['size'] != 0){
            $config['upload_path'] = './upload/employee_pics/'; 
            $config['allowed_types'] = 'jpg|jpeg|png'; 
            $config['max_size'] = '1024'; 
            $config['max_width'] = '1024'; 
            $config['max_height'] = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {
                $this->form_validation->set_message('_do_upload', $this->upload->display_errors());
                return FALSE;
            }
            else
            {
                $this->upload_data = $this->upload->data();
                return TRUE;
            }
        }else{
            $this->form_validation->set_message('_do_upload', "Please select file to upload.");
            return false;
	}


    } 
    
    
}