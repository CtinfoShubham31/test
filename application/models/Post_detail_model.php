<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post_detail_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function addFollowedPosts($data){
        $this->db->insert(''.FOLLOWED_POST.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getFollowedPosts($follow_array,$record_type,$page='',$order_by=''){
        if($order_by == 1 || $order_by == 2 || $order_by == 3 || $order_by == 4){
            $cnt = 'COUNT('.POST.'.post_id) AS cnt';
        }else if($order_by == 5 || $order_by == 6){
            $cnt = 'COUNT('.VIEWED_POST.'.post_id) AS cnt';
            //$join_string .= '$this->db->join("'.VIEWED_POST.'", "'.VIEWED_POST.'".post_id = "'.POST.'".post_id","LEFT")';
        }else if($order_by == 7 || $order_by == 8){
            $cnt = 'COUNT('.COMMENT.'.post_id) AS cnt';
            //$join_string .= '$this->db->join("'.COMMENT.'", "'.COMMENT.'".post_id = "'.POST.'".post_id","LEFT")';
        }else if($order_by == 9 || $order_by == 10){
            $cnt = 'COUNT('.HELPFUL_POST.'.post_id) AS cnt';
            //$join_string .= '$this->db->join("'.HELPFUL_POST.'", "'.HELPFUL_POST.'".post_id = "'.POST.'".post_id","LEFT")';
        }else{
            $cnt = 'COUNT('.POST.'.post_id) AS cnt';
        }
        
        $this->db->select(''.FOLLOWED_POST.'.followed_post_id, '.$cnt.', '.FOLLOWED_POST.'.company_id, '.FOLLOWED_POST.'.post_id,
            '.FOLLOWED_POST.'.followed_by, '.POST.'.post_creator_id, '.FOLLOWED_POST.'.created_date,
            '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
            '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.FOLLOWED_POST.'');
        $this->db->join(''.POST.'', ''.POST.'.post_id = '.FOLLOWED_POST.'.post_id','LEFT');
        //$this->db->join(''.USER.'', ''.FOLLOWED_POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        if($order_by == 5 || $order_by == 6){
            $this->db->join(''.VIEWED_POST.'', ''.VIEWED_POST.'.post_id = '.POST.'.post_id','LEFT');
        }
        else if($order_by == 7 || $order_by == 8){
            $this->db->join(''.COMMENT.'', ''.COMMENT.'.post_id = '.POST.'.post_id','LEFT');
        }
        else if($order_by == 9 || $order_by == 10){
            $this->db->join(''.HELPFUL_POST.'', ''.HELPFUL_POST.'.post_id = '.POST.'.post_id','LEFT');
        }
        
        $this->db->where($follow_array);
        
        $this->db->where(''.POST.'.publish!=',2);
        
        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
        $this->db->group_by(''.POST.'.post_id','DESC');
        //$this->db->order_by(''.FOLLOWED_POST.'.created_date','DESC');
        if($order_by == 1){
            $this->db->order_by('cnt','DESC');
            $this->db->order_by(''.POST.'.created_date','DESC'); //Created new to old
        }else if($order_by == 2){
            $this->db->order_by('cnt','ASC');
            $this->db->order_by(''.POST.'.created_date','ASC'); //Created old to new
        }else if($order_by == 3){
            $this->db->order_by('cnt','DESC');
            $this->db->order_by(''.POST.'.updated_date','DESC'); //Created new to old
        }else if($order_by == 4){
            $this->db->order_by('cnt','ASC');
            $this->db->order_by(''.POST.'.updated_date','ASC'); //Created new to old
        }else if($order_by == 5){
            $this->db->order_by('cnt','DESC');
        }else if($order_by == 6){
            $this->db->order_by('cnt','ASC');
        }else if($order_by == 7){
            $this->db->order_by('cnt','DESC');
        }else if($order_by == 8){
            $this->db->order_by('cnt','ASC');
        }else if($order_by == 9){
            $this->db->order_by('cnt','DESC');
        }else if($order_by == 10){
            $this->db->order_by('cnt','ASC');
        }
        else{
            //$this->db->order_by('cnt','DESC');
            $this->db->order_by(''.FOLLOWED_POST.'.followed_post_id','DESC');
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()==1 && $record_type == 'Single')
        {
            $row = $query->row();
            return $row;
        }
        else if($query->num_rows()>0 && $record_type == 'Multiple'){
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function deleteFollowers($where_follow_array){
       $this->db->where($where_follow_array);
       $this->db->delete(''.FOLLOWED_POST.''); 
    }
    
    public function addViewdPosts($data){
        $this->db->insert(''.VIEWED_POST.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getViewedPosts($view_array,$record_type,$page='',$order_by=''){
        if($order_by == 1 || $order_by == 2 || $order_by == 3 || $order_by == 4){
            $cnt = 'COUNT('.POST.'.post_id) AS cnt';
        }else if($order_by == 5 || $order_by == 6){
            $cnt = 'COUNT('.VIEWED_POST.'.post_id) AS cnt';
        }else if($order_by == 7 || $order_by == 8){
            $cnt = 'COUNT('.COMMENT.'.post_id) AS cnt';
        }else if($order_by == 9 || $order_by == 10){
            $cnt = 'COUNT('.HELPFUL_POST.'.post_id) AS cnt';
        }else{
            $cnt = 'COUNT('.POST.'.post_id) AS cnt';
        }
         $this->db->select(''.VIEWED_POST.'.viewed_post_id, '.$cnt.', '.VIEWED_POST.'.company_id, '.VIEWED_POST.'.post_id,
            '.VIEWED_POST.'.viewed_by, '.POST.'.post_creator_id, '.VIEWED_POST.'.created_date, 
            '.POST.'.post_type, '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, 
            '.POST.'.detail_description, '.POST.'.created_date, '.POST.'.updated_date,'.POST.'.commented_views, '.POST.'.updated_views, '.POST.'.publish, '.USER.'.first_name, '.USER.'.last_name ');
        $this->db->from(''.POST.'');
        $this->db->join(''.VIEWED_POST.'', ''.POST.'.post_id = '.VIEWED_POST.'.post_id','RIGHT');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        if($order_by == 7 || $order_by == 8){
            $this->db->join(''.COMMENT.'', ''.COMMENT.'.post_id = '.POST.'.post_id','LEFT');
        }
        else if($order_by == 9 || $order_by == 10){
            $this->db->join(''.HELPFUL_POST.'', ''.HELPFUL_POST.'.post_id = '.POST.'.post_id','LEFT');
        }
        
        $this->db->where($view_array);
        $this->db->where(''.POST.'.publish!=',2);
        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
        
        $this->db->group_by(''.POST.'.post_id','DESC');
        
        if($order_by == 1){
            $this->db->order_by('cnt','DESC');
            $this->db->order_by(''.POST.'.created_date','DESC'); //Created new to old
        }else if($order_by == 2){
            $this->db->order_by('cnt','ASC');
            $this->db->order_by(''.POST.'.created_date','ASC'); //Created old to new
        }else if($order_by == 3){
            $this->db->order_by('cnt','DESC');
            $this->db->order_by(''.POST.'.updated_date','DESC'); //Created new to old
        }else if($order_by == 4){
            $this->db->order_by('cnt','ASC');
            $this->db->order_by(''.POST.'.updated_date','ASC'); //Created new to old
        }else if($order_by == 5){
            $this->db->order_by('cnt','DESC');
        }else if($order_by == 6){
            $this->db->order_by('cnt','ASC');
        }else if($order_by == 7){
            $this->db->order_by('cnt','DESC');
        }else if($order_by == 8){
            $this->db->order_by('cnt','ASC');
        }else if($order_by == 9){
            $this->db->order_by('cnt','DESC');
        }else if($order_by == 10){
            $this->db->order_by('cnt','ASC');
        }
        else{
            //$this->db->order_by('cnt','DESC');
            $this->db->order_by(''.VIEWED_POST.'.viewed_post_id','DESC');
            //$this->db->order_by(''.VIEWED_POST.'.created_date','DESC'); 
            //$this->db->order_by(''.VIEWED_POST.'.created_date','DESC');
        }
        
        //$this->db->order_by(''.VIEWED_POST.'.created_date','DESC');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()==1 && $record_type == 'Single')
        {
            $row = $query->row();
            return $row;
        }
        else if($query->num_rows()>0 && $record_type == 'Multiple'){
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getPostsAttachment($attachm_array){
        $this->db->select('post_attachment_id, company_id, post_id, attachment');
        $this->db->from(''.POST_ATTACHM.'');
        $this->db->where($attachm_array);
        
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
    
    public function getPostsGraphics($graphic_array){
        $this->db->select('post_graphic_id, company_id, post_id, graphic');
        $this->db->from(''.POST_GRAPHICS.'');
        $this->db->where($graphic_array);
        
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
    
    
    public function getSheetData($list_upload){
        //require 'Classes/PHPExcel/IOFactory.php';
        if($list_upload){
            include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');

            $inputfilename = 'upload/lists/'.$list_upload;
            //die;
            //$inputfilename = 'upload/lists/dummy/dummy.xlsx';
            //$inputfilename = 'upload/lists/example_file.xlsx';
            $exceldata = array();

            try
            {
                $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
                $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
                $objPHPExcel = $objReader->load($inputfilename);
            }
            catch(Exception $e)
            {
                die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            $datasets = $objPHPExcel->setActiveSheetIndex(0)->toArray();
           
            return $datasets;
        }else{
            return FALSE;
        }
                
    }

    
    public function addSheetColumn($val){
        include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        //echo $col_row.'----'.$val;die;
        //$inputfilename = 'upload/lists/'.$list_array['file_name'];
        $inputfilename = 'upload/lists/new.xlsx';
        try
        {
            $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
            $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
            $objPHPExcel = $objReader->load($inputfilename);
        }
        catch(Exception $e)
        {
            die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $objPHPExcel->setActiveSheetIndex(0);
        
        $highestColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
        $highestColumn++;
        $row = 1;
        //echo $highestColumn.$row.'----'.$val;die;
        $objPHPExcel->getActiveSheet()->SetCellValue($highestColumn.$row, $val);
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/new.xlsx');
        
        return TRUE;
    }
    
    public function addSheetRow($val){
        include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        $inputfilename = 'upload/lists/new.xlsx';
        try
        {
            $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
            $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
            $objPHPExcel = $objReader->load($inputfilename);
        }
        catch(Exception $e)
        {
            die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $alpha_arr = array('A','B','C','D','E','F','G','H','I','J');
        
        $objPHPExcel->setActiveSheetIndex(0);
        
        $highestColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
        $highestRow = $objPHPExcel->getActiveSheet()->getHighestRow(); 
        
        for($h = 0;$h <= $highestColumn; $h++){
            $objPHPExcel->getActiveSheet()->SetCellValue($alpha_arr[$h].$highestRow, $val);
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/new.xlsx');
        
        return TRUE;
    }
    
    public function testExp(){
        include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        $inputfilename = 'upload/lists/dummy/dummy.xlsx';
        try
        {
            $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
            $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
            $objPHPExcel = $objReader->load($inputfilename);
        }
        catch(Exception $e)
        {
            die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $objPHPExcel->setActiveSheetIndex(0);

        $this->db->select('*');
        $this->db->from('test');
        $this->db->where('user_id',7);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $manual_sheet = $query->result();
            
            foreach ($manual_sheet as $msheet) {
                $objPHPExcel->getActiveSheet()->SetCellValue($msheet->col,$msheet->val);
            }
            
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            $objWriter->save('myfile.xlsx');
            
            return true;
        }
        else
        {
            return false;
        }
        
        
    }
    
    public function getPostsHistory($history_arr){
        $this->db->select('history_id, company_id, post_id, user_id, message, history_type, multi_user_ids, date, icon');
        $this->db->from(''.HISTORY.'');
        $this->db->where($history_arr);
        
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
    
    
    
    
}