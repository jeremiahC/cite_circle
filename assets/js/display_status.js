

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

	//mouse hover the status template to see option icon for delete/edit
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
});

//LIKE FUNCTION BELOW --- START/////////////////////////////////////////////////////////////////////////

// //like_html append
// $(function(){
// 	$('.like_append').each(function(){

// 		$id = $(this).attr('id');
// 		var like_html = '<div id="'+$id+'" class="like_infos ui labeled button" tabindex="0">'
// 		  +'<div id="'+$id+'" class="like_toggle unlike_icon_'+$id+' ui basic blue button">'
// 		  +'<i id="unlike" class="empty red heart icon"></i> Like'
// 		  +'</div>'
// 		  +'<div id="'+$id+'" class="like_toggle like_icon_'+$id+' ui basic blue button">'
// 		    +'<i id="like" class="red heart icon"></i> Like'
// 		  +'</div>'
// 		  +'<a id="'+$id+'" class="like_count likes_count_'+$id+' ui basic blue left pointing label">'
// 		  +'</a>'
// 		+'</div>';
// 		$(this).html(like_html);
// 	});
// });

// //query if nka like naba ang user
// $(function(){
// 	$('.like_append').each(function(){
// 			var id=$(this).attr('id');
// 			$.ajax({
// 					method:"POST",
// 				    url: base_url+"status/like_check/",
// 				    data:"&status_id="+id,
// 				    success:function(data){
// 						if(data == "true"){
// 							$('.unlike_icon_'+id).hide();
// 						 	$('.like_icon_'+id).show();
// 						 	like_counter();
// 							like_unlike();
// 							see_likers();
// 					 	}else{
// 					 		$('.unlike_icon_'+id).show();
// 					 		$('.like_icon_'+id).hide();
// 						 	like_counter();
// 							like_unlike();
// 							see_likers();
// 						}
// 				   }
// 			});
// 	});
// });


//query if nka like naba ang user
$(function(){
	$('.like_append').each(function(){
			var this_location = $(this);
			var $id=$(this).attr('id');
			var like_html = '<div id="'+$id+'" class="like_infos ui labeled button" tabindex="0">'
			  +'<div id="'+$id+'" class="like_toggle unlike_icon_'+$id+' ui basic blue button">'
			  +'<i id="unlike" class="empty red heart icon"></i> Like'
			  +'</div>'
			  +'<div id="'+$id+'" class="like_toggle like_icon_'+$id+' ui basic blue button">'
			    +'<i id="like" class="red heart icon"></i> Like'
			  +'</div>'
			  +'<a id="'+$id+'" class="like_count likes_count_'+$id+' ui basic blue left pointing label">'
			  +'</a>'
			+'</div>';
			
			$.ajax({
					method:"POST",
				    url: base_url+"status/like_check/",
				    data:"&status_id="+$id,
				    success:function(data){
						if(data == "true"){
							this_location.html(like_html);
							$('.unlike_icon_'+$id).hide();
						 	$('.like_icon_'+$id).show();
						 	like_counter();
							like_unlike();
							see_likers();
					 	}else{
							this_location.html(like_html);
					 		$('.unlike_icon_'+$id).show();
					 		$('.like_icon_'+$id).hide();
					 		like_counter();
							like_unlike();
							see_likers();
						}
				   }
			});
	});

});

//like counter
function like_counter(){
	$(".like_append").each(function(){
		var status_id= $(this).attr('id');
		$.ajax({
         	method:"POST",
     		url: base_url+"status/count_vote/",
      		data:"status_id="+status_id,
		success:function(data){
   			$('.likes_count_'+status_id).html(data);
         }
    	});
   	});
}

//if click like button (like/unlike)
function like_unlike(){
	$('.like_toggle').click(function(){
	var status_id = $(this).attr('id');
	var likeOrUnlike = $(this).children().attr('id');
	var like_value = parseInt($('.likes_count_'+status_id).html());
	if(likeOrUnlike == 'like'){
		$.ajax({
			type: "post",
			url: base_url+"status/likeToUnlike/",		
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
			data: 'status_id='+status_id,
			success: function(	response){
				var newLike_value = like_value + 1;
				$('.likes_count_'+status_id).html(newLike_value);			
				$('.unlike_icon_'+status_id).hide();
				$('.like_icon_'+status_id).show();
			}
		});	
	}
});
}


// //see who likes
// function see_likers(){
// 	$('.like_count').click(function(){
// 		var status_id = $(this).attr('id');
// 		var like_value = parseInt($('.likes_count_'+status_id).html());
// 		if(like_value == 0){
// 			$('#no_likes_modal').modal('show');
// 		}else{
// 			$.ajax({
// 			method:"POST",
// 			url: base_url+"status/see_who_likes/",
// 			data:"status_id="+status_id,
// 			success:function(datas){
// 				console.log(datas);
// 				$('#modal_seewholikes_'+ status_id).modal('show');
// 				$('#likers_' +status_id).html(datas);		
// 			}
// 			});
// 		}	
		
// 	});

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

$('#user_hover').each(function(){
	var status_id = $(this).val();
	console.log(status_id);
});
$('#view_profile').popup({
    popup : $('.profile'),
    on    : 'hover',
});