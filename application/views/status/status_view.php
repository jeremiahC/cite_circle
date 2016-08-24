<script type="text/javascript">	  
		$( document ).ready ( function () {

			$("[data-toggle='toggle']").click(function() {
			    var selector = $(this).data("target");
			    $(selector).toggleClass('in');
			});

			var request_timestamp = 0;

			$('#message').keyup(function() {
				var message = $(this).val();
				
				if(message == ''){
					$('#submit').addClass('disabled');
				}else{
					$('#submit').removeClass('disabled');
				}
			});

			var parseTimestamp = function(timestamp) {
				var d = new Date( timestamp * 1000 ), // milliseconds
					yyyy = d.getFullYear(),
					mm = ('0' + (d.getMonth() + 1)).slice(-2),	// Months are zero based. Add leading 0.
					dd = ('0' + d.getDate()).slice(-2),			// Add leading 0.
					hh = d.getHours(),
					h = hh,
					min = ('0' + d.getMinutes()).slice(-2),		// Add leading 0.
					ampm = 'AM',
					timeString;
						
				if (hh > 12) {
					h = hh - 12;
					ampm = 'PM';
				} else if (hh === 12) {
					h = 12;
					ampm = 'PM';
				} else if (hh == 0) {
					h = 12;
				}

				timeString = yyyy + '-' + mm + '-' + dd + ', ' + h + ':' + min + ' ' + ampm;
					
				return timeString;
			}

			var sendChat = function (message, callback) {
				$.getJSON('<?php echo base_url(); ?>chat/send_message?message=' + message, function (data){
					// callback();
				});
			}

			var append_chat_data = function (chat_data) {
				chat_data.forEach(function (data) {
					var html = '<li class="">';
					if(data.user_picture == '' || data.user_picture == null){
						html += '<img class="ui avatar image" src="<?php echo base_url()?>assets/images/new-user-image-default.png">';
					}else{
						html += '<img class="ui avatar image" src="<?php echo base_url()?>assets/uploads/'+data.user_picture+'">';
					}
					
					if(data.firstname == '' || data.firstname == null){
						html += '<span>'+data.name+'</span>';
					}else{
						html += '<span>'+data.firstname+' '+data.lastname+'</span>';
					}
					html += '<div><b>'+ data.message + '</b></div>';
					html += '<div class="meta"><i class="wait icon"></i>'+parseTimestamp(data.timestamp) +'</div>';
					html += '<div class="ui divider"></div>';
					html += '</li>';
					$("#received").html( $("#received").html() + html);
				});
			  
				$('#received').animate({ scrollTop: $('#received').height()}, 1000);
			}

			var update_chats = function () {
				if(typeof(request_timestamp) == 'undefined' || request_timestamp == 0){
					var offset = 60*15; // 15min
					request_timestamp = parseInt( Date.now() / 1000 - offset );
				}
				$.getJSON('<?php echo base_url(); ?>chat/get_messages?timestamp=' + request_timestamp, function (data){
					append_chat_data(data);	

					var newIndex = data.length-1;
					if(typeof(data[newIndex]) != 'undefined'){
						request_timestamp = data[newIndex].timestamp;
					}
				});      
			}

			$('#submit').click(function (e) {
				e.preventDefault();
				var $field = $('#message');
				var data = $field.val();
				if(data != '')
				{
					$field.addClass('disabled').attr('disabled', 'disabled');
					sendChat(data);
					$field.val('').removeClass('disabled').removeAttr('disabled');
					$('#submit').addClass('disabled');
				}else{
					//nothing happens
				}
			});

			setInterval(function (){
				update_chats();
			}, 1500);
		});
		
		
	</script>

 <div id="feed" class="nav_identifier">
<script src="<?php echo base_url()?>assets/js/status_view.js"></script>
<div class="ui grid">
	<div class="four wide column">
		<div class="globalchat pointer text-center bg-secondary" data-toggle="toggle" data-target="#chatbox">
			<b>Global Chat</b> &nbsp;&nbsp; <i class="globalchat_icon unhide icon"></i>
		</div>
		<br>
		<div id="chatbox">
			<ul id="received" class="scrollchat">
			</ul>

			<div class="ui fluid transparent input">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="message" class="input-border-b" placeholder="Say something..." type="text">
			<i id="submit" class="disabled pointer inverted teal circular send icon"></i>
			</div>

		</div>
	</div>
  <!-- START eight wide column -->
  <div id="second_column" class="eight wide column">
  
	  <div class="ui grid">
	  	<div class="twelve wide column ui form">
		  <div class="field">
		    <label>Share your thoughts!</label>
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
  
</div>
<!-- END eight wide column -->
  <div class="four wide column"></div>
  
</div>

