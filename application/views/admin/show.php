<?foreach($query as $row):?>
	<input type="text" value="<?php echo $row->user_id;?>" id="user_id">
	<input type="text" value="true" id="role">
	<div class="ui form">
		<div class="two wide field">
			<label>Firstname</label>
			<input type="text" value="<?=$row->firstname?>" readonly>
		</div>
		<div class="two wide field">
			<label>Lastname</label>
			<input type="text" value="<?=$row->lastname?>" readonly>
		</div>
		<div class="two wide field">
			<label>Birthday</label>
			<input type="text" value="<?=$row->birthday?>" readonly>
		</div>
		<div class="two wide field">
			<label>Age</label>
			<input type="text" value="<?=$row->age?>" readonly>
		</div>
		<div class="two wide field">
			<label>Contact No.</label>
			<input type="text" value="<?=$row->contact_number?>" readonly>
		</div>
		<div class="two wide field">
			<label>Address</label>
			<input type="text" value="<?=$row->address?>" readonly>
		</div>
		<div class="two wide field">
			<label>Gender</label>
			<input type="text" value="<?=$row->gender?>" readonly>
		</div>
		<div class="inline field">
			<label>Role Access</label>
		    <div class="ui slider checkbox">
		    	<label>Admin</label>
		      	<input type="checkbox" value="admin" name="check[]" class="hidden role">
		    </div>
		    <div class="ui slider checkbox">
		    	<label>School Admin</label>
		      	<input type="checkbox" value="school_admin" name="check[]"  class="hidden role">
		    </div>
		    <div class="ui slider checkbox">
		    	<label>Regular User</label>
		      	<input type="checkbox" value="reg_user" name="check[]" class="hidden role">
		    </div>
		    	<input type="submit" class="ui button" id="submit" name="submit">
		  </div>
		  <div class="result"></div>
	</div>
<?endforeach?>
<script>
var base_url = "http://localhost/cite_circle/";
$(document).ready(function(){
	$('.ui.checkbox').checkbox();

	$('#submit').click(function(){

			var role_access_perm = new Array();

			$('.role:checked').each(function(){
				var role = role_access_perm.push($(this).val());
				console.log(role);
			});

	});
  //   $("#check").change(function() {
	 //    var input = $( this );	
	 //    var role = $("#check").prop("checked");
	 //    var user_id = $('#user_id').val();
	 //    $("#submit").click(function(){
	 //    	$.ajax({
		// 			method:"POST",
		// 			url: "<?php echo base_url();?>role_access",	
		// 	        data: "user_id=" + user_id ,
		// 	        success: function(data){      		
		// 	         	$('.result').html("success");
		// 	        }
	 //    	});
	    	
	 //    });
  // 	})
  // .change();
});

var admin = function(){

};
var school_admin = function(){};
var reg_user = function(){};

</script>