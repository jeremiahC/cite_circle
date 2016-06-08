</body>
<script>
$(document).ready(function(){
	$nav = $('.nav_identifier').attr('id');
	console.log('nav: '+$nav);
	$('.navbar #'+$nav).addClass("active teal");
});

</script>
</html>