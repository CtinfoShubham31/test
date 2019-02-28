<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getIndividualLabel($label_id){
        $this->db->select('label_id, label_parent_id, company_id, label_creator_id, label_name, visible_to, inherit_visibility');
        $this->db->from(''.LABEL.'');
        $this->db->where('label_id',$label_id);
        
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
    
    public function addLabel($data){
        $this->db->insert(''.LABEL.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateLabel($update_label_array,$where_label_array){
        $this->db->where($where_label_array);
        $res = $this->db->update(''.LABEL.'', $update_label_array);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
    public function addPost($data){
        $this->db->insert(''.POST.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addPostAttachment($data){
        $this->db->insert(''.POST_ATTACHM.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addPostGraphics($data){
        $this->db->insert(''.POST_GRAPHICS.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getPosts($where_array='',$page='', $order_by=''){
        $join_string = '';
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
        
        $this->db->select(''.POST.'.post_id, '.$cnt.', '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description, '.POST.'.content_request_status,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.commented_views, '.POST.'.updated_views, 
            '.USER.'.first_name, '.USER.'.last_name, '.POST_TYPE.'.post_type ');
        $this->db->from(''.POST.'');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        $this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
        if($order_by == 5 || $order_by == 6){
            $this->db->join(''.VIEWED_POST.'', ''.VIEWED_POST.'.post_id = '.POST.'.post_id','LEFT');
        }
        else if($order_by == 7 || $order_by == 8){
            $this->db->join(''.COMMENT.'', ''.COMMENT.'.post_id = '.POST.'.post_id','LEFT');
        }
        else if($order_by == 9 || $order_by == 10){
            $this->db->join(''.HELPFUL_POST.'', ''.HELPFUL_POST.'.post_id = '.POST.'.post_id','LEFT');
        }
        
//        $this->db->join(''.VIEWED_POST.'', ''.VIEWED_POST.'.post_id = '.POST.'.post_id','LEFT');
//        $this->db->join(''.HELPFUL_POST.'', ''.HELPFUL_POST.'.post_id = '.POST.'.post_id','LEFT');
//        $this->db->join(''.COMMENT.'', ''.COMMENT.'.post_id = '.POST.'.post_id','LEFT');
        //$join_string;
        if(!empty($where_array)){
            $this->db->where($where_array);
        }
        
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
        }else if($order_by == 3){
            $this->db->order_by('cnt','DESC');
        }else if($order_by == 4){
            $this->db->order_by('cnt','ASC');
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
            $this->db->order_by('cnt','DESC');
        }
        
        $this->db->order_by(''.POST.'.created_date','DESC'); 
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        //die('SS');
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
    
    public function getIndividualPosts($post_array){
        
//        $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type,
//            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
//            '.POST.'.created_date, '.POST.'.updated_date, '.POST.'.list_upload, '.USER.'.first_name, '.USER.'.last_name ');
//        $this->db->from(''.POST.'');
//        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
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
    
    public function addHelpfulPosts($data){
        $this->db->insert(''.HELPFUL_POST.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getHelpfulPosts($helpful_array){
        $this->db->select('helpful_post_id, company_id, post_id, helpful_by, post_creator_id, helpful_type, created_date');
        $this->db->from(''.HELPFUL_POST.'');
        $this->db->where($helpful_array);
        
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
    
    public function getCoOwners($users_array){
        $this->db->select('user_id, first_name, last_name, email, company_id');
        $this->db->from(''.USER.'');

        $this->db->where_in('user_id', $users_array);
        
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
    
    public function getTreeLabels($label_array,$limit=''){
        $this->db->select(''.LABEL.'.label_id, '.LABEL.'.label_parent_id, '.LABEL.'.company_id, '.LABEL.'.label_creator_id, '.LABEL.'.label_name, '.LABEL.'.merge_label_status, '.USER.'.first_name,'.USER.'.last_name, '.USER.'.is_super_user ');
        $this->db->from(''.LABEL.'');
        $this->db->join(''.USER.'', ''.LABEL.'.label_creator_id = '.USER.'.user_id','LEFT');
        $this->db->where($label_array);
        if($limit){
            $this->db->limit($limit);
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
    
    function treeLabels($parent_id){
        //$user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');

        $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$parent_id);
        $label_data = $this->getTreeLabels($label_array);
        
        $string = '';
        if(!empty($label_data)){
            foreach ($label_data as $labdata) {
                $label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$labdata->label_id);
                $label_data2 = $this->getTreeLabels($label_array2);
                if(empty($label_data2)){
                    $string .= '<li data-toggle="tooltip" data-placement="top" title="'.$labdata->first_name.''.$labdata->last_name.'"><a href="javascript:void(0)">'.$labdata->label_name.'</a></li>';
                }else{
                $string .= '<li class="has-children" data-toggle="tooltip" data-placement="top" title="'.$labdata->first_name.''.$labdata->last_name.'">
                                <input type="checkbox" name="sub-group-3" id="sub-group-'.$labdata->label_id.'">
                                <label class="label-title" for="sub-group-'.$labdata->label_id.'">';
                            $string .= '<span>'.$labdata->label_name.'</span>'; 
                                $string .= '<span class="badge">'.COUNT($label_data2).'</span>';
                        $string .= '</label>';
                    if(!empty($labdata->label_id)){  
                            $string .= '<ul>';
                            //$string .= $labdata->label_id.'PP  ';
                            $string .= $this->treeLabels($labdata->label_id);

                            $string .= '</ul>';
                    }
                    $string .= '</li>';    
                }
            }

        }

        return $string;
    }
    
    function treeLabelsPopup($parent_id,$label_creator_id){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $usrdata = $this->getsingleUserDetails($user_id,$company_id);
        
        //$label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$parent_id,''.LABEL.'.label_creator_id'=>$label_creator_id);
        $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$parent_id);
        $label_data = $this->getTreeLabels($label_array);
        
        $string = '';
        if(!empty($label_data)){
            foreach ($label_data as $labdata) {
                //$label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$labdata->label_id,''.LABEL.'.label_creator_id'=>$label_creator_id);
                $label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$labdata->label_id);
                $label_data2 = $this->getTreeLabels($label_array2);
                if(empty($label_data2)){
                    $string .= '<li id="delt'.$labdata->label_id.'" class="label-title relative" data-toggle="tooltip" data-placement="top" title="'.$labdata->first_name.''.$labdata->last_name.'"><a href="javascript:void(0)">'.$labdata->label_name.' ';
                    if($labdata->label_creator_id == $user_id){
                        $string .= '<div class="edit-tag edit-tag2"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-compress" onclick="mergeLabel('.$labdata->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i><i data-placement="top" data-toggle="modal" data-target="#edit_label" onclick="editManageLabel('.$labdata->label_id.')" class="fa fa-pencil" data-original-title="Edit"></i><i class="fa fa-trash" onclick="delete_label('.$labdata->label_id.')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></div>';
                    }
                    else if(!empty($usrdata) && $usrdata->is_super_user){
                        $string .= '<div class="edit-tag"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-compress" onclick="mergeLabel('.$labdata->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i></div>';
                    }
                    $string .= '</a></li>';
                }else{
//                $string .= '<li class="has-children">
//                                <input type="checkbox" name="sub-group-3" id="sub-group-'.'0'.$labdata->label_id.'">
//                                <label for="sub-group-'.'0'.$labdata->label_id.'">'.$labdata->label_name.'</label>';
                    
                    $string .= '<li id="delt'.$labdata->label_id.'" class="has-children" data-toggle="tooltip" data-placement="top" title="'.$labdata->first_name.''.$labdata->last_name.'">
                                <input type="checkbox" name="sub-group-3" id="sub-group-0'.$labdata->label_id.'">
                                <label class="label-title" for="sub-group-0'.$labdata->label_id.'">';
                            $string .= '<span data-toggle="tooltip" data-placement="top" title="'.$labdata->label_name.'">'.$labdata->label_name.'</span>'; 
                                $string .= '<span class="badge">'.COUNT($label_data2).'</span>';
                                if($labdata->label_creator_id == $user_id){
                                    $string .= '<div class="edit-tag"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-compress" onclick="mergeLabel('.$labdata->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i><i data-toggle="modal" data-placement="top" data-target="#edit_label" onclick="editManageLabel('.$labdata->label_id.')" class="fa fa-pencil" data-original-title="Edit"></i>
                                    <i class="fa fa-trash" onclick="delete_label('.$labdata->label_id.')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></div>';
                                }
                                else if(!empty($usrdata) && $usrdata->is_super_user){
                                    $string .= '<div class="edit-tag"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-compress" onclick="mergeLabel('.$labdata->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i></div>';
                                }
                            $string .= '</label>';
                    
                    if(!empty($labdata->label_id)){  
                            $string .= '<ul>';
                            //$string .= $labdata->label_id.'PP  ';
                            $string .= $this->treeLabelsPopup($labdata->label_id,$label_creator_id);

                            $string .= '</ul>';
                    }
                    $string .= '</li>';    
                }
            }

        }

        return $string;
    }
    
    
    
    
    public function addPostListSheetData($list_array){
        //require 'Classes/PHPExcel/IOFactory.php';
        if($list_array['file_name']){
            include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');

            $inputfilename = 'upload/lists/'.$list_array['file_name'];
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

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); //print_r($highestRow);die('SSS');//2
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 1; $row <= $highestRow; $row++)
            { 
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                if($row == 1){
                    $column_status = 1;
                }else{
                    $column_status = 0;
                }

                $add_lists = array(
                    'column_status'=>$column_status,'post_creator_id'=>$list_array['post_creator_id'],
                    'post_id'=>$list_array['post_id'],'company_id'=>$list_array['company_id'],
                    'col_1'=>!empty($rowData[0][0]) ? $rowData[0][0] : '','col_2'=>!empty($rowData[0][1]) ? $rowData[0][1] : '',
                    'col_3'=>!empty($rowData[0][2]) ? $rowData[0][2] : '','col_4'=>!empty($rowData[0][3]) ? $rowData[0][3] : '',
                    'col_5'=>!empty($rowData[0][4]) ? $rowData[0][4] : '','col_6'=>!empty($rowData[0][5]) ? $rowData[0][5] : '',
                    'col_7'=>!empty($rowData[0][6]) ? $rowData[0][6] : '','col_8'=>!empty($rowData[0][7]) ? $rowData[0][7] : '',
                    'col_9'=>!empty($rowData[0][8]) ? $rowData[0][8] : '','col_10'=>!empty($rowData[0][9]) ? $rowData[0][9] : '',
                    'col_11'=>!empty($rowData[0][10]) ? $rowData[0][10] : '','col_12'=>!empty($rowData[0][11]) ? $rowData[0][11] : '',
                    'col_13'=>!empty($rowData[0][12]) ? $rowData[0][12] : '','col_14'=>!empty($rowData[0][13]) ? $rowData[0][13] : '',
                    'col_15'=>!empty($rowData[0][14]) ? $rowData[0][14] : '',
                );

                $this->db->insert(''.POST_LISTS.'',$add_lists);
                //$insert_id = $this->db->insert_id();
                //return $insert_id;

            }
            return TRUE;
        }else{
            return FALSE;
        }
                
    }

    
    public function updatePostInfo($update_post_array,$where_post_array){
        //print_r($update_post_array);die;
        $this->db->where($where_post_array);
        $res = $this->db->update(''.POST.'', $update_post_array);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
    public function deletePost($where_post_array){
       $this->db->where($where_post_array);
       $this->db->delete(''.POST.''); 
    }

    public function getPostTypeLists($lists_array,$limit=''){
        $this->db->select('*');
        $this->db->from(''.POST_LISTS.'');
        $this->db->where($lists_array);
        if($limit){
            $this->db->limit($limit);
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
    
    public function getEditSheetData($list_upload){
        if($list_upload){
            include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');

            $inputfilename = 'upload/lists/'.$list_upload;
            //die;
            //$inputfilename = 'upload/lists/dummy/dummy.xlsx';
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

//            $datasets = $objPHPExcel->setActiveSheetIndex()->toArray();
//            print_r($datasets);die('ssss');
            
            $objWorksheet = $objPHPExcel->getSheet(0); 
            $maxCell = $objWorksheet->getHighestRowAndColumn();
            $datasets = $objWorksheet->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row']);
            //$datasets = array_map('array_filter', $datasets);
            //$datasets = array_filter($datasets);
            //print_r($datasets);die('ssss');
            return $datasets;
        }else{
            return FALSE;
        }
                
    }
    
    public function addSheetColumnManual($data){
        $this->db->insert(''.TMP_PTYPE_LIST.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateTempLists($update_templist_array,$where_templist_array){
        $this->db->where($where_templist_array);
        $res = $this->db->update(''.TMP_PTYPE_LIST.'', $update_templist_array);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
    public function deleteTempLists($where_ptypelists_array){
       $this->db->where($where_ptypelists_array);
       $this->db->delete(''.TMP_PTYPE_LIST.''); 
    }
    
    public function getTempLists($templists_array,$limit=''){
        $this->db->select('*');
        $this->db->from(''.TMP_PTYPE_LIST.'');
        $this->db->where($templists_array);
        if($limit){
            $this->db->limit($limit);
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
    
    public function addManualSheetRow($sheet_arr){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
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
        
        //$alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        
        $objPHPExcel->setActiveSheetIndex(0);
        $loop_cell = $this->getTempLists($sheet_arr);
        //print_r($loop_cell);die('QZZZ');
        if(!empty($loop_cell)){
            foreach($loop_cell AS $lpcell){
                $objPHPExcel->getActiveSheet()->SetCellValue($lpcell->col, $lpcell->val);
            }
        }
        
        $sheet_name = time().'.xlsx';
        
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/'.$sheet_name);
        
        return $sheet_name;
    }
    
    function updateSheet($edit_sheet_arr){
        //print_r($edit_sheet_arr);die('ASASA');
        include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        //echo $col_row.'----'.$val;die;
        //$inputfilename = 'upload/lists/'.$list_array['file_name'];
        $inputfilename = 'upload/lists/'.$edit_sheet_arr['list_upload'];
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
        
        //$objPHPExcel->getActiveSheet()->setCellValue($col_row, $val);
        $objPHPExcel->getActiveSheet()->SetCellValue($edit_sheet_arr['sheet_cell'], $edit_sheet_arr['cell_val']);
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/'.$edit_sheet_arr["list_upload"]);
        
        return TRUE;
    }
    
    function deleteSheetRow($edit_sheet_arr,$tr_id){
        //print_r($edit_sheet_arr);die('ASASA');
        include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        //echo $col_row.'----'.$val;die;
        //$inputfilename = 'upload/lists/'.$list_array['file_name'];
        $inputfilename = 'upload/lists/'.$edit_sheet_arr;
        //die('AAA');
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
        
        //$objPHPExcel->getActiveSheet()->setCellValue($col_row, $val);
        //$objPHPExcel->getActiveSheet()->SetCellValue($edit_sheet_arr['sheet_cell'], $edit_sheet_arr['cell_val']);
        $objPHPExcel->getActiveSheet()->removeRow($tr_id);
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/'.$edit_sheet_arr);
        
        return TRUE;
    }
    
    public function deleteMultipleSheetRow($edit_sheet_arr){
        //print_r($edit_sheet_arr);die('ASASA');
        include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        //echo $col_row.'----'.$val;die;
        //$inputfilename = 'upload/lists/'.$list_array['file_name'];
        $inputfilename = 'upload/lists/'.$edit_sheet_arr;
        //die('AAA');
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
        $objWorksheet = $objPHPExcel->getSheet(0); 
        $maxCell = $objWorksheet->getHighestRowAndColumn();
        //echo $maxCell['row'];die('SSSSS');      //Get highest Number Of Row
        //$g='';
//        if(!empty($maxCell['row'])){ //die('ss'); 
//            //echo $edit_sheet_arr;die('XXX');
//            for($t=2; $t<=$maxCell['row']; $t++){
//                //$g .= $t.'cc \n';
//                $objPHPExcel->getActiveSheet()->removeRow($t);
//                
//                
//                
//            }
//        }
        $objPHPExcel->getActiveSheet()->removeRow(2,$maxCell['row']);
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/'.$edit_sheet_arr);
        //echo $g;die('dd');
        //$objPHPExcel->getActiveSheet()->setCellValue($col_row, $val);
        //$objPHPExcel->getActiveSheet()->SetCellValue($edit_sheet_arr['sheet_cell'], $edit_sheet_arr['cell_val']);
        
//        $objPHPExcel->getActiveSheet()->removeRow($tr_id);
//        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
//        $objWriter->save('upload/lists/'.$edit_sheet_arr);
        
        return TRUE;
    }
    
    
    public function deleteMultipleSheetColumn($edit_sheet_arr,$col_name){
        //print_r($edit_sheet_arr);die('ASASA');
        include(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        //echo $col_row.'----'.$val;die;
        //$inputfilename = 'upload/lists/'.$list_array['file_name'];
        $inputfilename = 'upload/lists/'.$edit_sheet_arr;
        //die('AAA');
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
        $objPHPExcel->getActiveSheet()->removeColumn($col_name);
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/'.$edit_sheet_arr);
        
        return TRUE;
    }




    public function getPostAttachment($post_attachm_arr){
        $this->db->select('post_attachment_id, post_id, company_id, post_creator_id, attachment');
        $this->db->from(''.POST_ATTACHM.'');
        $this->db->where($post_attachm_arr);
        
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
    
    public function getPostGraphics($post_graphic_arr){
        $this->db->select('post_graphic_id, post_id, company_id, post_creator_id, graphic');
        $this->db->from(''.POST_GRAPHICS.'');
        $this->db->where($post_graphic_arr);
        
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
    
    public function deleteGraphics($where_graphic_array){
       $this->db->where($where_graphic_array);
       $this->db->delete(''.POST_GRAPHICS.''); 
    }
    
    public function deleteAttachment($where_attachm_array){
       $this->db->where($where_attachm_array);
       $this->db->delete(''.POST_ATTACHM.''); 
    }
    
    public function addPostHistory($data){
        $this->db->insert(''.HISTORY.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function searchPosts($search_term='',$page='',$order_by='',$arr_of_label='',$arr_of_username=''){
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
        
        $where = '';
        
        $this->db->select(''.POST.'.post_id, '.$cnt.', '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.USER.'.first_name, '.USER.'.last_name, '.POST_TYPE.'.post_type ');
        $this->db->from(''.POST.'');
        $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
        $this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
        $this->db->join(''.VIEWED_POST.'', ''.VIEWED_POST.'.post_id = '.POST.'.post_id','LEFT');
        $this->db->join(''.HELPFUL_POST.'', ''.HELPFUL_POST.'.post_id = '.POST.'.post_id','LEFT');
        $this->db->join(''.COMMENT.'', ''.COMMENT.'.post_id = '.POST.'.post_id','LEFT');
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
            foreach($arr_of_username AS $arr_user){
                $where = "FIND_IN_SET('".$arr_user."', ".POST.".co_owners)"; 
                $this->db->or_where( $where ); 
            }
        }
        
        
//        if(!empty($arr_of_username) || !empty($arr_of_label)){
//            $this->db->or_where( $where ); 
//        }
        //$where = "FIND_IN_SET('".$searchterm."', ".POST.".tagged_labels)";  
        
//        if(!empty($where_array)){
//            $this->db->where($where_array);
//        }
        if($page){
            $start = ($page-1)*POST_LIMIT;
            $this->db->limit(POST_LIMIT, $start);
        }
        //if(empty($search_term)){
            $this->db->group_by(''.POST.'.post_id','DESC');
        //}
        if($order_by == 1){
            $this->db->order_by('cnt','DESC');
            $this->db->order_by(''.POST.'.created_date','DESC'); //Created new to old
        }else if($order_by == 2){
            $this->db->order_by('cnt','ASC');
            //$this->db->order_by(''.POST.'.created_date','ASC'); //Created new to old
        }else if($order_by == 3){
            $this->db->order_by('cnt','DESC');
            //$this->db->order_by(''.POST.'.updated_date','DESC'); //Created new to old
        }else if($order_by == 4){
            $this->db->order_by('cnt','ASC');
            //$this->db->order_by(''.POST.'.updated_date','ASC'); //Created new to old
        }else if($order_by == 5){
            $this->db->order_by('cnt','DESC');
            //$this->db->order_by(''.VIEWED_POST.'.viewed_by','DESC'); //Created new to old
        }else if($order_by == 6){
            $this->db->order_by('cnt','ASC');
            //$this->db->order_by(''.VIEWED_POST.'.viewed_by','ASC'); //Created new to old
        }else if($order_by == 7){
            $this->db->order_by('cnt','DESC');
            //$this->db->order_by(''.COMMENT.'.commented_by','DESC'); //Created new to old
        }else if($order_by == 8){
            $this->db->order_by('cnt','ASC');
            //$this->db->order_by(''.COMMENT.'.commented_by','ASC'); //Created new to old
        }else if($order_by == 9){
            $this->db->order_by('cnt','DESC');
            //$this->db->order_by(''.HELPFUL_POST.'.helpful_by','DESC'); //Created new to old
        }else if($order_by == 10){
            $this->db->order_by('cnt','ASC');
            //$this->db->order_by(''.HELPFUL_POST.'.helpful_by','ASC'); //Created new to old
        }
        else{
            $this->db->order_by('cnt','DESC');
            //$this->db->order_by(''.POST.'.created_date','DESC'); //Created new to old
        }
        $this->db->order_by(''.POST.'.created_date','DESC'); 
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
    
    public function searchLabel($label_name){
        $this->db->select('label_id, label_parent_id, company_id, label_creator_id, label_name');
        $this->db->from(''.LABEL.'');
        $this->db->like('label_name', $label_name);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $arr = array();
            $row = $query->result();
            foreach($row As $result){
                $arr[] = $result->label_id;
            }
            return $arr;
        }
        else
        {
            return false;
        }
    }
    
    public function searchUser($user_name){
        $this->db->select('user_id, first_name, last_name, email, password, domain, interests, company_id');
        $this->db->from(''.USER.'');
        $this->db->or_like(''.USER.'.first_name', $user_name);
        $this->db->or_like(''.USER.'.last_name', $user_name);
        $this->db->or_like("CONCAT_WS(' ',".USER.".first_name,".USER.".last_name) ", $user_name, FALSE);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $arr = array();
            $row = $query->result();
            foreach($row As $result){
                $arr[] = $result->user_id;
            }
            return $arr;
        }
        else
        {
            return false;
        }
    }
    
    
    public function saveSearch($data){
        $this->db->insert(''.SAVE_SEARCH.'',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function savedSearchLists($where_array){
        $this->db->select('save_search_id, search_keyword, company_id, user_id');
        $this->db->from(''.SAVE_SEARCH.'');
        if(!empty($where_array)){
            $this->db->where($where_array);
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
    
    
    public function deleteLabel($company_id,$arr_labels){
        //print_r($where_arr);
        //$this->db->select('*');
        //$this->db->from(''.LABEL.'');
        $this->db->where('company_id',$company_id);
        $this->db->where_in('label_id',$arr_labels);
        $this->db->delete(''.LABEL.''); 
        //$query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
       //$this->db->delete(''.LABEL.''); 
    }
    
    public function checkLabelPostAssociation($company_id,$arr_labels){
        $where = '';
        //print_r($arr_labels);
        if(!empty($arr_labels)){
            $this->db->select('*');
            $this->db->from(''.POST.'');
            //$this->db->where($where_array);

                $this->db->where('company_id',$company_id);
                foreach ($arr_labels AS $lab){
                    $where .= " FIND_IN_SET('".$lab."', ".POST.".tagged_labels) OR "; 

                }

            //$where .= " company_id = '".$company_id."' ";
            $this->db->where(rtrim($where," OR"));
            //$this->db->where('company_id',$company_id);

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
        }{
            return false;
        }
    }
    
    public function advSearch($search_arr,$company_id,$page){
        if(!empty($search_arr)){
            $this->db->select(''.POST.'.post_id, '.POST.'.company_id, '.POST.'.post_creator_id, '.POST.'.post_type, '.POST.'.visibility,
            '.POST.'.title, '.POST.'.tagged_labels, '.POST.'.co_owners, '.POST.'.short_description, '.POST.'.detail_description,
            '.POST.'.list_upload, '.POST.'.list_type, '.POST.'.created_date, '.POST.'.updated_date, '.USER.'.first_name, '.USER.'.last_name, '.POST_TYPE.'.post_type ');
            $this->db->from(''.POST.'');
            $this->db->join(''.USER.'', ''.POST.'.post_creator_id = '.USER.'.user_id','LEFT');
            $this->db->join(''.POST_TYPE.'', ''.POST_TYPE.'.post_type_id = '.POST.'.post_type','LEFT');
            //$this->db->join(''.VIEWED_POST.'', ''.VIEWED_POST.'.post_id = '.POST.'.post_id','LEFT');
            //$this->db->join(''.HELPFUL_POST.'', ''.HELPFUL_POST.'.post_id = '.POST.'.post_id','LEFT');
            //$this->db->join(''.COMMENT.'', ''.COMMENT.'.post_id = '.POST.'.post_id','LEFT');
            if(!empty($search_arr['username'])){
                $this->db->or_like(''.USER.'.first_name', $search_arr['username']);
                $this->db->or_like(''.USER.'.last_name', $search_arr['username']);
                $this->db->or_like("CONCAT_WS(' ',".USER.".first_name,".USER.".last_name) ", $search_arr['username'], FALSE);
            }
            if(!empty($search_arr['post_type'])){
                $this->db->or_where(''.POST.'.post_type', $search_arr['post_type']);
            }
            if(!empty($search_arr['title'])){
                $this->db->or_like(''.POST.'.title', $search_arr['title']);
            }
            if(!empty($search_arr['labels'])){
                foreach($search_arr['labels'] AS $arrlabel){
                    $where = "FIND_IN_SET('".$arrlabel."', ".POST.".tagged_labels)"; 
                    $this->db->or_where( $where ); 
                }
            }
            if(!empty($search_arr['posts_created_from']) && !empty($search_arr['posts_created_to'])){
                $this->db->where(''.POST.'.created_date >=', $search_arr['posts_created_from']);
                $this->db->where(''.POST.'.created_date <=', $search_arr['posts_created_to']);
            }
            if(!empty($search_arr['posts_updated_from']) && !empty($search_arr['posts_updated_to'])){
                $this->db->where(''.POST.'.updated_date >=', $search_arr['posts_updated_from']);
                $this->db->where(''.POST.'.updated_date <=', $search_arr['posts_updated_to']);
            }
            if(!empty($search_arr['serial_from']) && !empty($search_arr['serial_to'])){
                $this->db->where(''.POST.'.post_id >=', $search_arr['serial_from']);
                $this->db->where(''.POST.'.post_id <=', $search_arr['serial_to']);
            }
            if(!empty($search_arr['attachment']) && !empty($search_arr['attach_string'])){
                //$atth = $this->searchPostOFAttachment($company_id);
                $attch_arr = explode(",",$search_arr['attach_string']);
                //print_r($attch_arr);die('SS');
                if(!empty($attch_arr)){ //die('WW11');
                    $this->db->where_in(''.POST.'.post_id',$attch_arr);
                }
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
    
    
    public function getsingleUserDetails($user_id,$company_id){
        $this->db->select('user_id, first_name, last_name, email, password, domain, interests, company_id, is_super_user');
        $this->db->from(''.USER.'');
        $this->db->where('user_id',$user_id);
        $this->db->where('company_id',$company_id);
        
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