<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>  
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Sign Up - Cite Circle</title>
	
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
              Sign up to Cite Circle Alpha
            </div>
          </h2>
      </div>

      <div class="column row">
          <?= form_open('register/register') ?>
    
            <form class="ui large form">
             
              <div class="ui stacked green segment">
              <br>
                <div class="field">
                  <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input id="name" name="name" placeholder="Username" type="text">
                  </div>
                </div>
                <br>
                <div class="field">
                  <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
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
                <div class="field">
                  <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm Password" type="password">
                  </div>
                </div>
                <br>
                <input class="ui fluid large teal submit button"  type="button" value="Sign Up">
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
      <div class="errorregister"></div>
      <div class="column row">
          <div class="ui message">
            Already have account? <?php echo anchor('login','Log in')?>
          </div>
      </div>

    </div>
    
</div>
</body>
</html>
<script>
  $(document).ready(function(){
      $('.submit').click(function(){
    var data = {
          name: $('#name').val(),
          email: $('#email').val(),
          password : $('#password').val(),
          password_confirm : $('#password_confirm').val(),
    };
    console.log(data);
         $.ajax({
             method: "POST",
             url: "<?php echo base_url();?>register/register",
             data: data,
             success: function(data){

              }
            });
         return false;
      });
  });
</script>