<div class="ui container">
    <div class="three column row">
        <div class="column">
            <h1>{post_title}</h1>
            <i>Posted by {post_user}</i>
        </div>
        <div class="right floated column">
            <button class="ui positive button">Up</button>
        </div>
    </div>
    <hr>
    <div class="column">
        <img src="<?php echo base_url();?>assets/images/avatar/tom.jpg" height="50px" width="50px" >
    </div>
    <div class="column">
        <p>
            <?php 
                $content = str_replace(["\r\n", "\r", "\n"], "<br/>", $post_content); 
		echo $content;
            ?>  
        </p>
    </div>
    <hr>
    <div class="column">
        <h2>Comments:</h2>
    </div>
    <div class="column">
        <div class="ui form">
                    <?=form_open('news/post_data');?>
                    <form class="fields">
                            <div class="thirteen wide field">
                                <label>Header:</label>
                                <input type="text" placeholder="your header ..." id="header" name="header" required="required">
                            </div>
                            <div class="thirteen wide field">
                                <label>Content:</label>
                                <textarea name='postnews' id="postnews" class= 'form-control' rows= '2' placeholder='Write a post ...' required="true"></textarea>
                            </div>
                            <div class="two wide field">
                                <input type="submit" class='ui positive button' value="Post">
                            </div>
                    </form>
                </div>
    </div>
    <div class="column">
        <blockquote></blockquote>
    </div>
    
</div>