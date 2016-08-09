$(document).ready(function(){
var base_url = "http://localhost/cite_circle/";

$('.ui.checkbox').checkbox();
			$('#submit').click(function(){	
				$('.role').change(function(){
				var attrib = $(this);
				var role= $(this).val();
				var user_id = $('#user_id').val();

				if(attrib.prop("checked")){	
					
					$.ajax({
						url: base_url + "role",
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

					$.ajax({
						url: base_url  + "delete_role",
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