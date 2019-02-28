<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('send_notification')) {
    function send_notification($tokens, $message){
        $auth_key = 'AIzaSyCcugGb5ujUFNMz6qQZJ9zmNbxAcg1It0E';
        
	$url = 'https://fcm.googleapis.com/fcm/send';
        
        $fields = array(
            'registration_ids' => $tokens,
            'data' => $message
        );
        
        $headers = array(
            'Authorization: key='.$auth_key,
            'Content-Type: application/json'
        );
        
        $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
	if($result === FALSE)
	{
		/* die('Curl failed: ' . curl_error($ch)); */
	}
	curl_close($ch);
	
	return $result;
    }
}

