<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!function_exists('isUserLogin')){
    function isUserLogin(){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('dways_user_id');
        $CI->load->database();
        $CI->load->model('web_models/common_model');
		
        $user_existance = $CI->common_model->getIndividualUserDetails($user_id);
		
        if(!$user_id || empty($user_existance)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}
