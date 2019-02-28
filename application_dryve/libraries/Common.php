<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Creating Custom Library in Codeigniter
class Common {
 
    function __construct()
    {
        $this->ci =& get_instance();
    }
    
    function validformdata_parameter()
    {
        if(empty($_POST)){
            $response = array("status" => array(),"response" => array());
            $response['status'] = 0;
            $response['response'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        if(empty($_POST['authkey']) || $_POST['authkey'] != "df094c0342bd72c64733012bc2b810a1"){
            $response['status'] = 0;
            $response['response'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }

    }
    
    function validrawdata_parameter()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $response = array("status" => array(),"response" => array());
        if(!isset($data) || count($data) == 0) {
            $response['status'] = 0;
            $response['response'] = 'Invalid request';
            echo json_encode($response);
            die;
        }
        else if(empty($data['authkey']) || $data['authkey'] != "df094c0342bd72c64733012bc2b810a1"){
            $response['status'] = 0;
            $response['response'] = 'Not Authorized';
            echo json_encode($response);
            die;
        }else{
            return $data;
        }
    }
 
}