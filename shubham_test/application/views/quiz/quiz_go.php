<!DOCTYPE html>
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shubham Test</title>

<base href="<?php echo base_url();?>" />

<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link href="css/emoji.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"/></script>


</head>

<body>

<section id="blog" class="container">
    
    <div class="blog">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($postdetail_tabs)){ echo $postdetail_tabs; } ?>
                
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="content">
                        
            <!--/.blog-item-->
                        <div class="comment-box">
                            <h2> Add New Call</h2>
                            <button onclick="addNewQuestion()" id="btn_qus"><i style="cursor: pointer;" title="Add" class="fa fa-plus">&nbsp;Add New Question</i></button>
                            <br><br>
                            <form id="post_quiz" action="" class="contact-form" method="post" role="form">
                            
                                <input type="submit" value="Save">
                            <div id="showing_data">
                                <div class="comment-show" id="comment-show">
                                 
                                <?php
                                if(!empty($q_data)){
                                    foreach($q_data AS $comm){
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
                                ?>
                                <div id="quesid">
                                    <input type="hidden" name="question_id[]" id="question_id" value="<?php echo $comm->quiz_id?>">
                                    <input type="hidden" name="p_id[]" value="<?php echo $comm->p_id?>">
                                </div>
                                <div class="post_reply wow flipInX" id="rmv<?php echo $comm->quiz_id?>">
                                    
                                        <div class="row" id="mnrow<?php echo $comm->quiz_id?>">
                                            <div class="col-md-12">
                                                <p id="commtext<?php echo $comm->quiz_id;?>">
                                                    Qus
                                                    <input type="text" name="quiz[]" value="<?php echo $comm->quiz;?>">
                                                    <select  name="type[]" <?php echo $sel_disb;?> onchange="addAnswer(this.value)">
                                                        <option value="">Select Choice</option>
                                                        <option <?php echo $selected1;?> value="1">Multi-line Text</option>
                                                        <option <?php echo $selected2;?> value="2">Single Choice</option>
                                                    </select>
                                                </p>

                                            </div>
                                            
                                            <div class="col-md-12"  >
                                                <p id="ansbox<?php echo $comm->quiz_id;?>">
                                                    
                                                    <?php 
                                                    if($comm->type == 2){
                                                    ?>
                                                    Ans <input type="text" name="ans[]" value="<?php echo $comm->ans;?>">
                                                    <?php 
                                                    }else if($comm->type == 1){
                                                    ?>
                                                    Ans <textarea name="ans[]"><?php echo $comm->ans;?></textarea>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                </p>
                                                <?php
                                                if(empty($comm->hv_child)){
                                                ?>
                                                <a href="javascript:void(0)" id="btd<?php echo $comm->quiz_id;?>" onclick="addNewQuiz('<?php echo $comm->quiz_id;?>',this.value)"><i class="fa fa-plus" title="Add" style="cursor: pointer;"></i></a>&nbsp;add sub question
                                                <?php 
                                                }
                                                ?>

                                            </div>
                                            
                                            
                                            
                                        </div>
                                    
                                    
                                        <?php 
                                        echo replayQuiz($comm->quiz_id);
                                        ?>
                                    
                                    
                                </div>
                                <?php
                                    }
                                ?>
                                
                                <?php
                                }
                                ?>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>
<script type="text/javascript">
$(document).ready(function() {

    
    $("#post_quiz").on("submit", function(event) {
        event.preventDefault();
        var form_data = $(this).serialize(); //Encode form elements for submit;
        console.log(form_data);
        
        $.ajax({
            type: "POST",
            url: "quiz/save_data",
            data: form_data,
           // contentType: "application/json;charset=utf-8",
            //dataType: "json",
            success: function(response){
                $('#showing_data').html(response);
            }
        });
    });
    
    
} );

//function addAnswer(quiz_id,type){ //single_ch multiple_line
function addAnswer(type){
    if(type == 2){
        $("#ansbox").html('<p id="ansbox">Ans <input type="text" value="" name="ans[]"></p>');
    }else if(type == 1){ 
        $("#ansbox").html('<p id="ansbox">Ans <textarea name="ans[]"></textarea></p>');
    }
}

function addNewQuiz(quiz_id){
    $('#btd'+quiz_id).prop('disabled', true);
    var new_sub_entry="<div class='post_reply wow flipInX' id='rmv"+quiz_id+"'>"
                        +"<input type='hidden' name='p_id[]' value='"+quiz_id+"'><input type='hidden' name='question_id[]' value=''>"
                    +"<div class='row'>"
                        +"<div class='col-md-12'>"
                            +"<p id='commtext'>"
                                +"Qus"
                                +"<input type='text' value='' name='quiz[]'>"
                                +"<select name='type[]' onchange='addAnswer(this.value)'>"
                                +"    <option value=''>Select Choice</option>"
                                +"    <option value='1'>Multi-line Text</option>"
                                +"    <option value='2'>Single Choice</option>"
                                +"</select>"
                            +"</p>"

                        +"</div><div id='ansbox' class='col-md-12'></div>"
                    +"</div>"
                +"</div>";
        
        $(new_sub_entry).insertAfter($("#mnrow"+quiz_id));
        //$("#mnrow"+quiz_id).appendafter(new_sub_entry);
}

function addNewQuestion(){
    $.ajax({
        type: "POST",
        url:"quiz/add_newquiz",
        success: function(data){
            //$("#btn_qus").prop('disabled', true);
            $(data).insertBefore($("#comment-show"));
            //$("#comment-show").html(data);
        },
        error: function(){
           alert("failure");
        }
    });
    
}

</script>
</body>
</html>

