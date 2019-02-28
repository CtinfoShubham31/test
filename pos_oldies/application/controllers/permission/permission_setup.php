<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Permission_setup extends MY_Controller {
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
    
    public function manage_permission(){
        $this->layout->title('Permission');  /*----Tab Title------*/
        
        $this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/custom/permission.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('permission_model','company_model'));
        
        $data['permission_lists'] = $this->permission_model->getPermissionUsingCompanyId($company_id);
        //print_r($data['permission_lists']);die('ZZAA');
        
        $data['id_permission'] = $this->input->post('id_permission');
        
        if($this->input->post()){    
            $this->form_validation->set_rules('permission_name','Permission name','required|max_length[50]|xss_clean|trim');
            
            if($this->form_validation->run() == FALSE){
                $this->layout->view('permission/manage_permission',$data);
            }
            else{
            
                $permission_data = array(
                    'company_id'=>$company_id,
                    'permission_name'=>trim($this->input->post('permission_name')),
                    'emp_add'=>($this->input->post('employee_add'))=='on'?1:0,
                    'emp_edit'=>($this->input->post('employee_edit'))=='on'?1:0,
                    'emp_delete'=> ($this->input->post('employee_delete'))=='on'?1:0,
                    'inv_add'=>($this->input->post('inventory_add'))=='on'?1:0,
                    'inv_edit'=> ($this->input->post('inventory_edit'))=='on'?1:0,
                    'inv_delete'=>($this->input->post('inventory_delete'))=='on'?1:0
                );
                
                $perm_record = $this->permission_model->getPermissionUsingPermissionIdCompanyId($this->input->post('id_permission'),$company_id);
                
                if(!empty($data['id_permission']) && !empty($perm_record)){
                    $this->session->set_flashdata('success_msg', 'Permission updated successfully.');
                    $this->permission_model->updatePermission($permission_data,$this->input->post('id_permission'),$company_id);
                }
                else{
                    $this->session->set_flashdata('success_msg', 'Permission added successfully.');
                    $this->permission_model->addPermission($permission_data);
                }
                
                redirect($this->config->base_url().'permission/permission_setup/manage_permission');
            }
            
            //print_r($permission_data);die('szzzzz');
            
        }
        else{
            $this->layout->view('permission/manage_permission',$data);
        }
        
    }
    
    
    public function edit_permission(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('perm_id') && $company_id){
            
            $this->load->model('permission_model');
            
            $errors = array();
            $data = array();
            $permission_id = trim($this->input->post('perm_id'));

            if (empty($permission_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($permission_id)){
                $permission_data = $this->permission_model->getPermissionUsingPermissionIdCompanyId($permission_id,$company_id);
                if(empty($permission_data)){
                    $errors['wrong'] = 'False';
                }
            }
            

            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['permission_data'] = $this->permission_model->getPermissionUsingPermissionIdCompanyId($permission_id,$company_id);  //Get single permission data
                echo json_encode($data);
            }
            
        }
    }
    
    
    public function deletepopup_permission(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('perm_id') && $company_id){
            
            $this->load->model('permission_model');
            
            $errors = array();
            $data = array();
            $perm_id = $data['perm_id'] = trim($this->input->post('perm_id'));

            if (empty($perm_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($perm_id)){
                $permission_data = $this->permission_model->getPermissionUsingPermissionIdCompanyId($perm_id,$company_id);
                if(empty($permission_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $this->load->view('permission/deletepopup_permission',$data);
                
            }
            
            
        }
    }
    
    
    public function delete_permission(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('permission_id') && $company_id){
            
            $this->load->model('permission_model');
            
            $errors = array();
            $data = array();
            $permission_id = $data['permission_id'] = trim($this->input->post('permission_id'));

            if (empty($permission_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($permission_id)){
                $permission_data = $this->permission_model->getPermissionUsingPermissionIdCompanyId($permission_id,$company_id);
                if(empty($permission_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else {
                $data['error']='';
                $data['success']='';
                $this->permission_model->deletePermission($permission_id,$company_id);
                $data['success']='<p> <strong>Delete permission successfully.</p> </strong>';
                echo json_encode($data);
            }
            
            
        }
    }
    
    
}