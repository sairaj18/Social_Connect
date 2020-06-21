<?php
	include 'db.inc.php';

	session_start();
	$sq = "SELECT CURRENT_TIMESTAMP()";
	$result = $conn->query($sq);
	$row = $result->fetch_row();

	$mu = $_POST["myupdate"];
	$mu = mysqli_real_escape_string($conn,$mu);
	$mu = htmlentities($mu);

	$sql = "INSERT Into posts_details (content, author, cur_time) Values('$mu','".$_SESSION["user"]."','$row[0]')"; 
	$result = $conn->query($sql);
	echo "success";
?>