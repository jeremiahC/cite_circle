
<div class="ui container">
    <div class="ui centered grid">
        <div class="eight wide column">
            <div class="ui segment">
                <div class="twelve wide column">
                    <textarea style="resize: none" ></textarea>
                </div>
                <div class="right floated four wide column">
                    <button class="ui button">Post</button>
                </div>
                
            </div>
            <div class="ui divider"></div>
            <div class="ui green segment">
                <div class="column">
                    <img src="assets/images/avatar/nan.jpg" class="ui avatar image">
                    <label><?=$post_user?></label>
                    <span><?=$post_dt?></span>
                    <i class="sidebar icon"></i>
                    <div class="ui divider"></div>
                    <p>
                        <?php echo $post_content;?>
                    </p>
                    <div class="ui divider"></div>
                    <a href="#"><i class="thumbs up icon"></i></a>
                    <a href="#"><span>Comments</span></a>
                    
                </div>
            </div>
        </div>
    </div>

    
</div>