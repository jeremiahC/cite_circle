<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
$(document).ready(function(){

	// START GET THE display_users and display_pms view
	$.post('<?php echo base_url(); ?>pm/display_users', function (data){
			$("#display_users").html(data) ;
		});
	function display_users(){
		$.post('<?php echo base_url(); ?>pm/display_users', function (data){
			$("#display_users").html(data) ;
		});
	}

	setInterval(function (){
		display_users();
	}, 30000);

	$.post('<?php echo base_url(); ?>pm/display_pms',{'limit': 15}, function (data){
			$("#display_pms").html(data) ;
		});

	function display_pms(){
	$.post('<?php echo base_url(); ?>pm/display_pms',{'limit': 15}, function (data){
			$("#display_pms").html(data) ;
		});
	}
	
	setInterval(function (){
		$.get('<?php echo base_url(); ?>pm/count_unread_pms', function (data){
			if(data >= 1){
				display_pms();
			}else{
			}
		});
	}, 3000);

	// END GET THE display_users and display_pms view

	
	
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
	//close button of compose message
	$('.close_btn_compose').click(function(){
		$('.compose_message').slideUp();
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
					$('.set_reply_message').val('');
					$('.set_reply_pm_title').val('');
					$('.set_reply_receiver_id').val('');
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

<div id="pm" class="nav_identifier"></div>
<div class="ui grid">
<div class="row">
	<!-- START display users -->
	<div id="display_users" class="four wide column"></div>
	<!-- END display users -->

	<div class="eight wide column">
	<!-- START compose message -->
		<div class="compose_message hide">
			<div class="ui segment">
    			To:&nbsp;&nbsp; <a class="set_label ui image label">
  				<input hidden class=" ">
  				<img class="set_pic"></img>
  				<span class="set_name"></span>
				</a>
 			<div class="ui divider"></div>
    			<form class="ui form">
    				<div class="">
    					Subject:
      					<input class="set_subj"/>
      					<input class="set_receiver_id" hidden/>
    				</div>
    				<br/>
    				<div class="field">
    					Message:
      					<textarea class="set_message"></textarea>
    				</div>
    				<div class="ui blue labeled submit icon button message_sent">
      					<i class="send outline icon"></i> Send
    				</div>
    				<div class="right floated close_btn_compose ui circular small red inverted vertical animated button" tabindex="0">
		            <div class="hidden content closemodal">Close</div>
		            <div class="visible content closemodal">
	                	<i class="large compress icon"></i>
					</div>
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
	<input hidden id="pm_limit" value="10"/>
	<input hidden id="pm_offset"/>
	<div id="display_pms" class="four wide column">
	</div>
	<!-- END List PMs -->

</div>
</div>
