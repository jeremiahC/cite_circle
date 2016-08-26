<?php if  ( $this->aauth->is_loggedin() ){?>
	<!-- Following Menu -->
    <div class="ui  menu">
	<div class="left menu navbar">
		<div class="header item">
			<a href="<?php echo base_url();?>home" class="ui mini image">
				<img src="<?php echo base_url();?>assets/images/logo1.png" alt="Home" />
			</a>
	  	</div>
			<a href="<?php echo base_url();?>status" id="feed" class="item">
				<i class="large browser icon"></i>
			</a>
			<a href="<?php echo base_url();?>postnews" id="news" class="item">
				<i class="large newspaper icon"></i>
			</a>
        </div>
	<div class="right menu">
		<a href="<?php echo base_url();?>pm" id="pm" class="item">
			<div class="notification"></div><i class="large mail outline icon"></i>
		</a>

		 <div class="ui inline dropdown item" id="select">
		 	<?php foreach ($upload_files as $image) { ?>
			 	<?php if($image->user_picture == ""){?>
			 		<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>"  class="ui avatar image">
			 	<?php }else{?>
			 		<img class="ui avatar image" src="<?php echo ''.base_url().'assets/uploads/'.$image->user_picture;?>">
			 	<?php }?>
			 <?php }?>
		 	<b><?php echo $this->session->userdata('name')?></b>
		    <div class="menu">
		    	<a class="item" href="<?php echo base_url();?>myprofile" id="pm" id="profile">
							<i class="user olive icon"></i>
							Profile
		    	</a>
				<a class="item" href="<?php echo base_url();?>login/logout" id="pm">
							<i class="power red icon"></i>
							Log out
				</a>

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

$(document).ready(function(){
//js for dropdown the settings
	$('#select').dropdown();
		
	//START
	function update_pms(){

		$.get('<?php echo base_url(); ?>pm/count_unread_pms', function (data){
			if(data >= 1){
				$('.notification').html('<div class="ui mini circular red label">'+data+'</div>');
			}else{
				$('.notification').html(' ');	
			}
		});

	}


	function update_online(){

		$.post('<?php echo base_url(); ?>ProfileController/update_online');

	}
	setInterval(function (){
		update_pms();
		update_online();
	}, 6000);
	//END



});
</script>