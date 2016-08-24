var base_url = 'http://localhost/cite_circle/'
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#blah').attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	
	function checkImage(src) {
		  var img = new Image();
		  img.onload = function() {
		      // code to set the src on succexss
		  };
		  img.onerror = function() {
		    // doesn't exist or error loading
		    document.getElementById("curentImg").src= base_url + "assets/images/new-user-image-default.png";
		  };

		  img.src = src; // fires off loading of image
		}


    

	

$(document).ready(function(){

	$('.menu .item')
	  .tab()
	;

	$('.opt').hide();
	$('.img').click(function(){
		$('.opt')
		  .transition({
		  	animation:'drop',
		  	duration: '1s'
		  })
		;
	});

var imageNgaUsbon = document.getElementById('blah');

	imageNgaUsbon.addEventListener('load', function(){
		$('.ui.basic.modal').modal('refresh');
	});

	checkImage($('#curentImg').attr('src'));
	
	$( "input:file" ).change(function() {
		$("div#commit").show();
		});
			
	var timer;
	$("#upload").click(function() {
		var that = this;
		$("#uploadBtn").attr("onchange");
			$('.ui.basic.modal.modal_pic').modal({
				autofocus: false,
				onHide: function(){
					var la = $('#curentImg').attr('src');
		            //remove the preview image
		            $("#uploadBtn").removeAttr("onchange");
		            //use the previous image source
			    	$('#blah').attr('src', la);

			        
			    },
		    onShow: function(){
		    	
//		    	 for future use
				
			    }
			}).modal('show');
			$("div#commit").hide();
			$("div#hidden").hide();

			});
				

	$('.ui.fluid.card .image').dimmer({
		on: 'hover'
	});
	
	$(".closemodal").click(function(){
		  $('.ui.basic.modal').modal('hide');
		});
	$("input#caption").click(function(){
		$oldVal = document.getElementById("caption").value;

		$("input#caption").on("change keyup paste", function(){
			if(this.value != $oldVal){
		 		$('div#hidden').show();
			}else{
				$('div#hidden').hide();	
			}
		})
	});

	$('#blah').on('load', function () {
   		$("div.editCaption").hide();
	});

	//START view profile identifier
var user_id = $('.view').val();
$.ajax({
	  method: "POST",
	  url: base_url+"ProfileController/user_info",
	  data: 'user_id='+user_id,
	  success: function(data){
	  	$('#aresult').html(data);
	  }
});
	$.ajax({
		  method: "POST",
		  url: base_url+"status/display_status_specific_user",
		  data: 'user_id='+user_id,
		  success: function(data){
		  	$('#presult').html(data);
		  }
});
	//END view profile identifier
});