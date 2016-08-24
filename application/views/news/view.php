<div id="news" class="nav_identifier">
<input type="text" value="{post_id}" id="news_id" hidden>
<div class="ui container">
    <div class="three column row">
        <div class="column">
            <h1>{post_title}</h1>
            <i>Posted by {post_user}</i>
        </div>

    </div>
    <hr>

    <div class="column">
        <div class="ui segment">
        <p>
            <?php 
                    $content = str_replace(["\r\n", "\r", "\n"], "<br/>", $post_content); 
		              echo $content;
            ?>  
        </p>
        </div>
    </div>
    <hr>
    
    <div class="column">
        <h2>Comments ({count})</h2>
    </div>
    <div class="column">
        <div class="ui form">
                    <?//=form_open('news/post_comment');?>
                    <form class="fields">
                            <div class="thirteen wide field">
                                <textarea name="comment" id="comment" placeholder="Add a comment..." required="true"></textarea>
                            </div>
                            <div class="two wide field">
                                <!-- <button class='ui positive button' id="postbtn">Post</button> -->
                                <input type="button" class='ui positive button' id="postbtn" value="Post">
                            </div>
                    </form>
                </div>
    </div>
    <div class="column">
        
            <div id="displaycomments"></div>
            
            <?php foreach ($comment as $comments){?>
            <div class="ui segment feed">
            <div class="event">
                <div class="mini label">
                <!--            user_picture condition -->
                   <img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar circular image">
                    
                </div>

                <div class="content">
                  <div class="summary">
                    <a class="user">
                    <!--            first name condition -->
                      <?php if($comments->firstname == ''){
                            echo $this->session->userdata('username');
                        }else{
                            echo $comments->firstname;
                        }?>
                    </a>
                        <h3 class="ui header">
                        <div class="sub header">
                         <?php echo $comments->content;?>
                        </div>
                    </h3>
                    
                  </div>
                </div>
              </div>
              </div>
            <?php };?>
        
        
    </div>
    
</div>
</div>
<script>


$(document).ready(function(){
    var base_url = 'http://localhost/cite_circle/';
    $('#postbtn').click(function(){
        
        var comment = $("#comment").val().trim();
        var news_id = $("#news_id").val();
        post_comment(comment,news_id);
    });
    function post_comment(comment,news_id){
        var dataString = '&comments=' + comment + '&news_id='+news_id;
        $.ajax({
            url: base_url+"news/post_comment/",
            type: "POST",
            data: dataString,
            success: function(data)
                {
                    $("#displaycomments").html(data);
                    $('#comment').val('');
                    $('#postbtn').addClass('disabled');
                },
            error: function(data){
                    alert('Network Failure.');
                }
        });
    }
});
</script>