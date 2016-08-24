<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Welcome To Cite Circle</title>
	
	<script src="<?php echo base_url()?>assets/js/jquery-2.1.1.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/semantic/ui/dist/semantic.min.css">
	<script src="<?php echo base_url()?>assets/vendor/semantic/ui/dist/semantic.min.js"></script>
	<!-- online script -->
	<script src='https://www.google.com/recaptcha/api.js'></script>                

	
	</head>
<body>
<br><br><br><br><br><br>
<div class="ui container">
  <div class="ui centered grid">
      <div class="column row">
          <h2 class="ui teal image header">
            <?php echo  anchor('home', '<img src="'.base_url().'assets/images/logo1.png" alt="Home" />','class="image"');?>
            <div class="content">
              Log-in to your account
            </div>
     
          </h2>
      </div>
      <div class="column row">
          <?= form_open('login/login') ?>
    
            <form class="ui large form">
             
              <div class="ui stacked green segment">
              <br>
                <div class="field">
                  <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input id="username" name="username" placeholder="Username" type="text">
                  </div>
                </div>
                <br>
                <div class="field">
                  <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" id="password" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <br>
                <input class="ui fluid large teal submit button"  type="submit" value="Log In">
              </div>
             
                <?php if (validation_errors()) : ?>
            <div class="ui error message">
              <?= validation_errors() ?>
            </div>
            <?php endif; ?>
            
            <?php if (isset($error)) : ?>
            <div class="ui error message">
                <?= $error ?>
            </div>
            <?php endif; ?>

            </form>

      </div>
      <div class="column row">
        
            <div class="ui message">
              New to us? <?php echo anchor('register','Sign Up')?>
            </div>
      </div>
  </div>
</div>


</body>
</html>






