<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function addDeviceManagement($data){
        $this->db->insert('pos_device_management',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function getDeviceType(){
        $this->db->select('device_type_id,device_type');
        $this->db->from('pos_device_type');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    /*Get Interactive device data*/
    public function getDeviceUsage(){
        $this->db->select('device_usage_id,device_usage');
        $this->db->from('pos_device_usage');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function addDeviceCommunicateWith($data){
        $this->db->insert('pos_device_communicate_with',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addDeviceLocation($data){
        $this->db->insert('pos_device_location',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    /*Get from device management table device usage id column*/
    public function getCommunicateWithData($array_interactive_id){
        $this->db->select('device_usage_id,device_usage');
        $this->db->from('pos_device_usage');
        $this->db->where_in('device_usage_id', $array_interactive_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getDeviceUsageIdUsingCompanyId($company_id){
        $this->db->select('device_usage_id');
        $this->db->from('pos_device_management');
        //$this->$db->where('company_id', $company_id);
        $this->db->where('company_id',$company_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function displayDeviceDetails($company_id){
        $this->db->select('pos_device_management.device_id,pos_device_management.device_name, pos_device_management.device_unique_id, pos_device_type.device_type, pos_device_usage.device_usage');
        $this->db->from('pos_device_management');
        $this->db->join('pos_device_type', 'pos_device_management.device_type_id = pos_device_type.device_type_id','left');
        $this->db->join('pos_device_usage', 'pos_device_management.device_usage_id = pos_device_usage.device_usage_id OR  pos_device_management.communicate_id = pos_device_usage.device_usage_id','left');
        $this->db->where('pos_device_management.company_id',$company_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
}