<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_order_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getStockNameUsingCompanyId($company_id,$term=''){
        $this->db->select('inventory_stock_id,product_name,cost_price');
        $this->db->from('pos_inventory_stock');
        
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($term){
            //$this->db->like('vendor_name',$term,'after');
            $this->db->like('product_name',$term);
        }
        $this->db->where('product_delete_status !=',1);
        
        $this->db->order_by('product_name');
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
    
    public function addVendor($data){
        $this->db->insert('pos_vendor',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getVendorDetails($company_id,$term=''){
        $this->db->select('vendor_id,vendor_name,company_id');
        $this->db->from('pos_vendor');
        
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($term){
            //$this->db->like('vendor_name',$term,'after');
            $this->db->like('vendor_name',$term);
        }
        
        $this->db->order_by('vendor_name');
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
    
    public function getSingleVendorDetails($company_id,$vendor_id='',$vendor_name=''){
        $this->db->select('vendor_id,vendor_name,company_id');
        $this->db->from('pos_vendor');
        
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($vendor_id){
            $this->db->where('vendor_id',$vendor_id);
        }
        if($vendor_name){
            $this->db->where('vendor_name',$vendor_name);
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


    public function getSingleInventoryStockInfo($stock_id,$company_id){
        $this->db->select('inventory_stock_id,product_name,current_quantity');
        $this->db->from('pos_inventory_stock');
        
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($stock_id){
            $this->db->where('inventory_stock_id',$stock_id);
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
    
    public function addPurchaseOrder($data) {
        $this->db->insert('pos_purchase_order',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updatePurchaseOrder($updatedata,$purchase_order_id,$company_id,$purchase_order_no=''){
        $this->db->where('purchase_order_id', $purchase_order_id);
        $this->db->where('company_id',$company_id);
        if($purchase_order_no){
            $this->db->where('purchase_order_no',$purchase_order_no);
        }
        $this->db->update('pos_purchase_order', $updatedata); 
    }
    
    public function addPurchaseOrderTransaction($data){
        $this->db->insert('pos_purchase_order_transaction',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getPurchaseOrderCountByDate($company_id,$date){
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM pos_purchase_order WHERE purchase_order_date = '$date' AND company_id = $company_id");
        //echo $this->db->last_query();die;
        return $query->row()->tot;
    }
    
    public function deleteEmployee($employee_id,$company_id) {
        $this->db->where('employee_id', $employee_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_employee'); 
    }
    
    public function getPurchaseTransactionByDate($company_id,$purchase_order_date){
       $this->db->select('pos_purchase_order_transaction.purchase_order_transaction_id,pos_purchase_order_transaction.purchase_order_no, pos_purchase_order_transaction.inventory_stock_id,
            pos_purchase_order_transaction.purchase_qty, pos_purchase_order_transaction.purchase_rate, pos_purchase_order_transaction.purchase_order_id,
            pos_purchase_order_transaction.purchase_amount, pos_purchase_order_transaction.unit_id, 
            pos_purchase_order.purchase_order_status_id,pos_purchase_order.purchase_order_payment_status_id,pos_purchase_order.remaining_amount,
            pos_inventory_stock.product_name as inventory_stock_name,
            pos_inventory_stock.description as inventory_stock_description
        ');
        $this->db->from('pos_purchase_order_transaction');
        $this->db->join('pos_purchase_order', 'pos_purchase_order.purchase_order_id = pos_purchase_order_transaction.purchase_order_id','left');
        $this->db->join('pos_inventory_stock',  'pos_inventory_stock.inventory_stock_id = pos_purchase_order_transaction.inventory_stock_id  ','left');
        if($company_id){
            $this->db->where('pos_purchase_order.company_id',$company_id);
        }
        if($purchase_order_date){
            $this->db->where('pos_purchase_order.purchase_order_date',$purchase_order_date);
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
    
    public function purchaseOrderPaymentStatusLists(){
        $this->db->select('purchase_order_payment_status_id,payment_status');
        $this->db->from('pos_purchase_order_payment_status');
        
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
    
    public function purchaseOrderStatusLists(){
        $this->db->select('purchase_order_status_id,order_status');
        $this->db->from('pos_purchase_order_status');
        
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
    
    public function getPurchaseOrderUsingPurchaseIdOrderId($company_id,$purchase_order_no,$purchase_order_id){
        $this->db->select('purchase_order_id, company_id, vendor_id, purchase_order_no, DATE_FORMAT(purchase_order_date,\'%d %b %Y %h:%i %p\') AS purchase_order_date, subtotal_amount, final_amount,
        paid_amount, remaining_amount, purchase_order_payment_status_id, purchase_order_status_id ', FALSE);
        $this->db->from('pos_purchase_order');
        
        if($company_id && $purchase_order_no && $purchase_order_id){
            $this->db->where('company_id',$company_id);
            $this->db->where('purchase_order_no',$purchase_order_no);
            $this->db->where('purchase_order_id',$purchase_order_id);
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
    
    
    public function getPurchaseOrderListsUsingCompanyId($company_id){
        $this->db->select('pos_purchase_order.purchase_order_id, pos_purchase_order.purchase_order_no, pos_purchase_order.purchase_order_date,
            pos_purchase_order.final_amount, pos_vendor.vendor_name, pos_purchase_order_payment_status.payment_status,
            pos_purchase_order_status.order_status');
        $this->db->from('pos_purchase_order');
        $this->db->join('pos_vendor', 'pos_vendor.vendor_id = pos_purchase_order.vendor_id','left');
        $this->db->join('pos_purchase_order_payment_status', 'pos_purchase_order_payment_status.purchase_order_payment_status_id = pos_purchase_order.purchase_order_payment_status_id','left');
        $this->db->join('pos_purchase_order_status', 'pos_purchase_order_status.purchase_order_status_id = pos_purchase_order.purchase_order_status_id','left');
    
        $this->db->where('pos_purchase_order.company_id',$company_id);
        $this->db->order_by('pos_purchase_order.purchase_order_id','desc');
        
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
    
    public function getSinglePurchaseOrderDetails($company_id,$purchase_order_id){
        $this->db->select('purchase_order_id,purchase_order_no,purchase_order_date,final_amount,purchase_order_payment_status_id,
            	purchase_order_status_id,paid_amount,remaining_amount');
        $this->db->from('pos_purchase_order');
        $this->db->where('company_id',$company_id);
        $this->db->where('purchase_order_id',$purchase_order_id);
        
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
    
}