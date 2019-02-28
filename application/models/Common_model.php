<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Common_model extends CI_Model {
    var $gallery_path;
    var $tee_label;
    var $string = '';
    var $ns = '';

    public function __construct() {
        parent::__construct();
    }
    
    public function getIndividualUserDetails($user_id,$company_id='',$login_status=''){
        $this->db->select('user_id, first_name, last_name, email, password, domain, interests, company_id, login_status, is_super_user');
        $this->db->from(''.USER.'');
        $this->db->where('user_id',$user_id);
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($login_status == 1){
            $this->db->where('login_status',$company_id);
        }
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
    
    public function getAllUsersBasicInfo($users_array=''){
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->db->select('user_id, first_name, last_name, email, company_id, is_super_user');
        $this->db->from(''.USER.'');
        $this->db->where('company_id',$company_id);
        
        if(!empty($users_array)){
            //$this->db->where('user_id <>', $users_array);
            $this->db->where_not_in('user_id', $users_array);
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
    
    public function getLabels($parent_id = 0, $sub_mark = ''){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $sql = "SELECT * FROM ".LABEL." WHERE label_parent_id = $parent_id AND company_id = $company_id ORDER BY label_name ASC";
        
        $query = $this->db->query($sql);
        
        //echo $this->db->last_query(); die;
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }else{
            return ;
        }
    }
    
    public function getAutoLabels($term='', $parent_id = 0, $sub_mark = ''){
        $i = 0;
        $sql = "";
        //$sql .= "SELECT * FROM ks_label WHERE label_parent_id = $parent_id ORDER BY label_name ASC";
        $sql .= "SELECT * FROM ".LABEL." WHERE label_parent_id = $parent_id ";
        if($term){
            $sql .= " AND label_name LIKE '%$term%' ";
        }
        $sql .= " ORDER BY label_name ASC";
        //echo $sql;die('aaaaaa');
        if($parent_id!=0){
            echo 'Count'.$i.'---'. $sql;die;
        }
        
        $query = $this->db->query($sql);
        
        //echo $this->db->last_query();die;
        $treeData = array();
        if($query->num_rows()>0)
        {
            $result = $query->result_array();
            //print_r($result);die;
            foreach($result as $label_data){
                $i++;
                echo '<option value="'.$label_data['label_id'].'">'.$sub_mark.$label_data['label_name'].'</option>';echo $term;die('sss');
                $data['label_id'] = $label_data['label_id'];
                $data['label_name'] = $label_data['label_name'];
                array_push($treeData, $data);
                $this->getAutoLabels($term, $label_data['label_id'], $sub_mark.'---');
                
            }
            return $treeData;
            
        }else{
            return ;
        }
    }
    
    public function getPostType(){
        $this->db->select('post_type_id, post_type');
        $this->db->from(''.POST_TYPE.'');
        
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
    
    public function getCommaSepratedUsers($user_arr,$where_in=''){
        //echo print_r($where_in);die('zzz');
        //echo print_r($where_in);
        $this->db->select("GROUP_CONCAT(CONCAT_WS(' ', first_name,last_name)) As name ");
        $this->db->from(''.USER.'');
        $this->db->where($user_arr);
        if($where_in){
            $this->db->where_in('user_id',$where_in);
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        //die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row()->name;
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getPostScore($where_arra){
        $user_id = $where_arra['post_creator_id'];
        //$user_id = 1;
        $company_id = $where_arra['company_id'];
        $where = "FIND_IN_SET('".$user_id."', ".POST.".co_owners)";
        
        $this->db->select("*");
        $this->db->from(''.POST.'');
        $this->db->where(''.POST.'.company_id',$company_id);
        $this->db->where(''.POST.'.post_creator_id',$user_id);
        $this->db->where(''.POST.'.publish!=',2);
        $query1 = $this->db->get_compiled_select();
        
        $this->db->select("*");
        $this->db->from(''.POST.'');
        $this->db->where(''.POST.'.company_id',$company_id);
        $this->db->where(''.POST.'.publish!=',2);
        $this->db->where($where); 
        $query2 = $this->db->get_compiled_select();
        
        $query = $this->db->query($query1 . ' UNION ' . $query2);
        
        //$query = $this->db->get();
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
    
    public function getPostViewScore($where_arra){
        $user_id = $where_arra['post_creator_id'];
        $company_id = $where_arra['company_id'];
        
        $this->db->select("*");
        $this->db->from(''.VIEWED_POST.'');
        $this->db->where(''.VIEWED_POST.'.company_id',$company_id);
        $this->db->where(''.VIEWED_POST.'.post_creator_id',$user_id);
        
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
    

    
    public function getPostHelpfulScore($where_arra){
        $this->db->select("*");
        $this->db->from(''.HELPFUL_POST.'');
        $this->db->where($where_arra);
        
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
    
    
    function nestedLabelExistance($parent_id = 0){
        $result = $this->getLabels($parent_id);
        if(!empty($result)){
            foreach($result as $label_data){
                $this->gallery_path .= $label_data->label_id.',';
                $this->nestedLabelExistance($label_data->label_id);
            }
        }
        //echo $i;die;
        return $this->gallery_path;
        //echo $lab_ids;
    }
    
    public function addNotification($data){
        $this->db->insert(''.NOTIFICATION.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getSingleLabel($label_array){
        $this->db->select(''.LABEL.'.label_id, '.LABEL.'.label_parent_id, '.LABEL.'.visible_to, '.LABEL.'.company_id, '.LABEL.'.label_creator_id, '.LABEL.'.label_name,
            '.LABEL.'.inherit_visibility,'.LABEL.'.merge_label_status,'.LABEL.'.request_for_merge_by,'.LABEL.'.merge_for_label_id,'.USER.'.first_name,'.USER.'.last_name ');
        $this->db->from(''.LABEL.'');
        $this->db->join(''.USER.'', ''.LABEL.'.label_creator_id = '.USER.'.user_id','LEFT');
        $this->db->where($label_array);
        
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
    
    public function addCalendarPost($data){
        $this->db->insert(''.POST_CALENDAR.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateCalendarPost($update_calendar_array,$where_calendar_array){
        $this->db->where($where_calendar_array);
        $res = $this->db->update(''.POST_CALENDAR.'', $update_calendar_array);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
    public function deleteCalendar($where_calendar_array){
       $this->db->where($where_calendar_array);
       $this->db->delete(''.POST_CALENDAR.''); 
    }
    
    public function getCalendarPost($caln_array){
        $this->db->select('*');
        $this->db->from(''.POST_CALENDAR.'');
        $this->db->where($caln_array);
        
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
    
    public function deleteSavedSearch($where_array){
       $this->db->where($where_array);
       $this->db->delete(''.SAVE_SEARCH.''); 
    }
    
    public function getLimitedUsers($where_in=''){
        $this->db->select("*");
        $this->db->from(''.USER.'');
        //$this->db->where($user_arr);
        if($where_in){
            $this->db->where_in('user_id',$where_in);
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query(); //die('SS');
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
    
    public function getCoOwners($where_arr,$cown_string){
        $where_in = array();
        if(!empty($cown_string)){
            $where_in = explode(',',$cown_string);
        }else{
            return false;
        }
        $this->db->select("*");
        $this->db->from(''.USER.'');
        $this->db->where($where_arr);
        //$this->db->where($user_arr);
        if($where_in){
            $this->db->where_in('user_id',$where_in);
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query(); //die('SS');
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
    
    
    function taggLabels($label_id){ //echo $label_id; die;
    //
    echo'<br/>';
//       $fcount++;
//       echo $fcount.'</br>';
        //if($label_id){
           //echo $label_id.' ----------';
            $label_name = '';
            $single_label_details = $this->getSingleLabel(array('label_id'=>$label_id));
            //$single_label_details = $CI->post_model->getIndividualLabel($label_id);
            //print_r($single_label_details);die;
            //$this->string = '';
            if(!empty($single_label_details->label_parent_id) && $single_label_details->label_parent_id!=0 && $label_id!=0){
                $this->string .= $single_label_details->label_name.'/';
                $new_label_id = $single_label_details->label_parent_id;
                //echo $fcount.'</br>';
                $this->taggLabels($new_label_id);

            }
            else if( $single_label_details->label_parent_id==0){
                if(!empty($single_label_details->label_name) && $single_label_details->label_name){
                   //$this->string .= $label_id.'%###'.$single_label_details->label_name.'/';
                    $this->string .= $single_label_details->label_name.'/';
                }
            }
            $label_id='';
           
            //echo $this->string;
        //}
            $mystring=$this->string;
            //$this->string='';
            
        return $mystring;
    }
    
    function teeLabels($label_id){
        //$fcount=0;
        $this->ns = '';
        $this->string='';
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        $ar = array(''.LABEL.'.label_id'=>$label_id,''.LABEL.'.company_id'=>$company_id);
        //$result = $this->getSingleLabel($ar);
        return $this->taggLabels($label_id);
        
    }
    
    function labelTree($parent_id = 0, $sub_mark = '',$pid=''){
    
        $this->thread='';
        $result = $this->getLabels($parent_id);
        
        if(!empty($result)){
            foreach($result as $label_data){
                //echo '<option value="'.$label_data->label_id.'" >'.$sub_mark.$label_data->label_name.'</option>';
                
                //$thread = $this->teeLabels($label_data->label_id);
                //print_r($thread);die('sss');
                if($pid == $label_data->label_id){
                    echo '<option selected value="'.$label_data->label_id.'">'.$sub_mark.$label_data->label_name.'</option>';
                }else{
                    echo '<option value="'.$label_data->label_id.'" >'.$sub_mark.$label_data->label_name.'</option>';
                }
                //labelTree($label_data->label_id, $sub_mark.'&nbsp;');
                if($pid){
                    labelTree($label_data->label_id, $sub_mark.'&nbsp;&nbsp;&nbsp;', $pid);
                    //labelTree($label_data->label_id, $sub_mark+20, $pid);
                }else{
                    labelTree($label_data->label_id, $sub_mark.'&nbsp;&nbsp;&nbsp;');
                    //labelTree($label_data->label_id, $sub_mark+20);
                }
            }
        }
    }
    
    public function getAllLabel(){
        $this->db->select("*");
        $this->db->from(''.LABEL.'');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); //die('SS');
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
    
    public function getLabelVisibleTo($visibleto_string,$comapny_id){
        $where_in = array();
        if(!empty($visibleto_string)){
            $where_in = explode(',',$visibleto_string);
        }else{
            return false;
        }
        $this->db->select('user_id, first_name, last_name, email, company_id, is_super_user');
        $this->db->from(''.USER.'');
        $this->db->where('company_id',$comapny_id);
        //$this->db->where($user_arr);
        if($where_in){
            $this->db->where_in('user_id',$where_in);
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query(); //die('SS');
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
    
}