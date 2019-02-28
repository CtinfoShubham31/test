<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function addPermission($data){
        $this->db->insert('pos_permission',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updatePermission($updatedata,$permission_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('permission_id', $permission_id);
        $this->db->update('pos_permission', $updatedata); 
    }
    
    public function getPermissionUsingCompanyId($company_id){
        $this->db->select('permission_id,company_id,permission_name,emp_add,emp_edit,emp_delete,inv_add,inv_edit,inv_delete');
        $this->db->from('pos_permission');
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
    
    public function getPermissionUsingPermissionIdCompanyId($permission_id='',$company_id=''){
        $this->db->select('permission_id,company_id,permission_name,emp_add,emp_edit,emp_delete,inv_add,inv_edit,inv_delete');
        $this->db->from('pos_permission');
        if($permission_id){
            $this->db->where('permission_id',$permission_id);
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
    
    
    public function deletePermission($permission_id,$company_id) {
        $this->db->where('permission_id', $permission_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_permission'); 
    }
    
    
}