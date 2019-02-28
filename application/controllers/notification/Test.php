<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model(array('common_model'));
        $this->load->helper(array('form','common'));
        $this->output->nocache();
        if(!isUserLogin()) { 
            redirect($this->config->base_url().'home/logout');
        }
    }
    
    public function calendar(){
        $this->layout->view('notification/calendar');
    }
    
    public function vo(){
        $arr = checkPostVisibility(72);
        print_r($arr);
    }
    
    public function visibility(){
        $company_id = $this->session->userdata('kaseidon_company_id');
        $user_id = $this->session->userdata('kaseidon_user_id');
        $visible_to = '';
        $tagged_labels = '';
        $post_visibility = array();
        
        $this->load->model('table_model');
        $post_id = '39';
        $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $post_info = $this->table_model->getIndividualPosts($post_array);
        
        if(!empty($post_info->co_owners)){
            $visible_to .= $post_info->co_owners.',';
        }
         
        if($post_info->post_override!=1 && $post_info->visibility){
            $visible_to .= $post_info->visibility.','; 
        }
        
        if(!empty($post_info->tagged_labels)){
            $tagged_labels = explode(',',$post_info->tagged_labels);
            if(!empty($tagged_labels)){
                $i = 1;
                foreach($tagged_labels AS $tglab){
                    //echo '('.$tglab.' ,)';
                    $label_info = $this->table_model->getIndividualLabel($tglab);
                    if(!empty($label_info->inherit_visibility)){ 
                        $visible_to .= $label_info->visible_to.',';
                    }else{
                        $visible_to .= $label_info->visible_to.',';
                        $label_parentinfo = $this->table_model->getIndividualLabel($label_info->label_parent_id);
                        if(!empty($label_parentinfo)){
                            $visible_to .= $label_parentinfo->visible_to.',';
                        }
                    }
                    $i++;
                }
            }
        }
        
        //echo $visible_to;
        //print_r($post_visibility);die('AAA');
        if($visible_to){
            $post_visibility = explode(',',rtrim($visible_to,','));
        }
        //print_r($post_visibility);die('AAA');
        //array_push($post_visibility,$user_id);
        //print_r(array_unique($post_visibility));
        
        if(!empty($post_visibility)){
            array_push($post_visibility,$post_info->post_creator_id);
        }
        
        $post_view = array_unique($post_visibility);
        if(!empty($post_view)){
            print_r($post_view);
        }else{
            echo 'All';
        }
        //print_r($post_visibility);die('AAAAA');
        
    }
    
    
    public function lazy(){
        $this->layout->view('notification/lazy');
    }
    
    
}