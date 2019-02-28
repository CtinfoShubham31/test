<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Space_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //---------------------Add rent space-------------------
    
    public function add_rent_space($data){
        
        $data = $this->db->escape_str($data);
        
        $res = $this->db->insert('dw_rent_spaces', $data);
        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    //---------------------Search parking space-------------------------
    
    public function search_parking_space($latitude, $longitude, $fromdatetime, $todatetime, $offset, $limit) {
        
        //DATE_FORMAT(`rent_space_fromdatetime`,'%Y-%m-%d %H:%i:%s')
        //DATE_FORMAT(`rent_space_todatetime`,'%Y-%m-%d %H:%i:%s')
        
        $this->db->select('dw_rent_spaces.*');
        $this->db->select("(((acos(sin((" . $latitude . "*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos((" . $latitude . "*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos(((" . $longitude . "- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance");  //in miles
        $this->db->select("ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours");
        $this->db->select("(SELECT AVG(`rating`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_rent_spaces.rent_space_id) avg_rating");
        $this->db->select("(SELECT COUNT(`rating_id`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_rent_spaces.rent_space_id) total_ratings");
        $this->db->from('dw_rent_spaces');
        $this->db->join('dw_book_spaces', 'dw_rent_spaces.rent_space_id = dw_book_spaces.book_rent_space_id', 'LEFT');
        $this->db->where("DATE_FORMAT(dw_rent_spaces.`rent_space_fromdatetime`,'%Y-%m-%d %H:%i:%s') <= DATE_FORMAT('".$fromdatetime."','%Y-%m-%d %H:%i:%s')");
        $this->db->where("DATE_FORMAT(dw_rent_spaces.`rent_space_todatetime`,'%Y-%m-%d %H:%i:%s') >= DATE_FORMAT('".$todatetime."','%Y-%m-%d %H:%i:%s')");
        $this->db->where("((DATE_FORMAT('".$fromdatetime."','%Y-%m-%d %H:%i:%s') < DATE_FORMAT(dw_book_spaces.`book_space_fromdatetime`,'%Y-%m-%d %H:%i:%s') AND DATE_FORMAT('".$todatetime."','%Y-%m-%d %H:%i:%s') < DATE_FORMAT(dw_book_spaces.`book_space_todatetime`,'%Y-%m-%d %H:%i:%s')) OR (DATE_FORMAT('".$fromdatetime."','%Y-%m-%d %H:%i:%s') > DATE_FORMAT(dw_book_spaces.`book_space_fromdatetime`,'%Y-%m-%d %H:%i:%s') AND DATE_FORMAT('".$todatetime."','%Y-%m-%d %H:%i:%s') > DATE_FORMAT(dw_book_spaces.`book_space_todatetime`,'%Y-%m-%d %H:%i:%s')))");
        $this->db->where("dw_rent_spaces.active", 1);
        $this->db->group_by("dw_rent_spaces.rent_space_id");
        $this->db->order_by("distance", "ASC");
        $this->db->limit($limit, $offset);
        
        $query = $this->db->get();
        //print_r($this->db->last_query());exit();
        return $query->result();
    }
    
    //--------------------------add_to_book_space-----------------------
    
    public function add_to_book_space($data){
        
        $data = $this->db->escape_str($data);
        
        $res = $this->db->query(
                "INSERT INTO `dw_book_spaces`(`book_space_user_id`, `book_space_vehicle_number`, `book_rent_space_id`, `book_rent_space_added_by`, `book_rent_user_fname`, `book_rent_user_lname`, `book_rent_user_phone`, `book_rent_user_email`, `book_rent_user_postal_code`, `book_rent_user_country`, `book_rent_user_address1`, `book_rent_user_address2`, `book_rent_user_city`, `book_rent_space_type`, `book_rent_space_day`, `book_space_fromdatetime`, `book_space_todatetime`, `book_rent_space_duration`, `book_rent_space_rate`, `book_space_paid_amt`, `book_space_payment_status`, `booking_date`) "
                . "SELECT ".$data['user_id'].", '".$data['vehicle_number']."', rent_space_id, `rent_space_added_by`, `rent_user_fname`, `rent_user_lname`, `rent_user_phone`, `rent_user_email`, `rent_user_postal_code`, `rent_user_country`, `rent_user_address1`, `rent_user_address2`, `rent_user_city`, `rent_space_type`, `rent_space_day`, '".$data['book_fromdatetime']."', '".$data['book_todatetime']."', `rent_space_duration`, `rent_space_rate`, '".$data['paid_amount']."', '".$data['payment_status']."', '".date("Y-m-d H:i:s")."' FROM `dw_rent_spaces` WHERE `rent_space_id`=".$data['rent_space_id'].""
                );
        if ($res) {
            
            $this->db->select("dw_users.first_name, dw_users.last_name, dw_users.device_token, dw_book_spaces.book_rent_space_id, (SELECT CONCAT(`first_name`, ' ', `last_name`) FROM `dw_users` WHERE `user_id`=dw_book_spaces.book_space_user_id) as book_by_name");
            $this->db->from('dw_book_spaces');
            $this->db->join('dw_users', 'dw_book_spaces.book_rent_space_added_by = dw_users.user_id', 'INNER');
            $this->db->where('dw_book_spaces.book_space_id', $this->db->insert_id());
            $query = $this->db->get();
            return $query->row();
            
            //return TRUE;
        } else {
            return FALSE;
        }
    }
    
    //-------------------------Get my bookings-----------------------------
    
    public function get_my_bookings($user_id, $offset, $limit, $month=''){
        
        $this->db->select("dw_book_spaces.*, dw_rent_spaces.rent_space_picture, dw_users.profile_pic");
        $this->db->select("(SELECT AVG(`rating`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_rent_spaces.rent_space_id) avg_rating");
        $this->db->select("(SELECT COUNT(`rating_id`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_rent_spaces.rent_space_id) total_ratings");
        $this->db->from('dw_book_spaces');
        $this->db->join('dw_rent_spaces', 'dw_book_spaces.book_rent_space_id = dw_rent_spaces.rent_space_id', 'INNER');
        $this->db->join('dw_users', 'dw_book_spaces.book_rent_space_added_by = dw_users.user_id', 'INNER');
        $this->db->where("dw_book_spaces.book_space_user_id", $user_id);
        if($month){
            $this->db->where("dw_book_spaces.timestamp >= now()-interval $month month" );
        }
        $this->db->order_by("dw_book_spaces.book_space_id", "DESC");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    //-------------------------Get my bookings-----------------------------
    
    public function get_my_recieved_bookings($user_id, $offset, $limit, $month=''){
        
        $this->db->select(
                "dw_book_spaces.`book_space_id`, dw_book_spaces.`book_rent_space_id`,dw_book_spaces.`book_rent_user_address1`, dw_book_spaces.`book_space_vehicle_number`, dw_book_spaces.`book_space_fromdatetime`, dw_book_spaces.`book_space_todatetime`, dw_book_spaces.`book_rent_space_duration`, dw_book_spaces.`book_rent_space_rate`, dw_book_spaces.`book_space_paid_amt`, dw_book_spaces.`book_space_payment_status`, dw_book_spaces.`booking_date`,"
                . "dw_users.`user_id`, dw_users.`first_name`, dw_users.`last_name`, dw_users.`email`, dw_users.`profile_pic`"
                );
        $this->db->from('dw_book_spaces');
        $this->db->select("(SELECT AVG(`rating`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_book_spaces.book_rent_space_id) avg_rating");
        $this->db->select("(SELECT COUNT(`rating_id`) FROM `dw_space_ratings` WHERE `rent_space_id`=dw_book_spaces.book_rent_space_id) total_ratings");
        $this->db->join('dw_users', 'dw_book_spaces.book_space_user_id = dw_users.user_id', 'INNER');
        $this->db->where("book_rent_space_added_by", $user_id);
        if($month){
            $this->db->where("dw_book_spaces.timestamp >= now()-interval $month month" );
        }
        $this->db->order_by("dw_book_spaces.book_space_id", "DESC");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    //--------------------------add_ratings-----------------------------
    
    public function add_ratings($data){
        $res = $this->db->insert('dw_space_ratings', $data);
        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    //--------------------------get_space_ratings-----------------------------
    
    public function get_space_ratings($rent_space_id, $offset, $limit){
        $this->db->select(
                "`dw_space_ratings`.`rating_id`,  `dw_space_ratings`.`rent_space_id`,  `dw_space_ratings`.`rating`,  `dw_space_ratings`.`review`,  `dw_space_ratings`.`date`,"
                . "`dw_users`.`user_id`, `dw_users`.`first_name`, `dw_users`.`last_name`, `dw_users`.`profile_pic`"
            );
        $this->db->from('dw_space_ratings');
        $this->db->join('dw_users', 'dw_space_ratings.add_by_user_id = dw_users.user_id', 'INNER');
        $this->db->where("dw_space_ratings.rent_space_id", $rent_space_id);
        $this->db->order_by("dw_space_ratings.rating_id", "DESC");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    //---------------------------get_my_spaces---------------------
    
    public function get_my_spaces($user_id, $offset, $limit, $month='') {
        
        $this->db->select('dw_rent_spaces.*');
        $this->db->select("(SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating");
        $this->db->select("(SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings");
        $this->db->select("(SELECT COUNT(rent_space_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_review");
        $this->db->from('dw_rent_spaces');
        $this->db->where("dw_rent_spaces.rent_space_added_by", $user_id);
        if($month){
            $this->db->where("dw_rent_spaces.timestamp >= now()-interval $month month" );
        }
        $this->db->order_by("dw_rent_spaces.rent_space_id", "DESC");
        $this->db->limit($limit, $offset);
        //timestamp >= now()-interval 1 month
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        return $query->result();
    }
    
    //----------------------------set_availability---------------------
    
    public function set_activate($user_id, $rent_space_id, $active){
        $this->db->set('active', $active);
        $this->db->where('rent_space_added_by', $user_id);
        $this->db->where('rent_space_id', $rent_space_id);
        $res = $this->db->update('dw_rent_spaces');
        return $res;
    }
    
    
    //----------------------------update_rent_space---------------------
    
    public function update_rent_space($data, $rent_space_id, $user_id){
        
        $this->db->set($data);
        $this->db->where('rent_space_added_by', $user_id);
        $this->db->where('rent_space_id', $rent_space_id);
        $res = $this->db->update('dw_rent_spaces');
        
        return $res;
    }
    
    /*[shubham] who booked space get it's review and ratings*/
    public function getRatingsByBookingUserId($booking_userid,$parking_space_id){
        $this->db->select('rating_id, add_by_user_id, rent_space_id, rating, review');
        $this->db->from('dw_space_ratings');
        $this->db->where('add_by_user_id',$booking_userid);
        $this->db->where('rent_space_id',$parking_space_id);
        
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
    
    
    public function checkRatingOnParkingSpace($rent_space_id,$book_space_id){
        $this->db->select('rating_id, add_by_user_id, rent_space_id, rating, review');
        $this->db->from('dw_space_ratings');
        $this->db->where('rent_space_id',$rent_space_id);
        $this->db->where('book_space_id',$book_space_id);
        
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
            //print_r($sids);
            
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
    
    public function getParkingSpaceData($arr_rent_space_ids,$array_of_days_no,$fromdatetime,$todatetime,$latitude,$longitude,$limit,$offset){
        
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
//            $sql .= "SELECT dw_rent_spaces.*, (((acos(sin((" . $latitude . "*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos((" . $latitude . "*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos(((" . $longitude . "- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance
//                    , (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
//                    (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
//                    ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
//                    FROM dw_rent_spaces WHERE rent_space_id IN ('$ids') AND dw_rent_spaces.active=1 AND (rent_space_fromdatetime <= '".$fromtime."'
//                    AND rent_space_todatetime >= '".$fromtime."') OR (rent_space_fromdatetime < '".$totime."'
//                    AND rent_space_todatetime >= '".$totime."') OR (rent_space_fromdatetime >= '".$fromtime."'
//                    AND rent_space_todatetime < '".$totime."') $subsql";
            $sql .= "SELECT dw_rent_spaces.*, (((acos(sin((" . $latitude . "*pi()/180)) * sin(( dw_rent_spaces.rent_space_latitude *pi()/180))+cos((" . $latitude . "*pi()/180)) * cos(( dw_rent_spaces.rent_space_latitude *pi()/180)) * cos(((" . $longitude . "- dw_rent_spaces.rent_space_longitude)* pi()/180))))*180/pi())*60*1.1515) as distance
                    , (SELECT AVG(rating) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) avg_rating,
                    (SELECT COUNT(rating_id) FROM dw_space_ratings WHERE rent_space_id=dw_rent_spaces.rent_space_id) total_ratings,
                    ROUND(TIMESTAMPDIFF(MINUTE, '$fromdatetime', '$todatetime')/60) AS total_hours
                    FROM dw_rent_spaces WHERE rent_space_id IN ('$ids') AND dw_rent_spaces.active=1 AND (rent_space_fromdatetime < '".$fromtime."'
                    AND rent_space_todatetime > '".$totime."') $subsql";
            $sql .= "LIMIT $limit OFFSET $offset "; 
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
    
    
//    public function checkParkingSpace($rent_space_id,$array_of_days_no,$fromtime,$totime){
//        
//        //$fromtime = date("H:i:s",strtotime($fromdatetime));
//        //$totime = date("H:i:s",strtotime($todatetime));
//        
//        $sql = '';
//        $subsql = '';
//        if(!empty($array_of_days_no)){
//            $subsql = "AND ";
//            foreach($array_of_days_no AS $dno){
//                $subsql .= " FIND_IN_SET($dno,rent_space_day) OR";
//            }
//            $subsql = rtrim($subsql,'OR');
//        }
//          
//        $sql = "SELECT * FROM dw_rent_spaces
//                WHERE rent_space_id = $rent_space_id AND dw_rent_spaces.active = 1
//                AND (rent_space_fromdatetime <= '".$fromtime."'
//                AND rent_space_todatetime >= '".$fromtime."') AND (rent_space_fromdatetime < '".$totime."'
//                AND rent_space_todatetime >= '".$totime."') AND (rent_space_fromdatetime >= '".$fromtime."'
//                AND rent_space_todatetime < '".$totime."') $subsql";
//       
//        $query = $this->db->query($sql);  
//        //echo $this->db->last_query(); die('eee');
//        
//        if($query->num_rows()>0)
//        {
//            $row = $query->row();
//            return $row;
//        }
//        else
//        {
//            return false;
//        }
//        
//    }
    
    public function checkParkingSpace($user_id,$fromdatetime,$todatetime,$array_of_days_no,$latitude,$longitude,$rent_space_id){
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
    
    public function getSingleRentSpaceDetails($rent_space_id){
        $this->db->select('rent_space_id, rent_space_added_by');
        $this->db->from('dw_rent_spaces');
        $this->db->where('rent_space_id',$rent_space_id);
        
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
    
    public function viewAllReviews($rent_space_id){
        
        $this->db->select('dw_space_ratings.rating AS rating_on_space, dw_space_ratings.review AS review_on_space, 
            dw_booking_ratings.rating AS rating_on_user, dw_booking_ratings.review AS review_on_user, 
            dw_space_ratings.add_by_user_id, dw_booking_ratings.space_owner_userid, booking_user.first_name AS bfname, 
            booking_user.last_name AS blame,booking_user.profile_pic AS bprofile_pic, spacing_user.first_name AS sfname, 
            spacing_user.last_name AS slname, spacing_user.profile_pic AS sprofile_pic');
        $this->db->from('dw_space_ratings');
        $this->db->join('dw_booking_ratings', 'dw_space_ratings.book_space_id = dw_booking_ratings.book_space_id','LEFT');
        $this->db->join('dw_users AS booking_user', 'dw_space_ratings.add_by_user_id = booking_user.user_id','LEFT');
        $this->db->join('dw_users AS spacing_user', 'dw_booking_ratings.space_owner_userid = spacing_user.user_id','LEFT');
        $this->db->where('dw_space_ratings.rent_space_id',$rent_space_id);
       // $this->db->order_by("dw_space_ratings.rent_space_id", "desc");
        
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
    
    public function searchParkingSpaceRecord($user_id,$fromdatetime,$todatetime,$array_of_days_no,$latitude,$longitude,$limit,$offset){
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
        AND rent_space_added_by != $user_id $subsql  HAVING distance<='10' LIMIT $limit OFFSET $offset ";
        //$sql .= "LIMIT $limit OFFSET $offset "; 
        
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
                if($qu->num_rows() == 0){
                    $srecord[] = $sp;
                }
                else if($qu->num_rows()>0 && ($sp->rent_space_number != $qu->num_rows())){
                    $srecord[] = $sp;
                }
            }
            //echo '<br/>';
            //print_r($srecord); die('kooooooooo');
            return $srecord;
        }else{
            return false;
        }
    }
    
    
}
