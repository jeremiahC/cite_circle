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
		      // code to set the src on success
		  };
		  img.onerror = function() {
		    // doesn't exist or error loading
		    document.getElementById("curentImg").src="http://localhost/cite_circle/assets/images/new-user-image-default.png";
		  };

		  img.src = src; // fires off loading of image
		}


    

	

$(document).ready(function(){

var imageNgaUsbon = document.getElementById('blah');

	imageNgaUsbon.addEventListener('load', function(){
		$('.ui.basic.modal').modal('refresh');
	})

	checkImage($('#curentImg').attr('src'));
	
	$( "input:file" ).change(function() {
		$("div#commit").show();
		});
			
	var timer;
	$("a.wew").mouseenter(function() {
		var that = this;
		$("#uploadBtn").attr("onchange");
		timer = setTimeout(function(){
			$('.ui.basic.modal').modal({
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
			}, 1000);
			}).mouseleave(function() {
				clearTimeout(timer);
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
		console.log('Image source changed');
   		$("div.editCaption").hide();
	});

	// $('#blah').load(function() {
 //    var imageObj = $(this);
 //    if (!(imageObj.width() == 1 && imageObj.height() == 1)) {
 //        console.log('Image source changed');
 //        	$("div.editCaption").hide();
 //    }
// });

	// $("#blah").change(function(){
	// 	$("div.editCaption").hide();
	// });



});