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