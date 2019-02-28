<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function checkAdminData($email,$password,$company_id){
        $this->db->select('admin_id,email,password');
        $this->db->from(''.KS_ADMIN.'');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('ccccccc');
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