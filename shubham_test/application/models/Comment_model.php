<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getQuiz(){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->where('p_id',0);
        $this->db->order_by('quiz','desc');
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
    
    public function getQuizByPid($pid){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->where('p_id',$pid);
        $this->db->order_by('quiz','desc');
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
    
    public function saveRecord($data){
        $this->db->insert('quiz',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateRecord($update_array,$where_array){
        //print_r($update_post_array);die;
        $this->db->where($where_array);
        $res = $this->db->update('quiz', $update_array);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
}