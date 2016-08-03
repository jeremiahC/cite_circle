<?php foreach ($show as $query):?>
<div class="ui centered grid">
    <div class="column row news">
        <div class="eight wide column">
            <div class="ui teal segment" id="news_<?=$query->news_id;?>">
                <div class="ui grid">
                        <input type="text"  class="news_id" value="<?=$query->news_id;?>" id="news_id" name="news_id">
                        <input type="text"  value="<?php echo $this->aauth->get_user_id($email=false);?>" id="id">
                        <div class="right floated column">
                            <button class="btn-delete ui circular red button btn-delete_<?=$query->news_id;?>" id="<?=$query->news_id;?>" name="delete" value="<?php echo $query->news_id;?>" ><i class="remove icon"></i></button>
                        </div>
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
    </div>
  </div>
<!-- </div> -->
<?php endforeach;?>
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
    $('.btn-delete').hide();
    $(".delete").click(function(){
        
        $('.btn-delete').show();
        $('.btn-delete').transition('set looping')
                         .transition('shake');
        $('.btn-delete').click(function(){
                    $news_id = $(this).attr("id");
                    console.log($news_id);
            $('.ui.basic.modal').modal('show'); 
            $('.delete_news').click(deleteclick);


            function deleteclick(){
                delete_news($news_id);
            }
            function delete_news(news_id){
                    
                    $.ajax({
                        url: 'post_delete',
                        type: 'POST',
                        data: {
                            news_id: news_id
                        },
                        success: function() {
                        
                            $('.ui.basic.modal').modal('hide');
                            $("#news_" + news_id).slideUp('slow');                            
                        },
                        error: function() {
                             //Ajax not successful: show an error
                            alert('An error occured while deleting the status!');
                        }
                     });
                }
            });
        });                 
                
    });

</script>
