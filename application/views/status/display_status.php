	<?php
	      foreach($query as $status)
	{
	?>
	<div class="ui grid">
	<div class="twelve wide column ui form">
	<div class="ui green segment">
		<div class="content">
		<a class="right floated"><i class="edit icon"></i></a>
		<a class="right floated"><i class="remove red icon"></i></a>
		</div>
		<div class="extra content">
	      	<a class="header">
	      	<img src="<?php echo base_url()?>assets/images/avatar/nan.jpg" class="ui mini avatar right spaced circular image"">
	      	<span><?php echo $status->name;?></span>
	      	</a>
	      	<div class="meta">
	        <span class="date"><?php echo $status->time;?></span>
	      	</div>
	    </div>
	    <div class="ten wide column">
	    	<?php echo $status->status;?>
	    </div>
	    <div class="ui divider"></div>
	    <div>Comment Box</div>
	    
	</div>
	</div>
	</div>
	<?php
	}
	?>
	 