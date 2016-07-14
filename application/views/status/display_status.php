<?php 
if(count($query) > 0){?>

  <?php foreach($query as $status){ ?>
  	<div id="status_head_<?php echo $status->status_id;?>" class="ui centered aligned grid">
  	<div class="one column ui form ">
  	<div class="ui green stacked segment">
  	<!-- START STATUS CONTENT -->
  	<div id="<?php echo $status->status_id;?>"  class="ui feed status_head">
		<div class="event">
	    <div class="label">
		    <!-- user_picture condition START -->
			<?php if($status->user_picture == ""){?>
			<img src="<?php echo ''.base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar circular image">
			<?php }else{?>
			<img src="<?php echo ''.base_url().'assets/uploads/'.$status->user_picture.'';?>" class="ui mini avatar circular image">
			<?php }?>
			<!-- user_picture condition END -->
	    </div>
	    <div class="content">
	    <div class="ui right floated">
	        <?php if ($this->aauth->get_user_id($email=false) == $status->user_id){?>
			<button id="<?php echo $status->status_id;?>" class='popup_button_<?php echo $status->status_id;?> ui right floated mini circular basic icon button popup-button'>
			<i class='ellipsis mini horizontal icon'></i>
			</button>
			<div class='ui flowing popup'>
			<i id="<?php echo $status->status_id;?>" class="edit_icon pointer ui circular inverted edit teal icon"></i>
			<i id="<?php echo $status->status_id;?>" class="remove_icon pointer ui circular inverted trash red icon"></i>
			</div>
			<?php }else{}?>
	     </div>
	      <div class="summary">
	      	<?if($this->aauth->get_user_id($email=false) === $status->user_id){?>
	      		<a href="myprofile">
	      	<?php }else{?>
		        <a href="profile/<?php echo $status->user_id;?>">
		    <?php };?>
		        	<!-- first name condition START-->
					<?php if($status->firstname == ''){
						echo $status->name;
					}else{
						echo $status->firstname;
					}?>
					<!-- first name condition END -->
		        </a>
		    	        <div class="date">
	        <!--  YOU CAN PUT SOMETHING IN HERE  -->
	        </div>
	        
	      </div>
	      
	      <div class="extra text">
	      
				<!-- display status content START-->
		     	<div id="origbody_<?php echo $status->status_id;?>" class="origbody">
					<?php $mod_status = str_replace(["\r\n", "\r", "\n"], "<br/>", $status->status); 
					echo $mod_status;?>
				</div>
				<!-- display status content END -->
				
				<!-- display EDIT status content START -->
				<div id="editbody_<?php echo $status->status_id;?>" class="ui form hide">
					<div class="field">
					<label>Edit:</label>
					<textarea row="2" id="edit_textarea_<?php echo $status->status_id;?>"><?php echo $status->status;?></textarea>
					</div>
				<div class="actions">
				
					<div class="cancel_update_status ui circular small red inverted vertical animated button" tabindex="0">
		            	<div class="hidden content closemodal">Cancel</div>
		                <div class="visible content closemodal">
	                    	<i class="large remove icon"></i>
						</div>
					</div>
					
					<div class="update_status ui circular small green inverted vertical animated button" tabindex="0">
		            	<div class="hidden content closemodal">Update</div>
		                <div class="visible content closemodal">
	                    	<i class="large checkmark icon"></i>
                     	</div> 
					</div>
					
				</div>
				
				<!-- display EDIT status content END -->
				
			</div>
	      </div>
	      
	      <br>
	      <div class="meta">
	        <a class="wait">
	          <i class="wait icon"></i>
	           <?php 
	          $post_date = $status->time;
	          $now = time();
	          echo timespan($post_date, $now, 1);
	          ?>
	        </a>
	        
	      </div>
	        
    <!-- Ajax display on voting -->
    <div id="<?php echo $status->status_id;?>_voteThis" style="color: blue"></div>
    <!-- Ajax display if the user already LIKE/VOTE -->
	<div class="if-already-like"></div>
		<input type="hidden" id="user_status_id" name="user_status_id" value="<?php echo $this->session->userdata('id');?>_<?php echo $status->user_id;?>_<?php echo $status->status_id;?>_<?php echo $status->up_vote;?>">
	
	<!-- Display of count_like -->
	<span style="text-decoration:underline" class="people-who-likes" id="<?php echo $status->status_id;?>">
	  <!--<i class="thumbs up blue icon"></i><?php echo $status->up_vote;?>-->
	  		<span class="like-count" id="like_<?php echo $status->status_id;?>"></span>
	    	<input type="hidden" id="user_id" name="user_id" value="<?php echo $status->user_id;?>"/>
	      	<input type="hidden" id="status_id" name="status_id" value="<?php echo $status->status_id;?>"/></span>
	      		
	<!-- VOTE/LIKE BUTTON START -->
	<button class="mini ui green circular inverted button upvote vote" data-inverted="" data-tooltip="Vote" data-position="bottom center" value="<?php echo $status->up_vote;?>" id="<?php echo $status->status_id;?>_<?php echo $status->user_id;?>_upvote"><i class= "tiny arrow up white icon"></i></button>
	<button class="mini ui green circular animated button hide vote" value="<?php echo $status->up_vote;?>" id="<?php echo $status->status_id;?>_<?php echo $status->user_id;?>_downvote"><span class="hidden content">Unvote</span><span class="visible content"><i class= "tiny arrow down white icon"></i></span></button>
	      </div>
	    <!-- display status content END -->
	  	</div>
    </div>

<!-- display status content END -->
	<!-- END STATUS CONTENT -->
	<!-- COMMENT BOX START -->
	<div class="ui divider"></div>
		 
	<!-- Comment input box START-->
	<?php foreach ($upload_files as $image) {?>
	<div class="ui fluid icon action input teal basic label ">
		<?php if($image->user_picture == ""){?>
		<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui small avatar rounded image">
		<?php }else {?>
		<img src="<?php echo base_url().'assets/uploads/'.$image->user_picture.'';?>" class="ui small rounded image">
		<?php }?>
		<input id=<?php echo $status->status_id;?> class="cmt_input_id_<?php echo $status->status_id;?> commentinput" placeholder="Add a comment..." type="text">
		<div id="<?php echo $status->status_id;?>" class="cmt_btn_id_<?php echo $status->status_id;?> commentbutton ui mini teal disabled button"><i id="<?php echo  $this->session->userdata('id');?>" class="comment_btn_icon send icon"></i></div>
	</div>
	<?php } ?>
	<!-- Comment input box END-->
	
	<?php $counter = 0;
	foreach ($query2 as $comments){
	if($comments->cmt_status_id == $status->status_id){
		if($comments->cmt_status_id != "" or $comments->cmt_status_id == null){
			$counter++;
		}else{break;}
	}}
	?>
	
	<br/>
	<div>
		<a id="<?php echo $status->status_id;?>" class="right floated icon pointer comment_box_toggler">
	          <i class="comments outline  icon"></i>
	          <span id="counter_<?php echo $status->status_id;?>"><?php echo $counter;?></span> comment(s)
	    </a>
		<button id="<?php echo $status->status_id;?>" class="ui mini basic circular right floated icon button comment_box_toggler">
		<i class="grey caret left icon icon_toggler_<?php echo $status->status_id; ?>"></i>
		<i class="grey caret down icon toggle_icon icon_toggler_<?php echo $status->status_id; ?>"></i>

	</div>
        
	<br/>
		
        <div id="modal_see_likes_<?php echo $status->status_id;?>"></div>
<!-- START MODAL (SEE PEOPLE WHO LIKES) -->
<div class="ui small modal" id="modal_seewholikes_<?php echo $status->status_id;?>">

	
	<div class="header">People who likes this.</div>  
 		<div class="modalcontent_<?php echo $status->status_id;?>">  
 	
   			<div id="likers"></div>
   			
    	</div> 
      	<div class="actions">    
       		
         </div> 
</div> 
	<!-- 	START comment_body -->
	<div class="comment_body comment_body_<?php echo $status->status_id; ?>">
	<!-- location to append comments -->
	<div id="displaycomment_<?php echo $status->status_id;?>"></div>
		<div class="ui feed">
		<?php foreach ($query2 as $comments){?>
		<?php if($comments->cmt_status_id == $status->status_id){?>
			  <div class="event">
			    <div class="mini label">
			    <!-- 			user_picture condition -->
			      	<?php if($comments->user_picture == ""){?>
					<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar circular image">
					<?php }else {?>
					<img src="<?php echo base_url()?>assets/uploads/<?php echo $comments->user_picture?>" class="ui mini circular image">
					<?php }?>
			    </div>
			    <div class="content">
			      <div class="summary">
			        <a class="user">
			        <!-- 			first name condition -->
			          <?php if($comments->firstname == ''){
				      		echo $status->name;
				      	}else{
				      		echo $comments->firstname;
				      	}?>
			        </a>
			        <div class="date">
					<!--  YOU CAN PUT SOMETHING IN HERE  -->
			        </div>
			        <h3 class="ui header">
				        <div class="sub header">
				       	 <?php echo $comments->content;?>
			        	</div>
				    </h3>
			      </div>
			      
			      <div class="meta">
			        <a class="wait">
			          <i class="wait icon"></i>
			          <?php 
			          $post_date = $comments->time;
			          $now = time();
			          echo timespan($post_date, $now, 1);
			          ?>
			        </a>
			      </div>
			    </div>
			  </div>
		<?php }?>
		<?php }?>
		</div>

	</div>
	<!-- 	END comment_body -->
	<div id="modal_see_likes_<?php echo $status->status_id;?>"></div>
 
<div class="ui modal" id="modal_seewholikes_<?php echo $status->status_id;?>">

	<div class="header">People who likes this.</div>  
 		<div class="modalcontent_<?php echo $status->status_id;?>">  
 	
   			 <p>
   			<?php echo $voted_user->user_id;?>
   			 </p>
    	</div> 
    </div>
    </div>
   
	<?php }}else{?>
	<br/><br/>
	<div id="nopost" class="ui grid">
		<div class="twelve wide column  ui raised segment">No new post to show</div>
	</div>
	<?php }?>
	<br/><br/>
	
<!-- 	DELETE STATUS MODAL START -->
	<div class="ui basic modal">
	  <i class="close icon"></i>
	  <div class="header">
	    Delete Status Confirmation
	  </div>
	  <div class="image content">
	    <div class="image">
	      <i class="inverted circular teal trash icon"></i>
	    </div>
	    <div class="description">
	      <p>Are you sure to delete this status?</p>
	    </div>
	  </div>
	  <div class="actions">
	    <div class="two fluid ui inverted buttons">
	      <div id="close_modal" class="ui cancel red basic inverted button">
	        <i class="remove icon"></i>
	        No
	      </div>
	      <div id="delete_status" class="delete_status ui green basic inverted button">
	        <i class="checkmark icon"></i>
	        Yes
	      </div>
	    </div>
	  </div>
	</div>
<!-- 	DELETE STATUS MODAL END  -->
 </div>
</div>
<script>
$.getScript("<?php echo base_url()?>assets/js/display_status.js", function(){
	});

</script>