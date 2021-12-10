<?php
require("../original/database-connection.php");
session_start();

if(!isset($_SESSION['userID'])){
    header('Location:../Login_v16/Login.php');
}
if (isset($_POST['book'])) {
    $customer_id = $_SESSION['userID'];
	$period = $_POST['Day'];
	$service = $_POST['service'];
	$time = $_POST['Time'];
	$number = $_POST['number'];
    

	$sql = "INSERT INTO `bookings`(`customer_id`, `Period`, `service`, `Time`, `number`) VALUES  ('$customer_id','$period','$service', '$time', '$number')";
	$result = mysqli_query($connect, $sql);

	if ($result){
        echo "
        <script> 
            alert('Appointment scheduled successfully! View our products!');
            window.location='../original/product.php';
        </script>";
	} else echo "
        <script> 
            alert('Unable to schedule appointment. Please try again later.');
            window.location='../cart/cart.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg">
							<div class="form-header">
								<h2>Book A Service</h2>
								<p>Make your life a whole lot easier by booking one of our available services</p>
							</div>
						</div>
						<form action="" method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Pick a day</span>
										<input class="form-control" type="date" name="Day" required>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Service</span>
										<select class="form-control" name="service">
											<option>Braids</option>
											<option>Wig installment</option>
											<option>Hair Treatment</option>
											<option>Arylics</option>
											<option>Pedicure or manicure</option>
											<option>Wig Revamp</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Time</span>
										<select class="form-control" name="Time">
											<option>9:00am</option>
											<option>12:00pm</option>
											<option>3:00pm</option>
											<option>6:00pm</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label" >Number</span><br>
								<input class="form-control" type="text" placeholder="Enter Mobile Number" name="number" value="">

							
							
							</div>
							<div class="form-btn">
								<button class="submit-btn" name="book">Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>