<div class="ui container grid">

	<div class="column row">
		<h1>Dashboard</h1>
		<div class="ui icon message">
    		  <i class="wizard icon"></i>
    		  <div class="content">
    		    <div class="header">
    		      Welcome to Admin Dashboard
    		    </div>
    		    <p>Get the best news in your e-mail every day.</p>
    		  </div>
    	</div>
    </div>
		<div class="three column row">
			<div class="column">
				<div class="ui teal inverted center aligned segment">
					<div class="ui statistic">

					  <div class="value">
					    <i class="users icon"></i> 5,550
					  </div>
					  <div class="label">
					    Regular Users
					  </div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui yellow inverted center aligned segment">
					<div class="ui statistic">
					  <div class="value">
					    <i class="user icon"></i> 5,550
					  </div>
					  <div class="label">
					    School Admin
					  </div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui olive inverted center aligned segment">
					<div class="ui statistic">
					  <div class="value">
					    <i class="doctor icon"></i> 5,550
					  </div>
					  <div class="label">
					    Admin
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="column row">
			<div class="column">
				
					<div class="ui two column centered grid">
						<div class="column">
							<div class="ui segment">
								<div id="chartContainer" style="height: 300px; width: 100%;"></div>
							</div>
						</div>
						<div class="column">
							<div class="ui red segement">
								<div class="ui statistic">
								  <div class="value">
								    <i class="user icon"></i> 5,550
								  </div>
								  <div class="label">
								    Total Users
								  </div>
								</div>
							</div>
						</div>
					</div>
				
			</div>
		</div>

</div>

  <script type="text/javascript">
      window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer", {
          	title:{
          		text: "All Users"
          	},
          	legend:{
		        verticalAlign: "bottom",
		        horizontalAlign: "center"
		      },
              data: [
              {
                  type: "doughnut",
                  showInLegend: true,
                  dataPoints: [
                  { y: 5, legendText:"Admin User",},
                  { y: 15, legendText:"School Admin",},
                  { y: 80, legendText:"Regular Users"}
                  ]
              }
              ]
          });
 
          chart.render();
      }
  </script>