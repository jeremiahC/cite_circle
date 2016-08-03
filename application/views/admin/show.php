<div class="ui container">
	<h1>Profile</h1>
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
</div>


<script>
$.getScript("<?php echo base_url()?>assets/js/admin_show.js", function(){
	});

</script>

