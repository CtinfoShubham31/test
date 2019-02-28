<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        //$this->load->model(array('common_model'));
        //$this->output->nocache();
       
    }
    
    public function index()
    {
        if($this->session->userdata('ks_admin_id')){
            redirect($this->config->base_url('ks_admin/admin_user/user_lists'), 'refresh');
        }
        else{
            $this->load->view('admin_home/admin_login');
        }
    }
    
    
    public function isValidEmail($email){ 
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public function login(){
        $errors = array();
        $data = array();
        
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if (empty($email)){
            $errors['email'] = 'Email is required.';
        }else if(!empty($email)){
            $email_format = $this->isValidEmail($email);
            if(!$email_format){
                $errors['email'] = 'Please enter valid email address.';
            }
        }
        
        if (empty($password)){
            $errors['password'] = 'Password is required.';
        }
        
        if (!empty($errors)) {
            $data['errors']  = $errors;
            echo json_encode($data);
        } else {
            $data['errors']  = '';
            $this->load->model('admin_model');
            //checkAdminData($email,$password,$company_id)
            $comp_id = 1; //$_POST['company_id'] by dropdown
            $admin_data = $this->admin_model->checkAdminData($email,md5($password),$comp_id);
            if(!empty($admin_data)){
                $session_data = array(
                    'ks_admin_id' => $admin_data->admin_id,
                    'ks_company_id' => 1
                );
                $this->session->set_userdata($session_data);
                $data['success'] = 'TRUE';
            }else{
                $errors['password'] = 'Invalid email id or password.';
                $data['errors']  = $errors;
            }
            echo json_encode($data);
        } 
        
    }
    
    
    public function logout(){
        $this->session->sess_destroy();
        redirect($this->config->item('base_url').'ks_admin/admin_home');
    }
    
    
}    