<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('mealAvailabilityByDays')){
    function mealAvailabilityByDays($user_id,$meal_id,$days_id,$time_type){
        $CI = &get_instance();
        //$userid = $CI->session->userdata('dstm_uid');
        $CI->load->database();
        $CI->load->model('meal_model');
	$result_time = '';
        $get_availablity = $CI->meal_model->getSingleRowMealAvailability($user_id,$meal_id,$days_id,$time_type);
        //print_r($get_availablity);
        if(!empty($get_availablity->open_time) && $time_type == 'open_time'){
            $result_time = $get_availablity->open_time;
            return $result_time;
        }elseif(!empty($get_availablity->close_time) && $time_type == 'close_time'){ 
            $result_time = $get_availablity->close_time;
            return $result_time;
        }
		
        
    }
}

if(!function_exists('mealTimeReturn')){
    function mealTimeReturn($i){
        $CI = &get_instance();
	if($i % 12){
            $t = $i % 12; 
            $time = $t.':00'; 
        }else{ 
            $time = '12:00'; 
        } 
        if($i >= 12){
            return $time.' pm';
        }else{
            return $time.' am';
        }
    }
}


if(!function_exists('getPercentageApplicable')){
    function getPercentageApplicable($tax_id){
        
        $CI = &get_instance();
        $company_id = $CI->session->userdata('pos_companyid');
        $CI->load->database();
        $CI->load->model('taxdiscount_model');
        
        $get_tax_percentage_from = $CI->taxdiscount_model->getTaxPercentageUsingTaxIdCompanyId($tax_id,$company_id);
        if(!empty($get_tax_percentage_from)){
            foreach($get_tax_percentage_from as $tpf){
                echo "<tr>
                            <td>".$tpf->percentage."% </td>
                            <td> ".date('m/d/Y H:i:s',strtotime($tpf->applicable_from))."</td>
                        </tr>
                    ";
            }
        }
        
	
    }
}


?>