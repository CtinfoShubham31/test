<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_notification extends MY_Controller {
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
    
    public function all_notification(){
        $this->layout->title('Notification');
        
        $this->load->model('notification_model');
        
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        
        $page = $data['page'] = 1;
        
        $notif_arr = array(''.NOTIFICATION.'.company_id'=>$company_id,''.NOTIFICATION.'.user_id'=>$user_id);
        $data['all_notif'] = $this->notification_model->getNotification($notif_arr,$page);
        
        $this->layout->view('notification/all_notification',$data);
    }
    
    public function ajax_all_notification(){
        
        if($this->input->post()){
            $this->load->model('notification_model');
            //$limit = 6;
            $user_id = $this->session->userdata('kaseidon_user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
        
            $page = $data['page'] = $this->input->post('page');
            $notif_arr = array(''.NOTIFICATION.'.company_id'=>$company_id,''.NOTIFICATION.'.user_id'=>$user_id);
            $data['all_notif'] = $this->notification_model->getNotification($notif_arr,$page);
            //$data['userposts'] = $this->post_model->getPosts('',$page);
            
            $this->load->view('notification/ajax_all_notification',$data);
        }
        
    }
    
    
    public function update_readstatus(){
        if($this->input->post()){
            $user_id = $this->input->post('user_id');
            $company_id = $this->session->userdata('kaseidon_company_id');
            
            $this->load->model('notification_model');
            $update_notif = array('read_status'=>0);
            $wh_notif_arr = array('company_id'=>$company_id,'user_id'=>$user_id);
            $up = $this->notification_model->updateNotification($update_notif,$wh_notif_arr);
            if($up){
                echo 'true';
            }else{
                echo 'false';
            }
            
            
        }
    }
    
}