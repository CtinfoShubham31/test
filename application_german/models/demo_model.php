<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function addAudiodata($data){
        $this->db->insert('listening_audio',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function updateLstData($listening_data_id, $data) {
        $this->db->set($data);
        $this->db->where('listening_data_id', $listening_data_id);
        $res = $this->db->update('listening_data');
        return $res;
    }
    
    public function addLstdata($data){
        $this->db->insert('listening_data',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function deleteDemo($listening_data_id){
        $this->db->where('listening_data_id', $listening_data_id);
        $this->db->delete('listening_data');
    }
    
    public function deleteAudio(){
        $this->db->delete('listening_audio');
    }


    public function getListnData(){
        $this->db->select('listening_data_id,voice_type,from_time,from_millisecond,to_time,to_millisecond,text_data,text_img,audio_id');
        $this->db->from('listening_data');
        $this->db->order_by('listening_data_id');
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
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
    
    public function getCustomListeningData(){
        $this->db->select('listening_data_id AS id,text_data AS text,text_img AS img');
        $this->db->from('listening_data');
        $this->db->order_by('listening_data_id');
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
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
    
    public function getLatestAudio(){
        $query = $this->db->query("SELECT audio_path AS audio,audio_id FROM listening_audio ORDER BY audio DESC LIMIT 1");
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
    
    public function getSingleListnData($listening_data_id){
        $this->db->select('listening_data_id,voice_type,from_time,from_millisecond,to_time,to_millisecond,text_data,text_img,audio_id');
        $this->db->from('listening_data');
        $this->db->where('listening_data_id',$listening_data_id);
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
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
    
}