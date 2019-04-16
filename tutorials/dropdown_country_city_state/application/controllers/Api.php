<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
	}
	
	public function countries()
	{	
		header("Access-Control-Allow-Origin: *");

		$countries = $this->api_model->get_countries();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($countries));
	}

	public function states($country_id)
	{	
		header("Access-Control-Allow-Origin: *");

		$states = $this->api_model->get_states($country_id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($states));
	}

	public function cities($state_id)
	{	
		header("Access-Control-Allow-Origin: *");

		$cities = $this->api_model->get_cities($state_id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($cities));
	}
}
?>