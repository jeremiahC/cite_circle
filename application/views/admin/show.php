<div class="ui container">
	<h1>Profile</h1>
		{user_field}
		<div class="ui grid">
			<div class="two column row">
				<div class="eleven wide column">
					<div class="ui segment">
						info
					</div>
				</div>
				<div class="four wide column">
					<div class="ui segment">
						<form class="ui form">
							<div class="inline field">
								<label>Role Access</label>
							    <div class="ui slider checkbox">
							    	<label>School Admin</label>
							    	{checkbox_field}
							    </div>
							</div>
							<div class="result"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="column row">
				<div class="fifteen wide column">
					<div class="ui segment">
						<input type="submit" class="ui button" id="submit" name="submit">
						<a href="<?php echo base_url();?>userlist" class="ui teal button">Back To List</a>
					</div>
				</div>
			</div>
		</div>
</div>


<script>
$.getScript("<?php echo base_url()?>assets/js/admin_show.js", function(){
	});
</script>

