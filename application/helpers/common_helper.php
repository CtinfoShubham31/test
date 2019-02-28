<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!function_exists('isUserLogin')){
    function isUserLogin(){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $CI->load->database();
        $CI->load->model('common_model');
        
	$company_id = $CI->session->userdata('kaseidon_company_id');	
        $user_existance = $CI->common_model->getIndividualUserDetails($user_id,$company_id,1);
		
        if(!$user_id || empty($user_existance)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}

if(!function_exists('shortText')){
    function shortText($text,$length){
        $short_txt = strlen($text) > $length ? substr($text,0,$length)."..." : $text;
        return $short_txt;
    }
}


if(!function_exists('labelTree')){
    function labelTree($parent_id = 0, $sub_mark = '',$pid=''){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $CI->load->database();
        $CI->load->model('common_model');
		
        $result = $CI->common_model->getLabels($parent_id);
        if(!empty($result)){
            foreach($result as $label_data){
                //echo '<option value="'.$label_data->label_id.'" >'.$sub_mark.$label_data->label_name.'</option>';
                
                //$thread = $CI->common_model->teeLabels($label_data->label_id);
                //$nest = rtrim($CI->common_model->teeLabels($label_data->label_id),"/");
                //explode("/",)
                if($pid == $label_data->label_id){
                    echo '<option selected value="'.$label_data->label_id.'">'.$sub_mark.$label_data->label_name.'</option>';
                }else{
                    echo '<option value="'.$label_data->label_id.'" >'.$sub_mark.$label_data->label_name.'</option>';
                }
                //labelTree($label_data->label_id, $sub_mark.'&nbsp;');
                if($pid){
                    //labelTree($label_data->label_id, $sub_mark+20, $pid);
                    labelTree($label_data->label_id, $sub_mark.'&nbsp;&nbsp;&nbsp;', $pid);
                    
                    //labelTree($label_data->label_id, $sub_mark.'---', $pid);
                }else{
                    //labelTree($label_data->label_id, $sub_mark+20);
                    labelTree($label_data->label_id, $sub_mark.'&nbsp;&nbsp;&nbsp;');
                    
                    //labelTree($label_data->label_id, $sub_mark.'---');
                }
            }
        }
        
    }
}

//if(!function_exists('neatSearch')){
//    function neatSearch($parent_id = 0, $sub_mark = '',$pid=''){
//        $CI = &get_instance();
//        $user_id = $CI->session->userdata('kaseidon_user_id');
//        $CI->load->database();
//        $CI->load->model('common_model');
//		
//        $result = $CI->common_model->getLabels($parent_id);
//        if(!empty($result)){
//            foreach($result as $label_data){
//                //echo '<option value="'.$label_data->label_id.'" >'.$sub_mark.$label_data->label_name.'</option>';
//                
//                //$thread = $CI->common_model->teeLabels($label_data->label_id);
//                $nest = rtrim($CI->common_model->teeLabels($label_data->label_id),"/");
//                //explode("/",)
//                if($pid == $label_data->label_id){
//                    echo '<option selected value="'.$label_data->label_id.'">'.$sub_mark.$label_data->label_name.'  ('.$nest.')</option>';
//                }else{
//                    echo '<option value="'.$label_data->label_id.'" >'.$sub_mark.$label_data->label_name.'  ('.$nest.')</option>';
//                }
//                //labelTree($label_data->label_id, $sub_mark.'&nbsp;');
//                if($pid){
//                    neatSearch($label_data->label_id, $sub_mark.'&nbsp;&nbsp;&nbsp;', $pid);
//                    //labelTree($label_data->label_id, $sub_mark+20, $pid);
//                }else{
//                    neatSearch($label_data->label_id, $sub_mark.'&nbsp;&nbsp;&nbsp;');
//                    //labelTree($label_data->label_id, $sub_mark+20);
//                }
//            }
//        }
//        
//    }
//}

if(!function_exists('getUsers')){
    function getUsers($user_array = ''){
        $CI = &get_instance();
        //$user_id = $CI->session->userdata('kaseidon_user_id');
        $CI->load->database();
        $CI->load->model('common_model');
		
        $result = $CI->common_model->getAllUsersBasicInfo($user_array);
        if(!empty($result)){
            foreach($result as $label_data){
                //echo '<option value="'.$label_data->label_id.'" >'.$sub_mark.$label_data->label_name.'</option>';
                echo '<option value="'.$label_data->label_id.'" style="padding-left:'.$sub_mark.'px">'.$label_data->label_name.'</option>';
                //labelTree($label_data->label_id, $sub_mark.'&nbsp;');
                labelTree($label_data->label_id, $sub_mark+20);
            }
        }
        
    }
}
  
if(!function_exists('taggedLabels')){
    function taggedLabels($label_id){
        if($label_id){
            
            $CI = &get_instance();
            //$user_id = $CI->session->userdata('kaseidon_user_id');
            $CI->load->database();
            $CI->load->model('post_model');
            $label_name = '';
            $single_label_details = $CI->post_model->getIndividualLabel($label_id);
            //print_r($single_label_details);
            $string = '';
            if(!empty($single_label_details->label_parent_id)){
                $string .= $single_label_details->label_name.'/';
                $new_label_id = $single_label_details->label_parent_id;
                taggedLabels($new_label_id);

            }
            else{
                if(!empty($single_label_details->label_name)){
                    $string .= $single_label_details->label_name.'/';
                }
            }

            echo $string;
        }
    }
}    

if(!function_exists('coOwners')){
    function coOwners($user_id_string){
        if($user_id_string){
            
            $CI = &get_instance();
            //$user_id = $CI->session->userdata('kaseidon_user_id');
            $CI->load->database();
            $CI->load->model('user_model');
            
            $users_array = explode(',', $user_id_string);
            $string = '';
            if(!empty($users_array)){
                $get_co_own = $CI->user_model->getCoOwners($users_array);
                if(!empty($get_co_own)){
                    foreach($get_co_own AS $cown){
                        $string .= '<span class="co-owner-box" cowid="'.$cown->user_id.'"> '.$cown->first_name.' '.$cown->last_name.' </span>';
                    }
                }
            }
            
            echo $string;
        }
    }
}

if(!function_exists('helpfulCount')){
    function helpfulCount($post_id,$helpful_type){
        if($post_id && $helpful_type){
            
            $CI = &get_instance();
            //$user_id = $CI->session->userdata('kaseidon_user_id');
            $CI->load->database();
            $CI->load->model('post_model');
            
            $helpful_array = array('post_id'=>$post_id,'helpful_type'=>$helpful_type);
            
            $get_helpful_data = $CI->post_model->getHelpfulPosts($helpful_array);
            $helpcount = 0;
            if(!empty($get_helpful_data)){
                $helpcount = COUNT($get_helpful_data); 
            }
            
            return $helpcount;
        }
    }
}

if(!function_exists('followedCount')){
    function followedCount($post_id){
        if($post_id){
            
            $CI = &get_instance();
            //$user_id = $CI->session->userdata('kaseidon_user_id');
            $CI->load->database();
            $CI->load->model('post_detail_model');
            
            $follow_array = array(''.FOLLOWED_POST.'.post_id'=>$post_id);
            $followed_result = $CI->post_detail_model->getFollowedPosts($follow_array,'Multiple');
            $follow_count = !empty($followed_result) ? COUNT($followed_result) : 0;
            
            return $follow_count;
        }
    }
}

if(!function_exists('viwedCount')){
    function viwedCount($post_id){
        if($post_id){
            
            $CI = &get_instance();
            //$user_id = $CI->session->userdata('kaseidon_user_id');
            $CI->load->database();
            $CI->load->model('post_detail_model');
            
            $view_array = array(''.VIEWED_POST.'.post_id'=>$post_id);
            $viewed_result = $CI->post_detail_model->getViewedPosts($view_array,'Multiple');
            
            $view_count = !empty($viewed_result) ? COUNT($viewed_result) : 0;
            
            return $view_count;
        }
    }
}


if(!function_exists('replayComment')){
    function replayComment($parent_id,$post_id){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model('comment_model');

        $comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id,''.COMMENT.'.parent_comment_id'=>$parent_id);
        $comment_data = $CI->comment_model->getComment($comment_array);
        
        $string = '';
        if(!empty($comment_data)){
            foreach ($comment_data as $comm) {
                $string .= '<div class="post_reply_inner wow flipInX" id="rmv'.$comm->comment_id.'">
                <div class="row">
                    <div class="col-md-12">
                        <h3>'.$comm->first_name.'</h3>
                        <small>'.$comm->created_date.'</small>
                        <p id="commtext'.$comm->comment_id.'">'.$comm->comment.'</p>
                        <div class="reply-icon">
                           <a href="javascript:void(0)">';
            
                           
                            if($comm->commented_by == $user_id){
                            $string .= '    
                                <i onclick="updateCommentOn('.$comm->comment_id.')" class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>&nbsp;
                                <i onclick="deleteComment('.$comm->comment_id.')" class="fa fa-trash" data-placement="top" title="Delete"></i>&nbsp;';
                            }else{
                            $string .= '
                                <i onclick="repCommentOn('.$comm->comment_id.')" class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="Reply"></i>&nbsp;';
                            }
                            $string .= '    
                           </a>
                        </div>';
                            
                        if($comm->commented_by == $user_id){    
                        $string .='
                        <div class="comment-toggle" id="comment_toggle'.$comm->comment_id.'">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc'.$comm->comment_id.'" placeholder="Description">'.$comm->comment.'</textarea>
                            </div>
                            <div class="form-group">
                                <button onclick="upComment('.$comm->comment_id.','.$comm->post_id.','.$comm->post_creator_id.')" class="btn btn-primary" required="required">Update</button>
                                <a href="javascript:;" class="btn newpost_btn" onclick="updateCommentOn('.$comm->comment_id.')">Cancel</a>    
                            </div>
                        </div>';
                        }else{
                            $string .='
                        <div class="comment-toggle" id="comment_toggle'.$comm->comment_id.'">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <textarea class="form-control" rows="5" name="shot_desc" id="shot_desc'.$comm->comment_id.'" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <button onclick="reComment('.$comm->comment_id.','.$comm->post_id.','.$comm->post_creator_id.')" class="btn btn-primary" required="required">Submit</button>
                                <a href="javascript:;" class="btn newpost_btn" onclick="repCommentOn('.$comm->comment_id.')">Cancel</a>    
                            </div>
                        </div>';
                        }
                        $string .='
                    </div>
                </div>
                ';
                $string .= replayComment($comm->comment_id,$comm->post_id);
                $string .= '</div>';    
            }

        }

        return $string;
    }
}

if(!function_exists('commentCount')){
    function commentCount($post_id){
        if($post_id){
            
            $CI = &get_instance();
            //$user_id = $CI->session->userdata('kaseidon_user_id');
            $company_id = $CI->session->userdata('kaseidon_company_id');
            $CI->load->database();
            $CI->load->model('comment_model');
            
            $comment_array = array(''.COMMENT.'.post_id'=>$post_id,''.COMMENT.'.company_id'=>$company_id);
            $comment_data = $CI->comment_model->getComment($comment_array);
            $comment_count = !empty($comment_data) ? COUNT($comment_data) : 0;
            
            return $comment_count;
        }
    }
}


if(!function_exists('nestedLables')){
    function nestedLables(){
        $CI = &get_instance();
        //$user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model(array('post_model','common_model'));

        $strg = '<div class="col-md-12">
                    <ul class="cd-accordion-menu animated">';

        $label_array = array(''.LABEL.'.label_parent_id'=>0,''.LABEL.'.company_id'=>$company_id);
        //$label_array = array(''.LABEL.'.label_id'=>24,''.LABEL.'.company_id'=>$company_id);
        //$tree_label = $CI->post_model->getTreeLabels($label_array,5);
        $tree_label = $CI->post_model->getTreeLabels($label_array);
        if(!empty($tree_label)){ 
           // $strg .= '<ul class="cd-accordion-menu animated">';
            foreach($tree_label AS $tlab){

                $label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$tlab->label_id);
                $label_data2 = $CI->post_model->getTreeLabels($label_array2);
                
                //$label_creator = $CI->common_model->getIndividualUserDetails($tlab->label_creator_id);
                //print_r($label_creator);die('EEEEEEE');
                if(!empty($tlab->visible_to)){
                    $lab_color = 'label_color';
                    $eye_icon = '<i rel="popover" labid="'.$tlab->label_id.'" class="fa fa-eye view-list-icon"></i>';
                }else{
                    $lab_color = '';
                    $eye_icon = '';
                }
                $strg .= '<li class="has-children" title="'.$tlab->first_name.''.$tlab->last_name.'">
                <input type="checkbox" name="group-'.$tlab->label_id.'" id="group-'.$tlab->label_id.'">
                <label for="group-'.$tlab->label_id.'" class="label-title relative '.$lab_color.'">
                    <span>'.$tlab->label_name.'</span> '.$eye_icon.'<i class="fa fa-search label-search-icon" title="Search Label" onclick="searchLabel('."'".$tlab->label_id."'".')"></i>'; 
                
                if(!empty($label_data2)){
                    $strg .= '<span class="badge" title="">'.COUNT($label_data2).'</span>';
                }    
                $strg .= '</label>';
                //$label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$tlab->label_id);
                //$label_data2 = $CI->post_model->getTreeLabels($label_array2);
                if(!empty($label_data2)){
                    $strg .= '<ul>';
                    $strg .= $CI->post_model->treeLabels($tlab->label_id);
                    $strg .= '</ul>';
                }
                    $strg .= '</li>';
            }
        }
        
            $strg .= '</ul>
                </div>';
        return $strg;
        
    }
}


//if(!function_exists('nestedLablesPopup')){
//    function nestedLablesPopup(){
//        $CI = &get_instance();
//        //$user_id = $CI->session->userdata('kaseidon_user_id');
//        $company_id = $CI->session->userdata('kaseidon_company_id');
//        $CI->load->database();
//        $CI->load->model('post_model');
//
//        $strg = '<div class="col-md-12">
//                    <ul class="cd-accordion-menu animated" id="mylabel">';
//
//        $label_array = array(''.LABEL.'.label_parent_id'=>0,''.LABEL.'.company_id'=>$company_id);
//        //$label_array = array(''.LABEL.'.label_id'=>24,''.LABEL.'.company_id'=>$company_id);
//        $tree_label = $CI->post_model->getTreeLabels($label_array);
//        if(!empty($tree_label)){ 
//           // $strg .= '<ul class="cd-accordion-menu animated">';
//            
//            foreach($tree_label AS $tlab){
//                $label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$tlab->label_id);
//                $label_data2 = $CI->post_model->getTreeLabels($label_array2);
//                
//                $strg .= '<li class="has-children" >
//                <input type="checkbox" name="group-'.$tlab->label_id.'" id="group-'.'0'.$tlab->label_id.'">
//                <label for="group-'.'0'.$tlab->label_id.'" class="label-title">
//                    <span data-toggle="tooltip" data-placement="top" title="'.$tlab->label_name.'">'.$tlab->label_name.'</span>'; 
//                if(!empty($label_data2)){
//                    $strg .= '<span class="badge">'.COUNT($label_data2).'</span>';
//                }  
//                $strg .= '</label>';
//                $label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$tlab->label_id);
//                $label_data2 = $CI->post_model->getTreeLabels($label_array2);
//                if(!empty($label_data2)){
//                    $strg .= '<ul>';
//                    $strg .= $CI->post_model->treeLabelsPopup($tlab->label_id);
//                    $strg .= '</ul>';
//                }
//                    $strg .= '</li>';
//            }
//        }
//        
//            $strg .= '</ul>
//                </div>';
//        return $strg;
//        
//    }
//}


if(!function_exists('manageLables')){
    function manageLables($label_creator_id){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model('post_model');
        
        $usrdata = $CI->post_model->getsingleUserDetails($user_id,$company_id);

        $strg = '<div class="col-md-12">
                    <ul class="cd-accordion-menu animated" id="mylabel">';

        //$label_array = array(''.LABEL.'.label_parent_id'=>0,''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_creator_id'=>$label_creator_id);
        //$label_array = array(''.LABEL.'.label_id'=>24,''.LABEL.'.company_id'=>$company_id);
        $label_array = array(''.LABEL.'.label_parent_id'=>0,''.LABEL.'.company_id'=>$company_id);
        $tree_label = $CI->post_model->getTreeLabels($label_array);
        if(!empty($tree_label)){ 
           // $strg .= '<ul class="cd-accordion-menu animated">';
            $b = 1;
            foreach($tree_label AS $tlab){
                //$label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$tlab->label_id,''.LABEL.'.label_creator_id'=>$label_creator_id);
                $label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$tlab->label_id);
                $label_data2 = $CI->post_model->getTreeLabels($label_array2);
                if($b%2 == 0){
                    $label_class = 'right-half';
                }
                else{
                    $label_class = 'left-half';
                }
                
                if(!empty($tlab->visible_to)){
                    $lab_color = 'label_color';
                }else{
                    $lab_color = '';
                }
                
                $strg .= '<li id="delt'.$tlab->label_id.'" class="has-children '.$label_class.'" data-toggle="tooltip" data-placement="top" title="'.$tlab->first_name.''.$tlab->last_name.'">
                <input type="checkbox" name="group-'.$tlab->label_id.'" id="group-'.'0'.$tlab->label_id.'">
                <label for="group-'.'0'.$tlab->label_id.'" class="label-title '.$lab_color.'">
                     <span>'.$tlab->label_name.' </span>'; 
                if(!empty($label_data2)){
                    $strg .= '<span class="badge">'.COUNT($label_data2).'</span>';
                    
                    
                    
                    if($tlab->label_creator_id == $user_id){
                        $strg .= '<div class="edit-tag"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-random" title="Merge Label" onclick="mergeLabel('.$tlab->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i><i data-toggle="modal" data-target="#edit_label" onclick="editManageLabel('.$tlab->label_id.')" class="fa fa-pencil" title="Edit Label"></i>
                            <i class="fa fa-trash" title="Delete Label" onclick="delete_label('.$tlab->label_id.')"></i></div>';
                    }
                    else if(!empty($usrdata) && $usrdata->is_super_user){
                        $strg .= '<div class="edit-tag"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-random" title="Merge Label" onclick="mergeLabel('.$tlab->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i>
                            </div>';
                    }
                    
                }else{
                    if($tlab->label_creator_id == $user_id){
                        $strg .= '<div class="edit-tag edit-tag2"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-random" title="Merge Label" onclick="mergeLabel('.$tlab->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i><i title="Edit Label" class="fa fa-pencil" data-toggle="modal" data-target="#edit_label" onclick="editManageLabel('.$tlab->label_id.')"></i><i class="fa fa-trash" onclick="delete_label('.$tlab->label_id.')" title="Delete Label" data-original-title="Delete"></i></div>';
                    }
                    else if(!empty($usrdata) && $usrdata->is_super_user){
                        $strg .= '<div class="edit-tag"><span data-toggle="modal" data-target="#manage_label"></span><i class="fa fa-random" title="Merge Label" onclick="mergeLabel('.$tlab->label_id.')" data-toggle="modal" data-target="#edit_label" aria-hidden="true"></i>
                            </div>';
                    }
                }    
                $strg .= '</label>';
                //$label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$tlab->label_id);
                //$label_data2 = $CI->post_model->getTreeLabels($label_array2);
                if(!empty($label_data2)){
                    $strg .= '<ul>';
                    $strg .= $CI->post_model->treeLabelsPopup($tlab->label_id,$label_creator_id);
                    $strg .= '</ul>';
                }
                    $strg .= '</li>';
                    $b++;
            }
        }
        
            $strg .= '</ul>
                </div>';
        return $strg;
        
    }
}


if(!function_exists('treeLabels')){
    function treeLabels($parent_id){
        $CI = &get_instance();
        //$user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model('post_model','common_nodel');

        $label_array = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$parent_id);
        $label_data = $CI->post_model->getTreeLabels($label_array);
        
        $string = '';
        if(!empty($label_data)){
            foreach ($label_data as $labdata) {
                
                $label_array2 = array(''.LABEL.'.company_id'=>$company_id,''.LABEL.'.label_parent_id'=>$labdata->label_id);
                $label_data2 = $CI->post_model->getTreeLabels($label_array2);
                
                if(empty($label_data2)){
                    $string .= '<li><a href="javascript:void(0)">'.$labdata->label_name.'</a></li>';
                }else{
                $string .= '<li class="has-children">
                                <input type="checkbox" name="sub-group-3" id="sub-group-'.$labdata->label_id.'">
                                <label for="sub-group-'.$labdata->label_id.'">'.$labdata->label_name.'</label>';
                    if(!empty($labdata->label_id)){  
                            $string .= '<ul>';
                            //$string .= $labdata->label_id.'PP  ';
                            $string .= treeLabels($labdata->label_id);

                            $string .= '</ul>';
                    }
                    $string .= '</li>';    
                }
            }

        }

        return $string;
    }
}

if(!function_exists('getSingleUser')){
    function getSingleUser($post_creator_id){
       $CI = &get_instance();
        //$user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model('common_model');
		
        $user_existance = $CI->common_model->getIndividualUserDetails($post_creator_id,$company_id);
        return $user_existance->first_name.' '.$user_existance->last_name;
    }
    
}

if(!function_exists('getCommaSepUser')){
    function getCommaSepUser($user_ids){
       $CI = &get_instance();
        //$user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        
        $users = explode(",",$user_ids);
        if (!empty($users) && is_array($users)){
            $user_ids = $users;
        }
        $CI->load->database();
        $CI->load->model('common_model');
		
        $user_arr = array('company_id'=>$company_id);
        return $CI->common_model->getCommaSepratedUsers($user_arr,$user_ids);
    }
    
}

if(!function_exists('getPvhScore')){
    function getPvhScore(){
        $CI = &get_instance();
        $CI->load->database();
        $CI->load->model('comment_model');

        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');

        $where_arra = array('post_creator_id'=>$user_id,'company_id'=>$company_id);
        
        $postscore_data = $CI->common_model->getPostScore($where_arra);
        $postscore_count = !empty($postscore_data) ? COUNT($postscore_data) : 0;
        
        $postviewscore_Data = $CI->common_model->getPostViewScore($where_arra);
        $postviewscore_count = !empty($postviewscore_Data) ? COUNT($postviewscore_Data) : 0;
        
        $where_arra_help1 = array('post_creator_id'=>$user_id,'company_id'=>$company_id,'helpful_type'=>1);
        $where_arra_help2 = array('post_creator_id'=>$user_id,'company_id'=>$company_id,'helpful_type'=>2);
        $where_arra_help3 = array('post_creator_id'=>$user_id,'company_id'=>$company_id,'helpful_type'=>3);
        
        $posthelpfulscore_Data1 = $CI->common_model->getPostHelpfulScore($where_arra_help1);
        $posthelpfulscore_count1 = !empty($posthelpfulscore_Data1) ? COUNT($posthelpfulscore_Data1) : 0;
        
        $posthelpfulscore_Data2 = $CI->common_model->getPostHelpfulScore($where_arra_help2);
        $posthelpfulscore_count2 = !empty($posthelpfulscore_Data2) ? COUNT($posthelpfulscore_Data2) : 0;
        
        $posthelpfulscore_Data3 = $CI->common_model->getPostHelpfulScore($where_arra_help3);
        $posthelpfulscore_count3 = !empty($posthelpfulscore_Data3) ? COUNT($posthelpfulscore_Data3) : 0;
        
        $help_score = ($posthelpfulscore_count1)+(2*$posthelpfulscore_count2)+(3*$posthelpfulscore_count3);
        
        $string = '';
        $string .= '<div class="widget count-post">
                    <div class="col-xs-4 padding-none">
                        <div class="box-circle" align="center"> <span> '.$postscore_count.' </span> 
                            <p> Posts</p>
                        </div>
                    </div>

                    <div class="col-xs-4 padding-none">
                        <div class="box-circle" align="center"> <span> '.$postviewscore_count.' </span> 
                            <p> Views</p>
                        </div>
                    </div>

                    <div class="col-xs-4 padding-none">
                        <div class="box-circle" align="center"> <span> '.$help_score.' </span> 
                            <p> Helpful</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>';
        
        return $string;
        
    }
}

if(!function_exists('getContentRequest')){
    function getContentRequest(){
       $CI = &get_instance();
        //$user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        
        $CI->load->database();
        $CI->load->model('post_model');
		
        $where_array = array(''.POST.'.company_id'=>$company_id,''.POST.'.content_request_status'=>1);
        $get_content_request = $CI->post_model->getPosts($where_array);
        $cr_string = '<div class="widget categories">
                        <h3>Content Request</h3>
                        <div class="row">
                            <div class="col-sm-12">';
        if(!empty($get_content_request)){
            foreach($get_content_request AS $content_req){
                $cr_string .= '
                            <div class="single_comments">
                                <a href="post/individual_post/post_details/'.base64_encode($content_req->post_id).'">
                                    <p><div class="serial_no">'.$content_req->post_id.'</div> '.$content_req->title.'</p>
                                    <div class="entry-meta small muted"> 
                                    <span><i class="fa fa-user"></i> '.$content_req->first_name.' '.$content_req->last_name.' &nbsp; <i class="fa fa-calendar"></i> '.date("d F, Y", strtotime($content_req->created_date)).' </span> </div>
                                </a>
                            </div>
                        ';
            }
        }
        $cr_string .= '</div></div></div>';
        return $cr_string;
    }
    
}

if(!function_exists('getUserNotification')){
    function getUserNotification(){
       $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        
        $CI->load->database();
        $CI->load->model(array('notification_model','common_model'));
	
        $notif_arr = array(''.NOTIFICATION.'.company_id'=>$company_id,''.NOTIFICATION.'.user_id'=>$user_id);
        $get_notif = $CI->notification_model->getNotification($notif_arr,1);
        $notif_string = '';
        if(!empty($get_notif)){
            foreach($get_notif AS $notif){
                $notif_string .= '
                    <li>';
                if(!empty($notif->post_id)){
                    $notif_string .= '<a href="post/individual_post/post_details/'.base64_encode($notif->post_id).'">';
                }else if(!empty($notif->label_id)){
                    $notif_string .= '<a href="dashboard/user_dashboard/manage_label">';
                }else{
                    $notif_string .= '<a href="javascript:void(0)">';
                }
                $notif_string .= '
                        <img src="img/avatar3.png" class="notif-box">
                        <div class="comment">
                            ';
                
                $check_super_user = $CI->common_model->getIndividualUserDetails($notif->notify_by,$company_id);
                if(!empty($check_super_user->is_super_user)){
                    $notif_string .= '<span class="name">Super user </span>';
                }else{
                    $notif_string .= '<span class="name">'.$notif->first_name.' '.$notif->last_name.' </span>';
                }
//                if($notif->label_id){
//                    $notif_string .= ''.$notif->notification_msg.' - '.$notif->label_name.'';
//                }else{
//                    $notif_string .= ''.$notif->notification_msg.' - '.$notif->title.'';
//                }
                $notif_string .= ''.$notif->notification_msg.'';
                $notif_string .= '</div>';
                
                
                //if($notif->notification_msg_id == 4 && $notif->label_btn_status != 1){
                   '<p class="request-btn" id="btnhide<?php echo $notif->notification_id; ?>">
                                    <button class="btn btn-success" type="button" onclick="merge_status('.$notif->label_id.',2,'.$notif->notification_id.')">  Accept </button>
                                    <button class="btn btn-danger" type="button" onclick="merge_status('.$notif->label_id.',3,'.$notif->notification_id.')"> Decline </button>
                                </p>';
                //}
                $notif_string .= '  
                                <div class="text-right time">'.$notif->created_date.'</div>
                        </a>
                    </li>
                ';
            }
            $notif_string .= '<li class="text-center"><a href="notification/user_notification/all_notification">See All</a></li>';
        }
        
        echo $notif_string;
    }
    
}

if(!function_exists('commonSearchForm')){
    function commonSearchForm(){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        
        $get_segment = $CI->uri->segment('3');
        if($get_segment == 'advanced_search'){
            $style_sv_search = 'display:inline-block';
        }else{
            $style_sv_search = 'display:none';
        }
        $search_string = '
        <div class="row">
                       
            <form role="form" id="indv_search" class="search-form" action="dashboard/user_dashboard/individual_search" method="post">
                <input type="hidden" name="primary_own" id="primary_own">
                <input type="hidden" name="co_ownr" id="co_ownr">
                <input type="hidden" name="lbdata" id="lbdata">
                <input type="hidden" name="ptabb" id="ptabb">
            </form>

            <form role="form" id="search_form" class="search-form" action="dashboard/user_dashboard/search_posts" method="post">
                <div class="col-md-10 col-sm-10">
                    <div class="form-group mrgzero">
                        <select class="form-control pull-left search_wdth" name="ptab" id="ptab" >
                            <option value="1">All Posts</option>
                            <option value="2">My Posts</option>
                            <option value="3">Followed Posts</option>
                            <option value="4">Recently Viewed</option>
                        </select>
                    </div>
                    <input type="text" id="searchpost" name="searchpost" class="form-control search_box" autocomplete="off" placeholder="Search by name, keywords Or labels" >
                    <input type="hidden" name="searchlab" id="searchlab">
                    <div class="advanc-search">
                        <a href="javascript:;" data-toggle="modal" data-target="#add_label" data-dismiss="modal" onclick="advSearchPopup()"> 
                            <i class="fa fa-search"></i> Advanced Search
                        </a> &nbsp; &nbsp; 
                        <a href="javascript:;" style="'.$style_sv_search.'" onclick="saveSearch()" data-toggle="modal" data-target="#add_search"> <i class="fa fa-save"></i> Save Search</a>
                        <a class="pull-right" href="javascript:;" onclick="saveSearchLists()" data-toggle="modal" data-dismiss="modal" data-target="#add_label"> 
                            <i class="fa fa-list"></i> Saved Search
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-3 right-search pull-right srch_btn">
                    <button class="btn btn-primary search-btn pull-right" type="submit"> <i class="fa fa-search"></i> Search </button>
                </div>
                
            </form>
            <div class="clearfix"></div>
            
        </div>
        <form method="post" id="saveadv_srch" action="dashboard/user_dashboard/advanced_search">
        <div id="form_adv_srch">
        </div>
        </form>
        <div class="modal fade" id="add_label"></div>
        <div class="modal fade" id="edit_search"></div>
        <div class="modal fade" id="add_search"></div>
        ';
          
        
        echo $search_string;
    }
    
}

if(!function_exists('notificationCount')){
    function notificationCount(){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model('notification_model');

        $notif_count = 0;

        $notif_arr = array(''.NOTIFICATION.'.company_id'=>$company_id,''.NOTIFICATION.'.user_id'=>$user_id,''.NOTIFICATION.'.read_status'=>1 );
        $notifi_details = $CI->notification_model->getNotification($notif_arr);
        if(!empty($notifi_details)){
            $notif_count = COUNT($notifi_details);
        }
        return $notif_count;
    }
}

if(!function_exists('checkPostVisibility')){
    function checkPostVisibility($post_id){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        
        $CI->load->database();
        $CI->load->model('post_model');
        
        $visible_to = '';
        $tagged_labels = '';
        $post_visibility = array();
        
        $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id);
        $post_info = $CI->post_model->getIndividualPosts($post_array);
        
//        if(!empty($post_info->co_owners)){
//            $visible_to .= $post_info->co_owners.',';
//        }
         
        if($post_info->post_override!=1 && $post_info->visibility){
            $visible_to .= $post_info->visibility.','; 
        }
        
        if(!empty($post_info->tagged_labels)){
            $tagged_labels = explode(',',$post_info->tagged_labels);
            if(!empty($tagged_labels)){
                $i = 1;
                foreach($tagged_labels AS $tglab){
                    $label_info = $CI->post_model->getIndividualLabel($tglab);
                    if(!empty($label_info->inherit_visibility) && !empty($label_info->visible_to)){ 
                        $visible_to .= $label_info->visible_to.',';
                    }else{
                        if(!empty($label_info->visible_to)){
                            $visible_to .= $label_info->visible_to.',';
                        }
                        if(!empty($label_info->label_parent_id)){
                            $label_parentinfo = $CI->post_model->getIndividualLabel($label_info->label_parent_id);
                            if(!empty($label_parentinfo->visible_to)){
                                $visible_to .= $label_parentinfo->visible_to.',';
                            }
                        }
                    }
                    $i++;
                }
            }
        }
        
        if($visible_to){
            $post_visibility = explode(',',rtrim($visible_to,','));
        }
        
        if(!empty($post_visibility)){
            array_push($post_visibility,$post_info->post_creator_id);
        }
        
        $post_view = array_unique($post_visibility);
        //print_r($post_view);die;
        if(!empty($post_view)){
            return $post_view;
        }else{
            return 0;
        }
    }
    
}

if(!function_exists('checkIsUserSuper')){
    function checkIsUserSuper($u_id=''){
       $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model('common_model');
		
        if($u_id){
            $user_info = $CI->common_model->getIndividualUserDetails($u_id,$company_id);
        }else{
            $user_info = $CI->common_model->getIndividualUserDetails($user_id,$company_id);
        }
        if(!empty($user_info) && !empty($user_info->is_super_user)){
            return true;
        }else{
            return false;
        }
        //return $user_existance->first_name.' '.$user_existance->last_name;
    }
    
}


if(!function_exists('isAdminLogin')){
    function isAdminLogin(){
        $CI = &get_instance();
        $adminid = $CI->session->userdata('ks_admin_id');
        $admincompid = $CI->session->userdata('ks_company_id');
        if(!$adminid && !$admincompid){
        //if(!$adminid){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}

if(!function_exists('isPostDisable')){
    function isPostDisable($post_id){
        $CI = &get_instance();
        $user_id = $CI->session->userdata('kaseidon_user_id');
        $company_id = $CI->session->userdata('kaseidon_company_id');
        $CI->load->database();
        $CI->load->model('post_model');
        
        $post_array = array(''.POST.'.post_id'=>$post_id,''.POST.'.company_id'=>$company_id,''.POST.'.publish'=>2);
        $post_info = $CI->post_model->getIndividualPosts($post_array);
        
        if(!empty($post_info)){
        //if(!$adminid){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}

if(!function_exists('isTo')){
    function isTo(){
        $r = 'Calliiiii';
        return $r;
    }
    
}

if(!function_exists('callTo')){
    function callTo(){
        $CI = &get_instance();
        $inf = isTo();
        return $inf;
    }
    
}


//if(!function_exists('isAdminLogin')){
//    function isAdminLogin(){
//        $CI = &get_instance();
//        $adminid = $CI->session->userdata('dways_admin_id');
//        $CI->load->database();
//        $CI->load->model('web_models/admin_model');
//		
//        $admin_existance = $CI->admin_model->getAdminDataUsingId($adminid);
//		
//        if(!$adminid || empty($admin_existance)){
//            return FALSE;
//        }
//        else{
//            return TRUE;
//        }
//    }
//}

//if(!function_exists('gettimebyip')) {
//    function gettimebyip()
//    {
//        require_once(APPPATH."libraries/time_lib/geoipcity.inc");
//        require_once(APPPATH."libraries/time_lib/geoipregionvars.php");
//        require_once(APPPATH."libraries/time_lib/timezone.php");
//
//        // $ip = $_SERVER['REMOTE_ADDR'];
//        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//            $ip = $_SERVER['HTTP_CLIENT_IP'];
//        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//        } else {
//            $ip = $_SERVER['REMOTE_ADDR'];
//        }
//        print_r($ip);
//        $gi = geoip_open(APPPATH."libraries/time_lib/GeoLiteCity.dat", GEOIP_STANDARD);
//        
//       // $record = geoip_record_by_addr($gi, '103.15.67.123');
//        $record = geoip_record_by_addr($gi, '103.76.254.42');
//        print_r($record);
//        echo $gettimezone = get_time_zone($record->country_code, ($record->region!='') ? $record->region : 0);die('zzzz');
//        return $gettimezone;
//    }   
//
//}
