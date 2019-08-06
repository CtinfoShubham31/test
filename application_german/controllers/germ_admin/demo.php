<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Demo extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));  // load library classes
        $this->load->helper(array('form', 'url', 'file','checkadminlogin'));  
        $this->load->model(array('admin_model'));
        $this->data['basepath'] = $this->config->item('base_url'); //assigning base path
        //$this->output->nocache();
        if (!isAdminLoginCheck()) { 
            redirect($this->config->item('base_url') . 'germ_admin/admin/logout');
        }
    }
    
    public function landing_page(){
        $this->load->view('germ_admin/main_demo');  
    }
    
    public function add_data() {
        $this->load->model(array('demo_model'));
        //$this->demo_model->deleteDemo();
        
        
        //print_r(print_r($this->session->userdata));die;
        if($this->input->post()){
            //$this->form_validation->set_rules('listening_audio','audio','required');
            
            //print_r($_FILES["text_img"]);die('kk');
            $error1=array();
            $extension1=array("mp3");
            
            $file_name1=$_FILES["listening_audio"]["name"];
                    
            $file_tmp1=$_FILES["listening_audio"]["tmp_name"];
            $ext1=pathinfo($file_name1,PATHINFO_EXTENSION);
            if(in_array($ext1,$extension1))
            {
                $filename1=basename($file_name1,$ext1);
                $newFileName1=time().".".$ext1;
                move_uploaded_file($file_tmp1=$_FILES["listening_audio"]["tmp_name"],"upload/test/".$newFileName1);
                $gdata1 = array(
                    'audio_path'=>$newFileName1
                );
                
                $get_data = $this->demo_model->getListnData();
                if(!empty($get_data)){
                    foreach($get_data AS $gtdata){
                        unlink('upload/test/'.$gtdata->text_img);
                        $this->demo_model->deleteDemo($gtdata->listening_data_id);
                    }
                    
                    //$this->demo_model->deleteAudio();
                    //$this->demo_model->deleteDemo();
                }
                    
                $audio_id = $this->demo_model->addAudiodata($gdata1);
            }
            
            //print_r($_POST);die;
            $myfile = fopen("upload/test/listening.srt", "w") or die("Unable to open file!");
            if(!empty($_POST['voice_type'])){
                $i=0;
                $z=1;
                $error=array();
                $extension=array("jpeg","jpg","png","gif");
                
                foreach($_POST['voice_type'] as $key => $lstdata){
                    
                    if(!empty($_POST['listening_data_id'][$key])){
                        $lsingle_data = $this->demo_model->getSingleListnData($_POST['listening_data_id'][$key]);
                        //echo $key;                        print_r($lsingle_data);die;
                    }
                    $txt = $z."\r\n".$_POST['from_time'][$key].",".$_POST['from_millisecond'][$key]." --> ".$_POST['to_time'][$key].",".$_POST['to_millisecond'][$key]."\r\n(".$lstdata.")".$_POST['text_data'][$key]."\r\n\r\n";
                    fwrite($myfile, $txt);
                    
                    $file_name=$_FILES["text_img"]["name"][$key];
                    
                    $file_tmp=$_FILES["text_img"]["tmp_name"][$key];
                    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                    if(!empty($file_name) && in_array($ext,$extension))
                    { //echo $key;die('eeee');
                        
                        $audio_info = $this->demo_model->getLatestAudio();
                        $audio_id = $audio_info->audio_id;
                        $filename=basename($file_name,$ext);
                        $newFileName=time()."_$key".".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["text_img"]["tmp_name"][$key],"upload/test/".$newFileName);
                    }else{ 
                        //echo $key; print_r($lsingle_data);
//                        if($key == 1){
//                            echo $key;print_r($lsingle_data);die;
//                        }
                        $audio_id = $lsingle_data->audio_id;
                        $newFileName = $lsingle_data->text_img;
                    }
                    
                    
                    $gdata = array(
                        'voice_type'=>$lstdata,
                        'from_time'=>$_POST['from_time'][$key],
                        'from_millisecond'=>$_POST['from_millisecond'][$key],
                        'to_time'=>$_POST['to_time'][$key],
                        'to_millisecond'=>$_POST['to_millisecond'][$key],
                        'text_data'=>"(".$lstdata.")".$_POST['text_data'][$key],
                        'text_img'=>$newFileName,
                        'audio_id'=>$audio_id
                    );
                    //print_r($gdata);
                    if(!empty($_POST['listening_data_id'][$key])){
                        $this->demo_model->updateLstData($_POST['listening_data_id'][$key], $gdata);
                    }else{
                       $this->demo_model->addLstdata($gdata); 
                    }
                    
                    

                    $i++;
                    $z++;
                } 
            }
            
            redirect($this->config->item('base_url') . 'germ_admin/demo/landing_page');
            
        }
        else{
            $data['get_listening_data'] = $this->demo_model->getListnData();
            //print_r($data['get_listening_data']);die('www');
            if(!empty($data['get_listening_data'])){
                $data['count'] = COUNT($data['get_listening_data']);
            }else{
                $data['count'] = 1;
            }
            $data['get_audio_data'] = $this->demo_model->getLatestAudio();
            //print_r($data['get_audio_data']);die('WWW');
            $this->load->view('germ_admin/add_data',$data);	
        }
    }
    
    public function delete_listen_info(){
        if($this->input->post()){
            $listening_data_id = $this->input->post('listening_data_id');
            $this->load->model(array('demo_model'));
            $this->demo_model->deleteDemo($listening_data_id);
            echo 'true';
        }else{
            echo 'false';
        }
    }
    
    
    
    
    
}