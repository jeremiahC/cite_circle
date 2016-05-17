33<style type="text/css">
    textarea.nostyle{
    	border-style: none !important;
    	resize: none;
    }
</style>
	
	<?php foreach($query as $status){ ?>
	<div id="status_head_<?php echo $status->status_id;?>" class="ui grid status-head">
	<div class="twelve wide column ui form">
	<div class="ui green segment">
		
		<div class="content">
		<?php if ($this->aauth->get_user_id($email=false) == $status->user_id){?>
		<button id="<?php echo $status->status_id;?>" class='ui right floated tiny circular icon button popup-button'><i class=' ui settings icon'></i></button>
		<div class='ui flowing popup'>
		<div class='ui buttons'>
			<button id="<?php echo $status->status_id;?>" class='edit_icon ui blue icon button'>
				<i class='edit_icon ui edit white icon'></i>
			</button>
			<button id="<?php echo $status->status_id;?>" class='remove_icon ui red icon button'>
				<i class="remove white icon"></i>
			</button>
		</div>
		</div>
		
		<?php }else{}?>
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
	    
	    <div id="origbody_<?php echo $status->status_id;?>" class=" origbody ten wide column">
	    	<textarea rows="2" id="" class="nostyle" readonly="readonly" disabled ><?php echo $status->status;?></textarea>
	    </div>
	    
	    <div id="editbody_<?php echo $status->status_id;?>" class=" editbody ui form">
		   <div class="field">
		    <label>Edit:</label>
		    <textarea row="2" id="edit_textarea_<?php echo $status->status_id;?>"><?php echo $status->status;?></textarea>
		   </div>
		   
		   <div class="actions">
			    <div class="cancel_update_status ui cancel red button">
			      Cancel
			    </div>
			    <div id="" class="update_status ui positive right labeled icon button">
			      Update
			      <i class="checkmark icon"></i>
			    </div>
		    </div>
		</div>
		      
	    <div class="ui divider"></div>
	    <div>Comment Box</div>
	    
	</div>
	</div>
	</div>
	<?php } ?>
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

	$('.popup-button').popup({
	    popup : $('.flowing.popup'),
	    on    : 'click',
	});

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
		            success: function() {
		            	console.log(status);
		            	$('#editbody_'+$status_id).hide();
		            	$('#origbody_'+$status_id).text(status);
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

    
});
	
</script> 