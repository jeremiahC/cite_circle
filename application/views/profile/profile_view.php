<br>
<br>
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
									<?php echo form_open_multipart('ProfileController/do_upload');?>
										
											<h3 class="sub header"></h3>
													<img class="ui small circular image" src="<?php echo base_url();?>assets/images/avatar/nan.jpg">
														<?php echo '<input type="file" name="userfile" id="profile_picture"/>'?>
														<?php echo '<input type="submit" name="upload" id="upload" value="Update Details"/>'?>
									<?php echo "</form>"?>
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

});

$(function(){
		$('#upload').click(function(){
			  if (typeof FormData !== 'undefined') {
				  var formData = new FormData( $("#formID")[0] );

			        $.ajax({
			            url : "<?php echo base_url();?>index.php/profile_controller/do_upload/",
			            type : 'POST',
			            data : formData,
			            async : false,
			            cache : false,
			            contentType : false,
			            processData : false,
			            success : function(data) {
			            	$("#edit_profile_picture").html(data);
			            	$("#edit_profile_picture").fadeIn(slow);
			            }
			        });

			    } else {
			       message("Your Browser Don't support FormData API! Use IE 10 or Above!");
			    }   
				return false;
			});
	
});
</script>
