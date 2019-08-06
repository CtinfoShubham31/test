<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));  // load library classes
        $this->load->helper(array('form', 'url', 'file','checkadminlogin'));  
        $this->load->model(array('admin_model'));
        $this->data['basepath'] = $this->config->item('base_url'); //assigning base path
        //$this->output->nocache();
        if (!isAdminLoginCheck()) { 
            redirect($this->config->item('base_url') . 'germ_admin/admin/logout');
        }
    }
    
    /*
     * Admin dashboard will upload here.
     */
    public function index() {
        die('heyyyyyyy');
    }
    
    
    
    
}

