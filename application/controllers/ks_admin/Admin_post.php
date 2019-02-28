<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_post extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->model(array('common_model'));
        $this->load->helper(array('form','common'));
        //$this->output->nocache();
        if(!isAdminLogin()) { 
            redirect('ks_admin/admin_home/logout');
        }
       
    }
    
    public function post_lists() { //die('EEE');
        //echo '<pre>'; print_r($this->session->all_userdata());
        $this->layout->css('admin_design/css/dataTables.min.css');
        $this->layout->js('admin_design/js/jquery.dataTables.min.js');
        $this->layout->view('admin_post/post_lists');
    }
    
    public function ajax_postlists(){
        $this->load->model('admin_post_model');
        $user_records =  $this->admin_post_model->getPosts();
        //print_r($_POST);die;
        if(!empty($user_records)){
            $total_count =  count($user_records);
        }else{
            $total_count =  0;
        }
        $this->admin_post_model->getPostListsResponse($total_count);
    }
    
    public function disable_post(){
        $post_id = $this->input->post('post_id');
        $company_id = $this->session->userdata('ks_company_id');
        
        if($post_id){
            $this->load->model('admin_post_model');
            $update_data = array('publish'=>2);
            $up = $this->admin_post_model->updatePostData($post_id,$company_id,$update_data);
            
            if($up){
                echo 'true';
            }else{
                echo 'false';
            }
            
        }
    }
    
    public function post_details(){
        $this->layout->css('css/style.css');
        $this->layout->css('css/emoji.css');
        $this->layout->css('css/responsive.css');
        $this->layout->css('css/font-awesome.min.css');
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
        
        //$user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('ks_company_id');
        
        $data['post_id'] = $post_id = base64_decode($this->uri->segment('4'));
        
        ///////////////////////////////////////
        $data['item'] = json_encode(array
            (array('id'=>1, 'color'=>'1e90ff','text'=> 'Low Priority'),
            array('id'=>2, 'color'=> 'green', 'text'=>'High Priority'),
           array('id'=>3, 'color'=> 'orange', 'text'=>'Medium Priority'),
        ));
        
        //$data['data'] = $this->post_model->getResource();
        $where_result_arr = array('company_id'=>$company_id,'post_id'=>$post_id);
        $data['data'] = $this->post_model->getTimePlannerJson($where_result_arr);
        ////////////////////////////////////////
        
        $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $post_record = $data['uposts'] = $this->post_model->getIndividualPosts($post_array);
        
        $data['lists_data'] = $this->post_detail_model->getSheetData($post_record->list_upload);
        
        $post_creator_id = $post_record->post_creator_id;
        
        $created = date('Y-m-d');
        
        $graphic_array = array(''.POST_GRAPHICS.'.post_id'=>$post_id,''.POST_GRAPHICS.'.company_id'=>$company_id);
        $data['graphics_data'] = $this->post_detail_model->getPostsGraphics($graphic_array);
        
        $attachm_array = array(''.POST_ATTACHM.'.post_id'=>$post_id,''.POST_ATTACHM.'.company_id'=>$company_id);
        $data['attachm_data'] = $this->post_detail_model->getPostsAttachment($attachm_array);
        
        $page = $data['page'] = 1;
        $comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.parent_comment_id'=>0);
        $data['comment_data'] = $this->comment_model->getComment($comment_array,$page);
               
        $this->layout->view('admin_post/post_details',$data);
        //$this->layout->view('post/post_details_oldies',$data);
    }
    
}