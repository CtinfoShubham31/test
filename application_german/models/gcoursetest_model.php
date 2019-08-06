<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gcoursetest_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function checkCountOfQuizAns($days='',$test_level=''){
        $this->db->select('testquiz_id, days, question, answer, test_level, question_audio, answer_audio');
        $this->db->from('germ_quiz_answer');
        if(!empty($days)){
            $this->db->where('days', $days);
        }
        if(!empty($test_level)){
            $this->db->where('test_level', $test_level);
        }
        //echo $this->db->last_query(); die;
        $query = $this->db->get();
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
    
    public function getDetailsTestQuizAns($testquiz_id){
        $this->db->select('testquiz_id, days, question, answer, test_level, question_audio, answer_audio');
        $this->db->from('germ_quiz_answer');
        $this->db->where('testquiz_id', $testquiz_id);

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
    
    public function addTestQuizAnswer($data){
        $this->db->insert('germ_quiz_answer',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateTestQuizAnswer($testquiz_id,$update){
        $this->db->where('testquiz_id', $testquiz_id);
        $this->db->update('germ_quiz_answer', $update);
    }
    
    public function getCourseTestListsResponse($total_count){
        // initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;
        $totalRecords = $total_count;
        
        //define index of column
        $columns = array(0 => 'days',1 => 'question',2 =>'answer');
        
        $where = $sqlTot = $sqlRec = "";
        
        if(!empty($params['search']['value'])) {   
            $where .=" WHERE ";
            $where .=" ( days LIKE '".$params['search']['value']."%' "; 
            $where .=" OR question LIKE '".$params['search']['value']."%' ";
            $where .=" OR answer LIKE '".$params['search']['value']."%' )";
        }
        
        $sql = "SELECT testquiz_id, days, question, answer
                FROM germ_quiz_answer ";
        
        $sqlTot .= $sql;
        $sqlRec .= $sql;
        
        //concatenate search sql if value exist
        if(isset($where) && $where != '') {
            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        
        $total_rows = $this->db->query($sqlRec);
        $totalRecords = $total_rows->num_rows();
        
        $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
        
        $query = $this->db->query($sqlRec);
        
        //echo $this->db->last_query(); die;
        if($query->num_rows()>0)
        {
            $row = $query->result();
            foreach($row as $coursetest_data){
                $days = $coursetest_data->days;  //Days
                $question = $coursetest_data->question;
                $answer = $coursetest_data->answer;
                $action = "<a href='germ_admin/gcourse_test/edit_coursetest/".base64_encode($coursetest_data->testquiz_id)."'><i title='Edit' class='fa fa-pencil'></i></a>";
                $data[] = array("$days", "$question", "$answer", "$action");
            }
            
            $json_data = array(
                "draw"            => intval( $params['draw'] ),   
                "recordsTotal"    => intval( $totalRecords ),  
                "recordsFiltered" => intval($totalRecords),
                "data"            => $data   // total data array
            );
            
            echo json_encode($json_data);  // send data as json format
            
        }
        else
        {
            $json_data = array(
                "draw"            => intval( $params['draw'] ),   
                "recordsTotal"    => intval(0),  
                "recordsFiltered" => intval(0),
                "data"            => $data   // total data array
            );
            echo json_encode($json_data);
            return false;
        }
    }
    
    
    public function getUsertestRecords($test_level='',$user_id='',$days='',$ans_status='',$testquiz_id=''){
        $this->db->select('test_record_id, testquiz_id, days, test_level, user_id, ans_status');
        $this->db->from('germ_usertest_records');
        if(!empty($test_level)){
            $this->db->where('test_level', $test_level);
        }
        if(!empty($user_id)){
            $this->db->where('user_id', $user_id);
        }
        if(!empty($days)){
            $this->db->where('days', $days);
        }
        if(!empty($ans_status)){
            $this->db->where('ans_status', $ans_status);
        }
        if(!empty($testquiz_id)){
            $this->db->where('testquiz_id', $testquiz_id);
        }
        
        $query = $this->db->get();
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
    
    
    public function deleteUserTestLevels($test_level='',$user_id=''){
        $this->db->where('test_level', $test_level);
        $this->db->where('user_id', $user_id);
        $this->db->delete('germ_usertest_records');
    }
    
    /*Add user test result*/
    public function addUserTestResult($data){
        $this->db->insert('germ_usertest_records',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function getUniqueDaysUsingTestlevel($test_level='',$user_id=''){
        $this->db->select('test_record_id, testquiz_id, days, test_level, user_id, ans_status');
        $this->db->from('germ_usertest_records');
        if(!empty($test_level)){
            $this->db->where('test_level', $test_level);
        }
        if(!empty($user_id)){
            $this->db->where('user_id', $user_id);
        }
        $this->db->group_by('days'); 
        
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
    
    //Add test percentage
    public function updateUserTestPercentage($update_percentage,$days,$user_id){
        $this->db->where('days', $days);
        $this->db->where('user_id', $user_id);
        $this->db->update('germ_usertest_percentages', $update_percentage);
    }
    
    /*Add german course history*/
    public function addGhistory($data){
        $this->db->insert('germ_course_history',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    /*Get details of ghistory of users*/
    public function getGhistoryDetails($ghistory_id=''){
        $this->db->select('ghistory_id, gpic');
        $this->db->from('germ_course_history');
        if(!empty($ghistory_id)){
            $this->db->where('ghistory_id', $ghistory_id);
        }
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
    
    public function updateGhistory($update_data,$ghid){
        $this->db->where('ghistory_id', $ghid);
        $this->db->update('germ_course_history', $update_data);
    }
    
    public function checkCountOfGhistory(){
        $this->db->select('ghistory_id, gpic');
        $this->db->from('germ_course_history');
        $query = $this->db->get();
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
    
    public function getGhistoryListsResponse($total_count){
        // initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;
        $totalRecords = $total_count;
        //die('ZZZZZZZZZZZZZZZZZA');
        //define index of column
        $columns = array(0 => 'ghistory_id');
        
        $where = $sqlTot = $sqlRec = "";
        
//        if(!empty($params['search']['value'])) {   
//            $where .=" WHERE ";
//            $where .=" ( days LIKE '".$params['search']['value']."%' "; 
//            $where .=" OR question LIKE '".$params['search']['value']."%' ";
//            $where .=" OR answer LIKE '".$params['search']['value']."%' )";
//        }
        
        $sql = "SELECT ghistory_id, gpic
                FROM germ_course_history ";
        
        $sqlTot .= $sql;
        $sqlRec .= $sql;
        
        //concatenate search sql if value exist
//        if(isset($where) && $where != '') {
//            $sqlTot .= $where;
//            $sqlRec .= $where;
//        }
        
        $total_rows = $this->db->query($sqlRec);
        $totalRecords = $total_rows->num_rows();
        
        $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
        
        $query = $this->db->query($sqlRec);
        
        //echo $this->db->last_query(); die;
        if($query->num_rows()>0)
        {
            $row = $query->result();
            foreach($row as $ghistory_data){
                $gpic = "<img src = 'upload/ghistory/".$ghistory_data->gpic."' class='align-imgg'>"; 
                $action = "<a href='germ_admin/gcourse_test/edit_gcourse_history/".base64_encode($ghistory_data->ghistory_id)."'><i title='Edit' class='fa fa-pencil'></i></a>";
                $data[] = array("$gpic", "$action");
            }
            
            $json_data = array(
                "draw"            => intval( $params['draw'] ),   
                "recordsTotal"    => intval( $totalRecords ),  
                "recordsFiltered" => intval($totalRecords),
                "data"            => $data   // total data array
            );
            
            echo json_encode($json_data);  // send data as json format
            
        }
        else
        {
            $json_data = array(
                "draw"            => intval( $params['draw'] ),   
                "recordsTotal"    => intval(0),  
                "recordsFiltered" => intval(0),
                "data"            => $data   // total data array
            );
            echo json_encode($json_data);
            return false;
        }
    }
    
    public function getUserTestPercentageDetails($user_id='',$days=''){
        $this->db->select('usertest_id, days, percentage, user_id');
        $this->db->from('germ_usertest_percentages');
        if(!empty($user_id)){
            $this->db->where('user_id', $user_id);
        }
        if(!empty($days)){
            $this->db->where('days', $days);
        }
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
    
    
    public function deleteUserDayWiseTests($days='',$user_id=''){
        $this->db->where('days', $days);
        $this->db->where('user_id', $user_id);
        $this->db->delete('germ_usertest_records');
    }
    
    public function getQuizForTestDayWise($days){
        $this->db->select('testquiz_id, days, question, answer, test_level, question_audio, answer_audio');
        $this->db->from('germ_quiz_answer');
        if(!empty($days)){
            $this->db->where_in('days', array($days));
        }
        //echo $this->db->last_query(); die;
        $query = $this->db->get();
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
    
    /*Add user test result levelwise*/
    public function addUserTestResultLevelWise($data){
        $this->db->insert('germ_userleveltest_percentage',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function deleteUserTestLevelsPercentage($test_level='',$user_id=''){
        $this->db->where('test_level', $test_level);
        $this->db->where('user_id', $user_id);
        $this->db->delete('germ_userleveltest_percentage');
    }
    
    public function getTestLevelPercentage($test_level='',$user_id=''){
        $this->db->select('level_test_id, user_id, test_level, percentage_of_testlevel');
        $this->db->from('germ_userleveltest_percentage');
        if(!empty($test_level)){
            $this->db->where_in('test_level', array($test_level));
        }
        if(!empty($user_id)){
            $this->db->where_in('user_id', array($user_id));
        }
        //echo $this->db->last_query(); die;
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
    
    
    public function getQuizAnsWithDaysLevels($days='',$test_level=''){
        $this->db->select('testquiz_id, days, question, answer, test_level, question_audio, answer_audio');
        $this->db->from('germ_quiz_answer');
        if(!empty($days)){
            $this->db->where('days', $days);
        }
        if(!empty($test_level)){
            $this->db->where('test_level', $test_level);
        }
        $this->db->order_by('days'); 
       
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
    
    /*Get quiz with ans to sync*/
    public function getQuizAnsWithTestLevelsOfflineSync(){
        $where = array('2','3','4','5');
        $this->db->select('testquiz_id, days, question, answer, test_level, question_audio, answer_audio');
        $this->db->from('germ_quiz_answer');
        $this->db->where_in('test_level', $where);
        
        $this->db->order_by('days'); 
       
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
    
    
    public function getUserTestPercentage($user_id,$percenatge=''){
        $this->db->select('level_test_id, user_id, percentage_of_testlevel, test_level');
        $this->db->from('germ_userleveltest_percentage');
        $this->db->where('user_id', $user_id);
        if($percenatge){
            $this->db->where('percentage_of_testlevel >=', $percenatge);
        } 
       
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
    
    
    public function fetchTestLevelPercentage($test_level='',$user_id=''){
        $this->db->select('level_test_id, user_id, test_level, percentage_of_testlevel');
        $this->db->from('germ_userleveltest_percentage');
        if(!empty($test_level)){
            $this->db->where('test_level', $test_level);
        }
        if(!empty($user_id)){
            $this->db->where('user_id', $user_id);
        }
        //echo $this->db->last_query(); die;
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