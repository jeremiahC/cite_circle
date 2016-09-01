
<div id="news" class="nav_identifier">
    
<div class="ui container grid">
    <h1>Add News</h1>
    <div class="two column row">
        <div class="ten wide column">
            <div class="ui segment">
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
                                
                                <div class="field grid">
                                    <label>Label:</label>
                                    <div class="ui fitted divider"></div>
                                    <ul id="sortable1" class="connectedSortable" name="label">
                                    </ul>
                                </div>
                                <div class="field">
                                    <div class="ui fitted divider"></div>
                                    <input type="file">
                                </div>
                                <div class="field">
                                    <a class="ui button" href="<?php echo base_url();?>post_news">Back to News</a>
                                    <input type="submit" class='ui positive button' value="Post">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="four wide column">
            <div class="ui segment grid">
                    <div class="column">
                        <h3>Labels</h3>
                        <ul id="sortable2" class="connectedSortable">
                            <li class="ui-state-default"><a class="ui tag label">Events</a></li>
                            <li class="ui-state-default"><a class="ui red tag label">School</a></li>
                            <li class="ui-state-default"><a class="ui teal tag label">Work</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
$.getScript("<?php echo base_url()?>assets/js/news_create.js", function(){
    });
</script>
