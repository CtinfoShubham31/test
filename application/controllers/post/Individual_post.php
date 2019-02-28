<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Individual_post extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model(array('common_model'));
        $this->load->helper(array('form','common'));
        $this->output->nocache();
        if(!isUserLogin()) { 
            redirect($this->config->base_url().'home/logout');
        }
    }
    
    public function post_details(){
        $this->layout->css('css/dataTables.bootstrap.min.css');
        $this->layout->css('css/fullcalendar.css');
        $this->layout->css('css/dx.spa.css');
        $this->layout->css('css/dx.common.css');
        $this->layout->css('css/dx.light.css');
        $this->layout->css('css/custom.css');
        
        $this->layout->js('js/jquery.dataTables.min.js');
        $this->layout->js('js/dataTables.bootstrap.min.js');
        $this->layout->js('js/moment.min.js');
        $this->layout->js('js/fullcalendar.min.js');
        
        
        $view_data['post_detail'] = 1;
        $data['postdetail_tabs'] = $this->load->view('layout/postdetail_tabs', $view_data, TRUE);
        
        $this->load->model(array('post_model','post_detail_model','comment_model'));
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $data['post_id'] = $post_id = base64_decode($this->uri->segment('4'));
        if(!isPostDisable($post_id)) { 
            redirect($this->config->base_url().'dashboard/user_dashboard/all_posts');
        }
        
        if(!empty(checkPostVisibility($post_id)) && !in_array($this->session->userdata('kaseidon_user_id'), checkPostVisibility($post_id))){
            redirect('dashboard/user_dashboard/all_posts');
        }
        
        ///////////////////////////////////////
//        $data['item'] = json_encode(array
//            (array('id'=>1, 'color'=>'1e90ff','text'=> 'Low Priority'),
//            array('id'=>2, 'color'=> 'green', 'text'=>'High Priority'),
//           array('id'=>3, 'color'=> 'orange', 'text'=>'Medium Priority'),
//        ));
        
        $where_time_mod = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
        $data['item'] = $this->post_model->getTimePlannerModuleJson($where_time_mod);
        
        //$data['data'] = $this->post_model->getResource();
        $where_result_arr = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
        $data['data'] = $this->post_model->getTimePlannerJson($where_result_arr);
        ////////////////////////////////////////
        
        $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $post_record = $data['uposts'] = $this->post_model->getIndividualPosts($post_array);
        if(empty($post_record)){
            redirect('dashboard/user_dashboard/all_posts');
        }
        
        if(!empty($post_record->commented_views)){
            $commented_views = $post_record->commented_views.','.$user_id;
            $update_post_comment_views = array(''.POST.'.commented_views'=>$commented_views);
            $this->post_model->updatePostInfo($update_post_comment_views,$post_array);
        }
        
        if(!empty($post_record->updated_views)){
            $updated_views = $post_record->updated_views.','.$user_id;
            $update_post_update_views = array(''.POST.'.updated_views'=>$updated_views);
            $this->post_model->updatePostInfo($update_post_update_views,$post_array);
        }
        
        
        ///////////////////////////////////////////////////////////
        //$data['lists_data'] = $this->post_detail_model->getSheetData($post_record->list_upload);
        $data['lists_data'] = $this->post_detail_model->getSheetData($post_record->list_upload);
        //print_r($data['lists_data']);die;
        ///////////////////////////////////////////////////////
        
        $post_creator_id = $post_record->post_creator_id;
        
        $created = date('Y-m-d');
        
        $view_array = array(''.VIEWED_POST.'.post_id'=>$post_id,''.VIEWED_POST.'.viewed_by'=>$user_id,''.VIEWED_POST.'.company_id'=>$company_id,''.VIEWED_POST.'.created_date'=>$created);
        $already_viewed = $this->post_detail_model->getViewedPosts($view_array,'Single');
        //print_r($already_viewed);die('ZZZZ');
        if(($post_creator_id != $user_id) && empty($already_viewed)){
            $view_post = array(
                'company_id'=>$company_id,
                'post_id'=>$post_id,
                'post_creator_id'=>$post_creator_id,
                'viewed_by'=>$user_id,
                'created_date'=>date('Y-m-d H:i:s')
            );
            $viewed_post_id = $this->post_detail_model->addViewdPosts($view_post);
        }

        $follow_array = array(''.FOLLOWED_POST.'.post_id'=>$post_id,''.FOLLOWED_POST.'.followed_by'=>$user_id,''.FOLLOWED_POST.'.company_id'=>$company_id);
        $data['already_followed'] = $this->post_detail_model->getFollowedPosts($follow_array,'Single');
        
        $graphic_array = array(''.POST_GRAPHICS.'.post_id'=>$post_id,''.POST_GRAPHICS.'.company_id'=>$company_id);
        $data['graphics_data'] = $this->post_detail_model->getPostsGraphics($graphic_array);
        
        $attachm_array = array(''.POST_ATTACHM.'.post_id'=>$post_id,''.POST_ATTACHM.'.company_id'=>$company_id);
        $data['attachm_data'] = $this->post_detail_model->getPostsAttachment($attachm_array);
        
        $page = $data['page'] = 1;
        $comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.parent_comment_id'=>0);
        $data['comment_data'] = $this->comment_model->getComment($comment_array,$page);
        
//        $lists_array1 = array(''.POST_LISTS.'.post_id'=>$post_id);
//        $data['ptype_list_data'] = $this->post_model->getPostTypeLists($lists_array1);
               
        $this->layout->view('post/post_details',$data);
        //$this->layout->view('post/post_details_oldies',$data);
    }
    
    
    public function follow_posts(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        if($this->input->post()){
            $post_id = $this->input->post('post_id');
            $post_creator_id = $this->input->post('pcreator');
            
            $this->load->model(array('post_detail_model','post_model'));
            
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $post_existance = $this->post_model->getIndividualPosts($post_array);
            
            $follow_array = array(''.FOLLOWED_POST.'.post_id'=>$post_id,''.FOLLOWED_POST.'.followed_by'=>$user_id,''.POST.'.company_id'=>$company_id);
            $already_followed = $this->post_detail_model->getFollowedPosts($follow_array,'Single');
            
            //print_r($post_existance);die;
            if(empty($post_id) || empty($post_creator_id) || empty($post_existance) || ($post_creator_id == $user_id) || !empty($already_followed)){
                return FALSE;
            }
            
            $follow_post = array(
                'company_id'=>$company_id,
                'post_id'=>$post_id,
                'post_creator_id'=>$post_creator_id,
                'followed_by'=>$user_id,
                'created_date'=>date('Y-m-d H:i:s')
            );
            
            $followed_post_id = $this->post_detail_model->addFollowedPosts($follow_post);
            
            if($followed_post_id){
                /*ADD FOLLOW POST NOTIFICATION (START)*/
                $add_notification = array(
                    'company_id'=>$company_id,
                    'user_id'=>$post_creator_id,
                    'notify_by'=>$user_id,
                    'post_id'=>$post_id,
                    'notification_msg'=>'Follow your post',
                    'read_status'=>1,
                    'created_date'=>date('Y-m-d H:i:s')
                );
                
                $this->common_model->addNotification($add_notification);    //Add notification for follow posts
                
                /*ADD FOLLOW POST NOTIFICATION (END)*/
                echo 'true';
            }else{
                echo 'false';
            }
        }
    }
    
    public function unfollow_posts(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        if($this->input->post()){
            $post_id = $this->input->post('post_id');
            
            $this->load->model(array('post_detail_model','post_model'));
            
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $post_existance = $this->post_model->getIndividualPosts($post_array);
            
            $follow_array = array(''.FOLLOWED_POST.'.post_id'=>$post_id,''.FOLLOWED_POST.'.followed_by'=>$user_id,''.FOLLOWED_POST.'.company_id'=>$company_id);
            $already_followed = $this->post_detail_model->getFollowedPosts($follow_array,'Single');
            
            //print_r($post_existance);die;
            if(empty($post_id) || empty($post_existance) || empty($already_followed)){
                return FALSE;
            }
            
            if($already_followed->followed_post_id){
                /*REMOVE FOLLOWERS(START)*/
                $where_follow_array = array(''.FOLLOWED_POST.'.followed_post_id'=>$already_followed->followed_post_id,''.FOLLOWED_POST.'.post_id'=>$post_id,''.FOLLOWED_POST.'.company_id'=>$company_id);
                $this->post_detail_model->deleteFollowers($where_follow_array);
                
                /*REMOVE FOLLOWERS(END)*/
                echo 'true';
            }else{
                echo 'false';
            }
        }
    }


    public function download_attachm(){
        $file = $this->input->get('file');
        if (!empty($file) && isset($file) && file_exists('upload/attachment/'.$file) && is_readable('upload/attachment/'.$file)) {
            $filename = basename($file);
            $file_extension = strtolower(substr(strrchr($filename,"."),1));
            
            switch($file_extension) {
                case "gif": $ctype="image/gif"; break;
                case "png": $ctype="image/png"; break;
                case "jpeg":
                case "jpg": $ctype="image/jpeg"; break;
                default:
            }
            
            header('Content-type: ' . $ctype);
            header("Content-Disposition: attachment; filename=\"$file\"");
            readfile('upload/attachment/'.$file);
        }
        
    }
    
    public function comment_load(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        if($this->input->post()){
            $this->load->model('comment_model');
            
            $page = $data['page'] = $this->input->post('page');
            $post_id = $this->input->post('post_id');
            
            $comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.parent_comment_id'=>0);
            $data['comment_data'] = $this->comment_model->getComment($comment_array,$page);
            
            $this->load->view('post/comment_load',$data);
	}
    }
    
    public function add_comment(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        if($this->input->post()){
            $errors = array(); $data = array();
            
            $comment = trim($this->input->post('comment'));
            $post_id = trim($this->input->post('post_id'));
            $parent_comment_id = 0;
            
            $this->load->model(array('comment_model','post_model'));
            
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $post_info = $this->post_model->getIndividualPosts($post_array);
            $post_creator_id = $post_info->post_creator_id;
            
            if (empty($comment)){
                $errors['valid_comment'] = 'Please add comment.';
            }
            else if(strlen($comment)>=COMMENT_LENGTH){
                $errors['valid_comment'] = 'Comment character length is too high, should not be more than '.COMMENT_LENGTH.'.';
            }
            
            if (!empty($errors)) { //echo 'ssss';
                $data['errors']  = $errors;
                echo json_encode($data);
            }else {
                $data['errors']  = '';
                
                /*********Post view status(START)********/
                $update_post_comment_views = array(''.POST.'.commented_views'=>$user_id);
                $this->post_model->updatePostInfo($update_post_comment_views,$post_array);
                /*********Post view status(END)********/
                
                $add_comment = array(
                    'comment'=>$comment,
                    'parent_comment_id'=>$parent_comment_id,
                    'company_id'=>$company_id,
                    'post_id'=>$post_id,
                    'post_creator_id'=>$post_creator_id,
                    'commented_by'=>$user_id,
                    'created_date'=>date('Y-m-d H:i:s')
                );
                
                $comment_id = $this->comment_model->addComment($add_comment);
                if($comment_id){
                    
                    /*ADD NOTIFICATION WHEN COMMENT ON POST (START)*/
                    $add_notification = array(
                        'company_id'=>$company_id,
                        'user_id'=>$post_creator_id,
                        'notify_by'=>$user_id,
                        'post_id'=>$post_id,
                        'notification_msg'=>'Commented on your post',
                        'read_status'=>1,
                        'created_date'=>date('Y-m-d H:i:s')
                    );
                    
                    $this->common_model->addNotification($add_notification);    //Add notification when comment on posts

                    /*ADD NOTIFICATION WHEN COMMENT ON POST (END)*/
                    
                    $data['success'] = 'true';
                    $data['tot_comment'] = commentCount($post_id);
                }else{
                    $data['success'] = 'false';
                }
                echo json_encode($data);
            }
        }
        
    }
    
    
    public function replay_comment(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        if($this->input->post()){
            $errors = array(); $data = array();
            
            $comment = trim($this->input->post('comment'));
            $post_id = trim($this->input->post('post_id'));
            $parent_comment_id = trim($this->input->post('comment_id'));
            
            $this->load->model(array('comment_model','post_model'));
            
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $post_info = $this->post_model->getIndividualPosts($post_array);
            $post_creator_id = $post_info->post_creator_id;
            
            /*********Post view status(START)********/
                $update_post_comment_views = array(''.POST.'.commented_views'=>$user_id);
                $this->post_model->updatePostInfo($update_post_comment_views,$post_array);
                /*********Post view status(END)********/
            
            $add_comment = array(
                'comment'=>$comment,
                'parent_comment_id'=>$parent_comment_id,
                'company_id'=>$company_id,
                'post_id'=>$post_id,
                'post_creator_id'=>$post_creator_id,
                'commented_by'=>$user_id,
                'created_date'=>date('Y-m-d H:i:s')
            );
                
            $comment_id = $this->comment_model->addComment($add_comment);
            
            $comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.comment_id'=>$comment_id);
            $data['reply_comm'] = $this->comment_model->getComment($comment_array);
            
            $this->load->view('post/replay_comment',$data);
        }
        
    }
    
    public function update_comment(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        if($this->input->post()){
            $errors = array(); $data = array();
            
            $comment = trim($this->input->post('comment'));
            $post_id = trim($this->input->post('post_id'));
            $comment_id = trim($this->input->post('comment_id'));
            
            $this->load->model(array('comment_model','post_model'));
            
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $post_info = $this->post_model->getIndividualPosts($post_array);
            $post_creator_id = $post_info->post_creator_id;
            
            /*********Post view status(START)********/
                $update_post_comment_views = array(''.POST.'.commented_views'=>$user_id);
                $this->post_model->updatePostInfo($update_post_comment_views,$post_array);
                /*********Post view status(END)********/
            
            $up_comment = array(
                'comment'=>$comment,
                'updated_date'=>date('Y-m-d H:i:s')
            );
            $where_comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.comment_id'=>$comment_id);    
            $up = $this->comment_model->updateComment($up_comment,$where_comment_array);
            if($up){
                $comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.comment_id'=>$comment_id);
                $data['reply_comm'] = $this->comment_model->getComment($comment_array);
                $this->load->view('post/replay_comment',$data);
            }
            
        }
        
    }
    
    public function delete_comment(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        if($this->input->post()){
           $comment_id = $this->input->post('comment_id'); 
           
           $this->load->model('comment_model');
           $comment_array = array(''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.comment_id'=>$comment_id);
           $get_comment = $this->comment_model->getSingleComment($comment_array);
           
           $comment_arr_child = array(''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.parent_comment_id'=>$comment_id);
           $check_child_comment = $this->comment_model->getSingleComment($comment_arr_child);
           
            if(!empty($check_child_comment)){
                echo 'associate';
            }
            else if(!empty($get_comment) && $get_comment->commented_by == $user_id){
               $this->comment_model->deleteComment($comment_array);
               echo 'true';
            }else{
               echo 'false';
           }
        }
    }


//    public function save_sheet(){
//        if($this->input->post()){
//            //print_r($_POST);die;
//            $cell_val = trim($this->input->post('cell_val'));
//            $sheet_cell = trim($this->input->post('sheet_cell'));
//            
//            $this->load->model(array('post_detail_model'));
//            $up_sheet = $this->post_detail_model->updateSheet($sheet_cell,$cell_val);
//            if($up_sheet){
//                echo TRUE;
//            }
//        }
//    }
    
    public function addsheet_column(){
        if($this->input->post()){
            //print_r($_POST);die;
            $cell_val = trim($this->input->post('cell_val'));
            
            $this->load->model(array('post_detail_model'));
            $up_sheet = $this->post_detail_model->addSheetColumn($cell_val);
            if($up_sheet){
                echo TRUE;
            }
        }
    }
    
    public function addsheet_row(){
        if($this->input->post()){
            //print_r($_POST);die;
            $cell_val = trim($this->input->post('cell_val'));
            
            $this->load->model(array('post_detail_model'));
            $up_sheet = $this->post_detail_model->addSheetRow($cell_val);
            if($up_sheet){
                echo TRUE;
            }
        }
    }
    
    
    public function test_exp(){
        $this->load->model(array('post_detail_model'));
        $this->post_detail_model->testExp();
    }
    
    public function posts_history(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        $view_data['post_history'] = 1;
        $data['postdetail_tabs'] = $this->load->view('layout/postdetail_tabs', $view_data, TRUE);
        
        $this->load->model(array('post_detail_model','post_model'));
        
        $post_id = base64_decode($this->uri->segment(4));
        $history_arr = array('post_id'=>$post_id,'company_id'=>$company_id);
        $data['post_hist'] = $this->post_detail_model->getPostsHistory($history_arr);
        
        $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $post_record = $data['uposts'] = $this->post_model->getIndividualPosts($post_array);
        
        $this->layout->view('post/posts_history',$data);
    }
    
    
}