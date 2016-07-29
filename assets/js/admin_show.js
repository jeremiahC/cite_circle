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