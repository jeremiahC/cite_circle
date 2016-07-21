 <div id="feed" class="nav_identifier">
<script src="<?php echo base_url()?>assets/js/status_view.js"></script>
<div class="ui grid container">
  <div class="four wide column"></div>
  <div class="eight wide column">
  
	  <div class="ui grid">
	  	<div class="twelve wide column ui form">
		  <div class="field">
		    <label>Whats on your mind?</label>
		    <textarea rows="2" id="status_input"></textarea>
		  </div>
		</div>
		 <div class="four wide column">
		 	<br><br>
		 	<div id="<?php echo  $this->session->userdata('id');?>" class="submitBtn disabled ui circular small green inverted vertical animated button" tabindex="0">
		    <div class="hidden content closemodal">POST</div>
		    <div class="visible content closemodal">
	        <i class="send icon"></i>
		 </div>
	  </div>
					
		 </div>
	  </div>
	<br>
	
	<!-- LOADER STATUS PAGE START -->
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
	
  <div id="displaystatus" class=""></div>
  
  	<!-- LOADER MORE STATUS START -->
  	<div id="statusloader"  class="ui center aligned grid">
		<div class="one twelve wide column segment">
			<div class="statusloader">
  			</div>
		</div>
	</div>
  	<!-- LOADER END -->
  
  <div class="four wide column"></div>
  
</div>

