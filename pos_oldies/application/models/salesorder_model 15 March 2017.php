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
        
        $this->db->group_by('sales_order_no');
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
            pos_sales_order_transaction.tax_ids, pos_sales_order_transaction.discount_ids, 
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
        $this->db->select('sales_order_id, company_id, customer_id, sales_order_no, DATE_FORMAT(sales_order_date,\'%d %b %Y %h:%i %p\') AS sales_order_date, tax_amount, subtotal_amount, final_amount,
        discount_amount, payment_method_id, payment_split, paid_amount, remaining_amount, sales_order_payment_status_id, 
        sales_order_status_id ', FALSE);
        $this->db->from('pos_sales_order');
        
        if($company_id && $sales_order_id){
            $this->db->where('company_id',$company_id);
            $this->db->where('sales_order_id',$sales_order_id);
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
            pos_sales_order_transaction.product_discount_amount');
        $this->db->from('pos_sales_order_transaction');
        $this->db->join('pos_sales_order', 'pos_sales_order.sales_order_id = pos_sales_order_transaction.sales_order_id','left');
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


//    public function getOrderProductUsingCompanyIdOrderId($company_id,$order_no){
//        $this->db->select('pos_invoice_line_product.line_product_id,pos_invoice_line_product.company_id,pos_invoice_line_product.qty, 
//            pos_invoice_line_product.rate,pos_invoice_line_product.line_product_total,pos_inventory_stock.product_name,pos_inventory_stock.inventory_stock_id');
//        $this->db->from('pos_invoice_line_product');
//        $this->db->join('pos_inventory_stock', 'pos_inventory_stock.inventory_stock_id = pos_invoice_line_product.inventory_stock_id AND pos_invoice_line_product.company_id = pos_inventory_stock.company_id','inner');
//        if($company_id){
//            $this->db->where('pos_invoice_line_product.company_id',$company_id);
//        }
//        if($company_id){
//            $this->db->where('pos_invoice_line_product.order_no',$order_no);
//        }
//        
//        //$this->db->group_by('pos_invoice_line_product.order_no');
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
    
    
//    public function getOrderTotalExpenses($company_id,$order_no){
//        $this->db->select('oid, company_id, order_no, total_amount, order_date');
//        $this->db->from('pos_invoice');
//        
//        if($company_id){
//            $this->db->where('company_id',$company_id);
//        }
//        if($order_no){
//            $this->db->where('order_no',$order_no);
//        }
//        //$this->db->group_by('pos_inventory_stock.inventory_stock_id');
//        $query = $this->db->get();
//        //echo $this->db->last_query(); die('SS');
//        if($query->num_rows()>0)
//        {
//            $row = $query->row();
//            return $row;
//        }
//        else
//        {
//            return false;
//        }
//    }
    
}