<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('blog_model');
  }
  
  public function posts()
  {
    header("Access-Control-Allow-Origin: *");
    
    $posts = $this->blog_model->get_posts();
    
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($posts));
  }
  
  public function createPost()
  {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
    header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');
    
    $blogpost = json_decode(file_get_contents('php://input'), true);
    
    if( ! empty($blogpost)) {

      $title = $blogpost['title'];
      $description = $blogpost['description'];
      $author = $blogpost['author'];

      $blogdata = array(
        'title' => $title,
        'description' => $description,
        'author' => $author,
        'active' => 1,
        'created_at' => date('Y-m-d H:i:s', time())
      );
      
      $id = $this->blog_model->insert_post($blogdata);
      
      $response = $this->blog_model->get_post($id);
    }
    else {
      $response = array();
    }
    
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }
}
?>