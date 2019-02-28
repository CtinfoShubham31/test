<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Admin_user_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getUsers(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->db->select('user_id, first_name, last_name, email, company_id, is_super_user');
        $this->db->from(''.USER.'');
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
            return array();
        }
    }
    
    
    /*Get User lists in response*/
    public function getUserListsResponse($total_count,$supu){
        // initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;
        $totalRecords = $total_count;
        
        //define index of column
        $columns = array(0 => ''.USER.'.first_name',1 => ''.USER.'.last_name',2 => ''.USER.'.email');
        
        $where = $sqlTot = $sqlRec = "";
        
        if(!empty($params['search']['value'])) {   
            $where .=" AND ";
            $where .=" ( ".USER.".first_name LIKE '".$params['search']['value']."%' "; 
            $where .=" OR ".USER.".last_name LIKE '".$params['search']['value']."%' ";
            $where .=" OR ".USER.".email LIKE '".$params['search']['value']."%' )";
        }
        else if(!empty($supu) && $supu == 1){
            $where .=" AND is_super_user = 1";
        }else if(!empty($supu) && $supu == 2){
            $where .=" AND is_super_user = 0";
        }
        
        $sql = "SELECT user_id, first_name, last_name, email, company_id, is_super_user
            FROM ".USER." Where login_status = 1";
        
        $sqlTot .= $sql;
        $sqlRec .= $sql;
        
        //concatenate search sql if value exist
        if(isset($where) && $where != '') {
            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        
        $total_rows = $this->db->query($sqlRec);
        $totalRecords = $total_rows->num_rows();
        
        $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
        
        $query = $this->db->query($sqlRec);
        
        //echo $this->db->last_query(); die;
        if($query->num_rows()>0)
        {
            $row = $query->result();
            foreach($row as $user_data){
                $first_name = $user_data->first_name; 
                $last_name = $user_data->last_name; 
                $email = $user_data->email;
                $user_id = $user_data->user_id;
                $supuser_status = $user_data->is_super_user;
                $action = '<i class="fa fa-trash" title="Delete" style="cursor:pointer" onclick="deleteUser(this,'.$user_id.')" ></i>';
                
                if($supuser_status == 1){
                    $supuser_status = '<span><button id="sup'.$user_id.'" onclick="superUserStatus('.$user_id.')" class="btn btn-success admin-btn">Yes</button></span>';
                }else{
                    $supuser_status = '<span><button id="sup'.$user_id.'" onclick="superUserStatus('.$user_id.')" class="btn btn-danger admin-btn">No</button></span>';
                }
                
                $data[] = array("$first_name", "$last_name", "$email", "$supuser_status", "$action");
            }
            
            $json_data = array(
                "draw"            => intval( $params['draw'] ),   
                "recordsTotal"    => intval( $totalRecords ),  
                "recordsFiltered" => intval($totalRecords),
                "data"            => $data   // total data array
            );
            
            echo json_encode($json_data);  // send data as json format
            
        }
        else
        {
            $json_data = array(
                "draw"            => intval( $params['draw'] ),   
                "recordsTotal"    => intval(0),  
                "recordsFiltered" => intval(0),
                "data"            => $data   // total data array
            );
            echo json_encode($json_data);
            return false;
        }
        
    }
    
    public function updateUserData($user_id,$company_id,$data){
        $this->db->where('user_id', $user_id);
        $this->db->where('company_id', $company_id);
        $res = $this->db->update(''.USER.'', $data);
        return $res;
    }
    
    /*Check email existance*/
    public function checkEmailExistance($email){
        $this->db->select('user_id');
        $this->db->from(''.USER.'');
        $this->db->where(''.USER.'.email',$email);
        
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
    
    public function registerUser($data){
        $this->db->insert(''.USER.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    
    
}