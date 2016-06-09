
<div id="news" class="nav_identifier">
<div id="displaynews" ></div>
<a class="btn-float" id="options">
    <i class="inverted large plus icon"></i>
</a>

<div class="btn-options">
    <div class="column ">
        <a href="post_create" class="circular ui teal icon button" id="shadow">
          <i class="icon write"></i>
        </a>
        <b>Create</b>
    </div>
    <div class="column">
        <button class="circular ui red icon button" id="shadow">
          <i class="icon trash"></i>
        </button>
        <b>Delete</b>
    </div>
</div>
</div>
<script>
$(document).ready(function(){
    $.get('news/post_show',function(data){  
        $('#displaynews').html(data);
    });
    $(".btn-options").hide();

    $("#options").click(function(){
        $(".btn-options").transition({
                animation: 'drop',
                duration: 800,
                interval: 200,
        });
    });
});

</script>