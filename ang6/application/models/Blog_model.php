<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function get_posts()
  {
    $query = $this->db->get('blogs');
    
    if($query->num_rows() > 0){
      return $query->result();
    }
  }
  
  public function get_post($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('blogs');
    return $query->row();
  }
  
  public function insert_post($blogdata)
  {
    $this->db->insert('blogs', $blogdata);
    return $this->db->insert_id();
  }
}
?>