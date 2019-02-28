<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_dashboard extends MY_Controller {

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
    
    public function test(){
        //echo $r = "[{"lon":"75.8901166"}]";
    }
    
    public function all_posts(){
        $this->layout->css('css/chosen.css');
        $this->layout->css('css/bootstrap-datetimepicker.min.css');
        $this->layout->js('js/chosen.jquery.js');
        $this->layout->js('js/moment-with-locales.min.js');
        $this->layout->js('js/bootstrap-datetimepicker.min.js');
        
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model(array('post_detail_model','post_model'));
        $page = $data['page'] = 1;
        
        if($this->input->post('sort_posts')){
            $data['sort_posts'] = $sort_posts = $this->input->post('sort_posts');
        }else{
            $data['sort_posts'] = $sort_posts = '';
        }
        
        $where_string = '';
        $user_result = $this->common_model->getIndividualUserDetails($user_id,$company_id);
        if(!empty($user_result) && $user_result->is_super_user != 1){
            $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
            $post_arr = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
        }else{
            $post_arr = array(''.POST.'.company_id'=>$company_id);
        }
        
        
        $data['userposts'] = $this->post_model->getPosts($post_arr,$page,$sort_posts,$where_string);
        //$data['userposts'] = $this->post_model->getPosts('',$page);
        
        $view_data['all_posts'] = 1;
        $data['post_tabs'] = $this->load->view('layout/post_tabs', $view_data, TRUE);
        
        $this->layout->view('dashboard/all_posts',$data);
    }
    
    public function ajaxall_posts(){
        if($this->input->post()){
            $this->load->model('post_model');
            //$limit = 6;
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
        
            $page = $data['page'] = $this->input->post('page');
            
            if($this->input->post('sort_posts')){
                $data['sort_posts'] = $sort_posts = $this->input->post('sort_posts');
            }else{
                $data['sort_posts'] = $sort_posts = '';
            }
            
//            $post_arr = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
//            $data['userposts'] = $this->post_model->getPosts($post_arr,$page,$sort_posts);
            //$data['userposts'] = $this->post_model->getPosts('',$page);
            $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
            $post_arr = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
            $data['userposts'] = $this->post_model->getPosts($post_arr,$page,$sort_posts,$where_string);
            
            $this->load->view('dashboard/ajaxall_posts',$data);
        }
        
    }


    public function mark_helpful(){
        if($this->input->post()){
            $post_id = $this->input->post('post_id');
            $post_creator_id = $this->input->post('pcreator');
            $helpful_type = $this->input->post('htype');
            
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $this->load->model('post_model');
            
            //$post_array = array('post_id'=>$post_id);
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $post_existance = $this->post_model->getIndividualPosts($post_array);
            
            //$harray = array('post_id'=>$post_id,'helpful_type'=>$helpful_type,'helpful_by'=>$user_id);
            $harray = array('post_id'=>$post_id,'helpful_by'=>$user_id);
            $already_helpful_marked = $this->post_model->getHelpfulPosts($harray);
            
            //print_r($post_existance);die;
            if(empty($post_id) || empty($post_creator_id) || empty($helpful_type) || empty($post_existance) || ($post_creator_id == $user_id) || !empty($already_helpful_marked)){
                return FALSE;
            }
            
            $mark_helpful = array(
                'company_id'=>$company_id,
                'post_id'=>$post_id,
                'post_creator_id'=>$post_creator_id,
                'helpful_by'=>$user_id,
                'helpful_type'=>$helpful_type,
                'created_date'=>date('Y-m-d H:i:s')
            );
            
            $helpful_post_id = $this->post_model->addHelpfulPosts($mark_helpful);
            if($helpful_post_id){
                
                $usdetail = $this->common_model->getIndividualUserDetails($user_id,$company_id);
                if(!empty($usdetail) && $usdetail->is_super_user == 1){
                    $notification_msg = " (".$usdetail->first_name." ".$usdetail->last_name.") Mark helpful your post ";
                }else{
                    $notification_msg = "Mark helpful your post";
                }
                
                /*ADD NOTIFICATION WHEN MARK HELPUL ON POST (START)*/
                $add_notification = array(
                    'company_id'=>$company_id,
                    'user_id'=>$post_creator_id,
                    'notify_by'=>$user_id,
                    'post_id'=>$post_id,
                    'read_status'=>1,
                    'notification_msg'=>$notification_msg,
                    'created_date'=>date('Y-m-d H:i:s')
                );

                $this->common_model->addNotification($add_notification);    //Add notification mark helpful on posts

                /*ADD NOTIFICATION WHEN MARK HELPUL ON POST (END)*/
                
                $helpful_array = array('post_id'=>$post_id,'helpful_type'=>$helpful_type);
                $post_helpful = $this->post_model->getHelpfulPosts($helpful_array);

                echo $post_helpful_count = (!empty($post_helpful)) ? COUNT($post_helpful) : 0;
            }
        }
    }
    
    public function my_posts(){
        //labelTree();die;
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/chosen.jquery.js');
        
        $this->load->model('post_model');
        
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        $page = $data['page'] = 1;
        
        if($this->input->post('sort_posts')){
            $data['sort_posts'] = $sort_posts = $this->input->post('sort_posts');
        }else{
            $data['sort_posts'] = $sort_posts = '';
        }
        //print_r($_POST);die;
        //$post_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.post_creator_id'=>$user_id,''.POST.'.content_request_status!='=>1,);
        $where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
        $post_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,);
        $data['userposts'] = $this->post_model->getPosts($post_array,$page,$sort_posts,$where_string);
        
        $view_data['my_posts'] = 1;
        $data['post_tabs'] = $this->load->view('layout/post_tabs', $view_data, TRUE);  
        
        $this->layout->view('dashboard/my_posts',$data);
    }
    
    public function ajaxmy_posts(){
        if($this->input->post()){
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
        
            $this->load->model('post_model');
            //$limit = 6;
            $page = $data['page'] = $this->input->post('page');
            
            if($this->input->post('sort_posts')){
                $data['sort_posts'] = $sort_posts = $this->input->post('sort_posts');
            }else{
                $data['sort_posts'] = $sort_posts = '';
            }
            
//            $post_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.post_creator_id'=>$user_id,''.POST.'.content_request_status!='=>1);
//            $data['userposts'] = $this->post_model->getPosts($post_array,$page,$sort_posts);
            $where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
            $post_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,);
            $data['userposts'] = $this->post_model->getPosts($post_array,$page,$sort_posts,$where_string);
            
            $this->load->view('dashboard/ajaxmy_posts',$data);
        }
        
    }
    
    public function followed_posts(){
        //labelTree();die;
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/chosen.jquery.js');
        
        $this->load->model('post_detail_model');
        
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        $page = $data['page'] = 1;
        
        $follow_array = array(''.FOLLOWED_POST.'.followed_by'=>$user_id);
        $data['userposts'] = $this->post_detail_model->getFollowedPosts($follow_array,'Multiple',$page);

        $view_data['followed_posts'] = 1;
        $data['post_tabs'] = $this->load->view('layout/post_tabs', $view_data, TRUE);
        
        $this->layout->view('dashboard/followed_posts',$data);
    }
    
    public function ajaxfollowed_posts(){
        if($this->input->post()){
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
            
            $this->load->model('post_detail_model');
            //$limit = 6;
            $page = $data['page'] = $this->input->post('page');
            $follow_array = array(''.FOLLOWED_POST.'.followed_by'=>$user_id);
            $data['userposts'] = $this->post_detail_model->getFollowedPosts($follow_array,'Multiple',$page);
            $this->load->view('dashboard/ajaxfollowed_posts',$data);
        }
        
    }
    
    public function recentviewed_posts(){
        //labelTree();die;
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/chosen.jquery.js');
        
        $this->load->model('post_detail_model');
        
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        $page = $data['page'] = 1;
        
        $view_array = array(''.VIEWED_POST.'.viewed_by'=>$user_id,''.VIEWED_POST.'.company_id'=>$company_id);
        $data['userposts'] = $this->post_detail_model->getViewedPosts($view_array,'Multiple',$page);
        
        $view_data['recentviewed_posts'] = 1;
        $data['post_tabs'] = $this->load->view('layout/post_tabs', $view_data, TRUE);
        
        $this->layout->view('dashboard/recentviewed_posts',$data);
    }
    
    public function ajaxrecentviewed_posts(){
        if($this->input->post()){
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
        
            $this->load->model('post_detail_model');
            //$limit = 6;
            $page = $data['page'] = $this->input->post('page');
            $view_array = array(''.VIEWED_POST.'.viewed_by'=>$user_id);
            $data['userposts'] = $this->post_detail_model->getViewedPosts($view_array,'Multiple',$page);
            
            $this->load->view('dashboard/ajaxrecentviewed_posts',$data);
        }
        
    }
    
    public function add_interest(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        //$users_array = array($user_id);
        //$data['get_userinfo'] = $this->common_model->getAllUsersBasicInfo($users_array);
        $data['user_interests'] = $this->common_model->getIndividualUserDetails($user_id,$company_id);
        if($this->input->post('add')){
            
            $errors = array();
            $data = array();
            
            
            $tagged_labels = $this->input->post('tagged_labels');
            
            $tg_lab = '';
            if(!empty($tagged_labels)){
                foreach ($tagged_labels as $tagged_data) {
                    $tg_lab .= $tagged_data.',';
                }
                $tg_lab = rtrim($tg_lab,',');
            }
            
            if (empty($tg_lab)){
                $errors['valid_interest'] = 'Please add interests.';
            }
            
            if (!empty($errors)) { //echo 'ssss';
                $data['errors']  = $errors;
                echo json_encode($data);
            }else {
                $data['errors']  = '';
                
                $this->load->model('user_model');
                
                $add_interest = array(
                    'interests'=>$tg_lab
                );
                //print_r($update_user);die;
                $uid = $this->user_model->updateUserInfo($user_id,$company_id,$add_interest);
                if($uid){
                    $data['success'] = 'true';
                }else{
                    $data['success'] = 'false';
                }
                echo json_encode($data);

            }
        }
        else if($this->input->post('popup')){
            $this->load->view('dashboard/add_interest',$data);
        }
        
    }
    
    
    public function all_label(){
        if($this->input->post()){
            $this->load->view('dashboard/all_label');
        }
    }
    
    public function manage_label(){
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/chosen.jquery.js');
        
        $this->load->model('post_model');
        //$page = $data['page'] = $this->input->post('page');
        //$data['userposts'] = $this->post_model->getPosts('',$page);
        $this->layout->view('dashboard/manage_label');
        
    }
    
    public function edit_managelabel(){
        //$users_array = array($user_id);
        //$data['get_userinfo'] = $this->common_model->getAllUsersBasicInfo($users_array);
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
            
        
        if($this->input->post('edit') && $this->input->post('lab_id')){
            
            $errors = array();
            $data = array();
            
            $label_name = trim($this->input->post('label_name'));
            $label_parent_id = trim($this->input->post('label_parent_id'));
            $label_dbname = trim($this->input->post('label_dbname'));
            
            $inherit_visibility = trim($this->input->post('inherit_visibility'));
            $visible_to = $this->input->post('visible_to');
            
            if(!empty($label_parent_id)){
                $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$label_parent_id,''.LABEL.'.label_name'=>$label_name);
                $checkparent_label_existance = $this->common_model->getSingleLabel($label_array);
            }
            else{
                $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>0,''.LABEL.'.label_name'=>$label_name);
                $checkparent_label_existance = $this->common_model->getSingleLabel($label_array);
            }
            $lab_id =  $this->input->post('lab_id');
            //print_r($visible_to);
            $vsb = '';
            if(!empty($visible_to)){
                foreach($visible_to AS $vs){
                    $vsb .= $vs.',';
                }
                $vsb = rtrim($vsb,',');
            }
            
            $visibilty_of_users = $vsb;
            
            if (empty($label_name)){
                $errors['valid_label_name'] = 'Label name is required';
            }
            else if(!empty($checkparent_label_existance) && empty($label_parent_id) && ($label_dbname!=$label_name)){
                $errors['valid_label_name'] = 'This label already exists in root level.';
            }
            else if(!empty($checkparent_label_existance)){
                $errors['valid_label_name'] = 'This label already exists in this level.';
            }
            
            if (!empty($errors)) { //echo 'ssss';
                $data['errors']  = $errors;
                echo json_encode($data);
            }else {

                $this->load->model('post_model');
                
                $data['errors']  = '';
                $where_label_array = array('company_id'=>$company_id,'label_id'=>$lab_id);
                $update_label_array = array(
                    'label_name'=>$label_name,
                    'label_parent_id'=>$label_parent_id,
                    'inherit_visibility'=>$inherit_visibility,
                    'visible_to'=>$visibilty_of_users,
                    //'company_id'=>$company_id,
                    //'label_creator_id'=>$user_id
                );
                //print_r($update_user);die;
                $uid = $this->post_model->updateLabel($update_label_array,$where_label_array);
                if($uid){
                    $data['success'] = 'true';
                }else{
                    $data['success'] = 'false';
                }
                echo json_encode($data);

            }
        }
        else if($this->input->post('popup') && $this->input->post('label_id')){
            $data['lab_id'] = $label_id = $this->input->post('label_id');
            
            $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_id'=>$label_id);
            $data['get_userinfo'] = $this->common_model->getAllUsersBasicInfo(array($user_id));
            $data['label_info'] = $this->common_model->getSingleLabel($label_array);
            $data['label_dbname'] = $data['label_info']->label_name;
            //$this->load->view('post/addlabel',$data);
            $this->load->view('dashboard/edit_managelabel',$data);
        }
    }
    
    public function delete_label(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        if($this->input->post()){
            $this->load->model('post_model');
            //$where_array = array('');
            $label_id = $this->input->post('label_id');
            
            $arr_labels = array();
            $get_nested_labels = $this->common_model->nestedLabelExistance($label_id);
            $get_nested_labels = rtrim($get_nested_labels,",");
            //die('DDDD');
            if(!empty($get_nested_labels)){
                $arr_labels = explode(",",$get_nested_labels);
                array_push($arr_labels, $label_id);
            }else{
                $arr_labels = array($label_id);
            }
            //print_r($arr_labels);//die('ZZZ');
            $is_associate = $this->post_model->checkLabelPostAssociation($company_id,$arr_labels);
            if(!empty($is_associate)){
                //print_r($is_associate);
                echo 'false';
            }else{
                //$where_arr = array('label_id'=>$label_id,'company_id'=>$company_id);
                //$this->post_model->deleteLabel($where_arr);
                $this->post_model->deleteLabel($company_id,$arr_labels);
                echo 'true';
            }
            
            
        }
    }
    
    public function search_posts(){
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/chosen.jquery.js');
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model(array('post_model','search_model'));
        
        $data['sort_posts'] = $sort_posts = $this->input->post('sort_posts');
        $data['searchpost'] = $searchpost = trim($this->input->post('searchpost'));
        
        $data['searchlab'] = $searchlab = trim($this->input->post('searchlab'));    //Only label
        
        $data['ptab'] = $this->input->post('ptab');
        
        $arr_of_label = $this->post_model->searchLabel($searchpost);
        
        $arr_of_username = $this->post_model->searchUser($searchpost);
       
        $page = $data['page'] = 1;
        
        $where_string = '';
        $user_result = $this->common_model->getIndividualUserDetails($user_id,$company_id);
        
        if(!empty($_POST['ptab']) && $_POST['ptab'] == 1){
            $data['all_posts'] = $view_data['all_posts'] = 1;
            if(!empty($user_result) && $user_result->is_super_user != 1){
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
            }else{
                $where_array = array(''.POST.'.company_id'=>$company_id);
            }
            //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
            //$where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
            if(!empty($searchpost)){
                $data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array,$where_string);
            }
            else if(!empty($searchlab)){
                $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array,$where_string);
            }
        }
        else if(!empty($_POST['ptab']) && $_POST['ptab'] == 2){
            $data['my_posts'] = $view_data['my_posts'] = 1;
            if(!empty($user_result) && $user_result->is_super_user != 1){
                $where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
            }else{
                $where_array = array(''.POST.'.company_id'=>$company_id);
            }
            //$where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
            //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
            if(!empty($searchpost)){
                $data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array,$where_string);
            }
            else if(!empty($searchlab)){ //die('SSS');
                $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array,$where_string);
            }
        }
        else if(!empty($_POST['ptab']) && $_POST['ptab'] == 3){
            $data['followed_posts'] = $view_data['followed_posts'] = 1;
            $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.FOLLOWED_POST.'.followed_by'=>$user_id);
            if(!empty($searchpost)){
                $data['userposts'] = $this->search_model->searchFollowedPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
            }
            else if(!empty($searchlab)){ //die('SSS');
                $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array);
            }
        }
        else if(!empty($_POST['ptab']) && $_POST['ptab'] == 4){
            $data['recentviewed_posts'] = $view_data['recentviewed_posts'] = 1;
            $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.VIEWED_POST.'.viewed_by'=>$user_id);
            if(!empty($searchpost)){
                $data['userposts'] = $this->search_model->searchRecentlyViewed($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
            }
            else if(!empty($searchlab)){
                $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array);
            }
            
        }else{
            $data['all_posts'] = $view_data['all_posts'] = 1;
            if(!empty($user_result) && $user_result->is_super_user != 1){
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
            }else{
                $where_array = array(''.POST.'.company_id'=>$company_id);
            }
            //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
            //$where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
            if(!empty($searchpost)){
                $data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array,$where_string);
            }
            else if(!empty($searchlab)){
                $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array,$where_string);
            }
        }
        
        $data['post_tabs'] = $this->load->view('layout/post_tabs', $view_data, TRUE);
        
        
        $this->layout->view('dashboard/search_posts',$data);
    }
    
    public function ajaxsearch_posts(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        if($this->input->post()){
            $this->load->model(array('post_model','search_model'));
            //$limit = 6;
            $page = $data['page'] = $this->input->post('page');
            $data['sort_posts'] = $sort_posts = $this->input->post('sort_posts');
            $data['searchpost'] = $searchpost = trim($this->input->post('searchpost'));
            
            $data['searchlab'] = $searchlab = trim($this->input->post('searchlab'));    //Only label

            $data['ptab'] = $this->input->post('ptab');
        
            $arr_of_label = $this->post_model->searchLabel($searchpost);
        
            $arr_of_username = $this->post_model->searchUser($searchpost);

            if(!empty($_POST['ptab']) && $_POST['ptab'] == 1){
                $data['all_posts'] = $view_data['all_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                //$data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
                $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                if(!empty($searchpost)){
                    $data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array,$where_string);
                }
                else if(!empty($searchlab)){ //die('SSS');
                    $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array,$where_string);
                }
            }
            else if(!empty($_POST['ptab']) && $_POST['ptab'] == 2){
                $data['my_posts'] = $view_data['my_posts'] = 1;
                $where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);

                //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.POST.'.post_creator_id'=>$user_id);
                //$data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
            
                if(!empty($searchpost)){
                    $data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array,$where_string);
                }
                else if(!empty($searchlab)){ //die('SSS');
                    $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array,$where_string);
                }
            }
            else if(!empty($_POST['ptab']) && $_POST['ptab'] == 3){
                $data['followed_posts'] = $view_data['followed_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.FOLLOWED_POST.'.followed_by'=>$user_id);
                //$data['userposts'] = $this->search_model->searchFollowedPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
            
                if(!empty($searchpost)){
                    $data['userposts'] = $this->search_model->searchFollowedPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
                }
                else if(!empty($searchlab)){ //die('SSS');
                    $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array);
                }
            }
            else if(!empty($_POST['ptab']) && $_POST['ptab'] == 4){
                $data['recentviewed_posts'] = $view_data['recentviewed_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.VIEWED_POST.'.viewed_by'=>$user_id);
                //$data['userposts'] = $this->search_model->searchRecentlyViewed($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
            
                if(!empty($searchpost)){
                    $data['userposts'] = $this->search_model->searchRecentlyViewed($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
                }
                else if(!empty($searchlab)){ //die('SSS');
                    $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array);
                }
            }else{
                $data['all_posts'] = $view_data['all_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                //$data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array);
                $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                if(!empty($searchpost)){
                    $data['userposts'] = $this->search_model->searchAllMyPosts($searchpost,$page,$sort_posts,$arr_of_label,$arr_of_username,$where_array,$where_string);
                }
                else if(!empty($searchlab)){ //die('SSS');
                    $data['userposts'] = $this->search_model->searchAllMyPostsLabel($searchlab,$page,$sort_posts,$where_array,$where_string);
                }
            }
            
            $data['post_tabs'] = $this->load->view('layout/post_tabs', $view_data, TRUE);
            
            //$data['userposts'] = $this->post_model->searchPosts('',$page,$sort_posts,$arr_of_label,$arr_of_username);
            $this->load->view('dashboard/ajaxsearch_posts',$data);
        }
        
    }
    
    
//    public function save_search(){
//        $user_id = $this->session->userdata('kaseidon_user_id');
//        $company_id = $this->session->userdata('kaseidon_company_id');
//        
//        if($this->input->post()){
//            $search_val = trim($this->input->post('search_val'));
//            $this->load->model('post_model');
//            
//            $add_search = array(
//                'company_id'=>$company_id,
//                'user_id'=>$user_id,
//                'search_keyword'=>$search_val,
//            );
//            
//            $this->post_model->saveSearch($add_search);
//        }
//    }
    public function save_search(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        if($this->input->post()){
            $errors = array();
            $data = array();
            
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
            
            $search_keyword = trim($this->input->post('search_keyword'));
            $jsondata = $this->input->post('jsondata');
            
            $this->load->model('search_model');
            
            $where_array = array('user_id'=>$user_id,'company_id'=>$company_id,'search_keyword'=>$search_keyword);
            $get_save_search = $this->search_model->individualSavedSearch($where_array);
            
            if (empty($search_keyword)){
                $errors['valid_search_keyword'] = 'Please add search name.';
            }
            else if(!empty($get_save_search)){
                $errors['valid_search_keyword'] = 'The name of this search already exists.';
            }
            
            if (!empty($errors)) { //echo 'ssss';
                $data['errors']  = $errors;
                echo json_encode($data);
            }else {
                $data['errors']  = '';
                
                $add_search = array(
                    'user_id'=>$user_id,
                    'company_id'=>$company_id,
                    'search_keyword'=>$search_keyword,
                    'jsondata'=>$jsondata
                );
                //print_r($update_user);die;
                $search_id = $this->search_model->advsavedSearch($add_search);
                if($search_id){
                    $data['success'] = 'true';
                }else{
                    $data['success'] = 'false';
                }
                echo json_encode($data);

            }
        }
        else{
            //$this->load->view('dashboard/add_interest',$data);
            $this->load->view('dashboard/save_search');
        }
        
        //$this->load->view('dashboard/save_search');
//        if($this->input->post()){
//            $search_val = trim($this->input->post('search_val'));
//            $this->load->model('post_model');
//            
//            $add_search = array(
//                'company_id'=>$company_id,
//                'user_id'=>$user_id,
//                'search_keyword'=>$search_val,
//            );
//            
//            $this->post_model->saveSearch($add_search);
//        }
    }
    
    public function savedsearch_lists(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model('post_model');
        $where_array = array(
            'user_id'=>$user_id,
            'company_id'=>$company_id
        );
        $data['saved_search_lists'] = $this->post_model->savedSearchLists($where_array);
        
        $this->load->view('dashboard/savedsearch_lists',$data);
    }
    
    public function setsearch_value(){
        if($this->input->post()){
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
        
            $this->load->model('search_model');
            $save_search_id = $this->input->post('save_search_id');
            
            $where_array = array('user_id'=>$user_id,'company_id'=>$company_id,'save_search_id'=>$save_search_id);
            $get_savejson = $this->search_model->individualSavedSearch($where_array);
            if(!empty($get_savejson->jsondata)){
                $data['jdata'] = json_decode($get_savejson->jsondata);
                //print_r($jdata);
                $this->load->view('dashboard/setsearch_value',$data);
            }
        }
    }



    
    public function advancededit_search(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model('search_model');
        
        if($this->input->post('save_search_id') && $this->input->post('popup')){
            $data['all_users'] = $this->common_model->getAllUsersBasicInfo();
            $data['save_search_id'] = $save_search_id = $this->input->post('save_search_id');
            
            $where_array = array('user_id'=>$user_id,'company_id'=>$company_id,'save_search_id'=>$save_search_id);
            $data['get_save_search'] = $get_save_search = $this->search_model->individualSavedSearch($where_array);
            
            if(!empty($get_save_search->jsondata)){
                $data['jdata'] = json_decode($get_save_search->jsondata);
                //print_r($data['jdata']);die;
            }
            
            $this->load->view('dashboard/advancededit_search',$data);
        }
        
    }

    public function advanced_search(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $data['all_users'] = $this->common_model->getAllUsersBasicInfo();
        if($this->input->post('advsearch')){;
            $this->load->model('search_model');
            
            $data['username'] = $this->input->post('username');
            $data['labels'] = $this->input->post('labels');  //tagged_labels
            //$data['labels'] = $this->input->post('tagged_labels');
            $data['post_type'] = trim($this->input->post('post_type'));
            $data['title'] = trim($this->input->post('title'));
            
            
            $data['posts_created_from'] = ($this->input->post('posts_created_from'))?date("Y-m-d", strtotime($this->input->post('posts_created_from'))):'';
            $data['posts_created_to'] = ($this->input->post('posts_created_to'))?date("Y-m-d", strtotime($this->input->post('posts_created_to'))):'';
            
            $data['posts_updated_from'] = ($this->input->post('posts_updated_from'))?date("Y-m-d", strtotime($this->input->post('posts_updated_from'))):'';
            $data['posts_updated_to'] = ($this->input->post('posts_updated_to'))?date("Y-m-d", strtotime($this->input->post('posts_updated_to'))):'';
            $data['serial_from'] = trim($this->input->post('serial_from'));
            $data['serial_to'] = trim($this->input->post('serial_to'));
            $data['attachment'] = trim($this->input->post('attachment'));
            $data['tab_type'] = trim($this->input->post('tab_type'));
            
            //print_r($data);die('SSS');
            
            $search_arr = array(
                'username'=>$data['username'],
                'post_type'=>$data['post_type'],
                'title'=>$data['title'],
                'labels'=>$data['labels'],
                'posts_created_from'=>$data['posts_created_from'],
                'posts_created_to'=>$data['posts_created_to'],
                'posts_updated_from'=>$data['posts_updated_from'],
                'posts_updated_to'=>$data['posts_updated_to'],
                'serial_from'=>$data['serial_from'],
                'serial_to'=>$data['serial_to'],
                'attachment'=>$data['attachment'],
                'tab_type'=>$data['tab_type']
            );
            
            if($data['attachment']){
                $search_arr['attach_string'] = $this->search_model->searchPostOFAttachment($company_id);
            }
            
            $page = $data['page'] = 1;
            $where_string = '';
            $user_result = $this->common_model->getIndividualUserDetails($user_id,$company_id);
            
            if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 1){
                $data['all_posts'] = $view_data['all_posts'] = 1;
                if(!empty($user_result) && $user_result->is_super_user != 1){
                    $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                    $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                }else{
                    $where_array = array(''.POST.'.company_id'=>$company_id);
                }
                //$where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                $data['userposts'] = $this->search_model->advSearchAllMy($search_arr,$where_array,$page,$where_string);
            }
            else if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 2){
                $data['my_posts'] = $view_data['my_posts'] = 1;
                //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.POST.'.post_creator_id'=>$user_id);
                if(!empty($user_result) && $user_result->is_super_user != 1){
                    $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                    $where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
                }else{
                    $where_array = array(''.POST.'.company_id'=>$company_id);
                }
                //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                //$where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
                $data['userposts'] = $this->search_model->advSearchAllMy($search_arr,$where_array,$page,$where_string);
            }
            else if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 3){
                $data['followed_posts'] = $view_data['followed_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.FOLLOWED_POST.'.followed_by'=>$user_id);
                $data['userposts'] = $this->search_model->advSearchFollow($search_arr,$where_array,$page);
            }
            else if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 4){
                $data['recentviewed_posts'] = $view_data['recentviewed_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.VIEWED_POST.'.viewed_by'=>$user_id);
                $data['userposts'] = $this->search_model->advSearchRecentView($search_arr,$where_array,$page);
            }else{
                $data['all_posts'] = $view_data['all_posts'] = 1;
                if(!empty($user_result) && $user_result->is_super_user != 1){
                    $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                    $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                }else{
                    $where_array = array(''.POST.'.company_id'=>$company_id);
                }
                //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                //$where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                $data['userposts'] = $this->search_model->advSearchAllMy($search_arr,$where_array,$page,$where_string);
            }
            
            $data['post_tabs'] = $this->load->view('layout/post_tabs', $view_data, TRUE);
            
            $jsondata = $data['jsondata'] = json_encode($search_arr);
            
            //$search_keyword = trim($this->input->post('search_keyword'));
            $search_name = trim($this->input->post('search_name'));
            $save_search_id = trim($this->input->post('save_search_id'));
            $save_and_search = trim($this->input->post('save_and_search'));
            if(!empty($search_name) && !empty($save_search_id) && !empty($save_and_search)){
                $update_search = array(
                    'search_keyword'=>$search_name,
                    'jsondata'=>$jsondata
                );
                $where_search_array = array('save_search_id'=>$save_search_id,'company_id'=>$company_id,'user_id'=>$user_id);
                $this->search_model->updateAdvSearch($update_search,$where_search_array);
            }
            else if(!empty($search_name) && empty($save_search_id)){
                $add_search = array(
                    'user_id'=>$user_id,
                    'company_id'=>$company_id,
                    'search_keyword'=>$search_name,
                    'jsondata'=>$jsondata
                );
                //print_r($update_user);die;
                $search_id = $this->search_model->advsavedSearch($add_search);
            }
            
            $this->layout->view('dashboard/advancedpost_search',$data);
            
        }
        else if($this->input->post('popup')){
            $this->load->view('dashboard/advanced_search',$data);
        }else{
            redirect('dashboard/user_dashboard/all_posts');
        }
    }
    
    public function ajaxadvanced_search(){
        if($this->input->post()){
            //print_r($_POST);die('AAAAA');
            //$limit = 6;
            $page = $data['page'] = $this->input->post('page');
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $this->load->model('search_model');
            
            $data['username'] = $this->input->post('username');
            $data['labels'] = $this->input->post('labels');
            //$data['labels'] = $this->input->post('tagged_labels');
            $data['post_type'] = trim($this->input->post('post_type'));
            $data['title'] = trim($this->input->post('title'));
            
            
            $data['posts_created_from'] = ($this->input->post('posts_created_from'))?date("Y-m-d", strtotime($this->input->post('posts_created_from'))):'';
            $data['posts_created_to'] = ($this->input->post('posts_created_to'))?date("Y-m-d", strtotime($this->input->post('posts_created_to'))):'';
            
            $data['posts_updated_from'] = ($this->input->post('posts_updated_from'))?date("Y-m-d", strtotime($this->input->post('posts_updated_from'))):'';
            $data['posts_updated_to'] = ($this->input->post('posts_updated_to'))?date("Y-m-d", strtotime($this->input->post('posts_updated_to'))):'';
            $data['serial_from'] = trim($this->input->post('serial_from'));
            $data['serial_to'] = trim($this->input->post('serial_to'));
            $data['attachment'] = trim($this->input->post('attachment'));
            $data['tab_type'] = trim($this->input->post('tab_type'));
            
            //print_r($data);die('SSS');
            
            $search_arr = array(
                'username'=>$data['username'],
                'post_type'=>$data['post_type'],
                'title'=>$data['title'],
                'labels'=>$data['labels'],
                'posts_created_from'=>$data['posts_created_from'],
                'posts_created_to'=>$data['posts_created_to'],
                'posts_updated_from'=>$data['posts_updated_from'],
                'posts_updated_to'=>$data['posts_updated_to'],
                'serial_from'=>$data['serial_from'],
                'serial_to'=>$data['serial_to'],
                'attachment'=>$data['attachment'],
                'tab_type'=>$data['tab_type']
            );
            
            if($data['attachment']){
                $search_arr['attach_string'] = $this->search_model->searchPostOFAttachment($company_id);
            }
            //print_r($search_arr);
            //$page = $data['page'] = 1;
             
            if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 1){
//                $data['all_posts'] = $view_data['all_posts'] = 1;
//                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
//                $data['userposts'] = $this->search_model->advSearchAllMy($search_arr,$where_array,$page);
                $data['all_posts'] = $view_data['all_posts'] = 1;
                $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                $data['userposts'] = $this->search_model->advSearchAllMy($search_arr,$where_array,$page,$where_string);
            }
            else if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 2){
                $data['my_posts'] = $view_data['my_posts'] = 1;
                //$where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.POST.'.post_creator_id'=>$user_id);
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                $where_string = "(".POST.".post_creator_id = '".$user_id."' OR FIND_IN_SET('".$user_id."', ".POST.".co_owners))"; 
                $data['userposts'] = $this->search_model->advSearchAllMy($search_arr,$where_array,$page,$where_string);
            }
            else if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 3){
                $data['followed_posts'] = $view_data['followed_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.FOLLOWED_POST.'.followed_by'=>$user_id);
                $data['userposts'] = $this->search_model->advSearchFollow($search_arr,$where_array,$page);
            }
            else if(!empty($_POST['tab_type']) && $_POST['tab_type'] == 4){
                $data['recentviewed_posts'] = $view_data['recentviewed_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1,''.VIEWED_POST.'.viewed_by'=>$user_id);
                $data['userposts'] = $this->search_model->advSearchRecentView($search_arr,$where_array,$page);
            }else{
                $data['all_posts'] = $view_data['all_posts'] = 1;
                $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status!='=>1);
                $where_string = "(".POST.".publish != 1 OR ".POST.".post_creator_id = '".$user_id."')"; 
                $data['userposts'] = $this->search_model->advSearchAllMy($search_arr,$where_array,$page,$where_string);
            };
            
            
            //$data['userposts'] = $this->post_model->searchPosts('',$page,$sort_posts,$arr_of_label,$arr_of_username);
            $this->load->view('dashboard/ajaxadvanced_search',$data);
        }
    }
    
//    public function ajaxadvanced_search(){
//        if($this->input->post()){
//            //print_r($_POST);die('AAAAA');
//            //$limit = 6;
//            $page = $data['page'] = $this->input->post('page');
//            $user_id = $this->session->userdata('kaseidon_user_id');
//            $company_id = $this->session->userdata('kaseidon_company_id');
//            
//            $this->load->model('search_model');
//            
//            $data['username'] = $this->input->post('username');
//            $data['labels'] = $this->input->post('labels');
//            $data['post_type'] = trim($this->input->post('post_type'));
//            $data['title'] = trim($this->input->post('title'));
//            
//            
//            $data['posts_created_from'] = ($this->input->post('posts_created_from'))?date("Y-m-d", strtotime($this->input->post('posts_created_from'))):'';
//            $data['posts_created_to'] = ($this->input->post('posts_created_to'))?date("Y-m-d", strtotime($this->input->post('posts_created_to'))):'';
//            
//            $data['posts_updated_from'] = ($this->input->post('posts_updated_from'))?date("Y-m-d", strtotime($this->input->post('posts_updated_from'))):'';
//            
//            $data['posts_updated_to'] = ($this->input->post('posts_updated_to'))?date("Y-m-d", strtotime($this->input->post('posts_updated_to'))):'';
//            $data['serial_from'] = trim($this->input->post('serial_from'));
//            $data['serial_to'] = trim($this->input->post('serial_to'));
//            $data['attachment'] = trim($this->input->post('attachment'));
//            
//            //print_r($data);die('SSS');
//            
//            $search_arr = array(
//                'username'=>$data['username'],
//                'post_type'=>$data['post_type'],
//                'title'=>$data['title'],
//                'labels'=>$data['labels'],
//                'posts_created_from'=>$data['posts_created_from'],
//                'posts_created_to'=>$data['posts_created_to'],
//                'posts_updated_from'=>$data['posts_updated_from'],
//                'posts_updated_to'=>$data['posts_updated_to'],
//                'serial_from'=>$data['serial_from'],
//                'serial_to'=>$data['serial_to'],
//                'attachment'=>$data['attachment']
//            );
//            
//            if($data['attachment']){
//                $search_arr['attach_string'] = $this->search_model->searchPostOFAttachment($company_id);
//                //die('WWW');
//            }
//            
//            
//            $data['userposts'] = $this->search_model->advSearch($search_arr,$company_id,$page);
//            
//            //$data['userposts'] = $this->post_model->searchPosts('',$page,$sort_posts,$arr_of_label,$arr_of_username);
//            $this->load->view('dashboard/ajaxadvanced_search',$data);
//        }
//    }
    
    public function delete_savedsearch(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        if($this->input->post('save_search_id')){
            $where_array = array('user_id'=>$user_id,'company_id'=>$company_id,'save_search_id'=>$this->input->post('save_search_id'));
            $this->common_model->deleteSavedSearch($where_array);
            echo 'true';
        }else{
            echo 'false';
        }
    }

//    public function labelfor_merge(){
//        $company_id = $this->session->userdata('kaseidon_company_id');
//        $user_id = $this->session->userdata('kaseidon_user_id');
//        
//        $data['user_interests'] = $this->common_model->getIndividualUserDetails($user_id);
//        if($this->input->post('add')){
//            //print_r($_POST);die('WWWWW');
//            $errors = array();
//            $data = array();
//            
//            $company_id = $this->session->userdata('kaseidon_company_id');
//            $user_id = $this->session->userdata('kaseidon_user_id');
//            
//            $label = $this->input->post('tgid');
//            
//            $label_id = $this->input->post('label_id');
//            
//            $label_array = array(
//                ''.LABEL.'.label_id'=>$label,
//                ''.LABEL.'.company_id'=>$company_id,
//                ''.LABEL.'.label_creator_id'=>$user_id
//            );
//            $getlabel_info = $this->common_model->getSingleLabel($label_array);
//            //print_r($getlabel_info);die('sss');
//            
//            if (empty($label)){
//                $errors['valid_merge'] = 'Please select label to merge.';
//            }
//            else if(!empty($getlabel_info)){
//                $errors['valid_merge'] = 'This is your own label, please select another one.';
//            }
//            
//            if (!empty($errors)) { //echo 'ssss';
//                $data['errors']  = $errors;
//                echo json_encode($data);
//            }else {
//                $data['errors']  = '';
//                
//                $this->load->model('post_model');
//                
//                $update_merge_status = array(
//                    'merge_label_status'=>1,
//                    'request_for_merge_by'=>$user_id,
//                    'merge_for_label_id'=>$label_id
//                );
//                
//                $where_label_array = array(''.LABEL.'.label_id'=>$label,''.LABEL.'.company_id'=>$company_id);
//                
//                $up = $this->post_model->updateLabel($update_merge_status,$where_label_array);
//                if($up){
//                    $label_arr = array(
//                        ''.LABEL.'.label_id'=>$label,
//                        ''.LABEL.'.company_id'=>$company_id
//                    );
//                    $getlabel_data = $this->common_model->getSingleLabel($label_arr);
//                    
//                    $notif_arr = array('company_id'=>$company_id,'user_id'=>$getlabel_data->label_creator_id,'label_id'=>$label,'notify_by'=>$user_id,'read_status'=>1,'notification_msg_id'=>4,'created_date'=>date('Y-m-d H:i:s'));
//                    //print_r($notif_arr);die('AAA');
//                    $this->common_model->addNotification($notif_arr);
//                    $data['success'] = 'true';
//                }else{
//                    $data['success'] = 'false';
//                }
//                echo json_encode($data);
//
//            }
//        }
//        else if($this->input->post('popup') && $this->input->post('label_id')){
//            $data['label_id'] = $this->input->post('label_id');     //Label id which is going to merge
//            $this->load->view('dashboard/labelfor_merge',$data);
//        }
//        
//    }
    
    public function labelfor_merge(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        $data['user_interests'] = $this->common_model->getIndividualUserDetails($user_id);
        if($this->input->post('add')){
            //print_r($_POST);die('WWWWW');
            $errors = array();
            $data = array();
            
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
            
            $label = $this->input->post('tgid');
            
            $label_id_merge = $this->input->post('label_id');
            
            $label_array = array(
                ''.LABEL.'.label_id'=>$label,
                ''.LABEL.'.company_id'=>$company_id,
                ''.LABEL.'.label_creator_id'=>$user_id
            );
            $getlabel_info = $this->common_model->getSingleLabel($label_array);
            //print_r($getlabel_info);die('sss');
            
            if (empty($label)){
                $errors['valid_merge'] = 'Please select label to merge.';
            }
//            else if(!empty($getlabel_info)){
//                $errors['valid_merge'] = 'This is your own label, please select another one.';
//            }
            
            if (!empty($errors)) { //echo 'ssss';
                $data['errors']  = $errors;
                echo json_encode($data);
            }else {
                $data['errors']  = '';
                
                $this->load->model(array('post_model','notification_model'));
                
                $where_label_array = array(''.LABEL.'.label_id'=>$label,''.LABEL.'.company_id'=>$company_id);
                $getlabel_info = $this->common_model->getSingleLabel($where_label_array);
                $uid = $getlabel_info->label_creator_id;
                
                $where_merge_from = array(''.LABEL.'.label_id'=>$label_id_merge,''.LABEL.'.company_id'=>$company_id);
                $getmerginglabel_info = $this->common_model->getSingleLabel($where_merge_from);

                $string_visible_to = $this->merge_label($label_id_merge,$getlabel_info->visible_to);

                $where_array = array(''.LABEL.'.label_id'=>$label,''.LABEL.'.company_id'=>$company_id);
                $update_merge_status = array('visible_to'=>$string_visible_to);
                $up = $this->post_model->updateLabel($update_merge_status,$where_array);
                if($up){
                    $where_del_array = array(''.LABEL.'.label_id'=>$label_id_merge);
                    $this->post_model->deleteLabel($company_id,$where_del_array);
                    
                    $usdetail = $this->common_model->getIndividualUserDetails($user_id,$company_id);
                    if(!empty($usdetail) && $usdetail->is_super_user == 1){
                        
                        $notification_msg = " (".$usdetail->first_name." ".$usdetail->last_name.") Merged ".$getmerginglabel_info->label_name." to ".$getlabel_info->label_name;
                    }else{
                        $notification_msg = "Merged ".$getmerginglabel_info->label_name." to ".$getlabel_info->label_name;
                    }
                    
                    $notif_arr = array('company_id'=>$company_id,'user_id'=>$uid,'notify_by'=>$user_id,'notification_msg'=>$notification_msg,'read_status'=>1,'label_id'=>$label,'created_date'=>date('Y-m-d H:i:s'));
                    
                    $this->common_model->addNotification($notif_arr);
                    
                    $data['success'] = 'true';
                }else{
                    $data['success'] = 'false';
                }
                
                echo json_encode($data);

            }
        }
        else if($this->input->post('popup') && $this->input->post('label_id')){
            $data['label_id'] = $this->input->post('label_id');     //Label id which is going to merge
            $this->load->view('dashboard/labelfor_merge',$data);
        }
        
    }
    
//    public function merge_status(){
//        $company_id = $this->session->userdata('kaseidon_company_id');
//        $user_id = $this->session->userdata('kaseidon_user_id');
//        if($this->input->post()){
//            
//            $label_id = $this->input->post('label_id'); //Label id which is accepting for merge
//            $status = $this->input->post('status');
//            $notification_id = $this->input->post('notification_id');
//            
//            $this->load->model(array('post_model','notification_model'));
//            
//            $where_label_array = array(''.LABEL.'.label_id'=>$label_id,''.LABEL.'.company_id'=>$company_id);
//            $getlabel_info = $this->common_model->getSingleLabel($where_label_array);
//            $uid = $getlabel_info->request_for_merge_by;
//            
//            $string_visible_to = $this->merge_label($getlabel_info->merge_for_label_id,$getlabel_info->visible_to);
//            
//            $where_array = array(''.LABEL.'.label_id'=>$label_id,''.LABEL.'.company_id'=>$company_id);
//            $update_merge_status = array('visible_to'=>$string_visible_to,'merge_label_status'=>$status,'request_for_merge_by'=>0,'merge_for_label_id'=>0);
//            $up = $this->post_model->updateLabel($update_merge_status,$where_array);
//            if($up){
//                $where_del_array = array(''.LABEL.'.label_id'=>$getlabel_info->merge_for_label_id);
//                $this->post_model->deleteLabel($company_id,$where_del_array);
//                
//                $wh_notif_arr = array('company_id'=>$company_id,'notification_id'=>$notification_id);
//                $update_notif = array('label_btn_status'=>1);
//                $this->notification_model->updateNotification($update_notif,$wh_notif_arr);
//                
//                if($status == 2){
//                    $notification_msg_id = 5;
//                }else if($status == 3){
//                    $notification_msg_id = 6;
//                }else{
//                    $notification_msg_id = '';
//                }
//                $notif_arr = array(''.NOTIFICATION.'.company_id'=>$company_id,''.NOTIFICATION.'.user_id'=>$uid,''.NOTIFICATION.'.notify_by'=>$user_id,''.NOTIFICATION.'.notification_msg_id'=>$notification_msg_id,'read_status'=>1,''.NOTIFICATION.'.label_id'=>$label_id,''.NOTIFICATION.'.created_date'=>date('Y-m-d H:i:s'));
//                    //print_r($notif_arr);die('AAA');
//                $this->common_model->addNotification($notif_arr);
//                    
//                $data['success'] = 'true';
//            }else{
//                $data['success'] = 'false';
//            }
//            
//            echo json_encode($data);
//        }
//    }
    
    
 
    public function merge_label($merge_for_label_id,$merge_visible_to){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $where_label_array = array(''.LABEL.'.label_id'=>$merge_for_label_id,''.LABEL.'.company_id'=>$company_id);
        $getlabel_info = $this->common_model->getSingleLabel($where_label_array);
        $visible_to = explode(",",$getlabel_info->visible_to);
        
        $visible_to_main = explode(",",$merge_visible_to);
        
        $final_arr = array_unique(array_merge($visible_to,$visible_to_main));
        
        $string_visible_to = trim(implode(",",$final_arr),',');
        
        return $string_visible_to;
        
    }
    
    public function transfer_post(){
        
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        $users_array = array($this->input->post('user_from'));
        $data['udetails'] = $this->common_model->getAllUsersBasicInfo($users_array);
        if($this->input->post('add')){
            
            $errors = array();
            $data = array();
            
            $uid = $this->input->post('uid');
            
            if (empty($uid)){
                $errors['valid_user'] = 'Please select user to transfer post.';
            }
            
            if (!empty($errors)) { //echo 'ssss';
                $data['errors']  = $errors;
                echo json_encode($data);
            }else {
                $data['errors']  = '';
                
                $this->load->model('post_model');
                
                
                $post_id = $this->input->post('post_id');
                $user_from = $this->input->post('user_from');
                $user_to = $uid;
                
                $update_post_array = array(
                    'transfer_post_from'=>$user_id,
                    'transfer_post_to'=>$user_to,
                    'post_creator_id'=>$user_to
                );
                
                $where_post_array = array('post_id'=>$post_id,'company_id'=>$company_id);
                $update_post = $this->post_model->updatePostInfo($update_post_array,$where_post_array);
                
                if($update_post){
                    
                     /*************Post History END***********/
                    $add_update_history = array(        
                        'company_id'=>$company_id,
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'history_type'=>7,
                        'multi_user_ids'=>$user_to,
                        'date'=>date('Y-m-d h:i:s')
                    );

                    $add_update_history2 = array(
                        'company_id'=>$company_id,
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'history_type'=>8,
                        'multi_user_ids'=>$user_to,
                        'date'=>date('Y-m-d h:i:s')
                    );

                    $this->post_model->addPostHistory($add_update_history);
                    $this->post_model->addPostHistory($add_update_history2); /*************Post History END***********/


                    $usdetails = $this->common_model->getIndividualUserDetails($user_id,$company_id);
                    if(!empty($usdetails) && $usdetails->is_super_user == 1){
                        $super_user = ' ('.$usdetails->first_name.' '.$usdetails->last_name.') ';
                    }else{
                        $super_user = '';
                    }
                    
                    /*ADD NOTIFICATION WHEN TRANSFER POST (START)*/
                    $add_notification = array(
                            'company_id'=>$company_id,
                            'user_id'=>$user_to,
                            'notify_by'=>$user_id,
                            'post_id'=>$post_id,
                            'notification_msg'=>"$super_user Transfer posts ownership of post # ".$post_id." to you",
                            'read_status'=>1,
                            'created_date'=>date('Y-m-d H:i:s')
                    );

                    $this->common_model->addNotification($add_notification);    

                    /*ADD NOTIFICATION WHEN TRANSFER POST (END)*/
                    $data['success'] = 'true';
                    
                    
                }else{
                    $data['success'] = 'false';
                }
                echo json_encode($data);

            }
        }
        else if($this->input->post('popup')){
            $data['post_id'] = $this->input->post('post_id');
            $data['user_from'] = $this->input->post('user_from');
            
            $this->load->view('dashboard/transfer_post',$data);
        }
        
    }
    
    public function label_visible_to(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        if($this->input->post()){
            $label_id = $this->input->post('label_id');
            $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_id'=>$label_id);
            //$data['get_userinfo'] = $this->common_model->getAllUsersBasicInfo(array($user_id));
            $data['label_info'] = $this->common_model->getSingleLabel($label_array);
            $user_string = '<div id="myPopover">Visible To:';
            if(!empty($data['label_info']->visible_to)){
            //$data['label_info']->visible_to;die;
                $visibleto_string = $data['label_info']->visible_to;
                $user_lists = $this->common_model->getLabelVisibleTo($visibleto_string,$company_id);
                $user_string .= '
                        <ul class="visible_lists">';
                if(!empty($user_lists)){
                    foreach($user_lists AS $ulists){
                        $user_string .= '<li>'.$ulists->first_name.' '.$ulists->last_name.'</li>';
                    }
                }
                        $user_string .= '</ul>';
                
            }
            $user_string .= '</div>';
            echo $user_string;
        }
    }
    
    public function follow_unfollowpost(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        if($this->input->post('post_id')){
            $this->load->model(array('post_model','post_detail_model'));
            $post_id = $this->input->post('post_id');
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $post_record = $this->post_model->getIndividualPosts($post_array);
            
            $co_ow_arr = explode(',', $post_record->co_owners);
            array_push($co_ow_arr,$post_record->post_creator_id);
            
            $status = $this->input->post('status');
            
            $follow_array = array(''.FOLLOWED_POST.'.post_id'=>$post_id,''.FOLLOWED_POST.'.followed_by'=>$user_id);
            $already_followed = $this->post_detail_model->getFollowedPosts($follow_array,'Single');
            $post_creator_id = $post_record->post_creator_id;
            
            if(empty($post_id) || empty($post_record) || ($post_creator_id == $user_id) || in_array($this->session->userdata('kaseidon_user_id'),$co_ow_arr)){
                return FALSE;
            }
            
            //print_r($co_ow_arr);die;
            //if($uposts->post_creator_id != $this->session->userdata('kaseidon_user_id')){
            if(!empty($already_followed)){          /**Unfollow**/
                if($already_followed->followed_post_id && $status){
                    /*REMOVE FOLLOWERS(START)*/
                    $where_follow_array = array(''.FOLLOWED_POST.'.followed_post_id'=>$already_followed->followed_post_id,''.FOLLOWED_POST.'.post_id'=>$post_id,''.FOLLOWED_POST.'.company_id'=>$company_id);
                    $this->post_detail_model->deleteFollowers($where_follow_array);
                    /*REMOVE FOLLOWERS(END)*/
                   
                }else{
                    echo '<div id="myPopover">
                        <ul class="visible_lists"><li>Unfollow</li></ul>
                    </div>';
                }
            }else{                          /***Follow***/
                if($status){
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

                        $this->common_model->addNotification($add_notification);  
                    }
                }else{
                    echo '<div id="myPopover">Visible To:
                        <ul class="visible_lists"><li>Follow</li></ul>
                    </div>';
                }
            }
            
//            if(!empty($post_record)){
//                echo '<div id="myPopover">Visible To:
//                        <ul class="visible_lists"><li>Follow</li></ul>
//                    </div>';
//            }
        }
    }

    public function testing(){
        $re = $this->common_model->nestedLabelExistance(41);
        //print_r($re);
        //$id = nestedLabelExistance(2);
        echo $re = rtrim($re,",");
    }
    
    public function authedit_post(){
        $this->load->model('post_model');
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        
        if($this->input->post('post_id')){
            $post_id = base64_decode($this->input->post('post_id'));
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            $data['post_details'] = $post_details = $this->post_model->getIndividualPosts($post_array);
            //print_r($post_details);die;
            $editpost_time = $post_details->editpost_time;
            $editpost_user = $post_details->editpost_user;
            
            $udetails = $this->common_model->getIndividualUserDetails($editpost_user,$company_id);
            
            $current_time = time();
            $timediff = $current_time - $editpost_time;
            if($timediff < 10){
                echo '<div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content mini-modal">
                        <div class="modal-header">
                            <h4 class="modal-title">Post Status</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <h5>'.$udetails->first_name.' '.$udetails->last_name.' is editing the posts. Please wait for a while.</h5>      
                        </div>
                    </div>

                </div>';exit();
            }else if($timediff >= 11){
                echo 'redirect';
                exit();
                //$this->load->view('dashboard/stop_editpost',$data);
            }
        }
    }
    
    public function individual_search(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model(array('post_model','search_model'));
        
        $data['ptab'] = $this->input->post('ptab');
    }


//    public function post_visibilty_restriction(){
//        $this->layout->view('dashboard/post_visibilty_restriction');
//    }
    
}