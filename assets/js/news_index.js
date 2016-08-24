$(document).ready(function(){

    var base_url = "http://localhost/cite_circle/";
    
    //get the posts
    $.get('news/post_show',function(data){
        $("#loader").hide();  
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
