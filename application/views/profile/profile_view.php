<br>
<br>
<style>
.image-upload > input
{
	display: none;
}
</style>
<?php foreach ($user_profile as $information){}?>
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
								Welcome <?php echo $information->firstname?>
								
								<?php foreach ($upload_files as $image) {} ?>
										<a href="#" data-toggle="tooltip" data-placement="top" title="upload picture">
																<?php if($image->user_picture == ""){?>
																	<img src="<?php echo ''.base_url().'assets/images/new-user-image-default.png';?>" width='150' height="150" class="ui circular medium image">
																<?php }else{?>
																	<img src="<?php echo ''.base_url().'assets/uploads/'.$image->user_picture.'';?>" width='150' height="150" class="ui circular medium image">
																<?php };?>
										</a>
										<br><br>
								<?php echo form_open_multipart('ProfileController/');?>
												<div class="image-uploads">
												  	<label for="file-input">
												        <i class="photo icon"></i>
												    </label>
														<input type="file" name="userfile" size="20" />
														<input type="submit"  value="Upload Picture" name="upload" id="upload" disabled/>
												</div>
												<br><br>
																	
								<?php echo form_close(); ?>
								
										<div class="ui horizontal divider">-</div>
										<?php echo $information->firstname?>
										<?php echo $information->lastname?>
											<div class="" id="edit">
												<?php echo anchor('ProfileController/editUpdateProfile','<button>Update Profile</button>');?>
											</div>
					</div>					
							<div class="ui vertical divider"></div>
								<div class="twelve wide column">
									<div class="ui tabular menu">
										<a class="active item">Personal Information</a>
										<a class="item">Account Settings</a>
										<a class="item">Others</a>
									</div>
									
								</div>
						</div>
					</div>
			</div>
		</div>
		<div class="three wide column"></div>
	</div>
</div>
<br>


<script>
$(document).ready(function(){

	$(function(){

		$('input:file').change(function(){

					if($(this).val()){
							$('input:submit').attr('disabled', false);
						}
			});
	});
});

</script>
