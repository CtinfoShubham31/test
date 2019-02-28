<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Analytics_setup extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','checklogin'));
        //$this->load->model(array('common_model','user_model'));
        if(!isAdminLogin()) { 
            redirect($this->config->base_url().'home/homepage/logout');
        }
        
    }
    
    
    public function manage_sales_report(){
        $this->layout->title('Sales Report');  /*----Tab Title------*/
        
        $this->layout->css('css/daterangepicker.css');
        $this->layout->js('js/moment.js');
        $this->layout->js('js/daterangepicker.js');
        
        $this->load->model('analytics_model');
        
        $this->layout->view('analytics/manage_sales_report');
    }
    
}