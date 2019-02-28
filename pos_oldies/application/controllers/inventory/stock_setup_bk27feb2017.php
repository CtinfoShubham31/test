<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stock_setup extends MY_Controller {
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
    
    public function manage_stock(){
        $this->layout->title('Stock Setup');  /*----Tab Title------*/
        
        $this->layout->css('css/chosen.css');
        $this->layout->css('css/droparea.css');
        $this->layout->js('js/chosen.jquery.js'); 
        $this->layout->js('js/droparea.js');
        $this->layout->js('js/custom/inventory.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('inventory_model','taxdiscount_model'));
        
        $this->layout->view('inventory/manage_stock');
    }
    
}