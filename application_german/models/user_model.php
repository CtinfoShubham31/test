<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    /*Add User data into germ_user table*/
    public function addUser($data){
        $this->db->insert('germ_user',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    /*Check user is login or not.*/
    public function checkLogin($username,$password){
        $this->db->select('user_id, name, username, email, profile_pic');
        $this->db->from('germ_user');
        //$this->db->where('email', $username);
        $this->db->where("(email='$username' OR username='$username')", NULL, FALSE);
        $this->db->where('password', MD5($password));

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
    
    public function checkEmailExistance($user_email){
        $sql = "SELECT user_id, email FROM germ_user WHERE email = ? ";
        $query = $this->db->query($sql, array($user_email));
        if($query->num_rows()==1){
            return true;
        }
        else{
            return false;
        }

    }
    
    public function checkUsernameExistance($username){
        $sql = "SELECT user_id, username, email FROM germ_user WHERE username = ? ";
        $query = $this->db->query($sql, array($username));
        if($query->num_rows()==1){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function getUserDetails($user_email){
        $sql = "SELECT user_id,name, email FROM germ_user WHERE email = ? ";
        $query = $this->db->query($sql, array($user_email));
        if($query->num_rows()==1){
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }

    }
    
    public function updateUserDetailsUsingEmail($email,$update){
        $this->db->where('email', $email);
        $this->db->update('germ_user', $update);
    }
    
    public function checkopt_iscorrect($email,$otp){
        $this->db->select('user_id, name, username, email, profile_pic');
        $this->db->from('germ_user');
        $this->db->where('otp', $otp);
        $this->db->where('email', $email);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
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
    
    
    public function updateUserpassword($email,$otp,$update){
        $this->db->where('email', $email);
        $this->db->where('otp', $otp);
        $this->db->update('germ_user', $update);
    }
    
    public function test(){
        $this->db->select('id,img,text');
        $this->db->from('test');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
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