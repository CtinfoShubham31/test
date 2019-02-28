<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    //-------------------Check user login-------------------

    public function check_user_login($param) {
        $this->db->select('user_id, first_name, last_name, email, login_status, is_super_user');
        $this->db->from(''.USER.'');
        $this->db->where($param);
        $query = $this->db->get();
        return $query->row();
    }
    
//    function categoryTree($parent_id = 0, $sub_mark = ''){
//        global $db;
//        $query = $db->query("SELECT * FROM categories WHERE parent_id = $parent_id ORDER BY name ASC");
//
//        if($query->num_rows > 0){
//            while($row = $query->fetch_assoc()){
//                echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
//                categoryTree($row['id'], $sub_mark.'---');
//            }
//        }
//    }
    
    public function labelTree($parent_id = 0, $sub_mark = ''){
        $sql = "SELECT * FROM ".LABEL." WHERE label_parent_id = $parent_id ORDER BY lable_name ASC";
        
        $query = $this->db->query($sqlRec);
        
        //echo $this->db->last_query(); die;
        if($query->num_rows()>0)
        {
            $row = $query->result();
            foreach($row as $label_data){
                echo '<option value="'.$label_data->label_id.'">'.$sub_mark.$label_data->lable_name.'</option>';
                labelTree($row['label_id'], $sub_mark.'---');
            }
        }else{
            return ;
        }
    }
    
    public function getCoOwners($users_array){
        $this->db->select('user_id, first_name, last_name, email, company_id');
        $this->db->from(''.USER.'');

        $this->db->where_in('user_id', $users_array);
        
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
    
    //--------Set Password flag in fit_users table-------
    public function updateUserInfo($user_id,$company_id,$data){
        $this->db->where('user_id', $user_id);
        $this->db->where('company_id', $company_id);
        $res = $this->db->update(''.USER.'', $data);
        return $res;
    }
    
    /*Get labels which not ceated by logged in user*/
    public function getLabels($parent_id = 0, $sub_mark = ''){
        $sql = "SELECT * FROM ".LABEL." WHERE label_parent_id = $parent_id AND company_id = $company_id ORDER BY label_name ASC";
        
        $query = $this->db->query($sql);
        
        //echo $this->db->last_query(); die;
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }else{
            return ;
        }
    }
    
}