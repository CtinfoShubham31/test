<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //----------------------User signup------------------

//    public function user_signup($data) {
//        
//        $data = $this->db->escape_str($data);
//        
//        $res = $this->db->insert('dw_users', $data);
//        if ($res) {
//            $this->db->select('`user_id`, `first_name`, `last_name`, `email`, profile_pic, `facebook_id`, `google_id`, `verify_status`, verify_token');
//            $this->db->from('dw_users');
//            $this->db->where('user_id', $this->db->insert_id());
//            $query = $this->db->get();
//            return $query->row();
//        } else {
//            return false;
//        }
//    }

    //-----------------------Check verify account----------------

    public function check_verify_account_hash($email, $hash) {
        $this->db->select('*');
        $this->db->from('dw_users');
        $this->db->where('email', $email);
        $this->db->where('verify_token', $hash);
        $query = $this->db->get();
        return $query->row();
    }

    //-------------------Update account after verify-------------------

    public function update_account_after_verify($user_id) {
        $this->db->set('verify_status', 1);
        $this->db->set('verify_token', md5(time()));
        $this->db->where('user_id', $user_id);
        $res = $this->db->update('dw_users');
        return $res;
    }

    //-------------------Check user login-------------------

    public function check_user_login($param) {
        $this->db->select('user_id, first_name, last_name, email, profile_pic, facebook_id, google_id, verify_status');
        $this->db->from('dw_users');
        $this->db->where($param);
        $query = $this->db->get();
        return $query->row();
    }
    
    
    
    public function registerUser($data){
        $this->db->insert('dw_users',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    /*Check email existance*/
    public function checkEmailExistance($email){
        $this->db->select('user_id');
        $this->db->from('dw_users');
        $this->db->where('email',$email);
        
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
