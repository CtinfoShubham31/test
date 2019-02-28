<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Book_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
    public function getSpaceDetailsForBookingPurpose($rent_space_id,$latitude,$longitude,$user_id,$fromdatetime,$todatetime){
        $sql = "SELECT dw_rent_spaces.*, (((acos(sin(('".$latitude."'*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos(('".$latitude."'*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos((('".$longitude."'- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance, 
        (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
        (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
         ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
        FROM dw_rent_spaces WHERE active=1 AND rent_space_id = $rent_space_id
        AND rent_space_added_by != $user_id ";
        
        $query = $this->db->query($sql);  
        //echo $this->db->last_query(); die('eee');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }
        
    }
    
    public function getParkingDetails($rent_space_id,$user_id=''){
        $this->db->select('rent_space_id, steps_flag, rent_space_added_by, rent_user_fname, rent_user_lname, rent_user_phone, rent_user_email,
            rent_user_postal_code, rent_user_country, rent_user_address1, rent_user_address2, rent_user_city, rent_space_picture,
            rent_space_type, rent_space_number, rent_space_whoru, rent_space_feature, rent_space_description, rent_space_access_instruction,
            rent_space_day, availability_time, rent_space_fromdatetime, rent_space_todatetime, rent_space_rate, rent_space_latitude, rent_space_longitude, active');
        $this->db->from('dw_rent_spaces');
        $this->db->where('rent_space_id',$rent_space_id);
        if($user_id){
            $this->db->where('rent_space_added_by !=',$user_id);
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
    
    
    public function checkVehicleExistance($user_id,$vehicle_number){
        $this->db->select('user_vehicle_id, user_id, vehicle_number');
        $this->db->from('dw_user_vehicles');
        $this->db->where('user_id',$user_id);
        $this->db->where('vehicle_number',$vehicle_number);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
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
    
    
    /*Add space for parking step1*/
    public function addVehicle($data){
        $this->db->insert('dw_user_vehicles',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function vehicleSearch($term,$user_id){
        $this->db->select('user_vehicle_id, vehicle_number');
        $this->db->from('dw_user_vehicles');
        $this->db->like('vehicle_number', $term); 
        $this->db->where('user_id',$user_id);
        
        
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
    
    /*Add space for parking step1*/
    public function bookSpace($data){
        $this->db->insert('dw_book_spaces',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function checkAvailablityForBookingPurpose($rent_space_id,$latitude,$longitude,$user_id,$fromdatetime,$todatetime){
        $sql = "SELECT dw_rent_spaces.*, (((acos(sin(('".$latitude."'*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos(('".$latitude."'*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos((('".$longitude."'- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance, 
        (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
        (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
         ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
        FROM dw_rent_spaces WHERE active=1 AND rent_space_id = $rent_space_id
        AND rent_space_added_by != $user_id ";
        
        $query = $this->db->query($sql);  
        //echo $this->db->last_query(); die('eee');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }
        
    }
    
    
    public function searchParkingSpaceRecord($user_id,$fromdatetime,$todatetime,$array_of_days_no,$latitude,$longitude,$rent_space_id){
        //echo $fromdatetime .' '.$todatetime;
        $fromtime = date("H:i:s",strtotime($fromdatetime));
        $totime = date("H:i:s",strtotime($todatetime));
        
        $subsql = '';
        if(!empty($array_of_days_no)){
            //$subsql = "AND ";
            foreach($array_of_days_no AS $dno){
                $subsql .= " FIND_IN_SET($dno,rent_space_day) OR";
            }
            $subsql = rtrim($subsql,'OR');
            $subsql = " AND (".$subsql.")";
        }

        
        $sql = "SELECT dw_rent_spaces.*, (((acos(sin(('".$latitude."'*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos(('".$latitude."'*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos((('".$longitude."'- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance, 
        (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
        (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
         ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
        FROM dw_rent_spaces WHERE active=1 AND ((rent_space_fromdatetime <= '$fromtime' AND rent_space_todatetime >= '$totime') OR (rent_space_fromdatetime <= '00:00:00' AND rent_space_todatetime >= '00:00:00')) 
        AND rent_space_added_by != $user_id $subsql HAVING distance<='10' AND rent_space_id = $rent_space_id ";
        
        
        $query = $this->db->query($sql);  
        //echo $this->db->last_query(); die('eee');
        if($query->num_rows()==1)
        {
            $srecord = array();
            $space_row = $query->row();
            //print_r($space_row);
            
            $sq = "SELECT * FROM dw_book_spaces WHERE book_rent_space_id = $space_row->rent_space_id AND (book_space_fromdatetime < '$todatetime' AND book_space_todatetime > '$fromdatetime') ";
            //echo '<br/>'; 
            $qu = $this->db->query($sq);  
                
            if($qu->num_rows() == 0){
                $srecord[] = $space_row;
            }
            else if($qu->num_rows()>0 && ($space_row->rent_space_number != $qu->num_rows())){
                $srecord[] = $space_row;
            }
           
            //echo '<br/>';
            //print_r($srecord); die('kooooooooo');
            return $srecord;
        }else{
            return false;
        }
    }
    
    
    public function getMyBookings($user_id){
        $this->db->select("dw_book_spaces.*, dw_rent_spaces.rent_space_picture, dw_users.profile_pic");
        $this->db->select("(SELECT AVG(`rating`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_rent_spaces.rent_space_id) avg_rating");
        $this->db->select("(SELECT COUNT(`rating_id`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_rent_spaces.rent_space_id) total_ratings");
        $this->db->from('dw_book_spaces');
        $this->db->join('dw_rent_spaces', 'dw_book_spaces.book_rent_space_id = dw_rent_spaces.rent_space_id', 'INNER');
        $this->db->join('dw_users', 'dw_book_spaces.book_rent_space_added_by = dw_users.user_id', 'INNER');
        $this->db->where("dw_book_spaces.book_space_user_id", $user_id);
//        if($month){
//            $this->db->where("dw_book_spaces.timestamp >= now()-interval $month month" );
//        }
        $this->db->order_by("dw_book_spaces.book_space_id", "DESC");
        //$this->db->limit($limit, $offset);
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
    
    public function getMyRecievedBookings($user_id){
        
        $this->db->select(
                "dw_book_spaces.`book_space_id`, `dw_book_spaces.book_rent_user_fname`, `dw_book_spaces.book_rent_user_lname`, dw_book_spaces.`book_rent_space_id`,dw_book_spaces.`book_rent_user_address1`, dw_book_spaces.`book_space_vehicle_number`, dw_book_spaces.`book_space_fromdatetime`, dw_book_spaces.`book_space_todatetime`, dw_book_spaces.`book_rent_space_duration`, dw_book_spaces.`book_rent_space_rate`, dw_book_spaces.`book_space_paid_amt`, dw_book_spaces.`book_space_payment_status`, dw_book_spaces.`booking_date`,"
                . "dw_users.`user_id`, dw_users.`first_name`, dw_users.`last_name`, dw_users.`email`, dw_users.`profile_pic`, dw_users.`contact_no`"
                );
        $this->db->from('dw_book_spaces');
        $this->db->select("(SELECT AVG(`rating`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_book_spaces.book_rent_space_id) avg_rating");
        $this->db->select("(SELECT COUNT(`rating_id`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_book_spaces.book_rent_space_id) total_ratings");
        $this->db->join('dw_users', 'dw_book_spaces.book_space_user_id = dw_users.user_id', 'INNER');
        $this->db->where("book_rent_space_added_by", $user_id);
//        if($month){
//            $this->db->where("dw_book_spaces.timestamp >= now()-interval $month month" );
//        }
        $this->db->order_by("dw_book_spaces.book_space_id", "DESC");
        //$this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
}