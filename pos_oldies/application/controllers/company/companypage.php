<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Companypage extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','checklogin'));
        $this->output->nocache();
        if(!isAdminLogin()) { 
            redirect($this->config->base_url().'home/homepage/logout');
        }
        
    }
    
    public function add_company(){
        $this->layout->title('Company');  /*----Tab Title------*/
        $this->layout->css('css/droparea.css');
        $this->layout->css('css/bootstrap-toggle.min.css');
        $this->layout->css('css/jquery-ui.css');
        
        $this->layout->js('js/bootstrap-toggle.min.js');
        $this->layout->js('js/droparea.js');
        $this->layout->js('js/bootstrap-pincode-input.js');
        $this->layout->js('js/jquery-ui.min.js');
        $this->layout->js('js/jquery.validate.js');
        //$this->layout->js('js/additional-methods.min.js');
        $this->layout->js('js/custom/company.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        
        $this->load->model(array('common_model','company_model','employee_model'));
        
        if($this->session->userdata('pos_companyid')){
            $company_id = $this->session->userdata('pos_companyid');
            $data['company_data'] = $this->company_model->getCompanyUsingCompanyId($company_id,$admin_id);
        }
        
        $getemail = $this->common_model->getAdminDataUsingId($admin_id);
        $data['email'] = $getemail->email;
        
        $data['timezones'] = $this->common_model->getTimeZone();
        
        if($this->input->post()){           // print_r($_POST);die;
            $this->form_validation->set_rules('company_name','Company name','required|max_length[80]|xss_clean|trim');
            $this->form_validation->set_rules('select_country','Country', 'required|trim');
            $this->form_validation->set_rules('select_state','State','required|trim');
            $this->form_validation->set_rules('select_city','City', 'required|trim');
            $this->form_validation->set_rules('contact_number','Contact number','required|min_length[10]|max_length[10]|xss_clean|trim|callback_numeric_wcomma');
            $this->form_validation->set_rules('postal_code','Postal code', 'required|trim|callback_alphanumeric');
            $this->form_validation->set_rules('address','Address','required|trim');
            $this->form_validation->set_rules('timezone','Timezone', 'required|trim');
            $this->form_validation->set_rules('select_currency','Currency','required|trim');
            $this->form_validation->set_rules('pan_number','Pan number', 'xss_clean|trim');
            $this->form_validation->set_rules('booking','booking', 'xss_clean|trim');
            $this->form_validation->set_rules('tin_number','Tin number', 'xss_clean|trim');
            $this->form_validation->set_rules('multiple_location','Multiple location', 'xss_clean|trim');
            $this->form_validation->set_rules('pin_number','Pin number', 'required|min_length[4]|max_length[4]|xss_clean|trim|callback_numeric_wcomma');  
            //if(empty($data['company_data']->image_logo)){                die('bbb');
            if (empty($_FILES['image']['name']) && empty($data['company_data']))
            {
                $this->form_validation->set_rules('image', 'Company logo', 'required');
            }
            
            if($this->form_validation->run() == FALSE){
                $this->layout->view('company/companypage',$data);
            }
            else{
                
                $file_name = (!empty($data['company_data']->image_logo))?$data['company_data']->image_logo:'';
                if($_FILES['image']['size']!=0){                    //print_r($_FILES['image']);die('qqqq');
                    $config['upload_path'] = './upload/company_logos/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '1025'; 
                    $config['max_width'] = '1025'; 
                    $config['max_height'] = '1025';
                    $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["image"]["name"]);

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image'))
                    {
                        //$this->form_validation->set_message('_do_upload', $this->upload->display_errors());
                        $data['error_image'] = $this->upload->display_errors();
                        //print_r($data['error_image']);die('SSSSS');
                        $this->layout->view('company/companypage',$data);
                        return FALSE;
                    }
                    else
                    {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                        $file_name = $config['file_name'];
                    }
                }
                
                if($this->input->post('booking') == 'on'){
                    $booking = 1;
                }else{
                    $booking = 0;
                }
                
                if($this->input->post('multiple_location') == 'on'){
                    $multiple_location = 1;
                }else{
                    $multiple_location = 0;
                }
                
                $add_company = array(
                    'admin_id'=>$admin_id,
                    'name'=>trim($this->input->post('company_name')),
                    'email'=>$data['email'],
                    'country'=>trim($this->input->post('select_country')),
                    'state'=>trim($this->input->post('select_state')),
                    'city'=>trim($this->input->post('select_city')),
                    'address'=>trim($this->input->post('address')),
                    'timezone'=>trim($this->input->post('timezone')),
                    'postal_code'=>trim($this->input->post('postal_code')),
                    'contact_number'=>trim($this->input->post('contact_number')),
                    'currency'=>trim($this->input->post('select_currency')),
                    'tin_no'=>trim($this->input->post('tin_number')),
                    'pan_no'=>trim($this->input->post('pan_number')),
                    'image_logo'=>$file_name,
                    'booking'=>$booking,
                    'multiple_location'=>$multiple_location,
                    'created_date'=>date("Y-m-d H:i:s"),
                    'pin_no'=>trim($this->input->post('pin_number'))
                );
                
                if($this->session->userdata('pos_companyid')){
                    $this->session->set_flashdata('success_msg', 'Company updated successfully.');
                    $this->company_model->updateCompany($add_company,$admin_id,$company_id); //Update company
                    
                    redirect($this->config->base_url().'company/companypage/add_company');
                }else{
                    $this->session->set_flashdata('success_msg', 'Company added successfully.');
                    
                    $company_id = $this->company_model->addCompany($add_company);         //Add new company
                    
                    $sess_data = array(
                        'pos_companyid' => $company_id,
                    );
                    $this->session->set_userdata($sess_data);
                    
                    $add_location = array(
                        'location_name'=>'Default',
                        'company_id'=>$company_id,
                        'country'=>trim($this->input->post('select_country')),
                        'state'=>trim($this->input->post('select_state')),
                        'city'=>trim($this->input->post('select_city')),
                        'address'=>trim($this->input->post('address')),
                        'timezone'=>trim($this->input->post('timezone')),
                        'postal_code'=>trim($this->input->post('postal_code')),
                        'contact_number'=>trim($this->input->post('contact_number')),
                        'created_date'=>date("Y-m-d H:i:s")
                    );
                    $location_id = $this->company_model->addLocation($add_location);
                    
                    $employee_data = array(
                        'company_id'=>$company_id,
                        'employee_name'=>'Admin',
                        'emp_contact'=>trim($this->input->post('contact_number')),
                        'emp_email'=>$data['email'],
                        'emp_password'=>trim($this->input->post('pin_number')),
                        'emp_address'=>trim($this->input->post('address')),
                        'location_id'=>$location_id
                    );
                    
                    $this->employee_model->addEmployee($employee_data);
                    
                    $this->company_model->addDefaultEntryOfPermission($company_id);   //Add default entry of permission(sales and top manager)
                    
                    if($multiple_location == 1){
                        redirect($this->config->base_url().'location/locationpage/manage_location');
                    }else{
                        redirect($this->config->base_url().'discount/discount_setup/manage_discount');
                    }
                    
                }
                
            }
        }else{
        
            $this->layout->view('company/companypage',$data);
        }
    }
    
    public function numeric_wcomma ($str)
    {
        if (preg_match('/[^0-9]/', $str))
        {
            $this->form_validation->set_message('numeric_wcomma', 'Please enter only digit.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
        //return preg_match('/^[0-9]+$/', $str);
    }
    
    public function alphanumeric($str)
    {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $str))
        {
            $this->form_validation->set_message('alphanumeric', 'Special Characters not permitted.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
        //return preg_match('/^[0-9]+$/', $str);
    }
    
    
    public function get_country(){
        //$term = strtolower(Input::get('term'));
        $term = trim($_GET['term']);
        $url = "http://maps.googleapis.com/maps/api/geocode/json?components=country:$term";
        $result = file_get_contents($url);
        //print_r($result);die('WWW');
        $json = json_decode($result);
        
        $return_array = array();
        
        foreach ($json->results as $result) {
            foreach($result->address_components as $addressPart) {
                if((in_array('country', $addressPart->types)) && (in_array('political', $addressPart->types))){
                    //echo $country = $addressPart->long_name;
                    $return_array[] = array('value' => $addressPart->long_name, 'id' =>$addressPart->long_name);
                } 
            }
        }
        echo json_encode($return_array);
        //return json_encode($return_array);
    }
    
    
    public function get_state(){
        $term = trim($_GET['term']);
        $country = urlencode(strtolower(trim($_GET['country'])));
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$term&components=country:$country|administrative_area:$term";
        $result = file_get_contents("$url");
        //print_r($result);die('WWW');
        $json = json_decode($result);
        
        $return_array = array();
        
        foreach ($json->results as $result) {
            foreach($result->address_components as $addressPart) {
                if((in_array('administrative_area_level_1', $addressPart->types)) && (in_array('political', $addressPart->types))){
                    //echo $country = $addressPart->long_name;
                    $return_array[] = array('value' => $addressPart->long_name, 'id' =>$addressPart->long_name);
                } 
            }
        }
        
        echo json_encode($return_array);
    }
    
    
    public function get_city(){
        $term = trim($_GET['term']);
        $country = urlencode(strtolower(trim($_GET['country'])));
        $state = urlencode(strtolower(trim($_GET['state'])));
        //$url = "http://maps.googleapis.com/maps/api/geocode/json?address=indore&amp;components=country:indore|administrative_area:madhya%20pradesh";
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$term&components=country:$country|administrative_area:$state";
        $result = file_get_contents($url);
        //print_r($result);die('WWW');
        $json = json_decode($result);
        
        $return_array = array();
        
        foreach ($json->results as $result) {
            foreach($result->address_components as $addressPart) {
                if((in_array('locality', $addressPart->types)) && (in_array('political', $addressPart->types))){
                    //echo $country = $addressPart->long_name;
                    $return_array[] = array('value' => $addressPart->long_name, 'id' =>$addressPart->long_name);
                } 
            }
        }
        
        echo json_encode($return_array);
    }
    
    public function syncgiddh_popup(){
        $giddh_info = $this->common_model->getGiddhCompanyInfo($this->session->userdata('pos_companyid'));
        if(empty($giddh_info->giddh_auth_key) && empty($giddh_info->giddh_comp_unique_name)){
            $this->load->view('company/syncgiddh_popup');
        }
    }
    
    
    public function syncgiddh(){
        $errors = array();
        $data = array();
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model('company_model');
        
        $company_exists = $this->company_model->getCompanyUsingCompanyId($company_id);
        if($company_id && !empty($company_exists)){
            $giddh_comp_unique_name = trim($_POST['giddh_comp_unique_name']);

            $giddh_auth_key = trim($_POST['giddh_auth_key']);

            if (empty($giddh_comp_unique_name)){
                $errors['cunique_name'] = 'Company unique name is required.';
            }else if(empty($giddh_auth_key)){
                $errors['authk'] = 'Authentication key is required.';
            }

            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['errors']  = '';

                $add_giddh = array(
                    'giddh_auth_key'=>$giddh_auth_key,
                    'giddh_comp_unique_name'=>$giddh_comp_unique_name
                );

                $this->company_model->addGiddhSync($company_id,$add_giddh); //Update query to add giddh credential in company
                $data['success'] = 'done';
                echo json_encode($data);
                
                $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                    
                    $post_data = array("name" => "Employees","uniqueName"=>"employees","parentGroupUniqueName"=>"currentliabilities"); 
                    
                    $ch1 = curl_init();
                    $headers = array(
                        "cache-control: no-cache",
                        "content-type: application/json",
                        "auth-key:".$get_giddh_data->giddh_auth_key.""
                    );

                    $this->load->library('extra_lib');
                    $basepath = $this->extra_lib->external_url();
                    
                    //$url = "https://api.giddh.com/company/".$get_giddh_data->giddh_comp_unique_name."/groups";
                    $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/groups";
                    //$url = "https://apitest.giddh.com/company/".$get_giddh_data->giddh_comp_unique_name."/groups";
                    curl_setopt($ch1, CURLOPT_URL,  $url);
                    curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch1, CURLOPT_HEADER, 0);
                    $body = json_encode($post_data);

                    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST"); 
                    curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
                    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

                    $result_push = curl_exec($ch1);  
                    curl_close ($ch1);
                    //print_r($result_push);
                }
                
                
                
                
            }
        }
        
    }
}