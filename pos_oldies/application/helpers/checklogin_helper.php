<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!function_exists('isAdminLogin')){
    function isAdminLogin(){
        $CI = &get_instance();
        $adminid = $CI->session->userdata('pos_adminid');
        $CI->load->database();
        $CI->load->model('common_model');
		
        $admin_existance = $CI->common_model->getAdminDataUsingId($adminid);
		
        if(!$adminid || empty($admin_existance)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}

if(!function_exists('isCompanySetupLogin')){
    function isCompanySetupLogin(){
        $CI = &get_instance();
        $companyid = $CI->session->userdata('pos_companyid');
        $adminid = $CI->session->userdata('pos_adminid');
        $CI->load->database();
        $CI->load->model('common_model');
		
        //$admin_existance = $CI->common_model->getAdminDataUsingId($adminid);
		
        if(!$companyid && !$adminid){
            return 1;
        }else if(!$companyid){
            return 2;
        }
//        if(!$companyid){
//            return FALSE;
//        }
//        else{
//            return TRUE;
//        }
    }
}

?>