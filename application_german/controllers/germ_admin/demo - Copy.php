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
                    
                    $txt = $z."\r\n".$_POST['from_time'][$i].",".$_POST['from_millisecond'][$i]." --> ".$_POST['to_time'][$i].",".$_POST['to_millisecond'][$i]."\r\n(".$lstdata.")".$_POST['text_data'][$i]."\r\n\r\n";
                    fwrite($myfile, $txt);
                    
                    $file_name=$_FILES["text_img"]["name"][$key];
                    
                    $file_tmp=$_FILES["text_img"]["tmp_name"][$key];
                    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                    if(in_array($ext,$extension))
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=time()."_$i".".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["text_img"]["tmp_name"][$key],"upload/test/".$newFileName);
                    }
                    
                    
                    $gdata = array(
                        'voice_type'=>$lstdata,
                        'from_time'=>$_POST['from_time'][$i],
                        'from_millisecond'=>$_POST['from_millisecond'][$i],
                        'to_time'=>$_POST['to_time'][$i],
                        'to_millisecond'=>$_POST['to_millisecond'][$i],
                        'text_data'=>$_POST['text_data'][$i],
                        'text_img'=>$newFileName,
                        'audio_id'=>$audio_id
                    );
                    
                    $this->demo_model->addLstdata($gdata);   //Add data into purchase order transaction table

                    $i++;
                    $z++;
                }
            }
            
            redirect($this->config->item('base_url') . 'germ_admin/demo/landing_page');
            
        }
        else{
            $this->load->view('germ_admin/add_data');	
        }
    }
    
    
    
    
    
}