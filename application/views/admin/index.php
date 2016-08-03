

<div class="ui top attached menu">
  <a class="item">
    <i class="sidebar icon"></i>
    Menu
  </a>
</div>

<div class="ui bottom attached segment pushable">
  <div class="ui inverted vertical fixed sidebar menu">
  	<div class="item">
  		Admin
  	</div>
    <a class="item" data-tab="first">
      <i class="home icon"></i>
      Dashboard
    </a>
    <a class="item" data-tab="second">
      <i class="users icon"></i>
      Users
    </a>
    <a class="item" data-tab="third">
      <i class="settings icon"></i>
      Configuration
    </a>
  </div>
  	<div class="pusher">
  		<div class="ui icon message">
		  <i class="wizard icon"></i>
		  <div class="content">
		    <div class="header">
		      Welcome to Admin Dashboard
		    </div>
		    <p>Get the best news in your e-mail every day.</p>
		  </div>
		</div>
	    <div class="ui bottom attached active tab" data-tab="first">
	    	<?$this->load->view('admin/dashboard');?>
		</div>
		<div class="ui bottom attached tab" data-tab="second">
	  		Second
		</div>
		<div class="ui bottom attached tab" data-tab="third">
	  		Third
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	// $('.ui.sidebar').sidebar('toggle');
	$('.ui.sidebar')
  .sidebar({
    context: $('.bottom.segment')
  })
  .sidebar('attach events', '.menu .item')
;
	$('.menu .item').tab();

});
</script>