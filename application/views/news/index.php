<div class="ui centered grid">
        <div class="two column row">
            <div class="six wide column">
                <div class="ui form">
                    <div class="fields">
                        <div class="thirteen wide field">
                            <textarea rows="2"></textarea>
                        </div>
                        <div class="two wide field">
                            <button class="ui positive  button">Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="two column row">
            <div class="six wide column">
              <div class="ui green segment">
                    <div class="two column row">
                        <div class="column">
                           <img src="assets/images/avatar/nan.jpg" class="ui avatar image">
                           <label><?=$post_user?></label>
                        </div>
                        <div class=" column">
                                <span ><?=$post_dt?></span>
                                <i class="settings icon"></i>
                        </div>
                    </div>
                    <div class="ui divider"></div> 
                    <div class="two column row">
                        <p><?php echo $post_content;?></p>
                    </div>
                    <div class="ui divider"></div> 
                    <div class="two column row">
                    </div>
              </div>
            </div>
        </div>
    </div>


