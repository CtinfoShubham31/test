<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');


if(!function_exists('replayQuiz')){
    function replayQuiz($parent_id){
        $CI = &get_instance();
        $CI->load->database();
        $CI->load->model('comment_model');

        
        $comment_data = $CI->comment_model->getQuizByPid($parent_id);
        
        $string = '';
        if(!empty($comment_data)){
            foreach ($comment_data as $comm) {
                $selected1='';$selected2='';$selected3='';$sel_disb='';
                if($comm->type){
                    $sel_disb = "style='pointer-events: none;'";
                }
                if($comm->type == 1){ 
                    $selected1 = "selected";
                }
                else if($comm->type == 2){
                    $selected2 = "selected";
                }
                else if($comm->type == 3){
                    $selected3 = "selected";
                }
                
                $string .= ' <input type="hidden" name="question_id[]" id="question_id" value="'.$comm->quiz_id.'">
                    <input type="hidden" name="p_id[]" value="'.$comm->p_id.'">
                        <div class="post_reply_inner wow flipInX" id="rmv'.$comm->quiz_id.'">
                    
                <div class="row" id="mnrow'.$comm->quiz_id.'">
                    <div class="col-md-12">
                        <p id="commtext'.$comm->quiz_id.'">
                            Qus
                            <input type="text" name="quiz[]" value="'.$comm->quiz.'">
                            <select name="type[]" '.$sel_disb.' onchange="addAnswer('.$comm->quiz_id.',this.value)">
                                <option value="">Select Choice</option>
                                <option '.$selected1.' value="1">Multi-line Text</option>
                                <option '.$selected2.' value="2">Single Choice</option>
                            </select>
                        </p>

                    </div>';
                
                $string .= '<div class="col-md-12">
                        <p id="ansbox'.$comm->quiz.'">';
                            if($comm->type == 2){
                $string .= 'Ans <input type="text" name="ans[]" value="'.$comm->ans.'">';
                            }else if($comm->type == 1){
                $string .= 'Ans <textarea name="ans[]">'.$comm->ans.'</textarea> ';      
                            }
                            
                
                $string .= '</p>';
                if(empty($comm->hv_child)){
                    $string .= '<a href="javascript:void(0)" id="btd'.$comm->quiz_id.'" onclick="addNewQuiz('.$comm->quiz_id.',this.value)"><i class="fa fa-plus" title="Add" style="cursor: pointer;"></i></a>&nbsp;add sub question';
                }
                $string .= '

                    </div>
                    

                </div>';

                
                $string .= replayQuiz($comm->quiz_id);
                $string .= '</div>';    
            }

        }

        return $string;
    }
}

