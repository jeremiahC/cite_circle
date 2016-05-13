<br>
<br>
<?php foreach ($user_profile as $information){}?>

<div class="ui grid">
	<div class="row">
		<div class="three wide column"></div>
			<div class="ten wide column">
				<div class="row">
					<h1 class="header">Update Profile</h1>
					<div class="ui segment">
					<div class="four wide column"></div>
						<div class="twelve wide column">
							<div class="ui top attached tabular menu">
								<a class="active item" id="personal" data-tab="personal"><i class="icon edit sign"></i>Personal Information</a>
								<a class="item" id="account" data-tab="account"><i class="icon edit sign"></i>Account Settings</a>
								<a class="item" id="others" data-tab="others"><i class="icon edit sign"></i>Others</a>
							</div>
							
							
							
							<div class="ui bottom attached active tab segment" data-tab="personal">
							<?php echo form_open('ProfileController/edit_profile');?>
							<div class="ui form">
								  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id']?>"/>
								  <div class="field">
								    <label>First Name</label>
								    <input type="text" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $information->firstname;?> "required>
								  </div>
								  <div class="field">
								    <label>Last Name</label>
								    <input type="text" id="lastname"  name="lastname" placeholder="Last Name" value="<?php echo $information->lastname;?>"required>
								  </div>
								  <div class="inline fields">
								  	<div class="field">
								  	<label>Gender</label>
								    	<div class="ui radio checkbox">
								      		<input type="radio" name="gender" id="gender" value="Male" checked="checked">
								      		<label><i class="male icon"></i>Male</label>
								      	</div>
								     </div>
								    <div class="field">
								    	<div class="ui radio checkbox">
								      		<input type="radio" name="gender" id="gender" value="Female">
								      		<label><i class="female icon"></i>Female</label>
								      	</div>
								    </div>
								  </div>
								  <div class="field">
								    <label>Birthday</label>
								    <input type="date" name="birthday" id="birthday" value="<?php echo $information->birthday; ?>"required>
								  </div>
								  <div class="field">
								    <label>Age</label>
								    <input type="number" name="age" id="age" min="1" max="100" value="<?php echo $information->age; ?>"required>
								  </div>
								   <div class="field">
								    <label>Contact Number</label>
								    <input type="number" name="contact_number" id="contact_number" value="<?php echo $information->contact_number;?>"required>
								  </div>
								  <div class="field">
								    <label>Address</label>
								    <input type="text" name="address" id="address" value="<?php echo $information->address;?>"required>
								  </div>
								  <input id="personal_submit" class="ui fluid small teal submit button"  type="submit" value="Update">
								  <span id="personal_load"></span>
								   <div id="gohome" class="profile ui message">
								      Go back to <?php echo anchor('home','Home.')?>
								   </div>
								 </div>
								<?php echo form_close();?>
							</div>
							
							
							
							
							
							<div class="ui bottom attached tab segment" data-tab="account">
							<?php echo form_open('ProfileController/update_account');?>
							<div class="ui form">
								  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id']?>"/>
								  <div class="field">
								    <label>Username</label>
								    <input name="username" id="username" type="text" value="<?php echo $information->name;?>" required><span id="username_verify"></span>
								  </div>
								  <div class="field">
								    <label>Password</label>
								    <input type="password" id="password" name="password" placeholder="Enter your password..." required><span id="password_verify"></span>
								  </div>
								  <div class="field">
								    <label>Email</label>
								    <input type="email" name="email" id="email" value="<?php echo $information->email;?>" required><span id="email_verify"></span>
								  </div>
								  <input type="hidden" name="origemail" id="origemail" value="<?php echo $information->email;?>"/>
								  <input id="account_submit" class="ui fluid small teal submit button"  type="submit" value="Update">
								  <span id="account_validation"></span>
								  <div id="gohome" class="account ui message">
								      Go back to <?php echo anchor('home','Home.')?>
								   </div>
								</div>
								<?php echo form_close();?>
							</div>
							
							
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script>
$(document).ready(function(){
	$('#gohome.profile').hide();
	$('#gohome.account').hide();

	$('.menu .item')
	  .tab()
	;
});

$(function(){

	$('#personal_submit').click(function(){

		  var form_data = {
			        firstname: $('#firstname').val(),
			        lastname: $('#lastname').val(),
			        gender: $('#gender').val(),
			        birthday: $('#birthday').val(),
			        age: $('#age').val(),
			        contact_number: $('#contact_number').val(),
			        address: $('#address').val()
			    };
	console.log(form_data);
	
		  $.ajax({
		        url: "<?php echo base_url();?>ProfileController/update_profile",
		        type: 'POST',
		        data: form_data,
		        success: function(msg) {
		            if (msg == 'true'){	
			            $('#gohome.profile').show('slow');
		                $('#personal_load').html('<i style="color: green">Successfully Updated!</i>. <i class="big green checkmark icon"></i>');
		            }else{
		                $('#personal_load').html('<i style="color: red">Invalid to update!</i>. <i class="big red wrong icon"></i>');
		        }
		        }
		    });
		    return false;
		});
	
});
$(function(){
	
	$('#username').keyup(function(){
			var dataString = "name="+$("#username").val();
			console.log(dataString);
	
		if($("#username").val().length >= 4){ 
			$.ajax({
				   type: "POST",
				   url: "<?php echo base_url();?>ProfileController/check_user",
				   data: dataString,
				   success: function(msg){
				    if(msg == "true"){
					    $("#username_verify").fadeIn(100).html('<i style="color: green">Username is valid</i>. <i class="big green checkmark icon"></i>');
				    }else{
				     $("#username_verify").fadeIn(100).html('<i style="color: red">The username is already taken, please choose another username</i>.<i class="big red remove icon"></i>');
				    }
				   }
				  });

		  }else{
			  		$("#username_verify").fadeIn(100).html('<i style="color: orange">Username is atleast four characters</i>. <i class="big yellow warning icon"></i>');
			  }
		});
});

	$(function(){

		$('#password').keyup(function(){
				var dataString = "password="+$("#password").val();
				console.log(dataString);
				
				$.ajax({
					   type: "POST",
					   url: "<?php echo base_url();?>ProfileController/check_pass",
					   data: dataString,
					   success: function(msg){
					    if(msg == "true"){
						    $("#password_verify").fadeIn(100).html('<i style="color: green">Password is valid</i>. <i class="big green checkmark icon"></i>');
					    }else{
					     $("#password_verify").fadeIn(100).html('<i style="color: red">The password is must contain 6 characters.</i>. <i class="big red remove icon"></i>');
					    }
					    
					   }
					  });

			});

	});
		
	$(function(){

		
		$('#email').keyup(function(){
				var dataString = {email: $("#email").val()};
				console.log(dataString);
				var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
				var email_valid = $("#email").val();
				
				if(filter.test(email_valid)){
					$.ajax({
					   type: "POST",
					   url: "<?php echo base_url();?>ProfileController/check_email",
					   data: dataString,
					   success: function(msg){
					    if(msg == "true")
					    {
						    $("#email_verify").fadeIn(100).html('<i style="color: green">Email is valid</i>. <i class="big green checkmark icon"></i>');
					    }
					    else
					    {
					     $("#email_verify").fadeIn(100).html('<i style="color: red">The email is already taken, please choose another email</i>. <i class="big red remove icon"></i>');
					    }
					   }
					  });

			  }else{
				  		$("#email_verify").fadeIn(100).html('<i style="color: orange">Invalid email address.</i>. <i class="big yellow warning icon"></i>');
				  }
			});
	});
		$(function(){

				$('#account_submit').click(function(){
					
					var dataString = {
					        username: $('#username').val(),
					        password: $('#password').val(),
					        email: $('#email').val()
					    };
					console.log(dataString);
					$.ajax({
						   type: "POST",
						   url: "<?php echo base_url();?>ProfileController/update_account",
						   data: dataString,
						   success: function(msg){
						    if(msg == "true"){
					            $('#gohome.account').show('slow');
							    $("#account_validation").fadeIn(100).html('<i style="color: green">Successfully Updated!</i>. <i class="big green checkmark icon"></i>');
							    
						    }else{
						     $("#account_validation").fadeIn(100).html('<i style="color: red">Unable to update!</i>. <i class="big red remove icon"></i>');
							 }
						   }
						  });
				return false;
			});
	
	});
</script>
