<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Admin_post_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getPosts(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->db->select('post_id, post_creator_id, post_type, title, company_id, short_description');
        $this->db->from(''.POST.'');
        $this->db->where('company_id',$company_id);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return array();
        }
    }
    
    
    /*Get User lists in response*/
    public function getPostListsResponse($total_count){
        // initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;
        $totalRecords = $total_count;
        
        //define index of column
        $columns = array(0 => ''.POST.'.post_id', 1 => ''.POST.'.title',2 => ''.POST.'.post_type');
        
        $where = $sqlTot = $sqlRec = "";
        
        if(!empty($params['search']['value'])) {   
            //$where .=" AND ";
            $where .=" ( ".POST.".title LIKE '".$params['search']['value']."%' "; 
            $where .=" OR ".POST_TYPE.".post_type LIKE '".$params['search']['value']."%' ";
            $where .=" OR ".POST.".short_description LIKE '".$params['search']['value']."%' )";
        }
        
        
        $sql = "SELECT ".POST.".post_id, ".POST.".post_creator_id, ".POST_TYPE.".post_type, ".POST.".title, ".POST.".company_id, ".POST.".short_description
            FROM ".POST." 
            LEFT JOIN ".POST_TYPE."  
            ON ".POST_TYPE.".post_type_id = ".POST.".post_type  
            WHERE  ".POST.".publish !=2 ";
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
            foreach($row as $post_data){
                $title = $post_data->title; 
                $post_type = $post_data->post_type; 
                $short_description = $post_data->short_description;
                $post_id = $post_data->post_id;
                $action = '<a href="ks_admin/admin_post/post_details/'. base64_encode($post_id).'"><i class="fa fa-eye" title="View" style="cursor:pointer"></i></a> &nbsp;&nbsp;<i class="fa fa-trash" title="Delete" style="cursor:pointer" onclick="disablePost(this,'.$post_id.')" ></i>';
                
                
                $data[] = array("$post_id", "$title", "$post_type", "$short_description", "$action");
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
    
    public function updatePostData($post_id,$company_id,$data){
        $this->db->where('post_id', $post_id);
        $this->db->where('company_id', $company_id);
        $res = $this->db->update(''.POST.'', $data);
        return $res;
    }
    
    
    
    
}