
<div class="ui container">
<h1>News Page</h1>
<div class="ui segment">
<?php foreach ($show as $query):?>
<div class="ui items">
  <div class="item" id="news_<?=$query->news_id?>">
    <div class="right floated column">
        <button class="btn-delete ui circular red button btn-delete_<?=$query->news_id;?>" id="<?=$query->news_id;?>" name="delete" value="<?php echo $query->news_id;?>" ><i class="remove icon"></i></button>
    </div>
    <div class="image">
      <img src="assets/images/avatar/nan.jpg">
    </div>
    <div class="content">
      <a class="header"><?=$query->title;?></a>
      <div class="meta">
        <span>Posted by School Admin</span>
      </div>
      <div class="description">
        <p><?=substr($query->content,0,155);?>....</p>
      </div>
      <div class="extra">
        <i><small>Posted at</small> <?=$query->date?></i>
        <a href="<?php echo site_url('post_view/' . $query->news_id );?>" class="ui right float inverted green button">See more</a>
        
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
$.getScript("<?php echo base_url()?>assets/js/news_post.js", function(){
    });

</script>
