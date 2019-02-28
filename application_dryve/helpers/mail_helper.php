<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

//----------Manager account created by admin --- mail-------------

if (!function_exists('user_verify_account_mail')) {
    function user_verify_account_mail($to_email, $subject, $name, $verify_url) {
        $ci = & get_instance();
        
        $ci->load->library('email');
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $ci->email->initialize($config);
        $ci->email->from('admin@creativethoughtsinfo.com');
        $ci->email->to($to_email);
        $ci->email->subject($subject);
        
        $email_filename = APPPATH."../mailer/user_verify_account.php";
        $data = file_get_contents($email_filename);
        
        $replace = array("[%NAME%]", "[%VERIFYURL%]");
        $replace_with = array($name, $verify_url);
        $sentdata = str_replace($replace, $replace_with, $data);
        $ci->email->set_mailtype("html");
        $ci->email->message($sentdata);
        if($ci->email->send()){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

















//----------Forgot password OTP send (by mobile app) --- mail-------------

if (!function_exists('forgot_password_otp_mail')) {
    function forgot_password_otp_mail($to_email, $subject, $name, $otp){
        $ci = & get_instance();
        
        $ci->load->library('email');
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $ci->email->initialize($config);
        $ci->email->from('admin@creativethoughtsinfo.com');
        $ci->email->to($to_email);
        $ci->email->subject($subject);
        
        $email_filename = APPPATH."../mailer/user_forgot_password.php";
        $data = file_get_contents($email_filename);
        
        $replace = array("[%NAME%]", "[%OTP%]");
        $replace_with = array($name, $otp);
        $sentdata = str_replace($replace, $replace_with, $data);
        $ci->email->set_mailtype("html");
        $ci->email->message($sentdata);
        if($ci->email->send()){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

//----------Forgot password URL send (by admin portal) --- mail-------------

if (!function_exists('forgot_password_url_mail')) {
    function forgot_password_url_mail($to_email, $subject, $name, $url){
        $ci = & get_instance();
        
        $ci->load->library('email');
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $ci->email->initialize($config);
        $ci->email->from('admin@creativethoughtsinfo.com');
        $ci->email->to($to_email);
        $ci->email->subject($subject);
        
        $email_filename = APPPATH."../mailer/manager_forgot_password_admin.php";
        $data = file_get_contents($email_filename);
        
        $replace = array("[%NAME%]", "[%URL%]");
        $replace_with = array($name, $url);
        $sentdata = str_replace($replace, $replace_with, $data);
        $ci->email->set_mailtype("html");
        $ci->email->message($sentdata);
        if($ci->email->send()){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

