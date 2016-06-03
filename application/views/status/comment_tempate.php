<div id="<?php echo $inserted_id;?>" class="ui feed">
		<div class="event">
			    <div class="label">
			    <!-- 			user_picture condition -->
			      	<?php if($this->session->userdata('user_picture') == ""){?>
					<img src="<?php echo base_url().'assets/images/new-user-image-default.png';?>" class="ui mini avatar rounded image">
					<?php }else {?>
					<img src="<?php echo base_url()?>assets/uploads/<?php echo $this->session->userdata('user_picture')?>" class="ui mini rounded image">
					<?php }?>
			    </div>
			    <div class="content">
			      <div class="summary">
			        <a class="user">
			        <!-- first name condition -->
			          <?php if($this->session->userdata('firstname') == ''){
				      		echo $this->session->userdata('name');
				      	}else{
				      		echo $this->session->userdata('firstname');
				      	}?>
			        </a>
			        <div class="date">
					<!--  YOU CAN PUT SOMETHING HERE -->
			        </div>
				    <h3 class="ui header">
				        <div class="sub header">
				       	 <?php echo $content;?>
			        	</div>
				    </h3>
			      </div>
			      
			      <div class="meta">
			        <a class="like">
			          <i class="wait icon"></i>
			          	  <?php 
				          $post_date = $date;
				          $now = time();
				          echo timespan($post_date, $now, 1);
				          ?>
			        </a>
			      </div>
			    </div>
			  </div>
</div>
