 <div id="feed" class="nav_identifier">
 
<div class="ui grid container">
  <div class="four wide column"></div>
  <div class="ten wide column">
  
	  <div class="ui grid">
	  	<div class="ten wide column ui form">
		  <div class="field">
		    <label>Whats on your mind?</label>
		    <textarea rows="2" id="status_input"></textarea>
		  </div>
		</div>
		 <div class="six wide column">
		 	<br><br>
		 	<button id="submitBtn" class="ui small circular inverted green disabled button"><i class="send icon"></i></button>
		 </div>
	  </div>
	<br>
	
	<!-- LOADER START -->
	<div id="loader" class="ui grid">
	<div class="twelve wide column">
	      <div class="ui active inverted dimmer">
	        <div class="ui large text loader">
	          Loading
	        </div>
	      </div>
	      <br><br>
	      <br><br>
	      <br><br>
	</div>
	</div>
	<!-- LOADER END -->
	
  <div id="displaystatus"></div>
  </div>
  
  <div class="four wide column"></div>
  
</div>

<script>
         
        $(document).ready(function () {
        	$.post('<?php echo base_url();?>status/display_status/',function(data){
            	$("#loader").hide();
				$("#displaystatus").html(data).hide().fadeIn('slow');
			});
			
        	//post submit button disabler
        	$("#status_input").keyup(function(){
            	$status = $(this).val().trim();
            	if ($status === '' || $status === null){
        			$("#submitBtn").addClass('disabled');
            	}else{
            		$("#submitBtn").removeClass('disabled');
                }
            	});

        	
        });

      	//when the post submit button is clicked
        $(function() {
    		$("#submitBtn").click(function(){
        			$('#submitBtn').addClass('loading');
    				var user_id =<?php echo  $this->session->userdata('id');?>;
    				var status = $("#status_input").val().trim();
    				var dataString = 'user_id='+ user_id + '&status=' + status;
    				var clientData = { name: "Rey Bango", id: 1 };
    					$.ajax({
    					type: "POST",
    					url: "<?php echo base_url();?>status/insert_status/",
    					data: dataString,
    					cache: false,
    					success: function(data)
    						{
    						$("#status_input").val('');
    						$('#submitBtn').removeClass('loading');
    						$("#submitBtn").addClass('disabled');
    						$("#displaystatus").html(data).hide().fadeIn('slow');
    						},
    					error: function(){
    						alert('Network Error.');
    						}
    					});
    		});
    		
    	});

</script>


