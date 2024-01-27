<?php //include('inc/session.php'); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>



	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				MANAGE USERS
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
		
			
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
										
							<h2 class="box-title pull-left"><b>Available Jobs</b></h2>
							
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
										    <thead>
									    <tr>
									        <th style="width:2px;">No.</th>
									        <th>Job code</th>
									        <th>Job Title</th>
									        <th>Deadline</th>
									        <th>Status</th>
									        <th>Action</th>
									    </tr>                                                             
									</thead>
									<tbody>
									    <?php
									        include('inc/dbcon.php');

									        // Get the user's ID from the session
									        $userID = 1;

									        $sql = "SELECT * FROM jobs";

									        $stmt = $conn->prepare($sql);
									        $stmt->execute();
									        $result = $stmt->get_result();
									        $stmt->close();
									        $count = 0;

									        while ($row = $result->fetch_assoc()) {
									            $count += 1;
									            echo "
									                <tr>
									                    <td>" . $count . "</td>
									                    <td>" . $row['job_code'] . "</td>
									                    <td>" . $row['job_title'] . "</td>
									                    <td>" . $row['deadline_date'] . "</td>
									                    <td>" . $row['status'] . "</td>
									                    <td>  
									                        <a class='btn btn-primary' href='#job_details_". $row['job_id']."' data-toggle='modal'>
									                            <i class='fa fa-eye'></i>
									                            <span>View Details</span>
									                        </a>
									                    </td>
									                </tr>";

													include("inc/user_modal.php");
									        }
									    ?>
									</tbody>
									</table>

								</div>
							</div>
						</div>
						<div class="box-footer">

						</div>
					</div>
				</div>
			</div>
			<!-- /.row (main row) -->

		</section>


	</div>

<?php include('inc/user_modal.php');?>

<?php include('inc/footer.php'); ?>
<?php include('../inc/scripts.php'); ?>

