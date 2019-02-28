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
    
//    public function create_invoice(){
//        $data = json_decode(file_get_contents('php://input'), true);
//        //print_r($data);die('sss');
//        $response = array("status" => array(),"response" => array());
//        if(!isset($data) || count($data) == 0) {
//            $response['status'] = 0;
//            $response['response'] = 'Invalid request';
//            echo json_encode($response);
//            die;
//        }
//        
//        if(empty($data['authkey']) || $data['authkey'] != $this->config->item('authkey')){
//            $response['status'] = 0;
//            $response['response'] = 'Not Authorized';
//            echo json_encode($response);
//            die;
//        }
//        
//        $company_id = $data["company_id"];
//        
//        $this->load->model(array('salesorder_model','company_model'));
//        
//        $company_data = $this->company_model->getCompanyUsingCompanyId($company_id);
//        $company_name = strtoupper(substr($company_data->name, 0, 3));
//        
//        if(!empty($data['invoices'])){
//            
//            $sales_count = $this->salesorder_model->getSalesOrderCountByDate($company_id,$data['sales_order_date']);
//            $order_no = $sales_count+1;
//            
//            $sales_order_data = array(
//                'company_id'=>$company_id,
//                'customer_id'=>$data['customer_id'],
//                'tax_amount'=>$data['tax_amount'],
//                'discount_amount'=>$data['discount_amount'],
//                'final_amount'=>$data['final_amount'],
//                'payment_method_id'=>$data['payment_method_id'],
//                'payment_split'=>$data['payment_split'],
//                'paid_amount'=>$data['paid_amount'],
//                'remaining_amount'=>$data['remaining_amount'],
//                'sales_order_payment_status_id'=>$data['sales_order_payment_status_id'],
//                'sales_order_status_id'=>$data['sales_order_status_id'],
//                'sales_order_date'=>$data['sales_order_date'],
//                'sales_order_no'=>$order_no
//            );
//
//            
//            
//            $sales_order_id = $this->salesorder_model->addSalesOrder($sales_order_data);     //Add oid.
//
//            
//            foreach($data['invoices'] as $invc){
//                $invoice_data = array(
//                    'company_id'=>  $data["company_id"],
//                    'sales_order_id'=>$sales_order_id,
//                    'sales_order_no'=>$order_no,
//                    'inventory_stock_id'=>$invc['inventory_stock_id'],
//                    'sales_qty'=>$invc['sales_qty'],
//                    'sales_rate'=>$invc['sales_rate'],
//                    'sales_amount'=>$invc['sales_amount'],
//                    'unit_id'=>$invc['unit_id'],
//                    'order_completion_time'=>$invc['order_completion_time'],
//                    'product_tax_amount'=>$invc['product_tax_amount'],
//                    'tax_ids'=>$invc['tax_ids'],
//                    'discount_ids'=>$invc['discount_ids'],
//                    'product_discount_amount'=>$invc['product_discount_amount'],
//                    'sales_order_date'=>$data['sales_order_date'],
//                    'product_order_status_id'=>$invc['product_order_status_id'],
//                    'comment'=>$invc['comment']
//                );
//                
//                $this->salesorder_model->addSalesOrderTransaction($invoice_data);
//            }
//            
//            $resultant = array('order_no'=>$order_no,'sales_order_id'=>$sales_order_id);
//            
//            $response['status'] = 1;
//            $response['response'] = $resultant;
//            echo json_encode($response);
//            die;
//        }else{
//            $response['status'] = 0;
//            $response['response'] = '';
//            echo json_encode($response);
//            die;
//        }
//        
//    }
    
    
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
        
        $this->load->model(array('salesorder_model','company_model','employee_model'));
        
        $company_data = $this->company_model->getCompanyUsingCompanyId($company_id);
        $company_name = strtoupper(substr($company_data->name, 0, 3));
        
        if(!empty($data['invoices'])){
            
            $sales_count = $this->salesorder_model->getSalesOrderCountByDate($company_id,$data['sales_order_date']);
            $order_no = $sales_count+1;
            
            $sales_order_data = array(
                'company_id'=>$company_id,
                'employee_id'=>$data['employee_id'],
                'customer_id'=>$data['customer_id'],
                'tax_amount'=>$data['tax_amount'],
                'discount_amount'=>$data['discount_amount'],
                'final_amount'=>$data['final_amount'],
                'payment_method_id'=>$data['payment_method_id'],
                'payment_split'=>$data['payment_split'],
                'payment_split_type'=>$data['payment_split_type'],
                'paid_amount'=>$data['paid_amount'],
                'remaining_amount'=>$data['remaining_amount'],
                'sales_order_payment_status_id'=>$data['sales_order_payment_status_id'],
                'sales_order_status_id'=>$data['sales_order_status_id'],
                'sales_order_date'=>$data['sales_order_date'],
                'sales_order_no'=>$order_no
            );

            
            
            $sales_order_id = $this->salesorder_model->addSalesOrder($sales_order_data);     //Add oid.

            
            foreach($data['invoices'] as $invc){
                $invoice_data = array(
                    'company_id'=>  $data["company_id"],
                    'sales_order_id'=>$sales_order_id,
                    'sales_order_no'=>$order_no,
                    'inventory_stock_id'=>$invc['inventory_stock_id'],
                    'inventory_category_id'=>$invc['inventory_category_id'],
                    'sales_qty'=>$invc['sales_qty'],
                    'sales_rate'=>$invc['sales_rate'],
                    'sales_amount'=>$invc['sales_amount'],
                    'unit_id'=>$invc['unit_id'],
                    'order_completion_time'=>$invc['order_completion_time'],
                    'product_tax_amount'=>$invc['product_tax_amount'],
                    'tax_ids'=>$invc['tax_ids'],
                    'discount_ids'=>$invc['discount_ids'],
                    'product_discount_amount'=>$invc['product_discount_amount'],
                    'sales_order_date'=>$data['sales_order_date'],
                    'product_order_status_id'=>$invc['product_order_status_id'],
                    'comment'=>$invc['comment']
                );
                
                $this->salesorder_model->addSalesOrderTransaction($invoice_data);
                
                $inventory_stock_details = $this->salesorder_model->getSingleStock($data["company_id"],$invc['inventory_stock_id']);
                
                
                $current_quantity = $inventory_stock_details->current_quantity;
                $final_current_quantity = $current_quantity - $invc['sales_qty'];
                
                $update_current_quantity = array('current_quantity'=>$final_current_quantity);
                
                $this->salesorder_model->updateInventoryStockData($update_current_quantity,$invc['inventory_stock_id'],$data["company_id"]);
            }
            
            
            if(!empty($data['payment_split_data']) && ($data['payment_split'] == 1 || $data['payment_split'] == 2)){
                foreach($data['payment_split_data'] as $invc_split){
                    $invoice_split_data = array(
                        'company_id'=>$company_id,
                        'sales_order_id'=>$sales_order_id,
                        'split_amount'=>$invc_split['split_amount'],
                        'payment_method_id'=>$invc_split['payment_method_id'],
                        'sales_order_date'=>$data['sales_order_date']
                    );
                    
                    $this->salesorder_model->addSalesOrderPaymentSplitInfo($invoice_split_data);
                }
            }
            
            
            $check_cash_counter = $this->employee_model->getCashCounterByDate($company_id,$data['employee_id'],$data['sales_order_date']);
            if(!empty($check_cash_counter) && $data['payment_method_id'] == 1){
                if($data['payment_split'] != 1){
                    $famount = $this->salesorder_model->getFinalAmountEmployeeInvoice($company_id,$sales_order_id);
                    
                    $total_cash = $famount+$check_cash_counter->closing_amt;
                }else if($data['payment_split'] == 1){
                    $famount = $this->salesorder_model->getSumOFCashSplitEmployeeInvoice($company_id,$sales_order_id);
                    
                    $total_cash = $famount+$check_cash_counter->closing_amt;
                }
                
                $update_cashdata = array('closing_amt'=>$total_cash);
                
                //Update cash counter closing amount
                $this->salesorder_model->updateCashCounterClosingAmount($update_cashdata,$company_id,$data['employee_id'],$data['sales_order_date']);
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
    
    
    public function create_invoice1(){
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
        
        $this->load->model(array('salesorder_model','company_model','employee_model'));
        
        $company_data = $this->company_model->getCompanyUsingCompanyId($company_id);
        $company_name = strtoupper(substr($company_data->name, 0, 3));
        
        if(!empty($data['invoices'])){
            
            $sales_count = $this->salesorder_model->getSalesOrderCountByDate($company_id,$data['sales_order_date']);
            $order_no = $sales_count+1;
            
            $sales_order_data = array(
                'company_id'=>$company_id,
                'employee_id'=>$data['employee_id'],
                'customer_id'=>$data['customer_id'],
                'tax_amount'=>$data['tax_amount'],
                'discount_amount'=>$data['discount_amount'],
                'final_amount'=>$data['final_amount'],
                'payment_method_id'=>$data['payment_method_id'],
                'payment_split'=>$data['payment_split'],
                'payment_split_type'=>$data['payment_split_type'],
                'paid_amount'=>$data['paid_amount'],
                'remaining_amount'=>$data['remaining_amount'],
                'sales_order_payment_status_id'=>$data['sales_order_payment_status_id'],
                'sales_order_status_id'=>$data['sales_order_status_id'],
                'sales_order_date'=>$data['sales_order_date'],
                'sales_order_no'=>$order_no,
                'payment_response'=>json_encode($data['json_data'])
            );

            
            
            $sales_order_id = $this->salesorder_model->addSalesOrder($sales_order_data);     //Add oid.

            
            foreach($data['invoices'] as $invc){
                $invoice_data = array(
                    'company_id'=>  $data["company_id"],
                    'sales_order_id'=>$sales_order_id,
                    'sales_order_no'=>$order_no,
                    'inventory_stock_id'=>$invc['inventory_stock_id'],
                    'inventory_category_id'=>$invc['inventory_category_id'],
                    'sales_qty'=>$invc['sales_qty'],
                    'sales_rate'=>$invc['sales_rate'],
                    'sales_amount'=>$invc['sales_amount'],
                    'unit_id'=>$invc['unit_id'],
                    'order_completion_time'=>$invc['order_completion_time'],
                    'product_tax_amount'=>$invc['product_tax_amount'],
                    'tax_ids'=>$invc['tax_ids'],
                    'discount_ids'=>$invc['discount_ids'],
                    'product_discount_amount'=>$invc['product_discount_amount'],
                    'sales_order_date'=>$data['sales_order_date'],
                    'product_order_status_id'=>$invc['product_order_status_id'],
                    'comment'=>$invc['comment']
                );
                
                $this->salesorder_model->addSalesOrderTransaction($invoice_data);
                
                $inventory_stock_details = $this->salesorder_model->getSingleStock($data["company_id"],$invc['inventory_stock_id']);
                
                
                $current_quantity = $inventory_stock_details->current_quantity;
                $final_current_quantity = $current_quantity - $invc['sales_qty'];
                
                $update_current_quantity = array('current_quantity'=>$final_current_quantity);
                
                $this->salesorder_model->updateInventoryStockData($update_current_quantity,$invc['inventory_stock_id'],$data["company_id"]);
                
                
            }
            
            
            if(!empty($data['payment_split_data']) && ($data['payment_split'] == 1 || $data['payment_split'] == 2)){
                foreach($data['payment_split_data'] as $invc_split){
                    
                    if(!empty($invc_split['json_data'])){
                        $json_data = json_encode($invc_split['json_data']);
                    }else{
                        $json_data = '';
                    }
                    
                    $invoice_split_data = array(
                        'company_id'=>$company_id,
                        'sales_order_id'=>$sales_order_id,
                        'split_amount'=>$invc_split['split_amount'],
                        'payment_method_id'=>$invc_split['payment_method_id'],
                        'sales_order_date'=>$data['sales_order_date'],
                        'split_payment_response'=>$json_data
                    );
                    
                    $this->salesorder_model->addSalesOrderPaymentSplitInfo($invoice_split_data);
                }
            }
            
            
            $check_cash_counter = $this->employee_model->getCashCounterByDate($company_id,$data['employee_id'],$data['sales_order_date']);
            if(!empty($check_cash_counter) && $data['payment_method_id'] == 1){
                if($data['payment_split'] != 1){
                    $famount = $this->salesorder_model->getFinalAmountEmployeeInvoice($company_id,$sales_order_id);
                    
                    $total_cash = $famount+$check_cash_counter->closing_amt;
                }else if($data['payment_split'] == 1){
                    $famount = $this->salesorder_model->getSumOFCashSplitEmployeeInvoice($company_id,$sales_order_id);
                    
                    $total_cash = $famount+$check_cash_counter->closing_amt;
                }
                
                $update_cashdata = array('closing_amt'=>$total_cash);
                
                //Update cash counter closing amount
                $this->salesorder_model->updateCashCounterClosingAmount($update_cashdata,$company_id,$data['employee_id'],$data['sales_order_date']);
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
        
        if(!empty($sales_order_payment_status_id) && !empty($sales_order_id) && !empty($company_id) && !empty($check_sales_existance)  && $check_sales_existance->sales_order_payment_status_id < $sales_order_payment_status_id){
            $updatedata = array('sales_order_payment_status_id'=>$sales_order_payment_status_id);
            $this->salesorder_model->updateSalesOrder($updatedata,$sales_order_id,$company_id,$sales_order_no);
            
            $response['status'] = 1;
            $response['response'] = 'Sales payment status change successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Can not move to prevoius status.';
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
        
        if(!empty($sales_order_status_id) && !empty($sales_order_id) && !empty($company_id) && !empty($check_sales_existance) && $check_sales_existance->sales_order_status_id < $sales_order_status_id){
            $updatedata = array('sales_order_status_id'=>$sales_order_status_id);
            $this->salesorder_model->updateSalesOrder($updatedata,$sales_order_id,$company_id,$sales_order_no);
            
            $response['status'] = 1;
            $response['response'] = 'Sales Order status change successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Can not move to prevoius status.';
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
        if(!empty($sales_order_transaction_id) && !empty($inventory_stock_id) && !empty($product_order_status_id) && !empty($sales_order_no) && !empty($sales_order_id) && !empty($company_id) && !empty($check_salesorder_transaction) && $check_salesorder_transaction->product_order_status_id < $product_order_status_id){
            $updatedata = array('product_order_status_id'=>$product_order_status_id);
            $this->salesorder_model->updateSalesOrderTransaction($updatedata,$company_id,$sales_order_transaction_id,$sales_order_id,$sales_order_no,$inventory_stock_id);
            
            $product_count = $this->salesorder_model->getSalesOrderProductCount($company_id,$sales_order_id);
            $product_done_count = $this->salesorder_model->getSalesOrderProductDoneStatusCount($company_id,$sales_order_id);
            $product_delivered_count = $this->salesorder_model->getSalesOrderProductDeliveredStatusCount($company_id,$sales_order_id);
            
            $get_single_salesorder = $this->salesorder_model->getSalesOrderUsingSalesIdOrderId($company_id,$sales_order_no,$sales_order_id);
            if(empty($get_single_salesorder)){
                $response['status'] = 0;
                $response['response'] = 'This sales order not exists.';
                echo json_encode($response);
                die;
            }
            
            
            /*if all the product are in done status then update sales order status to done status*/
            if(!empty($product_count) && !empty($product_done_count) && $product_count == $product_done_count){
                $update_sale_transdata = array('sales_order_status_id'=>3); //Done status 
                $this->salesorder_model->updateSalesOrder($update_sale_transdata,$sales_order_id,$company_id,$sales_order_no);
                $sorder_status = 3;
                
            }elseif (!empty($product_count) && !empty($product_delivered_count) && $product_count == $product_delivered_count) {
                $update_sale_transdata = array('sales_order_status_id'=>4); //Done status 
                $this->salesorder_model->updateSalesOrder($update_sale_transdata,$sales_order_id,$company_id,$sales_order_no);
                $sorder_status = 4;
                
            }else{
                $update_sale_transdata = array('sales_order_status_id'=>2); //Done status 
                $this->salesorder_model->updateSalesOrder($update_sale_transdata,$sales_order_id,$company_id,$sales_order_no);
                $sorder_status = 2;
                
            }
            
            $result_records = array('success_msg'=>'Sales Order product status change successfully.','sales_order_status_id'=>$sorder_status);
            $response['status'] = 1;
            $response['response'] = $result_records;
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Can not move to prevoius status.';
            echo json_encode($response);
            die;
        }
    }
    
    
    /*Get all sales(product) transaction data by date*/
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
    
    /*Calculate sales order staus count(In progress, Done, Delievered) Employee and sales order date wise*/
    public function salesorder_statuscount(){
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
        $employee_id = $data['employee_id'];
        
        $this->load->model(array('salesorder_model'));
        
        if(empty($company_id) || empty($sales_order_date) || empty($employee_id)){
            $response['status'] = 0;
            $response['response'] = 'Something is missing.';
            echo json_encode($response);
            die;
        }
        
        $count_sales_orderstatus = $this->salesorder_model->getSalesOrderStatusCount($company_id,$employee_id,$sales_order_date);
        
        if(!empty($count_sales_orderstatus)){
            $response['status'] = 1;
            $response['response'] = $count_sales_orderstatus;
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'No record found.';
            echo json_encode($response);
            die;
        }
        
    }
    
}