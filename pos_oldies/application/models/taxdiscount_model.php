<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taxdiscount_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function addDiscount($data){
        $this->db->insert('pos_discount',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateDiscount($updatedata,$discount_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('discount_id', $discount_id);
        $this->db->update('pos_discount', $updatedata); 
    }
    
    public function addDicountLocation($data){
        $this->db->insert('pos_discount_location',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function deleteDiscountLocation($discount_id,$company_id){
        $this->db->where('discount_id', $discount_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_discount_location');
    }
    
    public function deleteDiscount($discount_id,$company_id) {
        $this->db->where('discount_id', $discount_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_discount'); 
    }

    public function getDiscountUsingCompanyId($company_id){
//        $this->db->select('discount_id,company_id,discount_name,percentage,applicable_from,application_to,location_id,updated_date');
//        $this->db->from('pos_discount');
        $this->db->select('pos_discount.discount_id,pos_discount.company_id,pos_discount.discount_name,pos_discount.percentage, 
            pos_discount.applicable_from,pos_discount.applicable_to,pos_discount.location_id,pos_discount.updated_date,
            GROUP_CONCAT(pos_location.location_id) AS loc_id,GROUP_CONCAT(pos_location.location_name) AS locname');
        $this->db->from('pos_discount');
        $this->db->join('pos_discount_location', 'pos_discount_location.discount_id = pos_discount.discount_id','left');
        $this->db->join('pos_location', 'pos_location.location_id = pos_discount_location.location_id','left');
        if($company_id){
            $this->db->where('pos_discount.company_id',$company_id);
        }
        $this->db->group_by('pos_discount.discount_id');
        $query = $this->db->get();
        //secho $this->db->last_query(); die('SS');
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
    
    public function getDiscountUsingDiscountIdCompanyId($discount_id,$company_id){
//        $this->db->select('discount_id,company_id,discount_name,percentage,applicable_from,application_to,location_id,updated_date');
//        $this->db->from('pos_discount');
        $this->db->select('pos_discount.discount_id,pos_discount.company_id,pos_discount.discount_name,pos_discount.percentage, 
            pos_discount.applicable_from,pos_discount.applicable_to,pos_discount.location_id,pos_discount.updated_date,
            GROUP_CONCAT(pos_location.location_id) AS loc_id,GROUP_CONCAT(pos_location.location_name) AS locname');
        $this->db->from('pos_discount');
        $this->db->join('pos_discount_location', 'pos_discount_location.discount_id = pos_discount.discount_id','left');
        $this->db->join('pos_location', 'pos_location.location_id = pos_discount_location.location_id','left');
        if($company_id){
            $this->db->where('pos_discount.company_id',$company_id);
        }
        if($discount_id){
            $this->db->where('pos_discount.discount_id',$discount_id);
        }
        //$this->db->group_by('pos_discount.discount_id');
        $query = $this->db->get();
        //secho $this->db->last_query(); die('SS');
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
    
    
    public function addTax($data){
        $this->db->insert('pos_tax',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addTaxPercentage($data){
        $this->db->insert('pos_tax_percenatge',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
//    public function updateTaxPercentage($updatedata,$tax_id,$company_id){
//        $this->db->where('tax_id', $tax_id);
//        $this->db->where('company_id',$company_id);
//        $this->db->update('pos_tax_percenatge', $updatedata); 
//    }
    
    public function updateTax($updatedata,$tax_id,$company_id){
        $this->db->where('tax_id', $tax_id);
        $this->db->where('company_id',$company_id);
        $this->db->update('pos_tax', $updatedata); 
    }
    
    public function getTaxUsingCompanyId($company_id){
        //$this->db->select('tax_id,company_id,tax_name,percentage,applicable_from,updated_date');
        $this->db->select('tax_id,company_id,tax_name');
        $this->db->from('pos_tax');
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
    
    public function getTaxPercentageUsingTaxIdCompanyId($tax_id,$company_id){
        $this->db->select('tax_percentage_id,tax_id,company_id,percentage,applicable_from');
        $this->db->from('pos_tax_percenatge');
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($tax_id){
            $this->db->where('tax_id',$tax_id);
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


    public function getTaxUsingTaxIdCompanyId($tax_id='',$company_id=''){
        $this->db->select('tax_id,company_id,tax_name');
        $this->db->from('pos_tax');
        if($tax_id){
            $this->db->where('tax_id',$tax_id);
        }
        if($company_id){
            $this->db->where('company_id',$company_id);
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
    
    public function deleteTax($tax_id,$company_id) {
        $this->db->where('tax_id', $tax_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_tax'); 
    }
    
    public function deleteTaxPercentage($tax_id,$company_id) {
        $this->db->where('tax_id', $tax_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_tax_percenatge'); 
    }
    
    public function getDiscountUniqueName($discount_id,$company_id){
        $this->db->select('discount_id,discount_unique_name');
        $this->db->from('pos_discount');
        $this->db->where('company_id',$company_id);
        $this->db->where('discount_id',$discount_id);
        
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
    
    
}