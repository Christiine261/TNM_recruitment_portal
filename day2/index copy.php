<?php include('../inc/header.php'); ?>
<?php include('../inc/navbar.php'); ?>
<?php include('../inc/sidebar.php'); ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">

					<?php
						include("inc/dbcon.php");
						// Query to count the number of users Registered
						$countQuery = "SELECT * FROM jobs";
						$result = $conn->query($countQuery);						
					?>
					<h3><?php echo $result->num_rows; ?></h3>

					<p>JOB POSTS</p>
					</div>
					<div class="icon">
					<i class="ion ion-bag"></i>
					</div>
					<a href="manage_jobs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
					<?php
						include("inc/dbcon.php");
						// Query to count the number of users Registered
						$countQuery = "SELECT * FROM users";
						$result = $conn->query($countQuery);						
					?>
					<h3><?php echo $result->num_rows; ?></h3>

					<p>Users</p>
					</div>
					<div class="icon">
					<i class="ion ion-stats-bars"></i>
					</div>
					<a href="manage_users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
					<?php
						include("inc/dbcon.php");
						// Query to count the number of users Registered
						$countQuery = "SELECT * FROM job_applications";
						$result = $conn->query($countQuery);						
					?>
					<h3><?php echo $result->num_rows; ?></h3>

					<p>job applications</p>
					</div>
					<div class="icon">
					<i class="ion ion-person-add"></i>
					</div>
					<a href="manage_applications.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
					<?php
						include("inc/dbcon.php");
						// Query to count the number of users Registered
						$countQuery = "SELECT * FROM user_portfolio";
						$result = $conn->query($countQuery);						
					?>
					<h3><?php echo $result->num_rows; ?></h3>

					<p>User portfolios</p>
					</div>
					<div class="icon">
					<i class="ion ion-pie-graph"></i>
					</div>
					<a href="manage_user.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-12 connectedSortable">
				<div class="card">

					<div class="card-body">
						<h5 class="card-title">Reports</h5>

						
						<div id="areaChartData"></div>

						
						
						

					</div> 







				<!-- quick email widget -->
				<div class="box box-info">
					<div class="box-header">
					<i class="fa fa-envelope"></i>

					<h3 class="box-title">Quick Email</h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
								title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
					<!-- /. tools -->
					</div>
					<div class="box-body">
					<form action="#" method="post">
						<div class="form-group">
						<input type="email" class="form-control" name="emailto" placeholder="Email to:">
						</div>
						<div class="form-group">
						<input type="text" class="form-control" name="subject" placeholder="Subject">
						</div>
						<div>
						<textarea class="textarea" placeholder="Message"
									style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						</div>
					</form>
					</div>
					<div class="box-footer clearfix">
					<button type="button" class="pull-right btn btn-default" id="sendEmail">Send
						<i class="fa fa-arrow-circle-right"></i></button>
					</div>
				</div>

			</section>

			
		</div>
		

	</section>
	<?php  //echo $_SERVER['PHP_SELF'];?>
	
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
	 $.ajax({
	   url: "index.php",    
	   dataType: "json",
	   success: function (jsonData) {
		 // Convert JSON data to DataTable
		 var data = google.visualization.arrayToDataTable(jsonData);

		 var options = {
		   title: 'Bargraph Showing Number Of applications on each Job posted',
		   vAxis: { title: 'Number Applications Received', minValue: 0, format: '0',  gridlines: { count: 2 } }, // Set minValue to 1
		   hAxis: { title: 'Job Posted' },
		   bars: 'vertical', // Display vertical bars
		   colors: ['#008000', '#34A853', '#FBBC05', '#EA4335'], // Customize bar colors
		   bar: { groupWidth: '50%' }
		 };

		 var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));

		 chart.draw(data, options);
	   },
	   error: function (error) {
		 console.log('Error fetching data:', error);
	   }
	 });
   }
 </script>





<?php include('../inc/footer.php'); ?>
<?php include('../inc/scripts.php'); ?>

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<script>
    $(function () {
        // Function to fetch data from the database using AJAX
        function fetchData() {
            $.ajax({
                url: 'getData.php', // Change this to the actual path of your PHP file
                method: 'GET',
                success: function (data) {
                    // Parse the JSON data returned from PHP
                    var jsonData = JSON.parse(data);

                    // Modify your chart data here using the fetched data
                    var areaChartData = {
                        labels: jsonData[0],
                        datasets: [
                            {
                                label: jsonData[1][0],
                                fillColor: 'rgba(210, 214, 222, 1)',
                                strokeColor: 'rgba(210, 214, 222, 1)',
                                pointColor: 'rgba(210, 214, 222, 1)',
                                pointStrokeColor: '#c1c7d1',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(220,220,220,1)',
                                data: jsonData[1].slice(1)
                            }
                        ]
                    };

                    // Modify other chart configurations as needed

                    // Create the line chart
                    var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
                    var areaChart = new Chart(areaChartCanvas);
                    areaChart.Line(areaChartData, areaChartOptions);

                    // Other chart creations go here
                },
                error: function (error) {
                    console.log('Error fetching data: ' + error);
                }
            });
        }

        // Call the fetchData function to populate the charts with data
        fetchData();
    });
</script>
