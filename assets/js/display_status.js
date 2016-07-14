

var base_url = "http://localhost/cite_circle/";

$(document).ready(function(){
	//START comment body toggler
	$('.comment_body').hide();
	$('.down.toggle_icon').hide();
	$( ".comment_box_toggler" ).click(function() {
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
		        $.ajax(base_url+'status/update_status/',{
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
		        $.ajax(base_url+'status/delete_status/',{
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
	$(".commentbutton").click(function(){
		var user_id = $(".comment_btn_icon").attr('id');
		var cmt_status_id = $(this).attr('id');
		var content = $(".cmt_input_id_"+cmt_status_id).val().trim();
		send_comment (user_id,cmt_status_id,content);
			
	});
});

//like
$(function(){
		$('.hide').hide();
		$('.like-count').click(function(){
				var status_id= $(this).siblings("#status_id").val();
				var test = "status_id="+status_id;
				console.log(test);
					$.ajax({
						method:"POST",
						url: base_url+"status/see_who_likes/",
		          		data:"status_id="+status_id,
		           		success:function(datas){
			           		$("#likers").append("<div>"+datas+"</div><br/>");	
		           			$('#modal_seewholikes_'+ status_id).modal('show');
		           			$('.modalcontent_' +status_id).html('&nbsp&nbsp&nbsp&nbsp'+datas + '<br/>');
		           			
		           		}	
						});
		});
	});

	$(function(){
		$(".like-count").each(function(){
			var status_id= $(this).siblings("#status_id").val(); 
		    var self = $(this);
				$.ajax({
	            	method:"POST",
	           		url: base_url+"status/count_vote/",
	          		data:"status_id="+status_id,
	           		success:function(data){
		           		if(data == 0){
		        	   		$(self).hide();
			           	}else{
	        	   			$(self).html('<i class="thumbs up blue icon"></i><i style="color: blue">'+ data+' </i>') //updating total counts
	          			}
	           		}
	       		});
	   		});
	 });

$(function(){
		$('.if-already-like').each(function(){
			var user_status_id=$(this).siblings("#user_status_id").val();
			var attributes = user_status_id.split('_');
			var self = $(this);
			var upvote = "#"+attributes[2]+'_'+attributes[1]+'_upvote';
			var downvote = "#"+attributes[2]+'_'+attributes[1]+'_downvote';
				$.ajax({
					method:"POST",
				    url: base_url+"status/check_if_vote_controller/",
				    data: "user_id="+attributes[0] + "&status_user_id="+attributes[1] + "&status_id="+attributes[2],
				    success:function(data){
						if(data == "true"){
							$(upvote).hide();
						 	$(downvote).show();
					 		$(upvote).attr("value", (attributes[3]-1)) ;
					 		$(downvote).attr("value", (attributes[3]-1)) ;
					 	}else{
					 		$(upvote).show();
					 		$(downvote).hide();
						}
				   }
			});
	});
		
});
$(function(){
		$('.vote').click(function(){
			var status_id = this.id;
			var upOrDown = status_id.split('_'); 
			var vote_count = parseInt($(this).val());
			var votedDiv = "#"+ upOrDown[0]+'_voteThis';
			var countVoteHide = '#like_'+upOrDown[0];
				$("#"+ upOrDown[0]+ '_'+upOrDown[1]+'_downvote').toggle();
				$("#"+ upOrDown[0]+ '_'+upOrDown[1]+'_upvote').toggle();
					$.ajax({
						type: "post",
						url: base_url+"status/vote_status/",
						cache: false,				
						data: 'status_id='+upOrDown[0] + '&status_user_id='+ upOrDown[1]+ '&upOrDown=' +upOrDown[2],
						success: function(response){				
							if(response=='true'){
								if(vote_count == 0){
									$(votedDiv).fadeIn(100).html('<i class="thumbs up blue icon"></i><i style="color: blue">You like this. </i> ');
									$(countVoteHide).hide();
							 	}else{
									$(votedDiv).fadeIn(100).html('<i class="thumbs up blue icon"></i><i style="color: blue">You and '+ vote_count + ' others like this. </i> ');
									$(countVoteHide).hide();
								}
							}else{
								if(vote_count == 0){
									$(votedDiv).hide();
									$(countVoteHide).hide();
								}else if(vote_count == 1){
									$(votedDiv).fadeIn(100).html('<i class="thumbs up blue icon"></i><i style="color: blue">Liza Soberano likes this.</i>.');
									$(countVoteHide).hide();
								}else{
									$(votedDiv).fadeIn(100).html('<i class="thumbs up blue icon"></i><i style="color: blue">Liza Soberano and '+ vote_count +' likes this.</i>.');
									$(countVoteHide).hide();
								}
							}
						}
				});	
			});
	});

function send_comment(user_id,cmt_status_id,content) {
	var dataString = 'user_id='+ user_id + '&content=' + content + '&cmt_status_id='+cmt_status_id;
	$comment_val = $('#counter_'+cmt_status_id).text();
	$comment_added = parseInt($comment_val)+1;
	$.ajax({
		type: "POST",
		url: base_url+"status/insert_comment/",
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


