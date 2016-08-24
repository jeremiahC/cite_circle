<div class="ui grid">
<div class="centered twelve wide column">
<div class="ui secondary segment form">
<a class="ui red ribbon label">Survey</a>
<div class="ui horizontal divider">
<a class="ui black empty circular label"></a>
<a class="ui grey empty circular label"></a>
<a class="ui brown empty circular label"></a>
<a class="ui brown empty circular label"></a>
<a class="ui pink empty circular label"></a>
<a class="ui pink empty circular label"></a>
<a class="ui purple empty circular label"></a>
<a class="ui purple empty circular label"></a>
<a class="ui violet empty circular label"></a>
<a class="ui violet empty circular label"></a>
<a class="ui blue empty circular label"></a>
<a class="ui blue empty circular label"></a>
<a class="ui teal empty circular label"></a>
<a class="ui teal empty circular label"></a>
<a class="ui green empty circular label"></a>
<a class="ui green empty circular label"></a>
<a class="ui olive empty circular label"></a>
<a class="ui olive empty circular label"></a>
<a class="ui yellow empty circular label"></a>
<a class="ui yellow empty circular label"></a>
<a class="ui orange empty circular label"></a>
<a class="ui orange empty circular label"></a>

<a class="ui red empty circular label"></a>
<a class="ui red empty circular label"></a>
<a class="ui red empty circular label"></a>

<a class="ui orange empty circular label"></a>
<a class="ui orange empty circular label"></a>
<a class="ui yellow empty circular label"></a>
<a class="ui yellow empty circular label"></a>
<a class="ui olive empty circular label"></a>
<a class="ui olive empty circular label"></a>
<a class="ui green empty circular label"></a>
<a class="ui green empty circular label"></a>
<a class="ui teal empty circular label"></a>
<a class="ui teal empty circular label"></a>
<a class="ui blue empty circular label"></a>
<a class="ui blue empty circular label"></a>
<a class="ui violet empty circular label"></a>
<a class="ui violet empty circular label"></a>
<a class="ui purple empty circular label"></a>
<a class="ui purple empty circular label"></a>
<a class="ui pink empty circular label"></a>
<a class="ui pink empty circular label"></a>
<a class="ui brown empty circular label"></a>
<a class="ui brown empty circular label"></a>
<a class="ui grey empty circular label"></a>
<a class="ui black empty circular label"></a>
</div>
<h4 class="ui horizontal divider header">
  <i class="write icon"></i>
  Project Survey
</h4>
<div class="ui grid centered">
<div class="">
<h4>Hi, thank you for logging in with this site. We're so glad you did have the time for this site and we will be more
glad if you answer this survey whole-heartedly and honestly. This survey will give a great impact to this project and
will surely make a big way for it to be official. We would like to give our biggest "THANK YOU" again to you from the
admins. God speed!
</h4>
<p class="required">Please consider that all fields are required.</p>
</div>
</div>
<br><br>

<?php // Change the css classes to suit your needs    

echo form_open('survey'); ?>
<form>

<div class="ui divider"></div>

<p>
        <label for="citenian">Are you a citenian? If yes, please choose. <span class="required">*</span></label>
        <?php echo form_error('citenian'); ?>
        <br />
        <div class="field">
        <div class="ui radio checkbox">
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="citenian" name="citenian" type="radio" class="" value="student" <?php echo $this->form_validation->set_radio('citenian', 'option1'); ?> />
        		<label for="citenian" class="">Student</label>
        </div>
        </div>

        <div class="field">
        <div class="ui radio checkbox">
        		<input id="citenian" name="citenian" type="radio" class="" value="alumni" <?php echo $this->form_validation->set_radio('citenian', 'option2'); ?> />
        		<label for="citenian" class="">Alumni</label>
        </div>
        </div>

        <div class="field">
        <div class="ui radio checkbox">
                        <input id="citenian" name="citenian" type="radio" class="" value="cite staff" <?php echo $this->form_validation->set_radio('citenian', 'option2'); ?> />
                        <label for="citenian" class="">CITE staff</label>
        </div>
        </div>
</p>
        
<div class="ui divider"></div>

<p>
        <?php // Change the values/css classes to suit your needs ?>
        <label for="social_media">What social media you frequently use? [Multiple Check]<span class="required">*</span></label>
        <?php echo form_error('social_media[]'); ?>

        <div class="ui checkbox">
        <input type="checkbox" id="social_media" name="social_media[]" value="facebook" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
        <label for="social_media">Facebook</label>
        </div>

        <div class="ui checkbox">
        <input type="checkbox" id="social_media" name="social_media[]" value="friendster" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
        <label for="social_media">Friendster</label>
        </div>

        <div class="ui checkbox">
        <input type="checkbox" id="social_media" name="social_media[]" value="tumblr" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
        <label for="social_media">Tumblr</label>
        </div>

        <div class="ui checkbox">
        <input type="checkbox" id="social_media" name="social_media[]" value="twitter" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
        <label for="social_media">Twitter</label>
        </div>

        <div class="ui checkbox">
        <input type="checkbox" id="social_media" name="social_media[]" value="instagram" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
        <label for="social_media">Instagram</label>
        </div>

        <div class="ui checkbox">
        <input type="checkbox" id="social_media" name="social_media[]" value="snapchat" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
        <label for="social_media">Snapchat</label>
        </div>

        <div class="ui checkbox">
        <input type="checkbox" id="social_media" name="social_media[]" value="google+" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
        <label for="social_media">Google+</label>
        </div>
</p> 
        
<div class="ui divider"></div>

<p>
        <label for="make_friends">Do you make friends while using social media? <span class="required">*</span></label>
        <?php echo form_error('make_friends'); ?>

        <div class="field">
        <div class="ui radio checkbox">

                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="make_friends" name="make_friends" type="radio" class="" value="yes" <?php echo $this->form_validation->set_radio('make_friends', 'option1'); ?> />
        	<label for="make_friends" class="">Yes</label>
        </div>
        </div>
        <div class="field">
        <div class="ui radio checkbox">
        	<input id="make_friends" name="make_friends" type="radio" class="" value="maybe" <?php echo $this->form_validation->set_radio('make_friends', 'option2'); ?> />
        	<label for="make_friends" class="">Maybe</label>

        </div>
        </div>
        <div class="field">
        <div class="ui radio checkbox">  
                <input id="make_friends" name="make_friends" type="radio" class="" value="no" <?php echo $this->form_validation->set_radio('make_friends', 'option2'); ?> />
                <label for="make_friends" class="">No</label>
        </div>
        </div>
</p>

<div class="ui divider"></div>

<p>
        <label for="social_media_no">Is social media useful?</label>
        <?php echo form_error('social_media_useful'); ?>

        <br>

        <div id="useful_no" class="field">
        <div class="ui radio checkbox">
        <input type="radio" id="social_media" name="social_media_choice" value="enter_value_here" class="" <?php echo set_checkbox('social_media_yes', 'enter_value_here'); ?>/> 
        <label for="social_media_yes">No</label>
        </div>
        </div>
        <div class="useful_no_choice">
                 <label for="social_media_yes">Why? (Please type atleast 1 sentence)</label>
                <input id="social_media_no" type="text" name="social_media_useful_no"  value="<?php echo set_value('social_media_no'); ?>"  />
        </div>
        
</p>
<p>
        
        <div id="useful_yes" class="field">
        <div class="ui radio checkbox">     
        <?php // Change the values/css classes to suit your needs ?>
        <input type="radio" id="social_media useful_yes" name="social_media_choice" value="enter_value_here" class="" <?php echo set_checkbox('social_media_yes', 'enter_value_here'); ?>> 
        <label for="social_media_yes">Yes</label>
        </div>
        </div>

        <div class="useful_yes_choice">
                <label for="social_media_yes">By how? [Multiple Check]</label><br/>
                <div class="ui checkbox">
                <input type="checkbox" id="social_media_yes0" name="social_media_useful[]" value="study" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
                <label for="social_media">Study</label>
                </div>

                <div class="ui checkbox">
                <input type="checkbox" id="social_media_yes1" name="social_media_useful[]" value="updates and events" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
                <label for="social_media">Updates of Events</label>
                </div>

                <div class="ui checkbox">
                <input type="checkbox" id="social_media_yes2" name="social_media_useful[]" value="updates of friends" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
                <label for="social_media">Updates of friends</label>
                </div>

                <div class="ui checkbox">
                <input type="checkbox" id="social_media_yes3" name="social_media_useful[]" value="news" class="" <?php echo set_checkbox('social_media', 'enter_value_here'); ?>>
                <label for="social_media">News</label>
                </div>
                <br>
                <div class="ui">
                <label for="social_media">Others, please specify below:</label>
                <input id="social_media_yes" type="text" name="social_media_useful[]"  />
                </div>

        </div>


        
</p>
        
<div class="ui divider"></div>

<p>
        <label for="tried">Have you tried this project? <span class="required">*</span></label>
        <?php echo form_error('tried'); ?>
        <br />
                <div class="field">
                <div class="ui radio checkbox">
                        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                        <input id="tried" name="tried" type="radio" class="" value="yes" <?php echo $this->form_validation->set_radio('tried', 'option1'); ?> />
        		<label for="tried" class="">Yes</label>
                </div>
                </div>

                <div class="field">
                <div class="ui radio checkbox">
                        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
        		<input id="tried" name="tried" type="radio" class="" value="no" <?php echo $this->form_validation->set_radio('tried', 'option2'); ?> />
        		<label for="tried" class="">No</label>
                </div>
                </div>
</p>
        
<div class="ui divider"></div>

<p>
	<label for="project_use">How did you use this project? [Multiple Check]<span class="required">*</span></label>
        <?php echo form_error('project_use[]'); ?> 

        <?php // Change the values/css classes to suit your needs ?>
        <br />
        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_use[]" value="making friends" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="social_media">Making Friends</label>
        </div>

        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_use[]" value="chatting with co-citenians" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="social_media">Chatting with co-citenians</label>
        </div>

        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_use[]" value="for mentoring" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="social_media">For mentoring</label>
        </div>

        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_use[]" value="source of news about CITE" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="social_media">Source of news about CITE</label>
        </div>

        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_use[]" value="post status" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="social_media">Posting status/ideas/experience/information/ask for help</label>
        </div>

        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_use[]" value="complains" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="social_media">Complains</label>
        </div>
</p>
        
<div class="ui divider"></div>

<p>
        <label for="performance">How is the performance of this project? [Rate 1-5, where 5 is the highest]<span class="required">*</span></label>
        <?php echo form_error('performance'); ?>
        <br />
                <div class="field">
                <div class="ui radio checkbox">
                        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                        <input id="performance" name="performance" type="radio" class="" value="1" <?php echo $this->form_validation->set_radio('performance', 'option1'); ?> />
        		<label for="performance" class="">1</label>
                </div>
                </div>

        	<div class="field">
                <div class="ui radio checkbox">
                        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                        <input id="performance" name="performance" type="radio" class="" value="2" <?php echo $this->form_validation->set_radio('performance', 'option2'); ?> />
                        <label for="performance" class="">2</label>
                </div>
                </div>

                <div class="field">
                <div class="ui radio checkbox">
                        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                        <input id="performance" name="performance" type="radio" class="" value="3" <?php echo $this->form_validation->set_radio('performance', 'option3'); ?> />
                        <label for="performance" class="">3</label>
                </div>
                </div>

                <div class="field">
                <div class="ui radio checkbox">
                        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                        <input id="performance" name="performance" type="radio" class="" value="4" <?php echo $this->form_validation->set_radio('performance', 'option4'); ?> />
                        <label for="performance" class="">4</label>
                </div>
                </div>

                <div class="field">
                <div class="ui radio checkbox">
                        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                        <input id="performance" name="performance" type="radio" class="" value="5" <?php echo $this->form_validation->set_radio('performance', 'option5'); ?> />
                        <label for="performance" class="">5</label>
                </div>
                </div>
</p>            
        
<div class="ui divider"></div>

<p>
        <label for="project_help">How does this project help you? [Multiple Check]<span class="required">*</span></label>
        <?php echo form_error('project_help[]'); ?>  
        <?php // Change the values/css classes to suit your needs ?>
        <br />
        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_help[]" value="education" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="">Education</label>
        </div>

        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_help[]" value="more connected with other people" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="">To be more connected with other people</label>
        </div>

        <div class="ui checkbox">
                <input type="checkbox" id="project_use" name="project_help[]" value="cite news and events" class="" <?php echo set_checkbox('project_use', 'enter_value_here'); ?>>
                <label for="">CITE news and events</label>
        </div>

       
</p> 
        
<div class="ui divider"></div>

<p>
        <label for="fit">In your opinion, does this project fit to be in CITE? <span class="required">*</span></label>
        <?php echo form_error('fit'); ?>
        <br />
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <div class="field">
                <div class="ui radio checkbox">
                        <input id="fit" name="fit" type="radio" class="" value="yes" <?php echo $this->form_validation->set_radio('fit', 'option1'); ?> />
        		<label for="fit" class="">Yes</label>
                </div>
                </div>
                <div class="field">
                        <div class="ui radio checkbox">
        		<input id="fit" name="fit" type="radio" class="" value="no" <?php echo $this->form_validation->set_radio('fit', 'option2'); ?> />
        		<label for="fit" class="">No</label>
                        </div>
                </div>
</p>

        <?php echo form_submit( 'submit', 'Submit',"class='ui fluid large inverted blue submit button'"); ?>

</form>
<?php echo form_close(); ?>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
        $('.useful_no_choice').hide();
        $('.useful_yes_choice').hide();

        $('#useful_yes').click(function(){
                $('#social_media_no').val('');
                $('.useful_no_choice').slideUp();
                $('.useful_yes_choice').slideDown();
        });

        $('#useful_no').click(function(){
                $('#social_media_yes0').prop('checked', false);
                $('#social_media_yes1').prop('checked', false);
                $('#social_media_yes2').prop('checked', false);
                $('#social_media_yes3').prop('checked', false);
                $('#social_media_yes').val('');
                $('.useful_yes_choice').slideUp();
                $('.useful_no_choice').slideDown();
        });
});
</script>