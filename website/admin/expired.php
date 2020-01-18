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
	<title> EXPIRED BOOKS</title>
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
			padding-left: 70%;

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
	padding-left: 15px;
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
	background-color: black;
	opacity: .8;
	color: white;
	margin-top: -65px;
}
.scroll
{
	width: 100%;
	height: 400px;
	overflow: auto;
}
th,td
{
	width: 10%;
}

	</style>
</head>
<body>

<!-----------------------------------nAVBAR----------------------------------->


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

	<!----------expired book work----------------------------------->

	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

				<div style="color: white; margin-left: 60px; font-size: 20px;">

								<?php
								if(isset($_SESSION['username']))

								{ 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
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

<div id="main container">
	
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
	
	<div class=" container edittop">
		
		<?php
			if(isset($_SESSION['username']))
			{
				?>

			<div class="container" >
			<form method="post" action="">
					<button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> 
											&nbsp&nbsp
					<button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
			</form>
			</div>

					<div class="container ml-auto" >
					<br>
					<form method="post" action="" name="form1" >
						<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
						<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
						<button class="btn btn-primary" name="submit" type="submit">Submit</button><br><br>
					</form>
				  </div>
				<?php

				if(isset($_POST['submit']))
				{

					$res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
			
			while($row=mysqli_fetch_assoc($res))
			{
				$d= strtotime($row['return']);
				$c= strtotime(date("Y-m-d"));
				$diff= $c-$d;

				if($diff>=0)
				{
					$day= floor($diff/(60*60*24)); 
					$fine= $day*.10;
				}
			}
					$x= date("Y-m-d"); 
					mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");


					$var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
					mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");

					mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
					
				}
			}
		
		$c=0;

			
				 $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
				 $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
				
				if(isset($_POST['submit2']))
				{
					
				$sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
				$res=mysqli_query($db,$sql);

				}
				else if(isset($_POST['submit3']))
				{
				$sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
				$res=mysqli_query($db,$sql);
				}
				else
				{
				$sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
				$res=mysqli_query($db,$sql);
				}

				echo "<table class='table table-bordered table-responsive-sm container' >";
				//Table header
				
				echo "<tr style='background-color: #6db6b9e6;'>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";

			echo "</tr>"; 
			echo "</table>";

			 echo "<div class='scroll'>";
				echo "<table class='table table-bordered table-responsive-sm' >";
			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
					echo "<td>"; echo $row['username']; echo "</td>";
					echo "<td>"; echo $row['roll']; echo "</td>";
					echo "<td>"; echo $row['bid']; echo "</td>";
					echo "<td>"; echo $row['name']; echo "</td>";
					echo "<td>"; echo $row['authors']; echo "</td>";
					echo "<td>"; echo $row['edition']; echo "</td>";
					echo "<td>"; echo $row['approve']; echo "</td>";
					echo "<td>"; echo $row['issue']; echo "</td>";
					echo "<td>"; echo $row['return']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
				echo "</div>";

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