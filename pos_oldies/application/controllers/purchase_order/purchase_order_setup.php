<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Purchase_order_setup extends MY_Controller {
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
    
    
    public function manage_purchase_order(){
        $this->layout->title('Purchase Order');  /*----Tab Title------*/
        
        $this->layout->css('css/bootstrap-datetimepicker.min.css'); 
        $this->layout->css('css/jquery-ui.css');
        //$this->layout->css('css/chosen.css');
        
        $this->layout->js('js/moment-with-locales.js'); 
        $this->layout->js('js/bootstrap-datetimepicker.min.js');
        //$this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/jquery-ui.min.js');
        //$this->layout->js('js/chosen.jquery.js');
        $this->layout->js('js/jquery.validate.js');
        $this->layout->js('js/custom/purchase_order.js');
        
        $this->load->model(array('inventory_stock_model','purchase_order_model','company_model'));
        
        $admin_id = $this->session->userdata('pos_adminid');
        $company_id = $this->session->userdata('pos_companyid');
        
        $data['unit_lists'] = $this->inventory_stock_model->allUnitLists();
        
        $data['stock_lists'] = $this->purchase_order_model->getStockNameUsingCompanyId($company_id);
        
        $data['purchase_lists'] = $this->purchase_order_model->getPurchaseOrderListsUsingCompanyId($company_id);
        
        $company_data = $this->company_model->getCompanyUsingCompanyId($company_id);
        $company_name = strtoupper(substr($company_data->name, 0, 3));
        
        
        if($this->input->post()){
            $this->form_validation->set_rules('vendor','Vendor name','required|max_length[80]|xss_clean|trim');
            $this->form_validation->set_rules('order_date','Order Date', 'required|trim');
            
            if($this->form_validation->run() == FALSE){
                $this->layout->view('purchase_order/manage_purchase_order',$data);
            }
            else{
                
                $final_amount = trim($this->input->post('subtot'));
                
                $vendor_name = trim($this->input->post('vendor'));
                $vid = trim($this->input->post('vid'));
                $purchase_order_date = date("Y-m-d",strtotime(trim($this->input->post('order_date'))));
                $purchase_count = $this->purchase_order_model->getPurchaseOrderCountByDate($company_id,$purchase_order_date);
                $order_no = $purchase_count+1;
                
                $check_vendor_existance = $this->purchase_order_model->getSingleVendorDetails($company_id,'',$vendor_name);
                if(empty($check_vendor_existance)){
                    $vendor_data = array(
                        'vendor_name'=>$vendor_name,
                        'company_id'=>$company_id
                    );
                    $vid = $this->purchase_order_model->addVendor($vendor_data);   //ADD New Vendor.
                    
                    
                    /****Giddh integration create vendor****/
                    $get_giddh_data = $this->company_model->getGiddhCompanyData($company_id);
                    if(!empty($get_giddh_data) && !empty($get_giddh_data->giddh_auth_key) && !empty($get_giddh_data->giddh_comp_unique_name)){
                        
                        $post_data = array(
                            "name" => $vendor_name,
                            "uniqueName" =>strtolower($vendor_name)
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

                        $url = $basepath."/company/".$get_giddh_data->giddh_comp_unique_name."/groups/sundrycreditors/accounts";
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
                            
                        }
                        //print_r($result_push);die('ssss');
                        
                    }
                    /*****Giddh integration create vendor*******/
                    
                    
                    
                }else{
                    $vid = $check_vendor_existance->vendor_id;
                }
            
                $purchase_data = array(
                    'company_id'=>$company_id,
                    'vendor_id'=>$vid,
                    'purchase_order_date'=>$purchase_order_date,
                    'purchase_order_payment_status_id'=>2,          //Unpaid
                    'purchase_order_status_id'=>1,  //Ordered
                    'purchase_order_no'=>$order_no,
                    'final_amount'=>$final_amount,
                    'remaining_amount'=>$final_amount
                );
            
                $purchase_order_id = $this->purchase_order_model->addPurchaseOrder($purchase_data);
            
                if(!empty($_POST['stk_id'])){
                    $i=0;
                    foreach($_POST['stk_id'] as $stock_data){
                        $pdata = array(
                            'inventory_stock_id'=>$stock_data,
                            'company_id'=>$company_id,
                            'purchase_rate'=>$_POST['rate'][$i],
                            'purchase_qty'=>$_POST['qty'][$i],
                            'purchase_amount'=>$_POST['total'][$i],
                            'unit_id'=>$_POST['unit'][$i],
                            'purchase_order_id'=>$purchase_order_id,
                            'purchase_order_no'=>$order_no,
                            'purchase_order_date'=>$purchase_order_date
                        );

                        $this->purchase_order_model->addPurchaseOrderTransaction($pdata);   //Add data into purchase order transaction table

                        $inventory_stock_details = $this->purchase_order_model->getSingleInventoryStockInfo($stock_data,$company_id);
                
                
                        $current_quantity = $inventory_stock_details->current_quantity;
                        $final_current_quantity = $current_quantity + $_POST['qty'][$i];

                        $update_current_quantity = array('current_quantity'=>$final_current_quantity);
                        
                        $this->inventory_stock_model->updateInventoryStock($update_current_quantity,$stock_data,$company_id);
                        
                        $i++;
                    }
                }
            
                if($this->input->post('payment_status')){
                    $update_paystatus = array('purchase_order_payment_status_id'=>$this->input->post('payment_status'));
                    $this->purchase_order_model->updatePurchaseOrder($update_paystatus,$purchase_order_id,$company_id);
                }
                
                $this->session->set_flashdata('success_msg', 'Purchase order added successfully.');
                redirect($this->config->base_url().'purchase_order/purchase_order_setup/manage_purchase_order');
                //print_r($_POST);die('ZZZ');
            }
        }else{
            $this->layout->view('purchase_order/manage_purchase_order',$data);
        }
        
    }
    
    public function addmore_tablerow(){
        $company_id = $this->session->userdata('pos_companyid');
        if($this->input->post() && $company_id){
            
            $this->load->model(array('purchase_order_model','inventory_stock_model'));
            
            $errors = array();
            $data = array();
            
            $stock_id = trim($this->input->post('stock_id')); 
            $qty = trim($this->input->post('qty'));
            $rate = trim($this->input->post('rate'));
            $unit = trim($this->input->post('unit'));
            $total = trim($this->input->post('total'));
            
            $stock_info = $this->purchase_order_model->getSingleInventoryStockInfo($stock_id,$company_id);
            
            $unit_info = $this->inventory_stock_model->unitInfo($unit);
            
            if (empty($stock_id)){
                $errors['wrong'] = 'This field is required.';
            } elseif ($stock_id) {
                if(empty($stock_info)){
                    $errors['stock'] = 'This stock is not exists.';
                }
            }
            if (empty($rate)) {
                $errors['rate'] = 'This field is required.';
            }
            if (empty($unit)) {
                $errors['unit'] = 'This field is required.';
            }
            if (empty($total)) {
                $errors['total'] = 'This field is required.';
            }
            if (empty($qty)) {
                $errors['qty'] = 'This field is required.';
            }
            
            if (!empty($errors)) {
                $data['errors']  = $errors;
                echo json_encode($data);
            } else {
                $data['errors']  = '';
                
                $stock_name = $stock_info->product_name;
                $unit_name = $unit_info->unit;
                
                $subtotal = $total;
                
                $data['success'] = array('stock_name'=>$stock_name,'stock_id'=>$stock_id,'qty'=>$qty,'rate'=>$rate,'unit_name'=>$unit_name,'unit_id'=>$unit,'total'=>$total);
                echo json_encode($data);
            }
            
            
        }
    }
    
    public function get_stock(){
        if ($this->input->post()) {
            $company_id = $this->session->userdata('pos_companyid');
            //$term = trim($_GET['term']);
            $term = addslashes($this->input->post('data', TRUE));

            $this->load->model(array('purchase_order_model'));

            $stock_details = $this->purchase_order_model->getStockNameUsingCompanyId($company_id,$term);

            echo json_encode($stock_details);
        }
    }


    public function get_vendor(){
        if ($this->input->post()) {
            $company_id = $this->session->userdata('pos_companyid');
            //$term = trim($_GET['term']);
            $term = addslashes($this->input->post('data', TRUE));

            $this->load->model(array('purchase_order_model'));

            $vendor_details = $this->purchase_order_model->getVendorDetails($company_id,$term);

             echo json_encode($vendor_details);
        }
    }
    
}