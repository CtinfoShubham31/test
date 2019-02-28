<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesorder_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
//    public function addOrder($data){
//        $this->db->insert('pos_invoice',$data);
//        $insert_id = $this->db->insert_id();
//        return $insert_id;
//    }
    
    /*Add invoice(sales order)*/
    public function addSalesOrder($data){
        $this->db->insert('pos_sales_order',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
//    public function updateOrder($updatedata,$oid,$company_id){
//        $this->db->where('oid', $oid);
//        $this->db->where('company_id',$company_id);
//        $this->db->update('pos_invoice', $updatedata); 
//    }
    /********************/
    public function updateSalesOrder($updatedata,$sales_order_id,$company_id,$sales_order_no=''){
        $this->db->where('sales_order_id', $sales_order_id);
        $this->db->where('company_id',$company_id);
        if($sales_order_no){
            $this->db->where('sales_order_no',$sales_order_no);
        }
        $this->db->update('pos_sales_order', $updatedata); 
    }
    
//    public function addInvoice($data){
//        $this->db->insert('pos_invoice_line_product',$data);
//        $insert_id = $this->db->insert_id();
//        return $insert_id;
//    }
    /********************/
    public function addSalesOrderTransaction($data){
        $this->db->insert('pos_sales_order_transaction',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function salesOrderPaymentStatusLists(){
        $this->db->select('sales_order_payment_status_id,payment_status');
        $this->db->from('pos_sales_order_payment_status');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function salesOrderStatusLists(){
        $this->db->select('sales_order_status_id,order_status');
        $this->db->from('pos_sales_order_status');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    /********************/
    public function salesOrderLists($company_id,$start_date='',$end_date=''){
        $this->db->select('sales_order_id, company_id, customer_id, sales_order_no, DATE_FORMAT(sales_order_date,\'%d %b %Y %h:%i %p\') AS sales_order_date, tax_amount, subtotal_amount, final_amount,
        discount_amount, payment_method_id, payment_split, paid_amount, remaining_amount, sales_order_payment_status_id, 
        sales_order_status_id ', FALSE);
        $this->db->from('pos_sales_order');
        
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if(!empty($start_date) && !empty($end_date)){
            $this->db->where('sales_order_date >=', $start_date);
            $this->db->where('sales_order_date <=', $end_date);
        }
        $this->db->order_by('sales_order_id','DESC');
        //$this->db->group_by('sales_order_no');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    

//    public function listsOfOrders($company_id,$start_date='',$end_date=''){
//        $this->db->select('pos_invoice_line_product.company_id, pos_invoice_line_product.order_no, pos_invoice_line_product.qty,
//            pos_invoice_line_product.rate, DATE_FORMAT(pos_invoice.order_date,\'%d %b %Y %h:%i %p\') AS order_date, pos_invoice.total_amount', FALSE);
//        $this->db->from('pos_invoice');
//        $this->db->join('pos_invoice_line_product', 'pos_invoice_line_product.order_no = pos_invoice.order_no AND pos_invoice_line_product.company_id = pos_invoice.company_id','inner');
//        if($company_id){
//            $this->db->where('pos_invoice.company_id',$company_id);
//        }
//        
//        if(!empty($start_date) && !empty($end_date)){
//            $this->db->where('pos_invoice.order_date >=', $start_date);
//            $this->db->where('pos_invoice.order_date <=', $end_date);
//        }
//        
//        $this->db->group_by('pos_invoice_line_product.order_no');
//        $query = $this->db->get();
//        //echo $this->db->last_query(); die('SS');
//        if($query->num_rows()>0)
//        {
//            $row = $query->result();
//            return $row;
//        }
//        else
//        {
//            return false;
//        }
//    }
    
    /********************/
    public function salesOrderProductLists($company_id,$sales_order_id='') {
        $this->db->select('pos_sales_order_transaction.sales_order_transaction_id,pos_sales_order_transaction.sales_order_no, pos_sales_order_transaction.inventory_stock_id,
            pos_sales_order_transaction.sales_qty, pos_sales_order_transaction.sales_rate, pos_sales_order_transaction.sales_order_id,
            pos_sales_order_transaction.sales_amount, pos_sales_order_transaction.unit_id, 
            pos_sales_order_transaction.order_completion_time, pos_sales_order_transaction.product_order_status_id, pos_sales_order_transaction.product_tax_amount, 
            pos_sales_order_transaction.tax_ids, pos_sales_order_transaction.discount_ids, pos_sales_order_transaction.comment,
            pos_sales_order_transaction.product_discount_amount, pos_inventory_stock.product_name, 
            pos_inventory_stock.product_pic, pos_inventory_stock.cost_price');
        $this->db->from('pos_sales_order_transaction');
        $this->db->join('pos_inventory_stock', 'pos_inventory_stock.inventory_stock_id = pos_sales_order_transaction.inventory_stock_id','inner');
        if($company_id){
            $this->db->where('pos_sales_order_transaction.company_id',$company_id);
        }
        if($sales_order_id){
            $this->db->where('pos_sales_order_transaction.sales_order_id',$sales_order_id);
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    /********************/
    public function getSingleSalesOrderData($company_id,$sales_order_id){
        $this->db->select('pos_sales_order.sales_order_id, pos_sales_order.company_id, pos_sales_order.customer_id, pos_sales_order.sales_order_no, 
            DATE_FORMAT(pos_sales_order.sales_order_date,\'%d %b %Y %h:%i %p\') AS sales_order_date, pos_sales_order.tax_amount, 
            pos_sales_order.subtotal_amount, pos_sales_order.final_amount,
        pos_sales_order.discount_amount, pos_sales_order.payment_method_id, pos_sales_order.payment_split, pos_sales_order.paid_amount, 
        pos_sales_order.remaining_amount, pos_sales_order.sales_order_payment_status_id, 
        pos_sales_order.sales_order_status_id, pos_customer.cust_name, pos_customer.cust_email, pos_customer.phone_no as cust_phoneno, pos_customer.comment as cust_comment', FALSE);
        $this->db->from('pos_sales_order');
        $this->db->join('pos_customer', 'pos_customer.customer_id = pos_sales_order.customer_id','left');
        
        if($company_id && $sales_order_id){
            $this->db->where('pos_sales_order.company_id',$company_id);
            $this->db->where('pos_sales_order.sales_order_id',$sales_order_id);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getSalesOrderUsingSalesIdOrderId($company_id,$sales_order_no,$sales_order_id){
        $this->db->select('sales_order_id, company_id, customer_id, sales_order_no, DATE_FORMAT(sales_order_date,\'%d %b %Y %h:%i %p\') AS sales_order_date, tax_amount, subtotal_amount, final_amount,
        discount_amount, payment_method_id, payment_split, paid_amount, remaining_amount, sales_order_payment_status_id, 
        sales_order_status_id ', FALSE);
        $this->db->from('pos_sales_order');
        
        if($company_id && $sales_order_no && $sales_order_id){
            $this->db->where('company_id',$company_id);
            $this->db->where('sales_order_no',$sales_order_no);
            $this->db->where('sales_order_id',$sales_order_id);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()==1)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getSalesOrderTransactionDeatils($company_id,$sales_order_transaction_id,$sales_order_id,$sales_order_no,$inventory_stock_id){
        $this->db->select('sales_order_transaction_id, company_id, sales_order_id, sales_order_no, inventory_stock_id, product_order_status_id,
        order_completion_time');
        $this->db->from('pos_sales_order_transaction');
        
        if($company_id && $sales_order_transaction_id && $inventory_stock_id && $sales_order_no && $sales_order_id){
            $this->db->where('company_id',$company_id);
            $this->db->where('sales_order_no',$sales_order_no);
            $this->db->where('sales_order_id',$sales_order_id);
            $this->db->where('sales_order_transaction_id',$sales_order_transaction_id);
            $this->db->where('inventory_stock_id',$inventory_stock_id);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()==1)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function updateSalesOrderTransaction($updatedata,$company_id,$sales_order_transaction_id,$sales_order_id,$sales_order_no,$inventory_stock_id){
        $this->db->where('sales_order_id', $sales_order_id);
        $this->db->where('sales_order_transaction_id', $sales_order_transaction_id);
        $this->db->where('sales_order_no', $sales_order_no);
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->where('company_id',$company_id);
        $this->db->update('pos_sales_order_transaction', $updatedata); 
    }


    public function getSalesOrderCountByDate($company_id,$date){
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM pos_sales_order WHERE sales_order_date = '$date' AND company_id = $company_id");
        //echo $this->db->last_query();die;
        return $query->row()->tot;
    }
    
    
    public function getSalesTransactionByDate($company_id,$sales_order_date){
        $this->db->select('pos_sales_order_transaction.sales_order_transaction_id,pos_sales_order_transaction.sales_order_no, pos_sales_order_transaction.inventory_stock_id,
            pos_sales_order_transaction.sales_qty, pos_sales_order_transaction.sales_rate, pos_sales_order_transaction.sales_order_id,
            pos_sales_order_transaction.sales_amount, pos_sales_order_transaction.unit_id, 
            pos_sales_order_transaction.order_completion_time, pos_sales_order_transaction.product_order_status_id, pos_sales_order_transaction.product_tax_amount, 
            pos_sales_order_transaction.tax_ids, pos_sales_order_transaction.discount_ids, 
            pos_sales_order_transaction.product_discount_amount,pos_sales_order_transaction.comment,
            pos_inventory_stock.product_name as stock_name,
            pos_inventory_stock.description as stock_description');
        $this->db->from('pos_sales_order_transaction');
        $this->db->join('pos_sales_order', 'pos_sales_order.sales_order_id = pos_sales_order_transaction.sales_order_id','left');
        $this->db->join('pos_inventory_stock',  'pos_inventory_stock.inventory_stock_id = pos_sales_order_transaction.inventory_stock_id  ','left');
        if($company_id){
            $this->db->where('pos_sales_order.company_id',$company_id);
        }
        if($sales_order_date){
            $this->db->where('pos_sales_order.sales_order_date',$sales_order_date);
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }

    /*Add split payment*/
    public function addSalesOrderPaymentSplitInfo($data){
        $this->db->insert('pos_sales_order_payment_split',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function getFinalAmountEmployeeInvoice($company_id,$sales_order_id){
        $this->db->select('paid_amount');
        $this->db->from('pos_sales_order');
        $this->db->where('company_id',$company_id);
        $this->db->where('sales_order_id',$sales_order_id);
        $this->db->where('payment_split',0);
        $this->db->where('payment_method_id',1);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()==1){
            $row = $query->row();
            return $row->paid_amount;
        }
        else{
            return false;
        }
    }
    
    
    public function getSumOFCashSplitEmployeeInvoice($company_id,$sales_order_id){
        $this->db->select('SUM(split_amount) as final_amount');
        $this->db->from('pos_sales_order_payment_split');
        $this->db->where('company_id',$company_id);
        $this->db->where('sales_order_id',$sales_order_id);
        $this->db->where('payment_method_id',1);
        $this->db->group_by('sales_order_id');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()==1){
            $row = $query->row()->final_amount;
            return $row;
        }
        else{
            return false;
        }
    }
    
    
    public function updateCashCounterClosingAmount($updatedata,$company_id,$employee_id,$sales_order_date){
        $this->db->where('company_id', $company_id);
        $this->db->where('employee_id', $employee_id);
        $this->db->where('login_date', $sales_order_date);
        
        $this->db->update('pos_cash_counter', $updatedata); 
    }
    
    
    public function getSalesOrderStatusCount($company_id,$employee_id,$sales_order_date){
//        $this->db->select('SUM(IF(sales_order_status_id = "2", 1,0)) AS in_progress, SUM(IF(sales_order_status_id = "3", 1,0)) AS done,
//            SUM(IF(sales_order_status_id = "4", 1,0)) AS delivered',false);
//        $this->db->from('pos_sales_order');
//        $this->db->where('company_id',$company_id);
//        $this->db->where('employee_id',$employee_id);
//        $this->db->where('sales_order_date',$sales_order_date);
        $sql = 'SELECT * FROM (SELECT SUM(IF(sales_order_status_id = "2", 1, 0)) AS in_progress, SUM(IF(sales_order_status_id = "3", 1, 0)) AS done, SUM(IF(sales_order_status_id = "4", 1, 0)) AS delivered
FROM (pos_sales_order)
WHERE company_id =  "'.$company_id.'"
AND employee_id =  "'.$employee_id.'"
AND sales_order_date =  "'.$sales_order_date.'") t
WHERE t.in_progress IS NOT NULL';
        
        //$query = $this->db->get();
        $query = $this->db->query($sql);
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()>0){
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }
    }

    
    /*Totalcount of sales order product*/
    public function getSalesOrderProductCount($company_id,$sales_order_id){
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM pos_sales_order_transaction WHERE sales_order_id = '$sales_order_id' AND company_id = $company_id");
        //echo $this->db->last_query();die;
        return $query->row()->tot;
    }
    
    
    /*Totalcount of sales order product done status*/
    public function getSalesOrderProductDoneStatusCount($company_id,$sales_order_id){
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM pos_sales_order_transaction WHERE product_order_status_id = 3 AND sales_order_id = '$sales_order_id' AND company_id = $company_id");
        //echo $this->db->last_query();die;
        return $query->row()->tot;
    }
    
    /*Totalcount of sales order product deliver status*/
    public function getSalesOrderProductDeliveredStatusCount($company_id,$sales_order_id){
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM pos_sales_order_transaction WHERE product_order_status_id = 4 AND sales_order_id = '$sales_order_id' AND company_id = $company_id");
        //echo $this->db->last_query();die;
        return $query->row()->tot;
    }
    
    
    public function getSingleStock($company_id,$inventory_stock_id){
        $this->db->select('inventory_stock_id,product_name,opening_quantity,current_quantity');
        $this->db->from('pos_inventory_stock');
        $this->db->where('company_id',$company_id);
        $this->db->where('inventory_stock_id',$inventory_stock_id);
        
        $query = $this->db->get();
        
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function updateInventoryStockData($stock_data,$inventory_stock_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->update('pos_inventory_stock', $stock_data); 
    }

//    public function getCustomerInfoData($company_id,$customer_id){
//        $this->db->select('SUM(split_amount) as final_amount');
//        $this->db->from('pos_sales_order_payment_split');
//        $this->db->where('company_id',$company_id);
//        $this->db->where('sales_order_id',$sales_order_id);
//        $this->db->where('payment_method_id',1);
//        $this->db->group_by('sales_order_id');
//        
//        $query = $this->db->get();
//        //echo $this->db->last_query(); die('SS');
//
//        if($query->num_rows()==1){
//            $row = $query->row()->final_amount;
//            return $row;
//        }
//        else{
//            return false;
//        }
//    }
    
}