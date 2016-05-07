<!DOCTYPE html>
<html lang="en">
<head>
  <title>User's Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
  <link href="<?php echo base_url();?>assets/SemanticUI/semantic.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url();?>assets/SemanticUI/semantic.js"></script>
 
  
</head>
<style>

div#edit
{
	font-style: italic;
	opacity: 0.4;
}

</style>
<body>

<div class="ui secondary pointing menu">
	<div class="left menu">
		<a class="item"> Cite Circle </a>
	</div>
	<div class="right menu">
  		<a class="active item"><i class="home icon"></i>Home</a>
  		<a class="item">Profile</a>
  		<a class="item">Messages</a>
  	</div>
</div>
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
													<img class="ui small circular image" src="<?php echo base_url();?>assets/img/userlogo.jpg">
														<?php echo '<input type="file" name="userfile" id="profile_picture"/>'?>
														<?php echo '<input type="submit" name="upload" id="upload" value="Update Details"/>'?>
									<?php echo "</form>"?>
										<div class="ui horizontal divider">-</div>
										<?php echo $information->firstname?>
										<?php echo $information->lastname?>
											<div class="" id="edit">
												<br>
												<?php echo anchor('ProfileController/edit','<button>Edit Profile</button>');?>
												<br><br>
												<?php echo anchor('ProfileController/update','<button>Update Profile</button>');?>
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
</body>

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

</html>