<div class="ui centered grid">
    <div class="three column row ">

        <?php foreach ($show as $query):?>
                <div class="six wide column">
                  <div class="ui piled segment">
                    <div class="ui grid">
                        <input type="text" hidden="true" value="<?=$query->news_id;?>" id="id">

                        <div class="three column row">
                            <div class="hover">
                                <img class="visible content" src="assets/images/avatar/nan.jpg">
                                <div class="bg-bottom"></div>
                                <div class="bottomleft">
                                    <h2><?=$query->title;?></h2>
                                    <p><?=substr($query->content,0,155);?>....</p>
                                </div>    
                                  <div class="ui dimmer">
                                    <div class="content">
                                      <div class="center">
                                          <a href="<?php echo site_url('post_view/' . $query->news_id );?>" class="ui inverted green button">See more</a>
                                          <button class="ui inverted red button" name="delete" id="delete">Delete</button>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <div class="three column row">
                            <div class="column">
                                <img class="ui avatar image" src="assets/images/avatar/tom.jpg">
                                <span>School Admin</span>
                            </div>
                            <div class="right floated column">
                                <i><small>Posted at</small> <?=$query->date?></i>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>


<!-- 	DELETE STATUS MODAL START -->
	<div class="ui basic modal">
            <i class="close icon"></i>
            <div class="header">
                Delete News Confirmation
            </div>
            <div class="image content">
                <div class="image">
                    <i class="inverted circular teal trash icon"></i>
                </div>
                <div class="description">
                    <p>Are you sure to delete this post?</p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">
                    <div id="close_modal" class="ui cancel red basic inverted button">
                        <i class="remove icon"></i>
                            No
                    </div>
                    <div id="delete_news" class="delete_news ui green basic inverted button">
                        <i class="checkmark icon"></i>
                            Yes
                    </div>
                </div>
            </div>
	</div>
<!-- 	DELETE STATUS MODAL END  -->

<script>

$(document).ready(function(){
    $('.hover').dimmer({
        on: 'hover'
      });
      
    //delete status
    $("#delete").click(function(){
        var id =  $("#id").val();


	$('.ui.basic.modal').modal('show'); 
        $('.delete_news').click(function(){
            $.ajax({
                            url: 'post_delete/' + id,
		            success: function() {
		            	$('.ui.basic.modal').modal('hide');
		                $('#displaynews').slideUp('slow');
		            },
		            error: function() {
		                //Ajax not successful: show an error
		                alert('An error occured while deleting the status!');
		            }
		        });

        });
    });
});
</script>
