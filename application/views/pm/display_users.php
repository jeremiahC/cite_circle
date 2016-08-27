<script type="text/javascript">
$(document).ready(function(){

//mail icon click to show compose message
	$('.circular.inverted.mail.icon').click(function(){
		$('.received_message').slideUp();
		$(this).transition('pulse');
		$('.compose_message').slideUp().slideDown('slow');
		get_user($(this));

		function get_user(location){
			var get_id = location.siblings('.get_id').val().trim();
			var get_name = location.siblings('.get_name').val().trim();
			var get_pic = location.siblings('.get_pic').html();
			set_user(get_id,get_name,get_pic);
		}

		function set_user(id,name,pic){
			$('.set_label').slideUp().slideDown('3000').find('.set_pic').attr('src',pic);
			$('.set_name').html(name);
			$('.set_receiver_id').val(id);
		}
	});

	//START filters
	//btn filter start
	$('#filter_all').removeClass('basic');
	$('.filter_btn').click(function(){
		var filter = $(this).attr('id');
		$('.filter_btn').removeClass('basic');
		$('.filter_btn').addClass('basic');
		$('#'+filter).removeClass('basic');
		$('.online_identifier').each(function(){
			var online_attr = $(this).attr('id');
			if(filter == 'filter_all'){
				$(this).slideDown();
			}else if(filter == 'filter_online'){
				$(this).slideDown();
				if( online_attr == 0){
					$(this).slideUp();
				}
			}else if(filter == 'filter_offline'){
				$(this).slideDown();
				if(online_attr == 1){
					$(this).slideUp();
				}
			}

		});
	});
	//btn filter end
	//END filters

});
</script>

<!-- START display users -->
	<div class="display_users ui secondary segment centered">
		<div class="ui fluid transparent input">
			<h3>Users</h3>
		</div><br>
		<div class="ui buttons">
			  <div id="filter_all" class="filter_btn ui teal basic button">All</div>
			  <div id="filter_online" class="filter_btn ui teal basic button">Online</div>
			  <div id="filter_offline" class="filter_btn ui teal basic button">Offline</div>
			</div>
	<div id="scrollusers" class="ui celled list scrollusers">

		<?php foreach ($users as $user){ if($user->id == $this->session->userdata('id')){}else{?>
			  <div id="<?php 
			          $time_online = $user->online;
			          $now = time();
			          $time_ago =  timespan($time_online, $now, 1);
			          if($time_ago == 'Just now' || strpos($time_ago, 'Seconds') !== false){ 
			          	echo 1;
			          }else{
			          	echo 0;
			          } ?>" class="online_identifier item">
			  	<div class="right floated content">
			     	<i class="circular inverted mail icon pointer"></i>
			     	<!-- DUMMY -->
			     	<input class="get_id" value="<?php echo $user->user_id; ?>" hidden/>
			     	<div id="get_pic_<?php echo $user->user_id ?>" class="get_pic" hidden >
			     		<?php if($user->user_picture == '' || $user->user_picture == null){?>
					    <?php echo base_url()?>assets/images/new-user-image-default.png
					    <?php }else{ ?>
					    <?php echo base_url()?>assets/uploads/<?php echo $user->user_picture ?>
					    <?php } ?>
			     	</div>
			     	<input id="get_name_<?php echo $user->user_id ?>" class="get_name" value="
				     	<?php if($user->firstname == '' || $user->firstname == null){
				      		echo $user->name;
				      	 }else{
				      	 	echo $user->firstname.' '.$user->lastname;
				       	} ?>
			     	" hidden/>
			     	<!-- DUMMY -->
			    </div>

			    <?php if($user->user_picture == '' || $user->user_picture == null){?>
			    <img class="ui avatar image" src="<?php echo base_url()?>assets/images/new-user-image-default.png">
			    <?php }else{ ?>
			    <img class="ui avatar image" src="<?php echo base_url()?>assets/uploads/<?php echo $user->user_picture; ?>">
			    <?php } ?>

			    <div class="content">
			      <div class="header get_name">
			      	<?php if($user->firstname == '' || $user->firstname == null){
			      		echo $user->name;
			      	 }else{
			      	 	echo $user->firstname.' '.$user->lastname;
			       	} ?>
			      </div>
			         <?php 
			          $time_online = $user->online;
			          $now = time();
			          $time_ago =  timespan($time_online, $now, 1);
			          if($time_ago == 'Just now' || strpos($time_ago, 'Seconds') !== false){ ?>
			          	<i class="circle green icon"></i>Online
			          <?php }else{ ?>
			          	<i class="circle grey icon"></i>Active
			          	<?php echo $time_ago; ?>
			          <?php } ?>
			    </div>
			  </div>
		<?php }} ?>
	</div>
	</div>
	<!-- END display users -->