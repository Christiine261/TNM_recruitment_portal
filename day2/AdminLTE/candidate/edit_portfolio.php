<?php //include('inc/session.php'); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				My Portfolio
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Portfolio Edit</li>
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

				<?php

					include('../inc/dbcon.php'); 

					// Function to sanitize input
					function sanitizeInput($data) {
					return htmlspecialchars(stripslashes(trim($data)));
					}

					// Replace 'your_user_id' with the actual user ID
					$userId = 9;

					include('inc/dbcon.php'); 

					// Retrieve user portfolio data
					$sql = "SELECT * FROM user_portfolio WHERE user_id = ?";
					$stmt = $conn->prepare($sql);
					$stmt = $conn->prepare($sql);

					if (!$stmt) {
						die("Error in prepare: " . $conn->error);
					}

					$stmt->bind_param("i", $userId);
					$stmt->execute();
					$result = $stmt->get_result();

					if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					?>
					
					<div class="container mt-5">
						<h1>Edit Portfolio</h1>

						<form action="update_portfolio.php" method="post">
							<!-- Add hidden input for user ID -->
							<input type="hidden" name="user_id" value="<?php echo $userId; ?>">

							<!-- Contact Information Section -->
							<div class="mb-3">
								<label for="full_name" class="form-label">Full Name:</label>
								<input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo sanitizeInput($row['full_name']); ?>" required>
							</div>
							<div class="mb-3">
								<label for="address" class="form-label">Address:</label>
								<input type="text" class="form-control" id="address" name="address" value="<?php echo sanitizeInput($row['address']); ?>" required>
							</div>
							<div class="mb-3">
								<label for="phone_number" class="form-label">Phone Number:</label>
								<input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo sanitizeInput($row['phone_number']); ?>" required>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email Address:</label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo sanitizeInput($row['email']); ?>" required>
							</div>

								<!-- education section -->
							<div class="mb-3">
								<label for="full_name" class="form-label">Degree:</label>
								<input type="text" class="form-control" id="degree" name="degree" value="<?php echo sanitizeInput($row['degree']); ?>" required>
							</div>
							<div class="mb-3">
								<label for="address" class="form-label">Institution:</label>
								<input type="text" class="form-control" id="institution" name="institution" value="<?php echo sanitizeInput($row['institution']); ?>" required>
							</div>
							<div class="mb-3">
								<label for="phone_number" class="form-label">Graduation Date:</label>
								<input type="tel" class="form-control" id="graduation_date" name="graduation_date" value="<?php echo sanitizeInput($row['graduation_date']); ?>" required>
							</div>


							<!-- professional Experience section -->

							<div class="mb-3">
								<label for="full_name" class="form-label">JOB TITLE:</label>
								<input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo sanitizeInput($row['job_title']); ?>" required>
							</div>
							<div class="mb-3">
								<label for="address" class="form-label">COMPANY NAME:</label>
								<input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo sanitizeInput($row['company_name']); ?>" required>
							</div>
							<div class="mb-3">
								<label for="phone_number" class="form-label">YEARS WORKED:</label>
								<input type="text" class="form-control" id="employment_dates" name="employment_dates" value="<?php echo sanitizeInput($row['employment_dates']); ?>" required>
							</div>

							<!-- skills section -->

							<div class="mb-3">
								<label for="skills" class="form-label">SKILLS:</label>
								<input type="text" class="form-control" id="skills" name="skills" value="<?php echo sanitizeInput($row['skills']); ?>" required>
							</div>

							<!-- certifications section -->
							<div class="mb-3">
								<label for="certifications" class="form-label">CERTIFICATIONS:</label>
								<input type="text" class="form-control" id="certifications" name="certifications" value="<?php echo sanitizeInput($row['certifications']); ?>">
							</div>

							<div class="mb-3">
								<label for="certify" class="form-label">CERTIFICATION:</label>
								<input type="file" class="form-control" id="certifications_file_path" name="certifications_file_path" value="<?php echo sanitizeInput($row['certifications_file_path']); ?>">
							</div>


							<div class="mb-3">
								<label for="cv_file" class="form-label">UPDATE CV:</label>
								<input type="file" class="form-control" id="cv_document_path" name="cv_document_path" value="<?php echo sanitizeInput($row['cv_document_path']); ?>">
							</div>

							<div class="mb-3">
								<label for="LINKS" class="form-label">PROJECT LINKS:</label>
								<input type="text" class="form-control" id="project_links" name="project_links" value="<?php echo sanitizeInput($row['project_links']); ?>">
							</div>

							<br>

							<button type="submit" class="btn btn-primary">Update Portfolio</button>
						</form>
					</div>

					<?php
					} else {
					echo "No portfolio data found for the user.";
					}

					$stmt->close();
					$conn->close();
					?>
						

				</div>
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->
	</div>

<?php include('inc/user_modal.php');?>
<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>