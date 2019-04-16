<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_model {

	public function get_countries()
	{
		$query = $this->db->get('countries');
		return $query->result();
	}

	public function get_states($country_id)
	{
		$this->db->select('id, state_name');
		$this->db->where('country_id', $country_id);
		$query = $this->db->get('states');
		return $query->result();
	}

	public function get_cities($state_id)
	{
		$this->db->select('id, city_name');
		$this->db->where('state_id', $state_id);
		$query = $this->db->get('cities');
		return $query->result();
	}
}
?>