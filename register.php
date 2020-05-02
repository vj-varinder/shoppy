<?php

	//Include the top header
	include "common/top.php";

	//Include the navigation
	include "common/navigation.php";

?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Register</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Register</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">
		<form>
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="login-mail">
					<input type="text" placeholder="Name" required="">
					<i class="glyphicon glyphicon-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Email" required="">
					<i class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Repeated password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>

				<div class="login-mail">
					<input type="text" placeholder="Mobile Nunber" required="">
					<i class="glyphicon glyphicon-earphone"></i>
				</div>

<div class="col-lg-4">

	
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
						user type <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
						<a href="https://www.google.com">seller</a>
						</li>
						<li>
						<a href="https://www.google.com">buyer</a>
						</li>
					</ul>


				</div>



				<br />

				  <a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>I agree with the terms</label>
					   </a>

			</div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Submit">
					</label>
					<p>Already register</p>
				<a href="login.php" class="hvr-sweep-to-top">Login</a>
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>


	</div>
<?php

	//Include footer
	include "common/footer.php";

	//Include Scripts and bottom file
	include "common/bottom.php";

?>
