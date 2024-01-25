<?php include('../inc/header.php'); ?>
<?php include('../inc/navbar.php'); ?>
<?php include('../inc/sidebar.php'); ?>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				SHORTLISTING CANDIDATES
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Manage Users</li>
			</ol>
			<hr style="border-color: green;"/>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div><br/>
			<!--<hr style="border-color: green;"/> -->
			<!-- Main row -->
			<div class="row">
				<div class="col-md-3">
					<form role="form" method="POST" action="" enctype="multipart/form-data">
						<!--box -->
						<div class="box box-success no-padding pull-left">
							
							<div class="box-header with-border">
								
								<h2 class="box-title pull-left"><b>SHORTLIST CANDIDATES</b></h2>
								<div class="row">
									<div class="col-md-12">
										
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							
							<div class="box-body">  
  
								<div class="form-group">
									<label for="exampleInputPassword1">Select Job Title</label>
									<select class="form-control select2" name="job_title" required>
										<option selected="selected" disabled>Select Title</option>
										<?php
											// Add your database connection code here
											include('../inc/dbcon.php');

											// Fetch distinct job titles from the jobs table
											$jobTitlesQuery = "SELECT DISTINCT job_title FROM jobs";
											$jobTitlesResult = $conn->query($jobTitlesQuery);

											if ($jobTitlesResult->num_rows > 0) {
												while ($row = $jobTitlesResult->fetch_assoc()) {
													echo "<option value='" . $row['job_title'] . "'>" . $row['job_title'] . "</option>";
												}
											} else {
												echo "<option value=''>No job titles found</option>";
											}
										?>
																													
									</select>
								</div>    
								<div class="form-group">
									<label for="shortlist_count">Number of People to Shortlist:</label>
                					<input type="number" class="form-control" name="shortlist_count" required>
								</div> 
								                                                  
								
								
							
								<!-- /.form-group -->               
							</div>
							<!-- /.box-body -->

							<div class="box-footer">                            
								<button type="submit" class="btn btn-flat btn-success pull-right" name="Submit"><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Shortlist</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>                                           
								<button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  
							</div>
						
						</div>
						<!-- /.box -->
					</form>
				</div>
				



				<div class="col-md-9">
					<div class="box box-success">
						<div class="box-header with-border">
										
							<h2 class="box-title pull-left"><b>LIST OF SHORTLISTED CANDIDATES</b></h2>
							
							<div class="box-tools pull-right">
								<a data-target="#import_users" data-toggle="modal" class="btn btn-flat btn-success pull-right"><i class="fa fa-upload"></i><span>&nbsp;<b>UPLOAD</b></span></a><br/>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div class="row">
								<div class="col-md-12">
									
								
								
								</div>
								
								<div class="col-lg-12 col-md-12"><br>

									<table  id="example1"  class="table table-hover table-striped table-bordered table-responsive">
										<thead>
											<tr>
												<!-- <th style="width:2px;">No.</th> -->
												<th>ID</th>
												<th>Name</th>
												
												<th>Email</th>
												<th>Job title</th>
												
												<th>Action</th>
											</tr>                                                             
										</thead>
										
										<tbody>
										<?php
											// Add your database connection code here
											include('../inc/dbcon.php');

											// Check if the form is submitted
											// Check if the form is submitted
											if (isset($_POST['Submit']) == 'POST') {
												// Retrieve data from the form
												$jobTitle = $_POST['job_title'];
												$shortlistCount = $_POST['shortlist_count'];

												// Fetch candidates from the applications table based on the provided job title AND a.status = 'pending'
												$candidatesQuery = "
													SELECT a.id, a.user_id, a.fullname, a.email, a.job_id, j.job_title
													FROM job_applications a
													JOIN jobs j ON a.job_id = j.job_id
													WHERE j.job_title = '$jobTitle' 
													GROUP BY a.id
													ORDER BY score DESC
													LIMIT $shortlistCount
												";

												$candidatesResult = $conn->query($candidatesQuery);

												if ($candidatesResult->num_rows > 0) {
													// Insert shortlisted candidates into the shortlisted table
													while ($row = $candidatesResult->fetch_assoc()) {
														$candidateId = $row['user_id'];
														$insertQuery = "INSERT INTO shortlisted (fullname, email, job_title, status) VALUES ('{$row['fullname']}', '{$row['email']}', '{$row['job_title']}', 'pending-shortlist')";
														$conn->query($insertQuery);

														// You can update the status of the candidate in the applications table if needed
														/* $updateStatusQuery = "UPDATE job_applications SET status = 'shortlisted' WHERE user_id = '$candidateId'";
														$conn->query($updateStatusQuery); */
														$shortlistedQuery = "SELECT * FROM shortlisted WHERE job_title = '$jobTitle' AND status = 'pending-shortlist'";
														$shortlistedResult = $conn->query($shortlistedQuery);
														if ($shortlistedResult->num_rows > 0) {
															while ($row = $shortlistedResult->fetch_assoc()) {
																echo "<tr>";
																echo "<td>{$row['shortlisted_id']}</td>";
																echo "<td>{$row['fullname']}</td>";
																echo "<td>{$row['email']}</td>";
																echo "<td>{$row['job_title']}</td>";
																echo "<td>Action</td>";  // You can customize the action column as needed
																echo "</tr>";
															}
														} else {
															echo "<tr><td colspan='5'>No shortlisted candidates found</td></tr>";
														}
													}

													// Close the database connection
													$conn->close();

													// Redirect to the same page or any other page after the process
													/* header('Location: manage_users.php'); */
													exit();
												}
											}


										?>
										</tbody>
									</table>

								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->

	</div>

<?php include('../inc/user_modal.php');?>


<?php include('../inc/footer.php'); ?>
<?php include('../inc/scripts.php'); ?>