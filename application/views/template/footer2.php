</div>
<script>
$(document).ready(function(){
	// $('.ui.sidebar').sidebar('toggle');
	$('.ui.sidebar')
  .sidebar({
    context: $('.bottom.pushable'),
    dimPage: false
  })
  .sidebar('attach events', '.menu .item')
;
	$('.menu .item').tab();

});
</script>