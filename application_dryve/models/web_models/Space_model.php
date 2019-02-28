<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Space_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    /*Add space for parking step1*/
    public function addSpaceProfile($data){
        $this->db->insert('dw_rent_spaces',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function updateRentSpace($update_data, $rent_space_id, $user_id){
        $this->db->set($update_data);
        $this->db->where('rent_space_added_by', $user_id);
        $this->db->where('rent_space_id', $rent_space_id);
        $res = $this->db->update('dw_rent_spaces');
        
        return $res;
    }
    
    
    public function getParkingSpaceDetails($rent_space_id,$user_id=''){
        $this->db->select('rent_space_id, steps_flag, rent_space_added_by, rent_user_fname, rent_user_lname, rent_user_phone, rent_user_email,
            rent_user_postal_code, rent_user_country, rent_user_address1, rent_user_address2, rent_user_city, rent_space_picture,
            rent_space_type, rent_space_number, rent_space_whoru, rent_space_feature, rent_space_description, rent_space_access_instruction,
            rent_space_day, availability_time, rent_space_fromdatetime, rent_space_todatetime, rent_space_rate, rent_space_latitude, rent_space_longitude, active');
        $this->db->from('dw_rent_spaces');
        $this->db->where('rent_space_id',$rent_space_id);
        if($user_id){
            $this->db->where('rent_space_added_by',$user_id);
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
    
    
    public function getAllWhoruData(){
        $this->db->select('whoru_id, whoru_name');
        $this->db->from('dw_whoru');
        
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
    
    public function getAllSpaceType(){
        $this->db->select('space_type_id, space_type_name');
        $this->db->from('dw_space_type');
        
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
    
    
    public function getAllSpaceDays(){
        $this->db->select('space_days_id, space_days, days_number');
        $this->db->from('dw_space_days');
        
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
    
    
    public function getMySpaces($user_id,$month='') {
        $this->db->select('dw_rent_spaces.*');
        $this->db->select("(SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating");
        $this->db->select("(SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings");
        $this->db->select("(SELECT COUNT(rent_space_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_review");
        $this->db->from('dw_rent_spaces');
        $this->db->where("dw_rent_spaces.rent_space_added_by", $user_id);
        $this->db->where("dw_rent_spaces.steps_flag", 1);
        if($month){
            $this->db->where("dw_rent_spaces.timestamp >= now()-interval $month month" );
        }
        $this->db->order_by("dw_rent_spaces.rent_space_id", "DESC");
        //$this->db->limit($limit, $offset);
        //timestamp >= now()-interval 1 month
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
    
    
    public function getSpaceIds($user_id){
        $sql = "SELECT book_rent_space_id, COUNT( book_rent_space_id ) AS number_space
                FROM dw_book_spaces
                GROUP BY book_rent_space_id";
        
        $query = $this->db->query($sql);  
        //echo $this->db->last_query(); die('eee');
        $space_id='';
        if($query->num_rows()>0)
        {
            
            $sids = array();
            $space_row = $query->result();
            //print_r($space_row);
            foreach($space_row AS $sp){
                $sq = "SELECT rent_space_number FROM dw_rent_spaces WHERE rent_space_id = $sp->book_rent_space_id ";
                $qu = $this->db->query($sq);  
                
                if($qu->num_rows()>0){
                    $rent_space_number = $qu->row()->rent_space_number;
                    if($rent_space_number == $sp->number_space){
                        $sids[] = $sp->book_rent_space_id;
                    }
                }
                
            }
            
            //$space_id = rtrim($sids,",");
            //print_r($sids);die('kkkkkk');
            
            if(!empty($sids)){
                $ids = join("','",$sids);   
                $sqll = "SELECT rent_space_id FROM dw_rent_spaces WHERE rent_space_id NOT IN ('$ids') AND rent_space_added_by NOT IN ($user_id)";
                $qy = $this->db->query($sqll);  
                if($qy->num_rows()>0)
                {
                    $final_sids = array();
                    $frow = $qy->result();
                    foreach ($frow as $fv) {
                        $final_sids[] = $fv->rent_space_id;
                    }
                    return $final_sids;
                }else{
                    return false;
                }
            }else{
                return false;
            }
            
            
        }
        else
        {
            return false;
        }
    }
    
    
    //public function getParkingSpaceData($arr_rent_space_ids,$array_of_days_no,$fromdatetime,$todatetime,$latitude,$longitude,$limit,$offset){
    public function getParkingSpaceData($arr_rent_space_ids,$array_of_days_no,$fromdatetime,$todatetime,$latitude,$longitude){
          
        $fromtime = date("H:i:s",strtotime($fromdatetime));
        $totime = date("H:i:s",strtotime($todatetime));
        
        $sql = '';
        $subsql = '';
        if(!empty($array_of_days_no)){
            //$subsql = "AND ";
            foreach($array_of_days_no AS $dno){
                $subsql .= " FIND_IN_SET($dno,rent_space_day) OR";
            }
            $subsql = rtrim($subsql,'OR');
            $subsql = " AND (".$subsql.")";
        }
        
        if(!empty($arr_rent_space_ids)){
            $ids = join("','",$arr_rent_space_ids);   
            $sql .= "SELECT dw_rent_spaces.*, (((acos(sin((" . $latitude . "*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos((" . $latitude . "*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos(((" . $longitude . "- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance
                    , (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
                    (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
                    ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
                    FROM dw_rent_spaces WHERE rent_space_id IN ('$ids') AND dw_rent_spaces.active=1 AND (rent_space_fromdatetime < '".$fromtime."'
                    AND rent_space_todatetime > '".$totime."') $subsql";
           // $sql .= "LIMIT $limit OFFSET $offset "; 
        }else{
            $sql = "SELECT * FROM dw_rent_spaces ";
        }
        $query = $this->db->query($sql);  
        //echo $this->db->last_query(); die('eee');
        
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
    
    
    public function searchParkingSpaceRecord($user_id,$fromdatetime,$todatetime,$array_of_days_no,$latitude,$longitude){
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
        
//        $sql .= "SELECT dw_rent_spaces.*, (((acos(sin((" . $latitude . "*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos((" . $latitude . "*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos(((" . $longitude . "- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance
//                    , (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
//                    (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
//                    ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
//                    FROM dw_rent_spaces WHERE rent_space_id IN ('$ids') AND dw_rent_spaces.active=1 AND (rent_space_fromdatetime < '".$fromtime."'
//                    AND rent_space_todatetime > '".$totime."') $subsql";
        
        
        $sql = "SELECT dw_rent_spaces.*, (((acos(sin(('".$latitude."'*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos(('".$latitude."'*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos((('".$longitude."'- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance, 
        (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
        (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
         ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
        FROM dw_rent_spaces WHERE active=1 AND ((rent_space_fromdatetime <= '$fromtime' AND rent_space_todatetime >= '$totime') OR (rent_space_fromdatetime <= '00:00:00' AND rent_space_todatetime >= '00:00:00')) 
        AND rent_space_added_by != $user_id $subsql HAVING distance<='10' ";
        
//        $sql = " SELECT * FROM dw_rent_spaces WHERE active=1 AND ((rent_space_fromdatetime <= '$fromdatetime' AND rent_space_todatetime >= '$todatetime') OR (rent_space_fromdatetime <= '00:00:00' AND rent_space_todatetime >= '00:00:00')) 
//AND rent_space_added_by != $user_id $subsql ";
        
        $query = $this->db->query($sql);  
        //echo $this->db->last_query(); die('eee');
        if($query->num_rows()>0)
        {
            $srecord = array();
            $space_row = $query->result();
            //print_r($space_row);
            foreach($space_row AS $sp){
                $sq = "SELECT * FROM dw_book_spaces WHERE book_rent_space_id = $sp->rent_space_id AND (book_space_fromdatetime < '$todatetime' AND book_space_todatetime > '$fromdatetime') ";
               //echo '<br/>'; 
               $qu = $this->db->query($sq);  
                
//                if($qu->num_rows()>0 && ($sp->rent_space_number == $qu->num_rows())){
//                    echo "No search";
//                }else{
//                    echo "Search";
//                    $srecord[] = $sp;
//                }
               //echo $sp->rent_space_id.'   '.$sp->rent_space_number.'=='. $qu->num_rows();
               //echo '<br>';
                if($qu->num_rows() == 0){
                    $srecord[] = $sp;
                }
                else if($qu->num_rows()>0 && ($sp->rent_space_number != $qu->num_rows())){
                    $srecord[] = $sp;
                }
            }
            //die('cccc');
            //echo '<br/>';
            //print_r($srecord); die('kooooooooo');
            return $srecord;
        }else{
            return false;
        }
    }
    
    
}