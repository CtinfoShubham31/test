<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Gcourse_test extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));  // load library classes
        $this->load->helper(array('form', 'url', 'file','checkadminlogin'));  
        $this->load->model(array('admin_model','gcoursetest_model'));
        $this->data['basepath'] = $this->config->item('base_url'); //assigning base path
        //$this->output->nocache();
        if (!isAdminLoginCheck()) { 
            redirect($this->config->item('base_url') . 'germ_admin/admin/logout');
        }
    }
    
    /*
     * Add course test.
     */
    public function add_coursetest() {
        if($this->input->post()){
            $this->form_validation->set_rules('days','Days','required|trim');
            $this->form_validation->set_rules('question','Question','required|trim');
            $this->form_validation->set_rules('answer','Answer','required|trim');
            $this->form_validation->set_rules('test_level','Test Level','required|trim');
            if (empty($_FILES['question_audio']['name'])){
                $this->form_validation->set_rules('question_audio','Question Audio','required');
            }
            if (empty($_FILES['answer_audio']['name'])){
                $this->form_validation->set_rules('answer_audio','Answer Audio','required');
            }
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('germ_admin/add_coursetest');
            }
            else{
                $this->load->library('upload');
                if (!empty($_FILES['question_audio']['name'])){
                    //print_r($_FILES['question_audio']);
                    //print_r($_FILES['answer_audio']);die('WQWQWQ');
                    $config['upload_path'] = 'upload/audio_test'; // check path is correct
                    $config['max_size'] = '5120';
                    $config['allowed_types'] = 'mp3'; // add video extenstion on here
                    //$config['overwrite'] = FALSE;
                    $config['remove_spaces'] = TRUE;
                    $quiz_audio = $config['file_name'] = time().'quiz'.preg_replace('/\s+/', '', $_FILES["question_audio"]["name"]);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('question_audio')) // form input field attribute
                    {
                        $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                        redirect($this->config->item('base_url') . 'germ_admin/gcourse_test/add_coursetest');
                    }
                    
                }
                if(!empty($_FILES['answer_audio']['name'])){
                    $config['upload_path'] = 'upload/audio_test'; // check path is correct
                    $config['max_size'] = '5120';
                    $config['allowed_types'] = 'mp3'; // add video extenstion on here
                    //$config['overwrite'] = FALSE;
                    $config['remove_spaces'] = TRUE;
                    $ans_audio = $config['file_name'] = time().'ans'.preg_replace('/\s+/', '', $_FILES["answer_audio"]["name"]);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('answer_audio')) // form input field attribute
                    {
                        if(!empty($quiz_audio) && file_exists('upload/audio_test/'.$quiz_audio)){
                            unlink('upload/audio_test/'.$quiz_audio);
                        }
                        $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                        redirect($this->config->item('base_url') . 'germ_admin/gcourse_test/add_coursetest');
                    }
                    
                }
                //die('SSSAAA');
                $days = trim($this->input->post('days'));
                $question = trim($this->input->post('question'));
                $answer = trim($this->input->post('answer'));
                $test_level = trim($this->input->post('test_level'));
                $quiz_counts = $this->gcoursetest_model->checkCountOfQuizAns($days);
//                if(COUNT($quiz_counts)>10){
//                    $this->session->set_flashdata('error_msg', 'You already enter '.COUNT($quiz_counts).' question for day '.$days.' '); 
//                    redirect($this->config->base_url().'germ_admin/gcourse_test/add_coursetest','refresh');
//                }

                $add_data = array(
                    'days' => $days,
                    'question' => $question,
                    'answer' => $answer,
                    'test_level' => $test_level,
                    'question_audio' => $quiz_audio,
                    'answer_audio' => $ans_audio
                );
                //print_r($add_data);die('SSSS');
                $this->gcoursetest_model->addTestQuizAnswer($add_data);

                $this->session->set_flashdata('success_msg', 'Add data successfully'); //Upload Failed
                redirect($this->config->base_url().'germ_admin/gcourse_test/add_coursetest','refresh');
                
            }
            
        }else{
            $this->load->view('germ_admin/add_coursetest');	
        }
    }
    
    
    public function edit_coursetest(){
        $testquiz_id = base64_decode($this->uri->segment(4));
        $data['edit_data'] = $this->gcoursetest_model->getDetailsTestQuizAns($testquiz_id);
        
        if($this->input->post()){ 
            //$this->form_validation->set_rules('days','Days','required|trim');
            $this->form_validation->set_rules('question','Question','required|trim');
            $this->form_validation->set_rules('answer','Answer','required|trim');
            //$this->form_validation->set_rules('test_level','Test Level','required|trim');
            if (empty($data['edit_data']->question_audio) && empty($_FILES['question_audio']['name'])){
                $this->form_validation->set_rules('question_audio','Question Audio','required');
            }
            if (empty($data['edit_data']->answer_audio) && empty($_FILES['answer_audio']['name'])){
                $this->form_validation->set_rules('answer_audio','Answer Audio','required');
            }
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('germ_admin/edit_coursetest',$data);
            }
            else{
                $quiz_audio = $data['edit_data']->question_audio;
                $ans_audio = $data['edit_data']->answer_audio;
                $this->load->library('upload');
                if (!empty($_FILES['question_audio']['name'])){
                    //print_r($_FILES['question_audio']);
                    //print_r($_FILES['answer_audio']);die('WQWQWQ');
                    $config['upload_path'] = 'upload/audio_test'; // check path is correct
                    $config['max_size'] = '5120';
                    $config['allowed_types'] = 'mp3'; // add video extenstion on here
                    //$config['overwrite'] = FALSE;
                    $config['remove_spaces'] = TRUE;
                    $quiz_audio = $config['file_name'] = time().'quiz'.preg_replace('/\s+/', '', $_FILES["question_audio"]["name"]);
                    $this->upload->initialize($config);
                    if(!empty($data['edit_data']->question_audio) && file_exists('upload/audio_test/'.$data['edit_data']->question_audio)){
                        unlink('upload/audio_test/'.$data['edit_data']->question_audio);
                    }
                        
                    if (!$this->upload->do_upload('question_audio')) // form input field attribute
                    {
                        
                        $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                        redirect($this->config->item('base_url') . 'germ_admin/gcourse_test/edit_coursetest/'.base64_encode($testquiz_id));
                    }

                }
                if(!empty($_FILES['answer_audio']['name'])){
                    $config['upload_path'] = 'upload/audio_test'; // check path is correct
                    $config['max_size'] = '5120';
                    $config['allowed_types'] = 'mp3'; // add video extenstion on here
                    //$config['overwrite'] = FALSE;
                    $config['remove_spaces'] = TRUE;
                    $ans_audio = $config['file_name'] = time().'ans'.preg_replace('/\s+/', '', $_FILES["answer_audio"]["name"]);
                    $this->upload->initialize($config);
                    if(!empty($data['edit_data']->answer_audio) && file_exists('upload/audio_test/'.$data['edit_data']->answer_audio)){
                        unlink('upload/audio_test/'.$data['edit_data']->answer_audio);
                    }
                    if (!$this->upload->do_upload('answer_audio')) // form input field attribute
                    {
                        if(!empty($quiz_audio) && file_exists('upload/audio_test/'.$quiz_audio)){
                            unlink('upload/audio_test/'.$quiz_audio);
                        }
                        $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                        redirect($this->config->item('base_url') . 'germ_admin/gcourse_test/edit_coursetest/'.base64_encode($testquiz_id));
                    }

                }
                
                $question = trim($this->input->post('question'));
                $answer = trim($this->input->post('answer'));
                //$test_level = trim($this->input->post('test_level'));
                
                $update_data = array(
                    'question' => $question,
                    'answer' => $answer,
                    'question_audio'=> $quiz_audio,
                    'answer_audio'=> $ans_audio
                );

                $this->gcoursetest_model->updateTestQuizAnswer($testquiz_id,$update_data);

                $this->session->set_flashdata('success_msg', 'Update data successfully'); //Upload Failed
                redirect($this->config->base_url().'germ_admin/gcourse_test/gcourse_testlists','refresh');
            }
        }
        else{
            $this->load->view('germ_admin/edit_coursetest',$data);
        }
        
    }
    
    /*-----Load all german course test lists------*/
    public function gcourse_testlists() {
        $this->load->view('germ_admin/gcourse_testlists');
    }
    
    /*----Fetch all users data using ajax -----*/
    public function ajax_gcoursetestlists(){
        $coursetest_records =  $this->gcoursetest_model->checkCountOfQuizAns();
        if(!empty($coursetest_records)){
            $total_count =  count($coursetest_records);
        }else{
            $total_count =  0;
        }
        $this->gcoursetest_model->getCourseTestListsResponse($total_count);
    }
    
    /*German course history gcourse_historylists*/
    public function add_gcourse_history(){
        if(!empty($_FILES["ghistory_img"]["name"])){
            $_FILES["ghistory_img"]["name"];
            //print_r($_FILES["listening_video"]["name"]);die('sssss');
            $config['upload_path'] = 'upload/ghistory'; // check path is correct
            $config['max_size'] = '5120';
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; // add video extenstion on here
            //$config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            //$config['file_name'] = time().'_listen.'.pathinfo($_FILES["listening_video"]["name"], PATHINFO_EXTENSION);
            $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["ghistory_img"]["name"]);
            //$config['file_name'] = time().'_listen.'.pathinfo($_FILES["listening_video"]["name"], PATHINFO_EXTENSION);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ghistory_img')) // form input field attribute
            {
                $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                redirect($this->config->item('base_url') . 'germ_admin/gcourse_test/add_gcourse_history');
            }else{
                $add_data = array(
                    'gpic' => $config['file_name']
                );
                //print_r($add_data);die('SSSS');
                $this->gcoursetest_model->addGhistory($add_data);

                $this->session->set_flashdata('success_msg', 'Add pic successfully'); //Upload Failed
                redirect($this->config->base_url().'germ_admin/gcourse_test/gcourse_historylists','refresh');
            }

        }else{
            $this->load->view('germ_admin/add_gcourse_history');
        }
        
        
    }
    
    public function edit_gcourse_history(){
        $ghistory_id = $this->uri->segment(4);
        $data['edit_data'] = $this->gcoursetest_model->getGhistoryDetails(base64_decode($ghistory_id));
        if(!empty($_FILES["ghistory_img"]["name"]) && !empty($ghistory_id)){
            $_FILES["ghistory_img"]["name"];
            //print_r($_FILES["listening_video"]["name"]);die('sssss');
            $config['upload_path'] = 'upload/ghistory'; // check path is correct
            $config['max_size'] = '5120';
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; // add video extenstion on here
            //$config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            //$config['file_name'] = time().'_listen.'.pathinfo($_FILES["listening_video"]["name"], PATHINFO_EXTENSION);
            $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["ghistory_img"]["name"]);
            //$config['file_name'] = time().'_listen.'.pathinfo($_FILES["listening_video"]["name"], PATHINFO_EXTENSION);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ghistory_img')) // form input field attribute
            {
                $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                redirect($this->config->item('base_url') . 'germ_admin/gcourse_test/edit_gcourse_history/'.$ghistory_id);
            }else{
                $update_data = array(
                    'gpic' => $config['file_name']
                );
                $ghid = base64_decode($ghistory_id);
                $getdata = $this->gcoursetest_model->getGhistoryDetails($ghid);
                if(!empty($getdata)){
                    unlink("upload/ghistory/".$getdata->gpic);
                    $this->gcoursetest_model->updateGhistory($update_data,$ghid);
                    $this->session->set_flashdata('success_msg', 'Update pic successfully');
                }else{
                    $this->session->set_flashdata('error_msg', '404 Error'); //Upload Failed
                }
              
                redirect($this->config->base_url().'germ_admin/gcourse_test/gcourse_historylists','refresh');
            }

        }else{
            $this->load->view('germ_admin/edit_gcourse_history',$data);
        }
    }
    
    
    /*-----Load all german course test lists------*/
    public function gcourse_historylists() {
        $this->load->view('germ_admin/gcourse_historylists');
    }
    
    /*----Fetch all users data using ajax -----*/
    public function ajax_gcoursehistorylists(){
        $ghistory_records =  $this->gcoursetest_model->checkCountOfGhistory();
        if(!empty($ghistory_records)){
            $total_count =  count($ghistory_records);
        }else{
            $total_count =  0;
        }
        $this->gcoursetest_model->getGhistoryListsResponse($total_count);
    }

    
}