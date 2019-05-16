<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->helper(array('form','common'));
        
    }
    
    public function quiz_data(){
        
        $this->load->model(array('comment_model'));
//        if($this->input->post()){
//            //print_r($_POST['question_id']);die;
//            //die;
//            for($i = 0; $i < count($_POST['quiz']); $i++)
//            {
//                $quiz = trim($_POST['quiz'][$i]);
//                $type = trim($_POST['type'][$i]);
//                
//                
//                if (!isset($_POST['ans'][$i])) {
//                    //$_POST['ans'][$i] = 0;
//                    $ans = '';
//                }else{
//                    $ans = trim($_POST['ans'][$i]);
//                }
//                
//                
//                //print_r($_POST['ans']);
//                
//                if(empty($quiz) || empty($type)|| empty($ans)){
//                    continue;
//                }
//                
//                $p_id = trim($_POST['p_id'][$i]);
//                $question_id = trim($_POST['question_id'][$i]);
//                
//                
//                
//                if(!empty($question_id)){
//                    $upData = array(
//                        'quiz'=>$quiz,
//                        'type'=>$type,
//                        'ans'=>$ans,
//                        'p_id'=>$p_id
//                    ); //print_r($upData);die;
//                    $where_array = array('quiz_id'=>$question_id);
//                    $this->comment_model->updateRecord($upData,$where_array);
//                    
//                }else{
//                    $addData = array(
//                        'quiz'=>$quiz,
//                        'type'=>$type,
//                        'ans'=>$ans,
//                        'p_id'=>$p_id
//                    );
//                    //print_r($addData);die;
//                    $this->comment_model->saveRecord($addData);
//                    
//                    $where_array = array('quiz_id'=>$p_id);
//                    $upChildData = array('hv_child'=>1);
//                    $this->comment_model->updateRecord($upChildData,$where_array);
//                }
//                
//            }
//            
//            
//        }
        
        $data['q_data'] = $this->comment_model->getQuiz();
              
        //$this->layout->view('quiz/quiz_data',$data);
        //$this->layout->view('quiz/quiz_new',$data);
        $this->load->view('quiz/quiz_go',$data);
    }
    
    
    public function add_newquiz(){
        $string = '<div id="rmv" class="post_reply wow flipInX">
                        <input type="hidden" name="p_id[]" value="0"><input type="hidden" name="question_id[]" value="">
                        <div id="mnrow" class="row">
                            <div class="col-md-12">
                                <p id="commtext">
                                    Qus
                                    <input type="text" name="quiz[]">
                                    <select name="type[]" onchange="addAnswer(this.value)">
                                        <option value="">Select Choice</option>
                                        <option value="1">Multi-line Text</option>
                                        <option value="2">Single Choice</option>
                                    </select>
                                </p>
                            </div>
                            <div id="ansbox" class="col-md-12">

                            </div>
                        </div>                              

                    </div>';
        echo $string;
        
    }
    
    public function save_data(){
        $this->load->model(array('comment_model'));
        if($this->input->post()){
            //print_r($_POST);die;
            //print_r($_POST['question_id']);die;
            //die;
            for($i = 0; $i < count($_POST['quiz']); $i++)
            {
                $quiz = trim($_POST['quiz'][$i]);
                $type = trim($_POST['type'][$i]);
                
                if (!isset($_POST['ans'][$i])) {
                    //$_POST['ans'][$i] = 0;
                    $ans = '';
                }else{
                    $ans = trim($_POST['ans'][$i]);
                }
                
                //print_r($_POST['ans']);
                
                if(empty($quiz) || empty($type)|| empty($ans)){
                    continue;
                }
                
                $p_id = trim($_POST['p_id'][$i]);
                $question_id = trim($_POST['question_id'][$i]);
                
                
                
                if(!empty($question_id)){
                    $upData = array(
                        'quiz'=>$quiz,
                        'type'=>$type,
                        'ans'=>$ans,
                        'p_id'=>$p_id
                    ); //print_r($upData);die;
                    $where_array = array('quiz_id'=>$question_id);
                    $this->comment_model->updateRecord($upData,$where_array);
                    
                }else{
                    $addData = array(
                        'quiz'=>$quiz,
                        'type'=>$type,
                        'ans'=>$ans,
                        'p_id'=>$p_id
                    );
                    //print_r($addData);die;
                    $this->comment_model->saveRecord($addData);
                    
                    $where_array = array('quiz_id'=>$p_id);
                    $upChildData = array('hv_child'=>1);
                    $this->comment_model->updateRecord($upChildData,$where_array);
                }
                
            }
            
            
        }
        
        $data['q_data'] = $this->comment_model->getQuiz();
        $this->load->view('quiz/save_data',$data);
        
    }
	
	public function testing(){
		$this->load->view('quiz/testing');
	}
	
	public function formtable(){
		$this->load->model(array('comment_model'));
		$data['udata'] = $this->comment_model->getUsers();
		
		
		$this->load->view('formtable',$data);
	}
	
	public function formtsubmit(){
		$this->load->model(array('comment_model'));
		if($_POST){
			//print_r($_POST);
			$add_data = array(
				'username'=> $_POST['username'],
				'email'=> $_POST['email']
			);
			$user_id = $this->comment_model->addUser($add_data);
			if($user_id){
				$data['udata'] = $this->comment_model->getUsers();
				$this->load->view('list_table',$data);
			}
		}
	}
    
    
}