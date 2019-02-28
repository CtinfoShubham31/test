<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Analytics extends MY_Controller {
    private $_uploaded;
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model(array('common_model'));
        $this->load->helper(array('form','common'));
        $this->output->nocache();
        if(!isUserLogin()) { 
            redirect($this->config->base_url().'home/logout');
        }
    }
    
    public function postview_analytics(){
        $view_data['analytic_view'] = 1;
        $data['postdetail_tabs'] = $this->load->view('layout/postdetail_tabs', $view_data, TRUE);
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $post_id = $data['post_id'] = base64_decode($this->uri->segment(4));
        
        $this->load->model('post_model');
        
        $post_arr = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $data['post_info'] = $this->post_model->getIndividualPosts($post_arr);
        
        $this->layout->view('post/postview_analytics',$data);
    }
    
    public function postfollow_analytics(){
        $view_data['analytic_view'] = 1;
        $data['postdetail_tabs'] = $this->load->view('layout/postdetail_tabs', $view_data, TRUE);
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $post_id = $data['post_id'] = base64_decode($this->uri->segment(4));
        
        $this->load->model('post_model');
        
        $post_arr = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $data['post_info'] = $this->post_model->getIndividualPosts($post_arr);
        
        $this->layout->view('post/postfollow_analytics',$data);
    }
    
    public function posthelpful_analytics(){
        $view_data['analytic_view'] = 1;
        $data['postdetail_tabs'] = $this->load->view('layout/postdetail_tabs', $view_data, TRUE);
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $post_id = $data['post_id'] = base64_decode($this->uri->segment(4));
        
        $this->load->model('post_model');
        
        $post_arr = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $data['post_info'] = $this->post_model->getIndividualPosts($post_arr);
        
        $this->layout->view('post/posthelpful_analytics',$data);
    }
    
    
    public function analytics(){
        $this->layout->view('post/analytic');
    }
    
    public function getPostVgraphData(){
        $postId = $_POST['post_id'];
        $graphType = $_POST['graphtype'];
        $analytic_type = $_POST['analytic_type'];
        $jsonDataArr = array();
        if($postId){
            //now time to create json to return to the graph handler
            $jsonDataArr = array();          
            switch($graphType){
                case 'daily':
                    $jsonDataArr = $this->getDailyData($postId,$analytic_type);
                    break;
                case 'weekly':
                    $jsonDataArr = $this->getWeeklyData($postId,$analytic_type);
                    break;
                case 'monthly':
                    $jsonDataArr = $this->getMonthlyData($postId,$analytic_type);
                    break;
                case 'yearly':
                    $jsonDataArr = $this->getYearlyData($postId,$analytic_type);
                    break;
                default:
                    $jsonDataArr = $this->getDailyData($postId,$analytic_type);
                    break;
            }          
        }
        
        $jsonDataArr = json_encode($jsonDataArr);
        echo $jsonDataArr;
    }
    
    public function getDailyData($postid,$analytic_type){  
        $weekdaysArr = array();   
        $resultantArr = array();
        $datesArr = array();
        for($i = 29; $i >= 0; $i--){ 
            $weekdaysArr[] = date("Y-m-d", strtotime('-'. $i .' days'));
        }
        
        $this->load->model('analytic_model');
        // get daily user visits count date wise 
        $startdate = $weekdaysArr[0];
        $dailyVisitResult = $this->analytic_model->dailyGraphData($postid, $startdate, $analytic_type);  

        // now create a new array of user visits of current week datewise
        if(!empty($dailyVisitResult)>0){
            foreach($dailyVisitResult as $k=>$val){ 
                array_push($datesArr, $val->date_val);
                $resultantArr[$val->date_val] = (int)$val->total_visits;
            }      
        }
        
        // now add the remaining dates to the array
        foreach($weekdaysArr as $dk=>$dval){
            if(!in_array($dval, $datesArr)){
                $resultantArr[$dval] = 0; 
            }
        }
        
        ksort($resultantArr);
        return $resultantArr;
    }
    
    public function getWeeklyData($postid, $analytic_type){
        $curdate = date('Y-m-d');
        $current_week = $this->week_of_month($curdate);
        
        // changes for showing graph for last 12 weeks
        $calculated_date = date('Y-m-d', strtotime('-12 weeks'));
        $calculated_week = date('N', strtotime($calculated_date));
        $week_first_day = date('Y-m-d', strtotime($calculated_date . " - " . ($calculated_week - 1) . " days"));      
        
        $mm = date('m');
        $yy = date('Y');
        $ld = date('j'); 
        //$startdate = date($yy."-".$mm."-01") ;
        $startdate = $week_first_day;
        $current_date=date('Y-m-d');      
        $lastday=$yy.'-'.$mm.'-'.$ld;
        $start_date = date('Y-m-d', strtotime($startdate));
        $end_date = date('Y-m-d', strtotime($lastday));
        $end_date1 = date('Y-m-d', strtotime($lastday." + 7 days"));
        $count_week = 0;
        $week_limit_array = array();
        
        for($date = $start_date; $date <= $end_date1; $date = date('Y-m-d', strtotime($date. ' + 7 days')))
        {
            $finaldatetimevalue = strtotime($end_date);
            $currentdatetimevalue = strtotime($date);
            if($currentdatetimevalue < $finaldatetimevalue){
              $getarray = $this->getWeekDates($date, $start_date, $end_date);            
              $week_limit_array[] = $getarray;
              $count_week++;
            }
        }       
        
        $this->load->model('analytic_model');
        
        // now get user counts value according to the week
        $weeklyResultantArr = $this->analytic_model->weeklyGraphData($postid, $week_limit_array, $analytic_type);              
        return $weeklyResultantArr;
    }
    
    public function week_of_month($date) {
        $date_parts = explode('-', $date);
        $date_parts[2] = '01';
        $first_of_month = implode('-', $date_parts);
        $day_of_first = date('N', strtotime($first_of_month));
        $day_of_month = date('j', strtotime($date));
        return floor(($day_of_first + $day_of_month - 1) / 7) + 1;
    }
    
    public function getWeekDates($date, $start_date, $end_date){
        $week =  date('W', strtotime($date));
        $year =  date('Y', strtotime($date));
        $from = date("Y-m-d", strtotime("{$year}-W{$week}+1"));
        if($from < $start_date) $from = $start_date;
        $to = date("Y-m-d", strtotime("{$year}-W{$week}-7")); 
        if($to > $end_date) $to = $end_date;

        $array1 = array(
                "ssdate" => $from,
                "eedate" => $to,
        );
        return $array1;
    }
    
    
    public function getMonthlyData($postid, $analytic_type){
        $monthArr = array('1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun',
            '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');
        $resultMonthlyArr = array();
        $outputArr = array();
        $mValArr = array();
        $this->load->model('analytic_model');
        // now get user counts value according to the months
        $monthlyResultantArr = $this->analytic_model->monthlyGraphData($postid, $analytic_type); 
        if(count($monthlyResultantArr)>0){
            $temp = 0;
            foreach($monthlyResultantArr as $key=>$eachrow){
                $mValArr[$temp] = (int)$eachrow->month; 
                $resultMonthlyArr[$eachrow->month] = (int)$eachrow->total_visits;
                $temp++;
            }                              
        }
        
        foreach($monthArr as $ind=>$monthval){        
            if(!in_array($ind, $mValArr)){
                $resultMonthlyArr[$ind] = 0; 
            }
        }

        // now replace all month values with their names
        ksort($resultMonthlyArr);
        foreach($resultMonthlyArr as $index=>$monthvisitcount){
            $monthName = $monthArr[$index];
            $outputArr[$monthName] = $monthvisitcount;
        }            
        return $outputArr;
    }
    
    public function getYearlyData($postid, $analytic_type){
        $resultantData = "";
        $resultYearlyArr = array();
        
        $this->load->model('analytic_model');
        // now get user counts value according to the months
        $resultantData = $this->analytic_model->yearlyGraphData($postid, $analytic_type); 
        if(sizeof($resultantData)){
            foreach($resultantData as $k=>$eachrecord){
               $resultYearlyArr[$eachrecord->year_val] = (int)$eachrecord->total_visits; 
            }
        }
        
        return $resultYearlyArr;
    }
    
    
    public function display_user(){

        $monthArr = array('1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun',
        '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');

        $monthArr = array_flip($monthArr);                      
        $postId = $_POST['post_id'];
        $graphType = isset($_POST['graphtype']) ? $_POST['graphtype'] : "";
        $daterange = ($_POST['daterange']) ? $_POST['daterange'] : "";
        $viewType = isset($_POST['viewtype']) ? $_POST['viewtype'] : "grid"; 

        // condition only for monthwise graph
        if($graphType=="monthly" && $daterange!=""){
            $daterange = $monthArr[$_POST['daterange']];
        }
        
        $this->load->model('analytic_model');
        if($_POST['analytic_type'] == 'view'){
            $users_arr = $this->analytic_model->getViewedPostUsers($postId,$graphType,$daterange);   
        }
        else if($_POST['analytic_type'] == 'helpful'){
            $users_arr = $this->analytic_model->gethelpfulPostUsers($postId,$graphType,$daterange);   
        }
        else if($_POST['analytic_type'] == 'follow'){
            $users_arr = $this->analytic_model->getFollowPostUsers($postId,$graphType,$daterange); 
        }
        if(!empty($users_arr)){
            $data['user_lists'] = $this->common_model->getLimitedUsers($users_arr);
            $this->load->view('post/loaduser_lists',$data);
        }
    }
    
}