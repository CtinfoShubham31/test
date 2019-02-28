<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getComment($comment_array,$page=''){
        $this->db->select(''.COMMENT.'.comment_id, '.COMMENT.'.parent_comment_id, '.COMMENT.'.company_id,
            '.COMMENT.'.post_id, '.COMMENT.'.comment, '.COMMENT.'.post_creator_id, '.COMMENT.'.commented_by, '.COMMENT.'.created_date, '.USER.'.first_name ');
        $this->db->from(''.COMMENT.'');
        $this->db->join(''.USER.'', ''.USER.'.user_id = '.COMMENT.'.commented_by','LEFT');
        $this->db->where($comment_array);
        
        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
        $this->db->order_by(''.COMMENT.'.comment_id','DESC');
        
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
    
    public function addComment($data){
        $this->db->insert(''.COMMENT.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateComment($update_comment_array,$where_comment_array){
        //print_r($update_post_array);die;
        $this->db->where($where_comment_array);
        $res = $this->db->update(''.COMMENT.'', $update_comment_array);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
    public function getSingleComment($comment_array){
        $this->db->select(''.COMMENT.'.comment_id, '.COMMENT.'.parent_comment_id, '.COMMENT.'.company_id,
            '.COMMENT.'.post_id, '.COMMENT.'.comment, '.COMMENT.'.post_creator_id, '.COMMENT.'.commented_by, '.COMMENT.'.created_date ');
        $this->db->from(''.COMMENT.'');
        $this->db->where($comment_array);
        
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
    
    public function deleteComment($where_comment_array){
       $this->db->where($where_comment_array);
       $this->db->delete(''.COMMENT.''); 
    }
    
}