<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_setup extends MY_Controller {
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
    
    
    public function manage_category(){
        $this->layout->title('Category Setup');  /*----Tab Title------*/
        
        $this->layout->css('css/chosen.css');
        $this->layout->css('css/droparea.css');
        $this->layout->js('js/chosen.jquery.js'); 
        $this->layout->js('js/droparea.js');
        $this->layout->js('js/jquery.validate.js');
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model(array('inventory_model','taxdiscount_model','company_model'));
        
        $data['category_code'] = $this->inventory_model->getCategoryCode($company_id);
        
        $data['id_inventory_category'] = $this->input->post('id_inventory_category');
        
        $data['tax_lists'] = $this->taxdiscount_model->getTaxUsingCompanyId($company_id);
        
        $data['discount_lists'] = $this->taxdiscount_model->getDiscountUsingCompanyId($company_id);
        
        $data['parent_category'] = $this->inventory_model->getParentCategoryName($company_id);
        
        $data['invcategory_lists'] = $this->inventory_model->getInventoryCategories($company_id);
        
        $category_img_checking = $this->inventory_model->getInventoryCategoriesUsingCompanyIdCategoryId($this->input->post('id_inventory_category'),$company_id);
       // print_r($data['parent_category']);die('SSS');
        if($this->input->post()){
            $this->form_validation->set_rules('category_name','Category name','required|max_length[30]|xss_clean|trim');
            $this->form_validation->set_rules('category_code','Category code','required|xss_clean|trim|callback_serverside_categorycode_check');
            //$this->form_validation->set_rules('tax_id','Tax','required');
            //$this->form_validation->set_rules('discount_id','Discount','required');
            if($this->form_validation->run() == FALSE){
                $this->layout->view('inventory/manage_category',$data);
            }
            else{
                
                $file_name = (!empty($category_img_checking->category_pic))?$category_img_checking->category_pic:'';
                
                if($_FILES['image']['size']!=0){ //die('qqqq');
                    
                    if(!empty($_FILES['image']['type'] == 'image/jpeg' && exif_read_data($_FILES['image']['tmp_name'])) && $exif = exif_read_data($_FILES['image']['tmp_name']))
                    {
                        $image = imagecreatefromstring(file_get_contents($_FILES['image']['tmp_name'])); 
                        if(!empty($exif['Orientation']))
                        {
                            $exif['Orientation'];
                            switch($exif['Orientation']) 
                            {
                                    case 8:
                                    $image = imagerotate($image,90,0);
                                    break;
                                    case 3:
                                    $image = imagerotate($image,180,0);
                                    break;
                                    case 6:
                                    $image = imagerotate($image,-90,0);
                                    break;
                            }
                            imagejpeg($image, $_FILES['image']['tmp_name']);
                        }
                    }
                    
                    $config['upload_path'] = './upload/category_pics/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png'; 

                    $config['file_name'] = time().'_'.preg_replace('/\s+/', '', $_FILES["image"]["name"]);

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image'))
                    {
                        $data['error_image'] = $this->upload->display_errors();
                        $this->layout->view('inventory/manage_category',$data);
                        return FALSE;
                    }
                    else
                    {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                        $file_name = $config['file_name'];
                    }
                }
                
                $category_data = array(
                    'company_id'=>$company_id,
                    'category_name'=>trim($this->input->post('category_name')),
                    'category_code'=>trim($this->input->post('category_code')),
                    'parent_category_id'=>trim($this->input->post('parent_category_id')),
                    //'tax_id'=>trim($this->input->post('tax_id')),
                    //'discount_id'=>trim($this->input->post('discount_id')),
                    'category_pic'=>$file_name
                );
                
                
                $category_record = $this->inventory_model->getInventoryCategoriesUsingCompanyIdCategoryId($this->input->post('id_inventory_category'),$company_id);
                
                if(!empty($data['id_inventory_category']) && !empty($category_record)){ //Update Category
                    $inventory_catgory_id = $this->input->post('id_inventory_category');
                    
                    $this->inventory_model->deleteInventoryCategoryTax($inventory_catgory_id,$company_id);
                    $this->inventory_model->deleteInventoryCategoryDiscount($inventory_catgory_id,$company_id);
                    
                    $this->inventory_model->updateInventoryCategory($category_data,$this->input->post('id_inventory_category'),$company_id);
                    $this->session->set_flashdata('success_msg', 'Inventory category updated successfully.');
                    
                    /****Giddh integration update category****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){

                        $cate_name = trim($this->input->post('category_name'));


                        $parent_category_id = trim($this->input->post('parent_category_id'));

                        if(!empty($parent_category_id)){
                            $getparentcategory_unique_name = $this->inventory_model->getCategoryUniqueName($parent_category_id,$company_id);
                            $catParentUniqueName = $getparentcategory_unique_name->category_unique_name;

                            $getCatunique_name = $this->inventory_model->getCategoryUniqueName($this->input->post('id_inventory_category'),$company_id);
                            $catUniqueName = $getCatunique_name->category_unique_name;


                            $post_data = array("name" => "$cate_name","uniqueName"=>"$catUniqueName","parentStockGroupUniqueName"=>$catParentUniqueName); 
                        }else{
                            $getCatunique_name = $this->inventory_model->getCategoryUniqueName($this->input->post('id_inventory_category'),$company_id);
                            $catUniqueName = $getCatunique_name->category_unique_name;

                            $post_data = array("name" => "$cate_name","uniqueName"=>"$catUniqueName","parentStockGroupUniqueName"=>""); 

                        }

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();

                        $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/stock-group/".$catUniqueName;
                        curl_setopt($ch1, CURLOPT_URL,  $url);
                        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch1, CURLOPT_HEADER, 0);
                        $body = json_encode($post_data);

                        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "PUT"); 
                        curl_setopt($ch1, CURLOPT_POSTFIELDS,$body);
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

                        $result_push = curl_exec($ch1);  
                        curl_close ($ch1);
                        //print_r($result_push);die('joo');
                        $jsonObj = json_decode($result_push);
                        $status = $jsonObj->status;

                    }
                    /*****Giddh integration update category*******/
                    
                    
                }
                else{ 
                    $inventory_catgory_id = $this->inventory_model->addInventory($category_data);
                    $this->session->set_flashdata('success_msg', 'Inventory category added successfully.');
                    
                    
                    /****Giddh integration create category****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $cate_name = trim($this->input->post('category_name'));
                        $string = preg_replace('/\s+/', '', $cate_name);
                        
                        $cate_code = trim($this->input->post('category_code'));
                        $uniqueName = strtolower($cate_name).''.$cate_code;
                        
                        $parent_category_id = trim($this->input->post('parent_category_id'));
                        
                        if(!empty($parent_category_id)){
                            $getcategory_unique_name = $this->inventory_model->getCategoryUniqueName($parent_category_id,$company_id);
                            $catunique_name = $getcategory_unique_name->category_unique_name;
                            
                            $post_data = array("name" => "$cate_name","uniqueName"=>"$uniqueName","parentStockGroupUniqueName"=>$catunique_name); 
                        }else{
                        
                            $post_data = array("name" => "$cate_name","uniqueName"=>"$uniqueName","parentStockGroupUniqueName"=>""); 
                        
                        }

                        $ch1 = curl_init();
                        $headers = array(
                            "cache-control: no-cache",
                            "content-type: application/json",
                            "auth-key:".$get_giddh_data->giddh_auth_key.""
                        );
                        
                        $this->load->library('extra_lib');
                        $basepath = $this->extra_lib->external_url();

                        $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/stock-group";
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
                            $catupdate_data = array('category_unique_name'=>$uniqueName);
                            $this->inventory_model->updateInventoryCategory($catupdate_data,$inventory_catgory_id,$company_id); //Update unique name
                        }
                        //print_r($result_push);die('ssss');
                    }
                    /*****Giddh integration create category*******/
                    
                }
                
                
                $tax_id = $this->input->post('tax_id');
                $discount_id = $this->input->post('discount_id');
                
                if(!empty($discount_id)){
                    foreach ($discount_id as $disc_id) {
                        $loc_data = array(
                            'inventory_category_id'=>$inventory_catgory_id,
                            'discount_id'=>$disc_id,
                            'company_id'=>$company_id,
                        );
                        $this->inventory_model->addInventoryDiscount($loc_data);
                    }
                }
                
                if(!empty($tax_id)){
                    foreach ($tax_id as $tx_id) {
                        $loc_data = array(
                            'inventory_category_id'=>$inventory_catgory_id,
                            'tax_id'=>$tx_id,
                            'company_id'=>$company_id,
                        );
                        $this->inventory_model->addInventoryTax($loc_data);
                    }
                }
                
                /////////////////////////////////////////////////////////////
                if(!empty($data['id_inventory_category']) && !empty($category_record)){ 
                    $inventory_catgory_id = $this->input->post('id_inventory_category');
                    $check_category_instock = $this->inventory_model->checkCategoryExistanceInStock($company_id,$inventory_catgory_id);
                    
                    
                    if(!empty($check_category_instock)){
                        $this->inventory_model->deleteInventoryStockDiscountFromCategory($inventory_catgory_id,$company_id);
                        
                        $this->inventory_model->deleteInventoryStockTaxesFromCategory($inventory_catgory_id,$company_id);
                        
                        foreach($check_category_instock as $cks){
                            $cat_discount = $this->inventory_model->getCategoryDiscounts($company_id,$inventory_catgory_id);
                            
                            $cat_tax = $this->inventory_model->getCategoryTaxes($company_id,$inventory_catgory_id);
                            //print_r($cat_discount);die('s');
                            if(!empty($cat_discount)){
                                foreach($cat_discount as $ctd){
                                    $disc_data = array(
                                        'inventory_category_id'=>$inventory_catgory_id,
                                        'inventory_stock_id'=>$cks->inventory_stock_id,
                                        'discount_id'=>$ctd->discount_id,
                                        'company_id'=>$company_id,
                                    );
                                    $this->inventory_model->addInventoryStockDiscountFromCategory($disc_data);
                                }
                            }
                            
                            
                            if(!empty($cat_tax)){
                                foreach($cat_tax as $ctx){
                                    $tax_data = array(
                                        'inventory_category_id'=>$inventory_catgory_id,
                                        'inventory_stock_id'=>$cks->inventory_stock_id,
                                        'tax_id'=>$ctx->tax_id,
                                        'company_id'=>$company_id,
                                    );
                                    $this->inventory_model->addInventoryStockTaxesFromCategory($tax_data);
                                }
                            }
                            
                            
                        }
                    }
                }    
                    ////////////////////////////////////////////////////////////
                
                redirect($this->config->base_url().'inventory/category_setup/manage_category');
                
            }
        }else{
            $this->layout->view('inventory/manage_category',$data);
        }
        //$this->layout->view('device/manage_device');
    }
    
    public function test(){
        $this->load->model(array('inventory_model','taxdiscount_model'));
        $company_id = 19;
        
        $all_category = $this->inventory_model->getAllCategoriesCompanyWise($company_id);
        foreach($all_category as $cat){
            $inventory_catgory_id = $cat->inventory_category_id;
            $check_category_instock = $this->inventory_model->checkCategoryExistanceInStock($company_id,$inventory_catgory_id);
            //print_r($check_category_instock);
            if(!empty($check_category_instock)){
                foreach($check_category_instock as $cks){
                    $disc_data = array(
                        'inventory_category_id'=>$inventory_catgory_id
                    );
                    $this->inventory_model->updateInventoryStockDiscount($disc_data,$cks->inventory_stock_id,$company_id);
                }
            }
        
        }
    }
    
    public function test2(){
        $this->load->model(array('inventory_model','taxdiscount_model'));
        $company_id = 19;
        
        $all_category = $this->inventory_model->getAllCategoriesCompanyWise($company_id);
        foreach($all_category as $cat){
            $inventory_catgory_id = $cat->inventory_category_id;
            $check_category_instock = $this->inventory_model->checkCategoryExistanceInStock($company_id,$inventory_catgory_id);
            //print_r($check_category_instock);
            if(!empty($check_category_instock)){
                foreach($check_category_instock as $cks){
                    $tax_data = array(
                        'inventory_category_id'=>$inventory_catgory_id
                    );
                    $this->inventory_model->updateInventoryStockTax($tax_data,$cks->inventory_stock_id,$company_id);
                }
            }
        
        }
    }




    public function edit_inventory_category(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('inventory_category_id') && $company_id){
            
            $this->load->model('inventory_model');
            
            $errors = array();
            $data = array();
            $inventory_category_id = trim($this->input->post('inventory_category_id'));

            if (empty($inventory_category_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($inventory_category_id)){
                $inventory_cat_data = $this->inventory_model->getInventoryCategoriesUsingCompanyIdCategoryId($inventory_category_id,$company_id);
                if(empty($inventory_cat_data)){
                    $errors['wrong'] = 'False';
                }
            }

            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else { 
                $data['inventory_cat_data'] = $this->inventory_model->getInventoryCategoriesUsingCompanyIdCategoryId($inventory_category_id,$company_id);  //Get single permission data
               // $test = $this->inventory_model->getInventoryTaxUsingCategoryIdCompanyId($company_id,$inventory_category_id);
                //print_r($test);
                $tax_details = $this->inventory_model->getInventoryTax($company_id,$inventory_category_id);
                //$tax_details->tx_ids;
                $data['inventory_cat_data']->tx_ids = explode(',',$tax_details->tx_ids);
                
                $discount_details = $this->inventory_model->getInventoryDiscount($company_id,$inventory_category_id); 
                $data['inventory_cat_data']->disc_ids = explode(',',$discount_details->disc_ids);
               // print_r($tax_details);
                echo json_encode($data);
            }
            
        }
    }
    
    
    public function categorycode_existance(){
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post('category_code') && $company_id && $this->input->post('category_id')){    //Edit and update time
            $this->load->model('inventory_model');
            
            $category_code = trim($this->input->post('category_code'));
            $category_id = trim($this->input->post('category_id'));
            
            $check_data = $this->inventory_model->checkCategoryCodeExistance($company_id,$category_code,$category_id); //Category Equal To
            
            $check_data2 = $this->inventory_model->checkCategoryCodeExistanceUpdateTime($company_id,$category_code,$category_id); //Category Not Equal To
            if(!empty($check_data2)){
                echo 'false';
            }
            else if(!empty($check_data) && $category_code == $check_data->category_code ){
                echo 'true';
            }else if(!empty($check_data)){
                echo 'false';
            }else{
                echo 'true';
            }
        }
        else if($this->input->post('category_code') && $company_id){
            $this->load->model('inventory_model');
            
            $category_code = trim($this->input->post('category_code'));
            
            $check_data = $this->inventory_model->checkCategoryCodeExistance($company_id,$category_code);
            if(!empty($check_data)){
                echo 'false';
            }else{
                echo 'true';
            }
        }
    }	
    
    public function serverside_categorycode_check(){
        
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post('category_code') && $company_id && $this->input->post('id_inventory_category')){    //Edit and update time
            $this->load->model('inventory_model');
            
            $category_code = trim($this->input->post('category_code'));
            $category_id = trim($this->input->post('id_inventory_category'));
            
            $check_data = $this->inventory_model->checkCategoryCodeExistance($company_id,$category_code,$category_id); //Category Equal To
            
            $check_data2 = $this->inventory_model->checkCategoryCodeExistanceUpdateTime($company_id,$category_code,$category_id); //Category Not Equal To
            if(!empty($check_data2)){
                $this->form_validation->set_message('serverside_categorycode_check', 'Category code already exists.');
                return FALSE;
            }
            else if(!empty($check_data) && $category_code == $check_data->category_code ){
                return TRUE;
            }else if(!empty($check_data)){
                $this->form_validation->set_message('serverside_categorycode_check', 'Category code already exists.');
                return FALSE;
            }else{
               return TRUE;
            }
        }
        else if($this->input->post('category_code') && $company_id){
            $this->load->model('inventory_model');
            
            $category_code = trim($this->input->post('category_code'));
            
            $check_data = $this->inventory_model->checkCategoryCodeExistance($company_id,$category_code);
            if(!empty($check_data)){
                $this->form_validation->set_message('serverside_categorycode_check', 'Category code already exists.');
                return FALSE;
            }else{
                return TRUE;
            }
        }
        
        
    }
    
    public function deletepopup_category(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('cat_id') && $company_id){
            
            $this->load->model(array('inventory_model','inventory_stock_model'));
            
            $errors = array();
            $data = array();
            $cat_id = $data['cat_id'] = trim($this->input->post('cat_id'));

            if (empty($cat_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($cat_id)){
                //$employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($emp_id,$company_id);
                $inventory_cat_data = $this->inventory_model->getInventoryCategoriesUsingCompanyIdCategoryId($cat_id,$company_id);
                //$employee_data = $this->employee_model->deleteInventoryCategory($inventory_catgory_id,$company_id);
                if(empty($inventory_cat_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $check_category_exists_instock = $this->inventory_stock_model->getInventoryStockUsingCategoryId($company_id,$cat_id);
                if(!empty($check_category_exists_instock)){
                    $this->load->view('inventory/notdeletepopup_category');
                }else{
                    $this->load->view('inventory/deletepopup_category',$data);
                }
                
            }
            
            
        }
    }
    
    
    public function delete_category(){
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post('cat_id') && $company_id){
            
            $this->load->model(array('inventory_model','inventory_stock_model'));
            
            $errors = array();
            $data = array();
            $cat_id = $data['cat_id'] = trim($this->input->post('cat_id'));

            if (empty($cat_id)){
                $errors['wrong'] = 'False';
            }else if(!empty($cat_id)){
                //$employee_data = $this->employee_model->getEmployeeUsingEmployeeIdCompanyId($emp_id,$company_id);
                $inventory_cat_data = $this->inventory_model->getInventoryCategoriesUsingCompanyIdCategoryId($cat_id,$company_id);
                //$employee_data = $this->employee_model->deleteInventoryCategory($inventory_catgory_id,$company_id);
                if(empty($inventory_cat_data)){
                    $errors['wrong'] = 'False';
                }
            }
            
            if (!empty($errors)) {
                echo $errors['wrong'];
            } else {
                $data['error']='';
                $data['success']='';
                $this->inventory_model->deleteInventoryCategory($cat_id,$company_id);
                $data['success']='<p> <strong>Delete category successfully.</p> </strong>';
                echo json_encode($data);
            }
            
            
        }
    }
    
    
}