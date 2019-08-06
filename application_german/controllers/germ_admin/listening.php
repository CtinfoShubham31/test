<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Listening extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));  // load library classes
        $this->load->helper(array('form', 'url', 'file','checkadminlogin'));  
        $this->load->model(array('admin_model'));
        $this->data['basepath'] = $this->config->item('base_url'); //assigning base path
        //$this->output->nocache();
        if (!isAdminLoginCheck()) { 
            redirect($this->config->item('base_url') . 'germ_admin/admin/logout');
        }
    }
    
    /*
     * Add listening data.
     */
    public function add_listeningdata() {
        if($this->input->post()){
            //echo $_FILES["listening_video"]["name"];
            $this->form_validation->set_rules('days','Days','required|trim');
            $this->form_validation->set_rules('parts','Parts','required|trim');
            $this->form_validation->set_rules('listening_voice','Listening Voice','required|trim');
            $this->form_validation->set_rules('listening_text','German Text','required|trim');
            $this->form_validation->set_rules('english_text','English Text','required|trim');
            $this->form_validation->set_rules('spanish_text','Spanish Text','required|trim');
            if (empty($_FILES['listening_video']['name']))
            {
                $this->form_validation->set_rules('listening_video', 'Listening Video', 'required');
            }
            //$this->form_validation->set_rules('listening_video','Challenge Name','required|trim');
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('germ_admin/add_listeningdata');
            }
            else{
                $days = trim($this->input->post('days'));
                $parts = trim($this->input->post('parts'));
                
                if($this->input->post('days') == 31 && $this->input->post('parts') > 2){
                    $this->session->set_flashdata('error_msg', 'The day '.$days.', parts not available more than 2 '); 
                    redirect($this->config->base_url().'germ_admin/listening/add_listeningdata','refresh');
                }
                
                $records = $this->admin_model->getListening($days,$parts);
                if(!empty($records)){
                    $this->session->set_flashdata('error_msg', 'The day '.$days.' of parts '.$parts.' entry already added'); 
                    redirect($this->config->base_url().'germ_admin/listening/add_listeningdata','refresh');
                }
                
                if(!empty($_FILES["listening_video"]["name"])){
                    //print_r($_FILES["listening_video"]["name"]);die('sssss');
                    $config['upload_path'] = 'upload/learning'; // check path is correct
                    $config['max_size'] = '5120';
                    $config['allowed_types'] = 'mp3'; // add video extenstion on here
                    //$config['overwrite'] = FALSE;
                    $config['remove_spaces'] = TRUE;
                    //$config['file_name'] = time().'_listen.'.pathinfo($_FILES["listening_video"]["name"], PATHINFO_EXTENSION);
                    $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["listening_video"]["name"]);
                    //$config['file_name'] = time().'_listen.'.pathinfo($_FILES["listening_video"]["name"], PATHINFO_EXTENSION);
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('listening_video')) // form input field attribute
                    {
                        $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                        redirect($this->config->item('base_url') . 'germ_admin/listening/add_listeningdata');
                    }else{
                        
                        $add_data = array(
                            'days' => $days,
                            'listening_video' => $config['file_name'],
                            'parts' => $parts,
                            'listening_voice' => trim($this->input->post('listening_voice')),
                            'listening_text' => trim($this->input->post('listening_text')),
                            'english_text' => trim($this->input->post('english_text')),
                            'spanish_text' => trim($this->input->post('spanish_text'))
                        );
                        //print_r($add_data);die('SSSS');
                        $this->admin_model->addListening($add_data);
                        
                        $this->session->set_flashdata('success_msg', 'Add data successfully'); //Upload Failed
                        redirect($this->config->base_url().'germ_admin/listening/listening_lists','refresh');
                    }

                }
                //print_r($_POST);die('SAZ');
            }
            
            
        }
        else{
            $this->load->view('germ_admin/add_listeningdata');	
        }
    }
    
    
    
    /*-----Load all users row------*/
    public function listening_lists() {
        $this->load->view('germ_admin/listening_lists');
    }
    
    /*----Fetch all users data using ajax -----*/
    public function ajax_listeninglists(){
        $listening_records =  $this->admin_model->getListening();
        if(!empty($listening_records)){
            $total_count =  count($listening_records);
        }else{
            $total_count =  0;
        }
        $this->admin_model->getListeningListsResponse($total_count);
    }
    
    
    /*
     * Admin dashboard will upload here.
     */
    public function edit_listeningdata() {
        $listening_dataid = base64_decode($this->uri->segment(4));
        
        $data['edit_data'] = $this->admin_model->getListeningDataUsingId($listening_dataid);
        
        if($this->input->post()){
            $this->form_validation->set_rules('listening_voice','Listening Voice','required|trim');
            $this->form_validation->set_rules('listening_text','German Text','required|trim');
            $this->form_validation->set_rules('english_text','English Text','required|trim');
            $this->form_validation->set_rules('spanish_text','Spanish Text','required|trim');
//            if (empty($_FILES['listening_video']['name']))
//            {
//                $this->form_validation->set_rules('listening_video', 'Listening Video', 'required');
//            }
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('germ_admin/edit_listeningdata',$data);
            }
            else{
                if(!empty($_FILES["listening_video"]["name"])){
                
                    $config['upload_path'] = 'upload/learning'; // check path is correct
                    $config['max_size'] = '5120';
                    $config['allowed_types'] = 'mp3'; // add video extenstion on here
                    $config['overwrite'] = FALSE;
                    $config['remove_spaces'] = TRUE;
                    //$config['file_name'] = time().'_listen.'.pathinfo($_FILES["listening_video"]["name"], PATHINFO_EXTENSION);
                    $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["listening_video"]["name"]);
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('listening_video')) // form input field attribute
                    {
                        $this->session->set_flashdata('error_msg', $this->upload->display_errors()); //Upload Failed
                        redirect($this->config->item('base_url') . 'germ_admin/listening/edit_listeningdata/'.base64_encode($listening_dataid));
                    }else{
                        $update_data = array(
                            'listening_video' => $config['file_name'],
                            'listening_voice' => trim($this->input->post('listening_voice')),
                            'listening_text' => trim($this->input->post('listening_text')),
                            'english_text' => trim($this->input->post('english_text')),
                            'spanish_text' => trim($this->input->post('spanish_text'))
                        );
                        //print_r($add_data);die('SSSS');
                        $this->admin_model->updateListening($listening_dataid,$update_data);
                        
                        $this->session->set_flashdata('success_msg', 'Update data successfully'); //Upload Failed
                        redirect($this->config->base_url().'germ_admin/listening/listening_lists','refresh');
                    }

                }else{
                    $update_data = array(
                        'listening_voice' => trim($this->input->post('listening_voice')),
                        'listening_text' => trim($this->input->post('listening_text')),
                        'english_text' => trim($this->input->post('english_text')),
                        'spanish_text' => trim($this->input->post('spanish_text'))
                    );
                   
                    $this->admin_model->updateListening($listening_dataid,$update_data);
                    
                    $this->session->set_flashdata('success_msg', 'Update data successfully'); //Upload Failed
                    redirect($this->config->base_url().'germ_admin/listening/listening_lists','refresh');
                }
            }
        }else{
            $this->load->view('germ_admin/edit_listeningdata',$data);
        }
    }
    
}