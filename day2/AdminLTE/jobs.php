<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>

	<main id="main">
		<!-- ======= Breadcrumbs ======= -->
		<section id="breadcrumbs" class="breadcrumbs">
			<div class="container">

				<div class="d-flex justify-content-between align-items-center">
				<h2>Available Jobs</h2>
				<ol>
					<li><a href="index.html">Home</a></li>
					<li>Available Jobs</li>
				</ol>
				</div>

			</div>
		</section><!-- End Breadcrumbs -->

		<!-- ======= Pricing Section ======= -->
		<section id="pricing" class="pricing">
			<div class="container" data-aos="fade-up">

				<div class="row">
					<div class="col-lg-3 col-md-6 mt-4 mt-md-0">
						<div class="box featured">
						<h3>Business</h3>
						<h4><sup>$</sup>19<span> / month</span></h4>
						<ul>
							<li>Aida dere</li>
							<li>Nec feugiat nisl</li>
							<li>Nulla at volutpat dola</li>
							<li>Pharetra massa</li>
							<li class="na">Massa ultricies mi</li>
						</ul>
						<div class="btn-wrap">
							<a href="#" class="btn-buy">Buy Now</a>
						</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
						<div class="box">
						<h3>Developer</h3>
						<h4><sup>$</sup>29<span> / month</span></h4>
						<ul>
							<li>Aida dere</li>
							<li>Nec feugiat nisl</li>
							<li>Nulla at volutpat dola</li>
							<li>Pharetra massa</li>
							<li>Massa ultricies mi</li>
						</ul>
						<div class="btn-wrap">
							<a href="#" class="btn-buy">Buy Now</a>
						</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
						<div class="box">
						<span class="advanced">Advanced</span>
						<h3>Ultimate</h3>
						<h4><sup>$</sup>49<span> / month</span></h4>
						<ul>
							<li>Aida dere</li>
							<li>Nec feugiat nisl</li>
							<li>Nulla at volutpat dola</li>
							<li>Pharetra massa</li>
							<li>Massa ultricies mi</li>
						</ul>
						<div class="btn-wrap">
							<a href="#" class="btn-buy">Buy Now</a>
						</div>
						</div>
					</div>

				</div>

			</div>
		</section><!-- End Pricing Section -->

		<!-- ======= Services Section ======= -->
		<section id="services" class="services section-bg">

			<div class="container" data-aos="fade-up">
				<div class="section-title">
					<h2>Features</h2>
					<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
				</div>
				<div class="row">
					<?php 
						include('inc/dbcon.php');

						$sq = "SELECT * FROM jobs";

						$res = $conn->query($sq);

						while ($row = $res->fetch_assoc()) {

							echo"
								<div width='100' class='col-lg-4 col-md-4 d-flex align-items-stretch mt-4' data-aos='zoom-in' data-aos-delay='100'>
									<div class='icon-box iconbox-yellow'>
										<div class='icon'>
											<svg width='100' height='100' viewBox='0 0 600 600' xmlns='http://www.w3.org/2000/svg'>
											<path stroke='none' stroke-width='0' fill='#f5f5f5' d='M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813'></path>
											</svg>
											<i class='bx bx-layer'></i>
										</div>
										<h4><a href=''>".$row['job_title']."</a></h4>
										<p>Closing Date: ".$row['deadline_date']." </p>
										<p>status: ".$row['status']." </p>
									</div>
								</div>
							
							
							";


							
						}
					
					
					
					
					
					?>
					
					
					
				</div>

			</div>
		</section><!-- End Services Section -->

		<!-- ======= Features Section ======= -->
		<section id="features" class="features">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Features</h2>
					<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
				</div>

				<div class="row">
					<?php 
						include('inc/dbcon.php');

						$sq = "SELECT * FROM jobs";

						$res = $conn->query($sq);

						while ($row = $res->fetch_assoc()) {

							echo"
								<div class='col-lg-4 col-md-4 mt-4'>
									<div class='card'>
										<div class='card-header'>
											<h4><a href='#'>".$row['job_title']."</a></h4>
										</div>
										<div class='card-body'>
											<h4>Qualification</a></h4>
										
											<p>".$row['qualifications']." </p>
										</div>
										<div class='card-footer'>
											<h4>Closing Date</h4>
										
											<p>".$row['deadline_date']." </p>
										</div>


									
									
									</div>
									
								</div>
							
							
							";


							
						}
					
					
					
					
					
					?>
					
					
					
				</div>

			</div>
		</section><!-- End Features Section -->

	</main><!-- End #main -->


<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>
