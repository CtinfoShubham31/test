<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Device_setup extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','checklogin'));
        $this->output->nocache();
        if(isCompanySetupLogin() == 1) { 
            redirect($this->config->base_url().'home/homepage/logout');
        }
        elseif (isCompanySetupLogin() == 2) {
            redirect($this->config->base_url().'company/companypage/add_company');
        }
        
    }
    
    public function manage_device(){
        $this->layout->title('Device');  /*----Tab Title------*/
        
        $this->layout->css('css/chosen.css');
        $this->layout->js('js/chosen.jquery.js'); 
        $this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/custom/device.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('device_model','company_model'));
        
        $data['device_type'] = $this->device_model->getDeviceType();
        
        $data['device_usage'] = $this->device_model->getDeviceUsage();
        
        $data['get_location'] = $this->company_model->getLocationUsingCompanyId($company_id);
        
        $data['display_device'] = $this->device_model->displayDeviceDetails($company_id);
        
        $data['id_device'] = $this->input->post('id_device');
        
        if($this->input->post()){            
            $this->form_validation->set_rules('device_name','Device name','required|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('device_type','Device type','required');

            $this->form_validation->set_rules('device_unique_id','Device unique id','required');
            $this->form_validation->set_rules('select_location','Select location','required');
            if($this->form_validation->run() == FALSE){ 
                $this->layout->view('device/manage_device',$data);
            }
            else{
                $device_usage = $this->input->post('device_usage');
                $device_communicate_with = $this->input->post('device_usage');
                
                if(empty($device_usage)){
                    $device_usage = '';
                }
                if(empty($device_communicate_with)){
                    $device_communicate_with = '';
                }
                
                $device_data = array(
                    'company_id'=>$company_id,
                    'device_name'=>trim($this->input->post('device_name')),
                    'device_type_id'=>trim($this->input->post('device_type')),
                    'device_unique_id'=>trim($this->input->post('device_unique_id')),
                    'device_usage_id'=> trim($this->input->post('device_usage')),
                    //'communicate_id'=> trim($this->input->post('device_communicatewith'))
                );
                
                
                $device_record = $this->device_model->getDeviceUsingDeviceIdCompanyId($this->input->post('id_device'),$company_id);
                
                if(!empty($data['id_device']) && !empty($device_record)){
                    $this->device_model->deleteDeviceLocation($this->input->post('id_device'),$company_id);  //Delete previous location records.
                    //secho $device_id;die('ss');
                    $this->device_model->deleteDeviceCommunicateWith($this->input->post('id_device'),$company_id);
                    
                    $this->device_model->updateDevice($device_data,$this->input->post('id_device'),$company_id);
                    $device_id = $this->input->post('id_device');
                    
                    $this->session->set_flashdata('success_msg', 'Device setup updated successfully.');
                }
                else{
                    $device_id = $this->device_model->addDeviceManagement($device_data);
                    
                    $this->session->set_flashdata('success_msg', 'Device setup added successfully.');
                }
                
                $communicate_data = $this->input->post('device_communicatewith');
                if(!empty($communicate_data)){
                    foreach($communicate_data as $commd){
                        $device_communicate_data = array(
                            'device_id'=>$device_id,
                            'communicate_with_id'=>$commd,
                            'company_id'=>$company_id
                        );

                        $this->device_model->addDeviceCommunicateWith($device_communicate_data);
                    }
                }
                
                $location_id = $this->input->post('select_location');

                if(!empty($location_id)){
                    foreach($location_id as $loc_id){
                        $device_location_data = array(
                            'location_id'=>$loc_id,
                            'device_id'=>$device_id,
                            'company_id'=>$company_id
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
    
    
    public function edit_device(){
        $company_id = $this->session->userdata('pos_companyid');
        $device_id = $this->input->post('device_id');
        $this->load->model(array('device_model'));
        $dvdata = $this->device_model->getDeviceUsingDeviceIdCompanyId($device_id,$company_id);
        
        if($this->input->post('device_id') && $company_id){
            
            $this->load->model('device_model');
            
            $errors = array();
            $data = array();
            $device_id = trim($this->input->post('device_id'));

            if (empty($device_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($device_id)){
                $device_data = $this->device_model->getDeviceUsingDeviceIdCompanyId($device_id,$company_id);
                if(empty($device_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['device_data'] = $this->device_model->getDeviceUsingDeviceIdCompanyId($device_id,$company_id);  //Get single permission data
                
                $data['device_data']->loc_id = explode(',',$data['device_data']->loc_id);
                
                $device_type_id = $data['device_data']->device_type_id;
                $device_usage_id = $data['device_data']->device_usage_id;
                $communicate_id = $data['device_data']->communicate_id;
                
                if($data['device_data']->device_type_id == 3){
                    $data['device_data']->device_usage = $this->device_model->getDeviceUsage();

                }else if($data['device_data']->device_type_id == 1 || $data['device_data']->device_type_id == 2){

                    $communicate_with = $this->device_model->getEditTimeDeviceData($company_id,$device_id);
                    $data['device_data']->device_usage = $communicate_with;
                    $communicate = $this->device_model->getDeviceCommunicateWith($company_id,$device_id);
                    $data['device_data']->device_set = explode(',',$communicate->device_ids);
                       

                }
                
                
                echo json_encode($data);
            }
            
        }
    }


    public function get_device_usage(){
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('device_model'));
        
        if($this->input->post('dev_type') == 3){
            $data['device_usage'] = $this->device_model->getDeviceUsage();
            
            $this->load->view('device/get_device_usage',$data);
        }else if($this->input->post('dev_type') == 1 || $this->input->post('dev_type') == 2){
           
            $data['device_communicate'] = $this->device_model->getDeviceDataUsingCompanyId($company_id); //For management and user
            if(!empty($data['device_communicate'])){
                $this->load->view('device/get_device_communicatewith',$data);
            }

            
        }
    }
    
    
    public function deletepopup_device(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('device_id') && $company_id){
            
            $this->load->model('device_model');
            
            $errors = array();
            $data = array();
            $device_id = $data['device_id'] = trim($this->input->post('device_id'));

            if (empty($device_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($perm_id)){
                $device_data = $this->device_model->getDeviceUsingDeviceIdCompanyId($device_id,$company_id);
                if(empty($device_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $this->load->view('device/deletepopup_device',$data);
                
            }
            
            
        }
    }
    
    
    public function delete_device(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('device_id') && $company_id){
            
            $this->load->model('device_model');
            
            $errors = array();
            $data = array();
            $device_id = $data['device_id'] = trim($this->input->post('device_id'));

            if (empty($device_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($device_id)){
                $device_data = $this->device_model->getDeviceUsingDeviceIdCompanyId($device_id,$company_id);
                if(empty($device_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else {
                $data['error']='';
                $data['success']='';
                
                $this->device_model->deleteDevice($device_id,$company_id);
                $this->device_model->deleteDeviceLocation($device_id,$company_id);
                
                $data['success']='<p> <strong>Delete device successfully.</p> </strong>';
                echo json_encode($data);
            }
            
            
        }
    }
    
    
}