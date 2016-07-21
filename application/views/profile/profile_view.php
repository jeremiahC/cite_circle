
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/customjquery.js"></script>
  <link href="<?php echo base_url();?>assets/css/uploadtrick.css" rel="stylesheet">
 
  

<body>
<div id="profile" class="nav_identifier">							

<?php foreach ($user_profile as $information){?>
<div class="ui grid">
	<div class="row">
		<div class="three wide column"></div>
		<div class="ten wide column">
			<div class="row">
				<h1 class="header">My Profile</h1>
					<div class="ui grid">
						<div class="row">
							<div class="four wide column">
								<div id="edit_profile_picture"></div>
										<h3 class="sub header">Welcome <?php echo $information->firstname?></h3>
										
										<?php foreach ($upload_files as $image) { ?>
										<a class="wew" href="#" data-toggle="tooltip" data-placement="top" title="upload picture">
										<?php if($image->user_picture == ""){?>
											<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" width='150' height="150" class="ui rounded big image" id="curentImg">
										<?php }else{?>
											<img src="<?php echo base_url().'assets/uploads/'.$image->user_picture.'';?>" width='150' height="150" class="ui rounded big image" id="curentImg">
										<?php }?>
										</a>
										<br><br>
										
										<div class="ui basic modal shupaolark">
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
															
															<!-- ------------------------------------------------------------------------------------------------------------------- -->
															<!-- ------------------------------------------------------------------------------------------------------------------- -->
															<!-- caption mawala kung ig load sa image -->
															<!-- buhatan ug way nga dili mausa ang pagsubmit ani nga form sa form nga original-->
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
															<!-- ------------------------------------------------------------------------------------------------------------------- -->
															<!-- ------------------------------------------------------------------------------------------------------------------- -->
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
										
												
								<div class="ui fitted divider"></div>
								<?php echo $information->firstname?>
								<?php echo $information->lastname?>
								
								<?php 
								if($this->aauth->get_user_id($email=false) === $information->user_id){
									echo anchor('ProfileController/editUpdateProfile','<div class="ui labeled icon button" ><i class="edit icon"></i>Update Profile</div>');
								}
								?>
	
							</div>					
							<div class="ui vertical divider">|</div>
							<div class="twelve wide column">
								<div class="ui top attached tabular menu">
								<a class="active item">Personal Information</a>
								<a class="item">Account Settings</a>
								<a class="item">Others</a>
							</div>
							<div class="ui bottom attached loading tab segment">
							  <p></p>
							  <p></p>
							</div>
							</div>
							
						</div>
					</div>
			</div>
		</div>
		<div class="three wide column"></div>
	</div>
</div>
<?php };?>


