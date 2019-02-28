<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_post extends MY_Controller {
    private $_uploaded;
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
    
    public function all_session(){
        echo '<pre>'; print_r($this->session->all_userdata());exit;
    }


//    public function auto_labels(){
//        if ($this->input->post()) {
//            $term = addslashes($this->input->post('data', TRUE));
//            $items = $this->common_model->getAutoLabels($term);
//            header('Content-Type: application/json');
//            echo json_encode($items);
//        }
//    }
    
    public function z_post(){
//        $this->layout->css('css/dx.spa.css');
//        $this->layout->css('css/dx.common.css');
//        $this->layout->css('css/dx.light.css');
//        $this->layout->css('css/custom.css');
//        
//        $this->layout->js('js/dx.all.js');
        
//        $this->load->model('post_model');
//        ///////////////////////////////////////////////
//        $data['item'] = json_encode(array
//            (array('id'=>1, 'color'=>'1e90ff','text'=> 'Low1 Priority'),
//            array('id'=>2, 'color'=> 'green', 'text'=>'High2 Priority'),
//            array('id'=>4, 'color'=> 'red', 'text'=>'module'),
//           array('id'=>3, 'color'=> 'orange', 'text'=>'Medium3 Priority'),
//        ));
//        
//        $data['data'] = $this->post_model->getResource();
        //print_r($data['data']);die;
        //////////////////////////////////////////////
        
        $this->load->view('post/z_post');
        //$this->load->view('post/k_post',$data);
        //$this->layout->view('post/k_post',$data);
    }
    
    public function add_timeplanner(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        if($this->input->post()){
            $text = $_POST["text"];
            $startDate = substr($_POST["startDate"], 0, -30); 
            $endDate =  substr($_POST["endDate"], 0, -30);
            $startDate = date("Y-m-d H:i:s", strtotime($startDate));
            $endDate = date("Y-m-d H:i:s", strtotime($endDate)); 
            $priority = $_POST["priority"];
            $description = $_POST["description"];
            
            $data = array();
            $this->load->model('post_model');
            $add_timep = array(
                'company_id'=>$company_id,
                'creator_id'=>$user_id,
                'text'=>$text,
                'startDate'=>$startDate,
                'endDate'=>$endDate,
                'priority'=>$priority,
                'description'=>$description,
            );
            $post_id = $this->uri->segment(4);
            if(!empty($post_id)){
                //array_push($add_calendar_eve,"blue","yellow");
                $add_timep['post_id'] = $post_id;
            }
            //header('Content-Type: application/json');
            $timeplanner_id = $this->post_model->addPostTimep($add_timep);
            if(!empty($timeplanner_id)){
                if(!empty($post_id)){
                    $where_result_arr = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
                }else{
                    $where_result_arr = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>0);
                }
                $timeplanner = $this->post_model->getTimePlannerJson($where_result_arr);
                echo $timeplanner;
            }
        }
    }
    
    
    public function delete_timeplanner(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        if($this->input->post()){
            $id = $_POST["id"];
            
            $this->load->model('post_model');
            
            $where_array = array('timeplanner_id'=>$id,'company_id'=>$company_id);
            $this->post_model->deleteTimePlanner($where_array);
            //header('Content-Type: application/json');
            
            $post_id = $this->uri->segment(4);
            if(!empty($post_id)){
                $where_result_arr = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
            }else{
                $where_result_arr = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>0);
            }
            //
            
            $timeplanner = $this->post_model->getTimePlannerJson($where_result_arr);
            echo $timeplanner;
            
        }
    }
    
    public function update_timeplanner(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        if($this->input->post()){
            $id = $_POST["id"];
            $text = $_POST["text"];
            $startDate = substr($_POST["startDate"], 0, -30); 
            $endDate =  substr($_POST["endDate"], 0, -30);
            $startDate = date("Y-m-d H:i:s", strtotime($startDate));
            $endDate = date("Y-m-d H:i:s", strtotime($endDate)); 
            $priority = $_POST["priority"];
            $description = $_POST["description"];
            
            $data = array();
            $this->load->model('post_model');
            $update_timep = array(
                'company_id'=>$company_id,
                'text'=>$text,
                'creator_id'=>$user_id,
                'startDate'=>$startDate,
                'endDate'=>$endDate,
                'priority'=>$priority,
                'description'=>$description,
            );
            
            $post_id = $this->uri->segment(4);
            if(!empty($post_id)){
                //array_push($add_calendar_eve,"blue","yellow");
                $update_timep['post_id'] = $post_id;
            }
            
            $where_arr = array('timeplanner_id'=>$id);
            //header('Content-Type: application/json');
            $timeplanner_id = $this->post_model->updateTimePlanner($update_timep,$where_arr);
            if($timeplanner_id){
                if(!empty($post_id)){
                    $where_result_arr = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
                }else{
                    $where_result_arr = array('company_id'=>$company_id,'creator_id'=>$user_id,'post_id'=>0);
                }
                
                $timeplanner = $this->post_model->getTimePlannerJson($where_result_arr);
                echo $timeplanner;
            }
        }
    }


    public function add_post(){
        $this->layout->css('css/bootstrap-multiselect.css');
        $this->layout->css('css/bootstrap-datetimepicker.min.css');
        $this->layout->css('css/dataTables.bootstrap.min.css');
        $this->layout->css('css/bootstrap-fullcalendar.css');
        $this->layout->css('css/fileinput.css');
        $this->layout->css('css/jquery.multiselect.css');
        $this->layout->css('css/chosen.css');
        $this->layout->css('css/fullcalendar.css');
        $this->layout->css('css/dx.spa.css');
        $this->layout->css('css/dx.common.css');
        $this->layout->css('css/dx.light.css');
        $this->layout->css('css/custom.css');
        
        $this->layout->js('js/jquery.dataTables.min.js');
        $this->layout->js('js/dataTables.bootstrap.min.js');
        $this->layout->js('js/ckeditor/ckeditor.js');
        $this->layout->js('js/ckeditor/adapters/jquery.js');
        $this->layout->js('js/chosen.jquery.js');
        $this->layout->js('js/jquery.multiselect.js');
        $this->layout->js('js/moment.min.js');
        $this->layout->js('js/fullcalendar.min.js');
//        $this->layout->js('js/dx.all.js');
        
//        $this->layout->js('js/moment-with-locales.min.js');
//        $this->layout->js('js/bootstrap-datetimepicker.min.js');
        
                
        $user_id = $this->session->userdata('kaseidon_user_id');
        $kaseidon_company_id = $this->session->userdata('kaseidon_company_id');
        
        $data['select_co_owners'] = $this->common_model->getAllUsersBasicInfo(array($user_id));
        
        $data['visibility_setting'] = $this->common_model->getAllUsersBasicInfo(array($user_id));
        $this->load->model('post_model');
        
        ///////////////////////////////////////////////
        
//        $data['item'] = json_encode(array
//            (array('id'=>1, 'color'=>'1e90ff','text'=> 'Low Priority'),
//            array('id'=>2, 'color'=> 'green', 'text'=>'High Priority'),
//           array('id'=>3, 'color'=> 'orange', 'text'=>'Medium Priority'),
//        ));
        //print_r($data['item']);die;
        $where_time_mod = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>0);
        $data['item'] = $this->post_model->getTimePlannerModuleJson($where_time_mod);
      
        $where_result_arr = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>0);
        //$data['data'] = $this->post_model->getResource();
        $data['data'] = $this->post_model->getTimePlannerJson($where_result_arr);
        //print_r($data['data']);die('KKKKK');
        //////////////////////////////////////////////
        if($this->input->post('module') && $this->input->post('post_type')==5){
            $addtime_module = array(
                'company_id'=>$kaseidon_company_id,
                'creator_id'=>$user_id,
                'post_id'=>0,
                'priority_text'=>trim($this->input->post('time_module')),
                'color'=>trim($this->input->post('color'))
            );

            $this->post_model->addTimepModule($addtime_module);
            
            $where_time_mod = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>0);
            $data['item'] = $this->post_model->getTimePlannerModuleJson($where_time_mod);
            
            $where_result_arr = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>0);
            $data['data'] = $this->post_model->getTimePlannerJson($where_result_arr);
            
            $this->layout->view('post/add_post',$data);
        }
        else if($this->input->post()){
            $post_type = $this->input->post('post_type');
            $title = trim($this->input->post('title'));
            $co_owner = $this->input->post('co_owner');
            $visibility = $this->input->post('visibility');
            $tagged_labels = $this->input->post('tagged_labels');
            $short_description = trim($this->input->post('short_description'));
            $detail_description = trim($this->input->post('detail_description'));
            $content_request_status = trim($this->input->post('content_request_status'));
            $publish_post = trim($this->input->post('publish_post'));
//            print_r($_POST);
            //print_r($_FILES['attachment']);
            //print_r($_FILES['graphics']);
            
              $this->form_validation->set_rules('post_type','post type','required');
//            $this->form_validation->set_rules('title','Title', 'required|max_length[150]|trim');
//            $this->form_validation->set_rules('short_description','Short Description', 'required|trim');
//            $this->form_validation->set_rules('detail_description','Detail Description', 'required');
//            if (empty($_FILES['driving_license_pic']['name']) && empty($rt_spaceid) && empty($check_space_existance->driving_license_pic))
//            {
//                $this->form_validation->set_rules('driving_license_pic', 'Driving License', 'required');
//            }
            //now we set a callback as rule for the upload field
            if(!empty($_FILES['attachment']['name'][0])){ //die('zzz');
                $this->form_validation->set_rules('attachment[]','Attachment','callback_fileupload_check');
            }
            if(!empty($_FILES['graphics']['name'][0])){
                $this->form_validation->set_rules('graphics[]','Upload image','callback_graphics_uploadcheck');
            }
            
//            if(!empty($_FILES['list']['name'])){ //die('lists');
//                $this->form_validation->set_rules('list','Upload image','callback_list_uploadcheck');
//            }
            
            if ($this->form_validation->run() == FALSE) {
                $this->layout->view('post/add_post',$data);
            }
            else{
                //die('SSSSS');
//                $this->load->model('post_model');
                $list_type = trim($this->input->post('list_type'));
                
                $co_own = '';
                if(!empty($co_owner)){
                    foreach ($co_owner as $cown) {
                        $co_own .= $cown.',';
                    }
                    $co_own = rtrim($co_own,',');
                }
                
                $visib = '';
                if(!empty($visibility)){
                    foreach ($visibility as $vsb) {
                            $visib .= $vsb.',';
                    }
                    $visib = rtrim($visib,',');
                }
                
                
                $tg_lab = '';
                if(!empty($tagged_labels)){
                    foreach ($tagged_labels as $tagged_data) {
                        $tg_lab .= $tagged_data.',';
                    }
                    $tg_lab = rtrim($tg_lab,',');
                }
                
                $addpost = array(
                    'post_creator_id'=>$user_id,
                    'company_id'=>$kaseidon_company_id,
                    'post_type'=>$post_type,
                    'title'=>$title,
                    'co_owners'=>$co_own,
                    'visibility'=>$visib,
                    'list_type'=>$list_type,
                    'tagged_labels'=>$tg_lab,
                    'content_request_status'=>$content_request_status,
                    'short_description'=>$short_description,
                    'detail_description'=>$detail_description,
                    'created_date'=>date('Y-m-d H:i:s'),
                    'publish'=>$publish_post
                );
                
                $post_id = $this->post_model->addPost($addpost);
                
                /*************Post History START***********/
                if($post_id){
                    $add_history_created = array(
                        'company_id'=>$kaseidon_company_id,
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'history_type'=>1,
                        'date'=>date('Y-m-d h:i:s')
                    );
                    $this->post_model->addPostHistory($add_history_created);
                    
                    if($co_own){
                        $add_history_invited = array(
                            'company_id'=>$kaseidon_company_id,
                            'post_id'=>$post_id,
                            'user_id'=>$user_id,
                            'history_type'=>2,
                            'multi_user_ids'=>$co_own,
                            'date'=>date('Y-m-d h:i:s')
                        );
                        $this->post_model->addPostHistory($add_history_invited);
                        $add_history_co_owner = array(
                            'company_id'=>$kaseidon_company_id,
                            'post_id'=>$post_id,
                            'user_id'=>$co_own,
                            'history_type'=>3,
                            'date'=>date('Y-m-d h:i:s')
                        );
                        $this->post_model->addPostHistory($add_history_co_owner);
                    }
                }
                
                /****************CALENDAR START***************/
                if($post_type == 4){
                    $update_calendar_eve = array(
                        'post_id'  => $post_id
                    );
                    $where_calendar_array = array('creator_id'=>$user_id,'company_id'=>$kaseidon_company_id,'post_id'=>0);

                    $this->common_model->updateCalendarPost($update_calendar_eve,$where_calendar_array);
                }
                /****************CALENDAR END***************/
                
                /****************Timeline Planner START***************/
                if($post_type == 5){
                    $update_timeplan_eve = array(
                        'post_id'  => $post_id
                    );
                    $where_timeplan_array = array('creator_id'=>$user_id,'company_id'=>$kaseidon_company_id,'post_id'=>0);

                    $this->post_model->updateTimePlanner($update_timeplan_eve,$where_timeplan_array);
                    $this->post_model->updateTimePlannerModule($update_timeplan_eve,$where_timeplan_array);
                }
                /****************CALENDAR END***************/
                
                
                
                /*************Post History END*************/
                
                if($post_type == 1){
                    $newxlsx = time().'.xlsx';
                    rename("upload/lists/".$user_id.".xlsx","upload/lists/".$newxlsx);
                    $update_list_array = array('list_upload'=>$newxlsx);
                    $where_list_array = array('post_id'=>$post_id,'company_id'=>$kaseidon_company_id);
                    $this->post_model->updatePostInfo($update_list_array,$where_list_array);
                }
                
                
                if(!empty($this->_uploaded)){
                    foreach($this->_uploaded AS $filedata){

                        $add_attachment = array(
                            'company_id'=>$kaseidon_company_id,
                            'post_id'=>$post_id,
                            'attachment'=>$filedata['file_name'],
                            'post_creator_id'=>$user_id
                        );

                        $this->post_model->addPostAttachment($add_attachment);
                    }
                }
                
                if(!empty($this->_graphics_uploaded)){
                    foreach($this->_graphics_uploaded AS $grphcdata){

                        $add_graphic = array(
                            'company_id'=>$kaseidon_company_id,
                            'post_id'=>$post_id,
                            'graphic'=>$grphcdata['file_name'],
                            'post_creator_id'=>$user_id
                        );

                        $this->post_model->addPostGraphics($add_graphic);
                    }
                }
                
                $this->session->set_flashdata('success_msg', 'Post added successfully.');
                redirect('post/individual_post/post_details/'.base64_encode($post_id));
                
            }
            
        }else{
            $this->layout->view('post/add_post',$data);
            
            if(file_exists('upload/lists/'.$user_id.'.xlsx')){
                unlink('upload/lists/'.$user_id.'.xlsx');
            }
            $where_arraytime = array('company_id'=>$kaseidon_company_id,'post_id'=>0,'creator_id'=>$user_id);
            $this->post_model->deleteTimePlanner($where_arraytime);
            $this->post_model->deleteTimePlannerModule($where_arraytime);
            
            
            $where_calendar_array = array('creator_id'=>$user_id,'company_id'=>$kaseidon_company_id,'post_id'=>0);
            $this->common_model->deleteCalendar($where_calendar_array);
        }
    }
    
    public function ttt(){
        $this->load->model('post_model');
        $this->post_model->deleteSheetRow('1533298706.xlsx');
    }


    // now the callback validation that deals with the upload of files
    public function fileupload_check()
    { 
        // we retrieve the number of files that were uploaded
        $number_of_files = sizeof($_FILES['attachment']['tmp_name']);
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['attachment'];

        // first make sure that there is no error in uploading the files
        for($i=0;$i<$number_of_files;$i++)
        {
            if($_FILES['attachment']['error'][$i] != 0)
            {
              // save the error message and return false, the validation of uploaded files failed
              $this->form_validation->set_message('fileupload_check', 'Couldn\'t upload the file(s)');
              return FALSE;
            }
        }

        // we first load the upload library
        $this->load->library('upload');
        // next we pass the upload path for the images
        $config['upload_path'] = 'upload/attachment/';
        $config['max_size'] = '5120';
        // also, we make sure we allow only certain type of images
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        //$config['allowed_types'] = 'png';

        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++)
        {
          $_FILES['attachment']['name'] = $files['name'][$i];
          $_FILES['attachment']['type'] = $files['type'][$i];
          $_FILES['attachment']['tmp_name'] = $files['tmp_name'][$i];
          $_FILES['attachment']['error'] = $files['error'][$i];
          $_FILES['attachment']['size'] = $files['size'][$i];

          //now we initialize the upload library
          $this->upload->initialize($config);
          if ($this->upload->do_upload('attachment'))
          {
            $this->_uploaded[$i] = $this->upload->data();
          }
          else
          {
            $this->form_validation->set_message('fileupload_check', strip_tags($this->upload->display_errors()));
            return FALSE;
          }
        }
        return TRUE;
    }
    
    public function graphics_uploadcheck(){
        // we retrieve the number of files that were uploaded
        $number_of_files = sizeof($_FILES['graphics']['tmp_name']);
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['graphics'];
        //print_r($files);die('WWW');
        // first make sure that there is no error in uploading the files
        for($i=0;$i<$number_of_files;$i++)
        {
            if($_FILES['graphics']['error'][$i] != 0)
            {
              // save the error message and return false, the validation of uploaded files failed
              $this->form_validation->set_message('graphics_uploadcheck', 'Couldn\'t upload the file(s)');
              return FALSE;
            }
        }

        // we first load the upload library
        $this->load->library('upload');
        // next we pass the upload path for the images
        $config['upload_path'] = 'upload/graphics/';
        // also, we make sure we allow only certain type of images
        $config['max_size'] = '5120';
        //$config['max_width'] = '1024';
        //$config['max_height'] = '768';
        $config['allowed_types'] = 'jpg|png|jpeg';
        //$config['allowed_types'] = 'png';
        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++)
        {
            $_FILES['graphics']['name'] = $files['name'][$i];
            $_FILES['graphics']['type'] = $files['type'][$i];
            $_FILES['graphics']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['graphics']['error'] = $files['error'][$i];
            $_FILES['graphics']['size'] = $files['size'][$i];

            //now we initialize the upload library
            $this->upload->initialize($config);
            if ($this->upload->do_upload('graphics'))
            {
              $this->_graphics_uploaded[$i] = $this->upload->data();
              
                $data = $this->upload->data();  
                $configi['image_library'] = 'gd2';  
                $configi['source_image'] = './upload/graphics/'.$this->_graphics_uploaded[$i]["file_name"];  
                $configi['create_thumb'] = FALSE;  
                $configi['maintain_ratio'] = TRUE;  
                $configi['quality'] = '60%';  
                $configi['width'] = 300;  
                $configi['height'] = 300;  
                $configi['new_image'] = './upload/graphics/graphics_rsz/'.$this->_graphics_uploaded[$i]["file_name"];  
                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);      
                $this->image_lib->resize();
                $this->image_lib->clear();
            }
            else
            {
              $this->form_validation->set_message('graphics_uploadcheck', strip_tags($this->upload->display_errors()));
              return FALSE;
            }
        }
        return TRUE;
    }


    public function list_uploadcheck(){
        
        if(!empty($_FILES['list']['name'])){
            $config['upload_path'] = 'upload/lists/';
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['file_name'] = time().$_FILES['list']['name'];
            //$config['max_size'] = 100;

            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('list'))
            {
                $this->form_validation->set_message('list_uploadcheck', $this->upload->display_errors());
                return FALSE;
            }
            else
            {
                $this->_lists_uploaded = $this->upload->data();
            }
        }
    }

    public function addlabel(){
        $this->load->model('post_model');
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        //print_r($_POST);die('SSS');
        $users_array = array($user_id);
        $data['get_userinfo'] = $this->common_model->getAllUsersBasicInfo($users_array);
        if($this->input->post('add')){
            
            $errors = array();
            $data = array();
            
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
            
            $label_name = trim($this->input->post('label_name'));
            $label_parent_id = trim($this->input->post('label_parent_id'));
            
            $inherit_visibility = trim($this->input->post('inherit_visibility'));
            $visible_to = $this->input->post('visible_to');
            //print_r($visible_to);
            if(!empty($label_parent_id)){
                $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$label_parent_id,''.LABEL.'.label_name'=>$label_name);
                $checkparent_label_existance = $this->common_model->getSingleLabel($label_array);
            }
            else{
                $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>0,''.LABEL.'.label_name'=>$label_name);
                $checkparent_label_existance = $this->common_model->getSingleLabel($label_array);
            }
            
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
            else if(!empty($checkparent_label_existance) && empty($label_parent_id)){
                $errors['valid_label_name'] = 'This label already exists in root level.';
            }
            else if(!empty($checkparent_label_existance)){
                $errors['valid_label_name'] = 'This label already exists in this level.';
            }
            
            if (!empty($errors)) { //echo 'ssss';
                $data['errors']  = $errors;
                echo json_encode($data);
            }else {

                $data['errors']  = '';
                $add_label = array(
                    'label_name'=>$label_name,
                    'label_parent_id'=>$label_parent_id,
                    'inherit_visibility'=>$inherit_visibility,
                    'visible_to'=>$visibilty_of_users,
                    'company_id'=>$company_id,
                    'label_creator_id'=>$user_id
                );
                //print_r($update_user);die;
                $uid = $this->post_model->addLabel($add_label);
                if($uid){
                    $data['success'] = 'true';
                }else{
                    $data['success'] = 'false';
                }
                echo json_encode($data);

            }
        }
        else if($this->input->post('popup')){
            $this->load->view('post/addlabel',$data);
        }
    }
    
    
    public function tagged_lables($lab_id=''){
        if($lab_id){
            $label_id = $lab_id;
        }else{
            $label_id = $this->input->get('label_id', TRUE);
        }
        
        if($label_id){
            $this->load->model('post_model');
            $label_name = '';
            $single_label_details = $this->post_model->getIndividualLabel($label_id);

            $string = '';
            if(!empty($single_label_details->label_parent_id)){
                $string .= $single_label_details->label_name.'/';
                $new_label_id = $single_label_details->label_parent_id;
                $this->tagged_lables($new_label_id);

            }else{
                $string .= $single_label_details->label_name.'/';
            }
            
            echo $string;
        }else{
            echo 'false';
        }
        
    }
    
    public function getlatest_label(){
        //$result = $this->getChildParents(4);
        //print_r($result);
        echo "<option value=''>Select Lables</option><option value='createlab'>Create Labels</option>";
        labelTree();
    }
    
    public function addsheet_column(){
        if($this->input->post()){
            //echo 'WW';print_r($_POST);die;
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
            
            $cell_val = trim($this->input->post('cell_val'));
            $cell_id = trim($this->input->post('cell_id'));
            
            $cell_arr = array('user_id'=>$user_id,'company_id'=>$company_id,'col'=>$cell_id,'val'=>$cell_val);
            
            $this->load->model(array('post_model'));
            $addtotable = $this->post_model->addSheetColumnManual($cell_arr);
            if($addtotable){
                echo TRUE;
            }
        }
    }
    
    public function addsheet_row(){
        if($this->input->post()){
            echo 'EE';print_r($_POST);die;
            $cell_val = trim($this->input->post('cell_val'));
            $cell_id = trim($this->input->post('cell_id'));
            
            $cell_arr = array('user_id'=>$user_id,'col'=>$cell_id,'val'=>$cell_val);
            
            $this->load->model(array('post_model'));
            $up_sheet = $this->post_model->addSheetRowManual($cell_val);
            if($up_sheet){
                echo TRUE;
            }
        }
    }

//    public function save_sheet(){
//        if($this->input->post()){
//            $company_id = $this->session->userdata('kaseidon_company_id');
//            $user_id = $this->session->userdata('kaseidon_user_id');
//            
//            $cell_val = trim($this->input->post('cell_val'));
//            $sheet_cell = trim($this->input->post('sheet_cell'));
//            
//            $this->load->model(array('post_model'));
//            
//            if(!empty($this->input->post('file_xlsx'))){
//                $edit_sheet_arr = array(
//                    'cell_val'=>$cell_val,
//                    'sheet_cell'=>$sheet_cell,
//                    'list_upload'=>trim($this->input->post('file_xlsx'))
//                );
//                
//                $up_sheet = $this->post_model->updateSheet($edit_sheet_arr);
//                if($up_sheet){
//                    //echo TRUE;
//                    $data['lists_data'] = $this->post_model->getEditSheetData($this->input->post('file_xlsx'));
//                    $data['file_xlsx'] = $file_xlsx = trim($this->input->post('file_xlsx'));
//                    //print_r($data['lists_data']);die('QAZSWX');
//            
//                    $this->load->view('post/upload_xlsx',$data);
//                }
//            }
//            else{
//                $sheet_arr = array('cell_val'=>$cell_val,'sheet_cell'=>$sheet_cell);
//                        $sheet_result = $this->post_model->addManualTempSheetRow($sheet_arr);
//                        if($sheet_result){
//                            $data['lists_data'] = $this->post_model->getEditSheetData($sheet_result);
//                            $this->load->view('post/upload_xlsx',$data);
//                        }
//            }
//        }
//    }
    
    public function save_sheet(){
        if($this->input->post()){
            $company_id = $this->session->userdata('kaseidon_company_id');
            $user_id = $this->session->userdata('kaseidon_user_id');
            
            $cell_val = trim($this->input->post('cell_val'));
            $sheet_cell = trim($this->input->post('sheet_cell'));
            
            $this->load->model(array('post_model'));
            
            if(!empty($this->input->post('file_xlsx'))){            /*Condition when file upload by browse button*/
                $edit_sheet_arr = array(
                    'cell_val'=>$cell_val,
                    'sheet_cell'=>$sheet_cell,
                    'list_upload'=>trim($this->input->post('file_xlsx'))
                );
                
                $up_sheet = $this->post_model->updateSheet($edit_sheet_arr);
                if($up_sheet){
                    $dataset = $this->post_model->getEditSheetData($this->input->post('file_xlsx'));    //Get array
                    if(file_exists('upload/lists/'.$this->input->post('file_xlsx'))){
                        unlink('upload/lists/'.$this->input->post('file_xlsx'));
                    }
                    $this->post_model->newXlsx($dataset,$this->input->post('file_xlsx'));
                    $data['lists_data'] = $this->post_model->freshXlsx($this->input->post('file_xlsx'));
            
                    $this->load->view('post/upload_xlsx',$data);
                }
            }
            else{                                                   /*Condition when table create manually*/
                $sheet_arr = array('cell_val'=>$cell_val,'sheet_cell'=>$sheet_cell);
                $sheet_result = $this->post_model->addManualTempSheetRow($sheet_arr);
                if($sheet_result){
                    $dataset = $this->post_model->getEditSheetData($sheet_result);    //Get array
                    if(file_exists('upload/lists/'.$sheet_result)){
                        unlink('upload/lists/'.$sheet_result);
                    }
                    $this->post_model->newXlsx($dataset,$sheet_result);

                    $data['lists_data'] = $this->post_model->freshXlsx($sheet_result);
                    $this->load->view('post/upload_xlsx',$data);
                }
            }
        }
    }
    
    public function edit_post(){
        $this->layout->css('css/bootstrap-multiselect.css');
        $this->layout->css('css/bootstrap-datetimepicker.min.css');
        $this->layout->css('css/dataTables.bootstrap.min.css');
        $this->layout->css('css/bootstrap-fullcalendar.css');
        $this->layout->css('css/fileinput.css');
        $this->layout->css('css/chosen.css');
        $this->layout->css('css/jquery.multiselect.css');
        $this->layout->css('css/fullcalendar.css');
        $this->layout->css('css/jquery.countdownTimer.css');
        $this->layout->css('css/dx.spa.css');
        $this->layout->css('css/dx.common.css');
        $this->layout->css('css/dx.light.css');
        $this->layout->css('css/custom.css');
        
        $this->layout->js('js/jquery.dataTables.min.js');
        $this->layout->js('js/dataTables.bootstrap.min.js');
        $this->layout->js('js/ckeditor/ckeditor.js');
        $this->layout->js('js/ckeditor/adapters/jquery.js');
        $this->layout->js('js/chosen.jquery.js');
        $this->layout->js('js/jquery.multiselect.js');
        $this->layout->js('js/moment.min.js');
        $this->layout->js('js/fullcalendar.min.js');
        $this->layout->js('js/jquery.countdownTimer.js');
        
        
        $post_id = base64_decode($this->uri->segment(4));
        if(!isPostDisable($post_id)) { 
            redirect($this->config->base_url().'dashboard/user_dashboard/all_posts');
        }
                
        $user_id = $this->session->userdata('kaseidon_user_id');
        $kaseidon_company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model(array('post_model'));
        
        $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$kaseidon_company_id);
        $post_record = $data['edit_posts'] = $this->post_model->getIndividualPosts($post_array);
        
        
        $data['user_tranfer_posts'] = $this->common_model->getAllUsersBasicInfo(array($user_id));
        
        $data['post_type'] = $this->common_model->getPostType();
        
        $data['select_co_owners'] = $this->common_model->getAllUsersBasicInfo(array($post_record->post_creator_id));
        
        $data['visibility_setting'] = $this->common_model->getAllUsersBasicInfo(array($post_record->post_creator_id));

        $data['lists_data'] = $this->post_model->freshXlsx($post_record->list_upload);
        
        $post_attachm_arr = array(''.POST_ATTACHM.'.post_id'=>$post_id,''.POST_ATTACHM.'.company_id'=>$kaseidon_company_id);
        $data['post_attach'] = $this->post_model->getPostAttachment($post_attachm_arr);
        
        $post_graphic_arr = array(''.POST_GRAPHICS.'.post_id'=>$post_id,''.POST_GRAPHICS.'.company_id'=>$kaseidon_company_id);
        $data['post_graphic'] = $this->post_model->getPostGraphics($post_graphic_arr);
        
        
        ///////////////////////////////////////////////
        //$data['item'] = json_encode(array());
        
//        $data['item'] = json_encode(array
//            (array('id'=>1, 'color'=>'1e90ff','text'=> 'Low Priority'),
//            array('id'=>2, 'color'=> 'green', 'text'=>'High Priority'),
//           array('id'=>3, 'color'=> 'orange', 'text'=>'Medium Priority'),
//        ));
        
        $where_time_mod = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
        $data['item'] = $this->post_model->getTimePlannerModuleJson($where_time_mod);
        
        //$data['data'] = $this->post_model->getResource();
        $where_result_arr = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
        $data['data'] = $this->post_model->getTimePlannerJson($where_result_arr);
        //print_r($data['data']);die;
        //////////////////////////////////////////////
        
        if($this->input->post('module') && $this->input->post('post_type')==5){
            $addtime_module = array(
                'company_id'=>$kaseidon_company_id,
                'creator_id'=>$user_id,
                'post_id'=>$post_id,
                'priority_text'=>trim($this->input->post('time_module')),
                'color'=>trim($this->input->post('color'))
            );

            $this->post_model->addTimepModule($addtime_module);
            
            $where_time_mod = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
            $data['item'] = $this->post_model->getTimePlannerModuleJson($where_time_mod);
            
            $where_result_arr = array('company_id'=>$kaseidon_company_id,'creator_id'=>$user_id,'post_id'=>$post_id);
            $data['data'] = $this->post_model->getTimePlannerJson($where_result_arr);
            
            $this->layout->view('post/edit_post',$data);
        }
        else if($this->input->post()){ //die('aaa');
            $post_type = $this->input->post('post_type');
            $title = trim($this->input->post('title'));
            $co_owner = $this->input->post('co_owner');
            $visibility = $this->input->post('visibility');
            $tagged_labels = $this->input->post('tagged_labels');
            $short_description = trim($this->input->post('short_description'));
            $detail_description = trim($this->input->post('detail_description'));
            $content_request_status = trim($this->input->post('content_request_status'));
            $publish_post = trim($this->input->post('publish_post'));

            
            $this->form_validation->set_rules('post_type','post type','required');
            //$this->form_validation->set_rules('title','Title', 'required|max_length[150]|trim');
//            $this->form_validation->set_rules('short_description','Short Description', 'required|trim');
//            $this->form_validation->set_rules('detail_description','Detail Description', 'required');
//            if (empty($_FILES['driving_license_pic']['name']) && empty($rt_spaceid) && empty($check_space_existance->driving_license_pic))
//            {
//                $this->form_validation->set_rules('driving_license_pic', 'Driving License', 'required');
//            }
            //now we set a callback as rule for the upload field
            if(!empty($_FILES['attachment']['name'][0])){ //die('zzz');
                $this->form_validation->set_rules('attachment[]','Attachment','callback_fileupload_check');
            }
            if(!empty($_FILES['graphics']['name'][0])){
                $this->form_validation->set_rules('graphics[]','Upload image','callback_graphics_uploadcheck');
            }
            
            if(!empty($_FILES['list']['name'])){ //die('lists');
                $this->form_validation->set_rules('list','Upload image','callback_list_uploadcheck');
            }
            
            if ($this->form_validation->run() == FALSE) {
                $this->layout->view('post/add_post',$data);
            }
            else{
                //die('sss');
                $tg_lab = '';
                if(!empty($tagged_labels)){
                    foreach ($tagged_labels as $tagged_data) {
                        $tg_lab .= $tagged_data.',';
                    }
                    $tg_lab = rtrim($tg_lab,',');
                }
                
                $co_own = '';
                if(!empty($co_owner)){
                    foreach ($co_owner as $cown) {
                        $co_own .= $cown.',';
                    }
                    $co_own = rtrim($co_own,',');
                }
                
                $visib = '';
                if(!empty($visibility)){
                    foreach ($visibility as $vsb) {
                        $visib .= $vsb.',';
                    }
                    $visib = rtrim($visib,',');
                }
                
                $list_type = trim($this->input->post('list_type'));
                
                $update_post_array = array(
                    'post_type'=>$post_type,
                    'title'=>$title,
                    //'co_owners'=>$co_own,
                    //'visibility'=>$visib,
                    'list_type'=>$list_type,
                    'tagged_labels'=>$tg_lab,
                    'content_request_status'=>$content_request_status,
                    'short_description'=>$short_description,
                    'detail_description'=>$detail_description,
                    'updated_views'=>$user_id,
                    'transfer_post_from'=>($this->input->post('transfer_post'))?$this->input->post('transfer_post'):$user_id,
                    'transfer_post_to'=>($this->input->post('transfer_post'))?$this->input->post('transfer_post'):'0',
                    'updated_date'=>date('Y-m-d H:i:s'),
                    'publish'=>$publish_post
                );
                if(!empty($co_own)){
                    $update_post_array['co_owners'] = $co_own;
                }
                if(!empty($visib)){
                    $update_post_array['visibility'] = $visib;
                }
                //print_r($update_post_array);die('EE');
                
                if($this->input->post('transfer_post')){
                    $update_post_array['post_creator_id'] = $this->input->post('transfer_post');
                }
                
                //print_r($update_post_array);die('ZZZ');
                $where_post_array = array('post_id'=>$post_id,'company_id'=>$kaseidon_company_id);
                $update_post = $this->post_model->updatePostInfo($update_post_array,$where_post_array);

                /*************Post History START***********/
                if($update_post){
                    $add_update_history = array(
                        'company_id'=>$kaseidon_company_id,
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'history_type'=>4,
                        'date'=>date('Y-m-d h:i:s')
                    );
                    
                    $this->post_model->addPostHistory($add_update_history);
                }
                
                if($this->input->post('transfer_post')){
                    
                    $add_update_history = array(
                        'company_id'=>$kaseidon_company_id,
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'history_type'=>5,
                        'multi_user_ids'=>$this->input->post('transfer_post'),
                        'date'=>date('Y-m-d h:i:s')
                    );
                    
                    $add_update_history2 = array(
                        'company_id'=>$kaseidon_company_id,
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'history_type'=>6,
                        'multi_user_ids'=>$this->input->post('transfer_post'),
                        'date'=>date('Y-m-d h:i:s')
                    );
                    
                    $this->post_model->addPostHistory($add_update_history);
                    $this->post_model->addPostHistory($add_update_history2); /*************Post History END***********/
                    
                    $usdetails = $this->common_model->getIndividualUserDetails($user_id,$kaseidon_company_id);
                    if(!empty($usdetails) && $usdetails->is_super_user == 1){
                        $super_user = ' ('.$usdetails->first_name.' '.$usdetails->last_name.') ';
                    }else{
                        $super_user = '';
                    }
                    
                    /*ADD NOTIFICATION WHEN TRANSFER POST (START)*/
                    $add_notification = array(
                        'company_id'=>$kaseidon_company_id,
                        'user_id'=>$this->input->post('transfer_post'),
                        'notify_by'=>$user_id,
                        'post_id'=>$post_id,
                        'notification_msg'=>"$super_user Transfer posts ownership of post # ".$post_id." to you",
                        'read_status'=>1,
                        'created_date'=>date('Y-m-d H:i:s')
                    );

                    $this->common_model->addNotification($add_notification);    

                    /*ADD NOTIFICATION WHEN TRANSFER POST (END)*/
                    
                    
                }
                
                if($post_type == 1){
                    if(file_exists('upload/lists/'.$user_id.'.xlsx')){
                        $newxlsx = time().'.xlsx';
                        rename("upload/lists/".$user_id.".xlsx","upload/lists/".$newxlsx);
                        $update_list_array = array('list_upload'=>$newxlsx);
                        $where_list_array = array('post_id'=>$post_id,'company_id'=>$kaseidon_company_id);
                        $this->post_model->updatePostInfo($update_list_array,$where_list_array);
                    }
                    
                }
                
//                if($post_type == 1){
//                    $newxlsx = time().'.xlsx';
//                    rename("upload/lists/".$user_id.".xlsx","upload/lists/".$newxlsx);
//                    $update_list_array = array('list_upload'=>$newxlsx);
//                    $where_list_array = array('post_id'=>$post_id,'company_id'=>$kaseidon_company_id);
//                    $this->post_model->updatePostInfo($update_list_array,$where_list_array);
//                }
                
//                if(!empty($this->_lists_uploaded['file_name']) && !empty($list_type) && $list_type == 1){ 
//                    ini_set('display_errors', 1);
//                    ini_set('display_startup_errors', 1);
//                    error_reporting(E_ALL);
//                    $list_upload = $this->_lists_uploaded['file_name'];
//                    
//                    $update_post_array = array('list_upload'=>$list_upload);
//                    $where_post_array = array('post_id'=>$post_id,'company_id'=>$kaseidon_company_id);
//                    $up = $this->post_model->updatePostInfo($update_post_array,$where_post_array);
//                    
//                }else{
//                    $list_upload = '';
//                }
//                  
//                if(!empty($list_type) && $list_type == 2 && empty($post_record->list_type)){
//                    $sheet_arr = array('user_id'=>$user_id,'company_id'=>$kaseidon_company_id);
//                    $sheet_result = $this->post_model->addManualSheetRow($sheet_arr);
//                    if($sheet_result){
//                        //$this->post_model->deleteTempLists($sheet_arr);
//                        $update_post_array = array('list_upload'=>$sheet_result);
//                        $where_post_array = array('post_id'=>$post_id,'company_id'=>$kaseidon_company_id);
//                        $up = $this->post_model->updatePostInfo($update_post_array,$where_post_array);
//                    }
//                }
                
                if(!empty($this->_uploaded)){
                    foreach($this->_uploaded AS $filedata){

                        $add_attachment = array(
                            'company_id'=>$kaseidon_company_id,
                            'post_id'=>$post_id,
                            'attachment'=>$filedata['file_name'],
                            'post_creator_id'=>$user_id
                        );

                        $this->post_model->addPostAttachment($add_attachment);
                    }
                }
                
                if(!empty($this->_graphics_uploaded)){
                    foreach($this->_graphics_uploaded AS $grphcdata){

                        $add_graphic = array(
                            'company_id'=>$kaseidon_company_id,
                            'post_id'=>$post_id,
                            'graphic'=>$grphcdata['file_name'],
                            'post_creator_id'=>$user_id
                        );

                        $this->post_model->addPostGraphics($add_graphic);
                    }
                }
                
                $this->session->set_flashdata('success_msg', 'Post updated successfully.');
                redirect('post/individual_post/post_details/'.base64_encode($post_id));
                
            }
            
        }else{
            $this->layout->view('post/edit_post',$data);
        }
    }
    
    
//    public function update_sheet(){
//        if($this->input->post()){
//            $cell_val = trim($this->input->post('cell_val'));
//            $sheet_cell = trim($this->input->post('sheet_cell'));
//            $data['post_id'] = $post_id = trim($this->input->post('post_id'));
//            
//            $this->load->model(array('post_model'));
//            $company_id = $this->session->userdata('kaseidon_company_id');
//            
//            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
//            
//            $post_info = $this->post_model->getIndividualPosts($post_array);
//            $fileName = $post_info->list_upload;
//            if(!empty($post_info->list_upload)){
//                $edit_sheet_arr = array(
//                    'cell_val'=>$cell_val,
//                    'sheet_cell'=>$sheet_cell,
//                    'list_upload'=>$post_info->list_upload
//                );
//                
//                $up_sheet = $this->post_model->updateSheet($edit_sheet_arr);
//                if($up_sheet){
//                    //echo TRUE;
//                    //$data['lists_data'] = $this->post_model->getEditSheetData($post_info->list_upload);
//                    $dataset = $this->post_model->getEditSheetData($fileName);
//                    //print_r($dataset);die;
//                    if(file_exists('upload/lists/'.$fileName)){
//                        unlink('upload/lists/'.$fileName);
//                    }
//
//                    $this->post_model->newXlsx($dataset,$fileName);
//
//                    $data['lists_data'] = $this->post_model->freshXlsx($fileName);
//                    //print_r($data['lists_data']);die('QAZSWX');
//            
//                    $this->load->view('post/remove_trow',$data);
//                }
//            }
//            
//        }
//    }
    public function update_sheet(){
        if($this->input->post()){
            $cell_val = trim($this->input->post('cell_val'));
            $sheet_cell = trim($this->input->post('sheet_cell'));
            $data['post_id'] = $post_id = trim($this->input->post('post_id'));
            
            $this->load->model(array('post_model'));
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            
            $post_info = $this->post_model->getIndividualPosts($post_array);
            $fileName = $post_info->list_upload;
            if(!empty($post_info->list_upload)){
                $edit_sheet_arr = array(
                    'cell_val'=>$cell_val,
                    'sheet_cell'=>$sheet_cell,
                    'list_upload'=>$post_info->list_upload
                );
                
                $up_sheet = $this->post_model->updateSheet($edit_sheet_arr);
                //print_r($edit_sheet_arr);die('llll');
                if($up_sheet){
                    $dataset = $this->post_model->getEditSheetData($fileName);    //Get array
                    //print_r($dataset);die('CCC');
//                    if(file_exists('upload/lists/'.$fileName)){
//                        unlink('upload/lists/'.$fileName);
//                    }
                    //print_r($dataset);die('BBB');
                    $this->post_model->newXlsx($dataset,$fileName);

                    $data['lists_data'] = $this->post_model->freshXlsx($fileName);
                    //print_r($data['lists_data']);die('QAZSWX');
            
                    $this->load->view('post/remove_trow',$data);
                }
            }
            
        }
    }
    
    public function delete_attachment(){
        if($this->input->post('post_attachment_id') && $this->input->post('post_id')){
            $this->load->model(array('post_model'));
            $post_attachment_id = $this->input->post('post_attachment_id');
            $post_id = $this->input->post('post_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $post_attachm_arr = array('post_attachment_id'=>$post_attachment_id,'post_id'=>$post_id,'company_id'=>$company_id);
            $post_atthm_details = $this->post_model->getPostAttachment($post_attachm_arr);
            //print_r($post_atthm_details);die('ss');
            if(!empty($post_atthm_details[0])){
                $file = "upload/attachment/".$post_atthm_details[0]->attachment;
                if (!unlink($file))
                {
                    echo 'false';
                }
                else
                {
                    $this->post_model->deleteAttachment($post_attachm_arr);
                    echo 'true';
                }
            }
           
        }
    }
    
    public function delete_graphics(){
        if($this->input->post('post_graphic_id') && $this->input->post('post_id')){
            $this->load->model(array('post_model'));
            $post_graphic_id = $this->input->post('post_graphic_id');
            $post_id = $this->input->post('post_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $post_garphic_arr = array('post_graphic_id'=>$post_graphic_id,'post_id'=>$post_id,'company_id'=>$company_id);
            $post_garphic_details = $this->post_model->getPostGraphics($post_garphic_arr);
            
            if(!empty($post_garphic_details[0])){
                $file = "upload/graphics/".$post_garphic_details[0]->graphic;
                if (!unlink($file))
                {
                    echo 'false';
                }
                else
                {
                    $this->post_model->deleteGraphics($post_garphic_arr);
                    echo 'true';
                }
            }
            
        }
    }
    
    public function addtable_colrow(){
        $this->load->view('post/addtable_colrow');
    }


    public function loadtable_content(){
        if($this->input->post('col_no') && $this->input->post('row_no')){
            $data['col_no'] = trim($this->input->post('col_no'));
            $data['row_no'] = trim($this->input->post('row_no'));
            $this->load->view('post/loadtable_content',$data);
        }
    }

    public function getcalendar_post(){
        //if($this->input->post()){
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $calend_data = array();
        $post_id = $this->input->get('post_id');
        $ctype = $this->input->get('ctype');
        if($ctype == '' && $post_id == ''){
            $caln_array = array('creator_id'=>$user_id,'company_id'=>$company_id,'post_id'=>0);
        }else if(!empty($ctype) && !empty($post_id)){
            $caln_array = array('post_id'=>$post_id,'company_id'=>$company_id);
        }
        //$caln_array = array('post_id'=>$post_id);
        
        $result = $this->common_model->getCalendarPost($caln_array);
        if(!empty($result)){
        foreach($result as $row)
        {
            $calend_data[] = array(
                'id' => $row->post_calender_id,
                'title' => $row->calender_title,
                'start' => $row->start_event,
                'end' => $row->end_event
            );
        }
        }

        echo json_encode($calend_data);
        //}
    }
    
    public function addcalendar_event(){
        if($this->input->post('title'))
        {
            $post_id = '';
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $add_calendar_eve = array(
                'creator_id' => $user_id,
                'company_id'  => $company_id,
                'calender_title'  => trim($this->input->post('title')),
                'start_event' => $this->input->post('start'),
                'end_event' => $this->input->post('end')
            );
            $post_id = $this->input->post('post_id');
            if(!empty($post_id)){
                //array_push($add_calendar_eve,"blue","yellow");
                $add_calendar_eve['post_id'] = $post_id;
            }
            //print_r($add_calendar_eve);die('@@@@@');
            $this->common_model->addCalendarPost($add_calendar_eve);
        }
    }
    
    public function updatecalendar_event(){
        if($this->input->post('id'))
        {
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $post_calender_id = $this->input->post('id');
        
            $update_calendar_eve = array(
                'calender_title'  => trim($this->input->post('title')),
                'start_event' => $this->input->post('start'),
                'end_event' => $this->input->post('end')
            );
            $where_calendar_array = array('post_calender_id'=>$post_calender_id,'company_id'=>$company_id);
            
            $this->common_model->updateCalendarPost($update_calendar_eve,$where_calendar_array);
        }
    }
    
    public function deletecalendar_event(){
        
        if($this->input->post('id'))
        {
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $post_calender_id = $this->input->post('id');
        
            $where_calendar_array = array('post_calender_id'=>$post_calender_id,'company_id'=>$company_id);
            $this->common_model->deleteCalendar($where_calendar_array);
        }
    }



    //TESTING
    public function test(){
        //taggedLabels(4);
        echo getPvhScore();
    }
    
//    public function remove_trow(){
//        
//        if($this->input->post()){
//            $user_id = $this->session->userdata('kaseidon_user_id');
//            $company_id = $this->session->userdata('kaseidon_company_id');
//            
//            $data['post_id'] = $post_id = $this->input->post('post_id');
//            $tr_id = $this->input->post('tr_id');
//            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
//            
//            $this->load->model('post_model');
//            
//            $post_record = $this->post_model->getIndividualPosts($post_array);
//            $this->post_model->deleteSheetRow($post_record->list_upload,$tr_id);
//            
//            $data['lists_data'] = $this->post_model->getEditSheetData($post_record->list_upload);
//            
//            //print_r($data['lists_data']);die('QAZSWX');
//            
//            $this->load->view('post/remove_trow',$data);
//        }
//    }
    
    public function remove_multitrow_addposttime(){
        if($this->input->post()){
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');

            $this->load->model('post_model');
            
            $fileName = $user_id.'.xlsx';
            $this->post_model->deleteMultipleSheetRow($fileName,$_POST['checked']);
            
            //$data['lists_data'] = $this->post_model->getEditSheetData($post_record->list_upload);
            $dataset = $this->post_model->getEditSheetData($fileName);
            
            if(file_exists('upload/lists/'.$fileName)){
                unlink('upload/lists/'.$fileName);
            }

            $this->post_model->newXlsx($dataset,$fileName);

            $data['lists_data'] = $this->post_model->freshXlsx($fileName);
            //print_r($data['lists_data']);die('QAZSWX');
            
            $this->load->view('post/upload_xlsx',$data);
        }
    }
    
    public function remove_multitrow(){
        if($this->input->post()){
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $data['post_id'] = $post_id = $this->input->post('post_id');
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            
            $this->load->model('post_model');
            
            //print_r($_POST['checked']);
            //die('ZZ');
            //print_r($_POST);die;
            $post_record = $this->post_model->getIndividualPosts($post_array);
            $fileName = $post_record->list_upload;
            $this->post_model->deleteMultipleSheetRow($fileName,$_POST['checked']);
            
            //$data['lists_data'] = $this->post_model->getEditSheetData($post_record->list_upload);
            $dataset = $this->post_model->getEditSheetData($fileName);
            
            if(file_exists('upload/lists/'.$fileName)){
                unlink('upload/lists/'.$fileName);
            }

            $this->post_model->newXlsx($dataset,$fileName);

            $data['lists_data'] = $this->post_model->freshXlsx($fileName);
            //print_r($data['lists_data']);die('QAZSWX');
            
            $this->load->view('post/remove_trow',$data);
        }
    }
    
    public function remove_tablecol(){
        if($this->input->post()){
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $col_name = $this->input->post('col_name');
            $data['post_id'] = $post_id = $this->input->post('post_id');
            $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
            
            $this->load->model('post_model');
            
            $post_record = $this->post_model->getIndividualPosts($post_array);
            $fileName = $post_record->list_upload;
            $this->post_model->deleteMultipleSheetColumn($fileName,$col_name);
            
            //$data['lists_data'] = $this->post_model->getEditSheetData($post_record->list_upload);
            $dataset = $this->post_model->getEditSheetData($fileName);
            
            
            
            if(file_exists('upload/lists/'.$fileName)){
                unlink('upload/lists/'.$fileName);
            }
            
            $this->post_model->newXlsx($dataset,$fileName);
            
            $data['lists_data'] = $this->post_model->freshXlsx($fileName);
            
            //print_r($data['lists_data']);die('QAZSWX');
            
            $this->load->view('post/remove_tablecol',$data);
        }
    }
    
    public function addpostremove_tablecol(){
        if($this->input->post()){
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $col_name = $this->input->post('col_name');
            //$data['file_xlsx'] = $file_xlsx = trim($this->input->post('file_xlsx'));
            $data['file_xlsx'] = $file_xlsx = $user_id.'.xlsx';
            $this->load->model('post_model');
            
            $this->post_model->deleteMultipleSheetColumn($file_xlsx,$col_name);
            
            $data['lists_data'] = $this->post_model->getEditSheetData($file_xlsx);
            //print_r($data['lists_data']);die('QAZSWX');
            
            $this->load->view('post/upload_xlsx',$data);
        }
    }
    
    public function upload_xlsx(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model('post_model');
        
        $allowed =  array('xlsx','xls' ,'csv');
        $filename = $_FILES['file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed) ) {
            $newfile = $user_id.".xlsx";
            $src = $_FILES['file']['tmp_name'];
            $targ = "upload/lists/".$newfile;
            move_uploaded_file($src, $targ);

            //$data['lists_data'] = $this->post_model->getEditSheetData($newfile);

            $dataset = $this->post_model->getEditSheetData($newfile);

            if(file_exists('upload/lists/'.$newfile)){
                unlink('upload/lists/'.$newfile);
            }

            $this->post_model->newXlsx($dataset,$newfile);

            $data['lists_data'] = $this->post_model->freshXlsx($newfile);


            $data['file_xlsx'] = $newfile;
            $this->load->view('post/upload_xlsx',$data);
        }
        
    }
    
    public function uploadimg_fromtext(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        if($this->input->post()){
            $allowed =  array('jpg','jpeg','png');
            $newfile = $_FILES['upload']['name'];
            $ext = pathinfo($newfile, PATHINFO_EXTENSION);
            //print_r($ext);die;
            if(in_array(strtolower($ext),$allowed) ) {
                $src = $_FILES['upload']['tmp_name'];
                $targ = "upload/text/".$newfile;
                move_uploaded_file($src, $targ);
                echo'{"fileName":"'.$newfile.'","uploaded":1,"url":"'.base_url().'\/upload\/text\/'.$newfile.'"}';
                
            }else{
                echo'{"fileName":"","uploaded":1,"url":""}';
            }
        }
        
    }
    
    public function get_userscown(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        $select_users = $this->common_model->getAllUsersBasicInfo(array($user_id));
        //print_r($select_users);die;
        $usr_str = '';
        if(!empty($select_users)){
            foreach ($select_users as $udata) {
                $usr_str .= '<li id="cowner'.$udata->user_id.'"><a href="javascript:;" style="pointer-events: none;">'.$udata->first_name.' '.$udata->last_name.'</a></li>';
            }
            
        }
        echo $usr_str;
        
    }
    
    public function get_usersvisib(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        $select_users = $this->common_model->getAllUsersBasicInfo(array($user_id));
        //print_r($select_users);die;
        $usr_str = '';
        if(!empty($select_users)){
            foreach ($select_users as $udata) {
                $usr_str .= '<li id="visib'.$udata->user_id.'"><a href="javascript:;" style="pointer-events: none;">'.$udata->first_name.' '.$udata->last_name.'</a></li>';
            }
            
        }
        echo $usr_str;
        
    }
    
    public function refresh_label(){
        echo nestedLables();
    }
    
    public function addtimestatus_editpost(){
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $this->load->model('post_model');
        if($this->input->post()){
            $post_id = $this->input->post('post_id');
            
            $update_post_array = array('editpost_user'=>$user_id,'editpost_time'=>time());
            $where_post_array = array('post_id'=>$post_id,'company_id'=>$company_id);
            $up = $this->post_model->updatePostInfo($update_post_array,$where_post_array);
            if($up){
                echo 'true';
            }
        }
    }
    
}