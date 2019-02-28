<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Discount_setup extends MY_Controller {
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
    
    
    public function manage_discount(){ //print_r($this->session->all_userdata());
        $this->layout->title('Discount');  /*----Tab Title------*/
        
        $this->layout->css('css/bootstrap-datetimepicker.min.css'); 
        $this->layout->css('css/chosen.css');
        
        $this->layout->js('js/moment-with-locales.js'); 
        $this->layout->js('js/bootstrap-datetimepicker.min.js');  
        $this->layout->js('js/chosen.jquery.js');  
        $this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/custom/discount.js');
        //print_r($this->session->all_userdata());
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        
        $this->load->model(array('company_model','taxdiscount_model'));
        
        $data['id_discount'] = $this->input->post('id_discount');
        
        $data['company_details'] = $this->company_model->getCompanyUsingCompanyId($company_id,$admin_id);
        
        $data['location_lists'] = $this->company_model->getLocationUsingCompanyId($company_id);
        
        $data['discount_lists'] = $this->taxdiscount_model->getDiscountUsingCompanyId($company_id);
        //print_r($data['discount_lists']);
        
        if($this->input->post()){ 
            $this->form_validation->set_rules('discount_name','Discount name','required|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('applicable_from','Applicable from','required|xss_clean|trim');
            $this->form_validation->set_rules('applicable_to','Applicable to', 'required|xss_clean|trim');
            $this->form_validation->set_rules('percentage','Percentage','required|max_length[2]|callback_validate_percentage');
            
            if(!empty($data['location_lists'])){
                $this->form_validation->set_rules('location','Location', 'required');
            }
            
            if($this->form_validation->run() == FALSE){
                $this->layout->view('discount/manage_discount',$data);
            }
            else{
                $location_id = $this->input->post('location');
                
                $applicable_from = date("Y-m-d H:i:s",strtotime(trim($this->input->post('applicable_from'))));
                $applicable_to = date("Y-m-d H:i:s",strtotime(trim($this->input->post('applicable_to'))));
                
                $discount_data = array(
                    'company_id'=>$company_id,
                    'discount_name'=>trim($this->input->post('discount_name')),
                    'percentage'=>trim($this->input->post('percentage')),
                    'applicable_from'=>$applicable_from,
                    'applicable_to'=>$applicable_to
                );
                
//                $discount_id = $this->taxdiscount_model->addDiscount($discount_data);
                
                $discount_record = $this->taxdiscount_model->getDiscountUsingDiscountIdCompanyId($this->input->post('id_discount'),$company_id);
                
                if(!empty($data['id_discount']) && !empty($discount_record)){
                    $this->session->set_flashdata('success_msg', 'Discount updated successfully.');
                    $this->taxdiscount_model->deleteDiscountLocation($this->input->post('id_discount'),$company_id);  //Delete previous location records.
                    
                    $this->taxdiscount_model->updateDiscount($discount_data,$this->input->post('id_discount'),$company_id);
                    $discount_id = $this->input->post('id_discount');
                    
                    
                    /****Giddh integration update discount****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $discount_name = trim($this->input->post('discount_name'));
                        //$percentage = trim($this->input->post('percentage'));
                        //$uniqueName = strtolower($discount_name.''.$percentage);
                        

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $post_data = array(
                            "name" => $discount_name
                        ); 

                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();

                        $get_discount_unique_name = $this->taxdiscount_model->getDiscountUniqueName($discount_id,$company_id);
                        if(!empty($get_discount_unique_name)){
                            
                            $discount_unique_name = $get_discount_unique_name->discount_unique_name;
                        
                            //$url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/groups/discount/accounts";
                            $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/groups/discount/accounts/".$discount_unique_name;

                            curl_setopt($ch1, CURLOPT_URL,  $url);
                            curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch1, CURLOPT_HEADER, 0);
                            $body = json_encode($post_data);

                            curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "PUT"); 
                            curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
                            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

                            $result_push = curl_exec($ch1);  
                            curl_close ($ch1);

                            $jsonObj = json_decode($result_push);
                            $status = $jsonObj->status;
                            if($status == 'success'){
                                //$discount_update_data = array('discount_unique_name'=>$uniqueName);
                                //$this->taxdiscount_model->updateDiscount($discount_update_data,$discount_id,$company_id); //Update unique name
                            }
                        
                        }
                        //print_r($result_push);die('ssss');
                    }
                    /*****Giddh integration update discount*******/
                    
                    
                }
                else{
                    $this->session->set_flashdata('success_msg', 'Discount added successfully.');
                    $discount_id = $this->taxdiscount_model->addDiscount($discount_data);
                    
                    
                    
                    /****Giddh integration create discount****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $discount_name = trim($this->input->post('discount_name'));
                        $percentage = trim($this->input->post('percentage'));
                        $uniqueName = strtolower($discount_name.''.$percentage);
                        

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $post_data = array(
                            "name" => $discount_name,
                            "uniqueName" =>$uniqueName
                        ); 

                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();

                        $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/groups/discount/accounts";
                       
                        curl_setopt($ch1, CURLOPT_URL,  $url);
                        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch1, CURLOPT_HEADER, 0);
                        $body = json_encode($post_data);

                        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST"); 
                        curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

                        $result_push = curl_exec($ch1);  
                        curl_close ($ch1);
                        
                        $jsonObj = json_decode($result_push);
                        $status = $jsonObj->status;
                        if($status == 'success'){
                            $discount_update_data = array('discount_unique_name'=>$uniqueName);
                            $this->taxdiscount_model->updateDiscount($discount_update_data,$discount_id,$company_id); //Update unique name
                        }
                        //print_r($result_push);die('ssss');
                    }
                    /*****Giddh integration create discount*******/
                    
                    
                }
                
                
                if(!empty($location_id)){
                    foreach ($location_id as $locid) {
                        $loc_data = array(
                            'location_id'=>$locid,
                            'discount_id'=>$discount_id,
                            'company_id'=>$company_id
                        );
                        $this->taxdiscount_model->addDicountLocation($loc_data);
                    }
                }
                
                redirect($this->config->base_url().'discount/discount_setup/manage_discount');
                
            }
        }else{
            $this->layout->view('discount/manage_discount',$data);
        }
    }
    
    
    public function validate_percentage($percentage){
        if (!is_numeric($percentage))
        {
            $this->form_validation->set_message('validate_percentage', 'Entered character is not in numeric form.');
            return FALSE;
        }
    }
    
    
    public function edit_discount(){
        $company_id = $this->session->userdata('pos_companyid');
        $discount_id = $this->input->post('discount_id');
        $this->load->model(array('taxdiscount_model'));
        
        
        if($this->input->post('discount_id') && $company_id){
            
            $this->load->model('taxdiscount_model');
            
            $errors = array();
            $data = array();
            $discount_id = trim($this->input->post('discount_id'));

            if (empty($discount_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($discount_id)){
                $discount_data = $this->taxdiscount_model->getDiscountUsingDiscountIdCompanyId($discount_id,$company_id);
                if(empty($discount_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['discount_data'] = $this->taxdiscount_model->getDiscountUsingDiscountIdCompanyId($discount_id,$company_id);  //Get single permission data
                $data['discount_data']->applicable_from = date('m/d/Y H:i:s',strtotime($data['discount_data']->applicable_from));
                $data['discount_data']->applicable_to = date('m/d/Y H:i:s',strtotime($data['discount_data']->applicable_to));
                $data['discount_data']->loc_id = explode(',',$data['discount_data']->loc_id);
                
                echo json_encode($data);
            }
            
        }
    }
    
    
    public function deletepopup_discount(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('discount_id') && $company_id){
            
            $this->load->model('taxdiscount_model');
            
            $errors = array();
            $data = array();
            $discount_id = $data['discount_id'] = trim($this->input->post('discount_id'));

            if (empty($discount_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($discount_id)){
                $discount_data = $this->taxdiscount_model->getDiscountUsingDiscountIdCompanyId($discount_id,$company_id);
                if(empty($discount_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $this->load->view('discount/deletepopup_discount',$data);
                
            }
            
            
        }
    }
    
    
    public function delete_discount(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('discount_id') && $company_id){
            
            $this->load->model('taxdiscount_model');
            
            $errors = array();
            $data = array();
            $discount_id = $data['discount_id'] = trim($this->input->post('discount_id'));

            if (empty($discount_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($discount_id)){
                $discount_data = $this->taxdiscount_model->getDiscountUsingDiscountIdCompanyId($discount_id,$company_id);
                if(empty($discount_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else {
                $data['error']='';
                $data['success']='';
                
                $this->taxdiscount_model->deleteDiscount($discount_id,$company_id);
                $this->taxdiscount_model->deleteDiscountLocation($discount_id,$company_id);
                
                $data['success']='<p> <strong>Delete discount successfully.</p> </strong>';
                echo json_encode($data);
            }
            
            
        }
    }
    
    
}