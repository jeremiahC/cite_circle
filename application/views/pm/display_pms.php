<script type="text/javascript">
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
</script>

<div class="display_pm_list ui secondary segment">
		<div class="ui fluid transparent input">
			<h3>Received messages</h3>
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