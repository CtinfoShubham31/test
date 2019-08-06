<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('isAdminLogin')){
    function isAdminLogin(){
        $CI = &get_instance();
        $adminid = $CI->session->userdata('admin_id');
        if(!$adminid){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}

if(!function_exists('isAdminLoginCheck')){
    function isAdminLoginCheck(){
        $CI = &get_instance();
        $adminid = $CI->session->userdata('germ_admin_id');
        if(!$adminid){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}
?>