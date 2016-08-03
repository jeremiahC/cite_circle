<div class="ui container">
	<div class="ui grid">
		<div class=" column row">
			<h1>Users Page</h1>
		</div>
		<div class="column row">
			<div class="ui category search floated right">
			  <div class="ui icon input">
			    <input class="prompt" placeholder="Search animals..." type="text">
			    <i class="search icon"></i>
			  </div>
			  <div class="results"></div>
			</div>	
			<table class="ui celled table">
					  <thead>
					    <tr><th>Name</th>
					    <th>Email</th>
					    <th>Header</th>
					  </tr></thead>
					  <tbody>
					      {entries}
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
		</div>
	</div>
</div>