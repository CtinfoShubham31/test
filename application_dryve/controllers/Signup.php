<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper(array('form', 'mail'));
            $this->load->model(array('web_models/user_model'));
        }
        
        //----------------Index page-------------------------
        
        public function index(){
            
            if($this->session->userdata('DWAYS_USER_ID')){
                redirect('/login');
                return;
            }
            
            if($this->input->post()){
                $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[45]|trim');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[45]|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email|is_unique[dw_users.email]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]|trim');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
                
                $this->form_validation->set_message('is_unique', '{field} already exists.');
                $this->form_validation->set_message('matches', 'Password do not match.');
                
                if ($this->form_validation->run() !== FALSE) {
                       
                        $data = array(
                            "first_name" => ucwords($this->input->post('first_name')),
                            "last_name" => ucwords($this->input->post('last_name')),
                            "email" => strtolower($this->input->post('email')),
                            "password" => MD5($this->input->post('password')),
                            "verify_token" => hash('sha256', microtime() . "&#3Gq"),
                            "verify_status" => 0
                        );
                        
                        $res = $this->user_model->user_signup($data);
                        if(!empty($res)){
                            $verify_url = base_url() . "user/verify/" . base64_encode($res->email) . '/' . $res->verify_token;
                            user_verify_account_mail($res->email, "Verify your account | Dryveways", $res->first_name . " " . $res->last_name, $verify_url);
                
                            $this->session->set_flashdata('signup_success', 1);
                            redirect('/signup');
                            return;
                        }
                    }
                }
                
                if($this->session->flashdata('signup_success')){
                    $this->load->view('home/signup-message');
                    return;
                }
                
            $this->load->view("home/signup");
        }
        
        //----------------------Check email---------------------------
        
        public function checkemail(){
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email|is_unique[dw_users.email]');
            if ($this->form_validation->run() !== FALSE) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
        
        
}