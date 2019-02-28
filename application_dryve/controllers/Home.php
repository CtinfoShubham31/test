<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('web_models/common_model'));
        //$this->output->nocache();
    }
    
    public function index(){
        $this->layout->title('Home');
        
        $this->layout->css('css/bootstrap-datetimepicker.min.css');
        $this->layout->js('js/moment-with-locales.js');
        $this->layout->js('js/bootstrap-datetimepicker.min.js');
        
        $this->layout->view('home/homepage');
    }
    
    public function sign_up(){
        $this->layout->title('Sign Up');
        if($this->session->userdata('dways_user_id')){
            redirect($this->config->base_url().'user/dashboard', 'refresh');
        }
        else{
			 
            $this->load->model(array('web_models/user_model'));
            $this->load->helper(array('mail'));
            
            if($this->input->post()) { 
                $this->form_validation->set_rules('first_name','First Name','required|max_length[20]|trim');
                $this->form_validation->set_rules('last_name','Last Name', 'required|max_length[20]|trim');
                $this->form_validation->set_rules('email','Email', 'required|valid_email|trim|callback_validate_email');
                $this->form_validation->set_rules('password','Password', 'required|min_length[6]|trim');
                $this->form_validation->set_rules('cpassword', 'Confirm Password','required|matches[password]|trim');
                $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');
 
				
                if ($this->form_validation->run() == FALSE) {
                    $this->layout->view('home/sign_up');
                }
                else{
                         
                    $verify_token = hash('sha256', microtime() . "&#3Gq");
                    $email = trim($this->input->post('email'));
                    $first_name = trim(ucwords($this->input->post('first_name')));
                    $last_name= trim(ucwords($this->input->post('last_name')));
                    
                    $register_data = array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'password' => md5(trim($this->input->post('password'))),
                        "verify_token" => $verify_token,
                        "verify_status" => 0,
                        'created_date' => date("Y-m-d H:i:s")
                    );
                    
                    $user_id = $this->user_model->registerUser($register_data);
                    
                    if(!empty($user_id)){
                        $verify_url = base_url() . "user/verify/" . base64_encode($email) . '/' . $verify_token;
                        user_verify_account_mail($email, "Verify your account | Dryveways", $first_name . " " . $last_name, $verify_url);

                        $this->session->set_flashdata('signup_success', 1);
                        $this->load->view('home/signup-message');
                        
                        return;
                    }
                        
                }
            }
            else{ 
                $this->layout->view('home/sign_up');
            }
        }
    }
    
    public function recaptcha($str='')
    {
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6LcAMSQUAAAAANzhvASP-eTNeCIiIPIo9hE2W-mC';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $res = curl_exec($curl);
        curl_close($curl);
        $res= json_decode($res, true);
        //reCaptcha success check
        if($res['success'])
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
            return FALSE;
        }
    }
    
    
    public function validate_email($str) 
    {
        $this->load->model(array('web_models/user_model'));
        
        $check_email = $this->user_model->checkEmailExistance($str);
        if(!empty($check_email)){
            $this->form_validation->set_message("validate_email", 'This email already in use.');
            return FALSE; 
        }
        else{
            return TRUE;
        }
        
    }
    
    public function login(){
        if($this->session->userdata('dways_user_id')){
            redirect($this->config->base_url().'user/dashboard');
            return;
        }else{
            
            $viewdata = array();
            if($this->input->post()){
                
                $this->load->model(array('web_models/user_model'));
                
                $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]|trim');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->layout->view('home/login');
                }
                else{
                    $email = trim($this->input->post('email'));
                    $password = trim($this->input->post('password'));
                    
                    $login_data = array(
                        "email" => $email,
                        "password" => MD5($password)
                    );

                    $res = $this->user_model->check_user_login($login_data);
                    if(!empty($res)){

                        if($res->verify_status==1){
                            
                            $this->session->set_userdata('dways_user_id', $res->user_id);

                            redirect('user/dashboard');
                            return;
                        } else {
                            $viewdata['login_error'] = 2;
                        }

                    } else {
                        $viewdata['login_error'] = 1;
                    }
                }
                
            }
            
            $this->layout->view('home/login',$viewdata);
            
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('home/login');
    }
    
    
    public function signup(){
            
        if($this->session->userdata('DWAYS_USER_ID')){
            redirect('/login');
            return;
        }

        if($this->input->post()){
            $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[45]|trim');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[45]|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email|is_unique[dw_users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]|trim');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');

            $this->form_validation->set_message('is_unique', '{field} already exists.');
            $this->form_validation->set_message('matches', 'Password do not match.');

            if ($this->form_validation->run() !== FALSE) {

                    $data = array(
                        "first_name" => ucwords($this->input->post('first_name')),
                        "last_name" => ucwords($this->input->post('last_name')),
                        "email" => strtolower($this->input->post('email')),
                        "password" => MD5($this->input->post('password')),
                        "verify_token" => hash('sha256', microtime() . "&#3Gq"),
                        "verify_status" => 0
                    );

                    $res = $this->user_model->user_signup($data);
                    if(!empty($res)){
                        $verify_url = base_url() . "user/verify/" . base64_encode($res->email) . '/' . $res->verify_token;
                        user_verify_account_mail($res->email, "Verify your account | Dryveways", $res->first_name . " " . $res->last_name, $verify_url);

                        $this->session->set_flashdata('signup_success', 1);
                        redirect('/signup');
                        return;
                    }
                }
            }

            if($this->session->flashdata('signup_success')){
                $this->load->view('home/signup-message');
                return;
            }

        $this->load->view("home/signup");
    }
    
    public function loginn(){
            
        if($this->session->userdata('DWAYS_USER_ID')){
            redirect('user/dashboard');
            return;
        }

        $viewdata = array();

        if($this->input->post()){
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]|trim');

            if ($this->form_validation->run() !== FALSE) {
                    $data = array(
                        "email" => strtolower($this->input->post('email')),
                        "password" => MD5($this->input->post('password'))
                    );

                    $res = $this->user_model->check_user_login($data);
                    if(!empty($res)){

                        if($res->verify_status==1){
                            $this->session->set_userdata('DWAYS_USER_ID', $res->user_id);
                            $this->session->set_userdata('DWAYS_USER_FNAME', $res->first_name);
                            $this->session->set_userdata('DWAYS_USER_LNAME', $res->last_name);
                            $this->session->set_userdata('DWAYS_USER_EMAIL', $res->email);

                            redirect('user/dashboard');
                            return;
                        } else {
                            $viewdata['login_error'] = 2;
                        }

                    } else {
                        $viewdata['login_error'] = 1;
                    }
                }
            }


        $this->load->view("home/login", $viewdata);
    }
    
    
}