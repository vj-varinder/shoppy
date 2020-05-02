
<?php
$basepath= $_SERVER["DOCUMENT_ROOT"]."/shoppy";
include "$basepath/config/config.php";

//include the database connection file
include "$basepath/libraries/Database.php";

//Include the top header
include "$basepath/common/top.php";

//Include the navigation
include "$basepath/common/navigation.php";
?>

<!--------------------------->
<!--banner-->
<?php
	if($_POST)
	{
		$username=$_POST['username'];
		$user_email=$_POST['user_email'];
		$password=$_POST['password'];
		$user_mobile=$_POST['user_mobile'];
		$user_type=$_POST['user_type'];

		//create Database object
		$db=new Database();

		// $user_mobile,$user_type;
		// echo $username,$user_email,$password,

		//create insert query
		$query="insert into tb_user
			(
			dbUserName,
			dbEmail, dbPassword,dbPhone,dbUserType
			)
			values
			(
				'$username','$user_email','$password',
				'$user_mobile','$user_type'
				)";

				//run query
				$response = $db->insert($query);
				echo "<script>console.log('response: '+$response);</script>";
				if($response)
				{
					// When user created successfully.
					echo "<script>alert('User created successfully.');</script>";
				}
				else {
					// When user does not created successfully.
				}

	}

 ?>
<?php

		?>
		<html>
		<head>
			<script type="text/javascript">
			function validate()
			{
				var phoneno = /^[0-9]+$/;
				var name=(document.getElementById('name').value).trim();

				//var name=name1.trim();
				var email=(document.getElementById('email-input').value).trim();
				//fetching calues from form elements and tsoring them in variables
				var password=(document.getElementById('pass').value).trim();
				var repassword=(document.getElementById('repass').value).trim();	//	var password=password1.trim();
				var mb=(document.getElementById('mobile').value).trim();

				//checking if password length is greator than 6
				if(password.length<6)
				{
					document.getElementById('passlength').innerHTML="password should be atleast 6 characters long";
					return false;
				}
				else {
					document.getElementById('passlength').innerHTML="";
				}

				//check if password and repeated password matched
				if(password != repassword)
				{
					document.getElementById('errorpass').innerHTML="password odesnot match";
					return false;
				}
				else {
					document.getElementById('errorpass').innerHTML="";

				}
				//to check if mobile number i snumeric only and 10 digits long
				if(mb.match(phoneno))
				{
					if(mb.length==10)
					{
						return true;
					}
					else
					{
						document.getElementById('errormobile').innerHTML="phone number should be 10 characters long";
						//alert("phone number should be 10 characters long");
						return false;
					}
				}
				else
				{
					document.getElementById('errormobile').innerHTML="phone number should be numeric only";

					return false;
				}

				//to check if checkbox is checked or not
				if(document.getElementById('cb').checked==false)
				{
					document.getElementById('errorcheck').innerHTML="terms and conditions should be agreed";
				}

				//checking if postcode field is empty or not and throwing alert message


				// 	// ture wiil be returned only if all ablove validations have been perfomred
				// 	//if performed then return true otherwise no
				return true;
			}
			</script>
		</head>

<body>
		<div class="banner-top">
			<div class="container">
				<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Register</h2>
				<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Register</h3>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- contact -->
		<div class="login">
			<div class="container" >
				<form class="form-group" onsubmit="return validate()" method="post">
					<div class=" col-md-6 login-do1 animated wow fadeInLeft"  data-wow-delay=".5s">
						<div class="login-mail">
							<input id="name" type="text" name="username" placeholder="Name" required="">
							<i class="glyphicon glyphicon-user"></i>
						</div>
						<div class="login-mail">
							<input type="text" id="email-input" name="user_email" pattern="^[A-Za-z0-9\._%-]+@[A-Za-z0-9\.-]+\.[A-Za-z]{2,4}(?:[;][A-Za-z0-9\._%-]+@deakin.edu.au?)*" placeholder="Email" data-error="Email Address is invalid" required="">
							<i class="glyphicon glyphicon-envelope"></i>

						</div>



						<div class="login-mail ">
							<input id="pass" type="password" name="password" data-minlength="6" placeholder="Password" required="">
							<i class=" glyphicon glyphi con-lock"></i>
							<p id="passlength" style="color:red">

							</p>


						</div>

						<div class="login-mail">
							<input type="password" id="repass" data-minlength="6" placeholder="Repeated password" required="">
							<i class="glyphicon glyphicon-lock"></i>
							<p id="errorpass" style="color:red">

							</p>
						</div>

						<div class="login-mail">
							<input id="mobile" type="text" name="user_mobile" placeholder="Mobile Number" required="">
							<i class="glyphicon glyphicon-earphone"></i>
							<p id="errormobile" style="color:red">

							</p>
						</div>

						<div class="col-lg-4">


							<!--	<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
							user type <span class="caret"></span>

							<ul class="dropdown-menu" id="dd">
							<li>
							<a href="https://www.google.com">seller</a>
						</li>
						<li>
						<a href="https://www.google.com">buyer</a>
					</li>
				</ul>
			</button>

		</div>-->
		<div class="dropdown">
			<select name="user_type">
				<option value="1" >buyer</option>
				<option value="2" >seller</option>
			</select>
		</div>



		<br />

		<a class="news-letter" href="#">
			<label  class="checkbox1"><input id="cb" type="checkbox" name="checkbox" ><i> </i>I agree with the terms</label>
		</a>
		<p id="errorcheck">

		</p>

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
</body>
</html>

<?php

//Include footer
include "common/footer.php";

//Include Scripts and bottom file
include "common/bottom.php";

?>
