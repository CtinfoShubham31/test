<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    /*Check email existance*/
    public function addAdmin($data){
        $this->db->insert('pos_admin',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateOtp($updatedata,$email){
        $this->db->where('email', $email);
        $this->db->update('pos_admin', $updatedata); 
    }
    
    public function addCompany($data){
        $this->db->insert('pos_company',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateCompany($updatedata,$admin_id,$company_id){
        $this->db->where('admin_id', $admin_id);
        $this->db->where('company_id', $company_id);
        $this->db->update('pos_company', $updatedata); 
    }
    
    public function getCompanyUsingCompanyId($company_id,$admin_id=''){
        $this->db->select('name,address,country,state,city,timezone,postal_code,contact_number,pin_no,tin_no,pan_no,currency,image_logo,booking,multiple_location,created_date');
        $this->db->from('pos_company');
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($admin_id){
            $this->db->where('admin_id',$admin_id);
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


    public function addLocation($data){
        $this->db->insert('pos_location',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getLocation($location_id='',$company_id=''){
        $this->db->select('location_id,company_id,location_name,address,country,state,city,timezone,postal_code,contact_number,created_date');
        $this->db->from('pos_location');
        if($location_id){
            $this->db->where('location_id',$location_id);
        }
        if($company_id){
            $this->db->where('company_id',$company_id);
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
    
    public function getLocationUsingCompanyId($company_id){
        $this->db->select('location_id,company_id,location_name,address,country,state,city,timezone,postal_code,contact_number,created_date');
        $this->db->from('pos_location');
        
        $this->db->where('company_id',$company_id);
        
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
    
    
    public function updateLocation($updatedata,$location_id,$company_id){
        $this->db->where('location_id', $location_id);
        $this->db->where('company_id', $company_id);
        $this->db->update('pos_location', $updatedata); 
    }
    
    
    public function deleteCompanyLocation($location_id,$company_id) {
        $this->db->where('location_id', $location_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_location'); 
    }
    
    public function getLocationUsingLocids($company_id,$loc_idarray){
        $this->db->select('location_id,location_name');
        $this->db->from('pos_location');
        
        if($loc_idarray){
            $this->db->where_in('location_id',$loc_idarray);
        }
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        //$this->db->order_by('inventory_stock_id','desc');
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
    
    
    public function addDefaultEntryOfPermission($company_id){
        $permission_data = array(
            array(
                'company_id'=>$company_id,
                'permission_name'=>'Top Manager',
                'emp_add'=>1,
                'emp_edit'=>1,
                'emp_delete'=>0,
                'inv_add'=>1,
                'inv_edit'=> 1,
                'inv_delete'=>1
            ),
            array(
                'company_id'=>$company_id,
                'permission_name'=>'Sales Manager',
                'emp_add'=>0,
                'emp_edit'=>0,
                'emp_delete'=>0,
                'inv_add'=>1,
                'inv_edit'=> 1,
                'inv_delete'=>1
            )
        );

        $this->db->insert_batch('pos_permission', $permission_data); 
    }
    
    public function addGiddhSync($company_id,$updatedata){
        $this->db->where('company_id', $company_id);
        $this->db->update('pos_company', $updatedata); 
    }
    
    public function getGiddhCompanyData($company_id){
        $this->db->select('giddh_auth_key,giddh_comp_unique_name');
        $this->db->from('pos_company');
        $this->db->where('company_id',$company_id);
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