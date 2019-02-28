<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tax_api extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->config->load('rest');
    }
    
    /*Get all discount lists company wise.*/
    public function tax_lists(){
        $data = json_decode(file_get_contents('php://input'), true);
        $responce = array("status" => array(),"responce" => array());
        if(!isset($data) || count($data) == 0) {
            $responce['status'] = 0;
            $responce['responce'] = 'Invalid request';
            echo json_encode($responce);
            die;
        }
        
        if(empty($data['authkey']) || $data['authkey'] != $this->config->item('authkey')){
            $responce['status'] = 0;
            $responce['responce'] = 'Not Authorized';
            echo json_encode($responce);
            die;
        }
        
        $company_id = $data["company_id"];
        $this->load->model(array('taxdiscount_model','company_model'));
        
        $get_tax_lists = $this->taxdiscount_model->getTaxUsingCompanyId($company_id);
        
        
        if(!empty($get_tax_lists)){
            
            foreach ($get_tax_lists as $tlists) {
                //$loc_array_ids = explode(',',$dlists->loc_id);
                $percentage_details = $this->taxdiscount_model->getTaxPercentageUsingTaxIdCompanyId($tlists->tax_id,$company_id);
                if(!empty($percentage_details)){
                    $tlists->percentage_data = $percentage_details;
                }else{
                    $tlists->percentage_data = '';
                }
            }
            
            $responce['status'] = 1;
            $responce['responce'] = $get_tax_lists;
            echo json_encode($responce);
            die;
        }else{
            $responce['status'] = 0;
            $responce['responce'] = '';
            echo json_encode($responce);
            die;
        }
        
    }
    
}