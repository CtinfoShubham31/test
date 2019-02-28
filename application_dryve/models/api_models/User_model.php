<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //----------------------User signup------------------

    public function user_signup($data) {
        
        $data = $this->db->escape_str($data);
        
        $res = $this->db->insert('dw_users', $data);
        if ($res) {
            $this->db->select('`user_id`, `first_name`, `last_name`, `email`, profile_pic, `facebook_id`, `google_id`, `verify_status`, verify_token');
            $this->db->from('dw_users');
            $this->db->where('user_id', $this->db->insert_id());
            $query = $this->db->get();
            return $query->row();
        } else {
            return false;
        }
    }

    // -------------------Check email already exists-------------------

    public function check_user_email($email) {
        $this->db->select('`user_id`, `first_name`, `last_name`, `email`, profile_pic, `facebook_id`, `google_id`, `verify_status`');
        $this->db->from('dw_users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    //-------------------Check user login-------------------

    public function check_user_login($param) {
        $this->db->select('`user_id`, `first_name`, `last_name`, `email`, profile_pic, `facebook_id`, `google_id`, `verify_status`');
        $this->db->from('dw_users');
        $this->db->where($param);
        $query = $this->db->get();
        return $query->row();
    }

    //--------------------Update fcm id--------------
    
    public function update_fcm_token($user_id, $device_token) {
        $this->db->set('device_token', $device_token);
        $this->db->where('user_id', $user_id);
        $res = $this->db->update('dw_users');
        return $res;
    }
    
    
    //--------------------Update user--------------
    
    public function update_user($user_id, $data) {
        $this->db->set($data);
        $this->db->where('user_id', $user_id);
        $res = $this->db->update('dw_users');
        return $res;
    }
    
    
    //--------------------add to forgot password-----------------
    
    function add_to_forgot_pwd($email, $otp){
        $this->db->select('`user_id`, `first_name`, `last_name`, `email`, `verify_status`');
        $this->db->from('dw_users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $emailres = $query->row();
        
        if(!empty($emailres)){
            $data['email'] = $emailres->email;
            $data['otp'] = $otp;
            $data['expire_on'] = date('Y-m-d H:i:s', strtotime("2 HOURS")); //"DATE_ADD(NOW(),INTERVAL 2 HOUR)";
            $insres = $this->db->insert('dw_forgot_password', $data);
            if($insres){
                return $emailres;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    //---------------------check_otp_update_pwd-----------------
    
    public function check_otp_update_pwd($email, $otp, $password) {
        $this->db->select('`email`');
        $this->db->from('dw_forgot_password');
        $this->db->where('email', $email);
        $this->db->where('otp', $otp);
        $this->db->where('expire_on >=', date('Y-m-d H:i:s'));
        $query = $this->db->get();
        $fpres = $query->row();
        if(!empty($fpres)){
            $this->db->set('password', $password);
            $this->db->where('email', $fpres->email);
            $res = $this->db->update('dw_users');
            if($res){
                $this->db->set('expire_on', date('Y-m-d H:i:s'));
                $this->db->where('email', $fpres->email);
                $this->db->where('expire_on >=', date('Y-m-d H:i:s'));
                $this->db->update('dw_forgot_password');
                
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    //---------------------Search parking space-------------------------
    
    public function search_parking_space($latitude, $longitude, $fromdatetime, $todatetime, $offset, $limit) {
        
        //DATE_FORMAT(`rent_space_fromdatetime`,'%Y-%m-%d %H:%i:%s')
        //DATE_FORMAT(`rent_space_todatetime`,'%Y-%m-%d %H:%i:%s')
        
        $this->db->select('*');
        $this->db->select("(((acos(sin((" . $latitude . "*pi()/180)) * sin(( rent_space_latitude *pi()/180))+cos((" . $latitude . "*pi()/180)) * cos(( rent_space_latitude *pi()/180)) * cos(((" . $longitude . "- rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance");  //in miles
        $this->db->from('dw_rent_spaces');
        $this->db->where("DATE_FORMAT(`rent_space_fromdatetime`,'%Y-%m-%d %H:%i:%s') <= DATE_FORMAT('".$fromdatetime."','%Y-%m-%d %H:%i:%s')");
        $this->db->where("DATE_FORMAT(`rent_space_todatetime`,'%Y-%m-%d %H:%i:%s') >= DATE_FORMAT('".$todatetime."','%Y-%m-%d %H:%i:%s')");
        $this->db->order_by("distance", "ASC");
        $this->db->limit($limit, $offset);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    //-------------------------------add_user_vehicle--------------------
    
    public function add_user_vehicle($data){
        
        $res = $this->db->insert('dw_user_vehicles', $data);
        return $res;
    }
    
    //-------------------------------add_user_vehicle--------------------
    
    public function get_user_vehicle($user_id){
        
        $this->db->select('*');
        $this->db->from('dw_user_vehicles');
        $this->db->where("user_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function getUserDetailsUsingId($user_id,$contact_no=''){
        $this->db->select('user_id, first_name, last_name, email, profile_pic, contact_no');
        $this->db->from('dw_users');
        $this->db->where('user_id', $user_id);
        if($contact_no){
            $this->db->where('contact_no', $contact_no);
        }
        $query = $this->db->get();
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
