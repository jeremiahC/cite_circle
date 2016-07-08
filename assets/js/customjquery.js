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

	function addListenerMulti(el, s, fn) {
 		var evts = s.split(' ');
 		for (var i=0, iLen=evts.length; i<iLen; i++) {
  			el.addEventListener(evts[i], fn, false);
  		}
	}
	
	
	
	

$(document).ready(function(){


var imageNgaUsbon = document.getElementById('blah');

	addListenerMulti(imageNgaUsbon, 'onload onchange', function() {
		$width = this.naturalWidth;
		$height = this.naturalHeight;

		if($height > 550){
		
			$Hdiff = $height - 550;
			$keep = $height / $Hdiff;

			$newKeep = Math.round($keep);

			$newWidth = $width / $newKeep;	

	    		this.style.height = 550;
	    		this.style.width = $newWidth;

		}else{

		}


	});
	
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





});