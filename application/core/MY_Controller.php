<?php
class MY_Controller extends CI_Controller  {
   // Site global layout
   public $layout_view = 'layout/default';
 
   function __construct() {
      parent::__construct();
      // Layout library loaded site wide
      $this->load->library('layout'); 
 
      // Site global resources
      //$this->layout->js('js/jquery.min.js');
      //$this->layout->css('css/site.css');
   }
}