<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function searchPostOFAttachment($company_id){
        $this->db->select(''.POST_ATTACHM.'.post_id');
        $this->db->from(''.POST_ATTACHM.'');
        $this->db->where(''.POST_ATTACHM.'.company_id',$company_id);
        $this->db->group_by(''.POST_ATTACHM.'.post_id');
        //echo $company_id;die;
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $pid = '';
            $row = $query->result();
            foreach($row AS $record){
                $pid .= $record->post_id.',';
            }
            $pid = rtrim($pid,',');
            return $pid;
        }
        else
        {
            return false;
        }
    }
    
    public function advSearchAllMy($search_arr,$where_array,$page,$where_string=''){
        //print_r($search_arr);die;
        if(!empty($search_arr)){ 
                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
                    //$this->db->group_start();
                }
                if(!empty($search_arr['username'][0])){   
                    
                    $where_creator = '';$b=1;
                    foreach($search_arr['username'] AS $arr_user){
                        if($b>1){
                            $where_creator .= " OR ";
                        }
                        $where_creator .= "".POST.".post_creator_id = '".$arr_user."' "; 
                        $b++;
                    }
                    
                    foreach($search_arr['username'] AS $arr_user){
                        $where_creator .= " OR ";
                        $where_creator .= "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
                    }
                    
                    $this->db->where( '('.$where_creator.')' ); 
                    
                }
                
                if(!empty($search_arr['post_type'])){
                    //$this->db->or_where(''.POST.'.post_type', $search_arr['post_type']);
                    $this->db->where(''.POST.'.post_type', $search_arr['post_type']);
                }
                if(!empty($search_arr['title'])){
                    $this->db->group_start();
                    $this->db->or_like(''.POST.'.title', $search_arr['title']);
                    $this->db->or_like(''.POST.'.short_description', $search_arr['title']);
                    $this->db->or_like(''.POST.'.detail_description', $search_arr['title']);
                    $this->db->group_end();
                }
                if(!empty($search_arr['labels'][0])){

                    $where = '';$a=1;
                    foreach($search_arr['labels'] AS $arrlabel){
                        if($a>1){
                            $where .= " OR ";
                        }
                        $where .= "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
                        $a++;
                    }
                    $this->db->where( '('.$where.')' );
                }
                $getcreated_date = $this->getMaxMinCreatedDate();
                $getserial_no = $this->getMaxMinSerialNo();
                $getupdated_date = $this->getMaxMinUpdatedDate();
                $where_created = "";
                //print_r($getcreated_date);die('WAAA');
                if(empty($search_arr['posts_created_from']) && !empty($search_arr['posts_created_to']) && !empty($getcreated_date)){ 
                    $where_created = " (".POST.".created_date >='".$getcreated_date->min_created."' AND ".POST.".created_date <='".$search_arr['posts_created_to']."')"; 
                    //$this->db->or_where( $where_created );
                    $this->db->where($where_created);
                }
                else if(!empty($search_arr['posts_created_from']) && empty($search_arr['posts_created_to']) && !empty($getcreated_date)){
                    $where_created = " (".POST.".created_date >='".$search_arr['posts_created_from']."' AND ".POST.".created_date <='".$getcreated_date->max_created."')"; 
                    //$this->db->or_where( $where_created );
                    $this->db->where( $where_created );
                }
                else if(!empty($search_arr['posts_created_from']) && !empty($search_arr['posts_created_to'])){
                    $where_created = " (".POST.".created_date >='".$search_arr['posts_created_from']."' AND ".POST.".created_date <='".$search_arr['posts_created_to']."')"; 
                    //$this->db->or_where( $where_created );
                    $this->db->where( $where_created );
                }
                //$getupdated_date = $this->getMaxMinUpdatedDate();
                
                if(empty($search_arr['posts_updated_from']) && !empty($search_arr['posts_updated_to']) && !empty($getupdated_date)){
                    $where_updated = " (".POST.".updated_date >='".$getupdated_date->min_updated."' AND ".POST.".updated_date <='".$search_arr['posts_updated_to']."')"; 
                    //$this->db->or_where( $where_updated );
                    $this->db->where( $where_updated );
                }
                else if(!empty($search_arr['posts_updated_from']) && empty($search_arr['posts_updated_to']) && !empty($getupdated_date)){
                    $where_updated = " (".POST.".updated_date >='".$search_arr['posts_updated_from']."' AND ".POST.".updated_date <='".$getupdated_date->max_updated."')"; 
                    //$this->db->or_where( $where_updated );
                    $this->db->where( $where_updated );
                }
                else if(!empty($search_arr['posts_updated_from']) && !empty($search_arr['posts_updated_to'])){
                    $where_updated = " (".POST.".updated_date >='".$search_arr['posts_updated_from']."' AND ".POST.".updated_date <='".$search_arr['posts_updated_to']."')"; 
                    //$this->db->or_where( $where_updated );
                    $this->db->where( $where_updated );
                }
                
                //$getserial_no = $this->getMaxMinSerialNo();
                if(empty($search_arr['serial_from']) && !empty($search_arr['serial_to']) && !empty($getserial_no)){
                    $where_serial = " (".POST.".post_id >='".$getserial_no->min_no."' AND ".POST.".post_id <='".$search_arr['serial_to']."')"; 
                    //$this->db->or_where( $where_serial ); 
                    $this->db->where( $where_serial ); 
                }
                else if(!empty($search_arr['serial_from']) && empty($search_arr['serial_to']) && !empty($getserial_no)){
                    $where_serial = " (".POST.".post_id >='".$search_arr['serial_from']."' AND ".POST.".post_id <='".$getserial_no->max_no."')"; 
                    //$this->db->or_where( $where_serial ); 
                    $this->db->where( $where_serial ); 
                }
                else if(!empty($search_arr['serial_from']) && !empty($search_arr['serial_to'])){
                    $where_serial = " (".POST.".post_id >='".$search_arr['serial_from']."' AND ".POST.".post_id <='".$search_arr['serial_to']."')"; 
                    //$this->db->or_where( $where_serial ); 
                    $this->db->where( $where_serial ); 
                }
                if(!empty($search_arr['attachment']) && !empty($search_arr['attach_string'])){
                    $attch_arr = explode(",",$search_arr['attach_string']);
                    if(!empty($attch_arr)){
                        //$this->db->or_where_in(''.POST.'.post_id',$attch_arr);
                        $this->db->where_in(''.POST.'.post_id',$attch_arr);
                    }
                }
                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
                 
                }
            }
            $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish,
            '.USER.'.first_name, '.USER.'.last_name, '.POST_TYPE.'.post_type ');
            
            
            $if_creator = ''; $c = 1; $d = 1;
            if(!empty($search_arr['username'][0]) && COUNT($search_arr['username'])>1){
                 $if_creator .= " (";
                foreach($search_arr['username'] AS $ar_user){
                    if($c>1){
                        $if_creator .= " OR ";
                    }
                    $if_creator .= "FIND_IN_SET('".$ar_user."', ".POST.".co_owners)";
                    $c++;
                }
                $if_creator .= ") , ";
                foreach($search_arr['username'] AS $ar_user){
                    if($d>1){
                        $if_creator .= " + ";
                    }
                    $if_creator .= "if(FIND_IN_SET('".$ar_user."', ".POST.".co_owners),1,0)";
                    $d++;
                }
                
                $this->db->select('if('.POST.'.post_creator_id in ('.implode(',',$search_arr['username']).') ,1,0)  as creator_order ',false);
                $this->db->select('if('.$if_creator.',0)  as coowners_order ',false);
            }
            
            $this->db->from(''.POST.'');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
            $this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
            
            if(!empty($where_array)){
                $this->db->where($where_array);
            }
            
            if($where_string){
                $this->db->where($where_string); 
            }
            
            $this->db->where(''.POST.'.publish!=',2);
            
//            $this->db->order_by('co_owners');
            if(!empty($search_arr['username'][0]) && COUNT($search_arr['username'])>1){
                $this->db->order_by('coowners_order','DESC');
                $this->db->order_by('creator_order','DESC');
            }
            if($page){
                $start = ($page-1)*POST_LIMIT;
                $this->db->limit(POST_LIMIT, $start);
            }
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
    
//    public function advSearchAllMy222($search_arr,$where_array,$page,$where_string=''){
//        //print_r($search_arr);die;
//            $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
//            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
//            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish,
//            '.USER.'.first_name, '.USER.'.last_name, '.POST_TYPE.'.post_type ');
//            $this->db->from(''.POST.'');
//            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
//            $this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
//            if(!empty($search_arr)){ 
//                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
//                    //$this->db->group_start();
//                }
//                if(!empty($search_arr['username'][0])){   
//                    
//                    $where_creator = '';$b=1;
//                    foreach($search_arr['username'] AS $arr_user){
//                        if($b>1){
//                            $where_creator .= " OR ";
//                        }
//                        $where_creator .= "".POST.".post_creator_id = '".$arr_user."' "; 
//                        $b++;
//                    }
//                    
//                    foreach($search_arr['username'] AS $arr_user){
//                        $where_creator .= " OR ";
//                        $where_creator .= "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
//                    }
//                    
//                    $this->db->where( '('.$where_creator.')' ); 
//                    
//                }
//                
//                if(!empty($search_arr['post_type'])){
//                    //$this->db->or_where(''.POST.'.post_type', $search_arr['post_type']);
//                    $this->db->where(''.POST.'.post_type', $search_arr['post_type']);
//                }
//                if(!empty($search_arr['title'])){
//                    $this->db->group_start();
//                    $this->db->or_like(''.POST.'.title', $search_arr['title']);
//                    $this->db->or_like(''.POST.'.short_description', $search_arr['title']);
//                    $this->db->or_like(''.POST.'.detail_description', $search_arr['title']);
//                    $this->db->group_end();
//                }
//                if(!empty($search_arr['labels'][0])){
//
//                    $where = '';$a=1;
//                    foreach($search_arr['labels'] AS $arrlabel){
//                        if($a>1){
//                            $where .= " OR ";
//                        }
//                        $where .= "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
//                        $a++;
//                    }
//                    $this->db->where( '('.$where.')' ); 
//                }
//              
//                if(!empty($search_arr['posts_created_from']) && !empty($search_arr['posts_created_to'])){
//                    $where_created = " (".POST.".created_date >='".$search_arr['posts_created_from']."' AND ".POST.".created_date <='".$search_arr['posts_created_to']."')"; 
//                    //$this->db->or_where( $where_created );
//                    $this->db->where( $where_created );
//                }
//                if(!empty($search_arr['posts_updated_from']) && !empty($search_arr['posts_updated_to'])){
//                    $where_updated = " (".POST.".updated_date >='".$search_arr['posts_updated_from']."' AND ".POST.".updated_date <='".$search_arr['posts_updated_to']."')"; 
//                    //$this->db->or_where( $where_updated );
//                    $this->db->where( $where_updated );
//                }
//                if(!empty($search_arr['serial_from']) && !empty($search_arr['serial_to'])){
//                    $where_serial = " (".POST.".post_id >='".$search_arr['serial_from']."' AND ".POST.".post_id <='".$search_arr['serial_to']."')"; 
//                    //$this->db->or_where( $where_serial ); 
//                    $this->db->where( $where_serial ); 
//                }
//                if(!empty($search_arr['attachment']) && !empty($search_arr['attach_string'])){
//                    $attch_arr = explode(",",$search_arr['attach_string']);
//                    if(!empty($attch_arr)){
//                        //$this->db->or_where_in(''.POST.'.post_id',$attch_arr);
//                        $this->db->where_in(''.POST.'.post_id',$attch_arr);
//                    }
//                }
//                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
//                 
//                }
//            }
//            
//            if(!empty($where_array)){
//                $this->db->where($where_array);
//            }
//            
//            if($where_string){
//                $this->db->where($where_string); 
//            }
//            
////            $this->db->order_by('co_owners');
////            $this->db->order_by('post_creator_id');
//            
//            if($page){
//                $start = ($page-1)*POST_LIMIT;
//                $this->db->limit(POST_LIMIT, $start);
//            }
//            $query = $this->db->get();
//            //echo $this->db->last_query(); die('SS');
//            if($query->num_rows()>0)
//            {
//                $row = $query->result();
//                return $row;
//            }
//            else
//            {
//                return false;
//            }
//            
//    }
    
    public function advSearchFollow($search_arr,$where_array,$page){
            $this->db->select(''.FOLLOWED_POST.'.followed_post_id, '.FOLLOWED_POST.'.company_id, '.FOLLOWED_POST.'.post_id,
            '.FOLLOWED_POST.'.followed_by, '.POST.'.post_creator_id, '.FOLLOWED_POST.'.created_date,
            '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
            '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
            $this->db->from(''.POST.'');
            $this->db->join(''.FOLLOWED_POST.'', ''.POST.'.post_id = '.FOLLOWED_POST.'.post_id','LEFT');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
            
            //print_r($search_arr);die;
            if(!empty($search_arr)){ 
                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
                    //$this->db->group_start();
                }
                if(!empty($search_arr['username'][0])){
                    $where_creator = '';$b=1;
                    foreach($search_arr['username'] AS $arr_user){
                        if($b>1){
                            $where_creator .= " OR ";
                        }
                        $where_creator .= "".POST.".post_creator_id = '".$arr_user."' "; 
                        $b++;
                        //$this->db->or_where( $where_creator ); 
                    }
                    
                    foreach($search_arr['username'] AS $arr_user){
                        $where_creator .= " OR ";
                        $where_creator .= "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
                    }
                    
                    $this->db->where( '('.$where_creator.')' ); 
                    
                }
                if(!empty($search_arr['post_type'])){
                    //$this->db->or_where(''.POST.'.post_type', $search_arr['post_type']);
                    $this->db->where(''.POST.'.post_type', $search_arr['post_type']);
                }
                if(!empty($search_arr['title'])){
                    //$this->db->or_like(''.POST.'.title', $search_arr['title']);
                    //$this->db->like(''.POST.'.title', $search_arr['title']);
                    $this->db->group_start();
                    $this->db->or_like(''.POST.'.title', $search_arr['title']);
                    $this->db->or_like(''.POST.'.short_description', $search_arr['title']);
                    $this->db->or_like(''.POST.'.detail_description', $search_arr['title']);
                    $this->db->group_end();
                }
                if(!empty($search_arr['labels'][0])){
//                    foreach($search_arr['labels'] AS $arrlabel){
//                        $where = "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
//                        $this->db->or_where( $where ); 
//                    }
                    $where = '';$a=1;
                    foreach($search_arr['labels'] AS $arrlabel){
                        if($a>1){
                            $where .= " OR ";
                        }
                        $where .= "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
                        $a++;
                    }
                    $this->db->where( '('.$where.')' ); 
                }
              
                if(!empty($search_arr['posts_created_from']) && !empty($search_arr['posts_created_to'])){
                    $where_created = "(".POST.".created_date >='".$search_arr['posts_created_from']."' AND ".POST.".created_date <='".$search_arr['posts_created_to']."')"; 
                    //$this->db->or_where( $where_created );
                    $this->db->where( $where_updated );
                }
                if(!empty($search_arr['posts_updated_from']) && !empty($search_arr['posts_updated_to'])){
                    $where_updated = "(".POST.".updated_date >='".$search_arr['posts_updated_from']."' AND ".POST.".updated_date <='".$search_arr['posts_updated_to']."')"; 
                    //$this->db->or_where( $where_updated );
                    $this->db->where( $where_updated );
                }
                if(!empty($search_arr['serial_from']) && !empty($search_arr['serial_to'])){
                    $where_serial = "(".POST.".post_id >='".$search_arr['serial_from']."' AND ".POST.".post_id <='".$search_arr['serial_to']."')"; 
                    //$this->db->or_where( $where_serial );
                    $this->db->where( $where_serial ); 
                }
                if(!empty($search_arr['attachment']) && !empty($search_arr['attach_string'])){
                    $attch_arr = explode(",",$search_arr['attach_string']);
                    if(!empty($attch_arr)){
                        //$this->db->or_where_in(''.POST.'.post_id',$attch_arr);
                        $this->db->where_in(''.POST.'.post_id',$attch_arr);
                    }
                }
                
                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
                    //$this->db->group_end();
                }
                
            }
            
            if(!empty($where_array)){
                $this->db->where($where_array);
            }
            
            $this->db->where(''.POST.'.publish!=',2);
            
            if($page){
                $start = ($page-1)*POST_LIMIT;
                $this->db->limit(POST_LIMIT, $start);
            }
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
            
        //}
    }
    
    public function advSearchRecentView($search_arr,$where_array,$page){
            $this->db->select(''.VIEWED_POST.'.viewed_post_id, '.VIEWED_POST.'.company_id, '.VIEWED_POST.'.post_id,
                '.VIEWED_POST.'.viewed_by, '.POST.'.post_creator_id, '.VIEWED_POST.'.created_date, 
                '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
                '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish,
                '.USER.'.first_name, '.USER.'.last_name ');
            $this->db->from(''.POST.'');
            $this->db->join(''.VIEWED_POST.'', ''.POST.'.post_id = '.VIEWED_POST.'.post_id','RIGHT');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
            //$this->db->where($view_array);
            //print_r($search_arr);die;
            if(!empty($search_arr)){ 
                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
                    //$this->db->group_start();
                }
                if(!empty($search_arr['username'][0])){
                    
                    $where_creator = '';$b=1;
                    foreach($search_arr['username'] AS $arr_user){
                        if($b>1){
                            $where_creator .= " OR ";
                        }
                        $where_creator .= "".POST.".post_creator_id = '".$arr_user."' "; 
                        $b++;
                        //$this->db->or_where( $where_creator ); 
                    }
                    
                    foreach($search_arr['username'] AS $arr_user){
                        $where_creator .= " OR ";
                        $where_creator .= "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
                    }
                    
                    $this->db->where( '('.$where_creator.')' ); 
                    
                }
                if(!empty($search_arr['post_type'])){
                    //$this->db->or_where(''.POST.'.post_type', $search_arr['post_type']);
                    $this->db->where(''.POST.'.post_type', $search_arr['post_type']);
                }
                if(!empty($search_arr['title'])){
                    //$this->db->or_like(''.POST.'.title', $search_arr['title']);
                    //$this->db->like(''.POST.'.title', $search_arr['title']);
                    $this->db->group_start();
                    $this->db->or_like(''.POST.'.title', $search_arr['title']);
                    $this->db->or_like(''.POST.'.short_description', $search_arr['title']);
                    $this->db->or_like(''.POST.'.detail_description', $search_arr['title']);
                    $this->db->group_end();
                }
                if(!empty($search_arr['labels'][0])){
                    $where = '';$a=1;
                    foreach($search_arr['labels'] AS $arrlabel){
                        if($a>1){
                            $where .= " OR ";
                        }
                        $where .= "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
                        
                        $a++;
                    }
                    $this->db->where( '('.$where.')' ); 
                }
              
                if(!empty($search_arr['posts_created_from']) && !empty($search_arr['posts_created_to'])){
                    $where_created = "(".POST.".created_date >='".$search_arr['posts_created_from']."' AND ".POST.".created_date <='".$search_arr['posts_created_to']."')"; 
                    //$this->db->or_where( $where_created );
                    $this->db->where( $where_created );
                }
                if(!empty($search_arr['posts_updated_from']) && !empty($search_arr['posts_updated_to'])){
                    $where_updated = "(".POST.".updated_date >='".$search_arr['posts_updated_from']."' AND ".POST.".updated_date <='".$search_arr['posts_updated_to']."')"; 
                    //$this->db->or_where( $where_updated );
                    $this->db->where( $where_updated );
                }
                if(!empty($search_arr['serial_from']) && !empty($search_arr['serial_to'])){
                    $where_serial = "(".POST.".post_id >='".$search_arr['serial_from']."' AND ".POST.".post_id <='".$search_arr['serial_to']."')"; 
                    //$this->db->or_where( $where_serial ); 
                    $this->db->where( $where_serial ); 
                }
                if(!empty($search_arr['attachment']) && !empty($search_arr['attach_string'])){
                    $attch_arr = explode(",",$search_arr['attach_string']);
                    if(!empty($attch_arr)){
                        //$this->db->or_where_in(''.POST.'.post_id',$attch_arr);
                        $this->db->where_in(''.POST.'.post_id',$attch_arr);
                    }
                }
                
                if(!empty($search_arr['username'][0]) || !empty($search_arr['post_type']) || !empty($search_arr['title']) || !empty($search_arr['labels'][0])){
                 
                    //$this->db->group_end();
                }	
                
            }
            
            if(!empty($where_array)){
                $this->db->where($where_array);
            }
            $this->db->where(''.POST.'.publish!=',2);
            
            if($page){
                $start = ($page-1)*POST_LIMIT;
                $this->db->limit(POST_LIMIT, $start);
            }
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
    
    /*Basic Search for all and my posts*/
    public function searchAllMyPosts($search_term='',$page='',$order_by='',$arr_of_label='',$arr_of_username='', $where_array='', $where_string=''){
        $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name, '.POST_TYPE.'.post_type ');
            $this->db->from(''.POST.'');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
            $this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
            
            $this->db->group_start();
            if($search_term){
                $this->db->or_like('title', $search_term);
                $this->db->or_like('short_description', $search_term);
                $this->db->or_like('detail_description', $search_term);
            }
            if(!empty($arr_of_label)){
                foreach($arr_of_label AS $arrlabel){
                    $where = "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
                    $this->db->or_where( $where ); 
                }
            }
            if(!empty($arr_of_username)){
//                foreach($arr_of_username AS $arr_user){
//                    $where = "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
//                    $this->db->or_where( $where ); 
//                }
                
                $where_creator = '';$b=1;
                foreach($arr_of_username AS $arr_user){
                    if($b>1){
                        $where_creator .= " OR ";
                    }
                    $where_creator .= "".POST.".post_creator_id = '".$arr_user."' "; 
                    $b++;
                    //$this->db->or_where( $where_creator ); 
                }

                foreach($arr_of_username AS $arr_user){
                    $where_creator .= " OR ";
                    $where_creator .= "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
                }

                $this->db->or_where( '('.$where_creator.')' );
            }
            
            $this->db->group_end();
            
            
            
            if(!empty($where_array)){
                $this->db->where($where_array);
            }
            
            if($where_string){
                $this->db->where($where_string); 
            }
            $this->db->where(''.POST.'.publish!=',2);
            
            if($page){
                $start = ($page-1)*POST_LIMIT;
                $this->db->limit(POST_LIMIT, $start);
            }
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
    
    /*Basic Search for follow posts*/
    public function searchFollowedPosts($search_term='',$page='',$order_by='',$arr_of_label='',$arr_of_username='', $where_array=''){
        
        $this->db->select(''.FOLLOWED_POST.'.followed_post_id, '.FOLLOWED_POST.'.company_id, '.FOLLOWED_POST.'.post_id,
        '.FOLLOWED_POST.'.followed_by, '.POST.'.post_creator_id, '.FOLLOWED_POST.'.created_date,
        '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
        '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.POST.'');
        $this->db->join(''.FOLLOWED_POST.'', ''.POST.'.post_id = '.FOLLOWED_POST.'.post_id','LEFT');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');

        //print_r($search_arr);die;
         $this->db->group_start();
        if($search_term){
            $this->db->or_like('title', $search_term);
            $this->db->or_like('short_description', $search_term);
            $this->db->or_like('detail_description', $search_term);
        }
        if(!empty($arr_of_label)){
            foreach($arr_of_label AS $arrlabel){
                $where = "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
                $this->db->or_where( $where ); 
            }
        }
        if(!empty($arr_of_username)){

            $where_creator = '';$b=1;
            foreach($arr_of_username AS $arr_user){
                if($b>1){
                    $where_creator .= " OR ";
                }
                $where_creator .= "".POST.".post_creator_id = '".$arr_user."' "; 
                $b++;
                //$this->db->or_where( $where_creator ); 
            }

            foreach($arr_of_username AS $arr_user){
                $where_creator .= " OR ";
                $where_creator .= "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
            }

            $this->db->or_where( '('.$where_creator.')' );
        }

        $this->db->group_end();

        if(!empty($where_array)){
            $this->db->where($where_array);
        }
        
        $this->db->where(''.POST.'.publish!=',2);

        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
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
            
        //}
    }
    
    /*Basic Search for recent viewed posts*/
    public function searchRecentlyViewed($search_term='',$page='',$order_by='',$arr_of_label='',$arr_of_username='', $where_array=''){
        
        $this->db->select(''.VIEWED_POST.'.viewed_post_id, '.VIEWED_POST.'.company_id, '.VIEWED_POST.'.post_id,
            '.VIEWED_POST.'.viewed_by, '.POST.'.post_creator_id, '.VIEWED_POST.'.created_date, 
            '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
            '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish,
            '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.POST.'');
        $this->db->join(''.VIEWED_POST.'', ''.POST.'.post_id = '.VIEWED_POST.'.post_id','RIGHT');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');

        //print_r($search_arr);die;
         $this->db->group_start();
        if($search_term){
            $this->db->or_like('title', $search_term);
            $this->db->or_like('short_description', $search_term);
            $this->db->or_like('detail_description', $search_term);
        }
        if(!empty($arr_of_label)){
            foreach($arr_of_label AS $arrlabel){
                $where = "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
                $this->db->or_where( $where ); 
            }
        }
        
        if(!empty($arr_of_username)){
            $where_creator = '';$b=1;
            foreach($arr_of_username AS $arr_user){
                if($b>1){
                    $where_creator .= " OR ";
                }
                $where_creator .= "".POST.".post_creator_id = '".$arr_user."' "; 
                $b++;
                //$this->db->or_where( $where_creator ); 
            }

            foreach($arr_of_username AS $arr_user){
                $where_creator .= " OR ";
                $where_creator .= "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
            }

            $this->db->or_where( '('.$where_creator.')' );
        }

        $this->db->group_end();

        if(!empty($where_array)){
            $this->db->where($where_array);
        }
        
        $this->db->where(''.POST.'.publish!=',2);

        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
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
            
        //}
    }
    
    
    public function advsavedSearch($data){ //die('ss');
        $this->db->insert(''.SAVE_SEARCH.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateAdvSearch($update_search_array,$where_search_array){
        $this->db->where($where_search_array);
        $res = $this->db->update(''.SAVE_SEARCH.'', $update_search_array);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
    public function individualSavedSearch($where_array){
        $this->db->select('save_search_id, search_keyword, jsondata, company_id, user_id');
        $this->db->from(''.SAVE_SEARCH.'');
        if(!empty($where_array)){
            $this->db->where($where_array);
        }
        
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
    
    
    /*Basic Search Label*/
    public function searchAllMyPostsLabel($search_term='',$page='',$order_by='',$where_array='',$where_string=''){
        $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
            $this->db->from(''.POST.'');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
            //$this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
            
            $where = "FIND_IN_SET('".$search_term."', ".POST.".tagged_labels)"; 
            $this->db->where( $where ); 
            
            if(!empty($where_array)){
                $this->db->where($where_array);
            }
            
            if($where_string){
                $this->db->where($where_string); 
            }
            
            $this->db->where(''.POST.'.publish!=',2);
            
            if($page){
                $start = ($page-1)*POST_LIMIT;
                $this->db->limit(POST_LIMIT, $start);
            }
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
    
    /*Basic Search for follow posts*/
    public function searchFollowedPostsLabel($search_term='',$page='',$order_by='',$where_array='',$where_string=''){
        $this->db->select(''.FOLLOWED_POST.'.followed_post_id, '.FOLLOWED_POST.'.company_id, '.FOLLOWED_POST.'.post_id,
        '.FOLLOWED_POST.'.followed_by, '.POST.'.post_creator_id, '.FOLLOWED_POST.'.created_date,
        '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
        '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.POST.'');
        $this->db->join(''.FOLLOWED_POST.'', ''.POST.'.post_id = '.FOLLOWED_POST.'.post_id','LEFT');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');

        $where = "FIND_IN_SET('".$search_term."', ".POST.".tagged_labels)"; 
        $this->db->where( $where ); 
        
        if(!empty($where_array)){
            $this->db->where($where_array);
        }
        
        if($where_string){
            $this->db->where($where_string); 
        }

        $this->db->where(''.POST.'.publish!=',2);
        
        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
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
            
        //}
    }
    
    /*Basic Search Label in Recent view posts*/
    public function searchRecentlyViewedLabel($search_term='',$page='',$order_by='',$where_array=''){
        
        $this->db->select(''.VIEWED_POST.'.viewed_post_id, '.VIEWED_POST.'.company_id, '.VIEWED_POST.'.post_id,
                '.VIEWED_POST.'.viewed_by, '.POST.'.post_creator_id, '.VIEWED_POST.'.created_date, 
                '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
                '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish,
                '.USER.'.first_name, '.USER.'.last_name ');
            $this->db->from(''.POST.'');
            $this->db->join(''.VIEWED_POST.'', ''.POST.'.post_id = '.VIEWED_POST.'.post_id','RIGHT');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');

        $where = "FIND_IN_SET('".$search_term."', ".POST.".tagged_labels)"; 
        $this->db->where( $where ); 
        
        if(!empty($where_array)){
            $this->db->where($where_array);
        }
        $this->db->where(''.POST.'.publish!=',2);
        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
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
            
        //}
    }
    
    
    public function searchIndividuallly($where_array='',$where_string='',$where_search='',$page=''){
        $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
            $this->db->from(''.POST.'');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
            
            if(!empty($where_array)){
                $this->db->where($where_array);
            }
            
            if($where_string){
                $this->db->where($where_string); 
            }
            $this->db->where(''.POST.'.publish!=',2);
            if($where_search){
                $this->db->where($where_search); 
            }
            
//            if(!empty($search_data['primary_own'])){
//                $where_search = " ".POST.".post_creator_id = ".$search_data['primary_own']." "; 
//                $this->db->where($where_search); 
//            }
//            else if(!empty($search_data['co_ownr'])){
//                $where_search = "FIND_IN_SET('".$search_data['co_ownr']."', ".POST.".co_owners)";
//                $this->db->where($where_search); 
//            }
//            else if(!empty($search_data['lbdata'])){
//                $where_search = "FIND_IN_SET('".$search_data['lbdata']."', ".POST.".tagged_labels)";
//                $this->db->where($where_search); 
//            }
            
            if($page){
                $start = ($page-1)*POST_LIMIT;
                $this->db->limit(POST_LIMIT, $start);
            }
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
    
    
    //public function getFollowedPosts($follow_array,$record_type,$page=''){
    public function searchIndividualllyFollowedPosts($where_array='',$where_string='',$where_search='',$page=''){
        $this->db->select(''.FOLLOWED_POST.'.followed_post_id, '.FOLLOWED_POST.'.company_id, '.FOLLOWED_POST.'.post_id,
            '.FOLLOWED_POST.'.followed_by, '.FOLLOWED_POST.'.post_creator_id, '.FOLLOWED_POST.'.created_date,
            '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
            '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.FOLLOWED_POST.'');
        $this->db->join(''.POST.'', ''.POST.'.post_id = '.FOLLOWED_POST.'.post_id','LEFT');
        //$this->db->join(''.USER.'', ''.FOLLOWED_POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        //$this->db->where($follow_array);
        
        if(!empty($where_array)){
            $this->db->where($where_array);
        }
            
        if($where_string){
            $this->db->where($where_string); 
        }

        if($where_search){
            $this->db->where($where_search); 
        }
        $this->db->where(''.POST.'.publish!=',2);
        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
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
    
    
    //public function searchRecentlyViewed($search_term='',$page='',$order_by='',$arr_of_label='',$arr_of_username='', $where_array=''){
    public function searchIndividualllyRecentlyViewed($where_array='',$where_string='',$where_search='',$page=''){
        $this->db->select(''.VIEWED_POST.'.viewed_post_id, '.VIEWED_POST.'.company_id, '.VIEWED_POST.'.post_id,
            '.VIEWED_POST.'.viewed_by, '.POST.'.post_creator_id, '.VIEWED_POST.'.created_date, 
            '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
            '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish,
            '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.POST.'');
        $this->db->join(''.VIEWED_POST.'', ''.POST.'.post_id = '.VIEWED_POST.'.post_id','RIGHT');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');

        $this->db->where(''.POST.'.publish!=',2);
        
        if(!empty($where_array)){
            $this->db->where($where_array);
        }
        if($where_search){
            $this->db->where($where_search); 
        }

        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
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
            
        //}
    }
    
    public function getMaxMinCreatedDate(){
        $this->db->select('min('.POST.'.created_date) AS min_created,max('.POST.'.created_date) AS max_created');
        $this->db->from(''.POST.'');
        $this->db->where(''.POST.'.publish!=',2);
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
    
    public function getMaxMinUpdatedDate(){
        $this->db->select('min('.POST.'.updated_date) AS min_updated,max('.POST.'.updated_date) AS max_updated');
        $this->db->from(''.POST.'');
        $this->db->where(''.POST.'.publish!=',2);
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
    
    public function getMaxMinSerialNo(){
        $this->db->select('min('.POST.'.post_id) AS min_no,max('.POST.'.post_id) AS max_no');
        $this->db->from(''.POST.'');
        $this->db->where(''.POST.'.publish!=',2);
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
    
    
}