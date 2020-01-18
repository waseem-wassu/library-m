<?php 
session_start();
include "../connection.php";

?>
<!DOCTYPE html>
<html>
<head>
		<title>Change Password</title>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LMS</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body style="background-color:#495057b5;">
	 
			<nav class="navbar navbar-expand-md  navbar-dark bg-dark ">
					<div class="container">
								<a href="#" class="navbar-brand "><span style="color:orange;">Liberary Management system</span></a>
								<button class="navbar-toggler media480" data-toggle="collapse" data-target="#navbarid">
										<span class="navbar-toggler-icon" ></span>
								</button>
										<div class="navbar-collapse navbar-collapse"  id="navbarid">
												<ul class="navbar-nav text-center ml-auto">
														<li class="nav-item">
																<a href="../index.php" class="nav-link text-white">HOME</a>
														</li>

														<li class="nav-item">
																<a href="books.php" class="nav-link text-white">BOOKS</a>
														</li>
											 

												 
														<?php 

														if(isset($_SESSION['username'])) {
						
																?>


															<li class="nav-item">
																	<a href="profile.php" class="nav-link text-white">PROFILE</a>
															</li>

															<li class="nav-item">
																	<a href="student.php" class="nav-link text-white">Student-Info</a>
															</li>

															<li class="nav-item">
																	<a href="fine.php" class="nav-link text-white">FINES</a>
															</li>
									
															 <li class="nav-item">
															 <a href="profile.php" class="nav-link text-white">
															 <div class = " text-white">

																<?php
																	echo "<img class='rounded-circle' height=30 width=30 src='images/".$_SESSION['pic']."'>";

																	echo " ".$_SESSION['username']; 
																?>
															</div>
															 </a>
															</li>
										 
																<li class="nav-item">
																		<a href="../logout.php" class="nav-link text-white">LOGOUT</a>
																</li>
																</ul>
																<?php 
														}
										else {
										?>
											
											<ul class="navbar-nav text-center ml-auto">
													<li class="nav-item">
																<a href="login.php" class="nav-link text-white">LOGIN</a>
														</li>
															<li class="nav-item">
																<a href="registration.php" class="nav-link text-white">SIGNUP</a>
														</li>
											</ul>

											<?php 

									}

											 ?>

		</div>

		</nav>

<!------------------------------------  Uopdate password -------------------------------->

	<div class="container edittop">
		<div class="text-center">
			<h1 class="text-center text-white" style="font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
		</div>
		<div class="container" >
		<form action="" method="post" >

					<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" name="username" required="">
				</div>

		 <div class="form-group">
				<label>Email</label>
				<input class="form-control" type="text" name="email" required="">
		</div>

			<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="text" name="password" required="">
		</div>


			<button class="btn btn-primary" type="submit" name="submit" >Update</button>
		</form>

	</div>
	
	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]'
			AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
				alert("The Password Updated Successfully.");
				window.location = "login.php";
				</script> 

				<?php
			}
		}
	?>
</div>




		<footer class="text-center">

						<h6>copyright &copy 2020 Liberary Management System Desigend by : WASEEM</h6>

				</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
