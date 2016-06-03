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
                                <p><?=substr($query->content,0,255);?>....</p>
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
                        <button class="ui inverted red button" name="delete" id="delete">Delete</button>
                    </div>
              </div>
            </div>
        </div>
    <?php endforeach;?>
  </div>
</div>

<script>
$('.hover').dimmer({
  on: 'hover'
});

//$(document).ready(function(){
//    $("#delete").click(function(){
////        var id =  $("#id").val();
//        
////        $.ajax({
////           url: 'post_delete/' + id,
////           success:{
////               $("#displayNews").fadeOut(3000);
////           }
////        });   
//        alert("ok");
//    });
//});
</script>