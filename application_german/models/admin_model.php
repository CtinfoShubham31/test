<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    /** Constructor **/
    function __construct() {
        parent::__construct();
    }

    /*----------Check admin existance.------------*/
    public function checkAdminLogin($username,$password){
        $this->db->select('admin_id');
        $this->db->from('germ_admin');
        $this->db->where('email', $username);
        $this->db->where('password', MD5($password));
        //$this->db->where('admin_type', 1);
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
    
    /*-----Add Learning(Listening) Data-------*/
    public function addListening($data){
        $this->db->insert('germ_learning_data',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    /*------Update Listening------*/
    public function updateListening($learning_dataid,$update){
        $this->db->where('learning_dataid', $learning_dataid);
        $this->db->update('germ_learning_data', $update); 
    }


    /*---Get row of listening using listening id---*/
    public function getListeningDataUsingId($learning_dataid=''){
        $this->db->select('learning_dataid, days, parts, listening_voice, listening_video, listening_text, english_text, spanish_text');
        $this->db->from('germ_learning_data');
        $this->db->where('learning_dataid', $learning_dataid);
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
    
    /*--------Get listening records using days and parts------------*/
    public function getListening($days='',$parts=''){
        $this->db->select('learning_dataid, days, parts, listening_voice, listening_video');
        $this->db->from('germ_learning_data');
        if(!empty($days)){
            $this->db->where('days', $days);
        }
        if(!empty($parts)){
            $this->db->where('parts', $parts);
        }
        $this->db->order_by("parts", "asc");
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
    
    
    /*Get Listening lists in response*/
    public function getListeningListsResponse($total_count){
        // initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;
        $totalRecords = $total_count;
        
        //define index of column
        $columns = array(0 => 'days',1 => 'parts',2 =>'listening_voice');
        
        $where = $sqlTot = $sqlRec = "";
        
        if(!empty($params['search']['value'])) {   
            $where .=" WHERE ";
            $where .=" ( days LIKE '".$params['search']['value']."%' "; 
            $where .=" OR parts LIKE '".$params['search']['value']."%' ";
            $where .=" OR voice_of LIKE '".$params['search']['value']."%' )";
        }
        
        $sql = "SELECT germ_learning_data.learning_dataid, germ_learning_data.days, germ_learning_data.parts, germ_learning_data.listening_voice, 
                germ_voice.voice_of
                FROM germ_learning_data
                LEFT JoIN germ_voice
                ON germ_voice.voice_id = germ_learning_data.listening_voice ";
        
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
            foreach($row as $listening_data){
                $days = $listening_data->days;  //Days
                $parts = $listening_data->parts;
                $voice = $listening_data->voice_of;
                $action = "<a href='germ_admin/listening/edit_listeningdata/".base64_encode($listening_data->learning_dataid)."'><i title='Edit' class='fa fa-pencil'></i></a>";
                $data[] = array("$days", "$parts", "$voice", "$action");
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
    
}