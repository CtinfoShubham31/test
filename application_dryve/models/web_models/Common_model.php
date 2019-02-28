<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getIndividualUserDetails($user_id){
        $this->db->select('user_id, first_name, last_name, email, profile_pic');
        $this->db->from('dw_users');
        $this->db->where('user_id',$user_id);
        
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