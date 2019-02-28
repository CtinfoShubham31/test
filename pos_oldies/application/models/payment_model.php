<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getPaymentCredential($company_id,$payment_method_type){
        $this->db->select('credential_id,company_id,payment_method_type,key_id,key_pass');
        $this->db->from('pos_payment_credential');
        $this->db->where('company_id',$company_id);
        $this->db->where('payment_method_type',$payment_method_type);
        
        $query = $this->db->get();
        //  echo $this->db->last_query(); die('SS');
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
    
    public function getAllPaymentCredential($company_id){
        $this->db->select('credential_id,company_id,payment_method_type,key_id,key_pass');
        $this->db->from('pos_payment_credential');
        $this->db->where('company_id',$company_id);
        
        $query = $this->db->get();
        //  echo $this->db->last_query(); die('SS');
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
    
    public function putJsonInSplitSalesOrder($company_id,$sales_order_id,$payment_method_id,$add_response){
        $this->db->where('payment_method_id', $payment_method_id);
        $this->db->where('company_id',$company_id);
        $this->db->where('sales_order_id',$sales_order_id);
        $this->db->update('pos_sales_order_payment_split', $add_response); 
    }
    
    public function putJsonInSalesOrder($company_id,$sales_order_id,$payment_method_id,$add_response){
        $this->db->where('payment_method_id', $payment_method_id);
        $this->db->where('company_id',$company_id);
        $this->db->where('sales_order_id',$sales_order_id);
        $this->db->update('pos_sales_order', $add_response); 
    }
    
    public function addPaymentCredential($data){
        $this->db->insert('pos_payment_credential',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updatePaymentCredential($updatedata,$credential_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('credential_id', $credential_id);
        $this->db->update('pos_payment_credential', $updatedata); 
    }
    
    
    
}