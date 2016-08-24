<?php 
if(count($query) > 0){?>

  <?php foreach($query as $status){ ?>
  	<div id="status_head_<?php echo $status->status_id;?>" class="ui centered aligned grid">
  	<div class="one column ui form ">
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
			<button id="<?php echo $status->status_id;?>" class='popup_button_<?php echo $status->status_id;?> ui right floated mini circular basic icon button popup-button hide'><i class='ellipsis mini horizontal icon'></i></button>
			<div class='ui flowing popup'>
			<i id="<?php echo $status->status_id;?>" class="edit_icon pointer ui circular inverted edit teal icon"></i>
			<i id="<?php echo $status->status_id;?>" class="remove_icon pointer ui circular inverted trash red icon"></i>
			</div>
			<?php }else{}?>
	     </div>
	      <div class="summary">
	        <?php if($this->aauth->get_user_id($email=false) === $status->user_id){?>
	      		<a href="myprofile">
						      	<?php }else{?>
		        <a href="profile/<?php echo $status->user_id;?>">
							    <?php };?> 
		        	<!-- first name condition START-->
					<?php if($status->firstname == ''){
						echo $status->name;
					}else{
						echo $status->firstname.' '.$status->lastname;
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
				<div id="editbody_<?php echo $status->status_id;?>" class="ui form hide">
					<div class="field">
					<label>Edit:</label>
					<textarea row="2" id="edit_textarea_<?php echo $status->status_id;?>"><?php echo $status->status;?></textarea>
					</div>
				<div class="actions">
					<div class="cancel_update_status ui circular small red inverted vertical animated button" tabindex="0">
		            	<div class="hidden content closemodal">Cancel</div>
		                <div class="visible content closemodal">
	                    	<i class="large remove icon"></i>
				</div>
					</div>
					
					<div class="update_status ui circular small green inverted vertical animated button" tabindex="0">
		            	<div class="hidden content closemodal">Update</div>
		                <div class="visible content closemodal">
	                    	<i class="large checkmark icon"></i>
                     	</div> 
					</div>
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

    <!-- LIKE DISPLAY START -->
    <div id="<?php echo $status->status_id;?>" class="like_append_<?php echo $batchNo?>"></div>
	<!-- START MODAL (SEE PEOPLE WHO LIKES) -->
	<div class="ui  small modal" id="modal_seewholikes_<?php echo $status->status_id;?>">
		<div class="header">Likers</div>
	   	<div id="likers_<?php echo $status->status_id;?>"></div>
	    <div class="actions">   		
	    </div> 
	</div>
	<!-- END MODAL (SEE PEOPLE WHO LIKES) -->
	<!-- LIKE DISPLAY END -->

	<!-- END STATUS CONTENT -->
	<!-- COMMENT BOX START -->
	<div class="ui divider"></div>
		 
	<!-- Comment input box START-->
	<?php foreach ($upload_files as $image) {?>
	<div class="ui fluid icon action input teal basic label ">
		<?php if($image->user_picture == ""){?>
		<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui small avatar rounded image">
		<?php }else {?>
		<img src="<?php echo base_url().'assets/uploads/'.$image->user_picture.'';?>" class="ui small rounded image">
		<?php }?>
		<input id="<?php echo $status->status_id;?>" class="cmt_input_id_<?php echo $status->status_id;?> commentinput" placeholder="Add a comment..." type="text">
		<div id="<?php echo $status->status_id;?>" class="cmt_btn_id_<?php echo $status->status_id;?> commentbutton_<?php echo $batchNo?> ui mini teal disabled button"><i id="<?php echo  $this->session->userdata('id');?>" class="comment_btn_icon send icon"></i></div>
	</div>
	<?php } ?>
	<!-- Comment input box END-->
	
	<?php $counter = 0;
	foreach ($query2 as $comments){
	if($comments->cmt_status_id == $status->status_id){
		if($comments->cmt_status_id != "" or $comments->cmt_status_id == null){
			$counter++;
		}else{break;}
	}}
	?>
	
	<br/>
	<div>
		<a id="<?php echo $status->status_id;?>" class="right floated icon pointer comment_box_toggler_<?php echo $batchNo?>">
	          <i class="comments outline  icon"></i>
	          <span id="counter_<?php echo $status->status_id;?>"><?php echo $counter;?></span> comment(s)
	    </a>
		<button id="<?php echo $status->status_id;?>" class="ui mini basic circular right floated icon button comment_box_toggler_<?php echo $batchNo?>">
		<i class="grey caret left icon icon_toggler_<?php echo $status->status_id; ?>"></i>
		<i class="grey caret down icon toggle_icon_<?php echo $batchNo?> icon_toggler_<?php echo $status->status_id; ?>"></i>
		</button>
	</div>
	<br/>
	
	<!-- 	START comment_body -->
	<div class="comment_body_<?php echo $batchNo?> comment_body_<?php echo $status->status_id; ?>">
	<!-- location to append comments -->
	<div id="displaycomment_<?php echo $status->status_id;?>"></div>
		<div class="ui feed">
		<?php foreach ($query2 as $comments){?>
		<?php if($comments->cmt_status_id == $status->status_id){?>
			  <div class="event">
			    <div class="mini label">
			    <!-- 			user_picture condition -->
			      	<?php if($comments->user_picture == ""){?>
					<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar circular image">
					<?php }else {?>
					<img src="<?php echo base_url()?>assets/uploads/<?php echo $comments->user_picture?>" class="ui mini circular image">
					<?php }?>
			    </div>
			    <div class="content">
			      <div class="summary">
			        <?php if($this->aauth->get_user_id($email=false) === $comments->user_id){?>
		      		<a href="myprofile"  class="user">
							      	<?php }else{?>
			        <a href="profile/<?php echo $comments->user_id;?>" class="user">
							    <?php };?> 
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
	<!-- 	END comment_body -->
	
    </div>
    </div>
   	</div>
   	
	<?php }}else{?>
<!-- 	<br/><br/> -->
<!-- 	<div id="nopost" class="ui grid"> -->
<!-- 		<div class="twelve wide column  ui raised segment">No new post to show</div> -->
<!-- 	</div> -->
	<?php }?>
	<br/><br/>
	
<script>
$(document).ready(function(){
	//START comment body toggler
	$('.comment_body_<?php echo $batchNo?>').hide();
	$('.down.toggle_icon_<?php echo $batchNo?>').hide();
	$( ".comment_box_toggler_<?php echo $batchNo?>" ).click(function() {
		$id = $(this).attr('id');
		$(".comment_body_"+$id ).toggle("slow");
		$(".icon_toggler_"+$id).toggle("slow");
	});
	//END comment body toggler
	
	$('.popup-button').hide();
	$('.popup-button').popup({
	    popup : $('.flowing.popup'),
	    on    : 'click',
	});

	$('.status_head').mouseenter(function(){
		$id = $(this).attr('id');
		$('.popup_button_'+$id).show();
		
		$('.status_head').mouseleave(function(){
			$('.popup_button_'+$id).hide();
		});
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
		        $.ajax('<?php echo base_url()?>status/update_status/',{
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
		        $.ajax('<?php echo base_url()?>status/delete_status/',{
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

//when comment submit button is clicked
$(function(){
	$(".commentbutton_<?php echo $batchNo?>").click(function(){
		var user_id = $(".comment_btn_icon").attr('id');
		var cmt_status_id = $(this).attr('id');
		var content = $(".cmt_input_id_"+cmt_status_id).val().trim();
		send_comment (user_id,cmt_status_id,content);
		console.log('test');
			
	});

	function send_comment(user_id,cmt_status_id,content) {
	var dataString = 'user_id='+ user_id + '&content=' + content + '&cmt_status_id='+cmt_status_id;
	$comment_val = $('#counter_'+cmt_status_id).text();
	$comment_added = parseInt($comment_val)+1;
	$.ajax({
		type: "POST",
		url: "<?php echo base_url()?>status/insert_comment/",
		data: dataString,
		cache: true,
		success: function(data)
			{
			$(".cmt_input_id_"+cmt_status_id).val('');
			$(".cmt_btn_id_"+$status_id).addClass('disabled');
			$(".comment_body_"+cmt_status_id ).show();
			$('#counter_'+cmt_status_id).text($comment_added);
			$('.left.icon_toggler_'+cmt_status_id).hide();
			$('.down.icon_toggler_'+cmt_status_id).show();
			$(data).hide().insertAfter("#displaycomment_"+cmt_status_id).slideDown('slow');
			},
		error: function(data){
			alert('Network Failure.');
			}
		});
	}
});


//LIKE FUNCTION BELOW --- START//////////////////////////////////////////////////////////////////////////

//like_html append
$(function(){
	$('.like_append_<?php echo $batchNo?>').each(function(){

		$id = $(this).attr('id');
		var like_html = '<div id="'+$id+'" class="like_infos_<?php echo $batchNo?> ui labeled button" tabindex="0">'
		  +'<div id="'+$id+'" class="like_toggle_<?php echo $batchNo?> unlike_icon_'+$id+' ui basic blue button">'
		  +'<i id="unlike" class="empty red heart icon"></i> Like'
		  +'</div>'
		  +'<div id="'+$id+'" class="like_toggle_<?php echo $batchNo?> like_icon_'+$id+' ui basic blue button">'
		    +'<i id="like" class="red heart icon"></i> Like'
		  +'</div>'
		  +'<a id="'+$id+'" class="like_count likes_count_'+$id+' ui basic blue left pointing label">'
		  +'</a>'
		+'</div>';
		$(this).html(like_html);
	});
});

//query if nka like naba ang user
$(function(){
	$('.like_append_<?php echo $batchNo?>').each(function(){
			var id=$(this).attr('id');
			$.ajax({
					method:"POST",
				    url: base_url+"status/like_check/",
				    data:"&status_id="+id,
				    success:function(data){
						if(data == "true"){
							$('.unlike_icon_'+id).hide();
						 	$('.like_icon_'+id).show();

					 		like_counter(id);
							like_unlike();
							see_likers();
					 	}else{

					 		$('.unlike_icon_'+id).show();
					 		$('.like_icon_'+id).hide();

					 		like_counter(id);
							like_unlike();
							see_likers();
						}
				   }
			});
	});
});


// //query if nka like naba ang user
// $(function(){
// 	$('.like_append_<?php echo $batchNo?>').each(function(){
// 			$id = $(this).attr('id');
// 			var this_location = $(this);
// 			var like_html = '<div id="'+$id+'" class="like_infos_<?php echo $batchNo?> ui labeled button" tabindex="0">'
// 			  +'<div id="'+$id+'" class="like_toggle_<?php echo $batchNo?> unlike_icon_'+$id+' ui basic blue button">'
// 			  +'<i id="unlike" class="empty red heart icon"></i> Like'
// 			  +'</div>'
// 			  +'<div id="'+$id+'" class="like_toggle_<?php echo $batchNo?> like_icon_'+$id+' ui basic blue button">'
// 			    +'<i id="like" class="red heart icon"></i> Like'
// 			  +'</div>'
// 			  +'<a id="'+$id+'" class="like_count likes_count_'+$id+' ui basic blue left pointing label">'
// 			  +'</a>'
// 			+'</div>';
// 			this_location.html(like_html);
// 			$.ajax({
// 					method:"POST",
// 				    url: base_url+"status/like_check/",
// 				    data:"&status_id="+$id,
// 				    success:function(data){
// 						if(data == "true"){
// 							$('.unlike_icon_'+$id).hide();
// 						 	$('.like_icon_'+$id).show();
// 						 	like_counter();
// 							like_unlike();
// 							see_likers();
// 					 	}else{
// 					 		$('.unlike_icon_'+$id).show();
// 					 		$('.like_icon_'+$id).hide();
// 					 		like_counter();
// 							like_unlike();
// 							see_likers();
// 						}
// 				   }
// 			});
// 	});


	
// });

function like_counter(status_id){
		//$(".like_append_<?php echo $batchNo?>").each(function(){
			//var status_id= $(this).attr('id');
				$.ajax({
	            	method:"POST",
	           		url: base_url+"status/count_vote/",
	          		data:"status_id="+status_id,
	           		success:function(data){
	           			//ako ok
	           			$('.likes_count_'+status_id).html(data);
	           		}
	       		});
	   		//});
	}



//if click like button (like/unlike)
function like_unlike(){
	$('.like_toggle_<?php echo $batchNo?>').click(function(){
	var status_id = $(this).attr('id');
	var likeOrUnlike = $(this).children().attr('id');
	var like_value = parseInt($('.likes_count_'+status_id).html());
	if(likeOrUnlike == 'like'){
		$.ajax({
			type: "post",
			url: base_url+"status/likeToUnlike/",
			cache: false,				
			data: 'status_id='+status_id,
			success: function(response){
				var newLike_value = like_value - 1;
				$('.likes_count_'+status_id).html(newLike_value);		
				$('.unlike_icon_'+status_id).show();
				$('.like_icon_'+status_id).hide();
			}
		});	
	}else{
		$.ajax({
			type: "post",
			url: base_url+"status/unlikeToLike/",
			cache: false,				
			data: 'status_id='+status_id,
			success: function(response){
				var newLike_value = like_value + 1;
				$('.likes_count_'+status_id).html(newLike_value);			
				$('.unlike_icon_'+status_id).hide();
				$('.like_icon_'+status_id).show();
			}
		});	
	}
});
}


//see who likes
function see_likers(){
	$('.like_count').click(function(){
		var status_id = $(this).attr('id');
		var like_value = parseInt($('.likes_count_'+status_id).html());
		if(like_value == 0){
				$('#no_likes_modal').modal('show');
		}else{
			$.ajax({
			method:"POST",
			url: base_url+"status/see_who_likes/",
			data:"status_id="+status_id,
			success:function(datas){
				console.log(datas);
				$('#modal_seewholikes_'+ status_id).modal('show');
				$('#likers_' +status_id).html(datas);		
			}	
			});
		}
	});
}
</script>