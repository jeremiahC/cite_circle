
	<table class="ui celled table">
		  <thead>
		    <tr><th>Name</th>
		    <th>Email</th>
		    <th>Header</th>
		  </tr></thead>
		  <tbody>
		  	<?foreach($query as $row):?>
		    <tr>
		      <td>
		        <div class="cell">
		        	<a href="<?php echo site_url('user/' . $row->id );?>">
		        		<?=$row->name;?>
		        	</a>
		        </div>
		      </td>
		      <td><?=$row->email;?></td>
		      <td>Cell</td>
		    </tr>
		    <?endforeach;?>
		  </tbody>
		  <tfoot>
		    <tr><th colspan="3">
		      <div class="ui right floated pagination menu">
		        <a class="icon item">
		          <i class="left chevron icon"></i>
		        </a>
		        <a class="item">1</a>
		        <a class="item">2</a>
		        <a class="item">3</a>
		        <a class="item">4</a>
		        <a class="icon item">
		          <i class="right chevron icon"></i>
		        </a>
		      </div>
		    </th>
		  </tr></tfoot>
	</table>
<script>
$(document).ready(function(){
	$('.cell').hover(function(){
		$(this).toggleClass('ui green ribbon label');
	});
});
</script>