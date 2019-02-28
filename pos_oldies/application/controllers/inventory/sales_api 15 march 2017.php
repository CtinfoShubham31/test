<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->config->load('rest');
    }
    
    public function salesorder_paymentstatus_lists(){
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);die('sss');
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
        
        $this->load->model(array('salesorder_model'));
        
        $payment_status_lists = $this->salesorder_model->salesOrderPaymentStatusLists();
        if(!empty($payment_status_lists)){
            $response['status'] = 1;
            $response['response'] = $payment_status_lists;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }

    public function sales_orderstatus_lists(){
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);die('sss');
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
        
        $this->load->model(array('salesorder_model'));
        
        $order_status_lists = $this->salesorder_model->salesOrderStatusLists();
        if(!empty($order_status_lists)){
            $response['status'] = 1;
            $response['response'] = $order_status_lists;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    public function create_invoice(){
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);die('sss');
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
        
        $this->load->model(array('salesorder_model','company_model'));
        
        $company_data = $this->company_model->getCompanyUsingCompanyId($company_id);
        $company_name = strtoupper(substr($company_data->name, 0, 3));
        
        if(!empty($data['invoices'])){
            
            $sales_count = $this->salesorder_model->getSalesOrderCountByDate($company_id,$data['sales_order_date']);
            $order_no = $sales_count+1;
            
            $sales_order_data = array(
                'company_id'=>$company_id,
                'customer_id'=>$data['customer_id'],
                'tax_amount'=>$data['tax_amount'],
                'discount_amount'=>$data['discount_amount'],
                'final_amount'=>$data['final_amount'],
                'payment_method_id'=>$data['payment_method_id'],
                'payment_split'=>$data['payment_split'],
                'paid_amount'=>$data['paid_amount'],
                'remaining_amount'=>$data['remaining_amount'],
                'sales_order_payment_status_id'=>$data['sales_order_payment_status_id'],
                'sales_order_status_id'=>$data['sales_order_status_id'],
                'sales_order_date'=>$data['sales_order_date'],
                'sales_order_no'=>$order_no
            );

            
            
            $sales_order_id = $this->salesorder_model->addSalesOrder($sales_order_data);     //Add oid.

            
            
            
//            $order_no = $sales_count+1;
//            $update_orderno = array('sales_order_no'=>$order_no);       //Add order no using update using update function.
//            
//            $this->salesorder_model->updateSalesOrder($update_orderno,$sales_order_id,$company_id);   //Update order no.
            
            foreach($data['invoices'] as $invc){
                $invoice_data = array(
                    'company_id'=>  $data["company_id"],
                    'sales_order_id'=>$sales_order_id,
                    'sales_order_no'=>$order_no,
                    'inventory_stock_id'=>$invc['inventory_stock_id'],
                    'sales_qty'=>$invc['sales_qty'],
                    'sales_rate'=>$invc['sales_rate'],
                    'sales_amount'=>$invc['sales_amount'],
                    'unit_id'=>$invc['unit_id'],
                    'order_completion_time'=>$invc['order_completion_time'],
                    'product_tax_amount'=>$invc['product_tax_amount'],
                    'tax_ids'=>$invc['tax_ids'],
                    'discount_ids'=>$invc['discount_ids'],
                    'product_discount_amount'=>$invc['product_discount_amount'],
                    'sales_order_date'=>$data['sales_order_date']
                );
                
                $this->salesorder_model->addSalesOrderTransaction($invoice_data);
            }
            
            $resultant = array('order_no'=>$order_no,'sales_order_id'=>$sales_order_id);
            
            $response['status'] = 1;
            $response['response'] = $resultant;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    /**All sales order lists companywise**/
    public function salesorder_lists(){
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
        
        $this->load->model(array('salesorder_model','company_model'));
        
        $order_lists = $this->salesorder_model->salesOrderLists($company_id);
        
        if(!empty($order_lists)){
            $response['status'] = 1;
            $response['response'] = $order_lists;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    /*Search sales order by date between start and end date*/
    public function searchsales_orderbydate(){
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
        
        $start_date = date("Y-m-d H:i", strtotime($data["start_date"]));
        $end_date = date("Y-m-d H:i", strtotime($data["end_date"]));
        
        $this->load->model(array('salesorder_model'));
        
        if(!empty($start_date) && !empty($end_date)){
            $order_lists = $this->salesorder_model->salesOrderLists($company_id,$start_date,$end_date);
        
            if(!empty($order_lists)){
                $response['status'] = 1;
                $response['response'] = $order_lists;
                echo json_encode($response);
                die;
            }else{
                $response['status'] = 0;
                $response['response'] = '';
                echo json_encode($response);
                die;
            }
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
        
    }
    
    
    /**Get Sales order product lists by using sales order no and company**/
    public function salesorder_productlists(){
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
        $sales_order_id = $data["sales_order_id"];
        
        $this->load->model(array('salesorder_model','company_model'));
        
        $order_product_lists = array();
        $order_product_lists = $this->salesorder_model->salesOrderProductLists($company_id,$sales_order_id);
        
        $single_sales_order = $this->salesorder_model->getSingleSalesOrderData($company_id,$sales_order_id);
        $k['single_salesorder_data'] = $single_sales_order;
        $k['transactions'] = $order_product_lists;
        //$order_product_lists[] =  $k;
        
//        $companyimg = $this->company_model->getCompanyUsingCompanyId($company_id);
//        if(!empty($companyimg->image_logo)){
//            $ck['company_logo'] = $companyimg->image_logo;
//            $order_product_lists[] =  $ck;
//        }else{
//            $order_product_lists[] =  '';
//        }
        
        if(!empty($order_product_lists)){
            $response['status'] = 1;
            $response['response'] = $k;
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    /*Update sales order payment status*/
    public function updatesales_payment_status(){
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
        
        $sales_order_id = $data["sales_order_id"];
        $sales_order_no = $data["sales_order_no"];
        $sales_order_payment_status_id = $data["sales_order_payment_status_id"];
        
        $this->load->model(array('salesorder_model'));
        
        $check_sales_existance = $this->salesorder_model->getSalesOrderUsingSalesIdOrderId($company_id,$sales_order_no,$sales_order_id);
        
        if(!empty($sales_order_payment_status_id) && !empty($sales_order_id) && !empty($company_id) && !empty($check_sales_existance)){
            $updatedata = array('sales_order_payment_status_id'=>$sales_order_payment_status_id);
            $this->salesorder_model->updateSalesOrder($updatedata,$sales_order_id,$company_id,$sales_order_no);
            
            $response['status'] = 1;
            $response['response'] = 'Sales payment status change successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    
     /*Update sales order status*/
    public function updatesales_order_status(){
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
        
        $sales_order_id = $data["sales_order_id"];
        $sales_order_no = $data["sales_order_no"];
        
        $sales_order_status_id = $data["sales_order_status_id"];
        
        $this->load->model(array('salesorder_model'));
        
        $check_sales_existance = $this->salesorder_model->getSalesOrderUsingSalesIdOrderId($company_id,$sales_order_no,$sales_order_id);
        
        if(!empty($sales_order_status_id) && !empty($sales_order_id) && !empty($company_id) && !empty($check_sales_existance)){
            $updatedata = array('sales_order_status_id'=>$sales_order_status_id);
            $this->salesorder_model->updateSalesOrder($updatedata,$sales_order_id,$company_id,$sales_order_no);
            
            $response['status'] = 1;
            $response['response'] = 'Sales Order status change successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    
    
     /*Update sales order product status*/
    public function updatesales_orderproduct_status(){
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
        
        $sales_order_id = $data["sales_order_id"];
        $sales_order_no = $data["sales_order_no"];
        
        $product_order_status_id = $data["product_order_status_id"];
        $inventory_stock_id = $data["inventory_stock_id"];
        $sales_order_transaction_id = $data["sales_order_transaction_id"];
        
        $this->load->model(array('salesorder_model'));
        
        //$check_sales_existance = $this->salesorder_model->getSalesOrderUsingSalesIdOrderId($company_id,$sales_order_no,$sales_order_id);
        $check_salesorder_transaction = $this->salesorder_model->getSalesOrderTransactionDeatils($company_id,$sales_order_transaction_id,$sales_order_id,$sales_order_no,$inventory_stock_id);
        if(!empty($sales_order_transaction_id) && !empty($inventory_stock_id) && !empty($product_order_status_id) && !empty($sales_order_no) && !empty($sales_order_id) && !empty($company_id) && !empty($check_salesorder_transaction)){
            $updatedata = array('product_order_status_id'=>$product_order_status_id);
            $this->salesorder_model->updateSalesOrderTransaction($updatedata,$company_id,$sales_order_transaction_id,$sales_order_id,$sales_order_no,$inventory_stock_id);
            
            $response['status'] = 1;
            $response['response'] = 'Sales Order product status change successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = '';
            echo json_encode($response);
            die;
        }
    }
    
    
    /*Get all sales transaction data by date*/
    public function sales_transaction_bydate(){
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
        $sales_order_date = $data['sales_order_date'];
        
        $this->load->model(array('salesorder_model'));
        
        $sale_transaction = $this->salesorder_model->getSalesTransactionByDate($company_id,$sales_order_date);
        
        if(!empty($sale_transaction)){
            $response['status'] = 1;
            $response['response'] = $sale_transaction;
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