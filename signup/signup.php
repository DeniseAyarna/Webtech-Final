<?php
require("../original/database-connection.php");

if (isset($_POST['signup'])) {
	$email = $_POST['email'];
	$Password = $_POST['password'];
	$name = $_POST["name"];
	$username = $_POST["username"];
	$address = $_POST["address"];


	$sql = "INSERT INTO Register (email,Password,name,address,username)VALUES('$email','$Password','$name','$address','$username')";
	$result = mysqli_query($connect, $sql);

	if ($result) {
		header("Location: ../Login_v16/Login.php");

		echo "New record added";
	} else echo "false";
}


?>
 
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>RegistrationForm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div class="wrapper" style="background-image: url('images/salon.jpeg')">
		<div class="inner">
			<div class="image-holder">
				<img src="images/salon.jpeg" alt="">
			</div>
			<form action="#" method="POST">
				<h3>Registration Form</h3>
				<div class="form-group">
					<input type="text" placeholder="Name" class="form-control" name="name" value="" required>
				</div>
				<div class="form-wrapper">
					<input type="text" placeholder="Username" class="form-control" name="username" value="" required>
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="form-wrapper">
					<input type="text" placeholder="Email Address" class="form-control" name="email" value="" required>
					<i class="zmdi zmdi-email"></i>
				</div>
				<div class="form-wrapper">
					<select name="gender" id="" class="form-control" value="">
						<option value="" disabled selected>Gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
					<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
				</div>
				<div class="form-wrapper">
					<input type="text" placeholder="Address" class="form-control" name="address" value="" required>
					<i class="zmdi zmdi-lock"></i>
				</div>
				<div class="form-wrapper">
					<input type="password" placeholder="Password" class="form-control" name="password" value="" required>
					<i class="zmdi zmdi-lock"></i>
				</div>
				<button type="submit" name="signup">
					Sign Up<i class="zmdi zmdi-arrow-right"></i>
				</button>
			</form>
		</div>
	</div>

</body>

</html>