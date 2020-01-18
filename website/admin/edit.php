<?php 
session_start();
 if(!isset($_SESSION['username'])) {
		header('location:../index.php');
	 }

include "../connection.php";

?>
<!DOCTYPE html>
<html>
<head>
		<title>Edit Profile</title>
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
										<div class="collaps navbar-collapse"  id="navbarid">
												<ul class="navbar-nav text-center ml-auto">
														<li class="nav-item">
																<a href="home.php" class="nav-link text-white">HOME</a>
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
																<a href="../logout.php" class="nav-link text-white">LOGIN</a>
														</li>
															<li class="nav-item">
																<a href="../logout.php" class="nav-link text-white">SIGNUP</a>
														</li>
											</ul>

											<?php 

									}

											 ?>

		</div>

		</nav>


		<!---------------------------------------edit profile work------------------------------------------------------->
<div class="container edittop">
	<h2 class="text-center text-white">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM admin WHERE username='$_SESSION[username]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['first'];
			$last=$row['last'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$contact=$row['contact'];
		}

	?>

	<div class="profile_info text-center" >
		<span class="text-white">Welcome,</span> 
		<h4 class="text-white"><?php echo $_SESSION['username']; ?></h4>
	</div><br><br>
	
	<div class="container editc">
				<form action="" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label>Picture</label>
				<input class="form-control" type="file" name="file">
		 </div>

		<div class="form-group">
				<label>First Name</label>
				<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">
		</div>

		<div class="form-group">
				<label>Last Name</label>
				<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">
		</div>

		<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
		</div>

		<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">
		</div>

		<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
		</div>

		<div class="form-group">
				<label>Contact No</label>
				<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">
		</div>

			 <button type="submit" name="submit" class="btn btn-primary">Update</button>
			</form>
		</div> <!-- end of container -2-->

	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE admin SET pic='$pic', first='$first', last='$last', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['username']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
	?>
	</div> <!--  end of container-->


	<footer class="text-center">

			<h6>copyright &copy 2020 Liberary Management System Desigend by : WASEEM</h6>

		</footer>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>