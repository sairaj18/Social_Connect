<?php
	include 'db.inc.php';

	session_start();

	$ur = $_POST["username"];
	$ur = mysqli_real_escape_string($conn,$ur);
	$ur = htmlentities($ur);

	$pass = $_POST["password"];
	$pass = mysqli_real_escape_string($conn,$pass);
	$pass = htmlentities($pass);

	$sql = "SELECT * FROM user_details WHERE username = '$ur'";

	$result = $conn->query($sql);

	if($result -> num_rows == 0)
	{
		$sql = "INSERT INTO user_details (username, password) VALUES('$ur','$pass')";
		$result = $conn->query($sql);
		$_SESSION["user"]=$_POST["username"];
		echo "success";
	}
	
	$conn->close();
?>	