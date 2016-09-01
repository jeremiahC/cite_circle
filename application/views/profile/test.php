
<div id="profile" class="nav_identifier">							

<?php foreach ($user_profile as $information){?>
<div class="ui grid">
	<div class="row">
		<div class="three wide column"></div>
		<div class="ten wide column profile-pic display-pic-gradient">
		<?php if($this->aauth->get_user_id($email=false) === $information->user_id){
			echo anchor('ProfileController/editUpdateProfile','<div class="ui labeled icon blue button updatebtn" ><i class="edit icon">
				</i>Update Profile</div>');}?>	
			<div class="row">
			<span class="username"><?php echo $information->firstname?> <?php echo $information->lastname?></span>
					<div class="ui grid">
						<div class="row">
						<div id="edit_profile_picture"></div>
										<?php foreach ($upload_files as $image) { ?>
										<a class="wew picture" href="#" data-toggle="tooltip" data-placement="top" title="upload picture">
										<?php if($image->user_picture == ""){?>
											<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" width='150' height="150" class="ui rounded image" id="curentImg">
										<?php }else{?>
											<img src="<?php echo base_url().'assets/uploads/'.$image->user_picture.'';?>" width='150' height="150" class="ui rounded image" id="curentImg">
										<?php }?>
										</a>
										<br><br>
										
										<div class="ui basic modal displayTop">
											<div class="ui centered grid">
 											<i class="large right floated gray close icon pointer closemodal"></i>
												<div class="eight wide column">
													<div class="ui fluid card">
														<div class="blurring dimmable image">

															<a class="ui fluid image" href="#">
																<?php if($image->user_picture == ""){?>
																<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" id="blah">
																<?php }else{?>
																<img src="<?php echo base_url().'assets/uploads/'.$image->user_picture.'';?>" id="blah">
																<?php }?>
															</a>
															<?if($this->aauth->get_user_id($email=false) === $information->user_id):?>
															<div class="ui dimmer">
																<div class="content">
																	<div class="center">
																	<?php echo form_open_multipart('ProfileController/');?>
																		<div class="ui inverted button fileUpload">
																			<i class="photo icon">
																				<input id="uploadBtn" type="file" name="userfile" class="upload" onchange="readURL(this);"/>
																			</i>
																		</div>
																	</div>
																</div>
															</div>
															<?endif;?>
														</div>
														
														<div class="content">
														
															<a class="header" href="#"><?php echo $information->firstname?>'s Profile Picture</a>
														
															<div class="two column centered row editCaption">
															    <div class="column">
															    	<div class="ui transparent icon input">
																		<!-- <input value="<?php echo $image->picture_caption ?>" type="text" name="picture_caption" id="caption"> -->
																		<i class="edit icon"></i>
																	</div>
															    </div>
															</div>
															<div class="right floated" id="hidden">
																		<div class="ui circular small red inverted vertical animated button" tabindex="0">
																			<div class="hidden content closemodal">Cancel</div>
																			<div class="visible content closemodal">
																				<i class="large remove icon"></i>
	 											 							</div>	
																		</div>
																		<button class="ui circular small green inverted vertical animated button" tabindex="0" id="submit">
																			<div class="hidden content">Save</div>
																			<div class="visible content">
																				  <i class="large upload icon"></i>
	 											 							</div>	
																		</button> 
																	</div>
															<?php }?>
																<div class="ui transparent input" id="commit">
																	<input placeholder="Insert Caption" type="text" id="picture_caption" name="picture_caption" >
																</div>
																
																	<div class="right floated" id="commit">
																		<div class="ui circular small red inverted vertical animated button" tabindex="0">
																			<div class="hidden content closemodal">Cancel</div>
																			<div class="visible content closemodal">
																				<i class="large remove icon"></i>
	 											 							</div>	
																		</div>
																		<button class="ui circular small green inverted vertical animated button" tabindex="0" id="submit">
																			<div class="hidden content">Upload</div>
																			<div class="visible content">
																				  <i class="large upload icon"></i>
	 											 							</div>	
																		</button> 
																	</div>
																
																<?php form_close(); ?>
														</div>
												</div>
											</div>
										</div>	
						</div>
						<input type="hidden" id="user_id" value="<?php echo $information->user_id?>"/>
						<div class="ui fluid four item menu profilemenu">
						  <div class="item"></div>
						  <a  class="item" id="timeline">Timeline</a>
						  <a class="item active" id="about">About</a>
						  <div class="item" id="test">Others</div>
						</div>
					</div>
			</div>
		<div id="aboutinfo" class="information"></div>
		<div id="timelineinfo" class="information"></div>
		<div class="three wide column"></div>
	</div>
	<p id="back-top">
		<a href="#top"><span><img id="image" src="<?php echo base_url()?>assets/images/up-arrow.png"></span>Back to Top</a>
	</p>
</div>
<?php };?>
<script type="text/javascript">
$(document).ready(function(){
	$(function(){
			var user_id = $('#user_id').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>ProfileController/user_info_timeline",
				data: "user_id="+ user_id,
				success: function(data){
					$('#timelineinfo').html(data);
				}
			});
		});
	});
	$(function(){
		$('#about').click(function(){
			var user_id = $('#user_id').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>ProfileController/user_info/",
				data: "user_id="+ user_id,
				success: function(data){
					$('#aboutinfo').html(data);
				}
			});
		});
	$(function(){
		$('#timeline').click(function(){
			var user_id = $('#user_id').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>ProfileController/status/",
				data: "user_id="+ user_id,
				success: function(data){
					$('#timelineinfo').html(data);
				}
			});
		});
	// hide #back-top first
	$("#back-top").hide();
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});
</script> 
