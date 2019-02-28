<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Table_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getIndividualPosts($post_array){
        
        $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility, '.POST.'.post_override,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description, '.POST.'.content_request_status,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.updated_views, '.POST.'.commented_views, '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.POST.'');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        //$this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
        $this->db->where($post_array);
        
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
    
    public function getIndividualLabel($label_id){
        $this->db->select('label_id, label_parent_id, company_id, label_creator_id, label_name, visible_to, inherit_visibility');
        $this->db->from(''.LABEL.'');
        $this->db->where('label_id',$label_id);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        //die('SS');
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
    
    
}    