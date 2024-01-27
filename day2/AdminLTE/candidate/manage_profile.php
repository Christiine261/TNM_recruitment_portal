<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>



<?php
session_start();

include_once("inc/dbcon.php");
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result) {
	$userDetails = mysqli_fetch_assoc($result);
	$profile = isset($userDetails['profile_picture']) ? $userDetails['profile_picture'] : '';
	$name = isset($userDetails['full_name']) ? $userDetails['full_name'] : '';
	$email = isset($userDetails['email']) ? $userDetails['email'] : '';
} else {
	
	$profile = '';
}


?>


<style type = text/css>

.img-circle {
    width: 300px; 
    height: 300px;
	align-content: center;
}

</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User
			<small>profile</small>
		</h1>
		<ol class="breadcrumb">
			
		</ol>
	</section>
	<section style="background-color: #eee;">
		<div class="container py-5">

			<div class="row"style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
				<div class="col-lg-12">
					<div class="card mb-4">
					<div class="card-body text-center">
						<img class="profile-user-img img-fluid img-circle" src="../assets/landingpage/img/profilePics/<?php echo $profile; ?>" alt="User Profile Image"
						class="rounded-circle img-fluid" style="width: 296px;">
						<h5 class="my-3"><?php echo $name?></h5>
						<h5 class="my-3"><?php echo $email?></h5>
						<p class="text-muted mb-1">Full Stack Developer</p>
						
					</div>
					</div>
					<div class="card mb-4 mb-lg-0">
						<h3 class="text-muted mb-1">Change password</h3>
						<div class="card-body p-0">
						<form action="inc/register_inc.php" method="post" role="form" class="form" enctype="multipart/form-data">
						
							<div class="form-group">
								<label for="exampleInputPassword1" >Current password</label>
								<input type="password" class="form-control" name="cpassword" id="cpassword" required>  
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">New password</label>
								<input type="password" class="form-control" name="npassword" id="npassword" required>  
							</div> 
							<div class="form-group">
								<label for="exampleInputPassword1">Comfirm password</label>
								<input type="password" class="form-control" name="npassword2" id="npassword2" required>  
							</div> 
							<div class="col-md-12 form-group mt-2 mt-md-0">
								<button style="width: 100%;" class="btn btn-success btn-flat" name="submit" type="submit"><span><b>submit</b></span></button>
							</div> 
						</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<?php


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Step 1: Receive form data
			$currentPassword = $_POST['cpassword'];
			$newPassword = $_POST['npassword'];
			$confirmPassword = $_POST['npassword2'];

			// Step 2: Validate input fields (you can add more validation as needed)

			// Step 3: Retrieve current hashed password from the database (replace with your database query)
			$userId = $user_id; // Replace with the actual user ID
			$stmt = $pdo->prepare("SELECT password FROM users WHERE id = :id");
			$stmt->bindParam(':id', $userId);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if ($row) {
				// Step 4: Verify entered current password
				$currentHashedPassword = $row['password'];
				
				if (password_verify($currentPassword, $currentHashedPassword)) {
					// Step 5: Generate new hashed password
					$newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
					
					// Step 6: Update the database with the new hashed password
					$updateStmt = $pdo->prepare("UPDATE users SET password = :password WHERE user_id = :id");
					$updateStmt->bindParam(':password', $newHashedPassword);
					$updateStmt->bindParam(':id', $userId);
					$updateStmt->execute();
					
					echo "Password updated successfully!";
				} else {
					echo "Invalid current password!";
				}
			} else {
				echo "User not found!";
			}
		}
	?>

	
</div>
<!-- /.content-wrapper -->



<?php include('inc/footer.php'); ?>


<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../assets/bower_components/chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->




</body>
</html>

