
<div>
<a href="#" class="btn-float" id="options"><i class="inverted large plus icon"></i></a>
</div>
<div class="optn">
<i class="large plus icon" ></i>
<i class="large trash icon"></i>
</div>

<div id="news" class="nav_identifier">
<div id="displaynews" ></div>
</div>
<script>
$(document).ready(function(){
    $.get('news/post_show',function(data){
        $('#displaynews').html(data);
    });
    $(".optn").hide();

    $("#options").click(function(){
        $(".optn").transition({
                animation: 'fly down',
                duration: 800,
                interval: 200
        });
    });
});

</script>