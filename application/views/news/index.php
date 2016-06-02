<div class="ui centered grid">
        <div class="column row">
            <div class="six wide column">
                <div class="ui form" id="form">
                    <div class="fields">
                            <div class="thirteen wide field">
                                <textarea name='postnews' id="postnews" class= 'form-control' rows= '2' placeholder='Write a post ...'></textarea>
                            </div>
                            <div class="two wide field">
                                <button class='ui positive button' id="submitNews">Post</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

<div id="displaynews" ></div>

<script>
$(document).ready(function(){
    $.get('news/post_show',function(data){
        $('#displaynews').html(data);
    });
    $("#submitNews").click(function(){
        var postnews = $('textarea#postnews').val();
        $.ajax({
            url: 'news/post_data',
            type: 'POST',
            data: {postnews : postnews},
            success: function(data){
                $("#displaynews").fadeIn(3000);
                $("#displaynews").html(data);
                $("#postnews").val('');
            }
        });
    });
});

</script>