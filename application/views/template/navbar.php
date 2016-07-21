<?php if  ( $this->aauth->is_loggedin() ){?>
	<!-- Following Menu -->
    <div class="ui secondary pointing menu">
	<div class="left menu navbar">
		<div class="header item">
	  	<?php echo  anchor('home', '<img src="'.base_url().'assets/images/logo1.png" alt="Home" />','class="ui mini image"');?>
	  	</div>
	  	<?php echo anchor('home','<i class="large home icon"></i>','id="home" class="item"')?>
		<?php echo anchor('status','<i class="large browser icon"></i>','id="feed" class="item"')?>
		<?php echo anchor('post_news','<i class="large newspaper icon"></i>','id="news" class="item"')?>
        </div>
	<div class="right menu">
		<?php echo anchor('chat','<i class="large mail outline icon"></i>','id="messaging" class="item"')?>

		 <div class="ui inline dropdown item" id="select">
		 	<i class="big icons">
			  <i class="settings purple icon"></i>
			  <i class="corner grey dropdown icon"></i>
			</i>
		    <div class="menu">
		      <?php echo anchor('ProfileController','<div class="item"><i class="user olive icon"></i>Profile</div>','id="profile"')?>
		      <?php echo anchor('login/logout','<div class="item"><i class="power red icon"></i>Log out</div>')?>
		    </div>
		 </div>

  	</div>
	</div>
<?php }else{?>
	<!-- Following Menu -->
	<div class="ui secondary pointing menu">
	<div class="left menu">
		<div class="header item">
	  	<?php echo  anchor('home', '<img src="'.base_url().'assets/images/logo1.png" alt="Home" />','class="ui mini image"');?>
	  	</div>
	  	<?php echo anchor('home','<i class="home icon"></i>Home','class="active item"')?>
	</div>
	<div class="right menu">
  		<?php echo anchor('login','Log in','class="item"')?>
          <?php echo anchor('register','Sign Up','class="item"')?>
  	</div>
	</div>
<?php }?>

<script type="text/javascript">
//js for dropdown the settings
$('#select')
  .dropdown()
;
</script>