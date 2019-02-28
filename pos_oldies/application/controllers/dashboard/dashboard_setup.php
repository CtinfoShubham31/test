<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_setup extends MY_Controller {
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
    
    public function manage_dashboard(){
        $this->layout->title('Dashboard');  /*----Tab Title------*/
        
        //$this->layout->js('js/jquery.knob.js');
        
        $this->load->model(array('dashboard_model','payment_model'));
        
        $company_id = $data['company_id'] = $this->session->userdata('pos_companyid');
        
        $today_date = date('Y-m-d');
        //$today_date = '2017-03-31';
        
        $payment_methods = $this->dashboard_model->getPaymentMethodAmounts($company_id,$today_date);
        
        if(!empty($payment_methods)){
            $pmid = array();
            $pmsum = array();
            foreach($payment_methods as $key => $paym){
                $pmid[] = $paym->payment_method_id;
                $pmsum[$paym->payment_method_id] = $paym->sum_amount;
            }
            $data['pmid'] = $pmid;
            $data['pmsum'] = $pmsum;
        }
        
        $inv_cats = $this->dashboard_model->getTopSellingProductCategory($company_id,$today_date);
        if(!empty($inv_cats)){
            $data['jcat_data'] = $this->convertDataToChartForm($inv_cats);
        }else{
            $jsdata = array(array('category_name','total_sale_qty'));
            $data['jcat_data'] = $jsdata;
        }
        
        $data['total_cash'] = $this->dashboard_model->getTotalCash($company_id,$today_date);
        
        $data['top_selling_product_name'] = $this->dashboard_model->getTopSellingProduct($company_id,$today_date,1);
        
        $top_selling_products = $this->dashboard_model->getTopSellingProductLists($company_id,$today_date,5);
        if(!empty($top_selling_products)){
            $data['jdata'] = $this->convertDataToChartForm($top_selling_products);
        }else{
            $jsdata = array(array('product_name','total_sale_qty'));
            $data['jdata'] = $jsdata;
        }
        //print_r($top_selling_products);
        //print_r($data['jdata']);
        
        $data['no_of_payment'] = $this->payment_model->getAllPaymentCredential($company_id);
        
        $data['top_sales_person'] = $this->dashboard_model->topSalesPerson($company_id,$today_date);
        
        $data['customer_visit'] = $this->dashboard_model->customerVisit($company_id,$today_date);
        
        $data['profit'] = $this->dashboard_model->calculateProfit($company_id,$today_date);
        
        $this->layout->view('dashboard/manage_dashboard',$data);
    }
    
    
    function convertDataToChartForm($data)
    {
        $newData = array();
        $firstLine = true;

        foreach ($data as $dataRow)
        {
            if ($firstLine)
            {
                $newData[] = array_keys($dataRow);
                $firstLine = false;
            }

            $newData[] = array_values($dataRow);
        }

        return $newData;
    }

    
}