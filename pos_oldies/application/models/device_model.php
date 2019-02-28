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
    
    
//    public function getDeviceUsageIdUsingCompanyId($company_id){
//        $this->db->select('device_usage_id');
//        $this->db->from('pos_device_management');
//        //$this->$db->where('company_id', $company_id);
//        $this->db->where('company_id',$company_id);
//        $query = $this->db->get();
//        //echo $this->db->last_query(); die('SS');
//        if($query->num_rows()>0)
//        {
//            $row = $query->result();
//            return $row;
//        }
//        else
//        {
//            return false;
//        }
//    }
    public function getDeviceDataUsingCompanyId($company_id){
        $this->db->select('device_id,device_name,company_id');
        $this->db->from('pos_device_management');
        $this->db->where('company_id', $company_id);
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
//        $this->db->select('pos_device_management.device_id,pos_device_management.device_name, pos_device_management.device_unique_id, pos_device_type.device_type, pos_device_usage.device_usage');
//        $this->db->from('pos_device_management');
//        $this->db->join('pos_device_type', 'pos_device_management.device_type_id = pos_device_type.device_type_id','left');
//        $this->db->join('pos_device_usage', 'pos_device_management.device_usage_id = pos_device_usage.device_usage_id OR  pos_device_management.communicate_id = pos_device_usage.device_usage_id','left');
//        $this->db->where('pos_device_management.company_id',$company_id);
        
        $this->db->select('pos_device_management.device_id, pos_device_management.company_id, pos_device_management.device_name, pos_device_management.device_unique_id,
            pos_device_type.device_type,pos_device_usage.device_usage,GROUP_CONCAT(pos_location.location_name)');
        $this->db->from('pos_device_management');
        $this->db->join('pos_device_type', 'pos_device_management.device_type_id = pos_device_type.device_type_id','left');
        $this->db->join('pos_device_usage', 'pos_device_management.device_usage_id = pos_device_usage.device_usage_id OR  pos_device_management.communicate_id = pos_device_usage.device_usage_id','left');
        $this->db->join('pos_device_location', 'pos_device_management.device_id = pos_device_location.device_id','left');
        $this->db->join('pos_location', 'pos_location.location_id = pos_device_location.location_id','left');
        $this->db->where('pos_device_management.company_id',$company_id);
        $this->db->group_by('pos_device_management.device_id'); 
        
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
    
    
    public function getDeviceLocation($device_id){
        $this->db->select('GROUP_CONCAT(location_name) AS locnames');
        $this->db->from('pos_device_location');
        $this->db->join('pos_location', 'pos_location.location_id = pos_device_location.location_id','left');
        $this->db->where('device_id',$device_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getDeviceUsingDeviceIdCompanyId($device_id,$company_id){
//        $this->db->select('pos_device_management.device_id,pos_device_management.device_name, pos_device_management.device_unique_id, pos_device_type.device_type, pos_device_usage.device_usage');
//        $this->db->from('pos_device_management');
//        $this->db->join('pos_device_type', 'pos_device_management.device_type_id = pos_device_type.device_type_id','left');
//        $this->db->join('pos_device_usage', 'pos_device_management.device_usage_id = pos_device_usage.device_usage_id OR  pos_device_management.communicate_id = pos_device_usage.device_usage_id','left');
//        $this->db->where('pos_device_management.company_id',$company_id);
//        $this->db->where('pos_device_management.device_id',$device_id);
        
        $this->db->select('pos_device_management.device_id, pos_device_management.device_name, pos_device_management.device_unique_id,pos_device_management.device_type_id,pos_device_management.device_usage_id,pos_device_management.communicate_id,
            pos_device_type.device_type,pos_device_usage.device_usage,GROUP_CONCAT(pos_location.location_id) AS loc_id');
        $this->db->from('pos_device_management');
        $this->db->join('pos_device_type', 'pos_device_management.device_type_id = pos_device_type.device_type_id','left');
        $this->db->join('pos_device_usage', 'pos_device_management.device_usage_id = pos_device_usage.device_usage_id OR  pos_device_management.communicate_id = pos_device_usage.device_usage_id','left');
        $this->db->join('pos_device_location', 'pos_device_management.device_id = pos_device_location.device_id','left');
        $this->db->join('pos_location', 'pos_location.location_id = pos_device_location.location_id','left');
        $this->db->where('pos_device_management.company_id',$company_id);
        $this->db->where('pos_device_management.device_id',$device_id);
        //$this->db->group_by('pos_device_management.device_id'); 
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()==1)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function deleteDeviceLocation($device_id,$company_id) {
        $this->db->where('device_id', $device_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_device_location'); 
    }
    
    public function deleteDevice($device_id,$company_id) {
        $this->db->where('device_id', $device_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_device_management'); 
    }
    
    public function updateDevice($updatedata,$device_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('device_id', $device_id);
        $this->db->update('pos_device_management', $updatedata); 
    }
    
    public function deleteDeviceCommunicateWith($device_id,$company_id) {
        $this->db->where('device_id', $device_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_device_communicate_with'); 
    }
    
    public function getDeviceCommunicateWith($company_id,$device_id){
        $this->db->select('GROUP_CONCAT(pos_device_management.device_id) AS device_ids,GROUP_CONCAT(pos_device_management.device_name) AS device_name,pos_device_management.company_id,');
        $this->db->from('pos_device_management');
        $this->db->join('pos_device_communicate_with', 'pos_device_communicate_with.communicate_with_id = pos_device_management.device_id','inner');
        //$this->db->join('pos_location', 'pos_location.location_id = pos_inventory_stock_location.location_id','left');
        $this->db->order_by("pos_device_management.device_id", "desc");
        
        if($company_id){
            $this->db->where('pos_device_communicate_with.company_id',$company_id);
        }
        if($device_id){
            $this->db->where('pos_device_communicate_with.device_id',$device_id);
        }
        //$this->db->group_by('pos_device_management.device_id');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function editgetDeviceCommunicateWith($company_id,$device_id){
        $this->db->select('pos_device_management.device_id,pos_device_management.device_name,pos_device_management.company_id,');
        $this->db->from('pos_device_management');
        $this->db->join('pos_device_communicate_with', 'pos_device_communicate_with.communicate_with_id = pos_device_management.device_id','inner');
        //$this->db->join('pos_location', 'pos_location.location_id = pos_inventory_stock_location.location_id','left');
        $this->db->order_by("pos_device_management.device_id", "desc");
        
        if($company_id){
            $this->db->where('pos_device_communicate_with.company_id',$company_id);
        }
        if($device_id){
            $this->db->where('pos_device_communicate_with.device_id',$device_id);
        }
        //$this->db->group_by('pos_device_management.device_id');
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
    
    
    public function getEditTimeDeviceData($company_id,$device_id){
        $this->db->select('device_id,device_name,company_id');
        $this->db->from('pos_device_management');
        $this->db->where('company_id', $company_id);
        $this->db->where('device_id !=', $device_id);
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