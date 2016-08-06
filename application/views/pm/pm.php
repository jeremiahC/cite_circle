<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.floating_buttons').click(function(){
		$('.f_button').transition('horizontal flip');
	});

	//toggle user list
	$('.for_users').click(function(){
		$('.display_users').transition('fly right');
		$('.display_filter').transition('fly right');
		$('.compose_message').slideUp();
	});

	//toggle pm list
	$('.for_pm_list').click(function(){
		$('.display_pm_list').transition('fly right');
		$('.received_message').slideUp();
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
	//search filter start
	//not working pa
	$('#search_filter').keyup(function(){
		var keyword = $(this).val();
		console.log(keyword);
		$('.online_identifier').each(function(){
			var get_name = $(this).find('.get_name').val().trim();
			console.log(get_name);
		});
	});
	//search filter end
	//END filters

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
	
	//submit click of composed message
	$('.message_sent').click(function(){
		var receiver_id = $('.set_receiver_id').val();
		var subj = $('.set_subj').val().trim();
		var message = $('.set_message').val().trim();
			$.ajax({
			type: "POST",
			url:"<?php echo base_url() ?>pm/send_pm/",
			data: {
			'receiver_id':receiver_id,
			'subj':subj,
			'message':message			
			},
			cache: false,
			success: function(data)
				{
					console.log('success' +data);
					$('.set_message').val('');
					$('.set_subj').val('');
					$('.set_receiver_id').val('');
				}
			});

		$('.compose_message').slideUp();
		$('.ui.basic.modal').modal('show');
		setTimeout(function(){
			$('.ui.basic.modal').modal('hide');
		}, 1100);
	});

	//START LIST_PMs /////////////////////////////////////////////////
	//START set name and pic for list of pms
	$('.list_set_name').each(function(){
		var list_receiver_id = $(this).attr('id');
		var set_name = $('#get_name_'+list_receiver_id).val();
		$(this).html(set_name);
	});
	$('.list_set_pic').each(function(){
		var list_receiver_id = $(this).attr('id');
		var set_pic = $('#get_pic_'+list_receiver_id).html();
		$(this).attr('src',set_pic);
	});
	//END set name and pic for list of pms

	//for list_pm  click of specific pm
	$('.view_pm').click(function(){
		$('.compose_message').slideUp();
		$('.received_message').slideUp();
		$('.received_message').slideDown();

		var pm_id = $(this).attr('id');
		var pm_sender_id = $('.pm_sender_id_'+pm_id).val();
		var pm_title = $('.pm_title_'+pm_id).val();
		var pm_message = $('.pm_message_'+pm_id).html();
		var pm_date_sent = $('.pm_date_sent_'+pm_id).val();
		var set_name = $('#get_name_'+pm_sender_id).val().trim();	
		var set_pic = $('#get_pic_'+pm_sender_id).html();
		$('.set_name_received').html(set_name);
		$('.set_pic_received').attr('src',set_pic);
		$('.set_pm_date_sent').html(pm_date_sent);
		$('.set_pm_title').html(pm_title);
		$('.set_reply_pm_title').val(pm_title);
		$('.set_pm_message').html(pm_message);
		$('.set_reply_receiver_id').val(pm_sender_id);
		$('.reply_form').hide();
		$(this).removeClass('unread');

		//to make the pm read from unread
		$.ajax({
			type : "POST",
			url : "<?php echo base_url()?>pm/read_pm",
			data : { 'pm_id' : pm_id },
			success : function(data){
				console.log(data);
			}

		});

	});
	
	//reply button of view pm
	$('.reply_btn').click(function(){
		$('.reply_form').slideDown();
	});

	//close button of view pm
	$('.close_btn').click(function(){
		$('.received_message').slideUp();
	});

	//START send a reply
	$('.reply_message_send').click(function(){
		var receiver_id = $('.set_reply_receiver_id').val();
		var subj = $('.set_reply_pm_title').val().trim();
		var message = $('.set_reply_message').val().trim();
			$.ajax({
			type: "POST",
			url:"<?php echo base_url() ?>pm/send_pm/",
			data: {
			'receiver_id':receiver_id,
			'subj':subj,
			'message':message			
			},
			cache: false,
			success: function(data)
				{
					console.log('success' +data);
					$('.set_message').val('');
					$('.set_subj').val('');
					$('.set_receiver_id').val('');
				}
			});

		$('.received_message').slideUp();
		$('.ui.basic.modal').modal('show');
		setTimeout(function(){
			$('.ui.basic.modal').modal('hide');
		}, 1100);

	});
	//END send a reply
});
</script>

<div class="ui grid">

	<div class="two wide column">
		<div class="hide display_filter float280">
		<div class="ui vertical labeled icon buttons">
		  <button id="filter_all" class="filter_btn ui blue basic button"><i class=" filter icon"></i>All</button>
		  <button id="filter_online" class="filter_btn ui green basic button"><i class=" filter icon"></i>Online</button>
		  <button id="filter_offline" class="filter_btn ui grey basic button"><i class=" filter icon"></i>Offline</button>
		</div>
		</div>
	</div>

	<!-- START display users -->
	<div class="four wide column">
	<div class="hide display_users ui secondary segment">
		<div class="ui fluid transparent input">
			<input id="search_filter" class="input-border-b" placeholder="Type to filter..." type="text">
			<i id="submit" class="inverted grey circular search icon"></i>
		</div>
	<div class="ui celled list scrollusers">

		<?php foreach ($users as $user){ if($user->id == $this->session->userdata('id')){}else{?>
			  <div id="<?php echo $user->online; ?>" class="online_identifier item">
			  	<div class="right floated content">
			     	<i class="circular inverted mail icon pointer"></i>
			     	<!-- DUMMY -->
			     	<input class="get_id" value="<?php echo $user->user_id; ?>" hidden/>
			     	<div id="get_pic_<?php echo $user->user_id ?>" class="get_pic" hidden >
			     		<?php if($user->user_picture == '' || $user->user_picture == null){?>
					    <?php echo base_url()?>assets/images/new-user-image-default.png ?>
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
			      <?php if($user->online == 1){?>
			      	<i class="circle green icon"></i>Online
			  		<?php }else{ ?>
			  		<i class="circle grey icon"></i>Offline
			  		<?php } ?>
			    </div>
			  </div>
		<?php }} ?>

	</div>
	</div>
	</div>
	<!-- END display users -->

	<div class="six wide column">
	<!-- START compose message -->
		<div class="compose_message hide">
			<div class="ui segment">
    			To:&nbsp;&nbsp; <a class="set_label ui image label">
  				<input hidden class="set_receiver_id">
  				<img class="set_pic"></img>
  				<span class="set_name"></span>
				</a>
 			<div class="ui divider"></div>
    			<form class="ui form">
    				<div class="">
    					Subject:
      					<input class="set_subj"/>
    				</div>
    				<br/>
    				<div class="field">
    					Message:
      					<textarea class="set_message"></textarea>
    				</div>
    				<div class="ui blue labeled submit icon button message_sent">
      					<i class="send outline icon"></i> Send
    				</div>
  				</form>
			</div>
		</div>
	<!-- END compose message -->

	<!-- START view pm message -->
		<div class="hide received_message">
			<div class="ui segment">
    			From:&nbsp;&nbsp; <a class="set_label ui image label">
  				<img class="set_pic_received">
  				<span class="set_name_received"></span>
				</a>
 			<div class="ui divider"></div>
 			<div><i class="wait icon"></i><span class="set_pm_date_sent"></span></div><br>
    				<div class="">
    					<b>Subject:</b> <span class="set_pm_title"></span>
    				</div>
    				<br/>
    				<div class="field">
    					<b>Message:</b>
    					<div class="set_pm_message">
      					</div>
    				</div>
    			<br/>

				<div class="reply_btn ui circular small green inverted vertical animated button" tabindex="0">
		        	<div class="hidden content closemodal">Reply</div>
		            <div class="visible content closemodal">
	                	<i class="large reply icon"></i>
                    </div> 
				</div>
				<div class="close_btn ui circular small red inverted vertical animated button" tabindex="0">
		            <div class="hidden content closemodal">Close</div>
		            <div class="visible content closemodal">
	                	<i class="large compress icon"></i>
					</div>
				</div>

			<div class="reply_form">
				<div class="ui divider"></div>
    			<form class="ui form">
    				<div class="">
    					Subject:
    					<input class="set_reply_receiver_id" hidden/>
      					<input class="set_reply_pm_title"/>
    				</div>
    				<br/>
    				<div class="field">
    					Message:
      					<textarea class="set_reply_message"></textarea>
    				</div>
    				<div class="reply_message_send ui blue labeled submit icon button">
      					<i class="send outline icon"></i> Send
    				</div>
  				</form>
			</div>	
					
			</div>
			
		</div>
	<!-- END view pm message -->
	
	</div>

	<div class="ui basic modal">
		<div class="text-center">
		<i class="massive checkmark icon"></i><br/>
		<p class="text3">Sent</p>
		</div>
	</div>



	<!-- START List PMs -->
	<div class="four wide column">
	<div class="hide display_pm_list ui secondary segment">
		<div class="ui fluid transparent input">
			<input id="search_filter" class="input-border-b" placeholder="Type to filter..." type="text">
			<i id="submit" class="inverted grey circular search icon"></i>
		</div>
	<div class="ui relaxed divided list scrollusers">

		<?php foreach ($pms as $pm) {

		if($pm->date_read == null){?>
		 <div id="<?php echo $pm->id; ?>" class="item unread pointer_list view_pm">
		 <?php }else{?>
		 <div id="<?php echo $pm->id; ?>" class="item pointer_list view_pm">
		  <?php } ?>
		    <img id="<?php echo $pm->sender_id; ?>" class="list_set_pic ui avatar image">
		    <div class="content">
		      <a id="<?php echo $pm->sender_id; ?>" class="list_set_name header"></a>
		      <div class="description"><?php echo $out = strlen($pm->message) > 30 ? substr($pm->message, 0,30)."..." : $pm->message; ?></div>
		    </div>
		</div>

			<!-- DUMMY for setting infos -->
			<input class="pm_sender_id_<?php echo $pm->id; ?>" value="<?php echo $pm->sender_id; ?>" hidden/>
			<input class="pm_title_<?php echo $pm->id; ?>" value="<?php echo $pm->title; ?>" hidden/>
			<div class="pm_message_<?php echo $pm->id; ?> hide">
				<?php $message = str_replace(["\r\n", "\r", "\n"], "<br/>", $pm->message); 
					echo $message;?>
			</div>
			<input class="pm_date_sent_<?php echo $pm->id; ?>" value="<?php echo $pm->date_sent; ?>" hidden/>
			<!-- DUMMY for setting infos -->

		<?php } ?>

	</div>
	</div>
	</div>
	<!-- END List PMs -->

</div>

	<!-- START Floating buttons -->
	<div class="floating_buttons">

	<a class="f_button minus_icon btn-float1 pointer hide" id="options">
		<i class="inverted large minus icon"></i>
	</a>
	<a class="f_button btn-float1 pointer" id="options">
		<i class="inverted large plus icon"></i>
	</a>
	<a class="for_users f_button btn-float2 pointer hide" id="options">
		<i class="inverted large users icon"></i>
	</a>
	<a class="for_pm_list f_button btn-float3 pointer hide" id="options">
		<i class="inverted large mail icon"></i>
	</a>

	</div>
	<!-- END floating buttons -->
