
<div id="profile" class="nav_identifier">							
	
	<div class="ui grid centered">
	<?php foreach ($user_profile as $information):?>

			<div class="column row">
				<?php foreach ($upload_files as $image) { ?>
				<a class="" href="#" data-toggle="tooltip" title="View Image" >
					<?php if($image->user_picture == ""){?>
					<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" width='200' height="200" class="ui circular image img" id="curentImg">
					<?php }else{?>
					<img src="<?php echo base_url().'assets/uploads/'.$image->user_picture.'';?>" width='200' height="200" class="ui circular image img" id="curentImg">
					<?php }?>
				</a>


				<div class="ui basic modal modal_pic">
											<div class="ui centered grid">
 											<i class="large right floated gray close icon pointer closemodal"></i>
												<div class="eight wide column">
													<div class="ui fluid card">
														<div class="blurring dimmable image">
															<span title="Update Account">
																<a class="ui fluid image" href="#">
																	<?php if($image->user_picture == ""){?>
																	<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" id="preview_picture">
																	<?php }else{?>
																	<img src="<?php echo base_url().'assets/uploads/'.$image->user_picture.'';?>" id="preview_picture">
																	<?php }?>
																</a>
															</span>
															<?if($this->aauth->get_user_id($email=false) === $information->user_id):?>
															<div class="ui dimmer">
																<div class="content">
																	<div class="center">
																	<?php echo form_open_multipart('ProfileController/');?>
																		<div class="ui inverted button fileUpload">
																			<i class="upload icon">
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
																<?php };?>
														</div>
												</div>
											</div>
										</div>	
									</div>

			</div>

			<div class="column row">
				<h3><?php echo $information->firstname?> <?php echo $information->lastname?></h3>
			</div>
			<div class="column row">
				<div class="ui pointing secondary menu">
				  <a class="item " data-tab="first">Posts</a>
				  <a class="item active" data-tab="second" id="about">About</a>
				</div>

			</div>
			<div class="column row">
				<div class="ui container">
					<div class="ui tab grid " data-tab="first">
					   	<div id="presult" class="eight wide column centered ">
					   		
					</div>
					   	<div class="statusloader"></div>
					</div>
					<div class="ui tab  active" data-tab="second">
						<div id="aboutloader"></div>

					  	<div id="aresult"></div>
					  	<input hidden class="view" value="<?php echo $information->user_id;?>">
					</div>
				</div>

			</div>
			
	<?php endforeach;?>
	</div>

</div>
<script type="text/javascript">
    $.getScript("<?php echo base_url()?>assets/js/customjquery.js", function(){
    });
$(document).ready(function(){
	//START window scroll load more status
	 var count = 2;
     $(window).scroll(function(){
     if  ($(window).scrollTop() == $(document).height() - $(window).height()){
          loadStatus(count);
                count++;
     }
     }); 

	var user_id = $('.view').val();
     function loadStatus
     (pageNumber){
    	 $(".statusloader").html('<i class="statusloader_icon big spinner loading icon"></i>');
             $.ajax({
                 url: base_url+'status/display_more_status_specific_user/',
                 type:'POST',
                 data: {"pagenumber" : pageNumber,
                 		"user_id" : user_id
             			}, 
                 success: function(data){
                	 $(data).appendTo("#presult").hide().slideDown('slow');
                	 $("#modal_delete").hide();
                	 $(".statusloader_icon").hide();
                 }
             });
         return false;
     }
   //END window scroll load more status
});
</script>



