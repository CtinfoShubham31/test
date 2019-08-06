<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));  // load library classes
        $this->load->helper(array('form', 'url', 'file'));		
        $this->load->model(array('admin_model'));
        //$this->output->nocache();
        $this->data['basepath'] = $this->config->item('base_url'); //assigning base path
    }
    
    
    public function index() {
        if($this->session->userdata('germ_admin_id')){
            redirect($this->config->item('base_url') . 'germ_admin/listening/listening_lists');
        }
        else{
            $this->load->view('germ_admin/login'); //Load the admin login page
        }
    }
    
    
    // Admin Login
    public function login() {
        if ($_POST) //checks whether the form has been submited
        { 
            $this->form_validation->set_rules('ademail_id','email','required|valid_email|trim');
            $this->form_validation->set_rules('adpassword','password','trim|required|callback_admin_login_check');
            $this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
            if ($this->form_validation->run() == FALSE){  //Checks whether the form is properly validate
                $this->load->view('germ_admin/login', $this->data); //If validation fails load the login form again
            }
            else
            {
                redirect($this->config->item('base_url') . 'germ_admin/listening/listening_lists');
            }
        } 
        else
        {
            redirect($this->config->item('base_url') . 'germ_admin/admin'); //redirect to admin login page						
        }
    }
    
    
    // Check The Admin Login
    public function admin_login_check($password) {
        $username = $this->input->post('ademail_id');
        $result = $this->admin_model->checkAdminLogin($username, $password);
        if($result)
        {
            $data = array(
                'germ_admin_id' => $result->admin_id,
            );
            $this->session->set_userdata($data);
            return true;
        }
        else
        {
            $this->form_validation->set_message('admin_login_check', 'Invalid username or password');
            return false;
        }
    }
    
    //Logout From The Admin Panel
    public function logout() {
        $this->session->sess_destroy(); //destroy session
        $this->session->unset_userdata('germ_admin_id');
        redirect($this->config->item('base_url') . 'germ_admin/admin'); //redirect to admin login page
    }
    
    
    
}