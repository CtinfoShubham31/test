<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    /*Check email existance*/
    public function checkEmailExistance($email){
        $this->db->select('email,admin_id');
        $this->db->from('pos_admin');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getAdminData($email,$otp=''){
        $this->db->select('admin_id,email,otp,created_date');
        $this->db->from('pos_admin');
        $this->db->where('email',$email);
        if($otp){
            $this->db->where('otp',$otp);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows() == 1)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getAdminDataUsingId($admin_id){
        $this->db->select('admin_id,email,otp,created_date');
        $this->db->from('pos_admin');
        $this->db->where('admin_id',$admin_id);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows() == 1)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getTimeZone(){
        $this->db->select('time_zone_id,zone');
        $this->db->from('pos_timezone');
        
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
    
    public function getCompany($company_id='',$admin_id=''){
        $this->db->select('company_id,admin_id,name,address,email,country,state,city,timezone,postal_code,contact_number,currency,pin_no,tin_no,pan_no,image_logo,booking,multiple_location,created_date');
        $this->db->from('pos_company');
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($admin_id){
            $this->db->where('admin_id',$admin_id);
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

    public function getGiddhCompanyInfo($company_id){
        $this->db->select('giddh_comp_unique_name,giddh_auth_key');
        $this->db->from('pos_company');
        $this->db->where('company_id',$company_id);
        
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