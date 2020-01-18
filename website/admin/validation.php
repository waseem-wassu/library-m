<?php 
session_start();

include "../connection.php";

$name = $_POST['user'];
$pwd = $_POST['password'];

$q = "SELECT * FROM admin WHERE username = '$name' && password = '$pwd'";

	$data = mysqli_query($db,$q);

	$num = mysqli_num_rows($data);
	$row= mysqli_fetch_assoc($data);

	if($num == 1) 

	{
		$_SESSION['username'] = $name;
		$_SESSION['pic'] = $row['pic'];



		header('location:profile.php');
	}

	 else 
	 {
		?>

		<script type="text/javascript">
			alert("invalid username and password");
			window.location = "login.php";
		</script>
		<?php
	 }

	?>