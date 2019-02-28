<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getNotification($notif_arr,$page=''){
        $this->db->select(''.NOTIFICATION.'.notification_id, '.NOTIFICATION.'.company_id, '.NOTIFICATION.'.post_id, '.NOTIFICATION.'.notification_msg,
            '.NOTIFICATION.'.notify_by, '.NOTIFICATION.'.created_date, '.NOTIFICATION.'.label_id, '.NOTIFICATION.'.label_btn_status,
            '.POST.'.title, '.USER.'.first_name, '.USER.'.last_name, '.LABEL.'.label_name ');
        $this->db->from(''.NOTIFICATION.'');
        $this->db->join(''.USER.'', ''.NOTIFICATION.'.notify_by = '.USER.'.user_id','LEFT');
        $this->db->join(''.POST.'', ''.POST.'.post_id = '.NOTIFICATION.'.post_id','LEFT');
        $this->db->join(''.LABEL.'', ''.LABEL.'.label_id = '.NOTIFICATION.'.label_id','LEFT');
        $this->db->where($notif_arr);
        if($page){
            $start = ($page-1)*NOTIF_LIMIT;
            $this->db->limit(NOTIF_LIMIT, $start);
        }
        $this->db->order_by(''.NOTIFICATION.'.created_date','DESC');
        
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0){
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function updateNotification($update_notif,$where_notif){
        $this->db->where($where_notif);
        $res = $this->db->update(''.NOTIFICATION.'', $update_notif);
        //echo $this->db->last_query();die('QQQW');
        return $res;
    }
    
    
    
}