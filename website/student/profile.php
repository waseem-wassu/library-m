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
	<title> ADD BOOKS</title>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LMS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body style="background-color: #1700d363;">
   
	  <nav class="navbar navbar-expand-md  navbar-dark bg-dark ">
		  <div class="container">
				<a href="#" class="navbar-brand "><span style="color:orange;">Liberary Management system</span></a>
				<button class="navbar-toggler media480" data-toggle="collapse" data-target="#navbarid">
					<span class="navbar-toggler-icon" ></span>
				</button>
					<div class="collaps navbar-collapse"  id="navbarid">
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
									<a href="fine.php" class="nav-link text-white">FINES</a>
								</li>
					  </ul>


							<ul class="navbar-nav text-center ml-auto">
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


	<!-------------------------------------profile work----------------------------------------------->


<div class="container">
		<form class="buttonedit" action="" method="post">
			<button class="btn btn-primary float-right margin_top"name="edit" type="submit">Edit</button>
		</form>
		<div class="container">

				<?php

			if(isset($_POST['edit']))
			{
				?>
				<script type="text/javascript">
					window.location="edit.php"
				</script>

				<?php
			}


				$q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[username]' ;");
			?>
			
			<h2 style="text-align: center;">My Profile</h2>

			<?php

				$row=mysqli_fetch_assoc($q);

				echo "<div style='text-align: center'>
					<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
				</div>";
			?>

			<div style="text-align: center;"> <b>Welcome, </b>
				<h4>
					<?php echo $_SESSION['username'];?>
				</h4>
			</div>

			<?php
				echo "<b>";
				echo "<table class='table table-bordered'>";
					echo "<tr>";
						echo "<td>";
							echo "<b> First Name: </b>";
						echo "</td>";

						echo "<td>";
							echo $row['first'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Last Name: </b>";
						echo "</td>";
						echo "<td>";
							echo $row['last'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> User Name: </b>";
						echo "</td>";
						echo "<td>";
							echo $row['username'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Password: </b>";
						echo "</td>";
						echo "<td>";
							echo $row['password'];
						echo "</td>";
					echo "</tr>";



		echo "<tr>";
						echo "<td>";
							echo "<b> Rollno: </b>";
						echo "</td>";
						echo "<td>";
							echo $row['roll'];
						echo "</td>";
					echo "</tr>";


					echo "<tr>";
						echo "<td>";
							echo "<b> Email: </b>"; 
						echo "</td>";
						echo "<td>";
							echo $row['email'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Contact: </b>";
						echo "</td>";
						echo "<td>";
							echo $row['contact'];
						echo "</td>";
					echo "</tr>";

					
				echo "</table>";
				echo "</b>";
			?>
		</div>
	</div>  
	<footer class="text-center">

			<h6>copyright &copy 2020 Liberary Management System Desigend by : WASEEM</h6>

		</footer>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>