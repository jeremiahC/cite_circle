<div id="news" class="nav_identifier">
    
<div class="ui container">
    <h1>Add News</h1>
    <div class="column row">
            <div class="six wide column">
                <div class="ui form">
                    <?=form_open('news/post_data');?>
                    <form class="fields">
                            <div class="thirteen wide field">
                                <label>Header:</label>
                                <input type="text" placeholder="your header ..." id="header" name="header" required="required">
                            </div>
                            <div class="thirteen wide field">
                                <label>Content:</label>
                                <textarea name='postnews' id="postnews" class= 'form-control' placeholder='Write a post ...' required="true"></textarea>
                            </div>
                            <div class="two wide field">
                                <input type="submit" class='ui positive button' value="Post">
                            </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</div>