<?php 
if(count($query) > 0){?>

  <?php foreach($query as $status){ ?>
  	<div id="status_head_<?php echo $status->status_id;?>" class="ui grid">
  	<div class="twelve wide column ui form ">
  	<div id="<?php echo $status->status_id;?>" class="ui green stacked segment status_head">
  	<!-- START STATUS CONTENT -->
  	<div class="ui feed">
		<div class="event">
	    <div class="label">
		    <!-- user_picture condition START -->
			<?php if($status->user_picture == ""){?>
			<img src="<?php echo ''.base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar circular image">
			<?php }else{?>
			<img src="<?php echo ''.base_url().'assets/uploads/'.$status->user_picture.'';?>" class="ui mini avatar circular image">
			<?php }?>
			<!-- user_picture condition END -->
	    </div>
	    <div class="content">
	    <div class="ui right floated">
	        <?php if ($this->aauth->get_user_id($email=false) == $status->user_id){?>
			<button id="<?php echo $status->status_id;?>" class='popup_button_<?php echo $status->status_id;?> ui right floated tiny circular icon button popup-button'><i class='ellipsis horizontal icon'></i></button>
			<div class='ui flowing popup'>
			<i id="<?php echo $status->status_id;?>" class="edit_icon pointer ui circular inverted edit teal icon"></i>
			<i id="<?php echo $status->status_id;?>" class="remove_icon pointer ui circular inverted trash red icon"></i>
			</div>
			<?php }else{}?>
	     </div>
	      <div class="summary">
	        <a>
	        	<!-- first name condition START-->
				<?php if($status->firstname == ''){
					echo $status->name;
				}else{
					echo $status->firstname;
				}?>
				<!-- first name condition END -->
	        </a>
	        <div class="date">
	        <!--  YOU CAN PUT SOMETHING IN HERE  -->
	        </div>
	        
	      </div>
	      
	      <div class="extra text">
	      
				<!-- display status content START-->
		     	<div id="origbody_<?php echo $status->status_id;?>" class="origbody">
					<?php $mod_status = str_replace(["\r\n", "\r", "\n"], "<br/>", $status->status); 
					echo $mod_status;?>
				</div>
				<!-- display status content END -->
				
				<!-- display EDIT status content START -->
				<div id="editbody_<?php echo $status->status_id;?>" class=" editbody ui form">
					<div class="field">
					<label>Edit:</label>
					<textarea row="2" id="edit_textarea_<?php echo $status->status_id;?>"><?php echo $status->status;?></textarea>
					</div>
				<div class="actions">
					<div class="cancel_update_status ui cancel red button">Cancel</div>
					<div id="" class="update_status ui positive right labeled icon button">Update<i class="checkmark icon"></i></div>
				</div>
				<!-- display EDIT status content END -->
				
			</div>
	      </div>
	      <br>
	      <div class="meta">
	        <a class="wait">
	          <i class="wait icon"></i>
	           <?php 
	          $post_date = $status->time;
	          $now = time();
	          echo timespan($post_date, $now, 1);
	          ?>
	        </a>
	        
	      </div>
	    </div>
	    <!-- display status content END -->
	  	</div>
    </div>
	<!-- END STATUS CONTENT -->
	<!-- COMMENT BOX START -->
	<div class="ui divider"></div>
		 
	<!-- Comment input box START-->
	<div class="ui fluid icon action input">
		<?php if($this->session->userdata('user_picture') == ""){?>
		<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar rounded image">
		<?php }else {?>
		<img src="<?php echo base_url()?>assets/uploads/<?php echo $this->session->userdata('user_picture')?>" class="ui mini rounded image">
		<?php }?>
		<input id=<?php echo $status->status_id;?> class="cmt_input_id_<?php echo $status->status_id;?> commentinput" placeholder="Add a comment..." type="text">
		<div id="<?php echo $status->status_id;?>" class="cmt_btn_id_<?php echo $status->status_id;?> commentbutton ui mini teal disabled button"><i class="send icon"></i></div>
	</div>
	<!-- Comment input box END-->
	<!-- location to append comments -->
	<div id="displaycomment_<?php echo $status->status_id;?>"></div>
		<div class="ui feed">
		<?php foreach ($query2 as $comments){?>
		<?php if($comments->cmt_status_id == $status->status_id){?>
			  <div class="event">
			    <div class="label">
			    <!-- 			user_picture condition -->
			      	<?php if($comments->user_picture == ""){?>
					<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar circular image">
					<?php }else {?>
					<img src="<?php echo base_url()?>assets/uploads/<?php echo $comments->user_picture?>" class="ui mini circular image">
					<?php }?>
			    </div>
			    <div class="content">
			      <div class="summary">
			        <a class="user">
			        <!-- 			first name condition -->
			          <?php if($comments->firstname == ''){
				      		echo $status->name;
				      	}else{
				      		echo $comments->firstname;
				      	}?>
			        </a>
			        <div class="date">
					<!--  YOU CAN PUT SOMETHING IN HERE  -->
			        </div>
			        <h3 class="ui header">
				        <div class="sub header">
				       	 <?php echo $comments->content;?>
			        	</div>
				    </h3>
			      </div>
			      
			      <div class="meta">
			        <a class="wait">
			          <i class="wait icon"></i>
			          <?php 
			          $post_date = $comments->time;
			          $now = time();
			          echo timespan($post_date, $now, 1);
			          ?>
			        </a>
			      </div>
			    </div>
			  </div>
		<?php }?>
		<?php }?>
		</div>
		
    </div>
    </div>
   	</div>
    
    
	<?php }}else{?>
	<br/><br/>
	<div id="nopost" class="ui grid">
		<div class="twelve wide column  ui raised segment">No new post to show</div>
	</div>
	<?php }?>
	
	
<!-- 	DELETE STATUS MODAL START -->
	<div class="ui basic modal">
	  <i class="close icon"></i>
	  <div class="header">
	    Delete Status Confirmation
	  </div>
	  <div class="image content">
	    <div class="image">
	      <i class="inverted circular teal trash icon"></i>
	    </div>
	    <div class="description">
	      <p>Are you sure to delete this status?</p>
	    </div>
	  </div>
	  <div class="actions">
	    <div class="two fluid ui inverted buttons">
	      <div id="close_modal" class="ui cancel red basic inverted button">
	        <i class="remove icon"></i>
	        No
	      </div>
	      <div id="delete_status" class="delete_status ui green basic inverted button">
	        <i class="checkmark icon"></i>
	        Yes
	      </div>
	    </div>
	  </div>
	</div>
<!-- 	DELETE STATUS MODAL END  -->
	
<script type="text/javascript">
$(document).ready(function(){
	$('.editbody').hide();
	$('.popup-button').hide();
	$('.popup-button').popup({
	    popup : $('.flowing.popup'),
	    on    : 'click',
	});

	$('.status_head').mouseenter(function(){
		$id = $(this).attr('id');
		$('.popup_button_'+$id).show();
	});

	$('.status_head').mouseleave(function(){
		$('.popup_button_'+$id).hide();
	});

	//comment submit button disabler
	$(".commentinput").keyup(function(){
    	$comment = $(this).val().trim();
    	$status_id = $(this).attr('id');
    	if ($comment === '' || $comment === null){
			$(".cmt_btn_id_"+$status_id).addClass('disabled');
    	}else{
    		$(".cmt_btn_id_"+$status_id).removeClass('disabled');
        }
    	});
	
	//when the options icon is clicked
	$('.popup-button').click(function(){
		$status_id = $(this).attr('id');
		//edit status
		$('.edit_icon').click(function(){
			$('.popup-button').popup('hide');
	        $('#origbody_'+$status_id).hide();
	        $('#editbody_'+$status_id).show();

	        //when cancel button is clicked
			//cancel the edit
	        $('.cancel_update_status').click(function(){
	        	$('#editbody_'+$status_id).hide();
	        	$('#origbody_'+$status_id).show();
		    });

			//when update button is clicked
			//update the status
	        $('.update_status').click(updateClick);

	        function updateClick () {
	        	$status = $('#edit_textarea_'+$status_id).val();
	            update_status($status_id,$status);
	        }
	        function update_status(status_id,status) {
		        $.ajax('<?php echo base_url();?>status/update_status/',{
		            type: 'POST',
		            data: {
		            	status_id : status_id,
		            	status : status
		            },
		            success: function(data) {
		            	$text = $status.replace(/\r?\n/g, '<br />');
		            	$('#editbody_'+$status_id).hide();
		            	$('#origbody_'+$status_id).html($text);
			        	$('#origbody_'+$status_id).show();
		            },
		            error: function() {
		                //Ajax not successful: show an error
		                alert('An error occured while deleting the status!');
		            }
		        });
		    }
	        
	    });
		//delete status
		$('.remove_icon').click(function(){
			$('.popup-button').popup('hide');
	    	$('.ui.basic.modal').modal('show'); 
	    	$('.delete_status').click(deleteClick);
		
	    	function deleteClick () {
	            delete_status($status_id);
	        }

	    	function delete_status(status_id) {
		        $.ajax('<?php echo base_url();?>status/delete_status/',{
		            type: 'POST',
		            data: {
		            	status_id: status_id
		            },
		            success: function() {
		            	$('.ui.basic.modal').modal('hide');
		                $('#status_head_'+status_id).slideUp('slow');
		            },
		            error: function() {
		                //Ajax not successful: show an error
		                alert('An error occured while deleting the status!');
		            }
		        });
		    }
	    });
	});

	//when comment submit button is clicked
	$(".commentbutton").click(function(){
		var user_id =<?php echo  $this->session->userdata('id');?>;
		var cmt_status_id = $(this).attr('id');
		var content = $(".cmt_input_id_"+cmt_status_id).val().trim();
		var dataString = 'user_id='+ user_id + '&content=' + content + '&cmt_status_id='+cmt_status_id;
			$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>status/insert_comment/",
			data: dataString,
			cache: false,
			success: function(data)
				{
				$(".cmt_input_id_"+cmt_status_id).val('');
				$(".cmt_btn_id_"+$status_id).addClass('disabled');
				$(data).hide().insertAfter("#displaycomment_"+cmt_status_id).slideDown('slow');
				},
			error: function(data){
				alert('Network Failure.');
				}
			});
	});

    
});

</script> 