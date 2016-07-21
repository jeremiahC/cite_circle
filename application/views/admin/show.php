<?foreach($query as $row):?>
	<input type="text" hidden="hidden" value="<?php echo $row->user_id;?>" id="user_id">
	<form class="ui form">
		
		<div class="inline field">
			<label>Role Access</label>

		    <div class="ui slider checkbox">
		    	<label>School Admin</label>
		    	<?if($this->aauth->is_allowed('school_admin', $row->user_id)){?>
		      		<input type="checkbox" value="school_admin" name="check"  class="hidden role" checked="checked">
		      	<?php }else{?>
		      		<input type="checkbox" value="school_admin" name="check"  class="hidden role" >
		      	<?php };?>
		    </div>
		   	<input type="submit" class="ui button" id="submit" name="submit">
		   	<a href="<?php echo base_url();?>admin_dashboard" class="ui teal button">Back To List</a>
		 </div>
		  <div class="result"></div>
	</form>
<?endforeach?>


<script>
$(document).ready(function(){
$('.ui.checkbox').checkbox();
			$('#submit').click(function(){	
				$('.role').change(function(){
				var attrib = $(this);
				if(attrib.prop("checked")){	
					var role= $(this).val();
					var user_id = $('#user_id').val();

					$.ajax({
						url: "<?php echo base_url();?>role",
						type: 'POST',
						data: {
							'role': role,
							'user_id' : user_id
						},
						success: function(){
							$('.result').html('success');
						},
						error: function() {
	                             //Ajax not successful: show an error
	                            alert('An error occured while deleting the status!');
	                   	}
					});		
				}else{
					var role= $(this).val();
					var user_id = $('#user_id').val();

					$.ajax({
						url: "<?php echo base_url();?>delete_role",
						type: 'POST',
						data: {
							'role': role,
							'user_id' : user_id
						},
						success: function(){
							$('.result').html('success');
						},
						error: function() {
	                             //Ajax not successful: show an error
	                            alert('An error occured while deleting the status!');
	                   	}
					});		
				}
			}).change();
		});
});

</script>