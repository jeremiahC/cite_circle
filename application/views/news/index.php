<a href="news/post_create" class='ui positive button' id="submitNews">Post</a>
<div id="displaynews" ></div>

<script>
$(document).ready(function(){
    $.get('news/post_show',function(data){
        $('#displaynews').html(data);
    });
});

</script>