<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Analytics_setup extends MY_Controller {
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
    
    
    public function manage_sales_report(){
        $this->layout->title('Sales Report');  /*----Tab Title------*/
        
        $this->layout->css('css/daterangepicker.css');
        $this->layout->js('js/moment.js');
        $this->layout->js('js/daterangepicker.js');
        
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post()){
            $date_range = explode('-',$this->input->post('date_range'));
            $from = date("Y-m-d",strtotime(trim($date_range[0])));
            $to = date("Y-m-d",strtotime(trim($date_range[1])));
        }else{
            $from = date("Y-m-d");
            $to = date("Y-m-d");
        }    
        
        $this->load->model('analytics_model');

        $product_sales_report = $this->analytics_model->getProductSalesReport($company_id,$from,$to);
        if(!empty($product_sales_report)){
            $data['jprod_data'] = $this->convertDataToChartForm($product_sales_report);
        }else{
            $data['jprod_data'] = array(array('product_name','amount'),array('',0));
        }

        $employee_sales_report = $this->analytics_model->getEmployeeSalesReport($company_id,$from,$to);
        if(!empty($employee_sales_report)){
            $data['jemp_data'] = $this->convertDataToChartForm($employee_sales_report);
        }else{
            $data['jemp_data'] = array(array('employee_name','amount'),array('',0));
        }

        $category_sales_report = $this->analytics_model->getCategorySalesReport($company_id,$from,$to);
        if(!empty($category_sales_report)){
            $data['jcat_data'] = $this->convertDataToChartForm($category_sales_report);
        }else{
            $data['jcat_data'] = array(array('category_name','amount'),array('',0));
        }
            
        $this->layout->view('analytics/manage_sales_report',$data);
    }
    
    
    public function payment_received_report(){
        $this->layout->title('Payment Receive Report');  /*----Tab Title------*/
        
        $this->layout->css('css/daterangepicker.css');
        $this->layout->js('js/moment.js');
        $this->layout->js('js/daterangepicker.js');
        
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post()){
            $date_range = explode('-',$this->input->post('date_range'));
            $data['from'] = $from = date("Y-m-d",strtotime(trim($date_range[0])));
            $data['to'] = $to = date("Y-m-d",strtotime(trim($date_range[1])));
        }else{
            $data['from'] = $from = date("Y-m-d");
            $data['to'] = $to = date("Y-m-d");
        }  
        
        $this->load->model('analytics_model');
        
        
        $data['interval'] = (!empty($_POST['select_interval']))?$_POST['select_interval']:'1';
        
        if($this->input->post('select_interval') == 2){
            $payment_byweek = $this->analytics_model->paymentReceivedWeekwise($company_id,$from,$to);
            
            if(!empty($payment_byweek)){
                $data['jpay_data'] = $this->convertDataToChartForm($payment_byweek);
            }else{
                $data['jpay_data'] = array(array('String','Razorpay','Mswipe','Cash'),array('',0,0,0));
            }
        }else if ($this->input->post('select_interval') == 3) {
            $payment_bymonth = $this->analytics_model->paymentReceivedMonthwise($company_id,$from,$to);
            
            if(!empty($payment_bymonth)){
                $data['jpay_data'] = $this->convertDataToChartForm($payment_bymonth);
            }else{
                $data['jpay_data'] = array(array('String','Razorpay','Mswipe','Cash'),array('',0,0,0));
            }
        }else{
            $payment_byday = $this->analytics_model->paymentReceivedDaywise($company_id,$from,$to);
            
            if(!empty($payment_byday)){
                $data['jpay_data'] = $this->convertDataToChartForm($payment_byday);
            }else{
                //$data['jcat_data'] = array(array('Duration','cash','mswipe','paytm'),array('',0,0,0));
                //$data['jcat_data'] = array(array('',0,0,0));
                $data['jpay_data'] = array(array('String','Razorpay','Mswipe','Cash'),array('',0,0,0));
            }
        }
        
        $this->layout->view('analytics/payment_received_report',$data);
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
    
    
    public function customer_lists(){
        $this->layout->title('Customer Lists');  /*----Tab Title------*/
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model('analytics_model');
        
        $data['cust_lists'] = $this->analytics_model->getCustomerLists($company_id);
        
        $this->layout->view('analytics/customer_lists',$data);
    }
    
    public function vendor_lists(){
        $this->layout->title('Vendor Lists');  /*----Tab Title------*/
        
        $this->layout->css('css/daterangepicker.css');
        $this->layout->js('js/moment.js');
        $this->layout->js('js/daterangepicker.js');
        
        $company_id = $this->session->userdata('pos_companyid');
        
        $this->load->model('analytics_model');
        
        $data['vend_lists'] = $this->analytics_model->getVendorLists($company_id);
        //print_r($data['vend_lists']);
        $this->layout->view('analytics/vendor_lists',$data);
    }
    
    
    public function expense_report(){
        $this->layout->title('Expense Report');  /*----Tab Title------*/
        
        $this->layout->css('css/daterangepicker.css');
        $this->layout->js('js/moment.js');
        $this->layout->js('js/daterangepicker.js');
        
        $company_id = $this->session->userdata('pos_companyid');
        
        if($this->input->post()){
            $date_range = explode('-',$this->input->post('date_range'));
            $from = date("Y-m-d",strtotime(trim($date_range[0])));
            $to = date("Y-m-d",strtotime(trim($date_range[1])));
        }else{
            $from = date("Y-m-d");
            $to = date("Y-m-d");
        }    
        
        $this->load->model('analytics_model');
        
        $data['interval'] = (!empty($_POST['select_interval']))?$_POST['select_interval']:'1';
        
        $product_expense_report = $this->analytics_model->getExpenseOnProductReport($company_id,$from,$to);
        if(!empty($product_expense_report)){
            $data['jprod_exp_data'] = $this->convertDataToChartForm($product_expense_report);
        }else{
            $data['jprod_exp_data'] = array(array('product_name','sum_amount'),array('',0));
        }
        
        
        if($this->input->post('select_interval') == 2){
            $sales_expenses_byweek = $this->analytics_model->getSalesExpenseReportWeekwise($company_id,$from,$to);
            
            if(!empty($sales_expenses_byweek)){
                $data['jsales_expense_data'] = $this->convertDataToChartForm($sales_expenses_byweek);
            }else{
                $data['jsales_expense_data'] = array(array('String','Sales','Expenses'),array('',0,0));
            }
        }else if ($this->input->post('select_interval') == 3) {
            $sales_expenses_bymonth = $this->analytics_model->getSalesExpenseReportMonthwise($company_id,$from,$to);
            
            if(!empty($sales_expenses_bymonth)){
                $data['jsales_expense_data'] = $this->convertDataToChartForm($sales_expenses_bymonth);
            }else{
                $data['jsales_expense_data'] = array(array('String','Sales','Expenses'),array('',0,0));
            }
        }else{
            $sales_expenses_byday = $this->analytics_model->getSalesExpenseReportDaywise($company_id,$from,$to);
            
            if(!empty($sales_expenses_byday)){
                $data['jsales_expense_data'] = $this->convertDataToChartForm($sales_expenses_byday);
            }else{
                $data['jsales_expense_data'] = array(array('String','Sales','Expenses'),array('',0,0));
            }
        }
        
        $this->layout->view('analytics/expense_report',$data);
    }
    
    
}