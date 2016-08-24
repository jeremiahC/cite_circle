<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="home" class="nav_identifier">

<br><br>
 <div class="ui text container">
 	<div class="ui text container">
      <?php echo  anchor('home', '<img src="'.base_url().'assets/images/logo1.png" alt="Home" />','class="ui medium image"');?>
	</div>
    <h2 class="ui teal image header">
        Welcome to Cite Circle Beta
    </h2>
    <h2>Where you can meet and greet others, chat and make friends.</h2>
      
    </div>
</div>
<br><br><br>
<div class="ui stackable olive secondary stripe vertical segment">
<br><br><br>
  <div class="ui center aligned grid container">
    <div class="column">
      <h3 class="ui header">
        Have you explored this site? Please lend this survey a 5 minutes of your time.
      </h3>
      <?php echo anchor('survey','<div class="ui big primary button">Take the survey <i class="right arrow icon"></i></div>'); ?>
    </div>
  </div>
  <br><br><br>
</div>
