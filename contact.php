<?php

	//Include the top header
	include "common/top.php";

	//Include the navigation
	include "common/navigation.php";

?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Contact</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Contact</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="contact">
		<div class="container">


			<div class="col-md-8 contact-grids1 animated wow fadeInRight" data-wow-delay=".5s">
				<form>
						<div class="class="form-group col-xs-8"">
							<h4>Name</h4>

								<input type="text" placeholder="" required="">

						</div>
						<div class="contact-form2">
							<h4>Website</h4>

								<input type="text" placeholder="" required="">

						</div>

						<div class="contact-form2">
							<h4>Email</h4>

								<input type="email" placeholder="" required="">

						</div>
						<div class="contact-form2">
							<h4>Subject</h4>

								<input type="text" placeholder="" required="">

						</div>


				<div class="contact-me ">
					<h4>Message</h4>

						<textarea type="text"  placeholder="" required=""> </textarea>
						</div>
						<input type="submit" value="Submit" >
				</form>

			</div>

			<div class="col-md-4 contact-grids">
				<div class=" contact-grid animated wow fadeInLeft" data-wow-delay=".5s">
					<div class="contact-grid1">
						<div class="contact-grid2 ">
							<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
						</div>
						<div class="contact-grid3">
							<h4>Address</h4>
							<p>221 Burwood Hwy, Burwood VIC 3125 <span>Melbourne City.</span></p>
						</div>
					</div>
				</div>
				<div class=" contact-grid animated wow fadeInUp" data-wow-delay=".5s">
					<div class="contact-grid1">
						<div class="contact-grid2 contact-grid4">
							<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
						</div>
						<div class="contact-grid3">
							<h4>Call Us</h4>
							<p> Burwood: 03 9244 6636 <span> Geelong: 03 5227 1419 </span></p>
						</div>
					</div>
				</div>
				<div class=" contact-grid animated wow fadeInRight" data-wow-delay=".5s">
					<div class="contact-grid1">
						<div class="contact-grid2 contact-grid5">
							<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
						</div>
						<div class="contact-grid3">
							<h4>Email</h4>
							<p><a href="contactto:info.deakinshoppingcenter@gmail.com">info.deakinshoppingcenter@gmail.com</a>p</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.697768023429!2d145.10881549436527!3d-37.84396076611026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad640edae7ac72d%3A0x6f60f47a7ef355ad!2sDeakin+University!5e0!3m2!1sen!2sau!4v1492401086501" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div >
<!-- //contact -->

<?php

	//Include footer
	include "common/footer.php";

	//Include Scripts and bottom file
	include "common/bottom.php";

?>
