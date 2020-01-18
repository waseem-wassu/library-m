<?php 
session_start();
if(isset($_SESSION['username'])) 
{
	header('location:profile.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
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

<!------------------------------navbar-------------------------------------------------->



   
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
								<a href="registration.php" class="nav-link text-white">Sign-Up</a>
							</li>
						</ul>
					</div>
	</nav>
	  <!----------------------------------------login-form --------------------------------------------->


	<div class="container log-box">

					<h1 class=" text-center">Admin Login Form</h1>

					<form action="validation.php" method="post">

						<div class="form-group">
							<label >Username</label>
							<input type="text" name="user" placeholder="Enter your User Name" class="form-control color">    
						</div>

						<div class="form-group">
							<label>password</label>
							<input type="password" name="password" placeholder="Enter your password" class="form-control color ">    
						</div>

						<button type="submit" class="btn btn-primary">Login</button>

					<a class="text-danger" href="update_password.php">Forgot password?</a>

					</form>
					
	</div> <!-- end of container -->

			<footer class="text-center">

			<h6>copyright &copy 2020 Liberary Management System Desigend by : WASEEM</h6>

		</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>