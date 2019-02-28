<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','common'));
        $this->load->model(array('web_models/common_model'));
        if(!isUserLogin()) { 
            redirect($this->config->base_url().'home/logout');
        }
    }

    //----------------Index page for User-------------------------

    public function index(){
        redirect('user/dashboard');
    }

    //----------------------------Verify account-------------------------------
    public function verify($email=null, $hash=null) {
        $this->load->model(array('web_models/user_model'));

        $validatedata = array(
            "email"=>base64_decode($email),
            "hash"=>$hash
        );

        $this->form_validation->set_data($validatedata);
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email');
        $this->form_validation->set_rules('hash', 'Hash', 'required|exact_length[64]|trim|regex_match[/^[0-9a-z]{64}$/]');
        if ($this->form_validation->run() !== FALSE) {
            $res = $this->user_model->check_verify_account_hash(base64_decode($email), $hash);
            if(!empty($res)){
                $res2 = $this->user_model->update_account_after_verify($res->user_id);
                if($res2){
                    $this->session->set_flashdata('account_verify_success', 1);
                    //echo "<h2>Your account has been verified successfully!</h2>";
                    //return;
                }
            }
        }

        //echo "<h3>Something went wrong! Please try again...</h3>";
        redirect('home/login');
    }
        
    //---------------------------Dashboard-----------------------------
    public function dashboard(){
        $user_id = $this->session->userdata('dways_user_id');
        $data['user_info'] = $this->common_model->getIndividualUserDetails($user_id);
        $this->layout->view("user/dashboard",$data);
    }
        
    public function change_profile(){
        $this->layout->title('Change Profile');
        
        $this->layout->css('css/droparea.css');
        $this->layout->js('js/droparea.js');
        
        $this->layout->view('user/change_profile');
    }
        /*Change user profile pic*/
    public function change_profile1(){
        $this->layout->title('Change Profile');
        
        $this->layout->css('css/droparea.css');
        $this->layout->js('js/droparea.js');
        
        $config['file_name'] = "";
        if(!empty($_FILES["profile_pic"]["name"])){
            $config['upload_path'] = 'uploads/profile_pic';
            $config['allowed_types'] = 'jpeg|jpg|png';
//            $config['max_size'] = '5120';
//            $config['max_width'] = '1025'; 
//            $config['max_height'] = '1025';
            $config['overwrite'] = TRUE;
            
            $filename = $_FILES['profile_pic']['name'];
                    
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $config['file_name'] = time().'_profile.'.$ext;
            
            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('profile_pic'))
            {
                $response['status'] = 0;
                $response['response'] = strip_tags($this->upload->display_errors());
                echo json_encode($response);
                die;
            }
        }
        
        $get_userdata = $this->user_model->getUserDetailsUsingId($user_id);
        //print_r($get_userdata);die('ss');
        //$profile_pic = $get_userdata->profile_pic;
        if(!empty($get_userdata->profile_pic) && file_exists('uploads/profile_pic/'.$get_userdata->profile_pic)){
            unlink('uploads/profile_pic/'.$get_userdata->profile_pic);
        }
        
        $update_data = array(
            'profile_pic' => $config['file_name']
        );
        
        $this->user_model->update_user($user_id, array("profile_pic" => $config['file_name']));
        
        $response['status'] = 1;
        $response['response'] = $config['file_name'];
        echo json_encode($response);
        die;
        
    }
        

        
}