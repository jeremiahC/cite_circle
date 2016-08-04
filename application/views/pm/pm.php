<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.display_users').hide();
	$('.compose_message').hide();
	$('.floating_buttons').click(function(){
		$('.f_button').transition('horizontal flip');
	});

	$('.circular.inverted.mail.icon').click(function(){
		$('.compose_message').show();
	});

	$('.message_sent').click(function(){
		$('.ui.basic.modal').modal('show');
		setTimeout(function(){
			$('.ui.basic.modal').modal('hide');
		}, 1200);
	});

	$('.for_users').click(function(){
		$('.display_users').show();
	});

	

});
</script>

<div class="ui grid display_users">

	<div class="two wide column">
	</div>

	<div class="four wide column">
	<div class="four wide column bg-secondary">
	<div class="ui celled list scrollusers">

		<?php foreach ($users as $user){ ?>
			  <div class="item">
			  	<div class="right floated content">
			     	<i class="circular inverted mail icon pointer"></i>
			    </div>

			    <?php if($user->user_picture == '' || $user->user_picture == null){?>
			    <img class="ui avatar image" src="<?php echo base_url()?>assets/images/new-user-image-default.png">
			    <?php }else{ ?>
			    <img class="ui avatar image" src="<?php echo base_url()?>assets/uploads/<?php echo $user->user_picture; ?>">
			    <?php } ?>

			    <div class="content">
			      <div class="header">
			      	<?php if($user->firstname == '' || $user->firstname == null){
			      		echo $user->name;
			      	 }else{
			      	 	echo $user->firstname.' '.$user->lastname;
			       	} ?>
			      </div>
			      <?php if($user->online == 1){?>
			      	<i class="circle green icon"></i>Online
			  		<?php }else{ ?>
			  		<i class="circle grey icon"></i>Offline
			  		<?php } ?>
			    </div>
			  </div>
		<?php } ?>

	</div>
	</div>
	</div>
	<div class="eight wide column compose_message">
		<div class="">
			<div class="ui segment">
    			To:&nbsp&nbsp <a class="ui image label">
 				<img src="/images/avatar/small/joe.jpg">
  				Joe
				</a>
 			<div class="ui divider"></div>
    			<form class="ui form">
    				<div class="">
    					Subject:
      					<input/>
    				</div>
    				<br/>
    				<div class="field">
    					Message:
      					<textarea></textarea>
    				</div>
    				<div class="ui blue labeled submit icon button message_sent">
      					<i class="send outline icon"></i> Send
    				</div>
  				</form>		
			</div>
		</div>
	</div>
</div>

<div class="ui basic modal">
	<div class="text-center">
	<i class="massive checkmark icon"></i><br/>
	<p class="text3">Sent</p>
	</div>
</div>
<div class="floating_buttons">

<a class="f_button minus_icon btn-float1 pointer hide" id="options">
	<i class="inverted large minus icon"></i>
</a>
<a class="f_button btn-float1 pointer" id="options">
	<i class="inverted large plus icon"></i>
</a>
<a class="f_button btn-float2 pointer hide for_users" id="options">
	<i class="inverted large users icon"></i>
</a>
<a class="f_button btn-float3 pointer hide" id="options">
	<i class="inverted large mail icon"></i>
</a>

</div>
