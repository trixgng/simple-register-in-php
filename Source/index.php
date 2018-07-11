
<?php

$dbserver 	= 'SERVERNAME';	

$dbuser 	= 'SERVERUSERNAME';	

$dbpassowrd = 'SERVERPASSWORD';	

$dbname 	= 'DATABASENAME';	



$result 	= '';



$con = mysqli_connect($dbserver,$dbuser,$dbpassowrd);

if ($con) {

	mysqli_select_db($con,$dbname);

	if (isset($_POST['submit'])) {

		$name = $_POST['Name'];
		$email = $_POST['Email'];
		$password = $_POST['Password'];
		$conf_password = $_POST['Conf-Password'];



		if ($conf_password==$password) {

			$sql ="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";

			mysqli_query($con,$sql);

			$result = '<p class="success">Registered !</p>';

			# code...
		}

		elseif ($conf_password!=$password) {

			$result = '<p class="failed">Password not match !</p>';

			# code...
		}

		else
		{
			$result = '<p class="failed">something wrong !</p>';

		}

		# code...
	}

	# code...
}

elseif (!$con) {

			$result = '<p class="failed">Connection error !</p>';

	# code...
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>


	<div class="main">



 		<div class="container">


		<h6 class="form-title">REGISTRATION FORM</h6>
		<span class="title-border"> </span>
		
		<form class="sign-up-form form" name="sign-up-form" method="post" autocomplete="off" action="#">
			
			<div class="form-input">
				
				<input type="text" name="Name" placeholder="NAME" required/>

			</div>	
			<div class="form-input">
				
				<input type="Email" name="Email" placeholder="EMAIL" required />

			</div>	
			<div class="form-input">
				
				<input type="Password" name="Password" placeholder="PASSWORD" required/>

			</div>	
			<div class="form-input">
				
				<input type="Password" name="Conf-Password" placeholder="CONFIRM PASSWORD" required/>

			</div>	
			<div class="form-input  button">
				
				<button type="submit" class="submit" name="submit" required>SignUp</button>

			</div>


			<div class="form-result">

				<?php echo "".$result; ?>
				
			</div>

		</form>

	</div>


	</div>

</body>
</html>