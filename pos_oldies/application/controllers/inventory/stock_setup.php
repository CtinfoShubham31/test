<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stock_setup extends MY_Controller {
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
    
    public function manage_stock(){
        $this->layout->title('Stock Setup');  /*----Tab Title------*/
        
        $this->layout->css('css/chosen.css');
        $this->layout->css('css/droparea.css');
        $this->layout->js('js/chosen.jquery.js'); 
        $this->layout->js('js/droparea.js');
        $this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/custom/inventory.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('company_model','inventory_model','taxdiscount_model','inventory_stock_model'));
        
        $data['id_inventory_stock'] = $this->input->post('id_inventory_stock');
       
        $data['category_lists'] = $this->inventory_model->getAllCategoriesCompanyWise($company_id);
        $data['tax_lists'] = $this->taxdiscount_model->getTaxUsingCompanyId($company_id);
        $data['discount_lists'] = $this->taxdiscount_model->getDiscountUsingCompanyId($company_id);
        $data['location_lists'] = $this->company_model->getLocationUsingCompanyId($company_id);
        $data['get_field_lists'] = $this->inventory_stock_model->getCustomFieldsNameUsingCustomName($company_id);
        
        $data['unit_lists'] = $this->inventory_stock_model->allUnitLists();
        
        if(!empty($data['id_inventory_stock'])){
            $inv_stkdata = $this->inventory_stock_model->getInventoryStockUsingCompanyIdStockId($company_id,$data['id_inventory_stock']);
        }
        
        $data['stock_lists'] = $this->inventory_stock_model->getInventoryStock($company_id);    //Get all stock inventory lists company wise 
        
        if($this->input->post()){ //print_r($_POST);die('ZZZZZ');
            
            $this->form_validation->set_rules('inventory_category','Inventory category','required');
            $this->form_validation->set_rules('stock_name','Stock name','required|max_length[80]|xss_clean|trim');
            $this->form_validation->set_rules('product_code','Product code','required|max_length[15]|xss_clean|trim|callback_serverside_productcode_check');
            $this->form_validation->set_rules('barcode','Barcode','xss_clean|trim');
            $this->form_validation->set_rules('stock_type','Stock type','required');
            $this->form_validation->set_rules('location_id','Location','required');
            //$this->form_validation->set_rules('tax_name','Tax name','required');
            //$this->form_validation->set_rules('discount_name','Discount name','required');
            $this->form_validation->set_rules('description','Description','xss_clean|trim');
            $this->form_validation->set_rules('cost_price','Cost price','required');
            $this->form_validation->set_rules('sell_price','Sell price','required');
            $this->form_validation->set_rules('opening_quantity','Opening quantity','xss_clean|trim');
            
            
            if($this->form_validation->run() == FALSE){
                $this->layout->view('inventory/manage_stock',$data);
            }
            else{ 
                //$file_name = '';
                
                $file_name = (!empty($inv_stkdata->product_pic))?$inv_stkdata->product_pic:'';
                if($_FILES['image']['size']!=0){
                    
                    $config['upload_path'] = './upload/stock_pics/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '1025'; 
                    $config['max_width'] = '1025'; 
                    $config['max_height'] = '1025';
                    $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["image"]["name"]);

                    $this->load->library('upload', $config);

                    if(!$this->upload->do_upload('image'))
                    {
                        $data['error_image'] = $this->upload->display_errors();
                        $this->layout->view('inventory/manage_stock',$data);
                        return FALSE;
                    }
                    else
                    {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                        $file_name = $config['file_name'];
                    }
                }
                
                $inclusive_tax = trim($this->input->post('inclusive_tax'));
                
                $unit_data = trim($this->input->post('unit'));
                if($unit_data){
                    $unit = $unit_data;
                }else{
                    $unit = 5;
                }
                
                $stock_data = array(
                    'company_id'=>$company_id,
                    'inventory_category_id'=>trim($this->input->post('inventory_category')),
                    'product_name'=>trim($this->input->post('stock_name')),
                    'barcode_no'=>trim($this->input->post('barcode')),
                    'product_code'=>trim($this->input->post('product_code')),
                    'stock_type'=>trim($this->input->post('stock_type')),
                    'description'=>trim($this->input->post('description')),
                    'cost_price'=>trim($this->input->post('cost_price')),
                    'sell_price'=>trim($this->input->post('sell_price')),
                    'opening_quantity'=>trim($this->input->post('opening_quantity')),
                    //'current_quantity'=>trim($this->input->post('current_quantity')),
                    'unit_id'=>$unit,
                    'product_pic'=>$file_name,
                    'is_inclusive'=>(!empty($inclusive_tax))?$inclusive_tax:'0'
                );
                
                $stock_record = $this->inventory_stock_model->getInventoryStockUsingCompanyIdStockId($company_id,$this->input->post('id_inventory_stock'));
                
                if(!empty($data['id_inventory_stock']) && !empty($stock_record)){
                    $this->session->set_flashdata('success_msg', 'Inventory stock updated successfully.');
                    $inventory_stock_id = $this->input->post('id_inventory_stock');
                    
                    $this->inventory_stock_model->deleteInventoryStockTax($inventory_stock_id,$company_id);
                    $this->inventory_stock_model->deleteInventoryStockDiscount($inventory_stock_id,$company_id);
                    $this->inventory_stock_model->deleteInventoryStockLocation($inventory_stock_id,$company_id);
                    //$this->inventory_stock_model->deleteInventoryStockUnit($inventory_stock_id,$company_id);
                    $this->inventory_stock_model->deleteInventoryStockCustomFieldValue($inventory_stock_id,$company_id);
                    
                    $this->inventory_stock_model->updateInventoryStock($stock_data,$this->input->post('id_inventory_stock'),$company_id);
                
                    
                    
                    /****Giddh integration update stock****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $inv_cateid = trim($this->input->post('inventory_category'));
                        
                        $getcategory_unique_name = $this->inventory_model->getCategoryUniqueName($inv_cateid,$company_id);
                        $catUniqueName = $getcategory_unique_name->category_unique_name;
                        
                        $stock_name = trim($this->input->post('stock_name'));
                        
                        $cost_price = trim($this->input->post('cost_price'));
                        if($cost_price>0){
                            $purchaseAccountUniqueName = "purchases";
                        }else{
                            $purchaseAccountUniqueName = "";
                        }
                        
                        $opening_quantity = trim($this->input->post('opening_quantity'));
                        if(empty($opening_quantity)){
                            $opening_quantity = 0;
                        }
                        
                        $opening_amount = $opening_quantity * $cost_price;
                        
                        $sell_price = trim($this->input->post('sell_price'));
                        if($sell_price>0){
                            $salesAccountUniqueName = "sales";
                        }else{
                            $salesAccountUniqueName = "";
                        }
                        
                        $unit_id = trim($this->input->post('unit'));
                        if($unit_id){
                            $get_unit_details = $this->inventory_stock_model->unitInfo($unit_id);
                            $unit_name = $get_unit_details->short_codes;
                        }else{
                            $unit_name = 'nos';
                        }
                        
                            
                        $post_data = array(
                            "name" => $stock_name,
                            "openingQuantity" =>$opening_quantity,
                            "openingAmount"=>$opening_amount,
                            "stockUnitCode"=>$unit_name,
                            "purchaseAccountUniqueName"=>$purchaseAccountUniqueName,
                            "salesAccountUniqueName"=>$salesAccountUniqueName,
                            "purchaseRate"=>$cost_price,
                            "salesRate"=>$sell_price
                        ); 
                        //print_r($post_data);

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();
                        
                        $get_stock_unique_name = $this->inventory_stock_model->getStockUniqueName($inventory_stock_id,$company_id);
                        if(!empty($get_stock_unique_name)){
                            $stock_unique_name = $get_stock_unique_name->stock_unique_name;
                            
                            $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/stock-group/".$catUniqueName."/stock/".$stock_unique_name;
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
                            //print_r($jsonObj);
                            $status = $jsonObj->status;
                            if($status == 'success'){
                                //echo $uniqueName = $jsonObj->uniqueName;
                                //$stockupdate_data = array('stock_unique_name'=>$uniqueName);
                                //$this->inventory_stock_model->updateInventoryStock($stockupdate_data,$inventory_stock_id,$company_id); //Update unique name
                            }
                        //print_r($result_push);
                        //die('ssss');
                        }
                    }
                    /*****Giddh integration update stock*******/
                    
                }
                else{
                    $this->session->set_flashdata('success_msg', 'Inventory stock added successfully.');
                    $inventory_stock_id = $this->inventory_stock_model->addInventoryStock($stock_data);
                    
                    
                    /****Giddh integration create stock****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $inv_cateid = trim($this->input->post('inventory_category'));
                        
                        $getcategory_unique_name = $this->inventory_model->getCategoryUniqueName($inv_cateid,$company_id);
                        $catUniqueName = $getcategory_unique_name->category_unique_name;
                        
                        
                        
                        $stock_name = trim($this->input->post('stock_name'));
                        
                        $cost_price = trim($this->input->post('cost_price'));
                        if($cost_price>0){
                            $purchaseAccountUniqueName = "purchases";
                        }else{
                            $purchaseAccountUniqueName = "";
                        }
                        
                        $opening_quantity = trim($this->input->post('opening_quantity'));
                        if(empty($opening_quantity)){
                            $opening_quantity = 0;
                        }
                        
                        $opening_amount = $opening_quantity * $cost_price;
                        
                        $sell_price = trim($this->input->post('sell_price'));
                        if($sell_price>0){
                            $salesAccountUniqueName = "sales";
                        }else{
                            $salesAccountUniqueName = "";
                        }
                        
                        $unit_id = trim($this->input->post('unit'));
                        if($unit_id){
                            $get_unit_details = $this->inventory_stock_model->unitInfo($unit_id);
                            $unit_name = $get_unit_details->short_codes;
                        }else{
                            $unit_name = 'nos';
                        }
                        
                            
                        $post_data = array(
                            "name" => $stock_name,
                            "openingQuantity" =>$opening_quantity,
                            "openingAmount"=>$opening_amount,
                            "stockUnitCode"=>$unit_name,
                            "purchaseAccountUniqueName"=>$purchaseAccountUniqueName,
                            "salesAccountUniqueName"=>$salesAccountUniqueName,
                            "purchaseRate"=>$cost_price,
                            "salesRate"=>$sell_price
                        ); 
                        //print_r($post_data);

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();

                        $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/stock-group/".$catUniqueName."/stock";
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
                        //print_r($jsonObj);
                        $status = $jsonObj->status;
                        if($status == 'success'){
                            $uniqueName = $jsonObj->body->uniqueName;
                            $stockupdate_data = array('stock_unique_name'=>$uniqueName);
                            $this->inventory_stock_model->updateInventoryStock($stockupdate_data,$inventory_stock_id,$company_id); //Update unique name
                        }
                        
                    }
                    /*****Giddh integration create stock*******/
                    
                    
                }
                
                
                $tax_id = $this->input->post('tax_name');               //Array of tax
                $discount_id = $this->input->post('discount_name');     //Array of discount
                $location_id = $this->input->post('location_id');       //Array of location
                //$unit = $this->input->post('unit');       //Array of location
                
                if(!empty($discount_id)){
                    foreach ($discount_id as $disc_id) {
                        $disc_data = array(
                            'inventory_stock_id'=>$inventory_stock_id,
                            'discount_id'=>$disc_id,
                            'company_id'=>$company_id,
                            'inventory_category_id'=>trim($this->input->post('inventory_category'))
                        );
                        $this->inventory_stock_model->addInventoryStockDiscount($disc_data);
                    }
                }
                
                if(!empty($tax_id)){
                    foreach ($tax_id as $tx_id) {
                        $tax_data = array(
                            'inventory_stock_id'=>$inventory_stock_id,
                            'tax_id'=>$tx_id,
                            'company_id'=>$company_id,
                            'inventory_category_id'=>trim($this->input->post('inventory_category'))
                        );
                        $this->inventory_stock_model->addInventoryStockTax($tax_data);
                    }
                }
                
                if(!empty($location_id)){
                    foreach ($location_id as $loc_id) {
                        $loc_data = array(
                            'inventory_stock_id'=>$inventory_stock_id,
                            'location_id'=>$loc_id,
                            'company_id'=>$company_id,
                        );
                        $this->inventory_stock_model->addInventoryStockLocation($loc_data);
                    }
                }
                
                foreach ($_POST as $name => $value) {
                    $ctom_data = $this->inventory_stock_model->getCustomFieldsNameSingleRow($company_id,$name);
                    if(!empty($ctom_data) && !empty($value)){
                        $array_custom = array(
                            'inventory_stock_customfield_id'=>$ctom_data->inventory_stock_customfield_id,
                            'inventory_stock_id'=>$inventory_stock_id,
                            'value'=>$value,
                            'company_id'=>$company_id,
                        );
                        
                        $this->inventory_stock_model->addStockCustomFieldsValue($array_custom); //Add Custom Field
                        //print_r($array_custom);
                    }
                }
                //die('xxxx');
                redirect($this->config->base_url().'inventory/stock_setup/manage_stock');
                
            }
        }else{
            $this->layout->view('inventory/manage_stock',$data);
        }
    }
    
    
    public function customfields_popup(){
        $this->load->view('inventory/customfields_popup');
    }
    
    public function addcustom_fields(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('custom_fields')){
            //print_r($_POST);
            $custom_fields = $this->input->post('custom_fields');
            if(!empty($custom_fields)){
                
                $this->load->model(array('inventory_stock_model'));
                
                foreach ($custom_fields as $customf) {
                    $customf = strtolower(preg_replace('/\s+/', '', $customf));
                    $custom_data = array(
                        'company_id'=>$company_id,
                        'custom_name'=>$customf
                    );
                    
                    $check_field_existance = $this->inventory_stock_model->getCustomFieldsNameUsingCustomName($company_id,trim($customf));
                    if(empty($check_field_existance)){
                        $this->inventory_stock_model->addStockCustomFields($custom_data);       //Add custom fields
                        //echo 'True';
                    }else{
                        //echo 'False';
                    }
                }
                
                $get_field_lists = $this->inventory_stock_model->getCustomFieldsNameUsingCustomName($company_id);
                if(!empty($get_field_lists)){
                    foreach($get_field_lists as $fields_name){
                        echo '<div class="form-group">
                            <input type="text" class="form-control sign-control" name="'.$fields_name->custom_name.'" id="'.$fields_name->custom_name.'" placeholder="'.$fields_name->custom_name.'">
                        </div>';
                    }
                }
            }
        }
    }
    
    
    public function edit_inventory_stock(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('inventory_stock_id') && $company_id){
            
            $this->load->model('inventory_stock_model');
            
            $errors = array();
            $data = array();
            $inventory_stock_id = trim($this->input->post('inventory_stock_id'));

            if (empty($inventory_stock_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($inventory_stock_id)){
                $inventory_stock_data = $this->inventory_stock_model->getInventoryStockUsingCompanyIdStockId($company_id,$inventory_stock_id);
                if(empty($inventory_stock_data)){
                    $errors['wrong'] = 'False';
                }
            }

            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['errors']  = '';
                $data['inventory_stock_data'] = $this->inventory_stock_model->getInventoryStockUsingCompanyIdStockId($company_id,$inventory_stock_id);  //Get single permission data
               
                $tax_details = $this->inventory_stock_model->getInventoryStockTax($company_id,$inventory_stock_id);
                $data['inventory_stock_data']->tx_ids = explode(',',$tax_details->tx_ids);
                
                $discount_details = $this->inventory_stock_model->getInventoryStockDiscount($company_id,$inventory_stock_id); 
                $data['inventory_stock_data']->disc_ids = explode(',',$discount_details->disc_ids);
                
                $location_details = $this->inventory_stock_model->getInventoryStockLocation($company_id,$inventory_stock_id); 
                $data['inventory_stock_data']->loc_ids = explode(',',$location_details->loc_ids);
                
                $customfield_details = $this->inventory_stock_model->getCustomFieldsNameUsingCompanyIdStockId($company_id,$inventory_stock_id);
                //print_r($customfield_details);die('AAZ');
                if(!empty($customfield_details)){
                    $data['inventory_stock_data']->customfield_data = $customfield_details;
                }else{
                    $customfield_details = $this->inventory_stock_model->getCustomFieldsNameUsingCustomName($company_id);
                    $data['inventory_stock_data']->customfield_blank = $customfield_details;    //set value blank
                }
                echo json_encode($data);
            }
            
        }
    }
    
    
    public function setcategory_taxdiscount(){
        $company_id = $this->session->userdata('pos_companyid');
        $inventory_category_id = $this->input->post('inventory_category_id');
        
        $this->load->model(array('inventory_stock_model','inventory_model'));
        
        $inventory_cat_data = $this->inventory_model->getInventoryCategoriesUsingCompanyIdCategoryId($inventory_category_id,$company_id);

        
        if(!empty($inventory_category_id) && !empty($inventory_cat_data)){
        
            $result = new stdClass();
            
            $tax_details = $this->inventory_model->getInventoryTax($company_id,$inventory_category_id);
            //print_r($tax_details);die('ss');
            $result->tx_ids = explode(',',$tax_details->tx_ids);

            $discount_details = $this->inventory_model->getInventoryDiscount($company_id,$inventory_category_id); 
            $result->disc_ids = explode(',',$discount_details->disc_ids);
            
            $category_name = $inventory_cat_data->category_name;
            $result->product_code = $this->inventory_stock_model->getProductCode($company_id,$category_name);
            
            echo json_encode($result);
        }
    }
    
    /*Validate product code client side*/
    public function productcode_existance(){
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post('product_code') && $company_id && $this->input->post('inventory_stock_id')){    //Edit and update time
            $this->load->model('inventory_stock_model');
            
            $product_code = trim($this->input->post('product_code'));
            $inventory_stock_id = trim($this->input->post('inventory_stock_id'));
            
            $check_data = $this->inventory_stock_model->checkProductCodeExistance($company_id,$product_code,$inventory_stock_id); //Category Equal To
            
            $check_data2 = $this->inventory_stock_model->checkProductCodeExistanceUpdateTime($company_id,$product_code,$inventory_stock_id); //Category Not Equal To
            if(!empty($check_data2)){
                echo 'false';
            }
            else if(!empty($check_data) && $product_code == $check_data->product_code ){
                echo 'true';
            }else if(!empty($check_data)){
                echo 'false';
            }else{
                echo 'true';
            }
        }
        else if($this->input->post('product_code') && $company_id){
            $this->load->model('inventory_stock_model');
            
            $product_code = trim($this->input->post('product_code'));
            
            $check_data = $this->inventory_stock_model->checkProductCodeExistance($company_id,$product_code);
            if(!empty($check_data)){
                echo 'false';
            }else{
                echo 'true';
            }
        }
    }
    
    
    public function serverside_productcode_check(){
        
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post('product_code') && $company_id && $this->input->post('id_inventory_stock')){    //Edit and update time
            $this->load->model('inventory_stock_model');
            
            $product_code = trim($this->input->post('product_code'));
            $inventory_stock_id = trim($this->input->post('id_inventory_stock'));
            
            $check_data = $this->inventory_stock_model->checkProductCodeExistance($company_id,$product_code,$inventory_stock_id); //Category Equal To
            
            $check_data2 = $this->inventory_stock_model->checkProductCodeExistanceUpdateTime($company_id,$product_code,$inventory_stock_id); //Category Not Equal To
            if(!empty($check_data2)){
                $this->form_validation->set_message('serverside_productcode_check', 'Product code already existsss.');
                return FALSE;
            }
            else if(!empty($check_data) && $product_code == $check_data->product_code ){
                return TRUE;
            }else if(!empty($check_data)){
                $this->form_validation->set_message('serverside_productcode_check', 'Product code already existszz.');
                return FALSE;
            }else{
                return TRUE;
            }
        }
        else if($this->input->post('product_code') && $company_id){
            $this->load->model('inventory_stock_model');
            
            $product_code = trim($this->input->post('product_code'));
            
            $check_data = $this->inventory_stock_model->checkProductCodeExistance($company_id,$product_code);
            if(!empty($check_data)){
                $this->form_validation->set_message('serverside_productcode_check', 'Product code already exists.');
                return FALSE;
            }else{
                return TRUE;
            }
        }
        
        
    }
    
    
    public function deletepopup_stock(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('stock_id') && $company_id){
            
            $this->load->model(array('inventory_model','inventory_stock_model'));
            
            $errors = array();
            $data = array();
            $stock_id = $data['stock_id'] = trim($this->input->post('stock_id'));

            if (empty($stock_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($stock_id)){
                //$employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($emp_id,$company_id);
                $inventory_stock_data = $this->inventory_stock_model->getInventoryStockUsingCompanyIdStockId($company_id,$stock_id);
                //$employee_data = $this->employee_model->deleteInventoryCategory($inventory_catgory_id,$company_id);
                if(empty($inventory_stock_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                
                    $this->load->view('inventory/deletepopup_stock',$data);
            }
            
            
        }
    }
    
    
    public function delete_stock(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('stock_id') && $company_id){
            
            $this->load->model(array('inventory_model','inventory_stock_model'));
            
            $errors = array();
            $data = array();
            $stock_id = $data['stock_id'] = trim($this->input->post('stock_id'));

            if (empty($stock_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($stock_id)){
                //$employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($emp_id,$company_id);
                $inventory_stock_data = $this->inventory_stock_model->getInventoryStockUsingCompanyIdStockId($company_id,$stock_id);
                //$employee_data = $this->employee_model->deleteInventoryCategory($inventory_catgory_id,$company_id);
                if(empty($inventory_stock_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                
                $data['error']='';
                $data['success']='';
                $stock_data = array('product_delete_status'=>1);
                $this->inventory_stock_model->updateInventoryStock($stock_data,$stock_id,$company_id);
                $data['success']='<p> <strong>Delete stock successfully.</p> </strong>';
                echo json_encode($data);
                
                
            }
            
            
        }
    }
    
    
    public function tax_inclusive(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('stock_id') && $company_id){
            
        }
    }
    
    
}