<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //$this->load->model(array('web_models/common_model'));
        $this->load->helper(array('form'));
        $this->output->nocache();
    }
    
    public function index(){
        $this->layout->title('Home');
        $this->load->view('home/login');
    }
    
    
    public function login(){
        //print_r($this->session->all_userdata());
        if($this->session->userdata('kaseidon_user_id')){
            redirect('dashboard/user_dashboard/all_posts');
            return;
        }else{
            $viewdata = array();
            if($this->input->post()){
                
                $this->load->model(array('user_model'));
                
                $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]|trim');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/login');
                    return;
                }
                else{
                    $email = trim($this->input->post('email'));
                    $password = trim($this->input->post('password'));
                    
                    $login_data = array(
                        "email" => $email,
                        "password" => MD5($password)
                    );

                    $res = $this->user_model->check_user_login($login_data);
                    //print_r($res);die;
                    if(!empty($res) && empty($res->login_status)){
                        $viewdata['login_error'] = 2;
                        $this->session->unset_userdata('kaseidon_user_id', $res->user_id);
                        $this->session->unset_userdata('kaseidon_company_id', 1);
                        //redirect('home/login');
                        //return;
                        $viewdata['login_error'] = 2;
                    }
                    else if(!empty($res)){
                        $this->session->set_userdata('kaseidon_user_id', $res->user_id);
                        $this->session->set_userdata('kaseidon_company_id', 1);
                        redirect('dashboard/user_dashboard/all_posts');
                        return;
                    } else {
                        $viewdata['login_error'] = 1;
                    }
                }
                
            }
            
            $this->load->view('home/login',$viewdata);
            
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('home/login');
    }
    
}