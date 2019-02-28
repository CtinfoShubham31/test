<style>
    .element-class{
width:100px;
    height:300px;
    background-color:#999;
    margin:10px;
}
</style>
<div class="element-class" id="0">0</div>
<div class="element-class" id="1">1</div>
<div class="element-class" id="2">2</div>
<div class="element-class" id="3">3</div>
<div class="element-class" id="4">4</div>
<div class="element-class" id="5">5</div>
<div class="element-class" id="6">6</div>
<div class="element-class" id="7">7</div>
<div class="element-class" id="8">8</div>

<script>
$(".element-class:gt(3)").css("display", "none");

var lastidnum = "4";
$(window).on('scroll', function() {
    var scrollTop = $(window).scrollTop(),
        elementOffset = $("#" + (lastidnum - 1)).offset().top,
        distance = (elementOffset - scrollTop);
        console.log(elementOffset+"elementOffset");
    if (distance <= 400) {
        $("#" + lastidnum).fadeIn("slow");
        console.log(distance+"distance");
        lastidnum++;
    }

});
</script>
