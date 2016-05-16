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
                    <label>Name</label>
                    <span>date and time</span>
                    <i class="sidebar icon"></i>
                    <div class="ui divider"></div>
                    <p>
                        the quick brown fox jumps over the lazy dog.</br>
                        the quick brown fox jumps over the lazy dog.</br>
                        the quick brown fox jumps over the lazy dog.</br>
                        the quick brown fox jumps over the lazy dog.</br>
                        the quick brown fox jumps over the lazy dog.
                        
                    </p>
                    <div class="ui divider"></div>
                    <i class="thumbs up icon"></i>
                    <span>Comments</span>
                    <button class ="ui button" id ="vote"> Vote</button>
                    
                </div>
            </div>
        </div>
    </div>
<div class="ui teal button" value ="1"id="vote1">
    Vote
</div>
<div class="ui teal button" value = "0" id="unvote">
    Unvote
</div>

    
</div>
<script>
     

        $(document).ready(function() {
            $("#vote").click(function(){
                
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>News/vote/",
                        data:{
                            'news_id':'1',
                            'user_id':'1'

                        },

                        cache: false,
                        success: function()
                            {
                            alert('ok');
                            },
                        error: function()
                            {
                            alert('fail');
                            }
                        });
            });

            $("#vote1").click(function(){
                
                $(this).addClass('active');
                        

            });
        });






</script>
