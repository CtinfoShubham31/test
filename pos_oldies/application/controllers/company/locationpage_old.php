<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Locationpage extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','checklogin'));
        //$this->load->model(array('common_model','user_model'));
        if(!isAdminLogin()) { 
            redirect($this->config->base_url().'home/homepage/logout');
        }
        
    }
    
    
    public function location(){ 
        //print_r($this->session->all_userdata());
        $this->layout->title('Company');  /*----Tab Title------*/
        
        $this->layout->css('css/jquery-ui.css');
        
        $this->layout->js('js/jquery-ui.min.js');
        $this->layout->js('js/custom/company.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('common_model','company_model'));
        
        $data['timezones'] = $this->common_model->getTimeZone();
        
        $data['location_lists'] = $this->company_model->getLocationUsingCompanyId($company_id);
        
        $data['id_location'] = $this->input->post('id_location');
        
        if($this->input->post()){
            $this->form_validation->set_rules('location_name','Location name','required|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('select_country','Country', 'required|trim');
            $this->form_validation->set_rules('select_state','State','required|trim');
            $this->form_validation->set_rules('select_city','City', 'required|trim');
            $this->form_validation->set_rules('contact_number','Contact number','required|max_length[10]|xss_clean|trim');
            $this->form_validation->set_rules('postal_code','Postal code', 'required|trim');
            $this->form_validation->set_rules('address','Address','required|trim');
            $this->form_validation->set_rules('timezone','Timezone', 'required|trim');
            
            
            if($this->form_validation->run() == FALSE){
                $this->layout->view('company/location',$data);
            }
            else{
                
                $this->load->model('company_model');
                
                $add_location = array(
                    'location_name'=>trim($this->input->post('location_name')),
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
                
                
                $location_data = $this->company_model->getLocation($this->input->post('id_location'),$company_id);
                
                if(!empty($data['id_location']) && !empty($location_data)){
                    $this->company_model->updateLocation($add_location,$this->input->post('id_location'),$company_id);
                }
                else{
                    $this->company_model->addLocation($add_location);
                }
                
                redirect($this->config->base_url().'company/locationpage/location');
                
            }
        }else{
        
            $this->layout->view('company/location',$data);
        }
    }
    
    
    public function setlocation_data(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post() && $company_id){
            
            $this->load->model('company_model');
            
            $errors = array();
            $data = array();
            $location_id = trim($this->input->post('location_id'));

            if (empty($location_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($location_id)){
                $location_data = $this->company_model->getLocation($location_id,$company_id);
                if(empty($location_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            $session_data = array(
                'pos_locationid' => $location_id,
            );
            $this->session->set_userdata($session_data);

            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['location_data'] = $this->company_model->getLocation($location_id,$company_id);
                echo json_encode($data);
            }
            
        }
    }
    
    
    public function delete_location(){
        
    }
    
}