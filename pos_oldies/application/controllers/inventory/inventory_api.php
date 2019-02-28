<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_api extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->config->load('rest');
    }
    
    /*Get all inventory categories companywise*/
    public function inventory_categories(){
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
        $this->load->model('inventory_model');
        
        $get_category_lists = $this->inventory_model->getAllCategoriesCompanyWise($company_id);
        if(!empty($get_category_lists)){
            $response['status'] = 1;
            $response['response'] = $get_category_lists;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    /*Get inventory product lists based on category.*/
    public function inventory_productlists_categorywise(){
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
        $inventory_category_id = $data['inventory_category_id'];
        $tax_date_apply = $data['date'];
        $this->load->model('inventory_stock_model');
        
        $result = array();
        
        $get_stock_lists = $this->inventory_stock_model->getInventoryStockUsingCategoryId($company_id,$inventory_category_id);
        if(!empty($get_stock_lists)){
            foreach ($get_stock_lists as $stocks) {
                $stock_discount = $this->inventory_stock_model->getInventoryStockDiscount($company_id,$stocks->inventory_stock_id);
                //$stocks->discount = $stock_discount->percentage;disc_ids
                
                $discount_ids = (!empty($stock_discount->disc_ids))?explode(',',$stock_discount->disc_ids):'';
                if(!empty($discount_ids)){
                    $stocks->discount = $this->inventory_stock_model->getDiscountWithPercentage($company_id,$discount_ids);
                }else{
                    $stocks->discount = 'false';
                }
                
                $stock_tax = $this->inventory_stock_model->getInventoryStockTax($company_id,$stocks->inventory_stock_id);
                
                //$stocks->tax = (!empty($stock_tax->percentage))?$stock_tax->percentage:'';
                //$tax_ids = (!empty($stock_tax->tx_ids))?explode(',',$stock_tax->tx_ids):'';
                //echo $tax_ids;die('ss');
                $tax_ids = (!empty($stock_tax->tx_ids))?$stock_tax->tx_ids:'';
                //echo $tax_ids;die('ss');
                if(!empty($tax_ids)){ //echo $tax_ids;
                    $stocks->tax = $this->inventory_stock_model->getTaxWithPercentage($company_id,$tax_ids,$tax_date_apply);
                }else{
                    $stocks->tax = 'false';
                }
                //print_r($stock_tax);die;
                //print_r($stocks->tax);die;
                $stock_location = $this->inventory_stock_model->getInventoryStockLocation($company_id,$stocks->inventory_stock_id);
                $stocks->location = (!empty($stock_location->location_name))?$stock_location->location_name:'';
                
            }
            
            $response['status'] = 1;
            $response['response'] = $get_stock_lists;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = 'Record not available.';
            echo json_encode($response);
            die;
        }
    }
    
    
}