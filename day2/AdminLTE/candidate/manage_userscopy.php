<script src="assets/custom/jobs.js"></script>

<?php //include_once("session/session.php"); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>

<?php
session_start();
	include("inc/dbcon.php");
	$user_id = $_SESSION['user_id'];
	$portfolioCheckSql = "SELECT * FROM user_portfolio WHERE user_id = '$user_id'";
	$portfolioCheckResult = $conn->query($portfolioCheckSql);

	if ($portfolioCheckResult->num_rows > 0) {
		// User already has a portfolio, redirect or display a message
		echo "<script>
        alert('You already have a portfolio.');
        window.location.href = 'manage_users.php';
      	</script>";
	} 

	$currentStep = isset($_SESSION['currentStep']) ? $_SESSION['currentStep'] : 1;

	// Check if the user is not logged in
	/* if (!isset($_SESSION['user_id'])) {
		// Redirect to the login page or handle the case where the user is not logged in
	// header("Location: login.php");
		exit();
	} */
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				PORTFOLIO SECTION (Create and View Your Portfolio)
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
				<div class="col-xs-12">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Add Portifolio</a></li>
							<li class=""><a href="#glyphicons" data-toggle="tab" aria-expanded="false">View Portifolio</a></li>
							<!-- <li class=""><a href="#glyphicons" data-toggle="tab" aria-expanded="false">Edit Portifolio</a></li> -->
						</ul>
						<div class="tab-content">
							<!-- Font Awesome Icons -->
							<div class="tab-pane active" id="fa-icons">
								<div class="row">
									<div class="col-md-12">
										<form id="manual-application-form" method="post" action="" enctype="multipart/form-data">
											<!-- Contact Information -->
											<div class="col-md-12">

												<progress id="form-progress" style="width: 100%;" max="100" value="<?php echo ($currentStep - 1) / 6 * 100; ?>"></progress>
											</div>
											<div class="col-md-12">
											<!-- Contact Information Section -->
												<div class="form-step" id="step1" style="display: <?php echo ($currentStep == 1) ? 'block' : 'none'; ?>">
													<h2>Contact Information</h2>
													<div class="form-group">
														<label for="full_name">Full Name:</label>
														<input type="text" class="form-control" id="full_name" name="FullName" required>
													</div>
													<div class="form-group">
														<label for="address">Address:</label>
														<input type="text" class="form-control" id="address" name="Address" required>
													</div>
													<div class="form-group">
														<label for="phone_number">Phone Number:</label>
														<input type="tel" class="form-control" id="phone_number" name="PhoNumber" required>
													</div>
													<div class="form-group">
														<label for="email">Email Address:</label>
														<input type="email" class="form-control" id="email" name="Email" required>
													</div>
													<button type="button" class="btn btn-success" onclick="nextStep(2)">Next</button>
												</div>

											<!-- Education Section -->
											<div class="form-step" id="step2" style="display: <?php echo ($currentStep == 2) ? 'block' : 'none'; ?>;">
												<h2>Education</h2>
												<div id="educationEntries">
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label for="Degree">Degree:</label>
																<input type="text" class="form-control" name="Education[Degree][]" required>
															</div>
															<div class="col-md-4">
																<label for="institution">Institution:</label>
																<input type="text" class="form-control" name="Education[Institution][]" required>
															</div>
															<div class="col-md-3">
																<label for="graduation_date">Graduation Date:</label>
																<input type="date" class="form-control" name="Education[GraduationDate][]" required>
															</div>
															<div class="col-md-1">
																<button type="button" class="btn btn-success" onclick="addEntry('educationEntries')">Add</button>
															</div>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-success" onclick="prevStep()">Previous</button>
												<button type="button" class="btn btn-success" onclick="nextStep(3)">Next</button>
											</div>

											<!-- Professional Experience Section -->
											<div class="form-step" id="step3" style="display: <?php echo ($currentStep == 3) ? 'block' : 'none'; ?>;">
												<h2>Professional Experience</h2>
												<div id="experienceEntries">
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label for="job_title">Job Title:</label>
																<input type="text" class="form-control" name="ProfessionalExperience[JobTitle][]">
															</div>
															<div class="col-md-4">
																<label for="company_name">Company Name:</label>
																<input type="text" class="form-control" name="ProfessionalExperience[CompanyName][]">
															</div>
															<div class="col-md-3">
																<label for="employment_dates">Years Worked:</label>
																<input type="text" class="form-control" name="ProfessionalExperience[EmploymentDates][]">
															</div>
															<div class="col-md-1">
																<button type="button" class="btn btn-success" onclick="addEntry('experienceEntries')">Add</button>
															</div>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-success" onclick="prevStep()">Previous</button>
												<button type="button" class="btn btn-success" onclick="nextStep(4)">Next</button>
											</div>

											<!-- Skills Section -->
											<div class="form-step" id="step4" style="display: <?php echo ($currentStep == 4) ? 'block' : 'none'; ?>;">
												<h2>Skills</h2>
												<div id="skillsEntries">
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label for="skills">Skills:</label>
																<input type="text" class="form-control" name="Skills[]">
															</div>
															<div class="col-md-1">
																<button type="button" class="btn btn-success" onclick="addEntry('skillsEntries')">Add</button>
															</div>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-success" onclick="prevStep()">Previous</button>
												<button type="button" class="btn btn-success" onclick="nextStep(5)">Next</button>
											</div>

											<!-- Certifications Section -->

											<!-- Certifications Section -->
											<div class="form-step" id="step5" style="display: <?php echo ($currentStep == 5) ? 'block' : 'none'; ?>;">
												<h2>Certifications</h2>
												<div id="certificationsEntries" class="form-group">
													<div class="row">
														<!-- <div class="col-md-3">
															<label for="certifications">Certifications:</label>
															<input type="text" class="form-control" name="Certifications[]">
														</div> -->
														<div class="col-md-4">
															<label for="certifications">Certifications (optional):</label>
															<input type="text" class="form-control" name="Certifications[]">
														</div>

														<!-- Certification File Upload -->
														<div class="col-md-4">
															<label for="certifications_file">Certifications File (PDF only, optional):</label>
															<input type="file" class="form-control" id="certifications_file" name="certifications_file" accept=".pdf">
														</div>
														<div class="col-md-4">
															<button type="button" class="btn btn-success" onclick="addEntry('certificationsEntries')">Add</button>
														</div>
													</div>

												</div>
												<div class="col-md-4 pull-right">
													<button type="button" class="btn btn-success pull-right" onclick="nextStep(6)">Next</button>
													<button type="button" class="btn btn-success pull-right" onclick="prevStep()">Previous</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														
												</div>
												
											</div>

											<!-- File Upload Section -->
											<div class="form-step" id="step6" style="display: none;">
												<p><h2>Additional documents</h2>
												</p>
												<div class="form-group">
													<label for="cv_document">CV Document (PDF only):</label>
													<input type="file" class="form-control" id="cv_document" name="cv_document" accept=".pdf" required>
												</div>
												<div class="form-group">
													
													<label for="project_links">Links to Projects (optional):</label>
													<textarea class="form-control" id="project_links" name="project_links" rows="3"></textarea>
												</div>
												<button type="submit" class="btn btn-success pull-right">Submit</button>&nbsp;&nbsp;
												<button type="button" class="btn btn-success pull-right" onclick="prevStep()">Previous</button>
												
											</div>						
											</div>		
										</form>
									</div>
								</div>
							</div>
							<!-- /#fa-icons -->
							<script>
								function addEntry(containerId) {
									const container = document.getElementById(containerId);
									const newEntry = container.firstElementChild.cloneNode(true);
									container.appendChild(newEntry);
								}
							</script>

							<script>
								let currentStep = <?php echo isset($_SESSION['currentStep']) ? $_SESSION['currentStep'] : 1; ?>;
								const totalSteps = 6;

								function updateProgress() {
									const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
									document.getElementById('form-progress').value = progress;
								}

								function nextStep(next) {
									console.log('Next button clicked');
									console.log('Current step:', currentStep);
									document.getElementById('step' + currentStep).style.display = 'none';
									currentStep = next;
									document.getElementById('step' + currentStep).style.display = 'block';
									updateProgress();

									// Store the current step in the session
									fetch('store_progress.php', {
										method: 'POST',
										headers: {
											'Content-Type': 'application/json',
										},
										body: JSON.stringify({
											currentStep: currentStep,
										}),
									});
								}

								function prevStep() {
									console.log('Previous button clicked');
									console.log('Current step:', currentStep);
									if (currentStep > 1) {
										document.getElementById('step' + currentStep).style.display = 'none';
										currentStep--;
										document.getElementById('step' + currentStep).style.display = 'block';
										updateProgress();

										// Store the current step in the session
										fetch('store_progress.php', {
											method: 'POST',
											headers: {
												'Content-Type': 'application/json',
											},
											body: JSON.stringify({
												currentStep: currentStep,
											}),
										});
									}
								}
							</script>

							<!-- glyphicons-->
							<div class="tab-pane" id="glyphicons">
								<div class="row">
									<div class="col-md-12">

										<!-- VIEW PORTFOLIO SECTION -->
										

										<?php include_once("portfolio_view_copy.php"); ?>
						
										<?php
											// Function to sanitize output
											 function sanitizeOutput($data) {
											// 	return htmlspecialchars(stripslashes(trim($data)));
											}

											// Replace 'your_user_id' with the actual user ID
											$userId = $_SESSION['user_id'];

											// Retrieve user portfolio data
											$sql = "SELECT * FROM user_portfolio WHERE user_id = ?";
											$stmt = $conn->prepare($sql);
											$stmt->bind_param("i", $userId);
											$stmt->execute();
											$result = $stmt->get_result();

											if ($result->num_rows > 0) {
												$row = $result->fetch_assoc();
												?>
												<div class="container mt-5">
													<h1 class="mb-4">User Portfolio</h1>

													<!-- Contact Information -->
													<div class="card mb-4">
														<div class="card-header">
															<h2>Contact Information</h2>
														</div>
														<div class="card-body">
															<p><strong>Full Name:</strong> <?php echo sanitizeOutput($row['full_name']); ?></p>
															<p><strong>Address:</strong> <?php echo sanitizeOutput($row['address']); ?></p>
															<p><strong>Phone Number:</strong> <?php echo sanitizeOutput($row['phone_number']); ?></p>
															<p><strong>Email:</strong> <?php echo sanitizeOutput($row['email']); ?></p>
														</div>
													</div>

													<!-- Education Section -->
													<div class="card mb-4">
														<div class="card-header">
															<h2>Education</h2>
														</div>
														<div class="card-body">
															<p><strong>Degree:</strong> <?php echo sanitizeOutput($row['degree']); ?></p>
															<p><strong>Institution:</strong> <?php echo sanitizeOutput($row['institution']); ?></p>
															<p><strong>Graduation Date:</strong> <?php echo sanitizeOutput($row['graduation_date']); ?></p>
														</div>
													</div>

													<!-- Professional Experience Section -->
													<div class="card mb-4">
														<div class="card-header">
															<h2>Professional Experience</h2>
														</div>
														<div class="card-body">
															<p><strong>Job Title:</strong> <?php echo sanitizeOutput($row['job_title']); ?></p>
															<p><strong>Company Name:</strong> <?php echo sanitizeOutput($row['company_name']); ?></p>
															<p><strong>Years Worked:</strong> <?php echo sanitizeOutput($row['employment_dates']); ?></p>
														</div>
													</div>

													<!-- Skills Section -->
													<div class="card mb-4">
														<div class="card-header">
															<h2>Skills</h2>
														</div>
														<div class="card-body">
															<p><strong>Skills:</strong> <?php echo sanitizeOutput($row['skills']); ?></p>
														</div>
													</div>

													<!-- Certifications Section -->
													<div class="card mb-4">
														<div class="card-header">
															<h2>Certifications</h2>
														</div>
														<div class="card-body">
															<p><strong>Certifications:</strong> <?php echo sanitizeOutput($row['certifications']); ?></p>
															<?php if (!empty($row['certifications_file_path'])) { ?>
																<p><strong>Certifications File:</strong> <a href="<?php echo $row['certifications_file_path']; ?>" target="_blank">View File</a></p>
															<?php } ?>
														</div>
													</div>

													<!-- Additional Documents Section -->
													<div class="card mb-4">
														<div class="card-header">
															<h2>Additional Documents</h2>
														</div>
														<div class="card-body">
															<p><strong>CV Document:</strong> <a href="<?php echo $row['cv_document_path']; ?>" target="_blank">View CV Document</a></p>
															<p><strong>Project Links:</strong> <?php echo sanitizeOutput($row['project_links']); ?></p>
														</div>
													</div>
												</div>
												<?php
											} else {
												//echo "No portfolio data found for the user.";
											}

											// $stmt->close();
											// $conn->close();
										?>

									</div>
								</div>

								
							</div>
							<!-- /#ion-icons -->

						</div>

					</div>

				</div>
			</div>

		</section>

	</div>





	<?php
// Assuming you have a database connection established
include("inc/dbcon.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form fields for the 'portfolios' table
	$userId= $_SESSION['user_id'];
    $fullName = $_POST['FullName'];
    $address = $_POST['Address'];
    $phoneNumber = $_POST['PhoNumber'];
    $email = $_POST['Email'];
    
    $stmt = $pdo->prepare($insertPortfolioSQL);
    $stmt->bindParam(':user_id', $userId); // Replace with the actual user ID
    $stmt->bindParam(':full_name', $fullName);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone_number', $phoneNumber);
    $stmt->bindParam(':email', $email);
	// Insert data into 'portfolios' table
    $insertPortfolioSQL = "INSERT INTO portfolios (user_id, full_name, address, phone_number, email) VALUES (:user_id, :full_name, :address, :phone_number, :email)";
 
    if ($stmt->execute()) {
        $portfolioId = $pdo->lastInsertId();

        // Insert data into 'education_entries' table
        foreach ($_POST['Education']['Degree'] as $key => $degree) {
            $institution = $_POST['Education']['Institution'][$key];
            $graduationDate = $_POST['Education']['GraduationDate'][$key];

            
            $stmt = $pdo->prepare($insertEducationSQL);
            $stmt->bindParam(':portfolio_id', $portfolioId);
            $stmt->bindParam(':degree', $degree);
            $stmt->bindParam(':institution', $institution);
            $stmt->bindParam(':graduation_date', $graduationDate);
            $stmt->execute();
			$insertEducationSQL = "INSERT INTO education_entries (portfolio_id, degree, institution, graduation_date)
            VALUES (:portfolio_id, :degree, :institution, :graduation_date)";
        }

        // Insert data into 'experience_entries' table
        foreach ($_POST['ProfessionalExperience']['JobTitle'] as $key => $jobTitle) {
            $companyName = $_POST['ProfessionalExperience']['CompanyName'][$key];
            $employmentDates = $_POST['ProfessionalExperience']['EmploymentDates'][$key];
            
            $stmt = $pdo->prepare($insertExperienceSQL);
            $stmt->bindParam(':portfolio_id', $portfolioId);
            $stmt->bindParam(':job_title', $jobTitle);
            $stmt->bindParam(':company_name', $companyName);
            $stmt->bindParam(':employment_dates', $employmentDates);
            $stmt->execute();
			$insertExperienceSQL = "INSERT INTO experience_entries (portfolio_id, job_title, company_name, employment_dates) VALUES (:portfolio_id, :job_title, :company_name, :employment_dates)";
        }

        // Insert data into 'skills' table
        foreach ($_POST['Skills'] as $skill) {
            
            $stmt = $pdo->prepare($insertSkillsSQL);
            $stmt->bindParam(':portfolio_id', $portfolioId);
            $stmt->bindParam(':skill', $skill);
            $stmt->execute();
			$insertSkillsSQL = "INSERT INTO skills (portfolio_id, skill) VALUES (:portfolio_id, :skill)";
        }

        // Insert data into 'certifications' table
        foreach ($_POST['Certifications'] as $key => $certificationName) {
            $certificationFilePath = ''; // Placeholder for the file path
            if ($_FILES['certifications_file']['error'][$key] === UPLOAD_ERR_OK) {
				$uploadDir = '../assets/puploads/'; // Specify your upload directory
                $certificationFileName = basename($_FILES['certifications_file']['name'][$key]);
                $certificationFilePath = $uploadDir . $certificationFileName;
                move_uploaded_file($_FILES['certifications_file']['tmp_name'][$key], $certificationFilePath);
            }
            
            $stmt = $pdo->prepare($insertCertificationsSQL);
            $stmt->bindParam(':portfolio_id', $portfolioId);
            $stmt->bindParam(':certification_name', $certificationName);
            $stmt->bindParam(':certification_file_path', $certificationFilePath);
            $stmt->execute();
			$insertCertificationsSQL = "INSERT INTO certifications (portfolio_id, certification_name, certification_file_path) VALUES (:portfolio_id, :certification_name, :certification_file_path)";
        }
		// File upload handling for CV document
		$cvDocumentPath = ''; // Placeholder for the file path
		if ($_FILES['cv_document']['error'] === UPLOAD_ERR_OK) {
			$uploadDir = '../assets/puploads/'; // Specify your upload directory
			$cvDocumentName = basename($_FILES['cv_document']['name']);
			$cvDocumentPath = $uploadDir . $cvDocumentName;
	
			move_uploaded_file($_FILES['cv_document']['tmp_name'], $cvDocumentPath);
		}
	
		// Additional document fields
		$projectLinks = $_POST['project_links'];
        
        $stmt = $pdo->prepare($insertAdditionalDocsSQL);
        $stmt->bindParam(':portfolio_id', $portfolioId);
        $stmt->bindParam(':cv_document_path', $cvDocumentPath);
        $stmt->bindParam(':project_links', $projectLinks);
        $stmt->execute();

		$insertAdditionalDocsSQL = "INSERT INTO additional_documents (portfolio_id, cv_document_path, project_links)
        VALUES (:portfolio_id, :cv_document_path, :project_links)";

        echo "Data inserted successfully!";
    } else {

        echo "Error inserting data into the database!";
    }
}
?>

<?php include('inc/user_modal.php');?>

<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>