<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper(array('form'));
            $this->load->model(array('web_models/user_model'));
        }
        
        //----------------Index page-------------------------
        
        public function index(){
            
            if($this->session->userdata('DWAYS_USER_ID')){
                redirect('user/dashboard');
                return;
            }
            
            $viewdata = array();
                    
            if($this->input->post()){
                $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]|trim');
                
                if ($this->form_validation->run() !== FALSE) {
                        $data = array(
                            "email" => strtolower($this->input->post('email')),
                            "password" => MD5($this->input->post('password'))
                        );
                        
                        $res = $this->user_model->check_user_login($data);
                        if(!empty($res)){
                            
                            if($res->verify_status==1){
                                $this->session->set_userdata('DWAYS_USER_ID', $res->user_id);
                                $this->session->set_userdata('DWAYS_USER_FNAME', $res->first_name);
                                $this->session->set_userdata('DWAYS_USER_LNAME', $res->last_name);
                                $this->session->set_userdata('DWAYS_USER_EMAIL', $res->email);

                                redirect('user/dashboard');
                                return;
                            } else {
                                $viewdata['login_error'] = 2;
                            }
                            
                        } else {
                            $viewdata['login_error'] = 1;
                        }
                    }
                }
                
            
            $this->load->view("home/login", $viewdata);
        }
        
        
        
        
}