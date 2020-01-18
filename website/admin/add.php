<?php 
session_start();
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
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
	background-color: #024629;
	font-family: "Lato", sans-serif;
	transition: background-color .5s;
}

.sidenav {
	height: 100%;
	margin-top: 50px;
	width: 0;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #222;
	overflow-x: hidden;
	transition: 0.5s;
	padding-top: 60px;
}

.sidenav a {
	padding: 8px 8px 8px 32px;
	text-decoration: none;
	font-size: 25px;
	color: #818181;
	display: block;
	transition: 0.3s;
}

.sidenav a:hover {
	color: white;
}

.sidenav .closebtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
}

#main {
	transition: margin-left .5s;
	padding: 16px;
}

@media screen and (max-height: 450px) {
	.sidenav {padding-top: 15px;}
	.sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

.book
{
		width: 400px;
		margin: 0px auto;
}
.form-control
{
	background-color: #080707;
	color: white;
	height: 40px;
}

	</style>


</head>
<body style="background-color:#495057b5;">

<nav class="navbar navbar-expand-md  navbar-dark bg-dark">
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
									<a href="fines.php" class="nav-link text-white">FINES</a>
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

  <!-------------------------------------------add books------------------------------------------------------->

  <!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

				<div style="color: white; margin-left: 60px; font-size: 20px;">

								<?php
								if(isset($_SESSION['username']))

								{   

									echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
										echo "</br></br>";

										echo "Welcome ".$_SESSION['username']; 
								}
								?>
						</div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
	<div class="h"> <a href="delete.php">Delete Books</a></div>
	<div class="h"> <a href="request.php">Book Request</a></div>
	<div class="h"> <a href="issue_info.php">Issue Information</a></div>
</div>

<div id="main">
	<span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
	<div class="container text-center">
		<h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Books</b></h2>
		
		<form class="book container" action="" method="post">
				
				<input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
				<input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
				<input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
				<input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
				<input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
				<input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
				<input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

				<button  class="btn btn-primary" type="submit" name="submit">ADD</button>
		</form>
	</div>
<?php
		if(isset($_POST['submit']))
		{
			if(isset($_SESSION['username']))
			{
				mysqli_query($db,"INSERT INTO books (bid,name,authors,edition,status,quantity,department) VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]') ;");
				?>
					<script type="text/javascript">
						alert("Book Added Successfully.");
					</script>

				<?php

			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You need to login first.");
					</script>
				<?php
			}
		}
?>
</div>
<script>
function openNav() {
	document.getElementById("mySidenav").style.width = "300px";
	document.getElementById("main").style.marginLeft = "300px";
	document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
	document.body.style.backgroundColor = "#02462";
}
</script>


<footer class="text-center">

	  <h6>copyright &copy 2020 Liberary Management System Desigend by : WASEEM</h6>

</footer>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>