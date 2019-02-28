<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_user extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form','common'));
        //$this->output->nocache();
        if(!isAdminLogin()) { 
            redirect('ks_admin/admin_home/logout');
        }
       
    }
    
    /*-----Load all user------*/
    public function user_lists() { //die('EEE');
        //echo '<pre>'; print_r($this->session->all_userdata());
        $this->layout->css('admin_design/css/dataTables.min.css');
        $this->layout->js('admin_design/js/jquery.dataTables.min.js');
        $this->layout->view('admin_user/user_lists');
    }
    
    public function ajax_userlists(){
        $this->load->model('admin_user_model');
        $user_records =  $this->admin_user_model->getUsers();
        $supu = $this->input->post('supu');
        //print_r($_POST);die;
        if(!empty($user_records)){
            $total_count =  count($user_records);
        }else{
            $total_count =  0;
        }
        $this->admin_user_model->getUserListsResponse($total_count,$supu);
    }
    
    public function remove_superuser(){
        $this->load->model('admin_user_model');
        if($this->input->post('user_id')){
            $user_id = $this->input->post('user_id');
            $company_id = $this->session->userdata('ks_company_id');
            
            $update_data = array('is_super_user'=>0);
            $user_records =  $this->admin_user_model->updateUserData($user_id,$company_id,$update_data);
            if($user_records){
                echo 'true';
            }else{
                echo 'false';
            }
        }
    }
    
    public function add_superuser(){
        $this->load->model('admin_user_model');
        if($this->input->post('user_id')){
            $user_id = $this->input->post('user_id');
            $company_id = $this->session->userdata('ks_company_id');
            
            $update_data = array('is_super_user'=>1);
            $user_records =  $this->admin_user_model->updateUserData($user_id,$company_id,$update_data);
            if($user_records){
                echo 'true';
            }else{
                echo 'false';
            }
        }
    }
    
    public function add_user(){
        $company_id = $this->session->userdata('ks_company_id');
        if($this->input->post()){
            $this->form_validation->set_rules('first_name','First Name','required|max_length[20]|trim');
            $this->form_validation->set_rules('last_name','Last Name', 'required|max_length[20]|trim');
            $this->form_validation->set_rules('email','Email', 'required|valid_email|trim|callback_validate_email');
            $this->form_validation->set_rules('password','Password', 'required|min_length[6]|trim');
            $this->form_validation->set_rules('cpassword', 'Confirm Password','required|matches[password]|trim');
            
            if ($this->form_validation->run() == FALSE) {
                $this->layout->view('admin_user/add_user');
            }
            else{
                $this->load->model('admin_user_model');
                
                $email = trim($this->input->post('email'));
                $first_name = trim(ucwords($this->input->post('first_name')));
                $last_name= trim(ucwords($this->input->post('last_name')));
                
                $register_data = array(
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "email" => $email,
                    "password" => md5(trim($this->input->post('password'))),
                    'created_date' => date("Y-m-d H:i:s"),
                    'login_status'=>1,
                    'company_id'=>$company_id
                );
                
                $user_id = $this->admin_user_model->registerUser($register_data);
                    
                if(!empty($user_id)){
                    redirect('ks_admin/admin_user/user_lists');
                }
                
            }
        }else{
            $this->layout->view('admin_user/add_user');
        }
    }
    
    public function validate_email($str) 
    {
        $this->load->model('admin_user_model');
        
        $check_email = $this->admin_user_model->checkEmailExistance($str);
        if(!empty($check_email)){
            $this->form_validation->set_message("validate_email", 'This email already in use.');
            return FALSE; 
        }
        else{
            return TRUE;
        }
        
    }
    
    public function disable_user(){
        $user_id = $this->input->post('user_id');
        $company_id = $this->session->userdata('ks_company_id');
        
        if($user_id){
            $this->load->model('admin_user_model');
            $update_data = array('login_status'=>0);
            $up = $this->admin_user_model->updateUserData($user_id,$company_id,$update_data);
            
            if($up){
                echo 'true';
            }else{
                echo 'false';
            }
            
        }
    }
    
}