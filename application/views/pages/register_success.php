<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="home" class="nav_identifier">

<br><br>
 <div class="ui text container">
 	<div class="ui text container">
      <?php echo  anchor('home', '<img src="'.base_url().'assets/images/logo1.png" alt="Home" />','class="ui medium image"');?>
	</div>
    <h2 class="ui teal image header">
        Welcome to Cite Circle Alpha
    </h2>
    <h2>You are registered!</h2>

    <?php echo anchor('login','
		<div class="ui huge animated fade blue button" tabindex="0">
			<div class="visible content">Get Started <i class="right arrow icon"></i></div>
			<div class="hidden content">
			Log in<i class="right arrow icon"></i>
			</div>
		</div>
	') ?>
	
    </div>
</div>
