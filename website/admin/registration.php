<?php 
session_start();

include "../connection.php";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LMS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body>
   
	  <nav class="navbar navbar-expand-md  navbar-dark bg-dark ">
		  <div class="container">
				<a href="#" class="navbar-brand "><span style="color:orange;">Liberary Management system</span></a>
				<button class="navbar-toggler media480" data-toggle="collapse" data-target="#navbarid">
					<span class="navbar-toggler-icon" ></span>
				</button>
					<div class="collaps navbar-collapse"  id="navbarid">
						<ul class="navbar-nav text-center ml-auto">
							
							<li class="nav-item">
								<a href="../index.php" class="nav-link text-white">Home</a>
							</li>

							<li class="nav-item">
								<a href="login.php" class="nav-link text-white">Login</a>
							</li>
						</ul>
					</div>
	</nav>

	  <!----------------------------------------Registration-form --------------------------------------------->


	<div class="container log-box">

					<h1 class=" text-center">Admin Registration Form</h1>

					<form action="" method="post">

						<div class="form-group">
							<label >FIRST NAME</label>
							<input type="text" name="first" placeholder="Enter your First Name" class="form-control color">    
						</div>
						<div class="form-group">
							<label >LAST NAME</label>
							<input type="text" name="last" placeholder="Enter your Last Name" class="form-control color">    
						</div>
						<div class="form-group">
							<label >USER NAME</label>
							<input type="text" name="username" placeholder="Enter your User Name" class="form-control color">    
						</div>

						<div class="form-group">
							<label>password</label>
							<input type="password" name="password" placeholder="Enter your Password" class="form-control color ">    
						</div>
						<div class="form-group">
							<label >Email</label>
							<input type="email" name="email" placeholder="Enter your Email Address" class="form-control color">    
						</div>
						<div class="form-group">
							<label >contact</label>
							<input type="text" name="contact" placeholder="Enter your Contact Number" class="form-control color">    
						</div>

						<button type="submit" name="submit" class="btn btn-primary">SIGN UP</button>

					<a class="text-danger" href=".php">Forgot password?</a>

					</form>
					
	</div> <!-- end of container -->

			<footer class="text-center">

			<h6>copyright &copy 2020 Liberary Management System Desigend by : WASEEM</h6>

		</footer>

<!-------------------------------------php code----------------------------------------------->
<?php

	  if(isset($_POST['submit'])) {

	$first = $_POST['first'];
	$last = $_POST['last'];
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	$email = $_POST['email'];
	$cont = $_POST['contact'];
	

	$q = " SELECT * FROM admin WHERE username = '$username' && password = '$pwd'";

	$data = mysqli_query($db,$q);

	$num = mysqli_num_rows($data);

	if($num == 1) 

	{

		?>

		  <script type="text/javascript">
			alert("already exist");
			window.location = "login.php";

		  </script>


		<?php
	}

	else 

	{

	$sql = "INSERT INTO admin (first,last,username,password,email,contact,pic) VALUES ('$first','$last','$username','$pwd','$email','$cont','pic.jpg');";

	$run = mysqli_query($db,$sql);
	?>
		
		<script type="text/javascript">
			alert("data inserted successfully");
			window.location = "login.php";
		</script>

	<?php

	}
}

 ?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>