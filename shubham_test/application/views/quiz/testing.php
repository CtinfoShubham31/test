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
</body>
<script type="text/javascript">
$(document).ready(function() {
$.ajax({
        url : "http://hayageektest.appspot.com/cross-domain-cors/jsonp.php",
        dataType:"jsonp",
        jsonp:"mycallback",
        success:function(data)
        {
            alert("Name:"+data.name+"nage:"+data.age+"nlocation:"+data.location);
        }
    });

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

