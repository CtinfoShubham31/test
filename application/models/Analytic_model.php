<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Analytic_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    
    // to get visits count of current week 
    function dailyGraphData($postid, $startdate, $analytic_type){	
        $sdate = date('Y-m-d', strtotime($startdate))." 00:00:00";
        $todate = date('Y-m-d')." 23:59:59";
        if($analytic_type == 2){            //Follow
            $dailyQuery = "SELECT DATE(created_date) AS 'date_val',COUNT(*) as 'total_visits' "
                        . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                        . "AND created_date BETWEEN '$sdate' AND '$todate' "
                        . "Group By DATE(created_date)"; 
        }
        else if($analytic_type == 3){       //Helpful
            $dailyQuery = "SELECT DATE(created_date) AS 'date_val',COUNT(*) as 'total_visits' "
                        . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                        . "AND created_date BETWEEN '$sdate' AND '$todate' "
                        . "Group By DATE(created_date)"; 
        }
        else{       //View
            $dailyQuery = "SELECT DATE(created_date) AS 'date_val',COUNT(*) as 'total_visits' "
                        . "from ".VIEWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                        . "AND created_date BETWEEN '$sdate' AND '$todate' "
                        . "Group By DATE(created_date)"; 
        }              

        $query = $this->db->query($dailyQuery);            
        $result = $query->result();		
        if(count($result)>0){
            return $result;
        }
        return false;
    }
    
    
    // to get weekly visits count of current month  
    function weeklyGraphData($postid, $weekarray, $analytic_type){
        $resultArr = array();
        foreach($weekarray as $k=>$dateInfo){
            $sdate = $dateInfo['ssdate'];
            $edate = $dateInfo['eedate'];
            if($analytic_type == 2){            //Follow
            $weeklyQuery = "SELECT COUNT(*) as 'total_visits' "
                . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND created_date BETWEEN '".$sdate." 00:00:00' AND '".$edate." 23:59:59' "
                . "AND YEAR(created_date) = YEAR(CURDATE())";
            }
            else if($analytic_type == 3){   //Helpful
            $weeklyQuery = "SELECT COUNT(*) as 'total_visits' "
                . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND created_date BETWEEN '".$sdate." 00:00:00' AND '".$edate." 23:59:59' "
                . "AND YEAR(created_date) = YEAR(CURDATE())"; 
            }
            else{   //View
            $weeklyQuery = "SELECT COUNT(*) as 'total_visits' "
                . "from ".VIEWED_POST." WHERE post_id = '$postid' AND created_date BETWEEN '".$sdate." 00:00:00' AND '".$edate." 23:59:59' "
                . "AND YEAR(created_date) = YEAR(CURDATE())";
            }
//            $weeklyQuery = "SELECT COUNT(*) as 'total_visits' "
//            . "from ks_viewed_post WHERE post_id = '$postid' AND created_date BETWEEN '".$sdate." 00:00:00' AND '".$edate." 23:59:59' "
//            . "AND YEAR(created_date) = YEAR(CURDATE())";

            $weeklySchema = $this->db->query($weeklyQuery);
            $res = $weeklySchema->row();
            if(!empty($res)){
               $resultArr[$sdate."~".$edate] = (int)$res->total_visits;  
            }else{
               $resultArr[$sdate."~".$edate] = 0; 
            }                  
        }
        return $resultArr;
    }
    
    
    function monthlyGraphData($postid, $analytic_type){
        if($analytic_type == 2){            //Follow
            $monthlyQuery = "SELECT MONTH(created_date) AS 'month', COUNT(*) as 'total_visits' "
                        . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                        . "Group By MONTH(created_date)";
        }
        else if($analytic_type == 3){   //Helpful
            $monthlyQuery = "SELECT MONTH(created_date) AS 'month', COUNT(*) as 'total_visits' "
                        . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                        . "Group By MONTH(created_date)";
        }
        else{   //View
          $monthlyQuery = "SELECT MONTH(created_date) AS 'month', COUNT(*) as 'total_visits' "
                        . "from ".VIEWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                        . "Group By MONTH(created_date)";   
        }
//        $monthlyQuery = "SELECT MONTH(created_date) AS 'month', COUNT(*) as 'total_visits' "
//                        . "from ks_viewed_post WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
//                        . "Group By MONTH(created_date)";
        $monthlySchema = $this->db->query($monthlyQuery); 
        $monthResult = $monthlySchema->result();                
        return $monthResult;                
    }
    
    // to get yearly visits count year wise 
    function yearlyGraphData($postid, $analytic_type){
        if($analytic_type == 2){            //Follow
            $yearlyQuery = "SELECT YEAR(created_date) AS 'year_val', COUNT(*) as 'total_visits' "
                        . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND YEAR(created_date)<=YEAR(CURDATE())"
                        . "Group By YEAR(created_date) ORDER BY YEAR(created_date) ASC";
        }
        else if($analytic_type == 3){   //Helpful
            $yearlyQuery = "SELECT YEAR(created_date) AS 'year_val', COUNT(*) as 'total_visits' "
                        . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND YEAR(created_date)<=YEAR(CURDATE())"
                        . "Group By YEAR(created_date) ORDER BY YEAR(created_date) ASC";
        }
        else{   //View
            $yearlyQuery = "SELECT YEAR(created_date) AS 'year_val', COUNT(*) as 'total_visits' "
                        . "from ".VIEWED_POST." WHERE post_id = '$postid' AND YEAR(created_date)<=YEAR(CURDATE())"
                        . "Group By YEAR(created_date) ORDER BY YEAR(created_date) ASC";
        }
//            $yearlyQuery = "SELECT YEAR(created_date) AS 'year_val', COUNT(*) as 'total_visits' "
//                            . "from ks_viewed_post WHERE post_id = '$postid' AND YEAR(created_date)<=YEAR(CURDATE())"
//                            . "Group By YEAR(created_date) ORDER BY YEAR(created_date) ASC";
        $yearlySchema = $this->db->query($yearlyQuery); 
        $yearResult = $yearlySchema->result();                
        return $yearResult;                
    }
    
    public function getViewedPostUsers($postid, $gtype, $daterange){
        $usersQuery = "";
        switch($gtype){
            case 'daily':
                $week_start = date('Y-m-d', strtotime($daterange))." 00:00:00";
                $week_end = date('Y-m-d', strtotime($daterange))." 23:59:59";
                $usersQuery = "SELECT viewed_by "
                            . "from ".VIEWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$week_start' AND '$week_end' GROUP BY DATE(created_date), viewed_by"; 

                break;
            case 'weekly':
                $start_end_date = explode("to",$daterange);                   
                $w_start = trim($start_end_date[0])." 00:00:00";
                $w_end = trim($start_end_date[1])." 23:59:59";
                $usersQuery = "SELECT viewed_by "
                            . "from ".VIEWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$w_start' AND '$w_end' GROUP BY DATE(created_date), viewed_by"; 
                break;
            case 'monthly':
                $monthvalue = (int)trim($daterange);
                $usersQuery = "SELECT viewed_by FROM ".VIEWED_POST." "
                    . "WHERE post_id = '$postid' AND MONTH(created_date) = '$monthvalue' "
                    . "AND YEAR(created_date) = YEAR(NOW()) GROUP BY MONTH(created_date), viewed_by";                  
                break;
            case 'yearly':
                $yearvalue = (int)trim($daterange);
                $usersQuery = "SELECT viewed_by "
                            . "from ".VIEWED_POST." WHERE post_id = '$postid' AND YEAR(created_date)='$yearvalue'"
                            . "Group By YEAR(created_date), viewed_by";                  
                break;
            default:
                $day = date('w');
                $week_start = date('Y-m-d', strtotime('-'.$day.' days'))." 00:00:00";
                $week_end = date('Y-m-d H:i:s');
                $usersQuery = "SELECT DISTINCT viewed_by "
                            . "from ".VIEWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$week_start' AND '$week_end' GROUP BY DATE(created_date), viewed_by"; 
                break;
            
        }
        
        $usersSchema = $this->db->query($usersQuery);
        $userArr = $usersSchema->result();
        $resultantUsers = "";
        $outputArr = array();
        $usersCount = count($userArr);

        if($usersCount>0){
            if($usersCount==1){
                $resultantUsers = $userArr[0]->viewed_by; 
            }else{
                foreach($userArr as $k=>$eachuser){
                   $outputArr[$k] = $eachuser->viewed_by;
                }
                $resultantUsers = $outputArr;
            }
        }

        return $resultantUsers;


    }
    
    
    public function gethelpfulPostUsers($postid, $gtype, $daterange){
        $usersQuery = "";
        switch($gtype){
            case 'daily':
                $week_start = date('Y-m-d', strtotime($daterange))." 00:00:00";
                $week_end = date('Y-m-d', strtotime($daterange))." 23:59:59";
                $usersQuery = "SELECT helpful_by "
                            . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$week_start' AND '$week_end' GROUP BY DATE(created_date), helpful_by"; 

                break;
            case 'weekly':
                $start_end_date = explode("to",$daterange);                   
                $w_start = trim($start_end_date[0])." 00:00:00";
                $w_end = trim($start_end_date[1])." 23:59:59";
                $usersQuery = "SELECT helpful_by "
                            . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$w_start' AND '$w_end' GROUP BY DATE(created_date), helpful_by"; 
                break;
            case 'monthly':
                $monthvalue = (int)trim($daterange);
                $usersQuery = "SELECT helpful_by FROM ".HELPFUL_POST." "
                    . "WHERE post_id = '$postid' AND MONTH(created_date) = '$monthvalue' "
                    . "AND YEAR(created_date) = YEAR(NOW()) GROUP BY MONTH(created_date), helpful_by";                  
                break;
            case 'yearly':
                $yearvalue = (int)trim($daterange);
                $usersQuery = "SELECT helpful_by "
                            . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND YEAR(created_date)='$yearvalue'"
                            . "Group By YEAR(created_date), helpful_by";                  
                break;
            default:
                $day = date('w');
                $week_start = date('Y-m-d', strtotime('-'.$day.' days'))." 00:00:00";
                $week_end = date('Y-m-d H:i:s');
                $usersQuery = "SELECT DISTINCT helpful_by "
                            . "from ".HELPFUL_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$week_start' AND '$week_end' GROUP BY DATE(created_date), helpful_by"; 
                break;
            
        }
        
        $usersSchema = $this->db->query($usersQuery);
        $userArr = $usersSchema->result();
        $resultantUsers = "";
        $outputArr = array();
        $usersCount = count($userArr);

        if($usersCount>0){
            if($usersCount==1){
                $resultantUsers = $userArr[0]->helpful_by; 
            }else{
                foreach($userArr as $k=>$eachuser){
                   $outputArr[$k] = $eachuser->helpful_by;
                }
                $resultantUsers = $outputArr;
            }
        }

        return $resultantUsers;


    }
    
    public function getFollowPostUsers($postid, $gtype, $daterange){
        $usersQuery = "";
        switch($gtype){
            case 'daily':
                $week_start = date('Y-m-d', strtotime($daterange))." 00:00:00";
                $week_end = date('Y-m-d', strtotime($daterange))." 23:59:59";
                $usersQuery = "SELECT followed_by "
                            . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$week_start' AND '$week_end' GROUP BY DATE(created_date), followed_by"; 

                break;
            case 'weekly':
                $start_end_date = explode("to",$daterange);                   
                $w_start = trim($start_end_date[0])." 00:00:00";
                $w_end = trim($start_end_date[1])." 23:59:59";
                $usersQuery = "SELECT followed_by "
                            . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$w_start' AND '$w_end' GROUP BY DATE(created_date), followed_by"; 
                break;
            case 'monthly':
                $monthvalue = (int)trim($daterange);
                $usersQuery = "SELECT followed_by FROM ".FOLLOWED_POST." "
                    . "WHERE post_id = '$postid' AND MONTH(created_date) = '$monthvalue' "
                    . "AND YEAR(created_date) = YEAR(NOW()) GROUP BY MONTH(created_date), followed_by";                  
                break;
            case 'yearly':
                $yearvalue = (int)trim($daterange);
                $usersQuery = "SELECT followed_by "
                            . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND YEAR(created_date)='$yearvalue'"
                            . "Group By YEAR(created_date), followed_by";                  
                break;
            default:
                $day = date('w');
                $week_start = date('Y-m-d', strtotime('-'.$day.' days'))." 00:00:00";
                $week_end = date('Y-m-d H:i:s');
                $usersQuery = "SELECT DISTINCT followed_by "
                            . "from ".FOLLOWED_POST." WHERE post_id = '$postid' AND YEAR(created_date) = YEAR(CURDATE()) "
                            . "AND created_date BETWEEN '$week_start' AND '$week_end' GROUP BY DATE(created_date), followed_by"; 
                break;
            
        }
        
        $usersSchema = $this->db->query($usersQuery);
        $userArr = $usersSchema->result();
        $resultantUsers = "";
        $outputArr = array();
        $usersCount = count($userArr);

        if($usersCount>0){
            if($usersCount==1){
                $resultantUsers = $userArr[0]->followed_by; 
            }else{
                foreach($userArr as $k=>$eachuser){
                   $outputArr[$k] = $eachuser->followed_by;
                }
                $resultantUsers = $outputArr;
            }
        }

        return $resultantUsers;


    }
    
    
    
}