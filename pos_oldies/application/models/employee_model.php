<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function addEmployee($data){
        $this->db->insert('pos_employee',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateEmployee($updatedata,$employee_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('employee_id', $employee_id);
        $this->db->update('pos_employee', $updatedata); 
    }
    
    public function getEmployeeUsingCompanyId($company_id){
        $this->db->select('employee_id,company_id,employee_name,emp_pic,emp_contact,emp_email,permission,emp_address,employee_under,location_id');
        $this->db->from('pos_employee');
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
    
    public function getEmployeeUsingEmployeeIdCompanyId($employee_id='',$company_id='', $email='', $password=''){
        $this->db->select('employee_id,company_id,employee_name,emp_pic,emp_contact,emp_email,permission,emp_password,emp_address,employee_under,location_id');
        $this->db->from('pos_employee');
        if($employee_id){
            $this->db->where('employee_id',$employee_id);
        }
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($email){
            $this->db->where('emp_email',$email);
        }
        if($password){
            $this->db->where('emp_password',$password);
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
    
    public function checkEmailExistance($email,$company_id){
        $this->db->select('emp_email');
        $this->db->from('pos_employee');
        if($email){
            $this->db->where('emp_email',$email);
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




    public function getEmployeeDetailsRecords($company_id){
        $this->db->select('e.employee_id, e.employee_name, parents.employee_id AS pempid, parents.employee_name AS emp_name,
            parents.emp_contact,parents.emp_email, parents.employee_under,parents.permission,pos_permission.permission_name');
        $this->db->from('pos_employee AS e');
        $this->db->join('pos_employee AS parents', 'parents.employee_under = e.employee_id','right');
        $this->db->join('pos_permission', 'pos_permission.permission_id = parents.permission','left');
        $this->db->order_by("pempid", "desc");
        
        if($company_id){
            $this->db->where('parents.company_id',$company_id);
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




    public function deleteEmployee($employee_id,$company_id) {
        $this->db->where('employee_id', $employee_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_employee'); 
    }
    
    
    public function addOpeningAmount($data){
        $this->db->insert('pos_cash_counter',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getCashCounterByDate($company_id,$employee_id,$login_date){
        $this->db->select('cash_counter_id,company_id,employee_id,login_date,opening_amt,closing_amt');
        $this->db->from('pos_cash_counter');
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($employee_id){
            $this->db->where('employee_id',$employee_id);
        }
        if($login_date){
            $this->db->where('login_date',$login_date);
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
    
    
    public function getPaymentMethod(){
        $this->db->select('payment_method_id,payment_type');
        $this->db->from('pos_payment_method');
        
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
    
    
}