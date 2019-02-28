<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Device_setup extends MY_Controller {
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
    
    public function manage_device(){
        $this->layout->title('Device');  /*----Tab Title------*/
        
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/chosen.jquery.js'); 
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('device_model','company_model'));
        
        $data['device_type'] = $this->device_model->getDeviceType();
        
        $data['device_usage'] = $this->device_model->getDeviceUsage();
        
        $data['get_location'] = $this->company_model->getLocationUsingCompanyId($company_id);
        
        $data['display_device'] = $this->device_model->displayDeviceDetails($company_id);
        
        if($this->input->post()){
            $this->form_validation->set_rules('device_name','Device name','required|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('device_type','Device type','required');
            $this->form_validation->set_rules('device_usage','Device usage','required');
            $this->form_validation->set_rules('device_unique_id','Device unique id','required');
            $this->form_validation->set_rules('select_location','Select location','required');
            if($this->form_validation->run() == FALSE){
                $this->layout->view('device/manage_device',$data);
            }
            else{
                
                $device_data = array(
                    'company_id'=>$company_id,
                    'device_name'=>trim($this->input->post('device_name')),
                    'device_type_id'=>trim($this->input->post('device_type')),
                    'device_unique_id'=>trim($this->input->post('device_unique_id')),
                    'device_usage_id'=> trim($this->input->post('device_usage')),
                );
                //print_r($discount_data);die('sss');
                $device_id = $this->device_model->addDeviceManagement($device_data);
                
                $location_id = $this->input->post('select_location');
//                if(!empty($this->input->post('location'))){
//                    $location = rtrim(implode(',', $this->input->post('location')),',');
//                }else{
//                    $location = '';
//                }
                if(!empty($location_id)){
                    foreach($location_id as $loc_id){
                        $device_location_data = array(
                            'location_id'=>$loc_id,
                            'device_id'=>$device_id
                        );
                        
                        $this->device_model->addDeviceLocation($device_location_data);
                    }
                }
                
                
                redirect($this->config->base_url().'device/device_setup/manage_device');
            }
        }else{
            $this->layout->view('device/manage_device',$data);
        }
    }
    
    
    public function get_device_usage(){
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('device_model'));
        
        if($this->input->post('dev_type') == 3){
            $data['device_usage'] = $this->device_model->getDeviceUsage();
            //print_r($data['device_usage']);
            $this->load->view('device/get_device_usage',$data);
        }else if($this->input->post('dev_type') == 1 || $this->input->post('dev_type') == 2){
            $inter_ids = '';
            $usage_ids = $this->device_model->getDeviceUsageIdUsingCompanyId($company_id);
            //print_r($usage_ids);
            if(!empty($usage_ids)){
                foreach($usage_ids as $usgid){
                    $inter_ids[] .= $usgid->device_usage_id;
                }
                
                
                $array_interactive_id = $inter_ids;
                //print_r($array_interactive_id);die('Boo');
                $data['device_communicate'] = $this->device_model->getCommunicateWithData($array_interactive_id);
                //print_r($data['device_communicate']);
                $this->load->view('device/get_device_communicatewith',$data);
            }
            
        }
    }
    
    
    
    
}