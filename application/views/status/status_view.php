<div class="ui grid container">
  <div class="four wide column"></div>
  <div class="ten wide column">
  
	  <div class="ui grid">
	  	<div class="ten wide column ui form">
		  <div class="field">
		    <label>Whats on your mind?</label>
		    <input type="hidden" id="user_id" name="user_id" value="<?php echo $this->aauth->get_user_id($email=false);?>"/> 
		    <textarea rows="2" id="status" name="status"></textarea>
		  </div>
		</div>
		 <div class="six wide column">
		 	<br>
		 	<button id="submitStatus" class="ui small inverted green button">Post</button>
		 </div>
	  </div>
	<br>
  <div id="displaystatus"></div>
  </div>
  
  <div class="four wide column"></div>
</div>


<script>
         
        $(document).ready(function () {
        	$.post('<?php echo base_url();?>status/display_status/',function(data){
				$("#displaystatus").html(data);
			});
        });

        $(function() {
			$("#submitStatus").click(function(){
					var user_id = $('#user_id').val();
					var status = $("#status").val().trim();
					var dataString = 'user_id='+ user_id + '&status=' + status;
					console.log(name);
					if(user_id=='' || status=='')
					{
					alert('Please Give Valid Details');
					}
					else
					{
					$("#displaystatus").fadeIn(100);
						$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>status/insert_status/",
						data: dataString,
						cache: false,
						success: function(data)
							{
							$("#displaystatus").html(data);
							$("#displaystatus").fadeIn('slow');
							$("#status").val('');
							}
						});
					}return false;
			});
		});

</script>

