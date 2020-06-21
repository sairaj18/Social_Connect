<?php
	include 'db.inc.php';
	
	session_start();
	
	if(isset($_SESSION['user']))
	{
		echo "success!!";
	}
	else
	{
		$ur = $_POST["username"];
		$ur = mysqli_real_escape_string($conn,$ur);
		$ur = htmlentities($ur);

		$pass = $_POST["password"];
		$pass = mysqli_real_escape_string($conn,$pass);
		$pass = htmlentities($pass);

		$sql = "SELECT * FROM user_details WHERE username = '$ur' and password = '$pass'";

		$result = $conn->query($sql);

		if($result -> num_rows > 0)
		{
			$_SESSION["user"] = $_POST["username"];
			echo "success!!";
		} 
		else
		{
			echo "failed!!";
		}
	}
?>