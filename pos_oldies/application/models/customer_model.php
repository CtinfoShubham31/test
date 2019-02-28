<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function addCustomer($data){
        $this->db->insert('pos_customer',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getCustomerLists($company_id){
        $this->db->select('customer_id,company_id,cust_name,cust_email,phone_no,comment,added_date');
        $this->db->from('pos_customer');
        if($company_id){
            $this->db->where('company_id',$company_id);
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
    
    public function getUniqueCustomer($company_id,$cust_email){
        $this->db->select('customer_id,company_id,cust_name,cust_email,phone_no,comment,added_date');
        $this->db->from('pos_customer');
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($cust_email){
            $this->db->where('cust_email',$cust_email);
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
    
    
    public function checkCutomerContactExistance($company_id,$phone_no){
        $this->db->select('customer_id,company_id,cust_name,cust_email,phone_no,comment,added_date');
        $this->db->from('pos_customer');
        $this->db->where('company_id',$company_id);
        $this->db->where('phone_no',$phone_no);
        
        
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
    
    
    public function getSingleCustomerData($company_id,$cutomer_id){
        $this->db->select('customer_id,company_id,cust_name,cust_email,phone_no,comment,added_date');
        $this->db->from('pos_customer');
        $this->db->where('company_id',$company_id);
        $this->db->where('customer_id',$cutomer_id);
        
        
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