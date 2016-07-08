<div id="news" class="nav_identifier">
<div id="displaynews" ></div>
<?php if($this->aauth->is_allowed('school_admin',$this->aauth->get_user_id($email=false))){?>
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
            <button class="circular ui red icon button delete" id="shadow">
              <i class="icon trash"></i>
            </button>
            <b>Delete</b>
        </div>
    </div>
<?php }else{echo "hello";}?>

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