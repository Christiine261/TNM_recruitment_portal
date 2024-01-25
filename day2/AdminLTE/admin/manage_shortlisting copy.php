<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>



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
					<form role="form" method="POST" action="manage_shortlisting.php" enctype="multipart/form-data">
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
											$jobTitlesQuery = "SELECT * FROM jobs ";
											$jobTitlesResult = $conn->query($jobTitlesQuery);

											if ($jobTitlesResult->num_rows > 0) {
												while ($row = $jobTitlesResult->fetch_assoc()) {
													echo "<option value='" . $row['job_id'] . "'>" . $row['job_title'] . "</option>";
												}
											} else {
												echo "<option value=''>No job titles found</option>";
											}
										?>
																													
									</select>
								</div>    
								<div class="form-group">
									<label for="shortlist_count">Number of People to Shortlist:</label>
                					<input type="number" min="1" class="form-control" name="shortlist_count" required>
								</div> 
								                                                  
								
								
							
								<!-- /.form-group -->               
							</div>
							<!-- /.box-body -->

							<div class="box-footer">                            
								<button type="submit" class="btn btn-flat btn-success pull-right" name="ssubmit"><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Shortlist</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>                                           
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
												<th style="width:2px;">No.</th>											
												<th>Name</th>												
												<th>Email</th>
												<th>Job title</th>
												
												
											</tr>                                                             
										</thead>
										
										<tbody>
										<?php
										
											
											include('inc/dbcon.php');

											
										

											if (isset($_POST['ssubmit']) == 'POST') {
												$jobTitle = $_POST['job_title'];
												$shortlistCount = $_POST['shortlist_count'];
												$sqe = "SELECT * FROM jobs WHERE job_id = '$jobTitle'";
												$rese = $conn->query($sqe);
												$roe = $rese->fetch_assoc();
												$job = $roe['job_title'];

												// Fetch candidates from the applications table based on the provided job title AND a.status = 'pending'
												
												$sq = "SELECT * FROM job_applications WHERE job_id = '$jobTitle' AND status = 'pending'  ORDER BY score DESC LIMIT $shortlistCount";
												$res = $conn->query($sq);

												$sq = "SELECT * FROM job_applications WHERE job_id = '$jobTitle' AND status = 'pending' ORDER BY score DESC LIMIT $shortlistCount";
												$res = $conn->query($sq);
												
												while ($ro = $res->fetch_assoc()) {
													
													$score = $ro['score'];
													$fullname = $ro['fullname'];
													$email = $ro['email'];
													$job_id = $ro['job_id'];

													$ins = "INSERT INTO shortlisted(fullname, email, job_title, job_id) VALUES('$fullname', '$email', '$job', '$job_id') ";
													$nn = $conn->query($ins);

													$jobsss = $conn->insert_id;

													$inss = "UPDATE job_applications SET status = 'shortlisted' WHERE job_id = '$jobTitle' AND status = 'pending'";
													$nns = $conn->query($inss);
													
										
													if ($nns) {
														# code...
														

														$message ="
														<b>Dear $full_name</b><br/>
														<br><b></b>
														<b>
															We hope this email finds you well. We are pleased to inform you that after careful consideration of your application for the $job position at TNM Ltd, you have been shortlisted for the next stage of our selection process.<br><b></b>

															Your qualifications, experience, and skills have stood out among the many applications we received, and we believe you have the potential to make a significant contribution to our team.<br><b></b>
															
															Next Steps:<br><b></b>
															As the next step in the process, we would like to invite you for [Interview Type] on [Date] at [Time]. The interview will take place at our [Office Location/Online platform]. Please confirm your availability for this interview by [Confirmation Deadline]. Additionally, you will receive a separate email with more details regarding the interview and any preparatory steps.<br><b></b>
															
															Should you have any scheduling conflicts or require any further information, please feel free to contact us at logahstankey@gmail.com.<br><b></b>
															
															Congratulations once again on reaching this stage, and we look forward to the opportunity to get to know you better.<br><b></b>
																							
															Best regards,<br><b></b>
															
															Human Resource Manage<br><b></b>
															TNM RECRUITMENT<br><b></b>
									
														</b>";
									
														// passing true in constructor enables exceptions in PHPMailer
														
														$mail = new PHPMailer(true);
														
										
														try {
															// Server settings
															// $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
															$mail->isSMTP();
															$mail->Host = 'smtp.gmail.com';
															$mail->SMTPAuth = true;
															$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
															$mail->Port = 587;
										
															$mail->Username = 'christiechagoe@gmail.com'; // YOUR gmail email
															$mail->Password = 'ieip gdio kzjm apgc'; // YOUR gmail password
										
															// Sender and recipient settings
															$mail->setFrom('christiechagoe@gmail.com', 'TNM RECUITMENTS');
															$mail->addAddress($email, 'Receiver Name');
															$mail->addReplyTo('christiechagoe@gmail.com', 'TNM RECUITMENTS'); // to set the reply to
										
															// Setting the email content
															$mail->IsHTML(true);
															$mail->Subject = "Congratulations! You've Been Shortlisted for $job Position";
															$mail->Body = $message;
															$mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
										
															$mail->send();
															$_SESSION['successRegister'] = 'Account Successfully Created Please login to your email to get activation code';
															echo "<script type='text/javascript'>document.location.href='manage_shortlisting.php';</script>";
														}catch (Exception $e) {
															echo "<script type='text/javascript'>alert($mail->ErrorInfo);</script>";
															echo "<script type='text/javascript'>document.location.href='manage_shortlisting.php';</script>";
														}
														
														echo "<script type='text/javascript'>document.location.href='manage_shortlisting.php';</script>";
									
													} 
													
									
												}


												$sqa = "SELECT * FROM shortlisted WHERE job_id = '$jobTitle' ORDER BY score DESC LIMIT $shortlistCount";
												$resa = $conn->query($sqa);
												$count =0;
												while ($rowsa = $resa->fetch_assoc()) {
													$count = $count + 1;
													echo"
													<tr>
													
														<td>".$count."</td>
														<td>".$rowsa['fullname']."</td>
														<td>".$rowsa['email']."</td>
														<td>".$job."</td>
														
													</tr>
													";


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

<?php include('inc/user_modal.php');?>


<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>