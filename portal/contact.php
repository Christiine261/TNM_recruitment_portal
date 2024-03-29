<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Contact</h2>
				<ol>
					<li><a href="index.html">Home</a></li>
					<li>Contact</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	

	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">			
		
						
			<div class="row mt-5 justify-content-center" >
				<div class="col-lg-6">

					<div class="info-wrap">
						<div class="row">
							<div class="col-lg-4 info">
							<i class="bi bi-geo-alt"></i>
							<h4>Location:</h4>
							<p>5th flow, LivingStone Towers<br>Gly Jons Road, P.O.Box 3039 <br>Blantyre, Malawi</p>
							</div>

							<div class="col-lg-4 info mt-4 mt-lg-0">
							<i class="bi bi-envelope"></i>
							<h4>Email:</h4>
							<p>info@tnm-malawi.com<br>contact@example.com</p>
							</div>

							<div class="col-lg-4 info mt-4 mt-lg-0">
							<i class="bi bi-phone"></i>
							<h4>Call:</h4>
							<p>+265 888 800 800</p>
							</div>
						</div>
					</div>
					<!-- ======= Contact Section ======= -->
					<div class="map-section">

							<iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3839.872238160139!2d35.07547248407866!3d-15.757896583047492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18d84f7891acd877%3A0x5a28ad55044d7413!2sTnm%20Tower!5e0!3m2!1sen!2smw!4v1706372066114!5m2!1sen!2smw"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					
					
						</div>

				</div>
				<div class="col-lg-6">
					<form action="inc/send_message_inc.php" method="post" role="form" >
						<div class="row">
							<div class="col-md-6 form-group">
							<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
							</div>
							<div class="col-md-6 form-group mt-3 mt-md-0">
							<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
							</div>
						</div>
						<div class="form-group mt-3">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
						</div>
						<div class="form-group mt-3">
							<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
						</div>
						
						<div class="row">
							<div class="col-md-8 form-group">
							
							</div>
							<div class="col-md-4 form-group mt-3 mt-md-0"><br />
								<button style="width: 100%;" class="btn btn-flat  btn-success" name="send_message" type="submit">Send</button>
							</div>
						</div>
					
					
					</form>
				</div>

			</div>
			

		</div>
	</section><!-- End Contact Section -->

</main><!-- End #main -->

<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>
