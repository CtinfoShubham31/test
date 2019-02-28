<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------User model------------------

class Book_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
    public function addRatingOnBooking($data){
        $data = $this->db->escape_str($data);
        
        $res = $this->db->insert('dw_booking_ratings', $data);
        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    public function getRatingReviewOnBooking($book_space_id){
        $this->db->select('dw_users.first_name, dw_users.last_name, dw_booking_ratings.rating, dw_booking_ratings.review');
        $this->db->from('dw_booking_ratings');
        $this->db->join('dw_users', 'dw_users.user_id = dw_booking_ratings.space_owner_userid','inner');
        $this->db->where('dw_booking_ratings.book_space_id',$book_space_id);
        
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
    
    public function checkRatingOnBookingUser($rent_space_id,$book_space_id){
        $this->db->select('booking_rating_id, space_owner_userid, rent_space_id, book_space_userid, book_space_id, rating, review, datetime');
        $this->db->from('dw_booking_ratings');
        $this->db->where('rent_space_id',$rent_space_id);
        $this->db->where('book_space_id',$book_space_id);
        
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
    
}