<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        //$this->load->model(array('common_model'));
        //$this->output->nocache();
       
    }
    
    /*-----Load all user------*/
    public function user_lists() {
        $this->layout->css('admin_design/css/dataTables.min.css');
        $this->layout->js('admin_design/js/jquery.dataTables.min.js');
        $this->layout->view('admin_user/user_lists');
    }
    
    
}