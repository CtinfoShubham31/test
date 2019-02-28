<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->config->load('rest');
    }
    
    /*Purchase order payment status lists*/
    public function purchaseorder_paymentstatus_lists(){
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
        
        $this->load->model(array('purchase_order_model'));
        
        $payment_status_lists = $this->purchase_order_model->purchaseOrderPaymentStatusLists();
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

    /*Purchase order status lists*/
    public function purchase_orderstatus_lists(){
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
        
        $this->load->model(array('purchase_order_model'));
        
        $order_status_lists = $this->purchase_order_model->purchaseOrderStatusLists();
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
    
    /*Get all purchase(product) transaction data by date*/
    public function purchase_transaction_bydate(){
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
        $purchase_order_date = $data['purchase_order_date'];
        
        $this->load->model(array('purchase_order_model'));
        
        $purchase_transaction = $this->purchase_order_model->getPurchaseTransactionByDate($company_id,$purchase_order_date);
        
        if(!empty($purchase_transaction)){
            $response['status'] = 1;
            $response['response'] = $purchase_transaction;
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'No record found.';
            echo json_encode($response);
            die;
        }
        
    }
    
    
    /*Update purchase order payment status*/
    public function updatepurchase_payment_status(){
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
        
        $purchase_order_id = $data["purchase_order_id"];
        $purchase_order_no = $data["purchase_order_no"];
        $purchase_order_payment_status_id = $data["purchase_order_payment_status_id"];
        
        $this->load->model(array('purchase_order_model'));
        
        $check_purchase_existance = $this->purchase_order_model->getPurchaseOrderUsingPurchaseIdOrderId($company_id,$purchase_order_no,$purchase_order_id);
        
        if(!empty($purchase_order_payment_status_id) && !empty($purchase_order_id) && !empty($company_id) && !empty($check_purchase_existance)){
            $updatedata = array('purchase_order_payment_status_id'=>$purchase_order_payment_status_id);
            $this->purchase_order_model->updatePurchaseOrder($updatedata,$purchase_order_id,$company_id,$purchase_order_no);
            
            $response['status'] = 1;
            $response['response'] = 'Purchase payment status change successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Something went wrong.';
            echo json_encode($response);
            die;
        }
    }
    
    
     /*Update purchase order status*/
    public function updatepurchase_order_status(){
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
        
        $purchase_order_id = $data["purchase_order_id"];
        $purchase_order_no = $data["purchase_order_no"];
        $purchase_order_status_id = $data["purchase_order_status_id"];
        
        $this->load->model(array('purchase_order_model'));
        
        $check_purchase_existance = $this->purchase_order_model->getPurchaseOrderUsingPurchaseIdOrderId($company_id,$purchase_order_no,$purchase_order_id);
        
        if(!empty($purchase_order_status_id) && !empty($purchase_order_id) && !empty($company_id) && !empty($check_purchase_existance)){
            $updatedata = array('purchase_order_status_id'=>$purchase_order_status_id);
            $this->purchase_order_model->updatePurchaseOrder($updatedata,$purchase_order_id,$company_id,$purchase_order_no);
            
            $response['status'] = 1;
            $response['response'] = 'Purchase Order status change successfully.';
            echo json_encode($response);
            die;
            
        }else{
            $response['status'] = 0;
            $response['response'] = 'Something went wrong.';
            echo json_encode($response);
            die;
        }
        
        
    }
    
    
    public function paid_amount(){
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
        $purchase_order_id = $data["purchase_order_id"];
        $purchase_order_payment_status_id = $data["purchase_order_payment_status_id"];
        $paid_amount = $data["paid_amount"];
        
        $this->load->model(array('purchase_order_model'));
        
        $purchase_order_details = $this->purchase_order_model->getSinglePurchaseOrderDetails($company_id,$purchase_order_id);
        
        $remaining_amount = $purchase_order_details->remaining_amount;
        
        $paid_data_amount = $purchase_order_details->paid_amount;
        
        if(!empty($purchase_order_details) && ($remaining_amount>$paid_amount || $remaining_amount == $paid_amount)){
            if($remaining_amount-$paid_amount == 0){
                $purchase_order_payment_status_id = 1;
            }
            $porder_paid_amount = array(
                'paid_amount'=> $paid_amount + $paid_data_amount,
                'remaining_amount'=>$remaining_amount - $paid_amount,
                'purchase_order_payment_status_id'=>$purchase_order_payment_status_id
            );

            $this->purchase_order_model->updatePurchaseOrder($porder_paid_amount,$purchase_order_id,$company_id);   //Update

            $response['status'] = 1;
            $response['response'] = 'Purchase order paid amount updated successfully.';
            echo json_encode($response);
            die;
        }else{
            $response['status'] = 0;
            $response['response'] = 'Purchase order paid amount is higher from outstanding amount.';
            echo json_encode($response);
            die;
        }
    }
    
    
    
}