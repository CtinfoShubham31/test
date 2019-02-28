<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tax_setup extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','checklogin'));
        $this->output->nocache();
//        if(!isCompanySetupLogin()) { 
//            redirect($this->config->base_url().'home/homepage/logout');
//        }
        if(isCompanySetupLogin() == 1) { 
            redirect($this->config->base_url().'home/homepage/logout');
        }
        elseif (isCompanySetupLogin() == 2) {
            redirect($this->config->base_url().'company/companypage/add_company');
        }
    
        
    }
    
    
    public function manage_tax(){ //print_r($this->session->all_userdata());
        $this->layout->title('Tax');  /*----Tab Title------*/
        
        $this->layout->css('css/bootstrap-datetimepicker.min.css'); 
        
        $this->layout->js('js/moment-with-locales.js'); 
        $this->layout->js('js/bootstrap-datetimepicker.min.js');  
        $this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/custom/tax.js');  
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        
        $this->load->model(array('company_model','taxdiscount_model'));
        
        $data['tax_lists'] = $this->taxdiscount_model->getTaxUsingCompanyId($company_id);
        
        $this->load->helper(array('common'));
        
        if($this->input->post()){ 
            $this->form_validation->set_rules('tax_name','Tax name','required|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('applicable_from','Applicable from','required|xss_clean|trim');
            $this->form_validation->set_rules('percentage','Percentage','required|max_length[3]|callback_validate_percentage');
            if($this->form_validation->run() == FALSE){
                $this->layout->view('tax/manage_tax',$data);
            }
            else{
                //$d = $this->input->post('applicable_from');
                
                $applicable_from = date("Y-m-d H:i:s",strtotime($this->input->post('applicable_from')));
                
                $tax_data = array(
                    'company_id'=>$company_id,
                    'tax_name'=>trim($this->input->post('tax_name')),
                    //'percentage'=>trim($this->input->post('percentage')),
                    //'applicable_from'=>$applicable_from
                );
                
                  
                $tax_last_id = $this->taxdiscount_model->addTax($tax_data);
                
                $tax_percentage_data = array(
                    'tax_id'=>$tax_last_id,
                    'company_id'=>$company_id,
                    'percentage'=>trim($this->input->post('percentage')),
                    'applicable_from'=>$applicable_from
                );
                
                $this->taxdiscount_model->addTaxPercentage($tax_percentage_data);
                
                $this->session->set_flashdata('success_msg', 'Tax added successfully.');
                redirect($this->config->base_url().'tax/tax_setup/manage_tax');
            }
        }else{
            $this->layout->view('tax/manage_tax',$data);
        }
        
        
    }
    
    
    public function validate_percentage($percentage){
        if (!is_numeric($percentage))
        {
            $this->form_validation->set_message('validate_percentage', 'Entered character is not in numeric form.');
            return FALSE;
        }
    }
    
    
    public function tax_percenatgefrom(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('tax_id') && $company_id){
            $this->load->model('taxdiscount_model');
            $tax_id = $this->input->post('tax_id');
            //$this->taxdiscount_model->getTaxUsingTaxIdCompanyId($tax_id,$company_id);
            
            if (empty($tax_id)){
                return false;
            }else if(!empty($tax_id)){
                $tax_data = $this->taxdiscount_model->getTaxUsingTaxIdCompanyId($tax_id,$company_id);
                if(empty($tax_data)){
                    return false;
                }
            }
            
            //$tax_data = $this->taxdiscount_model->getTaxUsingTaxIdCompanyId($tax_id,$company_id);
            $data['tax_name'] = $tax_data->tax_name;
            
            $data['tax_percentage'] = $this->taxdiscount_model->getTaxPercentageUsingTaxIdCompanyId($tax_id,$company_id);
            
            $this->load->view('tax/tax_percentage_from',$data);
            
        }
    }

    public function edit_taxpopup(){
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post('tax_id')){
            $this->load->model('taxdiscount_model');
            
            $data['tax_id'] = $this->input->post('tax_id');
            
            $tax_exists = $data['tax_exists'] = $this->taxdiscount_model->getTaxUsingTaxIdCompanyId($data['tax_id'],$company_id);
            $data['tax_data'] = $this->taxdiscount_model->getTaxPercentageUsingTaxIdCompanyId($data['tax_id'],$company_id);
            
            if(!empty($data['tax_id']) && !empty($tax_exists) && !empty($data['tax_data'])){
                $data['taxname'] = $tax_exists->tax_name;
                
                //print_r($data['tax_data']);die;
                $this->load->view('tax/edit_taxpopup',$data);
            }
        }
        
    }
    
    public function update_tax(){
        $errors = array();
        $data = array();
        
        $tx_name = trim($_POST['taxname']);
        if (empty($tx_name)){
            $errors['taxname'] = 'Tax name is required.';
        }else if(empty($_POST['percent'])){
            $errors['percent'] = 'Percent is required.';
        }
        
        if (!empty($errors)) {
            $data['errors']  = $errors;
            echo json_encode($data);
        } else { 
            $data['errors']  = '';
            //die('Zx');
            $company_id = $this->session->userdata('pos_companyid');
            $tax_id = $this->input->post('txid');
            
            $this->load->model('taxdiscount_model');
            
            $tax_exists = $this->taxdiscount_model->getTaxUsingTaxIdCompanyId($tax_id,$company_id);
            if(!empty($tax_exists) && $this->input->post()){
                $i=0;
                if(!empty($_POST['percent'])){
                    $this->taxdiscount_model->deleteTaxPercentage($tax_id,$company_id); //Delete old tax percentage

                    foreach ($_POST['percent'] as $tdata) {
                        $txdata = array(
                            'tax_id'=>$tax_id,
                            'company_id'=>$company_id,
                            'percentage'=>$tdata,
                            'applicable_from'=>date("Y-m-d H:i:s",strtotime(trim($_POST['applicable'][$i])))
                        );
                        $this->taxdiscount_model->addTaxPercentage($txdata);    //Add tax name
                        //echo 'p->'.$tdata.' date->'.$_POST['applicable'][$i];
                        $i++;
                    }

                    $updatename = array('tax_name'=>$tx_name);
                    $this->taxdiscount_model->updateTax($updatename,$tax_id,$company_id);   //Update tax name
                }
                
                $data['success'] = 'done';
                echo json_encode($data);
            }
            
            
            
            
        }
        
        
        
    }

    
    
    public function deletepopup_tax(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('tax_id') && $company_id){
            
            $this->load->model('taxdiscount_model');
            
            $errors = array();
            $data = array();
            $tax_id = $data['tax_id'] = trim($this->input->post('tax_id'));

            if (empty($tax_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($perm_id)){
                $tax_data = $this->taxdiscount_model->getTaxUsingTaxIdCompanyId($tax_id,$company_id);
                if(empty($tax_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $this->load->view('tax/deletepopup_tax',$data);
                
            }
            
            
        }
    }
    
    
    public function delete_tax(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('tax_id') && $company_id){
            
            $this->load->model('taxdiscount_model');
            
            $errors = array();
            $data = array();
            $tax_id = $data['tax_id'] = trim($this->input->post('tax_id'));

            if (empty($tax_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($tax_id)){
                $tax_data = $this->taxdiscount_model->getTaxUsingTaxIdCompanyId($tax_id,$company_id);
                if(empty($tax_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else {
                $data['error']='';
                $data['success']='';
                $this->taxdiscount_model->deleteTax($tax_id,$company_id);
                $this->taxdiscount_model->deleteTaxPercentage($tax_id,$company_id);
                $data['success']='<p> <strong>Delete tax successfully.</p> </strong>';
                echo json_encode($data);
            }
            
            
        }
    }
    
    
    public function nested_tr(){
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post()){
            $this->load->model('taxdiscount_model');
            $tax_id = $this->input->post('tax_id');
            
            $data['tax_percentage'] = $this->taxdiscount_model->getTaxPercentageUsingTaxIdCompanyId($tax_id,$company_id);
            $this->load->view('tax/tax_percentage_from',$data);
        }
    }
    
    public function plus_tr(){
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post()){
            $this->load->model('taxdiscount_model');
            $tax_id = $this->input->post('tax_id');
            
            
            $tax_percentage = $this->taxdiscount_model->getTaxPercentageUsingTaxIdCompanyId($tax_id,$company_id);
            echo '<tr><td><input type="text" id="taxper" name="txper"></td><td><input type="text" id="txappcab" name="txappcab" class="datepick"><a id="gone" onclick="addTextBox('.$tax_id.')">plus</a>&nbsp;<a id="move" onclick="removeTextBox(this)">minus</a></td></tr>';
            //$data['tax_percentage'] = $this->taxdiscount_model->getTaxPercentageUsingTaxIdCompanyId($tax_id,$company_id);
            //$this->load->view('tax/tax_percentage_from',$data);
            
        }
    }
    
    
}