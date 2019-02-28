<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Discount_api extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->config->load('rest');
    }
    
    /*Get all discount lists company wise.*/
    public function discount_lists(){
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"response" => array());
        if(!isset($data) || count($data) == 0) {
            $response['status'] = 0;
            $response['response'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        
        if(empty($data['authkey']) || $data['authkey'] != $this->config->item('authkey')){
            $response['status'] = 0;
            $response['response'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }
        
        $company_id = $data["company_id"];
        $this->load->model(array('taxdiscount_model','company_model'));
        
        $get_discount_lists = $this->taxdiscount_model->getDiscountUsingCompanyId($company_id);
        
        
        if(!empty($get_discount_lists)){
            
            foreach ($get_discount_lists as $dlists) {
                $loc_array_ids = explode(',',$dlists->loc_id);
                if(!empty($loc_array_ids)){
                    $dlists->locname = $this->company_model->getLocationUsingLocids($company_id,$loc_array_ids);
                }else{
                    $dlists->locname = '';
                }
            }
            
            $response['status'] = 1;
            $response['response'] = $get_discount_lists;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
}