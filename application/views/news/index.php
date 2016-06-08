
<div>
<a href="#" class="btn-float" id="options"><i class="inverted large plus icon"></i></a>
</div>
<i class="large plus icon" id="opt1"></i>
<i class="large trash icon" id="opt2"></i>


<div id="news" class="nav_identifier">
<div id="displaynews" ></div>
</div>
<script>
$(document).ready(function(){
    $.get('news/post_show',function(data){
        $('#displaynews').html(data);
    });
    $("#opt1").hide();
    $("#opt2").hide();
    $("#opt3").hide();
    $("#options").click(function(){
        $("#opt1").transition('fly down',800,200);

    });
});

</script>