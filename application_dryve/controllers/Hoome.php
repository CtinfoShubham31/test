<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper(array('form'));
            //$this->load->model(array('web_models/user_model'));
        }
        
        //----------------Index page for Home-------------------------
        
        public function index(){
            if($this->session->userdata('DWAYS_USER_ID')){
                redirect('user/dashboard');
                return;
            }
            
            $this->load->view("home/home");
        }
        
        
        
        
        
}