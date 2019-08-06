<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Learning_model extends CI_Model {
    /** Constructor **/
    function __construct() {
        parent::__construct();
    }
    
    /*-----Add Learning(Listening) Data-------*/
    public function addListeningByUser($data){
        $this->db->insert('germ_user_listening',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    /*Get user to listening data for leaning*/
    public function getDaysOfUser($user_id=''){

        $this->db->select('germ_learning_data.days,germ_usertest_percentages.percentage');
        $this->db->from('germ_user_listening');
        $this->db->join('germ_learning_data', 'germ_user_listening.learning_dataid = germ_learning_data.learning_dataid','left');
        $this->db->join('germ_usertest_percentages', 'germ_learning_data.days = germ_usertest_percentages.days','left');
        if(!empty($user_id)){
            $this->db->where('germ_usertest_percentages.user_id', $user_id);
        }
        $this->db->group_by('germ_learning_data.days'); 
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->result();
            return $row;
        }
        else
        {
            return '';
        }
    }
    
    /*Get user to listening data for leaning*/
    public function getListeningUserData($user_id='',$days='',$parts=''){

        $this->db->select('germ_user_listening.listening_id,germ_user_listening.learning_dataid,germ_user_listening.user_id,
            germ_user_listening.status,germ_user_listening.created_date, germ_user_listening.listening_count, germ_learning_data.listening_video,
            germ_learning_data.parts,germ_learning_data.listening_voice,germ_learning_data.days,germ_learning_data.listening_text, 
            germ_learning_data.english_text,germ_learning_data.spanish_text');
        $this->db->from('germ_user_listening');
        $this->db->join('germ_learning_data', 'germ_user_listening.learning_dataid = germ_learning_data.learning_dataid','left');
        if(!empty($user_id)){
            $this->db->where('germ_user_listening.user_id', $user_id);
        }
        if(!empty($days)){
            $this->db->where('germ_learning_data.days', $days);
        }
        if(!empty($parts)){
            $this->db->where('germ_learning_data.parts', $parts);
        }
        //$this->db->group_by('germ_learning_data.days'); 
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->result();
            return $row;
        }
        else
        {
            return '';
        }
    }
    
    /*Get single row of listening user data using listening id*/
    public function getUserListeningUsingLid($listening_id='',$user_id='',$learning_dataid=''){
        $this->db->select('listening_id,learning_dataid,user_id,status,created_date');
        $this->db->from('germ_user_listening');
        if(!empty($listening_id)){
            $this->db->where('listening_id', $listening_id);
        }
        if(!empty($user_id)){
            $this->db->where('user_id', $user_id);
        }
        if(!empty($learning_dataid)){
            $this->db->where('learning_dataid', $learning_dataid);
        }
        //$this->db->group_by('germ_learning_data.days'); 
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->row();
            return $row;
        }
        else
        {
            return '';
        }
    }


    /*Update status for listening*/
    public function updateListeningStatus($listening_id,$user_id,$updatedata){
        $this->db->where('listening_id', $listening_id);
        $this->db->where('user_id', $user_id);
        $this->db->update('germ_user_listening', $updatedata);
    }
    
    /*Get save listening data using days and parts*/
    public function getListeningUsingDaysParts($days='',$parts=''){
        $this->db->select('learning_dataid,days,parts,listening_text,english_text,spanish_text,listening_voice,listening_video');
        $this->db->from('germ_learning_data');
        if(!empty($days)){
            $this->db->where('days', $days);
        }
        if(!empty($parts)){
            $this->db->where('parts', $parts);
        }
        //$this->db->group_by('germ_learning_data.days'); 
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->row();
            return $row;
        }
        else
        {
            return '';
        }
    }
    
    /*Get german course from ndays to ndays*/
    public function fetchCourseUsingDays($array_days){
        $this->db->select('learning_dataid, days, parts, listening_voice, listening_video');
        $this->db->from('germ_learning_data');
        if(!empty($array_days)){
            $this->db->where_in('days', $array_days);
        }
//        if(!empty($parts)){
//            $this->db->where('parts', $parts);
//        }
        $this->db->order_by("parts", "asc");
        //$this->db->order_by("days", "asc");
        //$this->db->where('admin_type', 1);
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
    
    /*Add user test percentage daywise.*/
    public function addUserTestPercentage($data){
        $this->db->insert('germ_usertest_percentages',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function getLearningData($learning_dataid){
        $this->db->select('learning_dataid, days, parts, listening_voice, listening_video');
        $this->db->from('germ_learning_data');
        $this->db->where_in('learning_dataid', $learning_dataid);
        $this->db->order_by("parts", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
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