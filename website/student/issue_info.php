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
	<title> BOOK issue</title>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LMS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">

		.srch
		{
			padding-left: 850px;

		}

		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
		}
		
		body {
			background-image: url("images/aa.jpg");
			background-repeat: no-repeat;
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
.container1
{
	height: 600px;
	background-color: black;
	opacity: .8;
	color: white;
}
.scroll
{
	width: 100%;
	height: 500px;
	overflow: auto;
}
th,td
{
	width: 10%;
}

</style>

</head>

<body>


	<!--------------------------nav bar --------------------------------->

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



    <!--------------------------issue info work --------------------------->
	<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

				<div style="color: white; margin-left: 60px; font-size: 20px;">

								<?php
								if(isset($_SESSION['username']))

								{   echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
										echo "</br></br>";

										echo "Welcome ".$_SESSION['username']; 
								}
								?>
						</div><br><br>

 
	<div class="h"> <a href="books.php">Books</a></div>
	<div class="h"> <a href="request.php">Book Request</a></div>
	<div class="h"> <a href="issue_info.php">Issue Information</a></div>
	<div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
	
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


	<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "300px";
		document.getElementById("main").style.marginLeft = "300px";
		document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("main").style.marginLeft= "0";
		document.body.style.backgroundColor = "white";
	}
	</script>

	<div class="container1 container">
		<h3 style="text-align: center;">Information of Borrowed Books</h3><br>
		<?php
		$c=0;

			if(isset($_SESSION['username']))
			{
				$sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.username ='$_SESSION[username]' and issue_book.approve !='' ORDER BY `issue_book`.`return` ASC";
				$res=mysqli_query($db,$sql);
				
				
				echo "<table class='table table-bordered' style='width:100%;'>";
				//Table header
				
				echo "<tr style='background-color: #6db6b9e6;'>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";

			echo "</tr>"; 
			echo "</table>";

			 echo "<div class='scroll'>";
				echo "<table class='table table-bordered' >";
			while(!$res || $row=mysqli_fetch_assoc($res))
			{
			 
				echo "<tr>";
					echo "<td>"; echo $row['username']; echo "</td>";
					echo "<td>"; echo $row['roll']; echo "</td>";
					echo "<td>"; echo $row['bid']; echo "</td>";
					echo "<td>"; echo $row['name']; echo "</td>";
					echo "<td>"; echo $row['authors']; echo "</td>";
					echo "<td>"; echo $row['edition']; echo "</td>";
					echo "<td>"; echo $row['issue']; echo "</td>";
					echo "<td>"; echo $row['return']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
				echo "</div>";
			 
			}
			else
			{
				?>
					<h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
				<?php
			}
		?>
	</div>
</div>

<footer class="text-center">

			<h6>copyright &copy 2020 Liberary Management System Desigend by : WASEEM</h6>

</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
