$(document).ready(function(){
	var base_url = "http://localhost/cite_circle/";
	$("#statusloader").hide();
	
	//get the posts
	$.post(base_url+'status/display_status/',function(data){
    	$("#loader").hide();
		$("#displaystatus").html(data).hide().fadeIn('slow');
	});
	
	//START window scroll load more status
	 var count = 2;
     $(window).scroll(function(){
     if  ($(window).scrollTop() == $(document).height() - $(window).height()){
          loadStatus(count);
                count++;
     }
     }); 

     function loadStatus
     (pageNumber){
    	 	$("#statusloader").show();
             $.ajax({
                 url: base_url+'status/display_more_status/',
                 type:'POST',
                 data: {"pagenumber" : pageNumber}, 
                 success: function(data){
                	 $(data).appendTo("#displaystatus").hide().slideDown('slow');
                	 $(".ui.basic.modal").hide();
                	 $("#statusloader").hide();
                 }
             });
         return false;
     }
   //END window scroll load more status
	
	
	//post submit button disabler
	$("#status_input").keyup(function(){
    	$status = $(this).val().trim();
    	if ($status === '' || $status === null){
			$(".submitBtn").addClass('disabled');
    	}else{
    		$(".submitBtn").removeClass('disabled');
        }
    });
	
	//when the post submit button is clicked
	$(".submitBtn").click(function(){
		$('.submitBtn').addClass('loading');
		var user_id = $(this).attr('id');
		var status = $("#status_input").val().trim();
		var dataString = 'user_id='+ user_id + '&status=' + status;
			$.ajax({
			type: "POST",
			url: base_url+"status/insert_status/",
			data: dataString,
			cache: false,
			success: function(data)
				{
				$("#status_input").val('');
				$('.submitBtn').removeClass('loading');
				$(".submitBtn").addClass('disabled');
				$("#displaystatus").html(data).hide().fadeIn('slow');
				},
			error: function(){
				alert('Network Error.');
				}
			});
			
	});

});